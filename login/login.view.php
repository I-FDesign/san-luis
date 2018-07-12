<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Logueate</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<link rel="stylesheet" href="estilos/styles.css">
</head>
<body>
	<div class="contenedor">
		<div class="titulo">
			<h1><span>Log</span>In</h1>
		</div>
		<div class="formulario">
			<p class= 'info'>Logueate en San Luis Publica</p>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
				<div class="input">
					<input type="text" placeholder="Usuario" name='user' value='<?php if(isset($_POST['user'])) echo $_POST['user'] ?>'>
				</div>
				<div class="input">
					<input type="password" placeholder="Contraseña" name='pass'>
				</div>
				<?php if(!empty($errores)): ?>
					<p class='error'><?php  echo $errores; ?></p>
				<?php endif; ?>
				<input type="submit" name="login" value="Logueate" class='btn'>
			</form>
			<div class="areyou">
				<p>¿Aún no tienes una cuenta?</p>
				<a href="../registro/">Registrate</a>
			</div>
		</div>
	</div>
</body>
</html>
