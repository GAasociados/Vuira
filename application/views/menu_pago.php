<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php ?>
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

                            <?php
                            $correcto = $this->session->flashdata('correcto');
                            if ($correcto) {
                                ?>
                                <div class='note note-success'>
                                    <span class='alert-heading ' style=''><b><?= $correcto ?></b></span>
                                </div>


                                <?php
                            }
                            ?>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-container">
                                <!-- BEGIN CONTENT -->
                                <div class="page-content-wrapper">
                                    <!-- BEGIN CONTENT BODY -->
                                    <!-- BEGIN PAGE HEAD-->
                                    <div class="page-head">
                                        <div class="container-fluid">
                                            <!-- BEGIN PAGE TITLE -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <h4 class="note note-success"><b>Trámites a validación de pago</b></h4>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 text-center">
                                                    <a href="<?php echo base_url() . 'vista_pago'; ?>">
                                                        <img src="<?php echo base_url(); ?>assets/images/Catastropa.png" alt="CatastroIndividual" class="logo-default" style="width: 60%; height: 100%; margin: 1%;">
                                                    </a>
                                                </div>
                                                <div class="col-md-6 text-center ">
                                                    <a href="<?php echo base_url() . 'vitas_pagot'; ?>">
                                                        <img  src="<?php echo base_url(); ?>assets/images/Territorial.png" alt="CatastroFraccionamiento" class="logo-default" style="width: 60%; height: 100%; margin: 1%;">
                                                    </a>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT BODY -->
                                    <!-- END CONTENT BODY -->
                                </div>
                                <!-- END CONTENT -->
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
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
    <script>
        function fraccionamiento(id, nombre, seg) {
            swal({
                title: "Aviso",
                text: "¿Esta seguro de validar el pago de " + nombre + " con numero de seguimiento " + seg + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("!", {
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.href = '<?php echo base_url(); ?>/claves_catastrales_fraccionamiento/vpago/' + id;
                            }
                            , 1000);
                        } else {
//                                                                                        swal("");
                        }
                    });
//                                          
        }
        function individual(id, nombre, seg) {
            swal({
                title: "Aviso",
                text: "¿Esta seguro de validar el pago de " + nombre + " con numero de seguimiento " + seg + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("!", {
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.href = '<?php echo base_url(); ?>/claves_catastrales_fraccionamiento/'
                            }
                            , 1000);
                        } else {
//                                                                                        swal("");
                        }
                    });
//                                          
        }
        function certificado(id, nombre, seg) {
            swal({
                title: "Aviso",
                text: "¿Esta seguro de validar el pago de " + nombre + " con numero de seguimiento " + seg + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("!", {
                                icon: "success",
                            });
                            setTimeout(function () {
                                location.href = '<?php echo base_url(); ?>/claves_catastrales_fraccionamiento/'
                            }
                            , 1000);
                        } else {
//                                                                                        swal("");
                        }
                    });
//                                          
        }

    </script>
</html>
