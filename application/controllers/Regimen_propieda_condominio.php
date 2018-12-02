<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regimen_propieda_condominio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Regimen_propieda_condominio_model');

        $this->load->library('form_validation');
        $this->load->library('zip');
        $this->load->model('Colonias_model');
    }
 function contador($tram) {
        $archivo = "assets/contador".$tram.".txt"; //el archivo que contiene en numero
        $archivo1 = "assets/fecha".$tram.".txt";
        $fecha = date("ymd");

        $fp1 = fopen($archivo1, "r");
        $contador1 = fgets($fp1, 26);
        fclose($fp1);
//          die(print_r($fecha, true));
        if ($fecha != $contador1) {
            $contador = 0;
            $fp = fopen($archivo, "w+");
            fwrite($fp, $contador, 26);
            fclose($fp);
            
            $fp1 = fopen($archivo1, "w+");
            fwrite($fp1, $fecha, 26);
            fclose($fp1);
        } else {
            $contador = 0;

            $fp = fopen($archivo, "r");
            $contador = fgets($fp, 26);
            fclose($fp);

            ++$contador;

            $fp = fopen($archivo, "w+");
            fwrite($fp, $contador, 26);
            fclose($fp);
        }
        if($contador<1000){
      $respuesta = $tram.$fecha.str_pad($contador, 3, 0, STR_PAD_LEFT);
        }else{
            $respuesta=0;
        }

        echo  $respuesta;
    }
    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'regimen_propieda_condominio/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'regimen_propieda_condominio/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'regimen_propieda_condominio/index.html';
            $config['first_url'] = base_url() . 'regimen_propieda_condominio/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Regimen_propieda_condominio_model->total_rows($q);
        $regimen_propieda_condominio = $this->Regimen_propieda_condominio_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'regimen_propieda_condominio_data' => $regimen_propieda_condominio,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('regimen_propieda_condominio/regimen_propieda_condominio_list', $data);
    }
public function pago($id = null) {
        if ($id) {
            $row = $this->Regimen_propieda_condominio_model->get_by_id($id);
            if ($row && $row->usuario_id === $this->session->userdata('id') && $row->status === "4") {
                $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (9) ");
                $pagos = $costo->result();
                $data['concepto'] = "Solicitude de pago de ";
                $data['des'] = "Regimen de Propiedad";
                $costo_tram = floatval( $pagos[0]->costo_tram + $pagos[0]->costo_base);
                $data['importe'] = "".$costo_tram;
                $data['ref'] = "007";
                $data['id'] = "regimen_propieda_condominio/update/" . $id;
                $this->load->view('pago', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
    public function generarzip($id) {
        $row = $this->Regimen_propieda_condominio_model->get_by_id_admin($id);
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
            $path = "./assets/tramites/regimencondominio/";
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

    public function read($id) {
        $row = $this->Regimen_propieda_condominio_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tipo_tramite' => $row->tipo_tramite,
                'domicilio_calle' => $row->domicilio_calle,
                'no_lote' => $row->no_lote,
                'manzana' => $row->manzana,
                'numero_oficial' => $row->numero_oficial,
                'colonia_inmueble' => $row->colonia_inmueble,
                'cuenta_predial' => $row->cuenta_predial,
                'nombre_del_contribuyente' => $row->nombre_del_contribuyente,
                'domicilio_del_contribuyente' => $row->domicilio_del_contribuyente,
                'telefono_del_contribuyente' => $row->telefono_del_contribuyente,
                'colonia_del_contribuyente' => $row->colonia_del_contribuyente,
                'nombre_perito_valuador' => $row->nombre_perito_valuador,
                'domicilio_perito_valuador' => $row->domicilio_perito_valuador,
                'colonia_perito_valuador' => $row->colonia_perito_valuador,
                'no_perito' => $row->no_perito,
                'telefonos_perito' => $row->telefonos_perito,
                'superficie_predio' => $row->superficie_predio,
                'uso_actual_predio' => $row->uso_actual_predio,
                'tipo_regimen' => $row->tipo_regimen,
                'status' => $row->status,
                'mensaje' => $row->mensaje,
                'documento_pago' => $row->documento_pago,
                'fecha_pago' => $row->fecha_pago,
                'documento_final' => $row->documento_final,
                'fecha_tramite' => $row->fecha_tramite,
                'fecha_autorizacion' => $row->fecha_autorizacion,
                'usuario_id' => $row->usuario_id,
                'escrituras' => $row->escrituras,
                'oficio_traza' => $row->oficio_traza,
                'planos_autorizados' => $row->planos_autorizados,
                'planos_particulares' => $row->planos_particulares,
                'memoria_descriptiva' => $row->memoria_descriptiva,
                'acreditacion_representante' => $row->acreditacion_representante,
                'recibo_pago' => $row->recibo_pago,
            );
            $this->load->view('regimen_propieda_condominio/regimen_propieda_condominio_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regimen_propieda_condominio'));
        }
    }

    public function clave() {
       
            $data['vista'] = 'regimen_propieda_condominio/create';
            $this->load->view('permiso_anuncios/clave_catastral_form', $data);
      
    }

    public function create() {
        $data = array(
            'button' => 'Solicitar Trámite',
            'action' => site_url('regimen_propieda_condominio/create_action'),
            'id' => set_value('id'),
            'tipo_tramite' => set_value('tipo_tramite'),
            'domicilio_calle' => set_value('domicilio_calle'),
            'no_lote' => set_value('no_lote'),
            'manzana' => set_value('manzana'),
            'numero_oficial' => set_value('numero_oficial'),
            'colonia_inmueble' => set_value('colonia_inmueble'),
            'cuenta_predial' => set_value('cuenta_predial'),
            'nombre_del_contribuyente' => set_value('nombre_del_contribuyente'),
            'domicilio_del_contribuyente' => set_value('domicilio_del_contribuyente'),
            'telefono_del_contribuyente' => set_value('telefono_del_contribuyente'),
            'colonia_del_contribuyente' => set_value('colonia_del_contribuyente'),
            'nombre_perito_valuador' => set_value('nombre_perito_valuador'),
            'domicilio_perito_valuador' => set_value('domicilio_perito_valuador'),
            'colonia_perito_valuador' => set_value('colonia_perito_valuador'),
            'no_perito' => set_value('no_perito'),
            'telefonos_perito' => set_value('telefonos_perito'),
            'superficie_predio' => set_value('superficie_predio'),
            'uso_actual_predio' => set_value('uso_actual_predio'),
            'tipo_regimen' => set_value('tipo_regimen'),
            'status' => set_value('status'),
            'mensaje' => set_value('mensaje'),
            'documento_pago' => set_value('documento_pago'),
            'fecha_pago' => set_value('fecha_pago'),
            'documento_final' => set_value('documento_final'),
            'fecha_tramite' => set_value('fecha_tramite'),
            'fecha_autorizacion' => set_value('fecha_autorizacion'),
            'usuario_id' => set_value('usuario_id'),
            'escrituras' => set_value('escrituras'),
            'oficio_traza' => set_value('oficio_traza'),
            'planos_autorizados' => set_value('planos_autorizados'),
            'planos_particulares' => set_value('planos_particulares'),
            'memoria_descriptiva' => set_value('memoria_descriptiva'),
            'acreditacion_representante' => set_value('acreditacion_representante'),
            'recibo_pago' => set_value('recibo_pago'),
        );
        $user_id = $this->session->userdata('id');
        $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
        $data['INE'] = $INE;
        $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
        $data['predial'] = $predial;
        $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
        $data['noficial'] = $noficial;



        $this->load->view('regimen_propieda_condominio/regimen_propieda_condominio_form', $data);
    }

    public function create_action() {
        $this->_rules();
        $maxnum = $this->Regimen_propieda_condominio_model->getMaxItemByid();
        $maxnumbd = $maxnum[0]->maximo;
        if (empty($maxnumbd)) {
            $maxnumbd = 1;
        } else {
            $maxnumbd = $maxnumbd + 1;
        }

        $configzip = $config['max_size'] = "21504";
        $this->load->library("upload", $configzip);
        $variablefile = $_FILES;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tipo_tramite' => $this->input->post('tipo_tramite', TRUE),
                'domicilio_calle' => $this->input->post('domicilio_calle', TRUE),
                'no_lote' => $this->input->post('no_lote', TRUE),
                'manzana' => $this->input->post('manzana', TRUE),
                'numero_oficial' => $this->input->post('numero_oficial', TRUE),
                'colonia_inmueble' => $this->input->post('colonia_inmueble', TRUE),
                'cuenta_predial' => $this->input->post('cuenta_predial', TRUE),
                'nombre_del_contribuyente' => $this->input->post('nombre_del_contribuyente', TRUE),
                'domicilio_del_contribuyente' => $this->input->post('domicilio_del_contribuyente', TRUE),
                'telefono_del_contribuyente' => $this->input->post('telefono_del_contribuyente', TRUE),
                'colonia_del_contribuyente' => $this->input->post('colonia_del_contribuyente', TRUE),
                'nombre_perito_valuador' => $this->input->post('nombre_perito_valuador', TRUE),
                'domicilio_perito_valuador' => $this->input->post('domicilio_perito_valuador', TRUE),
                'colonia_perito_valuador' => $this->input->post('colonia_perito_valuador', TRUE),
                'no_perito' => $this->input->post('no_perito', TRUE),
                'telefonos_perito' => $this->input->post('telefonos_perito', TRUE),
                'superficie_predio' => $this->input->post('superficie_predio', TRUE),
                'uso_actual_predio' => $this->input->post('uso_actual_predio', TRUE),
                'tipo_regimen' => $this->input->post('tipo_regimen', TRUE),
                'usuario_id' => $this->input->post('usuario_id', TRUE),
                'notificacion' => "1"
            );
            
            if (!empty($_FILES['escrituras']['tmp_name'][0])) {
                $numfiles = count($_FILES['escrituras']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['escrituras']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['escrituras']['name'][$i]);
                }
                 
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-escrituras.zip')) {
                    $data['escrituras'] = "file-" . $maxnumbd . "-escrituras.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['escrituras'] = "";
            }
           
            if (!empty($_FILES['oficio_traza']['tmp_name'][0])) {
                $numfiles = count($_FILES['oficio_traza']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['oficio_traza']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['oficio_traza']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-oficio_traza.zip')) {
                    $data['oficio_traza'] = "file-" . $maxnumbd . "-oficio_traza.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['oficio_traza'] = "";
            }
            if (!empty($_FILES['planos_autorizados']['tmp_name'][0])) {
                $numfiles = count($_FILES['planos_autorizados']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['planos_autorizados']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['planos_autorizados']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-planos_autorizados.zip')) {
                    $data['oficio_traza'] = "file-" . $maxnumbd . "-planos_autorizados.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['planos_autorizados'] = "";
            }
            if (!empty($_FILES['planos_particulares']['tmp_name'][0])) {
                $numfiles = count($_FILES['planos_particulares']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['planos_particulares']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['planos_particulares']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-planos_particulares.zip')) {
                    $data['planos_particulares'] = "file-" . $maxnumbd . "-planos_particulares.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['planos_particulares'] = "";
            }

            if (!empty($_FILES['memoria_descriptiva']['tmp_name'][0])) {
                $numfiles = count($_FILES['memoria_descriptiva']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['memoria_descriptiva']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['memoria_descriptiva']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-memoria_descriptiva.zip')) {
                    $data['memoria_descriptiva'] = "file-" . $maxnumbd . "-memoria_descriptiva.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['memoria_descriptiva'] = "";
            }


            if (!empty($_FILES['acreditacion_representante']['tmp_name'][0])) {
                $numfiles = count($_FILES['acreditacion_representante']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['acreditacion_representante']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['acreditacion_representante']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-acreditacion_representante.zip')) {
                    $data['acreditacion_representante'] = "file-" . $maxnumbd . "-acreditacion_representante.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['acreditacion_representante'] = "";
            }

            if (!empty($_FILES['recibo_pago']['tmp_name'][0])) {
                $numfiles = count($_FILES['recibo_pago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['recibo_pago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['recibo_pago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-recibo_pago.zip')) {
                    $data['recibo_pago'] = "file-" . $maxnumbd . "-recibo_pago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            } else {
                $data['recibo_pago'] = "";
            }

            $this->Regimen_propieda_condominio_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('regimen_propieda_condominio'));
        }
    }

    public function update($id) {
        if ($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 199) {
            $row = $this->Regimen_propieda_condominio_model->get_by_id_administrador($id);
        } else {
            $row = $this->Regimen_propieda_condominio_model->get_by_id($id);
        }



        if ($row) {
            $data = array(
                'button' => 'Actualizar',
                
                'id' => set_value('id', $row->id),
                'tipo_tramite' => set_value('tipo_tramite', $row->tipo_tramite),
                'domicilio_calle' => set_value('domicilio_calle', $row->domicilio_calle),
                'no_lote' => set_value('no_lote', $row->no_lote),
                'manzana' => set_value('manzana', $row->manzana),
                'numero_oficial' => set_value('numero_oficial', $row->numero_oficial),
                'colonia_inmueble' => set_value('colonia_inmueble', $row->colonia_inmueble),
                'cuenta_predial' => set_value('cuenta_predial', $row->cuenta_predial),
                'nombre_del_contribuyente' => set_value('nombre_del_contribuyente', $row->nombre_del_contribuyente),
                'domicilio_del_contribuyente' => set_value('domicilio_del_contribuyente', $row->domicilio_del_contribuyente),
                'telefono_del_contribuyente' => set_value('telefono_del_contribuyente', $row->telefono_del_contribuyente),
                'colonia_del_contribuyente' => set_value('colonia_del_contribuyente', $row->colonia_del_contribuyente),
                'nombre_perito_valuador' => set_value('nombre_perito_valuador', $row->nombre_perito_valuador),
                'domicilio_perito_valuador' => set_value('domicilio_perito_valuador', $row->domicilio_perito_valuador),
                'colonia_perito_valuador' => set_value('colonia_perito_valuador', $row->colonia_perito_valuador),
                'no_perito' => set_value('no_perito', $row->no_perito),
                'telefonos_perito' => set_value('telefonos_perito', $row->telefonos_perito),
                'superficie_predio' => set_value('superficie_predio', $row->superficie_predio),
                'uso_actual_predio' => set_value('uso_actual_predio', $row->uso_actual_predio),
                'tipo_regimen' => set_value('tipo_regimen', $row->tipo_regimen),
                'status' => set_value('status', $row->status),
                'mensaje' => set_value('mensaje', $row->mensaje),
                'documento_pago' => set_value('documento_pago', $row->documento_pago),
                'fecha_pago' => set_value('fecha_pago', $row->fecha_pago),
                'documento_final' => set_value('documento_final', $row->documento_final),
                'fecha_tramite' => set_value('fecha_tramite', $row->fecha_tramite),
                'fecha_autorizacion' => set_value('fecha_autorizacion', $row->fecha_autorizacion),
                'usuario_id' => set_value('usuario_id', $row->usuario_id),
                'escrituras' => set_value('escrituras', $row->escrituras),
                'oficio_traza' => set_value('oficio_traza', $row->oficio_traza),
                'planos_autorizados' => set_value('planos_autorizados', $row->planos_autorizados),
                'planos_particulares' => set_value('planos_particulares', $row->planos_particulares),
                'memoria_descriptiva' => set_value('memoria_descriptiva', $row->memoria_descriptiva),
                'acreditacion_representante' => set_value('acreditacion_representante', $row->acreditacion_representante),
                'recibo_pago' => set_value('recibo_pago', $row->recibo_pago),
                'documento_pago' => set_value('documento_pago', $row->documento_pago),
            );
//            die(print_r($data,true));
             if ($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 199) {
                $data['action'] = site_url('regimen_propieda_condominio/update_action_admin');
            } else {
                $data['action'] = site_url('regimen_propieda_condominio/update_action');
            }
            $user_id = $row->usuario_id;
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
            $data['noficial'] = $noficial;
            $this->load->view('regimen_propieda_condominio/regimen_propieda_condominio_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regimen_propieda_condominio'));
        }
    }

    public function update_action() {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tipo_tramite' => $this->input->post('tipo_tramite', TRUE),
                'domicilio_calle' => $this->input->post('domicilio_calle', TRUE),
                'no_lote' => $this->input->post('no_lote', TRUE),
                'manzana' => $this->input->post('manzana', TRUE),
                'numero_oficial' => $this->input->post('numero_oficial', TRUE),
                'colonia_inmueble' => $this->input->post('colonia_inmueble', TRUE),
                'cuenta_predial' => $this->input->post('cuenta_predial', TRUE),
                'nombre_del_contribuyente' => $this->input->post('nombre_del_contribuyente', TRUE),
                'domicilio_del_contribuyente' => $this->input->post('domicilio_del_contribuyente', TRUE),
                'telefono_del_contribuyente' => $this->input->post('telefono_del_contribuyente', TRUE),
                'colonia_del_contribuyente' => $this->input->post('colonia_del_contribuyente', TRUE),
                'nombre_perito_valuador' => $this->input->post('nombre_perito_valuador', TRUE),
                'domicilio_perito_valuador' => $this->input->post('domicilio_perito_valuador', TRUE),
                'colonia_perito_valuador' => $this->input->post('colonia_perito_valuador', TRUE),
                'no_perito' => $this->input->post('no_perito', TRUE),
                'telefonos_perito' => $this->input->post('telefonos_perito', TRUE),
                'superficie_predio' => $this->input->post('superficie_predio', TRUE),
                'uso_actual_predio' => $this->input->post('uso_actual_predio', TRUE),
                'tipo_regimen' => $this->input->post('tipo_regimen', TRUE),
                'usuario_id' => $this->input->post('usuario_id', TRUE),
                'notificacion' => "4"
            );
           

            $maxnumbd = $this->input->post('id', TRUE);

            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;
            if (!empty($_FILES['escrituras']['tmp_name'][0])) {
                $numfiles = count($_FILES['escrituras']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['escrituras']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['escrituras']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-escrituras.zip')) {
                    $data['escrituras'] = "file-" . $maxnumbd . "-escrituras.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
           
            if (!empty($_FILES['oficio_traza']['tmp_name'][0])) {
                
                $numfiles = count($_FILES['oficio_traza']['tmp_name']);
                //Documentos Bitacora
                
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['oficio_traza']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['oficio_traza']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-oficio_traza.zip')) {
                    $data['oficio_traza'] = "file-" . $maxnumbd . "-oficio_traza.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            
             
            if (!empty($_FILES['planos_autorizados']['tmp_name'][0])) {
                $numfiles = count($_FILES['planos_autorizados']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['planos_autorizados']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['planos_autorizados']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-planos_autorizados.zip')) {
                    $data['planos_autorizados'] = "file-" . $maxnumbd . "-planos_autorizados.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            if (!empty($_FILES['planos_particulares']['tmp_name'][0])) {
                $numfiles = count($_FILES['planos_particulares']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['planos_particulares']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['planos_particulares']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-planos_particulares.zip')) {
                    $data['planos_particulares'] = "file-" . $maxnumbd . "-planos_particulares.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            if (!empty($_FILES['memoria_descriptiva']['tmp_name'][0])) {
                $numfiles = count($_FILES['memoria_descriptiva']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['memoria_descriptiva']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['memoria_descriptiva']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-memoria_descriptiva.zip')) {
                    $data['memoria_descriptiva'] = "file-" . $maxnumbd . "-memoria_descriptiva.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            if (!empty($_FILES['acreditacion_representante']['tmp_name'][0])) {
                $numfiles = count($_FILES['acreditacion_representante']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['acreditacion_representante']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['acreditacion_representante']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-acreditacion_representante.zip')) {
                    $data['acreditacion_representante'] = "file-" . $maxnumbd . "-acreditacion_representante.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            if (!empty($_FILES['recibo_pago']['tmp_name'][0])) {
                $numfiles = count($_FILES['recibo_pago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['recibo_pago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['recibo_pago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-recibo_pago.zip')) {
                    $data['recibo_pago'] = "file-" . $maxnumbd . "-recibo_pago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }


            $this->Regimen_propieda_condominio_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('regimen_propieda_condominio'));
        }
    }

    public function update_action_admin() {
        $this->_rulesupdate();  
        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'mensaje' => $this->input->post('mensaje', TRUE),
                'status' => $this->input->post('status', TRUE),
                'fecha_pago' => $this->input->post('fecha_pago', TRUE),
                'fecha_tramite' => $this->input->post('fecha_tramite', TRUE),
                'fecha_autorizacion' => $this->input->post('fecha_autorizacion', TRUE),
                'status' => $this->input->post('status', TRUE),
                
                'notificacion' => "0"
            );
            $maxnumbd = $this->input->post('id', TRUE);
            //Tamaño Maximo de los Archivos 20 Megas
            $configzip = $config['max_size'] = "21504";
            $this->load->library("upload", $configzip);
            $variablefile = $_FILES;



            if (!empty($_FILES['documento_final']['tmp_name'][0])) {
                $numfiles = count($_FILES['documento_final']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['documento_final']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['documento_final']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-documento_final.zip')) {
                    $data['documento_final'] = "file-" . $maxnumbd . "-documento_final.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }
            
            
            if (!empty($_FILES['documento_pago']['tmp_name'][0])) {
                $numfiles = count($_FILES['documento_pago']['tmp_name']);
                //Documentos Bitacora
                for ($i = 0; $i < $numfiles; $i++) {
                    $path = $variablefile['documento_pago']['tmp_name'][$i];
                    $this->zip->read_file($path, $variablefile['documento_pago']['name'][$i]);
                }
                //Write the zip file to a folder on your server. Name it "my_backup.zip"
                if ($this->zip->archive('./assets/tramites/regimencondominio/file-' . $maxnumbd . '-documento_pago.zip')) {
                    $data['documento_pago'] = "file-" . $maxnumbd . "-documento_pago.zip";
                    //echo "Guarda";
                }
                $this->zip->clear_data();
                //echo "Entra al IF";
            }

            $this->Regimen_propieda_condominio_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('regimen_propieda_condominio'));
        }
    }

    public function delete($id) {
        $row = $this->Regimen_propieda_condominio_model->get_by_id($id);

        if ($row) {
            $this->Regimen_propieda_condominio_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('regimen_propieda_condominio'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regimen_propieda_condominio'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('tipo_tramite', 'tipo tramite', 'trim|required');
        $this->form_validation->set_rules('domicilio_calle', 'domicilio calle', 'trim|required');
        $this->form_validation->set_rules('no_lote', 'no lote', 'trim|required');
        $this->form_validation->set_rules('manzana', 'manzana', 'trim|required');
        $this->form_validation->set_rules('numero_oficial', 'numero oficial', 'trim|required');
        $this->form_validation->set_rules('colonia_inmueble', 'colonia inmueble', 'trim|required');
        $this->form_validation->set_rules('cuenta_predial', 'cuenta predial', 'trim|required');
        $this->form_validation->set_rules('nombre_del_contribuyente', 'nombre del contribuyente', 'trim|required');
        $this->form_validation->set_rules('domicilio_del_contribuyente', 'domicilio del contribuyente', 'trim|required');
        $this->form_validation->set_rules('telefono_del_contribuyente', 'telefono del contribuyente', 'trim|required');
        $this->form_validation->set_rules('colonia_del_contribuyente', 'colonia del contribuyente', 'trim|required');
        $this->form_validation->set_rules('nombre_perito_valuador', 'nombre perito valuador', 'trim|required');
        $this->form_validation->set_rules('domicilio_perito_valuador', 'domicilio perito valuador', 'trim|required');
        $this->form_validation->set_rules('colonia_perito_valuador', 'colonia perito valuador', 'trim|required');
        $this->form_validation->set_rules('no_perito', 'no perito', 'trim|required');
        $this->form_validation->set_rules('telefonos_perito', 'telefonos perito', 'trim|required');
        $this->form_validation->set_rules('superficie_predio', 'superficie predio', 'trim|required');
        $this->form_validation->set_rules('uso_actual_predio', 'uso actual predio', 'trim|required');
        $this->form_validation->set_rules('tipo_regimen', 'tipo regimen', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
     public function _rulesupdate() {

    }


}

/* End of file Regimen_propieda_condominio.php */
/* Ubicacion: ./application/controllers/Regimen_propieda_condominio.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-08-04 20:03:26 */
/* http://www.ga-asociados.com */