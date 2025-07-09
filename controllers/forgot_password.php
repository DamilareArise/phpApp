<?php
    include '../models/user.php';
    include '../models/sendmail.php';

    $user = new User();
    $mail = new MailConfig();
    
    // $token = bin2hex(random_bytes(50));
    // echo $token;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = htmlspecialchars($_POST['email']);

        if($email == ''){
            header("location: /phpApp/views/forgot_password.php/?message=Email field is requred");
            exit;
        }
        
        if(!$user->getUserbyEmail($email)){
            header("location: /phpApp/views/forgot_password.php/?message=User not found");
            exit;
        }
        $token = bin2hex(random_bytes(50));

        if($user->updateToken($email, $token)){
            $reset_link = "http://localhost/phpApp/views/reset_password.php/?token=$token";
            $subject = 'Password Reset';
            $body = "Kindly follow this link to reset your password $reset_link";
    
            if($mail->sendmail($subject, $body, $email)){
                header("location: /phpApp/views/forgot_password.php/?message=A reset link has been sent to your mail. kindly follow to reset password.");
            }else{
                header("location: /phpApp/views/forgot_password.php/?message=Email not sent retry");
                exit;
            }
        }else{
            header("location: /phpApp/views/forgot_password.php/?message=Sorry an error occurred");
            exit;
        }
    }
?>