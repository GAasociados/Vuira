<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autorizacionocupacionconstruccion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Colonias_model");
        $this->load->model("Autorizacionocupacionconstruccion_model");
        $this->load->model("Peritos_model");
        $this->load->library('zip');
    }

    public function index() {
        $result = $this->Colonias_model->getcolonias();
        $resultperitos = $this->Peritos_model->getperitos();
        $resultperitosesp = $this->Peritos_model->getperitosespecializados();

        $data = array('consulta' => $result, 'resultperitos' => $resultperitos, 'resultperitosesp' => $resultperitosesp);

        $this->load->view("tramites/autorizacionocupacionconstruccion", $data);
    }

    public function reportes() {
        $this->load->view('ocupacion_construccion/ocupacion_construccion_reportes');
    }

    public function reportefinal() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);

        $ocupacion_construccion = $this->Autorizacionocupacionconstruccion_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status);

        $data = array(
            'ocupacion_construccion_data' => $ocupacion_construccion,
                  'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );
        //print_r($data);
        $this->load->view('ocupacion_construccion/ocupacion_construccion_reportefinal', $data);
    }

    public function reportespdf() {
        $fechainicio = $this->input->post('fechainicio', TRUE);
        $fechafinal = $this->input->post('fechafinal', TRUE);
        $status = $this->input->post('status', TRUE);
        $nombrepropietario = $this->input->post('nombrepropietario', TRUE);

        $ocupacion_construccion = $this->Autorizacionocupacionconstruccion_model->get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status);
        
        $data = array(
            'ocupacion_construccion_data' => $ocupacion_construccion,
                         'fechainicio' => $this->input->post('fechainicio', TRUE),
            'fechafinal' => $this->input->post('fechafinal', TRUE),
            'status' => $this->input->post('status', TRUE),
            'nombrepropietario' => $this->input->post('nombrepropietario', TRUE),
        );
//        die(print_r($data));
        //print_r($data);
        $html = $this->load->view('documentos/reporteocupacionconstruccion', $data, true);

//$html="asdf";
//this the the PDF filename that user will get to download
        $pdfFilePath1 = "ReportePermisos.pdf";

//load mPDF library
        $this->load->library('M_pdf');
//$mpdf = new mPDF('c', 'A4');
//$mpdf->WriteHTML($html);
//$mpdf->Output($pdfFilePath, "D");
// //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

//  //download it.
        $this->m_pdf->pdf->Output();
    }

    public function savetram() {
        if ($this->input->is_ajax_request()) {

            $nombrepropietariodg = $this->input->post("nombrepropietariodg");
            $apellidopaternopropietariodg = $this->input->post("apellidopaternopropietariodg");
            $apellidomaternopropietariodg = $this->input->post("apellidomaternopropietariodg");

            $nombresolicitantedg = $this->input->post("nombresolicitantedg");
            $apellidopaternosolicitantedg = $this->input->post("apellidopaternosolicitantedg");
            $apellidomaternosolicitantedg = $this->input->post("apellidomaternosolicitantedg");

            $calledg = $this->input->post("calledg");
            $numerodg = $this->input->post("numerodg");
            $coloniadg = $this->input->post("coloniadg");
            $correodg = $this->input->post("correodg");
            $telefonodg = $this->input->post("telefonodg");

            $calleui = $this->input->post("calleui");
            $nodeloteui = $this->input->post("nodeloteui");
            $manzanaui = $this->input->post("manzanaui");
            $nooficialui = $this->input->post("nooficialui");
            $cbocolsui = $this->input->post("cbocolsui");
            $superficiepredioui = $this->input->post("superficiepredioui");
            $superficieconstruidaui = $this->input->post("superficieconstruidaui");
            $superficieconstruirui = "";
            $bardeoui = $this->input->post("bardeoui");
            $nonivelesui = $this->input->post("nonivelesui");
            $nocajonesui = $this->input->post("nocajonesui");
            $noviviendasui = $this->input->post("noviviendasui");
            $porcentajeavanceui = $this->input->post("porcentajeavanceui");

            $nombreperitodp = $this->input->post("nombreperitodp");
            $noregistroperitodp = $this->input->post("noregistroperitodp");
            $telefonoperitodp = $this->input->post("telefonoperitodp");
            $nombreperitoresponsabledp = $this->input->post("nombreperitoresponsabledp");
            $noregistroresponsabledp = $this->input->post("noregistroresponsabledp");
            $telefonoresponsabledp = $this->input->post("telefonoresponsabledp");
            $periodopermiso = $this->input->post("periodopermiso");
            $fechainiciodp = "";
            $fechaterminodp = "";
            $fechaentregadp = "";
            $nocontroldp = $this->input->post("nocontroldp");

            $callenorte = $this->input->post("callenorte");
            $callesur = $this->input->post("callesur");
            $calleeste = $this->input->post("calleeste");
            $calleoeste = $this->input->post("calleoeste");
            $seccion = $this->input->post("seccion");
            $status = $this->input->post("status");

            if (true) {

                $maxnum = $this->Autorizacionocupacionconstruccion_model->getMaxItemByid();

                //print_r($maxnum[0]->maximo);

                $maxnumbd = $maxnum[0]->maximo;
                if (empty($maxnumbd)) {
                    $maxnumbd = 1;
                } else {
                    $maxnumbd = $maxnumbd + 1;
                }

                //Tamaño Maximo de los Archivos 20 Megas
                $configzip = $config['max_size'] = "21504";
                $this->load->library("upload", $configzip);
                $variablefile = $_FILES;

                //print_r($_FILES['docsbitacora']);

                if (!empty($_FILES['docsbitacora']['tmp_name'][0])) {
                    $numfiles = count($_FILES['docsbitacora']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsbitacora']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsbitacora']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsbitacora.zip')) {
                        $docsbitacora = "file-" . $maxnumbd . "-docsbitacora.zip";
                    }
                    $this->zip->clear_data();
                } else {
                    $docsbitacora = "";
                }

                //++++++++++++++++++Planos Actualizados++++++++++++++++

                if (!empty($_FILES['docsplano']['tmp_name'][0])) {
                    $numfiles = count($_FILES['docsplano']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsplano']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsplano']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsplano.zip')) {
                        $docsplano = "file-" . $maxnumbd . "-docsplano.zip";
                    }
                    $this->zip->clear_data();
                } else {
                    $docsplano = "";
                }

                //+++++++++++++++++++++++++Vistos Buenos finales++++++++++++++++++++++++++++++++

                if (!empty($_FILES['docsvbuenofinales']['tmp_name'][0])) {
                    $numfiles = count($_FILES['docsvbuenofinales']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsvbuenofinales']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsvbuenofinales']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsvbuenofinales.zip')) {
                        $docsvbuenofinales = "file-" . $maxnumbd . "-docsvbuenofinales.zip";
                    }
                    $this->zip->clear_data();
                } else {
                    $docsvbuenofinales = "";
                }

                //++++++++++++++++++++Permiso de Construcción vigente+++++++++++++++++++++++++++

                if (!empty($_FILES['docspermisoconstruccion']['tmp_name'][0])) {
                    $numfiles = count($_FILES['docspermisoconstruccion']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docspermisoconstruccion']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docspermisoconstruccion']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"

                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspermisoconstruccion.zip')) {
                        $docspermisoconstruccion = "file-" . $maxnumbd . "-docspermisoconstruccion.zip";
                    }
                    $this->zip->clear_data();
                } else {
                    $docspermisoconstruccion = "";
                }


                //++++++++++++++++++++++++++Reporte Fotográfico++++++++++++++++++++++++++++++++

                if (!empty($_FILES['docsreportefotografico']['tmp_name'][0])) {
                    $numfiles = count($_FILES['docsreportefotografico']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsreportefotografico']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsreportefotografico']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsreportefotografico.zip')) {
                        $docsreportefotografico = "file-" . $maxnumbd . "-docsreportefotografico.zip";
                    }
                    $this->zip->clear_data();
                } else {
                    $docsreportefotografico = "";
                }

                //++++++++++++++++++++++++++Documento Orden de Pago++++++++++++++++++++++++++++++++

                if (!empty($_FILES['docspago']['tmp_name'][0])) {
                    $numfiles = count($_FILES['docspago']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docspago']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docspago']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspago.zip')) {
                        $docspago = "file-" . $maxnumbd . "-docspago.zip";
                    }
                    $this->zip->clear_data();
                } else {
                    $docspago = "";
                }

                $data = array('nombrepropietariodg' => $nombrepropietariodg, 'apellidopaternopropietariodg' => $apellidopaternopropietariodg, 'apellidomaternopropietariodg' => $apellidomaternopropietariodg, 'apellidopaternosolicitantedg' => $apellidopaternosolicitantedg, 'apellidomaternosolicitantedg' => $apellidomaternosolicitantedg, 'nombresolicitantedg' => $nombresolicitantedg, 'calledg' => $calledg, 'numerodg' => $numerodg, 'coloniadg' => $coloniadg, 'correodg' => $correodg, 'telefonodg' => $telefonodg, 'calleui' => $calleui, 'nodeloteui' => $nodeloteui, 'manzanaui' => $manzanaui, 'nooficialui' => $nooficialui, 'cbocolsui' => $cbocolsui, 'superficiepredioui' => $superficiepredioui, 'superficieconstruidaui' => $superficieconstruidaui, 'superficieconstruirui' => $superficieconstruirui, 'bardeoui' => $bardeoui, 'nonivelesui' => $nonivelesui, 'nocajonesui' => $nocajonesui, 'noviviendasui' => $noviviendasui, 'porcentajeavanceui' => $porcentajeavanceui, 'nombreperitodp' => $nombreperitodp, 'noregistroperitodp' => $noregistroperitodp, 'telefonoperitodp' => $telefonoperitodp, 'nombreperitoresponsabledp' => $nombreperitoresponsabledp, 'noregistroresponsabledp' => $noregistroresponsabledp, 'telefonoresponsabledp' => $telefonoresponsabledp, 'periodopermiso' => $periodopermiso, 'fechainiciodp' => $fechainiciodp, 'fechaterminodp' => $fechaterminodp, 'fechaentregadp' => $fechaentregadp, 'nocontroldp' => $nocontroldp, 'docsbitacora' => $docsbitacora, 'docsplano' => $docsplano, 'docsvbuenofinales' => $docsvbuenofinales, 'docspermisoconstruccion' => $docspermisoconstruccion, 'docsreportefotografico' => $docsreportefotografico, 'docspago' => $docspago, 'callenorte' => $callenorte, 'callesur' => $callesur, 'calleeste' => $calleeste, 'calleoeste' => $calleoeste, 'seccion' => $seccion, 'status' => $status);

                $res = $this->Autorizacionocupacionconstruccion_model->savetrams($data);

                if ($res == true) {

                    $this->load->library('email');
                    $config['protocol'] = 'smtp';
                    $config['smtp_port'] = '465';
                    $config['smtp_host'] = 'mail.naturalmentefuerte.com';
                    $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
                    $config['smtp_pass'] = 'u3g0Xy0aR6';
                    $config['mailtype'] = 'html';

                    /////////Mensaje del Funcionario a Ciudadano///////////////
                    $this->email->from('mariela.lugo@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                    $this->email->to($this->input->post('correodg')); //Correo del ciudadano
                    $this->email->subject('Aviso de Terminación de Obra.');
                    $this->email->message('Su solicitud del trámite Aviso de Terminación de Obra ha sido recibida con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.');
                    $this->email->send();
                    /////////Mensaje del Ciudadano a Funcionario///////////////
                    $this->email->from($this->input->post('correodg'), 'Ventanilla Universal de trámites y servicios de Irapuato');
                    $this->email->to('jcabreramendiola@gmail.com'); //Correo de Mariela
                    $this->email->subject('Aviso de Terminación de Obra.');
                    $this->email->message('Usted tiene un nuevo trámite Aviso de Terminación de Obra para poder revisar la solicitud del tramite entre a http://naturalmentefuerte.com/vuira/.');
                    $this->email->send();

                    echo true;
                } else {
                    echo false;
                }
            } else {
                echo "Complete todos los campos para continuar con el trámite";
            }
        } else {
            show_404();
        }
    }

    public function updatetram() {
        if ($this->input->is_ajax_request()) {

            $ID = $this->input->post("ID");

            $nombrepropietariodg = $this->input->post("nombrepropietariodg");
            $apellidopaternopropietariodg = $this->input->post("apellidopaternopropietariodg");
            $apellidomaternopropietariodg = $this->input->post("apellidomaternopropietariodg");

            $nombresolicitantedg = $this->input->post("nombresolicitantedg");
            $apellidopaternosolicitantedg = $this->input->post("apellidopaternosolicitantedg");
            $apellidomaternosolicitantedg = $this->input->post("apellidomaternosolicitantedg");

            $calledg = $this->input->post("calledg");
            $numerodg = $this->input->post("numerodg");
            $coloniadg = $this->input->post("coloniadg");
            $correodg = $this->input->post("correodg");
            $telefonodg = $this->input->post("telefonodg");

            $calleui = $this->input->post("calleui");
            $nodeloteui = $this->input->post("nodeloteui");
            $manzanaui = $this->input->post("manzanaui");
            $nooficialui = $this->input->post("nooficialui");
            $cbocolsui = $this->input->post("cbocolsui");
            $superficiepredioui = $this->input->post("superficiepredioui");
            $superficieconstruidaui = $this->input->post("superficieconstruidaui");
            $superficieconstruirui = "";
            $bardeoui = $this->input->post("bardeoui");
            $nonivelesui = $this->input->post("nonivelesui");
            $nocajonesui = $this->input->post("nocajonesui");
            $noviviendasui = $this->input->post("noviviendasui");
            $porcentajeavanceui = $this->input->post("porcentajeavanceui");

            $nombreperitodp = $this->input->post("nombreperitodp");
            $noregistroperitodp = $this->input->post("noregistroperitodp");
            $telefonoperitodp = $this->input->post("telefonoperitodp");
            $nombreperitoresponsabledp = $this->input->post("nombreperitoresponsabledp");
            $noregistroresponsabledp = $this->input->post("noregistroresponsabledp");
            $telefonoresponsabledp = $this->input->post("telefonoresponsabledp");
            $periodopermiso = $this->input->post("periodopermiso");
            $fechainiciodp = "";
            $fechaterminodp = "";
            $fechaentregadp = "";
            $nocontroldp = $this->input->post("nocontroldp");

            $callenorte = $this->input->post("callenorte");
            $callesur = $this->input->post("callesur");
            $calleeste = $this->input->post("calleeste");
            $calleoeste = $this->input->post("calleoeste");
            $seccion = $this->input->post("seccion");
            $status = $this->input->post("status");


            /* Nombre Archivos Guardados */

            $inpdocsbitacora = $this->input->post("inpdocsbitacora");
            $inpdocsdocsplano = $this->input->post("inpdocsdocsplano");
            $inpdocsvbuenofinales = $this->input->post("inpdocsvbuenofinales");
            $inpdocspermisoconstruccion = $this->input->post("inpdocspermisoconstruccion");
            $inpdocsreportefotografico = $this->input->post("inpdocsreportefotografico");
            $inpdocspago = $this->input->post("inpdocspago");

            $maxnumbd = $ID;

            if (true) {
                //Tamaño Maximo de los Archivos 20 Megas
                $configzip = $config['max_size'] = "21504";
                $this->load->library("upload", $configzip);
                $variablefile = $_FILES;

                //print_r($_FILES['docsbitacora']);

                $banderabitacora = 0;
                if (!empty($inpdocsbitacora)) {
                    $banderabitacora = 1;
                }

                if (!empty($_FILES['docsbitacora']['tmp_name'][0])) {

                    $banderabitacora = 1;

                    $numfiles = count($_FILES['docsbitacora']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsbitacora']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsbitacora']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsbitacora.zip')) {
                        $docsbitacora = "file-" . $maxnumbd . "-docsbitacora.zip";
                        $consultabitacora = $docsbitacora;
                    }
                    $this->zip->clear_data();
                } else {
                    //$docsbitacora = "";
                    $consultabitacora = "";
                }

                $banderadocsplano = 0;
                if (!empty($inpdocsdocsplano)) {
                    $banderadocsplano = 1;
                }

                //+++++++++++++++++++++++++Planos Actualizados++++++++++++++++++++++++++++++++++

                if (!empty($_FILES['docsplano']['tmp_name'][0])) {
                    /*
                      if(!empty($inpdocsdocsplano)){
                      $ruta = "./assets/tramites/construccion/".$inpdocsdocsplano;
                      unlink($ruta);
                      }
                     */
                    $banderadocsplano = 1;

                    $numfiles = count($_FILES['docsplano']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsplano']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsplano']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsplano.zip')) {
                        $docsplano = "file-" . $maxnumbd . "-docsplano.zip";
                        $consultaplano = $docsplano;
                    }
                    $this->zip->clear_data();
                } else {
                    $consultaplano = "";
                }


                $banderavistobueno = 0;
                if (!empty($inpdocsvbuenofinales)) {
                    $banderavistobueno = 1;
                }

                //+++++++++++++++++++++++++Vistos Buenos finales++++++++++++++++++++++++++++++++

                if (!empty($_FILES['docsvbuenofinales']['tmp_name'][0])) {
                    $banderavistobueno = 1;

                    $numfiles = count($_FILES['docsvbuenofinales']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsvbuenofinales']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsvbuenofinales']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsvbuenofinales.zip')) {
                        $docsvbuenofinales = "file-" . $maxnumbd . "-docsvbuenofinales.zip";
                        $consultavbuenofinales = $docsvbuenofinales;
                    }
                    $this->zip->clear_data();
                } else {
                    $consultavbuenofinales = "";
                }

                $banderapermisoconst = 0;
                if (!empty($inpdocspermisoconstruccion)) {
                    $banderapermisoconst = 1;
                }

                //++++++++++++++++++++Permiso de Construcción vigente+++++++++++++++++++++++++++

                if (!empty($_FILES['docspermisoconstruccion']['tmp_name'][0])) {
                    $banderapermisoconst = 1;
                    $numfiles = count($_FILES['docspermisoconstruccion']['tmp_name']);

                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docspermisoconstruccion']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docspermisoconstruccion']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspermisoconstruccion.zip')) {
                        $docspermisoconstruccion = "file-" . $maxnumbd . "-docspermisoconstruccion.zip";
                        $consultapermisoconstruccion = $docspermisoconstruccion;
                    }
                    $this->zip->clear_data();
                } else {
                    $consultapermisoconstruccion = "";
                }

                $banderareportefoto = 0;
                if (!empty($inpdocsreportefotografico)) {
                    $banderareportefoto = 1;
                }

                //++++++++++++++++++++++++++Reporte Fotográfico++++++++++++++++++++++++++++++

                if (!empty($_FILES['docsreportefotografico']['tmp_name'][0])) {
                    $banderareportefoto = 1;
                    $numfiles = count($_FILES['docsreportefotografico']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsreportefotografico']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsreportefotografico']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsreportefotografico.zip')) {
                        $docsreportefotografico = "file-" . $maxnumbd . "-docsreportefotografico.zip";
                        $consultareportefotografico = $docsreportefotografico;
                    }
                    $this->zip->clear_data();
                } else {
                    $consultareportefotografico = "";
                }

                $banderareportepago = 0;
                if (!empty($inpdocspago)) {
                    $banderareportepago = 1;
                }

                //++++++++++++++++++++++++++Reporte PAGO++++++++++++++++++++++++++++++

                if (!empty($_FILES['docspago']['tmp_name'][0])) {
                    $banderareportefoto = 1;
                    $numfiles = count($_FILES['docspago']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docspago']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docspago']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspago.zip')) {
                        $docspago = "file-" . $maxnumbd . "-docspago.zip";
                        $consultareportepago = $docspago;
                    }
                    $this->zip->clear_data();
                } else {
                    $consultareportepago = "";
                }

                $numerodocs = $banderapermisoconst + $banderareportefoto + $banderavistobueno + $banderadocsplano + $banderabitacora;

                if ($numerodocs >= 5) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $data = array('nombrepropietariodg' => $nombrepropietariodg, 'nombresolicitantedg' => $nombresolicitantedg, 'calledg' => $calledg, 'numerodg' => $numerodg, 'coloniadg' => $coloniadg, 'correodg' => $correodg, 'telefonodg' => $telefonodg, 'calleui' => $calleui, 'nodeloteui' => $nodeloteui, 'manzanaui' => $manzanaui, 'nooficialui' => $nooficialui, 'cbocolsui' => $cbocolsui, 'superficiepredioui' => $superficiepredioui, 'superficieconstruidaui' => $superficieconstruidaui, 'superficieconstruirui' => $superficieconstruirui, 'bardeoui' => $bardeoui, 'nonivelesui' => $nonivelesui, 'nocajonesui' => $nocajonesui, 'noviviendasui' => $noviviendasui, 'porcentajeavanceui' => $porcentajeavanceui, 'nombreperitodp' => $nombreperitodp, 'noregistroperitodp' => $noregistroperitodp, 'telefonoperitodp' => $telefonoperitodp, 'nombreperitoresponsabledp' => $nombreperitoresponsabledp, 'noregistroresponsabledp' => $noregistroresponsabledp, 'telefonoresponsabledp' => $telefonoresponsabledp, 'periodopermiso' => $periodopermiso, 'fechainiciodp' => $fechainiciodp, 'fechaterminodp' => $fechaterminodp, 'fechaentregadp' => $fechaentregadp, 'nocontroldp' => $nocontroldp, 'docsbitacora' => $consultabitacora, 'docsplano' => $consultaplano, 'docsvbuenofinales' => $consultavbuenofinales, 'docspermisoconstruccion' => $consultapermisoconstruccion, 'docsreportefotografico' => $consultareportefotografico, 'docspago' => $consultareportepago, 'callenorte' => $callenorte, 'callesur' => $callesur, 'calleeste' => $calleeste, 'calleoeste' => $calleoeste, 'seccion' => $seccion, 'status' => $status, 'ID' => $ID, 'apellidopaternopropietariodg' => $apellidopaternopropietariodg, 'apellidomaternopropietariodg' => $apellidomaternopropietariodg, 'apellidopaternosolicitantedg' => $apellidopaternosolicitantedg, 'apellidomaternosolicitantedg' => $apellidomaternosolicitantedg);

                $res = $this->Autorizacionocupacionconstruccion_model->updatetrams($data);
                //echo $res;

                if ($res == true) {
                    $this->load->library('email');
                    $config['protocol'] = 'smtp';
                    $config['smtp_port'] = '465';
                    $config['smtp_host'] = 'mail.naturalmentefuerte.com';
                    $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
                    $config['smtp_pass'] = 'u3g0Xy0aR6';
                    $config['mailtype'] = 'html';

                    /////////Mensaje del Funcionario a Ciudadano///////////////
                    $this->email->from('mariela.lugo@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                    $this->email->to($this->input->post('correodg')); //Correo del ciudadano
                    $this->email->subject('Aviso de Terminación de Obra.');
                    $this->email->message('Su solicitud del trámite Aviso de Terminación de Obra ha sido actualizada con éxito; un funcionario revisará la información en horas hábiles y le mantendrá informado por correo electrónico.');
                    $this->email->send();
                    /////////Mensaje del Ciudadano a Funcionario///////////////
                    $this->email->from($this->input->post('correodg'), 'Ventanilla Universal de trámites y servicios de Irapuato');
                    $this->email->to('jcabreramendiola@gmail.com'); //Correo de Mariela
                    $this->email->subject('Aviso de Terminación de Obra.');
                    $this->email->message('Usted tiene un trámite que revisar a nombre de ' . $nombrepropietariodg . ' ' . $apellidopaternopropietariodg . ' ' . $apellidomaternopropietariodg . 'para poder revisar la solicitud del tramite entre a http://naturalmentefuerte.com/vuira/.');
                    $this->email->send();

                    echo true;
                } else {
                    echo false;
                }
            } else {
                echo "Complete todos los campos para continuar con el trámite";
                //echo $maxnum;
                /*
                  echo $inpdocsbitacora."<br>";
                  echo $inpdocsdocsplano."<br>";
                  echo $inpdocsvbuenofinales."<br>";
                  echo $inpdocspermisoconstruccion."<br>";


                  $numerodocs = $banderapermisoconst + $banderareportefoto + $banderavistobueno + $banderadocsplano + $banderabitacora;
                  echo "La suma = ".$numerodocs;
                 */
            }
        } else {
            show_404();
        }
    }

    public function updatetramfuncionario() {
        if ($this->input->is_ajax_request()) {
            $ID = $this->input->post("ID");
            $periodopermiso = "";
            $nocontroldp = $this->input->post("nocontroldp");
            $fechainiciodp = "";
            $fechaterminodp = "";
            $mensaje = $this->input->post("mensaje");
            $status = $this->input->post("status");

            $maxnumbd = $ID;

            if (true) {
                //Tamaño Maximo de los Archivos 20 Megas
                $configzip = $config['max_size'] = "21504";
                $this->load->library("upload", $configzip);
                $variablefile = $_FILES;

                //print_r($_FILES['docsbitacora']);

                if (!empty($_FILES['docsfinal']['tmp_name'][0])) {
                    //echo "Entra al IF<br>";

                    $numfiles = count($_FILES['docsfinal']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docsfinal']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docsfinal']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docsfinal.zip')) {

                        $docsfinal = "file-" . $maxnumbd . "-docsfinal.zip";

                        //echo "Guarda Docs Final como ".$docsfinal."<br>";
                        //$consultabitacora = $docsfinal;
                    }
                    $this->zip->clear_data();
                } else {
                    //$docsbitacora = "";
                    $docsfinal = "";
                    //echo "No hay Docs Final <br>";
                }

                // ++++++++++++++++++++++++++Reporte PAGO++++++++++++++++++++++++++++++

                if (!empty($_FILES['docspago']['tmp_name'][0])) {
                    $banderareportefoto = 1;
                    $numfiles = count($_FILES['docspago']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['docspago']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['docspago']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-docspago.zip')) {
                        $docspago = "file-" . $maxnumbd . "-docspago.zip";
                        $consultareportepago = $docspago;
                    }
                    $this->zip->clear_data();
                } else {
                    $docspago = "";
                }


                //++++++++++++++++++++++++++Reporte Verificador++++++++++++++++++++++++++++++
                if (!empty($_FILES['doctoverificador']['tmp_name'][0])) {
                    $banderareportefoto = 1;
                    $numfiles = count($_FILES['doctoverificador']['tmp_name']);
                    //Documentos Bitacora
                    for ($i = 0; $i < $numfiles; $i++) {
                        $path = $variablefile['doctoverificador']['tmp_name'][$i];
                        $this->zip->read_file($path, $variablefile['doctoverificador']['name'][$i]);
                    }
                    //Write the zip file to a folder on your server. Name it "my_backup.zip"
                    if ($this->zip->archive('./assets/tramites/construccion/file-' . $maxnumbd . '-doctoverificador.zip')) {
                        $doctoverificador = "file-" . $maxnumbd . "-doctoverificador.zip";
                        //$consultareportepago = $docspago;
                    }
                    $this->zip->clear_data();
                } else {
                    $doctoverificador = "";
                }


                $this->load->library('email');
                $config['protocol'] = 'smtp';
                $config['smtp_port'] = '465';
                $config['smtp_host'] = 'mail.naturalmentefuerte.com';
                $config['smtp_user'] = 'prueba@naturalmentefuerte.com';
                $config['smtp_pass'] = 'u3g0Xy0aR6';
                $config['mailtype'] = 'html';

                /////////Mensaje del Funcionario a Ciudadano///////////////
                $this->email->from('mariela.lugo@irapuato.gob.mx', 'Ventanilla Universal de trámites y servicios de Irapuato');
                $this->email->to($this->input->post('correodg')); //Correo del ciudadano
                $this->email->subject('Aviso de Terminación de Obra.');

                if ($status == 3) {
                    $this->email->message('Su solicitud del trámite Aviso de Terminación de Obra ha sido terminado');
                } elseif ($status == 4) { //Cancelado
                    $this->email->message('Su solicitud del trámite Aviso de Terminación de Obra ha sido cancelado');
                } else {
                    $this->email->message('Su solicitud del trámite Aviso de Terminación de Obra requiere las siguientes acciones: ' . $this->input->post("mensaje") . ' favor de realizar los cambios correspondientes para continuar con el trámite.');
                }
                $this->email->send();

                $data = array('ID' => $ID, 'periodopermiso' => $periodopermiso, 'nocontroldp' => $nocontroldp, 'fechainiciodp' => $fechainiciodp, 'fechaterminodp' => $fechaterminodp, 'mensaje' => $mensaje, 'status' => $status, 'docsfinal' => $docsfinal, 'docspago' => $docspago, 'doctoverificador' => $doctoverificador);

                $res = $this->Autorizacionocupacionconstruccion_model->updatetramsfuncionario($data);
                //echo $res;

                if ($res == true) {
                    echo true;
                } else {
                    echo false;
                }
            } else {
                echo "Complete todos los campos para continuar con el trámite";
            }
        } else {
            show_404();
        }
    }

}

?>
