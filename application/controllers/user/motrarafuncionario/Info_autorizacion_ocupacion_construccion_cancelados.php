<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_autorizacion_ocupacion_construccion_cancelados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Autorizacionocupacionconstruccion_model");
	}

	public function index(){
		if ($this->session->userdata("login")) {
      $data['archivojs'] = base_url()."assets/js/tram/autorizacionocupacionconstruccion/mostrarautorizacionocupacionconstruccionfuncionariocanceladoscancelados.js";
			$this->load->view('funcionariotramites/us_autorizacionocupacionconstruccion',$data);
		}
		else{
			header("Location:".base_url()."home");
		}
	}

	public function show(){
		if($this->input->is_ajax_request()) {
			$datos = $this->Autorizacionocupacionconstruccion_model->mostrarByStatusTres($buscar);
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
}
?>
