<?php
$dbHost = 'localhost';
$dbName = 'qndxx';
$dbUsername = 'qndxx';
$dbPassword = 'qndxx';

// 创建数据库连接
$conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);

// 清空 branch_data 表
$truncateBranchDataStmt = $conn->prepare("TRUNCATE TABLE branch_data");
$truncateBranchDataStmt->execute();

// 清空 time 表
$truncateTimeStmt = $conn->prepare("TRUNCATE TABLE time");
$truncateTimeStmt->execute();

// 查询 access_token
$stmt = $conn->prepare("SELECT accesstoken FROM access_tokens ORDER BY id DESC LIMIT 1");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$access_token = $row['accesstoken'];

// 查询 courses 表中的最大ID
$stmt = $conn->prepare("SELECT MAX(id) AS max_id FROM courses");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$maxId = $row['max_id'];

// 构建 URL 并替换占位符
$url = 'https://qcsh.h5yunban.com/youth-learning/cgi-bin/branch-api/course/statis/v3?nid=null&beginCourse=' . $maxId . '&accessToken=' . $access_token;

// 发送 GET 请求并获取响应数据
$response = file_get_contents($url);
$data = json_decode($response, true);

// 处理响应数据
if ($data && isset($data['result'])) {
    $result = $data['result'];
    $branchs = $result['branchs'];

    // 遍历 branchs 并处理数据
    foreach ($branchs as $branch) {
        $title = $branch['title'];
        $memberCnt = $branch['memberCnt'];
        $users = $branch['users'];
        $averageScore = $branch['averageScore'];

        // 将数据存入数据库或进行其他操作
        $insertBranchDataStmt = $conn->prepare("INSERT INTO branch_data (title, memberCnt, users, averageScore) VALUES (:title, :memberCnt, :users, :averageScore)");
        $insertBranchDataStmt->bindParam(':title', $title);
        $insertBranchDataStmt->bindParam(':memberCnt', $memberCnt);
        $insertBranchDataStmt->bindParam(':users', $users);
        $insertBranchDataStmt->bindParam(':averageScore', $averageScore);
        $insertBranchDataStmt->execute();
    }

    // 保存当前日期时间到 time 数据表
    $currentDateTime = date('Y-m-d H:i:s');
    $insertTimeStmt = $conn->prepare("INSERT INTO time (datetime) VALUES (:datetime)");
    $insertTimeStmt->bindParam(':datetime', $currentDateTime);
    $insertTimeStmt->execute();

    // 跳转至根目录
    header("Location: /");
    exit;
} else {
    echo "请求失败";
}
?>
