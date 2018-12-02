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
        <title>Permiso de Anuncios Auto Soportados</title>
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
                                        <h1>Permiso de Anuncios Auto Soportados</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 8px" id="message">
                                                <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-right">
                                        </div>
                                        <!-- -->

                                        <div class="col-md-3 text-right">
                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122): ?>
                                                <!--
                                                <form action="<?php echo site_url('permiso_anuncios/index'); ?>" class="form-inline" method="get">
                                                  <h4>Buscar Por Estatus</h4>
                                                    <div class="input-group">
                                                        <select class="form-control" name="q">
                                                          <option value = "1">Iniciado</option>
                                                          <option value = "2">En Revisión de Información</option>
                                                          <option value = "3">Trámite en Proceso</option>
                                                          <option value = "4">En Espera de Pago</option>
                                                          <option value = "5">Cancelado</option>
                                                          <option value = "6">Terminado</option>
                                                        </select>
                                                        <span class="input-group-btn">
                                                <?php
                                                if ($q <> '') {
                                                    ?>
                                                                        <!-- <a href="<?php echo site_url('permiso_anuncios'); ?>" class="btn btn-default">Borrar</a> --
                                                    <?php
                                                }
                                                ?>
                                                          <button class="btn btn-primary" type="submit">Buscar</button>
                                                        </span>
                                                    </div>
                                                    <br>
                                                    <a href="<?php echo site_url('permiso_anuncios'); ?>" class="btn btn-success">Mostrar Todos</a>
                                                </form>
                                                -->
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--<h4 class="note note-warning">Si el trámite es actualizado o modificado se mostrará en este color.</h4>-->
                                    <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_autosoportados_azoteas" class="btn btn-primary">Regresar</a>
                                    <div class='portlet box blue'>
                                        <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='icon-book-open'></i>
                                                Mis Trámites
                                            </div>
                                            <div class='tools'>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                        <tr>
                                            <th>Nombre del Propietario del Inmueble</th>
                                            <th>Núm. de Control</th>
                                            <th>Documento Final</th>
                                            <th>Mensaje del Funcionario</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>

                                        <?php
                                        foreach ($permiso_anuncios_data as $permiso_anuncios) {
                                            ?>
                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) { ?>

                                                <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) { ?>
                                                    <?php if ($permiso_anuncios->notificacion == 1) { ?>
                                                        <tr >
                                                    <?php } else { ?>
                                                        <tr>
                                                        <?php } ?>
                                                        <td><?php echo $permiso_anuncios->nombrepropietarioinmuebledg; ?></td>
                                                        <td><?php echo $permiso_anuncios->nocontrol; ?></td>
                                                        <td>
            <?php
            if (empty($permiso_anuncios->doctofinal)) {
                echo "El Documento Final Se Subirá Cuando " .
                "El Proceso Del Trámite Esté Terminado";
            } else {
                echo "<a href='" . base_url() . "assets/tramites/permisosanunciosautosoportados/" . $permiso_anuncios->doctofinal . "'>Descargar<a>";
            }
            ?>
                                                        </td>
                                                        <td><?php echo $permiso_anuncios->mensaje; ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($permiso_anuncios->status) {
                                                                case '1':
                                                                    echo "Iniciado";
                                                                    break;

                                                                case '2':
                                                                    echo "Revisión De Información";
                                                                    break;

                                                                case '3':
                                                                    echo "Trámite en Proceso";
                                                                    break;

                                                                case '4':
                                                                    if ($permiso_anuncios->status == 4 && $permiso_anuncios->autorizacion == 1):
                                                                        echo "En Espera De Pago";
                                                                    elseif ($permiso_anuncios->status == 4 && $permiso_anuncios->autorizacion == 0):
                                                                        echo "Trámite en espera de Autorización";
                                                                    endif;
                                                                    break;

                                                                case '5':
                                                                    echo "Cancelado";
                                                                    break;

                                                                default:
                                                                    echo "Terminado";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            echo anchor(site_url('permiso_anuncios/update_autorizacion/' . $permiso_anuncios->ID), 'Ver Trámite');
                                                            ?>
                                                        </td>
                                                    <?php } elseif ($this->session->userdata('tipo') == 16) { ?>
                                                        <?php if ($permiso_anuncios->requiereverificador == 1) { ?>
                                                            <?php if ($permiso_anuncios->notificacion == 2) { ?>
                                                            <tr class="note note-warning">
                                                            <?php } else { ?>
                                                            <tr>
                <?php } ?>
                                                            <td><?php echo $permiso_anuncios->nombrepropietarioinmuebledg; ?></td>
                                                            <td><?php echo $permiso_anuncios->nocontrol; ?></td>
                                                            <td>
                                                                <?php
                                                                if (empty($permiso_anuncios->doctofinal)) {
                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";
                                                                } else {
                                                                    echo "<a href='" . base_url() . "assets/tramites/permisosanunciosautosoportados/" . $permiso_anuncios->doctofinal . "'>Descargar<a>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $permiso_anuncios->mensaje; ?></td>
                                                            <td>
                                                                <?php
                                                                switch ($permiso_anuncios->status) {
                                                                    case '1':
                                                                        echo "Iniciado";
                                                                        break;

                                                                    case '2':
                                                                        echo "Revisión De Información";
                                                                        break;

                                                                    case '3':
                                                                        echo "Trámite en Proceso";
                                                                        break;

                                                                    case '4':
                                                                        echo "En Espera De Pago";
                                                                        break;

                                                                    case '5':
                                                                        echo "Cancelado";
                                                                        break;

                                                                    default:
                                                                        echo "Terminado";
                                                                        break;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="text-align:center" width="200px">
                                                            <?php
                                                            echo anchor(site_url('permiso_anuncios/update/' . $permiso_anuncios->ID), 'Actualizar');
                                                            ?>
                                                            </td>
                                                        <?php } ?>
                                                    <?php } else { ?>
            <?php if ($permiso_anuncios->verificador == $this->session->userdata('id')) { ?>
                <?php if ($permiso_anuncios->notificacion == 2) { ?>
                                                            <tr class="note note-warning">
                                                                <?php } else { ?>
                                                            <tr>
                                                                <?php } ?>
                                                            <td><?php echo $permiso_anuncios->nombrepropietarioinmuebledg; ?></td>
                                                            <td><?php echo $permiso_anuncios->nocontrol; ?></td>
                                                            <td>
                <?php
                if (empty($permiso_anuncios->doctofinal)) {
                    echo "El Documento Final Se Subirá Cuando " .
                    "El Proceso Del Trámite Esté Terminado";
                } else {
                    echo "<a href='" . base_url() . "assets/tramites/permisosanunciosautosoportados/" . $permiso_anuncios->doctofinal . "'>Descargar<a>";
                }
                ?>
                                                            </td>
                                                            <td><?php echo $permiso_anuncios->mensaje; ?></td>
                                                            <td>
                                                                <?php
                                                                switch ($permiso_anuncios->status) {
                                                                    case '1':
                                                                        echo "Iniciado";
                                                                        break;

                                                                    case '2':
                                                                        echo "Revisión De Información";
                                                                        break;

                                                                    case '3':
                                                                        echo "Trámite en Proceso";
                                                                        break;

                                                                    case '4':
                                                                        echo "En Espera De Pago";
                                                                        break;

                                                                    case '5':
                                                                        echo "Cancelado";
                                                                        break;

                                                                    default:
                                                                        echo "Terminado";
                                                                        break;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="text-align:center" width="200px">
                <?php
                echo anchor(site_url('permiso_anuncios/update/' . $permiso_anuncios->ID), 'Actualizar');
                ?>
                                                            </td>
                                                    <?php } ?>      
        <?php } ?>

    <?php } else { ?>

    <?php } ?>
                                                <!---->
                                            </tr>
    <?php
}
?>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6 text-right">
<?php echo $pagination ?>
                                        </div>
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
