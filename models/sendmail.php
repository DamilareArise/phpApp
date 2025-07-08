<?php
    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();


    class MailConfig{
        private $mail;
        function __construct(){
            $this->mail = new PHPMailer(true);
            // server settings
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth   = true; 
            $this->mail->Username   = $_ENV['EMAIL_USER'];
            $this->mail->Password   = $_ENV['EMAIL_PASS']; 
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port       = 465;

            $this->mail->setFrom($_ENV['EMAIL_USER'], 'PHP Blog');
            $this->mail->isHTML(true); 
        }

        public function sendmail($subject, $body, $to_email){
            try{
                $this->mail->addAddress($to_email);
                $this->mail->Subject = $subject;
                $this->mail->Body = $body;

                $this->mail->send();
                return true;
            }
            catch(Exception $e){
                return false;
            }
        }
    }

    $obj = new MailConfig();
    
    $subject='Welcome to PHP Blog';
    $body='This is the HTML message body <b>in bold!</b>';
    $to_email='arisedamilarevictor@gmail.com';
    
    $obj->sendmail($subject, $body, $to_email);
    





    // $mail = new PHPMailer(true);
    // try{
    //     // Server settings
    //     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth   = true; 
    //     $mail->Username   = $_ENV['EMAIL_USER'];
    //     $mail->Password   = $_ENV['EMAIL_PASS']; 
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //     $mail->Port       = 465; 

    //     // Sender and Recipient
    //     $mail->setFrom('arisedamilare5@gmail.com', 'PHP Blog');
    //     $mail->addAddress('arisedamilarevictor@gmail.com');

    //     // content
    //     $mail->isHTML(true);                                 
    //     $mail->Subject = 'Welcome to PHP Blog';
    //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    //     // send mail
    //     $mail->send();
    //     echo 'Email sent';

    // }
    // catch(Exception $e){
    //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    // }

?>