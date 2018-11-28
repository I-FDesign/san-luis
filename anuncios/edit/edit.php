<?php session_start();
	$errores = '';
	if(isset($_SESSION['sl_user'])){
		$creator = $_SESSION['sl_user'];
	}else{
		header('Location: ../../login/login.php');
	}

	$conexion = conect();
	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE user = :user');
	$statement->execute(array(':user' => $creator));
	$resultado = $statement->fetch();
	$cdest = $resultado['cdest'];

	if(isset($_GET['id'])){
		$id = (is_numeric($_GET['id'])) ? $_GET['id'] : 1;
	}else{
		$id = 1;
	}
	$conexion = conect();

	$statement = $conexion->prepare('SELECT * FROM anuncios WHERE id = :id');
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
	if($resultado['creator'] !== $creator){
		header('Location: ../../');
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(!empty($_POST['titulo'])){
			$titulo = cleanDates($_POST['titulo']);
		}else{
			$errores .= 'Ingresa un Titulo' . '<br />';
		}

		if(!empty($_POST['email'])){
			$email = $_POST['email'];
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);
				$email = trim($email);
			}else{
				$errores .= 'Ingresa un Email valido' . '<br />';
			}
		}else{
			$errores .= 'Ingresa un Email' . '<br />';
		}

		if(!empty($_POST['categoria'])){
			$categoria = cleanDates($_POST['categoria']);
		}else{
			$errores .= 'Ingresa un Categoria' . '<br />';
		}

		if(!empty($_POST['info'])){
			$info = cleanDates($_POST['info']);
		}else{
			$errores .= 'Ingresa un Descripcion' . '<br />';
		}

		if(!empty($_POST['precio'])){
			$precio = cleanDates($_POST['precio']);
		}else{
			$errores .= 'Ingresa un Precio' . '<br />';
		}


		$thumb = $_FILES['thumb'];
		$extension = pathinfo($thumb['name'],PATHINFO_EXTENSION);
		if($extension == 'png' or $extension == 'jpg' or $extension == 'gif'){
		}else{
			$errores .= 'Ingresa una imagen valida' . '<br />';
		}
		if(empty($errores)){
			$statement = $conexion->prepare('UPDATE anuncios SET
				thumb = :thumb,
				titulo = :titulo,
				descripcion = :descripcion,
				contacto = :contacto,
				categoria = :categoria,
				precio = :precio
				WHERE id = :id
			');
			$statement->execute(array(
			':thumb' => $thumb['name'],
			':titulo' => $titulo,
			':descripcion' => $info,
			':contacto' => $email,
			':categoria' => $categoria,
			':precio' => $precio,
			':id' => $_POST['id']
			));

			if(isset($_POST['estado']) && $_POST['estado'] == 'on'){
				if($cdest > 0){
					$estado = 'premium';
					$fpremium = strtotime(date("d-m-Y H:i:00", time())) - 17960 + 604740;
					$fpremium = date("d-m-Y H:i:00", $fpremium);
					$cdest = $cdest - 1;

				}else{
					$errores = 'No tienes la posibilidad de destacar un anuncio, tienes ' . $cdest .  ' anuncios para destacar';
				}
				if(empty($errores)){
					
					$statement = $conexion->prepare('UPDATE usuarios SET cdest = :cdest WHERE user = :user');
					$statement->execute(array(':cdest' => $cdest, ':user' => $resultado['creator']));


					$statement = $conexion->prepare('
						UPDATE anuncios SET estado = :estado, fpremium = :fpremium WHERE id = :id
					');
					$statement->execute(array(
						':estado' => $estado,
						':fpremium' => $fpremium,
						':id' => $_POST['id']
					));
				}
			}

			header('Location: ../../?status=ok&message=Anuncio modificado correctamente');
		}
	}


 ?>