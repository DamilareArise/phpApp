<?php
    include '../models/user.php';

    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $new_password = htmlspecialchars($_POST['new_password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $token = htmlspecialchars($_POST['token']);

        
        
        if($new_password == '' || $confirm_password == '' || $token == ''){
            header("location: /phpApp/views/reset_password.php?message=Please fill in all fields");
            exit;
        }

        $result = $user->resetPassword($new_password, $token);
        $message = $result['message'];
        if($result['status']){
            header("location: /phpApp/views/login.php?message=$message");
            exit;
        }else{
            header("location: /phpApp/views/reset_password.php?message=$message");
            exit;
        }

    }
?>