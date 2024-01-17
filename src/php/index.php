<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.php">
    <title>Document</title>
</head>
<body>
    <?php session_start();?>
    <div class="menu">
        <a href="logout.php">ログアウト</a>
        <a href="write.php">日記を書く</a>
        <a href="write.php">読む・編集</a>
        <a href="delete.php">削除</a>
    </div>
    <a href="#" id="pagetop">▲</a>
    <?php
        include 'show.php';
    ?>
</body>
</html>