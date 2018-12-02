<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once ("Gen_Template_Data.php");


class Gen_Template_Modal
{
	public $ModalContent="";
	private $DataTramite="";
	
	function __construct($id)
	{
		$this->DataTramite = new Gen_Extractor_Data($id);
	}
	
	function controlSelector($control)
	{
		if($control->Tipo_Control=="text")
		{
			$obj =new Gen_Text_Control($control,$this->DataTramite);
			$this->ModalContent .= $obj->Control_Generated; 
		}
		else if($control->Tipo_Control=="number")
		{
			$obj =new Gen_Number_Control($control,$this->DataTramite);
			$this->ModalContent .= $obj->Control_Generated; 
		}
		else if($control->Tipo_Control=="Date")
		{
			$obj =new Gen_Date_Control($control,$this->DataTramite);
			$this->ModalContent .= $obj->Control_Generated; 
		}
		else if($control->Tipo_Control=="combo")
		{
			$obj =new Gen_Combo_Control($control,$this->DataTramite);
			$this->ModalContent .= $obj->Control_Generated; 
		}
		else if($control->Tipo_Control=="radio")
		{
			$obj =new Gen_Radio_Control($control,$this->DataTramite);
			$this->ModalContent .= $obj->Control_Generated; 
		}
	}
	
	function processControls($genData)
	{
		//var_dump($genData);
		foreach($genData as $control)
		{
			$this->controlSelector($control);
		}
	}
	
	function buildModal()
	{
		$obj = new Gen_Template_Data();
		$genData = $obj->get_Template_Data();
		$this->processControls($genData);
		echo $this->ModalContent;
	}
}

class Gen_Control
{
	public $Control_Generated = "";
	protected $Control_Data ="";
	protected $DataTramite="";
	
	function classTranslate($tipoTramite)
	{
		if($tipoTramite=="Escritura Publica")
			return "escpu";
		if($tipoTramite=="Constancia Ejidal")
			return "egi";
		if($tipoTramite=="Titulo de Propiedad")
			return "prop";
		if($tipoTramite=="Solicitud IMUVII")
			return "imuvii";
		if($tipoTramite=="Sentencia Juridica")
			return "sentju";
		if($tipoTramite=="INFONAVIT")
			return "infonavit";
		if($tipoTramite=="CORETT")
			return "cor";
		if($tipoTramite=="Certificado Parcelario")
			return "parce";
		return "";
	}
	
	
	
	function __construct($controlData,$data)
	{
		$this->DataTramite = $data;
		$this->Control_Data = $controlData;
		$this->controlHeader();
		$this->controlLabel();
		$this->mainControl();
		$this->controlFooter();
	}
	
	function controlHeader()
	{
		$this->Control_Generated .="<div class='form-group col-md-4 ";
		$this->Control_Generated .= $this->classTranslate($this->Control_Data->Tipo_Tramite)." ".$this->Control_Data->Estilos." ' style='margin-bottom:29px;'>";
	}
	
	function mainControl ()
	{
	}
	
	function controlLabel()
	{
			$this->Control_Generated .=" <label for='".$this->Control_Data->Nom_Control."' > ". $this->Control_Data->Label ."</label> <label>*</label>";
	}
	
	function controlFooter()
	{
		$this->Control_Generated .="</div>";
	}
	
	
}
Class Gen_Text_Control extends Gen_Control
{	
	function mainControl ()
	{
		$this->Control_Generated .= "<input type='text' autocomplete='off' ";
		if ($this->Control_Data->Required)
			$this->Control_Generated .= "required ";
		$this->Control_Generated .= " value = '".$this->DataTramite->get_Value($this->Control_Data->Nom_BD). "' ";
	    $this->Control_Generated .= "name='".$this->Control_Data->Nom_Control."' id='".$this->Control_Data->Nom_Control."'  class='form-control'/>";
	}	
}

Class Gen_Number_Control extends Gen_Control
{	
	function mainControl ()
	{
		$this->Control_Generated .= "<input type='number' step='any' autocomplete='off' "; //pattern='".$this->Control_Data->Val_Pattern."' ";
		if ($this->Control_Data->Required)
			$this->Control_Generated .= "required ";
		$this->Control_Generated .= " value = '".$this->DataTramite->get_Value($this->Control_Data->Nom_BD). "' ";
	    $this->Control_Generated .= "name='".$this->Control_Data->Nom_Control."' id='".$this->Control_Data->Nom_Control."'  class='form-control'/>";
	}	
}

Class Gen_Date_Control extends Gen_Control
{	
	function mainControl ()
	{
		//var_dump($this->Control_Data);
		/*$this->Control_Generated .= "<input type='text' ";
		if ($this->Control_Data->Required)
			$this->Control_Generated .= "required ";
	    $this->Control_Generated .= "name='".$this->Control_Data->Nom_Control."' id='".$this->Control_Data->Nom_Control."'  class='input-group input-medium date date-picker'/> ";
		$this->Control_Generated .= "<span class='input-group-btn'> ";
		$this->Control_Generated .= "<button class='btn btn-primary btn-outline' type='button'> ";
		$this->Control_Generated .= "<i class='fa fa-calendar'></i> ";
		$this->Control_Generated .= "</button> ";
		$this->Control_Generated .= "</span> ";*/
		
		$this->Control_Generated .= "<input type='date' autocomplete='off' style='text-transform:uppercase;' ";
		if ($this->Control_Data->Required)
			$this->Control_Generated .= "required ";
		$this->Control_Generated .= " value = '".$this->DataTramite->get_Value($this->Control_Data->Nom_BD). "' ";
	    $this->Control_Generated .= "name='".$this->Control_Data->Nom_Control."' id='".$this->Control_Data->Nom_Control."'  class='form-control'/>";
	}	
}

Class Gen_Combo_Control extends Gen_Control
{	
	function mainControl ()
	{
		$this->Control_Generated .= "<select ";
		if ($this->Control_Data->Required)
			$this->Control_Generated .= "required ";
	    $this->Control_Generated .= "name='".$this->Control_Data->Nom_Control."' id='".$this->Control_Data->Nom_Control."'  class='form-control' > ";
		$this->Control_Generated .= $this->Control_Data->InnerHtml;
		$this->Control_Generated .= " </select> ";
	}	
}

Class Gen_Radio_Control extends Gen_Control
{	
	function controlHeader()
	{
		$this->Control_Generated .="<div class='form-group col-md-4 ";
		$this->Control_Generated .= $this->classTranslate($this->Control_Data->Tipo_Tramite)." ' style='margin-bottom:29px;'>";
	}

	function mainControl ()
	{
		$this->Control_Generated .= $this->Control_Data->InnerHtml;
	}	
}
?>