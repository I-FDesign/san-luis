<?php 
	
	if(isset($_SESSION['sl_user'])){
		$conexion = conect();
		$statement = $conexion->prepare('SELECT * FROM anuncios WHERE estado = :estado');
		$statement->execute(array(':estado' => 'premium'));
		$resultados = $statement->fetchAll();

		$factual = strtotime(date("d-m-Y H:i:00", time())) - 17960;

		for ($i=0; $i < count($resultados) ; $i++) { 
			if($resultados[$i]['estado'] == 'premium' && $resultados[$i]['fpremium'] !== '0' && $resultados[$i]['fpremium'] !== ''){
				$fpremium = $resultados[$i]['fpremium'];
				$fpremium = $fpremium = strtotime($fpremium);
				if($factual > $fpremium){
					$conexion = conect();
					$statement = $conexion->prepare('UPDATE anuncios SET estado = :estado WHERE id = :id');
					$statement->execute(array(':estado' => 'common', ':id' => $resultados[$i]['id']));
				}
			}
		}
	}else{
		header('Location: ../');
	}



 ?>