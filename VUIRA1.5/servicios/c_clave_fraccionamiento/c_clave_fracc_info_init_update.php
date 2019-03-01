<?php
include_once( "../DataConexion.php");


$objD = new dataFraccionamientos_info_init();
$resultado = $objD->insert_fraccionamientos($_POST['Id'],$_POST['caracter'],$_POST['superficie_terreno'],$_POST['numero_escritura'],
$_POST['nombre_notario'],$_POST['numero_notario'],$_POST['fecha_escritura'],$_POST['numero_oficio'],$_POST['estado_escitura'],
$_POST['ciudad_escritura'],$_POST['area_privativa'],$_POST['area_comun'],$_POST['area_cubierta'],$_POST['indiviso'],
$_POST['porcentaje_indiviso'],$_POST['descubierta']);

class dataFraccionamientos_info_init
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function insert_fraccionamientos($id,$caracter,$superficie,$numeroEscritura,$notario,$numeroNotario,$fecha,$numeroOficio,$estado,$ciudad,$area_privativa,$area_comun,$area_cubierta,$idiviso,$porcentaje_indiviso,$area_descubierta)
	{
		$query = "UPDATE Claves_Catastrales_fracc_info_init
		SET caracter='$caracter',superficie_terreno='$superficie',numero_escritura='$numeroEscritura',nombre_notario='$notario',numero_notario='$numeroNotario',fecha_escrituras='$fecha',numero_oficio='$numeroOficio',entidad_federativa='$estado',ciudad_escrituras='$ciudad',area_privativa=$area_privativa,area_comun=$area_comun,area_cubierta=$area_cubierta,indiviso=$idiviso,porcentaje_indiviso=$porcentaje_indiviso,area_descubierta=$area_descubierta
		WHERE Id_Fraccionamientos = {$id}";
		$mensaje = $this->con->sqlOperations($query);
		return $mensaje;
	}
}
?>
