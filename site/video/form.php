<?php
use PHPMailer\PHPMailer\PHPMailer;

$firstName = $_POST ['firstName'];
$lastName = $_POST ['lastName'];
$email = $_POST ['email'];
$tel = $_POST ['tel'];
$message = $_POST ['message'];

require_once "Mailer/PHPMailer.php";
require_once "Mailer/SMTP.php";
require_once "Mailer/Exception.php";

$mail = new PHPMailer();

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.yandex.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'Yamshichov10d@yandex.ru';
    $mail->Password = 'hokogfhjvv';
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom('Yamshichov10d@yandex.ru','Moto');
    $mail->addAddress('anastasiia.rylova@bk.ru','Joe User');

    $mail->isHTML(true);
    $mail->Subject = 'Письмо с тестового сайта';
    $mail->Body = 'Имя: ' .$firstName . '<br>Фамилия: ' .$lastName .'<br>Маил: ' . $email .'<br>Телефон: ' . $tel . '<br>Сообщение: ' . $message;
    $mail->AltBody = 'Письмо без html';

    $mail->send();
    header('location: ../сайт')
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>