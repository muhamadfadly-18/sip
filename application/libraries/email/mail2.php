<?php
include "classes/class.phpmailer.php";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPSecure = 'tls'; 
$mail->Host = "smtp.gmail.com"; //host masing2 provider email
$mail->SMTPDebug = 1;
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "smartsystem@asinusa.com"; //user email
$mail->Password = "P@systemsmart2021"; //password email 

$mail->IsHTML(true);
$mail->SetFrom("smartsystem@asinusa.com","Nama pengirim"); //set email pengirim
$mail->Subject = "Testing"; //subyek email
$mail->AddAddress("mifkent@gmail.com","nama email tujuan");  //tujuan email
$mail->MsgHTML("Testing...");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>

 
