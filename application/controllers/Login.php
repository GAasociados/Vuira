<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model");
        //$this->load->library('Auth');
    }

    public function index()
    {
        //Cargas una vista

        if ($this->session->userdata("login")) {
            header("Location:" . base_url());
        } else {
            $data = array('direccion' => $this->input->post('redirec'));
            $this->load->library('recaptcha');
            $this->load->view("login/login", $data);
        }
    }

    public function logenter()
    {

        if ($this->input->is_ajax_request()) {
            $respuesta = array();
            // Cargar Libreria
            //$this->load->library('recaptcha');
            // Obtiene la respuesta
            //$captcha_answer = $this->input->post('g-recaptcha-response');
            // Verifica la respuesta
            //$response = $this->recaptcha->verifyResponse($captcha_answer);
            // Procesa la cadena de texto
            if ($this->input->post("rancaracteres") == $this->input->post("usercaracteres")) {

                $username = $this->input->post("username");

                $password = sha1($this->input->post("password"));

                $data = array('username' => $username, 'password' => $password);

                $res = $this->Login_model->user($data);


//              
                if (isset($res->correo) && isset($res->contrasena)) {
                    if ($res->correo == $username && $res->contrasena == $password) {


                        $data = array('username' => $res->nombres, 'id' => $res->ID, 'login' => true, 'tipo' => $res->tipo_usu, 'nombrec' => $res->nombres . " " . $res->apellido_pat . " " . $res->apellido_mat, 'correo' => $res->correo, 'admin' => $res->admin);

                        $this->session->set_userdata($data);

//                        $this->session->set_flashdata('correcto', 'Bienvenido!');
                        $respuesta = $this->input->post('direccion');

                        if ($res->tipo_usu != 4 && $res->tipo_usu != 3) {
                            echo $res->direccion;
                        } else {
                            echo $respuesta;
                        }
                    } else {
                        $respuesta = 0;
                        echo $respuesta;
                    }
                } else {
                    $respuesta = 0;
                    echo $respuesta;
                }
            } else {
                //redirect('Crecaptcha');
                //header("Location:".base_url());
                $respuesta = 0;
                echo $respuesta;
            }
        } else {
            show_404();
        }
    }

    function iniciarSesion()
    {
        $this->load->library('Auth');
        if ($_POST['token']) {
            $this->auth->setToken($_POST['token']);
        }

        $respuesta = array();
        if ($this->auth->signIn()) {
            //$this->auth->setCorreoElectronico("pcatatro@gmail.com");
            $data = array('username' => $this->auth->getCorreoElectronico());
            $datosUsuario = $this->Login_model->user($data);
            if ($datosUsuario) {
                $datos = array('username' => $datosUsuario->nombres, 'id' => $datosUsuario->ID, 'login' => true, 'tipo' => $datosUsuario->tipo_usu, 'nombrec' => $datosUsuario->nombres . " " . $datosUsuario->apellido_pat . " " . $datosUsuario->apellido_mat, 'correo' => $datosUsuario->correo, 'admin' => $datosUsuario->admin);
                $this->session->set_userdata($datos);
                $respuesta["success"] = "Correcto";
                if ($datosUsuario->tipo_usu != 4 && $datosUsuario->tipo_usu != 3) {
                    $respuesta["direccion"] = $datosUsuario->direccion;
                } else {
                    $respuesta["direccion"] = base_url();
                }
            } else {
                $respuesta["success"] = "Incorrecto";
                $respuesta["direccion"] = base_url();
            }
            echo json_encode($respuesta);
        } else {
            $respuesta["success"] = "Incorrecto";
            $respuesta["direccion"] = base_url();
            echo json_encode($respuesta);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy(); //<-Eliminar Datos de session
        header("Location:" . base_url('login'));
    }

}

?>