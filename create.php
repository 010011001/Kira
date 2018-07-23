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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wap</title>
</head>
<center><body>
    <h1>Create Topic!</h1>
    <form action="forumdb.php" method="POST">
    <h3>Topic:
    <input type="text" name="topic"></h3>
    <h3>Subject:</h3>
    <textarea name="subject" cols="50" rows="5"></textarea><br>
    <button type="submit" name="submit">Post</button>
    </form>
    <a href="forum.php">Go back</a>
</center></body>
</html>

<?php
}
?>