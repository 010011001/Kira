<?php 
include 'connection.php';
session_start();
$id = $_SESSION['sid'];
$user = $_SESSION['susername'];

if (isset($_POST['submit'])) {
	$file = $_FILES['profile'];

	$name = $_FILES['profile']['name'];
	$tempname = $_FILES['profile']['tmp_name'];
	$error = $_FILES['profile']['error'];
	$size = $_FILES['profile']['size'];

	$filename = explode(".", $name);
	$fileEx = strtolower(end($filename));

	$allowed = array("jpg","jpeg","png");

	if (in_array($fileEx, $allowed)) {
		if ($error === 0) {
			if ($size < 1000000) {
				$change = str_replace($allowed, "jpg", $fileEx);
				$namereal = $id . "." .$change;
				$destination = "user/".$user."/".$namereal;
				move_uploaded_file($tempname, $destination);

				$update = "UPDATE profilepic set status=0 where userid = $id";
				mysqli_query($conn, $update);

				header("Location: profileedit.php?upload=success");
				exit();
			} else {
				header("Location: profileedit.php?upload=filetoobig");
				exit();
			}
		} else {
			header("Location: profileedit.php?upload=cantupload");
			exit();
		}
	} else {
		header("Location: profileedit.php?upload=error2");
		exit();
	}
} else {
	header("Location: profileedit.php?upload=error1");
	exit();
}