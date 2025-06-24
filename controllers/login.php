<?php
    include '../models/user.php';
    session_start();

    $user = new User();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if($email == '' || $password == ''){
            header("location: ../views/login.php?message=Please fill in all fields");
            
        }else{
            $result = $user->login($email, $password);
            $message = $result['message'];
            if($result['status']){
                $_SESSION['user'] = $result['data'];
                header("location: ../views/index.php");
            }else{
                header("location: ../views/login.php?message=$message");
            }
        }

    }