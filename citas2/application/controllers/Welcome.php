<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library("email");
        $this->load->database();
        $this->load->library('session');
        $this->load->model([
            'citas_model',
            'departamento_model'
        ]);
    }

    public function index() {
        $data['title'] = "Añadir cita";
        /* ------------------------------- */
        $this->form_validation->set_rules('nombre_completo', 'Nombre Completo', 'required|max_length[50]');
        $this->form_validation->set_rules('departamento_id', 'Nombre del Departamento', 'required|max_length[50]');
        $this->form_validation->set_rules('encargado_id', 'Nombre del Encargado', 'required|max_length[50]');
        $this->form_validation->set_rules('horarios_id', 'Dita Cita', 'required|max_length[10]');
        $this->form_validation->set_rules('serial_no', 'Serial No', 'required|max_length[10]');
        $this->form_validation->set_rules('asunto', 'Asunto', 'max_length[255]');
        /* ------------------------------- */
        $data['cita'] = (object) $postData = [
            'citas_id' => 'A' . $this->randStrGen(2, 7),
            'ciudadano_id' => '1',
            'nombre_completo' => $this->input->post('nombre_completo', true),
            'telefono' => $this->input->post('telefono', true),
            'departamento_id' => $this->input->post('departamento_id', true),
            'user_id' => $this->input->post('encargado_id', true),
            'horarios_id' => $this->input->post('horarios_id', true),
            'serial_no' => $this->input->post('serial_no', true),
            'asunto' => $this->input->post('asunto', true),
            'tramite_id' => $this->input->post('tramite_id', true),
            'hora_cita' => $this->input->post('hora_cita', true),
            'dia' => date('Y-m-d', strtotime($this->input->post('date', true))),
            'fecha_captura' => date('Y-m-d'),
            'status' => '1',
            'correo_electronico' => $this->input->post('email', true),
        ];


        /* ------------------------------- */

        /* ------------------------------- */
        if ($this->form_validation->run() === true) {


            if ($this->citas_model->create($postData)) {
                /* Muestro Mensaje */
                $this->session->set_flashdata('message', "Guardado exitosamente!");

                redirect('welcome/view/' . $postData['citas_id']);
            } else {
                /* Muestro Mensaje */
                $this->session->set_flashdata('exception', "Por favor, inténtelo de nuevo!");
            }

            redirect('welcome/view/' . $postData['citas_id']);
        } else {
            $data['lista_departamentos'] = $this->departamento_model->lista_departamentos();
            $data['content'] = $this->load->view('citas_form', $data, true);
            $this->load->view('inicio', $data);
//            die(print_r($data,true));
        }
    }

    //generamos id del ciudadano
    public function randStrGen($mode = null, $len = null) {
        $result = "";
        if ($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif ($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }

    public function check_ciudadano($mode = null) {
        $ciudadano_id = $this->input->post('ciudadano_id');

        if (!empty($ciudadano_id)) {
            $query = $this->db->select('nombres,apellidos')
                    ->from('ciudadano')
                    ->where('ciudadano_id', $ciudadano_id)
                    ->where('status', 1)
                    ->get();

            if ($query->num_rows() > 0) {
                $result = $query->row();
                $data['message'] = $result->nombres . ' ' . $result->apellidos;
                $data['status'] = true;
            } else {
                $data['message'] = "ID del ciudadano no válido";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Campo Vacio";
            $data['status'] = null;
        }

        //Retorno Datos
        if ($mode === true) {
            return json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    public function encargado_por_departamento() {
        $departamento_id = $this->input->post('departamento_id');

        if (!empty($departamento_id)) {
            $query = $this->db->select('id_user')
                    ->from('departamento')
                    ->where('dprt_id', $departamento_id)
                    ->get();

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $doctor) {
                    $id = $doctor->id_user;
                }
            }

            $query = $this->db->select('id,nombres,apellido')
                    ->from('user')
                    ->where('id', $id)
                    ->where('user_role', 2)
                    ->where('status', 1)
                    ->get();

            //$option = "<option value=\"\">Select option</option>";
            $option = "";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $doctor) {
                    $option .= "<option value=\"$doctor->id\">$doctor->nombres $doctor->apellido</option>";
                }
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No hay encargado disponible";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Departamento no válido";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function tramites_departamento() {
        $departamento_id = $this->input->post('departamento_id');

        if (!empty($departamento_id)) {
            $query = $this->db->select('id,nombre')
                    ->from('tramite')
                    ->where('id_departamento', $departamento_id)
                    ->get();

            //$option = "<option value=\"\">Select option</option>";
            $option = "";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $doctor) {
                    $option .= "<option value=\"$doctor->id\">$doctor->nombre</option>";
                }
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No hay tramite disponible";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Departamento no válido";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function dias_horario_encargado() {
        $encargado_id = $this->input->post('encargado_id');

        if (!empty($encargado_id)) {
            $query = $this->db->select('dias_disponibles,tiempo_inicio,tiempo_final')
                    ->from('horarios')
                    ->where('user_id', $encargado_id)
                    ->where('status', 1)
                    ->order_by('dias_disponibles', 'desc')
                    ->get();

            $list = null;
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $value) {
                    $list .= "<span><i class='fa fa-calendar'></i> $value->dias_disponibles [$value->tiempo_inicio - $value->tiempo_final]</span><br>";
                }
                $data['message'] = $list;
                $data['status'] = true;
            } else {
                $data['message'] = "No hay horarios disponibles";
                $data['status'] = false;
            }
        } else {
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function horario_por_dia() {
        $ciudadano_id = '1';
        $encargado_id = $this->input->post('encargado_id');
        $date = date("Y-m-d", strtotime($this->input->post('date')));
        $day = date("l", strtotime($this->input->post('date')));
        $tramite = $this->input->post('tramite_id');
        if (!empty($encargado_id) && !empty($ciudadano_id) && !empty($day)) {
            $query = $this->db->select('*')
                    ->from('horarios')
                    ->where('user_id', $encargado_id)
                    ->where('dias_disponibles', $day)
                    ->where('status', 1)
                    ->order_by('dias_disponibles', 'desc')
                    ->get();
            $query1 = $this->db->select('atencion')
                    ->from('tramite')
                    ->where('id', $tramite)
                    ->get();
//            DIRECCIÓN GENERAL DE DESARROLLO SOCIAL Y HUMANO
            if ($query->num_rows() > 0) {
                $result = $query->row();
                $result1 = $query1->row();
//              $result1->atencion;
                /* --------- ------------------------------- */
                /* Obtener tiempo de inicio y fin */
                $start_time = strtotime($result->tiempo_inicio);
                $end_time = strtotime($result->tiempo_final);

                /* convert per patient time to minute */
                $time_parse = date_parse($result->tiempo_por_turno);
                $minute = $time_parse['hour'] * 60 + $time_parse['minute'];

                /* Contar el minuto total */
                $total_minute = round(abs($end_time - $start_time) / 60, 2);
                /* total de horarios */
                $total_serial = round(abs($total_minute / $minute));

                /* --------- ------------------------------- */
                $serial = null;

                if ($result->serie_visible == 2) {
                    /* Establecer secuencia */
                    $seq = 1;
                    $timestamp = strtotime($result->tiempo_inicio);
                    while ($seq <= $total_serial) {
                        $time_from = date('H:i', $timestamp);
                        $timestamp = strtotime("+$minute minutes", $timestamp);
                        $time_to = date('H:i', $timestamp);

                        /* check time sequence */
                        if ($this->check_tiempo_secuencia($encargado_id, $result->id, $seq, $date, $result1->atencion) === true) {
                            //store time sequential
                            $serial .= "<button onclick=\"hora('$time_from - $time_to')\" type=\"button\" data-item=\"$seq\" class=\"serial_no slbtn btn btn-success btn-sm\">$time_from - $time_to</button>";
                        } else {
                            /* store time sequential */
                            $serial .= "<div class=\"slbtn  btn btn-danger disabled btn-sm\">$time_from - $time_to</div>";
                        }

                        $seq++;
                    }
                    $data['type'] = "sequential";
                } else {
                    /* set timestamp */
                    $ts = 1;
                    while ($ts <= $total_serial) {

                        /* Comprobar la secuencia de tiempo */
                        if ($this->check_tiempo_secuencia($encargado_id, $result->id, $ts, $date) === true) {
                            //store timestamp
                            $serial .= "<button type=\"button\" data-item=\"$ts\" class=\"serial_no slbtn btn btn-success btn-sm\">" . (($ts <= 9) ? "0$ts" : $ts) . "</button>";
                        } else {
                            /* timestamp */
                            $serial .= "<div class=\"slbtn btn btn-danger disabled btn-sm\">" . (($ts <= 9) ? "0$ts" : $ts) . "</div>";
                        }

                        $ts++;
                    }
                    $data['type'] = "timestamp";
                }
                $data['horarios_id'] = $result->id;
                $data['message'] = $serial;
                $data['status'] = true;
                /* --------- ------------------------------- */
            } else {
                $data['message'] = "No hay horarios disponibles";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Rellene todos los campos obligatorios";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function check_tiempo_secuencia(
    $encargado_id = null, $horarios_id = null, $serial_no = null, $date = null, $T_Atencion = null
    ) {
        $num_rows = $this->db->select('*')
                ->from('citas')
                ->where('user_id', $encargado_id)
                ->where('horarios_id', $horarios_id)
                ->where('serial_no', $serial_no)
                ->where('dia', $date)
                ->get()
                ->num_rows();

        if ($num_rows < $T_Atencion) {
            return true;
        } else {
            return false;
        }
    }

    public function check_citas_existente(
    $ciudadano_id = null, $encargado_id = null, $horarios_id = null, $date = null
    ) {
        if (!empty($ciudadano_id) && !empty($encargado_id) && !empty($horarios_id)) {
            $num_rows = $this->db->select('*')
                    ->from('citas')
                    ->where('ciudadano_id', $ciudadano_id)
                    ->where('user_id', $encargado_id)
                    ->where('horarios_id', $horarios_id)
                    ->where('dia', $date)
                    ->get()
                    ->num_rows();

            if ($num_rows > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return null;
        }
    }

    public function ver_pdf() {
        $tramite_id = $this->input->post('tramite_id');
        if ($tramite_id != "") {
            $query1 = $this->db->select('documento')
                    ->from('tramite')
                    ->where('id', $tramite_id)
                    ->get();
            $result1 = $query1->row();
            echo json_encode($result1->documento);
        } else {
            return null;
        }
    }

    public function view($citas_id = null) {
        $data['title'] = "Citas";
        /* ------------------------------- */
        $data['cita'] = $this->citas_model->read_by_id($citas_id);
        $email = $this->citas_model->read_by_id($citas_id);
//        $email['cita'] = $data['citas_id'];
//        die(print_r($email, true));

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

        $this->email->from('citasmunirapuato@gmail.com', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to($email->correo_electronico); //Correo del ciudadano
        $this->email->subject('CONFIRMACIÓN DE SU CITA');
        $body = $this->load->view('vista_email.php', $email, TRUE);
        $this->email->message($body);

        $this->email->send();
        
         $this->email->from('ventanillacitas@irapuato.com', 'Ventanilla Universal de trámites y servicios de Irapuato');
        $this->email->to('citasmunirapuato@gmail.com'); 
        $this->email->subject('Cita Agendada');
        $body = $this->load->view('vista_email2.php', $email, TRUE);
        $this->email->message($body);
        $this->email->send();
        //die(print_r($email,true));

        $this->load->view('vista_cita', $data);
    }

}
