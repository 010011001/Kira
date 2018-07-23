<?php session_start();
include 'function.php';
include 'connection.php';
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
	<title> wappers </title>
	<link rel="stylesheet" type="text/css" href="kira.css">
</head>
<center><body>
<?php profile2(); ?>
<br>
------------------------------------<br>
<strong> Name: </strong> <?php echo $_SESSION['sfirst']." ".$_SESSION['slast']; ?><br>
<strong> Gender: </strong> <?php echo $_SESSION['sgender']; ?><br>
<strong> Birthday: </strong> <?php birthday2(); ?><br>
<strong> Age: </strong> <?php age2(); ?> <br>
<strong> Status: </strong> <form action="statusdb.php" method="POST">
				<input type="radio" name="status" value="Single" checked="">Single
				<input type="radio" name="status" value="Taken">Taken
				<input type="radio" name="status" value="Married">Married
				<input type="radio" name="status" value="Complicated">Complicated
				<input type="radio" name="status" value="Waiting for a miracle">Waiting for a miracle
				<button type="submit" name="submit">Change</button></form><br>
<strong> About you:  </strong><?php about2(); ?><br>
<strong> Favorite quotes: </strong> <?php quote2(); ?><br>
<strong>Joined since: </strong> <?php joined2(); ?><br>
--------------------------------------<br>
<a href="">albums</a>:<br>
<a href="">testimonials</a>:<br>
------------------------------------<br>
<a href="index.php">Home</a> <a href="">chat</a> <a href="">forum</a>


</body></center>
</html>

<?php
}
?>