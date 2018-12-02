<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calles_japami extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Calles_japami_model");
	}

	public function index()
	{

	}

	public function getcallesbyid(){
            
                $buscar = $this->input->post('buscar');
             
		//echo $buscar;
		$arreglodecalles = $this->Calles_japami_model->getcalles($buscar);

		foreach ($arreglodecalles->result() as $fila) {
				echo "<option value='".$fila->CALLE_ID."'>".$fila->NOMBRE."</option>";
		 }


		/*
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");

			$datos = $this->Calles_japami_model->getcpbyid($buscar);
			echo json_encode($datos);
		 }
		else{
			show_404();
		 }
		 */
	}
        public function callecuenta(){
		//echo $buscar;
            $buscar = $this->input->post('buscar');
                      $id = $this->input->post('id');
		$arreglodecalles = $this->Calles_japami_model->getalladatacallebyid1($buscar,$id);
//                die(print_r($arreglodecalles,TRUE));
                echo $arreglodecalles->calle_id;
	}

}
?>
