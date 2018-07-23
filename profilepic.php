<?php session_start(); 
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
	<link rel="stylesheet" type="text/css" href="kira.css">
</head>
<center><body>
<h3>Upload Profile Picture</h3>
	<form action="profilepicdb.php" method="POST" enctype="multipart/form-data">
<input type="file" name="profile"><br>
<button type="submit" name="submit">Upload</button>
	</form>
	<?php echo "<a href='user/".$_SESSION['susername']."/".$_SESSION['susername'].".php'>"; ?>Go back</a>
</body></center>
</html>

<?php
}
?>