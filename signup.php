<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>sign up</title>
</head>
<center><body>
	<?php
	if (isset($_GET['signup'])) {
		$signup = $_GET['signup'];

		if ($signup == "empty") {
			echo "
			<font color='red'>
		<p><strong>Please fill out all the fields</strong></p>
			</font>
			";
		}
		if ($signup =="firstchar") {
			echo "
			<font color='red'>
		<p><strong>Your parents didnt possibly named you with special characters and numbers aren't you?</strong></p>
			</font>
			";
		}
		if ($signup == "emailerr") {
			echo "
			<font color='red'>
		<p><strong>Please put a valid email address!</strong></p>
			</font>
			";
		}
		if ($signup == "userlenght") {
			echo "
			<font color='red'>
		<p><strong>Username must be atleast 6 characters long!</strong></p>
			</font>
			";
		}
		if ($signup == "passlenght") {
			echo "
			<font color='red'>
		<p><strong>Password must be atleast 8 characters long!</strong></p>
			</font>
			";
		}
		if ($signup == "passnotmatch") {
			echo "
			<font color='red'>
		<p><strong>It seem the password didnt match, Please try again!</strong></p>
			</font>
			";
		}
		if ($signup == "useroremailtaken") {
			echo "
			<font color='red'>
		<p><strong>It seem the email or the username is already used, please use different one</strong></p>
			</font>
			";
		}
		if ($signup == "emailsenderr") {
			echo "
			<font color='red'>
		<p><strong>something went wrong please try again!</strong></p>
			</font>
			";
		}
	} else {
		echo "";
	}
	?>
	<form action="signupdb.php" method="POST">
<h1>Signup Here!</h1>
<h3>Username:
<input type="text" name="user" placeholder="more than 6 characters"></h3>
<h3>Password:
<input type="password" name="pass" placeholder="more than 8 characters"></h3>
<h3>Confirm Password:
<input type="password" name="cpass"></h3>
<h3>Firstname:
<input type="text" name="first" placeholder="ex: Reymark"></h3>
<h3>Lastname:
<input type="text" name="last" placeholder="ex: Fallorina"></h3>
<h3>Email:
<input type="text" name="email" placeholder="ex: ex@email.com"></h3>
<h3>Birthday:
<input type="date" name="birthday"></h3>
<h3>Gender:
<input type="radio" name="gender" value="Male" checked="yes">Male
<input type="radio" name="gender" value="Female">Female</h3>
<button type="submit" name="submit">Signup</button>
	</form>
	<a href="index.php">Already have an account?</a>
</body></center>
</html>