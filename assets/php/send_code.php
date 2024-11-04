<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance of PHPMailer
$mail = new PHPMailer(true);

function sendCode($email, $subject, $code) {
    global $mail;
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                //Disable debug output for production
        $mail->isSMTP();                                     //Send using SMTP
        $mail->SMTPAuth   = true;                            //Enable SMTP authentication
        $mail->Host       = 'smtp.mailtrap.io';  
        $mail->Username   = '02815261349c65';   
        $mail->Password   = '406f880eb61e4f';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  //Enable TLS encryption
        $mail->Port       = 587;                             //TCP port to connect to, use 465 for SSL

        //Recipients
        $mail->setFrom('contact@neel.com', 'neel');  //Sender's email address
        $mail->addAddress($email);                                //Recipient's email address

        //Content
        $mail->isHTML(true);                                      //Set email format to HTML
        $mail->Subject = $subject;                                //Email subject
        $mail->Body    = 'Your Verification code is: <b>' . $code . '</b>'; //Email body

        //Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        //Log error for debugging and show a user-friendly message
        error_log("Mail could not be sent to {$email}. Error: {$mail->ErrorInfo}");
        echo "An error occurred while sending the email. Please try again later.";
    }
}
