<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colonias extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Colonias_model");
	}	

	public function index()
	{
		
	}

	public function getcpbyid(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");

			$datos = $this->Colonias_model->getcpbyid($buscar);
			echo json_encode($datos);
		 }
		else{
			show_404();
		 }
	}

}
?>
