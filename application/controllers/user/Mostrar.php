<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
	}	

	public function index(){
		if ($this->session->userdata("login")) {
			$this->load->view('users/mostrar');
		}
		else{
			header("Location:".base_url()."home");
		}
	}

	public function show(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");
			$datos = $this->User_model->mostrar($buscar);
			echo json_encode($datos);	
		}
		else
		{
			show_404();
		}
	}
}
?>
