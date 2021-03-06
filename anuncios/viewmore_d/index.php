<?php require 'viewmore.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Anuncios</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<script src="https://use.fontawesome.com/2d83eb3d68.js"></script>
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<?php require '../back.php' ?>
	<div class="destacados">
		<div class="titulo">
			<div class="border"></div>
			<div class="tit">Destacados</div>
			<div class="border"></div>
		</div>
		<div class="commons" id='commons'>
		<?php foreach($resultados_d as $resultado): ?>
			<div class="common" value='<?php echo $resultado['id'] ?>' style="width: 100%;">
				<img src="../../img/anuncios/<?php echo $resultado['thumb'] ?>" alt="<?php echo $resultado['titulo'] ?>" width="150" height="200">
				<div class="desc">
					<div class="titulo">
						<p><?php echo $resultado['titulo'] ?></p>
					</div>
					<div class="info">
						<div class="fecha">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<p class="date"><?php echo $resultado['fecha'] ?></p>
						</div>
						<p class='if'><?php echo $resultado['descripcion'] ?></p>
						<div class="options">
							<?php if(isset($_SESSION['sl_user']) && $resultado['creator'] == $_SESSION['sl_user']): ?>
								<div class="config"><a href="anuncios/edit/?id=<?php echo $resultado['id'] ?>"><i class="fa fa-cog" aria-hidden="true"></i></a></div>
							<?php endif; ?>
								<div class="precio">
									<p>Precio: <span><?php echo $resultado['precio'] ?></span></p>
								</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="btns">
			<?php if($pagina == 1): ?>
				<a class='disable'>&laquo;</a>
			<?php else: ?>
				<a class='active' href='?p=<?php echo $pagina -1 ?>'>&laquo;</a>
			<?php endif; ?>

			<?php for($i= 1; $i <= $numeroPaginas ; $i++): ?>
				<?php if($pagina == $i): ?>
					<a class='actual' href='?p=<?php echo $i ?>'><?php echo $i ?></a>
				<?php else: ?>
					<a class='not-actual' href='?p=<?php echo $i ?>'><?php echo $i ?></a>
				<?php endif; ?>
			<?php endfor; ?>

			<?php if($pagina < $numeroPaginas): ?>
				<a class='active' href='?p=<?php echo $pagina + 1 ?>' >&raquo;</a>
			<?php else: ?>
				<a class='disable'>&raquo;</a>
			<?php endif; ?>		
		</div>
	</div>
		

	<script src="../../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src='../viewmore.js'></script>
</body>
</html>