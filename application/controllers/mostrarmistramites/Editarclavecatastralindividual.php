<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editarclavecatastralindividual extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Clavescatastralesindividual_model");
		$this->load->model("Colonias_model");
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
		$datos = $this->Clavescatastralesindividual_model->mostrarByIdAndUser($id,$this->session->userdata("id"));
		//print_r($datos);
		
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

		 	/*
		 	$cbocoloniaui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);

		 	$coloniadp = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadp);
		 	*/

		 	$cbocoloniaui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);

          	$coloniadp = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadp);
          	
          	$colonianotificacionesdp = $this->Colonias_model->getalladatacoloniabyid($fila->colonianotificacionesdp);

          	$data = array('consulta'=>$consulta,'calleui' => $fila->calleui,'predialui' => $fila->predialui,'noloteui' => $fila->noloteui,'nomanzanaui' => $fila->nomanzanaui,'nooficialui' => $fila->nooficialui,'cbocoloniaui' => $cbocoloniaui,'categoriapredioui' => $fila->categoriapredioui,'superficieterrenoui' => $fila->superficieterrenoui,'superficieconstruccionui' => $fila->superficieconstruccionui,'callenorteui' => $fila->callenorteui,'callesurui' => $fila->callesurui,'calleorienteui' => $fila->calleorienteui,'calleponienteui' => $fila->calleponienteui,'ubucacioncroquisui' => $fila->ubucacioncroquisui,'nombrepropietariodp' => $fila->nombrepropietariodp,'nombrerepresentantelegaldp' => $fila->nombrerepresentantelegaldp,'calledp' => $fila->calledp,'numerodp' => $fila->numerodp,'coloniadp' => $coloniadp,'telefonodp' => $fila->telefonodp,'callenotificacionesdp' => $fila->callenotificacionesdp,'numeronotificacionedp' => $fila->numeronotificacionedp,'colonianotificacionesdp' => $colonianotificacionesdp,'correonotificacionesdp' => $fila->correonotificacionesdp,'telefononotificacionesdp' => $fila->telefononotificacionesdp,'tipotramitedp' => $fila->tipotramitedp,'servicioagua' => $fila->servicioagua,'serviciopavimento' => $fila->serviciopavimento,'serviciodrenaje' => $fila->serviciodrenaje,'serviciobanqueta' => $fila->serviciobanqueta,'servicioluz' => $fila->servicioluz,'serviciotelefono' => $fila->serviciotelefono,'edadestimada' => $fila->edadestimada,'herreria' => $fila->herreria,'muros' => $fila->muros,'instelectricas' => $fila->instelectricas,'columnas' => $fila->columnas,'instsanitarias' => $fila->instsanitarias,'entrepisos' => $fila->entrepisos,'instespeciales' => $fila->instespeciales,'techos' => $fila->techos,'acabadosext' => $fila->acabadosext,'pisos' => $fila->pisos,'pintura' => $fila->pintura,'puertas' => $fila->puertas,'mueblebaño' => $fila->mueblebaño,'ventanas' => $fila->ventanas,'fachada' => $fila->fachada,'carpinteria' => $fila->carpinteria,'noplantas' => $fila->noplantas,'doctoife' => $fila->doctoife,'podersimple' => $fila->podersimple,'documentolegalpropiedad' => $fila->documentolegalpropiedad,'escritura' => $fila->escritura,'oficiodetrazaautorizada' => $fila->oficiodetrazaautorizada,'planofisicodetrazaautorizada' => $fila->planofisicodetrazaautorizada,'status' => $fila->status,'usuarioID' => $fila->usuarioID,'id' => $fila->ID);

			$this->load->view("mostrarmistramites/editarclavecatastralindividual",$data);
			}
		}
	}
}
?>
