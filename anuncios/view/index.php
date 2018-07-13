<?php 
	require '../../admin/functions.php';
	require 'view.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $resultado['titulo'] ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico" >
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<script src="https://use.fontawesome.com/2d83eb3d68.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require '../back.php' ?>
	<div class="anuncio">
		<div class="titulo">
			<h2><?php echo $resultado['titulo'] ?></h2>
		</div>
		<div class="content">
			<div class="img">
				<img src="<?php echo '../../img/anuncios/' . $resultado['thumb']; ?>" alt='<?php echo $resultado['titulo'] ?>'>
			</div>
			<div class="info">
				<div class="tit">
					<p><?php echo $resultado['titulo'] ?></p>
				</div>
				<p class="contacto">Contacto: <span><?php echo $resultado['contacto'] ?></span></p>
				<p class="categoria">Categoria: <span><?php echo $categoria; ?></span></p>
				<p class="precio">Precio: <span><?php echo $resultado['precio'] ?></span></p>
			</div>
		</div>
	</div>
	<script src="../../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src='../viewmore.js'></script>
</body>
</html>