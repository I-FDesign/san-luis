<?php 
	if(isset($_GET['id'])){
		$id = (is_numeric($_GET['id'])) ? $_GET['id'] : 1;
	}else{
		$id = 1;
	}

	$conexion = conect('sanluis');
	$statement = $conexion->prepare('
		SELECT * FROM anuncios WHERE id = :id
	');
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();
 ?>