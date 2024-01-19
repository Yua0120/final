<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
		<title>編集内容入力</title>
	</head>
	<body>
        <a href="index.php">トップページへ</a>
    <?php
        require 'connect.php';
        if(isset($_SESSION['User'])){
            $emo = [['#aacf53','穏やか'],
                    ['#e9546b','喜び'],
                    ['#f08300','楽しみ'],
                    ['#f2797b','ときめき'],
                    ['#19448e','悲しみ'],
                    ['#c9171e','怒り'],
                    ['#9ea1a3','虚無'],
                    ['#4d4398','憂鬱']
                ];
            $pdo = new PDO($connect,USER,PASS);
            $sql=$pdo->prepare('select * from Diary where diary_id = ?');
            $sql->execute([$_GET['id']]);
            foreach($sql as $row){
                echo '<div class="diary-one" style="background-color: ' . $_GET['code'] . ';">';
                echo '<form action="edit_output.php" method="post"  class="write-area">';
                echo '<input type="text" name="id" value="',$row['diary_id'],'" hidden>';
                echo '<h3>タイトル</h3>';
                echo '<input type="text" name="title" id="edi-title" value="',$row['diary_title'],'">';
                echo '<p>今日あったこと</p>';
                echo '<textarea name="body_text" id="edi-body_text" cols="10" rows="30">',$row['diary_text'],'</textarea>';
                echo '<div class="emotion">今日の気分';
                echo '<select name="emotion" id="emotion"><option value="',$row['emotion_code'],'">',$row['emotion_name'],'</option>';
                for($i = 0; $i < 8; $i++){
                    echo '<option value=',$emo[$i][0].$emo[$i][1],'>',$emo[$i][1],'</option>';
                }
                echo '</select>';
                echo '</div>';
                echo '<input type="submit" value="編集完了" class="written">';
                echo '</form>';
                echo '</div>';
            }
        }
    ?>
    <div class="post-fail">
        <?php
        // $_GET['flag']がセットされているか確認
        if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
            echo '<script>alert("日記の更新に失敗しました。もう一度入力してください。")</script>';
        }else if (isset($_GET['flag']) && $_GET['flag'] == 'reg') {
            echo '<script>alert("新規アカウント登録が完了しました。")</script>';
        }
        ?>
    </div>
    </body>
</html>