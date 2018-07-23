<?php
if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if (empty($user) || empty($pass)) {
		echo "filled is empty, try putting something";
		exit();
	} else {
		if ($user == "johnreyhandsome" && $pass == "johnrey14") {
			echo "<center><b>PASSWORD ACCEPTED</b><br>
			<a href='machine4loanamount.php'>Loan Page</a><center>";
			exit();
		} else {
			echo "<center><b>Username or Password dont match, please try again</b><center>";
				exit();
		}
	}
}
 