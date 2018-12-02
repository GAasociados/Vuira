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
                        <h2>Mis Permisos de Anuncios Adosado</h2><br>
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

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 8px" id="message">
                                                <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-right">
                                        </div>
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
                                    <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_adosados_rotulados" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
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
                                            <th>Documento  Final</th>
                                            <th>Mensaje</th>
                                            <th>Número de Control</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr><?php
                                        foreach ($permiso_anuncios_adosados_data as $permiso_anuncios_adosados) {
                                            if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                                                ?>
                                                <?php if ($permiso_anuncios_adosados->notificacion == 1) { ?>
                                                    <tr class="note note-warning">
                                                    <?php } else { ?>
                                                    <tr>
                                                    <?php } ?>
                                                    <td><?php echo $permiso_anuncios_adosados->nombrepropietarioinmuebledg ?></td>
                                                    <td>
                                                        <?php
                                                            if (empty($permiso_anuncios_adosados->doctofinal)) {
                                                              
                                                            } else {
                                                                  if ($permiso_anuncios_adosados->autorizacion != 1 && $permiso_anuncios_adosados->status != 6):
                                                                   
                                                                else:
                                                                    if ($permiso_anuncios_adosados->autorizacion == 1 && $permiso_anuncios_adosados->status == 6):
                                                                          echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
                                                                    else:
                                                                       
                                                                    endif;
                                                                endif;
                                                                
                                                            }
                                                            ?>
                                                    </td>
                                                    <td><?php echo $permiso_anuncios_adosados->mensaje ?></td>
                                                    <td><?php echo $permiso_anuncios_adosados->nocontrol ?></td>
                                                    <td>
                                                        <?php
                                                        switch ($permiso_anuncios_adosados->status) {
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
                                                         if ($permiso_anuncios_adosados->status == 4 && $permiso_anuncios_adosados->autorizacion == 1):
                                                                        echo "En Espera De Pago";
                                                                    elseif ($permiso_anuncios_adosados->status == 4 && $permiso_anuncios_adosados->autorizacion == 0):
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
                                                        //echo anchor(site_url('permiso_anuncios_adosados/read/'.$permiso_anuncios_adosados->ID),'Read');
                                                        //echo ' | ';
                                                        echo anchor(site_url('permiso_anuncios_adosados/update/' . $permiso_anuncios_adosados->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                if ($permiso_anuncios_adosados->usuarioID == $this->session->userdata("id")) {
                                                    ?>
                                                    <?php if ($permiso_anuncios_adosados->notificacion == 0) { ?>
                                                        <tr class="note note-warning">
                                                        <?php } else { ?>
                                                        <tr>
                                                        <?php } ?>
                                                        <td><?php echo $permiso_anuncios_adosados->nombrepropietarioinmuebledg ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($permiso_anuncios_adosados->doctofinal)) {
                                                                echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                            } else {
                                                                  if ($permiso_anuncios_adosados->autorizacion != 1 && $permiso_anuncios_adosados->status != 6):
                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";
                                                                else:
                                                                    if ($permiso_anuncios_adosados->autorizacion == 1 && $permiso_anuncios_adosados->status == 6 && $permiso_anuncios_adosados->valido_pago == 1):
                                                                          echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
                                                                    else:
                                                                        echo "El Documento Final Se Subirá Cuando " .
                                                                        "El Proceso Del Trámite Esté Terminado";
                                                                    endif;
                                                                endif;
                                                                
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $permiso_anuncios_adosados->mensaje ?></td>
                                                        <td><?php echo $permiso_anuncios_adosados->nocontrol ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($permiso_anuncios_adosados->status) {
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
                                                                     if ($permiso_anuncios_adosados->status == 4 && $permiso_anuncios_adosados->autorizacion == 1):
                                                                        echo "En Espera De Pago";
                                                                    elseif ($permiso_anuncios_adosados->status == 4 && $permiso_anuncios_adosados->autorizacion == 0):
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
                                                            if ($permiso_anuncios_adosados->status < 4):
                                                                echo anchor(site_url('permiso_anuncios_adosados/update/' . $permiso_anuncios_adosados->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                                           elseif ($permiso_anuncios_adosados->status == 4 && $permiso_anuncios_adosados->autorizacion == 1):
                                                                echo anchor(site_url('permiso_anuncios_adosados/realizarpago/' . $permiso_anuncios_adosados->ID), '<button class="btn btn-success"><i class=""></i>Realizar Pago</button>');
                                                            elseif ($permiso_anuncios_adosados->status == 4 && $permiso_anuncios_adosados->autorizacion == 0):

                                                                
                                                            elseif ($permiso_anuncios_adosados->status == 6 && $permiso_anuncios_adosados->doctofinal !="" ):
                                                                echo "<a href='" . base_url() . "assets/tramites/permisosanunciosautosoportados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
                                                            endif;


//                                    echo anchor(site_url('permiso_anuncios_adosados/update/'.$permiso_anuncios_adosados->ID),'Actualizar');
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </table>
                                    <!-- END PAGE CONTENT INNER -->
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