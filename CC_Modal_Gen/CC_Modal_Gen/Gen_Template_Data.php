<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
require_once('DataConexion.php'); 

class Gen_Template_Data
{
	function get_Template_Data()
	{
		$sql="select * from natural7_vuira.GC_CCI_Generator order by Orden;";
		$con = new conection();
		return $con->executeQuerry($sql);
	}
}

class Gen_Extractor_Data
{
	private $Tramite_Data = "";
	private $Tramite_DataBk="";
	
	function __construct ($id)
	{
		$this->Tramite_Data = $this->get_Tramite_Data($id)[0];
		$tmpData = $this->get_Tramite_DataBk($id);
		if(count($tmpData)>0)
			$this->Tramite_DataBk = get_object_vars($tmpData[0]);
		else
			$this->Tramite_DataBk = ["ID2"=>$id];
		//var_dump($this->Tramite_Data);		
	}
	
	function get_Tramite_Data($id)
	{
		$sql="select * from natural7_vuira.claves_catastrales_individual where ID=$id ;";
		$con = new conection();
		return $con->executeQuerry($sql);
	}
	
	function get_Tramite_DataBk($id)
	{
		$sql="select * from natural7_vuira.Cat_Informacion_Documentos where Id_Bd=$id ;";
		$con = new conection();
		return $con->executeQuerry($sql);
	}
	function get_Value_Tramite($fieldName)
	{
		if(array_key_exists($fieldName,$this->Tramite_DataBk))
				return $this->Tramite_DataBk[$fieldName];
		else
			return "";
	}
	
	function get_Value($fieldName)
	{
		if(array_key_exists($fieldName,$this->Tramite_DataBk))
				return $this->Tramite_DataBk[$fieldName];
		else if($fieldName=="Calle")
		{
			return $this->Tramite_Data->calleui;
		}
		else if($fieldName=="Nombre_Propietario")
		{
			return $this->Tramite_Data->nombrepropietariodp;
		}
		else if($fieldName=="Numero_Predial")
		{
			return $this->Tramite_Data->predialui;
		}
		else if($fieldName=="Numero_Lote")
		{
			return $this->Tramite_Data->noloteui;
		}
		else if($fieldName=="Manzana")
		{
			return $this->Tramite_Data->nomanzanaui;
		}
		else if($fieldName=="Copropietarios")
		{
			return $this->Tramite_Data->copro;
		}
		else if($fieldName=="Superficie")
		{
			return $this->Tramite_Data->supsiac;
		}
		else if($fieldName=="Numero_Escritura")
		{
			return $this->Tramite_Data->noescri;
		}
		else if($fieldName=="Fecha_Escritura")
		{
			return $this->Tramite_Data->fechaesc;
		}
		else if($fieldName=="Nombre_Notario")
		{
			return $this->Tramite_Data->notario;
		}
		else if($fieldName=="Numero_Notario")
		{
			return $this->Tramite_Data->nonotario;
		}
		else if($fieldName=="Clave_Catastral")
		{
			return $this->Tramite_Data->clave;
		}
		else if($fieldName=="ID_Numero_Oficio")
		{
			//return $this->Tramite_Data->nooficialui;
			return "";
		}
		else if($fieldName=="Numero_Seguimiento")
		{
			return $this->Tramite_Data->numerocontrol;
		}
		else
		{
			if(array_key_exists($fieldName,$this->Tramite_DataBk))
				return $this->Tramite_DataBk[$fieldName];
			else
				return "";
		}
	}
}
?>