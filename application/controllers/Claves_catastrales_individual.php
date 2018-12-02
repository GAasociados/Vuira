<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claves_catastrales_individual extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Claves_catastrales_individual_model');
        $this->load->model('Claves_catastrales_individual_cetificado_model');
        $this->load->model('Claves_catastrales_fraccionamiento_model');
        $this->load->library('form_validation');
        $this->load->library('zip');
        $this->load->model('Colonias_model');
        $this->load->model('Calles_japami_model');
        $this->load->model('Usuarios_model');
        $this->load->model("Ccbd_model");
    }

    public function menu_pago() {
//   
//        $claves_catastrales_fraccionamiento = $this->Claves_catastrales_fraccionamiento_model->get_limit_data_pagos();
//
//        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_limit_data_pagos();
//
//        $claves_catastrales_individual_certificado = $this->Claves_catastrales_individual_cetificado_model->get_limit_data_pagos();
//        $data = array(
//            'claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
//            'claves_catastrales_individual_data' => $claves_catastrales_individual,
//            'claves_catastrales_individual_certificado_data' => $claves_catastrales_individual_certificado,
//        );

        $this->load->view('menu_pago');
    }

    public function not() {
        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->tonot();

        echo $claves_catastrales_individual[0]->cantidad;
    }

    public function vista_pago() {
//   
        $claves_catastrales_fraccionamiento = $this->Claves_catastrales_fraccionamiento_model->get_limit_data_pagos();

        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_limit_data_pagos();

        $claves_catastrales_individual_certificado = $this->Claves_catastrales_individual_cetificado_model->get_limit_data_pagos();
        $data = array(
            'claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'claves_catastrales_individual_certificado_data' => $claves_catastrales_individual_certificado,
        );

        $this->load->view('ventana_pago', $data);
    }

    function predial() 
    {
        $predial = $this->input->post('predial');
        require_once(APPPATH . 'libraries/lib/nusoap.php'); //includes nusoap
        $cliente = new nusoap_client("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", true);


        //Use basic authentication method
        $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");

        $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '' . $predial);
        $cliente->soap_defencoding = 'UTF-8';
        $cliente->decode_utf8 = false;
        $respuesta = $cliente->call("Consulta", $parametros);//JSON

        //$respuesta = $cliente->call("Copropietarios", $parametros);//JSON Copropietarios

        $respuesta = json_decode($respuesta, true); //Decodificas JSON
        if ($respuesta) {
        //            echo json_encode($respuesta);
            if (isset($respuesta['COLONIA_ID'])) {
                $respuesta['COLONIA_ID'] = ltrim($respuesta['COLONIA_ID'], '0');
                $respuesta['COLONIA_ID'] = trim($respuesta['COLONIA_ID']);
            }
            if (isset($respuesta['CALLE_ID'])) {
                $respuesta['CALLE_ID'] = ltrim($respuesta['CALLE_ID'], '0');
                $respuesta['CALLE_ID'] = trim($respuesta['CALLE_ID']);

                $CALLE = $this->Calles_japami_model->getcallepredialbyid($respuesta['CALLE_ID']);

                IF ($CALLE):
                    $respuesta['CALLE_ID'] = $CALLE->nombre;
                ELSE:
                    $respuesta['CALLE_ID'] = "";
                endif;
            }
            $respuesta['NO_EXTERIOR'] = ltrim($respuesta['NO_EXTERIOR'], '0');
            $respuesta['NO_EXTERIOR'] = trim($respuesta['NO_EXTERIOR']);
            $respuesta['TIPO_PREDIO_ID'] = ltrim($respuesta['TIPO_PREDIO_ID'], '0');
            $respuesta['TIPO_PREDIO_ID'] = trim($respuesta['TIPO_PREDIO_ID']);
            echo json_encode($respuesta);
        }
        else {
            echo json_encode(0);
        }
    }

    public function copropsfull() 
    {
        $predial = $this->input->post('predial');

        require_once(APPPATH . 'libraries/lib/nusoap.php'); //includes nusoap
        $cliente = new nusoap_client("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", true);
        $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");

        $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '' . $predial);
        $cliente->soap_defencoding = 'UTF-8';
        $cliente->decode_utf8 = false;
        //$respuesta = $cliente->call("Consulta", $parametros);//JSON
        $respuesta = $cliente->call("Copropietarios", $parametros);//JSON Copropietarios

            //$respuesta = json_decode($respuesta, true); //Decodificas JSON
        if ($respuesta) 
        {
            $respuesta = json_decode($respuesta);
            $data = [];
            for($i = 0; $i < count($respuesta); $i++)
            {
                $data[$i] = $respuesta[$i]->NOMBRE . " " . $respuesta[$i]->APELLIDO_PATERNO . " " . $respuesta[$i]->APELLIDO_MATERNO;
            }
            print_r(json_encode($data));
        }
        else 
        {
            echo json_encode(0);
        }
    }

    

    public function predials() {

        $cliente = new SoapClient("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", array("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic"));
//        $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");
        $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '14M008063001');
        $respuesta = $cliente->__call("Consulta", $parametros);

        $respuesta = json_decode($respuesta, true);

        if ($respuesta) {
            foreach ($respuesta as $clave => $value) {
                echo $clave . " = " . $value . "<br>";
            }
            if (is_null($respuesta['COSTO_M2'])) {
                echo "<h1>ES NULL</h1>";
            } else {
                echo "<h1>" . $respuesta['COSTO_M2'] . "</h1>";
            }
        }
        //Use basic authentication method
//        $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");
//        var_dump($cliente->__getFunctions());
//        $CLAVE = $this->input->post('predial');
//
//        $datos = $this->Ccbd_model->get_all_data($CLAVE);
//        if ($datos) {
//            if (isset($datos->COLONIA_ID)) {
//                $datos->COLONIA_ID = trim($datos->COLONIA_ID, '0');
//                $datos->COLONIA_ID = trim($datos->COLONIA_ID);
//            }
//            if (isset($datos->CALLE_ID)) {
//                $datos->CALLE_ID = trim($datos->CALLE_ID, '0');
//                $datos->CALLE_ID = trim($datos->CALLE_ID);
//
//                $CALLE = $this->Calles_japami_model->getcallebyid($datos->CALLE_ID);
//                IF ($CALLE):
//                    $datos->CALLE_ID = $CALLE->nombre;
//                ELSE:
//                    $datos->CALLE_ID = "";
//                endif;
//            }
//            $datos->NO_EXTERIOR = trim($datos->NO_EXTERIOR, '0');
//            $datos->NO_EXTERIOR = trim($datos->NO_EXTERIOR);
//            echo json_encode($datos);
//        }
//        else {
//            echo json_encode(0);
//        }
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
            $row = $this->Claves_catastrales_individual_model->get_by_id($id);
            if ($row && $row->usuarioID === $this->session->userdata('id') && $row->status === "4") {
                $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1) ");
                $pagos = $costo->result();
                $data['concepto'] = "Solicitude de pago de";
                $data['des'] = "Pago de Clave Catastral";
                $costo_tram = $pagos[0]->costo_tram + $pagos[0]->costo_base;
                $data['importe'] = "" . $costo_tram;
                $data['ref'] = "002";
                $data['id'] = "claves_catastrales_individual/update/" . $id;
                $this->load->view('pago', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function index() {

        $q = urldecode($this->input->get('q', TRUE));
        $calleui = urldecode($this->input->get('calleui', TRUE));
        $clave = urldecode($this->input->get('clave', TRUE));
        $nombre = urldecode($this->input->get('nombrepropietario', TRUE));
        $finicio = urldecode($this->input->get('fechainicio', TRUE));
        $ffin = urldecode($this->input->get('fechafinal', TRUE));
        $status = urldecode($this->input->get('status', TRUE));
        $funcio = urldecode($this->input->get('funcionario', TRUE));
        $cpred = urldecode($this->input->get('cpred', TRUE));
        $tramite = urldecode($this->input->get('tramite', TRUE));


        $start = intval($this->input->get('Inicio'));



        if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3) {

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_individual/?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/';
                $config['first_url'] = base_url() . 'claves_catastrales_individual/';
            }
        } else {
            if ($q <> '' || $calleui <> '' || $nombre <> '' || $clave <> '' || $finicio <> '' || $ffin <> '' || $status <> '' || $funcio <> '' || $cpred <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/?q=' . urlencode($q) . 'calleui=' .urlencode($calleui) . '&nombrepropietario=' . urlencode($nombre) . '&clave=' . urlencode($clave) . '&status=' . urlencode($status) . '&fechainicio=' . urlencode($finicio) . '&fechafinal=' . urlencode($ffin) . '&funcionario=' . urlencode($funcio) . '&cpred=' . urlencode($cpred) . '';
                $config['first_url'] = base_url() . 'claves_catastrales_individual/?q=' . urlencode($q) . 'calleui=' .urlencode($calleui) . '&nombrepropietario=' . urlencode($nombre) . '&clave=' . urlencode($clave) . '&status=' . urlencode($status) . '&fechainicio=' . urlencode($finicio) . '&fechafinal=' . urlencode($ffin) . '&funcionario=' . urlencode($funcio) . '&cpred=' . urlencode($cpred) . '';
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/';
                $config['first_url'] = base_url() . 'claves_catastrales_individual/';
            }
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3) {
//            die(print_r($this->Claves_catastrales_individual_model->total_rows_ventana_us($q)));
            $config['total_rows'] = $this->Claves_catastrales_individual_model->total_rows_ventana_us($q);

            $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_limit_data_ventana_us($config['per_page'], $start, $q);
        } else {

            $var = $this->Claves_catastrales_individual_model->total_rows($q, $calleui, $clave, $nombre, $finicio, $ffin, $status, $funcio, $cpred, $tramite);


            $config['total_rows'] = $var[0]->cantidad;
            $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_limit_data($config['per_page'], $start, $q, $calleui , $clave, $nombre, $finicio, $ffin, $status, $funcio, $cpred, $tramite);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $resultq = $this->Usuarios_model->get_usuarios();
        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );

        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_list', $data);
    }

    public function ventanilla() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/ventanilla/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual/ventanilla/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/ventanilla/';
            $config['first_url'] = base_url() . 'claves_catastrales_individual/ventanilla/';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $var = $this->Claves_catastrales_individual_model->total_rows_ventana($q);

        $config['total_rows'] = $var[0]->cantidad;

        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_limit_data_ventana($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_list_ventanilla', $data);
    }

    public function reportes() {
        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_reportes');
    }

    ///////VISTA PRUEBA
    public function PRUEBAU() 
    {
        $this->load->view('claves_catastrales_individual/ciudadano_c_catastral_individual');
    }
    ////VISTA PRUEBAEND

    public function reportefinal() {
        $seguimineto = $this->input->get('q', TRUE);
        $fechainicio = $this->input->get('fechainicio', TRUE);
        $fechafinal = $this->input->get('fechafinal', TRUE);
        $status = $this->input->get('status', TRUE);
        $clave = $this->input->get('clave', TRUE);
        $nombrepropietario = $this->input->get('nombrepropietario', TRUE);
        $funcionario = $this->input->get('funcionario', TRUE);
        $cpred = $this->input->get('cpred', TRUE);
        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $seguimineto, $clave, $funcionario, $cpred);

        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'seguimiento' => $this->input->get('q', TRUE),
            'fechainicio' => $this->input->get('fechainicio', TRUE),
            'fechafinal' => $this->input->get('fechafinal', TRUE),
            'status' => $this->input->get('status', TRUE),
            'nombrepropietario' => $this->input->get('nombrepropietario', TRUE),
            'clave' => $this->input->get('clave', TRUE),
            'funcionario' => $this->input->get('funcionario', TRUE),
            'cpred' => $this->input->get('cpred', TRUE),
        );


        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_reportefinal', $data);
    }

    public function reportespdf() {
        $seguimineto = $this->input->post('q', TRUE);

        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);
        $clave = $this->input->post('clave', TRUE);
        $funcionario = $this->input->post('funcionario', TRUE);
        $cpred = $this->input->post('cpred', TRUE);

        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $seguimineto, $clave, $funcionario, $cpred);
//        print_r($data);,
        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'seguimiento' => $this->input->post('seguimiento', TRUE),
            'year' => $this->input->post('year', TRUE),
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
            'clave' => $this->input->post('clave', TRUE),
            'cpred' => $this->input->post('cpred', TRUE),
        );


        $html = $this->load->view('documentos/reporteclaveindividual', $data, true);

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

    public function read($id) {
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultq = $this->Usuarios_model->get_usuarios();

        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);

        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Actualizar',
                'action' => site_url('claves_catastrales_individual/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave'),
                'compro' => set_value('compro', $row->compro),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'poder_nota' => set_value('poder_nota', $row->poder_nota),
                'acta_const' => set_value('acta_const', $row->acta_const),
                'autocat' => set_value('autocat', $row->autocat),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
                'mdocaux' => set_value('mdocaux', $row->mdocaux),
                'mdocaux1' => set_value('mdocaux1', $row->mdocaux1),
                'imuvii' => set_value('imuvii', $row->imuvii),
                'coloniados' => set_value('coloniados', $row->coloniados),
            );

            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_read', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
        }
    }

    public function generarzip($id) {
        $row = $this->Claves_catastrales_individual_model->get_by_id_admin($id);

        if ($row) {
            $data = array(
                'doctopago' => $row->doctoine,
                'doctopago' => $row->doctopago,
                'doctofinal' => $row->doctofinal,
                'doctolegalpropiedad' => $row->doctolegalpropiedad,
                'doctopredial' => $row->doctopredial,
                'predialui' => $row->predialui
            );

            //
            echo "<br>";
            $path = "./assets/tramites/clavescatastralesindividual/";
            $this->zip->read_file($path . $row->doctolegalpropiedad);
            $this->zip->read_file($path . $row->doctopredial);
            $this->zip->read_file($path . $row->doctoine);
            $this->zip->read_file($path . $row->doctopago);
            $this->zip->read_file($path . $row->doctofinal);

            //Download the file to your desktop. Name it "my_backup.zip"
            $this->zip->download($row->predialui . '.zip');
        }
    }

    public function create_ventanilla() {

        $result = $this->Colonias_model->getcoloniaspredial();
        $data = array(
            'consulta' => $result,
            'button' => 'Solicitar Trámite',
            'action' => site_url('claves_catastrales_individual/create_action'),
            'ID' => set_value('ID'),
            'calleui' => set_value('calleui'),
            'predialui' => set_value('predialui'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocoloniaui' => set_value('cbocoloniaui'),
            'categoriapredioui' => set_value('categoriapredioui'),
            'mapa' => set_value('mapa'),
            'nombrepropietariodp' => set_value('nombrepropietariodp'),
            'nombreresolicitante' => set_value('nombreresolicitante'),
            'calledp' => set_value('calledp'),
            'numerodp' => set_value('numerodp'),
            'coloniadp' => set_value('coloniadp'),
            'telefonodp' => set_value('telefonodp'),
            'callenotificacionesdp' => set_value('callenotificacionesdp'),
            'numeronotificacionedp' => set_value('numeronotificacionedp'),
            'colonianotificacionesdp' => set_value('colonianotificacionesdp'),
            'correonotificacionesdp' => set_value('correonotificacionesdp'),
            'telefononotificacionesdp' => set_value('telefononotificacionesdp'),
            'tipotramitedp' => set_value('tipotramitedp'),
            'motivotramitedp' => set_value('motivotramitedp'),
            'doctoine' => set_value('doctoine'),
            'doctolegalpropiedad' => set_value('doctolegalpropiedad'),
            'doctopredial' => set_value('doctopredial'),
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
            'nooficialinui' => set_value('nooficialinui'),
            'numeronotificacionint' => set_value('numeronotificacionint'),
            'clave' => set_value('clave'),
            'predialso' => set_value('predialso'),
            'acta_const' => set_value('acta_const'),
            'poder_nota' => set_value('poder_nota'),
            'mdocaux1' => set_value('mdocaux1'),
            'mdocaux' => set_value('mdocaux'),
            'coloniados' => set_value('coloniados'),
            'control' => set_value('control'),
        );
        $user_id = $this->session->userdata('id');

        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form_fun', $data);
    }

    public function create() {
        $result = $this->Colonias_model->getcoloniaspredial();
        $data = array(
            'consulta' => $result,
            'button' => 'Solicitar Trámite',
            'action' => site_url('claves_catastrales_individual/create_action'),
            'ID' => set_value('ID'),
            'calleui' => set_value('calleui'),
            'predialui' => set_value('predialui'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocoloniaui' => set_value('cbocoloniaui'),
            'categoriapredioui' => set_value('categoriapredioui'),
            'mapa' => set_value('mapa'),
            'nombrepropietariodp' => set_value('nombrepropietariodp'),
            'nombreresolicitante' => set_value('nombreresolicitante'),
            'calledp' => set_value('calledp'),
            'numerodp' => set_value('numerodp'),
            'coloniadp' => set_value('coloniadp'),
            'telefonodp' => set_value('telefonodp'),
            'callenotificacionesdp' => set_value('callenotificacionesdp'),
            'numeronotificacionedp' => set_value('numeronotificacionedp'),
            'colonianotificacionesdp' => set_value('colonianotificacionesdp'),
            'correonotificacionesdp' => set_value('correonotificacionesdp'),
            'telefononotificacionesdp' => set_value('telefononotificacionesdp'),
            'tipotramitedp' => set_value('tipotramitedp'),
            'motivotramitedp' => set_value('motivotramitedp'),
            'doctoine' => set_value('doctoine'),
            'doctolegalpropiedad' => set_value('doctolegalpropiedad'),
            'doctopredial' => set_value('doctopredial'),
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
            'nooficialinui' => set_value('nooficialinui'),
            'numeronotificacionint' => set_value('numeronotificacionint'),
            'clave' => set_value('clave'),
            'predialso' => set_value('predialso'),
            'acta_const' => set_value('acta_const'),
            'poder_nota' => set_value('poder_nota'),
            'cartapoder' => set_value('cartapoder'),
            'mdocaux1' => set_value('mdocaux1'),
            'mdocaux' => set_value('mdocaux'),
            'imuvii' => set_value('imuvii'),
            'coloniados' => set_value('coloniados'),
            'valido_pago' => set_value('valido_pago'),
        );
        $user_id = $this->session->userdata('id');
        $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
        $data['INE'] = $INE;
        $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
        $data['predial'] = $predial;
        $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
        $data['noficial'] = $noficial;
        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form', $data);
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


    public function create_action() {


        if ($this->input->server('REQUEST_METHOD') == 'POST'):
            $maxnum = $this->Claves_catastrales_individual_model->getMaxItemByid();
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
            
            $config['protocol'] = 'smtp';
            $config['smtp_port'] = '25';
            $config['smtp_host'] = 'correo.irapuato.gob.mx';
            $config['smtp_user'] = 'vuira';
            $config['smtp_pass'] = 'Irapuato.2018';
			$this->email->initialize($config);


            $config1['upload_path'] = './assets/tramites/clavescatastralesindividual/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '1000000';
            $config1['max_width'] = '1024000';
            $config1['max_height'] = '768000';
            $this->load->library('upload', $config1);

            $this->upload->initialize($config1);

            $numero = $this->contador();
            $data = array(
                'calleui' => $this->input->post('calleui', TRUE),
                'predialui' => $this->input->post('predialui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'supciact' => $this->input->post('sup', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'categoriapredioui' => $this->input->post('categoriapredioui', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'nombreresolicitante' => $this->input->post('nombreresolicitante', TRUE),
                /* 'calledp' => $this->input->post('calledp',TRUE),
                  'numerodp' => $this->input->post('numerodp',TRUE),
                  'coloniadp' => $this->input->post('coloniadp',TRUE),
                  'telefonodp' => $this->input->post('telefonodp',TRUE), */
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
                'tipopersona' => $this->input->post('tipopersona') != "" ? "1" : "0",
                'domisiliosino' => $this->input->post('domisiliosino') != "" ? "1" : "0",
                'nooficialinui' => $this->input->post('nooficialinui', TRUE),
                'numeronotificacionint' => $this->input->post('numeronotificacionint', TRUE),
//            'fechainicio' => $hoy,
                'numerocontrol' => "" . $numero,
                'coloniados' => $this->input->post('colonia2', TRUE),
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

            /*$data['ipropietario'] =$this->input->post('ipropietario');
            if ($this->input->post('ipropietario') == "2") {
                $data['nombreresolicitante']=$this->input->post('nombreSolicitante', TRUE);
            }*/

            if ($this->input->post('domisiliosi') != "") {
                $data['domisiliosino'] = '1';
            } else if ($this->input->post('domisiliono') != "") {
                $data['domisiliosino'] = '2';
            }



            $ID_insert = $this->Claves_catastrales_individual_model->insert($data);
            $data = array();

            $variablefile = $_FILES;

            if (!empty($_FILES['doctoine']['name'][0])) {


                $numfiles = count($_FILES['doctoine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-' . $ID_insert . '-doctoine.zip')) {
                    $data['doctoine'] = "file-" . $ID_insert . "-doctoine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctoine'] = "";
            }


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

                $nine = 'file-' . $ID_insert . '-morine' . $ext;

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

                $nine = 'file-' . $ID_insert . '-doctopredial' . $ext;

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
            //compra venta
            if (!empty($_FILES['fisrfc']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['fisrfc']['type']) {
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

                $nine = 'file-' . $ID_insert . '-fisrfc' . $ext;

                $_FILES['fisrfc']['name'] = $nine;

                if (!$this->upload->do_upload('fisrfc')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['fisrfc'] = $nine;
                }
            } else {
                $data['fisrfc'] = "";
            }

            //predial solicitante
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

                $nine = 'file-' . $ID_insert . '-predialso' . $ext;

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

            if (!empty($_FILES['doctolegalpropiedad']['name'][0])) {
                $numfiles = count($_FILES['doctolegalpropiedad']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctolegalpropiedad']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctolegalpropiedad']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-' . $ID_insert . '-doctolegalpropiedad.zip')) {
                    $data['doctolegalpropiedad'] = "file-" . $ID_insert . "-doctolegalpropiedad.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            } else {
                $data['doctolegalpropiedad'] = "";
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

                $nine = 'file-' . $ID_insert . '-cartapoder' . $ext;

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

                $nine = 'file-' . $ID_insert . '-doctopredial' . $ext;

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

                $nine = 'file-' . $ID_insert . '-otradoc' . $ext;

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

            if (!empty($_FILES['acta_const']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['acta_const']['type']) {
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

                $nine = 'file-' . $ID_insert . '-acta_const' . $ext;

                $_FILES['acta_const']['name'] = $nine;

                if (!$this->upload->do_upload('acta_const')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['acta_const'] = $nine;
                }
            } else {
                $data['acta_const'] = "";
            }
            if (!empty($_FILES['poder_nota']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['poder_nota']['type']) {
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

                $nine = 'file-' . $ID_insert . '-poder_nota' . $ext;

                $_FILES['poder_nota']['name'] = $nine;

                if (!$this->upload->do_upload('poder_nota')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['poder_nota'] = $nine;
                }
            } else {
                $data['poder_nota'] = "";
            }


            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

           /* require("phpmailer/class.phpmailer.php");
            require("phpmailer/class.smtp.php");

            $Nombre = "Nombre";
            $Apellido =  "Apellido";
            $Email = "Email";
            $Telefono = "Telefono";
            $Mensaje = "Mensaje"; 


   
            $to="cardoso.mya@gmail.com";
            $from="carlos.juarez@irapuato.gob.mx";
            $from_name="VUIRA";
            // $msg="<strong>This is a bold text.</strong>"; // HTML message
            $subject="Pruebas VUIRA";
            /*End Config*/

           /*  $bad = array("content-type","bcc:","to:","cc:","href");
        

            $email_message = "Contenido del Mensaje.\n\n";
            
            $email_message .= "Nombre: ". str_replace($bad,"",$Nombre)."\n";
 
            $email_message .= "Apellido: ".str_replace($bad,"",$Apellido)."\n";
 
            $email_message .= "Email: ".str_replace($bad,"",$Email)."\n";
 
            $email_message .= "Teléfono: ".str_replace($bad,"",$Telefono)."\n";
 
            $email_message .= "Mensaje: ".str_replace($bad,"",$Mensaje)."\n";

            
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth= true;
            $mail->Port = 465;
            $mail->Username= "vuirairapuato@gmail.com";
            $mail->Password= "vuirairap";
            $mail->SMTPSecure = 'ssl';
            $mail->From = "diegocendejas.dc@gmail.com";
            $mail->FromName= $from_name;
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $email_message ;
            $mail->addAddress($to);

            $send = $mail->Send();
            if(!$send){
             echo "Mailer Error: " . $mail->ErrorInfo;
            }else{
             echo "Gracias! Nos pondremos en contacto contigo a la brevedad.";
            }*/

            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            ///////Mensaje del Funcionario a Ciudadano///////////////
            $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to(/*$this->input->post('correonotificacionesdp', TRUE)*/'cardoso.mya@gmail.com'); //Correo del ciudadano
            $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');
            $email = array(
                'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            if($this->email->send()){
                var_dump("si se mando");
            }
            else
            {
                var_dump("no se mando");
            }
            $this->Claves_catastrales_individual_model->update($ID_insert, $data);




            if ($this->session->userdata('tipo') == 15) {
                $this->session->set_flashdata('correcto', 'El trámite se registro de manera correcta por favor genere el tálon para el ciudadano');
                redirect(base_url('claves_catastrales_individual/update/' . $ID_insert));
            } else {
                $this->session->set_flashdata('correcto', 'Su Solicitud de Clave catastral ha sido creada con éxito un Funcionario dará revisión se le notificará vía correo electrónico');
                redirect(base_url('claves_catastrales_individual'));
            }
        else:
            redirect(base_url('infotramites/info_atencion_de_claves_catastrales_individual'));
        endif;
    }

    public function vistapa($id = null) 
    {
    	
        if ($id == null) {

            $id = $this->input->post('ID');
            if ($id != "") {
                $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
                $fecha = date("Y-m-d", strtotime(str_replace("/", "-", $this->input->post('fecha_ini'))));
                $fecha1 = date("Y-m-d H:i", strtotime(str_replace("/", "-", $this->input->post('fecha_exp') . "T" . $this->input->post('hora'))));

                $data = array(
                    'fechainicio' => $fecha,
                    'fechafinal' => $fecha1
                );
                $this->Claves_catastrales_individual_model->update($id, $data);

                $data['propietario'] = $row->nombrepropietariodp;
                $data['orden'] = $row->numerocontrol;
                $data['tipotramite'] = $row->tipotramitedp;

                print_r($data);

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

            $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
            $data = array(
                'fechainicio' => date("Y-m-d H:i", strtotime(str_replace("/", "-", $row->fechainicio))),
                'fechafinal' => date("Y-m-d H:i", strtotime(str_replace("/", "-", $row->fechafinal))),
            );


            $data['propietario'] = $row->nombrepropietariodp;
            $data['orden'] = $row->numerocontrol;
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

    public function vistapago($id) {
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultq = $this->Usuarios_model->get_usuarios();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_catastrales_individual_model->get_by_id($id);
        }


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Enviar Pago',
                'action' => site_url('claves_catastrales_individual/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave'),
                'compro' => set_value('compro', $row->compro),
            );


            $data['action'] = site_url('claves_catastrales_individual/vistapago_action');

            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_vistapago', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function vistapago_action() {

        if ($this->input->post()) {

            if (!empty($_FILES['compro']['tmp_name'])) {
                $maxnumbd = $this->input->post('ID', TRUE);
                $config1['upload_path'] = './assets/tramites/clavescatastralesindividual/';
                $config1['allowed_types'] = '*';
                $config1['max_size'] = '1000000';
                $config1['max_width'] = '1024000';
                $config1['max_height'] = '768000';
                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);
                //Tamaño Maximo de los Archivos 20 Megas
                $configzip = $config['max_size'] = "21504";
                $this->load->library("upload", $configzip);

                $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($maxnumbd);

                if (!empty($_FILES['compro']['tmp_name'])) {
                    if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->compro) && $row->compro != "") {
                        unlink("./assets/tramites/clavescatastralesindividual/" . $row->compro);
                    }
                    $ext = "";
                    switch ($_FILES['compro']['type']) {
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

                    $nine = 'file-' . $maxnumbd . '-compro' . $ext;

                    $_FILES['compro']['name'] = $nine;

                    if (!$this->upload->do_upload('compro')) {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('correcto', 'Antes de enviar pago debe adjuntar el comprobante de pago');
                        redirect(site_url('claves_catastrales_individual/vistapago/' . $this->input->post('ID', TRUE)));
                    } else {
                        $up = array('upload_data' => $this->upload->data());

                        $data = array(
                            'notificacion' => '1');
                        $data['compro'] = $nine;
                        $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
                        $this->session->set_flashdata('correcto', 'Pago realizado un funcionario lo validara y se le notificara cuando este su documento');
                        redirect(site_url('claves_catastrales_individual'));
                    }
                }
            } else {
                $this->session->set_flashdata('correcto', 'Antes de enviar pago debe adjuntar el comprobante de pago');
                redirect(site_url('claves_catastrales_individual/vistapago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function update($id) {
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultq = $this->Usuarios_model->get_usuarios();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('id') == 183 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_catastrales_individual_model->get_by_id($id);
        }


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Guardar',
                'action' => site_url('claves_catastrales_individual/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave', $row->clave),
                'compro' => set_value('compro', $row->compro),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'poder_nota' => set_value('poder_nota', $row->poder_nota),
                'acta_const' => set_value('acta_const', $row->acta_const),
                'autocat' => set_value('autocat', $row->autocat),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
                'mdocaux' => set_value('mdocaux', $row->mdocaux),
                'mdocaux1' => set_value('mdocaux1', $row->mdocaux1),
                'imuvii' => set_value('imuvii', $row->imuvii),
                'coloniados' => set_value('coloniados', $row->coloniados),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'control' => set_value('control', $row->control),
            );

            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('id') == 183 || $this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_catastrales_individual/update_action_admin');
            } else {
                $data['action'] = site_url('claves_catastrales_individual/update_action');
            }
            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function update_ventanilla($id) {
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultq = $this->Usuarios_model->get_usuarios();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_catastrales_individual_model->get_by_id($id);
        }


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Actualizar',
                'action' => site_url('claves_catastrales_individual/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave'),
                'compro' => set_value('compro', $row->compro),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'acta_const' => set_value('acta_const', $row->acta_const),
                'poder_nota' => set_value('poder_nota', $row->poder_nota),
                'mdocaux1' => set_value('mdocaux1', $row->mdocaux1),
                'coloniados' => set_value('coloniados', $row->coloniados),
                'control' => set_value('control', $row->control),
            );

            if ($this->session->userdata('tipo') == 15) {

                $data['action'] = site_url('claves_catastrales_individual/update_action');
            }
            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form_fun', $data);
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
       
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = 'correo.irapuato.gob.mx';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
		$this->email->initialize($config);
//        $config['mailtype'] = 'html';

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'calleui' => $this->input->post('calleui', TRUE),
                'predialui' => $this->input->post('predialui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'categoriapredioui' => $this->input->post('categoriapredioui', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'nombreresolicitante' => $this->input->post('nombreresolicitante', TRUE),
                /* 'calledp' => $this->input->post('calledp',TRUE),
                  'numerodp' => $this->input->post('numerodp',TRUE),
                  'coloniadp' => $this->input->post('coloniadp',TRUE),
                  'telefonodp' => $this->input->post('telefonodp',TRUE), */
                'callenotificacionesdp' => $this->input->post('callenotificacionesdp', TRUE),
                'numeronotificacionedp' => $this->input->post('numeronotificacionedp', TRUE),
                'colonianotificacionesdp' => $this->input->post('colonianotificacionesdp', TRUE),
                'correonotificacionesdp' => $this->input->post('correonotificacionesdp', TRUE),
                'telefononotificacionesdp' => $this->input->post('telefononotificacionesdp', TRUE),
                'tipotramitedp' => $this->input->post('tipotramitedp', TRUE),
                'motivotramitedp' => $this->input->post('motivotramitedp', TRUE),
                'notificacion' => "1",
                'domisiliosino' => $this->input->post('domisiliosino') != "" ? "1" : "0",
                'nooficialinui' => $this->input->post('nooficialinui', TRUE),
                'numeronotificacionint' => $this->input->post('numeronotificacionint', TRUE),
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

            /*$data['ipropietario'] =$this->input->post('ipropietario');
            if ($this->input->post('ipropietario') == "2") {
                $data['nombreresolicitante']=$this->input->post('nombreSolicitante', TRUE);
            }*/

            if ($this->input->post('domisiliosi') != "") {
                $data['domisiliosino'] = '1';
            } else if ($this->input->post('domisiliono') != "") {
                $data['domisiliosino'] = '2';
            }
            $maxnumbd = $this->input->post('ID', TRUE);
            $variablefile = $_FILES;
            //Tamaño Maximo de los Archivos 20 Megas
            $row = $this->Claves_catastrales_individual_model->get_by_id($maxnumbd);
            $config1['upload_path'] = './assets/tramites/clavescatastralesindividual/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '1000000';
            $config1['max_width'] = '1024000';
            $config1['max_height'] = '768000';
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            if (!empty($_FILES['doctoine'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->doctoine) && $row->doctoine != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->doctoine);
                }
                $numfiles = count($_FILES['doctoine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-' . $maxnumbd . '-doctoine.zip')) {
                    $data['doctoine'] = "file-" . $maxnumbd . "-doctoine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            if (!empty($_FILES['doctolegalpropiedad']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->doctolegalpropiedad) && $row->doctolegalpropiedad != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->doctolegalpropiedad);
                }
                $numfiles = count($_FILES['doctolegalpropiedad']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctolegalpropiedad']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctolegalpropiedad']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-' . $maxnumbd . '-doctolegalpropiedad.zip')) {
                    $data['doctolegalpropiedad'] = "file-" . $maxnumbd . "-doctolegalpropiedad.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            if (!empty($_FILES['doctopredial']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->doctopredial) && $row->doctopredial != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->doctopredial);
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
                }

                $nine = 'file-' . $maxnumbd . '-doctopredial' . $ext;

                $_FILES['doctopredial']['name'] = $nine;

                if (!$this->upload->do_upload('doctopredial')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['doctopredial'] = $nine;
                }
                //echo "Entra al IF";
            }

            if (!empty($_FILES['mdocaux1']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->mdocaux1) && $row->mdocaux1 != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->mdocaux1);
                }
                $ext = "";

                switch ($_FILES['mdocaux1']['type']) {
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

                $nine = 'file-' . $maxnumbd . '-mdocaux1' . $ext;

                $_FILES['mdocaux1']['name'] = $nine;

                if (!$this->upload->do_upload('mdocaux1')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['mdocaux1'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['doctopago']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->doctopago) && $row->doctopago != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->doctopago);
                }
                $ext = "";

                switch ($_FILES['doctopago']['type']) {
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

                $nine = 'file-' . $maxnumbd . '-doctopago' . $ext;

                $_FILES['doctopago']['name'] = $nine;

                if (!$this->upload->do_upload('doctopago')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['doctopago'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['otradoc']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->otradoc) && $row->otradoc != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->otradoc);
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
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['otradoc'] = $nine;
                }
                //echo "Entra al IF";
            }

            if (!empty($_FILES['morine']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->morine) && $row->morine != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->morine);
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
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['morine'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['fisrfc']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->fisrfc) && $row->fisrfc != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->fisrfc);
                }
                $ext = "";

                switch ($_FILES['fisrfc']['type']) {
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

                $nine = 'file-' . $maxnumbd . '-fisrfc' . $ext;

                $_FILES['fisrfc']['name'] = $nine;

                if (!$this->upload->do_upload('fisrfc')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['fisrfc'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['cartapoder']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->cartapoder) && $row->cartapoder != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->cartapoder);
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
                //echo "Entra al IF";
            }
            if (!empty($_FILES['predialso']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->predialso) && $row->predialso != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->predialso);
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
                //echo "Entra al IF";
            }

            if (!empty($_FILES['acta_const']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->acta_const) && $row->acta_const != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->acta_const);
                }
                $ext = "";

                switch ($_FILES['acta_const']['type']) {
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

                $nine = 'file-' . $maxnumbd . '-acta_const' . $ext;

                $_FILES['acta_const']['name'] = $nine;

                if (!$this->upload->do_upload('acta_const')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['acta_const'] = $nine;
                }
                //echo "Entra al IF";
            }
            if (!empty($_FILES['poder_nota']['tmp_name'])) {
                if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->poder_nota) && $row->poder_nota != "") {
                    unlink("./assets/tramites/clavescatastralesindividual/" . $row->poder_nota);
                }
                $ext = "";

                switch ($_FILES['poder_nota']['type']) {
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

                $nine = 'file-' . $maxnumbd . '-poder_nota' . $ext;

                $_FILES['poder_nota']['name'] = $nine;

                if (!$this->upload->do_upload('poder_nota')) {

                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['poder_nota'] = $nine;
                }
                //echo "Entra al IF";
            }
            /////////Mensaje del Funcionario a Ciudadano///////////////
            $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
            $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

            $email = array(
                'contenido' => 'Los datos del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

//            $this->input->post('ID', TRUE)$this->input->post('ID', TRUE)
            $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'La solicitud ha sido modificada con éxito');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function update_action_admin() {
        $this->_rulesupdate();

        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
       
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = 'correo.irapuato.gob.mx';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
		$this->email->initialize($config);

        $S = $this->input->post('otros_doc') != "" ? "1" : "0";
        $imuvii = $this->input->post('imuvii') != "" ? "1" : "0";
        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'mensaje' => $this->input->post('mensaje', TRUE),
                'status' => $this->input->post('status', TRUE),
                'otros_doc' => $S,
                'notificacion' => '0',
                'numerocontrol' => $this->input->post('numerocontrol', TRUE),
                'imuvii' => $imuvii,
                'calleui' => $this->input->post('calleui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'categoriapredioui' => $this->input->post('categoriapredioui', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'nooficialinui' => $this->input->post('nooficialinui', TRUE),
                'predialui' => $this->input->post('predialui', TRUE),
                'control' => $this->input->post('control', TRUE)
            );
            if($this->input->post('clave') ){
                 $data['clave'] = $this->input->post('clave', TRUE);
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
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-' . $maxnumbd . '-doctopago.zip')) {
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
                if ($this->zip->archive('./assets/tramites/clavescatastralesindividual/file-' . $maxnumbd . '-doctofinal.zip')) {
                    $data['doctofinal'] = "file-" . $maxnumbd . "-doctofinal.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            /////////Mensaje del Funcionario a Ciudadano///////////////
            if ($this->input->post('status', TRUE) == 6) {
                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

                $email = array(
                    'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', ha terminado con éxito.<br>' . $this->input->post('mensaje', TRUE) . ' '
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();

                $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'El trámite se ha termindado con éxito');
                redirect(site_url('claves_catastrales_individual'));
            } else if ($this->input->post('status', TRUE) == 2) {
                $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($this->input->post('ID', TRUE));
                if ($row->fechainicio != "") {
                    $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                    $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                    $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

                    $email = array(
                        'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', ha sido aprobada y se encuentra en revisión de información.'
                    );
                    $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                    $this->email->message($body);
                    $this->email->send();

                    $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
                    $this->session->set_flashdata('correcto', 'El trámite se encuentra ahora en en revisión de información');
                    redirect(site_url('claves_catastrales_individual'));
                } else {
                    $data['status'] = "1";
                    $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
                    $this->session->set_flashdata('correcto', 'Por favor genere primero el talón para indicar la fecha de inicio del trámite');
                    redirect(site_url('claves_catastrales_individual'));
                }
            } else {
                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

                $email = array(
                    'contenido' => 'En su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . '.<br> Favor de realizar los cambios correspondientes para continuar con el trámite.'
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();

                $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Acciones Realizadas con Éxito');
                redirect(site_url('claves_catastrales_individual'));
            }
        }
    }

    public function delete($id) {
        $row = $this->Claves_catastrales_individual_model->get_by_id($id);

        if ($row) {
            $this->Claves_catastrales_individual_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('claves_catastrales_individual'));
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('calleui', 'calleui', 'trim|required');
//        $this->form_validation->set_rules('predialui', 'predialui', 'trim|required');
        $this->form_validation->set_rules('noloteui', 'noloteui', 'trim|required');
        $this->form_validation->set_rules('nomanzanaui', 'nomanzanaui', 'trim|required');
        $this->form_validation->set_rules('nooficialui', 'nooficialui', 'trim|required');
        $this->form_validation->set_rules('cbocoloniaui', 'cbocoloniaui', 'trim|required');
        $this->form_validation->set_rules('categoriapredioui', 'categoriapredioui', 'trim|required');
        $this->form_validation->set_rules('mapa', 'mapa', 'trim|required');
        $this->form_validation->set_rules('nombrepropietariodp', 'nombrepropietariodp', 'trim|required');
        $this->form_validation->set_rules('nombreresolicitante', 'nombreresolicitante', 'trim|required');
        $this->form_validation->set_rules('calledp', 'calledp', 'trim|required');
        $this->form_validation->set_rules('numerodp', 'numerodp', 'trim|required');
        $this->form_validation->set_rules('coloniadp', 'coloniadp', 'trim|required');
        $this->form_validation->set_rules('telefonodp', 'telefonodp', 'trim|required');
        $this->form_validation->set_rules('callenotificacionesdp', 'callenotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('numeronotificacionedp', 'numeronotificacionedp', 'trim|required');
        $this->form_validation->set_rules('colonianotificacionesdp', 'colonianotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('correonotificacionesdp', 'correonotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('telefononotificacionesdp', 'telefononotificacionesdp', 'trim|required');
        $this->form_validation->set_rules('tipotramitedp', 'tipotramitedp', 'trim|required');
        $this->form_validation->set_rules('motivotramitedp', 'motivotramitedp', 'trim|required');
        $this->form_validation->set_rules('doctoine', 'doctoine', 'trim|required');
        $this->form_validation->set_rules('otrodoc', 'otrodoc', 'trim|required');
        $this->form_validation->set_rules('doctolegalpropiedad', 'doctolegalpropiedad', 'trim|required');
        $this->form_validation->set_rules('doctopredial', 'doctopredial', 'trim|required');
        $this->form_validation->set_rules('doctopago', 'doctopago', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesupdate() {

        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function tramites() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/tramites?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual/tramites?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/tramites';
            $config['first_url'] = base_url() . 'claves_catastrales_individual/tramites';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;

        $total = $this->Claves_catastrales_individual_model->total_rows_tramites($q);
        $config['total_rows'] = $total[0]->cantidad;
        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_tramites($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios();
        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );


        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_tramite', $data);
    }

    public function validar() {
        if ($this->session->userdata('admin') == 2):


            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('Inicio'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/validar?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_individual/validar?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/validar';
                $config['first_url'] = base_url() . 'claves_catastrales_individual/validar';
            }

            $config['per_page'] = 20;
            $config['page_query_string'] = TRUE;
            $total = $this->Claves_catastrales_individual_model->total_rows_validaciones($q);
            $config['total_rows'] = $total[0]->cantidad;
            $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_validaciones($config['per_page'], $start, $q);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'claves_catastrales_individual_data' => $claves_catastrales_individual,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );

            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_validar', $data);
        else:
            show_404();
        endif;
    }

    public function autorizar() {
        if ($this->session->userdata('admin') == 1):


            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('Inicio'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/autorizar?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_individual/autorizar?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_individual/autorizar';
                $config['first_url'] = base_url() . 'claves_catastrales_individual/autorizar';
            }

            $config['per_page'] = 20;
            $config['page_query_string'] = TRUE;

            $config['total_rows'] = $this->Claves_catastrales_individual_model->total_rows_autorizaciones($q);
            $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_autorizaciones($config['per_page'], $start, $q);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'claves_catastrales_individual_data' => $claves_catastrales_individual,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );
            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_autorizar', $data);

        else:
            show_404();
        endif;
    }

    public function validar_tram($id) {
        $result = $this->Colonias_model->getcoloniaspredial();


        $resultq = $this->Usuarios_model->get_usuarios();
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);



        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Validar Trámite',
                'action' => site_url('claves_catastrales_individual/validar_tram_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'predialso' => set_value('predialso', $row->predialso),
                'nooficio' => set_value('nooficio', $row->nooficio),
                'clave' => set_value('clave'),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );
            $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);

            $data['func'] = $resultq;
            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form_autorizacion', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function autorizar_tram($id) {
        $result = $this->Colonias_model->getcoloniaspredial();


        $resultq = $this->Usuarios_model->get_usuarios();
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);



        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Autorizar Trámite',
                'action' => site_url('claves_catastrales_individual/autorizar_tram_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'predialso' => set_value('predialso', $row->predialso),
                'clave' => set_value('clave'),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );
            $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);

            $data['func'] = $resultq;

            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form_autorizacion', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function validar_tram_action() {

        $data = array(
            'validacion' => 1,
        );

        $i = $this->input->post('ID');
        $this->Claves_catastrales_individual_model->update($i, $data);
        $this->session->set_flashdata('correcto', 'El Támite se valido de manera correcta');
        redirect(site_url('claves_catastrales_individual/validar'));
    }

    public function autorizar_tram_action() {

        $data = array(
            'autorizacion' => 1,
            'notificacion' => 0,
        );
        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = 'correo.irapuato.gob.mx';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
        $config['mailtype'] = 'html';
		$this->email->initialize($config);
		
        $i = $this->input->post('ID');
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($i);

        $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($row->correonotificacionesdp); //Correo del ciudadano
        $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

        $email = array(
            'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública se ha autorizado con éxito por favor realice el pago para continuar con el trámite.'
        );
        $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
        $this->email->message($body);
        $this->email->send();
        $this->Claves_catastrales_individual_model->update($i, $data);
        $this->session->set_flashdata('correcto', 'El Támite se valido de manera correcta');
        redirect(site_url('claves_catastrales_individual/autorizar'));
    }

    public function asigna() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/asigna?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual/asigna?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/asigna';
            $config['first_url'] = base_url() . 'claves_catastrales_individual/asigna';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;

        $total = $this->Claves_catastrales_individual_model->total_rows_asinacion($q);

        $config['total_rows'] = $total[0]->cantidad;
        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_asinacion($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_asignacion', $data);
    }

    public function asignar($id) {
        $result = $this->Colonias_model->getcoloniaspredial();


        $resultq = $this->Usuarios_model->get_usuarios();
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);



        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Actualizar',
                'action' => site_url('claves_catastrales_individual/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'predialso' => set_value('predialso', $row->predialso),
                'imuvii' => set_value('imuvii', $row->imuvii),
            );

            if ($this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_catastrales_individual/update_action_aux');
            }
            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function clave($id) {
        $result = $this->Colonias_model->getcoloniaspredial();

        $resultq = $this->Usuarios_model->get_usuarios();
        $row = $this->Claves_catastrales_individual_model->get_by_id_administrador($id);



        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Guardar',
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correonotificacionesdp', $row->correonotificacionesdp),
                'telefononotificacionesdp' => set_value('telefononotificacionesdp', $row->telefononotificacionesdp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'otros_doc' => set_value('otros_doc', $row->otros_doc),
                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialinui', $row->nooficialinui),
                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'predialso' => set_value('predialso', $row->predialso),
                'cartapoder' => set_value('cartapoder', $row->cartapoder),
                'autocat' => set_value('autocat', $row->autocat),
                'mdocaux1' => "",
                'imuvii' => set_value('imuvii', $row->imuvii),
                'coloniados' => set_value('coloniados', $row->coloniados),
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
            );

            if ($this->session->userdata('tipo') == 1555 || $this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_catastrales_individual/update_action_clave');
            }
            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('claves_catastrales_individual/claves_catastrales_individual_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function asignar_func() {

        $ids = $this->input->post('IDs', TRUE);
        $ids1 = $this->input->post('IDs1', TRUE);

        $id = explode(",", $ids);
        $id1 = explode(",", $ids1);
        foreach ($id as $i) {


            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
                'status' => "3",
            );
            $this->Claves_catastrales_individual_model->update($i, $data);

            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        foreach ($id1 as $i) {


            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
                'status' => "3",
            );
            $this->Claves_catastrales_individual_cetificado_model->update($i, $data);

            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        $this->session->set_flashdata('correcto', 'Auxiliar Asignado con éxito');
        redirect(site_url('claves_catastrales_individual/tramites'));
    }

    public function asignar_func2() {

        $ids = $this->input->post('IDs', TRUE);
        $ids1 = $this->input->post('IDs1', TRUE);

        $id = explode(",", $ids);
        $id1 = explode(",", $ids1);

        foreach ($id as $i) {


            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
            );
            $this->Claves_catastrales_individual_model->update($i, $data);

            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        foreach ($id1 as $i) {


            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
                'status' => "3",
            );
            $this->Claves_catastrales_individual_cetificado_model->update($i, $data);

            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        $this->session->set_flashdata('correcto', 'Auxiliar Asignado con éxito');
        redirect(site_url('claves_catastrales_individual/reasignar'));
    }

    public function update_action_aux() {
        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
                'status' => "3",
            );
            $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'Auxiliar Asignado con éxito');
            redirect(site_url('claves_catastrales_individual'));
        }
    }

    public function Epale(){

        /*$nombrepropietariodp="";
        $Fecha="";
        $numero_doc="";
        $tipotramitedp="";
        $FechaR="";
        $calleui="";
        $nooficialui="";
        $coloniaui="";
        $predialui="";
        $sup="";
        $caracter="";
        $fecha_escritura="";
        $No_Esc="";
        $notario="";
        $no_notario="";
        $observaciones="";
        $clave="";
        $numero_exp="";
        $fecha_ini="";
        $nombre_imuvii="";
        $imuvii="";
        $Privativat="";
        $Comunt="";
        $Cubiertat="";
        $Cubiertatd="";
        $indivisott="";
        $Indivisopt="";
        $Croquis_URL="";
        $nomanzanaui="";
        $noloteui="";
        $INFONAVIT_Num="";
        $Titulo_Num ="";
        $Juicio_Num="";
        $Juicio_Juez="";
        $Iniciales_func="";
        $Copropietario="";
        $Parcela="";
        $CORETT_Contrato="";
        $Constancia="";*/

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
	    isset($_POST["caracter"])? $caracter=$_POST["caracter"]:$caracter="";
	    isset($_POST["fecha_escritura"])? $fecha_escritura=$_POST["fecha_escritura"]:$fecha_escritura="1-1-1";
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
	    isset($_POST["Manzana"])? $Manzana=$_POST["Manzana"]:$Manzana="";
	    isset($_POST["noloteui"])? $noloteui=$_POST["noloteui"]:$noloteui="";
	    isset($_POST["INFONAVIT_Num"])? $INFONAVIT_Num=$_POST["INFONAVIT_Num"]:$INFONAVIT_Num="";
	    isset($_POST["Titulo_Num"])? $Titulo_Num=$_POST["Titulo_Num"]:$Titulo_Num="";
	    isset($_POST["Juicio_Num"])? $Juicio_Num=$_POST["Juicio_Num"]:$Juicio_Num="";
	    isset($_POST["Juicio_Juez"])? $Juicio_Juez=$_POST["Juicio_Juez"]:$Juicio_Juez="";
	    isset($_POST["Iniciales_func"])? $Iniciales_func=$_POST["Iniciales_func"]:$Iniciales_func="";
	    isset($_POST["Copropietario"])? $Copropietario=$_POST["Copropietario"]:$Copropietario="";
	    isset($_POST["No_Esc"])? $No_Esc=$_POST["No_Esc"]:$No_Esc="";
	    isset($_POST["Parcela"])? $Parcela=$_POST["Parcela"]:$Parcela="";
	    isset($_POST["CORETT_Contrato"])? $CORETT_Contrato=$_POST["CORETT_Contrato"]:$CORETT_Contrato="";
        isset($_POST["Constancia"])? $Constancia=$_POST["Constancia"]:$Constancia="";

        $data = array(
            'nombrepropietariodp' =>  $nombrepropietariodp,
            'Fecha' => $Fecha,
            'numero_doc' => $numero_doc,
            'tipotramitedp' => $tipotramitedp,
            'FechaR' => $FechaR,
            'calleui' => $calleui,
            'nooficialui' => $nooficialui,
            'coloniaui' => $coloniaui,
            'predialui' => $predialui,
            'sup' => $sup,
            'caracter' => $caracter,
            'fecha_escritura' => $fecha_escritura,
            'No_Esc' => $No_Esc,
            'notario' => $notario,
            'no_notario' => $no_notario,
            'observaciones' => $observaciones,
            'clave' => $clave,
            'numero_exp' => $numero_exp,
            'fecha_ini' => $fecha_ini,
            'nombre_imuvii' => $nombre_imuvii,
            'imuvii' => $imuvii,
            'Privativat' => $Privativat,
            'Comunt' => $Comunt,
            //'Cubiertat' => $Cubiertat,
            'Cubiertatd' => $Cubiertatd,
            'indivisott' => $indivisott,
            'Indivisopt' => $Indivisopt,
            'Croquis_URL' => $Croquis_URL,
            //'nomanzanaui' => $nomanzanaui,
            'noloteui' => $noloteui,
            'INFONAVIT_Num' => $INFONAVIT_Num,
            'Titulo_Num' => $Titulo_Num,
            'Juicio_Num' => $Juicio_Num,
            'Juicio_Juez' => $Juicio_Juez,
            'Iniciales_func' => $Iniciales_func,
            'Copropietario' => $Copropietario,
            'Parcela' => $Parcela,
            'CORETT_Contrato' => $CORETT_Contrato,
            'Constancia' => $Constancia
        );

        $Coincidencia="";
        $Coincidencia=$this->Claves_catastrales_individual_model->Get_ID_Folio($numero_doc);
        if($Coincidencia!=""){
            $this->Claves_catastrales_individual_model->Update_Info_Doctos($data, $numero_doc);
        }
        else
        {
            $this->Claves_catastrales_individual_model->Insert_Info_Doctos($data);
        }

    }

    public function update_action_clave() {
        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {

            $maxnumbd = $this->input->post('ID');

            $row = $this->Claves_catastrales_individual_model->get_by_id_admin($maxnumbd);
        
            if ($row->status <= 3) {
                $data = array(
                    'calleui' => $this->input->post('calleui', TRUE),
                    'noloteui' => $this->input->post('noloteui', TRUE),
                    'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                    'nooficialui' => $this->input->post('nooficialui', TRUE),
                    'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                    'categoriapredioui' => $this->input->post('categoriapredioui', TRUE),
                    'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                    'nooficialinui' => $this->input->post('nooficialinui', TRUE),
                    'coloniados' => $this->input->post('colonia2', TRUE),
                    'coloniados' => $this->input->post('colonia2', TRUE),
                    'predialui' => $this->input->post('predialui', TRUE),
                );
            } else {
                $data = array(
                );
            }
           
            
            $config1['upload_path'] = './assets/tramites/clavescatastralesindividual/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '0';
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);

            if (!empty($_FILES['autocat']['tmp_name'])) {
                if ($row->autocat) {
                    if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->autocat)) {
                        unlink("./assets/tramites/clavescatastralesindividual/" . $row->autocat);
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
                    if (is_readable("./assets/tramites/clavescatastralesindividual/" . $row->doctofinal)) {
                        unlink("./assets/tramites/clavescatastralesindividual/" . $row->doctofinal);
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
                       
            $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
            $row = $this->Claves_catastrales_individual_model->get_by_id_admin($maxnumbd);
            if ($row->doctofinal != "" && $row->doctopago != "" && $row->autocat != "") {

                $data['status'] = "4";

                $this->load->library('email');
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
               
                $config['protocol'] = 'smtp';
                $config['smtp_port'] = '25';
                $config['smtp_host'] = 'correo.irapuato.gob.mx';
                $config['smtp_user'] = 'vuira';
                $config['smtp_pass'] = 'Irapuato.2018';
                $config['mailtype'] = 'html';
				$this->email->initialize($config);

                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');


                $email = array(
                    'contenido' => 'Su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', Se encuentra en espera de Autorización.'
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
            }
        }

        if ($this->input->post('mensaje', TRUE) != "") {
            $this->load->library('email');
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            
            $config['protocol'] = 'smtp';
            $config['smtp_port'] = '25';
            $config['smtp_host'] = 'correo.irapuato.gob.mx';
            $config['smtp_user'] = 'vuira';
            $config['smtp_pass'] = 'Irapuato.2018';
            $config['mailtype'] = 'html';
			$this->email->initialize($config);
            $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
            $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

            $email = array(
                'contenido' => 'En su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . '.<br>Favor de realizar los cambios correspondientes para continuar con el trámite.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();
        }

        $this->Claves_catastrales_individual_model->update($this->input->post('ID', TRUE), $data);
//$this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('claves_catastrales_individual/asigna'));
    }

    public function reasignar() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/reasignar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_individual/reasignar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_individual/reasignar';
            $config['first_url'] = base_url() . 'claves_catastrales_individual/reasignar';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;

        $total = $this->Claves_catastrales_individual_model->total_rows_reasignar($q);
        $config['total_rows'] = $total[0]->cantidad;

        $claves_catastrales_individual = $this->Claves_catastrales_individual_model->get_reasignar($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios();
        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );


        $this->load->view('claves_catastrales_individual/claves_catastrales_individual_tramite_1', $data);
    }

    public function vpago($id = null) {
        if ($id) {

            if ($this->session->userdata('tipo') == 1000) {
                $data = array(
                    'valido_pago' => 1,
                    'notificacion' => 1,
                );
                $this->Claves_catastrales_individual_model->update($id, $data);
                redirect(base_url('vista_pago'));
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function email($id = null) {
        $correo = "edgoz1452@gmail.com";
        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = 'correo.irapuato.gob.mx';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
        $config['mailtype'] = 'html';
		$this->email->initialize($config);
		
        $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($correo); //Correo del ciudadano
        $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');

        $email = array(
            'contenido' => 'En su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de Luis Eduardo Godínez González, se requieren las siguientes acciones: El documento con el cual acredita la propiedad no es visible vuelva a adjuntar el documento.<br>Favor de realizar los cambios correspondientes para continuar con el trámite.'
        );
        $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
        $this->email->message($body);
        $this->email->send();
    }

}

/* End of file Claves_catastrales_individual.php */
/* Ubicacion: ./application/controllers/Claves_catastrales_individual.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-06-06 06:37:27 */
/* http://www.ga-asociados.com */