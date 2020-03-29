<!--برای ارسال ایمیل می باشد-->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class Email
{
    function SendEmile($Subject, $Text, $Receiver)
    {
        $mail = new PHPMailer(true);
        try {

//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = MailConfig::Host;                   // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = MailConfig::Username;                     // SMTP username
            $mail->Password = MailConfig::Password;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = MailConfig::Port;

            $mail->setFrom('email@haib.ir', 'Mailer');
            $mail->addAddress($Receiver);     // Add a recipient
            $mail->Subject = $Subject;
            $mail->Body = $Text;
            return $mail->send();


        } catch (Exception $e) {
//        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}