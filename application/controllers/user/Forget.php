<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Forget extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model("Login_model");
      $this->load->model("User_model");
		}

		public function index()
		{
			//Cargas una vista
			if ($this->session->userdata("login")) {
			header("Location:".base_url());
		}
		else{
			$this->load->view("login/forget");
		}

		}

		public function newpass(){
      $correo = $this->input->post('correo',TRUE);

      $getcorreo = $this->User_model->getUserByCorreo($correo);

        if (!empty($getcorreo)) {
          //$res = $this->User_model->insertar($data);

          $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
          $pass = array();
          $alphaLength = strlen($alphabet) - 1;
          for ($i = 0; $i < 8; $i++) {
              $n = rand(0, $alphaLength);
              $pass[] = $alphabet[$n];
          }

          $this->User_model->newpassword($correo,sha1(implode($pass)));

          

          //Enviar Correo la contrasena = implode($pass)
          $this->load->library('email');
          $config['protocol'] = 'smtp';
          $config['smtp_port'] = '465';
          $config['smtp_host'] = 'mail.naturalmentefuerte.com';
          $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
          $config['smtp_pass'] =  'u3g0Xy0aR6';
          $config['mailtype'] = 'html';
          
          $this->email->from('ventanilla@irapuato.gob.mx','Ventanilla Universal Irapuato');
          $this->email->to($correo);//Correo del ciudadano
          $this->email->subject('Recuperar Contrasena');
          $newpassword = 'Su Contrasena es '. implode($pass). ' , Ingrese Nuevamente a la Ventanilla Universal de Irapuato para continuar ';
          $this->email->message($newpassword);
          $this->email->send();
      
      header("Location:".base_url());
          /*if ($res == true) {
            echo true;
            }
            else{
            echo false;
          }*/
        } else {
            $this->session->set_flashdata('correcto', 'El Correo Ingresado no esta registrado!');
            redirect(site_url('user/forget'));
        }

		}
	}
?>
