<?php
session_start();
include 'connection.php';
$id = $_SESSION['sid'];
$user = $_SESSION['susername'];

if (isset($_POST['submit'])) {
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $date = date('Y-m-d');

    if (empty($topic) || empty($subject)) {
        header("Location: create.php?createtopic=empty");
        exit();
    } else {
        $insert = "INSERT INTO forum (topic,subject,timepost,datepost,userid,username) values ('$topic','$subject',current_time,'$date','$id','$user');";
        mysqli_query($conn, $insert);

        header("Location: forum.php?createtopic=success");
        exit();
    }
} else {
    header("Location: create.php?createtopic=error1");
    exit();
}
