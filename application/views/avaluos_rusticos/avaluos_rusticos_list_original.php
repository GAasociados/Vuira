<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php  ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Ventanilla Única Irapuato</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url();?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url();?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
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

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 8px" id="message">
                                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-right">
                                        </div>
                                    </div>
                              <h4 class="note note-warning">Si alguno de sus trámites se encuentra en este color, significa solicitud nueva o modificada.</h4>
                              
                              <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_avaluos_rusticos" class="btn btn-primary">Regresar</a>               
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
                                  <th>Nombre del Solicitante</th>
                                  <th>Nombre del Propietario</th>
                                  <th>Mensaje</th>
                                  <th>Documento Final</th>
                                  <th>Estatus</th>
                                  <th>Acción</th>
                              </tr><?php
                              foreach ($avaluos_rusticos_data as $avaluos_rusticos)
                              {
                                if($this->session->userdata('tipo') == 14){
                       ?>
                                <?php if($avaluos_rusticos->notificacion == 1){ ?>
                                <tr class="note note-primary">
                                <?php }else { ?>
                                <tr>
                                  <?php } ?>
                                 <td><?php echo $avaluos_rusticos->nombresolicitante ?></td>
                                 <td><?php echo $avaluos_rusticos->nombrepropietario ?></td>
                                 <td><?php echo $avaluos_rusticos->mensaje ?></td>
                                 <td>
                                     <?php if (empty($avaluos_rusticos->documentofinal)) {
                                       echo "El Documento Final Se Subirá Cuando ".
                                       "El Proceso Del Trámite Esté Terminado";
                                   }else{
                                       echo "<a href='".base_url()."assets/tramites/avaluosrusticos/".$avaluos_rusticos->documentofinal."'>Descargar<a>";
                                   } ?>
                               </td>
                               <td>
                                 <?php switch ($avaluos_rusticos->status) {
                                   case '1':
                                   echo "Iniciado";
                                   break;

                                   case '2':
                                   echo "En Proceso";
                                   break;

                                   case '3':
                                   echo "Terminado";
                                   break;

                                   default:
                                   echo "Cancelado";
                                   break;
                               }
                               ?>
                           </td>
                           <td style="text-align:center" width="200px">
                            <?php

                            echo anchor(site_url('avaluos_rusticos/update/'.$avaluos_rusticos->ID),'Actualizar');

                            ?>
                        </td>
                    </tr>
                    <?php
                }
                else{
                      if ($avaluos_rusticos->usuarioID == $this->session->userdata("id")) {
                        ?>
                        <?php if($avaluos_rusticos->notificacion == 0){ ?>
                        <tr class="note note-warning">
                        <?php }else { ?>
                        <tr>
                          <?php } ?>
                                 <td><?php echo $avaluos_rusticos->nombresolicitante ?></td>
                                 <td><?php echo $avaluos_rusticos->nombrepropietario ?></td>
                                 <td><?php echo $avaluos_rusticos->mensaje ?></td>

                                 <td>
                                     <?php if (empty($avaluos_rusticos->documentofinal)) {
                                       echo "El Documento Final Se Subirá Cuando ".
                                       "El Proceso Del Trámite Esté Terminado";
                                   }else{
                                       echo "<a href='".base_url()."assets/tramites/avaluosrusticos/".$avaluos_rusticos->documentofinal."'>Descargar<a>";
                                   } ?>

                               </td>
                               <td>
                                 <?php switch ($avaluos_rusticos->status) {
                                   case '1':
                                   echo "Iniciado";
                                   break;

                                   case '2':
                                   echo "En Proceso";
                                   break;

                                   case '3':
                                   echo "Terminado";
                                   break;

                                   default:
                                   echo "Cancelado";
                                   break;
                               }
                               ?>
                           </td>
                           <td style="text-align:center" width="200px">
                            <?php echo anchor(site_url('avaluos_rusticos/update/'.$avaluos_rusticos->ID),'Actualizar');
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
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
