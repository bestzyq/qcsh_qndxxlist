<?php
// 连接到数据库
require_once 'config.php';

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 创建captcha表
$sql = "CREATE TABLE captcha (
    id VARCHAR(36) NOT NULL PRIMARY KEY,
    base64_image TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "表captcha创建成功";
} else {
    echo "创建表时出错: " . $conn->error;
}

// 关闭数据库连接
$conn->close();
?>
