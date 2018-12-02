<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documentoclave extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Permiso_anuncios_adosados_model');
        $this->load->model('Claves_catastrales_individual_model');
        $this->load->model('Claves_catastrales_individual_cetificado_model');
        $this->load->model('Claves_catastrales_fraccionamiento_model');
        $this->load->model('Colonias_model');
        $this->load->model("Peritos_model");
        $this->load->model("Claves_fraccionamiento_model");
    }

    public function index() {
        header("Location:" . base_url());
// 
    }

    public function pruebas1() {
        phpinfo();
    }

    public function imagen() {
        if (!empty($_FILES)) {
            $id = $this->input->post('ID');
            $archivo = $_FILES['file'];

            $urlRelativa = 'assets/tramites/clavescatastralesindividual/croquis/';
            //$ultimo = strrpos($archivo['name'], '.');

            $nombreArchivo = 'croquis_individual' . $id;
            switch ($archivo['type'][0]) {
                case 'image/jpeg':
                    $nombreArchivo = $nombreArchivo . '.jpeg';
                    break;
                case 'image/jpg':
                    $nombreArchivo = $nombreArchivo . '.jpg';
                    break;
                case 'image/png':
                    $nombreArchivo = $nombreArchivo . '.png';
                    break;
            }
            $nombreArchivo = strtolower($nombreArchivo);

//Se definen las rutas completas
            // die(print_r($nombreArchivo, true));
            $url = $urlRelativa . '/' . $nombreArchivo;

//Se sube el archivo
            $exito = move_uploaded_file($archivo['tmp_name'][0], $url);

//Si se subi車 el archivo exitosamente
            if ($exito) {
//Se salva la URL del archivo en el resultado
                $data['croqis'] = $nombreArchivo;
                $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);

                echo "El archivo se guardo de manera correcta";
            } else {
                echo "Error tras subir el archivo $nombreArchivo. Por favor, int谷ntelo de nuevo.";
            }
        }
    }

    public function imagencerficidado() {
        if (!empty($_FILES)) {
            $id = $this->input->post('ID');
            $archivo = $_FILES['file'];
            $urlRelativa = 'assets/tramites/clavescatastralesindividual/croquis/';

            $nombreArchivo = 'croquis_certificado' . $id;
            switch ($archivo['type'][0]) {
                case 'image/jpeg':
                    $nombreArchivo = $nombreArchivo . '.jpeg';
                    break;
                case 'image/jpg':
                    $nombreArchivo = $nombreArchivo . '.jpg';
                    break;
                case 'image/png':
                    $nombreArchivo = $nombreArchivo . '.png';
                    break;
            }
            $nombreArchivo = strtolower($nombreArchivo);

//Se definen las rutas completas

            $url = $urlRelativa . '/' . $nombreArchivo;

//Se sube el archivo
            $exito = move_uploaded_file($archivo['tmp_name'][0], $url);

//Si se subió el archivo exitosamente
            if ($exito) {
//Se salva la URL del archivo en el resultado
                $data['croqis'] = $nombreArchivo;
                $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);

                echo "El archivo se guardo de manera correcta";
            } else {
                echo "Error tras subir el archivo $nombreArchivo. Por favor, inténtelo de nuevo.";
            }
        }
    }

    public function imagenfraccionamiento() {
        if (!empty($_FILES)) {
            $id = $this->input->post('ID');
            $archivo = $_FILES['file'];
            $urlRelativa = 'assets/tramites/clavescatastralesindividual/croquis/';

            $nombreArchivo = 'croquis_franccionamiento' . $id;
            switch ($archivo['type']) {
                case 'image/jpeg':
                    $nombreArchivo = $nombreArchivo . '.jpeg';
                    break;
                case 'image/jpg':
                    $nombreArchivo = $nombreArchivo . '.jpg';
                    break;
                case 'image/png':
                    $nombreArchivo = $nombreArchivo . '.png';
                    break;
            }
            $nombreArchivo = strtolower($nombreArchivo);

//Se definen las rutas completas

            $url = $urlRelativa . '/' . $nombreArchivo;
            //die(print_r($archivo,true));
//Se sube el archivo
            $exito = move_uploaded_file($archivo['tmp_name'], $url);

//Si se subió el archivo exitosamente
            if ($exito) {
//Se salva la URL del archivo en el resultado
                $data['croqis'] = $nombreArchivo;
                $this->Claves_catastrales_fraccionamiento_model->update($this->input->post('ID', TRUE), $data);

                echo "El archivo se guardo de manera correcta";
            } else {
                echo "Error tras subir el archivo $nombreArchivo. Por favor, inténtelo de nuevo.";
            }
        }
    }

    public function documentofinalnegacion_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['noint'] = $row->nooficialinui;
        $data['observaciones'] = $this->input->post('observaciones');

        $data['action'] = base_url() . "docstramites/documentoclave/documentofinalnegacion";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);

        $this->load->view('documentos/documentoclavecatastralnegacion_vista', $data);
    }

    public function documentofinalnegacionfraccionamiento() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['noint'] = $row->nooficialuin;
        $data['observaciones'] = $this->input->post('observaciones');
//        die(print_r($this->input->post(),true));
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoclavecatastralnegacion', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath1 = FCPATH . '/assets/tramites/clavescatastralesfraccionamiento/' . "file-" . $this->input->post('ID', TRUE) . "-doctofinal.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath1, "F");
        $this->m_pdf->pdf->Output();
        $data = array('doctofinal' => "file-" . $this->input->post('ID', TRUE) . "-doctofinal.pdf");
        $this->Claves_catastrales_fraccionamiento_model->update($this->input->post('ID', TRUE), $data2);
    }

    public function documentofinalnegacionfraccionamiento_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['noint'] = $row->nooficialuin;
        $data['observaciones'] = $this->input->post('observaciones');

        $data['action'] = base_url() . "docstramites/documentoclave/documentofinalnegacionfraccionamiento";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);

        $this->load->view('documentos/documentoclavecatastralnegacion_vista', $data);
    }

    public function documentofinalnegacioncer_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
//        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));
//die();
        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->numext;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = "";
        $data['colonia'] = $row->cbocomunidad;

        $data['noint'] = $row->numint;

        $data['observaciones'] = $this->input->post('observaciones');

        $data['action'] = base_url() . "docstramites/documentoclave/documentofinalnegacioncer";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);

        $this->load->view('documentos/documentoclavecatastralnegacion_vista', $data);
    }

    public function documentofinal() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));
        $data2 = array('clave' => $this->input->post('clave'));
        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fechas');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noint'] = $row->nooficialinui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['sup'] = $this->input->post('sup');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('numero_exp1');
        $data['fecha_esc'] = $this->input->post('fecha_esc');
        $data['lic'] = $this->input->post('lic');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = $this->input->post('fecha_exp');
        $data['croquis'] = $row->croqis;
        $data['noimg'] = $this->input->post('noimg');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['observaciones'] = $this->input->post('observaciones');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_doc'] = $this->input->post('numero_doc');
        $data['tipo_tramite'] = $this->input->post('tipo_tramite');
//        dieC(print_r($data,TRUE));
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

        $arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');

        $datetoday = $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');

        require 'vendor/autoload.php';

// Creating the new document...
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();



        $document = $PHPWord->loadTemplate('assets/pruebas.docx');

        $document->setValue('fecha_hoy', $datetoday);
        $document->setValue('d2', $row->nombrepropietariodp);
        $document->setValue('numero_doc', $this->input->post('numero_doc'));
        $document->setValue('d1', $this->input->post('d1'));
        $document->setValue('fechas', $this->input->post('fechas'));
        $document->setValue('calle', $this->input->post('calle'));
        $numero = "";

        $numero1 = $row->noloteui != "" ? ", " . $row->noloteui : "";
        $numero2 = $row->nomanzanaui != "" ? ", " . $row->nomanzanaui : "";
        $numero3 = $row->nooficialinui != "" ? ", INT " . $row->nooficialinui : "";
        $numero4 = $row->nooficialui != "" ? $row->nooficialui : "";

        $numero = $numero4 . "" . $numero3 . "" . $numero1 . "" . $numero2;
        $document->setValue('numero', $numero);
        $data['sup'] = $this->input->post('sup');

        $document->setValue('superficie', $this->input->post('sup'));
        $document->setValue('colonia', $this->input->post('colonia'));
        if ($row->predialui != "N/A") {
            $document->setValue('cuentapredial', " bajo la cuenta predial " . $row->predialui . " ");
        } else {
            $document->setValue('cuentapredial', "");
        }
        $document->setValue('caracter', $this->input->post('caracter'));
        $detallestram = "";
        if ($this->input->post('tipo_tramite') == "escritura") {

            $document->setValue('detalletre', "");
            $detallestram = "la Escritura Pública No. " . $this->input->post('numero_exp1');

            $document->setValue('detalletram', $detallestram);
        }
        $document->setValue('fecha_esc', $this->input->post('fecha_esc'));

        $document->setValue('ciudad', " de la ciudad de " . ucwords(strtolower($this->input->post('ciudad'))) . "");
        $detallespredio = "";
        if ($this->input->post('Privativat') || $this->input->post('Cubiertat')):
            $detallespredio = "Como lote " . $row->noloteui . " área privativa";
            if ($this->input->post('indivisott')):
                $detallespredio = $detallespredio . " con una área total de indiviso  de " . $this->input->post('indivisott') . " m²";
                if ($this->input->post('Privativat')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Privativat') . " m² de área privativa";
                endif;
                if ($this->input->post('Cubiertat')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Cubiertat') . " m² de área común cubierta";
                endif;
                if ($this->input->post('Cubiertatd')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Cubiertatd') . " m² de área común descubierta";
                endif;
            endif;
            $detallespredio = $detallespredio . " y le corresponde un indiviso del " . $this->input->post('Indivisopt') . "%";
        endif;

        $document->setValue('detallespredio', $detallespredio);

        $document->setValue('observaciones', "Observacion\n\n" . $this->input->post('observaciones'));
        $document->setValue('clave', $this->input->post('clave'));
        $nota = $this->input->post('noimg') != "" ? "Nota : " . $this->input->post('noimg') : "";
        $document->setValue('no_esp', $this->input->post('numero_exp'));
        $document->setValue('fecha_exp', $this->input->post('fecha_exp'));

        $Siglas = "";
        $nombre = $this->session->userdata('nombrec');
        $nombre = explode(" ", $this->session->userdata('nombrec'));
//                            var_dump($nombre)    ;
        foreach ($nombre as $nomb) {
            $Siglas = $Siglas . substr($nomb, 0, 1);
        }
        $variable = strtoupper($Siglas);
        $document->setValue('sigla', $variable);
        $document->setValue('nota', $nota);
        $valores = "con la fe pública del licenciado " . $this->input->post('lic') . " Notario Público No. " . $this->input->post('no_notario');

        $document->setValue('notario', $valores);
//        die(print_r($this->input->post('ciudad'),true));
//       Como lote área privativa con una área total de indiviso de 1231 m2 de los cuales 13123 m2 de área privativa, 1321 m2 de área común cubierta , 32132123 m2 de área común descubierta y le corresponde un indiviso del 32123%
        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        ob_clean();
        $document->saveAs($temp_file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename=Clave_' . $this->input->post('clave') . '.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');


        echo file_get_contents($temp_file);
    }

    public function documentofinal_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);

        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));
//        die(print_r($row,true));
        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['fechainicio'] = $row->fechainicio;
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noint'] = $row->nooficialinui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['sup'] = $this->input->post('sup') . ' ' . $this->input->post('tipo_sup');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('no_escritura');
        $data['fecha_esc'] = $this->input->post('fecha_escritura');
        $data['lic'] = $this->input->post('notario');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = date("Y-m-d");
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_doc'] = $this->input->post('numero_doc');
        $data['croquis'] = $row->croqis;
        $data['tipo_tramite'] = 'escritura';
        $data['claves'] = "";
        $data['action'] = base_url() . "docstramites/documentoclave/documentofinal";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
//        die(print_r(date("Y-m-d"),true));
        $data2 = array();
        $data2['caracter'] = $this->input->post('caracter');
        $data2['copro'] = $this->input->post('coop');
        $data2['noescri'] = $this->input->post('no_escritura');
        $timestamp = strtotime($this->input->post('fecha_escritura'));
        $data2['fechaesc'] = date('y/m/d', $timestamp);
        $data2['supsiac'] = $this->input->post('sup');
        $data2['supciact'] = $this->input->post('tipo_sup') == 'ha' ? 2 : 1;
        $data2['notario'] = $this->input->post('notario');
        $data2['nonotario'] = $this->input->post('no_notario');
        $data2['estado'] = $this->input->post('estado');
        $data2['ciudad'] = $this->input->post('ciudad');
        $data2['observaciones'] = $this->input->post('observaciones');
        $data2['areap'] = $this->input->post('Privativa') != "" ? 1 : 0;
        $data2['areapt'] = $this->input->post('Privativat');
        $data2['acc'] = $this->input->post('Cubiertac') != "" ? 1 : 0;
        $data2['acct'] = $this->input->post('Cubiertat');
        $data2['acd'] = $this->input->post('Cubiertad') != "" ? 1 : 0;
        $data2['acdt'] = $this->input->post('Cubiertatd');
        $data2['totalind'] = $this->input->post('indivisot') != "" ? 1 : 0;
        $data2['totalindt'] = $this->input->post('indivisott');
        $data2['porcent'] = $this->input->post('Indivisop') != "" ? 1 : 0;
        $data2['porcentt'] = $this->input->post('Indivisopt');
        $data2['clave'] = $this->input->post('clave');
        $data2['nooficio'] = $this->input->post('numero_doc');
//       die(print_r($data2,true));
        $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data2);
        $this->load->view('documentos/documentoclavecatastralvista', $data);
    }

    public function documentofinalcertificadoimuvii_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
//        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $row->fechainicio;
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->numext;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = 'APERTURA';
        $data['colonia'] = $row->cbocomunidad;
        ;
        $data['sup'] = $this->input->post('super');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('no_escritura');
        $data['fecha_esc'] = $this->input->post('fecha_escritura');
        $data['lic'] = $this->input->post('notario');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = date("Y-m-d");
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_exp'] = $row->nocontrol;
        $data['constancia'] = $this->input->post('no_constancia');
        $data['no_folio'] = $this->input->post('folio');
        $data['fecha_const'] = $this->input->post('fecha_const');
        $data['nombre_imuvii'] = $this->input->post('nombre_imuvii');
        $data['numero_doc'] = $this->input->post('Oficio');
        $data['croquis'] = $row->croqis;
        $data['action'] = base_url() . "docstramites/documentoclave/documentocertificadoimuvii";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
//        die(print_r(date("Y-m-d"),true));

        $this->load->view('documentos/documentoclavecatastralimuviivista', $data);
    }

    public function documentoimuvii_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));
//        die(print_r($this->input->post('sup'),true));
        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $row->fechainicio;
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noloteui'] = $row->noloteui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        $data['colonia'] = $row2->NOMBRE;
        $data['sup'] = $this->input->post('sup') . ' ' . $this->input->post('tipo_sup');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('no_escritura');
        $data['fecha_esc'] = $this->input->post('fecha_escritura');
        $data['lic'] = $this->input->post('notario');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = date("Y-m-d");
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_exp'] = $row->numerocontrol;
        $data['constancia'] = $this->input->post('no_constancia');
        $data['nombre_imuvii'] = $this->input->post('nombre_imuvii');
        $data['fecha_const'] = $this->input->post('fecha_const');
        $data['no_folio'] = $this->input->post('folio');
        $data['numero_doc'] = $this->input->post('Oficio');
        $data['croquis'] = $row->croqis;
        $data['action'] = base_url() . "docstramites/documentoclave/documentoimuvii";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
//        die(print_r(date("Y-m-d"),true));

        $data2 = array();

        $timestamp = strtotime($this->input->post('fecha_const'));

        $data2['fechaesc'] = date('y/m/d', $timestamp);
        $data2['supsiac'] = $this->input->post('sup');
        $data2['supciact'] = $this->input->post('tipo_sup') == 'ha' ? 2 : 1;
        $data2['notario'] = $this->input->post('folio');
        $data2['nonotario'] = $this->input->post('nombre_imuvii');

        $data2['observaciones'] = $this->input->post('observaciones');

        $data2['clave'] = $this->input->post('clave');
        $data2['nooficio'] = $this->input->post('Oficio');
//       die(print_r($data2,true));s
        $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data2);

        $this->load->view('documentos/documentoclavecatastralimuviivista', $data);
    }

    public function documentocertificadoimuvii() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
//        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $row->fechainicio;
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->numext;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = 'APERTURA';
        $data['colonia'] = $row->cbocomunidad;
        $data['super'] = $this->input->post('sup');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('no_escritura');
        $data['fecha_esc'] = $this->input->post('fecha_escritura');
        $data['lic'] = $this->input->post('notario');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = date("Y-m-d");
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
//          $data['numero_doc'] = $this->input->post('numero_doc');
        $data['constancia'] = $this->input->post('constancia');
        $data['no_folio'] = $this->input->post('no_folio');
        $data['fecha_esc'] = $this->input->post('fecha_esc');
        $data['nombre_imuvii'] = $this->input->post('nombre_imuvii');
        $data['numero_doc'] = $this->input->post('numero_doc');
        $data['croquis'] = $row->croqis;
        $data['noimg'] = $this->input->post('noimg');
//        $data['action'] = base_url() . "docstramites/documentoclave/documentofinal";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
//        die(print_r(date("Y-m-d"),true)); $this->load->view('documentos/documentoclavecatastralimuvii', $data);
        $html = $this->load->view('documentos/documentoclavecatastralimuvii', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath = "claves_catastrales_" . $id . ".pdf";

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

    public function documentoimuvii() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

//        $data['action'] = base_url() . "docstramites/documentoclave/documentofinal";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
//        die(print_r(date("Y-m-d"),true)); $this->load->view('documentos/documentoclavecatastralimuvii', $data);
        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

        $arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');

        $datetoday = $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');

        require 'vendor/autoload.php';

// Creating the new document...
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();



        $document = $PHPWord->loadTemplate('assets/imuvii.docx');

        $document->setValue('fecha_hoy', $datetoday);
        $document->setValue('d2', $row->nombrepropietariodp);
        $document->setValue('numero_doc', $this->input->post('numero_doc'));
        $document->setValue('d1', $this->input->post('d1'));
        $document->setValue('fechas', $this->input->post('fechas'));
        $document->setValue('calle', $this->input->post('calle'));
        $numero = "";
        $numero1 = $row->noloteui != "" ? ", " . $row->noloteui : "";
        $numero2 = $row->nomanzanaui != "" ? ", " . $row->nomanzanaui : "";
        $numero3 = $row->nooficialinui != "" ? ", INT " . $row->nooficialinui : "";
        $numero4 = $row->nooficialui != "" ? $row->nooficialui : "";

        $numero = $numero4 . "" . $numero3 . "" . $numero1 . "" . $numero2;
        $document->setValue('numero', $numero);

        $document->setValue('nombre_imuvii', $this->input->post('nombre_imuvii'));
        $document->setValue('folio', $this->input->post('no_folio'));


        $document->setValue('superficie', $this->input->post('sup'));
        $document->setValue('colonia', $this->input->post('colonia'));
        if ($row->predialui != "N/A") {
            $document->setValue('cuentapredial', " bajo la cuenta predial " . $row->predialui . " ");
        } else {
            $document->setValue('cuentapredial', "");
        }
        $document->setValue('caracter', $this->input->post('caracter'));
        $detallestram = "";

        $document->setValue('fecha_esc', $this->input->post('fecha_esc'));

        $document->setValue('notario', "");

        $document->setValue('observaciones', $this->input->post('observaciones'));
        $document->setValue('clave', $this->input->post('clave'));
        $nota = $this->input->post('noimg') != "" ? "Nota : " . $this->input->post('noimg') : "";
        $document->setValue('no_esp', $this->input->post('numero_exp'));
        $document->setValue('fecha_exp', $this->input->post('fecha_exp'));
        $document->setValue('nota', $nota);
//        die(print_r($this->input->post('ciudad'),true));
//       Como lote área privativa con una área total de indiviso de 1231 m2 de los cuales 13123 m2 de área privativa, 1321 m2 de área común cubierta , 32132123 m2 de área común descubierta y le corresponde un indiviso del 32123%
        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        ob_clean();
        $document->saveAs($temp_file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename=Clave_' . $this->input->post('clave') . '.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');


        echo file_get_contents($temp_file);
    }

    public function documentofinalnegacion() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);


//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['noint'] = $row->nooficialinui;
        $data['observaciones'] = $this->input->post('observaciones');
//        die(print_r($this->input->post(),true));
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoclavecatastralnegacion', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath1 = FCPATH . '/assets/tramites/clavescatastralesindividual/' . "file-" . $this->input->post('ID', TRUE) . "-doctofinal.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath1, "F");
        $this->m_pdf->pdf->Output();
        $data = array('doctofinal' => "file-" . $this->input->post('ID', TRUE) . "-doctofinal.pdf");
        $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data2);
    }

    public function documentofinalnegacioncer() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
//        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->numext;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['predial'] = "";
        $data['colonia'] = $row->cbocomunidad;
        $data['noint'] = $row->numint;
        $data['observaciones'] = $this->input->post('observaciones');
//        die(print_r($this->input->post(),true));
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoclavecatastralnegacion', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
//        $pdfFilePath = "claves_catastrales_" . $id . ".pdf";
//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
//        $this->m_pdf->pdf->Output($pdfFilePath, "D");
        $pdfFilePath = FCPATH . '/assets/tramites/clavescatastralesindividualcertificado/' . "file-" . $this->input->post('ID', TRUE) . "-doctofinal.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html   die();
//        $this->m_pdf->pdf->WriteHTML($html);
//           die();
//  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2 = array();
        $data2['doctofinal'] = "file-" . $this->input->post('ID', TRUE) . "-doctofinal.pdf";
        $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data2);
//        die(print_r($data2));
//        redi
    }

    public function documentofinalcertificado() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);

//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//        die(print_r($data, true));


        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

        $arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');

        $datetoday = $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');

        require 'vendor/autoload.php';

// Creating the new document...
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();



        $document = $PHPWord->loadTemplate('assets/pruebas.docx');

        $document->setValue('fecha_hoy', $datetoday);
        $document->setValue('d2', $row->nombrepropietariodp);
        $document->setValue('numero_doc', $this->input->post('numero_doc'));
        $document->setValue('d1', $this->input->post('d1'));
        $document->setValue('fechas', $this->input->post('fechas'));
        $document->setValue('calle', $this->input->post('calle'));
        $numero = "";
        $numero1 = $row->noloteui != "" ? ", " . $row->noloteui : "";
        $numero2 = $row->nomanzanaui != "" ? ", " . $row->nomanzanaui : "";
        $numero3 = $row->numint != "" ? ", INT " . $row->numint : "";
        $numero4 = $row->numext != "" ? $row->numext : "";
        $numero5 = $row->zonaloteparcela != "" ? ", Parcela/Solar Lote " . $row->zonaloteparcela : "";
        $numero6 = $row->porcionp != "" ? " Con Zona y Porción/Manzana de " . $row->porcionp : "";

        $numero = $numero4 . "" . $numero3 . "" . $numero1 . "" . $numero2 . "" . $numero5 . "" . $numero6;
        $document->setValue('numero', $numero);
        $data['sup'] = $this->input->post('sup');

        $document->setValue('superficie', $this->input->post('sup'));
        $document->setValue('colonia', $this->input->post('colonia'));
        if ($row->predialui != "N/A") {
            $document->setValue('cuentapredial', " bajo la cuenta predial " . $row->predialui . " ");
        } else {
            $document->setValue('cuentapredial', "");
        }
        $document->setValue('caracter', $this->input->post('caracter'));
        $detallestram = "";
        if ($this->input->post('tipo_tramite') == "titulo") {

            $document->setValue('detalletre', "");
            $detallestram = "Título de propiedad/Certificado Parcelario/Sentencia Jurídica No. " . $this->input->post('numero_exp1');

            $document->setValue('detalletram', $detallestram);
            $document->setValue('ciudad', ", de la ciudad de " . $this->input->post('ciudad'));
        } else if ($this->input->post('tipo_tramite') == "cat") {
            $document->setValue('detalletre', "");
            if ($this->input->post('delegado') != "") {
                $detallestram = "Autorización del Delegado " . $this->input->post('delegado')." por, ";
            }
            $detallestram .= "Contrato Privado de Compraventa CORETT";
            $document->setValue('detalletram', $detallestram);
            $document->setValue('ciudad', ", de la ciudad de " . $this->input->post('ciudad') . ". Con una superficie de " . $this->input->post('sup'));
        } else if ($this->input->post('tipo_tramite') == "info") {
            $document->setValue('detalletre', "");

            if ($this->input->post('delegado') != "") {
                $detallestram = "Autorización del Delegado ". $this->input->post('delegado')." por, ";
            }

            $detallestram .= "Contrato Privado de Compraventa INFONAVIT";
            $document->setValue('detalletram', $detallestram);
            $document->setValue('ciudad', ", de la ciudad de " . $this->input->post('ciudad') . ". Con una superficie de " . $this->input->post('sup'));
        }
        $document->setValue('fecha_esc', $this->input->post('fecha_esc'));
        $document->setValue('notario', "");

        $detallespredio = "";
        if ($this->input->post('Privativat') || $this->input->post('Cubiertat')):
            $detallespredio = "Como lote " . $row->noloteui . " área privativa";
            if ($this->input->post('indivisott')):
                $detallespredio = $detallespredio . " con una área total de indiviso  de " . $this->input->post('indivisott') . " m²";
                if ($this->input->post('Privativat')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Privativat') . " m² de área privativa";
                endif;
                if ($this->input->post('Cubiertat')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Cubiertat') . " m² de área común cubierta";
                endif;
                if ($this->input->post('Cubiertatd')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Cubiertatd') . " m² de área común descubierta";
                endif;
            endif;
            $detallespredio = $detallespredio . " y le corresponde un indiviso del " . $this->input->post('Indivisopt') . "%";
        endif;

        $document->setValue('detallespredio', $detallespredio);

        $document->setValue('observaciones', $this->input->post('observaciones'));
        $document->setValue('clave', $this->input->post('clave'));
        $nota = $this->input->post('noimg') != "" ? "Nota : " . $this->input->post('noimg') : "";
        $document->setValue('no_esp', $this->input->post('numero_exp'));
        $document->setValue('fecha_exp', $this->input->post('fecha_exp'));
        $Siglas = "";
        $nombre = $this->session->userdata('nombrec');
        $nombre = explode(" ", $this->session->userdata('nombrec'));
//                            var_dump($nombre)    ;
        foreach ($nombre as $nomb) {
            $Siglas = $Siglas . substr($nomb, 0, 1);
        }
        $variable = strtoupper($Siglas);
        $document->setValue('sigla', $variable);
        $document->setValue('nota', $nota);

//       Como lote área privativa con una área total de indiviso de 1231 m2 de los cuales 13123 m2 de área privativa, 1321 m2 de área común cubierta , 32132123 m2 de área común descubierta y le corresponde un indiviso del 32123%
        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        ob_clean();
        $document->saveAs($temp_file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename=Clave_' . $this->input->post('clave') . '.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');


        echo file_get_contents($temp_file);
    }

    public function documentofinalfraccinamiento() {

//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));



//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoclavecatastral', $data, true);

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

    public function documentofinalcertificado_vista() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);

//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));


        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $row->fechainicio;
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->numext;
        $data['noint'] = $row->numint;
        $data['predial'] = '';
        $data['colonia'] = $row->cbocomunidad;
        $data['sup'] = $this->input->post('sup') . " " . $this->input->post('tipo_sup') . ".";
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('no_escritura');
        $data['fecha_esc'] = $this->input->post('fecha_escritura');
        $data['lic'] = $this->input->post('notario');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = date("Y-m-d");
        $data['croquis'] = $row->croqis;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['coop'] = $this->input->post('coop');
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_doc'] = $this->input->post('numero_doc');
        $data['delegado'] = $this->input->post('delegado');
        $data['fechainicio'] = $row->fechainicio;
        if ($this->input->post('no_escritura') != "") {
            $data['tipo_tramite'] = 'titulo';
        } else {
            if ($this->input->post('ttramite') == 'coret'):
                $data['tipo_tramite'] = 'cat';
            else:
                $data['tipo_tramite'] = 'info';
            endif;
        }
        $data['claves'] = "";
        $data['zona'] = $row->zonaloteparcela;
        $data['parcela'] = $row->porcionp;
        $data['action'] = base_url() . "docstramites/documentoclave/documentofinalcertificado";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $data2 = array();
        $data2['caracter'] = $this->input->post('caracter');
        $data2['copro'] = $this->input->post('coop');
        $data2['noescri'] = $this->input->post('no_escritura');
        $timestamp = strtotime($this->input->post('fecha_escritura'));

        $data2['fechaesc'] = date('y/m/d', $timestamp);
        $data2['supsiac'] = $this->input->post('sup');
        $data2['supciact'] = $this->input->post('tipo_sup') == 'ha' ? 2 : 1;
        $data2['notario'] = $this->input->post('notario');
        $data2['nonotario'] = $this->input->post('no_notario');
        $data2['estado'] = $this->input->post('estado');
        $data2['ciudad'] = $this->input->post('ciudad');
        $data2['observaciones'] = $this->input->post('observaciones');
        $data2['areap'] = $this->input->post('Privativa') != "" ? 1 : 0;
        $data2['areapt'] = $this->input->post('Privativat');
        $data2['acc'] = $this->input->post('Cubierta') != "" ? 1 : 0;
        $data2['acct'] = $this->input->post('Cubiertat');
        $data2['acd'] = $this->input->post('Cubierta') != "" ? 1 : 0;
        $data2['acdt'] = $this->input->post('Cubiertatd');
        $data2['totalind'] = $this->input->post('indivisot') != "" ? 1 : 0;
        $data2['totalindt'] = $this->input->post('indivisott');
        $data2['porcent'] = $this->input->post('Indivisop') != "" ? 1 : 0;
        $data2['porcentt'] = $this->input->post('Indivisopt');
        $data2['clave'] = $this->input->post('clave');
        $data2['nooficio'] = $this->input->post('numero_doc');
//       die(print_r($data2,true));
        $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data2);
        $this->load->view('documentos/documentoclavecatastralvista', $data);
    }

//aqui
    public function documentofinalfraccionamiento() {
        $id = $this->input->post('ID');
        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);

        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));


        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['sup'] = $this->input->post('sup');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('numero_exp1');
        $data['fecha_esc'] = $this->input->post('fecha_esc');
        $data['lic'] = $this->input->post('notario');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = $this->input->post('fecha_exp');
        $data['croquis'] = $row->croqis;
        $data2 = array('clave' => $this->input->post('clave'));
        $data['fechainicio'] = $row->fechainicio;
        $data['noimg'] = $this->input->post('noimg');
        $data['noint'] = $row->nooficialuin;
//                  $data['coop'] = $this->input->post('coop');
//        $data['fecha_exp'] = date("Y-m-d");
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_doc'] = $this->input->post('numero_doc');
        //        dieC(print_r($data,TRUE));
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

        $arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');

        $datetoday = $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');

        require 'vendor/autoload.php';

// Creating the new document...
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();



        $document = $PHPWord->loadTemplate('assets/pruebas.docx');

        $document->setValue('fecha_hoy', $datetoday);
        $document->setValue('d2', $row->nombrepropietariodp);
        $document->setValue('numero_doc', $this->input->post('numero_doc'));
        $document->setValue('d1', $this->input->post('d1'));
        $document->setValue('fechas', $this->input->post('fechas'));
        $document->setValue('calle', $this->input->post('calle'));
        $document->setValue('clavescatastrales', $this->input->post('clavescatastrales'));
        $numero = "";
        $numero1 = $row->noloteui != "" ? ", " . $row->noloteui : "";
        $numero2 = $row->nomanzanaui != "" ? ", " . $row->nomanzanaui : "";
        $numero3 = $row->nooficialinui != "" ? ", INT " . $row->nooficialinui : "";
        $numero4 = $row->nooficialui != "" ? $row->nooficialui : "";

        $numero = $numero4 . "" . $numero3 . "" . $numero1 . "" . $numero2;
        $document->setValue('numero', $numero);
        $data['sup'] = $this->input->post('sup');

        $document->setValue('superficie', $this->input->post('sup'));
        $document->setValue('colonia', $this->input->post('colonia'));
        if ($row->predialui != "N/A") {
            $document->setValue('cuentapredial', " bajo la cuenta predial " . $row->predialui . " ");
        } else {
            $document->setValue('cuentapredial', "");
        }
        $document->setValue('caracter', $this->input->post('caracter'));
        $detallestram = "";
        if ($this->input->post('tipo_tramite') == "escritura") {

            $document->setValue('detalletre', "");
            $detallestram = "la Escritura Pública No. " . $this->input->post('numero_exp1');

            $document->setValue('detalletram', $detallestram);
        }
        $document->setValue('fecha_esc', $this->input->post('fecha_esc'));

        $document->setValue('ciudad', ", de la ciudad de " . $this->input->post('ciudad') . ".");
        $valores = "con la fé pública del licenciado " . $this->input->post('lic') . " Notario Público No. " . $this->input->post('no_notario');

        $document->setValue('notario', $valores);
        $detallespredio = "";
        if ($this->input->post('Privativat') || $this->input->post('Cubiertat')):
            $detallespredio = "Como lote " . $row->noloteui . " área privativa";
            if ($this->input->post('indivisott')):
                $detallespredio = $detallespredio . " con una área total de indiviso  de " . $this->input->post('indivisott') . " m²";
                if ($this->input->post('Privativat')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Privativat') . " m² de área privativa";
                endif;
                if ($this->input->post('Cubiertat')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Cubiertat') . " m² de área común cubierta";
                endif;
                if ($this->input->post('Cubiertatd')):
                    $detallespredio = $detallespredio . ", de los cuales " . $this->input->post('Cubiertatd') . " m² de área común descubierta";
                endif;
            endif;
            $detallespredio = $detallespredio . " y le corresponde un indiviso del " . $this->input->post('Indivisopt') . "%";
        endif;

        $document->setValue('detallespredio', $detallespredio);

        $document->setValue('observaciones', $this->input->post('observaciones'));
        $document->setValue('clave', $this->input->post('clave'));
        $nota = $this->input->post('noimg') != "" ? "Nota : " . $this->input->post('noimg') : "";
        $document->setValue('no_esp', $this->input->post('numero_exp'));
        $document->setValue('fecha_exp', $this->input->post('fecha_exp'));

        $Siglas = "";
        $nombre = $this->session->userdata('nombrec');
        $nombre = explode(" ", $this->session->userdata('nombrec'));
//                            var_dump($nombre)    ;
        foreach ($nombre as $nomb) {
            $Siglas = $Siglas . substr($nomb, 0, 1);
        }
        $variable = strtoupper($Siglas);
        $document->setValue('sigla', $variable);
        $document->setValue('nota', $nota);
//        die(print_r($this->input->post('ciudad'),true));
//       Como lote área privativa con una área total de indiviso de 1231 m2 de los cuales 13123 m2 de área privativa, 1321 m2 de área común cubierta , 32132123 m2 de área común descubierta y le corresponde un indiviso del 32123%
        $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
        ob_clean();
        $document->saveAs($temp_file);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename=Clave_' . $this->input->post('clave') . '.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');


        echo file_get_contents($temp_file);
    }

    public function documentofinalfraccionamiento_vista() {


        $id = $this->input->post('ID');
//        $this->Claves_fraccionamiento_model->insert();

        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);

        $row2 = $this->Colonias_model->getalladatacoloniabyidpredial($row->cbocoloniaui);
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $this->input->post('ID'));

        if ($row->clave != "") {
            
        } else {
            $this->Claves_fraccionamiento_model->insert($this->input->post('clave_fraccionamiento'));
        }
        $data['d1'] = $row->tipotramitedp;
        $data['d2'] = $row->nombrepropietariodp;
        $data['fechas'] = $this->input->post('fecha');
        $data['calle'] = $row->calleui;
        $data['numero'] = $row->nooficialui;
        $data['predial'] = $row->predialui;
        if ($row->cbocoloniaui != 0) {
            $data['colonia'] = $row2->NOMBRE;
        } else {
            $data['colonia'] = $row->coloniados;
        }
        $data['claves'] = $this->input->post('clave_fraccionamiento');
        $data['noint'] = $row->nooficialuin;
        $data['sup'] = $this->input->post('sup') . ' ' . $this->input->post('tipo_sup');
        $data['caracter'] = $this->input->post('caracter');
        $data['noesc'] = $this->input->post('no_escritura');
        $data['fecha_esc'] = $this->input->post('fecha_escritura');
        $data['lic'] = $this->input->post('lic');
        $data['no_notario'] = $this->input->post('no_notario');
        $data['numero_exp'] = $this->input->post('numero_exp');
        $data['clave'] = $this->input->post('clave');
        $data['fecha_exp'] = $this->input->post('fecha_exp');
        $data['croquis'] = $row->croqis;
        $data['noloteui'] = $row->noloteui;
        $data['nomanzanaui'] = $row->nomanzanaui;
        $data['fechainicio'] = $row->fechainicio;
        $data['numero_exp'] = $row->numerocontrol;
        $data['noimg'] = $this->input->post('noimg');
//                  $data['coop'] = $this->input->post('coop');
        $data['fecha_exp'] = date("Y-m-d");
        $data['observaciones'] = $this->input->post('observaciones');
        $data['Privativat'] = $this->input->post('Privativat');
        $data['Cubiertat'] = $this->input->post('Cubiertat');
        $data['indivisott'] = $this->input->post('indivisott');
        $data['Indivisopt'] = $this->input->post('Indivisopt');
        $data['coop'] = $this->input->post('coop');
        $data['estado'] = $this->input->post('estado');
        $data['ciudad'] = $this->input->post('ciudad');
//          $data['Cubiertad'] = $this->input->post('Cubiertad');
        $data['Cubiertatd'] = $this->input->post('Cubiertatd');
        $data['numero_doc'] = $this->input->post('numero_doc');
        $data['tipo_tramite'] = 'escritura';
        $data['action'] = base_url() . "docstramites/documentoclave/documentofinalfraccionamiento";
//$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
//$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $data2 = array();
        $data2['caracter'] = $this->input->post('caracter');
        $data2['copro'] = $this->input->post('coop');
        $data2['noescri'] = $this->input->post('no_escritura');
        $timestamp = strtotime($this->input->post('fecha_escritura'));

        $data2['fechaesc'] = date('y/m/d', $timestamp);
        $data2['supsiac'] = $this->input->post('sup');
        $data2['supciact'] = $this->input->post('tipo_sup') == 'ha' ? 2 : 1;
        $data2['notario'] = $this->input->post('notario');
        $data2['nonotario'] = $this->input->post('no_notario');
        $data2['estado'] = $this->input->post('estado');
        $data2['ciudad'] = $this->input->post('ciudad');
        $data2['observaciones'] = $this->input->post('observaciones');
        $data2['areap'] = $this->input->post('Privativa') != "" ? 1 : 0;
        $data2['areapt'] = $this->input->post('Privativat');
        $data2['acc'] = $this->input->post('Cubiertac') != "" ? 1 : 0;
        $data2['acct'] = $this->input->post('Cubiertat');
        $data2['acd'] = $this->input->post('Cubiertad') != "" ? 1 : 0;
        $data2['acdt'] = $this->input->post('Cubiertatd');
        $data2['totalind'] = $this->input->post('indivisot') != "" ? 1 : 0;
        $data2['totalindt'] = $this->input->post('indivisott');
        $data2['porcent'] = $this->input->post('Indivisop') != "" ? 1 : 0;
        $data2['porcentt'] = $this->input->post('Indivisopt');
        $data2['clave'] = $this->input->post('clave');
        $data2['nooficio'] = $this->input->post('numero_doc');
//       die(print_r($data2,true));
        $this->Claves_catastrales_fraccionamiento_model->update($this->input->post('ID', TRUE), $data2);
        $this->load->view('documentos/documentoclavecatastralvista', $data);
    }

    
}

?>
