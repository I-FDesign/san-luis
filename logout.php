<?php  session_start();
	$_SESSION['usuario'] = '';
	session_destroy();
	header('Location: login/login.php');
 ?>