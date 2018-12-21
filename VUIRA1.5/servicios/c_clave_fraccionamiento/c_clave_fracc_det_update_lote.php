<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos_detalles();
$resultado = $objD->insert_fraccionamientos_detalle($_POST['id'],$_POST['cuenta_predial'],$_POST['valor']);
echo $resultado;



class dataFraccionamientos_detalles
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function insert_fraccionamientos_detalle($id,$cuenta_predial,$valor)
	{
		$query = "UPDATE claves_catastrales_fraccionamientos_detalles 
				SET Lote = '$valor'
				WHERE claves_catastrales_fraccionamientos_detalles.Cuenta_Predial = '$cuenta_predial'
				AND claves_catastrales_fraccionamientos_detalles.Id_Fraccionamientos = {$id}";
		$mensaje = $this->con->sqlOperations($query);
		return $mensaje;
	}
}
?>