<?php
session_start();
include 'connection.php';
$id = $_SESSION['sid'];
$user = $_SESSION['susername'];

if (isset($_POST['submit'])) {
    $text = mysqli_real_escape_string($conn,$_POST['shout']);

    if (empty($text)) {
       header("location: shout.php?error=empty");
       exit();
    } else {
        $insert = "INSERT INTO shout (userid,username,shout,post) values ('$id', '$user','$text',current_time);";
        $result = mysqli_query($conn,$insert);

        header('Location: index.php');
        exit();
    }
}