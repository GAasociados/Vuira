<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claves_fraccionamiento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Claves_catastrales_individual_model');
        $this->load->model('Claves_catastrales_individual_cetificado_model');
        $this->load->model('Claves_fraccionamiento_model');
        $this->load->model('Claves_catastrales_fraccionamiento_model');
        $this->load->library('form_validation');
        $this->load->library('zip');
        $this->load->model('Colonias_model');
        $this->load->model('Ccbd_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Calles_japami_model');
    }

    public function predial() {

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
                $respuesta['COLONIA_ID'] = trim($respuesta['COLONIA_ID'], '0');
                $respuesta['COLONIA_ID'] = trim($respuesta['COLONIA_ID']);
            }
            if (isset($respuesta['CALLE_ID'])) {
                $respuesta['CALLE_ID'] = trim($respuesta['CALLE_ID'], '0');
                $respuesta['CALLE_ID'] = trim($respuesta['CALLE_ID']);

                $CALLE = $this->Calles_japami_model->getcallepredialbyid($respuesta['CALLE_ID']);

                IF ($CALLE):
                    $respuesta['CALLE_ID'] = $CALLE->nombre;
                ELSE:
                    $respuesta['CALLE_ID'] = "";
                endif;
            }
            $respuesta['NO_EXTERIOR'] = trim($respuesta['NO_EXTERIOR'], '0');
            $respuesta['NO_EXTERIOR'] = trim($respuesta['NO_EXTERIOR']);
            $respuesta['TIPO_PREDIO_ID'] = trim($respuesta['TIPO_PREDIO_ID'], '0');
            $respuesta['TIPO_PREDIO_ID'] = trim($respuesta['TIPO_PREDIO_ID']);
            echo json_encode($respuesta);
        }
        else {
            echo json_encode(0);
        }
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
            $row = $this->Claves_fraccionamiento_model->get_by_id($id);

            if ($row && $row->usuarioID === $this->session->userdata('id') && $row->status === "4") {
                $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (2) ");
                $pagos = $costo->result();
                $data['concepto'] = "Solicitude de pago de";
                $data['des'] = "Pago de Clave Catastral Fraccionamiento";
                $data['importe'] = floatval($row->totalpago);
                $data['ref'] = "002";
                $data['id'] = "claves_fraccionamiento/update/" . $id;
                $this->load->view('pago', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    function contador() {
        $archivo = "assets/no_seguimiento.txt"; //el archivo que contiene en numero
        $archivo1 = "assets/fecha_no_seguimiento.txt";
        $fecha = date("Y");

        $fp1 = fopen($archivo1, "r");
        $contador1 = fgets($fp1, 26);
        fclose($fp1);
//          
//       die(print_r(   fclose($fp1)));
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

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $calle = urldecode($this->input->get('calle', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '' || $calle <> '') 
        {
            $aux="";
            if($q <> '')
            {
                $aux="q=".urlencode($q);
                if($calle <> '')
                {
                    $aux.="&calle=".urlencode($calle);
                }
            }
            else if($calle <> '')
            {
                $aux="calle=".urlencode($calle);
            }
            
            $config['base_url'] = base_url() . 'claves_fraccionamiento/?' . $aux;
            $config['first_url'] = base_url() . 'claves_fraccionamiento/?' . $aux;     
        
        }
        else
        {
            $config['base_url'] = base_url() . 'claves_fraccionamiento/';
            $config['first_url'] = base_url() . 'claves_fraccionamiento/';     
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;


        if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3) {
            $config['total_rows'] = $this->Claves_fraccionamiento_model->total_rows_ventana($q, $calle);

            $claves_catastrales_fraccionamiento = $this->Claves_fraccionamiento_model->get_limit_data_ventana($config['per_page'], $start, $q, $calle);
        } else {

            $config['total_rows'] = $this->Claves_fraccionamiento_model->total_rows($q, $calle);

            $claves_catastrales_fraccionamiento = $this->Claves_fraccionamiento_model->get_limit_data($config['per_page'], $start, $q, $calle);
        }
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
//        die(print_r($claves_catastrales_fraccionamiento));
        $data = array(
            'claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
            'q' => $q,
            'calle'=> $calle,//////////
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_list', $data);
    }

    public function reportes() {
        $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_reportes');
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
        $claves_catastrales_fraccionamiento = $this->Claves_catastrales_fraccionamiento_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave);

        $data = array(
            'claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
            'seguimiento' => $this->input->post('seguimiento', TRUE),
            'year' => $this->input->post('year', TRUE),
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
            'clave' => $this->input->post('clave', TRUE),
        );


        //print_r($data);
        $this->load->view('claves_catastrales_fraccionamiento/claves_catastrales_fraccionamiento_reportefinal', $data);
    }

    public function reportespdf() {
        $seguimineto = $this->input->post('seguimiento', TRUE);
        $year = $this->input->post('year', TRUE);
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);
        $clave = $this->input->post('clave', TRUE);

        if ($seguimineto):
            $nos = $seguimineto . $year;
        else:
            $nos = "";
        endif;
        $claves_catastrales_fraccionamiento = $this->Claves_catastrales_fraccionamiento_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave);
//        print_r($data);
        $data = array(
            'claves_catastrales_individual_data' => $claves_catastrales_fraccionamiento,
            'seguimiento' => $this->input->post('seguimiento', TRUE),
            'year' => $this->input->post('year', TRUE),
            'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
            'clave' => $this->input->post('clave', TRUE),
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
        $result = $this->Colonias_model->getcolonias();

        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");

        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Guardar',
                'action' => site_url('claves_catastrales_fraccionamiento/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'predialui' => set_value('predialui', $row->predialui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'razonsocial' => set_value('razonsocial', $row->razonsocial),
                'representantelegal' => set_value('representantelegal', $row->representantelegal),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'correodp' => set_value('correodp', $row->correodp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopodersimple' => set_value('doctopodersimple', $row->doctopodersimple),
                'doctoplanodigital' => set_value('doctoplanodigital', $row->doctoplanodigital),
                'doctolegal' => set_value('doctolegal', $row->doctolegal),
                'doctooficio' => set_value('doctooficio', $row->doctooficio),
                'doctoplanofisico' => set_value('doctoplanofisico', $row->doctoplanofisico),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'nooficialuin' => set_value('nooficialuin', $row->nooficialuin),
                'numerodpint' => set_value('numerodpint', $row->numerodpint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'cantidad' => set_value('cantidad', $row->cantidad),
                'costo' => $costo->result(),
                'morine' => set_value('morine', $row->morine),
                'poder_nota' => set_value('poder_nota', $row->poder_nota),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'acta_const' => set_value('acta_const', $row->acta_const),
                'coloniados' => set_value('acta_const', $row->coloniados),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );



            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_catastrales_fraccionamiento/update_action_admin');
            } else {
                $data['action'] = site_url('claves_catastrales_fraccionamiento/update_action');
            }

            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_catastrales_fraccionamiento/claves_catastrales_fraccionamiento_read', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_fraccionamiento'));
        }
    }

    public function generarzip($id) {
        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_admin($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'doctoine' => $row->doctoine,
                'doctopodersimple' => $row->doctopodersimple,
                'doctoplanodigital' => $row->doctoplanodigital,
                'doctolegal' => $row->doctolegal,
                'doctooficio' => $row->doctooficio,
                'doctoplanofisico' => $row->doctoplanofisico,
                'doctopredial' => $row->doctopredial,
                'doctopago' => $row->doctopago,
                'predialui' => $row->predialui
            );

            //print_r($data);
            echo "<br>";
            $path = "./assets/tramites/clavescatastralesfraccionamiento/";
            $this->zip->read_file($path . $row->doctoine);
            $this->zip->read_file($path . $row->doctopodersimple);
            $this->zip->read_file($path . $row->doctoplanodigital);
            $this->zip->read_file($path . $row->doctolegal);
            $this->zip->read_file($path . $row->doctooficio);
            $this->zip->read_file($path . $row->doctoplanofisico);
            $this->zip->read_file($path . $row->doctopredial);
            $this->zip->read_file($path . $row->doctopago);
            $this->zip->read_file($path . $row->doctofinal);
            //Download the file to your desktop. Name it "my_backup.zip"
            $this->zip->download($row->predialui . '.zip');
        }
    }

    public function create() {

        $result = $this->Colonias_model->getcoloniaspredial();
        $data = array(
            'consulta' => $result,
            'button' => 'Solicitar Trámite',
            'action' => site_url('claves_fraccionamiento/create_action'),
            'ID' => set_value('ID'),
            'calleui' => set_value('calleui'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocoloniaui' => set_value('cbocoloniaui'),
            'predialui' => set_value('predialui'),
            'mapa' => set_value('mapa'),
            'nombrepropietariodp' => set_value('nombrepropietariodp'),
            'representantelegal' => set_value('representantelegal'),
            'razonsocial' => set_value('razonsocial'),
            'calledp' => set_value('calledp'),
            'numerodp' => set_value('numerodp'),
            'coloniadp' => set_value('coloniadp'),
            'correodp' => set_value('correodp'),
            'telefonodp' => set_value('telefonodp'),
            'tipotramitedp' => set_value('tipotramitedp'),
            'doctoine' => set_value('doctoine'),
            'doctopodersimple' => set_value('doctopodersimple'),
            'doctoplanodigital' => set_value('doctoplanodigital'),
            'doctolegal' => set_value('doctolegal'),
            'doctooficio' => set_value('doctooficio'),
            'doctoplanofisico' => set_value('doctoplanofisico'),
            'doctopredial' => set_value('doctopredial'),
            'doctopago' => set_value('doctopago'),
            'doctofinal' => set_value('doctofinal'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'usuarioID' => set_value('usuarioID'),
            'ipropietario' => '1',
            'tipopersona' => '1',
            'domisiliosino' => '2',
            'nooficialuin' => set_value('nooficialuin'),
            'numerodpint' => set_value('numerodpint'),
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
        $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_form', $data);
    }

    public function create_ventanilla() {

        $result = $this->Colonias_model->getcoloniaspredial();
        $data = array(
            'consulta' => $result,
            'button' => 'Solicitar Trámite',
            'action' => site_url('claves_fraccionamiento/create_action'),
            'ID' => set_value('ID'),
            'calleui' => set_value('calleui'),
            'noloteui' => set_value('noloteui'),
            'nomanzanaui' => set_value('nomanzanaui'),
            'nooficialui' => set_value('nooficialui'),
            'cbocoloniaui' => set_value('cbocoloniaui'),
            'predialui' => set_value('predialui'),
            'mapa' => set_value('mapa'),
            'nombrepropietariodp' => set_value('nombrepropietariodp'),
            'representantelegal' => set_value('representantelegal'),
            'razonsocial' => set_value('razonsocial'),
            'calledp' => set_value('calledp'),
            'numerodp' => set_value('numerodp'),
            'coloniadp' => set_value('coloniadp'),
            'correodp' => set_value('correodp'),
            'telefonodp' => set_value('telefonodp'),
            'tipotramitedp' => set_value('tipotramitedp'),
            'doctoine' => set_value('doctoine'),
            'doctopodersimple' => set_value('doctopodersimple'),
            'doctoplanodigital' => set_value('doctoplanodigital'),
            'doctolegal' => set_value('doctolegal'),
            'doctooficio' => set_value('doctooficio'),
            'doctoplanofisico' => set_value('doctoplanofisico'),
            'doctopredial' => set_value('doctopredial'),
            'doctopago' => set_value('doctopago'),
            'doctofinal' => set_value('doctofinal'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'usuarioID' => set_value('usuarioID'),
            'ipropietario' => '1',
            'tipopersona' => '1',
            'domisiliosino' => '2',
            'nooficialuin' => set_value('nooficialuin'),
            'numerodpint' => set_value('numerodpint'),
            'numerocontrol' => set_value('numerocontrol'),
            'cantidad' => set_value('cantidad'),
            'coloniados' => set_value('coloniados'),
        );
        $user_id = $this->session->userdata('id');
        $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
        $data['INE'] = $INE;
        $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
        $data['predial'] = $predial;
        $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
        $data['noficial'] = $noficial;
        $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_form_fun', $data);
    }

    public function create_action() {


        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '465';
        $config['smtp_host'] = 'mail.naturalmentefuerte.com';
        $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
        $config['smtp_pass'] = 'u3g0Xy0aR6';
        $config['mailtype'] = 'html';

        //Tamaño Maximo de los Archivos 20 Megas
        $configzip = $config['max_size'] = "21504";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;
//        $numero = $this->contador();

        $data = array(
            'calleui' => $this->input->post('calleui', TRUE),
            'noloteui' => $this->input->post('noloteui', TRUE),
            'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
            'nooficialui' => $this->input->post('nooficialui', TRUE),
            'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
            'nooficialuin' => $this->input->post('nooficialuin', TRUE),
            'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
            'predialui' => $this->input->post('predialui', TRUE),
            'mapa' => $this->input->post('mapa', TRUE),
            'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
            'razonsocial' => $this->input->post('razonsocial', TRUE),
            'calledp' => $this->input->post('calledp', TRUE),
            'numerodp' => $this->input->post('numerodp', TRUE),
            'coloniadp' => $this->input->post('coloniadp', TRUE),
            'correodp' => $this->input->post('correodp', TRUE),
            'telefonodp' => $this->input->post('telefonodp', TRUE),
            'tipotramitedp' => $this->input->post('tipotramitedp', TRUE),
            'usuarioID' => $this->session->userdata('id'),
            'status' => "1",
            'nooficialuin' => $this->input->post('nooficialuin', TRUE),
            'numerodpint' => $this->input->post('numerodpint', TRUE),
//            'numerocontrol' => "" . $numero,
            'notificacion' => "1",
            'coloniados' => $this->input->post('colonia2', TRUE),
        );
        if ($this->session->userdata('tipo') == 15) {
            $data['status'] = '2';
        }

//        die(var_dump($_FILES));
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


        $maxnumbd = $this->Claves_fraccionamiento_model->insert($data);
        $data = "";
        if (!empty($_FILES['morine']['tmp_name'][0])) {
            $numfiles = count($_FILES['morine']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['morine']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['morine']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-morine.zip')) {
                $data['morine'] = "file-" . $maxnumbd . "-morine.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['morine'] = "";
        }
        if (!empty($_FILES['poder_nota']['tmp_name'][0])) {
            $numfiles = count($_FILES['poder_nota']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['poder_nota']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['poder_nota']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-poder_nota.zip')) {
                $data['poder_nota'] = "file-" . $maxnumbd . "-poder_nota.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['poder_nota'] = "";
        }
        if (!empty($_FILES['acta_const']['tmp_name'][0])) {
            $numfiles = count($_FILES['acta_const']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['acta_const']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['acta_const']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-acta_const.zip')) {
                $data['acta_const'] = "file-" . $maxnumbd . "-acta_const.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['acta_const'] = "";
        }
        if (!empty($_FILES['fisrfc']['tmp_name'][0])) {
            $numfiles = count($_FILES['fisrfc']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['fisrfc']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['fisrfc']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-fisrfc.zip')) {
                $data['fisrfc'] = "file-" . $maxnumbd . "-fisrfc.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['fisrfc'] = "";
        }

        if (!empty($_FILES['doctoine']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctoine']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctoine']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoine.zip')) {
                $data['doctoine'] = "file-" . $maxnumbd . "-doctoine.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctoine'] = "";
        }

        if (!empty($_FILES['doctopodersimple']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctopodersimple']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopodersimple']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctopodersimple']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopodersimple.zip')) {
                $data['doctopodersimple'] = "file-" . $maxnumbd . "-doctopodersimple.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctopodersimple'] = "";
        }
        if (!empty($_FILES['doctoplanodigital']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctoplanodigital']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctoplanodigital']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctoplanodigital']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoplanodigital.zip')) {
                $data['doctoplanodigital'] = "file-" . $maxnumbd . "-doctoplanodigital.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctoplanodigital'] = "";
        }
        if (!empty($_FILES['doctolegal']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctolegal']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctolegal']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctolegal']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctolegal.zip')) {
                $data['doctolegal'] = "file-" . $maxnumbd . "-doctolegal.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctolegal'] = "";
        }
        if (!empty($_FILES['doctooficio']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctooficio']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctooficio']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctooficio']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctooficio.zip')) {
                $data['doctooficio'] = "file-" . $maxnumbd . "-doctooficio.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctooficio'] = "";
        }
        if (!empty($_FILES['doctoplanofisico']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctoplanofisico']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctoplanofisico']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctoplanofisico']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoplanofisico.zip')) {
                $data['doctoplanofisico'] = "file-" . $maxnumbd . "-doctoplanofisico.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctoplanofisico'] = "";
        }
        if (!empty($_FILES['doctopredial']['tmp_name'][0])) {
            $numfiles = count($_FILES['doctopredial']['tmp_name']);
            //Documentos Bitacora
            for ($i = 0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopredial']['tmp_name'][$i];
                $this->zip->read_file($path, $variablefile['doctopredial']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopredial.zip')) {
                $data['doctopredial'] = "file-" . $maxnumbd . "-doctopredial.zip";
                //echo "Guarda";
            }
            $this->zip->clear_data();
            //echo "Entra al IF";
        } else {
            $data['doctopredial'] = "";
        }

        /////////Mensaje del Funcionario a Ciudadano///////////////
        $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($this->input->post('correodp', TRUE)); //Correo del ciudadano
        $this->email->subject('Autorización y Atención de Claves Catastrales Fraccionamiento');
        $this->email->message('Su solicitud del trámite Autorización y Atención de Claves Catastrales Fraccionamiento ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.');
//        $this->email->send();
        /////////Mensaje del Ciudadano a Funcionario///////////////
        $this->email->from($this->input->post('correodp', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('jcabreramendiola@gmail.com');
        $this->email->subject('Autorización y Atención de Claves Catastrales Fraccionamiento');
        $this->email->message('Usted tiene un nuevo trámite Autorización y Atención de Claves Catastrales Fraccionamiento para poder revisar la solicitud del trámite entre a http://www.irapuato.gob.mx/e-gob/vuira.');
//        $this->email->send();
        $fraccionamiento = $this->input->post('registro');
        $no_controlin = "";
        $no_controlfn = "";
        foreach ($fraccionamiento as $key) {
            $numero = $this->contador();
            if ($no_controlin == "") {
                $no_controlin = $numero;
            }
            $no_controlfn = $numero;
            $key['id_solicitud'] = $maxnumbd;
            $key['tipotramitedp'] = $this->input->post('tipotramitedp', TRUE);
            $key['nombrepropietariodp'] = $this->input->post('nombrepropietariodp', TRUE);
            $key['correodp'] = $this->input->post('correodp', TRUE);
            $key['telefonodp'] = $this->input->post('telefonodp', TRUE);
              $key['cantidad'] = 1;
            if ($this->input->post('tipopersonafi') != "") {
                $key['tipopersona'] = '2';
            } else if ($this->input->post('tipopersonamo') != "") {
                $key['tipopersona'] = '1';
            }

            if ($this->input->post('ipropietariosi') != "") {
                $key['ipropietario'] = '1';
            } else if ($this->input->post('ipropietariono') != "") {
                $key['ipropietario'] = '2';
            }
            if ($this->session->userdata('tipo') == 15) {
                $key['status'] = '2';
                $key['notificacion'] = '0';
            } else {
                $key['status'] = '1';
                $key['notificacion'] = '1';
            }
            $key['numerocontrol'] = "" . $numero;

            $key['usuarioID'] = $this->session->userdata('id');
            $this->Claves_catastrales_fraccionamiento_model->insert($key);
        }
        $data['numerocontrol'] = $no_controlin . "-" . $no_controlfn;
//        die(print_r($fraccionamiento, true));
        $this->Claves_fraccionamiento_model->update($maxnumbd, $data);
        $this->session->set_flashdata('correcto', 'Su solicitud de Clave Catastral Fraccionamiento ha sido registrada con éxito un Funcionario dará revisión y le notificará vía correo electrónico');
        if ($this->session->userdata('tipo') == 15) {
            redirect(site_url('claves_fraccionamiento/update/' . $maxnumbd));
        } else {
            redirect(site_url('claves_fraccionamiento'));
        }
    }

    public function update($id) {
        $result = $this->Colonias_model->getcoloniaspredial();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_fraccionamiento_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_fraccionamiento_model->get_by_id($id);
        }

        $row2 = $this->Claves_catastrales_fraccionamiento_model->get_all_reg($id);

//         $row2 = json_encode($row2);
//           $row2 = json_decode($row2);
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");

        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Guardar',
                'action' => site_url('claves_fraccionamiento/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'predialui' => set_value('predialui', $row->predialui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'razonsocial' => set_value('razonsocial', $row->razonsocial),
                'representantelegal' => set_value('representantelegal', $row->representantelegal),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'correodp' => set_value('correodp', $row->correodp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopodersimple' => set_value('doctopodersimple', $row->doctopodersimple),
                'doctoplanodigital' => set_value('doctoplanodigital', $row->doctoplanodigital),
                'doctolegal' => set_value('doctolegal', $row->doctolegal),
                'doctooficio' => set_value('doctooficio', $row->doctooficio),
                'doctoplanofisico' => set_value('doctoplanofisico', $row->doctoplanofisico),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'nooficialuin' => set_value('nooficialuin', $row->nooficialuin),
                'numerodpint' => set_value('numerodpint', $row->numerodpint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'cantidad' => set_value('cantidad', $row->cantidad),
                'costo' => $costo->result(),
                'morine' => set_value('morine', $row->morine),
                'poder_nota' => set_value('poder_nota', $row->poder_nota),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'acta_const' => set_value('acta_const', $row->acta_const),
                'coloniados' => set_value('acta_const', $row->coloniados),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
                'solicitudes' => json_encode($row2),
            );



            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_fraccionamiento/update_action_admin');
            } else {
                $data['action'] = site_url('claves_fraccionamiento/update_action');
            }

            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_form_update', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_fraccionamiento'));
        }
    }

    public function update_ventanilla($id) {
        $result = $this->Colonias_model->getcolonias();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_fraccionamiento_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_fraccionamiento_model->get_by_id($id);
        }
        $row2 = $this->Claves_catastrales_fraccionamiento_model->get_all_reg($id);
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");

        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Actualizar',
                'action' => site_url('claves_fraccionamiento/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'predialui' => set_value('predialui', $row->predialui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'razonsocial' => set_value('razonsocial', $row->razonsocial),
                'representantelegal' => set_value('representantelegal', $row->representantelegal),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'correodp' => set_value('correodp', $row->correodp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopodersimple' => set_value('doctopodersimple', $row->doctopodersimple),
                'doctoplanodigital' => set_value('doctoplanodigital', $row->doctoplanodigital),
                'doctolegal' => set_value('doctolegal', $row->doctolegal),
                'doctooficio' => set_value('doctooficio', $row->doctooficio),
                'doctoplanofisico' => set_value('doctoplanofisico', $row->doctoplanofisico),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'nooficialuin' => set_value('nooficialuin', $row->nooficialuin),
                'numerodpint' => set_value('numerodpint', $row->numerodpint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'cantidad' => set_value('cantidad', $row->cantidad),
                'costo' => $costo->result(),
                'morine' => set_value('morine', $row->morine),
                'poder_nota' => set_value('poder_nota', $row->poder_nota),
                'fisrfc' => set_value('fisrfc', $row->fisrfc),
                'acta_const' => set_value('acta_const', $row->acta_const),
                'coloniados' => set_value('coloniados', $row->coloniados),
                'solicitudes' => json_encode($row2),
            );



            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
                $data['action'] = site_url('claves_fraccionamiento/update_action_admin');
            } else {
                $data['action'] = site_url('claves_fraccionamiento/update_action');
            }

            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_form_fun_1', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_fraccionamiento'));
        }
    }

    public function update_action() {
        $this->_rulesupdate();
        
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '465';
        $config['smtp_host'] = 'mail.naturalmentefuerte.com';
        $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
        $config['smtp_pass'] = 'u3g0Xy0aR6';
        $config['mailtype'] = 'html';

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'calleui' => $this->input->post('calleui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'predialui' => $this->input->post('predialui', TRUE),
                'mapa' => $this->input->post('mapa', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'razonsocial' => $this->input->post('razonsocial', TRUE),
                'representantelegal' => $this->input->post('representantelegal', TRUE),
                'calledp' => $this->input->post('calledp', TRUE),
                'numerodp' => $this->input->post('numerodp', TRUE),
                'coloniadp' => $this->input->post('coloniadp', TRUE),
                'correodp' => $this->input->post('correodp', TRUE),
                'telefonodp' => $this->input->post('telefonodp', TRUE),
                'tipotramitedp' => $this->input->post('tipotramitedp', TRUE),
                'notificacion' => "1",
                'nooficialuin' => $this->input->post('nooficialuin', TRUE),
                'numerodpint' => $this->input->post('numerodpint', TRUE),
                'coloniados' => $this->input->post('colonia2', TRUE),
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
            //$this->Claves_fraccionamiento_model->update($maxnumbd, $data);
            //$data = "";            

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;
            
            if (!empty($_FILES['morine']['tmp_name'][0])) {
                $numfiles = count($_FILES['morine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['morine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['morine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-morine.zip')) {
                    $data['morine'] = "file-" . $maxnumbd . "-morine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            if (!empty($_FILES['poder_nota']['tmp_name'][0])) {
                $numfiles = count($_FILES['poder_nota']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['poder_nota']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['poder_nota']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-poder_nota.zip')) {
                    $data['poder_nota'] = "file-" . $maxnumbd . "-poder_nota.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } 
            if (!empty($_FILES['acta_const']['tmp_name'][0])) {
                $numfiles = count($_FILES['acta_const']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['acta_const']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['acta_const']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-acta_const.zip')) {
                    $data['acta_const'] = "file-" . $maxnumbd . "-acta_const.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } 
            if (!empty($_FILES['fisrfc']['tmp_name'][0])) {
                $numfiles = count($_FILES['fisrfc']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['fisrfc']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['fisrfc']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-fisrfc.zip')) {
                    $data['fisrfc'] = "file-" . $maxnumbd . "-fisrfc.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctoine']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoine.zip')) {
                    $data['doctoine'] = "file-" . $maxnumbd . "-doctoine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopodersimple']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopodersimple']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopodersimple']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopodersimple']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopodersimple.zip')) {
                    $data['doctopodersimple'] = "file-" . $maxnumbd . "-doctopodersimple.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctoplanodigital']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoplanodigital']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoplanodigital']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoplanodigital']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoplanodigital.zip')) {
                    $data['doctoplanodigital'] = "file-" . $maxnumbd . "-doctoplanodigital.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctolegal']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctolegal']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctolegal']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctolegal']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctolegal.zip')) {
                    $data['doctolegal'] = "file-" . $maxnumbd . "-doctolegal.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctooficio']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctooficio']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctooficio']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctooficio']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctooficio.zip')) {
                    $data['doctooficio'] = "file-" . $maxnumbd . "-doctooficio.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctoplanofisico']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoplanofisico']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoplanofisico']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoplanofisico']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoplanofisico.zip')) {
                    $data['doctoplanofisico'] = "file-" . $maxnumbd . "-doctoplanofisico.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopredial']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopredial']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopredial']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopredial']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopredial.zip')) {
                    $data['doctopredial'] = "file-" . $maxnumbd . "-doctopredial.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }


            /////////Mensaje del Funcionario a Ciudadano///////////////
            $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to($this->input->post('correodp', TRUE)); //Correo del ciudadano
            $this->email->subject('Autorización y Atención de Claves Catastrales Fraccionamiento');
            $this->email->message('Los datos del trámite Autorización y Atención de Claves Catastrales Fraccionamiento han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.');
            $this->email->send();
            /////////Mensaje del Ciudadano a Funcionario///////////////
            $this->email->from($this->input->post('correodp', TRUE), 'Ventanilla Universal de trámites y servicios de Irapuato');
            $this->email->to('jcabreramendiola@gmail.com');
            $this->email->subject('Autorización y Atención de Claves Catastrales Fraccionamiento');
            $this->email->message('El trámite Autorización y Atención de Claves Catastrales Fraccionamiento a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', a sido actualizado, por favor revise la información para continuar con el proceso del trámite.');
            $this->email->send();

            //$this->Claves_catastrales_fraccionamiento_model->update($this->input->post('ID', TRUE), $data);
            $this->Claves_fraccionamiento_model->update($maxnumbd, $data);
            $this->session->set_flashdata('correcto', 'Su solicitud ha sido modificada con éxito');
            redirect(base_url('claves_fraccionamiento'));
        }
    }

    public function update_action_admin() {
        $this->_rulesupdate();

        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '465';
        $config['smtp_host'] = 'mail.naturalmentefuerte.com';
        $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
        $config['smtp_pass'] = 'u3g0Xy0aR6';
        $config['mailtype'] = 'html';

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'mensaje' => $this->input->post('mensaje', TRUE),
                'status' => $this->input->post('status', TRUE),
                'numerocontrol' => $this->input->post('numerocontrol', TRUE),
                'cantidad' => $this->input->post('cantidad', TRUE),
                'notificacion' => "0",
                'calleui' => $this->input->post('calleui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'nooficialuin' => $this->input->post('nooficialuin', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'predialui' => $this->input->post('predialui', TRUE),
                'coloniados' => $this->input->post('colonia2', TRUE),
                'numerocontrol' => $this->input->post('numerocontrol', TRUE),
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
//            die();
            $maxnumbd = $this->input->post('ID', TRUE);
            
            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;
            
            if (!empty($_FILES['morine']['tmp_name'][0])) {
                $numfiles = count($_FILES['morine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['morine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['morine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-morine.zip')) {
                    $data['morine'] = "file-" . $maxnumbd . "-morine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            if (!empty($_FILES['poder_nota']['tmp_name'][0])) {
                $numfiles = count($_FILES['poder_nota']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['poder_nota']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['poder_nota']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-poder_nota.zip')) {
                    $data['poder_nota'] = "file-" . $maxnumbd . "-poder_nota.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } 
            if (!empty($_FILES['acta_const']['tmp_name'][0])) {
                $numfiles = count($_FILES['acta_const']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['acta_const']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['acta_const']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-acta_const.zip')) {
                    $data['acta_const'] = "file-" . $maxnumbd . "-acta_const.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } 
            if (!empty($_FILES['fisrfc']['tmp_name'][0])) {
                $numfiles = count($_FILES['fisrfc']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['fisrfc']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['fisrfc']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-fisrfc.zip')) {
                    $data['fisrfc'] = "file-" . $maxnumbd . "-fisrfc.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['doctoine']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoine']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoine']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoine']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoine.zip')) {
                    $data['doctoine'] = "file-" . $maxnumbd . "-doctoine.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopodersimple']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopodersimple']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopodersimple']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopodersimple']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopodersimple.zip')) {
                    $data['doctopodersimple'] = "file-" . $maxnumbd . "-doctopodersimple.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctoplanodigital']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoplanodigital']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoplanodigital']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoplanodigital']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoplanodigital.zip')) {
                    $data['doctoplanodigital'] = "file-" . $maxnumbd . "-doctoplanodigital.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctolegal']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctolegal']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctolegal']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctolegal']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctolegal.zip')) {
                    $data['doctolegal'] = "file-" . $maxnumbd . "-doctolegal.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctooficio']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctooficio']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctooficio']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctooficio']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctooficio.zip')) {
                    $data['doctooficio'] = "file-" . $maxnumbd . "-doctooficio.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctoplanofisico']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctoplanofisico']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctoplanofisico']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctoplanofisico']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctoplanofisico.zip')) {
                    $data['doctoplanofisico'] = "file-" . $maxnumbd . "-doctoplanofisico.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopredial']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopredial']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopredial']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopredial']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopredial.zip')) {
                    $data['doctopredial'] = "file-" . $maxnumbd . "-doctopredial.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }
            if (!empty($_FILES['doctopago']['tmp_name'][0])) {
                $numfiles = count($_FILES['doctopago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['doctopago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['doctopago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-doctopago.zip')) {
                    $data['doctopago'] = "file-" . $maxnumbd . "-doctopago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
            }

            if ($this->input->post('status', TRUE) == 2) {
                /////////Mensaje del Funcionario a Ciudadano///////////////
                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correodp', TRUE)); //Correo del ciudadano $this->input->post('correo',TRUE)
                $this->email->subject('Autorización y Atención de Claves Catastrales Fraccionamiento');
                $this->email->message('En su solicitud del trámite Autorización y Atención de Claves Catastrales Fraccionamiento a nombre  de' . $this->input->post('nombrepropietariodp', TRUE) . ', ha sido aprobada y se encuentra en revisión de información.');
//                $this->email->send();
            } else {


                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correodp', TRUE)); //Correo del ciudadano $this->input->post('correo',TRUE)
                $this->email->subject('Autorización y Atención de Claves Catastrales Fraccionamiento');
                $this->email->message('En su solicitud del trámite Autorización y Atención de Claves Catastrales Fraccionamiento a nombre  de' . $this->input->post('nombrepropietariodp', TRUE) . ', se requieren las siguientes acciones: ' . $this->input->post('mensaje', TRUE) . ' favor de realizar los cambios correspondientes para continuar con el trámite.');
//                $this->email->send();
            }
//            die(print_r($data,true));
            /////////Mensaje del Funcionario a Ciudadano///////////////


            $row2 = $this->Claves_catastrales_fraccionamiento_model->get_all_reg($this->input->post('ID', TRUE));
            
            foreach ($row2 as $reg) {
                $data2 = array(
                    'status' => $this->input->post('status', TRUE),
                );
//                 die(print_r($reg->ID,true));
                $this->Claves_catastrales_fraccionamiento_model->update($reg->ID, $data2);
            }
            
            $this->Claves_fraccionamiento_model->update($this->input->post('ID', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('claves_fraccionamiento'));
        }
    }

    public function delete($id) {
        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id($id);

        if ($row) {
            $this->Claves_catastrales_fraccionamiento_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('claves_catastrales_fraccionamiento'));
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('claves_catastrales_fraccionamiento'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('calleui', 'calleui', 'trim|required');
        $this->form_validation->set_rules('noloteui', 'noloteui', 'trim|required');
        $this->form_validation->set_rules('nomanzanaui', 'nomanzanaui', 'trim|required');
        $this->form_validation->set_rules('nooficialui', 'nooficialui', 'trim|required');
        $this->form_validation->set_rules('cbocoloniaui', 'cbocoloniaui', 'trim|required');
        $this->form_validation->set_rules('predialui', 'predialui', 'trim|required');
        $this->form_validation->set_rules('mapa', 'mapa', 'trim|required');
        $this->form_validation->set_rules('nombrepropietariodp', 'nombrepropietariodp', 'trim|required');
        $this->form_validation->set_rules('razonsocial', 'razonsocial', 'trim|required');
        $this->form_validation->set_rules('calledp', 'calledp', 'trim|required');
        $this->form_validation->set_rules('numerodp', 'numerodp', 'trim|required');
        $this->form_validation->set_rules('coloniadp', 'coloniadp', 'trim|required');
        $this->form_validation->set_rules('correodp', 'correodp', 'trim|required');
        $this->form_validation->set_rules('telefonodp', 'telefonodp', 'trim|required');
        $this->form_validation->set_rules('tipotramitedp', 'tipotramitedp', 'trim|required');
        $this->form_validation->set_rules('doctoine', 'doctoine', 'trim|required');
        $this->form_validation->set_rules('doctopodersimple', 'doctopodersimple', 'trim|required');
        $this->form_validation->set_rules('doctoplanodigital', 'doctoplanodigital', 'trim|required');
        $this->form_validation->set_rules('doctolegal', 'doctolegal', 'trim|required');
        $this->form_validation->set_rules('doctooficio', 'doctooficio', 'trim|required');
        $this->form_validation->set_rules('doctoplanofisico', 'doctoplanofisico', 'trim|required');
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
        $row = $this->Claves_catastrales_fraccionamiento_model->get_tramites();
        $resultq = $this->Usuarios_model->get_usuarios();
        $data = array(
            'Claves_catastrales_fraccionamiento_data' => $row,
            'auxiliares' => $resultq
        );

        $this->load->view('fraccionamiento_tramite/claves_catastrales_fraccionamiento_tramite', $data);
    }

    public function asignar_func() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);
        //die(print_r($data, TRUE));
        foreach ($id as $i) {
            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
                'status' => "3",
            );


            $this->Claves_catastrales_fraccionamiento_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }

        redirect(site_url('Claves_catastrales_fraccionamiento/tramites'));
    }

    public function asigna() {
        $s = $this->session->userdata('id');
        $row = $this->Claves_catastrales_fraccionamiento_model->get_asinacion($s);

        $data = array(
            'Claves_catastrales_fraccionamiento_data' => $row,
        );
        //die(print_r($data, TRUE));
        $this->load->view('fraccionamiento_tramite/claves_catastrales_fraccionamiento_asignacion', $data);
    }

    public function clave($id) {
        $result = $this->Colonias_model->getcoloniaspredial();


        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);


        if ($row) {
            $data = array(
                'consulta' => $result,
                'button' => 'Guardar',
                'action' => site_url('claves_catastrales_fraccionamiento/update_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'predialui' => set_value('predialui', $row->predialui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'razonsocial' => set_value('razonsocial', $row->razonsocial),
                'representantelegal' => set_value('representantelegal', $row->representantelegal),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'correodp' => set_value('correodp', $row->correodp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopodersimple' => set_value('doctopodersimple', $row->doctopodersimple),
                'doctoplanodigital' => set_value('doctoplanodigital', $row->doctoplanodigital),
                'doctolegal' => set_value('doctolegal', $row->doctolegal),
                'doctooficio' => set_value('doctooficio', $row->doctooficio),
                'doctoplanofisico' => set_value('doctoplanofisico', $row->doctoplanofisico),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'nooficialuin' => set_value('nooficialuin', $row->nooficialuin),
                'numerodpint' => set_value('numerodpint', $row->numerodpint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave', $row->clave),
                'cantidad' => set_value('cantidad', $row->cantidad),
                'autocat' => set_value('autocat', $row->autocat),
                'coloniados' => set_value('acta_const', $row->coloniados),
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
                'acc' => set_value('acc', $row->acc),
                'acct' => set_value('acct', $row->acct),
                'acd' => set_value('acd', $row->acd),
                'acdt' => set_value('acdt', $row->acdt),
                'totalind' => set_value('totalind', $row->totalind),
                'totalindt' => set_value('totalindt', $row->totalindt),
                'porcent' => set_value('porcent', $row->porcent),
                'porcentt' => set_value('porcentt', $row->porcentt),
                'nooficio' => set_value('nooficio', $row->nooficio),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
            );


            $data['action'] = site_url('claves_catastrales_fraccionamiento/update_action_clave');


            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_catastrales_fraccionamiento/claves_catastrales_fraccionamiento_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Claves_catastrales_fraccionamiento'));
        }
    }

    public function update_action_clave() {
        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $maxnumbd = $this->input->post('ID', TRUE);
            $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_admin($maxnumbd);
            $config1['upload_path'] = './assets/tramites/clavescatastralesindividual/';
            $config1['allowed_types'] = '*';
            $config1['max_size'] = '0';
            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            $data = array(
                'calleui' => $this->input->post('calleui', TRUE),
                'noloteui' => $this->input->post('noloteui', TRUE),
                'nomanzanaui' => $this->input->post('nomanzanaui', TRUE),
                'nooficialui' => $this->input->post('nooficialui', TRUE),
                'cbocoloniaui' => $this->input->post('cbocoloniaui', TRUE),
                'nooficialuin' => $this->input->post('nooficialuin', TRUE),
                'nombrepropietariodp' => $this->input->post('nombrepropietariodp', TRUE),
                'predialui' => $this->input->post('predialui', TRUE),
                'coloniados' => $this->input->post('colonia2', TRUE),
                'valido_pago' => set_value('valido_pago', $row->valido_pago),
            );

            $variablefile = $_FILES;


            if (!empty($_FILES['autocat']['tmp_name'][0])) {
                $numfiles = count($_FILES['autocat']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['autocat']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['autocat']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/clavescatastralesfraccionamiento/file-' . $maxnumbd . '-autocat.zip')) {
                    $data['autocat'] = "file-" . $maxnumbd . "-autocat.zip";
//                    $data['status'] = '4';
//                    $data['notificacion'] = 0;
                }
                $this->zip->clear_data();
            }
            $this->Claves_catastrales_fraccionamiento_model->update($this->input->post('ID', TRUE), $data);
            $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_admin($maxnumbd);
            if ($row->doctofinal != "" && $row->doctopago != "" && $row->autocat != "") {

                $data['status'] = "4";

                $this->load->library('email');
                $config['protocol'] = 'smtp';
                $config['smtp_port'] = '25';
                $config['smtp_host'] = '192.168.1.203';
                $config['smtp_user'] = 'vuira';
                $config['smtp_pass'] = 'Irapuato.2018';
                $config['mailtype'] = 'html';

                $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correonotificacionesdp', TRUE)); //Correo del ciudadano
                $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');
                $this->email->message('En su solicitud del trámite Autorización y Atención de Clave Catastral Individual con Escritura Pública a nombre  de ' . $this->input->post('nombrepropietariodp', TRUE) . ', Se encuentra en espera de Autorización.');
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


            $this->Claves_catastrales_fraccionamiento_model->update($this->input->post('ID', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Claves_catastrales_fraccionamiento/asigna'));
        }
    }

    public function vistapago($id) {
        $result = $this->Colonias_model->getcolonias();
        $resultq = $this->Usuarios_model->get_usuarios();

        if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
            $row = $this->Claves_fraccionamiento_model->get_by_id_administrador($id);
        } else {
            $row = $this->Claves_fraccionamiento_model->get_by_id($id);
        }


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Actualizar',
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'predialui' => set_value('predialui', $row->predialui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
//                'categoriapredioui' => set_value('categoriapredioui', $row->categoriapredioui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
//                'nombreresolicitante' => set_value('nombreresolicitante', $row->nombreresolicitante),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
//                'callenotificacionesdp' => set_value('callenotificacionesdp', $row->callenotificacionesdp),
//                'numeronotificacionedp' => set_value('numeronotificacionedp', $row->numeronotificacionedp),
//                'colonianotificacionesdp' => set_value('colonianotificacionesdp', $row->colonianotificacionesdp),
                'correonotificacionesdp' => set_value('correodp', $row->correodp),
                'telefononotificacionesdp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
//                'motivotramitedp' => set_value('motivotramitedp', $row->motivotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
//                'doctolegalpropiedad' => set_value('doctolegalpropiedad', $row->doctolegalpropiedad),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'status' => set_value('status', $row->status),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
//                'otros_doc' => set_value('otros_doc', $row->otros_doc),
//                'otradoc' => set_value('otradoc', $row->otradoc),
                'auxiliar' => set_value('auxiliar', $row->auxiliar),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
//                'fisrfc' => set_value('fisrfc', $row->fisrfc),
//                'morine' => set_value('morine', $row->morine),
                'nooficialinui' => set_value('nooficialuin', $row->nooficialuin),
//                'numeronotificacionint' => set_value('numeronotificacionint', $row->numeronotificacionint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave'),
                'compro' => set_value('compro', $row->compro),
            );


            $data['action'] = site_url('Claves_fraccionamiento/vistapago_action');

            $id_ud = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_ud' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_ud' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_ud' ");
            $data['noficial'] = $noficial;


            $this->load->view('Claves_fraccionamiento/Claves_catastrales_fraccionamiento_vistapago', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Claves_fraccionamiento'));
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
                    if ($this->zip->archive('./assets/tramites/Claves_catastrales_fraccionamiento/file-' . $maxnumbd . '-compro.zip')) {
                        $data['compro'] = "file-" . $maxnumbd . "-compro.zip";
                        //echo "Guarda";
                    }
                    $this->zip->clear_data();
                    //echo "Entra al IF";
                }
                $this->Claves_fraccionamiento_model->update($this->input->post('ID', TRUE), $data);
                redirect(site_url('Claves_fraccionamiento'));
            } else {
                redirect(site_url('Claves_fraccionamiento/vistapago/' . $this->input->post('ID', TRUE)));
            }
        }
    }

    public function validar() {
        if ($this->session->userdata('admin') == 2):

            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('Inicio'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_fraccionamiento/validar/?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_fraccionamiento/validar/?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_fraccionamiento/validar';
                $config['first_url'] = base_url() . 'claves_catastrales_fraccionamiento/validar';
            }

            $config['per_page'] = 20;
            $config['page_query_string'] = TRUE;



            $config['total_rows'] = $this->Claves_catastrales_fraccionamiento_model->total_rows_validaciones($q);
            $claves_catastrales_fraccionamiento = $this->Claves_catastrales_fraccionamiento_model->get_validaciones($config['per_page'], $start, $q);


            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'Claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );


            $this->load->view('Claves_catastrales_fraccionamiento/Claves_catastrales_fraccionamiento_validar', $data);

        else:
            show_404();
        endif;
    }

    public function validar_tram($id) {
        $result = $this->Colonias_model->getcolonias();


        $resultq = $this->Usuarios_model->get_usuarios();

        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Validar Trámite',
                'action' => site_url('claves_catastrales_fraccionamiento/validar_tram_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'predialui' => set_value('predialui', $row->predialui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'razonsocial' => set_value('razonsocial', $row->razonsocial),
                'representantelegal' => set_value('representantelegal', $row->representantelegal),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'correodp' => set_value('correodp', $row->correodp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopodersimple' => set_value('doctopodersimple', $row->doctopodersimple),
                'doctoplanodigital' => set_value('doctoplanodigital', $row->doctoplanodigital),
                'doctolegal' => set_value('doctolegal', $row->doctolegal),
                'doctooficio' => set_value('doctooficio', $row->doctooficio),
                'doctoplanofisico' => set_value('doctoplanofisico', $row->doctoplanofisico),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'nooficialuin' => set_value('nooficialuin', $row->nooficialuin),
                'numerodpint' => set_value('numerodpint', $row->numerodpint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave', $row->clave),
                'cantidad' => set_value('cantidad', $row->cantidad),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );


            $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);
//            die(print_r($resultq,true));
            $data['func'] = $resultq;


            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_catastrales_fraccionamiento/claves_catastrales_fraccionamiento_form_autorizacion', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Claves_catastrales_fraccionamiento/validar'));
        }
    }

    public function validar_tram_action() {

        $data = array(
            'validacion' => 1,
        );

        $i = $this->input->post('ID');
        $this->Claves_catastrales_fraccionamiento_model->update($i, $data);
        $this->session->set_flashdata('correcto', 'El Támite se valido de manera correcta');
        redirect(site_url('Claves_catastrales_fraccionamiento/validar'));
    }

    public function ventanilla() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_fraccionamiento/ventanilla/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_fraccionamiento/ventanilla/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_fraccionamiento/ventanilla/';
            $config['first_url'] = base_url() . 'claves_fraccionamiento/ventanilla/';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Claves_fraccionamiento_model->total_rows_ventana($q);

        $claves_catastrales_individual = $this->Claves_fraccionamiento_model->get_limit_data_ventana($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
//        die()
        $data = array(
            'claves_catastrales_fraccionamiento_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('claves_fraccionamiento/claves_catastrales_fraccionamiento_list_ventanilla', $data);
    }

    public function reasignar() {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'claves_catastrales_fraccionamiento/reasignar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'claves_catastrales_fraccionamiento/reasignar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'claves_catastrales_fraccionamiento/reasignar';
            $config['first_url'] = base_url() . 'claves_catastrales_fraccionamiento/reasignar';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;


        $config['total_rows'] = $this->Claves_catastrales_fraccionamiento_model->total_rows_reasignar($q);

        $claves_catastrales_individual = $this->Claves_catastrales_fraccionamiento_model->get_reasignar($config['per_page'], $start, $q);
//  die();
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $resultq = $this->Usuarios_model->get_usuarios();
        $data = array(
            'Claves_catastrales_fraccionamiento_data' => $claves_catastrales_individual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'auxiliares' => $resultq,
        );


        $this->load->view('claves_catastrales_fraccionamiento/claves_catastrales_fraccionamiento_tramite_1', $data);
    }

    public function asignar_func2() {

        $ids = $this->input->post('IDs', TRUE);
        $id = explode(",", $ids);

        foreach ($id as $i) {


            $data = array(
                'auxiliar' => $this->input->post('auxiliar', TRUE),
            );
            $this->Claves_catastrales_fraccionamiento_model->update($i, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
        }
        redirect(site_url('claves_catastrales_fraccionamiento/reasignar'));
    }

    public function vistapa($id = null) {
        if ($id == null) {

            $id = $this->input->post('ID');
            $nocontrol = $this->input->post('nocontrol');
            if ($id != "") {
                $row = $this->Claves_fraccionamiento_model->get_by_id_administrador($id);

                $row2 = $this->Claves_catastrales_fraccionamiento_model->get_all_reg($id);
//                die(print_r($row2));
                $fecha = date("Y-m-d", strtotime("" . $this->input->post('fecha_ini')));
                $fecha1 = date("Y-m-d H:i", strtotime("" . $this->input->post('fecha_exp') . "T" . $this->input->post('hora')));

                $data = array(
                    'fechainicio' => $fecha,
                    'fechafinal' => $fecha1,
                    'numerocontrol' => $nocontrol
                );
                $data1 = array(
                    'fechainicio' => $fecha,
                    'fechafinal' => $fecha1,
                );

                $this->Claves_fraccionamiento_model->update($id, $data);
                foreach ($row2 as $seccion) {
                    $idreg = $seccion->ID;
                    $this->Claves_catastrales_fraccionamiento_model->update($idreg, $data1);
                }
                $data['propietario'] = $row->nombrepropietariodp;
                $data['orden'] = $nocontrol;
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

            $row = $this->Claves_fraccionamiento_model->get_by_id_administrador($id);
            $data = array(
                'fechainicio' => date("Y-m-d H:i", strtotime("" . $row->fechainicio)),
                'fechafinal' => date("Y-m-d H:i", strtotime("" . $row->fechafinal)),
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

    public function autorizar() {
        if ($this->session->userdata('admin') == 1):

            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('Inicio'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'claves_catastrales_fraccionamiento/autorizar/?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'claves_catastrales_fraccionamiento/autorizar/?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'claves_catastrales_fraccionamiento/autorizar';
                $config['first_url'] = base_url() . 'claves_catastrales_fraccionamiento/autorizar';
            }

            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;



            $config['total_rows'] = $this->Claves_catastrales_fraccionamiento_model->total_rows_autorizaciones($q);
            $claves_catastrales_fraccionamiento = $this->Claves_catastrales_fraccionamiento_model->get_autorizaciones($config['per_page'], $start, $q);


            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'Claves_catastrales_fraccionamiento_data' => $claves_catastrales_fraccionamiento,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );


            $this->load->view('Claves_catastrales_fraccionamiento/Claves_catastrales_fraccionamiento_autorizar', $data);

        else:
            show_404();
        endif;
    }

    public function autorizar_tram($id) {
        $result = $this->Colonias_model->getcolonias();


        $resultq = $this->Usuarios_model->get_usuarios();

        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($id);


        if ($row) {
            $data = array(
                'consulta' => $result,
                'consulta2' => $resultq,
                'button' => 'Autorizar Trámite',
                'action' => site_url('claves_catastrales_fraccionamiento/autorizar_tram_action'),
                'ID' => set_value('ID', $row->ID),
                'calleui' => set_value('calleui', $row->calleui),
                'noloteui' => set_value('noloteui', $row->noloteui),
                'nomanzanaui' => set_value('nomanzanaui', $row->nomanzanaui),
                'nooficialui' => set_value('nooficialui', $row->nooficialui),
                'cbocoloniaui' => set_value('cbocoloniaui', $row->cbocoloniaui),
                'predialui' => set_value('predialui', $row->predialui),
                'mapa' => set_value('mapa', $row->mapa),
                'nombrepropietariodp' => set_value('nombrepropietariodp', $row->nombrepropietariodp),
                'razonsocial' => set_value('razonsocial', $row->razonsocial),
                'representantelegal' => set_value('representantelegal', $row->representantelegal),
                'calledp' => set_value('calledp', $row->calledp),
                'numerodp' => set_value('numerodp', $row->numerodp),
                'coloniadp' => set_value('coloniadp', $row->coloniadp),
                'correodp' => set_value('correodp', $row->correodp),
                'telefonodp' => set_value('telefonodp', $row->telefonodp),
                'tipotramitedp' => set_value('tipotramitedp', $row->tipotramitedp),
                'doctoine' => set_value('doctoine', $row->doctoine),
                'doctopodersimple' => set_value('doctopodersimple', $row->doctopodersimple),
                'doctoplanodigital' => set_value('doctoplanodigital', $row->doctoplanodigital),
                'doctolegal' => set_value('doctolegal', $row->doctolegal),
                'doctooficio' => set_value('doctooficio', $row->doctooficio),
                'doctoplanofisico' => set_value('doctoplanofisico', $row->doctoplanofisico),
                'doctopredial' => set_value('doctopredial', $row->doctopredial),
                'doctopago' => set_value('doctopago', $row->doctopago),
                'doctofinal' => set_value('doctofinal', $row->doctofinal),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'usuarioID' => set_value('usuarioID', $row->usuarioID),
                'ipropietario' => set_value('ipropietario', $row->ipropietario),
                'tipopersona' => set_value('tipopersona', $row->tipopersona),
                'domisiliosino' => set_value('domisiliosino', $row->domisiliosino),
                'nooficialuin' => set_value('nooficialuin', $row->nooficialuin),
                'numerodpint' => set_value('numerodpint', $row->numerodpint),
                'numerocontrol' => set_value('numerocontrol', $row->numerocontrol),
                'clave' => set_value('clave', $row->clave),
                'cantidad' => set_value('cantidad', $row->cantidad),
                'fechainicio' => set_value('fechainicio', $row->fechainicio),
                'fechafinal' => set_value('fechafinal', $row->fechafinal),
            );


            $resultq = $this->Usuarios_model->get_by_id($row->auxiliar);
//            die(print_r($resultq,true));
            $data['func'] = $resultq;


            $id_us = $row->usuarioID;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$id_us' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$id_us' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$id_us' ");
            $data['noficial'] = $noficial;
            $this->load->view('claves_catastrales_fraccionamiento/claves_catastrales_fraccionamiento_form_autorizacion', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Claves_catastrales_fraccionamiento/validar'));
        }
    }

    public function autorizar_tram_action() {

        $data = array(
            'autorizacion' => 1,
            'notificacion' => 0,
        );
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_port'] = '25';
        $config['smtp_host'] = '192.168.1.203';
        $config['smtp_user'] = 'vuira';
        $config['smtp_pass'] = 'Irapuato.2018';
        $config['mailtype'] = 'html';
        $i = $this->input->post('ID');
        $row = $this->Claves_catastrales_fraccionamiento_model->get_by_id_administrador($i);

        $this->email->from('carlos.juarez@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($row->correodp); //Correo del ciudadano
        $this->email->subject('Autorización y Atención de Clave Catastral Individual con Escritura Pública.');
        $this->email->message('En su solicitud del trámite Autorización y Atención de Clave Catastral Fraccionamiento se ha autorizado con éxito por favor realize el pago para continuar con el trámite.');
        $this->email->send();



        $this->Claves_catastrales_fraccionamiento_model->update($i, $data);
        $this->session->set_flashdata('correcto', 'El Támite se Autorizo de manera correcta');
        redirect(site_url('Claves_catastrales_fraccionamiento/autorizar'));
    }

    public function vpago($id = null) {
        if ($id) {

            if ($this->session->userdata('tipo') == 1000) {
                $data = array(
                    'valido_pago' => 1,
                    'notificacion' => 1,
                );
                $this->Claves_catastrales_fraccionamiento_model->update($id, $data);
                redirect(base_url('vista_pago'));
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

}

/* End of file Claves_catastrales_fraccionamiento.php */
/* Ubicacion: ./application/controllers/Claves_catastrales_fraccionamiento.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-06-07 06:41:33 */
/* http://www.ga-asociados.com */




