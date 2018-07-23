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
<a href="profilepic.php">add profile picture</a><br>
------------------------------------<br>
<strong> Name: </strong> <?php echo $_SESSION['sfirst']." ".$_SESSION['slast']; ?><br>
<strong> Gender: </strong> <?php echo $_SESSION['sgender']; ?><br>
<strong> Birthday: </strong> <?php birthday2(); ?><br>
<strong> Age: </strong> <?php age2(); ?> <br>
<strong> Status: </strong> <?php status2(); ?> <a href="status.php">change</a><br>
<strong> About you:  </strong><?php about2(); ?> <a href="about.php">Edit</a><br>
<strong> Favorite quotes: </strong> <?php quote2(); ?>  <a href="quotes.php">Edit</a><br>
<strong>Joined since: </strong> <?php joined2(); ?><br>
<?php echo "<a href='user/".$_SESSION['susername']."/".$_SESSION['susername'].".php?username=".$_SESSION['susername']."'>"; ?>DONE</a><br>
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