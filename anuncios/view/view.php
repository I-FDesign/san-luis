<?php 
	if(isset($_GET['id'])){
		$id = (is_numeric($_GET['id'])) ? $_GET['id'] : 1;
	}else{
		$id = 1;
	}

	$conexion = conect();
	$statement = $conexion->prepare('
		SELECT * FROM anuncios WHERE id = :id
	');
	$statement->execute(array(':id' => $id));
	$resultado = $statement->fetch();

	if($resultado['categoria'] == 'tec'){
		$categoria = 'Tecnología';
	}
	if($resultado['categoria'] == 'tel'){
		$categoria = 'Telefonos y dispositivos móviles';
	}
	if($resultado['categoria'] == 'cam'){
		$categoria = 'Camaras y accesorios';
	}
	if($resultado['categoria'] == 'ani'){
		$categoria = 'Animales y Mascotas';
	}
	if($resultado['categoria'] == 'elec'){
		$categoria = 'Electrodomésticos';
	}
	if($resultado['categoria'] == 'autos'){
		$categoria = 'Autos y Accesorios';
	}
	if($resultado['categoria'] == 'motos'){
		$categoria = 'Motos y otros';
	}
	if($resultado['categoria'] == 'inm'){
		$categoria = 'Inmuebles (alquileres)';
	}
	if($resultado['categoria'] == 'comp'){
		$categoria = 'Computadoras y consolas';
	}
	if($resultado['categoria'] == 'hogar'){
		$categoria = 'Hogar';
	}
	if($resultado['categoria'] == 'ropa'){
		$categoria = 'Ropa y Calzado';
	}
	if($resultado['categoria'] == 'deportes'){
		$categoria = 'Deportes';
	}
	if($resultado['categoria'] == 'ind'){
		$categoria = 'Industria y Oficina';
	}
	if($resultado['categoria'] == 'jardin'){
		$categoria = 'Jardín';
	}
	if($resultado['categoria'] == 'sal'){
		$categoria = 'Salud y Belleza';
	}
	if($resultado['categoria'] == 'art'){
		$categoria = 'Arte y Artesanías';
	}
	if($resultado['categoria'] == 'baby'){
		$categoria = 'Bebes y Niños';
	}
	if($resultado['categoria'] == 'hobbies'){
		$categoria = 'Hobbies y coleccionistas';
	}
	if($resultado['categoria'] == 'servicios'){
		$categoria = 'Servicios';
	}
	if($resultado['categoria'] == 'ent'){
		$categoria = 'Entradas para eventos';
	}
	if($resultado['categoria'] == 'work'){
		$categoria = 'Trabajo y empleo';
	}
	if($resultado['categoria'] == 'other'){
		$categoria = 'Otros';
	}
	if(!isset($categoria)){
		$categoria = $resultado['categoria'];
	}

 ?>