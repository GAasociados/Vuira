<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Us_clavescatastralesindividual extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Clavescatastralesindividual_model");
	}	

	public function index(){
		if ($this->session->userdata("login")) {
			$this->load->view('usertramites/us_clavescatastralesindividual');
		}
		else{
			header("Location:".base_url()."home");
		}
	}

	public function show(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->session->userdata("id");
			$datos = $this->Clavescatastralesindividual_model->mostrarById($buscar);
			echo json_encode($datos);	
		}
		else
		{
			show_404();
		}
	}
}
?>
