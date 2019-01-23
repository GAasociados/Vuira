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
		if($i>0)
			$folios_html .=",";
		$folios_html .= $folios[$i];
	}
}


//BORRAR LOS SIGUIENTE
/* $nombre = "RECUPERADORA JURIDICA INMOBILIARIA S DE RL DE CV"; 
$fecha_inicial = "21-01-19";
$fecha_final = "2019-01-24 13:00:00";
$correo = "no@hotmail.com";
$telefono = "4626900017";
$folios = [125,126,127,128,129.130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155];
	for ($i = 0; $i < count($folios); $i++)
	{
		if($i>0)
			$folios_html .=",";
		$folios_html .= $folios[$i];
	}  */

class CCPDF extends TCPDF {
	public $InF="";
    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'LOGOIRA.png';
        //$this->Image($image_file, 15, 10, 185, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
$pdf->SetTitle('Clave Catastral Fraccionamientos');
$pdf->SetSubject('clave catastral Fraccionamientos');
$pdf->SetKeywords('Clave Catastral, Irapuato');

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
  <td>Clave Catastral Fracionamientos</td>
</tr>
<tr align="center">
  <td></td>
</tr>
<tr align="center">
  <td>Nombre: $nombre</td>
</tr>
<br>
<tr align="center">
  <td>Fecha de solicitud de su trámite: $fecha_inicial</td>
</tr>
<br>
<tr align="center">
  <td>Fecha y hora de entrega de su trámite: $fecha_final</td>
</tr>
<br>
<tr align="center">
  <td>Folios:</td>
</tr>
<tr align="center">
  <td>$folios_html</td>
</tr>
<br>
<tr>
	<td align="center"><img src="http://localhost/Vuira/assets/images/logo.png" width="160">
	</td>
</tr>
</table>
EOD;
$pdf->writeHTML($html,true,false,false,false,'L');

$pdf->SetY(150);
$html2 = <<<EOD
<table>
<tr>
<td align="center">
		<label>
				Calle Álvaro Obregón N°100 Zona Centro, Irapuato Guanajuato,
		</label>
</td>
</tr>
<tr>
<td align="center">Tel: 01(462)6069999 ext. 1564</td>
</tr>
</table>
EOD;
$pdf->writeHTML($html2,true,false,false,false,'L');

$pdf->Output('example_001.pdf', 'I');

 ?>