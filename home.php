<?php 
session_start();
	include 'function.php';
	if (!isset($_SESSION['sid'])) {
		header("Location: login.php");
		exit();
	} else {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="kira.css">
</head>
<center><body>
	<h1>Home</h1>
<h3>Welcome <?php echo $_SESSION['susername']; ?>!</h3>
<?php today(); ?>

<div>------------------------------------------- </div>
<div>Todays Announcement: </div>
<div> None so far</div><br> <?php
echo $_SERVER['SERVER_NAME'] . "<br>";
echo $_SERVER['HTTP_HOST'] . "<br>";
echo $_SERVER['SERVER_NAME'] . "<br>";
echo $_SERVER['SERVER_NAME'] . "<br>";
echo $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo $_SERVER['SERVER_NAME'] . "<br>";
?>
<div>------------------------------------------- </div>
<div>Shoutout: 
<?php shout();?>
<a href="shout.php">shout</a><br>
------------------------------------------- </div>
<div>Topic</div>
<?php echo forum(); ?>
<div> ------------------------------------------</div>
<div> <a href="forum.php">Forums</a></div>
<div> <a href="chatroom.php">Chat</a></div>
<div> <?php echo "<a href='user/".$_SESSION['susername']."/".$_SESSION['susername'].".php?username=".$_SESSION['susername']."'>"; ?>Profile</a> </div>
<div> <a href="online.php">Online</a></div><br>

<div> -------------------------------------------</div>
<a href="logout.php">Logout</a>
</body><center>
</html>

<?php
	}
?>