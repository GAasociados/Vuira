<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratacionyserviciosdeaguaydrenajedomestico extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Colonias_model");
		//$this->load->model("Contratacionyserviciosdeaguaydrenajedomestico_model");
	}

	public function index()
	{

		$result = $this->Colonias_model->getcolonias();
        $data = array('consulta' => $result);
		$this->load->view("tramites/contratacionyserviciosdeaguaydrenajedomestico",$data);
	}

	public function savetram(){
		if($this->input->is_ajax_request()){
			$nombre = $this->input->post("nombre");
			$fecha = $this->input->post("fecha");
			$calle = $this->input->post("calle");
			$numero = $this->input->post("numero");
			$coloniadg = $this->input->post("coloniadg");
			$tiposervicio = $this->input->post("tiposervicio");
			$serviciosdelpredio = $this->input->post("serviciosdelpredio");
			$serviciosquesolicita = $this->input->post("serviciosquesolicita");
			$condicionesgenerales = $this->input->post("condicionesgenerales");
			$nombredelsolicitante = $this->input->post("nombredelsolicitante");
			$mapa = $this->input->post("mapa");

			if(true){
				//Obtener el valor máximo de la BD
				$maxnum = $this->nombre_del_modelo_model->getMaxItemByid();
				$maxnumbd = $maxnum[0]->maxnum;
				//Ver si existe mínimo un registro
				if(empty($maxnumbd)){
					$maxnumbd=1;
				}
				else{
					$maxnumbd = $maxnumbd + 1;
				}
				$this->load->library("upload");
				$variablefile = $_FILES;
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['nombre_del_fileimput']['tmp_name'][0])){
					$numfiles = count($_FILES['nombre_del_fileimput']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['nombre_del_fileimput']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['nombre_del_fileimput']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramite/carpeta_donde_se_va_a_guardar/file-'.$maxnumbd.'-nombre_del_fileimput.zip')){
						$nombre_del_fileimput = "file-'.$maxnumbd.'-nombre_del_fileimput.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$nombre_del_fileimput = "";
				}
				$data = array('ID' => $ID,'nombre' => $nombre,'fecha' => $fecha,'calle' => $calle,'numero' => $numero,'coloniadg' => $coloniadg,'tiposervicio' => $tiposervicio,'serviciosdelpredio' => $serviciosdelpredio,'serviciosquesolicita' => $serviciosquesolicita,'condicionesgenerales' => $condicionesgenerales,'nombredelsolicitante' => $nombredelsolicitante,'mapa' => $mapa,'usuarioID' => $usuarioID,'status' => $status,'pago' => $pago);
				$res = $this->nombre_del_modelo_model->savetram($data);
				if($res == true){
					echo true;
				}
				else {
					echo false;
				}
			}
			else{
				echo "Complete todos los campos para continuar el trámite";
			}
		}
		else{
			show_404();
		}
	}
}
?>
