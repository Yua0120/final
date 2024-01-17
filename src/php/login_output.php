<?php
session_start();
require 'connect.php';
try{
    if(isset($_POST['email']) && isset($_POST['password'])){
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = $pdo->prepare('select user_id from Users where user_id = ? AND pass = ?');
        $sql->execute([$_POST['email'],$hashedPassword]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if(isset($result['user_id'])){
            header('Location: index.php');
            $_SESSION['User'] = [
                'id' => $result['user_id']
            ];
        }else{
            header('Location: login.php');
            echo '<script>alert("アカウントが存在しません")</script>';
        }

        
    }
}catch (PDOException $e){
    echo '<script>alert("データベースエラー")</script>' . htmlspecialchars($e->getMessage());
    echo '<a href="login.php">ログイン画面に戻る</a><br>';
}
?>