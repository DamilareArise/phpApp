<?php 
    session_start();

    if(!$_SESSION['user']){
        header("location: ../views/login.php");
        exit;
    }else{
        return;
    }

?>