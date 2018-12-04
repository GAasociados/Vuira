<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientosDetalles();
$resultado = $objD->get_clave($_POST['id']);
$obj = json_decode($resultado);
$bandera = true;
for ($i = 0; $i < count($obj); $i++)
{
	if ( $obj[$i]->Id_Clave == 0 || empty($obj[$i]->Id_Clave) )
	{
		$bandera = false;
	}
}

if ( $bandera )
	echo $objD->update_fraccionamiento($_POST['id']);
else
	echo "Error";

class dataFraccionamientosDetalles
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function get_clave($id)
	{
		$query = "SELECT * FROM Claves_Catastrales_Fraccionamientos_Detalles WHERE Id_Fraccionamientos = '$id'";
		return json_encode($this->con->executeQuerry($query));
	}

	public function update_fraccionamiento($id)
	{
		$query = "UPDATE Claves_Catastrales_Fraccionamientos 
		SET Status = 'terminado' 
		WHERE Id = {$id}";
		$mensaje = $this->con->sqlOperations($query);
		return $mensaje;
	}
}

?>