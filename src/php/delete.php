<?php
    session_start();
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="edstyle.css">
		<title>削除画面</title>
	</head>
	<body>
        <table>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $pdo = new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from Diary where user_id = ?');
    $sql->execute([$_SESSION['User']['id']]);
    foreach($sql as $row){
        echo '<tr>';
        echo '<td id="title">', $row['name'], '</td>';
        echo '<td id="flo">', $row['price'], '</td>';
        echo '<td id="flo">', $row['category'], '</td>';
        echo '<td id="str">', $row['story'], '</td>';
        echo '<td class="del">';
        echo '<a href="deleteend.php?id=', $row['id'], '">削除</a>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }

?>
    </table>
    <div id="edit">
        <a href="productAll.php">商品一覧画面へ</a>
    </div>
    </body>
</html>
