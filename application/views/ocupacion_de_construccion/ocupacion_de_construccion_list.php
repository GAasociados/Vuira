<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es"  ng-app="Aplicacion">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <?php $this->load->view('base/head - css'); ?>
    </head>
  <style>
              .btnAyuda{ 
        border-radius: 50px 0px 0px 50px; 
        right: 0px; 
    }
    .btnAyudaForm{border-radius: 50px 0px 0px 50px;                       
    right: 0px;                       
    position: fixed;                       
    bottom: 150px;                       
    z-index: 10;                     
    }
        </style>
    <style>
        .avance-de-obra{
            width: 250px;
        }
    </style>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
          <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <?php $this->load->view('base/header - tramite'); ?>
                    <!-- END HEADER -->
                </div>
            </div>
             <!-- ************INICIO SECCION***************** -->
            <?php
            $modificar = "";
            if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3):
                ?>
                <div class="hidden-xs hidden-xm">
<!--                    <button class="btn btn-warning float btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()">
                        <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4>
                    </button>-->
                </div>
                <?php
                $modificar = "";
            else:
                $modificar = "readonly";
            endif;
            ?>
           <div class="clearfix"></div>
            <div id="page-content">
                <div class="container">
                       <div class="row">
                        <h2>Mis Autorizaciónes de uso de Construcción</h2><br>
                    </div>
                           
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="panel">
                                 <div class="panel-body">
                                    
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
                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166): ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <a class="btn btn-azure glyph-icon icon-arrow-circle-left" href="<?php echo base_url('infotramites/info_autorizacion_ocupacion_construccion') ?>">Regresar</a>
                                    <div class='portlet box blue'>
                                        <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='icon-book-open'></i>
<!--                                                Mis Trámites-->
                                            </div>
                                            <div class='tools'>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                        <tr>
                                            <th>Nombre del Propietario del Inmueble</th>
                                            <th>Núm. de Permiso de Construcción</th>
                                            <th>Documento Final</th>
                                            <th>Mensaje del Funcionario</th>
                                            <th>Estatus</th>
                                            <th></th>
                                        </tr>

                                        <?php
                                        foreach ($ocupacion_de_construccion_data as $ocupacion_de_construccion) {
                                            ?>

                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) { ?>



                                                <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111) { ?>

                                                    <?php if ($ocupacion_de_construccion->notificacion == 1 || $ocupacion_de_construccion->notificacion == 2) { ?>
                                                        <tr class="note note-warning">
                                                        <?php } else { ?>
                                                        <tr>
                                                        <?php } ?>
                                                        <td><?php echo $ocupacion_de_construccion->nombrepropietariodg ?></td>
                                                        <td><?php echo $ocupacion_de_construccion->nocontroldp ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($ocupacion_de_construccion->docsfinal)) {
                                                                echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/construccion/" . $ocupacion_de_construccion->docsfinal . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $ocupacion_de_construccion->mensaje ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($ocupacion_de_construccion->status) {
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
                                                                    echo "Pagado";
                                                                    break;

                                                                default:
                                                                    echo "Terminado";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                            ?>
                                                        </td>


                                                    <?php } elseif ($this->session->userdata('tipo') == 16) { ?>
                                                        <?php if ($ocupacion_de_construccion->requiereverificador == 1) { ?>
                                                            <?php if ($ocupacion_de_construccion->notificacion == 2) { ?>
                                                            <tr class="note note-warning">
                                                            <?php } else { ?>
                                                            <tr>
                                                            <?php } ?>                
                                                            <td><?php echo $ocupacion_de_construccion->nombrepropietariodg ?></td>
                                                            <td><?php echo $ocupacion_de_construccion->nocontroldp ?></td>
                                                            <td>
                                                                <?php
                                                                if (empty($ocupacion_de_construccion->docsfinal)) {
                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";
                                                                } else {
                                                                    echo "<a href='" . base_url() . "assets/tramites/construccion/" . $ocupacion_de_construccion->docsfinal . "'>Descargar<a>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $ocupacion_de_construccion->mensaje ?></td>
                                                            <td>
                                                                <?php
                                                                switch ($ocupacion_de_construccion->status) {
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
                                                                        if ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 1):
                                                                            echo "En Espera De Pago";
                                                                        elseif ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 0):
                                                                            echo "Trámite en espera de Autorización";
                                                                        endif;
                                                                        break;

                                                                    case '5':
                                                                        echo "Pagado";
                                                                        break;

                                                                    default:
                                                                        echo "Terminado";
                                                                        break;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="text-align:center" width="200px">
                                                                <?php
                                                                echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                                ?>
                                                            </td>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if ($ocupacion_de_construccion->verificador == $this->session->userdata('id')) { ?>
                                                            <?php if ($ocupacion_de_construccion->notificacion == 2) { ?>
                                                            <tr class="note note-warning">
                                                            <?php } else { ?>
                                                            <tr>
                                                            <?php } ?><td><?php echo $ocupacion_de_construccion->nombrepropietariodg ?></td>
                                                            <td><?php echo $ocupacion_de_construccion->nocontroldp ?></td>
                                                            <td>
                                                                <?php
                                                                if (empty($ocupacion_de_construccion->docsfinal)) {
                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";
                                                                } else {
                                                                    echo "<a href='" . base_url() . "assets/tramites/construccion/" . $ocupacion_de_construccion->docsfinal . "'>Descargar<a>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $ocupacion_de_construccion->mensaje ?></td>
                                                            <td>
                                                                <?php
                                                                switch ($ocupacion_de_construccion->status) {
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
                                                                        if ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 1):
                                                                            echo "En Espera De Pago";
                                                                        elseif ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 0):
                                                                            echo "Trámite en espera de Autorización";
                                                                        endif;
                                                                        break;

                                                                    case '5':
                                                                        echo "Pagado";
                                                                        break;

                                                                    default:
                                                                        echo "Terminado";
                                                                        break;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td style="text-align:center" width="200px">
                                                                <?php
                                                                echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                                ?>
                                                            </td>
                                                        <?php } ?>      
                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <?php if ($ocupacion_de_construccion->user_id == $this->session->userdata('id')): ?>
                                                        <?php if ($ocupacion_de_construccion->notificacion == 0) { ?>
                                                        <tr class="note note-warning">
                                                        <?php } else { ?>
                                                        <tr>
                                                        <?php } ?>
                                                        <td><?php echo $ocupacion_de_construccion->nombrepropietariodg ?></td>
                                                        <td><?php echo $ocupacion_de_construccion->nocontroldp ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($ocupacion_de_construccion->docsfinal)) {
                                                                echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                            } else {
                                                                if ($ocupacion_de_construccion->status == 6 && $ocupacion_de_construccion->autorizacion == 1 && $ocupacion_de_construccion->valido_pago == 1):
                                                                    echo "<a href='" . base_url() . "assets/tramites/construccion/" . $ocupacion_de_construccion->docsfinal . "'>Descargar<a>";
                                                                else:

                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";

                                                                endif;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $ocupacion_de_construccion->mensaje ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($ocupacion_de_construccion->status) {
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
                                                                    if ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 1):
                                                                        echo "En Espera De Pago";
                                                                    elseif ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 0):
                                                                        echo "Trámite en espera de Autorización";
                                                                    endif;
                                                                    break;

                                                                case '5':
                                                                    echo "Pagado";
                                                                    break;

                                                                default:
                                                                    echo "Terminado";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            if ($ocupacion_de_construccion->status < 4):

                                                                echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');

                                                            elseif ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 1):
                                                                echo anchor(site_url('ocupacion_de_construccion/realizarpago/' . $ocupacion_de_construccion->ID), '<button class="btn btn-success"><i class=""></i>Realizar Pago</button>');
                                                            elseif ($ocupacion_de_construccion->status == 4 && $ocupacion_de_construccion->autorizacion == 0):


                                                            elseif ($ocupacion_de_construccion->status == 5):
                                                            else:

                                                            endif;
                                                            ?>
                                                        </td>
                                                    <?php endif; ?>
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
                                     
                                </div>
                                <!-- END CONTENT -->
                            </div>
                            <!-- END CONTAINER -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <?php $this->load->view('base/footeradmin'); ?>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>

            <div class="quick-nav-overlay">
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->


        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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
        <script src="<?php echo base_url(); ?>assets/js/permisoanuncios/permisoanuncios.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/underscore-min.js" type="text/javascript"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>



    </body>
</html>