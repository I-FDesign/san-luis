<?php session_start();
	include '../admin/functions.php';
	
	if(isset($_SESSION['sl_user'])){
		header('Location: ../index.php');
	}

	$errores = '';

	if(isset($_POST['login'])){

		if(!empty($_POST['user'])){
			$user = cleanDates($_POST['user']);
		}else{
			$errores = 'Completa los campos obligatorios' . '<br />';
		}

		if(!empty($_POST['pass'])){
			$pass = cleanDates($_POST['pass']);
			$pass = hash('sha512', $pass);
		}else{
			$errores = 'Completa los campos obligatorios' . '<br />';
		}

		$conexion = conect('redsocial');
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE user = :user');
		$statement->execute(array(':user' => $user));
		$resultado= $statement->fetch();

		if($resultado !== false){

			if($resultado['pass'] == $pass && empty($errores)){
				$_SESSION['sl_user'] = $resultado['user'];
				header('Location: ../index.php');
			}else{
				$errores .= 'La contraseña es incorrecta';
			}

		}else{
				$errores .= 'El nombre de usuario es incorrecto';
			}
		}

	


	require 'login.view.php';


 ?>