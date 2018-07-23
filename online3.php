<?php
ini_set('session.cookie_lifetime','345600');
ini_set('session.gc_maxlifetime','345600');
ini_set('session.gc_probability','1');
ini_set('session.cookie_secure','0');
$_SERVER['REMOTE_ADDR'];
session_start();
if (isset($_SESSION['atterpt_failed'])) {
    $time = time();
    echo $time . "<br>";
    echo $_SESSION['atterpt_failed']. "<br>";
    if ($time >= $_SESSION['atterpt_failed']) {
       unset($_SESSION['atterpt_failed']);
       unset($_SESSION['attemp']);
       header("Location: online3.php");
    }
}

if (isset($_GET['login'])) {
    $login = $_GET['login'];

    if ($login == '1') {
        echo "Sorry too many attempt failed, wait for 2 minutes and try again";
    }
    if ($login == '3') {
        echo "Sorry too many attempt failed, wait for 2 minutes and try again";
    }
    if ($login == '2') {
        echo "username and password dont match, please try again";
    }
    if ($login == 'success') {
        echo "Welcome";
    }
}

?>
<html>
<body>
<form action="online2.php" method="post">
username:
<input type="text" name="name">
password:
<input type="password" name="password">
<button type="submit" name="submit">test</button>
</form>
<?php
if (!isset($_SESSION['attemp'])) {
    echo "";
} else {
    echo $_SESSION['attemp'];
}
?>
</body>
</html> 