<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require_once('tcpdf_include.php');
//$Tipo_Tramite="Escritura Publica";
//$Tipo_Tramite="Solicitud IMUVII";
//$Tipo_Tramite="Constancia Ejidal";

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

	//Codigo para cambiar la fecha de SQL al formato dd de m de yyyy
	$elementos = explode("-",$fecha_ini);
	$nombreMes = (int)$elementos[1];
	$fechaNuevoFormato = $elementos[2]." de ".$arrayMeses[$nombreMes -1]." de ".$elementos[0];
		
	$e_areas="";
	$c_dirigido_a="";
	$c_atencion_a="";
	$c_clausula="";
	$c_docNum="";
	$c_copropietario="";

	$c_porcion = "";

	
	if ($Porcion != "")
	{
		$c_porcion= "P $Porcion";
	}
	
	
	
	if($Copropietario!="")
		$c_copropietario=" ".strtoupper($Copropietario);
	
	$e_areas = "";
	if($Privativat!="")
	{
		$e_areas.="Con un área privativa de $Privativat M<sup>2</sup>";
	}
	
	if ($Comunt!="")
	{
		if ($e_areas!= "")
		{
			$e_areas.= ", ";
		}
		else
			$e_areas.= "Con un ";
		$e_areas.="área común de $Comunt M<sup>2</sup>";
	}
	
	if ($Cubiertat!="")
	{
		if ($e_areas!= "")
		{
			$e_areas.= ", ";
		}
		else
			$e_areas.= "Con un ";
		
		$e_areas.="área común cubierta de $Cubiertat M<sup>2</sup>";
	}
	
	if ($Cubiertatd!="")
	{
		if ($e_areas!= "")
		{
			$e_areas.= ", ";
		}
		else
			$e_areas.= "Con un ";
		$e_areas.="área común descubierta de $Cubiertatd M<sup>2</sup>";
	}
	
	if ($indivisott!="")
	{
		if ($e_areas!= "")
		{
			$e_areas.= ", ";
		}
		else
			$e_areas.= "Con un ";
		$e_areas.="total indiviso de $indivisott M<sup>2</sup>";
		
	}
	if ($Indivisopt!="")
		{
			if ($e_areas!= "")
			{
				$e_areas.= ", que";
			}
			else
				$e_areas.= "Que";
			
			$e_areas.=" le corresponde un indiviso de $Indivisopt%";
		}
	if($e_areas!="")
		$e_areas.= ".";
	
	// Seccion de preprosesamiento
	
	
	if($Tipo_Tramite!="Escritura Publica")
	{
		$caracter = "PROPIETARIO";
	}
	
	if($Juicio_Num != "")
		$Juicio_Num = strtoupper($Juicio_Num);

	if($coloniaui != "")
		$coloniaui = str_replace("?","Ñ",strtoupper($coloniaui));

	$tipTramPrefix = "a la";
	if($tipotramitedp==1)
		$tipotramitedp="Asignación de clave catastral";
		
		
	else if($tipotramitedp==2)
		$tipotramitedp="Modificación de clave catastral";
	else
	{
		$tipotramitedp="Duplicado de clave catastral";
		$tipTramPrefix = "a el";
	}
		
		
	if($Fecha == "")
		$Fecha = $arrayDias[date('w')] . " " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); 
	
	if($fecha_escritura != "")
	{
		$Fecha_Temporal=explode("-",$fecha_escritura);
		$fecha_escritura=DateParser($Fecha_Temporal[2],$Fecha_Temporal[1],$Fecha_Temporal[0]);
	}
	
	if($Fecha_Cert_Parcela != "")
	{
		$Fecha_Temporal=explode("-",$Fecha_Cert_Parcela);
		$Fecha_Cert_Parcela=DateParser($Fecha_Temporal[2],$Fecha_Temporal[1],$Fecha_Temporal[0]);
	}
	
	if($Fecha_Constancia_IMUVII != "")
	{
		$Fecha_Temporal=explode("-",$Fecha_Constancia_IMUVII);
		$Fecha_Constancia_IMUVII=DateParser($Fecha_Temporal[2],$Fecha_Temporal[1],$Fecha_Temporal[0]);
	}
	
	if($INFONAVIT_Fecha != "")
	{
		//echo $INFONAVIT_Fecha;
		$Fecha_Temporal=explode("-",$INFONAVIT_Fecha);
		$INFONAVIT_Fecha=DateParser($Fecha_Temporal[2],$Fecha_Temporal[1],$Fecha_Temporal[0]);
	}
	
	if($Fecha_CORETT != "")
	{
		$Fecha_Temporal=explode("-",$Fecha_CORETT);
		$Fecha_CORETT=DateParser($Fecha_Temporal[2],$Fecha_Temporal[1],$Fecha_Temporal[0]);
	}
	
	if($FechaR != "")
	{
		$Fecha_Temporal=explode("-",$FechaR);
	//echo $fecha_escritura;
		$FechaR=DateParser($Fecha_Temporal[2],$Fecha_Temporal[1],"");
	}
	
	if($numero_exp!="")
	{
		$numero_exp = substr($numero_exp, 0, strlen($numero_exp)-4)."/".substr($numero_exp,-4);
	}
	if($Tipo_Sup=="m2")
	{
		$Tipo_Sup = "M<sup>2</sup>";
	}else
	{
		$Tipo_Sup = strtoupper($Tipo_Sup);
	}
	
	$notario=  strtoupper($notario);
	$predialui=  strtoupper($predialui);

	
	if(trim(strtoupper($calleui))=="SIN NOMBRE")
		$calleui="S/N";
	
	if(trim(strtoupper($predialui))=="APERTURA")
		$predialui = "S/N";
	
	if ($NoInterior != "")
	{
		$NoInterior = " Interior ".$NoInterior;
	}
	else if ($nomanzanaui != "")
	{
		$NoInterior =  ", " . $noloteui . ", " . $nomanzanaui . " ";
	}
	if($Predial_IMUVII!="")
		$predialui=$Predial_IMUVII;
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
$c_obs="";
$c_oficial = "oficial "; 
$c_primerParrafo_2 = <<<EOD
, cuya superficie de terreno es de $sup $Tipo_Sup, bajo la cuenta predial $predialui,
se le informa que una vez consultada la base de datos de esta Dirección y la base de datos del padrón de contribuyentes de la Dirección de Impuestos Inmobiliarios, 
así como la revisión realizada a la documentación que nos anexa se concluye que:
EOD;

if($Croquis_URL!="")
	$Croquis_URL = "../".$Croquis_URL;




if($Tipo_Tramite=="Escritura Publica")
{
	$c_docNum="CAR/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;
	$c_clausula = <<<EOD
	<div sytle="text-indent:1cm "> &nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png"> El bien inmueble señalado se encuentra inscrito a nombre de 
	<span style="font-weight: bold;">$nombrepropietariodp$c_copropietario</span> con el carácter de $caracter, acreditado mediante la Escritura Pública No. $No_Esc con fecha del $fecha_escritura, 
con la fe pública de el/la Lic. $notario, Notario Público No. $no_notario de la ciudad de $Es_Ciudad_Escritura, $Es_Estado_Escritura. $e_areas</div>
EOD;
}
else if ($Tipo_Tramite=="Solicitud IMUVII")
{
	$c_docNum="CAR/".$numero_doc."/".date("Y");
	$c_dirigido_a = "INSTITUTO MUNICIPAL DE VIVIENDA DE IRAPUATO (IMUVII)";
	$c_atencion_a = "EN ATENCIÓN A: ".$nombrepropietariodp;
	if($Predial_IMUVII!="")
		 $predialui = strtoupper($Predial_IMUVII);
	 
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;"> $c_dirigido_a</span> con el carácter de <span style="font-weight: bold;text-transform: capitalize;">$caracter</span>, con atención a $nombrepropietariodp sustentado mediante 
	la <strong>CONSTANCIA IMUVII/DG/UR/01</strong> con <strong>NÚMERO DE FOLIO $imuvii</strong>, de fecha de $Fecha_Constancia_IMUVII, debidamente 
	sellada y rubricada por <strong>$nombre_imuvii</strong>, $Cargo_IMUVII IMUVII. </div>
EOD;

}
else if ($Tipo_Tramite=="INFONAVIT")
{
	$c_docNum="CAR/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;		
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;">$c_dirigido_a</span> con el carácter de $caracter, 
	acreditado mediante instrumento de Infonavit, Número $Titulo_Num de fecha del $INFONAVIT_Fecha en la ciudad de Irapuato Guanajuato, como Lote $Lote_Infonavit de la Manzana $Manzana_Infonavit y casa habitacion marcada con el número $Numero_Infonavit2 de la calle $Calle_Infonavit del Fraccionamiento 
	$Colonia_Infonavit de esta ciudad, con una superficie de terreno $Superficie_Infonavit $Tipo_Sup. $e_areas</div>
EOD;

}

else if ($Tipo_Tramite=="Titulo de Propiedad")
{
	$c_docNum="CAR/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;
	$coloniaui = $Ejido;
	$c_parcela="";
	$c_manzana = "";

	
	if ($Manzana_Titulo != "")
	{
		$c_manzana= "manzana $Manzana_Titulo";
	}

	
	
	$Tipo_Tramite = strtoupper($Tipo_Tramite);									   
	if($Parcela!="")
		$c_parcela=" con Parcela/Solar No.".$Parcela;
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;">$nombrepropietariodp</span> con el carácter de $caracter, acreditado mediante el $Tipo_Tramite No. $No_Esc con fecha de $fecha_escritura, 
con la fe pública de el/la $notario Delegado del Registro Agrario Nacional,$c_parcela, $c_manzana de la zona $Zona, del ejido $coloniaui de esta ciudad de Irapuato, Guanajuato, con una superficie de $sup $Tipo_Sup.</div>
EOD;

}

else if ($Tipo_Tramite=="Certificado Parcelario")
{
	$c_docNum="CAT/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;
	$coloniaui = $Ejido;
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;">$nombrepropietariodp</span> con el carácter de <strong>POSEEDOR</strong>, 
	acreditado mediante Certificado Parcelario No. $No_Cert_Parcela con fecha de $Fecha_Cert_Parcela, como Parcela/Solar $Parcela del Ejido $coloniaui
	de esta ciudad de Irapuato, Gto., con una superficie de $sup $Tipo_Sup.</div>
EOD;
	$observaciones = $observaciones."<br /><br />Nota: Se hace de su conocimiento que la Clave Catastral que se expide solo sirve para la ubicación del inmueble, ya que cuenta con un Certificado Parcelario lo cual simplemente nos ampara la posesión del inmueble en mención.";

}

else if ($Tipo_Tramite=="CORETT")
{
	$c_docNum="CAT/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;
	
	
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;">$nombrepropietariodp</span> con el carácter de <strong>$caracter</strong>, 
	acreditado mediante el contrato privado de compraventa CORETT $CORETT_Contrato de fecha $Fecha_CORETT de la ciudad de $Ciudad_CORETT, Gto., con una superficie de $Superficie_CORETT $Tipo_Sup. $e_areas</div>
EOD;

}

else if ($Tipo_Tramite=="Sentencia Juridica")
{
	$c_docNum="CAT/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;
	//$Ref_Legal = strtoupper($Ref_Legal);
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">$Ref_Legal</div>
EOD;
	
}

else if ($Tipo_Tramite=="Constancia Ejidal")
{
	$c_docNum="CAR/".$numero_doc."/".date("Y");
	$c_dirigido_a = $nombrepropietariodp;
	$c_oficial = "";
	$c_primerParrafo_2 =".";
	$c_clausula = <<<EOD
	<div>&nbsp;&nbsp; &nbsp;&nbsp; 	<img src="images/palomita.png">El bien inmueble señalado se encuentra inscrito a nombre de <span style="font-weight: bold;">$nombrepropietariodp</span>, con el carácter de <strong>POSEEDOR</strong>, 
	acreditado mediante la constancia emitida y firmada por $notario, comisario ejidal con fecha de $fecha_escritura de la ciudad de Irapuato Guanajuato.
	</div>
EOD;
	

}
$observaciones = str_replace("\n","<br>",$observaciones);
if($observaciones!="")
	$c_obs="<div style='text-align:justify;'>$observaciones</div>";

$html = <<<EOD
	<br />
	<br />
EOD;



$pdf->writeHTML($html,true,false,false,false,'R');

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
<div style="font-weight: bold; text-align:left;padding:0px 0px 0px 0px; ">
$c_dirigido_a <br />
PRESENTE:
<div style="text-align:right">$c_atencion_a</div>
</div>
<div style="text-align:justify;">
<div>En atención a su solicitud recibida el día $fechaNuevoFormato, respecto $tipTramPrefix "$tipotramitedp" del inmueble ubicado en la calle $calleui con número $c_oficial $nooficialui$NoInterior $c_porcion del Fracc./Colonia/Ejido/Comunidad/Barrio $coloniaui de esta ciudad de Irapuato, Guanajuato$c_primerParrafo_2</div>
 $c_clausula
 $c_obs
<div>Para efectos de la inscripción al padrón catastral, integración a la cartografía del Municipio, localización geográfica e identificación del predio de forma única, se le ha asignado a este inmueble la clave catastral número: </div>
<div  style="font-weight: bold;text-align:center;background-color:#E5E7E9;border-color:black;border-style:solid solid solid solid;border-width:2px"><h2>$clave</h2></div></div>
<div style="text-align:justify;">Lo anterior con fundamento en la Constitución Política de los Estados Unidos Mexicanos, Artículos 8 primer párrafo, 39 Fracción I; 
Constitución Política para el Estado de Guanajuato, Artículo 23 Fracción V; Ley de Responsabilidades Administrativas de los Servidores Públicos del Estado de Guanajuato 
y sus Municipios, Artículo 11 Fracción III; Código Territorial para el Estado de Guanajuato y sus Municipios, Artículos 193 Fracción III, 194 Fracción I y II, 195, 197 
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
<div>ARQ. MIGUEL ÁNGEL ORTÍZ GARCÍA<br />
ENCARGADO DEL DESPACHO DE LA DIRECCIÓN DE CATASTRO</div>
</div>
EOD;
$pdf->writeHTML($html,true,false,false,false,'C');

$pdf->AddPage();
$pdf->SetY(45);
$html = <<<EOD

<span style="text-align:center"> <img src="$Croquis_URL"></span>
<h2 style="text-align:center">CERTIFICACIÓN DE DOCUMENTO</h2>
<p style="text-align:justify">El Arq. Miguel Ángel Ortíz García, Encargado del Despacho de la Dirección de Catastro del Municipio de Irapuato, Guanajuato, adscrito a la Tesorería Municipal. </p>
<div ><span style="text-align:center">Certifica: </span><br />
Que los documentos entregados al solicitante concuerdan fielmente con los que obran en el Expediente <strong>No. $numero_exp</strong>, los cuales se encuentran en el archivo de esta Dirección, mismo que tuve a la vista y con el que fue cotejado.<br /><br />
Se expide la presente certificación por acuerdo con la Tesorera Municipal Ma. Ernestina Hernández Guzmán, otorgado mediante el oficio número TM/001/2014 en la ciudad de Irapuato, Guanajuato, a los 06 días del mes de enero 2014.<br /><br />
Se expide a solicitud del interesado en la ciudad de Irapuato, Guanajuato, el día $Fecha.</div>
EOD;

$pdf->writeHTML($html,true,false,false,false,'');
$pdf->Output('example_001.pdf', 'I');

 ?>