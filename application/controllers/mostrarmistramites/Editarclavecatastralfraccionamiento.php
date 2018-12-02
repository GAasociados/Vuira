<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editarclavecatastralfraccionamiento extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Clavescatastralesfraccionamiento_model");
		$this->load->model("Colonias_model");
		//$this->load->model("Clavescatastralesfraccionamiento_model");
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
		$datos = $this->Clavescatastralesfraccionamiento_model->mostrarByIdAndUser($id,$this->session->userdata("id"));
		
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

		 	$cbocoloniaui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);

		 	$coloniadp = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadp);
		 	
          	$data = array('consulta' => $consulta,'calleui' => $fila->calleui,'noloteui' => $fila->noloteui,'nomanzanaui' => $fila->nomanzanaui,'nooficialui' => $fila->nooficialui,'cbocoloniaui' => $cbocoloniaui,'predialui' => $fila->predialui,'superficiepredioui' => $fila->superficiepredioui,'usopredioui' => $fila->usopredioui,'callenorteui' => $fila->callenorteui,'callesurui' => $fila->callesurui,'calleorienteui' => $fila->calleorienteui,'calleponienteui' => $fila->calleponienteui,'ubucacioncroquisui' => $fila->ubucacioncroquisui,'nombrepropietariodp' => $fila->nombrepropietariodp,'calledp' => $fila->calledp,'numerodp' => $fila->numerodp,'coloniadp' => $coloniadp,'correodp' => $fila->correodp,'telefonodp' => $fila->telefonodp,'tipotramitedp' => $fila->tipotramitedp,'doctoife' => $fila->doctoife,'podersimple' => $fila->podersimple,'escriturapublica' => $fila->escriturapublica,'recibopredial' => $fila->recibopredial,'oficiodetrazaautorizada' => $fila->oficiodetrazaautorizada,'planofisicodetrazaautorizada' => $fila->planofisicodetrazaautorizada,'id' => $fila->ID);


			//$this->load->view("home",$data);
			$this->load->view("mostrarmistramites/editarclavecatastralfraccionamiento",$data);
			
			}
		}
	}
}
?>
