<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registermorales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Colonias_model");
    }

    public function index() {
        $result = $this->Colonias_model->getcolonias();
        $data = array('consulta' => $result);

        $this->load->view("users/registermorales", $data);
    }

    public function guardar() {

        if ($this->input->is_ajax_request()) {
            $nombres = $this->input->post("nombres");
            $apellido_pat = $this->input->post("apellido_pat");
            $apellido_mat = "";
            $calle = $this->input->post("calle");
            $colonia = $this->input->post("colonia");
            $cp = $this->input->post("cp");
            $correo = str_replace(' ', '', $this->input->post("correo"));
            $telefono = $this->input->post("telefono");
            $rfc = $this->input->post("rfc");

            $contrasena = sha1($this->input->post("contrasena"));
            $contrasena2 = sha1($this->input->post("rcontrasena"));


            $data = array('nombres' => $nombres, 'apellido_pat' => $apellido_pat, 'calle' => $calle, 'colonia' => $colonia, 'cp' => $cp, 'correo' => $correo, 'contrasena' => $contrasena, 'telefono' => $telefono, 'rfc' => $rfc);

            if (strlen($this->input->post("contrasena")) != 0 && strlen($nombres) != 0 && strlen($apellido_pat) != 0 && strlen($calle) != 0 && strlen($colonia) != 0 && strlen($cp) != 0 && strlen($correo) != 0 && strlen($contrasena) != 0 && strlen($this->input->post("rcontrasena")) != 0) {

                $getcorreo = $this->User_model->getUserByCorreo($correo);

                if (($contrasena == $contrasena2)) {
                    if (empty($getcorreo)) {
                        $res = $this->User_model->insertarpersonamoral($data);
                        if ($res == true) {
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
