<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documentoanuncio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Permiso_anuncios_adosados_model');
        $this->load->model('Colonias_model');
        $this->load->model("Peritos_model");
    }

    public function index() {
        header("Location:" . base_url());
    }

    public function documento($id = null) {

        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($id);
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->colonia . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->colonia,
            'u5' => $fila->superficiepredioui, 'u6' => $arrayperito, 'u7' => $arrayperito);

        $this->load->view("documentos/documentoanunciopago", $data);
    }

    public function documentopago($id = null) {

        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($id);
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg);

        $this->load->view("documentos/documentoanunciopago", $data);
    }

    public function documentopagoindividual($id = null) {

        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
        $pagos = $costo->result();

        $this->load->model("Claves_catastrales_individual_model");
        $fila = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        //print_r($fila);
        //  $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietariodp, 'no_control' => $fila->numerocontrol);
        $data['costo'] = $pagos;

        /*AquíFINAL*/
        $data['d1'] = "Clave Catastral Individual";
        $data['d2'] = 1;
        $data['d3'] = 1;
        $data['d4'] = $pagos[0]->costo_base;
        $data['d5'] = $pagos[0]->costo_tram;
        $data['d6'] = $data['d7'] = $data['d8'] = $data['d9'] = $data['d10'] = "";
        $data['d11'] = number_format(round(floatval($pagos[0]->costo_base + $pagos[0]->costo_tram + $pagos[1]->costo_base + $pagos[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2);
        $data['d12'] = $fila->nombrepropietariodp;
        $data['d13'] = "Clave Catastral";
        $data['d16'] = $data['d14'] = "0011711100" . $id;
        $data['d15'] = "CLAVE: 030222900012857979";
        $data['d17'] = null;
        $data['d18'] = number_format(round(floatval($pagos[0]->costo_base + $pagos[0]->costo_tram + $pagos[1]->costo_base + $pagos[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2);
        $cos = $pagos[0]->costo_base + $pagos[0]->costo_tram + $pagos[1]->costo_base + $pagos[1]->costo_tram;
        $cos = round(floatval(number_format($cos, 2)), 0, PHP_ROUND_HALF_DOWN);
        $data['d19'] = $this->num_to_letras($cos);

        $costo2 = $pagos[0]->costo_base + $pagos[0]->costo_tram + $pagos[1]->costo_base + $pagos[1]->costo_tram;
        $costo1 = $pagos[0]->costo_base + $pagos[0]->costo_tram + $pagos[1]->costo_base + $pagos[1]->costo_tram ;
        $costo2 = round(floatval(number_format($costo2, 2)), 0, PHP_ROUND_HALF_DOWN);

        $data['ajuste'] = round($costo2 - $costo1, 2);

        $html = $this->load->view('documentos/documentofinalpagoindividual', $data, true);

        $pdfFilePath = FCPATH . '/assets/tramites/clavescatastralesindividual/' . "file-" . $id . "-doctopago.pdf";
        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2 = array();
        $data2['doctopago'] = "file-" . $id . "-doctopago.pdf";
//        $data2['clave'] = $this->input->post('clave');
        $this->Claves_catastrales_individual_model->update($id, $data2);
        /*Aquí*/

        //$this->load->view("documentos/documentoanunciopagoindividual", $data);
    }

    public function documentofinalpagoindividual($ID) 
    {

        $this->load->model("Claves_catastrales_individual_model");
        $fila = $this->Claves_catastrales_individual_model->get_by_id_administrador($ID);
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
        $pagos = $costo->result();

        //$arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietariodp, 'no_control' => $fila->numerocontrol);

        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");
        $data['d3'] = $this->input->post("d3");
        $data['d4'] = $this->input->post("d4");
        $data['d5'] = $this->input->post("d5");
        $data['d6'] = $this->input->post("d6");
        $data['d7'] = $this->input->post("d7");
        $data['d8'] = $this->input->post("d8");
        $data['d9'] = $this->input->post("d9");
        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");
        $data['d17'] = $this->input->post("d17");
        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");
        $data['ajuste'] = $this->input->post("ajuste");
        $data['costo'] = $pagos;
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentofinalpagoindividual', $data, true);

//        die(print_r($data2,true));
        //$html="asdf";
        //this the the PDF filename that user will get to download

        $pdfFilePath = FCPATH . '/assets/tramites/clavescatastralesindividual/' . "file-" . $ID . "-doctopago.pdf";
        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2 = array();
        $data2['doctopago'] = "file-" . $ID . "-doctopago.pdf";
//        $data2['clave'] = $this->input->post('clave');
        $this->Claves_catastrales_individual_model->update($ID, $data2);
    }

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
                                    $xsub = $this->subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
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
                                    $xsub = $this->subfijo($xaux);
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
                                $xsub = $this->subfijo($xaux);
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

    public function documentopagocertificado($id = null) {
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
        $pagos = $costo->result();

        $this->load->model("Claves_catastrales_individual_cetificado_model");
        $fila = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        //print_r($fila);
        //  $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietariodp, 'no_control' => $fila->nocontrol);
        $data['costo'] = $pagos;
//        die(print_r($pagos['cost'],true));
        $this->load->view("documentos/documentoanunciopagocertificado", $data);
    }

    public function documentopagofraccionamiento($id = null) {

        $this->load->model("Claves_catastrales_fraccionamiento_model");
        $fila2 = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);
        $this->load->model("Claves_fraccionamiento_model");
        $fila = $this->Claves_fraccionamiento_model->get_by_id_administrador($fila2->id_solicitud);
        $total = $this->input->post('totalpago');
        $data1 = array('totalpago' => $total);
        $this->Claves_fraccionamiento_model->update($fila->ID, $data1);

        $this->Claves_catastrales_fraccionamiento_model->update($id, $data1);
//        die(print_r($this->input->post('pago') , true));
        //  $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila2->ID, 'nombrepropietariodg' => $fila->nombrepropietariodp, 'no_control' => $fila->numerocontrol);
        $data['totalpago'] = $this->input->post('totalpago');
        $data['cantidad'] = $fila->cantidad;
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
        $pagos = $costo->result();
        $data['costo'] = $pagos;
//        die(print_r($data));
//        die(print_r($pagos['cost'],true));
        $this->load->view("documentos/documentoanunciopagofraccionamiento", $data);
    }

    public function documentofinalpago($ID) {
        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($ID);
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg);

        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");
        $data['d3'] = $this->input->post("d3");
        $data['d4'] = $this->input->post("d4");
        $data['d5'] = $this->input->post("d5");
        $data['d6'] = $this->input->post("d6");
        $data['d7'] = $this->input->post("d7");
        $data['d8'] = $this->input->post("d8");
        $data['d9'] = $this->input->post("d9");
        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");
        $data['d17'] = $this->input->post("d17");
        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");

        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoanunciofinalpago', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "pago_adosados_" . str_replace(' ', '_', $fila->nombrepropietarioinmuebledg) . ".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    public function documentofinalpagocertificado($ID) {
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
        $pagos = $costo->result();

        $this->load->model("Claves_catastrales_individual_cetificado_model");
        $fila = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($ID);

        //$arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietariodp, 'no_control' => $fila->nocontrol);
        $data2 = array();
        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");
        $data['d3'] = $this->input->post("d3");
        $data['d4'] = $this->input->post("d4");
        $data['d5'] = $this->input->post("d5");
        $data['d6'] = $this->input->post("d6");
        $data['d7'] = $this->input->post("d7");
        $data['d8'] = $this->input->post("d8");
        $data['d9'] = $this->input->post("d9");
        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");
        $data['d17'] = $this->input->post("d17");
        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");
        $data['ajuste'] = $this->input->post("ajuste");
        $data['costo'] = $pagos;

        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentofinalpagocertificado', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = FCPATH . '/assets/tramites/clavescatastralesindividualcertificado/' . "file-" . $ID . "-doctopago.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2['doctopago'] = "file-" . $ID . "-doctopago.pdf";
        $this->Claves_catastrales_individual_cetificado_model->update($ID, $data2);
// die(print_r($ID));
    }

    public function documentofinalpagofraccionamiento($ID) {
        $this->load->model("Claves_catastrales_fraccionamiento_model");
        $this->load->model("Claves_fraccionamiento_model");
        $fila2 = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($ID);
//     
        $fila = $this->Claves_fraccionamiento_model->get_by_id_administrador($fila2->id_solicitud);
        //$arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietariodp, 'no_control' => $fila->numerocontrol);
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
        $pagos = $costo->result();
        $data['costo'] = $pagos;
        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");
        $data['d3'] = $this->input->post("d3");
        $data['d4'] = $this->input->post("d4");
        $data['d5'] = $this->input->post("d5");
        $data['d6'] = $this->input->post("d6");
        $data['d7'] = $this->input->post("d7");
        $data['d8'] = $this->input->post("d8");
        $data['d9'] = $this->input->post("d9");
        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");
        $data['d17'] = $this->input->post("d17");
        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");
        $data['cantidad'] = $fila->cantidad;
        $data['ajuste'] = $this->input->post("ajuste");
        $data['pagos'] = $this->input->post("pago");

        $tpago = trim($this->input->post("d11"), "$");
        $datos = array('totalpago' => $tpago);
//        die(print_r($this->input->post("d11")));
        $this->Claves_fraccionamiento_model->update($fila2->id_solicitud, $datos);
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentofinalpagofracciionamiento', $data, true);
// $html = $this->load->view('documentos/documentofinalpagocertificado', $data, true);
        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = FCPATH . '/assets/tramites/clavescatastralesfraccionamiento/' . "file-" . $ID . "-doctopago.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2['doctopago'] = "file-" . $ID . "-doctopago.pdf";
        $this->Claves_fraccionamiento_model->update($fila2->id_solicitud, $data2);
        $this->Claves_catastrales_fraccionamiento_model->update($ID, $data2);
    }

    public function documentofinal() {
        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($this->input->post("ID"));
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->colonia . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->colonia,
            'u5' => $fila->superficiepredioui, 'u6' => $arrayperito, 'u7' => $arrayperito);

        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");

        $data['d10'] = $this->input->post("pmg");
        $data['d11'] = $this->input->post("ugat");
        $data['d12'] = $this->input->post("uso");
        $data['d13'] = $this->input->post("clave");
        $data['d14'] = $this->input->post("duracion");
        $data['d15'] = $this->input->post("contenido");
        $data['d16'] = $this->input->post("montaje");

        $data['d18'] = $this->input->post("constitucion");
        $data['d19'] = $this->input->post("altura");
        $data['d20'] = $this->input->post("carteleras");
        $data['d21'] = $this->input->post("dimensiones");
        $data['d22'] = $this->input->post("refe");
        $data['d23'] = $this->input->post("poliza");
        $data['d24'] = $this->input->post("d24");
        $data['d50'] = $this->input->post("d50");


        $data['d30'] = $this->input->post("tipoan");

        $data['d35'] = $this->input->post("archivo");
        $data['d36'] = $this->input->post("entrega");
        $data['d37'] = $this->input->post("reviso");
        $data['d38'] = $this->input->post("elaboro");
        $data['d51'] = $this->input->post("totalan");

        $data['op1'] = $this->input->post("ubicacion");
        $data['representante'] = $this->input->post("representante");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoanunciofinal', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "permiso_anuncio_" . $this->input->post("d1") . ".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    public function pagoregimen($id = null) {
//        die();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (9) ");
        $pagos = $costo->result();

        $this->load->model("Regimen_propieda_condominio_model");
        $fila = $this->Regimen_propieda_condominio_model->get_by_id_administrador($id);
        //print_r($fila);
        //  $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->id, 'nombrepropietariodg' => $fila->nombre_del_contribuyente);
        $data['costo'] = $pagos;
        $this->load->view("documentos/documentoanunciopagoregimen", $data);
    }

    public function documentofinalpagoregimen($ID) {

        $this->load->model("Regimen_propieda_condominio_model");
        $fila = $this->Regimen_propieda_condominio_model->get_by_id_administrador($id);

        //$arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        //$arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        //$arrayperito = "-------------------------------------";
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->id, 'nombrepropietariodg' => $fila->nombre_del_contribuyente);

        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");
        $data['d3'] = $this->input->post("d3");
        $data['d4'] = $this->input->post("d4");
        $data['d5'] = $this->input->post("d5");
        $data['d6'] = $this->input->post("d6");
        $data['d7'] = $this->input->post("d7");
        $data['d8'] = $this->input->post("d8");
        $data['d9'] = $this->input->post("d9");
        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");
        $data['d17'] = $this->input->post("d17");
        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");

        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentofinalpagoregimen', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "pago_Regimen_" . str_replace(' ', '_', $fila->nombre_del_contribuyente) . ".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

}

?>
