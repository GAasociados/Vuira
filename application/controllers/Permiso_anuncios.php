<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permiso_anuncios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Permiso_anuncios_model');
        $this->load->model('Permiso_anuncios_adosados_model');
        $this->load->model('Ocupacion_de_construccion_model');
        $this->load->library('form_validation');
        $this->load->model('Colonias_model');
        $this->load->model("Peritos_model");
        $this->load->model("Ccbd_model");
        $this->load->model("Usuarios_model");
        $this->load->model("Calles_japami_model");
        $this->load->library('zip');
    }

    public function pago($id = null) {
        if ($id) {
            $row = $this->Permiso_anuncios_model->get_by_id($id);
//            die(print_r($row,true));
            if ($row && $row->usuarioID === $this->session->userdata('id') && $row->status === "4") {
                $data['concepto'] = "Solicitud de pago de Permisos de anuncios";
                $data['des'] = "Pago de Permisos de anuncios";

//              $row->total_pago = trim("".$row->total_pago,',');


                $pagar = explode(',', $row->total_pago);
                $pagos = "";
                foreach ($pagar as $pa) {
                    $pagos = $pagos . $pa;
                }

                $data['importe'] = $pagos;

                $data['ref'] = "004";
                $data['id'] = "permiso_anuncios/update/" . $id;
                $this->load->view('pago', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
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

    public function verificar() {

        if ($this->input->is_ajax_request()) {
            $predial = $this->input->post('clave');
            require_once(APPPATH . 'libraries/lib/nusoap.php'); //includes nusoap 

            $cliente = new nusoap_client("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", true);


            //Use basic authentication method
            $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");
//            die(print_r($cliente,true));
            $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '' . $predial);
            $respuesta = $cliente->call("Consulta", $parametros);

            $respuesta = json_decode($respuesta, true);

//              echo json_encode($respuesta);
            /*
            if ($respuesta) {
                echo json_encode($respuesta);
            } else {
                echo "0";
            }
             */
            
            /*
             * respuesta === "0"
             *  NO EXISTE LA CUENTA PREDIAL POR LO QUE EL TRÁMITE NO CONTINÚA
             * respuesta === "1"
             *  SI EXISTE LA CUENTA PREDIAL POR LO QUE EL TRÁMITE SI CONTINÚA.
             *  PARA LOS TRÁMITES DE DGDT (Anuncios Autosoportados, Adozados y Terminación de Obra), 
             *  SE VALIDA SI EXISTE TRÁMITE VIGENTE PARA LA CUENTA PREDIAL. SI PARA LA
             *  CUENTA PREDIAL NO EXISTE TRÁMITE VIGENTE SE REGRESA ESTE VALOR.
             * respuesta === "2"
             *  PARA LOS TRÁMITES DE DGDT (Anuncios Autosoportados, Adozados y Terminación de Obra), 
             *  SE VALIDA SI EXISTE TRÁMITE VIGENTE PARA LA CUENTA PREDIAL. SI PARA LA
             *  CUENTA PREDIAL EXISTE TRÁMITE VIGENTE SE REGRESA ESTE VALOR.
            */
            if ($respuesta) {
                // Validar si existe Trámite Vigente para el predio
                // Trámites de DGDT
                $validar_tramite_vigente_DGDT = $this->input->post('validar_tramite_vigente_DGDT');
                $validar_tramite_vigente_DGDT_Permiso = $this->input->post('validar_tramite_vigente_DGDT_Permiso');
                
                if($validar_tramite_vigente_DGDT === "1"){
                    $isTramiteVigente = $this->Permiso_anuncios_model->is_tramite_vigente_DGDT($validar_tramite_vigente_DGDT_Permiso, $predial);
                    
                    if($isTramiteVigente == 1){
                        echo 2;
                    }
                    else {
                        echo 1;
                    }
                }
                else{
                    echo 1;
                }
            } else {
                echo 0;
            }
        } else {
            show_404();
        }
    }

    public function check() {

        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $row = $this->Permiso_anuncios_model->get_by_id_admin($id);
            if ($row->doctopago != "") {


                echo 1;
            } else {
                echo 0;
            }
        } else {
            show_404();
        }
    }

    public function asignacion() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'permiso_anuncios/asignacion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permiso_anuncios/asignacion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permiso_anuncios/asignacion';
            $config['first_url'] = base_url() . 'permiso_anuncios/asignacion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;

//        $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data($config['per_page'], $start, $q);
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) {
            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows_admin($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data_admin_admin($config['per_page'], $start, $q);
        } else {
            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows_user($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data($config['per_page'], $start, $q);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios_permisos();
        $data = array(
            'permiso_anuncios_data' => $permiso_anuncios,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );

        $this->load->view('permiso_anuncios/permiso_anuncios_list_asig', $data);
    }

    public function autorizacion() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'permiso_anuncios/autorizacion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permiso_anuncios/autorizacion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permiso_anuncios/autorizacion';
            $config['first_url'] = base_url() . 'permiso_anuncios/autorizacion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;

//        $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data($config['per_page'], $start, $q);
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) {

            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows_admin_aut($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data_admin_admin_aut($config['per_page'], $start, $q);
        } else {

            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows_user($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data($config['per_page'], $start, $q);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios_permisos();
        $data = array(
            'permiso_anuncios_data' => $permiso_anuncios,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );

        $this->load->view('permiso_anuncios/permiso_anuncios_list_1', $data);
    }

    public function index() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'permiso_anuncios?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permiso_anuncios?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permiso_anuncios';
            $config['first_url'] = base_url() . 'permiso_anuncios';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows_fun($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data_admin_fun($config['per_page'], $start, $q);
        }
//        $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data($config['per_page'], $start, $q);
        elseif ($this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) {

            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data_admin($config['per_page'], $start, $q);
        } else {
            $config['total_rows'] = $this->Permiso_anuncios_model->total_rows_user($q);
            $permiso_anuncios = $this->Permiso_anuncios_model->get_limit_data($config['per_page'], $start, $q);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permiso_anuncios_data' => $permiso_anuncios,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('permiso_anuncios/permiso_anuncios_list', $data);
    }

    public function reportes() {
        $this->load->view('permiso_anuncios/permiso_anuncios_reportes');
    }

    public function elegir_perito() {
        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitosespecializados();
        $CLAVE = $this->input->post('clave');
        $data = array(
            'action' => base_url('permiso_anuncios/create'),
            'clave' => $CLAVE,
            'consulta' => $result,
            'resultperitos' => $resultperitos
        );

        $this->load->view('permiso_anuncios/elegir_perito', $data);
    }

    public function clave() {

        $data['vista'] = 'permiso_anuncios/elegir_perito';
        $data['validar_tramite_vigente_DGDT'] = "1";
        $data['validar_tramite_vigente_DGDT_Permiso'] = "anuncios_autosoportados";
        $data['is_DGDT_no_obligatorio_predial'] = "1";
        $data['vista_DGDT_no_obligatorio_predial'] = 'permiso_anuncios/create_sin_predial';
        $this->load->view('permiso_anuncios/clave_catastral_form', $data);
    }

    public function reportefinal() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);

        $permiso_anuncios = $this->Permiso_anuncios_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status);

        $data = array(
            'permiso_anuncios_data' => $permiso_anuncios,
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );

        //print_r($data);
        $this->load->view('permiso_anuncios/permiso_anuncios_reportefinal', $data);
    }

    public function read($id) {
        $row = $this->Permiso_anuncios_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'nombrepropietarioinmuebledg' => $row->nombrepropietarioinmuebledg,
                'nombrepropietarioanunciodg' => $row->nombrepropietarioanunciodg,
                'calledg' => $row->calledg,
                'numerodg' => $row->numerodg,
                'coloniadg' => $row->coloniadg,
                'correodg' => $row->correodg,
                'telefonodg' => $row->telefonodg,
                'calleui' => $row->calleui,
                'noloteui' => $row->noloteui,
                'nomanzanaui' => $row->nomanzanaui,
                'nooficialui' => $row->nooficialui,
                'cbocoloniaui' => $row->cbocoloniaui,
                'superficiepredioui' => $row->superficiepredioui,
                'superficieconstruidaui' => $row->superficieconstruidaui,
                'nonivelesui' => $row->nonivelesui,
                'nombreperitodp' => $row->nombreperitodp,
                'noregistroperitodp' => $row->noregistroperitodp,
                'telefonoperitodp' => $row->telefonoperitodp,
                'nombreperitoresponsabledp' => $row->nombreperitoresponsabledp,
                'correoresponsabledp' => $row->correoresponsabledp,
                'noregistroresponsabledp' => $row->noregistroresponsabledp,
                'telefonoresponsabledp' => $row->telefonoresponsabledp,
                'fechaentrega' => $row->fechaentrega,
                'nocontrol' => $row->nocontrol,
                'doctopermisousosuelo' => $row->doctopermisousosuelo,
                'doctoplanosavaladosperito' => $row->doctoplanosavaladosperito,
                'doctoactaconstitutiva' => $row->doctoactaconstitutiva,
                'doctofotografico' => $row->doctofotografico,
                'doctopolizafianza' => $row->doctopolizafianza,
                'doctopago' => $row->doctopago,
                'doctofinal' => $row->doctofinal,
                'mensaje' => $row->mensaje,
                'usuarioID' => $row->usuarioID,
                'status' => $row->status,
            );
            $this->load->view('permiso_anuncios/permiso_anuncios_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios'));
        }
    }

    public function create() {
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
//        $CLAVE = $this->input->post('clave');
//        $datos = $this->Ccbd_model->get_all_data($CLAVE);C}
//        die(print_r($datos['CUENTA_PREDIAL_ID'],true));
        $id_perito = $this->input->post('perito_id');
        $correoresponsabledp = $this->input->post('correoperitodp');
        $datos = $this->datospredial($this->input->post('clave'));
        if (isset($datos['CALLE_ID'])) {
            $datos['CALLE_ID'] = trim($datos['CALLE_ID'], '0');
            $datos['CALLE_ID'] = trim($datos['CALLE_ID']);
            $CALLE = $this->Calles_japami_model->getcallepredialbyid($datos['CALLE_ID']);
//           
            $datos['CALLE_ID'] = $CALLE->nombre;
        }
        if (isset($datos['COLONIA_ID'])) {
            $datos['COLONIA_ID'] = trim($datos['COLONIA_ID'], '0');
            $datos['COLONIA_ID'] = trim($datos['COLONIA_ID']);
        }
//        $datos['LOTE'] ="";
//         DIE(PRINT_R($datos,TRUE));
        $data = array(
            'consulta' => $result,
            'resultperitos' => $resultperitos,
            'resultperitosesp' => $resultperitosesp,
            'button' => 'Solicitar Trámite',
            'action' => base_url('permiso_anuncios/create_action'),
            'ID' => set_value('ID'),
            'nombrepropietarioinmuebledg' => $datos['NOMBRE'] . " " . $datos['APELLIDO_PATERNO'] . " " . $datos['APELLIDO_MATERNO'],
            'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg'),
            'calledg' => $datos['CALLE_ID'],
            'numerodg' => $datos['NO_EXTERIOR'],
            'mapa' => set_value('mapa'),
            'coloniadg' => $datos['COLONIA_ID'],
            'correodg' => set_value('correodg'),
            'telefonodg' => set_value('telefonodg'),
            'calleui' => $datos['CALLE_ID'],
            'noloteui' => isset($datos['LOTE']) == 1 ? $datos['LOTE'] : "",
            'nomanzanaui' => isset($datos['MANZANA']) == 1 ? $datos['MANZANA'] : "",
            'nooficialui' => $datos['NO_EXTERIOR'],
            'cbocoloniaui' => $datos['COLONIA_ID'],
            'superficiepredioui' => set_value('superficiepredioui'),
            'superficieconstruidaui' => set_value('superficieconstruidaui'),
            'nonivelesui' => set_value('nonivelesui'),
            'nombreperitoresponsabledp' => $id_perito,
            'correoresponsabledp' => $correoresponsabledp,
            'noregistroresponsabledp' => set_value('noregistroresponsabledp'),
            'telefonoresponsabledp' => set_value('telefonoresponsabledp'),
            'fechaentrega' => set_value('fechaentrega'),
            'nocontrol' => set_value('nocontrol'),
            'doctopermisousosuelo' => set_value('doctopermisousosuelo'),
            'doctoplanosavaladosperito' => set_value('doctoplanosavaladosperito'),
            'doctoactaconstitutiva' => set_value('doctoactaconstitutiva'),
            'doctofotografico' => set_value('doctofotografico'),
            'doctopolizafianza' => set_value('doctopolizafianza'),
            'doctopago' => set_value('doctopago'),
            'bitacora' => set_value('bitacora'),
            'doctofinal' => set_value('doctofinal'),
            'mensaje' => set_value('mensaje'),
            'usuarioID' => set_value('usuarioID'),
            'verificador' => set_value('verificador'),
            'fechaverificacion' => set_value('fechaverificacion'),
            'hora' => set_value('hora'),
            'requiereverificador' => set_value('requiereverificador'),
            'status' => set_value('status'),
            'carteleras' => set_value('carteleras'),
            'altura' => set_value('altura'),
            'dimenciones' => set_value('dimenciones'),
            'referente' => set_value('referente'),
            'poliza' => set_value('poliza'),
            //'clavecat' => set_value('clavecat'),
            'clavecat' => $datos['CLAVE_CATASTRAL'],
            'cuenta_predial' => $datos['CUENTA_PREDIAL'],
            'renovacion' => "",
            'valido_pago' => set_value('valido_pago'),
            'observaciones' => set_value('observaciones'),
			'rfcdg' => set_value('rfcdg'),
			'recdg' => set_value('recdg'),
        );
        $this->load->view('permiso_anuncios/permiso_anuncios_form', $data);
    }
    public function create_sin_predial() {
        $result = $this->Colonias_model->getcoloniaspredial();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        $id_perito = $this->input->post('perito_id');

        $data = array(
            'consulta' => $result,
            'resultperitos' => $resultperitos,
            'resultperitosesp' => $resultperitosesp,
            'button' => 'Solicitar Trámite',
            'action' => base_url('permiso_anuncios/create_action'),
            'ID' => set_value('ID'),
            'nombrepropietarioinmuebledg' => set_value('nombrepropietarioinmuebledg'),
            'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg'),
            'calledg' => set_value('calledg'),
            'numerodg' => set_value('numerodg'),
            'mapa' => set_value('mapa'),
            'coloniadg' => set_value('coloniadg'),
            'correodg' => set_value('correodg'),
            'telefonodg' => set_value('telefonodg'),
            'calleui' => set_value('calleui'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocoloniaui' => set_value('cbocoloniaui'),
            'superficiepredioui' => set_value('superficiepredioui'),
            'superficieconstruidaui' => set_value('superficieconstruidaui'),
            'nonivelesui' => set_value('nonivelesui'),
            'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp'),
            'correoresponsabledp' => set_value('correoresponsabledp'),
            'noregistroresponsabledp' => set_value('noregistroresponsabledp'),
            'telefonoresponsabledp' => set_value('telefonoresponsabledp'),
            'fechaentrega' => set_value('fechaentrega'),
            'nocontrol' => set_value('nocontrol'),
            'doctopermisousosuelo' => set_value('doctopermisousosuelo'),
            'doctoplanosavaladosperito' => set_value('doctoplanosavaladosperito'),
            'doctoactaconstitutiva' => set_value('doctoactaconstitutiva'),
            'doctofotografico' => set_value('doctofotografico'),
            'doctopolizafianza' => set_value('doctopolizafianza'),
            'doctopago' => set_value('doctopago'),
            'bitacora' => set_value('bitacora'),
            'doctofinal' => set_value('doctofinal'),
            'mensaje' => set_value('mensaje'),
            'usuarioID' => set_value('usuarioID'),
            'verificador' => set_value('verificador'),
            'fechaverificacion' => set_value('fechaverificacion'),
            'hora' => set_value('hora'),
            'requiereverificador' => set_value('requiereverificador'),
            'status' => set_value('status'),
            'carteleras' => set_value('carteleras'),
            'altura' => set_value('altura'),
            'dimenciones' => set_value('dimenciones'),
            'referente' => set_value('referente'),
            'poliza' => set_value('poliza'),
            'clavecat' => set_value('clavecat'),
            'cuenta_predial' => set_value('cuenta_predial'),
            'renovacion' => "",
            'valido_pago' => set_value('valido_pago'),
            'observaciones' => set_value('observaciones'),
			'rfcdg' => set_value('rfcdg'),
			'recdg' => set_value('recdg'),
        );
        $this->load->view('permiso_anuncios/permiso_anuncios_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == TRUE) {
            $this->create();
        } else {


            $maxnum = $this->Permiso_anuncios_model->getMaxItemByid();
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
            $configzip = $config['max_size'] = "40960";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;

            $data = array(
                'nombrepropietarioinmuebledg' => $this->input->post('nombrepropietarioinmuebledg', TRUE),
                'nombrepropietarioanunciodg' => $this->input->post('nombrepropietarioanunciodg', TRUE),
                'calledg' => $this->input->post('calledg', TRUE),
                'numerodg' => $this->input->post('numerodg', TRUE),
                'coloniadg' => $this->input->post('coloniadg', TRUE),
                'correodg' => $this->input->post('correodg', TRUE),
                'telefonodg' => $this->input->post('telefonodg', TRUE),
                'calleui' => $this->input->post('calleui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'superficiepredioui' => $this->input->post('superficiepredioui', TRUE),
                'superficieconstruidaui' => $this->input->post('superficieconstruidaui', TRUE),
                'nonivelesui' => $this->input->post('nonivelesui', TRUE),
                'nombreperitodp' => $this->input->post('nombreperitodp', TRUE),
                'noregistroperitodp' => $this->input->post('noregistroperitodp', TRUE),
                'telefonoperitodp' => $this->input->post('telefonoperitodp', TRUE),
                'nombreperitoresponsabledp' => $this->input->post('nombreperitoresponsabledp', TRUE),
                'noregistroresponsabledp' => $this->input->post('noregistroresponsabledp', TRUE),
                'correoresponsabledp' => $this->input->post('correoresponsabledp', TRUE),
                'telefonoresponsabledp' => $this->input->post('telefonoresponsabledp', TRUE),
                'usuarioID' => $this->session->userdata('id'),
                'status' => "1",
                'notificacion' => '1',
                'carteleras' => $this->input->post('carteleras', TRUE),
                'altura' => $this->input->post('altura', TRUE),
                'dimenciones' => $this->input->post('dimenciones', TRUE),
                'referente' => $this->input->post('referente', TRUE),
                'poliza' => $this->input->post('poliza', TRUE),
                'clavecat' => $this->input->post('clavecat', TRUE),
                'cuenta_predial' => $this->input->post('cuenta_predial', TRUE),
                'renovacion' => $this->input->post('renovacion', TRUE),
                'fechainicio' => date("Y-m-d"),
				'rfcdg' => $this->input->post('rfcdg', TRUE),
				'recdg' => $this->input->post('recdg', TRUE),
            );

            if (!empty($_FILES['doctopermisousosuelo']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopermisousosuelo']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopermisousosuelo']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopermisousosuelo']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctopermisousosuelo.zip')) {
                    $data['doctopermisousosuelo'] = "file-" . $maxnumbd . "-doctopermisousosuelo.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctopermisousosuelo'] = "";
            }

            if (!empty($_FILES['bitacora']['tmp_name'][0])) {
                $numfiles = count($_FILES['bitacora']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['bitacora']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['bitacora']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-bitacora.zip')) {
                    $data['bitacora'] = "file-" . $maxnumbd . "-bitacora.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['bitacora'] = "";
            }

            //doctoplanosavaladosperito
            if (!empty($_FILES['doctoplanosavaladosperito']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoplanosavaladosperito']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoplanosavaladosperito']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoplanosavaladosperito']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctoplanosavaladosperito.zip')) {
                    $data['doctoplanosavaladosperito'] = "file-" . $maxnumbd . "-doctoplanosavaladosperito.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctoplanosavaladosperito'] = "";
            }




            //doctoactaconstitutiva
            if (!empty($_FILES['doctoactaconstitutiva']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoactaconstitutiva']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoactaconstitutiva']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoactaconstitutiva']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctoactaconstitutiva.zip')) {
                    $data['doctoactaconstitutiva'] = "file-" . $maxnumbd . "-doctoactaconstitutiva.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctoactaconstitutiva'] = "";
            }


            //doctofotografico
            if (!empty($_FILES['doctofotografico']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctofotografico']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctofotografico']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctofotografico']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctofotografico.zip')) {
                    $data['doctofotografico'] = "file-" . $maxnumbd . "-doctofotografico.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctofotografico'] = "";
            }


            //doctopolizafianza
            if (!empty($_FILES['doctopolizafianza']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopolizafianza']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopolizafianza']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopolizafianza']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctopolizafianza.zip')) {
                    $data['doctopolizafianza'] = "file-" . $maxnumbd . "-doctopolizafianza.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['doctopolizafianza'] = "";
            }



            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
            $this->email->subject('Permiso de Anuncios Autosoportados.');

            $email = array(
                'contenido' => 'Su solicitud del trámite Permiso de Anuncios Auto soportados ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();


            /////////Mensaje del Ciudadano a Funcionario///////////////
            $this->email->from($this->input->post('correodg', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to('adela.garcia@irapuato.gob.mx');
            $this->email->subject('Permiso de Anuncios Autosoportados');
            $this->email->message('Usted tiene un nuevo trámite Permiso de Anuncios Auto soportados para poder revisar la solicitud del trámite entre a http://vuira.irapuato.gob.mx/');
            $this->email->send();

            $this->Permiso_anuncios_model->insert($data);
            $this->session->set_flashdata('correcto', 'Su solicitud ha sido creada con éxito');
            redirect(base_url('permiso_anuncios'));
        }
    }

    public function update($id) {
        if ($this->session->userdata("tipo") == 12 || $this->session->userdata("tipo") == 122 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 166) {
            $row = $this->Permiso_anuncios_model->get_by_id_admin($id);
        } else {
            $row = $this->Permiso_anuncios_model->get_by_id($id);
        }

        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
        $resultveridicador = $this->Usuarios_model->getverificadores();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3) ");
        $constancia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (4) ");
        $costopordia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (7) ");
        $costoporanio = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (8) ");
        if ($row) {
            $data = array(
                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'resultperitosesp' => $resultperitosesp,
                'resultverificador' => $resultveridicador,
                'button' => 'Actualizar',
                'action' => base_url('permiso_anuncios/update_action'),
                'ID' => set_value('ID', $row->ID),
                'nombrepropietarioinmuebledg' => set_value('nombrepropietarioinmuebledg', $row->nombrepropietarioinmuebledg),
                'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg', $row->nombrepropietarioanunciodg),
                'calledg' => set_value('calledg', $row->calledg),
                'numerodg' => set_value('numerodg', $row->numerodg),
                'coloniadg' => set_value('coloniadg', $row->coloniadg),
                'correodg' => set_value('correodg', $row->correodg),
                'telefonodg' => set_value('telefonodg', $row->telefonodg),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'superficiepredioui' => set_value('superficiepredioui', $row->superficiepredioui),
                'superficieconstruidaui' => set_value('superficieconstruidaui', $row->superficieconstruidaui),
                'nonivelesui' => set_value('nonivelesui', $row->nonivelesui),
                'nombreperitodp' => set_value('nombreperitodp', $row->nombreperitodp),
                'noregistroperitodp' => set_value('noregistroperitodp', $row->noregistroperitodp),
                'telefonoperitodp' => set_value('telefonoperitodp', $row->telefonoperitodp),
                'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp', $row->nombreperitoresponsabledp),
                'correoresponsabledp' => set_value('correoresponsabledp', $row->correoresponsabledp),
                'noregistroresponsabledp' => set_value('noregistroresponsabledp', $row->noregistroresponsabledp),
                'telefonoresponsabledp' => set_value('telefonoresponsabledp', $row->telefonoresponsabledp),
                'fechaentrega' => set_value('fechaentrega', $row->fechaentrega),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'doctopermisousosuelo' => set_value('doctopermisousosuelo', $row->doctopermisousosuelo),
                'doctoplanosavaladosperito' => set_value('doctoplanosavaladosperito', $row->doctoplanosavaladosperito),
                'doctoactaconstitutiva' => set_value('doctoactaconstitutiva', $row->doctoactaconstitutiva),
                'doctofotografico' => set_value('doctofotografico', $row->doctofotografico),
                'doctopolizafianza' => set_value('doctopolizafianza', $row->doctopolizafianza),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'doctoverificador' => set_value('doctoverificador', $row->doctoverificador),
                'doctorfc' => set_value('doctorfc', $row->doctorfc),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'verificador' => set_value('verificador', $row->verificador),
                'fechaverificacion' => set_value('fechaverificacion', $row->fechaverificacion),
                'hora' => set_value('hora', $row->hora),
                'mapa' => set_value('mapa', $row->mapa),
                'requiereverificador' => set_value('requiereverificador', $row->requiereverificador),
                'status' => set_value('status', $row->status),
                'industrial' => set_value('industrial', $row->industrial),
                'servicios' => set_value('servicios', $row->servicios),
                'habitacional' => set_value('habitacional', $row->habitacional),
                'comercial' => set_value('comercial', $row->comercial),
                'mixto' => set_value('mixto', $row->mixto),
                'detalles_actividad' => set_value('detalles_actividad', $row->detalles_actividad),
                'superficie' => set_value('superficie', $row->superficie),
                'detalles_area' => set_value('detalles_area', $row->detalles_area),
                'ruido' => set_value('ruido', $row->ruido),
                'vibraciones' => set_value('vibraciones', $row->vibraciones),
                'humo' => set_value('humo', $row->humo),
                'olores' => set_value('olores', $row->olores),
                'otro' => set_value('otro', $row->otro),
                'esp_otro' => set_value('esp_otro', $row->esp_otro),
                'num_personas' => set_value('num_personas', $row->num_personas),
                'num_clientes' => set_value('num_clientes', $row->num_clientes),
                'horarios' => set_value('horarios', $row->horarios),
                'area_carga' => set_value('area_carga', $row->area_carga),
                'area_senia' => set_value('area_senia', $row->area_senia),
                'equipo' => set_value('equipo', $row->equipo),
                'flamable' => set_value('flamable', $row->flamable),
                'esp_flamable' => set_value('esp_flamable', $row->esp_flamable),
                'tipo1' => set_value('tipo1', $row->tipo1),
                'dim1' => set_value('dim1', $row->dim1),
                'tipo2' => set_value('tipo2', $row->tipo2),
                'dim2' => set_value('dim2', $row->dim2),
                'agua' => set_value('agua', $row->agua),
                'residuales' => set_value('residuales', $row->residuales),
                'solido' => set_value('solido', $row->solido),
                'otro_des' => set_value('otro_des', $row->otro_des),
                'esp_otro2' => set_value('esp_otro2', $row->esp_otro2),
                'carteleras' => set_value('carteleras', $row->carteleras),
                'altura' => set_value('altura', $row->altura),
                'dimenciones' => set_value('dimenciones', $row->dimenciones),
                'referente' => set_value('referente', $row->referente),
                'poliza' => set_value('poliza', $row->poliza),
                'clavecat' => set_value('clavecat', $row->clavecat),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'renovacion' => set_value('renovacion', $row->renovacion),
                'bitacora' => set_value('bitacora', $row->bitacora),
                'costos' => $costo,
                'cconstancia' => $constancia,
                'costopordia' => $costopordia,
                'costoporanio' => $costoporanio,
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'observaciones' => set_value('observaciones', $row->observaciones),
				'rfcdg' => set_value('rfcdg', $row->rfcdg),
				'recdg' => set_value('recdg', $row->recdg),
            );
            if ($row->renovacion == 1) {
                $costoreno = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (10) ");
                $data['costoreno'] = $costoreno;
            } else {
                $data['costoreno'] = "";
            }
            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) {
                $data['action'] = base_url('permiso_anuncios/update_action_admin');
            } else {
                $data['action'] = base_url('permiso_anuncios/update_action');
            }

            $this->load->view('permiso_anuncios/permiso_anuncios_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');

            echo "Redirect Permiso de Anuncios";
        }
    }

    public function update_autorizacion($id) {
        if ($this->session->userdata("tipo") == 12 || $this->session->userdata("tipo") == 122 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 166) {
            $row = $this->Permiso_anuncios_model->get_by_id_admin($id);
        } else {
            $row = $this->Permiso_anuncios_model->get_by_id($id);
        }

        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
        $resultveridicador = $this->Usuarios_model->getverificadores();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3) ");
        $constancia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (4) ");
        $costopordia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (7) ");
        $costoporanio = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (8) ");
        if ($row) {
            $data = array(
                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'resultperitosesp' => $resultperitosesp,
                'resultverificador' => $resultveridicador,
                'button' => 'Autorizar',
                'action' => base_url('permiso_anuncios/autorizar_action'),
                'ID' => set_value('ID', $row->ID),
                'nombrepropietarioinmuebledg' => set_value('nombrepropietarioinmuebledg', $row->nombrepropietarioinmuebledg),
                'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg', $row->nombrepropietarioanunciodg),
                'calledg' => set_value('calledg', $row->calledg),
                'numerodg' => set_value('numerodg', $row->numerodg),
                'coloniadg' => set_value('coloniadg', $row->coloniadg),
                'correodg' => set_value('correodg', $row->correodg),
                'telefonodg' => set_value('telefonodg', $row->telefonodg),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'superficiepredioui' => set_value('superficiepredioui', $row->superficiepredioui),
                'superficieconstruidaui' => set_value('superficieconstruidaui', $row->superficieconstruidaui),
                'nonivelesui' => set_value('nonivelesui', $row->nonivelesui),
                'nombreperitodp' => set_value('nombreperitodp', $row->nombreperitodp),
                'noregistroperitodp' => set_value('noregistroperitodp', $row->noregistroperitodp),
                'telefonoperitodp' => set_value('telefonoperitodp', $row->telefonoperitodp),
                'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp', $row->nombreperitoresponsabledp),
                'noregistroresponsabledp' => set_value('noregistroresponsabledp', $row->noregistroresponsabledp),
                'telefonoresponsabledp' => set_value('telefonoresponsabledp', $row->telefonoresponsabledp),
                'fechaentrega' => set_value('fechaentrega', $row->fechaentrega),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'doctopermisousosuelo' => set_value('doctopermisousosuelo', $row->doctopermisousosuelo),
                'doctoplanosavaladosperito' => set_value('doctoplanosavaladosperito', $row->doctoplanosavaladosperito),
                'doctoactaconstitutiva' => set_value('doctoactaconstitutiva', $row->doctoactaconstitutiva),
                'doctofotografico' => set_value('doctofotografico', $row->doctofotografico),
                'doctopolizafianza' => set_value('doctopolizafianza', $row->doctopolizafianza),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'doctoverificador' => set_value('doctoverificador', $row->doctoverificador),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'verificador' => set_value('verificador', $row->verificador),
                'fechaverificacion' => set_value('fechaverificacion', $row->fechaverificacion),
                'hora' => set_value('hora', $row->hora),
                'mapa' => set_value('mapa', $row->mapa),
                'requiereverificador' => set_value('requiereverificador', $row->requiereverificador),
                'status' => set_value('status', $row->status),
                'industrial' => set_value('industrial', $row->industrial),
                'servicios' => set_value('servicios', $row->servicios),
                'habitacional' => set_value('habitacional', $row->habitacional),
                'comercial' => set_value('comercial', $row->comercial),
                'mixto' => set_value('mixto', $row->mixto),
                'detalles_actividad' => set_value('detalles_actividad', $row->detalles_actividad),
                'superficie' => set_value('superficie', $row->superficie),
                'detalles_area' => set_value('detalles_area', $row->detalles_area),
                'ruido' => set_value('ruido', $row->ruido),
                'vibraciones' => set_value('vibraciones', $row->vibraciones),
                'humo' => set_value('humo', $row->humo),
                'olores' => set_value('olores', $row->olores),
                'otro' => set_value('otro', $row->otro),
                'esp_otro' => set_value('esp_otro', $row->esp_otro),
                'num_personas' => set_value('num_personas', $row->num_personas),
                'num_clientes' => set_value('num_clientes', $row->num_clientes),
                'horarios' => set_value('horarios', $row->horarios),
                'area_carga' => set_value('area_carga', $row->area_carga),
                'area_senia' => set_value('area_senia', $row->area_senia),
                'equipo' => set_value('equipo', $row->equipo),
                'flamable' => set_value('flamable', $row->flamable),
                'esp_flamable' => set_value('esp_flamable', $row->esp_flamable),
                'tipo1' => set_value('tipo1', $row->tipo1),
                'dim1' => set_value('dim1', $row->dim1),
                'tipo2' => set_value('tipo2', $row->tipo2),
                'dim2' => set_value('dim2', $row->dim2),
                'agua' => set_value('agua', $row->agua),
                'residuales' => set_value('residuales', $row->residuales),
                'solido' => set_value('solido', $row->solido),
                'otro_des' => set_value('otro_des', $row->otro_des),
                'esp_otro2' => set_value('esp_otro2', $row->esp_otro2),
                'carteleras' => set_value('carteleras', $row->carteleras),
                'altura' => set_value('altura', $row->altura),
                'dimenciones' => set_value('dimenciones', $row->dimenciones),
                'referente' => set_value('referente', $row->referente),
                'poliza' => set_value('poliza', $row->poliza),
                'clavecat' => set_value('clavecat', $row->clavecat),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'renovacion' => set_value('renovacion', $row->renovacion),
                'bitacora' => set_value('bitacora', $row->bitacora),
                'costos' => $costo,
                'cconstancia' => $constancia,
                'costopordia' => $costopordia,
                'costoporanio' => $costoporanio,
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'observaciones' => set_value('observaciones', $row->observaciones),
				'rfcdg' => set_value('rfcdg', $row->rfcdg),
				'recdg' => set_value('recdg', $row->recdg),
				);
            if ($row->renovacion == 1) {
                $costoreno = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (10) ");
                $data['costoreno'] = $costoreno;
            } else {
                $data['costoreno'] = "";
            }


            $this->load->view('permiso_anuncios/permiso_anuncios_form_1', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');

            echo "Redirect Permiso de Anuncios";
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
        $this->Permiso_anuncios_model->update($this->input->post('ID', TRUE), $data);
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
        } else {
            $data = array(
                'nombrepropietarioinmuebledg' => $this->input->post('nombrepropietarioinmuebledg', TRUE),
                'nombrepropietarioanunciodg' => $this->input->post('nombrepropietarioanunciodg', TRUE),
                'calledg' => $this->input->post('calledg', TRUE),
                'numerodg' => $this->input->post('numerodg', TRUE),
                'coloniadg' => $this->input->post('coloniadg', TRUE),
                'correodg' => $this->input->post('correodg', TRUE),
                'telefonodg' => $this->input->post('telefonodg', TRUE),
                'calleui' => $this->input->post('calleui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'superficiepredioui' => $this->input->post('superficiepredioui', TRUE),
                'superficieconstruidaui' => $this->input->post('superficieconstruidaui', TRUE),
                'nonivelesui' => $this->input->post('nonivelesui', TRUE),
                'nombreperitodp' => $this->input->post('nombreperitodp', TRUE),
                'noregistroperitodp' => $this->input->post('noregistroperitodp', TRUE),
                'telefonoperitodp' => $this->input->post('telefonoperitodp', TRUE),
                'nombreperitoresponsabledp' => $this->input->post('nombreperitoresponsabledp', TRUE),
                'noregistroresponsabledp' => $this->input->post('noregistroresponsabledp', TRUE),
                'telefonoresponsabledp' => $this->input->post('telefonoresponsabledp', TRUE),
                'notificacion' => '1'
            );


            $maxnumbd = $this->input->post('ID', TRUE);

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "40960";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;

            if (!empty($_FILES['doctopermisousosuelo']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopermisousosuelo']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopermisousosuelo']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopermisousosuelo']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctopermisousosuelo.zip')) {
                    $data['doctopermisousosuelo'] = "file-" . $maxnumbd . "-doctopermisousosuelo.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctorfc']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctorfc']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctorfc']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctorfc']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctorfc.zip')) {
                    $data['doctorfc'] = "file-" . $maxnumbd . "-doctorfc.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['bitacora']['tmp_name'][0])) {
                $numfiles = count($_FILES['bitacora']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['bitacora']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['bitacora']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-bitacora.zip')) {
                    $data['bitacora'] = "file-" . $maxnumbd . "-bitacora.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            //doctoplanosavaladosperito
            if (!empty($_FILES['doctoplanosavaladosperito']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoplanosavaladosperito']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoplanosavaladosperito']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoplanosavaladosperito']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctoplanosavaladosperito.zip')) {
                    $data['doctoplanosavaladosperito'] = "file-" . $maxnumbd . "-doctoplanosavaladosperito.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }






            //doctoactaconstitutiva
            if (!empty($_FILES['doctoactaconstitutiva']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoactaconstitutiva']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoactaconstitutiva']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoactaconstitutiva']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctoactaconstitutiva.zip')) {
                    $data['doctoactaconstitutiva'] = "file-" . $maxnumbd . "-doctoactaconstitutiva.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            //doctofotografico
            if (!empty($_FILES['doctofotografico']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctofotografico']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctofotografico']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctofotografico']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctofotografico.zip')) {
                    $data['doctofotografico'] = "file-" . $maxnumbd . "-doctofotografico.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            //doctopolizafianza
            if (!empty($_FILES['doctopolizafianza']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopolizafianza']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopolizafianza']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopolizafianza']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctopolizafianza.zip')) {
                    $data['doctopolizafianza'] = "file-" . $maxnumbd . "-doctopolizafianza.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            //doctopago
            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            //////////Mensaje del Funcionario a Ciudadano///////////////
            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
            $this->email->subject('Permiso de Anuncios Autosoportados.');

            $email = array(
                'contenido' => 'Los datos del trámite Permiso de Anuncios Autosoportados han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

            /////////Mensaje del Ciudadano a Funcionario///////////////
            $this->email->from($this->input->post('correodg', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to('adela.garcia@irapuato.gob.mx');
            $this->email->subject('Permiso de Anuncios Autosoportados');
            $this->email->message('El trámite Permiso de Anuncios Autosoportados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', a sido actualizado, por favor revise la información para continuar con el proceso del trámite.');
            $this->email->send();


            //echo "Actualizar Usuario";
            $this->Permiso_anuncios_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'El trámite se modifico de manera correcta');
            redirect(base_url('permiso_anuncios'));
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
        $configzip = $config['max_size'] = "40960";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;



        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {

            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                $data = array(
                    'fechaentrega' => $this->input->post('fechaentrega', TRUE),
                    'nocontrol' => $this->input->post('nocontrol', TRUE),
                    'mensaje' => $this->input->post('mensaje', TRUE),
                    'status' => $this->input->post('status', TRUE),
                        //'verificador' => $this->input->post('verificador',TRUE),
                        //'fechaverificacion' => $this->input->post('fechaverificacion',TRUE),
                        //'hora' => $this->input->post('hora',TRUE),
                        //'requiereverificador' => $this->input->post('requiereverificador',TRUE),
                );
            }

            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                $data['requiereverificador'] = $this->input->post('requiereverificador', TRUE);
                if ($this->input->post('requiereverificador', TRUE) == 1) {
                    $data['notificacion'] = "2";
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
                $data['industrial'] = $this->input->post('industrial', TRUE) == 1 ? "0" : "1";
                $data['servicios'] = $this->input->post('servicios', TRUE) == 1 ? "0" : "1";
                $data['habitacional'] = $this->input->post('habitacional', TRUE) == 1 ? "0" : "1";
                $data['comercial'] = $this->input->post('comercial', TRUE) == 1 ? "0" : "1";
                $data['mixto'] = $this->input->post('mixto', TRUE) == 1 ? "0" : "1";
                $data['detalles_actividad'] = $this->input->post('detalles_actividad', TRUE);
                $data['superficie'] = $this->input->post('superficie', TRUE);
                $data['detalles_area'] = $this->input->post('detalles_area', TRUE);
                $data['ruido'] = $this->input->post('ruido', TRUE) == 1 ? "0" : "1";
                $data['vibraciones'] = $this->input->post('vibraciones', TRUE) == 1 ? "0" : "1";
                $data['humo'] = $this->input->post('humo', TRUE) == 1 ? "0" : "1";
                $data['olores'] = $this->input->post('olores', TRUE) == 1 ? "0" : "1";
                $data['otro'] = $this->input->post('otro', TRUE) == 1 ? "0" : "1";
                $data['esp_otro'] = $this->input->post('esp_otro', TRUE);
                $data['num_personas'] = $this->input->post('num_personas', TRUE);
                $data['num_clientes'] = $this->input->post('num_clientes', TRUE);
                $data['horarios'] = $this->input->post('horarios', TRUE);
                $data['area_carga'] = $this->input->post('area_carga', TRUE) == 1 ? "0" : "1";
                $data['area_senia'] = $this->input->post('area_senia', TRUE) == 1 ? "0" : "1";
                $data['equipo'] = $this->input->post('equipo', TRUE) == 1 ? "0" : "1";
                $data['flamable'] = $this->input->post('flamable', TRUE) == 1 ? "0" : "1";
                $data['esp_flamable'] = $this->input->post('esp_flamable', TRUE);
                $data['tipo1'] = $this->input->post('tipo1', TRUE);
                $data['dim1'] = $this->input->post('dim1', TRUE);
                $data['tipo2'] = $this->input->post('tipo2', TRUE);
                $data['dim2'] = $this->input->post('dim2', TRUE);
                $data['agua'] = $this->input->post('agua', TRUE) == 1 ? "0" : "1";
                $data['residuales'] = $this->input->post('residuales', TRUE) == 1 ? "0" : "1";
                $data['solido'] = $this->input->post('solido', TRUE) == 1 ? "0" : "1";
                $data['otro_des'] = $this->input->post('otro_des', TRUE) == 1 ? "0" : "1";
                $data['esp_otro2'] = $this->input->post('esp_otro2', TRUE);

                //doctoverificador
                if (!empty($_FILES['doctoverificador']['tmp_name'][0])) {
                    $numfiles = count($_FILES['doctoverificador']['tmp_name']);

                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['doctoverificador']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['doctoverificador']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctoverificador.zip')) {
                        $data['doctoverificador'] = "file-" . $maxnumbd . "-doctoverificador.zip";
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
            }



            if ($this->input->post('status', TRUE) >= 5) {
                $data['fechafinal'] = date("Y-m-d");
            }

            //doctofinal
            if (!empty($_FILES['doctofinal']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctofinal']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctofinal']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctofinal']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctofinal.zip')) {
                    $data['doctofinal'] = "file-" . $maxnumbd . "-doctofinal.zip";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            //doctopago
            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);

                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }





            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
            $this->email->subject('Permiso de Anuncios Autosoportados.');




            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano $this->input->post('correo',TRUE)
            $this->email->subject('Permiso de Anuncios Autosoportados');

            if ($this->input->post('status', TRUE) == 6) {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Permiso de Anuncios Autosoportados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', ha sido Terminada.'
                );
            } elseif ($this->input->post('status', TRUE) == 5) {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Permiso de Anuncios Autosoportados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', ha sido Cancelada.'
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
                        'contenido' => 'En su solicitud del trámite Permiso de Anuncios Autosoportados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . ' favor de realizar los cambios correspondientes para continuar con el trámite.'
                    );
                }
            }

            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

            $this->Permiso_anuncios_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'su solicitud se modificó de manera correcta');
            redirect(base_url('permiso_anuncios'));
        }
    }

    public function delete($id) {
        $row = $this->Permiso_anuncios_model->get_by_id($id);

        if ($row) {
            $this->Permiso_anuncios_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('permiso_anuncios'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nombrepropietarioinmuebledg', 'nombrepropietarioinmuebledg', 'trim|required');
        $this->form_validation->set_rules('nombrepropietarioanunciodg', 'nombrepropietarioanunciodg', 'trim|required');
        $this->form_validation->set_rules('calledg', 'calledg', 'trim|required');
        $this->form_validation->set_rules('numerodg', 'numerodg', 'trim|required');
        $this->form_validation->set_rules('coloniadg', 'coloniadg', 'trim|required');
        $this->form_validation->set_rules('correodg', 'correodg', 'trim|required');
        $this->form_validation->set_rules('telefonodg', 'telefonodg', 'trim|required');
        $this->form_validation->set_rules('calleui', 'calleui', 'trim|required');
        $this->form_validation->set_rules('nooficialui', 'nooficialui', 'trim|required');
        $this->form_validation->set_rules('cbocoloniaui', 'cbocoloniaui', 'trim|required');
        $this->form_validation->set_rules('superficiepredioui', 'superficiepredioui', 'trim|required|numeric');
        $this->form_validation->set_rules('superficieconstruidaui', 'superficieconstruidaui', 'trim|required|numeric');
        $this->form_validation->set_rules('nonivelesui', 'nonivelesui', 'trim|required');
        $this->form_validation->set_rules('nombreperitodp', 'nombreperitodp', 'trim|required');
        $this->form_validation->set_rules('noregistroperitodp', 'noregistroperitodp', 'trim|required');
        $this->form_validation->set_rules('telefonoperitodp', 'telefonoperitodp', 'trim|required');
        $this->form_validation->set_rules('nombreperitoresponsabledp', 'nombreperitoresponsabledp', 'trim|required');
        $this->form_validation->set_rules('noregistroresponsabledp', 'noregistroresponsabledp', 'trim|required');
        $this->form_validation->set_rules('telefonoresponsabledp', 'telefonoresponsabledp', 'trim|required');
        $this->form_validation->set_rules('fechaentrega', 'fechaentrega', 'trim|required');
        $this->form_validation->set_rules('nocontrol', 'nocontrol', 'trim|required');
        $this->form_validation->set_rules('doctopermisousosuelo', 'doctopermisousosuelo', 'trim|required');
        $this->form_validation->set_rules('doctoplanosavaladosperito', 'doctoplanosavaladosperito', 'trim|required');
        $this->form_validation->set_rules('doctoactaconstitutiva', 'doctoactaconstitutiva', 'trim|required');
        $this->form_validation->set_rules('doctofotografico', 'doctofotografico', 'trim|required');
        $this->form_validation->set_rules('doctopolizafianza', 'doctopolizafianza', 'trim|required');
        $this->form_validation->set_rules('doctopago', 'doctopago', 'trim|required');
        $this->form_validation->set_rules('doctofinal', 'doctofinal', 'trim|required');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');

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

    public function realizarpago($id) {

        $row = $this->Permiso_anuncios_model->get_by_id($id);



        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();
        $resultveridicador = $this->Usuarios_model->getverificadores();
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3) ");
        $constancia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (4) ");
        $costopordia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (7) ");
        $costoporanio = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (8) ");
        if ($row) {
            $data = array(
//                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'resultperitosesp' => $resultperitosesp,
                'resultverificador' => $resultveridicador,
                'button' => 'Actualizar',
                'action' => base_url('permiso_anuncios/vistapago_action'),
                'ID' => set_value('ID', $row->ID),
                'nombrepropietarioinmuebledg' => set_value('nombrepropietarioinmuebledg', $row->nombrepropietarioinmuebledg),
                'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg', $row->nombrepropietarioanunciodg),
                'calledg' => set_value('calledg', $row->calledg),
                'numerodg' => set_value('numerodg', $row->numerodg),
                'coloniadg' => set_value('coloniadg', $row->coloniadg),
                'correodg' => set_value('correodg', $row->correodg),
                'telefonodg' => set_value('telefonodg', $row->telefonodg),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'superficiepredioui' => set_value('superficiepredioui', $row->superficiepredioui),
                'superficieconstruidaui' => set_value('superficieconstruidaui', $row->superficieconstruidaui),
                'nonivelesui' => set_value('nonivelesui', $row->nonivelesui),
                'nombreperitodp' => set_value('nombreperitodp', $row->nombreperitodp),
                'noregistroperitodp' => set_value('noregistroperitodp', $row->noregistroperitodp),
                'telefonoperitodp' => set_value('telefonoperitodp', $row->telefonoperitodp),
                'nombreperitoresponsabledp' => set_value('nombreperitoresponsabledp', $row->nombreperitoresponsabledp),
                'noregistroresponsabledp' => set_value('noregistroresponsabledp', $row->noregistroresponsabledp),
                'telefonoresponsabledp' => set_value('telefonoresponsabledp', $row->telefonoresponsabledp),
                'fechaentrega' => set_value('fechaentrega', $row->fechaentrega),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'doctopermisousosuelo' => set_value('doctopermisousosuelo', $row->doctopermisousosuelo),
                'doctoplanosavaladosperito' => set_value('doctoplanosavaladosperito', $row->doctoplanosavaladosperito),
                'doctoactaconstitutiva' => set_value('doctoactaconstitutiva', $row->doctoactaconstitutiva),
                'doctofotografico' => set_value('doctofotografico', $row->doctofotografico),
                'doctopolizafianza' => set_value('doctopolizafianza', $row->doctopolizafianza),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'doctoverificador' => set_value('doctoverificador', $row->doctoverificador),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'verificador' => set_value('verificador', $row->verificador),
                'fechaverificacion' => set_value('fechaverificacion', $row->fechaverificacion),
                'hora' => set_value('hora', $row->hora),
                'mapa' => set_value('mapa', $row->mapa),
                'requiereverificador' => set_value('requiereverificador', $row->requiereverificador),
                'status' => set_value('status', $row->status),
                'industrial' => set_value('industrial', $row->industrial),
                'servicios' => set_value('servicios', $row->servicios),
                'habitacional' => set_value('habitacional', $row->habitacional),
                'comercial' => set_value('comercial', $row->comercial),
                'mixto' => set_value('mixto', $row->mixto),
                'detalles_actividad' => set_value('detalles_actividad', $row->detalles_actividad),
                'superficie' => set_value('superficie', $row->superficie),
                'detalles_area' => set_value('detalles_area', $row->detalles_area),
                'ruido' => set_value('ruido', $row->ruido),
                'vibraciones' => set_value('vibraciones', $row->vibraciones),
                'humo' => set_value('humo', $row->humo),
                'olores' => set_value('olores', $row->olores),
                'otro' => set_value('otro', $row->otro),
                'esp_otro' => set_value('esp_otro', $row->esp_otro),
                'num_personas' => set_value('num_personas', $row->num_personas),
                'num_clientes' => set_value('num_clientes', $row->num_clientes),
                'horarios' => set_value('horarios', $row->horarios),
                'area_carga' => set_value('area_carga', $row->area_carga),
                'area_senia' => set_value('area_senia', $row->area_senia),
                'equipo' => set_value('equipo', $row->equipo),
                'flamable' => set_value('flamable', $row->flamable),
                'esp_flamable' => set_value('esp_flamable', $row->esp_flamable),
                'tipo1' => set_value('tipo1', $row->tipo1),
                'dim1' => set_value('dim1', $row->dim1),
                'tipo2' => set_value('tipo2', $row->tipo2),
                'dim2' => set_value('dim2', $row->dim2),
                'agua' => set_value('agua', $row->agua),
                'residuales' => set_value('residuales', $row->residuales),
                'solido' => set_value('solido', $row->solido),
                'otro_des' => set_value('otro_des', $row->otro_des),
                'esp_otro2' => set_value('esp_otro2', $row->esp_otro2),
                'carteleras' => set_value('carteleras', $row->carteleras),
                'altura' => set_value('altura', $row->altura),
                'dimenciones' => set_value('dimenciones', $row->dimenciones),
                'referente' => set_value('referente', $row->referente),
                'poliza' => set_value('poliza', $row->poliza),
                'clavecat' => set_value('clavecat', $row->clavecat),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'renovacion' => set_value('renovacion', $row->renovacion),
                'bitacora' => set_value('bitacora', $row->bitacora),
                'costos' => $costo,
                'cconstancia' => $constancia,
                'costopordia' => $costopordia,
                'costoporanio' => $costoporanio,
                'compro' => set_value('compro', $row->compro),
				'rfcdg' => set_value('rfcdg', $row->rfcdg),
				'recdg' => set_value('recdg', $row->recdg),
            );


            $this->load->view('permiso_anuncios/permiso_anuncios_pagos', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');

            echo "Redirect Permiso de Anuncios";
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
                    if ($this->zip->archive('./assets/tramites/permisosanunciosautosoportados/file-' . $maxnumbd . '-compro.zip')) {
                        $data['compro'] = "file-" . $maxnumbd . "-compro.zip";
                        //echo "Guarda";
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
                $this->Permiso_anuncios_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Pago recibido para su revisión');
                redirect(base_url('permiso_anuncios'));
            } else {
                $this->session->set_flashdata('correcto', 'Antes de enviar pago debe adjuntar el comprobante de pago');
                redirect(base_url('permiso_anuncios/realizarpago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function asignar_func() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);

        foreach ($id as $i) {
            $data = array(
                'func' => $this->input->post('auxiliar', TRUE),
            );
            $this->Permiso_anuncios_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        redirect(base_url('permiso_anuncios/asignacion'));
    }

    public function vitas_pagot() {
        $claves_catastrales_fraccionamiento = $this->Permiso_anuncios_model->get_limit_data_pagos();
//
        $claves_catastrales_individual = $this->Permiso_anuncios_adosados_model->get_limit_data_pagos();
//
        $claves_catastrales_individual_certificado = $this->Ocupacion_de_construccion_model->get_limit_data_pagos();
        $data = array(
            'claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
            'claves_catastrales_individual_data' => $claves_catastrales_individual,
            'claves_catastrales_individual_certificado_data' => $claves_catastrales_individual_certificado,
        );

        $this->load->view('ventana_pago_t', $data);
    }

    public function vpago($id = null) {
        if ($id) {

            if ($this->session->userdata('tipo') == 1000) {
                $data = array(
                    'valido_pago' => 1,
                    'notificacion' => 1,
                );
                $this->Permiso_anuncios_model->update($id, $data);
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
                $this->Permiso_anuncios_model->update($id, $data);
                $this->session->set_flashdata('correcto', 'Las observaciones fueron enviadas correctamente');
                echo 1;
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function reportespdf() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);

        $permiso_anuncios = $this->Permiso_anuncios_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status);

        $data = array(
            'permiso_anuncios_data' => $permiso_anuncios,
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );


        $html = $this->load->view('documentos/reportepermisosaununcios', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath1 = "ReportePermisos.pdf";

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

}

/* End of file Permiso_anuncios.php */
/* Ubicacion: ./application/controllers/Permiso_anuncios.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-06-04 21:03:54 */
/* http://www.ga-asociados.com */
