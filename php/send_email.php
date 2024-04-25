<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'johndexter.pore@ubix.com.ph'; // SMTP username
    $mail->Password = 'efsweledowxsbyng'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('johndexter.pore@ubix.com.ph', 'MIS - Asset Management');
    $mail->addAddress($email, $name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Asset Accountability Reciept';
    $mail->Body = $message;

    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>