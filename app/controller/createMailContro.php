<?php

include'../phpmailer/includes/PHPMailer.php';
include'../phpmailer/includes/SMTP.php';
include'../phpmailer/includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeception;
 class mailController{
     public function createMail($userEmail, $reset_url){
        $mail = new PHPMailer();

        $mail->isSMTP();

        $mail->Host = "smtp.gmail.com";

        $mail->SMTPAuth = "true";

        $mail->SMTPSecure = "tls";

        $mail->Port = "587";

        $mail->Username = "no.reply.ics449@gmail.com";

        $mail->Password = "spacerace123";

        $mail->Subject = "Reset Password link";

        $mail->setFrom("no.reply.ics449@gmail.com");

        $mail->Body = "This email was sent because there was a request to reset the account associated with this email, please ignore this if you did not request for this
        otherwise here is your link:" . $reset_url;

        $mail->addAddress($userEmail);

        if ( $mail->Send() ) {
            echo "sent";
        } else {
            echo "failed";
        }

        $mail->smtpClose();
        
     }
 }


?>