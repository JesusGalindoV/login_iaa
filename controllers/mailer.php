<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

$verification_code = rand(999,10000);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'CORREO_HERE';
    $mail->Password   = 'PASSWORD_HERE'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption                   
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->CharSet = 'UTF-8';

    $mail->setFrom('CORREO_HERE');
    $mail->addAddress('CORREO_PARA_QUIEN_HERE');

    $mail->isHTML(true);
    $mail->Subject = 'prueba de correo';
    $mensaje = "Comprueba tu identidad, tú codigo de verificacion es: {$verification_code}";
    $mail->Body    = $mensaje;
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b> {$verification_code}';
    $mail->send();

    echo 'correo enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


