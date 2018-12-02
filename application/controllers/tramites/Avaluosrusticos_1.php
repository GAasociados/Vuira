<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaluosrusticos_1 extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->model("Colonias_model");
	}	

	public function index()
	{
        $result = $this->Colonias_model->getcolonias();
        $data = array('consulta' => $result);
		$this->load->view("tramites/avaluosrusticos_1",$data);	
	}
}
?>




