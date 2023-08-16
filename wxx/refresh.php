<!DOCTYPE html>
<html>
<head>
    <title>验证码</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/res/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // 从指定网址获取验证码信息
        $url = 'https://qcsh.h5yunban.com/youth-learning/cgi-bin/captcha';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data && $data['status'] === 200) {
            // 获取id和验证码图片的base64数据
            $id = $data['result']['id'];
            $imageData = $data['result']['base64'];

            // 处理用户提交的验证码
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['captcha'])) {
                $captcha = $_POST['captcha'];
                $inputId = $_POST['id'];

                // 将id和验证码存入数据库
                require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
                $clearStmt = $conn->prepare("DELETE FROM captcha");
                $clearStmt->execute();
                $stmt = $conn->prepare("INSERT INTO captcha (id, captcha) VALUES (:id, :captcha)");
                $stmt->bindParam(':id', $inputId);
                $stmt->bindParam(':captcha', $captcha);
                $stmt->execute();

                // 跳转到下一个网页
                header("Location: access_token.php");
                exit;
            }

            // 在网页上显示验证码图片供访问者填写
            echo '<img src="' . $imageData . '" alt="验证码" class="img-fluid" />';
            echo '<form method="POST" action="">';
            echo '请输入验证码：<input type="text" name="captcha" class="form-control" /><br />';
            echo '<input type="hidden" name="id" value="' . $id . '" />';
            echo '<input type="submit" value="提交" class="btn btn-primary" />';
            echo '</form>';
        }
        ?>
    </div>
    <script src="/res/bootstrap.min.js"></script>
</body>
</html>
