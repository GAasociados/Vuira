<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modificar extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("Colonias_model");
	}

	public function index()
	{
		$fila = $this->User_model->getUserById($this->session->userdata("id"));
//die(print_r($fila,true));
			if ($fila == null) {
					show_404();
			}
			else{
			$fila2 = $this->Colonias_model->getcoloniabyid($fila->colonia);
			$resultconsulta = $this->Colonias_model->getcolonias();

			$data = array('nombres' => $fila->nombres,'apellido_pat' => $fila->apellido_pat,'apellido_mat' => $fila->apellido_mat,'rfc' => $fila->rfc,'curp' => $fila->curp,'calle' => $fila->calle,'colonia' => $fila->colonia,'cp' => $fila->cp,'correo' => $fila->correo,'telefono' => $fila->telefono, 'nomcolonia' => $fila2->NOMBRE,'asentamiento' => '','consulta' => $resultconsulta);
			
			
          	//$datacols = array('consulta' => $resultconsulta);


			$this->load->view("users/modificar",$data);
			}
	}

	public function actualizar(){

            try {
                if ($this->input->is_ajax_request()) {
			$nombres = $this->input->post("nombres");
			$apellido_pat = $this->input->post("apellido_pat");
			$apellido_mat = $this->input->post("apellido_mat");
                        $rfc = $this->input->post("rfc");
                        $curp = $this->input->post("curp");
			$calle = $this->input->post("calle");
			$colonia = $this->input->post("colonia");
			$cp = $this->input->post("cp");
			$correo = $this->input->post("correo");
			$telefono = $this->input->post("telefono");
			$contrasena = sha1($this->input->post("contrasena"));

			$data = array('nombres' => $nombres, 'apellido_pat' => $apellido_pat, 'apellido_mat' => $apellido_mat, 'rfc' => $rfc, 'curp' => $curp, 'calle' => $calle,'colonia' => $colonia,'cp' => $cp,'correo' => $correo,'contrasena' => $contrasena, 'telefono' => $telefono);

				if (strlen($this->input->post("contrasena")) != 0 && strlen($nombres) != 0 && strlen($apellido_pat) != 0 && strlen($apellido_mat) >= 0 && strlen($calle) != 0 && strlen($colonia) != 0 && strlen($cp) != 0 && strlen($correo) != 0 &&  strlen($contrasena) != 0) {
					if (strlen($this->input->post("contrasena")) != 0) {
                                                $res = $this->User_model->modificar($data);
						if ($res == true){
							echo true;
							}
							else{
							echo false;
							}
					}
					else{
					echo "Inserta la Contraseña para Actualizar Tus datos";
					}
			}
			else{
				echo false;
			}

		}
		else {
			show_404();
		}   
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
	}
}
?>