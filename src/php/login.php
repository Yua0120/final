<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ログイン</title>
</head>
<body>
    <div class="login">
        <h1>日記型感情管理しすてむ</h1>
        <h2>ログイン</h2>
        <form action="login_output.php" method="post">
            <p>メールアドレス<input type="email" name="email" class="email"></p>
            <p>パスワード<input type="password" name="password" class="password"></p>
            <br>
            <button type="submit" class="signin">ログイン</button>
        </form>
        <a href="toroku.php" class="linkpage">新規登録はこちら</a>
    </div>
    <div class="login_miss">
        <?php
            // $_GET['flag']がセットされているか確認
            if (isset($_GET['flag']) && $_GET['flag'] == 'unknown') {
                echo '<script>alert("アカウントが存在しません")</script>';
            }else if(isset($_GET['flag']) && $_GET['flag'] == 'reset'){
                echo '<script>alert("ログアウトしました。")</script>';
            }else if(isset($_GET['flag']) && $_GET['flag'] == 'unset'){
                echo '<script>alert("すでにログアウトしています。")</script>';
            }
        ?>
    </div>
</body>
</html>