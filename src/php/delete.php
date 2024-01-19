<?php
    session_start();
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
        
		<title>削除画面</title>
	</head>
	<body>
    <div id="edit">
        <a href="index.php">トップページへ</a>
    </div>
    <?php
        $pdo = new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from Diary where diary_id = ?');
        $sql->execute([$_GET['id']]);
        foreach($sql as $row){
            echo '<div class="delarea" style="background-color: ' . $_GET['code'] . ';">';
            echo '<div class="titles">';
            echo '<h3 id="del-title" style="color: '. $_GET['rgb'] .';">', $row['diary_title'], '</h3>';
            echo '<p id="del-date">', $row['write_date'], '</p>';
            echo '</div>';
            echo '<p id="del-text">', $row['diary_text'], '</p>';
            echo '<p style="color: '. $_GET['rgb'] .';">この日の気分:', $row['emotion_name'], '</p>';
            echo '<a href="delete_output.php?id=', $row['diary_id'], '" class="del-btn">削除</a>';
            echo '</div>';
        }

    ?>
    </body>
</html>
