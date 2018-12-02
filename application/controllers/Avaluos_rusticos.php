<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Avaluos_rusticos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Avaluos_rusticos_model');
        $this->load->library('form_validation');
        $this->load->library('zip');
        $this->load->model('Peritos_model');
        $this->load->model('Colonias_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'avaluos_rusticos/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'avaluos_rusticos/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'avaluos_rusticos/index.html';
            $config['first_url'] = base_url() . 'avaluos_rusticos/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Avaluos_rusticos_model->total_rows($q);
        $avaluos_rusticos = $this->Avaluos_rusticos_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'avaluos_rusticos_data' => $avaluos_rusticos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('avaluos_rusticos/avaluos_rusticos_list',$data);
    }

    public function reportes(){
      $this->load->view('avaluos_rusticos/avaluos_rusticos_reportes');
    }

    public function reportefinal(){
      $fechainicio = $this->input->post('fechainicio',TRUE);
      $fechafinal = $this->input->post('fechafinal',TRUE);
      $status = $this->input->post('status',TRUE);
      $nombrepropietario = $this->input->post('nombrepropietario',TRUE);

      $avaluos_rusticos = $this->Avaluos_rusticos_model->get_reporte($fechainicio,$fechafinal,$nombrepropietario,$status);

      $data = array(
          'avaluos_rusticos_data' => $avaluos_rusticos
      );


      //print_r($data);
      $this->load->view('avaluos_rusticos/avaluos_rusticos_reportefinal',$data);

    }

    public function read($id)
    {
        $row = $this->Avaluos_rusticos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'motivo' => $row->motivo,
		'nombresolicitante' => $row->nombresolicitante,
		'nombrepropietario' => $row->nombrepropietario,
		'calle' => $row->calle,
		'numero' => $row->numero,
		'colonia' => $row->colonia,
		'municipio' => $row->municipio,
		'localidad' => $row->localidad,
		'correo' => $row->correo,
		'telefono' => $row->telefono,
		'perito' => $row->perito,
		'documentofinal' => $row->documentofinal,
        'doctopago' => $row->doctopago,
		'usuarioID' => $row->usuarioID,
		'status' => $row->status,
		'mensaje' => $row->mensaje,
    'notificacion' => $row->notificacion
	    );
            $this->load->view('avaluos_rusticos/avaluos_rusticos_read', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('avaluos_rusticos'));
        }
    }

    public function create()
    {
   $result = $this->Colonias_model->getcoloniaspredial();
      $resultperitos = $this->Peritos_model->getperitos();

        $data = array(
            'consulta' => $result,
            'resultperitos' => $resultperitos,
            'button' => 'Solicitar Trámite',
            'action' => site_url('avaluos_rusticos/create_action'),
	    'ID' => set_value('ID'),
	    'motivo' => set_value('motivo'),
	    'nombresolicitante' => set_value('nombresolicitante'),
	    'nombrepropietario' => set_value('nombrepropietario'),
	    'calle' => set_value('calle'),
	    'numero' => set_value('numero'),
	    'colonia' => set_value('colonia'),
	    'municipio' => set_value('municipio'),
	    'localidad' => set_value('localidad'),
	    'correo' => set_value('correo'),
	    'telefono' => set_value('telefono'),
	    'perito' => set_value('perito'),
	    'documentofinal' => set_value('documentofinal'),
        'doctopago' => set_value('doctopago'),
	    'usuarioID' => set_value('usuarioID'),
	    'status' => set_value('status'),
	    'mensaje' => set_value('mensaje'),
	);
        $this->load->view('avaluos_rusticos/avaluos_rusticos_form', $data);
    }

    public function create_action()
    {
       $maxnum = $this->Avaluos_rusticos_model->getMaxItemByid();
          $maxnumbd = $maxnum[0]->maximo;
          if (empty($maxnumbd)) {
                  $maxnumbd = 1;
          }
          else{
                  $maxnumbd = $maxnumbd + 1;
          }

          $this->load->library('email');
          $config['protocol'] = 'smtp';
          $config['smtp_port'] = '465';
          $config['smtp_host'] = 'mail.naturalmentefuerte.com';
          $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
          $config['smtp_pass'] =  'u3g0Xy0aR6';
          $config['mailtype'] = 'html';

        //Tamaño Maximo de los Archivos 20 Megas
        $configzip = $config['max_size'] = "21504";
        $this->load->library("upload",$configzip);
        $variablefile = $_FILES;

            $data = array(
		'motivo' => $this->input->post('motivo',TRUE),
		'nombresolicitante' => $this->input->post('nombresolicitante',TRUE),
		'nombrepropietario' => $this->input->post('nombrepropietario',TRUE),
		'calle' => $this->input->post('calle',TRUE),
		'numero' => $this->input->post('numero',TRUE),
		'colonia' => $this->input->post('colonia',TRUE),
		'municipio' => $this->input->post('municipio',TRUE),
		'localidad' => $this->input->post('localidad',TRUE),
		'correo' => $this->input->post('correo',TRUE),
		'telefono' => $this->input->post('telefono',TRUE),
		'perito' => $this->input->post('perito',TRUE),
		'usuarioID' => $this->session->userdata('id'),
    'status' => "1",
    'notificacion' => '1'
	    );

             if (!empty($_FILES['doctopago']['tmp_name'][0])) {
          $numfiles = count($_FILES['doctopago']['tmp_name']);
          //Documentos Bitacora
          for ($i=0; $i < $numfiles; $i++) {
            $path = $variablefile['doctopago']['tmp_name'][$i];
            $this->zip->read_file($path,$variablefile['doctopago']['name'][$i]);
          }
          //Write the zip file to a folder on your server. Name it "my_backup.zip"
          if($this->zip->archive('./assets/tramites/avaluosrusticos/file-'.$maxnumbd.'-doctopago.zip')){
            $data['doctopago'] = "file-".$maxnumbd."-doctopago.zip";
            //echo "Guarda";
          }
          $this->zip->clear_data();
          //echo "Entra al IF";
        }
      else {
          $data['doctopago'] = "";
      }


       /////////Mensaje del Funcionario a Ciudadano///////////////
      $this->email->from('carlos.juarez@irapuato.gob.mx','Ventanilla Universal de trámites y servicios de Irapuato');
      $this->email->to($this->input->post('correo',TRUE));//Correo del ciudadano
      $this->email->subject('Autorización y Atención de Avalúos Rústicos.');
      $this->email->message('Su solicitud del tramite Autorización y Atención de Avalúos Rústicos ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.');
      $this->email->send();
      /////////Mensaje del Ciudadano a Funcionario///////////////
      $this->email->from($this->input->post('correo',TRUE),'Ventanilla Universal de trámites y servicios de Irapuato');
      $this->email->to('jcabreramendiola@gmail.com');
      $this->email->subject('Autorización y Atención de Avalúos Rústicos.');
      $this->email->message('Usted tiene un nuevo tramite Autorización y Atención de Avalúos Rústicos. para poder revisar la solicitud del tramite entre a http://www.irapuato.gob.mx/e-gob/vuira.');
      $this->email->send();

            $this->Avaluos_rusticos_model->insert($data);
            //$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('avaluos_rusticos'));
        }


    public function update($id)
    {

        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();

        if ($this->session->userdata("tipo") == 14 || $this->session->userdata("tipo") == 144) {
        $row = $this->Avaluos_rusticos_model->get_by_id_admin($id);
      }
      else {
        $row = $this->Avaluos_rusticos_model->get_by_id($id);
      }


        if ($row) {
            $data = array(

                'consulta' => $result,
                'resultperitos' => $resultperitos,
                'button' => 'Actualizar',
                'action' => site_url('avaluos_rusticos/update_action'),
		'ID' => set_value('ID', $row->ID),
		'motivo' => set_value('motivo', $row->motivo),
		'nombresolicitante' => set_value('nombresolicitante', $row->nombresolicitante),
		'nombrepropietario' => set_value('nombrepropietario', $row->nombrepropietario),
		'calle' => set_value('calle', $row->calle),
		'numero' => set_value('numero', $row->numero),
		'colonia' => set_value('colonia', $row->colonia),
		'municipio' => set_value('municipio', $row->municipio),
		'localidad' => set_value('localidad', $row->localidad),
		'correo' => set_value('correo', $row->correo),
		'telefono' => set_value('telefono', $row->telefono),
		'perito' => set_value('perito', $row->perito),
		'documentofinal' => set_value('documentofinal', $row->documentofinal),
        'doctopago' => set_value('doctopago', $row->doctopago),
		'usuarioID' => set_value('usuarioID', $row->usuarioID),
		'status' => set_value('status', $row->status),
		'mensaje' => set_value('mensaje', $row->mensaje),
	    );

      if($this->session->userdata("tipo") == 14 || $this->session->userdata("tipo") == 144){
        $data['action'] = site_url('avaluos_rusticos/update_action_admin');
      }
      else {
        $data['action'] = site_url('avaluos_rusticos/update_action');
      }

            $this->load->view('avaluos_rusticos/avaluos_rusticos_form', $data);
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('avaluos_rusticos'));
        }
    }

    public function update_action()
    {
        $this->_rulesupdate();

        $this->load->library('email');
          $config['protocol'] = 'smtp';
          $config['smtp_port'] = '465';
          $config['smtp_host'] = 'mail.naturalmentefuerte.com';
          $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
          $config['smtp_pass'] =  'u3g0Xy0aR6';
          $config['mailtype'] = 'html';

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(

		'motivo' => $this->input->post('motivo',TRUE),
		'nombresolicitante' => $this->input->post('nombresolicitante',TRUE),
		'nombrepropietario' => $this->input->post('nombrepropietario',TRUE),
		'calle' => $this->input->post('calle',TRUE),
		'numero' => $this->input->post('numero',TRUE),
		'colonia' => $this->input->post('colonia',TRUE),
		'municipio' => $this->input->post('municipio',TRUE),
		'localidad' => $this->input->post('localidad',TRUE),
		'correo' => $this->input->post('correo',TRUE),
		'telefono' => $this->input->post('telefono',TRUE),
		'perito' => $this->input->post('perito',TRUE),
    'notificacion' => '1'
	    );


            $maxnumbd = $this->input->post('ID', TRUE);

                  //Tamaño Maximo de los Archivos 20 Megas
             $configzip = $config['max_size'] = "21504";
             $this->load->library("upload",$configzip);
             $variablefile = $_FILES;

              if (!empty($_FILES['doctopago']['tmp_name'][0])) {
              $numfiles = count($_FILES['doctopago']['tmp_name']);
              //Documentos Bitacora
              for ($i=0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopago']['tmp_name'][$i];
                $this->zip->read_file($path,$variablefile['doctopago']['name'][$i]);
              }
              //Write the zip file to a folder on your server. Name it "my_backup.zip"
              if($this->zip->archive('./assets/tramites/avaluosrusticos/file-'.$maxnumbd.'-doctopago.zip')){
                $data['doctopago'] = "file-".$maxnumbd."-doctopago.zip";
                //echo "Guarda";
              }
              $this->zip->clear_data();
              //echo "Entra al IF";
        }


        /////////Mensaje del Funcionario a Ciudadano///////////////
      $this->email->from('carlos.juarez@irapuato.gob.mx','Ventanilla Universal de trámites y servicios de Irapuato');
      $this->email->to($this->input->post('correo',TRUE));//Correo del ciudadano
      $this->email->subject('Autorización y Atención de Avalúos Rústicos');
      $this->email->message('Los datos del trámite Autorización y Atención de Avalúos Rústicos han sido actualizados con éxito; un funcionario revisará los cambios en la información en horas hábiles y le mantendrá informado por correo electrónico.');
      $this->email->send();
      /////////Mensaje del Ciudadano a Funcionario///////////////
      $this->email->from($this->input->post('correo',TRUE),'Ventanilla Universal de trámites y servicios de Irapuato');
      $this->email->to('jcabreramendiola@gmail.com');
      $this->email->subject('Autorización y Atención de Avalúos Rústicos');
      $this->email->message('El trámite Autorización y Atención de Avalúos Rústicos a nombre  de '.$this->input->post('nombrepropietario',TRUE).', a sido actualizado, por favor revise la información para continuar con el proceso del trámite.');
      $this->email->send();

            $this->Avaluos_rusticos_model->update($this->input->post('ID', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('avaluos_rusticos'));
        }
    }

    public function update_action_admin()
    {
        $this->_rulesupdate();

        $this->load->library('email');
          $config['protocol'] = 'smtp';
          $config['smtp_port'] = '465';
          $config['smtp_host'] = 'mail.naturalmentefuerte.com';
          $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
          $config['smtp_pass'] =  'u3g0Xy0aR6';
          $config['mailtype'] = 'html';

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
    'status' => $this->input->post('status',TRUE),
    'mensaje' => $this->input->post('mensaje',TRUE),
    'notificacion' => '0'
      );

      if($this->input->post('status',TRUE) == 2){
        $data['fechainicio'] = date("Y-m-d");
      }

      if($this->input->post('status',TRUE) >= 3){
        $data['fechafinal'] = date("Y-m-d");
      }

           $maxnumbd = $this->input->post('ID', TRUE);

                  //Tamaño Maximo de los Archivos 20 Megas
           $configzip = $config['max_size'] = "21504";
           $this->load->library("upload",$configzip);
           $variablefile = $_FILES;


            if (!empty($_FILES['documentofinal']['tmp_name'][0])) {
            $numfiles = count($_FILES['documentofinal']['tmp_name']);
            //Documentos Bitacora
            for ($i=0; $i < $numfiles; $i++) {
              $path = $variablefile['documentofinal']['tmp_name'][$i];
              $this->zip->read_file($path,$variablefile['documentofinal']['name'][$i]);
            }
            //Write the zip file to a folder on your server. Name it "my_backup.zip"
            if($this->zip->archive('./assets/tramites/avaluosrusticos/file-'.$maxnumbd.'-documentofinal.zip')){
              $data['documentofinal'] = "file-".$maxnumbd."-documentofinal.zip";
              //echo "Guarda";
            }
            $this->zip->clear_data();
          }

          if (!empty($_FILES['doctopago']['tmp_name'][0])) {
              $numfiles = count($_FILES['doctopago']['tmp_name']);
              //Documentos Bitacora
              for ($i=0; $i < $numfiles; $i++) {
                $path = $variablefile['doctopago']['tmp_name'][$i];
                $this->zip->read_file($path,$variablefile['doctopago']['name'][$i]);
              }
              //Write the zip file to a folder on your server. Name it "my_backup.zip"
              if($this->zip->archive('./assets/tramites/avaluosrusticos/file-'.$maxnumbd.'-doctopago.zip')){
                $data['doctopago'] = "file-".$maxnumbd."-doctopago.zip";
                //echo "Guarda";
              }
              $this->zip->clear_data();
              //echo "Entra al IF";
            }


             /////////Mensaje del Funcionario a Ciudadano///////////////
      $this->email->from('carlos.juarez@irapuato.gob.mx','Ventanilla Universal de trámites y servicios de Irapuato');
      $this->email->to($this->input->post('correo',TRUE));//Correo del ciudadano $this->input->post('correo',TRUE)
      $this->email->subject('Autorización y Atención de Avalúos Rústicos');  
      $this->email->message('En su solicitud del tramite Autorización y Atención de Avalúos Rústicos a nombre  de'.$this->input->post('nombrepropietario',TRUE).', se requieren las siguientes acciones: '.$this->input->post('mensaje',TRUE).' favor de realizar los cambios correspondientes para continuar con el trámite.');
      $this->email->send();





            $this->Avaluos_rusticos_model->update($this->input->post('ID', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('avaluos_rusticos'));
        }
    }

    public function delete($id)
    {
        $row = $this->Avaluos_rusticos_model->get_by_id($id);

        if ($row) {
            $this->Avaluos_rusticos_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('avaluos_rusticos'));
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('avaluos_rusticos'));
        }
    }


   public function _rules()
    {
    $this->form_validation->set_rules('motivo', 'motivo', 'trim|required');
    $this->form_validation->set_rules('nombresolicitante', 'nombresolicitante', 'trim|required');
    $this->form_validation->set_rules('nombrepropietario', 'nombrepropietario', 'trim|required');
    $this->form_validation->set_rules('calle', 'calle', 'trim|required');
    $this->form_validation->set_rules('numero', 'numero', 'trim|required');
    $this->form_validation->set_rules('colonia', 'colonia', 'trim|required');
    $this->form_validation->set_rules('municipio', 'municipio', 'trim|required');
    $this->form_validation->set_rules('localidad', 'localidad', 'trim|required');
    $this->form_validation->set_rules('correo', 'correo', 'trim|required');
    $this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
    $this->form_validation->set_rules('perito', 'perito', 'trim|required');
    $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
    $this->form_validation->set_message('required','*');
    $this->form_validation->set_rules('ID', 'ID', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

 public function _rulesupdate()
    {

    $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
    $this->form_validation->set_rules('usuarioID', 'usuarioid', 'trim|required');

    $this->form_validation->set_rules('ID', 'ID', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
