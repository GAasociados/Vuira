<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <link href="<?php echo base_url(); ?>assets/apps/css/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/css/enjoyhint.css" rel="stylesheet" type="text/css" />

    <!-- END HEAD -->
    <style>
        label {
            font-size: 13pt;
        }
    </style>
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
                                        <h1>Permisos Anuncios Adosados</h1>
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

                                                <b>Realize su pago para el trámite de Permisos de Anuncios Adosados</b>
                                            </a>
                                        </li>
                                    </ul>
                                    <h3 class="block bold">Identificación y Ubicación del Inmueble</h3>
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <input type="hidden" name="ID" value="<?php echo $ID;?>">
                                        <div class="row">
                                            <div  class="form-group" >

                                                <div id="paso8" class="col-md-4 col-xs-12">
                                                    <h4 class="bold" for="varchar">Nombre del Propietario </h4>
                                                    <label><?php echo $nombrepropietarioanunciodg; ?></label>
                                                </div>

                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div  class="form-group" >
                                                <div class="col-md-6 col-xs-12" >
                                                    <h4 class="bold" >Dirección</h4>
                                                    <?php 
                                                    $resulta = $this->Colonias_model->getalladatacoloniabyidpredial($coloniadg);
//                                                    die(print_r($resulta,true));
                                                    ?>
                                                    <label><?php echo "Calle: " . $calleui; ?><?php echo $nooficialui != "" ? ", N° Ext " . $nooficialui : ""; ?><?php echo $coloniadg != "" ?" Comunidad/Colonia/Fraccionamiento: ".ucfirst(strtolower($resulta->NOMBRE)):""; ?>


                                                       </label>
                                                </div>
                                            
                                             
                                            </div>
                                        </div>
                                     
                                        <div class="row" >
                                            <div class="form-group">
                                                
                                                       <div class=" form-group col-md-2 col-xs-12">
                                                           <br>
                                                           <br>
                                                        <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                    <a class="btn btn-success" href="<?php echo base_url() . "permiso_anuncios_adosados/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                <?php endif; ?>
                                                
                                                </div>
                                           
                                                <div class=" form-group col-md-6 col-xs-12">
                                                    <br>
                                                    <h4 class="bold">Ó Descargue su recibo para pago en caja de tesorería</h4>
                                                    <?php if ($doctopago): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $doctopago; ?>">Descargar Documento</a>
                                                    <?php else: ?>
                                                        <label>Documento No Adjunto</label>
                                                    <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>
                                         <div class="row" >
                                                <div class=" form-group col-md-4 col-xs-12">
                                                    <h4 class="bold">Adjunte su comprobante de pago </h4>
                                                     <?php if (!empty($compro)): ?>
                                                    <input type="file" multiple name="compro[]" />
                                                    <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $compro; ?>">Descargar Comprobante</a>
                                                    <?php else: ?>
                                                        
                                                        <input type="file" multiple name="compro[]" />
                                                        
                                                    <?php endif; ?>
                                                </div>
                                            
                                      
                                       
                                            <div class=" form-group col-md-2">
                                                <br>
                                                <br>
                                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                <button type="submit" id="solicitar" class="btn btn-primary"><?php echo $button ?></button>
                                                  </div>
                                             <div class=" form-group col-md-2">
                                                 <br>
                                                 <br>
                                                <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                                    <a href="<?php echo base_url(); ?>permiso_anuncios_adosados" class="btn btn-primary">Regresar</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>permiso_anuncios_adosados" class="btn btn-primary">Regresar</a>
                                                <?php } ?>
                                         
                                             </div>

                                        </div>
                                    </form>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>

                                <!-- END PAGE CONTENT BODY -->
                                <!-- END CONTENT BODY -->
                            </div>
                            <!-- END CONTENT -->
                        </div>
                        <!-- END CONTAINER -->
                    </div>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>       
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
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

    </body>
</html>