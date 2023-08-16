<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// 清空time2数据表
$truncateTime2TableSQL = "TRUNCATE TABLE time2";
$conn->exec($truncateTime2TableSQL);

// 清空数据表
$tableName = 'wxx'; // 请将表名替换为您要清空的数据表名称
$truncateTableSQL = "TRUNCATE TABLE $tableName";
$conn->exec($truncateTableSQL);

// 查询courses表中的最大ID
$maxIdStmt = $conn->prepare("SELECT MAX(id) AS maxId FROM courses");
$maxIdStmt->execute();
$maxIdRow = $maxIdStmt->fetch(PDO::FETCH_ASSOC);
$maxId = $maxIdRow['maxId'];

// 查询access_tokens表中的accessToken
$accessTokenStmt = $conn->prepare("SELECT accessToken FROM access_tokens");
$accessTokenStmt->execute();
$accessToken = $accessTokenStmt->fetchColumn();

// 构建URL
$url = "https://qcsh.h5yunban.com/youth-learning/cgi-bin/branch-api/user/course/records?pageSize=1000&pageNum=1&desc=createTime&nid=N000100060008&status=%E6%9C%AA%E5%AD%A6%E4%B9%A0&course=$maxId&accessToken=$accessToken";

// 使用cURL发送GET请求获取JSON数据
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

// 解析JSON数据
$data = json_decode($response, true);
$list = $data['result']['list'];

// 提取所需信息并插入数据表
$tableName = 'wxx'; // 请将表名替换为您要导入的数据表名称

// 创建数据表（如果不存在）
$createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
    unit_class VARCHAR(255),
    name_id VARCHAR(255)
)";
$conn->exec($createTableSQL);

foreach ($list as $item) {
    $branchs = $item['branchs'];
    $unit_class = $branchs[3]; // 获取第四个元素

    // 判断unit_class是否包含指定关键词
    $keywords = ['19', '硕', '博'];
    $containsKeyword = false;
    foreach ($keywords as $keyword) {
        if (strpos($unit_class, $keyword) !== false) {
            $containsKeyword = true;
            break;
        }
    }

    if (!$containsKeyword) {
        $cardNo = $item['cardNo'];
        $name_id = $cardNo;

        // 将数据插入数据表
        $insertSQL = "INSERT INTO $tableName (unit_class, name_id) VALUES ('$unit_class', '$name_id')";
        $conn->exec($insertSQL);
    }
}

// 保存当前时间到time2数据表
$currentTime = date('Y-m-d H:i:s');
$insertTimeSQL = "INSERT INTO time2 (datetime) VALUES ('$currentTime')";
$conn->exec($insertTimeSQL);

// 跳转到wxx.php页面
header("Location: /wxx/");
exit;
?>
