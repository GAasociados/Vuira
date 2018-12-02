<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_autorizacion_ocupacion_construccion extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index()
	{
   $costo = $this->db->query("SELECT * FROM `costos_tramite` WHERE `tipo` IN (6) ");
		$datos['dato'] = $costo;
		$this->load->view("infotramites/info_autorizacion_ocupacion_construccion",$datos);
	}
}
?>
