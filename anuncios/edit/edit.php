<?php session_start();
	$errores = '';
	if(isset($_SESSION['sl_user'])){
		$creator = $_SESSION['sl_user'];
	}else{
		header('Location: ../../login/login.php');
	}

	if(isset($_GET['id'])){
		$id = (is_numeric($_GET['id'])) ? $_GET['id'] : 1;
	}else{
		$id = 1;
	}
	$conexion = conect('sanluis');

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
				$estado = 'premium';

				$statement = $conexion->prepare('
					UPDATE anuncios SET estado = :estado WHERE id = :id
				');
				$statement->execute(array(
					':estado' => $estado,
					':id' => $_POST['id']
				));
			}

			header('Location: ../../');
		}
	}


 ?>