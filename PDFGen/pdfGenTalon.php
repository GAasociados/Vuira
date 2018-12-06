<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require_once('tcpdf_include.php');
//$Tipo_Tramite="Escritura Publica";
//$Tipo_Tramite="Solicitud IMUVII";
//$Tipo_Tramite="Constancia Ejidal";

$fecha_inicial = "";
$fecha_final = "";

if ( isset($_GET['fecha_ini']) && isset($_GET['fecha_final']) )
{
	$fecha_inicial = $_GET['fecha_ini'];
	$fecha_final = $_GET['fecha_final'];
}

$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');

$nombrepropietariodp="Juanito Perez";/////////////////////
$Fecha = "";//////////////////
$numero_doc="0000";////////////////////
$tipotramitedp="Asignacion de clave catastral";/////////////////////
$FechaR="26 de enero";/////////
$calleui="Datilero";///////////////////
$nooficialui="00287, L-1, M-1 "; //////////////////////
$coloniaui="LAS ERAS 2DA SECCION"; ///////////////////
$predialui="14A009054001";/////////////////
$sup="111";//////////////////
$caracter="Propietario";////////////////////
$fecha_escritura="11 de octubre de 2018";///////////////////
$No_Esc="16555"; ////////////////////
$notario="JOJOJOJ";////////////////
$no_notario="5";/////////////////
$observaciones="";//////////////
$clave="00000000000000";///////////////
$numero_exp="001742018";//////////////////
$fecha_ini="02 de octubre de 2018.";///////////
$nombre_imuvii="PEDRO PABLO EQUIS";//////////////
$imuvii="0015156132";/////////////
$Privativat="10";///////////////
$Comunt="5";/////////////////
$Cubiertat="";//////////////////
$Cubiertatd="2";///////////
$indivisott="3";////////////////
$Indivisopt="4";/////////////////
$Croquis_URL="houseDf.png";///////////
$nomanzanaui="5";////////////////
$noloteui="4";//////////////////
$INFONAVIT_Num="55501";///////////
$Titulo_Num = "20000";//////////
$Juicio_Num=" 55555";/////////
$Juicio_Juez="Lic. Pablo Barraza Juez Primero de lo Civil";//////////
$Iniciales_func="COA";//////////
$Copropietario="Pedro Mendoza";/////////
$Parcela="1524";///////
$CORETT_Contrato="Irapuato";////////
$Constancia="12";/////////

function DateParser($dia,$mes,$año){

	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');
	if($año!="")
		return $dia . " de " . $arrayMeses[$mes-1] . " de " . $año; 
	else
		return $dia . " de " . $arrayMeses[$mes-1]; 
}



class CCPDF extends TCPDF {
	public $InF="";
    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'LOGOIRA.png';
        $this->Image($image_file, 15, 10, 185, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
		 $this->SetY(-30);
		 $this->SetFont('helvetica', '', 8);
	$html2 = <<<EOD
	<div style=" text-align:Left;padding:0px 0px 0px 0px;">
	ARCHIVO<br />
	CAH/CAJ/$this->InF<br />
	TESORERIA MUNICIPAL / CATASTRO
	<hr>
	Álvaro Obregón no. 100 Zona Centro, CP 36500,<br />
	Tel. 01 (462) 606  99 99 ext. 1566 y 1568<br />
	Irapuato, Gto.

	</div>
EOD;
		$this->writeHTML($html2,true,false,false,false,'L');
    }
}
	isset($_POST["Tipo_Tramite"])? $Tipo_Tramite=$_POST["Tipo_Tramite"]:$Tipo_Tramite="";
	isset($_POST["Fecha_Generacion_Documento"])? $Fecha=$_POST["Fecha_Generacion_Documento"]:$Fecha="";
	isset($_POST["Numero_Exterior"])? $nooficialui=$_POST["Numero_Exterior"]:$nooficialui="";
	isset($_POST["NoInterior"])? $NoInterior=$_POST["NoInterior"]:$NoInterior="";
	isset($_POST["Nombre_Propietario"])? $nombrepropietariodp=$_POST["Nombre_Propietario"]:$nombrepropietariodp="";
	isset($_POST["No_Off"])? $numero_doc=$_POST["No_Off"]:$numero_doc="";
	//isset($_POST["ID_Numero_Oficio"])? $numero_seg=$_POST["ID_Numero_Oficio"]:$numero_seg="";
	isset($_POST["tipotramitedp"])? $tipotramitedp=$_POST["tipotramitedp"]:$tipotramitedp=""; // falta en la db
	isset($_POST["Fecha_Inicio"])? $FechaR=$_POST["Fecha_Inicio"]:$FechaR="";
	isset($_POST["Calle"])? $calleui=$_POST["Calle"]:$calleui="";
	isset($_POST["Colonia"])? $coloniaui=$_POST["Colonia"]:$coloniaui="";
	isset($_POST["Numero_Predial"])? $predialui=$_POST["Numero_Predial"]:$predialui="";
	isset($_POST["Superficie"])? $sup=$_POST["Superficie"]:$sup="";
	isset($_POST["Caracter"])? $caracter=$_POST["Caracter"]:$caracter="";
	isset($_POST["Fecha_Escritura"])? $fecha_escritura=$_POST["Fecha_Escritura"]:$fecha_escritura="1-1-1";
	isset($_POST["Nombre_Notario"])? $notario=$_POST["Nombre_Notario"]:$notario="";
	isset($_POST["Numero_Notario"])? $no_notario=$_POST["Numero_Notario"]:$no_notario="";
	isset($_POST["Observaciones"])? $observaciones=trim($_POST["Observaciones"]):$observaciones="";
	isset($_POST["Clave_Catastral"])? $clave=$_POST["Clave_Catastral"]:$clave="";
	isset($_POST["Fecha_Inicio"])? $fecha_ini=$_POST["Fecha_Inicio"]:$fecha_ini="";
	isset($_POST["Numero_Seguimiento"])? $numero_exp=$_POST["Numero_Seguimiento"]:$numero_exp="";
	isset($_POST["Nombre_Encargado_IMUVII"])? $nombre_imuvii=$_POST["Nombre_Encargado_IMUVII"]:$nombre_imuvii="";
	isset($_POST["Solicitud_IMUVII"])? $imuvii=$_POST["Solicitud_IMUVII"]:$imuvii="";
	isset($_POST["Area_Privativa"])? $Privativat=$_POST["Area_Privativa"]:$Privativat="";
	isset($_POST["Area_Comun"])? $Comunt=$_POST["Area_Comun"]:$Comunt="";
	isset($_POST["Area_Comun_Descubierta"])? $Cubiertatd=$_POST["Area_Comun_Descubierta"]:$Cubiertatd="";
	isset($_POST["Area_Comun_Cubierta"])? $Cubiertat=$_POST["Area_Comun_Cubierta"]:$Cubiertat="";
	isset($_POST["Total_Indiviso"])? $indivisott=$_POST["Total_Indiviso"]:$indivisott="";
	isset($_POST["Porcentaje_Indiviso"])? $Indivisopt=$_POST["Porcentaje_Indiviso"]:$Indivisopt="";
	isset($_POST["Croquis_URL"])? $Croquis_URL=$_POST["Croquis_URL"]:$Croquis_URL="";
	isset($_POST["Manzana"])? $nomanzanaui=$_POST["Manzana"]:$nomanzanaui="";
	isset($_POST["Numero_Lote"])? $noloteui=$_POST["Numero_Lote"]:$noloteui="";
	isset($_POST["Numero_INFONAVIT"])? $INFONAVIT_Fecha=$_POST["Numero_INFONAVIT"]:$INFONAVIT_Fecha="";
	isset($_POST["Numero_Titulo"])? $Titulo_Num=$_POST["Numero_Titulo"]:$Titulo_Num="";
	isset($_POST["Numero_Juicio"])? $Juicio_Num=$_POST["Numero_Juicio"]:$Juicio_Num="";
	isset($_POST["Nombre_Juicio_Juez"])? $Juicio_Juez=$_POST["Nombre_Juicio_Juez"]:$Juicio_Juez="";
	isset($_POST["Iniciales_Func"])? $Iniciales_func=$_POST["Iniciales_Func"]:$Iniciales_func="";
	isset($_POST["Copropietarios"])? $Copropietario=$_POST["Copropietarios"]:$Copropietario="";
	isset($_POST["Numero_Escritura"])? $No_Esc=$_POST["Numero_Escritura"]:$No_Esc="";
	isset($_POST["Numero_Parcela"])? $Parcela=$_POST["Numero_Parcela"]:$Parcela="";
	isset($_POST["Contrato_CORETT"])? $CORETT_Contrato=$_POST["Contrato_CORETT"]:$CORETT_Contrato="";
	isset($_POST["Constancia"])? $Constancia=$_POST["Constancia"]:$Constancia="";
	isset($_POST["Fecha_Cert_Parcela"])? $Fecha_Cert_Parcela=$_POST["Fecha_Cert_Parcela"]:$Fecha_Cert_Parcela="";
	isset($_POST["No_Cert_Parcela"])? $No_Cert_Parcela=$_POST["No_Cert_Parcela"]:$No_Cert_Parcela="";
	isset($_POST["Tipo_Sup"])? $Tipo_Sup=$_POST["Tipo_Sup"]:$Tipo_Sup="";
	isset($_POST["Ejido"])? $Ejido=$_POST["Ejido"]:$Ejido="";
	isset($_POST["Zona"])? $Zona=$_POST["Zona"]:$Zona="";
	isset($_POST["Superficie_Infonavit"])? $Superficie_Infonavit=$_POST["Superficie_Infonavit"]:$Superficie_Infonavit="";
	isset($_POST["Calle_Infonavit"])? $Calle_Infonavit=$_POST["Calle_Infonavit"]:$Calle_Infonavit="";
	isset($_POST["Colonia_Infonavit"])? $Colonia_Infonavit=$_POST["Colonia_Infonavit"]:$Colonia_Infonavit="";
	isset($_POST["Lote_Infonavit"])? $Lote_Infonavit=$_POST["Lote_Infonavit"]:$Lote_Infonavit="";
	isset($_POST["Manzana_Infonavit"])? $Manzana_Infonavit=$_POST["Manzana_Infonavit"]:$Manzana_Infonavit="";
	isset($_POST["Predial_IMUVII"])? $Predial_IMUVII=$_POST["Predial_IMUVII"]:$Predial_IMUVII="";
	isset($_POST["Fecha_Constancia_IMUVII"])? $Fecha_Constancia_IMUVII=$_POST["Fecha_Constancia_IMUVII"]:$Fecha_Constancia_IMUVII="";
	isset($_POST["Fecha_CORETT"])? $Fecha_CORETT=$_POST["Fecha_CORETT"]:$Fecha_CORETT="";
	isset($_POST["Ref_Legal"])? $Ref_Legal=$_POST["Ref_Legal"]:$Ref_Legal="";
	isset($_POST["Ciudad_CORETT"])? $Ciudad_CORETT=$_POST["Ciudad_CORETT"]:$Ciudad_CORETT="";
	isset($_POST["Superficie_CORETT"])? $Superficie_CORETT=$_POST["Superficie_CORETT"]:$Superficie_CORETT="";
	isset($_POST["Cargo_IMUVII"])? $Cargo_IMUVII=$_POST["Cargo_IMUVII"]:$Cargo_IMUVII="";
	isset($_POST["Numero_Infonavit2"])? $Numero_Infonavit2=$_POST["Numero_Infonavit2"]:$Numero_Infonavit2="";
	isset($_POST["Cargo_IMUVII"])? $Cargo_IMUVII=$_POST["Cargo_IMUVII"]:$Cargo_IMUVII="";
	isset($_POST["Es_Ciudad_Escritura"])? $Es_Ciudad_Escritura=$_POST["Es_Ciudad_Escritura"]:$Es_Ciudad_Escritura="";
	isset($_POST["Es_Estado_Escritura"])? $Es_Estado_Escritura=$_POST["Es_Estado_Escritura"]:$Es_Estado_Escritura="";
	isset($_POST["Manzana_Titulo"])? $Manzana_Titulo=$_POST["Manzana_Titulo"]:$Manzana_Titulo="";
	isset($_POST["Porcion"])? $Porcion=$_POST["Porcion"]:$Porcion="";
	//var_dump($_POST);
		
	$e_areas="";
	$c_dirigido_a="";
	$c_atencion_a="";
	$c_clausula="";
	$c_docNum="";
	$c_copropietario="";

	$c_porcion = "";
	/*if($Parcela != "")
		$NoInterior .= "Parcela/Solar ".$Parcela;*/
	/*if($Zona != "")
		$NoInterior .= ", Zona ".$Zona;*/
	
	
// create new PDF document
if(isset($_POST['PageFormat']))
	if($_POST['PageFormat']=="Oficio")
		$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT_OFF, true, 'UTF-8', false);
	else
		$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
else
	$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->InF = $Iniciales_func;

//var_dump($_POST);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gobierno Municipal de Irapuato');
$pdf->SetTitle('clave Catastral');
$pdf->SetSubject('clave catastral');
$pdf->SetKeywords('clave Catastral, Irapuato');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 9, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


/*Reglas de operacion para los diferentes documentos*/




$html = <<<EOD
<div style="font-weight: bold; text-align:right;padding:0px 0px 0px 0px;">
<br />TESORERÍA MUNICIPAL <br />
DIRECCIÓN DE CATASTRO <br />
DC/$c_docNum <br />
Asunto: $tipotramitedp <br />
Irapuato, Guanajuato, $Fecha <br />
</div>
EOD;
$pdf->writeHTML($html,true,false,false,false,'R');


$html = <<<EOD
<h1>CONTENIDO</h1>
<label>Fecha de Inicio:</label>
$fecha_inicial
<label>Fecha Final:</label>
$fecha_final
EOD;
$pdf->writeHTML($html,true,false,false,false,'L');


$pdf->Output('example_001.pdf', 'I');

 ?>