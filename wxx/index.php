<!DOCTYPE html>
<html>
<head>
    <title>未学习人员提醒</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <link rel="stylesheet" href="/res/bootstrap.min.css">
    <style>
        body {
            text-align: center;
            padding-top: 50px;
        }

        table {
            margin: 0 auto;
            width: 90%;
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

        .footer {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
        // 查询数据表获取名单信息
        $tableName = 'wxx'; // 数据表名称，请根据实际情况进行替换
        $stmt = $conn->prepare("SELECT unit_class, name_id FROM $tableName");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // 查询更新时间
        $stmt = $conn->prepare("SELECT datetime FROM time2 ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $datetime = $row['datetime'];
        ?>
        <h1>未学习人员提醒</h1>
        <div>
            <p>更新时间：<?php echo $datetime; ?> <a href="refresh.php">点击更新</a></p>
            <p><a href="/">回到排行榜</a></p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>团支部</th>
                        <th>姓名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row['unit_class']; ?></td>
                            <td><?php echo $row['name_id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>更新时间：<?php echo $datetime; ?> <a href="refresh.php">点击更新</a></p>
            <p><a href="/">回到排行榜</a></p>
            <p>更多功能开发中，敬请期待</p>
            <p>团委组织部</p>
        </div>
    </div>
</body>
</html>
