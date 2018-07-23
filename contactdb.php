<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mss = "";

if(isset($_POST['submit'])){
    $to = $_POST['sendto'];
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
   


require 'vendor/autoload.php';

$mail = new PHPMailer(true);                             
    $mail->isSMTP();                                     
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'kirigayakirito101993@gmail.com';                
    $mail->Password = 'Kira01001100';                          
    $mail->SMTPSecure = 'TLS';                         
    $mail->Port = 587;                                    

    $mail->setFrom($from);
    $mail->addAddress($to);     

    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    if($mail->send()){
        header("Location: contact.php");
        $mss = "Email has been sent";
    } else {
        $mss = "Something is wrong email didnt sent, please try again";
    }
}


?>