<?php
 	require '../../admin/functions.php';
 	require 'edit.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Edita tu anuncio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<div class="anuncio">
		<div class="info">
			<h2>Editar anuncio</h2>
		</div>
		<div class="form">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post' enctype="multipart/form-data" >
				<input type="hidden" value="<?php echo $resultado['id'] ?>" name="id">	
				<input type="text" name="titulo" placeholder="Titulo del anuncio" value="<?php echo $resultado['titulo']; ?>" >
				<input type="text" name="email" placeholder="Email de contacto" value="<?php echo $resultado['contacto']; ?>" >
				<input type="text" name="categoria" placeholder="Categoria del anuncio">
				<textarea name="info" placeholder="Descripción del anuncio"> <?php echo $resultado['descripcion']; ?> </textarea>
				<input type="text" name="precio" placeholder="Precio del anuncio" value="<?php echo $resultado['precio']; ?>" >
				<div class="img">
					<label for='thumb'>Ingresa una imagen de portada</label>
					<input type="file" name="thumb">
				</div>

					<?php if($resultado['estado'] == 'common'): ?>
						<div class="status">
							<label for='estado'>Deseas destacar el anuncio?</label>
							<input type="checkbox" name="estado" id='estado'>
						</div>
					<?php endif; ?>
					<?php if(!empty($errores)): ?>
						<div class="error">
							<p><?php echo $errores ?></p>
						</div>
					<?php endif; ?>
				<input type="submit" name="env" value='Actualizar anuncio'>
			</form>
		</div>

	</div>
	
</body>
</html>