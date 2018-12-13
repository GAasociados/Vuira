<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

require_once('tcpdf_include.php');
//$Tipo_Tramite="Escritura Publica";
//$Tipo_Tramite="Solicitud IMUVII";
//$Tipo_Tramite="Constancia Ejidal";
$fecha_inicial = "";
$fecha_final = "";
$nombre="";
$correo = "";
$folios = "";
$folios_html = "";
$clave = "";

if ( isset($_GET['nombre']) && isset($_GET['correo']) && isset($_GET['fecha_inicial']) && isset($_GET['fecha_final']) && isset($_GET['folios']) && isset($_GET['clave']) ) 
{
	$nombre = $_GET['nombre'];
	$correo = $_GET['correo'];
	$fecha_inicial = $_GET['fecha_inicial'];
	$fecha_final = $_GET['fecha_final'];
	$folios = json_decode($_GET['folios'], true);
	$clave = $_GET['clave'];
	for ($i = 0; $i < count($folios); $i++)
	{
		$folios_html .= $folios[$i].", ";
	}
}

function DateParser($dia,$mes,$año){

	
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
EOD;
		$this->writeHTML($html2,true,false,false,false,'L');
    }
}

	//var_dump($_POST);
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
$pdf->SetFont('helvetica', '', 15, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

//aqui agregar el contenido
//$telefono = $_GET['telefono'];
//$tipo_tramite = $_GET['tipo_tramite'];
$html = <<<EOD
<table>
<tr align="center">
  <td>Nombre</td>
</tr>
<tr align="center">
  <td>$nombre</td>
</tr>
<br>
<tr align="center">
  <td>Correo</td>
</tr>
<tr align="center">
  <td>$correo</td>
</tr>
<br>
<tr align="center">
  <td>Asignacion de clave catastral</td>
</tr>
<tr align="center">
  <td>$clave</td>
</tr>
<br>
<tr align="center">
  <td>Folios</td>
</tr>
<tr align="center">
  <td>$folios_html</td>
</tr>
<br>
<tr align="center">
  <td>Fecha Inicio</td>
</tr>
<tr align="center">
  <td>$fecha_inicial</td>
</tr>
<br>
<tr align="center">
  <td>Fecha Final</td>
</tr>
<tr align="center">
  <td>$fecha_final</td>
</tr>
</table>
EOD;
$pdf->writeHTML($html,true,false,false,false,'L');


$pdf->Output('example_001.pdf', 'I');

 ?>