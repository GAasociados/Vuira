<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Usuarios_model");
        $this->load->model("Colonias_model"); 
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('Inicio'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/funcionarios/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/funcionarios/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/funcionarios';
            $config['first_url'] = base_url() . 'user/funcionarios';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Usuarios_model->total_rows($q);
        $avaluos_rusticos = $this->Usuarios_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'usuarios_data' => $avaluos_rusticos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('usuarios/usuarios_list', $data);
        
    }

}

?>
