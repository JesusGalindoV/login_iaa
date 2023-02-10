<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    require '../main_app/conexion.php';
    require 'verification_code_generator.php';

    require('../vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();

    $mail_host = $_ENV['MAIL_HOST'];
    $mail_username = $_ENV['MAIL_USERNAME'];
    $mail_password = $_ENV['MAIL_PASSWORD'];
    $mail_port = $_ENV['MAIL_PORT'];

    session_start();

    $mail = new PHPMailer(true);

    $verification_code = code();

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $mail_host;                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $mail_username;
        $mail->Password   = $mail_password; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption                   
        $mail->Port       = $mail_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->CharSet = 'UTF-8';

        $mail->setFrom($mail_username);
        $mail->addAddress($_SESSION["correo"]);

        $mail->isHTML(true);
        $mail->Subject = 'prueba de correo';
        $mensaje = "Comprueba tu identidad, tú codigo de verificacion es: {$verification_code}";
        $mail->Body    = $mensaje;
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b> {$verification_code}';
        $mail->send();

        header("Location: ../index.php");

        // echo 'correo enviado';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }