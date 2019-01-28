<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos_info_init();
$resultado = $objD->insert_fraccionamientos($_POST['id']);

class dataFraccionamientos_info_init
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function insert_fraccionamientos($id,$caracter,$superficie,$numeroEscritura,$notario,$numeroNotario,$fecha,$numeroOficio,$estado,$ciudad)
	{
		$query = "INSERT INTO Claves_Catastrales_fracc_info_init(Id_Fraccionamientos)
					VALUES({$id})";
		$mensaje = $this->con->sqlOperations($query);
		return $mensaje;
	}
}
?>
