<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

$mensaje = "Error";
if (isset($_GET['no'])) {
	$archivo = fopen("../../../assets/no_seguimiento_bk.txt", "r");
	$linea = fgets($archivo);
	$valor = intval($linea);
	$contador = $valor + $_GET['no'];
	fclose($archivo);

	$numeros_consecutivos = [];

	for ($i=$valor; $i < $contador; $i++) { 
		$numeros_consecutivos[$i] = $i;
	}
	$archivo = fopen("../../../assets/no_seguimiento_bk.txt", "w+");
	fputs($archivo, $contador);
	fclose($archivo);
	echo json_encode($numeros_consecutivos);
}
?>