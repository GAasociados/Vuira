<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientosDetalles();
$resultado = $objD->get_fraccionamientos_detalles($_POST['id']);
echo $resultado;



class dataFraccionamientosDetalles
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function get_fraccionamientos_detalles($id)
	{
		$query = "SELECT * FROM Claves_Catastrales_Fraccionamientos_Detalles WHERE Id_Fraccionamientos = '$id'";
		return json_encode($this->con->executeQuerry($query));
	}
}

?>