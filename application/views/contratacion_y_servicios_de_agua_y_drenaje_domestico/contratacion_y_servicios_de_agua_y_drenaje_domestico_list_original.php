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

              
                  <h4 class="note note-warning">Si el trámite es actualizado o modificado se mostrará en este color.</h4>
                  <a href="<?php echo base_url(); ?>infotramites/info_agua_y_drenaje_domestico" class="btn btn-primary">Regresar</a>
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
                      <th>Nombre del Propietario</th>
                      <th>Nombre del Solicitante</th>
                      <th>Mensaje</th>
                      <th>Documento Final</th>
                      <th>Estatus</th>
                        <th>Fecha de creación</th>
                          <th>Fecha de última modificación</th>
                      <th>Acción</th>
                    </tr><?php
                    foreach ($contratacion_y_servicios_de_agua_y_drenaje_domestico_data as $contratacion_y_servicios_de_agua_y_drenaje_domestico)
                    {
                      if($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133){
                       ?>
                       <?php if($contratacion_y_servicios_de_agua_y_drenaje_domestico->notificacion == 1){ ?>
                       <tr class="note note-warning">
                       <?php } else { ?>
                       <tr> 
                         <?php }?>
                         <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombrepropietario ?></td>
                         <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombre ?></td>
                         <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->mensaje ?></td>
                         <td>
                           <?php if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctofinal)) {
                             echo "El Documento Final Se Subirá Cuando ".
                             "El Proceso Del Trámite Esté Terminado";
                           }else{
                             echo "<a href='".base_url()."assets/tramites/serviciosdeaguaydrenaje/".$contratacion_y_servicios_de_agua_y_drenaje_domestico->doctofinal."'>Descargar<a>";
                           } ?>

                         </td>
                         <td>
                           <?php switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->status) {

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
                                                                                    echo "Terminado y en espera de pago";
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
                                $aux = explode("-",$contratacion_y_servicios_de_agua_y_drenaje_domestico->fechainicio);
                                $aux1 = explode("-",$contratacion_y_servicios_de_agua_y_drenaje_domestico->fechafinal);
                              ?>
                            <?php echo $aux[2]."/".$aux[1]."/".$aux[0];?>
                        </td>
                         <td style="text-align:center" width="200px">
                            <?php echo $aux1[2]."/".$aux1[1]."/".$aux1[0];?>
                        </td>
                         <td style="text-align:center" width="200px">
                           <?php
                                               //echo anchor(site_url('permiso_anuncios_adosados/read/'.$permiso_anuncios_adosados->ID),'Read');
                                               //echo ' | ';
                           echo anchor(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/update/'.$contratacion_y_servicios_de_agua_y_drenaje_domestico->ID),'Actualizar');
                           ?>
                         </td>
                       </tr>
                       <?php
                     }
                     else{
                      if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->usuarioID == $this->session->userdata("id")) {
                        ?>
                        <?php if($contratacion_y_servicios_de_agua_y_drenaje_domestico->notificacion == 0){ ?>
                        <tr class="note note-warning">
                        <?php } else { ?>
                        <tr>
                          <?php }?>
                         <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombrepropietario ?></td>
                         <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombre ?></td>
                         <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->mensaje ?></td>
                         <td>
                           <?php if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctofinal)) {
                             echo "El Documento Final Se Subirá Cuando ".
                             "El Proceso Del Trámite Esté Terminado";
                           }else{
                             echo "<a href='".base_url()."assets/tramites/serviciosdeaguaydrenaje/".$contratacion_y_servicios_de_agua_y_drenaje_domestico->doctofinal."'>Descargar<a>";
                           } ?>

                         </td>
                         <td>
                          <?php switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->status) {

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
                                                                                   echo "Terminado y en Espera de pago";
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
                                $aux = explode("-",$contratacion_y_servicios_de_agua_y_drenaje_domestico->fechainicio);
                                $aux1 = explode("-",$contratacion_y_servicios_de_agua_y_drenaje_domestico->fechafinal);
                              ?>
                            <?php echo $aux[2]."/".$aux[1]."/".$aux[0];?>
                        </td>
                         <td style="text-align:center" width="200px">
                            <?php echo $aux1[2]."/".$aux1[1]."/".$aux1[0];?>
                        </td>
                        <td style="text-align:center" width="200px">
                          <?php
                                    if($contratacion_y_servicios_de_agua_y_drenaje_domestico->status <4 ):
                          echo anchor(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/update/'.$contratacion_y_servicios_de_agua_y_drenaje_domestico->ID),'Actualizar');
                                    elseif($contratacion_y_servicios_de_agua_y_drenaje_domestico->status==4):
                                        echo anchor(site_url('contratacion_y_servicios_de_agua_y_drenaje_domestico/recibopago/'.$contratacion_y_servicios_de_agua_y_drenaje_domestico->ID),'Vista Pago');
                                    elseif($contratacion_y_servicios_de_agua_y_drenaje_domestico->status==6):
                                        echo anchor(site_url('docstramites/documentojapami/documentofinal/'.$contratacion_y_servicios_de_agua_y_drenaje_domestico->ID),'Descargar Contrato');
                                    
                                    endif;
                          ?>
                        </td>
                      </tr>
                      <?php
                    }
                  }
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
