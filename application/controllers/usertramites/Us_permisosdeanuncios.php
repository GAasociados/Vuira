<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Us_permisosdeanuncios extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Permisosanuncios_model");
	}	

	public function index()
	{
		$this->load->view('usertramites/us_permisosdeanuncios');
	}

	public function show(){

		if ($this->input->is_ajax_request()) {
			$buscar = $this->session->userdata("id");
			$datos = $this->Permisosanuncios_model->mostrarById($buscar);
			echo json_encode($datos);	
		}
		else
		{
			show_404();
		}
	}
}
?>
