<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documentojapami extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Contratacion_y_servicios_de_agua_y_drenaje_domestico_model');
        $this->load->model('Calles_japami_model');
        $this->load->model('Colonias_japami_model');
    }

    public function index() {
        header("Location:" . base_url());
    }

    public function documentopago($id = null, $servicios = null) {
        //$data = array('ID' => $fila->ID,'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg,'servicios' => $fila->servicios);
        //$this->load->view("documentos/documentojapamipago",$data);
        $fila = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id_administrador($id);

        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietario . " " . $fila->apaterno . " " . $fila->amaterno, 'serviciossolicita' => $servicios, 'rfc' => $fila->rfc, 'contrato' => $fila->cuentaligada);

        $html = $this->load->view('documentos/documentojapamifinalpago', $data, true);
        //$this->load->view('documentos/documentojapamifinalpago',$data);
        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "pago_JAPAMI_" . str_replace(' ', '_', $fila->nombre) . ".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    /* //Modificar Solo Si Se Necesita
      public function documentofinalpago($ID){
      $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($ID);
      //print_r($fila);
      $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
      $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
      $arrayperito = "-------------------------------------";
      //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
      $data = array('ID' => $fila->ID,'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg);

      $data['d1'] = $this->input->post("d1");
      $data['d2'] = $this->input->post("d2");
      $data['d3'] = $this->input->post("d3");
      $data['d4'] = $this->input->post("d4");
      $data['d5'] = $this->input->post("d5");
      $data['d6'] = $this->input->post("d6");
      $data['d7'] = $this->input->post("d7");
      $data['d8'] = $this->input->post("d8");
      $data['d9'] = $this->input->post("d9");
      $data['d10'] = $this->input->post("d10");
      $data['d11'] = $this->input->post("d11");
      $data['d12'] = $this->input->post("d12");
      $data['d13'] = $this->input->post("d13");
      $data['d14'] = $this->input->post("d14");
      $data['d15'] = $this->input->post("d15");
      $data['d16'] = $this->input->post("d16");
      $data['d17'] = $this->input->post("d17");
      $data['d18'] = $this->input->post("d18");
      $data['d19'] = $this->input->post("d19");

      //$this->load->view("documentos/documentoterminacionobrafinal",$data);
      $html = $this->load->view('documentos/documentoanunciofinalpago',$data,true);

      //$html="asdf";
      //this the the PDF filename that user will get to download
      $pdfFilePath = "pago_adosados_".str_replace(' ','_',$fila->nombrepropietarioinmuebledg).".pdf";

      //load mPDF library
      $this->load->library('M_pdf');
      //$mpdf = new mPDF('c', 'A4');
      //$mpdf->WriteHTML($html);
      //$mpdf->Output($pdfFilePath, "D");
      // //generate the PDF from the given html
      $this->m_pdf->pdf->WriteHTML($html);

      //  //download it.
      $this->m_pdf->pdf->Output($pdfFilePath, "D");


      }
     */

    public function documentofinal($calle) {

        $fila = $this->Contratacion_y_servicios_de_agua_y_drenaje_domestico_model->get_by_id_administrador($calle);
        $arraycalle = $this->Calles_japami_model->getalladatacallebyid($fila->callepropietario);
        $arraycolonia = $this->Colonias_japami_model->getalladatacoloniabyid($fila->coloniapropietario);
//       die(print_r($arraycalle,true));
        $data = array('calle' => $arraycalle->NOMBRE, 'num' => $fila->numeroextpropietario,'num1' => $fila->numerointpropietario, 'colonia' => $arraycolonia->NOMBRE, 'nombre' => $fila->nombrepropietario . " " . $fila->apaterno . " " . $fila->amaterno, 'rfc' => $fila->rfc, 'correo' => $fila->correo, 'telefono' => $fila->telefono, 'cuentaligada' => $fila->cuentaligada, 'solicitud' => $fila->solicitud, 'tiposer' => $fila->tiposervicio, 'serviciossolicita' => $fila->serviciossolicita, 'iniciofacturacion' => $fila->iniciofacturacion);
        //$data['calle'] = remplazar($data['calle']);,
        $data = str_replace("%20", " ", $data);
        $data = str_replace("%C3%A1", "á", $data);
        $data = str_replace("%C3%A9", "é", $data);
        $data = str_replace("%C3%AD", "í", $data);
        $data = str_replace("%C3%B3", "ó", $data);
        $data = str_replace("%C3%BA", "ú", $data);

        $data = str_replace("%C3%81", "Á", $data);
        $data = str_replace("%C3%89", "É", $data);
        $data = str_replace("%C3%8D", "Í", $data);
        $data = str_replace("%C3%93", "Ó", $data);
        $data = str_replace("%C3%9A", "Ú", $data);

        $data = str_replace("ccc", "(", $data);
        $data = str_replace("ddd", ")", $data);
        //print_r($data);
//$this->load->view('documentos/documentojapami',$data);
//die(print_r($data,true));
        $html = $this->load->view('documentos/documentojapami', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath = "contrato_" . $data['solicitud'] . ".pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

}

?>
