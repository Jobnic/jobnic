<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer;

include("../pack/config.php");

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.zoho.com";
$mail->Port = 587;
$mail->Username = $mailaddr;
$mail->Password = $mailpass;
$mail->SMTPSecure = 'tsl';

// Sender info
$mail->setFrom($mailaddr, 'Jobnic');

// Add a recipient
$mail->addAddress('amirhosseinmohammadi1380@yahoo.com');
$mail->isHTML(true);

$mail->Subject = 'Do not replay';

// Mail body content
$bodyContent = '<h1>Hi dear Amirhossein,</h1>';
$bodyContent .= '<p>You Forgot your account password, use this password to login and <b>change your password</b>.</p>';
$bodyContent .= '<br><b>0481244859</b>';
$mail->Body = $bodyContent;

// Send email
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}