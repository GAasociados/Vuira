<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editarautorizacionocupacionconstruccion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Autorizacionocupacionconstruccion_model");
		$this->load->model("Colonias_model");
		//$this->load->model("Autorizacionocupacionconstruccion_model");
		$this->load->model("Peritos_model");
		$this->load->library('zip');
	}

	public function index(){
		$this->load->view("home");
	}

	public function mostrartram($id = null){
		//echo $id;
		if($id == null){
			header("Location:".base_url()."home");
		}

		if ($this->session->userdata("login") == false) {
			header("Location:".base_url()."home");
		}
		else{
		$datos = $this->Autorizacionocupacionconstruccion_model->mostrarByIdAndUser($id,$this->session->userdata("id"));

		if ((empty($datos))) {
			header("Location:".base_url()."home");
			$fila = null;
		}
		else{
			$fila= $datos[0];
		}
			if ($fila == null) {
				//echo "Error";
				return;
			}
			else{

          	$result = $this->Colonias_model->getcolonias();
		 	$resultperitos = $this->Peritos_model->getperitos();
		 	$resultperitosesp = $this->Peritos_model->getperitosespecializados();

		 	//$fila->coloniadg (Id de la Colonia)
		 	$arraycolonia = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);

		 	$arraycbocolsui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocolsui);

		 	$arrayperito = $this->Peritos_model->getperitosbyid($fila->nombreperitodp);

		 	$arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);


          	$data = array('consulta' => $result,'resultperitos' => $resultperitos,'resultperitosesp' => $resultperitosesp,'nombrepropietariodg' => $fila->nombrepropietariodg,'nombresolicitantedg'=> $fila->nombresolicitantedg,'calledg' => $fila->calledg,'numerodg' =>$fila->numerodg,'correodg' => $fila->correodg,'telefonodg' => $fila->telefonodg,'calleui' => $fila->calleui,'manzanaui' => $fila->manzanaui,'nooficialui'=> $fila->nooficialui,'superficiepredioui' => $fila->superficiepredioui,'superficieconstruidaui'=>$fila->superficieconstruidaui,'superficieconstruirui' => $fila->superficieconstruirui,'bardeoui' => $fila->bardeoui,'nonivelesui' => $fila->nonivelesui,'nocajonesui' => $fila->nocajonesui,'noviviendasui' => $fila->noviviendasui,'porcentajeavanceui' => $fila->porcentajeavanceui,'callenorte' => $fila->callenorte,'callesur' => $fila->callesur,'calleeste' => $fila->calleeste,'calleoeste' => $fila->calleoeste,'noregistroperitodp' => $fila->noregistroperitodp,'telefonoperitodp' => $fila->telefonoperitodp,'noregistroresponsabledp' => $fila->noregistroresponsabledp,'telefonoresponsabledp' => $fila->telefonoresponsabledp,'nodeloteui' => $fila->nodeloteui,'coloniadg' => $fila->coloniadg,'arraycolonia' => $arraycolonia,'arraycbocolsui' => $arraycbocolsui,'cbocolsui' => $fila->cbocolsui,'seccion' => $fila->seccion,'nombreperitodp' => $fila->nombreperitodp,'arrayperito' => $arrayperito,'nombreperitoresponsabledp'=> $fila->nombreperitoresponsabledp,'arrayperitoesp' => $arrayperitoesp,'docsbitacora' => $fila->docsbitacora,'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales,'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico,'docspago' => $fila->docspago,'ID' => $fila->ID,'apellidopaternopropietariodg' => $fila->apellidopaternopropietariodg, 'apellidomaternopropietariodg' => $fila->apellidomaternopropietariodg,'apellidopaternosolicitantedg' => $fila->apellidopaternosolicitantedg,'apellidomaternosolicitantedg' => $fila->apellidomaternosolicitantedg);

          		//echo $fila->telefonoresponsabledp;

          		//echo $fila->telefonodg;
          		//print_r($datos);

			//$this->load->view("home",$data);
			$this->load->view("mostrarmistramites/editarautorizacionocupacionconstruccion",$data);

			}
		}
	}

/*
	public function descargarzip(){
		if($this->input->is_ajax_request()){

			$file =  $this->input->post("valor");

			$ruta = base_url()."assets/tramites/construccion/".$file;

			//$name = 'photo.jpg';
			$this->zip->read_file($ruta); // Read the file's contents

			$this->zip->download('myphotos.zip');

			echo $ruta;
		}
		else{
			show_404();
		}
		/*$path = './assets/tramites/construccion/';

		$this->zip->read_dir($path);

		// Descargar archivo llamado "my_backup.zip"
		$this->zip->download($file);
		//echo "string";
		/
	}
	*/
}
?>
