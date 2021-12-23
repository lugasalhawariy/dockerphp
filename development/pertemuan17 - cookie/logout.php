<?php  

session_start();

//delete session
$_SESSION['login'] = [];
session_unset();

session_destroy();

//delete cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header('Location: login.php');

?>