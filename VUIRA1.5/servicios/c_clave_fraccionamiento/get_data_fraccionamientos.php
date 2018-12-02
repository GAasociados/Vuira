<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos();
$resultado = $objD->get_fraccionamientos($_POST['id']);
echo $resultado;



class dataFraccionamientos
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function get_fraccionamientos($id)
	{
		$query = "SELECT * FROM Claves_Catastrales_Fraccionamientos WHERE Id = '$id'";
		return json_encode($this->con->executeQuerry($query));
	}
}

?>