<?php 
session_start();
if (isset($_SESSION['sid'])) {
	header("Location: home.php");
	exit();
} else {
	header("Location: login.php");
	exit();
}
 ?>