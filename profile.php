<?php
session_start();
include '../../function.php';
include '../../connection.php';
function error($error){
    header($error);
}
if (!isset($_SESSION['sid'])) {
	error("Location: ../../login.php");
	exit();
} else {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title> wappers </title>
	<link rel="stylesheet" type="text/css" href="../../kira.css">
</head>
<center><body>
<?php profile(); ?>

------------------------------------<br>
<strong> Name: </strong> <?php echo name(); ?><br>
<strong> Gender: </strong> <?php echo gender(); ?><br>
<strong> Birthday: </strong> <?php birthday(); ?><br>
<strong> Age: </strong> <?php age(); ?> <br>
<strong> Status: </strong> <?php status(); ?> <br>
<strong> About you:  </strong><?php about(); ?> <br>
<strong> Favorite quotes: </strong> <?php quote(); ?>  <br>
<strong>Joined since: </strong> <?php joined(); ?><br>
--------------------------------------<br>
<?php
$text = $_GET['username'];
if ($_SESSION['susername'] != $text) {
	echo '<a href="">albums</a>:<br>';
	echo '<a href="">testimonials</a>:<br>';
} else {
	echo '<a href="../../profileedit.php">Edit Profile</a><br>';
	echo '<a href="">albums</a>:<br>';
	echo '<a href="">testimonials</a>:<br>';
}
?>
------------------------------------<br>
<a href="../../home.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="../../chatroom.php">Chat</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="../../forum.php">Forum</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


</body></center>
</html>

<?php
}
?>