<?php  
error_reporting(E_ALL);
ini_set("display_errors",1);

include_once( "../DataConexion.php");

/*

	class CLASE
	{
		public function updateStatus($id, $status)
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
	}
	else
	{
		echo "No service selected";
	}

*/
?>