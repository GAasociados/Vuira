<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramites extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		//$this->load->view("infotramites/tramites");
                $this->load->view("infotramites/tramite");
	}
        
        public function captura_tramite()
	{
                $this->load->view("infotramites/captura_tramite");
	}
}
?>
