<?php
$dbHost = 'localhost';
$dbName = 'qndxx';
$dbUsername = 'qndxx';
$dbPassword = 'qndxx';

$conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);

// 清空courses表
$clearStmt = $conn->prepare("TRUNCATE TABLE courses");
$clearStmt->execute();

$stmt = $conn->prepare("SELECT accessToken FROM access_tokens");
$stmt->execute();
$accessToken = $stmt->fetchColumn();

if ($accessToken) {
    $url = 'https://qcsh.h5yunban.com/youth-learning/cgi-bin/branch-api/course/list?pageSize=999&pageNum=1&desc=startTime&type=%E7%BD%91%E4%B8%8A%E4%B8%BB%E9%A2%98%E5%9B%A2%E8%AF%BE&accessToken=' . $accessToken;
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data && $data['status'] === 200) {
        $courses = $data['result']['list'];

        foreach ($courses as $course) {
            $id = $course['id'];
            $title = $course['title'];

            $stmt = $conn->prepare("INSERT INTO courses (id, title) VALUES (:id, :title)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
        }

        echo "数据已存入数据库";

        // 跳转至 branch_data.php
        header("Location: branch_data.php");
        exit;
    } else {
        echo "无法获取数据";
    }
} else {
    echo "无法获取访问令牌";
}
?>
