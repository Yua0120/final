<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.php">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <a href="logout.php">ログアウト</a>
        <a href="write.php">日記を書く</a>
    </div>
    <a href="#" id="pagetop">▲</a>
    <?php
        include 'show.php';
    ?>
</body>
</html>