<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaluosurbanos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->model("Colonias_model");
        $this->load->model("Peritos_model");
	}	

	public function index()
	{
        $result = $this->Colonias_model->getcolonias();
       	$resultperitos = $this->Peritos_model->getperitos();

        $data = array('consulta' => $result,'resultperitos' => $resultperitos);
		$this->load->view("tramites/avaluosurbanos",$data);	
	}
	public function clave() {
 $this->db->select('*');
        $this->db->where('usuarios_ID', $this->session->userdata('id'));
        $query = $this->db->get('documentos_ciudadano');
        $num = $query->num_rows();
        if ($num == '3') {
        $data['vista']='tramites/avaluosurbanos';
        $this->load->view('permiso_anuncios/clave_catastral_form', $data);
              } else {
            redirect('usuarios/completar_ferfil/' . $this->session->userdata('id'));
        }
    }
}
?>