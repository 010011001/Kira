<?php 
include_once 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function error($error){
    header($error);
}

if (isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($conn, $_POST['user']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pass']);
	$cpwd = mysqli_real_escape_string($conn, $_POST['cpass']);
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$bday = $_POST['birthday'];
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$date = date('Y-m-d');
	$verify = '0';

	if (empty($user) || empty($pwd) || empty($cpwd) || empty($first) || empty($last) || empty($email) || empty($bday) || empty($gender)) {
		error("Location: signup.php?signup=empty");
		exit();
	} else {
		if (!preg_match("/^[a-zA-Z ]*$/",$first) || !preg_match("/^[a-zA-Z ]*$/",$last)) {
			error("Location: signup.php?signup=firstchar");
			exit();
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				error("Location: signup.php?signup=emailerr");
				exit();
			} else {
				if (strlen($user) < 5) {
					error("Location: signup.php?signup=userlenght");
					exit();
				} else{
					if (strlen($pwd) < 7) {
						error("Location: signup.php?signup=passlenght");
						exit();
					} else {
						if ($pwd != $cpwd) {
							error("Location: signup.php?signup=passnotmatch");
							exit();
						} else {
							$select = "SELECT * FROM users where username = '$user' or email='$email'";
							$result = mysqli_query($conn,$select);
							$resultC = mysqli_num_rows($result);

							if ($resultC > 0) {
								error("location: signup.php?signup=useroremailtaken");
								exit();
							} else {
								$hash = PASSWORD_HASH($cpwd, PASSWORD_DEFAULT);

								$kira = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890*_#@';
								$kira = str_shuffle($kira);
								$kira = substr($kira, 0 ,10);

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

								if(!$mail->send()){
									error("Location: signup.php?signup=emailsenderr");
								} else {
									
								$insert = "INSERT INTO users (username,password,first,last,email,birthday,gender,joined,verify,token) VALUES (?,?,?,?,?,?,?,?,?,?)";
								$stmt = mysqli_stmt_init($conn);

								if (!mysqli_stmt_prepare($stmt,$insert)) {
									error("Location: signup.php?signup=error1");
									exit();
								} else {
									mysqli_stmt_bind_param($stmt,"ssssssssss",$user,$hash,$first,$last,$email,$bday,$gender,$date,$verify,$kira);
									mysqli_stmt_execute($stmt);


									$select1 = "SELECT * FROM users where username ='$user' and first='$first'";
									$result1 = mysqli_query($conn,$select1);
									if (mysqli_num_rows($result1) > 0) {
											$row = mysqli_fetch_assoc($result1);
											$userid = $row['id'];
											$insert1 = "INSERT INTO profilepic (userid,status,username) VALUES ('$userid', 1,'$user');";
											mysqli_query($conn,$insert1);

											$insert2 = "INSERT INTO info (userid,status,quotes,about,username) values ('$userid', 'Single','none','none','$user')";
											mysqli_query($conn,$insert2);

											mkdir('user/'.$user);

											copy('profile.php', 'user/'.$user."/".$user.".php");
											error("Location: login.php?signup=success");
											exit();
										} else {
											error("Location: signup.php?signup=error4");
											exit();	
										}	
									}
								}
							}
						}
					}
				}
			}
		}
	}
} else {
	error("Location: signup.php?error");
	exit();
}

 ?>


 