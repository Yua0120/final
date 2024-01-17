<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
	</head>
	<body>
<?php
    session_start();
    require 'db-connect.php';
    $sql = $pdo->prepare('update Diary set diary_title=?, diary_text=?, emotion_code=?');
    $success = $sql->execute([$_POST['title'], $_POST['body_text'],
     $_POST['emotion'],$_SESSION['User']['id']]);
    if ($success) {
        header("Location: ./index.php");
        exit;
    } else {
        header("Location: ./edit.php?flag=fail");
        exit;
    }
?>