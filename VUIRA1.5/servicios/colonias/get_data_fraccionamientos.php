<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once( "../DataConexion.php");

//$objD = new dataFraccionamientos();

if ( !isset($_POST['id']) ) 
{
	$id = ;
	//$objD->get_fraccionamientos($_POST['id']);
	echo "ENTRA AL WS";
}
else
{
	//NO HAY PARAMETRO
	echo "Error";
} 

/*
class dataFraccionamientos
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function get_fraccionamientos($id)
	{
		$query = "SELECT * FROM Claves_Catastrales_Fraccionamientos where Id = '$id'";
		return json_encode($this->con->sqlOperations($query), JSON_UNESCAPED_SLASHES));
	}
}*/

?>