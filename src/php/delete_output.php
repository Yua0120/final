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
        $sql = $pdo->prepare('delete from Diary where diary_id=?');
        $success = $sql->execute([$_GET['id']]);
        if ($success) {
            echo '<meta http-equiv="refresh" content="0;url=index.php?flag=comit">';
            exit;
        } else {
            echo '<meta http-equiv="refresh" content="0;url=edit.php?flag=fail">';
            exit;
        }
    ?>