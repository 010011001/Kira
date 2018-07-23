<?php
session_start();
include 'connection.php';
$_SESSION['sid'];
$_SESSION['susername'];
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
    <title>Wap</title>
</head>
<center><body>
    <h1>Forum!</h1>
    <a href="create.php">Create topic</a>
    <div>Latest Topic</div>
    <?php 
    $select = "SELECT * FROM forum order by id desc";
    $result = mysqli_query($conn,$select);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "-----------------------------------------<br>";
        echo "<a href='content.php?topic=".$row['topic']."'>".$row['topic']."</a><br>";
    }
    ?>-----------------------------------------<br>
    <a href="home.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="chatroom.php">Chat</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="forum.php">Forum</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    
</body></center>
</html>

<?php
}
?>