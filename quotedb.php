<?php 
session_start();
include 'connection.php';
$id = $_SESSION['sid'];

if (isset($_POST['submit'])) {
	$text = $_POST['text'];


	$select = "SELECT * FROM info where userid = '$id'";
	$result = mysqli_query($conn, $select);
	if (mysqli_num_rows($result) > 0) {
		$update = "UPDATE info SET quotes = '$text' where userid = '$id'";
		mysqli_query($conn, $update);

		header("Location: profileedit.php");
		exit();
	} else {
		exit();
	}
}
