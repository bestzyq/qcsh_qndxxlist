<?php
// 从数据库中获取 id 和 captcha
require_once 'config.php';
$stmt = $conn->prepare("SELECT id, captcha FROM captcha ORDER BY id DESC LIMIT 1");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['id'];
$captcha = $row['captcha'];

// 发送登录请求
$url = 'https://qcsh.h5yunban.com/youth-learning/cgi-bin/login';

$headers = [
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Content-Type: application/json;charset=UTF-8',
    'Origin: https://qcsh.h5yunban.com',
    'Referer: https://qcsh.h5yunban.com/youth-learning/admin/login.php',
    'sec-ch-ua: "Microsoft Edge";v="113", "Chromium";v="113", "Not-A.Brand";v="24"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.57',
    'X-Requested-With: XMLHttpRequest'
];

$data = [
    "account" => "",
    "password" => "",
    "captchaId" => $id,
    "captcha" => $captcha
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if ($result && isset($result['result']['accessToken'])) {
    $access_token = $result['result']['accessToken'];
    $dbHost = 'localhost';
    $dbName = 'qndxx';
    $dbUsername = 'qndxx';
    $dbPassword = 'qndxx';
    // 建立数据库连接
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
    // 清空数据表
    $truncateStmt = $conn->prepare("TRUNCATE TABLE access_tokens");
    $truncateStmt->execute();
    // 准备插入语句
    $insertStmt = $conn->prepare("INSERT INTO access_tokens (accesstoken) VALUES (:accessToken)");
    $insertStmt->bindParam(':accessToken', $access_token);
    
    // 执行插入操作
    $insertStmt->execute();
    
    // 检查是否插入成功
    if ($insertStmt->rowCount() > 0) {
        // 跳转至 branch_data.php 页面
        header("Location: courses.php");
        exit;
    } else {
        echo "accessToken保存失败";
    }
} else {
    // 处理登录失败的情况
    echo "请求失败<br/>";
    if (isset($result['message'])) {
        echo "错误信息：{$result['message']}";
    }
}
?>
