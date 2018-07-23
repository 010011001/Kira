<?php
ob_start();
session_start();
include 'connection.php';

if (!isset($_SESSION['attemp'])) {
    $_SESSION['attemp'] = 0;
}

if (isset($_SESSION['atterpt_failed'])) {
    header("Location: login.php?login=toomanyattempt");
    exit();
	} else {
		if ($_SESSION['attemp'] >= 3) {
    	$_SESSION['atterpt_failed'] = time() + (10*60);
    	header("Location: login.php?login=toomanyattempt");
    	exit();
			} else {
				if (isset($_POST['submit'])) {
				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pwd = mysqli_real_escape_string($conn, $_POST['password']);

					if (empty($user) || empty($pwd)) {
					header("Location: login.php?login=empty");
					exit();
						} else {
							$select = "SELECT * FROM users WHERE username=? or email=?;";
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $select)) {
							header("Location: login.php?login=error2");
							exit();
							} else {
							mysqli_stmt_bind_param($stmt,"ss",$user,$user);
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);

							if (mysqli_num_rows($result) <= 0) {
							$_SESSION['attemp'] += 1;
							header("Location: login.php?login=usernamedontexist");
							exit();
							} else {
							$row = mysqli_fetch_assoc($result);
							$hash = PASSWORD_VERIFY($pwd, $row['password']);

							if ($hash == FALSE) {
								$_SESSION['attemp'] += 1;
								header("Location: login.php?login=passworddontmatch");
								exit();
							} elseif ($hash == TRUE) {
								if ($row['verify'] == 0) {
									header("Location: login.php?login=accountnotyetverified");
									exit();
								} else {
								$_SESSION['sid'] = $row['id'];
								$_SESSION['susername'] = $row['username'];
								$_SESSION['sfirst'] = $row['first'];
								$_SESSION['slast'] = $row['last'];
								$_SESSION['semail'] = $row['email'];
								$_SESSION['sbirthday'] = $row['birthday'];
								$_SESSION['sgender'] = $row['gender'];

								header("Location: index.php?login=success");
								exit();
								}
							} else {
								$_SESSION['attemp'] += 1;
								header("Location: login.php?login=usernamedontexist");
								exit();
							}
						}
					}
				}

			} else {
				header("Location: login.php?login=error1");
				exit();
			}
		}
	}

 ?>