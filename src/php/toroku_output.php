<?php
session_start();
require 'connect.php';
try{
    if(isset($_POST['username']) && isset($_POST['password'])){
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = $pdo->prepare('select user_id from Password where pass = ?');
        $sql->execute([$hashedPassword]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if(isset($result['user_id'])){
            header('Location: toroku.php');
            echo '<script>alert("すでにアカウントが存在しています")</script>';

        }else{
            $sql = $pdo->prepare('insert into Password (pass) values (?)');
            $sql->execute([$hashedPassword]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            header('Location: Top.php');
            echo '<script>alert("新規登録が完了しました")</script>';

            $_SESSION['User'] = [
                'id' => $result['user_id']
            ];
            // 登録が成功した場合、Top.php にリダイレクト
            header('Location: index.html');
        }

        
    }
}catch (PDOException $e){
    echo '<script>alert("データベースエラー")</script>' . htmlspecialchars($e->getMessage());
    echo '<a href="toroku.php">新規登録画面に戻る</a><br>';
}
?>