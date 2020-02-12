<?php

session_start();


require 'phpmailer/PHPMailerAutoload.php';



if (isset($_POST['name']) && isset($_POST['email'])){
    $mail = new PHPMailer;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['message'];
    $subject = $_POST['subject'];
    
    
    //Server settings      
    $mail->isSMTP();    
    $mail->Host       = 'mail.familiarit.com';    
    $mail->SMTPAuth   = true;     
    $mail->Username   = 'support@familiarit.com';    
    $mail->Password   = 'i70Ud5KW6W;1';
    $mail->SMTPSecure = 'ssl';      
    $mail->Port       = 465;     

    //Recipients
    $mail->isHTML(true);
    $mail->setFrom('support@familiarit.com');
    $mail->addAddress('familiarit.star@gmail.com');

    // Content
    $mail->isHTML(true);     
    $mail->Subject = $subject;
    $mail->Body    =  "Name: $name <br> Email: $email <br> Message: $body";
    $mail->send();
    if ($mail->send()) {
        $_SESSION['mail_success']="your mail is successfully sent";
        header('location:contact.php#contact-form');
    } else {
        $_SESSION['mail_fail']="Something is Wrong! Please try later";
        header('location:contact.php#contact-form');
    }
}else{
    echo 'error';
}