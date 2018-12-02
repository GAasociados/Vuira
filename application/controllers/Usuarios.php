<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->library('form_validation');
        $this->load->library('zip');
        $this->load->model('Colonias_model');
    }

    public function index() {
        redirect('/');
    }

    public function cambiar_contra() {
        $respuesta = 0;
        $id = $this->session->userdata("id");
        $row = $this->Usuarios_model->get_by_id($id);
        $data['contrasena'] = sha1($this->input->post("c1"));

        if ($this->Usuarios_model->updatep($id, $data)) {

            $respuesta = 1;
            echo $respuesta;
        } else {
            $respuesta = 0;
            echo $respuesta;
        }
    }


    public function cambioqr_function() {
        $user = $this->session->userdata('tipo');

        $config['upload_path'] = './assets/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = 10000;


        $this->load->library('upload', $config);
        if ($user == 15) {
            $_FILES['userfile']['name'] = 'nombramiento-clave.pdf';
            if (is_readable("./assets/nombramiento-clave.pdf")) {
                unlink("./assets/nombramiento-clave.pdf");
            }
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('correcto', 'Funcionario Asignado de manera correcta');
                redirect(base_url());
            }
        } else if ($user == 11) {
            $_FILES['userfile']['name'] = 'nombramiento-des.pdf';
            if (is_readable("./assets/nombramiento-des.pdf")) {
                unlink("./assets/nombramiento-des.pdf");
            }
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('correcto', 'Funcionario Asignado de manera correcta');
                redirect(base_url());
            }
        } else if ($user == 12) {
            $_FILES['userfile']['name'] = 'nombramiento-des.pdf';
            if (is_readable("./assets/nombramiento-des.pdf")) {
                unlink("./assets/nombramiento-des.pdf");
            }
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('correcto', 'Funcionario Asignado de manera correcta');
                redirect(base_url());
            }
        } else if ($user == 13) {
            $_FILES['userfile']['name'] = 'nombramiento-ja2.pdf';
            if (is_readable("./assets/nombramiento-ja2.pdf")) {
                unlink("./assets/nombramiento-ja2.pdf");
            }
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('correcto', 'Funcionario Asignado de manera correcta');
                redirect(base_url());
            }
        } else if ($user == 19) {
            $_FILES['userfile']['name'] = 'nombramiento-regimen.pdf';
            if (is_readable("./assets/nombramiento-regimen.pdf")) {
                unlink("./assets/nombramiento-regimen.pdf");
            }
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('correcto', 'Funcionario Asignado de manera correcta');
                redirect(base_url());
            }
        }
    }

    public function cambioqr() {
        $costo = $this->db->query("SELECT * FROM `usuarios` WHERE `tipo_usu` IN (" . $this->session->userdata('tipo') . ") ");
        $data['func'] = $costo->result();

        $this->load->view('usuarios/camiardoc', $data);
    }

    public function pagos() {
        $data = array('respuesta' => $this->input->post("tramite_respuesta"));
        $this->load->view('usuarios/usuarios_pagos', $data);
    }

    public function read($id) {
        $row = $this->Usuarios_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'nombres' => $row->nombres,
                'apellido_pat' => $row->apellido_pat,
                'apellido_mat' => $row->apellido_mat,
                'curp' => $row->curp,
                'rfc' => $row->rfc,
                'calle' => $row->calle,
                'colonia' => $row->colonia,
                'cp' => $row->cp,
                'correo' => $row->correo,
                'telefono' => $row->telefono,
                'contrasena' => $row->contrasena,
                'tipo_usu' => $row->tipo_usu,
                'documentos_activos' => $row->documentos_activos,
            );
            $this->load->view('usuarios/usuarios_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usuarios/create_action'),
            'ID' => set_value('ID'),
            'nombres' => set_value('nombres'),
            'apellido_pat' => set_value('apellido_pat'),
            'apellido_mat' => set_value('apellido_mat'),
            'calle' => set_value('calle'),
            'colonia' => set_value('colonia'),
            'cp' => set_value('cp'),
            'correo' => set_value('correo'),
            'telefono' => set_value('telefono'),
            'contrasena' => set_value('contrasena'),
            'tipo_usu' => set_value('tipo_usu'),
            'documentos_activos' => set_value('documentos_activos'),
        );
        $this->load->view('usuarios/usuarios_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nombres' => $this->input->post('nombres', TRUE),
                'apellido_pat' => $this->input->post('apellido_pat', TRUE),
                'apellido_mat' => $this->input->post('apellido_mat', TRUE),
                'calle' => $this->input->post('calle', TRUE),
                'colonia' => $this->input->post('colonia', TRUE),
                'cp' => $this->input->post('cp', TRUE),
                'correo' => $this->input->post('correo', TRUE),
                'telefono' => $this->input->post('telefono', TRUE),
                'contrasena' => $this->input->post('contrasena', TRUE),
                'tipo_usu' => $this->input->post('tipo_usu', TRUE),
                'documentos_activos' => $this->input->post('documentos_activos', TRUE),
            );

            $this->Usuarios_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usuarios'));
        }
    }

    public function completar_ferfil($id, $Tram = null) {
        $row = $this->Usuarios_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Enviar',
                'action' => site_url('usuarios/action_completar_perfil'),
                'ID' => set_value('ID', $row->ID),
                'nombres' => set_value('nombres', $row->nombres),
                'apellido_pat' => set_value('apellido_pat', $row->apellido_pat),
                'apellido_mat' => set_value('apellido_mat', $row->apellido_mat),
                'calle' => set_value('calle', $row->calle),
                'colonia' => set_value('colonia', $row->colonia),
                'cp' => set_value('cp', $row->cp),
                'correo' => set_value('correo', $row->correo),
                'telefono' => set_value('telefono', $row->telefono),
            );
            switch ($Tram) {
                case '1' :
                    $data['tramite'] = "/claves_catastrales_individual/create";

                    break;
                case '2' :
                    $data['tramite'] = "/claves_catastrales_individual_cetificado/create";

                    break;
                 case '3' :
                    $data['tramite'] = "/claves_catastrales_fraccionamiento/create";

                    break;
            };

            $user_id = $this->session->userdata('id');
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
            $data['noficial'] = $noficial;

            $this->load->view('usuarios/completar_perfil', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }

    public function action_completar_perfil() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->completar_ferfil($this->input->post('ID', TRUE));
        } else {

            $maxnum = $this->Usuarios_model->getMaxItemByid();
            $maxnumbd = $maxnum[0]->maximo;

            if (empty($maxnumbd)) {
                $maxnumbd = 1;
            } else {
                $maxnumbd = $maxnumbd + 1;
            }
            $config1['upload_path'] = './assets/usuarios/documentos/';
            $config1['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
            $config1['max_size'] = 10000;



            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            $data = array(
                'usuarios_ID' => $this->input->post('ID', TRUE),
            );



            if (!empty($_FILES['documento_ife']['tmp_name'])) {

                $ext = "";
                switch ($_FILES['documento_ife']['type']) {
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

                $nine = 'file-' . $this->session->userdata('id') . '-documento_ife' . $ext;

                $_FILES['documento_ife']['name'] = $nine;

                if (!$this->upload->do_upload('documento_ife')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['tipo_documento'] = 'INE';
                    $data['archivo'] = $nine;
                    $data['fecha'] = date('Y-m-d');
                }
            } else {
                $data['documento_ife'] = "";
            }

            // PREDIAL
            $data1 = array(
                'usuarios_ID' => $this->input->post('ID', TRUE),
            );

            if (!empty($_FILES['documento_predial']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['documento_predial']['type']) {
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

                $nine = 'file-' . $this->session->userdata('id') . '-documento_predial' . $ext;

                $_FILES['documento_predial']['name'] = $nine;

                if (!$this->upload->do_upload('documento_predial')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data1['tipo_documento'] = 'PREDIAL';
                    $data1['archivo'] = $nine;
                    $data1['fecha'] = date('Y-m-d');
                }
                //echo "Entra al IF";
            } else {
                $data1['documento_predial'] = "";
            }

            // Numero Oficial
            $data2 = array(
                'usuarios_ID' => $this->input->post('ID', TRUE),
            );

            if (!empty($_FILES['documento_numero_oficial']['tmp_name'])) {
                $ext = "";
                switch ($_FILES['documento_numero_oficial']['type']) {
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

                $nine = 'file-' . $this->session->userdata('id') . '-numero_oficial' . $ext;

                $_FILES['documento_numero_oficial']['name'] = $nine;

                if (!$this->upload->do_upload('documento_numero_oficial')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data2['tipo_documento'] = 'Numero Oficial';
                    $data2['archivo'] = $nine;
                    $data2['fecha'] = date('Y-m-d');
                }
            } else {
                $data2['documento_numero_oficial'] = "";
            }

            $this->db->insert('documentos_ciudadano', $data);
            $this->db->insert('documentos_ciudadano', $data1);
            $this->db->insert('documentos_ciudadano', $data2);
            // $this->Usuarios_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('correcto', 'Registro de usuario completo');

            redirect(site_url('' . $this->input->post('tramite')));
        }
    }

    public function delete($id) {
        $row = $this->Usuarios_model->get_by_id($id);

        if ($row) {
            $this->Usuarios_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usuarios'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nombres', 'nombres', 'trim|required');
        //$this->form_validation->set_rules('apellido_pat', 'apellido pat', 'trim|required');
        //$this->form_validation->set_rules('apellido_mat', 'apellido mat', 'trim|required');
        //$this->form_validation->set_rules('calle', 'calle', 'trim|required');
        //$this->form_validation->set_rules('colonia', 'colonia', 'trim|required');
        //$this->form_validation->set_rules('cp', 'cp', 'trim|required');
        //$this->form_validation->set_rules('correo', 'correo', 'trim|required');
        ///$this->form_validation->set_rules('telefono', 'telefono', 'trim|required');


        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function modificar_documentos_ferfil($id) {
        $row = $this->Usuarios_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Enviar',
                'action' => site_url('usuarios/action_modificar_documentos_ferfil'),
                'ID' => set_value('ID', $row->ID),
                'nombres' => set_value('nombres', $row->nombres),
                'apellido_pat' => set_value('apellido_pat', $row->apellido_pat),
                'apellido_mat' => set_value('apellido_mat', $row->apellido_mat),
                'calle' => set_value('calle', $row->calle),
                'colonia' => set_value('colonia', $row->colonia),
                'cp' => set_value('cp', $row->cp),
                'correo' => set_value('correo', $row->correo),
                'telefono' => set_value('telefono', $row->telefono),
            );
            $user_id = $this->session->userdata('id');
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");
            $data['INE'] = $INE;
            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");
            $data['predial'] = $predial;
            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");
            $data['noficial'] = $noficial;

            $this->load->view('usuarios/modificar_perfil', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usuarios'));
        }
    }

    public function action_modificar_documentos_ferfil() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->modificar_documentos_ferfil($this->input->post('ID', TRUE));
        } else {
            $user_id = $this->session->userdata('id');
            $INE = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'INE' AND  `usuarios_ID` = '$user_id' ");


            $predial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'PREDIAL' AND  `usuarios_ID` = '$user_id' ");

            $noficial = $this->db->query("SELECT `id`,`tipo_documento`,`archivo`,`fecha` FROM `documentos_ciudadano` WHERE `tipo_documento` = 'Numero Oficial' AND  `usuarios_ID` = '$user_id' ");


            $identificacion = '';
            $rpredial = '';
            $nooficial = '';
            $docidentificacion = '';
            $docrpredial = '';
            $docnooficial = '';

            foreach ($predial->result() as $row) {
                $rpredial .= $row->tipo_documento;
                $docrpredial .= $row->archivo;
            }

            foreach ($INE->result() as $row) {
                $identificacion .= $row->tipo_documento;
                   $docidentificacion .= $row->archivo;
            }
            foreach ($noficial->result() as $row) {
                $nooficial .= $row->tipo_documento;
                $docnooficial .= $row->archivo;
            }

            $maxnum = $this->Usuarios_model->getMaxItemByid();
            $maxnumbd = $maxnum[0]->maximo;

            if (empty($maxnumbd)) {
                $maxnumbd = 1;
            } else {
                $maxnumbd = $maxnumbd + 1;
            }
            $config1['upload_path'] = './assets/usuarios/documentos/';
            $config1['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
            $config1['max_size'] = 10000;



            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);


            $id_ine = $this->input->post('ifeid', TRUE);
            $data = array(
                'usuarios_ID' => $this->input->post('ID', TRUE),
            );
           
            if (!empty($_FILES['documento_ife']['tmp_name'])) {
                if (is_readable("./assets/usuarios/documentos/".$docidentificacion)) {
                    unlink("./assets/usuarios/documentos/".$docidentificacion);
                }
                
                $ext = "";
                switch ($_FILES['documento_ife']['type']) {
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

                $nine = 'file-' . $this->session->userdata('id') . '-documento_ife' . $ext;

                $_FILES['documento_ife']['name'] = $nine;

                if (!$this->upload->do_upload('documento_ife')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data['tipo_documento'] = 'INE';
                    $data['archivo'] = $nine;
                    $data['fecha'] = date('Y-m-d');
                }
            } else {
                $data['documento_ife'] = "";
            }
            
            $id_pre = $this->input->post('predialid', TRUE);
            // PREDIAL
            $data1 = array(
                'usuarios_ID' => $this->input->post('ID', TRUE),
            );

            if (!empty($_FILES['documento_predial']['tmp_name'])) {
                  if (is_readable("./assets/usuarios/documentos/".$docrpredial)) {
                    unlink("./assets/usuarios/documentos/".$docrpredial);
                }
                
                $ext = "";
                switch ($_FILES['documento_predial']['type']) {
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

                $nine = 'file-' . $this->session->userdata('id') . '-documento_predial' . $ext;

                $_FILES['documento_predial']['name'] = $nine;

                if (!$this->upload->do_upload('documento_predial')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data1['tipo_documento'] = 'PREDIAL';
                    $data1['archivo'] = $nine;
                    $data1['fecha'] = date('Y-m-d');
                }
            } else {
                $data1['documento_predial'] = "";
            }
            $id_ofi = $this->input->post('oficialid', TRUE);
            // Numero Oficial
            $data2 = array(
                'usuarios_ID' => $this->input->post('ID', TRUE),
            );

            if (!empty($_FILES['documento_numero_oficial']['tmp_name'])) {
                    if (is_readable("./assets/usuarios/documentos/".$docnooficial)) {
                    unlink("./assets/usuarios/documentos/".$docnooficial);
                }
                
                $ext = "";
                switch ($_FILES['documento_numero_oficial']['type']) {
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

                $nine = 'file-' . $this->session->userdata('id') . '-numero_oficial' . $ext;

                $_FILES['documento_numero_oficial']['name'] = $nine;

                if (!$this->upload->do_upload('documento_numero_oficial')) {

                    $error = array('error' => $this->upload->display_errors());
                    ;
                } else {
                    $up = array('upload_data' => $this->upload->data());
                    $data2['tipo_documento'] = 'Numero Oficial';
                    $data2['archivo'] = $nine;
                    $data2['fecha'] = date('Y-m-d');
                }
                //echo "Entra al IF";
            } else {
                $data2['documento_numero_oficial'] = "";
            }


            if (isset($data['tipo_documento'])) {
                if ($identificacion) {
                    $this->db->where('id', $id_ine);
                    $this->db->update('documentos_ciudadano', $data);
                } else {
                    $this->db->insert('documentos_ciudadano', $data);
                }
            }

            if (isset($data1['tipo_documento'])) {
                if ($rpredial) {
                    $this->db->where('id', $id_pre);
                    $this->db->update('documentos_ciudadano', $data1);
                } else {
                    $this->db->insert('documentos_ciudadano', $data1);
                }
            }

            if (isset($data2['tipo_documento'])) {
                if ($nooficial) {
                    $this->db->where('id', $id_ofi);
                    $this->db->update('documentos_ciudadano', $data2);
                } else {
                    $this->db->insert('documentos_ciudadano', $data2);
                }
            }


            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('/'));
        }
    }

}

/* End of file Usuarios.php */
/* Ubicacion: ./application/controllers/Usuarios.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-07-24 15:47:44 */
/* http://www.ga-asociados.com */