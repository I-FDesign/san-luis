<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Registrate</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
	<div class="contenedor">
		<div class="titulo">
			<h1><span>RE</span>GISTRATE</h1>
		</div>
		<div class="formulario">
			<p class= 'info'>Registrate en San Luis publica</p>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
				<div class="input">
					<input type="text" placeholder="Nombre" name='name' value='<?php if(isset($_POST['name'])) echo $_POST['name'] ?>'>
				</div>
				<div class="input">
					<input type="text" placeholder="Email" name='email' value='<?php if(isset($_POST['email'])) echo $_POST['email'] ?>'>
				</div>
				<div class="input">
					<input type="text" placeholder="Usuario" name='user' value='<?php if(isset($_POST['user'])) echo $_POST['user'] ?>'>
				</div>
				<div class="input">
					<input type="password" placeholder="Contraseña" name='pass'>
				</div>
				<div class="input">
					<input type="password" placeholder="Repetir contraseña" name='rpass' class='rpass'>
				</div>
				<?php if(!empty($errores)): ?>
					<p class='error'><?php  echo $errores; ?></p>
				<?php endif; ?>
				<input type="submit" name="registro" value="Registrate" class='btn'>
			</form>
			<div class="areyou">
				<p>¿Ya tienes una cuenta?</p>
				<a href="../login/">Logueate</a>
			</div>
		</div>
	</div>
</body>
</html>
