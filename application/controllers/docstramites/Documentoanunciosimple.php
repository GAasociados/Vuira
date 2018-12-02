<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documentoanunciosimple extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Permiso_anuncios_model');
        $this->load->model('Permiso_anuncios_adosados_model');
        $this->load->model('Colonias_model');
        $this->load->model("Peritos_model");
    }

    public function index() {
        header("Location:" . base_url());
    }

    public function documento($id = null) {

        $fila = $this->Permiso_anuncios_model->get_by_id_admin($id);
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);
        $arrayperitoesp = $arrayperitoesp['0'];

        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->colonia . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->colonia,
            'u5' => $fila->superficiepredioui, 'u6' => $arrayperitoesp->nombre, 'u7' => $arrayperitoesp->numregistro);

        $this->load->view("documentos/documentoanunciosimple", $data);
    }

    public function documentopago($id = null) {

        $fila = $this->Permiso_anuncios_model->get_by_id_admin($id);
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);
        $arrayperitoesp = $arrayperitoesp['0'];

        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg);

        $this->load->view("documentos/documentoanunciosimplepago", $data);
    }

    public function documentofinalpago() {
        $ID = $this->input->post("ID");
        $d24 = $this->input->post("d24");
        $d50 = $this->input->post("d50");
        $fila = $this->Permiso_anuncios_model->get_by_id_admin($ID);

        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg);



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
        $data['d24'] = $fila->cartel;
        $data['d50'] = $fila->barner;
        $data['d19'] = $this->input->post("cantidadletras");
        $data['tipo_pago'] = $fila->tipo_pago;
        $data['total_pago'] = $fila->total_pago;
//die(print_r( $fila->barner,true));
        $data['total_metros'] = $fila->total_metros;

        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoanunciosimplefinalpago', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
//        $pdfFilePath = "pago_autosoportados_" . str_replace(' ', '_', $fila->nombrepropietarioinmuebledg) . ".pdf";

        $pdfFilePath = FCPATH . '/assets/tramites/permisosanunciosautosoportados/' . "file-" . $ID . "-doctopago.pdf";
        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //  //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2 = array();
        $data2['doctopago'] = "file-" . $ID . "-doctopago.pdf";
//        $data2['clave'] = $this->input->post('clave');
        $this->Permiso_anuncios_model->update($fila->ID, $data2);
    }

    public function documentofinalpago_vista() {
        $ID = $this->input->post("ID");
        $d24 = $this->input->post("d24");


        $d50 = $this->input->post("d50");

        $fila = $this->Permiso_anuncios_model->get_by_id_admin($ID);

        $cartel = "";
        $barner = "";

        if ($d24) {

            foreach ($d24 as $an):
                $detalle = explode("&", $an);


                $cartel = $cartel . $detalle[1] . ': ' . $detalle[0] . 'x (' . $detalle[2] . " x " . $detalle[3] . ") = " . $detalle[4] . "m2<br>";
            endforeach;
        }

        if ($d50) {
            foreach ($d50 as $an):
                $detalle = explode("&", $an);

                $barner = $barner . $detalle[0] . '&' . $detalle[1] . "&" . $detalle[2] . "&" . $detalle[3] . "^";
            endforeach;
        }
        $data2 = array();

        $data2['cartel'] = $cartel;
        $data2['barner'] = $barner;
        $data2['total_pago'] = $this->input->post("total_pago");
//     
        $data2['total_metros'] = $this->input->post("metros");
        $data2['tipo_pago'] = $this->input->post("tipo_pago");
        $data2['total_letra'] = $this->input->post("total");


        $this->Permiso_anuncios_model->update($this->input->post('ID', TRUE), $data2);
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg);

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
        $data['d24'] = $this->input->post("d24");
        $data['d50'] = $this->input->post("d50");
        $data['d19'] = $this->input->post("total");
        $data['tipo_pago'] = $this->input->post("tipo_pago");
        $data['total_pago'] = $this->input->post("total_pago");
        $data['total_p'] = $this->input->post("total_p");
        $data['total_metros'] = $this->input->post("metros");

        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $this->load->view('documentos/documentoanunciosimplefinalpago_vista', $data);

        //$html="asdf";
        //this the the PDF filename that user will get to download
    }

    public function documentofinal() {
        $fila = $this->Permiso_anuncios_model->get_by_id_admin($this->input->post("ID"));


        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);
        $arrayperitoesp = $arrayperitoesp['0'];
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->NOMBRE . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->NOMBRE,
            'u5' => $fila->superficiepredioui, 'u6' => $arrayperitoesp->nombre, 'u7' => $arrayperitoesp->numregistro);

        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");

        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");

        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");
        $data['d20'] = $this->input->post("d20");
        $data['d21'] = $this->input->post("d21");
        $data['d22'] = $this->input->post("d22");
        $data['d23'] = $this->input->post("d23");
        $data['d24'] = $fila->cartel;
        $data['d50'] = $fila->barner;


        $data['d30'] = $fila->tipo_pago;
        $data['d60'] = $fila->total_pago;
        $data['d61'] = $fila->total_metros;


        $data['d35'] = $this->input->post("d35");
        $data['d36'] = $this->input->post("d36");
        $data['d37'] = $this->input->post("d37");
        $data['d38'] = $this->input->post("d38");


        $data['op1'] = $this->input->post("opl");
        $data['representante'] = $this->input->post("representante");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoanunciosimplefinal', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
//        $pdfFilePath = "permiso_anuncio_autosoportado_" . $this->input->post("d1") . ".pdf";
        $pdfFilePath = FCPATH . '/assets/tramites/permisosanunciosautosoportados/' . "file-" . $fila->ID . "-doctofinal.pdf";
        //load mPDF library
        $this->load->library('M_pdf');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html
        //  //download it.
//            die(print_r( $fila->ID));
        $this->m_pdf->pdf->SetHTMLHeader('
<table style="width:100%; floar:left;">
            <tr>
                <td>
                    <img src="' . base_url() . 'assets/images/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>');
        $this->m_pdf->pdf->mirrorMargins = 1;    // Use different Odd/Even headers and footers and mirror margins
// Define the Headers before writing anything so they appear on the first page

        $this->m_pdf->pdf->SetHTMLHeader('
<table style="width:100%; floar:left;">
            <tr>
                <td>
                    <img src="' . base_url() . 'assets/images/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>', 'O');
        $this->m_pdf->pdf->SetHTMLHeader('
<table style="width:100%; floar:left;">
            <tr>
                <td>
                    <img src="' . base_url() . 'assets/images/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>', 'E');
        $this->m_pdf->pdf->AddPage('', '', '', '', '', 5, 5, 40, 40, 10, 10);

        $this->m_pdf->pdf->SetHTMLFooter('
    <table width="100%">
            <tr>
                <td width="80%">
                    <br>
                    <br>
                    <b>
                        DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
                        <br>
                        DIRECCIÓN DE ADMINISTRACIÓN URBANA
                    </b>
                    <hr>
                    Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
                    <br>
                    Tel. 01 (462) 635 88 00 ext. 3204
                    <br>
                    Irapuato, Gto. México
                </td>
                <td width="20%" align="right">
Hoja: {PAGENO} de {nbpg}
                </td>
            </tr>
        </table>
', 'O');
        $this->m_pdf->pdf->SetHTMLFooter('
    <table width="100%">
            <tr>
                <td width="80%">
                    <br>
                    <br>
                    <b>
                        DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
                        <br>
                        DIRECCIÓN DE ADMINISTRACIÓN URBANA
                    </b>
                    <hr>
                    Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
                    <br>
                    Tel. 01 (462) 635 88 00 ext. 3204
                    <br>
                    Irapuato, Gto. México
                </td>
                <td width="20%" align="right">
Hoja: {PAGENO} de {nbpg}
                </td>
            </tr>
        </table>
', 'E');

        $this->m_pdf->pdf->WriteHTML($html);
//
//        //  //download it.
//        $this->m_pdf->pdf->Output($pdfFilePath, "D");  $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        $this->m_pdf->pdf->Output();
        $data2 = array();
        $data2['doctofinal'] = "file-" . $fila->ID . "-doctofinal.pdf";
//        $data2['clave'] = $this->input->post('clave');
        $this->Permiso_anuncios_model->update($fila->ID, $data2);
        //load mPDF library
//        $this->load->library('M_pdf');
    }

    public function documentofinal_vista() {
        $consulta =$this->Permiso_anuncios_model->update_Obser($this->input->post("Obser"), $this->input->post("ID"));
        $fila = $this->Permiso_anuncios_model->get_by_id_admin($this->input->post("ID"));


//        die(print_r($this->input->post("d2"),true));
        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);
        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);
        $arrayperitoesp = $arrayperitoesp['0'];
        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->NOMBRE . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->NOMBRE,
            'u5' => $fila->superficiepredioui, 'u6' => $arrayperitoesp->nombre, 'u7' => $arrayperitoesp->numregistro);
        if($fila->renovacion==1){
            $numo = "02";
        }else{
             $numo = "01";
        }
        $data['d1'] = "DGDT/DAU/DP/".$numo."/" . $this->input->post("d1") . "/" . date("Y");
        $data['d2'] = $this->input->post("d2");

        $data['d10'] = $this->input->post("pmg");
        $data['d11'] = $this->input->post("ugat");
        $data['d12'] = $this->input->post("uso");
        $data['d13'] = $fila->clavecat;
        $data['d14'] = $this->input->post("duracion");
        $data['d15'] = $this->input->post("contenido");
        $data['d16'] = $this->input->post("montaje");

        $data['d18'] = $this->input->post("constitucion");
        $data['d19'] = $this->input->post("altura");
        $data['d20'] = $this->input->post("carteleras");
        $data['d21'] = $this->input->post("dimensiones");
        $data['d22'] = $this->input->post("refe");
        $data['d23'] = $this->input->post("poliza");
        $data['d24'] = $fila->cartel;
        $data['d50'] = $fila->barner;


        $data['d30'] = $fila->tipo_pago;
        $data['d60'] = $fila->total_pago;
        $data['d61'] = $fila->total_metros;


        $data['d35'] = $this->input->post("archivo");
        $data['d36'] = $this->input->post("entrega");
        $data['d37'] = $this->input->post("reviso");
        $data['d38'] = $this->input->post("elaboro");
        $data['d51'] = $this->input->post("totalan");

        $data['op1'] = $this->input->post("ubicacion");
        $data['representante'] = $this->input->post("representante");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $this->load->view('documentos/documentoanunciosimplefinal_vista', $data);
    }

    public function documentofinal1() {
        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($this->input->post("ID"));


        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);

        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->NOMBRE . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->NOMBRE,
            'u5' => $fila->superficiepredioui, 'u6' => '', 'u7' => '');

        $data['d1'] = $this->input->post("d1");
        $data['d2'] = $this->input->post("d2");

        $data['d10'] = $this->input->post("d10");
        $data['d11'] = $this->input->post("d11");
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");

        $data['d18'] = $this->input->post("d18");
        $data['d19'] = $this->input->post("d19");
        $data['d20'] = $this->input->post("d20");
        $data['d21'] = $this->input->post("d21");
        $data['d22'] = $this->input->post("d22");
        $data['d23'] = $this->input->post("d23");
        $data['d24'] = $fila->cartel;
        $data['d50'] = $fila->barner;


        $data['d30'] = $fila->tipo_pago;
        $data['d60'] = $fila->total_pago;
        $data['d61'] = $fila->total_metros;


        $data['d35'] = $this->input->post("d35");
        $data['d36'] = $this->input->post("d36");
        $data['d37'] = $this->input->post("d37");
        $data['d38'] = $this->input->post("d38");
        $data['d51'] = $this->input->post("d51");

        $data['op1'] = $this->input->post("op1");
        $data['representante'] = $this->input->post("representante");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoanunciosimplefinal', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath1 = FCPATH . '/assets/tramites/permisosanunciosadosados/' . "file-" . $this->input->post("ID") . "-doctofinal.pdf";
//load mPDF library
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->SetHTMLHeader('
<table style="width:100%; floar:left;">
            <tr>
                <td>
                    <img src="' . base_url() . 'assets/images/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>');
        $this->m_pdf->pdf->mirrorMargins = 1;    // Use different Odd/Even headers and footers and mirror margins
// Define the Headers before writing anything so they appear on the first page

        $this->m_pdf->pdf->SetHTMLHeader('
<table style="width:100%; floar:left;">
            <tr>
                <td>
                    <img src="' . base_url() . 'assets/images/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>', 'O');
        $this->m_pdf->pdf->SetHTMLHeader('
<table style="width:100%; floar:left;">
            <tr>
                <td>
                    <img src="' . base_url() . 'assets/images/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>', 'E');
        $this->m_pdf->pdf->AddPage('', '', '', '', '', 5, 5, 40, 40, 10, 10);

        $this->m_pdf->pdf->SetHTMLFooter('
    <table width="100%">
            <tr>
                <td width="80%">
                    <br>
                    <br>
                    <b>
                        DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
                        <br>
                        DIRECCIÓN DE ADMINISTRACIÓN URBANA
                    </b>
                    <hr>
                    Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
                    <br>
                    Tel. 01 (462) 635 88 00 ext. 3204
                    <br>
                    Irapuato, Gto. México
                </td>
                <td width="20%" align="right">
Hoja: {PAGENO} de {nbpg}
                </td>
            </tr>
        </table>
', 'O');
        $this->m_pdf->pdf->SetHTMLFooter('
    <table width="100%">
            <tr>
                <td width="80%">
                    <br>
                    <br>
                    <b>
                        DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
                        <br>
                        DIRECCIÓN DE ADMINISTRACIÓN URBANA
                    </b>
                    <hr>
                    Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
                    <br>
                    Tel. 01 (462) 635 88 00 ext. 3204
                    <br>
                    Irapuato, Gto. México
                </td>
                <td width="20%" align="right">
Hoja: {PAGENO} de {nbpg}
                </td>
            </tr>
        </table>
', 'E');
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html

        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
//        die(print_r($pdfFilePath1));
        $this->m_pdf->pdf->Output($pdfFilePath1, "F");
        $this->m_pdf->pdf->Output();
        $data2['doctofinal'] = "file-" . $this->input->post("ID") . "-doctofinal.pdf";

        $this->Permiso_anuncios_adosados_model->update($this->input->post("ID"), $data2);
    }

    public function documentofinal1_vista() {
        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($this->input->post("ID"));


        //print_r($fila);
        $arraycoloniau3 = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);
        $arraycoloniau4 = $this->Colonias_model->getalladatacoloniabyid($fila->cbocoloniaui);

        //$data = array('ID' => $fila->ID,'u1' => $fila->nombrepropietarioinmuebledg,'u2' => $file->calledg." ".$file->numerodg,'u3' => $arraycoloniau4->colonia." Irapuato, Gto.");
        $data = array('ID' => $fila->ID, 'u1' => $fila->nombrepropietarioinmuebledg, 'u2' => $fila->calledg . " " . $fila->numerodg, 'u3' => $arraycoloniau3->NOMBRE . " Irapuato, Gto.", 'u4' => $fila->calleui . " " . $fila->nooficialui . " " . $arraycoloniau4->NOMBRE,
            'u5' => $fila->superficiepredioui, 'u6' => '', 'u7' => '');

        $data['d1'] = "DGDT/DAU/DP/01/" . $this->input->post("d1") . "/" . date("Y");
        $data['d2'] = $this->input->post("d2");

        $data['d10'] = $this->input->post("pmg");
        $data['d11'] = $this->input->post("ugat");
        $data['d12'] = $this->input->post("uso");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("duracion");
        $data['d15'] = $this->input->post("contenido");
        $data['d16'] = $this->input->post("montaje");

        $data['d18'] = $this->input->post("constitucion");
        $data['d19'] = $this->input->post("altura");
        $data['d20'] = $this->input->post("carteleras");
        $data['d21'] = $this->input->post("dimensiones");
        $data['d22'] = $this->input->post("refe");
        $data['d23'] = $this->input->post("poliza");
        $data['d24'] = $fila->cartel;
        $data['d50'] = $fila->barner;


        $data['d30'] = $fila->tipo_pago;
        $data['d60'] = $fila->total_pago;
        $data['d61'] = $fila->total_metros;


        $data['d35'] = $this->input->post("archivo");
        $data['d36'] = $this->input->post("entrega");
        $data['d37'] = $this->input->post("reviso");
        $data['d38'] = $this->input->post("elaboro");
        $data['d51'] = $this->input->post("totalan");

        $data['op1'] = $this->input->post("ubicacion");
        $data['representante'] = $this->input->post("representante");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $this->load->view('documentos/documentoanunciosimplefinal_vista1', $data);
    }

    public function documentofinalpago1() {
        $ID = $this->input->post("ID");

        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($ID);

        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg);

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
        $data['d24'] = $fila->cartel;
        $data['d50'] = $fila->barner;
        $data['d19'] = $this->input->post("cantidadletras");
        $data['tipo_pago'] = $fila->tipo_pago;
        $data['total_pago'] = $fila->total_pago;

        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoanunciosimplefinalpago', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download

        $pdfFilePath1 = FCPATH . '/assets/tramites/permisosanunciosadosados/' . "file-" . $ID . "-doctopago.pdf";
//load mPDF library
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->load->library('M_pdf');
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
//        die(print_r($pdfFilePath1));
        $this->m_pdf->pdf->Output($pdfFilePath1, "F");
        $this->m_pdf->pdf->Output();
        $data2['doctopago'] = "file-" . $ID . "-doctopago.pdf";

        $this->Permiso_anuncios_adosados_model->update($ID, $data2);
    }

    public function documentofinalpago1_vista() {
        $ID = $this->input->post("ID");
        $d24 = $this->input->post("d24");
        $d50 = $this->input->post("d50");
        $fila = $this->Permiso_anuncios_adosados_model->get_by_id_administrador($ID);

        $cartel = "";
        $barner = "";
        if ($d24) {

            foreach ($d24 as $an):
                $detalle = explode("&", $an);


                $cartel = $cartel . $detalle[1] . ': ' . $detalle[0] . 'x (' . $detalle[2] . " x " . $detalle[3] . ") = " . $detalle[4] . "m2<br>";
            endforeach;
        }

        if ($d50) {
            foreach ($d50 as $an):
                $detalle = explode("&", $an);

                $barner = $barner . $detalle[0] . '&' . $detalle[1] . "&" . $detalle[2] . "&" . $detalle[3] . "^";
            endforeach;
        }
        $data2 = array();

        $data2['cartel'] = $cartel;
        $data2['barner'] = $barner;
        $data2['total_pago'] = $this->input->post("total_pago");
        $data2['total_metros'] = $this->input->post("metros");
        $data2['tipo_pago'] = $this->input->post("tipo_pago");
        $data2['total_letra'] = $this->input->post("total");

        $this->Permiso_anuncios_adosados_model->update($this->input->post('ID', TRUE), $data2);
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietarioinmuebledg);

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
        $data['d24'] = $this->input->post("d24");
        $data['d50'] = $this->input->post("d50");
        $data['d19'] = $this->input->post("total");
        $data['tipo_pago'] = $this->input->post("tipo_pago");
        $data['total_pago'] = $this->input->post("total_pago");
        $data['total_p'] = $this->input->post("total_p");
        $data['total_metros'] = $this->input->post("metros");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $this->load->view('documentos/documentoanunciosimplefinalpago_vista1', $data);
    }

}

?>
