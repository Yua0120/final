<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>編集内容入力</title>
	</head>
	<body>
    <?php
        require 'connect.php';
        if(isset($_SESSION['User'])){
            $emo = [['aacf53','穏やか'],
                    ['e9546b','喜び'],
                    ['f08300','楽しみ'],
                    ['f2797b','ときめき'],
                    ['19448e','悲しみ'],
                    ['c9171e','怒り'],
                    ['9ea1a3','虚無'],
                    ['4d4398','憂鬱']
                ];
            $pdo = new PDO($connect,USER,PASS);
            $sql=$pdo->prepare('select * from Diary where diary_id = ?');
            $sql->execute([$_GET['id']]);
            foreach($sql as $row){
                echo '<div class="diary">';
                echo '<form action="edit_output.php" method="post">';
                echo '<input type="hidden" name="id" value="',$row['diary_id'],'">';
                echo '<input type="text" name="title" id="title" placeholder="',$row['diary_title'],'">';
                echo '<textarea name="body_text" id="body_text" cols="30" rows="10" placeholder="',$row['diary_text'],'"></textarea>';
                echo '<div class="emotion">今日の気分';
                echo '<select name="emotion" id="emotion"><option value="">';
                for($i = 0; $i < 8; $i++){
                    echo '<option value=',$emo[$i][0],'>',$emo[$i][1],'</option>';
                }
                echo '</select>';
                echo '</div>';
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