<?php
    include 'connection.php';

    if (isset($_POST['email'])) {
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);

        if (empty($email) || empty($pass) || empty($cpass)) {
            Header("Location: forgot.php?forgot=empty");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Header("Location: forgot.php?forgot=invalidemail");
                exit();
            } else {
                if (strlen($pass) < 7) {
                    Header("Location: forgot.php?forgot=invalidpass");
                     exit();
                } else {
                   if ($pass != $cpass) {
                        Header("Location: forgot.php?forgot=passdontmatch");
                        exit();
                   } else {
                    $select = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $select);
                        if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        
                        if ($email != $row['email']) {
                            Header("Location: forgot.php?forgot=emaildontexist");
                            exit();
                        } else {
                            $hash = PASSWORD_HASH($cpass, PASSWORD_DEFAULT);
                            $update = "UPDATE users set password='$hash' where email='$email'";
                            mysqli_query($conn, $update);

                            Header("Location: index.php?forgot=success");
                            exit();
                        }

                    } else {
                        Header("Location: forgot.php?forgot=emaildontexist");
                        exit();
                    }
                   }
                }
            }
        }
    } else {
        Header("Location: forgot.php?forgot=error");
        exit();
    }