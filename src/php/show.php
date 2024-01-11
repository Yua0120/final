<?php
    require 'db-connect.php';
    if(!isset($_SESSION['User'])){
        $pdo = new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select write_date,diary_title from Diary where user_id = ?');
        $sql->execute([$_SESSION['User']['id']]);
        foreach($sql as $row){
            echo '<div class="diary">';
            echo '<p class="date">',$row['write_date'],'</p>';
            echo '<p class="title">',$row['write_title'],'</p>';
            echo '</div>';
        }
    }
?>