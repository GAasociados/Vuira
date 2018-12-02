<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_permisos_de_anuncios_autosoportados_azoteas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index()
	{
            
              $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (3,4) ");
		$datos['dato'] = $costo;
//                die(print_r($datos[]], true));
		$this->load->view("infotramites/info_permisos_de_anuncios_autosoportados_azoteas",$datos);

        }
}
?>
