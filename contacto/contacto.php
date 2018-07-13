<?php 
	$ct_errors= '';
	$ct_enviado = false; 

	if(isset($_SESSION['sl_user'])){
			$conexion = conect();
			$statement = $conexion->prepare('
				SELECT * FROM usuarios WHERE user = :user
			');
			$statement->execute(array(':user' => $_SESSION['sl_user']));
			$contacto = $statement->fetch();
			$ct_mail = $contacto['email'];
			$ct_name = $contacto['name'];
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact'])){
			if(isset($ct_mail)){
				if(!empty($_POST['comment'])){
					$ct_message = cleanDates($_POST['comment']);
				}else{
					$ct_errors = 'Debes ingresar un mensaje' . '<br />';
				}
			if(empty($ct_errors)){

				$enviar_a = 'santupa767@gmail.com';
				$asunto = 'Correo enviado desde SanluisPublica.com';
				$mensaje_preparado = "De: $ct_name \n";
				$mensaje_preparado .= "Correo: $ct_mail \n";
				$mensaje_preparado .= "Mensaje: " . $ct_message;

				mail($enviar_a, $asunto, $mensaje_preparado);
				$ct_enviado = true;
			}
		}else{
			if(!empty($_POST['name'])){
				$ct_name = cleanDates($_POST['name']);
			}else{
				$ct_errors = 'Debes ingresar un nombre' . '<br />';
			}

			if(!empty($_POST['mail'])){
				$ct_mail = $_POST['mail'];
				if(filter_var($ct_mail, FILTER_VALIDATE_EMAIL)){
					$ct_mail = trim($ct_mail);
				}else{
					$ct_errors .= 'Debes ingresar un email valido' . '<br />';
				}
			}else{
				$ct_errors .= 'Debes ingresar un email' . '<br />';
			}

			if(!empty($_POST['comment'])){
				$ct_message = cleanDates($_POST['comment']);
			}else{
				$ct_errors .= 'Debes ingresar un mensaje' . '<br />';
			}

			if(empty($ct_errors)){

				$enviar_a = 'santupa767@gmail.com';
				$asunto = 'Correo enviado desde SanluisPublica.com';
				$mensaje_preparado = "De: $ct_name \n";
				$mensaje_preparado .= "Correo: $ct_mail \n";
				$mensaje_preparado .= "Mensaje: " . $ct_message;

				mail($enviar_a, $asunto, $mensaje_preparado);
				$ct_enviado = true;
			}
		}
	}



 ?>