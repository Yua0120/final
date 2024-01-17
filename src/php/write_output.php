<?php
    session_start();
    if(!isset($_SESSION['User'])){
        header("Location: ./write.php?flag=none");
        exit;
    }else{
        require 'connect.php';
        $pdo = new PDO($connect, USER, PASS);
        $date=date("Y-m-d");
        $sql = $pdo->prepare('insert into Diary(user_id,diary_title,diary_text,write_date,emotion_code) values (?,?,?,?,?,?)');
        $success = $sql->execute([$_SESSION['User']['id'], $_POST['title'], $_POST['body_text'], $date, $_POST['emotion']]);
        if ($success) {
            header("Location: ./Top.php");
            exit;
        } else {
            header("Location: ./C_post-input.php?flag=fail");
            exit;
        }
    }

?>