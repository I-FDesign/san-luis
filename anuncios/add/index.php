<?php
 	require '../../admin/functions.php';
 	require 'new.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Añadir un anuncio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../../styles/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<?php require '../../message.php'; ?>
	<?php require '../back.php' ?>
	<div class="anuncio">
		<div class="info">
			<h2>Nuevo anuncio</h2>
			<div class="cant-dest">
				<p>Anuncios para destacar: <span><?php echo $cdest ?></span></p>
				<?php if($cdest < 1): ?>
					<div class="form-mp">
						<form action="../../sl-pays/procesar-pago/index.php" method="POST">
							  <script src="https://www.mercadopago.com.ar/integrations/v1/checkout.js"
							   data-public-key="TEST-678d9f8d-b6a2-42a5-9336-eb86e6c58664"
							   data-transaction-amount="500.00"
							   >
							  </script>
						</form>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="form">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post' enctype="multipart/form-data" >	
				<input type="text" name="titulo" placeholder="Titulo del anuncio">
				<input type="text" name="email" placeholder="Email de contacto">
				<!-- <input type="text" name="categoria" placeholder="Categoria del anuncio"> -->
				<div class="categoria">
					<select name='categoria' id='categoria' class='categorias'>
						<option value="tec">Tecnología</option>
						<option value="tel">Telefonos y dispositivos móviles</option>
						<option value="cam">Camaras y accesorios</option>
						<option value="ani">Animales y Mascotas</option>
						<option value="elec">Electrodomésticos</option>
						<option value="autos">Autos y Accesorios</option>
						<option value="motos">Motos y otros</option>
						<option value="inm">Inmuebles (alquileres)</option>
						<option value="comp">Computadoras y consolas</option>
						<option value="hogar">Hogar</option>
						<option value="ropa">Ropa y Calzado</option>
						<option value="deportes">Deportes</option>
						<option value="ind">Industria y Oficina</option>
						<option value="jardin">Jardín</option>
						<option value="sal">Salud y Belleza</option>
						<option value="art">Arte y Artesanías</option>
						<option value="baby">Bebes y Niños</option>
						<option value="hobbies">Hobbies y coleccionistas</option>
						<option value="servicios">Servicios</option>
						<option value="ent">Entradas para eventos</option>
						<option value="work">Trabajo y empleo</option>
						<option value="other">Otros</option>

					</select>
					<label for='categoria'>Escoge una categoria</label>
				</div>
				<textarea name="info" placeholder="Descripción del anuncio"></textarea>
				<input type="text" name="precio" placeholder="Precio del anuncio">
				<div class="img">
					<label for='thumb'>Ingresa una imagen de portada</label>
					<input type="file" name="thumb">
				</div>
				<div class="status">
					<label for='estado'>Deseas destacar el anuncio?</label>
					<input type="checkbox" name="estado" id='estado'>
				</div>
				<?php if(!empty($errores)): ?>
						<div class="error">
							<p><?php echo $errores ?></p>
						</div>
					<?php endif; ?>
				<input type="submit" name="env" value='Publicar anuncio'>
			</form>
		</div>

	</div>
	<script src="../../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src='../viewmore.js'></script>
</body>
</html>