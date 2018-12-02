<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claves_catastrales_individual_cetificado extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Claves_catastrales_individual_model');
        $this->load->model('Claves_catastrales_individual_cetificado_model');
        $this->load->model('Claves_catastrales_fraccionamiento_model');
        $this->load->library('form_validation');
        $this->load->library('zip');
        $this->load->model('Colonias_model');
        $this->load->model('Usuarios_model');
    }

    public function bclave() {
        $CLAVE = $this->input->post('clave');
        $datos = $this->Claves_catastrales_individual_model->total_rowsc($CLAVE);
        $datos1 = $this->Claves_catastrales_individual_cetificado_model->total_rowsc($CLAVE);
        $datos2 = $this->Claves_catastrales_fraccionamiento_model->total_rowsc($CLAVE);
        if ($datos) {
            $datos = $this->Claves_catastrales_individual_model->getDatabyClave($CLAVE);
            echo json_encode($datos[0]->nombrepropietariodp);
        } elseif ($datos1) {
            $datos = $this->Claves_catastrales_individual_cetificado_model->getDatabyClave($CLAVE);
            echo json_encode($datos[0]->nombrepropietariodp);
        } elseif ($datos2) {
            $datos = $this->Claves_catastrales_fraccionamiento_model->getDatabyClave($CLAVE);
            echo json_encode($datos[0]->nombrepropietariodp);
        } else {
            echo 0;
        }
    }

    public function pago($id = null) {
        if ($id) {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id($id);

            if ($row && $row->usuarioID === $this->session->userdata('id') && $row->status === "4") {
                $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (2) ");
                $pagos = $costo->result();
                $data['concepto'] = "Solicitude de pago de Clave Catastral Certificada";
                $data['des'] = "Pago de Clave Catastral Certificada";
                $data['importe'] = "" . $pagos[0]->costo_tram;
                $data['ref'] = "003";
                $data['id'] = "claves_catastrales_individual/update/" . $id;
                $this->load->view('pago', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function ventanilla() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/ventanilla/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/ventanilla/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/ventanilla/';
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/ventanilla/';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_ventana($q);

        $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_limit_data_ventana($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_cetificado' => $claves_catastrales_individual_cetificado,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificadol_list_ventanilla', $data);
    }

    function contador() {
        $archivo = "assets/no_seguimiento.txt"; //el archivo que contiene en numero
        $archivo1 = "assets/fecha_no_seguimiento.txt";
        $fecha = date("Y");

        $fp1 = fopen($archivo1, "r");
        $contador1 = fgets($fp1, 26);
        fclose($fp1);
//          

        if ($fecha != $contador1) {
            $contador = 1;
            $fp = fopen($archivo, "w+");
            fwrite($fp, $contador, 26);
            fclose($fp);

            $fp1 = fopen($archivo1, "w+");
            fwrite($fp1, $fecha, 26);
            fclose($fp1);
        } else {
            $contador = 1;

            $fp = fopen($archivo, "r");
            $contador = fgets($fp, 26);
            fclose($fp);

            ++$contador;

            $fp = fopen($archivo, "w+");
            fwrite($fp, $contador, 26);
            fclose($fp);
        }
        if ($contador < 100000) {
            $respuesta = str_pad($contador, 5, 0, STR_PAD_LEFT) . $fecha;
        } else {
            $respuesta = 0;
        }

        return $respuesta;
    }

    public function create_ventanilla() {

        $result = $this->Colonias_model->getcolonias();
        $data = array(
            'consulta' => $result,
            'button' => 'Guardar',
            'action' => site_url('claves_catastrales_individual_cetificado/create_action'),
            'ID' => set_value('ID'),
            'numerotitulo' => set_value('numerotitulo'),
            'calleui' => set_value('calleui'),
            'cbocomunidad' => set_value('cbocomunidad'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'zonaloteparcela' => set_value('zonaloteparcela'),
            'mapa' => set_value('mapa'),
            'nombrepropietariodp' => set_value('nombrepropietariodp'),
            'nombreresolicitante' => set_value('nombreresolicitante'),
            'callenotificacionesdp' => set_value('callenotificacionesdp'),
            'numeronotificacionedp' => set_value('numeronotificacionedp'),
            'colonianotificacionesdp' => set_value('colonianotificacionesdp'),
            'correonotificacionesdp' => set_value('correonotificacionesdp'),
            'telefononotificacionesdp' => set_value('telefononotificacionesdp'),
            'tipotramitedp' => set_value('tipotramitedp'),
            'motivotramitedp' => set_value('motivotramitedp'),
            'doctoine' => set_value('doctoine'),
            'doctotitulo' => set_value('doctotitulo'),
            'doctopago' => set_value('doctopago'),
            'doctofinal' => set_value('doctofinal'),
            'mensaje' => set_value('mensaje'),
            'status' => set_value('status'),
            'usuarioID' => set_value('usuarioID'),
            'otros_doc' => set_value('otros_doc'),
            'ipropietario' => '1',
            'tipopersona' => '1',
            'domisiliosino' => '2',
            'morine' => set_value('morine'),
            'fisrfc' => set_value('fisrfc'),
            'numext' => set_value('numext'),
            'numint' => set_value('numint'),
            'numeronotificacionedpint' => set_value('numeronotificacionedpint'),
            'clave' => set_value('clave'),
            'cartapoder' => set_value('cartapoder'),
            'predialso' => set_value('predialso'),
            'compraventa' => set_value('compraventa'),
            'nocontrol' => set_value('nocontrol'),
            'porcionp' => set_value('porcionp'),
            'control' => set_value('control'),
        );
        $user_id = $this->session->userdata('id');

        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form_fun', $data);
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/';
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/';
        }
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;

        if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4):
            $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_usuarios($q);
            $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_limit_data_usuarios($config['per_page'], $start, $q);

        else:
            $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows($q);
            $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_limit_data($config['per_page'], $start, $q);

        endif;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_cetificado_data' => $claves_catastrales_individual_cetificado,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_list', $data);
    }

    public function reportes() {
        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_reportes');
    }

    public function reportefinal() {

        $seguimineto = $this->input->post('seguimiento', TRUE);
        $year = $this->input->post('year', TRUE);
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $clave = $this->input->post('clave', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);
        if ($seguimineto):
            $nos = $seguimineto . $year;
        else:
            $nos = "";
        endif;


        $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave);

        $data = array(
            'claves_catastrales_individual_cetificado_data' => $claves_catastrales_individual_cetificado,
            'seguimiento' => $this->input->post('seguimiento', TRUE),
            'year' => $this->input->post('year', TRUE),
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'clave' => $this->input->post('clave', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );

        //print_r($data);
        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_reportefinal', $data);
    }

    public function reportespdf() {
        $seguimineto = $this->input->post('seguimiento', TRUE);
        $year = $this->input->post('year', TRUE);
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $clave = $this->input->post('clave', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);
        if ($seguimineto):
            $nos = $seguimineto . $year;
        else:
            $nos = "";
        endif;
        $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave);

        $data = array(
            'claves_catastrales_individual_cetificado_data' => $claves_catastrales_individual_cetificado,
            'seguimiento' => $this->input->post('seguimiento', TRUE),
            'year' => $this->input->post('year', TRUE),
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );

        //print_r($data);
        $html = $this->load->view('documentos/reporteclaveindividualcer', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath1 = "ReporteClaveCatastral.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output();
    }

    public function vistapago($id) {
        $result = $this->Colonias_model->getcolonias();
        $resultq = $this->Usuarios_model->get_usuarios();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id($id);
        }


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Enviar Pago',
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => "",
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => '',
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'categoriapredioui' => '',
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calleui),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'status' => set_value('status', $row->status),
                'clave' => set_value('clave'),
                'compro' => set_value('compro', $row->compro),
            );


            $data['action'] = site_url('Claves_catastrales_individual_cetificado/vistapago_action');

            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('Claves_catastrales_individual_cetificado/Claves_catastrales_individual_cetificado_vistapago', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Claves_catastrales_individual_cetificado'));
        }
    }

    public function vistapago_action() {

        if ($this->input->post()) {
            if ($_FILES['compro']['tmp_name'][0]) {
                $maxnumbd = $this->input->post('ID', TRUE);

                //Tamaño Maximo de los Archivos 20 Megas

                $configzip = $config1['max_size'] = '1000000';
                $config1['max_width'] = '1024000';
                $config1['max_height'] = '768000';
                $this->load->library("upload", $configzip);
                $variablefile = $_FILES;
                $data = array(
                    'notificacion' => '1');

                if (!empty($_FILES['compro']['tmp_name'][0])) {
                    $numfiles = count($_FILES['compro']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['compro']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['compro']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-compro.zip')) {
                        $data['compro'] = "file-" . $maxnumbd . "-compro.zip";
                        //echo "Guarda";
                        $this->session->set_flashdata('correcto', 'Su recibo de pago se registro de manera correcta');
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
                $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Pago realizado un funcionario validara lo validad y se le adjuntara su documento');
                redirect(site_url('Claves_catastrales_individual_cetificado'));
            } else {
                $this->session->set_flashdata('correcto', 'Antes de enviar pago debe adjuntar el comprobante de pago');
                redirect(site_url('Claves_catastrales_individual_cetificado/vistapago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function read($id) {
        $result = $this->Colonias_model->getcolonias();
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Actualizar',
                'action' => site_url('claves_catastrales_individual_cetificado/update_action'),
                'ID' => set_value('ID', $row->ID),
                'numerotitulo' => set_value('numerotitulo', $row->numerotitulo),
                'calleui' => set_value('calleui', $row->calleui),
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'zonaloteparcela' => set_value('zonaloteparcela', $row->zonaloteparcela),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctotitulo' => set_value('doctotitulo', $row->doctotitulo),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID), 'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'numext' => set_value('numext', $row->numext),
                'numint' => set_value('numint', $row->numint),
                'numeronotificacionedpint' => set_value('numeronotificacionedpint', $row->numeronotificacionedpint),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'clave' => set_value('clavecat', $row->clavecat),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'compraventa' => set_value('compraventa', $row->compraventa),
                'docacta' => set_value('docacta', $row->docacta),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'imuvii' => set_value('imuvii', $row->imuvii),
                'porcionp' => set_value('porcionp', $row->porcionp),
                'compro' => set_value('compro', $row->compro),
            );



            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_read', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual_cetificado'));
        }
    }

    public function generarzip($id) {
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_admin($id);

        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'doctoine' => $row->doctoine,
                'doctotitulo' => $row->doctotitulo,
                'doctopago' => $row->doctopago,
                'doctofinal' => $row->doctofinal,
                'numerotitulo' => $row->numerotitulo
            );

            //print_r($data);
            echo "<br>";
            $path = "./assets/tramites/clavescatastralesindividualcertificado/";
            $this->zip->read_file($path . $row->doctoine);
            $this->zip->read_file($path . $row->doctotitulo);
            $this->zip->read_file($path . $row->doctopago);
            $this->zip->read_file($path . $row->doctofinal);
            //Download the file to your desktop. Name it "my_backup.zip"
            $this->zip->download($row->numerotitulo . '.zip');
        }
    }

    public function create() {

        $result = $this->Colonias_model->getcolonias();
        $data = array(
            'consulta' => $result,
            'button' => 'Solicitar Trámite',
            'action' => site_url('claves_catastrales_individual_cetificado/create_action'),
            'ID' => set_value('ID'),
            'numerotitulo' => set_value('numerotitulo'),
            'calleui' => set_value('calleui'),
            'cbocomunidad' => set_value('cbocomunidad'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'zonaloteparcela' => set_value('zonaloteparcela'),
            'mapa' => set_value('mapa'),
            'nombrepropietariodp' => set_value('nombrepropietariodp'),
            'nombreresolicitante' => set_value('nombreresolicitante'),
            'callenotificacionesdp' => set_value('callenotificacionesdp'),
            'numeronotificacionedp' => set_value('numeronotificacionedp'),
            'colonianotificacionesdp' => set_value('colonianotificacionesdp'),
            'correonotificacionesdp' => set_value('correonotificacionesdp'),
            'telefononotificacionesdp' => set_value('telefononotificacionesdp'),
            'tipotramitedp' => set_value('tipotramitedp'),
            'motivotramitedp' => set_value('motivotramitedp'),
            'doctoine' => set_value('doctoine'),
            'doctotitulo' => set_value('doctotitulo'),
            'doctopago' => set_value('doctopago'),
            'doctofinal' => set_value('doctofinal'),
            'mensaje' => set_value('mensaje'),
            'status' => set_value('status'),
            'usuarioID' => set_value('usuarioID'),
            'otros_doc' => set_value('otros_doc'),
            'ipropietario' => '1',
            'tipopersona' => '1',
            'domisiliosino' => '2',
            'morine' => set_value('morine'),
            'fisrfc' => set_value('fisrfc'),
            'numext' => set_value('numext'),
            'numint' => set_value('numint'),
            'numeronotificacionedpint' => set_value('numeronotificacionedpint'),
            'clave' => set_value('clave'),
            'cartapoder' => set_value('cartapoder'),
            'predialso' => set_value('predialso'),
            'compraventa' => set_value('compraventa'),
            'imuvii' => set_value('imuvii'),
            'doctoacta' => set_value('doctoacta'),
            'porcionp' => set_value('porcionp'),
            'valido_pago' => set_value('valido_pago'),
        );
        $user_id = $this->session->userdata('id');
        $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
        $data['INE'] = $INE;
        $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
        $data['predial'] = $predial;
        $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
        $data['noficial'] = $noficial;
        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form', $data);
    }

    public function create_action() {
        if ($this->input->server('REQUEST_METHOD') == 'POST'):
            $maxnum = $this->Claves_catastrales_individual_cetificado_model->getMaxItemByid();
            $maxnumbd = $maxnum[0]->maximo;
            if (empty($maxnumbd)) {
                $maxnumbd = 1;
            } else {
                $maxnumbd = $maxnumbd + 1;
            }

            $this->load->library('email');
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $config['protocol'] = 'smtp';
            $config['smtp_port'] = '25';
            $config['smtp_host'] = '192.168.1.203';
            $config['smtp_user'] = 'vuira';
            $config['smtp_pass'] = 'Irapuato.2018';
            $config['mailtype'] = 'html';


            //Tamaño Maximo de los Archivos 20 Megas


            $config1['upload_path'] = './assets/tramites/clavescatastralesindividualcertificado/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '1000000';
            $config1['max_width'] = '1024000';
            $config1['max_height'] = '768000';

            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            $numero = $this->contador();
            $data = array(
                'numerotitulo' => $this->input->post('numerotitulo', TRUE),
                'calleui' => $this->input->post('calleui', TRUE),
                'cbocomunidad' => $this->input->post('cbocomunidad', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'zonaloteparcela' => $this->input->post('zonaloteparcela', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'nombreresolicitante' => $this->input->post('nombreresolicitante', TRUE),
                'callenotificacionesdp' => $this->input->post('callenotificacionesdp', TRUE),
                'numeronotificacionedp' => $this->input->post('numeronotificacionedp', TRUE),
                'colonianotificacionesdp' => $this->input->post('colonianotificacionesdp', TRUE),
                'correonotificacionesdp' => $this->input->post('correonotificacionesdp', TRUE),
                'telefononotificacionesdp' => $this->input->post('telefononotificacionesdp', TRUE),
                'tipotramitedp' => $this->input->post('tipotramitedp', TRUE),
                'motivotramitedp' => $this->input->post('motivotramitedp', TRUE),
                'usuarioID' => $this->session->userdata('id'),
                'status' => "1",
                'notificacion' => "0",
                'numext' => $this->input->post('numext', TRUE),
                'numint' => $this->input->post('numint', TRUE),
                'numeronotificacionedpint' => $this->input->post('numeronotificacionedpint', TRUE),
//            'fechainicio' => date("Y-m-d"),
                'nocontrol' => $numero,
                'porcionp' => $this->input->post('porcionp', TRUE),
            );

            if ($this->session->userdata('tipo') == 15) {
                $imuvii = $this->input->post('imuvii') != "" ? "1" : "0";
                $data['status'] = '2';
                $data['imuvii'] = $imuvii;
                $data['control'] = $this->input->post('control', TRUE);
            } else {
                $data['notificacion'] = 1;
            }

            if ($this->input->post('tipopersonafi') != "") {
                $data['tipopersona'] = '2';
            } else if ($this->input->post('tipopersonamo') != "") {
                $data['tipopersona'] = '1';
            }

            if ($this->input->post('ipropietariosi') != "") {
                $data['ipropietario'] = '1';
            } else if ($this->input->post('ipropietariono') != "") {
                $data['ipropietario'] = '2';
            }

            if ($this->input->post('domisiliosi') != "") {
                $data['domisiliosino'] = '1';
            } else if ($this->input->post('domisiliono') != "") {
                $data['domisiliosino'] = '2';
            }

            $maxnumbd = $this->Claves_catastrales_individual_cetificado_model->insert($data);
            $data = array();
//$maxnumbd = 'a';
            if (!empty($_FILES['otradoc']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['otradoc']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-otradoc' . $ext;

                $_FILES['otradoc']['name'] = $nine;

                if (!$this->upload->do_upload('otradoc')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['otradoc'] = $nine;
                }
            } else {
                $data['otradoc'] = "";
            }
//          die(print_r($_FILES,true));
            if (!empty($_FILES['doctopredial']['tmp_name'])) {

                $ext = "";
                switch ($_FILES['doctopredial']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-doctopredial' . $ext;

                $_FILES['doctopredial']['name'] = $nine;

                if (!$this->upload->do_upload('doctopredial')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['doctopredial'] = $nine;
                }
            } else {
                $data['doctopredial'] = "";
            }

            $variablefile = $_FILES;
            if ($_FILES['doctoine']['tmp_name'][0] != "") {
//              die(print_r(count($_FILES['doctoine']['tmp_name']),true));
                $numfiles = count($_FILES['doctoine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-doctoine.zip')) {
                    $data['doctoine'] = "file-" . $maxnumbd . "-doctoine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctoine'] = "";
            }
//    die(print_r($_FILES,true));
//        //Para subir archivos ine
            if (!empty($_FILES['morine']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['morine']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-morine' . $ext;

                $_FILES['morine']['name'] = $nine;

                if (!$this->upload->do_upload('morine')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['morine'] = $nine;
                }
            } else {
                $data['morine'] = "";
            }

            if (!empty($_FILES['cartapoder']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['cartapoder']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-cartapoder' . $ext;

                $_FILES['cartapoder']['name'] = $nine;

                if (!$this->upload->do_upload('cartapoder')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['cartapoder'] = $nine;
                }
            } else {
                $data['cartapoder'] = "";
            }
//        //subirarchivos     
//        //Para subir archivos predialso

            if (!empty($_FILES['predialso']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['predialso']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-predialso' . $ext;

                $_FILES['predialso']['name'] = $nine;

                if (!$this->upload->do_upload('predialso')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['predialso'] = $nine;
                }
            } else {
                $data['predialso'] = "";
            }
//        //subirarchivos 
//        //Para subir archivos compraventa
            if (!empty($_FILES['compraventa']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['compraventa']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-compraventa' . $ext;

                $_FILES['compraventa']['name'] = $nine;

                if (!$this->upload->do_upload('compraventa')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['compraventa'] = $nine;
                }
            } else {
                $data['compraventa'] = "";
            }
            //subirarchivos 
            if ($_FILES['doctotitulo']['tmp_name'][0] != "") {
                $numfiles = count($_FILES['doctotitulo']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctotitulo']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctotitulo']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-doctotitulo.zip')) {
                    $data['doctotitulo'] = "file-" . $maxnumbd . "-doctotitulo.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            } else {
                $data['doctotitulo'] = "";
            }
            if (!empty($_FILES['docacta']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['docacta']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-docacta' . $ext;

                $_FILES['docacta']['name'] = $nine;

                if (!$this->upload->do_upload('docacta')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['docacta'] = $nine;
                }
            } else {
                $data['docacta'] = "";
            }

            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
            $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');
            $email = array(
                'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual Trámite con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();


            $this->Claves_catastrales_individual_cetificado_model->update($maxnumbd, $data);

//            die(print_r($data,true));
            $this->session->set_flashdata('correcto', 'Su solicitud de Clave Catastral Certificada ha sido registrada con éxito un Funcionario dara revisión y le notificara via correo electrónico');
            if ($this->session->userdata('tipo') === 3 || $this->session->userdata('tipo') == 4) {
                redirect(base_url('claves_catastrales_individual_cetificado'));
            } else {
                redirect(base_url('claves_catastrales_individual_cetificado/update/' . $maxnumbd));
            }
        else:
            redirect(base_url('infotramites/info_atencion_de_claves_catastrales_individual'));
        endif;
    }

    public function update($id) {
        $result = $this->Colonias_model->getcolonias();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id($id);
        }

        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Guardar',
                'action' => site_url('claves_catastrales_individual_cetificado/update_action'),
                'ID' => set_value('ID', $row->ID),
                'numerotitulo' => set_value('numerotitulo', $row->numerotitulo),
                'calleui' => set_value('calleui', $row->calleui),
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'zonaloteparcela' => set_value('zonaloteparcela', $row->zonaloteparcela),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctotitulo' => set_value('doctotitulo', $row->doctotitulo),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID), 'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'numext' => set_value('numext', $row->numext),
                'numint' => set_value('numint', $row->numint),
                'numeronotificacionedpint' => set_value('numeronotificacionedpint', $row->numeronotificacionedpint),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'clave' => set_value('clavecat', $row->clavecat),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'compraventa' => set_value('compraventa', $row->compraventa),
                'docacta' => set_value('docacta', $row->docacta),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'imuvii' => set_value('imuvii', $row->imuvii),
                'porcionp' => set_value('porcionp', $row->porcionp),
                'compro' => set_value('compro', $row->compro),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'control' => set_value('control', $row->control),
            );


            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_catastrales_individual_cetificado/update_action_admin');
            } else {
                $data['action'] = site_url('claves_catastrales_individual_cetificado/update_action');
            }
            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;

            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function update_ventanilla($id) {
        $result = $this->Colonias_model->getcolonias();
        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id($id);
        }



        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Actualizar',
                'action' => site_url('claves_catastrales_individual_cetificado/update_action'),
                'ID' => set_value('ID', $row->ID),
                'numerotitulo' => set_value('numerotitulo', $row->numerotitulo),
                'calleui' => set_value('calleui', $row->calleui),
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'zonaloteparcela' => set_value('zonaloteparcela', $row->zonaloteparcela),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctotitulo' => set_value('doctotitulo', $row->doctotitulo),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID), 'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'numext' => set_value('numext', $row->numext),
                'numint' => set_value('numint', $row->numint),
                'numeronotificacionedpint' => set_value('numeronotificacionedpint', $row->numeronotificacionedpint),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'clave' => set_value('clavecat', $row->clavecat),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'compraventa' => set_value('compraventa', $row->compraventa),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'porcionp' => set_value('porcionp', $row->porcionp),
                'control' => set_value('control', $row->control),
            );

            if ($this->session->userdata('tipo') == 15) {

                $data['action'] = site_url('claves_catastrales_individual_cetificado/update_action');
            }
            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form_fun', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function update_action() {
        $this->_rulesupdate();


        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = '192.168.1.203';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
        $config['mailtype'] = 'html';

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'numerotitulo' => $this->input->post('numerotitulo', TRUE),
                'calleui' => $this->input->post('calleui', TRUE),
                'cbocomunidad' => $this->input->post('cbocomunidad', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'zonaloteparcela' => $this->input->post('zonaloteparcela', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'nombreresolicitante' => $this->input->post('nombreresolicitante', TRUE),
                'callenotificacionesdp' => $this->input->post('callenotificacionesdp', TRUE),
                'numeronotificacionedp' => $this->input->post('numeronotificacionedp', TRUE),
                'colonianotificacionesdp' => $this->input->post('colonianotificacionesdp', TRUE),
                'correonotificacionesdp' => $this->input->post('correonotificacionesdp', TRUE),
                'telefononotificacionesdp' => $this->input->post('telefononotificacionesdp', TRUE),
                'tipotramitedp' => $this->input->post('tipotramitedp', TRUE),
                'motivotramitedp' => $this->input->post('motivotramitedp', TRUE),
                'notificacion' => '1',
                'fisrfc' => $this->input->post('fisrfc', TRUE),
                'numext' => $this->input->post('numext', TRUE),
                'numint' => $this->input->post('numint', TRUE),
                'porcionp' => $this->input->post('porcionp', TRUE),
                'numeronotificacionedpint' => $this->input->post('numeronotificacionedpint', TRUE),
            );
            if ($this->input->post('tipopersonafi') != "") {
                $data['tipopersona'] = '2';
            } else if ($this->input->post('tipopersonamo') != "") {
                $data['tipopersona'] = '1';
            }

            if ($this->input->post('ipropietariosi') != "") {
                $data['ipropietario'] = '1';
            } else if ($this->input->post('ipropietariono') != "") {
                $data['ipropietario'] = '2';
            }

            if ($this->input->post('domisiliosi') != "") {
                $data['domisiliosino'] = '1';
            } else if ($this->input->post('domisiliono') != "") {
                $data['domisiliosino'] = '2';
            }
            $maxnumbd = $this->input->post('ID', TRUE);
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id($maxnumbd);
            $config1['upload_path'] = './assets/tramites/clavescatastralesindividualcertificado/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '1000000';
            $config1['max_width'] = '1024000';
            $config1['max_height'] = '768000';
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);


            if (!empty($_FILES['morine']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->morine && $row->morine != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->morine);
                }
                $ext = "";

                switch ($_FILES['morine']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-morine' . $ext;

                $_FILES['morine']['name'] = $nine;

                if (!$this->upload->do_upload('morine')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['morine'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['otradoc']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->otradoc && $row->otradoc != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->otradoc);
                }
                $ext = "";

                switch ($_FILES['otradoc']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-otradoc' . $ext;

                $_FILES['otradoc']['name'] = $nine;

                if (!$this->upload->do_upload('otradoc')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['otradoc'] = $nine;
                }
                //echo "Entra al IF";
            }


            $variablefile = $_FILES;
            if ($_FILES['doctoine']['tmp_name'][0] != "") {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctoine && $row->doctoine != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctoine);
                }
                $numfiles = count($_FILES['doctoine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-doctoine.zip')) {
                    $data['doctoine'] = "file-" . $maxnumbd . "-doctoine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['docacta']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->docacta && $row->docacta != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->docacta);
                }
                $ext = "";
                switch ($_FILES['docacta']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-docacta' . $ext;

                $_FILES['docacta']['name'] = $nine;

                if (!$this->upload->do_upload('docacta')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['docacta'] = $nine;
                }
            }
            if (!empty($_FILES['cartapoder']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->cartapoder && $row->cartapoder != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->cartapoder);
                }
                $ext = "";
                switch ($_FILES['cartapoder']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-cartapoder' . $ext;

                $_FILES['cartapoder']['name'] = $nine;

                if (!$this->upload->do_upload('cartapoder')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['cartapoder'] = $nine;
                }
            }
            //subirarchivos     
            //Para subir archivos predialso
            if (!empty($_FILES['predialso']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->predialso && $row->predialso != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->predialso);
                }
                $ext = "";
                switch ($_FILES['predialso']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-predialso' . $ext;

                $_FILES['predialso']['name'] = $nine;

                if (!$this->upload->do_upload('predialso')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['predialso'] = $nine;
                }
            }
            //subirarchivos 
            //Para subir archivos compraventa
            if (!empty($_FILES['compraventa']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->compraventa && $row->compraventa != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->compraventa);
                }
                $ext = "";
                switch ($_FILES['compraventa']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-compraventa' . $ext;

                $_FILES['compraventa']['name'] = $nine;

                if (!$this->upload->do_upload('compraventa')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['compraventa'] = $nine;
                }
            }
            //subirarchivos 



            if ($_FILES['doctotitulo']['tmp_name'][0] != "") {
                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctotitulo && $row->doctotitulo != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctotitulo);
                }
                $numfiles = count($_FILES['doctotitulo']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctotitulo']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctotitulo']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-doctotitulo.zip')) {
                    $data['doctotitulo'] = "file-" . $maxnumbd . "-doctotitulo.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopredial']['tmp_name'])) {

                if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctopredial && $row->doctopredial != "")) {
                    unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctopredial);
                }
                $ext = "";
                switch ($_FILES['doctopredial']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";
                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                };
                $nine = 'file-' . $maxnumbd . '-doctopredial' . $ext;
                $_FILES['doctopredial']['name'] = $nine;

//        die(print_r(!$this->upload->do_upload('doctotitulo'),true));
                if (!$this->upload->do_upload('doctopredial')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {

                    $data1 = array('upload_data' => $this->upload->data());
                    $data['doctopredial'] = $nine;
                }
            }



            $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
            $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');
            $email = array(
                'contenido' => 'Los datos del trámite Autorización y Atención de Clave Catastral Individual Trámite con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

            $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);

            $this->session->set_flashdata('correcto', 'Su trámite ha sido modificado de manera correcta');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function update_action_admin() {
        $this->_rulesupdate();


        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = '192.168.1.203';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
        $config['mailtype'] = 'html';



        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $S = $this->input->post('otros_doc') != "" ? "1" : "0";
            $data = array(
                'mensaje' => $this->input->post('mensaje', TRUE),
                'status' => $this->input->post('status', TRUE),
                'nocontrol' => $this->input->post('nocontrol', TRUE),
                'notificacion' => "0",
                'otros_doc' => $S,
                'calleui' => $this->input->post('calleui', TRUE),
                'cbocomunidad' => $this->input->post('cbocomunidad', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'zonaloteparcela' => $this->input->post('zonaloteparcela', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'numext' => $this->input->post('numext', TRUE),
                'numint' => $this->input->post('numint', TRUE),
                'porcionp' => $this->input->post('porcionp', TRUE),
                'control' => $this->input->post('control', TRUE),
            );
            if ($this->input->post('clave', TRUE)) {
                $data['clave'] = $this->input->post('clave', TRUE);
                $data['clavecat'] = $this->input->post('clave', TRUE);
            }
            $maxnumbd = $this->input->post('ID', TRUE);


            if ($this->input->post('status', TRUE) >= 5) {
                $data['fechafinal'] = date("Y-m-d");
            }

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config1['max_size'] = '1000000';
            $config1['max_width'] = '1024000';
            $config1['max_height'] = '768000';
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;

            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctofinal']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctofinal']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctofinal']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctofinal']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividualcertificado/file-' . $maxnumbd . '-doctofinal.zip')) {
                    $data['doctofinal'] = "file-" . $maxnumbd . "-doctofinal.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if ($this->input->post('status', TRUE) == 6) {
                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');
                $email = array(
                    'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual Trámite con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', ha terminado con éxito.<br>' . $this->input->post('mensaje', TRUE) . ' '
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();

                $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'El trámite se ha termindado con éxito');
                redirect(site_url('claves_catastrales_individual'));
            } else if ($this->input->post('status', TRUE) == 2) {
                $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($this->input->post('ID', TRUE));
                if ($row->fechainicio != "") {
                    $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                    $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                    $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');
                    $email = array(
                        'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual Trámite con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', ha sido aprobada y se encuentra en revisión de información.'
                    );
                    $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                    $this->email->message($body);
                    $this->email->send();

                    $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
                    $this->session->set_flashdata('correcto', 'El trámite se encuentra ahora en en revisión de información');
                    redirect(site_url('claves_catastrales_individual'));
                } else {
                    $data['status'] = "1";
                    $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
                    $this->session->set_flashdata('correcto', 'Por favor genere primero el talón para indicar la fecha de inicio del trámite');
                    redirect(site_url('claves_catastrales_individual'));
                }
            } else {
                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');
                $email = array(
                    'contenido' => 'En su solicitud del trámite Autorización y Atención de Clave Catastral Individual Trámite con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . '.<br> Favor de realizar los cambios correspondientes para continuar con el trámite.'
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();

                $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Acciones Realizadas con Éxito');
                redirect(site_url('claves_catastrales_individual'));
            }
            $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'El trámite se modifico de manera correcta'); //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('claves_catastrales_individual_cetificado'));
        }
    }

    public function delete($id) {
        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id($id);

        if ($row) {
            $this->Claves_catastrales_individual_cetificado_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('claves_catastrales_individual_cetificado'));
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual_cetificado'));
        }
    }

    public function _rules() {

        $this->form_validation->set_rules('calleui', 'calleui', 'trim|required');
        $this->form_validation->set_rules('cbocomunidad', 'cbocomunidad', 'trim|required');
        $this->form_validation->set_rules('noloteui', 'noloteui', 'trim|required');
        $this->form_validation->set_rules('nomanzanaui', 'nomanzanaui', 'trim|required');
        $this->form_validation->set_rules('zonaloteparcela', 'zonaloteparcela', 'trim|required');
        $this->form_validation->set_rules('mapa', 'mapa', 'trim|required');
        $this->form_validation->set_rules('nombrepropietariodp', 'nombrepropietariodp', 'trim|required');
        $this->form_validation->set_rules('nombreresolicitante', 'nombreresolicitante', 'trim|required');
        $this->form_validation->set_rules('callenotificacionesdp', 'callenotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('numeronotificacionedp', 'numeronotificacionedp', 'trim|required');
        $this->form_validation->set_rules('colonianotificacionesdp', 'colonianotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('correonotificacionesdp', 'correonotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('telefononotificacionesdp', 'telefononotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('tipotramitedp', 'tipotramitedp', 'trim|required');
        $this->form_validation->set_rules('motivotramitedp', 'motivotramitedp', 'trim|required');
        $this->form_validation->set_rules('doctoine', 'doctoine', 'trim|required');
        $this->form_validation->set_rules('doctolegalpropiedad', 'doctolegalpropiedad', 'trim|required');
        $this->form_validation->set_rules('doctotitulo', 'doctotitulo', 'trim|required');
        $this->form_validation->set_rules('doctopago', 'doctopago', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_rules('ID', 'ID', 'trim');
        ;
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesupdate() {

        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function tramite() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/tramite?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/tramite?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/tramite';
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/tramite';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_tramites($q);

        $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_tramites($config['per_page'], $start, $q);
        $resultq = $this->Usuarios_model->get_usuarios();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_certificado_data' => $claves_catastrales_individual_cetificado,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq
        );

        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_tramite', $data);
    }

    public function reasignar() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/reasignar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/reasignar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/reasignar';
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/reasignar';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_tramites_reasigna($q);

        $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_tramites_reasigna($config['per_page'], $start, $q);
        $resultq = $this->Usuarios_model->get_usuarios();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_certificado_data' => $claves_catastrales_individual_cetificado,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq
        );

        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_tramite_1', $data);
    }

    public function asignar_funca() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);

        foreach ($id as $i) {
            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
                'status' => "3",
            );


            $this->Claves_catastrales_individual_cetificado_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }

        redirect(site_url('claves_catastrales_individual_cetificado/tramite'));
    }

    public function asignar_funca1() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);

        foreach ($id as $i) {
            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
            );


            $this->Claves_catastrales_individual_cetificado_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }

        redirect(site_url('claves_catastrales_individual_cetificado/tramite'));
    }

    public function asigna() {



        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/asigna?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/asigna?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/asigna';
            $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/asigna';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_asinacion($q);

        $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_asinacion($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_cetificado_data' => $claves_catastrales_individual_cetificado,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );



        //die(print_r($data, TRUE));
        $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_asignacion', $data);
    }

    public function clave($id) {
        $result = $this->Colonias_model->getcolonias();

        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);


        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Guardar',
                'ID' => set_value('ID', $row->ID),
                'numerotitulo' => set_value('numerotitulo', $row->numerotitulo),
                'calleui' => set_value('calleui', $row->calleui),
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'zonaloteparcela' => set_value('zonaloteparcela', $row->zonaloteparcela),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctotitulo' => set_value('doctotitulo', $row->doctotitulo),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID), 'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'numext' => set_value('numext', $row->numext),
                'numint' => set_value('numint', $row->numint),
                'numeronotificacionedpint' => set_value('numeronotificacionedpint', $row->numeronotificacionedpint),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'clave' => set_value('clavecat', $row->clavecat),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'compraventa' => set_value('compraventa', $row->compraventa),
                'predialso' => set_value('predialso', $row->predialso),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'imuvii' => set_value('imuvii', $row->imuvii),
                'autocat' => set_value('autocat', $row->autocat),
                'docacta' => set_value('docacta', $row->docacta),
                'porcionp' => set_value('porcionp', $row->porcionp),
                'caracter' => set_value('caracter', $row->caracter),
                'copro' => set_value('copro', $row->copro),
                'noescri' => set_value('noescri', $row->noescri),
                'fechaesc' => set_value('fechaesc', $row->fechaesc),
                'supsiac' => set_value('supsiac', $row->supsiac),
                'supciact' => set_value('supciact', $row->supciact),
                'notario' => set_value('notario', $row->notario),
                'nonotario' => set_value('nonotario', $row->nonotario),
                'estado' => set_value('estado', $row->estado),
                'ciudad' => set_value('ciudad', $row->ciudad),
                'observaciones' => set_value('observaciones', $row->observaciones),
                'areap' => set_value('areap', $row->areap),
                'areapt' => set_value('areapt', $row->areapt),
                'areac' => set_value('areac', $row->areac),
                'areact' => set_value('areact', $row->areact),
                'acc' => set_value('acc', $row->acc),
                'acct' => set_value('acct', $row->acct),
                'acd' => set_value('acd', $row->acd),
                'acdt' => set_value('acdt', $row->acdt),
                'totalind' => set_value('totalind', $row->totalind),
                'totalindt' => set_value('totalindt', $row->totalindt),
                'porcent' => set_value('porcent', $row->porcent),
                'porcentt' => set_value('porcentt', $row->porcentt),
                'nooficio' => set_value('nooficio', $row->nooficio),
                'clave' => set_value('clave', $row->clave),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'control' => set_value('control', $row->control),
                'delegado' => set_value('control', $row->delegado)
            );



            $data['action'] = site_url('claves_catastrales_individual_cetificado/update_action_clave');

            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;

            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual_cetificado'));
        }
    }

    public function update_action_clave() {
        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {

            $maxnumbd = $this->input->post('ID');

            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_admin($maxnumbd);
            if ($row->status <= 3) {
                $data = array(
                    'calleui' => $this->input->post('calleui', TRUE),
                    'cbocomunidad' => $this->input->post('cbocomunidad', TRUE),
                    'noloteui' => $this->input->post('noloteui', TRUE),
                    'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                    'zonaloteparcela' => $this->input->post('zonaloteparcela', TRUE),
                    'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                    'numext' => $this->input->post('numext', TRUE),
                    'numint' => $this->input->post('numint', TRUE),
                    'porcionp' => $this->input->post('porcionp', TRUE),
                );
            } else {
                $data = array(
                );
            }

            $config1['upload_path'] = './assets/tramites/clavescatastralesindividualcertificado/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '1000000';
            $config1['max_width'] = '1024000';
            $config1['max_height'] = '768000';
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);

            if (!empty($_FILES['autocat']['tmp_name'])) {
                if ($row->autocat) {
                    if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->autocat)) {
                        unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->autocat);
                    }
                }
                $ext = "";

                switch ($_FILES['autocat']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                    case 'application/octet-stream':

                        $ext = ".dwg";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-autocat' . $ext;

                $_FILES['autocat']['name'] = $nine;

                if (!$this->upload->do_upload('autocat')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['autocat'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['doctofinal']['tmp_name'])) {
                if ($row->doctofinal) {
                    if (is_readable("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctofinal)) {
                        unlink("./assets/tramites/clavescatastralesindividualcertificado/" . $row->doctofinal);
                    }
                }
                $ext = "";

                switch ($_FILES['doctofinal']['type']) {
                    case 'image/jpeg':
                        $ext = ".jpeg";

                        break;
                    case 'image/jpg':
                        $ext = ".jpg";
                        break;
                    case 'image/png':
                        $ext = ".png";
                        break;
                    case 'application/pdf':
                        $ext = ".pdf";
                        break;
                    case 'application/octet-stream':

                        $ext = ".dwg";
                        break;
                }

                $nine = 'file-' . $maxnumbd . '-doctofinal' . $ext;

                $_FILES['doctofinal']['name'] = $nine;

                if (!$this->upload->do_upload('doctofinal')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['doctofinal'] = $nine;
                }
                //echo "Entra al IF";
            }
            $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_admin($maxnumbd);
            if ($row->doctofinal != "" && $row->doctopago != "" && $row->autocat != "") {
                $this->load->library('email');
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $config['protocol'] = 'smtp';
                $config['smtp_port'] = '25';
                $config['smtp_host'] = '192.168.1.203';
                $config['smtp_user'] = 'vuira';
                $config['smtp_pass'] = 'Irapuato.2018';
                $config['mailtype'] = 'html';

//                    $up = array('upload_data' => $this->upload->data());
//                    $data['doctofinal'] = $nine;
                $data['status'] = "4";
                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');
                $email = array(
                    'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual Trámite con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', Se encuentra en espera de Autorización.'
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();
                $this->session->set_flashdata('correcto', 'El Trámite se encuenta espera de validación');
            } else {
                $documentos = "";
                if ($row->doctofinal == "") {
                    $documentos = $documentos . "Documento Final, ";
                }
                if ($row->doctopago == "") {
                    $documentos = $documentos . "Documento Orden de pago, ";
                }
                if ($row->autocat == "") {
                    $documentos = $documentos . "Documento AutoCAD ";
                }

                $this->session->set_flashdata('correcto', 'El Trámite se actualizo con éxito pero falta de generar ' . $documentos . ' para continuar con el trámite');

//                $this->session->set_flashdata('correcto', 'El Trámite se actualizo pero aun falta por generar algún documento');
            }


            if ($this->input->post('mensaje', TRUE) != "") {
                $this->load->library('email');
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $config['protocol'] = 'smtp';
                $config['smtp_port'] = '25';
                $config['smtp_host'] = '192.168.1.203';
                $config['smtp_user'] = 'vuira';
                $config['smtp_pass'] = 'Irapuato.2018';
                $config['mailtype'] = 'html';


                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica.');

                $email = array(
                    'contenido' => 'En su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . ' favor de realizar los cambios correspondientes para continuar con el trámite.'
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();
            }
            $this->Claves_catastrales_individual_cetificado_model->update($this->input->post('ID', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('claves_catastrales_individual/asigna'));
        }
    }

    public function validar() {
        if ($this->session->userdata('admin') == 2):
            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('Inicio'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/validar/?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/validar/?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/validar/';
                $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/validar/';
            }

            $config['per_page'] = 20;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_validaciones($q);

            $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_validaciones($config['per_page'], $start, $q);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'claves_catastrales_individual_cetificado' => $claves_catastrales_individual_cetificado,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );


            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_validar', $data);

        else:
            show_404();
        endif;
    }

    public function autorizar() {
        if ($this->session->userdata('admin') == 1):
            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('Inicio'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/autorizar/?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/autorizar/?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_individual_cetificado/autorizar/';
                $config['first_url'] = base_url() . 'claves_catastrales_individual_cetificado/autorizar/';
            }

            $config['per_page'] = 20;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Claves_catastrales_individual_cetificado_model->total_rows_autorizar($q);

            $claves_catastrales_individual_cetificado = $this->Claves_catastrales_individual_cetificado_model->get_autorizar($config['per_page'], $start, $q);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'claves_catastrales_individual_cetificado' => $claves_catastrales_individual_cetificado,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );


            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_autorizar', $data);

        else:
            show_404();
        endif;
    }

    public function validar_tram($id) {

        $result = $this->Colonias_model->getcolonias();

        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);
//        die(var_dump($resultq));
        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Validar Trámite',
                'ID' => set_value('ID', $row->ID),
                'numerotitulo' => set_value('numerotitulo', $row->numerotitulo),
                'calleui' => set_value('calleui', $row->calleui),
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'zonaloteparcela' => set_value('zonaloteparcela', $row->zonaloteparcela),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctotitulo' => set_value('doctotitulo', $row->doctotitulo),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID), 'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'numext' => set_value('numext', $row->numext),
                'numint' => set_value('numint', $row->numint),
                'numeronotificacionedpint' => set_value('numeronotificacionedpint', $row->numeronotificacionedpint),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'clave' => set_value('clavecat', $row->clavecat),
                'compraventa' => set_value('compraventa', $row->compraventa),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );

//     $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);
//            die(print_r($resultq,true));
            $data['func'] = $resultq;

            $data['action'] = site_url('claves_catastrales_individual_cetificado/validar_tram_action');

            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;

            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form_autorizacion', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual_cetificado/validar'));
        }
    }

    public function validar_tram_action() {

        $data = array(
            'validacion' => 1,
        );

        $i = $this->input->post('ID');
        $this->Claves_catastrales_individual_cetificado_model->update($i, $data);
        $this->session->set_flashdata('correcto', 'El Támite se valido de manera correcta');
        redirect(site_url('claves_catastrales_individual/validar'));
    }

    public function autorizar_tram($id) {
//            die();
        $result = $this->Colonias_model->getcolonias();

        $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
        $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);
//        die(var_dump($resultq));
        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Autorizar Trámite',
                'ID' => set_value('ID', $row->ID),
                'numerotitulo' => set_value('numerotitulo', $row->numerotitulo),
                'calleui' => set_value('calleui', $row->calleui),
                'cbocomunidad' => set_value('cbocomunidad', $row->cbocomunidad),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'zonaloteparcela' => set_value('zonaloteparcela', $row->zonaloteparcela),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctotitulo' => set_value('doctotitulo', $row->doctotitulo),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID), 'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'numext' => set_value('numext', $row->numext),
                'numint' => set_value('numint', $row->numint),
                'numeronotificacionedpint' => set_value('numeronotificacionedpint', $row->numeronotificacionedpint),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'clave' => set_value('clavecat', $row->clavecat),
                'compraventa' => set_value('compraventa', $row->compraventa),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );

//     $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);
//            die(print_r($resultq,true));
            $data['func'] = $resultq;

            $data['action'] = site_url('claves_catastrales_individual_cetificado/autorizar_tram_action');

            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;

            $this->load->view('claves_catastrales_individual_cetificado/claves_catastrales_individual_cetificado_form_autorizacion', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual_cetificado/validar'));
        }
    }

    public function autorizar_tram_action() {

        $data = array(
            'autorizacion' => 1,
            'notificacion' => 0,
        );

        $i = $this->input->post('ID');
        $this->Claves_catastrales_individual_cetificado_model->update($i, $data);
        $this->session->set_flashdata('correcto', 'El Támite se autorizo de manera correcta');
        redirect(site_url('claves_catastrales_individual/autorizar'));
    }

    public function vistapa($id = null) {
        if ($id == null) {

            $id = $this->input->post('ID');
            if ($id != "") {
                $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
                $fecha = date("Y-m-d", strtotime("" . $this->input->post('fecha_ini')));
                $fecha1 = date("Y-m-d H:i", strtotime("" . $this->input->post('fecha_exp') . "T" . $this->input->post('hora')));

                $data = array(
                    'fechainicio' => $fecha,
                    'fechafinal' => $fecha1
                );
                $this->Claves_catastrales_individual_cetificado_model->update($id, $data);

                $data['propietario'] = $row->nombrepropietariodp;
                $data['orden'] = $row->nocontrol;
                $data['tipotramite'] = $row->tipotramitedp;

                $html = $this->load->view('claves_catastrales_individual/talon', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
//        $pdfFilePath = "claves_catastrales_" . $id . ".pdf";
                $this->load->library('M_pdf');
                $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
                $this->m_pdf->pdf->Output();
            } else {
                show_404();
            }
        } else {

            $row = $this->Claves_catastrales_individual_cetificado_model->get_by_id_administrador($id);
            $data = array(
                'fechainicio' => date("Y-m-d H:i", strtotime("" . $row->fechainicio)),
                'fechafinal' => date("Y-m-d H:i", strtotime("" . $row->fechafinal)),
            );

//            die(print_r($row));
            $data['propietario'] = $row->nombrepropietariodp;
            $data['orden'] = $row->nocontrol;
            $data['tipotramite'] = $row->tipotramitedp;

            $html = $this->load->view('claves_catastrales_individual/talon', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
//        $pdfFilePath = "claves_catastrales_" . $id . ".pdf";
            $this->load->library('M_pdf');
            $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
            $this->m_pdf->pdf->Output();
        }
    }

    public function vpago($id = null) {
        if ($id) {

            if ($this->session->userdata('tipo') == 1000) {
                $data = array(
                    'valido_pago' => 1,
                    'notificacion' => 1,
                );
                $this->Claves_catastrales_individual_cetificado_model->update($id, $data);
                redirect(base_url('vista_pago'));
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

}

/* End of file Claves_catastrales_individual_cetificado.php */
/* Ubicacion: ./application/controllers/Claves_catastrales_individual_cetificado.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-06-12 08:57:05 */
/* http://www.ga-asociados.com */
