<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="./login_output.php" method="post">
        <p>メールアドレス</p>
        <input type="email" name="email" id="email">
        <p>パスワード</p>
        <input type="password" name="password" id="password">
        <button type="submit">ログイン</button>
    </form>
    <a href="toroku.php">新規登録はこちら</a>
</body>
</html>