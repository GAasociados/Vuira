<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos_detalles();
$resultado = $objD->delete_fraccionamientos_detalle( $_POST['id'], $_POST['cuenta_predial']);
echo $resultado;



class dataFraccionamientos_detalles
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function delete_fraccionamientos_detalle( $id, $cuenta_predial)
	{
		$query = "DELETE FROM Claves_Catastrales_Fraccionamientos_Detalles WHERE Id_Fraccionamientos = $id and Cuenta_Predial = '$cuenta_predial'";
		$mensaje = $this->con->sqlOperations($query);
		return $mensaje;
	}
}
?>