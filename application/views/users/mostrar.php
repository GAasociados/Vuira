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
            <title>Mostrar Usuarios</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
            <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
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
                                    <div class="page-head">
                                        <div class="container-fluid">
                                            <!-- BEGIN PAGE TITLE -->
                                            <div class="page-title">
                                                <h1>Mostrar Usuarios</h1>
                                            </div>
                                            <!-- END PAGE TITLE -->
                                        </div>
                                    </div>
                                    <!-- END PAGE HEAD-->
                                    <!-- BEGIN PAGE CONTENT BODY -->
                                    <div class="page-content">
                                        <div class="container-fluid">
                                            <!-- BEGIN PAGE CONTENT INNER -->
                                            <div class="page-content-inner">
                                                <div>

                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label visible-ie8 visible-ie9">Buscar</label>
                                                                <div class="input-icon">
                                                                    <i class="fa fa-search font-blue"></i>
                                                                    <input type="text" class="form-control" id="buscar" placeholder="Buscar por Apellido">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                       <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Mostrar Todos</label>
                                                            <div class="input-icon">
                                                                <button type="button" class="btn btn-primary btn-circle" id="btnbuscar" value="Mostrar Todo" data-toggle='modal' data-target='#basicModal'> Mostrar Todos los Registros &nbsp;<i class="fa fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="listaUsuarios">

                                            </div>
                                        </div>
                                    </div>
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

                <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script> 
        <script src="<?php echo base_url();?>assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>assets/js/user/user.js" type="text/javascript"></script>
    </body>

    </html>