<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Solicitudes_model');
        $this->load->model('Usuarios_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'solicitudes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'solicitudes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'solicitudes/index.html';
            $config['first_url'] = base_url() . 'solicitudes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Solicitudes_model->total_rows($q);
        $solicitudes = $this->Solicitudes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'solicitudes_data' => $solicitudes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('solicitudes/solicitudes_list', $data);
    }

    public function read($id) {
        $row = $this->Solicitudes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'usuario_id' => $row->usuario_id,
                'motivo' => $row->motivo,
                'fecha_solicitud' => $row->fecha_solicitud,
            );
            $this->load->view('solicitudes/solicitudes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('home'));
        }
    }

    public function create() {
        
        $data = array(
            'button' => 'Solicitar',
            'action' => site_url('solicitudes/create_action'),
            'id' => set_value('id'),
            'usuario_id' => set_value('usuario_id'),
            'motivo' => set_value('motivo'),
            'fecha_solicitud' => set_value('fecha_solicitud'),
        );
        $this->load->view('solicitudes/solicitudes_form', $data);
    }

    public function create_action() {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'usuario_id' => $this->input->post('usuario_id', TRUE),
                'motivo' => $this->input->post('motivo', TRUE),
                'fecha_solicitud' => date("Y-m-d"),
            );

            $this->Solicitudes_model->insert($data);
            $this->session->set_flashdata('correcto', 'Su solicitud ha sido registrada con éxito!');
            redirect(base_url());
        }
    }

    public function update($id) {
        $row = $this->Solicitudes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('solicitudes/update_action'),
                'id' => set_value('id', $row->id),
                'usuario_id' => set_value('usuario_id', $row->usuario_id),
                'motivo' => set_value('motivo', $row->motivo),
                'fecha_solicitud' => set_value('fecha_solicitud', $row->fecha_solicitud),
            );
            $this->load->view('solicitudes/solicitudes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('index'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'usuario_id' => $this->input->post('usuario_id', TRUE),
                'motivo' => $this->input->post('motivo', TRUE),
                'fecha_solicitud' => $this->input->post('fecha_solicitud', TRUE),
            );

            $this->Solicitudes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('solicitudes'));
        }
    }

    public function delete($id) {
        $row = $this->Solicitudes_model->get_by_id($id);

        if ($row) {
            $this->Solicitudes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('solicitudes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('solicitudes'));
        }
    }
 public function confirm($id) {
        
        $row = $this->Solicitudes_model->get_by_id($id);
        
        if ($row) {
            $this->db->delete('documentos_ciudadano', array('usuarios_ID' => $row->usuario_id));
            $this->Solicitudes_model->delete($row->id);
            redirect(site_url('solicitudes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('solicitudes'));
        }
    }
    public function _rules() {
        $this->form_validation->set_rules('usuario_id', 'usuario id', 'trim|required');
        $this->form_validation->set_rules('motivo', 'motivo', 'trim|required');
//        $this->form_validation->set_rules('fecha_solicitud', 'fecha solicitud', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $hoy = date("Y-m-d H:m:s");
    }

    public function nuevasolicitud() {
        if ($this->input->is_ajax_request()) {
            $hoy = date("Y-m-d H:m:s");
             $data = array(
                'usuario_id' => $this->session->userdata('id'),
                'motivo' => $this->input->post('motivo'),
                'fecha_solicitud' => $hoy
            );
             $res = $this->Solicitudes_model->insert($data);
             
            if($res){
                 $result = "Solicitud Registrada Correctamente";
             }
             else{
                 $result = "Error Por Favor Intente Mas Tarde";
             }
             echo json_encode($result);
        }
    }

}

/* End of file Solicitudes.php */
/* Ubicacion: ./application/controllers/Solicitudes.php */
/* NO modifique esta información : */
/* GA & Asociadosm 2017-09-13 20:14:57 */
/* http://www.ga-asociados.com */