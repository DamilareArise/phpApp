<?php
    include '../models/user.php';
    include '../models/sendmail.php';
    

    $email_template = file_get_contents('../mails/onboarding.html');
    $mail = new MailConfig();
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


        $result =  $user->signup($fullname, $email, $password);
        $message = $result['message'];

        if ($result['status']){
            $body = str_replace(["[User's First Name]"], [$fullname], $email_template);
            $subject = 'Welcome to PHP Blog';
            $mail->sendmail($subject, $body, $email);
            header("location: ../views/login.php?message=$message");
        }else{
            header("location: ../views/signup.php?message=$message");
        }
        
    }
// ALTER TABLE user_table CHANGE email email VARCHAR(255) UNIQUE;

?>