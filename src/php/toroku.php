<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>日記型感情管理しすてむ</h1>
    <h2>新規登録</h2>
    <form action="toroku_output.php" method="post">
        <p>メールアドレス<input type="email" name="email" class="email"></p>
        <p>パスワード<input type="password" name="password" class="password"></p>
        <br>
        <button type="submit" class="signin">登録</button>
    </form>
    <a href="login.php" class="linkpage">既にアカウントをお持ちの方はこちら</a>
    <div class="toroku_miss">
    <?php
    // $_GET['flag']がセットされているか確認
    if (isset($_GET['flag']) && $_GET['flag'] == 'known') {
        echo '<script>alert("そのメールアドレスは既に登録されています。")</script>';
    }
    ?>
</div>
</body>
</html>