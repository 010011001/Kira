<?php
session_start();
function error($error){
    header($error);
}
if (!isset($_SESSION['sid'])) {
	error("Location: login.php");
	exit();
} else {
?>


<!DOCTYPE html>
<html>
<head>
	<title>wap</title>
</head>
<center><body>
<h1>Write something about you!</h1>
<form action="aboutdb.php" method="POST"> 
<input type="text" name="about">
<button type="submit" name="submit">Submit</button>
</form>
<a href="profileedit.php">Go back</a>
</body></center>
</html>

<?php
}
?>