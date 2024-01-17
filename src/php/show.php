<?php
    require 'db-connect.php';
    if(!isset($_SESSION['User'])){
        $pdo = new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from Diary where user_id = ?');
        $sql->execute([$_SESSION['User']['id']]);
        foreach($sql as $row){
            $color_hex = $row['emotion_code'];
            $color_red = hexdec(substr($color_hex,0,2));
            $color_green = hexdec(substr($color_hex,2,2));
            $color_blue = hexdec(substr($color_hex,4,2));
            $color_rgba = "rgba(". $color_red. ",". $color_green. "," . $color_blue. ",0.2)";
            echo '<div class="diary">';
            echo '<p class="date">',$row['write_date'],'</p>';
            echo '<p class="title"><font color="',$row['emotion_code'],'">',$row['write_title'],'</font></p>';
            echo '<p class="text">',$row['write_text'],'</p>';
            echo '</div>';
        }
    }
?>