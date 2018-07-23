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
    <h1>Shout Something!</h1>
    <form action="shoutdb.php" method="post">
    <textarea name="shout" cols="40" rows="5" placeholder="at least 20 charaters only"></textarea><br>
    <button type="submit" name="submit">Shout</button>
    </form>
    <a href="index.php">Go back</a>
</body></center>
</html>
<?php
}
?>