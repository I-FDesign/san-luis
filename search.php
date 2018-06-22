<?php 
	$message = '';
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['find'])){
		if(!empty($_GET['search'])){
			$busqueda = cleanDates($_GET['search']);
		}else{
			header('Location: index.php');
		}

		$statement = $conexion->prepare('SELECT * FROM anuncios WHERE titulo LIKE :busqueda OR descripcion LIKE :busqueda LIMIT 8');
		$statement->execute(array(':busqueda' => "%$busqueda%"));
		$resultados = $statement->fetchAll();
		if(!$resultados){
			$message = 'No se encontraron resultados para: ' . "'$busqueda'.";
		}else{
			$message = 'Resultados para: ' . "'$busqueda'.";
		}

	}



 ?>