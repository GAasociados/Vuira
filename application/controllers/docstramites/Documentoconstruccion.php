<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Documentoconstruccion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Autorizacionocupacionconstruccion_model");
        $this->load->model("Colonias_model");
        $this->load->model("Peritos_model");
    }

    public function index() {
        header("Location:" . base_url());
    }

    public function documento($id = null) {

        $datos = $this->Autorizacionocupacionconstruccion_model->mostrarByRegistry($id);
        $fila = $datos[0];

        //print_r($datos);
        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        //$fila->coloniadg (Id de la Colonia)
        $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);

        $arraycbocolsui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocolsui);

        $arrayperito = $this->Peritos_model->getperitosbyid($fila->nombreperitodp);

        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);

        //print_r($fila);
        //$data = array('apellidomaternosolicitantedg' => $fila->apellidomaternosolicitantedg,'apellidopaternosolicitantedg' => $fila->apellidopaternosolicitantedg,'consulta' => $result,'resultperitos' => $resultperitos,'resultperitosesp' => $resultperitosesp,'nombrepropietariodg' => $fila->nombrepropietariodg,'nombresolicitantedg'=> $fila->nombresolicitantedg,'calledg' => $fila->calledg,'numerodg' =>$fila->numerodg,'correodg' => $fila->correodg,'telefonodg' => $fila->telefonodg,'calleui' => $fila->calleui,'manzanaui' => $fila->manzanaui,'nooficialui'=> $fila->nooficialui,'superficiepredioui' => $fila->superficiepredioui,'superficieconstruidaui'=>$fila->superficieconstruidaui,'superficieconstruirui' => $fila->superficieconstruirui,'bardeoui' => $fila->bardeoui,'nonivelesui' => $fila->nonivelesui,'nocajonesui' => $fila->nocajonesui,'noviviendasui' => $fila->noviviendasui,'porcentajeavanceui' => $fila->porcentajeavanceui,'callenorte' => $fila->callenorte,'callesur' => $fila->callesur,'calleeste' => $fila->calleeste,'calleoeste' => $fila->calleoeste,'noregistroperitodp' => $fila->noregistroperitodp,'telefonoperitodp' => $fila->telefonoperitodp,'noregistroresponsabledp' => $fila->noregistroresponsabledp,'telefonoresponsabledp' => $fila->telefonoresponsabledp,'nodeloteui' => $fila->nodeloteui,'coloniadg' => $fila->coloniadg,'arraycolonia' => $arraycolonia,'arraycbocolsui' => $arraycbocolsui,'cbocolsui' => $fila->cbocolsui,'seccion' => $fila->seccion,'nombreperitodp' => $fila->nombreperitodp,'arrayperito' => $arrayperito,'nombreperitoresponsabledp'=> $fila->nombreperitoresponsabledp,'arrayperitoesp' => $arrayperitoesp,'docsbitacora' => $fila->docsbitacora,'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales,'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico,'ID' => $fila->ID,'apellidopaternopropietariodg' => $fila->apellidopaternopropietariodg, 'apellidomaternopropietariodg' => $fila->apellidomaternopropietariodg,'apellidopaternosolicitantedg' => $fila->apellidopaternosolicitantedg,'apellidomaternosolicitantedg' => $fila->apellidomaternosolicitantedg);
        $data = array('consulta' => $result, 'resultperitos' => $resultperitos, 'resultperitosesp' => $resultperitosesp, 'nombrepropietariodg' => $fila->nombrepropietariodg, 'nombresolicitantedg' => $fila->nombresolicitantedg, 'calledg' => $fila->calledg, 'numerodg' => $fila->numerodg, 'correodg' => $fila->correodg, 'telefonodg' => $fila->telefonodg, 'calleui' => $fila->calleui, 'manzanaui' => $fila->manzanaui, 'nooficialui' => $fila->nooficialui, 'superficiepredioui' => $fila->superficiepredioui, 'superficieconstruidaui' => $fila->superficieconstruidaui, 'superficieconstruirui' => $fila->superficieconstruirui, 'bardeoui' => $fila->bardeoui, 'nonivelesui' => $fila->nonivelesui, 'nocajonesui' => $fila->nocajonesui, 'noviviendasui' => $fila->noviviendasui, 'porcentajeavanceui' => $fila->porcentajeavanceui, 'noregistroperitodp' => $fila->noregistroperitodp, 'telefonoperitodp' => $fila->telefonoperitodp, 'noregistroresponsabledp' => $fila->noregistroresponsabledp, 'telefonoresponsabledp' => $fila->telefonoresponsabledp, 'nodeloteui' => $fila->nodeloteui, 'coloniadg' => $fila->coloniadg, 'arraycolonia' => $arraycolonia, 'arraycbocolsui' => $arraycbocolsui, 'cbocolsui' => $fila->cbocolsui, 'nombreperitodp' => $fila->nombreperitodp, 'arrayperito' => $arrayperito, 'nombreperitoresponsabledp' => $fila->nombreperitoresponsabledp, 'arrayperitoesp' => $arrayperitoesp, 'docsbitacora' => $fila->docsbitacora, 'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales, 'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico, 'ID' => $fila->ID);

        $this->load->view("documentos/documentoterminacionobra", $data);
    }

    public function documentoplantillapago($id = null) {
        $data2 = array();

        $valor = "";
        $concepto = $this->input->post('concepto');
        foreach ($concepto as $con) {
            $valor = $valor . $con . "#";
        }

        $data2['concepto'] = $valor;
        $data2['total_pago'] = $this->input->post("total_pago");
        $data2['total_letras'] = $this->input->post("total_letras");
        $this->Autorizacionocupacionconstruccion_model->update($id, $data2);
        $datos = $this->Autorizacionocupacionconstruccion_model->mostrarByRegistry($id);
        $fila = $datos[0];

        //print_r($datos);
        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        //$fila->coloniadg (Id de la Colonia)
        $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);

        $arraycbocolsui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocolsui);

        $arrayperito = $this->Peritos_model->getperitosbyid($fila->nombreperitodp);

        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);

        //print_r($fila);
        //$data = array('apellidomaternosolicitantedg' => $fila->apellidomaternosolicitantedg,'apellidopaternosolicitantedg' => $fila->apellidopaternosolicitantedg,'consulta' => $result,'resultperitos' => $resultperitos,'resultperitosesp' => $resultperitosesp,'nombrepropietariodg' => $fila->nombrepropietariodg,'nombresolicitantedg'=> $fila->nombresolicitantedg,'calledg' => $fila->calledg,'numerodg' =>$fila->numerodg,'correodg' => $fila->correodg,'telefonodg' => $fila->telefonodg,'calleui' => $fila->calleui,'manzanaui' => $fila->manzanaui,'nooficialui'=> $fila->nooficialui,'superficiepredioui' => $fila->superficiepredioui,'superficieconstruidaui'=>$fila->superficieconstruidaui,'superficieconstruirui' => $fila->superficieconstruirui,'bardeoui' => $fila->bardeoui,'nonivelesui' => $fila->nonivelesui,'nocajonesui' => $fila->nocajonesui,'noviviendasui' => $fila->noviviendasui,'porcentajeavanceui' => $fila->porcentajeavanceui,'callenorte' => $fila->callenorte,'callesur' => $fila->callesur,'calleeste' => $fila->calleeste,'calleoeste' => $fila->calleoeste,'noregistroperitodp' => $fila->noregistroperitodp,'telefonoperitodp' => $fila->telefonoperitodp,'noregistroresponsabledp' => $fila->noregistroresponsabledp,'telefonoresponsabledp' => $fila->telefonoresponsabledp,'nodeloteui' => $fila->nodeloteui,'coloniadg' => $fila->coloniadg,'arraycolonia' => $arraycolonia,'arraycbocolsui' => $arraycbocolsui,'cbocolsui' => $fila->cbocolsui,'seccion' => $fila->seccion,'nombreperitodp' => $fila->nombreperitodp,'arrayperito' => $arrayperito,'nombreperitoresponsabledp'=> $fila->nombreperitoresponsabledp,'arrayperitoesp' => $arrayperitoesp,'docsbitacora' => $fila->docsbitacora,'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales,'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico,'ID' => $fila->ID,'apellidopaternopropietariodg' => $fila->apellidopaternopropietariodg, 'apellidomaternopropietariodg' => $fila->apellidomaternopropietariodg,'apellidopaternosolicitantedg' => $fila->apellidopaternosolicitantedg,'apellidomaternosolicitantedg' => $fila->apellidomaternosolicitantedg);
        $data = array('consulta' => $result, 'resultperitos' => $resultperitos, 'resultperitosesp' => $resultperitosesp, 'nombrepropietariodg' => $fila->nombrepropietariodg, 'nombresolicitantedg' => $fila->nombresolicitantedg, 'calledg' => $fila->calledg, 'numerodg' => $fila->numerodg, 'correodg' => $fila->correodg, 'telefonodg' => $fila->telefonodg, 'calleui' => $fila->calleui, 'manzanaui' => $fila->manzanaui, 'nooficialui' => $fila->nooficialui, 'superficiepredioui' => $fila->superficiepredioui, 'superficieconstruidaui' => $fila->superficieconstruidaui, 'superficieconstruirui' => $fila->superficieconstruirui, 'bardeoui' => $fila->bardeoui, 'nonivelesui' => $fila->nonivelesui, 'nocajonesui' => $fila->nocajonesui, 'noviviendasui' => $fila->noviviendasui, 'porcentajeavanceui' => $fila->porcentajeavanceui, 'noregistroperitodp' => $fila->noregistroperitodp, 'telefonoperitodp' => $fila->telefonoperitodp, 'noregistroresponsabledp' => $fila->noregistroresponsabledp, 'telefonoresponsabledp' => $fila->telefonoresponsabledp, 'nodeloteui' => $fila->nodeloteui, 'coloniadg' => $fila->coloniadg, 'arraycolonia' => $arraycolonia, 'arraycbocolsui' => $arraycbocolsui, 'cbocolsui' => $fila->cbocolsui, 'nombreperitodp' => $fila->nombreperitodp, 'arrayperito' => $arrayperito, 'nombreperitoresponsabledp' => $fila->nombreperitoresponsabledp, 'arrayperitoesp' => $arrayperitoesp, 'docsbitacora' => $fila->docsbitacora, 'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales, 'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico, 'ID' => $fila->ID);
        $data['concepto'] = $valor;
        $data['concepto1'] = "";
        $data['total_pago'] = $this->input->post("total_pago");
        $data['total_letras'] = $this->input->post("total_letras");
        $this->load->view("documentos/documentoterminacionobrapago", $data);
    }

    public function documentoplantillapagofinal($ID) {
        $datos = $this->Autorizacionocupacionconstruccion_model->mostrarByRegistry($ID);
        $fila = $datos[0];



        //print_r($fila);
        $data = array('ID' => $fila->ID, 'nombrepropietariodg' => $fila->nombrepropietariodg);


        $data['concepto'] = $fila->concepto;
        $data['total_letras'] = $this->input->post("d19");
        $data['total_pago'] = $fila->total_pago;
        $data['d12'] = $this->input->post("d12");
        $data['d13'] = $this->input->post("d13");
        $data['d14'] = $this->input->post("d14");
        $data['d15'] = $this->input->post("d15");
        $data['d16'] = $this->input->post("d16");
        $data['d17'] = $this->input->post("d17");
        $data['d18'] = $this->input->post("d18");
//        $data['d19'] = $this->input->post("d19");
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoterminacionobrapagofinal', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download

        $pdfFilePath1 = FCPATH . '/assets/tramites/construccion/' . "file-" . $ID . "-docspago.pdf";
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
        $data2['docspago'] = "file-" . $ID . "-docspago.pdf";

        $this->Autorizacionocupacionconstruccion_model->update($ID, $data2);


        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
    }

    public function documentofinal() {
        $datos = $this->Autorizacionocupacionconstruccion_model->mostrarByRegistry($this->input->post("ID"));
        $fila = $datos[0];

        //print_r($datos);
        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        //$fila->coloniadg (Id de la Colonia)
        $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);

        $arraycbocolsui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocolsui);

        $arrayperito = $this->Peritos_model->getperitosbyid($fila->nombreperitodp);

        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);


        //Recibe Post
        $numoficio = $this->input->post("numoficio");
        $constanciafactibilidad = $this->input->post("constanciafactibilidad");
        $demolicion = $this->input->post("demolicion");
        $demolicionrefrendo = $this->input->post("demolicionrefrendo");
        $permisoconstrucionpreliminares = $this->input->post("permisoconstrucionpreliminares");
        $permisoconstrucionnuevo = $this->input->post("permisoconstrucionnuevo");
        $cambioproyecto = $this->input->post("cambioproyecto");
        $permisosuelo = $this->input->post("permisosuelo");
        $clavecatastral = $this->input->post("clavecatastral");
        $fechaugat = $this->input->post("fechaugat");
        $usoinmueble = $this->input->post("usoinmueble");
        $dictamendenumerooficial = $this->input->post("dictamendenumerooficial");
        $comercial = $this->input->post("comercial");
        $superficieautorizada = $this->input->post("superficieautorizada");
        $superficieautorizadapreliminares = $this->input->post("superficieautorizadapreliminares");
        $niveles = $this->input->post("niveles");
        $concepto1 = $this->input->post("concepto1");
        $uso1 = $this->input->post("uso1");
        $tarifa1 = $this->input->post("tarifa1");
        $superficie1 = $this->input->post("superficie1");
        $subtotal1 = $this->input->post("subtotal1");
        $concepto2 = $this->input->post("concepto2");
        $uso2 = $this->input->post("uso2");
        $tarifa2 = $this->input->post("tarifa2");
        $superficie2 = $this->input->post("superficie2");
        $subtotal2 = $this->input->post("subtotal2");
        $total = $this->input->post("total");
        $texto = $this->input->post("texto");
        //print_r($fila);
        $data = array('texto' => $texto, 'subtotal1' => $subtotal1, 'total' => $total, 'subtotal2' => $subtotal2, 'superficie2' => $superficie2, 'tarifa2' => $tarifa2, 'uso2' => $uso2, 'concepto2' => $concepto2, 'superficie1' => $superficie1, 'tarifa1' => $tarifa1, 'uso1' => $uso1, 'concepto1' => $concepto1, 'niveles' => $niveles, 'superficieautorizadapreliminares' => $superficieautorizadapreliminares, 'superficieautorizada' => $superficieautorizada, 'comercial' => $comercial, 'dictamendenumerooficial' => $dictamendenumerooficial, 'fechaugat' => $fechaugat, 'usoinmueble' => $usoinmueble, 'permisosuelo' => $permisosuelo, 'clavecatastral' => $clavecatastral, 'cambioproyecto' => $cambioproyecto, 'permisoconstrucionnuevo' => $permisoconstrucionnuevo, 'permisoconstrucionpreliminares' => $permisoconstrucionpreliminares, 'demolicionrefrendo' => $demolicionrefrendo, 'demolicion' => $demolicion, 'constanciafactibilidad' => $constanciafactibilidad, 'numoficio' => $numoficio, 'consulta' => $result, 'resultperitos' => $resultperitos, 'resultperitosesp' => $resultperitosesp, 'nombrepropietariodg' => $fila->nombrepropietariodg, 'nombresolicitantedg' => $fila->nombresolicitantedg, 'calledg' => $fila->calledg, 'numerodg' => $fila->numerodg, 'correodg' => $fila->correodg, 'telefonodg' => $fila->telefonodg, 'calleui' => $fila->calleui, 'manzanaui' => $fila->manzanaui, 'nooficialui' => $fila->nooficialui, 'superficiepredioui' => $fila->superficiepredioui, 'superficieconstruidaui' => $fila->superficieconstruidaui, 'superficieconstruirui' => $fila->superficieconstruirui, 'bardeoui' => $fila->bardeoui, 'nonivelesui' => $fila->nonivelesui, 'nocajonesui' => $fila->nocajonesui, 'noviviendasui' => $fila->noviviendasui, 'porcentajeavanceui' => $fila->porcentajeavanceui, 'noregistroperitodp' => $fila->noregistroperitodp, 'telefonoperitodp' => $fila->telefonoperitodp, 'noregistroresponsabledp' => $fila->noregistroresponsabledp, 'telefonoresponsabledp' => $fila->telefonoresponsabledp, 'nodeloteui' => $fila->nodeloteui, 'coloniadg' => $fila->coloniadg, 'arraycolonia' => $arraycolonia, 'arraycbocolsui' => $arraycbocolsui, 'cbocolsui' => $fila->cbocolsui, 'nombreperitodp' => $fila->nombreperitodp, 'arrayperito' => $arrayperito, 'nombreperitoresponsabledp' => $fila->nombreperitoresponsabledp, 'arrayperitoesp' => $arrayperitoesp, 'docsbitacora' => $fila->docsbitacora, 'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales, 'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico, 'ID' => $fila->ID);

        $data['d1'] = $this->input->post("nodoc");
        $data['d2'] = $this->input->post("permiso");
        $data['d3'] = $this->input->post("ubicacion");
        $data['d4'] = $this->input->post("pmd");
        $data['d5'] = $this->input->post("ugat");
        $data['d6'] = $this->input->post("uso");
        $data['d7'] = $this->input->post("clave");
        $data['d8'] = $this->input->post("destino");
        $data['d9'] = $this->input->post("superfice");
        $data['d10'] = $this->input->post("nivel");
        $data['d11'] = $this->input->post("conc");
        $data['d12'] = $this->input->post("concepto");
        $data['d15'] = $this->input->post("maninuta");
        $data['d16'] = $this->input->post("reviso");
        $data['d17'] = $this->input->post("elaboro");
        $data['total_pago'] = $fila->total_pago;
        $data['concepto'] = $fila->concepto;
        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $html = $this->load->view('documentos/documentoterminacionobrafinal', $data, true);

        //$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath1 = FCPATH . '/assets/tramites/construccion/' . "file-" . $this->input->post("ID") . "-docsfinal.pdf";
//load mPDF library
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->load->library('M_pdf');



        //load mPDF library

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



//  //download it.
//        die(print_r($pdfFilePath1));
        //$mpdf = new mPDF('c', 'A4');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output($pdfFilePath, "D");
        // //generate the PDF from the given html

        $this->m_pdf->pdf->WriteHTML($html);
        $this->m_pdf->pdf->Output($pdfFilePath1, "F");
        $this->m_pdf->pdf->Output();
        $data2['docsfinal'] = "file-" . $this->input->post("ID") . "-docsfinal.pdf";

        $this->Autorizacionocupacionconstruccion_model->update($this->input->post("ID"), $data2);


        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
    }

    public function documentofinal_vista() {
        $datos = $this->Autorizacionocupacionconstruccion_model->mostrarByRegistry($this->input->post("ID"));
        $fila = $datos[0];

        //print_r($datos);
        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        //$fila->coloniadg (Id de la Colonia)
        $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($fila->coloniadg);

        $arraycbocolsui = $this->Colonias_model->getalladatacoloniabyid($fila->cbocolsui);

        $arrayperito = $this->Peritos_model->getperitosbyid($fila->nombreperitodp);

        $arrayperitoesp = $this->Peritos_model->getperitosespbyid($fila->nombreperitoresponsabledp);
//          die(print_r($fila->nombreperitodp,true));

        //Recibe Post
        $numoficio = $this->input->post("numoficio");
        $constanciafactibilidad = $this->input->post("constanciafactibilidad");
        $demolicion = $this->input->post("demolicion");
        $demolicionrefrendo = $this->input->post("demolicionrefrendo");
        $permisoconstrucionpreliminares = $this->input->post("permisoconstrucionpreliminares");
        $permisoconstrucionnuevo = $this->input->post("permisoconstrucionnuevo");
        $cambioproyecto = $this->input->post("cambioproyecto");
        $permisosuelo = $this->input->post("permisosuelo");
        $clavecatastral = $this->input->post("clavecatastral");
        $fechaugat = $this->input->post("fechaugat");
        $usoinmueble = $this->input->post("usoinmueble");
        $dictamendenumerooficial = $this->input->post("dictamendenumerooficial");
        $comercial = $this->input->post("comercial");
        $superficieautorizada = $this->input->post("superficieautorizada");
        $superficieautorizadapreliminares = $this->input->post("superficieautorizadapreliminares");
        $niveles = $this->input->post("niveles");
        $concepto1 = $this->input->post("concepto1");
        $uso1 = $this->input->post("uso1");
        $tarifa1 = $this->input->post("tarifa1");
        $superficie1 = $this->input->post("superficie1");
        $subtotal1 = $this->input->post("subtotal1");
        $concepto2 = $this->input->post("concepto2");
        $uso2 = $this->input->post("uso2");
        $tarifa2 = $this->input->post("tarifa2");
        $superficie2 = $this->input->post("superficie2");
        $subtotal2 = $this->input->post("subtotal2");
        $total = $this->input->post("total");
        $texto = $this->input->post("texto");
        //print_r($fila);
//        die(print_r($fila,true));
        $data = array('texto' => $texto, 'subtotal1' => $subtotal1, 'total' => $total, 'subtotal2' => $subtotal2, 'superficie2' => $superficie2, 'tarifa2' => $tarifa2, 'uso2' => $uso2, 'concepto2' => $concepto2, 'superficie1' => $superficie1, 'tarifa1' => $tarifa1, 'uso1' => $uso1, 'concepto1' => $concepto1, 'niveles' => $niveles, 'superficieautorizadapreliminares' => $superficieautorizadapreliminares, 'superficieautorizada' => $superficieautorizada, 'comercial' => $comercial, 'dictamendenumerooficial' => $dictamendenumerooficial, 'fechaugat' => $fechaugat, 'usoinmueble' => $usoinmueble, 'permisosuelo' => $permisosuelo, 'clavecatastral' => $clavecatastral, 'cambioproyecto' => $cambioproyecto, 'permisoconstrucionnuevo' => $permisoconstrucionnuevo, 'permisoconstrucionpreliminares' => $permisoconstrucionpreliminares, 'demolicionrefrendo' => $demolicionrefrendo, 'demolicion' => $demolicion, 'constanciafactibilidad' => $constanciafactibilidad, 'numoficio' => $numoficio, 'consulta' => $result, 'resultperitos' => $resultperitos, 'resultperitosesp' => $resultperitosesp, 'nombrepropietariodg' => $fila->nombrepropietariodg, 'nombresolicitantedg' => $fila->nombresolicitantedg, 'calledg' => $fila->calledg, 'numerodg' => $fila->numerodg, 'correodg' => $fila->correodg, 'telefonodg' => $fila->telefonodg, 'calleui' => $fila->calleui, 'manzanaui' => $fila->manzanaui, 'nooficialui' => $fila->nooficialui, 'superficiepredioui' => $fila->superficiepredioui, 'superficieconstruidaui' => $fila->superficieconstruidaui, 'superficieconstruirui' => $fila->superficieconstruirui, 'bardeoui' => $fila->bardeoui, 'nonivelesui' => $fila->nonivelesui, 'nocajonesui' => $fila->nocajonesui, 'noviviendasui' => $fila->noviviendasui, 'porcentajeavanceui' => $fila->porcentajeavanceui, 'noregistroperitodp' => $fila->noregistroperitodp, 'telefonoperitodp' => $fila->telefonoperitodp, 'noregistroresponsabledp' => $fila->noregistroresponsabledp, 'telefonoresponsabledp' => $fila->telefonoresponsabledp, 'nodeloteui' => $fila->nodeloteui, 'coloniadg' => $fila->coloniadg, 'arraycolonia' => $arraycolonia, 'arraycbocolsui' => $arraycbocolsui, 'cbocolsui' => $fila->cbocolsui, 'nombreperitodp' => $fila->nombreperitodp, 'arrayperito' => $arrayperito, 'nombreperitoresponsabledp' => $fila->nombreperitoresponsabledp, 'arrayperitoesp' => $arrayperitoesp, 'docsbitacora' => $fila->docsbitacora, 'docsplano' => $fila->docsplano, 'docsvbuenofinales' => $fila->docsvbuenofinales, 'docspermisoconstruccion' => $fila->docspermisoconstruccion, 'docsreportefotografico' => $fila->docsreportefotografico, 'ID' => $fila->ID);

        $data['d1'] = "DGDT/DAU/GU/12/" . $this->input->post("nodoc") . "/";
        $data['d2'] = $this->input->post("permiso");
        $data['d3'] = "Calle " . $fila->calledg . " Colonia " . $arraycolonia->NOMBRE . " N° " . $fila->numerodg;
        $data['d4'] = $this->input->post("pmd");
        $data['d5'] = $this->input->post("ugat");
        $data['d6'] = $this->input->post("uso");
        $data['d7'] = $fila->clave;
        $data['d8'] = $this->input->post("destino");
        $data['d9'] = $this->input->post("superfice");
        $data['d10'] = $this->input->post("nivel");
        $data['d11'] = $this->input->post("conc");
        $data['d12'] = $this->input->post("concepto");
        $data['d15'] = $this->input->post("maninuta");
        $data['d16'] = $this->input->post("reviso");
        $data['d17'] = $this->input->post("elaboro");
        $data['total_pago'] = $fila->total_pago;
        $data['concepto'] = $fila->concepto;


        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
        $this->load->view('documentos/documentoterminacionobrafinal_vista', $data);


        //$this->load->view("documentos/documentoterminacionobrafinal",$data);
    }

}

?>
