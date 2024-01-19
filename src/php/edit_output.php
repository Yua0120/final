<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
	</head>
	<body>
    <?php
        require 'connect.php';
        $pdo = new PDO($connect,USER,PASS);
        $sql = $pdo->prepare('select emotion_name from Emotion where emotion_code=?');
        $emotion_name = $sql->execute([$_POST['emotion']]);
        $sql = $pdo->prepare('update Diary set diary_title=?, diary_text=?, emotion_code=?, emotion_name=? where diary_id=?');
        $success = $sql->execute([$_POST['title'], $_POST['body_text'],$_POST['emotion'], $emotion_name,$_POST['id']]);
        if ($success) {
            echo '<meta http-equiv="refresh" content="0;url=index.php?flag=sucsess">';
            exit;
        } else {
            echo '<meta http-equiv="refresh" content="0;url=edit.php?flag=fail">';
            exit;
        }
    ?>