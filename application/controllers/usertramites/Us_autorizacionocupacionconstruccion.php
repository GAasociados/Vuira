<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Us_autorizacionocupacionconstruccion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Autorizacionocupacionconstruccion_model");
	}

	public function index(){
		if ($this->session->userdata("login")) {
			$this->load->view('usertramites/us_autorizacionocupacionconstruccion');
		}
		else{
			header("Location:".base_url()."home");
		}
	}

	public function show(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->session->userdata("id");
			$datos = $this->Autorizacionocupacionconstruccion_model->mostrarById($buscar);
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}

	public function showfuncionario(){
		if ($this->input->is_ajax_request()) {
			$datos = $this->Autorizacionocupacionconstruccion_model->mostrarByStatus();
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}

	public function showfuncionariocancelados(){
		if ($this->input->is_ajax_request()) {
			$datos = $this->Autorizacionocupacionconstruccion_model->mostrarByStatusCuatro();
			echo json_encode($datos);
			//echo $datos;
		}
		else
		{
			show_404();
		}
	}

	public function showfuncionariodocumentacion(){
		if ($this->input->is_ajax_request()) {
			$datos = $this->Autorizacionocupacionconstruccion_model->mostrarByStatusDos();
			echo json_encode($datos);
			//echo $datos;
		}
		else
		{
			show_404();
		}
	}

	public function showfuncionarioterminados(){
		if ($this->input->is_ajax_request()) {
			$datos = $this->Autorizacionocupacionconstruccion_model->mostrarByStatusTres();
			echo json_encode($datos);
			//echo $datos;
		}
		else
		{
			show_404();
		}
	}
}
?>
