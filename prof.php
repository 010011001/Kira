<?php
session_start();
include 'connection.php';

$username = $_GET['username'];

if ($username == $_SESSION['susername']) {
    header("Location: user/". $_SESSION['susername']."/". $_SESSION['susername'].".php?username=".$_SESSION['susername']);
    exit();
} else {
    $select = "SELECT * FROM info where username='$username'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);

    header("Location: user/".$row['username']."/". $row['username'] .".php?username=".$row['username']);
    exit();
}