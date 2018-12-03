<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos_detalles();
$resultado = $objD->insert_fraccionamientos_detalle($_POST['id'], $_POST['cuenta_predial'], $_POST['calle'], $_POST['numero_ext'], 
	$_POST['numero_int'], $_POST['colonia'], $_POST['id_clave']);
echo $resultado;



class dataFraccionamientos_detalles
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function insert_fraccionamientos_detalle($id, $cuenta_predial, $calle, $numero_ext, $numero_int, $colonia, $id_clave)
	{
		$query = "INSERT INTO Claves_Catastrales_Fraccionamientos_Detalles(Id_Fraccionamientos, Cuenta_Predial, Calle, Numero_Ext, Numero_Int, Colonia, Id_Clave) 
			VALUES ($id, '$cuenta_predial', '$calle', $numero_ext, '$numero_int', '$colonia', $id_clave)";
		$mensaje = $this->con->executeSimpleQuery($query);
		return $mensaje;
	}
}
?>