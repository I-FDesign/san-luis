<?php session_start();

	if(isset($_SESSION['sl_user'])){
		header('Location: ../index.php');
	}

	require '../admin/functions.php';

	$errores = '';

	if(isset($_POST['registro'])){

	//---------------Val nombre---------------------

		if(!empty($_POST['name'])){
			$nombre = cleanDates($_POST['name']);
		}else{
			$errores = 'Completa el campo Nombre' . '<br />';
		}

	//------------Val Email-------------------------

		if(!empty($_POST['email'])){
			$email = $_POST['email'];
			if(filter_var($email,FILTER_VALIDATE_EMAIL)== true){
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			}else{
				$errores .= 'Introduce un email valido' . '<br />';
			}
		}else{
			$errores .= 'Completa el campo Email' . '<br />';
		}

	//-----------Val usuario-----------------------

		if(!empty($_POST['user'])){
			$usuario = cleanDates($_POST['user']);
		}else{
			$errores .= 'Completa el campo Usuario' . '<br />';
		}

	//----------Val contraseñas--------------------

		if(!empty($_POST['pass']) && !empty($_POST['rpass'])){

			$contraseña = hash('sha512',$_POST['pass']);
			$rcontraseña = hash('sha512',$_POST['rpass']);
			if($contraseña !== $rcontraseña){
				$errores .= 'Las contraseñas deben ser iguales';
			}

		}else{
			$errores .= 'Debes introducir una contraseña' . '<br />';
		}

	//---------Sub. a BD----------------------------

		$conexion = conect();
		if(!$conexion){
			header('Location ../error.php');
		}

	//------------Comprobando usuario---------------

		if(isset($usuario)){
			$statement = $conexion->prepare('
				SELECT user FROM usuarios WHERE user = :usuario LIMIT 1
				');
			$statement->execute(array(':usuario' => $usuario));
			$resultadosu = $statement->fetch();
			if($resultadosu !== false){
				$errores .= 'El usuario ya existe';
			}
		}

	//------------Comprobando mail------------------
		if(isset($email)){

			$statement = $conexion->prepare('
				SELECT user FROM usuarios WHERE email = :email LIMIT 1
				');
			$statement->execute(array(':email' => $email));
			$resultadose = $statement->fetch();
			if($resultadose !== false){
				$errores .= 'El email ya se encuentra en uso';
			}
		}
	//------------Ingresando datos a bd-------------

		if(empty($errores)){
			$statement= $conexion->prepare('
				INSERT INTO usuarios (name, email, user, pass) VALUES(:name, :email, :user, :pass)
				');
			$statement->execute(array(
				':name' => $nombre,
				':email' => $email,
				':user' => $usuario,
				'pass' => $contraseña
			));
			header('Location: ../login/login.php');
		}

	}

	require 'registro.view.php';
 ?>