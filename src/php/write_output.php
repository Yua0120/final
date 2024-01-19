<?php
    session_start();

    if (!isset($_SESSION['User'])) {
        header("Location: ./write.php?flag=none");
        exit;
    } else {
        require 'connect.php';
        $pdo = new PDO($connect, USER, PASS);
        $date = date("Y-m-d");

        // エラー処理を強化
        try {
            $sql = $pdo->prepare('select emotion_name from Emotion where emotion_code=:emotion');
            $sql->bindParam(':emotion', $_POST['emotion']);
            $sql->execute();
            $emotion_name = $sql->fetchColumn();
        } catch (PDOException $e) {
            // エラーが発生した場合の処理
            header("Location: ./write.php?flag=fail");
            exit;
        }

        // SQLインジェクションへの対策
        $sql = $pdo->prepare('insert into Diary(user_id,diary_title,diary_text,write_date,emotion_code,emotion_name) values (:user_id, :title, :body_text, :date, :emotion, :emotion_name)');
        $sql->bindParam(':user_id', $_SESSION['User']['id']);
        $sql->bindParam(':title', $_POST['title']);
        $sql->bindParam(':body_text', $_POST['body_text']);
        $sql->bindParam(':date', $date);
        $sql->bindParam(':emotion', $_POST['emotion']);
        $sql->bindParam(':emotion_name', $emotion_name);

        try {
            $success = $sql->execute();
            if ($success) {
                header("Location: index.php");
                exit;
            } else {
                header("Location: ./write.php?flag=fail");
                exit;
            }
        } catch (PDOException $e) {
            // エラーが発生した場合の処理
            header("Location: ./write.php?flag=fail");
            exit;
        }
    }
?>
