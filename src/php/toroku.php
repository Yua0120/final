<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>新規登録</h1>
    <form action="toroku_output.php" method="post">
        <p>メールアドレス</p>
        <input type="email" name="email" id="email">
        <p>パスワード</p>
        <input type="password" name="password" id="password">
        <button type="submit">登録</button>
    </form>
    <a href="login.php">既にアカウントをお持ちの方はこちら</a>
</body>
<div class="toroku_miss">
    <?php
    // $_GET['flag']がセットされているか確認
    if (isset($_GET['flag']) && $_GET['flag'] == 'known') {
        echo '<p class="error">そのメールアドレスは既に登録されています</p>';
        echo '<a href="login.php">ログインする</a>';
    }
    ?>
</div>
</html>