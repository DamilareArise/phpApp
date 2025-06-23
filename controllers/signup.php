<?php
    include '../models/user.php';

    $user = new User();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        if($fullname == '' || $email == '' || $password == '' || $confirm_password == ''){
            header("location: ../views/signup.php?message=Please fill in all fields");
            exit();
        }

        if($password != $confirm_password){
            header("location: ../views/signup.php?message=Password does not match");
            exit();
        }


        if($user->signup($fullname, $email, $password) == true){
            header("location: ../views/login.php?message=Signup successfull");
            exit();
        }
        else{
            header("location: ../views/signup.php?message=Failed to signup");
        }
        
        
    }


?>