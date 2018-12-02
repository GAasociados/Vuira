<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editarpermisosdeanuncios extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Permisosanuncios_model");
		$this->load->model("Colonias_model");
		//$this->load->model("Autorizacionocupacionconstruccion_model");
		$this->load->model("Peritos_model");
		$this->load->library('zip');
	}	

	public function index(){
		$this->load->view("home");
	}

	public function mostrartram($id = null){
		
		if($id == null){
			header("Location:".base_url()."home");
		}

		if ($this->session->userdata("login") == false) {
			header("Location:".base_url()."home");
		}
		else{
		$datos = $this->Permisosanuncios_model->mostrarByIdAndUser($id,$this->session->userdata("id"));
		
		if ((empty($datos))) {
			header("Location:".base_url()."home");
			$fila = null;
		}
		else{
			$fila= $datos[0];
		}
			if ($fila == null) {
				//echo "Error";
				return;
			}
			else{
          	
          	$consulta = $this->Colonias_model->getcolonias();

		 	$resultperitos = $this->Peritos_model->getperitos();


		 	//$fila->coloniadg (Id de la Colonia)
		 	$arraycolonia = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);

		 	$arraycbocolsui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);

		 	$arrayperito = $this->Peritos_model->getperitosbyid($fila->nombreperitodp);


          	//$data = array('consulta' => $result,'resultperitos' => $resultperitos,'resultperitosesp' => $resultperitosesp,'nombrepropietariodg' => $fila->nombrepropietariodg,'nombresolicitantedg'=> $fila->nombresolicitantedg,'calledg' => $fila->calledg,'numerodg' =>$fila->numerodg,'correodg' => $fila->correodg,'telefonodg' => $fila->telefonodg,'calleui' => $fila->calleui,'manzanaui' => $fila->manzanaui,'nooficialui'=> $fila->nooficialui,'superficiepredioui' => $fila->superficiepredioui,'superficieconstruidaui'=>$fila->superficieconstruidaui,'superficieconstruirui' => $fila->superficieconstruirui,'bardeoui' => $fila->bardeoui,'nonivelesui' => $fila->nonivelesui,'nocajonesui' => $fila->nocajonesui,'noviviendasui' => $fila->noviviendasui,'porcentajeavanceui' => $fila->porcentajeavanceui,'callenorte' => $fila->callenorte,'callesur' => $fila->callesur,'calleeste' => $fila->calleeste,'calleoeste' => $fila->calleoeste,'noregistroperitodp' => $fila->noregistroperitodp,'telefonoperitodp' => $fila->telefonoperitodp,'noregistroresponsabledp' => $fila->noregistroresponsabledp,'telefonoresponsabledp' => $fila->telefonoresponsabledp,'nodeloteui' => $fila->nodeloteui,'coloniadg' => $fila->coloniadg,'arraycolonia' => $arraycolonia,'arraycbocolsui' => $arraycbocolsui,'cbocolsui' => $fila->cbocolsui,'seccion' => $fila->seccion,'nombreperitodp' => $fila->nombreperitodp,'arrayperito' => $arrayperito,'nombreperitoresponsabledp'=> $fila->nombreperitoresponsabledp,'arrayperitoesp' => $arrayperitoesp,'docsbitacora' => $fila->docsbitacora,'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales,'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico,);

          		

			//$this->load->view("mostrarmistramites/editarautorizacionocupacionconstruccion",$data);

			$data = array('arraycolonia' => $arraycolonia,'arraycbocolsui' => $arraycbocolsui,'arrayperito' => $arrayperito,'consulta' => $consulta,'resultperitos' => $resultperitos,'ID' => $fila->ID,'nombrepropietarioinmuebledg' => $fila->nombrepropietarioinmuebledg,'nombrepropietarioanunciodg' => $fila->nombrepropietarioanunciodg,'calledg' => $fila->calledg,'numerodg' => $fila->numerodg,'coloniadg' => $fila->coloniadg,'correodg' => $fila->correodg,'telefonodg' => $fila->telefonodg,'calleui' => $fila->calleui,'noloteui' => $fila->noloteui,'nomanzanaui' => $fila->nomanzanaui,'nooficialui' => $fila->nooficialui,'cbocoloniaui' => $fila->cbocoloniaui,'superficiepredioui' => $fila->superficiepredioui,'superficieconstruidaui' => $fila->superficieconstruidaui,'nonivelesui' => $fila->nonivelesui,'nombreperitodp' => $fila->nombreperitodp,'noregistroperitodp' => $fila->noregistroperitodp,'telefonoperitodp' => $fila->telefonoperitodp,'fechaentrega' => $fila->fechaentrega,'nocontrol' => $fila->nocontrol,'doctopermisousosuelo' => $fila->doctopermisousosuelo,'doctoplano' => $fila->doctoplano,'doctoplanosavaladosperito' => $fila->doctoplanosavaladosperito,'doctomemoriadecalculoestructura' => $fila->doctomemoriadecalculoestructura,'doctofotografico' => $fila->doctofotografico,'doctoife' => $fila->doctoife,'doctoestructurapublica' => $fila->doctoestructurapublica,'doctoactaconstitutiva' => $fila->doctoactaconstitutiva,'doctoclavecatastral' => $fila->doctoclavecatastral,'doctodictamenalineamiento' => $fila->doctodictamenalineamiento);

			$this->load->view("mostrarmistramites/editarpermisosdeanuncios",$data);
			}
		}
	}
}
?>
