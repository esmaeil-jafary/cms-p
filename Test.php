<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'inc/classes/MailConfig_cls.php';

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
    $mail->addAddress('jafaryesmaeil340@gmail.com', 'jafary');     // Add a recipient
    $mail->Subject="TestEmail";
    $mail->Body="Hello test email from haib.ir";
    if ($mail->send()){
    echo "sending";
    }else{
        echo "email faild";
    }

} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} ?>
