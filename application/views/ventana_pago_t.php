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
                                                    <h4 class="note note-success">Trámites pendientes a validación de pago</h4>
                                                </div>
                                                <div class="col-md-12">
                                                    <a class="btn btn-primary" href="<?php echo base_url('menu_pago') ?>">Regresar</a>
                                                </div>
                                            </div>  
                                            <?php if ($claves_catastrales_individual_data): ?>
                                                <div class="row">

                                                    <h4 class="bold">Permisos De Anuncios Adosados</h4>
                                                    <div  style=" height: 200px;     overflow-y: auto;">

                                                        <table class="table table-bordered" style="margin-bottom: 10px">
                                                            <tr>
                                                                <th>N° </th>
                                                                <th>Nombre del Propietario</th>
                                                                <th>Recibo Pago</th>
                                                                <th>Acción</th>
                                                            </tr><?php
                                                            foreach ($claves_catastrales_individual_data as $claves_catastrales_individual) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $claves_catastrales_individual->ID ?></td>
                                                                    <td><?php echo $claves_catastrales_individual->nombrepropietarioinmuebledg ?></td>
                                                                    <td style="text-align:center" width="200px">
                                                                        <?php if ($claves_catastrales_individual->compro != ""): ?>
                                                                            <a class="btn btn-xs btn-primary" target="_blank" href="<?php echo base_url('assets/tramites/permisosanunciosadosados/' . $claves_catastrales_individual->compro); ?>"><i class="fa fa-eye"></i> Ver</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td style="text-align:center" width="200px">
                                                                        <a class="btn btn-xs btn-success" onclick="individual('<?php echo $claves_catastrales_individual->ID; ?>', '<?php echo $claves_catastrales_individual->nombrepropietarioinmuebledg; ?>', '<?php echo $claves_catastrales_individual->ID; ?>');"><i class=" fa fa-check-circle-o"></i> Validar pago</a>

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <?php // echo $pagination      ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <?php if ($claves_catastrales_fraccionamiento_data): ?>
                                                <div class="row" >
                                                    <h4 class="bold">Permisos De Anuncios Autosoportados</h4>
                                                    <div  style=" height: 200px;      overflow-y: auto;">
                                                        <table class="table table-bordered" style="margin-bottom: 10px" >
                                                            <tr style="">
                                                                <th>N° </th>
                                                                <th>Nombre del Propietario</th>
                                                                <th>Recibo Pago</th>
                                                                <th>Acción</th>
                                                            </tr>

                                                            <?php
                                                            foreach ($claves_catastrales_fraccionamiento_data as $claves_catastrales_fraccionamiento) {
                                                                ?>

                                                                <tr>
                                                                    <td><?php echo $claves_catastrales_fraccionamiento->ID ?></td>
                                                                    <td><?php echo $claves_catastrales_fraccionamiento->nombrepropietarioinmuebledg ?></td>


                                                                    <td style="text-align:center" width="200px">
                                                                        <?php if ($claves_catastrales_fraccionamiento->compro != ""): ?>
                                                                            <a class="btn btn-xs btn-primary" target="_blank" href="<?php echo base_url('assets/tramites/permisosanunciosautosoportados/' . $claves_catastrales_fraccionamiento->doctopago); ?>"><i class="fa fa-eye"></i> Ver</a>
                                                                        <?php endif; ?>

                                                                    </td>
                                                                    <td style="text-align:center" width="200px">
                                                                        <a class="btn btn-xs btn-success"  onclick="fraccionamiento('<?php echo $claves_catastrales_fraccionamiento->ID; ?>', '<?php echo $claves_catastrales_fraccionamiento->nombrepropietarioinmuebledg; ?>', '<?php echo $claves_catastrales_fraccionamiento->ID; ?>');">Validar pago</a> 
                                                                       <!--<a class="btn btn-xs btn-success" onclick="certificado('<?php echo $claves_catastrales_individual->ID; ?>', '<?php echo $claves_catastrales_individual->nombrepropietariodp; ?>', '<?php echo $claves_catastrales_individual->nocontrol; ?>');">Validar pago</a>-->

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- END PAGE CONTENT INNER -->
                                            <?php endif; ?>
                                            <br>
                                            <br>
                                            <br>

                                            <?php if ($claves_catastrales_individual_certificado_data): ?>
                                                <div class="row">
                                                    <h4 class="bold">Permisos De Terminación de Obra</h4>
                                                    <div  style=" height: 200px;       overflow-y: auto;">

                                                        <table class="table table-bordered" style="margin-bottom: 10px">
                                                            <tr>
                                                                <th>N°</th>
                                                                <th>Nombre del Propietario</th>
                                                                <th>Recibo Pago</th>
                                                                <th>Acción</th>
                                                            </tr><?php foreach ($claves_catastrales_individual_certificado_data as $claves_catastrales_individual): ?>
                                                                <tr>
                                                                    <td><?php echo $claves_catastrales_individual->ID; ?></td>
                                                                    <td><?php echo $claves_catastrales_individual->nombrepropietariodg; ?></td>
                                                                    <td style="text-align:center" width="200px">
                                                                        <?php if ($claves_catastrales_individual->compro != ""): ?>
                                                                            <a class="btn btn-xs btn-primary" target="_blank" href="<?php echo base_url('assets/tramites/construccion/' . $claves_catastrales_individual->compro); ?>"><i class="fa fa-eye"></i> Ver</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td style="text-align:center" width="200px">
                                                                        <a class="btn btn-xs btn-success" onclick="certificado('<?php echo $claves_catastrales_individual->ID; ?>', '<?php echo $claves_catastrales_individual->nombrepropietariodg; ?>', '<?php echo $claves_catastrales_individual->ID; ?>');">Validar pago</a>

                                                                    </td>

                                                                </tr>
                                                            <?php endforeach; ?>                                                      
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <?php // echo $pagination       ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

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
                <div class="page-wrapper-bottom ">
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
                                                                            text: "¿Esta seguro de validar el pago de " + nombre + " con número de seguimiento " + seg + " ?",
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
                                                                                            location.href = '<?php echo base_url(); ?>permiso_anuncios/vpago/' + id;
                                                                                        }
                                                                                        , 500);
                                                                                    } else {
//                                                                                        swal("");
                                                                                    }
                                                                                });
//                                          
                                                                    }
                                                                    function individual(id, nombre, seg) {
                                                                        swal({
                                                                            title: "Aviso",
                                                                            text: "¿Esta seguro de validar el pago de " + nombre + " con número de seguimiento " + seg + " ?",
                                                                            icon: "warning",
                                                                            buttons: true,
                                                                            dangerMode: true,
                                                                        })
                                                                                .then((willDelete) => {
                                                                                    if (willDelete) {
                                                                                        swal({
                                                                                            icon: "success",
                                                                                        });
                                                                                        setTimeout(function () {
                                                                                            location.href = '<?php echo base_url(); ?>permiso_anuncios_adosados/vpago/' + id;
                                                                                        }
                                                                                        , 500);
                                                                                    } else {
//                                                                                        swal("");
                                                                                    }
                                                                                });
//                                          
                                                                    }
                                                                    function certificado(id, nombre, seg) {
                                                                        swal({
                                                                            title: "Aviso",
                                                                            text: "¿Esta seguro de validar el pago de " + nombre + " con número de seguimiento " + seg + " ?",
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
                                                                                            location.href = '<?php echo base_url(); ?>ocupacion_de_construccion/vpago/' + id;
                                                                                        }
                                                                                        , 500);
                                                                                    } else {
//                                                                                        swal("");
                                                                                    }
                                                                                });
//                                          
                                                                    }

    </script>
</html>
