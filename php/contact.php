<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'autoload.php';
$mail = new PHPMailer(true);

try {
  //settings
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure= 'tls';
  $mail->Port = 587;
  $mail->Username = 'morgrack@gmail.com';
  $mail->Password = 'password';
  //Sender &amp; Recipient
  $mail->setFrom($_POST['email'], $_POST['name']);
  $mail->addAddress('morgrack@gmail.com');
  //Content
  $mail->isHTML(false);
  $mail->CharSet = 'UTF-8';
  $mail->Encoding = 'base64';
  $mail->Subject = $_POST['subject'] . ' (' . $_POST['email'] . ')';
  $body = str_replace('\n', '\r\n', $_POST['message']); //not sure why this won't produce new lines, need to fix
  $mail->Body = "{$body}";
  $mail->AltBody = "{$body}";
  if($mail->send()){
    echo 'OK';
  }else{
    echo 'Message could not be sent.';
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

exit
?>