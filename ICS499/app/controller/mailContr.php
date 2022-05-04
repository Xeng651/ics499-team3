<?php

include '../../PHPMailer/PHPMailer.php';
include '../../PHPMailer/SMTP.php';
include '../../PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

class MailContr {

    public function createMail($userEmail, $passCode) {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->IsHTML(true);

        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls"; 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->Username = "no.reply.ics449@gmail.com";
        $mail->Password = "Knight321fight";

        $mail->setFrom("no.reply.ics449@gmail.com");
        $mail->Subject = "CSSX Account Notice: Password Verification Code";
        $mail->Body = "
        This email was sent because you have requested a verification code to reset your password, 
        please ignore this if you did not request for this
        otherwise here is your code. <br><br>
        Verification Code: <strong>" . $passCode . "</strong> <br><br>
        CSSX will never ask you for your password. If you receive any request for your password, please delete it.";
        
        $mail->addAddress($userEmail);

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
        
        $mail->smtpClose();
    }

    public function createMessage($userEmail, $leaveStatus, $startDate, $endDate) {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->IsHTML(true);

        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls"; 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->Username = "no.reply.ics449@gmail.com";
        $mail->Password = "Knight321fight";

        $mail->setFrom("no.reply.ics449@gmail.com");
        $mail->Subject = "CSSX Leave Request Status";
        $mail->Body = "
        This email was sent because you had a leave request on file. Check <strong>'Leave Status'</strong> below to see if you have been denied or approved!  
        <br><br>
        On Leave Date: <strong>" . $startDate . " - " . $endDate . "</strong>
        <br>
        Leave Status: <strong>" . $leaveStatus . "</strong> 
        <br><br>
        CSSX will never ask you for your password. If you receive any request for your password, please delete it.";
        
        $mail->addAddress($userEmail);

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent to employee's email!";
        }
        
        $mail->smtpClose();
    }
}

?>