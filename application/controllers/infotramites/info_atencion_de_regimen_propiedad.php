<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class info_atencion_de_regimen_propiedad extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (9) ");
        $datos['dato'] = $costo;
        die(print_r($datos,true));
        $this->load->view("infotramites/info_atencion_de_regimen_propiedad", $datos);
    }

}

?>
