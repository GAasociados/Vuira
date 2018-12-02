<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clavescatastralesindividual extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Colonias_model");
		$this->load->model("Clavescatastralesindividual_model");
		$this->load->library('zip');
	}	

	public function index()
	{
		$result = $this->Colonias_model->getcolonias();
		$data = array('consulta' => $result);
		$this->load->view("tramites/clavescatastralesindividual",$data);	
	}

	public function savetram(){
		if($this->input->is_ajax_request()){
			$calleui = $this->input->post("calleui");
			$predialui = $this->input->post("predialui");
			$noloteui = $this->input->post("noloteui");
			$nomanzanaui = $this->input->post("nomanzanaui");
			$nooficialui = $this->input->post("nooficialui");
			$cbocoloniaui = $this->input->post("cbocoloniaui");
			$categoriapredioui = $this->input->post("categoriapredioui");
			$superficieterrenoui = $this->input->post("superficieterrenoui");
			$superficieconstruccionui = $this->input->post("superficieconstruccionui");
			$callenorteui = $this->input->post("callenorteui");
			$callesurui = $this->input->post("callesurui");
			$calleorienteui = $this->input->post("calleorienteui");
			$calleponienteui = $this->input->post("calleponienteui");
			$ubucacioncroquisui = $this->input->post("ubucacioncroquisui");
			$nombrepropietariodp = $this->input->post("nombrepropietariodp");
			$nombrerepresentantelegaldp = $this->input->post("nombrerepresentantelegaldp");
			$calledp = $this->input->post("calledp");
			$numerodp = $this->input->post("numerodp");
			$coloniadp = $this->input->post("coloniadp");
			$telefonodp = $this->input->post("telefonodp");
			$callenotificacionesdp = $this->input->post("callenotificacionesdp");
			$numeronotificacionedp = $this->input->post("numeronotificacionedp");
			$colonianotificacionesdp = $this->input->post("colonianotificacionesdp");
			$correonotificacionesdp = $this->input->post("correonotificacionesdp");
			$telefononotificacionesdp = $this->input->post("telefononotificacionesdp");
			$tipotramitedp = $this->input->post("tipotramitedp");
			$servicioagua = $this->input->post("servicioagua");
			$serviciopavimento = $this->input->post("serviciopavimento");
			$serviciodrenaje = $this->input->post("serviciodrenaje");
			$serviciobanqueta = $this->input->post("serviciobanqueta");
			$servicioluz = $this->input->post("servicioluz");
			$serviciotelefono = $this->input->post("serviciotelefono");
			$edadestimada = $this->input->post("edadestimada");
			$herreria = $this->input->post("herreria");
			$muros = $this->input->post("muros");
			$instelectricas = $this->input->post("instelectricas");
			$columnas = $this->input->post("columnas");
			$instsanitarias = $this->input->post("instsanitarias");
			$entrepisos = $this->input->post("entrepisos");
			$instespeciales = $this->input->post("instespeciales");
			$techos = $this->input->post("techos");
			$acabadosext = $this->input->post("acabadosext");
			$pisos = $this->input->post("pisos");
			$pintura = $this->input->post("pintura");
			$puertas = $this->input->post("puertas");
			$mueblebaño = $this->input->post("mueblebaño");
			$ventanas = $this->input->post("ventanas");
			$fachada = $this->input->post("fachada");
			$carpinteria = $this->input->post("carpinteria");
			$noplantas = $this->input->post("noplantas");
			$doctoife = $this->input->post("doctoife");
			$podersimple = $this->input->post("podersimple");
			$documentolegalpropiedad = $this->input->post("documentolegalpropiedad");
			$escritura = $this->input->post("escritura");
			$oficiodetrazaautorizada = $this->input->post("oficiodetrazaautorizada");
			$planofisicodetrazaautorizada = $this->input->post("planofisicodetrazaautorizada");
			$status = $this->input->post("status");
			$usuarioID = $this->input->post("usuarioID");

			if(true){
			//Obtener el valor máximo de la BD
				$maxnum = $this->Clavescatastralesindividual_model->getMaxItemByid();
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

				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoife']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoife']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoife']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoife']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-'.$maxnumbd.'-doctoife.zip')){
						$doctoife = "file-".$maxnumbd."-doctoife.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoife = "";
				}

				//podersimple
				if(!empty($_FILES['podersimple']['tmp_name'][0])){

					$numfiles = count($_FILES['podersimple']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['podersimple']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['podersimple']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-'.$maxnumbd.'-podersimple.zip')){
						$podersimple = "file-".$maxnumbd."-podersimple.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$podersimple = "";
				}

				//documentolegalpropiedad
				if(!empty($_FILES['documentolegalpropiedad']['tmp_name'][0])){

					$numfiles = count($_FILES['documentolegalpropiedad']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['documentolegalpropiedad']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['documentolegalpropiedad']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-'.$maxnumbd.'-documentolegalpropiedad.zip')){
						$documentolegalpropiedad = "file-".$maxnumbd."-documentolegalpropiedad.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$documentolegalpropiedad = "";
				}

				//escritura
				if(!empty($_FILES['escritura']['tmp_name'][0])){

					$numfiles = count($_FILES['escritura']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['escritura']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['escritura']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-".$maxnumbd."-escritura.zip')){
						$escritura = "file-".$maxnumbd."-escritura.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$escritura = "";
				}

				//oficiodetrazaautorizada
				if(!empty($_FILES['oficiodetrazaautorizada']['tmp_name'][0])){

					$numfiles = count($_FILES['oficiodetrazaautorizada']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['oficiodetrazaautorizada']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['oficiodetrazaautorizada']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-'.$maxnumbd.'-oficiodetrazaautorizada.zip')){
						$oficiodetrazaautorizada = "file-".$maxnumbd."-oficiodetrazaautorizada.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$oficiodetrazaautorizada = "";
				}

				//planofisicodetrazaautorizada
				if(!empty($_FILES['planofisicodetrazaautorizada']['tmp_name'][0])){

					$numfiles = count($_FILES['planofisicodetrazaautorizada']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['planofisicodetrazaautorizada']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['planofisicodetrazaautorizada']['name'][$i]);
					}
					if($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-'.$maxnumbd.'-planofisicodetrazaautorizada.zip')){
						$planofisicodetrazaautorizada = "file-".$maxnumbd."-planofisicodetrazaautorizada.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$planofisicodetrazaautorizada = "";
				}				
				$data = array('calleui' => $calleui,'predialui' => $predialui,'noloteui' => $noloteui,'nomanzanaui' => $nomanzanaui,'nooficialui' => $nooficialui,'cbocoloniaui' => $cbocoloniaui,'categoriapredioui' => $categoriapredioui,'superficieterrenoui' => $superficieterrenoui,'superficieconstruccionui' => $superficieconstruccionui,'callenorteui' => $callenorteui,'callesurui' => $callesurui,'calleorienteui' => $calleorienteui,'calleponienteui' => $calleponienteui,'ubucacioncroquisui' => $ubucacioncroquisui,'nombrepropietariodp' => $nombrepropietariodp,'nombrerepresentantelegaldp' => $nombrerepresentantelegaldp,'calledp' => $calledp,'numerodp' => $numerodp,'coloniadp' => $coloniadp,'telefonodp' => $telefonodp,'callenotificacionesdp' => $callenotificacionesdp,'numeronotificacionedp' => $numeronotificacionedp,'colonianotificacionesdp' => $colonianotificacionesdp,'correonotificacionesdp' => $correonotificacionesdp,'telefononotificacionesdp' => $telefononotificacionesdp,'tipotramitedp' => $tipotramitedp,'servicioagua' => $servicioagua,'serviciopavimento' => $serviciopavimento,'serviciodrenaje' => $serviciodrenaje,'serviciobanqueta' => $serviciobanqueta,'servicioluz' => $servicioluz,'serviciotelefono' => $serviciotelefono,'edadestimada' => $edadestimada,'herreria' => $herreria,'muros' => $muros,'instelectricas' => $instelectricas,'columnas' => $columnas,'instsanitarias' => $instsanitarias,'entrepisos' => $entrepisos,'instespeciales' => $instespeciales,'techos' => $techos,'acabadosext' => $acabadosext,'pisos' => $pisos,'pintura' => $pintura,'puertas' => $puertas,'mueblebaño' => $mueblebaño,'ventanas' => $ventanas,'fachada' => $fachada,'carpinteria' => $carpinteria,'noplantas' => $noplantas,'doctoife' => $doctoife,'podersimple' => $podersimple,'documentolegalpropiedad' => $documentolegalpropiedad,'escritura' => $escritura,'oficiodetrazaautorizada' => $oficiodetrazaautorizada,'planofisicodetrazaautorizada' => $planofisicodetrazaautorizada,'status' => $status,'usuarioID' => $usuarioID);

				$res = $this->Clavescatastralesindividual_model->savetrams($data);

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
