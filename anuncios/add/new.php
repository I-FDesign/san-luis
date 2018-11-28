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
			$precio = $precio;
		}else{
			$errores .= 'Ingresa un Precio' . '<br />';
		}


		$thumb = $_FILES['thumb'];
		$extension = pathinfo($thumb['name'],PATHINFO_EXTENSION);
		if($extension == 'png' or $extension == 'jpg' or $extension == 'gif'){
		}else{
			$errores .= 'Ingresa una imagen valida' . '<br />';
		}
		
		if(isset($_POST['estado']) && $_POST['estado'] == 'on'){
			if($cdest > 0){
				$estado = 'premium';
				$fpremium = strtotime(date("d-m-Y H:i:00", time())) - 17960 + 604740;
				$fpremium = date("d-m-Y H:i:00", $fpremium);
			}else{
				$errores = 'No tienes la posibilidad de destacar un anuncio, tienes ' . $cdest .  ' anuncios para destacar';
			}
		}else{
			$estado = 'common';
			$fpremium = '0';
		}
		
		if(empty($errores)){

			$conexion = conect();

			$statement = $conexion->prepare('
				INSERT INTO anuncios(thumb, titulo, descripcion, contacto, categoria, estado, precio, creator, fpremium) VALUES (:thumb, :titulo, :descripcion, :contacto, :categoria, :estado, :precio, :creator, :fpremium)
			');

			$statement->execute(array(
				':thumb' => $thumb['name'],
				':titulo' => $titulo,
				':descripcion' => $info,
				':contacto' => $email,
				':categoria' => $categoria,
				':estado' => $estado,
				':precio' => $precio,
				':creator' => $creator,
				':fpremium' => $fpremium
				));

			$directorio = '../../img/anuncios/' . $thumb['name'];
			move_uploaded_file($thumb['tmp_name'], $directorio);

			if($estado == 'premium'){
				$cdest = $cdest - 1;
			
				$statement = $conexion->prepare('UPDATE usuarios SET cdest = :cdest WHERE user = :user');
				$statement->execute(array(
					':cdest' => $cdest,
					':user' => $creator
				));
			}
			
			header('Location: ../../?status=ok&message=Anuncio agregado correctamente');
		}
	}
	
 ?>