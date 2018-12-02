<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contratacion_y_servicios_de_agua_y_drenaje_domestico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Contratacion_y_servicios_de_agua_y_drenaje_domestico_model');
        $this->load->library('form_validation');
        $this->load->model('Colonias_japami_model');
        $this->load->model('Calles_japami_model');
        $this->load->library('zip');
        $this->load->model("Ccbd_model");
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'contratacion_y_servicios_de_agua_y_drenaje_domestico?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contratacion_y_servicios_de_agua_y_drenaje_domestico?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contratacion_y_servicios_de_agua_y_drenaje_domestico';
            $config['first_url'] = base_url() . 'contratacion_y_servicios_de_agua_y_drenaje_domestico';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;

        if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3) {
            $config['total_rows'] = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->total_rows_usuario($q);
//                $config['total_rows'] = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->total_rows($q);$config['total_rows'] = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->total_rows_usuario($q);
            $contratacion_y_servicios_de_agua_y_drenaje_domestico = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_limit_data($config['per_page'], $start, $q);
        } else {
            $config['total_rows'] = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->total_rows_admin($q);
            $contratacion_y_servicios_de_agua_y_drenaje_domestico = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_limit_data_admin($config['per_page'], $start, $q);
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'contratacion_y_servicios_de_agua_y_drenaje_domestico_data' => $contratacion_y_servicios_de_agua_y_drenaje_domestico,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'logo_jp' => 1,
        );
        $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_list', $data);
    }

    public function reportes() {
        $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_reportes');
    }

    public function clave() {

        $data['vista'] = 'contratacion_y_servicios_de_agua_y_drenaje_domestico/create';
        $data['logo_jp'] = 1;
        $this->load->view('permiso_anuncios/clave_catastral_form', $data);
    }

    public function reportefinal() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('

      ', TRUE);
        $status = $this->input->post('status', TRUE);
        $apaterno = $this->input->post('apaterno', TRUE);

        $contratacion_y_servicios_de_agua_y_drenaje_domestico = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_reporte($fechainicio, $fechafinal, $apaterno, $status);

        $data = array(
            'contratacion_y_servicios_de_agua_y_drenaje_domestico_data' => $contratacion_y_servicios_de_agua_y_drenaje_domestico
        );

        //print_r($data);
        $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_reportefinal', $data);
    }

    public function read($id) {
        $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'solicitud' => $row->solicitud,
                'nombre' => $row->nombre,
                'coloniaubicacion' => $row->coloniaubicacion,
                'calle' => $row->calle,
                'callereferencia1' => $row->callereferencia1,
                'callereferencia2' => $row->callereferencia2,
                'mapa' => $row->mapa,
                'numeroext' => $row->numeroext,
                'numeroint' => $row->numeroint,
                'conexion' => $row->conexion,
                'medidor' => $row->medidor,
                'nomedidor' => $row->nomedidor,
                'lectura' => $row->lectura,
                'observaciones' => $row->observaciones,
                'nombrepropietario' => $row->nombrepropietario,
                'apaterno' => $row->apaterno,
                'amaterno' => $row->amaterno,
                'rfc' => $row->rfc,
                'coloniapropietario' => $row->coloniapropietario,
                'callepropietario' => $row->callepropietario,
                'numeroextpropietario' => $row->numeroextpropietario,
                'numerointpropietario' => $row->numerointpropietario,
                'telefono' => $row->telefono,
                'nocelular' => $row->nocelular,
                'correo' => $row->correo,
                'giroactividad' => $row->giroactividad,
                'tiposervicio' => $row->tiposervicio,
                'servicioscuenta' => $row->servicioscuenta,
                'serviciossolicita' => $row->serviciossolicita,
                'condicionesgenerales' => $row->condicionesgenerales,
                'cuentaligada' => $row->cuentaligada,
                'tarifa' => $row->tarifa,
                'zonafacturacion' => $row->zonafacturacion,
                'zonaeconomica' => $row->zonaeconomica,
                'diametrotoma' => $row->diametrotoma,
                'iniciofacturacion' => $row->iniciofacturacion,
                'doctopredial' => $row->doctopredial,
                'doctonumerooficial' => $row->doctonumerooficial,
                'doctoife' => $row->doctoife,
                'doctopago' => $row->doctopago,
                'doctofinal' => $row->doctofinal,
                'mensaje' => $row->mensaje,
                'usuarioID' => $row->usuarioID,
                'status' => $row->status,
            );
            $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
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


        $aux;
        $CLAVE = $this->input->post('clave');
        $datos = $this->datospredial($this->input->post('clave'));

        if (isset($datos['COLONIA_ID'])) {

            $datos['COLONIA_ID'] = ltrim($datos['COLONIA_ID'], '0');
            $datos['COLONIA_ID'] = trim($datos['COLONIA_ID']);
            $colonia = $this->Colonias_japami_model->getColoniaJPtoPRED($datos['COLONIA_ID']);
        }

        $ID_COLONIA = 0;
        if (isset($datos['CALLE_ID'])) {
            $datos['CALLE_ID'] = ltrim($datos['CALLE_ID'], '0');
            $datos['CALLE_ID'] = trim($datos['CALLE_ID']);

            if (!empty($colonia)) {
//                  die(print_r($colonia->NOMBRE,true));
                $colonia1 = $this->Colonias_japami_model->getIDColoniaJPtoPRED($colonia->NOMBRE);
                $ID_COLONIA = $colonia1;
            }
            if (isset($colonia1->COLONIA_ID)):
                $callenombre = $this->Calles_japami_model->getcallepredialbyid($datos['CALLE_ID']);
                $CALLE = $this->Calles_japami_model->getcallebyid($colonia1->COLONIA_ID, $callenombre->nombre);

                if (isset($CALLE->NOMBRE)):
                    $datos['CALLE_ID'] = $CALLE->NOMBRE;
                else:
                    $datos['CALLE_ID'] = 0;
                endif;
                $datos['COLONIA_ID'] = $colonia->NOMBRE;
            else:
                $datos['COLONIA_ID'] = 0;
                $datos['CALLE_ID'] = 0;

            endif;
        }
        $result = $this->Colonias_japami_model->getcolonias();

        $result1 = $this->Calles_japami_model->getcalles1("");
        if (isset($ID_COLONIA->COLONIA_ID)):
            $result2 = $this->Calles_japami_model->getcalles($ID_COLONIA->COLONIA_ID);
        else:
            $result2 = $this->Calles_japami_model->getcalles1("");
        endif;
//        
//        die(print_r( $datos['CALLE_ID']));
        $data = array(
            'consulta' => $result,
            'consulta1' => $result1,
            'consulta2' => $result2,
            'button' => 'Solicitar Trámite',
            'action' => site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/create_action'),
            'ID' => set_value('ID'),
            'solicitud' => set_value('solicitud'),
            'nombre' => set_value('nombre'),
            'coloniaubicacion' => set_value('coloniaubicacion'),
            'calle' => set_value('calle'),
            'callereferencia1' => set_value('callereferencia1'),
            'callereferencia2' => set_value('callereferencia2'),
            'mapa' => set_value('mapa'),
            'numeroext' => set_value('numeroext'),
            'numeroint' => set_value('numeroint'),
            'conexion' => set_value('conexion'),
            'medidor' => set_value('medidor'),
            'nomedidor' => set_value('nomedidor'),
            'lectura' => set_value('lectura'),
            'observaciones' => set_value('observaciones'),
            'nombrepropietario' => $datos['NOMBRE'],
            'apaterno' => isset($datos['APELLIDO_PATERNO']) == 1 ? $datos['APELLIDO_PATERNO'] : "",
            'amaterno' => isset($datos['APELLIDO_MATERNO']) == 1 ? $datos['APELLIDO_MATERNO'] : "",
            'rfc' => set_value('rfc'),
            'coloniapropietario' => $datos['COLONIA_ID'],
            'callepropietario' => $datos['CALLE_ID'],
            'numeroextpropietario' => $datos['NO_EXTERIOR'],
            'numerointpropietario' => isset($datos['NO_INTERIOR']) == 1 ? $datos['NO_INTERIOR'] : "",
            'telefono' => set_value('telefono'),
            'nocelular' => set_value('nocelular'),
            'correo' => $this->session->userdata('correo'),
            'giroactividad' => set_value('giroactividad'),
            'tiposervicio' => set_value('tiposervicio'),
            'servicioscuenta' => set_value('servicioscuenta'),
            'serviciossolicita' => set_value('serviciossolicita'),
            'condicionesgenerales' => set_value('condicionesgenerales'),
            'cuentaligada' => set_value('cuentaligada'),
            'tarifa' => set_value('tarifa'),
            'zonafacturacion' => set_value('zonafacturacion'),
            'zonaeconomica' => set_value('zonaeconomica'),
            'diametrotoma' => set_value('diametrotoma'),
            'iniciofacturacion' => set_value('iniciofacturacion'),
            'doctopredial' => set_value('doctopredial'),
            'doctonumerooficial' => set_value('doctonumerooficial'),
            'doctoife' => set_value('doctoife'),
            'doctopago' => set_value('doctopago'),
            'mensaje' => set_value('mensaje'),
            'usuarioID' => set_value('usuarioID'),
            'status' => set_value('status'),
            'tiempohabitado' => set_value('$tiempohabitado'),
            'razon_social' => set_value('razon_social'),
            'colonia_facturacion' => set_value('colonia_facturacion'),
            'cp_facturacion' => set_value('cp_facturacion'),
            'ciudad_facturacion' => set_value('ciudad_facturacion'),
            'estado_facturacion' => set_value('estado_facturacion'),
            'domicilio_facturacion' => set_value('domicilio_facturacion'),
            'otro_domicilio_facturacion' => set_value('otro_domicilio_facturacion'),
            'medidor1' => set_value('medidor1'),
            'otro_med' => set_value('otro_med'),
            'ctapre' => $datos['CUENTA_PREDIAL'],
            'logo_jp' => 1
        );
        $user_id = $this->session->userdata('id');
        $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
        $data['INE'] = $INE;
        $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
        $data['predial'] = $predial;
        $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
        $data['noficial'] = $noficial;
        $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_form', $data);
    }

    public function create_action() {
        $maxnum = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->getMaxItemByid();
        $maxnumbd = $maxnum[0]->maximo;
        if (empty($maxnumbd)) {
            $maxnumbd = 1;
        } else {
            $maxnumbd = $maxnumbd + 1;
        }
        $hoy = date("Y-m-d");
        //Tamaño Maximo de los Archivos 20 Megas
        $configzip = $config['max_size'] = "21504";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;
        $valor = $this->input->post('otro_domicilio_facturacion') != "" ? "1" : "0";
//        die(print_r($valor, true));
        $data = array(
            'nombre' => $this->input->post('nombre', TRUE),
            'coloniaubicacion' => $this->input->post('coloniaubicacion', TRUE),
            'calle' => $this->input->post('calle', TRUE),
            'callereferencia1' => $this->input->post('callereferencia1', TRUE),
            'callereferencia2' => $this->input->post('callereferencia2', TRUE),
            'mapa' => $this->input->post('mapa', TRUE),
            'numeroext' => $this->input->post('numeroext', TRUE),
            'numeroint' => $this->input->post('numeroint', TRUE),
            'conexion' => $this->input->post('conexion', TRUE),
            'medidor' => $this->input->post('medidor', TRUE),
            'nomedidor' => $this->input->post('nomedidor', TRUE),
            'lectura' => $this->input->post('lectura', TRUE),
            'observaciones' => $this->input->post('observaciones', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
            'apaterno' => $this->input->post('apaterno', TRUE),
            'amaterno' => $this->input->post('amaterno', TRUE),
            'rfc' => $this->input->post('rfc', TRUE),
            'coloniapropietario' => $this->input->post('coloniapropietario', TRUE),
            'callepropietario' => $this->input->post('callepropietario', TRUE),
            'numeroextpropietario' => $this->input->post('numeroextpropietario', TRUE),
            'numerointpropietario' => $this->input->post('numerointpropietario', TRUE),
            'telefono' => $this->input->post('telefono', TRUE),
            'nocelular' => $this->input->post('nocelular', TRUE),
            'correo' => $this->input->post('correo', TRUE),
            'giroactividad' => $this->input->post('giroactividad', TRUE),
            'tiposervicio' => $this->input->post('tiposervicio', TRUE),
            'servicioscuenta' => $this->input->post('servicioscuenta', TRUE),
            'serviciossolicita' => $this->input->post('serviciossolicita', TRUE),
            'condicionesgenerales' => $this->input->post('condicionesgenerales', TRUE),
            'usuarioID' => $this->session->userdata('id'),
            'status' => "1",
            'notificacion' => "1",
            'tiempohabitado' => $this->input->post('tiempohabitado', TRUE),
            'razon_social' => $this->input->post('razon_social', TRUE),
            'colonia_facturacion' => $this->input->post('colonia_facturacion', TRUE),
            'cp_facturacion' => $this->input->post('cp_facturacion', TRUE),
            'ciudad_facturacion' => $this->input->post('ciudad_facturacion', TRUE),
            'estado_facturacion' => $this->input->post('estado_facturacion', TRUE),
            'domicilio_facturacion' => $this->input->post('domicilio_facturacion', TRUE),
            'otro_domicilio_facturacion' => $valor,
            'medidor1' => $this->input->post('medidor1', TRUE),
            'otro_med' => $this->input->post('otro_med', TRUE),
            'fechainicio' => $hoy,
            'fechafinal' => $hoy,
        );

        if (!empty($_FILES['doctopredial']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctopredial']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopredial']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctopredial']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctopredial.zip')) {
                $data['doctopredial'] = "file-" . $maxnumbd . "-doctopredial.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctopredial'] = "";
        }



        if (!empty($_FILES['doctonumerooficial']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctonumerooficial']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctonumerooficial']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctonumerooficial']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctonumerooficial.zip')) {
                $data['doctonumerooficial'] = "file-" . $maxnumbd . "-doctonumerooficial.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctonumerooficial'] = "";
        }


        if (!empty($_FILES['doctoife']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctoife']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctoife']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctoife']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctoife.zip')) {
                $data['doctoife'] = "file-" . $maxnumbd . "-doctoife.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctoife'] = "";
        }




        if (!empty($_FILES['doctopago']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctopago']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopago']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctopago.zip')) {
                $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctopago'] = "";
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



        /////////Mensaje del Funcionario a Ciudadano///////////////

        $this->email->from('phernandez@japami.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($this->input->post('correo', TRUE)); //Correo del ciudadano
        $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');


        $email = array(
            'contenido' => 'Su solicitud del trámite Contratación de Servicios de Agua y Drenaje Doméstico ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.'
        );
        $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
        $this->email->message($body);
        $this->email->send();


        /////////Mensaje del Ciudadano a Funcionario///////////////
        $this->email->from($this->input->post('correo', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('phernandez@japami.gob.mx');
        $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');
        $this->email->message('Usted tiene un nuevo trámite Contratación de Servicios de Agua y Drenaje Doméstico para poder revisar la solicitud del tramite entre a http://vuira.irapuato.gob.mx/');
        $this->email->send();

        $this->email->from($this->input->post('correo', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('mabravo@japami.gob.mx');
        $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');
        $this->email->message('Usted tiene un nuevo trámite Contratación de Servicios de Agua y Drenaje Doméstico para poder revisar la solicitud del tramite entre a http://vuira.irapuato.gob.mx/');
        $this->email->send();
        $this->email->from($this->input->post('correo', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('mromero@japami.gob.mx');
        $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');
        $this->email->message('Usted tiene un nuevo trámite Contratación de Servicios de Agua y Drenaje Doméstico para poder revisar la solicitud del tramite entre a http://vuira.irapuato.gob.mx/');
        $this->email->send();

        $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->insert($data);
        $this->session->set_flashdata('correcto', 'Su Solicitud ha sido registrada con éxito un Funcionario dará revisión y le notificará vía correo electónico Nota: revisé su bandeja de Correo no deseado');
        redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
    }

    public function update($id) {

        $result = $this->Colonias_japami_model->getcolonias();
        //$result1 = $this->Calles_japami_model->getcalles();



        if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) {
            $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id_administrador($id);
        } else {
            $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id($id);
        }


        if ($row) {
            $col = $row->coloniaubicacion;
            $col1 = $row->coloniapropietario;
            $result1 = $this->Calles_japami_model->getcalles($col);
            $result2 = $this->Calles_japami_model->getcalles($col1);
            $data = array(
                'consulta' => $result,
                'consulta1' => $result1,
                'consulta2' => $result2,
                'button' => 'Actualizar',
                'action' => site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/update_action'),
                'ID' => set_value('ID', $row->ID),
                'solicitud' => set_value('solicitud', $row->solicitud),
                'nombre' => set_value('nombre', $row->nombre),
                'coloniaubicacion' => set_value('coloniaubicacion', $row->coloniaubicacion),
                'calle' => set_value('calle', $row->calle),
                'callereferencia1' => set_value('callereferencia1', $row->callereferencia1),
                'callereferencia2' => set_value('callereferencia2', $row->callereferencia2),
                'mapa' => set_value('mapa', $row->mapa),
                'numeroext' => set_value('numeroext', $row->numeroext),
                'numeroint' => set_value('numeroint', $row->numeroint),
                'conexion' => set_value('conexion', $row->conexion),
                'medidor' => set_value('medidor', $row->medidor),
                'nomedidor' => set_value('nomedidor', $row->nomedidor),
                'lectura' => set_value('lectura', $row->lectura),
                'observaciones' => set_value('observaciones', $row->observaciones),
                'nombrepropietario' => set_value('nombrepropietario', $row->nombrepropietario),
                'apaterno' => set_value('apaterno', $row->apaterno),
                'amaterno' => set_value('amaterno', $row->amaterno),
                'rfc' => set_value('rfc', $row->rfc),
                'coloniapropietario' => set_value('coloniapropietario', $row->coloniapropietario),
                'callepropietario' => set_value('callepropietario', $row->callepropietario),
                'numeroextpropietario' => set_value('numeroextpropietario', $row->numeroextpropietario),
                'numerointpropietario' => set_value('numerointpropietario', $row->numerointpropietario),
                'telefono' => set_value('telefono', $row->telefono),
                'nocelular' => set_value('nocelular', $row->nocelular),
                'correo' => set_value('correo', $row->correo),
                'giroactividad' => set_value('giroactividad', $row->giroactividad),
                'tiposervicio' => set_value('tiposervicio', $row->tiposervicio),
                'servicioscuenta' => set_value('servicioscuenta', $row->servicioscuenta),
                'serviciossolicita' => set_value('serviciossolicita', $row->serviciossolicita),
                'condicionesgenerales' => set_value('condicionesgenerales', $row->condicionesgenerales),
                'cuentaligada' => set_value('cuentaligada', $row->cuentaligada),
                'tarifa' => set_value('tarifa', $row->tarifa),
                'zonafacturacion' => set_value('zonafacturacion', $row->zonafacturacion),
                'zonaeconomica' => set_value('zonaeconomica', $row->zonaeconomica),
                'diametrotoma' => set_value('diametrotoma', $row->diametrotoma),
                'iniciofacturacion' => set_value('iniciofacturacion', $row->iniciofacturacion),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctonumerooficial' => set_value('doctonumerooficial', $row->doctonumerooficial),
                'doctoife' => set_value('doctoife', $row->doctoife),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'status' => set_value('status', $row->status),
                'tiempohabitado' => set_value('tiempohabitado', $row->tiempohabitado),
                'razon_social' => set_value('razon_social', $row->razon_social),
                'colonia_facturacion' => set_value('colonia_facturacion', $row->colonia_facturacion),
                'cp_facturacion' => set_value('cp_facturacion', $row->cp_facturacion),
                'ciudad_facturacion' => set_value('ciudad_facturacion', $row->ciudad_facturacion),
                'estado_facturacion' => set_value('estado_facturacion', $row->estado_facturacion),
                'domicilio_facturacion' => set_value('domicilio_facturacion', $row->domicilio_facturacion),
                'otro_domicilio_facturacion' => set_value('otro_domicilio_facturacion', $row->domicilio_facturacion),
                'medidor1' => set_value('medidor1', $row->medidor1),
                'otro_med' => set_value('otro_med', $row->otro_med),
                'cuentaligada' => set_value('cuentaligada', $row->cuentaligada),
                'solicitud' => set_value('solicitud', $row->solicitud),
                'cambio' => set_value('cambio', $row->cambio),
            );
            $data['logo_jp'] = 1;
            if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) {
                $data['action'] = site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/update_action_admin');
            } else {
                $data['action'] = site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/update_action');
            }
            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;

            $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
        }
    }

    public function recibopago($id) {

        $result = $this->Colonias_japami_model->getcolonias();
        //$result1 = $this->Calles_japami_model->getcalles();



        if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) {
            $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id_administrador($id);
        } else {
            $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id($id);
        }


        if ($row) {
            $col = $row->coloniaubicacion;
            $col1 = $row->coloniapropietario;
            $result1 = $this->Calles_japami_model->getcalles($col);
            $result2 = $this->Calles_japami_model->getcalles($col1);
            $data = array(
                'consulta' => $result,
                'consulta1' => $result1,
                'consulta2' => $result2,
                'button' => 'Actualizar',
                'action' => site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/recibo_action'),
                'ID' => set_value('ID', $row->ID),
                'solicitud' => set_value('solicitud', $row->solicitud),
                'nombre' => set_value('nombre', $row->nombre),
                'coloniaubicacion' => set_value('coloniaubicacion', $row->coloniaubicacion),
                'calle' => set_value('calle', $row->calle),
                'callereferencia1' => set_value('callereferencia1', $row->callereferencia1),
                'callereferencia2' => set_value('callereferencia2', $row->callereferencia2),
                'mapa' => set_value('mapa', $row->mapa),
                'numeroext' => set_value('numeroext', $row->numeroext),
                'numeroint' => set_value('numeroint', $row->numeroint),
                'conexion' => set_value('conexion', $row->conexion),
                'medidor' => set_value('medidor', $row->medidor),
                'nomedidor' => set_value('nomedidor', $row->nomedidor),
                'lectura' => set_value('lectura', $row->lectura),
                'observaciones' => set_value('observaciones', $row->observaciones),
                'nombrepropietario' => set_value('nombrepropietario', $row->nombrepropietario),
                'apaterno' => set_value('apaterno', $row->apaterno),
                'amaterno' => set_value('amaterno', $row->amaterno),
                'rfc' => set_value('rfc', $row->rfc),
                'coloniapropietario' => set_value('coloniapropietario', $row->coloniapropietario),
                'callepropietario' => set_value('callepropietario', $row->callepropietario),
                'numeroextpropietario' => set_value('numeroextpropietario', $row->numeroextpropietario),
                'numerointpropietario' => set_value('numerointpropietario', $row->numerointpropietario),
                'telefono' => set_value('telefono', $row->telefono),
                'nocelular' => set_value('nocelular', $row->nocelular),
                'correo' => set_value('correo', $row->correo),
                'giroactividad' => set_value('giroactividad', $row->giroactividad),
                'tiposervicio' => set_value('tiposervicio', $row->tiposervicio),
                'servicioscuenta' => set_value('servicioscuenta', $row->servicioscuenta),
                'serviciossolicita' => set_value('serviciossolicita', $row->serviciossolicita),
                'condicionesgenerales' => set_value('condicionesgenerales', $row->condicionesgenerales),
                'cuentaligada' => set_value('cuentaligada', $row->cuentaligada),
                'tarifa' => set_value('tarifa', $row->tarifa),
                'zonafacturacion' => set_value('zonafacturacion', $row->zonafacturacion),
                'zonaeconomica' => set_value('zonaeconomica', $row->zonaeconomica),
                'diametrotoma' => set_value('diametrotoma', $row->diametrotoma),
                'iniciofacturacion' => set_value('iniciofacturacion', $row->iniciofacturacion),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctonumerooficial' => set_value('doctonumerooficial', $row->doctonumerooficial),
                'doctoife' => set_value('doctoife', $row->doctoife),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'status' => set_value('status', $row->status),
                'tiempohabitado' => set_value('tiempohabitado', $row->tiempohabitado),
                'razon_social' => set_value('razon_social', $row->razon_social),
                'colonia_facturacion' => set_value('colonia_facturacion', $row->colonia_facturacion),
                'cp_facturacion' => set_value('cp_facturacion', $row->cp_facturacion),
                'ciudad_facturacion' => set_value('ciudad_facturacion', $row->ciudad_facturacion),
                'estado_facturacion' => set_value('estado_facturacion', $row->estado_facturacion),
                'domicilio_facturacion' => set_value('domicilio_facturacion', $row->domicilio_facturacion),
                'otro_domicilio_facturacion' => set_value('otro_domicilio_facturacion', $row->domicilio_facturacion),
                'medidor1' => set_value('medidor1', $row->medidor1),
                'otro_med' => set_value('otro_med', $row->otro_med),
                'cuentaligada' => set_value('cuentaligada', $row->cuentaligada),
                'solicitud' => set_value('solicitud', $row->solicitud),
                'cambio' => set_value('cambio', $row->cambio),
                'codigo' => set_value('codigo', $row->codigo),
            );
            $data['logo_jp'] = 1;
            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;

            $this->load->view('contratacion_y_servicios_de_agua_y_drenaje_domestico/contratacion_y_servicios_de_agua_y_drenaje_domestico_form_pago', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
        }
    }

    public function recibo_action() {
        $cambio = $this->input->post('cambio', TRUE) != "" ? 1 : 0;
//    
        $hoy = date("Y-m-d");
        $data = array(
            'fechafinal' => $hoy,
            'cambio' => $cambio,
        );
        if ($cambio == 1) {
            $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id_administrador($this->input->post('ID'));
            $client = new SoapClient("http://www.japami.gob.mx/jap/ws_contratos.asmx?WSDL");

            $params = array(
                'Token' => 'contratos-hbWhCkFFCB795ke',
                'Referencia_01' => '' . $row->solicitud,
                'No_Cuenta' => '' . $row->cuentaligada
            );
            $result = $client->Cargar_Costo_Contrato($params);

            $result2 = $result;
            $result2 = json_decode($result2->Cargar_Costo_ContratoResult);
            if ($result2[0]->Estatus == "CORRECTO") {
                $data['status'] = '6';
                $data['notificacion'] = "1";
                $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', '' . $result2[0]->Estatus);
                redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
            } else {
                $this->session->set_flashdata('correcto', 'No se pudo referenciar el contrato.');
                redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/recibopago/' . $this->input->post('ID', TRUE)));
            }
        } else {
            if ($_FILES['doctopago']['tmp_name'][0]) {



                $maxnumbd = $this->input->post('ID', TRUE);

                //Tamaño Maximo de los Archivos 20 Megas
                $configzip = $config['max_size'] = "21504";
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
                    if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctopago.zip')) {
                        $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                        $data['notificacion'] = "1";
                        //echo "Guarda";
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
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



                /////////Mensaje del Funcionario a Ciudadano///////////////

                $this->email->from('phernandez@japami.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correo', TRUE)); //Correo del ciudadano
                $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');


                $email = array(
                    'contenido' => 'Los datos del trámite Contratación de Servicios de Agua y Drenaje Doméstico han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.'
                );
                $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
                $this->email->message($body);
                $this->email->send();

                $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->update($this->input->post('ID', TRUE), $data);
                $this->session->set_flashdata('correcto', 'Su solicitud ha sido modificada con éxito');
                redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
            } else {
                $this->session->set_flashdata('correcto', 'Por favor Ingrese su recibo de pago o indique si desea que el costo sea cargado a su primer recibo');
                redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/recibopago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function update_action() {
        $this->_rulesupdate();

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $hoy = date("Y-m-d");
            $data = array(
                'nombre' => $this->input->post('nombre', TRUE),
                'coloniaubicacion' => $this->input->post('coloniaubicacion', TRUE),
                'calle' => $this->input->post('calle', TRUE),
                'callereferencia1' => $this->input->post('callereferencia1', TRUE),
                'callereferencia2' => $this->input->post('callereferencia2', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'numeroext' => $this->input->post('numeroext', TRUE),
                'numeroint' => $this->input->post('numeroint', TRUE),
                'conexion' => $this->input->post('conexion', TRUE),
                'medidor' => $this->input->post('medidor', TRUE),
                'nomedidor' => $this->input->post('nomedidor', TRUE),
                'lectura' => $this->input->post('lectura', TRUE),
                'observaciones' => $this->input->post('observaciones', TRUE),
                'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
                'apaterno' => $this->input->post('apaterno', TRUE),
                'amaterno' => $this->input->post('amaterno', TRUE),
                'rfc' => $this->input->post('rfc', TRUE),
                'coloniapropietario' => $this->input->post('coloniapropietario', TRUE),
                'callepropietario' => $this->input->post('callepropietario', TRUE),
                'numeroextpropietario' => $this->input->post('numeroextpropietario', TRUE),
                'numerointpropietario' => $this->input->post('numerointpropietario', TRUE),
                'telefono' => $this->input->post('telefono', TRUE),
                'nocelular' => $this->input->post('nocelular', TRUE),
                'correo' => $this->input->post('correo', TRUE),
                'giroactividad' => $this->input->post('giroactividad', TRUE),
                'tiposervicio' => $this->input->post('tiposervicio', TRUE),
                'servicioscuenta' => $this->input->post('servicioscuenta', TRUE),
                'serviciossolicita' => $this->input->post('serviciossolicita', TRUE),
                'condicionesgenerales' => $this->input->post('condicionesgenerales', TRUE),
                'notificacion' => "1",
                'tiempohabitado' => $this->input->post('tiempohabitado', TRUE),
                'razon_social' => $this->input->post('razon_social', TRUE),
                'colonia_facturacion' => $this->input->post('colonia_facturacion', TRUE),
                'cp_facturacion' => $this->input->post('cp_facturacion', TRUE),
                'ciudad_facturacion' => $this->input->post('ciudad_facturacion', TRUE),
                'estado_facturacion' => $this->input->post('estado_facturacion', TRUE),
                'domicilio_facturacion' => $this->input->post('domicilio_facturacion', TRUE),
                'fechafinal' => $hoy,
                'medidor1' => $this->input->post('medidor1', TRUE),
                'otro_med' => $this->input->post('otro_med', TRUE),
            );


            $maxnumbd = $this->input->post('ID', TRUE);

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;

            if (!empty($_FILES['doctopredial']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopredial']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopredial']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopredial']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctopredial.zip')) {
                    $data['doctopredial'] = "file-" . $maxnumbd . "-doctopredial.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }



            if (!empty($_FILES['doctonumerooficial']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctonumerooficial']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctonumerooficial']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctonumerooficial']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctonumerooficial.zip')) {
                    $data['doctonumerooficial'] = "file-" . $maxnumbd . "-doctonumerooficial.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            //IFE
            if (!empty($_FILES['doctoife']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoife']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoife']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoife']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctoife.zip')) {
                    $data['doctoife'] = "file-" . $maxnumbd . "-doctoife.zip";
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
                if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
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



            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('phernandez@japami.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correo', TRUE)); //Correo del ciudadano
            $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');


            $email = array(
                'contenido' => 'Los datos del trámite Contratación de Servicios de Agua y Drenaje Doméstico han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.'
            );
            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();



            /////////Mensaje del Ciudadano a Funcionario///////////////
            $this->email->from($this->input->post('correo', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to('phernandez@japami.gob.mx');
            $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');
            $this->email->message('El trámite Contratación de Servicios de Agua y Drenaje Doméstico a nombre  de ' . $this->input->post('nombre', TRUE) . ', a sido actualizado, por favor revise la información para continuar con el proceso del trámite.');
            $this->email->send();

            $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'Su solicitud ha sido modificada con éxito');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
        }
    }

    public function update_action_admin() {
        $this->_rulesupdate();

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $hoy = date("Y-m-d");
            $data = array(
                //'tiposer' => $this->input->post('tiposer',TRUE),
                'solicitud' => $this->input->post('solicitud', TRUE),
                'cuentaligada' => $this->input->post('cuentaligada', TRUE),
                //'tarifa' => $this->input->post('tarifa',TRUE),
                //'zonafacturacion' => $this->input->post('zonafacturacion',TRUE),
                //'zonaeconomica' => $this->input->post('zonaeconomica',TRUE),
                'serviciossolicita' => $this->input->post('serviciossolicita', TRUE),
                'diametrotoma' => $this->input->post('diametrotoma', TRUE),
                'iniciofacturacion' => $this->input->post('iniciofacturacion', TRUE),
                'mensaje' => $this->input->post('mensaje', TRUE),
                'status' => $this->input->post('status', TRUE),
                'notificacion' => "0",
                'fechafinal' => $hoy
            );

            $maxnumbd = $this->input->post('ID', TRUE);
            if ($this->input->post('status', TRUE) == 3) {
                $data['fechainicio'] = date("Y-m-d");
            }

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
                if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctofinal.zip')) {
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
                if ($this->zip->archive('./assets/tramites/serviciosdeaguaydrenaje/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
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



            /////////Mensaje del Funcionario a Ciudadano///////////////

            $this->email->from('phernandez@japami.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correo', TRUE)); //Correo del ciudadano
            $this->email->subject('Contratación de Servicios de Agua y Drenaje Doméstico');
            $email = array();
            if ($this->input->post('status', TRUE) == 6) {
                $email['contenido'] = 'En su solicitud del trámite Contratación de Servicios de Agua y Drenaje Doméstico a nombre  de ' . $this->input->post('nombre', TRUE) . ', ha sido Terminada. Apartir de hoy usted tiene 30 dias para recoger su documento físico.';
            } elseif ($this->input->post('status', TRUE) == 5) {
                $email['contenido'] = 'En su solicitud del trámite Contratación de Servicios de Agua y Drenaje Doméstico a nombre  de ' . $this->input->post('nombre', TRUE) . ', ha sido Cancelado.';
            } elseif ($this->input->post('status', TRUE) == 4) {
                $email['contenido'] = 'En su silicitud del trámite Contratación de Servicios de Agua y Drenaje Doméstico a nombre  de ' . $this->input->post('nombre', TRUE) . ', Se encuentra en espera de pago  cuenta con 48 horas para realizarlo o su solicitud sera cancelada.';
            } else {
                $email['contenido'] = 'En su solicitud del tramite Contratación de Servicios de Agua y Drenaje Doméstico a nombre de ' . $this->input->post('nombre', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . ' favor de realizar los cambios correspondientes para continuar con el trámite.';
            }

            $body = $this->load->view('vista_email_tramite.php', $email, TRUE);
            $this->email->message($body);
            $this->email->send();



            $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'Información Actualizada con Exito');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
        }
    }

    public function delete($id) {
        $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id($id);

        if ($row) {
            $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico'));
        }
    }

    public function _rules() {

        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
        $this->form_validation->set_rules('coloniaubicacion', 'coloniaubicacion', 'trim|required');
        $this->form_validation->set_rules('calle', 'calle', 'trim|required');
        $this->form_validation->set_rules('callereferencia1', 'callereferencia1', 'trim|required');
        $this->form_validation->set_rules('callereferencia2', 'callereferencia2', 'trim|required');
        $this->form_validation->set_rules('mapa', 'mapa', 'trim|required');
        $this->form_validation->set_rules('numeroext', 'numeroext', 'trim|required');
        $this->form_validation->set_rules('numeroint', 'numeroint', 'trim|required');
        $this->form_validation->set_rules('conexion', 'conexion', 'trim|required');
        $this->form_validation->set_rules('medidor', 'medidor', 'trim|required');
        $this->form_validation->set_rules('nomedidor', 'nomedidor', 'trim|required');
        $this->form_validation->set_rules('lectura', 'lectura', 'trim|required');
        $this->form_validation->set_rules('observaciones', 'observaciones', 'trim|required');
        $this->form_validation->set_rules('nombrepropietario', 'nombrepropietario', 'trim|required');
        $this->form_validation->set_rules('apaterno', 'apaterno', 'trim|required');
        $this->form_validation->set_rules('amaterno', 'amaterno', 'trim|required');

        $this->form_validation->set_rules('coloniapropietario', 'coloniapropietario', 'trim|required');
        $this->form_validation->set_rules('callepropietario', 'callepropietario', 'trim|required');
        $this->form_validation->set_rules('numeroextpropietario', 'numeroextpropietario', 'trim|required');
        $this->form_validation->set_rules('numerointpropietario', 'numerointpropietario', 'trim|required');
        $this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
        $this->form_validation->set_rules('nocelular', 'nocelular', 'trim|required');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required');
        $this->form_validation->set_rules('giroactividad', 'giroactividad', 'trim|required');
        $this->form_validation->set_rules('tiposervicio', 'tiposervicio', 'trim|required');
        $this->form_validation->set_rules('servicioscuenta', 'servicioscuenta', 'trim|required');
        $this->form_validation->set_rules('serviciossolicita', 'serviciossolicita', 'trim|required');
        $this->form_validation->set_rules('condicionesgenerales', 'condicionesgenerales', 'trim|required');
        $this->form_validation->set_rules('doctopredial', 'doctopredial', 'trim|required');
        $this->form_validation->set_rules('doctonumerooficial', 'doctonumerooficial', 'trim|required');
        $this->form_validation->set_rules('doctoife', 'doctoife', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesupdate() {

        $this->form_validation->set_rules('solicitud', 'solicitud', 'trim|required');
        $this->form_validation->set_rules('cuentaligada', 'cuentaligada', 'trim|required');
        $this->form_validation->set_rules('tarifa', 'tarifa', 'trim|required');
        $this->form_validation->set_rules('zonafacturacion', 'zonafacturacion', 'trim|required');
        $this->form_validation->set_rules('zonaeconomica', 'zonaeconomica', 'trim|required');
        $this->form_validation->set_rules('diametrotoma', 'diametrotoma', 'trim|required');
        $this->form_validation->set_rules('iniciofacturacion', 'iniciofacturacion', 'trim|required');
        //$this->form_validation->set_rules('doctopredial', 'doctopredial', 'trim|required');
        //$this->form_validation->set_rules('doctonumerooficial', 'doctonumerooficial', 'trim|required');
        //$this->form_validation->set_rules('doctoife', 'doctoife', 'trim|required');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
        $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function cuenta_as() {
        if ($this->input->is_ajax_request()) {

            try {
                $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (5) ");

                $id = $this->input->post('ID');
                $servicios = $this->input->post('serviciossolicita');
                $iniciofacturacion = $this->input->post('iniciofacturacion');
                $solicitud = $this->input->post('solicitud');


                $cagua = "0";
                $ivaagua = "0";
                $ivadren = "0";
                $cdrenaje = "0";

                if ($servicios == 2 || $servicios == 3):
                    $drenaje = $costo->result()[1];
                    $ivadren = round($drenaje->costo_tram * 0.16, 2);
                    $cdrenaje = $drenaje->costo_tram;
                elseif ($servicios == 5 || $servicios == 4):
                    $agua = $costo->result()[0];
                    $drenaje = $costo->result()[1];
                    $ivaagua = round($agua->costo_tram * 0.16, 2);
                    $ivadren = round($drenaje->costo_tram * 0.16, 2);
                    $cagua = $agua->costo_tram;
                    $cdrenaje = $drenaje->costo_tram;
                elseif ($servicios == 1):
                    $agua = $costo->result()[0];
                    $cagua = $agua->costo_tram;
                    $ivaagua = round($agua->costo_tram * 0.16, 2);
                endif;

//                die(print_r($ivaagua, true));
                $row = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id_administrador($id);
//                die(print_r($row,true));
                $calle = str_pad($row->callepropietario, 5, 0, STR_PAD_LEFT);
                $colonia = str_pad($row->coloniapropietario, 5, 0, STR_PAD_LEFT);
                $calle1 = str_pad($row->callereferencia1, 5, 0, STR_PAD_LEFT);
                $calle2 = str_pad($row->callereferencia2, 5, 0, STR_PAD_LEFT);
                $actividad = str_pad($row->giroactividad, 10, 0, STR_PAD_LEFT);
                $client = new SoapClient("http://www.japami.gob.mx/jap/ws_contratos.asmx?WSDL");
                $fecha = date('d/m/Y', strtotime($iniciofacturacion));
                $nombre = $row->nombrepropietario . " " . $row->apaterno . " " . $row->amaterno;
                $nomedidor = "NO";
                $otrodom = "NO";
                if ($row->medidor != ""):

                    if ($row->medidor == 2):
                        $nomedidor = "NO";

                    elseif ($row->medidor == 1):
                        $nomedidor = "SI";
                    endif;
                endif;

                if ($row->otro_domicilio_facturacion != ""):

                    if ($row->otro_domicilio_facturacion == 0):
                        $otrodom = "NO";

                    elseif ($row->otro_domicilio_facturacion == 1):
                        $otrodom = "SI";
                    endif;
                endif;
                $params = array(
                    'Token' => 'contratos-hbWhCkFFCB795ke',
                    'Referencia_01' => '' . $solicitud,
                    'Referencia_02' => 'VENTANILLA',
                    'Referencia_03' => '',
                    'Metodo_Contratacion_ID' => '00002',
                    'No_Empleado' => '0',
                    'Colonia_ID' => '' . $colonia,
                    'Calle_ID' => '' . $calle,
                    'Numero_Exterior' => '' . $row->numeroextpropietario,
                    'Numero_Interior' => '' . $row->numerointpropietario,
                    'Calle_Referencia1_ID' => '' . $calle1,
                    'Calle_Referencia2_ID' => '' . $calle2,
                    'Actividad_Giro_ID' => '' . $actividad,
                    'Tarifa_ID' => '00001',
                    'Fecha_Inicio_Facturacion' => '' . $fecha,
                    'Nombre_Solicito' => '' . $nombre,
                    'Nombre' => '' . $row->nombrepropietario,
                    'Apellido_Paterno' => '' . $row->apaterno,
                    'Apellido_Materno' => '' . $row->amaterno,
                    'Telefono_Casa' => '' . $row->telefono,
                    'Telefono_Oficina' => '',
                    'Telefono_Celular' => '' . $row->nocelular,
                    'Correo_Electronico' => '' . $row->correo,
                    'Tiene_Medidor_SI_NO' => '' . $nomedidor,
                    'No_Medidor' => '' . $nomedidor != "NO" ? $row->nomedidor : "",
                    'Diametro_Toma' => '' . $nomedidor != "NO" ? "1/2" : "",
                    'Grupo_Concepto_ID' => '00001',
                    'Agua_SubTotal' => '' . $cagua,
                    'Agua_IVA' => '' . $ivaagua,
                    'Drenaje_SubTotal' => '' . $cdrenaje,
                    'Drenaje_IVA' => '' . $ivadren,
                    'Observaciones_Contrato' => '' . $row->observaciones,
                    'RFC' => '' . $row->rfc,
                    'Otro_Domicilio_Facturacion_SI_NO' => '' . $otrodom,
                    'Razon_Social' => '' . $otrodom != "NO" ? $row->razon_social : "",
                    'Domicilio_Facturacion' => '' . $otrodom != "NO" ? $row->domicilio_facturacion : "",
                    'Colonia_Facturacion' => '' . $otrodom != "NO" ? $row->colonia_facturacion : "",
                    'CP_Facturacion' => '' . $otrodom != "NO" ? $row->cp_facturacion : "",
                    'Ciudad_Facturacion' => '' . $otrodom != "NO" ? $row->ciudad_facturacion : "",
                    'Estado_Facturacion' => '' . $otrodom != "NO" ? $row->estado_facturacion : ""
                );
//  
//                die(print_r($params,TRUE));                $result2
//se invoca el metodo Prueba
                $result = $client->Registrar_Contrato($params);

//                     $data = json_decode($result->Registrar_ContratoResult);
//                     $data[0]->Mensaje
                //$result2[0]->Codigo_Barras
                //$result2[0]->No_Cuenta
                $result2 = $result;
                $result2 = json_decode($result2->Registrar_ContratoResult);
                if ($result2[0]->Estatus == "CORRECTO") {
                    $data = array(
                        'cuentaligada' => $result2[0]->No_Cuenta,
                        'codigo' => $result2[0]->Codigo_Barras,
                    );
                    $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->update($id, $data);
                }
                echo $result->Registrar_ContratoResult;
            } catch (Exception $e) {
                echo $e;
            }
        } else {
            show_404();
        }
    }

    function predial() {
        $predial = $this->input->post('predial');
        require_once(APPPATH . 'libraries/lib/nusoap.php'); //includes nusoap
        $cliente = new nusoap_client("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", true);


        //Use basic authentication method
        $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");

        $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '' . $predial);
        $respuesta = $cliente->call("Consulta", $parametros);

        $respuesta = json_decode($respuesta, true);
        if ($respuesta) {
//            echo json_encode($respuesta);
            if (isset($respuesta['COLONIA_ID'])) {
                $respuesta['COLONIA_ID'] = ltrim($respuesta['COLONIA_ID'], '0');
                $respuesta['COLONIA_ID'] = trim($respuesta['COLONIA_ID']);
                $colonia = $this->Colonias_japami_model->getColoniaJPtoPRED($respuesta['COLONIA_ID']);
                $colonia1 = $this->Colonias_japami_model->getIDColoniaJPtoPRED($colonia->NOMBRE);
                if (isset($colonia1->COLONIA_ID)):
                    $respuesta['COLONIA_ID'] = $colonia1->COLONIA_ID;
                else:
                    $respuesta['COLONIA_ID'] = 0;
                endif;
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

}

/* End of file Contratacion_y_servicios_de_agua_y_drenaje_domestico.php */
/* Ubicacion: ./application/controllers/Contratacion_y_servicios_de_agua_y_drenaje_domestico.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-05-31 01:18:28 */
/* http://www.ga-asociados.com */
