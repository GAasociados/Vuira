<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors",1);
ini_set('display_startup_errors', 1);
include_once( "../DataConexion.php");


$obj = new auxiliarFracc();

//print_r($obj->getClave(15));

if(isset($_GET['service_name']))
{
	switch ($_GET['service_name'])
	{
		case 'asignacion':
			print_r(json_encode($obj->getAsignacion(isset($_GET['idaux']) ? $_GET['idaux'] : -1), JSON_UNESCAPED_SLASHES));
			break;

		case 'clave':
			print_r(json_encode($obj->getClave(isset($_GET['idusr']) ? $_GET['idusr'] : -1), JSON_UNESCAPED_SLASHES));
			break;

		case 'asignacion_fraccionamiento':
			print_r(json_encode($obj->asignarFraccionamiento(isset($_POST['idAuxiliar']) ? $_POST['idAuxiliar'] : -1,
										isset($_POST['idFraccionamiento']) ? $_POST['idFraccionamiento'] : -1,
										isset($_POST['BlockSize']) ? $_POST['BlockSize'] : -1)));
		break;

		case 'get_asignados_fraccionamiento':
			print_r(json_encode($obj->getAsignadosFraccionamiento(isset($_POST['idFraccionamiento']) ? $_POST['idFraccionamiento'] : -1)));
		break;

		case 'get_no_asignados_fraccionamiento':
			print_r(json_encode($obj->getNoAsigned(isset($_POST['idFraccionamiento']) ? $_POST['idFraccionamiento'] : -1)));
		break;

		case 'get_All_Auxiliares':
			print_r(json_encode($obj->getAllAuxiliares()));
		break;

		default:
			echo "El servicio no existe. / Service doesn't exist.";
			break;
	}
}

class auxiliarFracc
{
	public function __construct()
	{
		$this->con = new conection();
	}

	public function costo()
	{
		return $this->con->executeQuerry("SELECT * FROM costos_tramite WHERE tipo IN (1,2)");
	}

	public function getAsignacion($id)
	{
		return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE status >= 3 AND validacion  = 0 AND auxiliar = '" . $id . "'");
	}

	public function getByIdAdmin($id)
	{
		return $this->con->executeQuerry("SELECT * FROM claves_catastrales_fraccionamiento WHERE ID = '" . $id . "'")[0];
	}

	public function getAllAuxiliares()
	{
		$sql="SELECT ID, nombres,apellido_pat,apellido_mat FROM usuarios WHERE tipo_usu='155' or tipo_usu='1555'";
		return $this->con->executeQuerry($sql);
	}

	public function getDocumento($idus, $tipo)
	{
		switch ($tipo)
		{
			case 'INE':
				$data = $this->con->executeQuerry("SELECT id, tipo_documento, archivo, fecha FROM documentos_ciudadano WHERE tipo_documento = 'INE' AND usuarios_ID = '$idus'");
				break;
			case 'PREDIAL':
				$data = $this->con->executeQuerry("SELECT id, tipo_documento, archivo, fecha FROM documentos_ciudadano WHERE tipo_documento = 'PREDIAL' AND usuarios_ID = '$idus'");
				break;
			case 'Numero Oficial':
				$data = $this->con->executeQuerry("SELECT id, tipo_documento, archivo, fecha FROM documentos_ciudadano WHERE tipo_documento = 'Numero Oficial' AND usuarios_ID = '$idus'");
				break;
		}
		return ($data) ? $data[0] : ["id" => "", "tipo_documento" => "", "archivo" => "", "fecha" => ""];
	}

	public function getNoAsigned($idFraccionamiento)
	{
		$sql = "SELECT count(dt.Cuenta_Predial) as Sin_Asignar FROM `Claves_Catastrales_Fraccionamientos_Detalles` as dt WHERE dt.id_Fraccionamientos = $idFraccionamiento and dt.Cuenta_Predial NOT IN(select da.Cuenta_Predial from Claves_Catastrales_Fraccionamientos_Asignacion as da where da.Id_Fraccionamiento=$idFraccionamiento) ;";
		return $this->con->executeQuerry($sql);
	}

	public function getNoAsigned_Details($idFraccionamiento)
	{
		$sql = "SELECT dt.Cuenta_Predial FROM `Claves_Catastrales_Fraccionamientos_Detalles` as dt WHERE dt.id_Fraccionamientos = $idFraccionamiento and dt.Cuenta_Predial NOT IN(select da.Cuenta_Predial from Claves_Catastrales_Fraccionamientos_Asignacion as da where da.Id_Fraccionamiento=$idFraccionamiento) ;";
		return $this->con->executeQuerry($sql);
	}

	public function asignarFraccionamiento($idAuxiliar,$idFraccionamiento,$BlockSize)
	{
		$count =0;
		$notAsigned = $this->getNoAsigned_Details($idFraccionamiento);
		while($count < $BlockSize)
		{
			$data["Id_Fraccionamiento"]= $idFraccionamiento;
			$data["Cuenta_Predial"]=$notAsigned[$count]->Cuenta_Predial;
			$data["Id_Auxiliar"]=$idAuxiliar;
			$data["Fecha"]=date('Y-m-d H:i:s');
			$this->asignaInsert($data);
			$count++;
		}
	}

	public function asignaInsert($data)
	{
        //$data = ["Id_Fraccionamientos" => "", "Cuenta_Predial" => "", "Calle" => "", "Numero_Ext" => "", "Numero_Int" => "", "Colonia" => ""];
        $fieldvals = $this->getFieldsVals($data);
        $sql = "INSERT INTO Claves_Catastrales_Fraccionamientos_Asignacion $fieldvals[0] VALUES $fieldvals[1];";
        echo $sql;
        return $this->con->sqlOperations($sql);
	}



	public function getAsignadosFraccionamiento($idFraccionamiento)
	{
		$sql = "SELECT asi.Id_Auxiliar, count(asi.Id_Auxiliar) as asignados, concat(u.nombres, ' ', u.apellido_pat, ' ', u.apellido_mat) as Nombre FROM Claves_Catastrales_Fraccionamientos_Asignacion as asi INNER JOIN usuarios as u on u.ID = asi.Id_Auxiliar  WHERE asi.Id_Fraccionamiento = '" . $idFraccionamiento . "' GROUP BY Id_Auxiliar;";
		return $this->con->executeQuerry($sql);
	}

	public function getClave($id)
	{
		$data = $this->getByIdAdmin($id);
		$data->INE = $this->getDocumento($data->usuarioID, "INE");
		$data->predial = $this->getDocumento($data->usuarioID, "PREDIAL");
		$data->noficial = $this->getDocumento($data->usuarioID, "Numero Oficial");
		return $data;
	}

	function getFieldsVals($data)
    {
        $fields = "(";
        $values = "(";
        foreach(array_keys($data) AS $key)
        {
            $fields .= $key . ",";
            if($key == "Id_Fraccionamientos")
                $values .= "" . $data[$key] . ",";
            else
                $values .= "'" . $data[$key] . "',";
        }
        $fields = trim($fields, ",") . ")";
        $values = trim($values, ",") . ")";
        return [$fields, $values];
    }
}

?>
