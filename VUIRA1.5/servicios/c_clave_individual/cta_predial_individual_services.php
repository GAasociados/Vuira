<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

include_once( "../DataConexion.php");


class Cuenta_Predial_Services
{
	public function updateStatus($id,$status)
	{

		$sql = "UPDATE claves_catastrales_individual set status=".$status." where ID='".$id."'";
		//echo $sql;
		$con = new conection();
		$con->sqlOperations($sql);
	}

	public function deleteDocumentoClave($id)
	{
		$sql = "DELTE FROM Cat_Informacion_Documentos WHERE Id_Bd='".$id."'";
		//echo $sql;
		$con = new conection();
		$con->sqlOperations($sql);
	}

	public function comprobarDocumentos($id)
	{
		$sql = "select c.doctopago, d.Croquis_URL, c.autocat from claves_catastrales_individual as c  left JOIN Cat_Informacion_Documentos as d on c.ID=d.Id_Bd  where ID='".$id."'";
		$con = new conection();
		$RES=$con->executeQuerry($sql);
		return $RES;
	}

	public function agregar_clave_Individual($data)
	{
		$fieldvals = $this->getFieldsVals($data);
		$con = new conection();
		$sql="INSERT INTO claves_catastrales_individual $fieldvals[0] VALUES $fieldvals[1]";
        return $con->sqlOperations($sql);
	}

	public function agregar_clave_Individual_doc($data)
	{
		$fieldvals = $this->getFieldsVals($data);
		$con = new conection();
		$sql="INSERT INTO Cat_Informacion_Documentos $fieldvals[0] VALUES $fieldvals[1]";
        return $con->sqlOperations($sql);
	}

	public function process_fraccionamiento_individual($dataBase,$dataDoc)
	{
		if($dataDoc["ID_Bd"]=="")
		{
			$id = $this->agregar_clave_Individual($dataBase);

			if($id!="")
			{
				$dataDoc["ID_Bd"]=$id;
				$this->agregar_clave_Individual_doc($dataDoc);
			}
		}
		else
		{
			$id=	$dataDoc["ID_Bd"];
			$this->doctoUpdate($dataDoc,$id);
		}
		echo $id;
		return $id;
	}

	public function doctoUpdate($data, $id)
	{
			$con = new conection();
			$ups = "";
			foreach(array_keys($data) AS $key)
			{
					if($key != "Id_Bd")
							$ups .= "$key = '" . $data[$key] . "',";
			}
			$ups = trim($ups, ",") . " ";
			$sql = "UPDATE Cat_Informacion_Documentos SET $ups WHERE Id_Bd = '$id'";
			return $con->sqlOperations($sql);
	}

	function getFieldsVals($data)
    {
        $fields = "(";
        $values = "(";
        foreach(array_keys($data) AS $key)
        {
            $fields .= $key . ",";
            $values .= "'" . $data[$key] . "',";
        }
        $fields = trim($fields, ",") . ")";
        $values = trim($values, ",") . ")";
        return [$fields, $values];
    }

}
	if(isset($_GET["service_name"]))
	{
		if($_GET["service_name"] == "update_status")
		{
			if(isset($_POST["id"]) and isset($_POST["status"]))
			{
				$obj = new Cuenta_Predial_Services();
				$obj->updateStatus($_POST["id"],$_POST["status"]);
				echo "Operación Exitosa";
			}
			else
			{
				echo "Error de parámetros";
			}
		}
		else if ($_GET["service_name"] == "regresar_tramite")
		{
			if(isset($_POST["id"]))
			{
				$obj = new Cuenta_Predial_Services();
				$obj->updateStatus($_POST["id"],2);
				$obj->deleteDocumentoClave($_POST["id"]);
			}
			else
			{
				echo "Error de parámetros";
			}
		}
		else if ($_GET["service_name"] == "comprobar_documentos")
		{

			$obj = new Cuenta_Predial_Services();
			return print_r (json_encode($obj->comprobarDocumentos($_POST["id"])));

		}
		else if ($_GET["service_name"] == "agregar_clave")
		{
			if(isset($_POST["data"]))
			{
				$obj = new Cuenta_Predial_Services();
				json_encode($obj->agregar_clave_Individual($_POST["data"]));
			}
			else
			{
				echo "Error de parámetros";
			}
		}
		else if ($_GET["service_name"] == "agregar_clave_Doc")
		{
			if(isset($_POST["data"]))
			{
				$obj = new Cuenta_Predial_Services();
				json_encode($obj->agregar_clave_Individual_doc($_POST["data"]));
			}
			else
			{
				echo "Error de parámetros";
			}
		}
		else if ($_GET["service_name"] == "agregar_fraccionamiento_individual")
		{
			if(isset($_POST["dataBase"])&&isset($_POST["dataDoc"]))
			{
				$obj = new Cuenta_Predial_Services();
				json_encode($obj->process_fraccionamiento_individual($_POST["dataBase"],$_POST["dataDoc"]));
			}
			else
			{
				echo "Error de parámetros";
			}
		}
	}
	else
	{
		//echo "No service selected";
	}
?>
