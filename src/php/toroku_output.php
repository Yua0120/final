<?php
    session_start();
    require 'connect.php';
    try{
        if(isset($_POST['email']) && isset($_POST['password'])){
            $pdo = new PDO($connect, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = $pdo->prepare('select user_id from Users where user_id = ? AND password = ?');
            $sql->execute([$_POST['email'],$hashedPassword]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if(isset($result['user_id'])){
                header('Location: toroku.php?flag=known');
            }else{
                $sql = $pdo->prepare('insert into Users (user_id,password) values (?,?)');
                $sql->execute([$_POST['email'],$hashedPassword]);
                //ユーザーIDの取得
                $selectSql = $pdo->prepare('SELECT user_id FROM Users WHERE user_id = ? AND password = ?');
                $selectSql->execute([$_POST['email'], $hashedPassword]);
                $result = $selectSql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['User'] = [
                    'id' => $result['user_id']
                ];
                // 登録が成功した場合、Top.php にリダイレクト
                header('Location: index.php?flag=reg');
            }
        }else{
            var_dump('デバッグ中10');
        }
    }catch (PDOException $e){
        echo '<script>alert("データベースエラー")</script>' . htmlspecialchars($e->getMessage());
        echo '<a href="toroku.php">新規登録画面に戻る</a><br>';
    }
?>