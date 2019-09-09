<?php

if(!isset($_COOKIE['uid']) && basename($_SERVER['PHP_SELF']) != 'login.php' && basename($_SERVER['PHP_SELF']) != 'register.php'){
	header('location: login.php?m=You need to login');
}

if(basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'register.php'){
	setcookie('uid', '', time() + (86400 * -30), "/"); // 86400 = 1 day
}
?>