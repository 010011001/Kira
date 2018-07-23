<?php
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function error($error){
    header($error);
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    if (empty($email)) {
        error("Location: resend.php?resend=empty");
        exit();
    } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error("Location: resend.php?resend=error2");
        exit();
    } else {
        $select = "SELECT * FROM users where email='$email'";
        $result = mysqli_query($conn,$select);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $kira = $row['token'];

            require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                             
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'kirigayakirito101993@gmail.com';                
            $mail->Password = 'Kira01001100';                          
            $mail->SMTPSecure = 'TLS';                         
            $mail->Port = 587;                                    

            $mail->setFrom('reymark@fallorina.cf','Admin');
            $mail->addAddress($email);     

            $mail->isHTML(true);                                  
            $mail->Subject = 'account verification';
            $mail->Body    = "
            Thank you for registering, your are now one step closer to activate your account<br><br>
            please click the link to activate your account<br>
        
            <a href='http://fallorina.cf/verify.php?email=".$email."&token=".$kira."'>Click Here</a>
            ";

            if($mail->send()){
                error("Location: login.php?resend=success");
                exit();
            } else {
                error("Location: resend.php?resend=error3");
                exit();
            }

        } else {
            error("Location: resend.php?resend=emaildontexit");
            exit();
        }
    }
}
} else {
    error("Location: resend.php?=error1");
    exit();
}

?>