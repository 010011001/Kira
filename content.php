<?php
session_start();
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wap</title>
</head>
<center><body>
    <?php 
        $topic = $_GET['topic'];
        $_SESSION['topic'] = $topic;
        $select = "SELECT * FROM forum where topic='$topic'";
        $result = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($result);

        echo "<h2>
            ".$topic."<br>
            created by: ".$row['username']."</h2><br>
            <h3><p>".$row['subject']."</p></h3>
     -------------------------------------------------------------
        "
        ?>

        <?php
        $select = "SELECT * FROM comment where topic = '$topic'";
        $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {   
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<br>".$row['username'].":".$row['comment']."<br>";
                        echo $row['timepost'];
                    echo "<br>-------------------------------------------------------------";
                }
            }
        ?>

        <form action="comment.php" method="post"><div>
        <textarea name="comment" cols="20" rows="2" placeholder="add comment"></textarea>
        <button type="submit" name="submit">Post</button>
        </div></form>

        <a href="home.php">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="chatroom.php">Chat</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="forum.php">Forum</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</body></center>
</html>


<?php
}
?>