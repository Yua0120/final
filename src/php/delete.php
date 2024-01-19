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
        <table>
<?php
    $pdo = new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from Diary where diary_id = ?');
    $sql->execute([$_GET['id']]);
    foreach($sql as $row){
        echo '<tr>';
        echo '<h3 id="title">', $row['diary_title'], '</h3>';
        echo '<p>', $row['diary_text'], '</p>';
        echo '<p>', $row['write_date'], '</p>';
        echo '<p>', $row['emotion_name'], '</p>';
        echo '<td class="del">';
        echo '<a href="delete_output.php?id=', $row['diary_id'], '">削除</a>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }

?>
    </table>
    <div id="edit">
        <a href="index.php">トップページへ</a>
    </div>
    </body>
</html>
