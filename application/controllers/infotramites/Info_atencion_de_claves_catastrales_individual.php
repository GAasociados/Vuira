<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_atencion_de_claves_catastrales_individual extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index()
	{      
           
                $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (1,2) ");
		$datos['costo'] = $costo->result();
          
		$this->load->view("infotramites/info_atencion_de_claves_catastrales_individual",$datos);
	}
}
?>
