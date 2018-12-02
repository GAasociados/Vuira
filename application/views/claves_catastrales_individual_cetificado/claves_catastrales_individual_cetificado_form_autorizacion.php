<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$identificacion = '';
$rpredial = '';
$nooficial = '';
$identificacionar = '';
$rpredialar = '';
$nooficialar = '';
foreach ($predial->result() as $row) {
    $rpredial .= $row->tipo_documento;
    $rpredialar .= $row->archivo;
}

foreach ($INE->result() as $row) {
    $identificacion .= $row->tipo_documento;
    $identificacionar .= $row->archivo;
}
foreach ($noficial->result() as $row) {
    $nooficial .= $row->tipo_documento;
    $nooficialar .= $row->archivo;
//    die(print_r($row, TRUE));
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Universal Irapuato</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url(); ?>assets/apps/css/dropzone.min.css" rel="stylesheet" type="text/css" />
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
        <link href="<?php echo base_url(); ?>assets/global/css/enjoyhint.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
            label{
                font-size: 12pt;
            }
            h4{
                font-size: 18pt;
            }
            h5{
                font-size: 14pt;
            }
        </style>
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
                                        <h1>Claves Catastrales Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica</h1>
                                    </div>

                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->

                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <br>
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li class="active">
                                            <a data-toggle="tab" class="step" aria-expanded="true">

                                                <b>Clave Catastral Individual Certificado</b><i class="fa fa-check"></i>
                                            </a>
                                        </li>
                                    </ul>

                                    <!--<h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>-->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="bold">Documento Elaborado por:</label><br>
                                                <label><?php echo $func->nombres . " " . $func->apellido_pat . " " . $func->apellido_mat; ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="bold">Fecha de Inicio de trámite</label><br>
                                                <label><?php echo date("d/m/Y", strtotime("" . $fechainicio)); ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="bold">Fecha y Hora de Fin de trámite</label><br>
                                                <label><?php echo date("d/m/Y h:m A", strtotime("" . $fechafinal)); ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="bold">Tiempo desde que inicio el trámite</label><br>



                                                <?php
                                                $dfeha1 = date("Y-m-d");

                                                $dfeha2 = date($fechainicio);

                                                $fecha1 = strtotime($dfeha2);
                                                $fecha2 = strtotime($dfeha1);
                                                $contadordias = 0;
//                                                     echo $claves_catastrales_individual->fechainicio.'<br>';
//                                                            echo $dfeha1.'<br>';
//                                                    echo $dfeha1;
                                                for ($fecha1; $fecha1 <= $fecha2; $fecha1 = strtotime('+1 day ' . date('Y-m-d', $fecha1))) {
                                                    if ((strcmp(date('D', $fecha1), 'Sun') != 0) && (strcmp(date('D', $fecha1), 'Sat') != 0)) {

                                                        $contadordias += 1;
                                                    }
                                                }

                                                if ($contadordias <= 0):
                                                    ?>
                                                    <label style="text-align:center;  background:rgba(44, 181, 44, 0.8);">

                                                        <?php
                                                        echo $contadordias . ' días';
                                                        ?>
                                                    </label>
                                                <?php elseif ($contadordias == 1): ?>
                                                    <label style="text-align:center;  background:rgba(44, 181, 44, 0.8);">
                                                        <?php
                                                        echo $contadordias . ' días';
                                                        ?>
                                                    </label>
                                                <?php elseif ($contadordias == 2): ?>
                                                    <td style="text-align:center; background: rgba(255, 100, 0, 0.8);">
                                                        <?php
                                                        echo $contadordias . ' días';
                                                        ?>
                                                        </label>
                                                    <?php else: ?>
                                                        <label style="text-align:center;  background:rgba(255, 0, 0, 0.7);">
                                                            <?php
                                                            echo $contadordias . ' días';
                                                            ?>
                                                        </label>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <?php
                                        $file = "assets/tramites/clavescatastralesindividualcertificado/" . $doctofinal;
//                                       echo $file;
                                        if (file_exists($file)) {
                                            ?>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <iframe  class="center" src="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctofinal; ?>" width="100%" height="800" frameborder="2"></iframe>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-12">
                                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                    <button type="submit" id="solicitar"class="btn btn-primary"><?php echo $button ?></button>
                                                   <?php if ($this->session->userdata('admin') == 2): ?>
                                                    <a href="<?php echo base_url(); ?>claves_catastrales_individual/validar" class="btn btn-danger">Regresar</a>
                                                <?php else: ?>
                                                    <a href="<?php echo base_url(); ?>claves_catastrales_individual/autorizar" class="btn btn-danger">Regresar</a>
                                                <?php endif; ?>
                                                 

                                                </div>

                                            </div>

                                        <?php } else { ?>
                                            <div class="row">     
                                                <div class="col-md-12 center-align">
                                                    <h4 style="text-align: center;">
                                                        Archivo Final No Encontrado.
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class=" form-group col-md-12">
                                                <?php if ($this->session->userdata('admin') == 2): ?>
                                                    <a href="<?php echo base_url(); ?>claves_catastrales_individual/validar" class="btn btn-danger">Regresar</a>
                                                <?php else: ?>
                                                    <a href="<?php echo base_url(); ?>claves_catastrales_individual/autorizar" class="btn btn-danger">Regresar</a>
                                                <?php endif; ?>
                                            </div>                       
                                        <?php } ?>



                                    </form>
                                    <!-- END PAGE CONTENT INNER -->
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
        <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
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
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>


    </body>
</html>
