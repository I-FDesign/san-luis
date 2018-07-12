<?php session_start();
	
 	require  '../../admin/functions.php';
 	if(isset($_SESSION['sl_user'])){
 		$creator = $_SESSION['sl_user'];
 	}else{
 		header('Location: ../../');
 	}

 	$conexion = conect();
 	$statement = $conexion->prepare("
 		SELECT  * FROM anuncios WHERE creator = :creator
 	");
 	$statement->execute(array(':creator' => $creator));
 	$resultados = $statement->fetchAll();


 ?>