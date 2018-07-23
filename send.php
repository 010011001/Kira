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
    <link rel="stylesheet" href="kira.css">
</head>
<center><body>
    <h1>CHATROOM!</h1>
    <div class="square">
    <?php
      include 'connection.php';
      $sql = "SELECT * FROM chatlog order by id desc limit 8";
      $result = mysqli_query($conn,$sql);
      
      while ($row = mysqli_fetch_assoc($result)) {
        $user = $row['username'];
        $select = "SELECT * FROM profilepic WHERE username='$user'";
        $result1 = mysqli_query($conn, $select);
        $row2 = mysqli_fetch_assoc($result1);
            echo "<div class='light'>";
        if ($row2['status'] == 1) {
            echo "<p><img src='default.jpg'><a href='prof.php?username=".$row['username']."'>".$row['username'].":</a>&nbsp&nbsp". wordwrap($row['chat'],36,"\n",true) ."</p>";
        } else {
            echo "<p><img src='user/".$row2['username'] ."/".$row2['userid'].".jpg'>"."<a href='prof.php?username=".$row['username']."'>".$row['username'].":</a>&nbsp&nbsp". wordwrap($row['chat'],36,"\n",true) ."</p>";
        }
        echo "</div>";
    }
    ?>
    </div>
    <form action="senddb.php" method="post">
    <textarea name="text" cols="30" rows="4"></textarea><br>
    <button type="submit" name="submit">SEND</button>
    </form>
</body></center>
</html>
<?php
}
?>