<?php
    require 'connect.php';
    if(isset($_SESSION['User'])){
        $pdo = new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from Diary where user_id = ?');
        $sql->execute([$_SESSION['User']['id']]);
        foreach($sql as $row){
            $color_hex = $row['emotion_code'];
            $color_red = hexdec(substr($color_hex,1,2));
            $color_green = hexdec(substr($color_hex,3,2));
            $color_blue = hexdec(substr($color_hex,5,2));
            $color_rgba = "rgba(". $color_red. ",". $color_green. "," . $color_blue. ",0.2)";
            echo '<div class="diary">';
            echo '<p class="date">',$row['write_date'],'</p>';
            echo '<h2 class="title">',$row['diary_title'],'</h2>';
            echo '<a href="edit.php?id=',$row['diary_id'],'">中身を読む・編集する</a><br>';
            echo '<a href="delete.phpid=',$row['diary_id'],'">削除</a>';
            echo '</div>';
        }
    }
?>