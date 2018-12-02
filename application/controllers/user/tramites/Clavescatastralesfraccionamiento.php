<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clavescatastralesfraccionamiento extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->model("Colonias_model");
        $this->load->model("Clavescatastralesfraccionamiento_model");
        $this->load->library('zip');
	}	

	public function index()
	{
        $result = $this->Colonias_model->getcolonias();
        $data = array('consulta' => $result);
		$this->load->view("tramites/clavescatastralesfraccionamiento",$data);	
	}

	public function savetram(){
		if($this->input->is_ajax_request()){
			
			$calleui = $this->input->post("calleui");
			$noloteui = $this->input->post("nodeloteui");
			$nomanzanaui = $this->input->post("nomanzanaui");
			$nooficialui = $this->input->post("nooficialui");
			$cbocoloniaui = $this->input->post("cbocoloniaui");
			$predialui = $this->input->post("predialui");
			$superficiepredioui = $this->input->post("superficiepredioui");
			$usopredioui = $this->input->post("usopredioui");
			$callenorteui = $this->input->post("callenorteui");
			$callesurui = $this->input->post("callesurui");
			$calleorienteui = $this->input->post("calleorienteui");
			$calleponienteui = $this->input->post("calleponienteui");
			$ubucacioncroquisui = $this->input->post("ubucacioncroquisui");
			$nombrepropietariodp = $this->input->post("nombrepropietariodp");
			$calledp = $this->input->post("calledp");
			$numerodp = $this->input->post("numerodp");
			$coloniadp = $this->input->post("coloniadp");
			//$correodp = $this->input->post("correodp");
			$correodp = "";
			$telefonodp = $this->input->post("telefonodp");
			$tipotramitedp = $this->input->post("tipotramitedp");

			$doctoife = $this->input->post("doctoife");
			$podersimple = $this->input->post("podersimple");
			$escriturapublica = $this->input->post("escriturapublica");
			$recibopredial = $this->input->post("recibopredial");
			$oficiodetrazaautorizada = $this->input->post("oficiodetrazaautorizada");
			$planofisicodetrazaautorizada = $this->input->post("planofisicodetrazaautorizada");
			$status = $this->input->post("status");

			
			if(true){
//Obtener el valor máximo de la BD
				$maxnum = $this->Clavescatastralesfraccionamiento_model->getMaxItemByid();
				$maxnumbd = $maxnum[0]->maximo;

//Ver si existe mínimo un registro
				if(empty($maxnumbd)){
					$maxnumbd=1;
				}
				else{
					$maxnumbd = $maxnumbd + 1;
				}
				$this->load->library("upload");
				$variablefile = $_FILES;

				////////////////////// IFE////////////////////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoife']['tmp_name'][0])){
					$numfiles = count($_FILES['doctoife']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoife']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoife']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-doctoife.zip')){
						$doctoife = "file-".$maxnumbd."-doctoife.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoife = "";
				}
				/////////////////////////// podersimple ////////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['podersimple']['tmp_name'][0])){
					$numfiles = count($_FILES['podersimple']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['podersimple']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['podersimple']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-podersimple.zip')){
						$podersimple = "file-".$maxnumbd."-podersimple.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$podersimple = "";
				}
				/////////////////////escriturapublica////////////////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['escriturapublica']['tmp_name'][0])){
					$numfiles = count($_FILES['escriturapublica']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['escriturapublica']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['escriturapublica']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-escriturapublica.zip')){
						$escriturapublica = "file-".$maxnumbd."-escriturapublica.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$escriturapublica = "";
				}
			/////////////////////recibopredial////////////////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['recibopredial']['tmp_name'][0])){
					$numfiles = count($_FILES['recibopredial']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['recibopredial']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['recibopredial']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-recibopredial.zip')){
						$recibopredial = "file-".$maxnumbd."-recibopredial.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$recibopredial = "";
				}

				/////////////////////oficiodetrazaautorizada/////////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['oficiodetrazaautorizada']['tmp_name'][0])){
					$numfiles = count($_FILES['oficiodetrazaautorizada']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['oficiodetrazaautorizada']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['oficiodetrazaautorizada']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-oficiodetrazaautorizada.zip')){
						$oficiodetrazaautorizada = "file-".$maxnumbd."-oficiodetrazaautorizada.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$oficiodetrazaautorizada = "";
				}

				/////////////////////oficiodetrazaautorizada/////////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['oficiodetrazaautorizada']['tmp_name'][0])){
					$numfiles = count($_FILES['oficiodetrazaautorizada']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['oficiodetrazaautorizada']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['oficiodetrazaautorizada']['name'][$i]);
					}

					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-oficiodetrazaautorizada.zip')){
						$oficiodetrazaautorizada = "file-".$maxnumbd."-oficiodetrazaautorizada.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$oficiodetrazaautorizada = "";
				}
				////////////////////planofisicodetrazaautorizada/////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['planofisicodetrazaautorizada']['tmp_name'][0])){
					$numfiles = count($_FILES['planofisicodetrazaautorizada']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['planofisicodetrazaautorizada']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['planofisicodetrazaautorizada']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-'.$maxnumbd.'-planofisicodetrazaautorizada.zip')){
						$planofisicodetrazaautorizada = "file-".$maxnumbd."-planofisicodetrazaautorizada.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$planofisicodetrazaautorizada = "";
				}

				

				$data = array('calleui' => $calleui,'noloteui' => $noloteui,'nomanzanaui' => $nomanzanaui,'nooficialui' => $nooficialui,'cbocoloniaui' => $cbocoloniaui,'predialui' => $predialui,'superficiepredioui' => $superficiepredioui,'usopredioui' => $usopredioui,'callenorteui' => $callenorteui,'callesurui' => $callesurui,'calleorienteui' => $calleorienteui,'calleponienteui' => $calleponienteui,'ubucacioncroquisui' => $ubucacioncroquisui,'nombrepropietariodp' => $nombrepropietariodp,'calledp' => $calledp,'numerodp' => $numerodp,'coloniadp' => $coloniadp,'correodp' => $correodp,'telefonodp' => $telefonodp,'tipotramitedp' => $tipotramitedp,'doctoife' => $doctoife,'podersimple' => $podersimple,'escriturapublica' => $escriturapublica,'recibopredial' => $recibopredial,'oficiodetrazaautorizada' => $oficiodetrazaautorizada,'planofisicodetrazaautorizada' => $planofisicodetrazaautorizada,'status' => $status);

				$res = $this->Clavescatastralesfraccionamiento_model->savetrams($data);
				//print_r($res);

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




