<?php
include 'connection.php';
function error($error){
    header($error);
}


if (isset($_GET['email']) and isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $select = "SELECT * FROM users where email='$email' and token='$token'";
    $result = mysqli_query($conn,$select);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $update = "UPDATE users SET verify=1, token=''";
        mysqli_query($conn,$update);
        error("Location: login.php?verify=success");
        exit();
    } else {
        error("Location: login.php?verify=error2");
        exit();
    }
} else {
    error("Location: login.php?verify=error1");
    exit();
}

?>