<?php
 	require  '../../admin/functions.php';
 	$pagina = (isset($_GET['p']) && is_numeric($_GET['p'])) ? $_GET['p'] : 1 ;
 	$anunciosPorPagina = 4;
 	$inicio = ($pagina > 1) ? ($pagina * $anunciosPorPagina - $anunciosPorPagina ) : 0 ;
 	$conexion = conect();
 	$statement = $conexion->prepare("
 		SELECT SQL_CALC_FOUND_ROWS * FROM anuncios WHERE estado = :estado LIMIT $inicio,$anunciosPorPagina
 	");
 	$statement->execute(array(':estado' => 'common'));
 	$resultados_d = $statement->fetchAll();
 	

 	$totalAnuncios = $conexion->query('SELECT FOUND_ROWS() as total');
	$totalAnuncios = $totalAnuncios->fetch()['total'];

	$numeroPaginas = ceil($totalAnuncios / $anunciosPorPagina);

 	

 ?>