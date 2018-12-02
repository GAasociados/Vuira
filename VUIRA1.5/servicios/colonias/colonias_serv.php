<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once( "../DataConexion.php");


$obj = new colonia();


if(isset($_GET['service_name']))
{
	switch ($_GET['service_name'])
	{
		case 'colonias':
			print_r(json_encode($obj->getColonias(), JSON_UNESCAPED_SLASHES));
			break;

		case 'colonias_predial':
			print_r(json_encode($obj->getColoniasPredial(), JSON_UNESCAPED_SLASHES));
			break;

		case 'colonia_datos':
			print_r(json_encode($obj->getAllDataColoniaById(isset($_GET['id']) ? $_GET['id'] : -1 ), JSON_UNESCAPED_SLASHES));
			break;

		case 'colonia_predial_datos':
			print_r(json_encode($obj->getAllDataColoniaByIdPredial(isset($_GET['id']) ? $_GET['id'] : -1 ), JSON_UNESCAPED_SLASHES));
			break;

		default:
			echo "El servicio no existe. / Service doesn't exist.";
			break;
	}
}

class colonia
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function getColonias()
	{
		return $this->con->executeQuerry("SELECT * FROM cat_cor_colonias ORDER BY nombre");
	}

	public function getColoniasPredial()
	{
		return $this->con->executeQuerry("SELECT * FROM cat_colonia_predial ORDER BY nombre");
	}

/*public function getCPById($id)
	{
		return $this->con->executeQuerry("SELECT codigo_postal FROM colonias WHERE ID = '" . $id . "' LIMIT 1");
	}

	public function getColoniaById($id)
	{
		return $this->con->executeQuerry("SELECT NOMBRE FROM cat_cor_colonias WHERE COLONIA_ID = '" . $id . "' LIMIT 1");
	}
*/
	public function getAllDataColoniaById($id)
	{
		$sql = "SELECT * FROM cat_cor_colonias WHERE COLONIA_ID = " . $id . " LIMIT 1";
		$data = $this->con->executeQuerry($sql);
		//echo $sql;
		if($data)
			return $data[0];
		else
		{
			return ["COLONIA_ID" => "", "TIPO_COLONIA_ID" => "", "ZONA_ID" => "", "DISTRITO_ID" => "", "NOMBRE" => ""];
		}
	}

	public function getDataCalleById($id)
	{
		$data = $this->con->executeQuerry("SELECT * FROM natural7_vuira.cat_cor_calles WHERE CALLE_ID = " . $id . " LIMIT 1");

		if($data)
			return $data[0];
		else
		{
			return ["CALLE_ID" => "", "VALIDAD_ID" => "", "NOMBRE" => ""];
		}
	}

	public function getAllDataColoniaByIdPredial($id)
	{
		$data = $this->con->executeQuerry("SELECT * FROM cat_colonia_predial WHERE COLONIA_ID = '" . $id . "' LIMIT 1");

		if($data)
			return $data[0];
		else
		{
			return ["NOMBRE" => "", "COLONIA_ID" => "", "CLAVE" => "", "ESTATUS" => ""];
		}
	}
}
