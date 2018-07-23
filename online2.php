<?php
ini_set('session.cookie_lifetime','345600');
ini_set('session.gc_maxlifetime','345600');
ini_set('session.gc_probability','1');
ini_set('session.cookie_secure','0');
session_start();

function error($error){
    header($error);
}

if (!isset($_SESSION['attemp'])) {
    $_SESSION['attemp'] = 0;
}

if (isset($_SESSION['atterpt_failed'])) {
    error("Location: online3.php?login=3");
    exit();
} else {
if ($_SESSION['attemp'] >= 3) {
    $_SESSION['atterpt_failed'] = time() + (2*60);
    error("Location: online3.php?login=1");
    exit();
} else {
if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $pwd = $_POST['password'];
   $user = 'kira';
   $pass = 'light';

   if ($name != $user) {
    $_SESSION['attemp'] += 1;
    error("Location: online3.php?login=2");
    exit();
   } else {
       if ($pwd != $pass) {
        $_SESSION['attemp'] += 1;
        error("Location: online3.php?login=2");
        exit();
       } else {
    unset($_SESSION['attemp']);
    error("Location: online3.php?login=success");
    exit();
}
}   
}
} 
}
error("Location: online3.php?1");
exit();
?>