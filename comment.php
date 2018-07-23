<?php
include 'connection.php';
session_start();
function error($error){
    header($error);
}
$topic = $_SESSION['topic'];

if (isset($_POST['submit'])) {
    $text = $_POST['comment'];

    if (empty($text)) {
        error("Location: content.php?topic=".$topic);
        exit();
    } else {
        $select = "SELECT * from forum where topic='$topic'";
        $result = mysqli_query($conn, $select);
        $user = $_SESSION['susername'];
        if (mysqli_num_rows($result) > 0) {
            $insert = "INSERT INTO comment (comment,username,timepost,datepost,topic) values ('$text','$user',current_time,current_date,'$topic');";
            mysqli_query($conn, $insert);
            error("Location: content.php?topic=".$topic);
            exit();
        } else {
            error("Location: forum.php?comment=forumdeleted");
            exit();
        }
    }
} else {
    error("Location: content.php?topic=".$topic);
    exit();
}


?>