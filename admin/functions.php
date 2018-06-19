<?php 
	function conect($bd){
		$conexion = new PDO("mysql:host=localhost;dbname=$bd", 'root', '');
		return $conexion;
	}

	function cleanDates($variable){
		$variable = trim($variable);
		$variable = filter_var($variable, FILTER_SANITIZE_STRING);
		return $variable;
	}


 ?>