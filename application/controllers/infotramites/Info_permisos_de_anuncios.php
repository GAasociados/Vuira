<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_permisos_de_anuncios extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index()
	{
		$this->load->view("infotramites/info_permisos_de_anuncios");
	}
}
?>
