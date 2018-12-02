<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Colonias_model");
         $this->load->model("Usuarios_model");
    }

    public function index() {
        $result = $this->Colonias_model->getcolonias();
        if ($this->session->userdata('tipo') != 1) {

            $data = array('consulta' => $result);

            $this->load->view("users/register", $data);
        } else {
            $data = array('consulta' => $result);

            $this->load->view("users/funcionarios", $data);
        }
    }

    public function guardar() {

        if ($this->input->is_ajax_request()) {
            $nombres = $this->input->post("nombres");
            $apellido_pat = $this->input->post("apellido_pat");
            $apellido_mat = $this->input->post("apellido_mat");
            $curp = $this->input->post("curp");
            $calle = $this->input->post("calle");
            $colonia = $this->input->post("colonia");
            $cp = $this->input->post("cp");
            $correo = str_replace(' ', '', $this->input->post("correo"));
            $telefono = $this->input->post("telefono");
            $contrasena = sha1($this->input->post("contrasena"));
            $contrasena2 = sha1($this->input->post("rcontrasena"));


            $data = array('nombres' => $nombres, 'apellido_pat' => $apellido_pat, 'apellido_mat' => $apellido_mat, 'curp' => $curp, 'calle' => $calle, 'colonia' => $colonia, 'cp' => $cp, 'correo' => $correo, 'contrasena' => $contrasena, 'telefono' => $telefono);

            if (strlen($this->input->post("contrasena")) != 0 && strlen($nombres) != 0 && strlen($apellido_pat) != 0 && strlen($apellido_mat) != 0 && strlen($calle) != 0 && strlen($colonia) != 0 && strlen($cp) != 0 && strlen($correo) != 0 && strlen($contrasena) != 0 && strlen($this->input->post("rcontrasena")) != 0) {

                $getcorreo = $this->User_model->getUserByCorreo($correo);

                if (($contrasena == $contrasena2)) {

                    if (empty($getcorreo)) {
                        $con = $this->input->post("contrasena");

                        $res = $this->User_model->insertar($data);
                        if ($res == true) {
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
//        $config['mailtype'] = 'html';
                            $email = array(
                                'correo' => $correo,
                                'contraseña' => $con
                            );

                            $this->email->from('no-reply@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                            $this->email->to($correo); //Correo del ciudadano
                            $this->email->subject('Registro de Usuario.');
                            $body = $this->load->view('vista_email.php', $email, TRUE);
                            $this->email->message($body);
                             $this->email->send();
                            $maxnum = $this->Usuarios_model->getMaxItemByid();
                            $maxnumbd = $maxnum[0]->maximo;
                           
//                         
//                            $data = array('username' => $nombres, 'id' => $maxnumbd, 'login' => true, 'tipo' => '3', 'nombrec' => $nombres . " " . $apellido_pat . " " . $apellido_mat, 'correo' => $correo);

//                            $this->session->set_userdata($data);

                            echo true;
                        } else {
                            echo false;
                        }
                    } else {
                        echo "Lo Sentimos, El Correo Ya Ha Sido Registrado En El Sistema";
                    }
                } else {
                    echo "Las Contraseñas No Coinciden";
                }
            } else {
                echo false;
            }
        } else {
            show_404();
        }
    }

    public function guardar_func() {

        if ($this->input->is_ajax_request()) {

            $nombres = $this->input->post("nombres");
            $apellido_pat = $this->input->post("apellido_pat");
            $apellido_mat = $this->input->post("apellido_mat");
            $calle = $this->input->post("calle");
            $colonia = $this->input->post("colonia");
            $cp = $this->input->post("cp");
            $correo = str_replace(' ', '', $this->input->post("correo"));
            $telefono = $this->input->post("telefono");
            $contrasena = sha1($this->input->post("contrasena"));
            $contrasena2 = sha1($this->input->post("rcontrasena"));
            $usu = $this->input->post("tipo_usu");
            $admin = $this->input->post("admin") != "" ? '1' : '0';

            $dir = $this->input->post("direccion");



            $data = array('nombres' => $nombres, 'apellido_pat' => $apellido_pat, 'apellido_mat' => $apellido_mat, 'calle' => $calle, 'colonia' => $colonia, 'cp' => $cp, 'correo' => $correo, 'contrasena' => $contrasena, 'telefono' => $telefono, 'tipo_usu' => $usu, 'direccion' => $dir, 'admin' => $admin);

            if (strlen($this->input->post("contrasena")) != 0 && strlen($nombres) != 0 && strlen($apellido_pat) != 0 && strlen($apellido_mat) != 0 && strlen($calle) != 0 && strlen($colonia) != 0 && strlen($cp) != 0 && strlen($correo) != 0 && strlen($contrasena) != 0 && strlen($this->input->post("rcontrasena")) != 0) {

                $getcorreo = $this->User_model->getUserByCorreo($correo);

                if (($contrasena == $contrasena2)) {
                    if (empty($getcorreo)) {
                        $con = $this->input->post("contrasena");
                        $res = $this->User_model->insertar_fun($data);

                        $this->session->set_flashdata('correcto', 'Usuario registrado correctamente!');
                        if ($res == true) {
//                            $this->load->library('email');
//                            $config['protocol'] = 'smtp';
//                            $config['smtp_port'] = '465';
//                            $config['smtp_host'] = 'mail.naturalmentefuerte.com';
//                            $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
//                            $config['smtp_pass'] = 'u3g0Xy0aR6';
//                            $config['mailtype'] = 'html';
//                            $this->email->from('no-reply@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
//                            $this->email->to($correo); //Correo del ciudadano
//                            $this->email->subject('Registro de Usuario.');
//                            $this->email->message('Usuario Registrado de manera correcta <br>Usuario:' . $correo . '<br>Contraseña:' . $con . '.');
//                            $this->email->send();
                            echo true;
                        } else {
                            echo false;
                        }
                    } else {
                        echo "Lo Sentimos, El Correo Ya Ha Sido Registrado En El Sistema";
                    }
                } else {
                    echo "Las Contraseñas No Coinciden";
                }
            } else {
                echo false;
            }
        } else {
            show_404();
        }
    }

}

?>
