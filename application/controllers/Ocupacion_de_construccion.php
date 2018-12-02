<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ocupacion_de_construccion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Ocupacion_de_construccion_model');
        $this->load->library('form_validation');
        $this->load->model('Colonias_model');
        $this->load->model("Usuarios_model");
        $this->load->model("Peritos_model");
        $this->load->model("Ccbd_model");
        $this->load->library('zip');
        $this->load->model('Calles_japami_model');
    }

    public function pago($id = null) {
        if ($id) {
            $row = $this->Ocupacion_de_construccion_model->get_by_id($id);
//            die(print_r($row,true));
            if ($row && $row->user_id === $this->session->userdata('id') && $row->status === "4") {
                $data['concepto'] = "Solicitude de pago de Autorización de uso de Construcción";
                $data['des'] = "Pago de Autorización de uso de Construcción";

                $pagar = explode(',', $row->total_pago);
                $pagos = "";
                foreach ($pagar as $pa) {
                    $pagos = $pagos . $pa;
                }

                $data['importe'] = $pagos;
                $data['ref'] = "006";
                $data['id'] = "ocupacion_de_construccion/update/" . $id;
                $this->load->view('pago', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function asignacion() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ocupacion_de_construccion/asignacion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ocupacion_de_construccion/asignacion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ocupacion_de_construccion/asignacion';
            $config['first_url'] = base_url() . 'ocupacion_de_construccion/asignacion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows($q);


        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) {
            $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows_admin($q);
            $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_limit_data_admin_admin($config['per_page'], $start, $q);

//            die(print_r($ocupacion_de_construccion,true));
        } else {
            $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows_usuarios($q);
            $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_limit_data($config['per_page'], $start, $q);
        }


        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios_permisos();
        $data = array(
            'ocupacion_de_construccion_data' => $ocupacion_de_construccion,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );
        $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_list_asig', $data);
    }

    public function autorizacion() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ocupacion_de_construccion/asignacion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ocupacion_de_construccion/asignacion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ocupacion_de_construccion/asignacion';
            $config['first_url'] = base_url() . 'ocupacion_de_construccion/asignacion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
//        $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows($q);



        $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows_admin_aut($q);
        $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_limit_data_admin_admin_aut($config['per_page'], $start, $q);

//            die(print_r($ocupacion_de_construccion,true));



        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios_permisos();
        $data = array(
            'ocupacion_de_construccion_data' => $ocupacion_de_construccion,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );
        $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_list_1', $data);
    }

    public function asignar_func() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);

        foreach ($id as $i) {
            $data = array(
                'func' => $this->input->post('auxiliar', TRUE),
            );
            $this->Ocupacion_de_construccion_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }
		$this->session->set_flashdata('message', 'Funcionarios asignados');
        redirect(base_url('ocupacion_de_construccion/asignacion'));
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ocupacion_de_construccion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ocupacion_de_construccion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ocupacion_de_construccion';
            $config['first_url'] = base_url() . 'ocupacion_de_construccion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows($q);

        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11) {
            $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows_fun($q);
            $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_limit_data_admin_fun($config['per_page'], $start, $q);

//            die(print_r($ocupacion_de_construccion,true));
        } elseif ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) {
            $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows($q);
            $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_limit_data_admin($config['per_page'], $start, $q);

//            die(print_r($ocupacion_de_construccion,true));
        } else {
            $config['total_rows'] = $this->Ocupacion_de_construccion_model->total_rows_usuarios($q);
            $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_limit_data($config['per_page'], $start, $q);
        }


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ocupacion_de_construccion_data' => $ocupacion_de_construccion,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_list', $data);
    }

    public function clave() {

        $data['vista'] = 'ocupacion_de_construccion/create';
        $data['validar_tramite_vigente_DGDT'] = "1";
        $data['validar_tramite_vigente_DGDT_Permiso'] = "terminacion_obra";
        $data['is_DGDT_no_obligatorio_predial'] = "1";
        $data['vista_DGDT_no_obligatorio_predial'] = 'ocupacion_de_construccion/create_sin_predial';
        $this->load->view('permiso_anuncios/clave_catastral_form', $data);
    }

    public function reportes() {

        //$this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_reportes');
        $this->load->view('ocupacion_de_construccion/ocupacion_construccion_reportes');
    }

    public function reportefinal() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietariodg = $this->input->post('nombrepropietariodg', TRUE);

        $ocupacion_de_construccion = $this->Ocupacion_de_construccion_model->get_reporte($fechainicio, $fechafinal, $nombrepropietariodg, $status);

        $data = array(
            'ocupacion_de_construccion_data' => $ocupacion_de_construccion
        );

        //print_r($data);
        $this->load->view('ocupacion_de_construccion/ocupacion_construccion_reportefinal', $data);
    }

    public function read($id) {
        $row = $this->Ocupacion_de_construccion_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'nombrepropietariodg' => $row->nombrepropietariodg,
                'nombresolicitantedg' => $row->nombresolicitantedg,
                'calledg' => $row->calledg,
                'numerodg' => $row->numerodg,
                'coloniadg' => $row->coloniadg,
                'correodg' => $row->correodg,
                'telefonodg' => $row->telefonodg,
                'calleui' => $row->calleui,
                'nodeloteui' => $row->nodeloteui,
                'manzanaui' => $row->manzanaui,
                'nooficialui' => $row->nooficialui,
                'cbocolsui' => $row->cbocolsui,
                'superficiepredioui' => $row->superficiepredioui,
                'superficieconstruidaui' => $row->superficieconstruidaui,
                'bardeoui' => $row->bardeoui,
                'nonivelesui' => $row->nonivelesui,
                'nocajonesui' => $row->nocajonesui,
                'noviviendasui' => $row->noviviendasui,
                'porcentajeavanceui' => $row->porcentajeavanceui,
                'mapa' => $row->mapa,
                'nombreperitodp' => $row->nombreperitodp,
                'noregistroperitodp' => $row->noregistroperitodp,
                'telefonoperitodp' => $row->telefonoperitodp,
                'nombreperitoresponsabledp' => $row->nombreperitoresponsabledp,
                'noregistroresponsabledp' => $row->noregistroresponsabledp,
                'telefonoresponsabledp' => $row->telefonoresponsabledp,
                'docsbitacora' => $row->docsbitacora,
                'docsplano' => $row->docsplano,
                'docsvbuenofinales' => $row->docsvbuenofinales,
                'docspermisoconstruccion' => $row->docspermisoconstruccion,
                'docsreportefotografico' => $row->docsreportefotografico,
                'verificador' => $row->verificador,
                'fechaverificacion' => $row->fechaverificacion,
                'hora' => $row->hora,
                'doctoverificador' => $row->doctoverificador,
                'docspago' => $row->docspago,
                'docsfinal' => $row->docsfinal,
                'nocontroldp' => $row->nocontroldp,
                'user_id' => $row->user_id,
                'status' => $row->status,
                'mensaje' => $row->mensaje,
                'superficieconstruirui' => $row->superficieconstruirui,
                'notificacion' => $row->notificacion,
                'fechainicio' => $row->fechainicio,
                'fechafinal' => $row->fechafinal,
            );
            $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('ocupacion_de_construccion'));
        }
    }

    public function datospredial($predial) {
//         $predial = $this->input->post('clave');
        require_once(APPPATH . 'libraries/lib/nusoap.php'); //includes nusoap
        $cliente = new nusoap_client("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", true);


        //Use basic authentication method
        $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");

        $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '' . $predial);
        $respuesta = $cliente->call("Consulta", $parametros);

        $respuesta = json_decode($respuesta, true);

//              echo json_encode($respuesta);
        if ($respuesta) {

            return $respuesta;
        } else {
            return "";
        }
    }

    public function create() {
//        $clave = $this->input->post('clave');
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        $id_perito = $this->input->post('perito_id');
        $datos = $this->datospredial($this->input->post('clave'));
        if (isset($datos['CALLE_ID'])) {
            $datos['CALLE_ID'] = trim($datos['CALLE_ID'], '0');
            $datos['CALLE_ID'] = trim($datos['CALLE_ID']);
            $CALLE = $this->Calles_japami_model->getcallepredialbyid($datos['CALLE_ID']);
//            DIE(PRINT_R($CALLE,TRUE));
            $datos['CALLE_ID'] = $CALLE->nombre;
        }
        if (isset($datos['COLONIA_ID'])) {
            $datos['COLONIA_ID'] = trim($datos['COLONIA_ID'], '0');
            $datos['COLONIA_ID'] = trim($datos['COLONIA_ID']);
        }
        $data = array(
            'consulta' => $result,
            'resultperitos' => $resultperitos,
            'resultperitosesp' => $resultperitosesp,
            'button' => 'Solicitar Trámite',
            'action' => base_url('ocupacion_de_construccion/create_action'),
            'ID' => set_value('ID'),
            'nombrepropietariodg' => $datos['NOMBRE'] . " " . $datos['APELLIDO_PATERNO'] . " " . $datos['APELLIDO_MATERNO'],
            'nombresolicitantedg' => set_value('nombresolicitantedg'),
            'calledg' => $datos['CALLE_ID'],
            'numerodg' => $datos['NO_EXTERIOR'],
            'coloniadg' => $datos['COLONIA_ID'],
            'correodg' => $this->session->userdata('correo'),
            'telefonodg' => set_value('telefonodg'),
            'calleui' => $datos['CALLE_ID'],
            'nodeloteui' => isset($datos['LOTE']) == 1 ? $datos['LOTE'] : "",
            'manzanaui' => isset($datos['MANZANA']) == 1 ? $datos['MANZANA'] : "",
            'nooficialui' => $datos['NO_EXTERIOR'],
            'cbocolsui' => $datos['COLONIA_ID'],
            'superficiepredioui' => set_value('superficiepredioui'),
            'superficieconstruidaui' => set_value('superficieconstruidaui'),
            'bardeoui' => set_value('bardeoui'),
            'nonivelesui' => set_value('nonivelesui'),
            'nocajonesui' => set_value('nocajonesui'),
            'noviviendasui' => set_value('noviviendasui'),
            'porcentajeavanceui' => set_value('porcentajeavanceui'),
            'mapa' => set_value('mapa'),
            'nombreperitodp' => set_value('nombreperitodp'),
            'noregistroperitodp' => set_value('noregistroperitodp'),
            'telefonoperitodp' => set_value('telefonoperitodp'),
            'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp'),
            'noregistroresponsabledp' => set_value('noregistroresponsabledp'),
            'telefonoresponsabledp' => set_value('telefonoresponsabledp'),
            'docsbitacora' => set_value('docsbitacora'),
            'docsplano' => set_value('docsplano'),
            'docsvbuenofinales' => set_value('docsvbuenofinales'),
            'docspermisoconstruccion' => set_value('docspermisoconstruccion'),
            'docsreportefotografico' => set_value('docsreportefotografico'),
            'verificador' => set_value('verificador'),
            'fechaverificacion' => set_value('fechaverificacion'),
            'hora' => set_value('hora'),
            'doctoverificador' => set_value('doctoverificador'),
            'docspago' => set_value('docspago'),
            'docsfinal' => set_value('docsfinal'),
            'nocontroldp' => set_value('nocontroldp'),
            'user_id' => set_value('user_id'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'notificacion' => set_value('notificacion'),
            'fechainicio' => set_value('fechainicio'),
            'requiereverificador' => set_value('requiereverificador'),
            'superficieconstruirui' => set_value('superficieconstruirui'),
            'fechafinal' => set_value('fechafinal'),
            //'clave' => $datos['CUENTA_PREDIAL'],
            'clave' => $datos['CLAVE_CATASTRAL'],
            'cuenta_predial' => $datos['CUENTA_PREDIAL'],
            'valido_pago' => set_value('valido_pago'),
            'observaciones' => $datos['observaciones'],/////
            //'observaciones' => set_value('observaciones'),
        );
        $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_form', $data);
    }
    public function create_sin_predial() {
//        $clave = $this->input->post('clave');
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        $id_perito = $this->input->post('perito_id');
        
        $data = array(
            'consulta' => $result,
            'resultperitos' => $resultperitos,
            'resultperitosesp' => $resultperitosesp,
            'button' => 'Solicitar Trámite',
            'action' => base_url('ocupacion_de_construccion/create_action'),
            'ID' => set_value('ID'),
            'nombrepropietariodg' => set_value('nombrepropietariodg'),
            'nombresolicitantedg' => set_value('nombresolicitantedg'),
            'calledg' => set_value('CALLE_ID'),
            'numerodg' => set_value('NO_EXTERIOR'),
            'coloniadg' => set_value('COLONIA_ID'),
            'correodg' => $this->session->userdata('correo'),
            'telefonodg' => set_value('telefonodg'),
            'calleui' => set_value('calleui'),
            'nodeloteui' => set_value('nodeloteui'),
            'manzanaui' => set_value('manzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocolsui' => set_value('cbocolsui'),
            'superficiepredioui' => set_value('superficiepredioui'),
            'superficieconstruidaui' => set_value('superficieconstruidaui'),
            'bardeoui' => set_value('bardeoui'),
            'nonivelesui' => set_value('nonivelesui'),
            'nocajonesui' => set_value('nocajonesui'),
            'noviviendasui' => set_value('noviviendasui'),
            'porcentajeavanceui' => set_value('porcentajeavanceui'),
            'mapa' => set_value('mapa'),
            'nombreperitodp' => set_value('nombreperitodp'),
            'noregistroperitodp' => set_value('noregistroperitodp'),
            'telefonoperitodp' => set_value('telefonoperitodp'),
            'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp'),
            'noregistroresponsabledp' => set_value('noregistroresponsabledp'),
            'telefonoresponsabledp' => set_value('telefonoresponsabledp'),
            'docsbitacora' => set_value('docsbitacora'),
            'docsplano' => set_value('docsplano'),
            'docsvbuenofinales' => set_value('docsvbuenofinales'),
            'docspermisoconstruccion' => set_value('docspermisoconstruccion'),
            'docsreportefotografico' => set_value('docsreportefotografico'),
            'verificador' => set_value('verificador'),
            'fechaverificacion' => set_value('fechaverificacion'),
            'hora' => set_value('hora'),
            'doctoverificador' => set_value('doctoverificador'),
            'docspago' => set_value('docspago'),
            'docsfinal' => set_value('docsfinal'),
            'nocontroldp' => set_value('nocontroldp'),
            'user_id' => set_value('user_id'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'notificacion' => set_value('notificacion'),
            'fechainicio' => set_value('fechainicio'),
            'requiereverificador' => set_value('requiereverificador'),
            'superficieconstruirui' => set_value('superficieconstruirui'),
            'fechafinal' => set_value('fechafinal'),
            //'clave' => $datos['CUENTA_PREDIAL'],
            'clave' => set_value('clave'),
            'cuenta_predial' => set_value('cuenta_predial'),
            'valido_pago' => set_value('valido_pago'),
            //'observaciones' => $datos['observaciones'],///////
            'observaciones' => set_value('observaciones'),
        );
        $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_form', $data);
    }

    public function create_action() {

        $this->_rules();

        $maxnum = $this->Ocupacion_de_construccion_model->getMaxItemByid();
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
        $configzip = $config['max_size'] = "215004";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;

        $data = array(
            'nombrepropietariodg' => $this->input->post('nombrepropietariodg', TRUE),
            'nombresolicitantedg' => $this->input->post('nombresolicitantedg', TRUE),
            'calledg' => $this->input->post('calledg', TRUE),
            'numerodg' => $this->input->post('numerodg', TRUE),
            'coloniadg' => $this->input->post('coloniadg', TRUE),
            'correodg' => $this->input->post('correodg', TRUE),
            'telefonodg' => $this->input->post('telefonodg', TRUE),
            'calleui' => $this->input->post('calleui', TRUE),
            'nodeloteui' => $this->input->post('nodeloteui', TRUE),
            'manzanaui' => $this->input->post('manzanaui', TRUE),
            'nooficialui' => $this->input->post('nooficialui', TRUE),
            'cbocolsui' => $this->input->post('cbocolsui', TRUE),
            'superficiepredioui' => $this->input->post('superficiepredioui', TRUE),
            'superficieconstruidaui' => $this->input->post('superficieconstruidaui', TRUE),
            'bardeoui' => $this->input->post('bardeoui', TRUE),
            'nonivelesui' => $this->input->post('nonivelesui', TRUE),
            'nocajonesui' => $this->input->post('nocajonesui', TRUE),
            'noviviendasui' => $this->input->post('noviviendasui', TRUE),
            'porcentajeavanceui' => $this->input->post('porcentajeavanceui', TRUE),
            'mapa' => $this->input->post('mapa', TRUE),
            'nombreperitodp' => $this->input->post('nombreperitodp', TRUE),
            'noregistroperitodp' => $this->input->post('noregistroperitodp', TRUE),
            'superficieconstruirui' => $this->input->post('superficieconstruirui', TRUE),
            'telefonoperitodp' => $this->input->post('telefonoperitodp', TRUE),
            'nombreperitoresponsabledp' => $this->input->post('nombreperitoresponsabledp', TRUE),
            'noregistroresponsabledp' => $this->input->post('noregistroresponsabledp', TRUE),
            'telefonoresponsabledp' => $this->input->post('telefonoresponsabledp', TRUE),
            'user_id' => $this->session->userdata('id'),
            'status' => "1",
            'notificacion' => "1",
            'clave' => $this->input->post('clave', TRUE),
            'cuenta_predial' => $this->input->post('cuenta_predial', TRUE),
            'observaciones' => $this->input->post('observaciones', TRUE), //////////
        );
//        die(print_r( $this->input->post('clave'),true));
        if (!empty($_FILES['docsbitacora']['tmp_name'][0])) {
            $numfiles = count($_FILES['docsbitacora']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['docsbitacora']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['docsbitacora']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsbitacora.zip')) {
                $data['docsbitacora'] = "file-" . $maxnumbd . "-docsbitacora.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['docsbitacora'] = "";
        }

        if (!empty($_FILES['docsplano']['tmp_name'][0])) {
            $numfiles = count($_FILES['docsplano']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['docsplano']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['docsplano']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsplano.zip')) {
                $data['docsplano'] = "file-" . $maxnumbd . "-docsplano.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['docsplano'] = "";
        }

        if (!empty($_FILES['docsvbuenofinales']['tmp_name'][0])) {
            $numfiles = count($_FILES['docsvbuenofinales']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['docsvbuenofinales']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['docsvbuenofinales']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsvbuenofinales.zip')) {
                $data['docsvbuenofinales'] = "file-" . $maxnumbd . "-docsvbuenofinales.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['docsvbuenofinales'] = "";
        }

        if (!empty($_FILES['docspermisoconstruccion']['tmp_name'][0])) {
            $numfiles = count($_FILES['docspermisoconstruccion']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['docspermisoconstruccion']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['docspermisoconstruccion']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspermisoconstruccion.zip')) {
                $data['docspermisoconstruccion'] = "file-" . $maxnumbd . "-docspermisoconstruccion.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['docspermisoconstruccion'] = "";
        }

        if (!empty($_FILES['docsreportefotografico']['tmp_name'][0])) {
            $numfiles = count($_FILES['docsreportefotografico']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['docsreportefotografico']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['docsreportefotografico']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsreportefotografico.zip')) {
                $data['docsreportefotografico'] = "file-" . $maxnumbd . "-docsreportefotografico.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['docsreportefotografico'] = "";
        }


        /////////Mensaje del Funcionario a Ciudadano///////////////
        $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
        $this->email->subject('Autorización y uso de ocupación de la construcción.');

        $email = array(
            'contenido' => 'Su solicitud del trámite Autorización y uso de ocupación de la construcción ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
        );
        $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
        $this->email->message($body);
        $this->email->send();


        /////////Mensaje del Ciudadano a Funcionario///////////////
        $this->email->from($this->input->post('correodg', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('adela.garcia@irapuato.gob.mx');
        $this->email->subject('Autorización y uso de ocupación de la construcción');
        $this->email->message('Usted tiene un nuevo trámite Autorización y uso de ocupación de la construcción para poder revisar la solicitud del tramite entre a http://vuira.irapuato.gob.mx/');
        $this->email->send();



        $this->Ocupacion_de_construccion_model->insert($data);
        $this->session->set_flashdata('correcto', 'Tu Solicitud ha sido realizada con éxito');
        redirect(base_url('ocupacion_de_construccion'));
    }

    public function update($id) {
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata("tipo") == 11 || $this->session->userdata("tipo") == 111 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 166) {
            $row = $this->Ocupacion_de_construccion_model->get_by_id_admin($id);
        } else {
            $row = $this->Ocupacion_de_construccion_model->get_by_id($id);
        }

        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
        $resultveridicador = $this->Usuarios_model->getverificadores();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (6) ");

        if ($row) {
            $data = array(
                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'resultperitosesp' => $resultperitosesp,
                'resultverificador' => $resultveridicador,
                'button' => 'Actualizar',
                'action' => base_url('ocupacion_de_construccion/update_action'),
                'ID' => set_value('ID', $row->ID),
                'nombrepropietariodg' => set_value('nombrepropietariodg', $row->nombrepropietariodg),
                'nombresolicitantedg' => set_value('nombresolicitantedg', $row->nombresolicitantedg),
                'calledg' => set_value('calledg', $row->calledg),
                'numerodg' => set_value('numerodg', $row->numerodg),
                'coloniadg' => set_value('coloniadg', $row->coloniadg),
                'correodg' => set_value('correodg', $row->correodg),
                'telefonodg' => set_value('telefonodg', $row->telefonodg),
                'calleui' => set_value('calleui', $row->calleui),
                'nodeloteui' => set_value('nodeloteui', $row->nodeloteui),
                'manzanaui' => set_value('manzanaui', $row->manzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocolsui' => set_value('cbocolsui', $row->cbocolsui),
                'superficiepredioui' => set_value('superficiepredioui', $row->superficiepredioui),
                'superficieconstruidaui' => set_value('superficieconstruidaui', $row->superficieconstruidaui),
                'bardeoui' => set_value('bardeoui', $row->bardeoui),
                'nonivelesui' => set_value('nonivelesui', $row->nonivelesui),
                'nocajonesui' => set_value('nocajonesui', $row->nocajonesui),
                'noviviendasui' => set_value('noviviendasui', $row->noviviendasui),
                'porcentajeavanceui' => set_value('porcentajeavanceui', $row->porcentajeavanceui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombreperitodp' => set_value('nombreperitodp', $row->nombreperitodp),
                'noregistroperitodp' => set_value('noregistroperitodp', $row->noregistroperitodp),
                'telefonoperitodp' => set_value('telefonoperitodp', $row->telefonoperitodp),
                'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp', $row->nombreperitoresponsabledp),
                'noregistroresponsabledp' => set_value('noregistroresponsabledp', $row->noregistroresponsabledp),
                'telefonoresponsabledp' => set_value('telefonoresponsabledp', $row->telefonoresponsabledp),
                'docsbitacora' => set_value('docsbitacora', $row->docsbitacora),
                'docsplano' => set_value('docsplano', $row->docsplano),
                'docsvbuenofinales' => set_value('docsvbuenofinales', $row->docsvbuenofinales),
                'docspermisoconstruccion' => set_value('docspermisoconstruccion', $row->docspermisoconstruccion),
                'docsreportefotografico' => set_value('docsreportefotografico', $row->docsreportefotografico),
                'verificador' => set_value('verificador', $row->verificador),
                'fechaverificacion' => set_value('fechaverificacion', $row->fechaverificacion),
                'hora' => set_value('hora', $row->hora),
                'doctoverificador' => set_value('doctoverificador', $row->doctoverificador),
                'docspago' => set_value('docspago', $row->docspago),
                'docsfinal' => set_value('docsfinal', $row->docsfinal),
                'nocontroldp' => set_value('nocontroldp', $row->nocontroldp),
                'status' => set_value('status', $row->status),
                'superficieconstruirui' => set_value('superficieconstruirui', $row->superficieconstruirui),
                'user_id' => set_value('status', $row->user_id),
                'requiereverificador' => set_value('requiereverificador', $row->requiereverificador),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'clave' => set_value('clave', $row->clave),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'costo' => $costo->result(),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'observaciones' => set_value('observaciones', $row->observaciones),
            );
            if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 166) {
                $data['action'] = base_url('ocupacion_de_construccion/update_action_admin');
            } else {
                $data['action'] = base_url('ocupacion_de_construccion/update_action');
            }


            $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('ocupacion_de_construccion'));
            //echo "Redirect Ocupacion de construccion";
        }
    }

    public function update_autorizacion($id) {
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata("tipo") == 11 || $this->session->userdata("tipo") == 111 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 166) {
            $row = $this->Ocupacion_de_construccion_model->get_by_id_admin($id);
        } else {
            $row = $this->Ocupacion_de_construccion_model->get_by_id($id);
        }

        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
        $resultveridicador = $this->Usuarios_model->getverificadores();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (6) ");

        if ($row) {
            $data = array(
                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'resultperitosesp' => $resultperitosesp,
                'resultverificador' => $resultveridicador,
                'button' => 'Autorizar',
                'action' => base_url('ocupacion_de_construccion/autorizar_action'),
                'ID' => set_value('ID', $row->ID),
                'nombrepropietariodg' => set_value('nombrepropietariodg', $row->nombrepropietariodg),
                'nombresolicitantedg' => set_value('nombresolicitantedg', $row->nombresolicitantedg),
                'calledg' => set_value('calledg', $row->calledg),
                'numerodg' => set_value('numerodg', $row->numerodg),
                'coloniadg' => set_value('coloniadg', $row->coloniadg),
                'correodg' => set_value('correodg', $row->correodg),
                'telefonodg' => set_value('telefonodg', $row->telefonodg),
                'calleui' => set_value('calleui', $row->calleui),
                'nodeloteui' => set_value('nodeloteui', $row->nodeloteui),
                'manzanaui' => set_value('manzanaui', $row->manzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocolsui' => set_value('cbocolsui', $row->cbocolsui),
                'superficiepredioui' => set_value('superficiepredioui', $row->superficiepredioui),
                'superficieconstruidaui' => set_value('superficieconstruidaui', $row->superficieconstruidaui),
                'bardeoui' => set_value('bardeoui', $row->bardeoui),
                'nonivelesui' => set_value('nonivelesui', $row->nonivelesui),
                'nocajonesui' => set_value('nocajonesui', $row->nocajonesui),
                'noviviendasui' => set_value('noviviendasui', $row->noviviendasui),
                'porcentajeavanceui' => set_value('porcentajeavanceui', $row->porcentajeavanceui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombreperitodp' => set_value('nombreperitodp', $row->nombreperitodp),
                'noregistroperitodp' => set_value('noregistroperitodp', $row->noregistroperitodp),
                'telefonoperitodp' => set_value('telefonoperitodp', $row->telefonoperitodp),
                'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp', $row->nombreperitoresponsabledp),
                'noregistroresponsabledp' => set_value('noregistroresponsabledp', $row->noregistroresponsabledp),
                'telefonoresponsabledp' => set_value('telefonoresponsabledp', $row->telefonoresponsabledp),
                'docsbitacora' => set_value('docsbitacora', $row->docsbitacora),
                'docsplano' => set_value('docsplano', $row->docsplano),
                'docsvbuenofinales' => set_value('docsvbuenofinales', $row->docsvbuenofinales),
                'docspermisoconstruccion' => set_value('docspermisoconstruccion', $row->docspermisoconstruccion),
                'docsreportefotografico' => set_value('docsreportefotografico', $row->docsreportefotografico),
                'verificador' => set_value('verificador', $row->verificador),
                'fechaverificacion' => set_value('fechaverificacion', $row->fechaverificacion),
                'hora' => set_value('hora', $row->hora),
                'doctoverificador' => set_value('doctoverificador', $row->doctoverificador),
                'docspago' => set_value('docspago', $row->docspago),
                'docsfinal' => set_value('docsfinal', $row->docsfinal),
                'nocontroldp' => set_value('nocontroldp', $row->nocontroldp),
                'status' => set_value('status', $row->status),
                'superficieconstruirui' => set_value('superficieconstruirui', $row->superficieconstruirui),
                'user_id' => set_value('status', $row->user_id),
                'requiereverificador' => set_value('requiereverificador', $row->requiereverificador),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'clave' => set_value('clave', $row->clave),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'costo' => $costo->result(),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'observaciones' => set_value('observaciones', $row->observaciones),
            );


            $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_form_1', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('ocupacion_de_construccion'));
            //echo "Redirect Ocupacion de construccion";
        }
    }

    public function autorizar_action() {
        $maxnumbd = $this->input->post('ID', TRUE);
//die(print_r($maxnumbd));
        $data = array(
            'autorizacion' => '1'
        );
        //Tamaño Maximo de los Archivos 20 Megas
        //echo "Actualizar Usuario";
        $this->Ocupacion_de_construccion_model->update($this->input->post('ID', TRUE), $data);
        $this->session->set_flashdata('correcto', 'El trámite se modifico de manera correcta');
        redirect(base_url('permiso_anuncios/autorizacion'));
    }

    public function update_action() {
        $this->_rules();
		
		
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
			return;
        } else {
            $data = array(
                'nombrepropietariodg' => $this->input->post('nombrepropietariodg', TRUE),
                'nombresolicitantedg' => $this->input->post('nombresolicitantedg', TRUE),
                'calledg' => $this->input->post('calledg', TRUE),
                'numerodg' => $this->input->post('numerodg', TRUE),
                'coloniadg' => $this->input->post('coloniadg', TRUE),
                'correodg' => $this->input->post('correodg', TRUE),
                'telefonodg' => $this->input->post('telefonodg', TRUE),
                'calleui' => $this->input->post('calleui', TRUE),
                'nodeloteui' => $this->input->post('nodeloteui', TRUE),
                'manzanaui' => $this->input->post('manzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocolsui' => $this->input->post('cbocolsui', TRUE),
                'superficiepredioui' => $this->input->post('superficiepredioui', TRUE),
                'superficieconstruidaui' => $this->input->post('superficieconstruidaui', TRUE),
                'bardeoui' => $this->input->post('bardeoui', TRUE),
                'nonivelesui' => $this->input->post('nonivelesui', TRUE),
                'nocajonesui' => $this->input->post('nocajonesui', TRUE),
                'noviviendasui' => $this->input->post('noviviendasui', TRUE),
                'porcentajeavanceui' => $this->input->post('porcentajeavanceui', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'nombreperitodp' => $this->input->post('nombreperitodp', TRUE),
                'noregistroperitodp' => $this->input->post('noregistroperitodp', TRUE),
                'telefonoperitodp' => $this->input->post('telefonoperitodp', TRUE),
                'nombreperitoresponsabledp' => $this->input->post('nombreperitoresponsabledp', TRUE),
                'noregistroresponsabledp' => $this->input->post('noregistroresponsabledp', TRUE),
                'telefonoresponsabledp' => $this->input->post('telefonoresponsabledp', TRUE),
                'superficieconstruirui' => $this->input->post('superficieconstruirui', TRUE),
                'notificacion' => '1',
                'clave' => $this->input->post('clave', TRUE),
                'cuenta_predial' => $this->input->post('cuenta_predial', TRUE),
            );

            $maxnumbd = $this->input->post('ID', TRUE);

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;


            if (!empty($_FILES['docsbitacora']['tmp_name'][0])) {

                $numfiles = count($_FILES['docsbitacora']['tmp_name']);
                //Documentos Bitacora
//        die(print_r($numfiles,true));
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docsbitacora']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docsbitacora']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsbitacora.zip')) {
                    $data['docsbitacora'] = "file-" . $maxnumbd . "-docsbitacora.zip";
                }
//         die(print_r($data,true));
                $this->zip->clear_data();
                //echo "Entra al IF";
            }



            if (!empty($_FILES['docsplano']['tmp_name'][0])) {
                $numfiles = count($_FILES['docsplano']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docsplano']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docsplano']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsplano.zip')) {
                    $data['docsplano'] = "file-" . $maxnumbd . "-docsplano.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['docsvbuenofinales']['tmp_name'][0])) {
                $numfiles = count($_FILES['docsvbuenofinales']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docsvbuenofinales']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docsvbuenofinales']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsvbuenofinales.zip')) {
                    $data['docsvbuenofinales'] = "file-" . $maxnumbd . "-docsvbuenofinales.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['docspermisoconstruccion']['tmp_name'][0])) {
                $numfiles = count($_FILES['docspermisoconstruccion']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docspermisoconstruccion']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docspermisoconstruccion']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspermisoconstruccion.zip')) {
                    $data['docspermisoconstruccion'] = "file-" . $maxnumbd . "-docspermisoconstruccion.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            if (!empty($_FILES['docsreportefotografico']['tmp_name'][0])) {
                $numfiles = count($_FILES['docsreportefotografico']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docsreportefotografico']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docsreportefotografico']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsreportefotografico.zip')) {
                    $data['docsreportefotografico'] = "file-" . $maxnumbd . "-docsreportefotografico.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['docspago']['tmp_name'][0])) {
                $numfiles = count($_FILES['docspago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docspago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docspago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspago.zip')) {
                    $data['docspago'] = "file-" . $maxnumbd . "-docspago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
// die(print_r($_FILES,true));


			//////////Mensaje del Funcionario a Ciudadano///////////////
			$this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
			$this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
			$this->email->subject('Autorización y uso de ocupación de la construcción.');

			$email = array(
				'contenido' => 'Los datos del trámite PAutorización y uso de ocupación de la construcción han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.'
			);
			$body = $this->load->view('vista_email_tramite.php', $email, TRUE);
			$this->email->message($body);
			$this->email->send();

			/////////Mensaje del Ciudadano a Funcionario///////////////
			$this->email->from($this->input->post('correodg', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
			$this->email->to('adela.garcia@irapuato.gob.mx');
			$this->email->subject('Autorización y uso de ocupación de la construcción');
			$this->email->message('El trámite Permiso de Autorización y uso de ocupación de la construcción a nombre  de ' . $this->input->post('nombrepropietariodg', TRUE) . ', a sido actualizado, por favor revise la información para continuar con el proceso del trámite.');
			$this->email->send();




				$this->Ocupacion_de_construccion_model->update($this->input->post('ID', TRUE), $data);
				$this->session->set_flashdata('correcto', 'Tu Trámite ha sido modificado con éxito');
				redirect(base_url('ocupacion_de_construccion'));
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
        $maxnumbd = $this->input->post('ID', TRUE);

        //Tamaño Maximo de los Archivos 20 Megas
        $configzip = $config['max_size'] = "21504";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;



        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111) {
                $data = array(
                    //'verificador' => $this->input->post('verificador',TRUE),
                    //'fechaverificacion' => $this->input->post('fechaverificacion',TRUE),
                    //'hora' => $this->input->post('hora',TRUE),
                    'nocontroldp' => $this->input->post('nocontroldp', TRUE),
                    'mensaje' => $this->input->post('mensaje', TRUE),
                    'status' => $this->input->post('status', TRUE),
//                    'notificacion' => "0"
                );
            }

            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111) {
                $data['requiereverificador'] = $this->input->post('requiereverificador', TRUE);
                if ($this->input->post('requiereverificador', TRUE) == 1) {
                    $data['notificacion'] = "0";
                } else {
                    $data['notificacion'] = "0";
                }

                if ($this->input->post('requiereverificador', TRUE) == 1 && $this->input->post('status', TRUE) >= 4) {
                    $data['notificacion'] = "0";
                }
            }

            if ($this->session->userdata('tipo') == 16) {
                $data['verificador'] = $this->input->post('verificador', TRUE);
                $data['fechaverificacion'] = $this->input->post('fechaverificacion', TRUE);
                $data['hora'] = $this->input->post('hora', TRUE);
            }

            if ($this->session->userdata('tipo') == 166) {
                $data['notificacion'] = "1";
                //doctoverificador
                if (!empty($_FILES['doctoverificador']['tmp_name'][0])) {
                    $numfiles = count($_FILES['doctoverificador']['tmp_name']);

                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['doctoverificador']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['doctoverificador']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-doctoverificador.zip')) {
                        $data['doctoverificador'] = "file-" . $maxnumbd . "-doctoverificador.zip";
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
            }



            if ($this->input->post('status', TRUE) == 3) {
                $data['fechainicio'] = date("Y-m-d");
            }

            if ($this->input->post('status', TRUE) >= 5) {
                $data['fechafinal'] = date("Y-m-d");
            }

            //doctofinal
            if (!empty($_FILES['docsfinal']['tmp_name'][0])) {
                $numfiles = count($_FILES['docsfinal']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docsfinal']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docsfinal']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsfinal.zip')) {
                    $data['docsfinal'] = "file-" . $maxnumbd . "-docsfinal.zip";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            //doctopago
            if (!empty($_FILES['docspago']['tmp_name'][0])) {
                $numfiles = count($_FILES['docspago']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['docspago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['docspago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspago.zip')) {
                    $data['docspago'] = "file-" . $maxnumbd . "-docspago.zip";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
            $this->email->subject('Autorización y uso de ocupación de la construcción.');




            if ($this->input->post('status', TRUE) == 6) {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Autorización y uso de ocupación de la construcción a nombre  de ' . $this->input->post('nombrepropietariodg', TRUE) . ', ha sido Terminada.'
                );
            } elseif ($this->input->post('status', TRUE) == 5) {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Autorización y uso de ocupación de la construcción a nombre  de ' . $this->input->post('nombrepropietariodg', TRUE) . ', ha sido Cancelado.'
                );
            } else {
                if ($this->session->userdata('tipo') == 16) {
                    $email = array(
                        'contenido' => 'Se ha asignado un verificador el cual visitará el inmueble el dia ' . $this->input->post('fechaverificacion', TRUE) . ', a las ' . $this->input->post('hora', TRUE) . ' aproximadamente.'
                    );
                } elseif ($this->session->userdata('tipo') == 166) {
                    $email = array(
                        'contenido' => 'El verificador ha actualizado la información del predio, el trámite continuará con el proceso realizado por el funcionario encargado de su trámite'
                    );
                } else {
                    $email = array(
                        'contenido' => 'En su solicitud del trámite Autorización y uso de ocupación de la construcción a nombre  de ' . $this->input->post('nombrepropietariodg', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . ' favor de realizar los cambios correspondientes para continuar con el trámite.'
                    );
                }
            }


            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

            $this->Ocupacion_de_construccion_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'EL Trámite se modifico con éxito');
            redirect(base_url('ocupacion_de_construccion'));
        }
    }

    public function delete($id) {
        $row = $this->Ocupacion_de_construccion_model->get_by_id($id);

        if ($row) {
            $this->Ocupacion_de_construccion_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('ocupacion_de_construccion'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('ocupacion_de_construccion'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nombrepropietariodg', 'nombrepropietariodg', 'trim|required');
        $this->form_validation->set_rules('nombresolicitantedg', 'nombresolicitantedg', 'trim|required');
        $this->form_validation->set_rules('calledg', 'calledg', 'trim|required');
        $this->form_validation->set_rules('numerodg', 'numerodg', 'trim|required');
        $this->form_validation->set_rules('coloniadg', 'coloniadg', 'trim|required');
        $this->form_validation->set_rules('correodg', 'correodg', 'trim|required');
        $this->form_validation->set_rules('telefonodg', 'telefonodg', 'trim|required');
        $this->form_validation->set_rules('calleui', 'calleui', 'trim|required');
        $this->form_validation->set_rules('nodeloteui', 'nodeloteui', 'trim|required');
        $this->form_validation->set_rules('manzanaui', 'manzanaui', 'trim|required');
        $this->form_validation->set_rules('nooficialui', 'nooficialui', 'trim|required');
        $this->form_validation->set_rules('cbocolsui', 'cbocolsui', 'trim|required');
        $this->form_validation->set_rules('superficiepredioui', 'superficiepredioui', 'trim|required|numeric');
        $this->form_validation->set_rules('superficieconstruidaui', 'superficieconstruidaui', 'trim|required|numeric');
        $this->form_validation->set_rules('bardeoui', 'bardeoui', 'trim|required|numeric');
        $this->form_validation->set_rules('nonivelesui', 'nonivelesui', 'trim|required');
        $this->form_validation->set_rules('nocajonesui', 'nocajonesui', 'trim|required');
        $this->form_validation->set_rules('noviviendasui', 'noviviendasui', 'trim|required');
        $this->form_validation->set_rules('porcentajeavanceui', 'porcentajeavanceui', 'trim|required');
        $this->form_validation->set_rules('mapa', 'mapa', 'trim|required');
        $this->form_validation->set_rules('nombreperitodp', 'nombreperitodp', 'trim|required');
        $this->form_validation->set_rules('noregistroperitodp', 'noregistroperitodp', 'trim|required');
        $this->form_validation->set_rules('telefonoperitodp', 'telefonoperitodp', 'trim|required');
        $this->form_validation->set_rules('nombreperitoresponsabledp', 'nombreperitoresponsabledp', 'trim|required');
        $this->form_validation->set_rules('noregistroresponsabledp', 'noregistroresponsabledp', 'trim|required');
        $this->form_validation->set_rules('telefonoresponsabledp', 'telefonoresponsabledp', 'trim|required');
        $this->form_validation->set_rules('docsbitacora', 'docsbitacora', 'trim|required');
        $this->form_validation->set_rules('docsplano', 'docsplano', 'trim|required');
        $this->form_validation->set_rules('docsvbuenofinales', 'docsvbuenofinales', 'trim|required');
        $this->form_validation->set_rules('docspermisoconstruccion', 'docspermisoconstruccion', 'trim|required');
        $this->form_validation->set_rules('docsreportefotografico', 'docsreportefotografico', 'trim|required');
        $this->form_validation->set_rules('docspago', 'docspago', 'trim|required');
        $this->form_validation->set_rules('docsfinal', 'docsfinal', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user id', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');


        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesupdate() {

        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function realizarpago($id) {

        if ($this->session->userdata('tipo') == 12 || $this->session->userdata("tipo") == 11 || $this->session->userdata("tipo") == 111 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 166) {
            $row = $this->Ocupacion_de_construccion_model->get_by_id_admin($id);
        } else {
            $row = $this->Ocupacion_de_construccion_model->get_by_id($id);
        }

        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
        $resultveridicador = $this->Usuarios_model->getverificadores();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (6) ");

        if ($row) {
            $data = array(
                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'resultperitosesp' => $resultperitosesp,
                'resultverificador' => $resultveridicador,
                'button' => 'Actualizar',
                'action' => base_url('ocupacion_de_construccion/vistapago_action'),
                'ID' => set_value('ID', $row->ID),
                'nombrepropietariodg' => set_value('nombrepropietariodg', $row->nombrepropietariodg),
                'nombresolicitantedg' => set_value('nombresolicitantedg', $row->nombresolicitantedg),
                'calledg' => set_value('calledg', $row->calledg),
                'numerodg' => set_value('numerodg', $row->numerodg),
                'coloniadg' => set_value('coloniadg', $row->coloniadg),
                'correodg' => set_value('correodg', $row->correodg),
                'telefonodg' => set_value('telefonodg', $row->telefonodg),
                'calleui' => set_value('calleui', $row->calleui),
                'nodeloteui' => set_value('nodeloteui', $row->nodeloteui),
                'manzanaui' => set_value('manzanaui', $row->manzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocolsui' => set_value('cbocolsui', $row->cbocolsui),
                'superficiepredioui' => set_value('superficiepredioui', $row->superficiepredioui),
                'superficieconstruidaui' => set_value('superficieconstruidaui', $row->superficieconstruidaui),
                'bardeoui' => set_value('bardeoui', $row->bardeoui),
                'nonivelesui' => set_value('nonivelesui', $row->nonivelesui),
                'nocajonesui' => set_value('nocajonesui', $row->nocajonesui),
                'noviviendasui' => set_value('noviviendasui', $row->noviviendasui),
                'porcentajeavanceui' => set_value('porcentajeavanceui', $row->porcentajeavanceui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombreperitodp' => set_value('nombreperitodp', $row->nombreperitodp),
                'noregistroperitodp' => set_value('noregistroperitodp', $row->noregistroperitodp),
                'telefonoperitodp' => set_value('telefonoperitodp', $row->telefonoperitodp),
                'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp', $row->nombreperitoresponsabledp),
                'noregistroresponsabledp' => set_value('noregistroresponsabledp', $row->noregistroresponsabledp),
                'telefonoresponsabledp' => set_value('telefonoresponsabledp', $row->telefonoresponsabledp),
                'docsbitacora' => set_value('docsbitacora', $row->docsbitacora),
                'docsplano' => set_value('docsplano', $row->docsplano),
                'docsvbuenofinales' => set_value('docsvbuenofinales', $row->docsvbuenofinales),
                'docspermisoconstruccion' => set_value('docspermisoconstruccion', $row->docspermisoconstruccion),
                'docsreportefotografico' => set_value('docsreportefotografico', $row->docsreportefotografico),
                'verificador' => set_value('verificador', $row->verificador),
                'fechaverificacion' => set_value('fechaverificacion', $row->fechaverificacion),
                'hora' => set_value('hora', $row->hora),
                'doctoverificador' => set_value('doctoverificador', $row->doctoverificador),
                'docspago' => set_value('docspago', $row->docspago),
                'docsfinal' => set_value('docsfinal', $row->docsfinal),
                'nocontroldp' => set_value('nocontroldp', $row->nocontroldp),
                'status' => set_value('status', $row->status),
                'superficieconstruirui' => set_value('superficieconstruirui', $row->superficieconstruirui),
                'user_id' => set_value('status', $row->user_id),
                'requiereverificador' => set_value('requiereverificador', $row->requiereverificador),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'clave' => set_value('clave', $row->clave),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'costo' => $costo->result(),
                'compro' => set_value('compro', $row->compro),
            );


            $this->load->view('ocupacion_de_construccion/ocupacion_de_construccion_pagos', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('ocupacion_de_construccion'));
            //echo "Redirect Ocupacion de construccion";
        }
    }

    public function vistapago_action() {

        if ($this->input->post()) {
            if ($_FILES['compro']['tmp_name'][0]) {
                $maxnumbd = $this->input->post('ID', TRUE);

                //Tamaño Maximo de los Archivos 20 Megas
                $configzip = $config['max_size'] = "21504";
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
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-compro.zip')) {
                        $data['compro'] = "file-" . $maxnumbd . "-compro.zip";
                        //echo "Guarda";
//                        die(print_r( $data['docspago'] ,true));
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
                $this->Ocupacion_de_construccion_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Pago recibido para su revisión');
                redirect(base_url('ocupacion_de_construccion'));
            } else {
                $this->session->set_flashdata('correcto', 'Antes de enviar pago debe adjuntar el comprobante de pago');
                redirect(base_url('ocupacion_de_construccion/realizarpago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function vpago($id = null) {
        if ($id) {

            if ($this->session->userdata('tipo') == 1000) {
                $data = array(
                    'valido_pago' => 1,
                    'notificacion' => 1,
                );
                $this->Ocupacion_de_construccion_model->update($id, $data);
                redirect(base_url('vitas_pagot'));
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function observaciones($id = null) {
        if ($id) {

            if ($this->input->is_ajax_request()) {

                $data = array(
                    'notificacion' => 1,
                    'observaciones' => $this->input->post('obs', TRUE),
                );
//                die(print_r($sdata));
                $this->Ocupacion_de_construccion_model->update($id, $data);
                $this->session->set_flashdata('correcto', 'Las observaciones fueron enviadas correctamente');
                echo 1;
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function check() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $row = $this->Ocupacion_de_construccion_model->get_by_id_admin($id);
//            die(print_r($row,true));
            if ($row->docspago != "") {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            show_404();
        }
    }

}

/* End of file Ocupacion_de_construccion.php */
/* Ubicacion: ./application/controllers/Ocupacion_de_construccion.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-07-09 20:25:50 */
/* http://www.ga-asociados.com */