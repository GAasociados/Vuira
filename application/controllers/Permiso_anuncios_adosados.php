<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permiso_anuncios_adosados extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Permiso_anuncios_adosados_model');
        $this->load->library('form_validation');
        $this->load->model('Colonias_model');
        $this->load->model('Calles_japami_model');
        $this->load->model("Ccbd_model");
        $this->load->model("Usuarios_model");
        $this->load->library('zip');
    }

    public function pago($id = null) {
        if ($id) {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id($id);
//            die(print_r($row,true));
            if ($row && $row->usuarioID === $this->session->userdata('id') && $row->status === "4") {
                $data['concepto'] = "Solicitude de pago de Permisos de anuncios adosados";
                $data['des'] = "Pago de Permisos de anuncios adosados";

                $pagar = explode(',', $row->total_pago);
                $pagos = "";
                foreach ($pagar as $pa) {
                    $pagos = $pagos . $pa;
                }

                $data['importe'] = $pagos;
                $data['ref'] = "005";
                $data['id'] = "permiso_anuncios_adosados/update/" . $id;
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
            $config['base_url'] = base_url() . 'permiso_anuncios_adosados/asignacion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permiso_anuncios_adosados/asignacion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permiso_anuncios_adosados/asignacion';
            $config['first_url'] = base_url() . 'permiso_anuncios_adosados/asignacion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows($q);
        //$permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data($config['per_page'], $start, $q);
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
            $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows_admin($q);
            $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data_admin_admin($config['per_page'], $start, $q);
        } else {
            $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows_usuario($q);
            $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data($config['per_page'], $start, $q);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios_permisos();
        $data = array(
            'permiso_anuncios_adosados_data' => $permiso_anuncios_adosados,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_list_asig', $data);
    }

    public function autorizacion() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'permiso_anuncios_adosados/autorizacion?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permiso_anuncios_adosados/autorizacion?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permiso_anuncios_adosados/autorizacion';
            $config['first_url'] = base_url() . 'permiso_anuncios_adosados/autorizacion';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows_admin_aut($q);
        //$permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data($config['per_page'], $start, $q);

        $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows_admin($q);
        $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data_admin_admin_aut($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios_permisos();
        $data = array(
            'permiso_anuncios_adosados_data' => $permiso_anuncios_adosados,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_list_1', $data);
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'permiso_anuncios_adosados?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permiso_anuncios_adosados?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permiso_anuncios_adosados';
            $config['first_url'] = base_url() . 'permiso_anuncios_adosados';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows($q);
        //$permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data($config['per_page'], $start, $q);
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
            $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows_func($q);
            $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data_admin_func($config['per_page'], $start, $q);
        } else {
            $config['total_rows'] = $this->Permiso_anuncios_adosados_model->total_rows_usuario($q);
            $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_limit_data($config['per_page'], $start, $q);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permiso_anuncios_adosados_data' => $permiso_anuncios_adosados,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_list', $data);
    }

    public function reportes() {
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_reportes');
    }

    public function reportefinal() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);

        $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status);

        $data = array(
            'permiso_anuncios_adosados_data' => $permiso_anuncios_adosados,
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );

        //print_r($data);
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_reportefinal', $data);
    }

    public function clave() {

        $data['vista'] = 'permiso_anuncios_adosados/create';
        $data['validar_tramite_vigente_DGDT'] = "1";
        $data['validar_tramite_vigente_DGDT_Permiso'] = "anuncios_adosados";
        $data['is_DGDT_no_obligatorio_predial'] = "1";
        $data['vista_DGDT_no_obligatorio_predial'] = 'permiso_anuncios_adosados/create_sin_predial';
        $this->load->view('permiso_anuncios/clave_catastral_form', $data);
    }

    public function read($id) {
        $row = $this->Permiso_anuncios_adosados_model->get_by_id($id);
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
                'fechaentrega' => $row->fechaentrega,
                'nocontrol' => $row->nocontrol,
                'doctopermisousosuelo' => $row->doctopermisousosuelo,
                'doctofotografico' => $row->doctofotografico,
                'doctopago' => $row->doctopago,
                'doctofinal' => $row->doctofinal,
                'usuarioID' => $row->usuarioID,
                'status' => $row->status,
                'mensaje' => $row->mensaje,
            );
            $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios_adosados'));
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
        $result = $this->Colonias_model->getcoloniaspredial();
        $CLAVE = $this->input->post('clave');
        $datos = $this->datospredial($this->input->post('clave'));
        //$datos = json_decode($this->input->post('respuesta'), true);
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
            'button' => 'Solicitar Trámite',
            'action' => base_url('permiso_anuncios_adosados/create_action'),
            'ID' => set_value('ID'),
            'nombrepropietarioinmuebledg' => $datos['NOMBRE'] . " " . $datos['APELLIDO_PATERNO'] . " " . $datos['APELLIDO_MATERNO'],
            'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg'),
            'calledg' => $datos['CALLE_ID'],
            'numerodg' => $datos['NO_EXTERIOR'],
            'coloniadg' => $datos['COLONIA_ID'],
            'correodg' => $this->session->userdata('correo'),
            'telefonodg' => set_value('telefonodg'),
            'calleui' => $datos['CALLE_ID'],
            'noloteui' => isset($datos['LOTE']) == 1 ? $datos['LOTE'] : "",
            'nomanzanaui' => isset($datos['MANZANA']) == 1 ? $datos['MANZANA'] : "",
            'nooficialui' => $datos['NO_EXTERIOR'],
            'cbocoloniaui' => $datos['COLONIA_ID'],
            'superficiepredioui' => set_value('superficiepredioui'),
            'superficieconstruidaui' => set_value('superficieconstruidaui'),
            'nonivelesui' => set_value('nonivelesui'),
            'fechaentrega' => set_value('fechaentrega'),
            'nocontrol' => set_value('nocontrol'),
            'doctopermisousosuelo' => set_value('doctopermisousosuelo'),
            'doctofotografico' => set_value('doctofotografico'),
            'doctorfc' => set_value('doctorfc'),
            'doctorec' => set_value('doctorec'),
            'doctopago' => set_value('doctopago'),
            'doctofinal' => set_value('doctofinal'),
            'usuarioID' => set_value('usuarioID'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'carteleras' => set_value('carteleras'),
            'altura' => set_value('altura'),
            'dimenciones' => set_value('dimenciones'),
            'referente' => set_value('referente'),
            'poliza' => set_value('poliza'),
            //'clave' => $datos['CUENTA_PREDIAL'],
            'clave' => $datos['CLAVE_CATASTRAL'],
            'cuenta_predial' => $datos['CUENTA_PREDIAL'],
            'renovacion' => set_value('renovacion'),
            'valido_pago' => set_value('valido_pago'),
            'observaciones' => set_value('observaciones'),
            'rfcdg' => set_value('rfcdg'),
            'recdg' => set_value('recdg'),
        );
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_form', $data);
    }
    public function create_sin_predial() {
        $result = $this->Colonias_model->getcoloniaspredial();
        
        $data = array(
            'consulta' => $result,
            'button' => 'Solicitar Trámite',
            'action' => base_url('permiso_anuncios_adosados/create_action'),
            'ID' => set_value('ID'),
            'nombrepropietarioinmuebledg' => set_value('nombrepropietarioinmuebledg'),
            'nombrepropietarioanunciodg' => set_value('nombrepropietarioanunciodg'),
            'calledg' => set_value('calledg'),
            'numerodg' => set_value('numerodg'),
            'coloniadg' => set_value('coloniadg'),
            'correodg' => $this->session->userdata('correo'),
            'telefonodg' => set_value('telefonodg'),
            'calleui' => set_value('calleui'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocoloniaui' => set_value('cbocoloniaui'),
            'superficiepredioui' => set_value('superficiepredioui'),
            'superficieconstruidaui' => set_value('superficieconstruidaui'),
            'nonivelesui' => set_value('nonivelesui'),
            'fechaentrega' => set_value('fechaentrega'),
            'nocontrol' => set_value('nocontrol'),
            'doctopermisousosuelo' => set_value('doctopermisousosuelo'),
            'doctofotografico' => set_value('doctofotografico'),
            'doctorfc' => set_value('doctorfc'),
            'doctorec' => set_value('doctorec'),
            'doctopago' => set_value('doctopago'),
            'doctofinal' => set_value('doctofinal'),
            'usuarioID' => set_value('usuarioID'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'carteleras' => set_value('carteleras'),
            'altura' => set_value('altura'),
            'dimenciones' => set_value('dimenciones'),
            'referente' => set_value('referente'),
            'poliza' => set_value('poliza'),
            'clave' => set_value('clave'),
            'cuenta_predial' => set_value('cuenta_predial'),
            'renovacion' => set_value('renovacion'),
            'valido_pago' => set_value('valido_pago'),
            'observaciones' => set_value('observaciones'),
            'rfcdg' => set_value('rfcdg'),
            'recdg' => set_value('recdg'),
        );
        $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_form', $data);
    }

    public function create_action() {
        $maxnum = $this->Permiso_anuncios_adosados_model->getMaxItemByid();
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
        $configzip = $config['max_size'] = "21504";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;
        /*
          $this->_rules();
          if ($this->form_validation->run() == TRUE) {
          $this->create();
          } else {
         */
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
            'usuarioID' => $this->session->userdata('id'),
            'status' => "1",
            'notificacion' => "1",
            'carteleras' => $this->input->post('carteleras', TRUE),
            'altura' => $this->input->post('altura', TRUE),
            'dimenciones' => $this->input->post('dimenciones', TRUE),
            'referente' => $this->input->post('referente', TRUE),
            'poliza' => $this->input->post('poliza', TRUE),
            'clave' => $this->input->post('clave', TRUE),
            'cuenta_predial' => $this->input->post('cuenta_predial', TRUE),
            'renovacion' => $this->input->post('renovacion', TRUE),
            'fechainicio' => date("Y-m-d"),
            'rfcdg' => $this->input->post('rfcdg', TRUE),
            'recdg' => $this->input->post('recdg', TRUE),
                //'mensaje' => $this->input->post('mensaje',TRUE)
        );


        if (!empty($_FILES['doctopermisousosuelo']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctopermisousosuelo']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopermisousosuelo']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctopermisousosuelo']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctopermisousosuelo.zip')) {
                $data['doctopermisousosuelo'] = "file-" . $maxnumbd . "-doctopermisousosuelo.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctopermisousosuelo'] = "";
        }
        if (!empty($_FILES['doctorfc']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctorfc']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctorfc']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctorfc']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctorfc.zip')) {
                $data['doctorfc'] = "file-" . $maxnumbd . "-doctorfc.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctorfc'] = "";
        }
        if (!empty($_FILES['doctorec']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctorfc']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctorec']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctorec']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctorec.zip')) {
                $data['doctorec'] = "file-" . $maxnumbd . "-doctorec.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctorec'] = "";
        }
        if (!empty($_FILES['bitacora']['tmp_name'][0])) {
            $numfiles = count($_FILES['bitacora']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['bitacora']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['bitacora']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-bitacora.zip')) {
                $data['bitacora'] = "file-" . $maxnumbd . "-bitacora.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['bitacora'] = "";
        }


        if (!empty($_FILES['doctofotografico']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctofotografico']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctofotografico']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctofotografico']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctofotografico.zip')) {
                $data['doctofotografico'] = "file-" . $maxnumbd . "-doctofotografico.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctofotografico'] = "";
        }

        if (!empty($_FILES['doctopago']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctopago']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopago']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctopago.zip')) {
                $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctopago'] = "";
        }

        /////////Mensaje del Funcionario a Ciudadano///////////////
        $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
        $this->email->subject('Permiso de Anuncios Adosados.');

        $email = array(
            'contenido' => 'Su solicitud del trámite Permiso de Anuncios Adosados ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
        );
        $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
        $this->email->message($body);
        $this->email->send();

        /////////Mensaje del Ciudadano a Funcionario///////////////
        $this->email->from($this->input->post('correodg', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('adela.garcia@irapuato.gob.mx');
        $this->email->subject('Permiso de Anuncios Adosados');
        $this->email->message('Usted tiene un nuevo trámite Permiso de Anuncios Adosados para poder revisar la solicitud del trámite entre a http://vuira.irapuato.gob.mx/');
        $this->email->send();

        $this->Permiso_anuncios_adosados_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(base_url('permiso_anuncios_adosados'));
        //print_r($_FILES);
        //}
    }

    public function update($id) {
        $result = $this->Colonias_model->getcolonias();
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($id);
        } else {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id($id);
        }
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3) ");
        $constancia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (4) ");
        $costopordia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (7) ");
        $costoporanio = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (8) ");
        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Actualizar',
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
                'fechaentrega' => set_value('fechaentrega', $row->fechaentrega),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'doctopermisousosuelo' => set_value('doctopermisousosuelo', $row->doctopermisousosuelo),
                'doctofotografico' => set_value('doctofotografico', $row->doctofotografico),
                'doctorec' => set_value('doctorec', $row->doctorec),
                'doctorfc' => set_value('doctorfc', $row->doctorfc),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'carteleras' => set_value('carteleras', $row->carteleras),
                'altura' => set_value('altura', $row->altura),
                'dimenciones' => set_value('dimenciones', $row->dimenciones),
                'referente' => set_value('referente', $row->referente),
                'poliza' => set_value('poliza', $row->poliza),
                'clave' => set_value('clave', $row->clave),
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
            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                $data['action'] = base_url('permiso_anuncios_adosados/update_action_admin');
            } else {
                $data['action'] = base_url('permiso_anuncios_adosados/update_action');
            }
            $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios_adosados'));
        }
    }

    public function update_autorizacion($id) {
        $result = $this->Colonias_model->getcolonias();
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($id);
        } else {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id($id);
        }
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3) ");
        $constancia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (4) ");
        $costopordia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (7) ");
        $costoporanio = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (8) ");
        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Autorizar',
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
                'fechaentrega' => set_value('fechaentrega', $row->fechaentrega),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'doctopermisousosuelo' => set_value('doctopermisousosuelo', $row->doctopermisousosuelo),
                'doctofotografico' => set_value('doctofotografico', $row->doctofotografico),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'carteleras' => set_value('carteleras', $row->carteleras),
                'altura' => set_value('altura', $row->altura),
                'dimenciones' => set_value('dimenciones', $row->dimenciones),
                'referente' => set_value('referente', $row->referente),
                'poliza' => set_value('poliza', $row->poliza),
                'clave' => set_value('clave', $row->clave),
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

            $data['action'] = base_url('permiso_anuncios_adosados/autorizar_action');

            $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_form_1', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios_adosados'));
        }
    }

    public function autorizar_action() {

//die(print_r($maxnumbd));
        $data = array(
            'autorizacion' => '1'
        );
        //Tamaño Maximo de los Archivos 20 Megas
        //echo "Actualizar Usuario";
        $this->Permiso_anuncios_adosados_model->update($this->input->post('ID', TRUE), $data);
        $this->session->set_flashdata('correcto', 'El trámite se modifico de manera correcta');
        redirect(base_url('permiso_anuncios_adosados/autorizacion'));
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
                'notificacion' => '1',
                'carteleras' => $this->input->post('carteleras', TRUE),
                'altura' => $this->input->post('altura', TRUE),
                'dimenciones' => $this->input->post('dimenciones', TRUE),
                'referente' => $this->input->post('referente', TRUE),
                'poliza' => $this->input->post('poliza', TRUE)
            );

            $maxnumbd = $this->input->post('ID', TRUE);

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;


            if (!empty($_FILES['doctorfc']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctorfc']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctorfc']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctorfc']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctorfc.zip')) {
                    $data['doctorfc'] = "file-" . $maxnumbd . "-doctorfc.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctorec']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctorec']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctorec']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctorec']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctorec.zip')) {
                    $data['doctorec'] = "file-" . $maxnumbd . "-doctorec.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctopermisousosuelo']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopermisousosuelo']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopermisousosuelo']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopermisousosuelo']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctopermisousosuelo.zip')) {
                    $data['doctopermisousosuelo'] = "file-" . $maxnumbd . "-doctopermisousosuelo.zip";
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
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-bitacora.zip')) {
                    $data['bitacora'] = "file-" . $maxnumbd . "-bitacora.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }



            if (!empty($_FILES['doctofotografico']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctofotografico']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctofotografico']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctofotografico']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctofotografico.zip')) {
                    $data['doctofotografico'] = "file-" . $maxnumbd . "-doctofotografico.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            /////////Mensaje del Funcionario a Ciudadano///////////////
            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
            $this->email->subject('Permiso de Anuncios Adosados.');

            $email = array(
                'contenido' => 'Los datos del trámite Permiso de Anuncios Adosados han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

            /////////Mensaje del Ciudadano a Funcionario///////////////
            $this->email->from($this->input->post('correodg', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to('adela.garcia@irapuato.gob.mx');
            $this->email->subject('Permiso de Anuncios Adosados');
            $this->email->message('El trámite Permiso de Anuncios Adosados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', a sido actualizado, por favor revise la información para continuar con el proceso del trámite.');
            $this->email->send();

            $this->Permiso_anuncios_adosados_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('permiso_anuncios_adosados'));
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
            $data = array(
                'fechaentrega' => $this->input->post('fechaentrega', TRUE),
                'nocontrol' => $this->input->post('nocontrol', TRUE),
                'status' => $this->input->post('status', TRUE),
                'mensaje' => $this->input->post('mensaje', TRUE),
                'notificacion' => "0"
            );

            $maxnumbd = $this->input->post('ID', TRUE);


            if ($this->input->post('status', TRUE) >= 5) {
                $data['fechafinal'] = date("Y-m-d");
            }

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;

            if (!empty($_FILES['doctofinal']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctofinal']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctofinal']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctofinal']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctofinal.zip')) {
                    $data['doctofinal'] = "file-" . $maxnumbd . "-doctofinal.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('adela.garcia@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodg', TRUE)); //Correo del ciudadano
            $this->email->subject('Permiso de Anuncios Adosados.');





            if ($this->input->post('status', TRUE) == 6) {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Permiso de Anuncios Adosados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', ha sido Terminado.'
                );
            } elseif ($this->input->post('status', TRUE) == 5) {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Permiso de Anuncios Adosados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', ha sido Cancelado.'
                );
            } else {
                $email = array(
                    'contenido' => 'En su solicitud del trámite Permiso de Anuncios Adosados a nombre  de ' . $this->input->post('nombrepropietarioinmuebledg', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . ' favor de realizar los cambios correspondientes para continuar con el trámite.'
                );
            }

            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();

            $this->Permiso_anuncios_adosados_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('permiso_anuncios_adosados'));
        }
    }

    public function delete($id) {
        $row = $this->Permiso_anuncios_adosados_model->get_by_id($id);
        if ($row) {
            $this->Permiso_anuncios_adosados_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('permiso_anuncios_adosados'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios_adosados'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nombrepropietarioinmuebledg', 'nombrepropietarioinmuebledg', 'trim|required');
        $this->form_validation->set_rules('nombrepropietarioanunciodg', 'nombrepropietarioanunciodg', 'trim|required');
        $this->form_validation->set_rules('calledg', 'calledg', 'trim|required');
        $this->form_validation->set_rules('numerodg', 'numerodg', 'trim|required');
        $this->form_validation->set_rules('coloniadg', 'coloniadg', 'trim|required');
        $this->form_validation->set_rules('correodg', 'correodg', 'trim|required');

        $this->form_validation->set_rules('calleui', 'calleui', 'trim|required');
        $this->form_validation->set_rules('noloteui', 'noloteui', 'trim|required');
        $this->form_validation->set_rules('nomanzanaui', 'nomanzanaui', 'trim|required');
        $this->form_validation->set_rules('nooficialui', 'nooficialui', 'trim|required');
        $this->form_validation->set_rules('cbocoloniaui', 'cbocoloniaui', 'trim|required');
        $this->form_validation->set_rules('superficiepredioui', 'superficiepredioui', 'trim|required|numeric');
        $this->form_validation->set_rules('superficieconstruidaui', 'superficieconstruidaui', 'trim|required|numeric');
        $this->form_validation->set_rules('nonivelesui', 'nonivelesui', 'trim|required');


        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesupdate() {
        $this->form_validation->set_rules('fechaentrega', 'fechaentrega', 'trim|required');
        $this->form_validation->set_rules('nocontrol', 'nocontrol', 'trim|required');
        $this->form_validation->set_rules('doctopermisousosuelo', 'doctopermisousosuelo', 'trim|required');

        $this->form_validation->set_rules('doctofotografico', 'doctofotografico', 'trim|required');
        $this->form_validation->set_rules('doctopago', 'doctopago', 'trim|required');
        $this->form_validation->set_rules('doctofinal', 'doctofinal', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');

        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function vistapago_action() {

        if ($this->input->post()) {
//            die();            site_url(
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
                    if ($this->zip->archive('./assets/tramites/permisosanunciosadosados/file-' . $maxnumbd . '-compro.zip')) {
                        $data['compro'] = "file-" . $maxnumbd . "-compro.zip";
                        //echo "Guarda";
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
                $this->Permiso_anuncios_adosados_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Pago recibido para su revisión');
                redirect(base_url('permiso_anuncios_adosados'));
            } else {
                $this->session->set_flashdata('correcto', 'Antes de enviar pago debe adjuntar el comprobante de pago');
                redirect(base_url('permiso_anuncios_adosados/realizarpago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function realizarpago($id) {
        $result = $this->Colonias_model->getcolonias();
        if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($id);
        } else {
            $row = $this->Permiso_anuncios_adosados_model->get_by_id($id);
        }
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3) ");
        $constancia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (4) ");
        $costopordia = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (7) ");
        $costoporanio = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (8) ");
        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Actualizar',
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
                'fechaentrega' => set_value('fechaentrega', $row->fechaentrega),
                'nocontrol' => set_value('nocontrol', $row->nocontrol),
                'doctopermisousosuelo' => set_value('doctopermisousosuelo', $row->doctopermisousosuelo),
                'doctofotografico' => set_value('doctofotografico', $row->doctofotografico),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'carteleras' => set_value('carteleras', $row->carteleras),
                'altura' => set_value('altura', $row->altura),
                'dimenciones' => set_value('dimenciones', $row->dimenciones),
                'referente' => set_value('referente', $row->referente),
                'poliza' => set_value('poliza', $row->poliza),
                'clave' => set_value('clave', $row->clave),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'renovacion' => set_value('renovacion', $row->renovacion),
                'bitacora' => set_value('bitacora', $row->bitacora),
                'costos' => $costo,
                'cconstancia' => $constancia,
                'costopordia' => $costopordia,
                'costoporanio' => $costoporanio,
                'compro' => set_value('compro', $row->compro),
                'action' => base_url('permiso_anuncios_adosados/vistapago_action'),
                'rfcdg' => set_value('rfcdg', $row->rfcdg),
                'recdg' => set_value('recdg', $row->recdg),
            );

            $this->load->view('permiso_anuncios_adosados/permiso_anuncios_adosados_pago', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('permiso_anuncios_adosados'));
        }
    }

    public function asignar_func() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);

        foreach ($id as $i) {
            $data = array(
                'func' => $this->input->post('auxiliar', TRUE),
            );
            $this->Permiso_anuncios_adosados_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        redirect(base_url('permiso_anuncios_adosados/asignacion'));
    }

    public function vpago($id = null) {
        if ($id) {

            if ($this->session->userdata('tipo') == 1000) {
                $data = array(
                    'valido_pago' => 1,
                    'notificacion' => 1,
                );
                $this->Permiso_anuncios_adosados_model->update($id, $data);
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
                $this->Permiso_anuncios_adosados_model->update($id, $data);
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

        $permiso_anuncios_adosados = $this->Permiso_anuncios_adosados_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status);

        $data = array(
            'permiso_anuncios_data' => $permiso_anuncios_adosados,
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );

        //print_r($data);
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

/* End of file Permiso_anuncios_adosados.php */
/* Ubicacion: ./application/controllers/Permiso_anuncios_adosados.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-05-30 17:39:23 */
/* http://www.ga-asociados.com */
