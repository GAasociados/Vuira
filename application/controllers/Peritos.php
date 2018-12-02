<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peritos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Peritos_model");
	}	

	public function index()
	{

	}

	public function getperitosbyid(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");

			$datos = $this->Peritos_model->getperitosbyid($buscar);
			echo json_encode($datos);
		 }
		else{
			show_404();
		 }
	}

	public function getperitosespbyid(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");

			$datos = $this->Peritos_model->getperitosespbyid($buscar);
			echo json_encode($datos);
		 }
		else{
			show_404();
		 }
	}
}
?>
