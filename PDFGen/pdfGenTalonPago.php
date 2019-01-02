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
$html = '
<table cellspacing="5" cellpadding="5" style="font-size:13px;">
    <tr>
			<td align="center" colspan="3"><strong>Clave Catastral Fraccionamientos</strong></td>
			<td align="center">Orden de Pago</td>
    </tr>
    <tr>
			<td align="center" colspan="3" style="border: 1px solid black;">TIPO DE AUTORIZACION</td>
			<td align="center" style="border: 1px solid black;">No. DE AUTORIZACION</td>
    </tr>
    <tr>
			<td align="justify" colspan="3" rowspan="5" >EN RELACIÓN A LA SOLICITUD PRESENTADA ANTE LA DIRECCIÓN DE CATASTRO, ADSCRITA A LA TESORERÍA MUNICIPAL, 
			CON LA FINALIDAD DE OBTENER LA CLAVE CATASTRAL CERTIFICADA; PREVIO ANÁLISIS PRACTICADO PARA TAL EFECTO SE TIENE LO SIGUIENTE: DEBERÁ
			PAGAR A LA TESORERÍA MUNICIPAL LOS DERECHOS CORRESPONDIENTES A LA PRESENTE CLAVE CATASTRAL CERTIFICADA POR LA CANTIDAD DE $<?php echo number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2); ?>
			(<span id="letras"></span>), DE CONFORMIDAD CON LO DISPUESTO EN EL ARTÍCULO 27 FRACCIÓN VIII DE LA LEY DE INGRESOS PARA 
			EL MUNICIPIO DE IRAPUATO GUANAJUATO PUBLICADA EN EL PERIÓDICO OFICIAL DEL GOBIERNO DEL ESTADO DE GUANAJUATO, QUE ENTRÓ EN VIGOR A PARTIR DEL 1° DE ENERO DEL AÑO 2018
			PARA EL EJERCICIO FISCAL AÑO 2018.</td>
			<td align="center">####</td>
    </tr>
    <tr>
			<td align="center" style="border: 1px solid black;">NUMERO DE SEGUIMIENTO</td>
		</tr>
		<tr>
			<td align="center">####</td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;">FECHA DE AUTORIZACION</td>
		</tr>
		<tr>
			<td align="center">####</td>
		</tr>
		<tr>
			<td align="center" colspan="3" style="border: 1px solid black;">Descripción</td>
			<td align="center" style="border: 1px solid black;">Monto de Autorizacion</td>
		</tr>
		<tr>
			<td align="left"><strong>CONCEPTO</strong></td>
			<td align="right"><strong>CANTIDAD</strong></td>
			<td align="right"><strong>TARIFA</strong></td>
			<td align="right"><strong>COSTO</strong></td>
			<td align="right"><strong>TOTAL</strong></td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;">Informacion</td>
			<td align="center" style="border: 1px solid black;" colspan="2">PROPIETARIO/SOLICITANTE/RAZON SOCIAL</td>
			<td align="center" style="border: 1px solid black;">AUTORIZACION</td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;">LOGO</td>
			<td align="center" style="border: 1px solid black;" colspan="2">PROPIETARIO MISMO QUE PAGARÁ A LA TESORERIA MUNICIPAL DE IRAPAUTO LA CANTIDAD
			DE $$$$ (CON LETRA)</td>
			<td align="center" style="border: 1px solid black;" >LOGO</td>
		</tr>
		<tr>
			<td align="center" colspan="4">Si requiere factura tiene 48 horas para su solicitud al correo electronico facturacion@irapuato.gob.mx</td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;" colspan="2">PARA USO EXCLUSIVO DEL BANCO</td>
			<td align="center" style="border: 1px solid black;" colspan="2">PARA USO EN BANCA ELECTRONICA</td>
		</tr>
</table>';
$pdf->writeHTML($html,true,false,false,false,'L');


$pdf->Output('example_001.pdf', 'I');

 ?>