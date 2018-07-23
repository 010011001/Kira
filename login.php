<?php
session_start();
if (isset($_SESSION['atterpt_failed'])) {
    $time = time();
    if ($time >= $_SESSION['atterpt_failed']) {
       unset($_SESSION['atterpt_failed']);
       unset($_SESSION['attemp']);
       header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
login form
	</title>
</head>
<center><body>

<?php 
if (isset($_GET['login'])) {
	$empty = $_GET['login'];

	if ($empty == 'empty') {
		echo "
			<font color='red'>
		<p><strong>Put your existing username and password</strong></p>
			</font>
		";
	}
	if ($empty == 'usernamedontexist') {
		echo "
		<font color='red'>
	<p><strong>It seems that the username dont exist, please register or try again</strong></p>
		</font>
	";
	}
	if ($empty == 'passworddontmatch') {
		echo  "
		<font color='red'>
	<p><strong>Password dont match please try again</strong></p>
		</font>
	";
	}
	if ($empty == 'accountnotyetverified') {
		echo  "
		<font color='red'>
	<p><strong>It seems you haven't activated your account yet, check your email to activate your account!<br> check your email or <a href='resend.php'>click here</a> to resend the activation</strong></p>
		</font>
	";
	}
	if ($empty == 'toomanyattempt') {
		echo "
		<font color='red'>
	<p><strong>Too many attempt failed, wait for 10 minutes and try again</strong></p>
		</font>
	";
	}

	} elseif (isset($_GET['signup'])) {
		$success = $_GET['signup'];
		if ($success == 'success') {
			echo  "
			<font color='green'>
		<p><strong>Account created, please go to your email to activate your account</strong></p>
			</font>
		";
		}
	}elseif (isset($_GET['verify'])) {
		$verify = $_GET['verify'];
		if ($verify == 'success') {
			echo  "
			<font color='green'>
		<p><strong>Account successfully activated, you can now login</strong></p>
			</font>
		";
		}
		if ($verify == 'error1') {
			echo  "
			<font color='red'>
		<p><strong>Something went wrong when activating your account<br>please try again or <a href='resend.php'>click here</a> to resend</strong></p>
			</font>
		";
		}
		if ($verify == 'error2') {
			echo  "
			<font color='red'>
			<p><strong>Something went wrong when activating your account<br>please try again or <a href='resend.php'>click here</a> to resend!</strong></p>
				</font>
		";
		}
	}elseif (isset($_GET['resend'])) {
		$resend = $_GET['resend'];

		if ($resend == 'success') {
			echo  "
			<font color='green'>
		<p><strong>Email successfully sent, check your email to activate your account</strong></p>
			</font>
		";
		}
	}elseif(isset($_GET['reset'])){
		$reset = $_GET['reset'];

		if ($reset == 'success') {
			echo  "
			<font color='green'>
		<p><strong>Email successfully sent, check your email to reset your password</strong></p>
			</font>
		";
		}
	}
	else {
	echo "";
}
?>

	<form action="logindb.php" method="POST">
<h1>Login Here!</h1>
<h3>Username/Email:</h3>
<input type="text" name="user">
<h3>Password:</h3>
<input type="password" name="password"><br><br>
<button type="submit" name="submit">Login</button>
	</form><br>
<a href="forgot.php">Forgot Password?</a><br>
<a href="signup.php">Dont have an account yet?</a>

</body></center>
</html>