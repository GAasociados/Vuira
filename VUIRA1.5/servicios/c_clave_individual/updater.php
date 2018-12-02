<?php  

include "../DataConexion.php";

//$predialui = '14A009054001';//$_POST['predialui'];		

$sql = "SELECT Id_Bd, Fecha_Generacion_Documento FROM Cat_Informacion_Documentos";

$con = new conection();
$var = $con->executeQuerry($sql);
$data = [];

for($i = 0; $i < count($var); $i++)
{
	$aux = explode(" ", $var[$i]->Fecha_Generacion_Documento);
	if(count($aux) == 2)
	{
		$fecha = toDo($var[$i]->Fecha_Generacion_Documento);
		$con->sqlOperations("UPDATE Cat_Informacion_Documentos SET Fecha_Generacion_Documento = '" . $fecha . "' WHERE Id_Bd = " . $var[$i]->Id_Bd);

		print_r($fecha);
	}	
	echo "<br>";
}



function toDo($var)
{

	$aux = explode(" ", $var);
	$vars = explode("-", $aux[0]);
	$full = "";

	$d = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
	$m = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

	$sem = date("N", strtotime($aux[0]));

	$full = $d[($sem == 7) ? 0 : $sem] . ", " . $vars[2] . " de " . $m[intval($vars[1]) - 1] . " de " . $vars[0];

	return $full;
}

?>