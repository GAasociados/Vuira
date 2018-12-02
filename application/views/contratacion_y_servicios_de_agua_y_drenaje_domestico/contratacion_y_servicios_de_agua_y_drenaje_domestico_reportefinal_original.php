<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js">
<![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Única Irapuato</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <?php $this->load->view('base/header'); ?>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container-fluid">

                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>Tablero de Reportes</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class='portlet box blue'>
                                        <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='icon-book-open'></i>
                                                Reporte
                                            </div>
                                            <div class='tools'>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>contratacion_y_servicios_de_agua_y_drenaje_domestico/reportes" class="btn btn-primary">Regresar</a>
                                    <div class="table-scrollable">

                                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 10px">
                                            <tr>
                                                <th>Inicio del Trámite</th>
                                                <th>Término del Trámite</th>
                                                <th>Solicitud</th>
                                                <th>Nombre del Solicitante</th>
                                                <th>Colonia</th>
                                                <th>Calle</th>
                                                <th>Núm. Exterior</th>
                                                <th>Núm. Interior</th>
                                                <th>Calle de Referencia 1</th>
                                                <th>Calle de Referencia 2</th>
                                                <th>Cuenta con Conexción</th>
                                                <th>Cuenta con Medidor</th>
                                                <th>Número de Medidor</th>
                                                <th>Lectura de Medidor</th>
                                                <th>Observaciones del Ciudadano</th>
                                                <th>Nombre del Propietario</th>
                                                <th>RFC</th>
                                                <th>Colonia del Propietario</th>
                                                <th>Calle del Propietario</th>
                                                <th>Número Exterior</th>
                                                <th>Número Interior</th>
                                                <th>Teléfono</th>
                                                <th>Celular</th>
                                                <th>Correo</th>
                                                <th>Giro o Actividad</th>
                                                <th>Tipo de Servicio</th>
                                                <th>Servicios con los que Cuenta</th>
                                                <th>Servicios que Solicita</th>
                                                <th>Condiciones Generales</th>
                                                <th>Cuenta Ligada</th>
                                                <th>Diametro de la Toma</th>
                                                <th>Inicio de Facturación</th>
                                                <th>Documento Predial</th>
                                            
                                                <th>Documento (IFE,INE,Cédula Profecional)</th>
                                                <th>Documento Pago</th>
                                                <th>Documento Final</th>
                                                <th>Estatus</th>
                                            </tr><?php
                                            foreach ($contratacion_y_servicios_de_agua_y_drenaje_domestico_data as $contratacion_y_servicios_de_agua_y_drenaje_domestico) {
                                                if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->fechainicio == "0000-00-00") {
                                                                echo "El trámite aún no ha Iniciado";
                                                            } else {
                                                                echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->fechainicio;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->fechafinal == "0000-00-00") {
                                                                echo "El trámite aún no ha finalizado";
                                                            } else {
                                                                echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->fechafinal;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->solicitud; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombre; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->coloniaubicacion; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->calle; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numeroext; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numeroint; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->callereferencia1; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->callereferencia2; ?></td>
                                                        <td>
                                                            <?php echo ($contratacion_y_servicios_de_agua_y_drenaje_domestico->conexion) ? "Si" : "No";
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($contratacion_y_servicios_de_agua_y_drenaje_domestico->medidor) ? "Si" : "No";
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nomedidor; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->lectura; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->observaciones; ?></td>
                                                        <td><?php
                                                            echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombrepropietario . " " . $contratacion_y_servicios_de_agua_y_drenaje_domestico->apaterno . " " . $contratacion_y_servicios_de_agua_y_drenaje_domestico->amaterno;
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->rfc; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->coloniapropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->callepropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numeroextpropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numerointpropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->telefono; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nocelular; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->correo; ?></td>
                                                        <td>Casa Habitación</td>
                                                        <td><?php
                                                            echo ($contratacion_y_servicios_de_agua_y_drenaje_domestico->tiposervicio) ? "Doméstico" : "Mixto(Casa con Comercio)";
                                                            ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->servicioscuenta) {
                                                                case '1':
                                                                    echo "Agua";
                                                                    break;

                                                                case '2':
                                                                    echo "Drenaje";
                                                                    break;

                                                                case '3':
                                                                    echo "Ambos Servicios";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->serviciossolicita) {
                                                                case '1':
                                                                    echo "Agua";
                                                                    break;

                                                                case '2':
                                                                    echo "Drenaje";
                                                                    break;

                                                                case '3':
                                                                    echo "Ambos Servicios";
                                                                    break;

                                                                default:
                                                                    echo "Ninguno";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->condicionesgenerales) {
                                                                case '1':
                                                                    echo "Habitado";
                                                                    break;

                                                                case '2':
                                                                    echo "Deshabitado";
                                                                    break;

                                                                case '3':
                                                                    echo "Obra Negra";
                                                                    break;

                                                                default:
                                                                    echo "Lote Baldio";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->cuentaligada; ?></td>
                                                        <td>1/2</td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->iniciofacturacion; ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopredial)) {
                                                                echo "Sin Archivo";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopredial . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>
                                                      
                                                        <td>
                                                            <?php
                                                            if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctoife)) {
                                                                echo "Sin Archivo";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $contratacion_y_servicios_de_agua_y_drenaje_domestico->doctoife . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopago)) {
                                                                echo "Sin Archivo";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopago . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->status == 6):
                                                                echo anchor(site_url('docstramites/documentojapami/documentofinal/' . $contratacion_y_servicios_de_agua_y_drenaje_domestico->ID), 'Descargar Contrato');
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->status) {

                                                                case '1':
                                                                    echo "Iniciado";
                                                                    break;

                                                                case '4':
                                                                    echo "Termindado y En Espera de Pago";
                                                                    break;
                                                                case '5':
                                                                    echo "Cancelado";

                                                                case '6':
                                                                    echo "Terminado";
                                                                    break;
                                                                default :
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT BODY -->
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->
                </div>
                <!-- END CONTAINER -->
            </div>
        </div>
        <div class="page-wrapper-row">
            <div class="page-wrapper-bottom">
                <!-- BEGIN FOOTER -->
                <!-- BEGIN INNER FOOTER -->
                <?php $this->load->view('base/footer'); ?>
                <!-- END INNER FOOTER -->
                <!-- END FOOTER -->
            </div>
        </div>
    </div>
    <div class="quick-nav-overlay"></div>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

</body>
</html>
