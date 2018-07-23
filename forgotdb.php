<?php
    include 'connection.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    function error($error){
        header($error);
    }    
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        if (empty($email)) {
            error("Location: forgot.php?forgot=empty");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                error("Location: forgot.php?forgot=invalidemail");
                exit();
            } else {
                $select = "SELECT * FROM users where email='$email'";
                $result = mysqli_query($conn,$select);

                if (mysqli_num_rows($result) <= 0) {
                    error("Location: forgot.php?forgot=emaildontexits");
                    exit();
                } else {
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $user = $row['username'];
                
                $kira = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890*_#@';
                $kira = str_shuffle($kira);
                $kira = substr($kira, 0 ,10);
                
                $hash = PASSWORD_HASH("$kira", PASSWORD_DEFAULT);
                $update = "UPDATE users SET password='$hash' where id='$id'";
                mysqli_query($conn,$update);
                
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
                $mail->Subject = 'Reset Password';
                $mail->Body    = "
                Hi "." ".$user.",<br>
                This is your new password: ". " ".$kira."<br><br>
                you can now login and then change your password to your desired password
                ";

                if(!$mail->send()){
                    error("Location: forgot.php?forgot=emailsenderr");
                } else {
                    error("Location: login.php?reset=success");
                }
            }
            }
        }
    } else {
        Header("Location: forgot.php?forgot=error");
        exit();
    }