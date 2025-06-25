<?php
    include '../models/user.php';
    session_start();

    $id = $_SESSION['user']['id'];
    
    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $old_password = htmlspecialchars($_POST['old_password']);
        $new_password = htmlspecialchars($_POST['new_password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        if($old_password == '' || $new_password == '' || $confirm_password == '' ){
            header("location: ../views/change_password.php?message=Please fill in all fields");
            exit;
        }

        if($new_password != $confirm_password){
            header("location: ../views/change_password.php?message=Passwords do not match");
            exit;
        }

        $result = $user->change_password($old_password, $new_password, $id);
        $message = $result['message'];
        if($result['status']){
            header("location: ../views/login.php?message=$message");
        }else{
            header("location: ../views/change_password.php?message=$message");  
        }
    }