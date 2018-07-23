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
<h1>Tell us what's your favorite quote is.</h1>
<form action="quotedb.php" method="POST"> 
<input type="text" name="text">
<button type="submit" name="submit">Submit</button>
</form>
<a href="profileedit.php">Go back</a>
</body></center>
</html>
<?php
}
?>