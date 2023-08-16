<!DOCTYPE html>
<html>
<head>
    <title>青年大学习<?php echo $maxIdTitle; ?>排行榜</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <link rel="stylesheet" href="/res/bootstrap.min.css">
    <style>
        body {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            border: 1px solid #ccc;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        /* 移动设备适配样式 */
        @media only screen and (max-width: 600px) {
            table {
                width: auto;
                font-size: 18px;
            }

            td, th {
                padding: 4px;
            }
        }
    </style>
</head>
<body>
    <?php
    // 创建数据库连接
    require_once 'config.php';

    // 查询排行榜数据
    $stmt = $conn->prepare("SELECT * FROM branch_data ORDER BY averageScore DESC");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 查询与最大值对应的title
    $maxIdStmt = $conn->prepare("SELECT title FROM courses WHERE id = (SELECT MAX(id) FROM courses)");
    $maxIdStmt->execute();
    $maxIdRow = $maxIdStmt->fetch(PDO::FETCH_ASSOC);
    $maxIdTitle = $maxIdRow['title'];

    // 查询更新时间
    $stmt = $conn->prepare("SELECT datetime FROM time ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $datetime = $row['datetime'];
    ?>

    <h1>青年大学习<?php echo $maxIdTitle; ?>排行榜</h1>
    <div class="container">
        <p class="text-center">更新时间：<?php echo $datetime; ?> <a href="refresh.php">点击更新</a></p>
        <p class="text-center"><a href="wxx">未学习人员提醒</a></p>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>团支部</th>
                    <th>成员数</th>
                    <th>观看人数</th>
                    <th>完成率</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['memberCnt']; ?></td>
                        <td><?php echo $row['users']; ?></td>
                        <td><?php echo $row['averageScore'] . '%'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <p class="text-center">更新时间：<?php echo $datetime; ?></p>
        <p class="text-center"><a href="refresh.php">点击更新</a></p>
        <p class="text-center"><a href="wxx">未学习人员提醒</a></p>
        <p class="text-center">更多功能开发中，敬请期待</p>
        <p class="text-center">团委组织部</p>
    </div>

    <script src="/res/jquery.min.js"></script>
    <script src="/res/bootstrap.bundle.min.js"></script>
</body>
</html>
