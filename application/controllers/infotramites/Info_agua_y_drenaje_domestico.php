<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info_agua_y_drenaje_domestico extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (5) ");
        $datos['dato'] = $costo;
        $this->load->view("infotramites/info_agua_y_drenaje_domestico",$datos);
    }

    public function propiedad() {
       $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (9) ");
        $datos['dato'] = $costo;
        
        $this->load->view("infotramites/info_atencion_de_regimen_propiedad", $datos);
    }

}

?>
