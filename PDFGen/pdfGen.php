<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

require_once('tcpdf_include.php');
//$Tipo_Tramite="Escritura Pública";
//$Tipo_Tramite="Solicitud IMUVII";
//$Tipo_Tramite="INFONAVIT";

$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');

//Asignación de clave catastral
//Modificación de clave catastral
//Duplicado de clave catastral

$nombrepropietariodp="Juanito Perez";//
$Fecha = $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); //
$numero_doc="0000";//
$tipotramitedp="Asignacion de clave catastral";//
$FechaR="26 de enero";
$calleui="Datilero";//
$nooficialui="00287, L-1, M-1 "; //
$coloniaui="LAS ERAS 2DA SECCION"; //
$predialui="14A009054001";//
$sup="111";//
$Caracter="Propietario";
$fecha_escritura="11 de octubre de 2018";//
$notario="JOJOJOJ";//
$no_notario="5";//
$observaciones="";//
$clave="00000000000000";//
$numero_exp="001742018";//
$fecha_ini="02 de octubre de 2018.";//
$nombre_imuvii="PEDRO PABLO EQUIS";//
$imuvii="0015156132";//
$Privativat="10";//
$Comunt="5";//
$Cubiertat="1";//
$Cubiertatd="2";//
$indivisott="3";//
$Indivisopt="4";//
$Croquis_URL="houseDf.png";
$nomanzanaui="5";//
$noloteui="4";//
$INFONAVIT_Num="55501";
$Titulo_Num = "20000";
$Juicio_Num=" 55555";
$Juicio_Juez="";

class CCPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'LOGOIRA.png';
        $this->Image($image_file, 15, 10, 185, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        //$this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
		 $this->SetY(-30);
		 $this->SetFont('helvetica', '', 8);
	$html2 = <<<EOD
	<div style=" text-align:Left;padding:0px 0px 0px 0px;">
	ARCHIVO<br />
	CAH/CAJ/FC<br />
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
	isset($_POST["Fecha"])? $Fecha=$_POST["Fecha"]:$Fecha="";
	isset($_POST["nooficialui"])? $nooficialui=$_POST["nooficialui"]:$nooficialui="";
	isset($_POST["nombrepropietariodp"])? $nombrepropietariodp=$_POST["nombrepropietariodp"]:$nombrepropietariodp="";
	isset($_POST["numero_doc"])? $numero_doc=$_POST["numero_doc"]:$numero_doc="";
	isset($_POST["tipotramitedp"])? $tipotramitedp=$_POST["tipotramitedp"]:$tipotramitedp="";
	isset($_POST["FechaR"])? $FechaR=$_POST["FechaR"]:$FechaR="";
	isset($_POST["calleui"])? $calleui=$_POST["calleui"]:$calleui="";
	isset($_POST["coloniaui"])? $coloniaui=$_POST["coloniaui"]:$coloniaui="";
	isset($_POST["predialui"])? $predialui=$_POST["predialui"]:$predialui="";
	isset($_POST["sup"])? $sup=$_POST["sup"]:$sup="";
	isset($_POST["Caracter"])? $Caracter=$_POST["Caracter"]:$Caracter="";
	isset($_POST["fecha_escritura"])? $fecha_escritura=$_POST["fecha_escritura"]:$fecha_escritura="";
	isset($_POST["notario"])? $notario=$_POST["notario"]:$notario="";
	isset($_POST["no_notario"])? $no_notario=$_POST["no_notario"]:$no_notario="";
	isset($_POST["observaciones"])? $observaciones=$_POST["observaciones"]:$observaciones="";
	isset($_POST["clave"])? $clave=$_POST["clave"]:$clave="";
	isset($_POST["fecha_ini"])? $fecha_ini=$_POST["fecha_ini"]:$fecha_ini="";
	isset($_POST["numero_exp"])? $numero_exp=$_POST["numero_exp"]:$numero_exp="";
	isset($_POST["nombre_imuvii"])? $nombre_imuvii=$_POST["nombre_imuvii"]:$nombre_imuvii="";
	isset($_POST["imuvii"])? $imuvii=$_POST["imuvii"]:$imuvii="";
	isset($_POST["Privativat"])? $Privativat=$_POST["Privativat"]:$Privativat="";
	isset($_POST["Comunt"])? $Comunt=$_POST["Comunt"]:$Comunt="";
	isset($_POST["Cubiertatd"])? $Cubiertatd=$_POST["Cubiertatd"]:$Cubiertatd="";
	isset($_POST["indivisott"])? $indivisott=$_POST["indivisott"]:$indivisott="";
	isset($_POST["Indivisopt"])? $Indivisopt=$_POST["Indivisopt"]:$Indivisopt="";
	isset($_POST["Croquis_URL"])? $Croquis_URL=$_POST["Croquis_URL"]:$Croquis_URL="";
	isset($_POST["nomanzanaui"])? $nomanzanaui=$_POST["nomanzanaui"]:$nomanzanaui="";
	isset($_POST["noloteui"])? $noloteui=$_POST["noloteui"]:$noloteui="";
	isset($_POST["INFONAVIT_Num"])? $INFONAVIT_Num=$_POST["INFONAVIT_Num"]:$INFONAVIT_Num="";
	isset($_POST["Titulo_Num"])? $Titulo_Num=$_POST["Titulo_Num"]:$Titulo_Num="";
	isset($_POST["Juicio_Num"])? $Juicio_Num=$_POST["Juicio_Num"]:$Juicio_Num="";
	isset($_POST["Juicio_Juez"])? $Juicio_Juez=$_POST["Juicio_Juez"]:$Juicio_Juez="";

	if($tipotramitedp==1)
		$tipotramitedp="Asignación de clave catastral";
	else if($tipotramitedp==2)
		$tipotramitedp="Modificación de clave catastral";
	else
		$tipotramitedp="Duplicado de clave catastral";



// create new PDF document
$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$c_obs="";

if($observaciones!="")
	$c_obs="<div style='text-align:justify;'> $observaciones</div>";

$c_dirigido_a="";
$c_atencion_a="";
$c_clausula="";


if($Tipo_Tramite=="Escritura Publica")
{
	$e_areas="";
	if($Privativat!="")
	{
		$e_areas.="Como noloteui tiene un area privativa $Privativat M<sup>2</sup>, ";
	}
	if ($indivisott!="")
	{
		$e_areas.="le corresponde un indiviso de $indivisott M<sup>2</sup> ";
		if ($Indivisopt!="")
		{
			$e_areas.="que representa el $Indivisopt%";
		}
	}
	if ($Comunt!="")
	{
		$e_areas=="" ? $e_areas="Cuenta con un ": $e_areas.="y ";
		$e_areas.="Área común $Comunt M<sup>2</sup>";
	}
	if ($Cubiertat!="")
	{
		$e_areas=="" ? $e_areas="Cuenta con un ": $e_areas.="de los cuales ";
		$e_areas.="Árearea común Cubierta $Cubiertat M<sup>2</sup>";
	}
	if ($Cubiertatd!="")
	{
		$e_areas=="" ? $e_areas="Cuenta con un ": $e_areas.="y ";
		$e_areas.="Árearea común Descubierta $Cubiertatd M<sup>2</sup>";
	}
	
	$c_dirigido_a = $nombrepropietariodp;
	$c_clausula = <<<EOD
	<div sytle="text-indent:1cm "> &nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png"> El bien inmueble señalado se encuentra acreditado a nombre de <span style="font-weight: bold;"> $nombrepropietariodp</span> con el carácter de $Caracter, acreditando mediante la $Tipo_Tramite con fecha del $fecha_escritura, 
con la fe pública del Lic. $notario notario Público No. $no_notario de la ciudad de Irapuato, Gto. $e_areas</div>
EOD;
}
else if ($Tipo_Tramite=="Solicitud IMUVII")
{
	$c_dirigido_a = "INSTITUTO MUNICIPAL DE VIVIENDA DE IRAPUATO (IMUVII)";
	$c_atencion_a = "<br />EN ATENCIÓN A:".$nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra acreditado a nombre de <span style="font-weight: bold;"> $c_dirigido_a</span> con el carácter de $Caracter, y en atención a $nombrepropietariodp sustentando mediante 
	la <strong>CONSTANCIA IMUVII/DG/UR/01</strong> con <strong>NÚMERO DE FOLIO $imuvii</strong>, de fecha de $fecha_escritura, debidamente 
	sellada y rubricada por <strong>$nombre_imuvii</strong> Directora del Despacho de la Dirección Jurídica. </div>
EOD;

}
else if ($Tipo_Tramite=="INFONAVIT")
{
	$c_dirigido_a = $nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;"> $c_dirigido_a</span> con el carácter de $Caracter, 
	acreditado mediante instrumento Privado de Infonavit, Número $INFONAVIT_Num de fecha del $fecha_escritura como el noloteui número $noloteui de la nomanzanaui $nomanzanaui del Fraccionamiento 
	$coloniaui de esta ciudad de Irapuato, Gto. </div>
EOD;

}

else if ($Tipo_Tramite=="Titulo de Propiedad")
{
	$c_dirigido_a = $nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;"> $nombrepropietariodp</span> con el carácter de $Caracter, acreditando mediante el $Tipo_Tramite No. $Titulo_Num con fecha de $fecha_escritura, 
con la fe pública del ejido de $coloniaui de esta ciudad de Irapuato, Gto., con una superficie de $sup M<sup>2</sup></div>
EOD;

}

else if ($Tipo_Tramite=="Certificado Parcelario")
{
	$c_dirigido_a = $nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;"> $nombrepropietariodp</span> con el carácter de POSEEDOR, acreditando mediante el $Tipo_Tramite No. $Titulo_Num con fecha de $fecha_escritura, 
de la ciudad de Irapuato, Gto.</div>
EOD;

}

else if ($Tipo_Tramite=="CORETT")
{
	$c_dirigido_a = $nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;"> $nombrepropietariodp</span> con el carácter de $Caracter, 
	acreditando mediante el contrato privado de compraventa CORETT  de la ciudad de Leon, Gto., con una superficie de $sup M<sup>2</sup></div>
EOD;

}

else if ($Tipo_Tramite=="Sentencia Juridica")
{
	$c_dirigido_a = $nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado para el otorgamiento de $Tipo_Tramite a favor de <span style="font-weight: bold;"> $nombrepropietariodp</span>, dentro del Juicio Ordinario 
	Civil número $Juicio_Num sentencia de fecha del $fecha_escritura resuelto por $Juicio_Juez Juez Primero Civil, de esta ciudad de Irapuato Guanajuato.</div>
EOD;

}

else if ($Tipo_Tramite=="Constancia Ejidal")
{
	$c_dirigido_a = $nombrepropietariodp;
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;"> $nombrepropietariodp</span>, con el carácter de $Caracter, 
	acreditado mediante $Constancia con fecha de $fecha_escritura de la ciudad de Irapuato Guanajuato.</div>
EOD;

}

$html = <<<EOD
	<br />
	<br />
EOD;
$pdf->writeHTML($html,true,false,false,false,'R');

$html = <<<EOD
<div style="font-weight: bold; text-align:right;padding:0px 0px 0px 0px;">
<br />TESORERÍA MUNICIPAL <br />
DIRECCIÓN DE CATASTRO <br />
$numero_doc <br />
Asunto: $tipotramitedp <br />
Irapuato Guanajuato, $Fecha <br />
</div>
EOD;
$pdf->writeHTML($html,true,false,false,false,'R');


$html = <<<EOD
<div style="font-weight: bold; text-align:left;padding:0px 0px 0px 0px; ">
$c_dirigido_a <br />
PRESENTE: 
$c_atencion_a
</div>
<div style="text-align:justify;">
<div>En atención a su solicitud recibida el día $FechaR del año en curso, respecto a la $tipotramitedp del inmueble ubicado en la calle $calleui con número oficial $nooficialui 
del Fracc./Colonia/Ejido/Comunidad/Barrio $coloniaui de esta ciudad de Irapuato Guanajuato, cuya superficie de terreno es de $sup M<sup>2</sup>, bajo la cuenta predial $predialui,
se le informa que una vez consultada la base de datos de esta Dirección y la base de datos del padrón de contribuyentes de la Dirección de Impuestos Inmobiliarios, 
así como la revisión realizada a la documentación que nos anexa se concluye que:</div>
 $c_clausula
<div>Para efectos de la inscripción al padrón catastral, integración a cartografía del Municipio, localización geográfica e identificación del predio de forma única, se le ha asignado a éste inmueble la clave Catastral número: </div>
$c_obs
<div  style="font-weight: bold;text-align:center;background-color:#E5E7E9;border-color:black;border-style:solid solid solid solid;border-width:2px"><h2>$clave</h2></div></div>
<div style="text-align:justify;">Lo anterior con fundamento en la Constitución Política de los Estados Unidos Mexicanos, Artículos 8 primer párrafo, 39 Fracción I; 
Constitución Política para el Estado de Guanajuato, Artículo 23 Fracción V; Ley de Responsabilidades Administrativas de los Servidores Públicos del Estado de Guanajuato 
y sus Municipios, Artículo 11 Fracción III; Código Territorial para el Estado de Guanajuato y sus Municipios, Artículos 193 Fracción III, 194 Fracción I, y II, 195, 197 
Fracciones I y IV, 202, 204, 205, 205, 206, 207, 208, 209; Reglamento Orgánico de la Administración Pública Municipal de Irapuato Guanajuato, en su numeral 75 Fracciones II,
 VI, VII; así como lo contemplado en la Norma Técnica del Sistema Nacional de Información Estadística y Geográfica, Artículos 1,2,3 Fracciones I,IV,VII, 6 y 7; y Ley de
 Ingresos para el Municipio de Irapuato Guanajuato, Artículos 27 Fracción VIII y 32 Fracción IV.</div>
</div>

EOD;
$pdf->writeHTML($html,true,false,false,false,'L');
$html = <<<EOD
<div  style="font-weight: bold;">
A T E N T A M E N T E
<div>
<br />
</div>
<div>ARQ. CARLOS ALBERTO HERNANDEZ</div>
<div>DIRECTOR DE CATASTRO</div>
</div>
EOD;
$pdf->writeHTML($html,true,false,false,false,'C');

$pdf->AddPage();
$pdf->SetY(45);
$html = <<<EOD

<img src="$Croquis_URL">
<h2 style="text-align:center">CERTIFICACIÓN DE DOCUMENTO</h2>
<p> El Arquitecto Carlos Alberto Hernández, Director de Catastro del Municipio de Irapuato Guanajuato, adscrito a la Tesorería Municipal. </p>
<div style="text-align:center"><h3> Certifica: </h3></div>
<p> Que los documentos entregados al solicitante concuerdan fielmente con los que obran en el Expediente No. $numero_exp, los cuales se encuentran en el archivo de esta Dirección, mismo que tuve a la vista y con el que fue cotejado.</p>
<p> Se expide la presente certificación por acuerdo con la Tesorera Municipal Ma. Ernestina Hernández Guzmán, otorgado mediante el oficio número TM/001/2014 en la ciudad de Irapuato Guanajuato, a los 06 días del mes de enero 2014.</p>
<p> Se expide a solicitud del interesado en la ciudad de Irapuato, Guanajuato el día $fecha_ini.</p>
EOD;

$pdf->writeHTML($html,true,false,false,false,'');
$pdf->Output('example_001.pdf', 'I');

 ?>