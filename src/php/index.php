<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
    <div class="sucsess">
    <?php
    // $_GET['flag']がセットされているか確認
    if (isset($_GET['flag']) && $_GET['flag'] == 'sucsess') {
        echo '<script>alert("日記の更新が完了しました。")</script>';
    }else  if (isset($_GET['flag']) && $_GET['flag'] == 'comit') {
        echo '<script>alert("日記の削除が完了しました。")</script>';
    }
    ?>
</div>
</body>
</html>