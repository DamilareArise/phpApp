<?php
    session_start();

    $is_admin = $_SESSION['user']['is_admin'];

    if(!$is_admin){
        session_destroy();
        header("location: ../views/login.php?message=You don't have admin permission");
        exit;
    }else{
        return;
    }
?>