<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">

        <title> Tramites y Servicios </title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!--#region CSS  -->
        <?php $this->load->view('base/admin'); ?>
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
    </head>


    <body>
        <!-- <div id="sb-site"> -->
        <div id="baseUrl" base-url=""></div>
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- FIN loading -->

        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                <div id="mobile-navigation">
                    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar">
                        <span></span>
                    </button>
                    <a href="" class="logo-content-small" title="SIPREG"></a>
                </div>
                <div id="header-logo" class="logo-bg">
                    <a href="" class="logo-content-big" title="SIPREG">
                        SIPREG
                        <span>Sistema Integral de Planeación de Recursos Gubernamentales</span>
                    </a>
                    <a href="" class="logo-content-small" title="SIPREG">
                        SIPREG
                        <span>Sistema Integral de Planeación de Recursos Gubernamentales</span>
                    </a>
                    <a id="close-sidebar" href="#" title="Close sidebar">
                        <i class="glyph-icon icon-angle-left"></i>
                    </a>
                </div>


                <!-- #header-nav-right -->

                <div id="header-nav-right">
                    <div class=" dropdown user-account-btnn">
                        <a href="#" title="Soy Administrador" class="user-profile " data-toggle="dropdown">
                            <img width="28" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/image-resources/gravatar.jpg" alt="Administrador">
                        </a>
                        <div class="dropdown-menu ">
                            <div class="box-sm">
                                <div class="login-box clearfix">
                                    <div class="user-img">
                                        <a href="#" title="" class="change-img">Cambiar foto</a>
                                        <img src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/image-resources/gravatar.jpg" alt="">
                                    </div>
                                    <div class="user-info">
                                        <span>
                                            Soy Administrador
                                            <i>DTI Desarrollador</i>
                                        </span>
                                        <a href="#" title="Editar perfíl">Perfíl</a>
                                        <a href="#" title="Ver Notificaciones">Notificaciones</a>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="pad5A button-pane button-pane-alt text-center">
                                    <a href="logout/" class="btn display-block font-normal btn-danger">
                                        <i class="glyph-icon icon-power-off"></i>
                                        Salir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="hdr-btn iconos" id="fullscreen-btn" title="Pantalla completa">
                        <i class="glyph-icon icon-arrows-alt"></i>
                    </a>

                    <a class="header-btn iconos" id="logout-btn"href="logout/" title="Bloquear">
                        <i class="glyph-icon icon-linecons-lock"></i>
                    </a>

                </div>
                <!-- #header-nav-right -->

            </div>
        </div>
        <!-- FIN page-wrapper -->
        <!--#region Menú  -->
        <div id="page-sidebar">
            <div class="scroll-sidebar">
                <ul id="sidebar-menu">
                    <li class="header">
                        <span>TRAMITES</span>
                    </li>
                    <li>
                    <li>
                        <a href="/permiso_anuncios_adosados/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span>Mis Tramites</span>
                        </a>
                    </li>
                  

                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="#" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTES</h6></span>
                        </a>
          
                     
                        <div class="sidebar-submenu">
                            <ul >
                                <li style="display: block">
                                    <span>Constancias</span>
                                </li>
                                <li style="display: block">
                                    <a href=""><span>Constancia de Propiedad</span></a>
                                </li>
                                <li style="display: block" class="header">
                                    <span>Catalogos</span>
                                </li>
                                <li style="display: block">
                                    <a href="" title="Cuota minima"><span>Cuota minima</span></a>
                                </li>


                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
        <!--#endregion Menú  -->
         
   
        
        <!-- FIN page-sidebar -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                
                    <h2>Mis Trámites Avaluos Rusticos</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
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
                              
                              <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_avaluos_rusticos" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>               
                                    <div class='portlet box blue'>
                                      <div class='portlet-title'>
                                        <div class='caption'>
                                          <i class='icon-book-open'></i>
<!--                                          Mis Trámites-->
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
                    </div>
                </div>
                <!-- container -->
                
            </div>
            
            <!-- page-content -->


                <?php $this->load->view('base/footeradmin'); ?>
            <!-- Footer -->
        </div>
        <!-- page-content-wrapper -->
  
    <!-- FIN sb-site -->
</body>




<script type="text/javascript">var base_url = "";</script>

<!-- SELECT CHOSEN-->
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/chosen/chosen.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/chosen/chosen.js"></script>
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/chosen/chosen-demo.js"></script>

<!-- INPUT SWITCH -->
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/theme-switcher/themeswitcher.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/input-switch/inputswitch.js"></script>



<!-- DATEPICKER -->
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/datepicker/datepicker.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/datepicker/datepicker.js"></script>

<script>
    $(function ()
    {
        "use strict";
        $('.input-switch').bootstrapSwitch();
        $("#date").bsdatepicker();
    });
</script>
<!-- Codigo -->

</html> 