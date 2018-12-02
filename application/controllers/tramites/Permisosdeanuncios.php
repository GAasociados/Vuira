<?php
defined ( 'BASEPATH') OR exit ('no direct script access allowed');
class Permisosdeanuncios extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("Colonias_model");
		$this->load->model("Peritos_model");
		$this->load->model("Permisosanuncios_model");
		$this->load->library('zip');
	}
	public function index(){
		$result = $this->Colonias_model->getcolonias();
		$resultperitos = $this->Peritos_model->getperitos();

		$data = array('consulta' => $result,'resultperitos' => $resultperitos);
		$this->load->view("tramites/permisosdeanuncios",$data);
	}
	public function savetram(){
		if($this->input->is_ajax_request()){
			$nombrepropietarioinmuebledg = $this->input->post("nombrepropietarioinmuebledg");
			$nombrepropietarioanunciodg = $this->input->post("nombrepropietarioanunciodg");
			$calledg = $this->input->post("calledg");
			$coloniadg = $this->input->post("coloniadg");
			$numerodg = $this->input->post("numerodg");
			$correodg = $this->input->post("correodg");
			$telefonodg = $this->input->post("telefonodg");
			$calleui = $this->input->post("calleui");
			$noloteui = $this->input->post("nodeloteui");
			$nomanzanaui = $this->input->post("nomanzanaui");
			$nooficialui = $this->input->post("nooficialui");
			$cbocoloniaui = $this->input->post("cbocoloniaui");
			$superficiepredioui = $this->input->post("superficiepredioui");
			$superficieconstruidaui = $this->input->post("superficieconstruidaui");
			$nonivelesui = $this->input->post("nonivelesui");
			$nombreperitodp = $this->input->post("nombreperitodp");
			$noregistroperitodp = $this->input->post("noregistroperitodp");
			$telefonoperitodp = $this->input->post("telefonoperitodp");
			$fechaentrega = $this->input->post("fechaentrega");
			$nocontrol = $this->input->post("nocontrol");
			$doctopermisousosuelo = $this->input->post("doctopermisousosuelo");
			$doctoplano = $this->input->post("doctoplano");
			$doctoplanosavaladosperito = $this->input->post("doctoplanosavaladosperito");
			$doctomemoriadecalculoestructura = $this->input->post("doctomemoriadecalculoestructura");
			$doctofotografico = $this->input->post("doctofotografico");
			$doctoife = $this->input->post("doctoife");
			$doctoestructurapublica = $this->input->post("doctoestructurapublica");
			$doctoactaconstitutiva = $this->input->post("doctoactaconstitutiva");
			$doctoclavecatastral = $this->input->post("doctoclavecatastral");
			$doctodictamenalineamiento = $this->input->post("doctodictamenalineamiento");
			$fechaentrega =  $this->input->post("fechaentregadp");
			$usuarioID = $this->session->userdata("id");

			$status = $this->input->post("status");

			if(true){
			//Obtener el valor máximo de la BD
				$maxnum = $this->Permisosanuncios_model->getMaxItemByid();
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

				/////////////////Permiso uso de suelo/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctopermisousosuelo']['tmp_name'][0])){

					$numfiles = count($_FILES['doctopermisousosuelo']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctopermisousosuelo']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctopermisousosuelo']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctopermisousosuelo.zip')){
						//echo "Entra a IF del ZIP";
						$doctopermisousosuelo = "file-".$maxnumbd."-doctopermisousosuelo.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctopermisousosuelo = "";
				}

				//////////////////////////////////////////////////////////////

				/////////////Plano ubicación del inmueble/////////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoplano']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoplano']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoplano']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoplano']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctoplanoinmueble.zip')){
						//echo "Entra a IF del ZIP";
						$doctoplano = "file-".$maxnumbd."-doctoplanoinmueble.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoplano = "";
				}
				///////////////////////////////////////////////////////////////

				/////////////////Memoria de calculo de estructura/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctomemoriadecalculoestructura']['tmp_name'][0])){

					$numfiles = count($_FILES['doctomemoriadecalculoestructura']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctomemoriadecalculoestructura']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctomemoriadecalculoestructura']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctomemoriadecalculoestructura.zip')){
						//echo "Entra a IF del ZIP";
						$doctomemoriadecalculoestructura = "file-".$maxnumbd."-doctomemoriadecalculoestructura.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctomemoriadecalculoestructura = "";
				}
				/////////////////////////////////////////////////////////////

				/////////////////Planos avalados por el perito/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoplanosavaladosperito']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoplanosavaladosperito']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoplanosavaladosperito']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoplanosavaladosperito']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctoplanosavaladosperito.zip')){
						//echo "Entra a IF del ZIP";
						$doctoplanosavaladosperito = "file-".$maxnumbd."-doctoplanosavaladosperito.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoplanosavaladosperito = "";
				}
				/////////////////////////////////////////////////////////////

				/////////////////Identificación oficial////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoife']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoife']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoife']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoife']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctoife.zip')){
						//echo "Entra a IF del ZIP";
						$doctoife = "file-".$maxnumbd."-doctoife.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoife = "";
				}
				/////////////////////////////////////////////////////////////

				///////////////Titulo de propiedad///////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoestructurapublica']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoestructurapublica']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoestructurapublica']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoestructurapublica']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctotitulopropiedad.zip')){
						//echo "Entra a IF del ZIP";
						$doctoestructurapublica = "file-".$maxnumbd."-doctotitulopropiedad.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoestructurapublica = "";
				}
				/////////////////////////////////////////////////////////////

				/////////////////Acta constitutiva/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoactaconstitutiva']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoactaconstitutiva']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoactaconstitutiva']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoactaconstitutiva']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctoactaconstitutiva.zip')){
						//echo "Entra a IF del ZIP";
						$doctoactaconstitutiva = "file-".$maxnumbd."-doctoactaconstitutiva.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoactaconstitutiva = "";
				}
				/////////////////////////////////////////////////////////////


				/////////////////Clave Cstastral/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctoclavecatastral']['tmp_name'][0])){

					$numfiles = count($_FILES['doctoclavecatastral']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctoclavecatastral']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctoclavecatastral']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctoclavecatastral.zip')){
						//echo "Entra a IF del ZIP";
						$doctoclavecatastral = "file-".$maxnumbd."-doctoclavecatastral.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctoclavecatastral = "";
				}
				/////////////////////////////////////////////////////////////


				/////////////////Dictamen de alinemiento/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctodictamenalineamiento']['tmp_name'][0])){

					$numfiles = count($_FILES['doctodictamenalineamiento']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctodictamenalineamiento']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctodictamenalineamiento']['name'][$i]);

					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctodictamenalineamiento.zip')){
						//echo "Entra a IF del ZIP";
						$doctodictamenalineamiento = "file-".$maxnumbd."-doctodictamenalineamiento.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctodictamenalineamiento = "";
				}
				/////////////////////////////////////////////////////////////


				/////////////////Reporte Fotográfico/////////////////
				//Insertar Archivos(Se debe crear uno por cada fileimput)
				if(!empty($_FILES['doctofotografico']['tmp_name'][0])){
					$numfiles = count($_FILES['doctofotografico']['tmp_name']);
					for($i=0;$i < $numfiles;$i++){
						$path = $variablefile['doctofotografico']['tmp_name'][$i];
						$this->zip->read_file($path,$variablefile['doctofotografico']['name'][$i]);
					}

					if($this->zip->archive('./assets/tramites/permisossuelo/file-'.$maxnumbd.'-doctofotografico.zip')){
					//	echo "Entra a IF del ZIP";
						$doctofotografico = "file-".$maxnumbd."-doctofotografico.zip";
					}
					$this->zip->clear_data();
				}
				else{
					$doctofotografico = "";
				}
				/////////////////////////////////////////////////////////////


				$data = array('nombrepropietarioinmuebledg' => $nombrepropietarioinmuebledg,'nombrepropietarioanunciodg' => $nombrepropietarioanunciodg,'calledg' => $calledg,'numerodg' => $numerodg,'coloniadg' => $coloniadg,'correodg' => $correodg,'telefonodg' => $telefonodg,'calleui' => $calleui,'noloteui' => $noloteui,'nomanzanaui' => $nomanzanaui,'nooficialui' => $nooficialui,'cbocoloniaui' => $cbocoloniaui,'superficiepredioui' => $superficiepredioui,'superficieconstruidaui' => $superficieconstruidaui,'nonivelesui' => $nonivelesui,'nombreperitodp' => $nombreperitodp,'noregistroperitodp' => $noregistroperitodp,'telefonoperitodp' => $telefonoperitodp,'fechaentrega' => $fechaentrega,'nocontrol' => $nocontrol,'doctopermisousosuelo' => $doctopermisousosuelo,'doctoplano' => $doctoplano,'doctoplanosavaladosperito' => $doctoplanosavaladosperito,'doctomemoriadecalculoestructura' => $doctomemoriadecalculoestructura,'doctofotografico' => $doctofotografico,'doctoife' => $doctoife,'doctoestructurapublica' => $doctoestructurapublica,'doctoactaconstitutiva' => $doctoactaconstitutiva,'doctoclavecatastral' => $doctoclavecatastral,'doctodictamenalineamiento' => $doctodictamenalineamiento,'usuarioID' => $usuarioID,'status' => $status);


				$res = $this->Permisosanuncios_model->savetrams($data);


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

	public function updatetram(){
		if ($this->input->is_ajax_request()) {

			$ID = $this->input->post("ID");

			$nombrepropietariodg = $this->input->post("nombrepropietariodg");
			$nombresolicitantedg = $this->input->post("nombresolicitantedg");
			$calledg = $this->input->post("calledg");
			$numerodg = $this->input->post("numerodg");
			$coloniadg = $this->input->post("coloniadg");
			$correodg = $this->input->post("correodg");
			$telefonodg = $this->input->post("telefonodg");

			$calleui = $this->input->post("calleui");
			$nodeloteui = $this->input->post("nodeloteui");
			$manzanaui = $this->input->post("manzanaui");
			$nooficialui = $this->input->post("nooficialui");
			$cbocolsui = $this->input->post("cbocolsui");
			$superficiepredioui = $this->input->post("superficiepredioui");
			$superficieconstruidaui = $this->input->post("superficieconstruidaui");
			$superficieconstruirui = $this->input->post("superficieconstruirui");
			$bardeoui = $this->input->post("bardeoui");
			$nonivelesui = $this->input->post("nonivelesui");
			$nocajonesui = $this->input->post("nocajonesui");
			$noviviendasui = $this->input->post("noviviendasui");
			$porcentajeavanceui = $this->input->post("porcentajeavanceui");

			$nombreperitodp = $this->input->post("nombreperitodp");
			$noregistroperitodp = $this->input->post("noregistroperitodp");
			$telefonoperitodp = $this->input->post("telefonoperitodp");
			$nombreperitoresponsabledp = $this->input->post("nombreperitoresponsabledp");
			$noregistroresponsabledp = $this->input->post("noregistroresponsabledp");
			$telefonoresponsabledp = $this->input->post("telefonoresponsabledp");
			$periodopermiso = $this->input->post("periodopermiso");
			$fechainiciodp = $this->input->post("fechainiciodp");
			$fechaterminodp = $this->input->post("fechaterminodp");
			$fechaentregadp = $this->input->post("fechaentregadp");
			$nocontroldp = $this->input->post("nocontroldp");

			$callenorte = $this->input->post("callenorte");
			$callesur = $this->input->post("callesur");
			$calleeste = $this->input->post("calleeste");
			$calleoeste = $this->input->post("calleoeste");
			$seccion = $this->input->post("seccion");
			$status = $this->input->post("status");


			/*Nombre Archivos Guardados*/

			$inpdocsbitacora =  $this->input->post("inpdocsbitacora");
			$inpdocsdocsplano = $this->input->post("inpdocsdocsplano");
			$inpdocsvbuenofinales =  $this->input->post("inpdocsvbuenofinales");
			$inpdocspermisoconstruccion =  $this->input->post("inpdocspermisoconstruccion");
			$inpdocsreportefotografico =  $this->input->post("inpdocsreportefotografico");

			$maxnumbd = $ID;

			if(!empty($nombrepropietariodg) & !empty($nombresolicitantedg) & !empty($calledg) & !empty($numerodg) & !empty($coloniadg)& !empty($correodg) & !empty($calleui) & !empty($nodeloteui) & !empty($manzanaui) & !empty($nooficialui) & !empty($cbocolsui)){

		$this->load->library("upload");
		$variablefile = $_FILES;

		//print_r($_FILES['docsbitacora']);

		$banderabitacora = 0;
		if(!empty($inpdocsbitacora)){
				$banderabitacora = 1;
		}

		if (!empty($_FILES['docsbitacora']['tmp_name'][0])) {

			$banderabitacora = 1;

			$numfiles = count($_FILES['docsbitacora']['tmp_name']);
			//Documentos Bitacora
			for ($i=0; $i < $numfiles; $i++) {
			$path = $variablefile['docsbitacora']['tmp_name'][$i];
			$this->zip->read_file($path,$variablefile['docsbitacora']['name'][$i]);
			}
			//Write the zip file to a folder on your server. Name it "my_backup.zip"
			if($this->zip->archive('./assets/tramites/construccion/file-'.$maxnumbd.'-docsbitacora.zip')){
			$docsbitacora = "file-".$maxnumbd."-docsbitacora.zip";
			$consultabitacora = $docsbitacora;
			}
			$this->zip->clear_data();
		}
		else{
			//$docsbitacora = "";
			$consultabitacora="";
		}

		$banderadocsplano = 0;
		if(!empty($inpdocsdocsplano)){
				$banderadocsplano = 1;
			}

		//+++++++++++++++++++++++++Planos Actualizados++++++++++++++++++++++++++++++++++

		if (!empty($_FILES['docsplano']['tmp_name'][0])) {
			/*
			if(!empty($inpdocsdocsplano)){
				$ruta = "./assets/tramites/construccion/".$inpdocsdocsplano;
				unlink($ruta);
			}
			*/
			$banderadocsplano = 1;

			$numfiles = count($_FILES['docsplano']['tmp_name']);
			//Documentos Bitacora
			for ($i=0; $i < $numfiles; $i++) {
			$path = $variablefile['docsplano']['tmp_name'][$i];
			$this->zip->read_file($path,$variablefile['docsplano']['name'][$i]);
			}
			//Write the zip file to a folder on your server. Name it "my_backup.zip"
			if($this->zip->archive('./assets/tramites/construccion/file-'.$maxnumbd.'-docsplano.zip')){
			$docsplano = "file-".$maxnumbd."-docsplano.zip";
			$consultaplano = $docsplano;
			}
			$this->zip->clear_data();
		}
		else{
			$consultaplano = "";
		}


		$banderavistobueno = 0;
		if (!empty($inpdocsvbuenofinales)) {
			$banderavistobueno = 1;
		}

		//+++++++++++++++++++++++++Vistos Buenos finales++++++++++++++++++++++++++++++++

		if (!empty($_FILES['docsvbuenofinales']['tmp_name'][0])) {
			$banderavistobueno = 1;

			$numfiles = count($_FILES['docsvbuenofinales']['tmp_name']);
			//Documentos Bitacora
			for ($i=0; $i < $numfiles; $i++) {
			$path = $variablefile['docsvbuenofinales']['tmp_name'][$i];
			$this->zip->read_file($path,$variablefile['docsvbuenofinales']['name'][$i]);
			}
			//Write the zip file to a folder on your server. Name it "my_backup.zip"
			if($this->zip->archive('./assets/tramites/construccion/file-'.$maxnumbd.'-docsvbuenofinales.zip')){
			$docsvbuenofinales = "file-".$maxnumbd."-docsvbuenofinales.zip";
			$consultavbuenofinales = $docsvbuenofinales;
			}
			$this->zip->clear_data();
		}
		else{
			$consultavbuenofinales = "";
		}

		$banderapermisoconst = 0;
		if (!empty($inpdocspermisoconstruccion)) {
			$banderapermisoconst = 1;
		}

		//++++++++++++++++++++Permiso de Construcción vigente+++++++++++++++++++++++++++

		if(!empty($_FILES['docspermisoconstruccion']['tmp_name'][0])){
			$banderapermisoconst = 1;
			$numfiles = count($_FILES['docspermisoconstruccion']['tmp_name']);

			for ($i=0; $i < $numfiles; $i++) {
			$path = $variablefile['docspermisoconstruccion']['tmp_name'][$i];
			$this->zip->read_file($path,$variablefile['docspermisoconstruccion']['name'][$i]);
			}
			//Write the zip file to a folder on your server. Name it "my_backup.zip"
			if($this->zip->archive('./assets/tramites/construccion/file-'.$maxnumbd.'-docspermisoconstruccion.zip')){
			$docspermisoconstruccion = "file-".$maxnumbd."-docspermisoconstruccion.zip";
			$consultapermisoconstruccion = $docspermisoconstruccion;
			}
			$this->zip->clear_data();
		}
		else{
			$consultapermisoconstruccion = "";
		}

		$banderareportefoto = 0;
		if (!empty($inpdocsreportefotografico)) {
			$banderareportefoto = 1;
		}

		//++++++++++++++++++++++++++Reporte Fotográfico++++++++++++++++++++++++++++++

		if(!empty($_FILES['docsreportefotografico']['tmp_name'][0])){
			$banderareportefoto = 1;
			$numfiles = count($_FILES['docsreportefotografico']['tmp_name']);
			//Documentos Bitacora
			for ($i=0; $i < $numfiles; $i++) {
			$path = $variablefile['docsreportefotografico']['tmp_name'][$i];
			$this->zip->read_file($path,$variablefile['docsreportefotografico']['name'][$i]);
			}
			//Write the zip file to a folder on your server. Name it "my_backup.zip"
			if($this->zip->archive('./assets/tramites/construccion/file-'.$maxnumbd.'-docsreportefotografico.zip')){
			$docsreportefotografico = "file-".$maxnumbd."-docsreportefotografico.zip";
			$consultareportefotografico = $docsreportefotografico;
			}
			$this->zip->clear_data();
		}
		else{
			$consultareportefotografico = "";
		}
		$numerodocs = $banderapermisoconst + $banderareportefoto + $banderavistobueno + $banderadocsplano + $banderabitacora;

		if ($numerodocs >= 5) {
			$status = 1;
		}
		else{
			$status = 0;
		}
				$data = array('nombrepropietariodg' => $nombrepropietariodg,'nombresolicitantedg' => $nombresolicitantedg,'calledg' => $calledg,'numerodg' => $numerodg,'coloniadg' => $coloniadg,'correodg' => $correodg,'telefonodg' => $telefonodg,'calleui' => $calleui,'nodeloteui' => $nodeloteui,'manzanaui' => $manzanaui,'nooficialui' => $nooficialui,'cbocolsui' => $cbocolsui,'superficiepredioui' => $superficiepredioui,'superficieconstruidaui' => $superficieconstruidaui,'superficieconstruirui' => $superficieconstruirui,'bardeoui' => $bardeoui,'nonivelesui' => $nonivelesui,'nocajonesui' => $nocajonesui,'noviviendasui' => $noviviendasui,'porcentajeavanceui' => $porcentajeavanceui,'nombreperitodp' => $nombreperitodp,'noregistroperitodp' => $noregistroperitodp,'telefonoperitodp' => $telefonoperitodp,'nombreperitoresponsabledp' => $nombreperitoresponsabledp,'noregistroresponsabledp' => $noregistroresponsabledp,'telefonoresponsabledp' => $telefonoresponsabledp,'periodopermiso' => $periodopermiso,'fechainiciodp' => $fechainiciodp,'fechaterminodp' => $fechaterminodp,'fechaentregadp'=>$fechaentregadp,'nocontroldp' => $nocontroldp,'docsbitacora'=>$consultabitacora,'docsplano'=>$consultaplano,'docsvbuenofinales'=> $consultavbuenofinales,'docspermisoconstruccion'=>$consultapermisoconstruccion,'docsreportefotografico'=>$consultareportefotografico,'callenorte'=>$callenorte,'callesur'=>$callesur,'calleeste'=>$calleeste,'calleoeste'=>$calleoeste,'seccion'=>$seccion,'status'=>$status,'ID'=>$ID);


				$res = $this->Autorizacionocupacionconstruccion_model->updatetrams($data);
				//echo $res;

				if ($res == true) {
				echo true;
				}
				else{
				echo false;
				}
			}
			else{
			echo "Complete todos los campos para continuar con el trámite";
				//echo $maxnum;
			/*
			echo $inpdocsbitacora."<br>";
			echo $inpdocsdocsplano."<br>";
			echo $inpdocsvbuenofinales."<br>";
			echo $inpdocspermisoconstruccion."<br>";
			echo $inpdocsreportefotografico."<br>";

			$numerodocs = $banderapermisoconst + $banderareportefoto + $banderavistobueno + $banderadocsplano + $banderabitacora;
			echo "La suma = ".$numerodocs;
			*/
			}

		}
		else{
			show_404();
		  }
		}
}
?>
