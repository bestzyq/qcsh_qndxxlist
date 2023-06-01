<?php
$dbHost = 'localhost';
$dbName = 'qndxx';
$dbUsername = 'qndxx';
$dbPassword = 'qndxx';

// 创建数据库连接
$conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);

// 查询数据表获取名单信息
$tableName = 'wxx'; // 数据表名称，请根据实际情况进行替换
$stmt = $conn->prepare("SELECT unit_class, name_id FROM $tableName");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>未学习人员提醒</title>
    <style>
        body {
            text-align: center;
        }

        table {
            margin: 0 auto;
            width: 50%;
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
    </style>
</head>
<body>
    <?php
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
    <table>
        <tr>
            <th>团支部</th>
            <th>姓名</th>
        </tr>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row['unit_class']; ?></td>
                <td><?php echo $row['name_id']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <div>
        <p>更新时间：<?php echo $datetime; ?></p>
        <p><a href="refresh.php">点击更新</a></p>
        <p><a href="/">回到排行榜</a></p>
        <p>更多功能开发中，敬请期待</p>
        <p>团委组织部</p>
    </div>
</body>
</html>