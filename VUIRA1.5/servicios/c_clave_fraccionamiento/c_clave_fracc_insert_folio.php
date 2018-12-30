<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos_detalles();
$resultado = $objD->insert_fraccionamientos_detalle($_POST['id'],$_POST['cuenta_predial'],$_POST['folio']);
echo $resultado;



class dataFraccionamientos_detalles
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function insert_fraccionamientos_detalle($id,$cuenta_predial,$folio)
	{
		$query = "UPDATE Claves_Catastrales_Fraccionamientos_Detalles
				SET Folio = $folio
				WHERE Claves_Catastrales_Fraccionamientos_Detalles.Cuenta_Predial = '$cuenta_predial'
				AND Claves_Catastrales_Fraccionamientos_Detalles.Id_Fraccionamientos = '$id'";
		$mensaje = $this->con->sqlOperations($query);
		return $mensaje;
	}
}
?>
