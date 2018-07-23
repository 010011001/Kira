<?php
session_start();
include 'connection.php';
$id = $_SESSION['sid'];
$user = $_SESSION['susername'];

if (isset($_POST['submit'])) {
    $text = mysqli_real_escape_string($conn,$_POST['text']);

    if (empty($text)) {
        header("Location: chatroom.php");
        exit();
    } else {
        $insert = "INSERT INTO chatlog (username,chat,userid,post) VALUES ('$user','$text','$id',current_time);";
        mysqli_query($conn,$insert);

        header("Location: chatroom.php");
        exit();
    }

} else {
    exit();
}

?>