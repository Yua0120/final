<?php
    if(isset($_SESSION['User'])){
        unset($_SESSION['User']);
        header('Location: login.php?flag=reset');
    }else{
        header('Location: login.php?flag=unset');
    }
?>