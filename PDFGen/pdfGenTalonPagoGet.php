<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

require_once('tcpdf_include.php');

//FUNCION DIABOLICA PARA CONVERTIR NUMEROS A LETRAS
function num_to_letras($numero, $moneda = 'PESO', $subfijo = 'M.N.')
{
        $xarray = array(
            0 => 'Cero'
            , 1 => 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'
            , 'DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'
            , 'VEINTI', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA'
            , 60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
            , 100 => 'CIENTO', 200 => 'DOSCIENTOS', 300 => 'TRESCIENTOS', 400 => 'CUATROCIENTOS', 500 => 'QUINIENTOS'
            , 600 => 'SEISCIENTOS', 700 => 'SETECIENTOS', 800 => 'OCHOCIENTOS', 900 => 'NOVECIENTOS'
        );

        $numero = trim($numero);
        $xpos_punto = strpos($numero, '.');
        $xaux_int = $numero;
        $xdecimales = '00';
        if (!($xpos_punto === false)) {
            if ($xpos_punto == 0) {
                $numero = '0' . $numero;
                $xpos_punto = strpos($numero, '.');
            }
            $xaux_int = substr($numero, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
            $xdecimales = substr($numero . '00', $xpos_punto + 1, 2); // obtengo los valores decimales
        }

        $XAUX = str_pad($xaux_int, 18, ' ', STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
        $xcadena = '';
        for ($xz = 0; $xz < 3; $xz++) {
            $xaux = substr($XAUX, $xz * 6, 6);
            $xi = 0;
            $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
            $xexit = true; // bandera para controlar el ciclo del While
            while ($xexit) {
                if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
                    break; // termina el ciclo
                }

                $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
                $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
                for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
                    switch ($xy) {
                        case 1: // checa las centenas
                            $key = (int) substr($xaux, 0, 3);
                            if (100 > $key) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
                                /* do nothing */
                            } else {
                                if (TRUE === array_key_exists($key, $xarray)) {  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
                                    $xseek = $xarray[$key];
                                    $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                                    if (100 == $key) {
                                        $xcadena = ' ' . $xcadena . ' CIEN ' . $xsub;
                                    } else {
                                        $xcadena = ' ' . $xcadena . ' ' . $xseek . ' ' . $xsub;
                                    }
                                    $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                                } else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                                    $key = (int) substr($xaux, 0, 1) * 100;
                                    $xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                                    $xcadena = ' ' . $xcadena . ' ' . $xseek;
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 0, 3) < 100)
                            break;
                        case 2: // checa las decenas (con la misma lógica que las centenas)
                            $key = (int) substr($xaux, 1, 2);
                            if (10 > $key) {
                                /* do nothing */
                            } else {
                                if (TRUE === array_key_exists($key, $xarray)) {
                                    $xseek = $xarray[$key];
                                    $xsub = subfijo($xaux);
                                    if (20 == $key) {
                                        $xcadena = ' ' . $xcadena . ' VEINTE ' . $xsub;
                                    } else {
                                        $xcadena = ' ' . $xcadena . ' ' . $xseek . ' ' . $xsub;
                                    }
                                    $xy = 3;
                                } else {
                                    $key = (int) substr($xaux, 1, 1) * 10;
                                    $xseek = $xarray[$key];
                                    if (20 == $key)
                                        $xcadena = ' ' . $xcadena . ' ' . $xseek;
                                    else
                                        $xcadena = ' ' . $xcadena . ' ' . $xseek . ' Y ';
                                } // ENDIF ($xseek)
                            } // ENDIF (substr($xaux, 1, 2) < 10)
                            break;
                        case 3: // checa las unidades
                            $key = (int) substr($xaux, 2, 1);
                            if (1 > $key) { // si la unidad es cero, ya no hace nada
                                /* do nothing */
                            } else {
                                $xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
                                $xsub = subfijo($xaux);
                                $xcadena = ' ' . $xcadena . ' ' . $xseek . ' ' . $xsub;
                            } // ENDIF (substr($xaux, 2, 1) < 1)
                            break;
                    } // END SWITCH
                } // END FOR
                $xi = $xi + 3;
            } // ENDDO
            # si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
            if ('ILLON' == substr(trim($xcadena), -5, 5)) {
                $xcadena.= ' DE';
            }

            # si la cadena obtenida en MILLONES o BILLONES, entonces le agrega al final la conjuncion DE
            if ('ILLONES' == substr(trim($xcadena), -7, 7)) {
                $xcadena.= ' DE';
            }

            # depurar leyendas finales
            if ('' != trim($xaux)) {
                switch ($xz) {
                    case 0:
                        if ('1' == trim(substr($XAUX, $xz * 6, 6))) {
                            $xcadena.= 'UN BILLON ';
                        } else {
                            $xcadena.= ' BILLONES ';
                        }
                        break;
                    case 1:
                        if ('1' == trim(substr($XAUX, $xz * 6, 6))) {
                            $xcadena.= 'UN MILLON ';
                        } else {
                            $xcadena.= ' MILLONES ';
                        }
                        break;
                    case 2:
                        if (1 > $numero) {
                            $xcadena = "CERO {$moneda}S {$xdecimales}/100 {$subfijo}";
                        }
                        if ($numero >= 1 && $numero < 2) {
                            $xcadena = "UN {$moneda} {$xdecimales}/100 {$subfijo}";
                        }
                        if ($numero >= 2) {
                            $xcadena.= " {$moneda}S {$xdecimales}/100 {$subfijo}"; //
                        }
                        break;
                } // endswitch ($xz)
            } // ENDIF (trim($xaux) != "")

            $xcadena = str_replace('VEINTI ', 'VEINTI', $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
            $xcadena = str_replace('  ', ' ', $xcadena); // quito espacios dobles
            $xcadena = str_replace('UN UN', 'UN', $xcadena); // quito la duplicidad
            $xcadena = str_replace('  ', ' ', $xcadena); // quito espacios dobles
            $xcadena = str_replace('BILLON DE MILLONES', 'BILLON DE', $xcadena); // corrigo la leyenda
            $xcadena = str_replace('BILLONES DE MILLONES', 'BILLONES DE', $xcadena); // corrigo la leyenda
            $xcadena = str_replace('DE UN', 'UN', $xcadena); // corrigo la leyenda
        } // ENDFOR ($xz)
        return trim($xcadena);
	}

//FUNCION DIABOLICA QUE SE UTILIZA EN NUMEROS A LETRAS	
function subfijo($cifras)
    {
        $cifras = trim($cifras);
        $strlen = strlen($cifras);
        $_sub = '';
        if (4 <= $strlen && 6 >= $strlen) {
            $_sub = 'MIL';
        }

        return $_sub;
    }

$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$ajusteTarifario = "";
$cantidadClaves = 0;
$costoTramite = 7.56;
$tarifa = 50.81;
$totalClaves = 0;
$costoClaveCertificada = 85.13;
$totalClaveCertificada = 0;
$total = 0;
$propietario="";
$fechaAutorizacion = "";
$numeroConLetra = "";
$dataFraccionamientos;
$folios = "";
$idFracc = 0;

if( isset($_GET["data"]) && isset($_GET["nombre"]) && isset($_GET["cantidadClaves"]) && isset($_GET["idFracc"]))
{
	//listo para usarse como un array
    $dataFraccionamientos = json_decode($_GET["data"],true);
    $propietario = $_GET['nombre'];
    $cantidadClaves = $_GET['cantidadClaves'];
    $idFracc = $_GET['idFracc'];
    $totalClaves = ($cantidadClaves * $tarifa) + $costoTramite;
	$costoClaveCertificada = 85.13;
	$totalClaveCertificada = $cantidadClaves * $costoClaveCertificada;
	$fechaAutorizacion = date('d')." de ".$arrayMeses[date('m') - 1]." de ".date('Y');
	$total = floatval($totalClaves + $totalClaveCertificada);
	$decimales = explode(".",$total);
	$numeroConLetra = num_to_letras($total);
	if ( $decimales[1] < 50)
	{
		$ajusteTarifario = "-0.5";
		$total = round($total,0,PHP_ROUND_HALF_DOWN);
		$total = number_format($total,2);
	}
	elseif ( $decimales[1] >= 50)
	{
		$ajusteTarifario = "+0.5";
		$total = round($total,0,PHP_ROUND_HALF_UP);
		$total = number_format($total,2);
    }
    for ($i = 0; $i < count($dataFraccionamientos); $i++)
    {
        if($i>0)
			$folios .=", ";
		$folios .= $dataFraccionamientos[$i];
    } 
}

$fechaPrueba = "2010-11-24";
$elementos = explode("-",$fechaPrueba);
for($i = 0; $i < count($elementos);$i++)
{
	error_log($elementos[$i]);
}
$nombreMes = (int)$elementos[1];
$fechaNuevoFormato = $elementos[2]." de ".$arrayMeses[$nombreMes -1]." de ".$elementos[0];
$propietarioUrl = str_replace(" ", "%20", $propietario);
$urlIzquierda = "http://chart.googleapis.com/chart?cht=qr&amp;chs=100x100&amp;chl=ID:".$idFracc.",Solicitante:".$propietario.",Costo:".$total."&amp;chld=H|0";
error_log($fechaNuevoFormato);

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
if(isset($_GET['PageFormat']))
	if($_GET['PageFormat']=="Oficio")
		$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT_OFF, true, 'UTF-8', false);
	else
		$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
else
	$pdf = new CCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


//var_dump($_POST);

// set document information
header("Content-type: application/pdf");
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gobierno Municipal de Irapuato');
$pdf->SetTitle('Orden Pago');
$pdf->SetSubject('Orden Pago');
$pdf->SetKeywords('Orden Pago, Irapuato');

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
$html = <<<EOD
<table cellspacing="5" cellpadding="5" style="font-size:8;">
    <tr>
			<td align="center" colspan="4"><strong>Clave Catastral Fraccionamientos</strong></td>
			<td align="center">Orden de Pago</td>
    </tr>
    <tr>
			<td align="center" colspan="4" style="border: 1px solid black;">TIPO DE AUTORIZACION</td>
			<td align="center" style="border: 1px solid black;">No. DE AUTORIZACION</td>
    </tr>
    <tr>
			<td align="justify" colspan="4" rowspan="5" >EN RELACIÓN A LA SOLICITUD PRESENTADA ANTE LA DIRECCIÓN DE CATASTRO, ADSCRITA A LA TESORERÍA MUNICIPAL, 
			CON LA FINALIDAD DE OBTENER LA CLAVE CATASTRAL CERTIFICADA; PREVIO ANÁLISIS PRACTICADO PARA TAL EFECTO SE TIENE LO SIGUIENTE: DEBERÁ
			PAGAR A LA TESORERÍA MUNICIPAL LOS DERECHOS CORRESPONDIENTES A LAS PRESENTES CLAVES CATASTRALES CERTIFICADAS POR LA CANTIDAD DE $'.$total.'
			($numeroConLetra), DE CONFORMIDAD CON LO DISPUESTO EN EL ARTÍCULO 27 FRACCIÓN VIII Y 32 FRACCIÓN IV DE LA LEY DE INGRESOS PARA 
			EL MUNICIPIO DE IRAPUATO GUANAJUATO QUE ENTRÓ EN VIGOR A PARTIR DEL 1° DE ENERO DEL AÑO 2019.</td>
			<td align="center">$idFracc</td>
    </tr>
    <tr>
			<td align="center" style="border: 1px solid black;">NUMEROS DE SEGUIMIENTO</td>
		</tr>
		<tr>
			<td align="center">$folios</td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;">FECHA DE AUTORIZACION</td>
		</tr>
		<tr>
			<td align="center">$fechaAutorizacion</td>
		</tr>
		<tr>
			<td align="center" colspan="4" style="border: 1px solid black;">Descripción</td>
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
			<td align="justify">03110004 Clave Catastral Individual</td>
			<td align="right">$cantidadClaves</td>
			<td align="right">$$tarifa</td>
			<td align="right">$$costoTramite</td>
			<td align="right">$$totalClaves</td>
		</tr>
		<tr>
			<td align="justify">0310004 Certificación de Clave Catastral</td>
			<td align="right">$cantidadClaves</td>
			<td align="right"></td>
			<td align="right">$$costoClaveCertificada</td>
			<td align="right">$$totalClaveCertificada</td>
		</tr>
		<tr>
			<td align="left">Ajuste Tarifario</td>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right">$ajusteTarifario</td>
		</tr>
		<tr>
			<td align="left"></td>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right"><strong>$$total</strong></td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;">INFORMACION</td>
			<td align="center" style="border: 1px solid black;" colspan="3">PROPIETARIO/SOLICITANTE/RAZON SOCIAL</td>
			<td align="center" style="border: 1px solid black;">AUTORIZACION</td>
		</tr>
		<tr>
            <td style="border: 1px solid black;font-size:15px;"><img src="http://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=Id:$idFracc%20Solicitante:$propietarioUrl%20Costo:$$total&chof=png"></td>
                                                                                                                     
			<td align="center" style="border: 1px solid black;" colspan="3"><strong>$propietario</strong><br>PROPIETARIO MISMO QUE PAGARÁ A LA TESORERIA MUNICIPAL DE IRAPAUTO LA CANTIDAD
			DE $$total ($numeroConLetra)</td>
			<td align="center" style="border: 1px solid black;" ><img src="http://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=../assets/nombramiento-catastro.PDF/&chld=L|1"></td>
            <td></td>
        </tr>
		<tr>
			<td align="center" colspan="5">Si requiere factura tiene 48 horas para su solicitud al correo electronico facturacion@irapuato.gob.mx</td>
		</tr>
		<tr>
			<td align="center" style="border: 1px solid black;" colspan="2">PARA USO EXCLUSIVO DEL BANCO</td>
			<td align="center" style="border: 1px solid black;" colspan="3">PARA USO EN BANCA ELECTRONICA</td>
		</tr>
		<tr>
			<td align="justify" colspan="2">REF1: $propietario</td>
            <td align="center" colspan="1">Pago en banca electronica</td>
            <td align="right" colspan="2"><img src="../assets/images/codigoclavecosto.gif" alt="" width="80"></td>
		</tr>
		<tr>
			<td align="justify" colspan="2">REF2: Claves Catastral Fraccionamiento</td>
			<td align="center" colspan="1">CLAVE:030222900012857979</td>
		</tr>
		<tr>
			<td align="justify" colspan="2">REF3: 00117111002332</td>
            <td align="center" colspan="1">REFERENCIA BANCARIA: 00171110083</td>
            <td align="right" colspan="2"><img src="../assets/images/codigocertificacioncosto.gif" alt="" width="80"></td>
		</tr>
</table>
EOD;
$pdf->writeHTML($html,true,false,false,false,'');
$pdf->Output("talonPago.pdf", "I");
 ?>