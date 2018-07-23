<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<center><body>
<?php
if (isset($_GET['forgot'])) {
	$forget = $_GET['forgot'];

	if ($forget == 'empty') {
		echo "
			<font color='red'>
		<p><strong>Please enter your email</strong></p>
			</font>
			";
	}
	if ($forget == 'invalidemail') {
		echo "
			<font color='red'>
		<p><strong>Please enter a valid email</strong></p>
			</font>
			";
	}
	if ($forget == 'emailsenderr') {
		echo "
			<font color='red'>
		<p><strong>Something went wrong, please try again</strong></p>
			</font>
			";
	}
	if ($forget == 'emaildontexits') {
		echo "
			<font color='red'>
		<p><strong>Email dont exist, please try again with an existing email</strong></p>
			</font>
			";
	}
} else{
	echo "";
}
?>
<h1>Reset your Password Here!</h1>
	<p>Enter your email to reset your password</p>
	<form action="forgotdb.php" method="POST">	
<h3>Email:
<input type="text" name="email"></h3>
<button type="submit" name="submit">Send</button>
	</form>
<a href="index.php">Back to Home</a>
</body></center>
</html>