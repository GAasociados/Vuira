<?php  

include "../DataConexion.php";

//$predialui = '14A009054001';//$_POST['predialui'];

$predialui = isset($_POST['predialui']) ? $_POST['predialui'] : (isset($_GET['predialui']) ? $_GET['predialui'] : null);
		

$sql = "SELECT ID, nombrepropietariodp, nombreresolicitante, clave, predialui, domicilio, telefonodp, tipotramitedp, motivotramitedp, tipopersona, fisrfc, acta_const, poder_nota, morine, doctolegalpropiedad, doctopredial,status,numerocontrol FROM claves_catastrales_individual WHERE predialui = '$predialui'";

$con = new conection();
$var = $con->executeQuerry($sql);
$data = [];

for($i = 0; $i < count($var); $i++)
{
	$data[$i] = $var[$i];
	$var2 = $con->executeQuerry("SELECT Iniciales_Func FROM Cat_Informacion_Documentos WHERE Id_Bd = " . $var[$i]->ID);
	$data[$i]->Iniciales = $var2[0]->Iniciales_Func;
}

print_r(json_encode($data, JSON_UNESCAPED_SLASHES));		

?>