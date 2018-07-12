<?php session_start();
	require 'admin/functions.php';
	$conexion = conect();

//Categoria
	$categoria = (isset($_GET['cat']) && !is_numeric($_GET['cat']) && !empty($_GET['cat']))  ? $_GET['cat'] : 'all';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>San Luis Publica</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 
	<!-- <link rel="stylesheet" type="text/css" href="styles/font-awesome.min.css"> -->
	<script src="https://use.fontawesome.com/2d83eb3d68.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">

</head>
<body>
	<header>
		<div class="mobile-menu">
			<div class="content">
				<h1>San Luis Publica</h1>
				<i class="fa fa-bars" aria-hidden="true" id='show-menu'></i>
			</div>
		</div>
		<?php require 'message.php'; ?>
		<div class="head">
			<img src="img/thumb.png">
			<div class="content">			
				<div class="nav">
					<nav id='menu'>
						<a href="#" id='listado'>Listado</a>
						<div class="categorias">
							<a href="#">Categorias</a>
							<i class="fa fa-sort-desc" aria-hidden="true"></i>
						</div>
						<a href="#" id='howto'>Como usar el sitio</a>
						<a href="#" id='contacto'>Contacto</a>
					</nav>
				</div>
			</div>
			<div class="categories">
				<a href="?cat=tec">Tecnología</a href="?cat=all">
				<a href="?cat=tel">Telefonos y dispositivos móviles</a href="?cat=all">
				<a href="?cat=cam">Camaras y accesorios</a href="?cat=all">
				<a href="?cat=ani">Animales y Mascotas</a href="?cat=all">
				<a href="?cat=elec">Electrodomésticos</a href="?cat=all">
				<a href="?cat=autos">Autos y Accesorios</a href="?cat=all">
				<a href="?cat=motos">Motos y otros</a href="?cat=all">
				<a href="?cat=inm">Inmuebles (alquileres)</a href="?cat=all">
				<a href="?cat=comp">Computadoras y consolas</a href="?cat=all">
				<a href="?cat=hogar">Hogar</a href="?cat=all">
				<a href="?cat=ropa">Ropa y Calzado</a href="?cat=all">
				<a href="?cat=deportes">Deportes</a href="?cat=all">
				<a href="?cat=ind">Industria y Oficina</a href="?cat=all">
				<a href="?cat=jardin">Jardín</a href="?cat=all">
				<a href="?cat=sal">Salud y Belleza</a href="?cat=all">
				<a href="?cat=art">Arte y Artesanías</a href="?cat=all">
				<a href="?cat=baby">Bebes y Niños</a href="?cat=all">
				<a href="?cat=hobbies">Hobbies y coleccionistas</a href="?cat=all">
				<a href="?cat=servicios">Servicios</a href="?cat=all">
				<a href="?cat=ent">Entradas para eventos</a href="?cat=all">
				<a href="?cat=work">Trabajo y empleo</a href="?cat=all">
				<a href="?cat=other">Otros</a href="?cat=all">
			</div>
		</div>
	</header>
	<section class="main">
		<div class="herramientas">
			<div class="content">
				<div class="menu">
					<h1>San Luis Publica</h1>
					<div class="menu-btns">
						<?php if(!isset($_SESSION['sl_user'])): ?>
							<div class="login" id='login'>
								<i class="fa fa-user" aria-hidden="true"></i>
								<p>Login</p>
							</div>
						<?php endif; ?>

						<?php if(isset($_SESSION['sl_user'])): ?>
							<div class="loged">
								<div class="loged-user">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								<div class="loged-arrow">
									<i class="fa fa-sort-desc" aria-hidden="true">	</i>
								</div>
							</div>
						<?php endif; ?>
						<div class="añadir" id='add'>
							<i class="fa fa-plus" aria-hidden="true"></i>
						</div>
						<div class="buscar">
							<i class="fa fa-search" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="user-options">
			<div class="my-anun">
				<i class="fa fa-list" aria-hidden="true"></i>
				<p>Mis anuncios</p>
			</div>
			<div class="logout">
				<i class="fa fa-sign-out" aria-hidden="true"></i>
				<p>Cerrar Sesión</p>
			</div>
		</div>
		<?php require 'search.php'; ?>
		<div class="search">
			<div class="content">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = 'get'>
					<input type="text" placeholder="Buscar" name='search'>
					<input type="submit" value='Buscar' name='find'>
				</form>
			</div>
		</div>

		<!--Datos que se mostraran si se realiza una busqueda  -->

		<?php if(isset($_GET['find']) && !empty($_GET['search']) && !empty($busqueda)): ?>
			<style type="text/css">
				.search{
					visibility: visible;
				}
			</style>
			
			<div class="comunes">
			<div class="titulo">
					
					<div class="tit" style='width: 90%; padding-bottom: 9px; border-bottom: 1px solid rgba(0,0,0,.7)'>
						<?php echo $message ?></div>
			</div>
			<div class="commons">

				<!-- Obteniendo anuncios desde la BD -->
				<?php if($categoria == 'all'){
							$statement = $conexion->prepare('SELECT * FROM anuncios WHERE estado = :estado LIMIT 8');
							$statement->execute(array(':estado' => 'common'));
							$resultados_c = $statement->fetchAll();
						}else{
								$statement = $conexion->prepare('SELECT * FROM anuncios WHERE categoria = :categoria AND estado = :estado');
								$statement->execute(array(
									':categoria' => $categoria,
									':estado' => 'common'
								));
								$resultados_c = $statement->fetchAll();
							} 
				?>

				<!-- Mostrandolos en pantalla -->
				<?php foreach($resultados as $resultado): ?>

					<div class="common" value='<?php echo $resultado['id'] ?>' style='width: 100%'>
						<img src="img/anuncios/<?php echo $resultado['thumb'] ?>" alt="<?php echo $resultado['titulo'] ?>" width="150" height="200">
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
									<div class="precio">
										<p>Precio: <span><?php echo $resultado['precio'] ?></span></p>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>
			</div>

		<?php endif; ?>

		<!--Datos que se mostraran si no se realiza una busqueda  --> 

		<?php if(!isset($busqueda)): ?>
		<div class="destacados">
			<div class="content">
				<div class="viewmore">
					<p class='vm_d'>Ver más</p>
					<div class="vm-icon vm_d">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</div>
				</div>
				<div class="titulo">
					<div class="border"></div>
					<div class="tit">Destacados</div>
					<div class="border"></div>
				</div>
				<div class="d-anuncios">

					<!-- Obteniendo anuncios desde la BD -->
						<?php if($categoria == 'all'){
							$statement = $conexion->prepare('SELECT * FROM anuncios WHERE estado = :estado');
							$statement->execute(array(':estado' => 'premium'));
							$resultados_d = $statement->fetchAll();
							}else{
								$statement = $conexion->prepare('SELECT * FROM anuncios WHERE categoria = :categoria AND estado = :estado');
								$statement->execute(array(
									':categoria' => $categoria,
									':estado' => 'premium'
								));
								$resultados_d = $statement->fetchAll();
							} 
						?>

					<!-- Mostrandolos en pantalla -->
						<?php foreach($resultados_d as $resultado): ?>

							<div class="anuncio" value='<?php echo $resultado['id'] ?>'>
								<img src="img/anuncios/<?php echo $resultado['thumb'] ?>" alt="<?php echo $resultado['titulo'] ?>" height="170" width="250">
								<div class="text">
									<p class="tit"><?php echo $resultado['titulo'] ?></p>
									<p class="info"><?php echo $resultado['descripcion'] ?></p>
								</div>
							</div>

						<?php endforeach; ?>
				</div>
			</div> 
		</div> 
		<div class="comunes">
			<div class="content">
				<div class="viewmore">
					<p class='vm_c'>Ver más</p>
					<div class="vm-icon vm_c">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="titulo">
					<div class="border"></div>
					<div class="tit">Comunes</div>
					<div class="border"></div>
			</div>
			<div class="commons">

				<!-- Obteniendo anuncios desde la BD -->
				<?php if($categoria == 'all'){
							$statement = $conexion->prepare('SELECT * FROM anuncios WHERE estado = :estado LIMIT 8');
							$statement->execute(array(':estado' => 'common'));
							$resultados_c = $statement->fetchAll();
						}else{
								$statement = $conexion->prepare('SELECT * FROM anuncios WHERE categoria = :categoria AND estado = :estado');
								$statement->execute(array(
									':categoria' => $categoria,
									':estado' => 'common'
								));
								$resultados_c = $statement->fetchAll();
							} 
				?>

				<!-- Mostrandolos en pantalla -->
				<?php foreach($resultados_c as $resultado): ?>

					<div class="common" value='<?php echo $resultado['id'] ?>'>
						<img src="img/anuncios/<?php echo $resultado['thumb'] ?>" alt="<?php echo $resultado['titulo'] ?>" width="150" height="200">
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
			</div> 
		</div>
		<?php endif; ?>
		<div class="comousar">
			<div class="titulo">
				<div class="border"></div>
				<div class="tit">
					<p>Ayuda</p>
				</div>
				<div class="border"></div>
			</div>
			<div class="ayuda">
				<ul>
					<li>Crear una cuenta.</li>
					<p>Dirigete a la seccion de Login en la parte superior de la pagina, una vez alli clickea en el botón "¿Aun no tienes una cuenta?" e ingresa los datos que se te pidan.</p>
					<li>Publicar un anuncio.</li>
					<p>Dirigete a la seccion superior de la pagina y haz click en el boton "+", una vez alli ingresa informacion, imagenes, etc sobre el anuncio a publicar.</p>
					<li>Destacar el anuncio. <span>(Opcional)</span></li>
					<p>La opcion de destacar el anuncio es muy util ya que permite que tu anuncio aparezca hasta arriba en el listado, dandote asi un mayor trafico en tu anuncio. Puedes acceder a esta caracteristica por un precio razonable dirigiendote a la seccion de agregar anuncio y comprando un anuncio destacado, los anuncios destacados son ILIMITADOS.</p>
				</ul>
			</div>
		</div>
	<!-- --------------------Contacto-------------------- -->
	<?php require 'contacto/index.php'; ?>
	<!-- ------------------------------------------------ -->
	</section>
	<footer>
		<div class="sanluis">
			<p>San Luis Publica - 2018  &copy;</p>
		</div>
		<div class="king">
			<p>Desarrollado por I&F Design</p>
		</div>
	</footer>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src='js/efects.js'></script>
	<script type="text/javascript" src='js/application.js'></script>
</body>
</html>