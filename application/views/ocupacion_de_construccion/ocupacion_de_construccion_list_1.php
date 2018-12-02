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
                <div class="scroll-sidebar">
                <ul id="sidebar-menu">
                    <li class="header">
                        <span>TRAMITES</span>
                    </li>
                    <li>
                    <li>
                        <a href="/permiso_anuncios/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Asignar Anuncio Autosoportados</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/permiso_anuncios/autorizacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Autorizar Anuncio Autosoportados</h6></span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="/permiso_anuncios_adosados/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Asignar Anuncio Adosado</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/permiso_anuncios_adosados/autorizacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Autorizar Anuncio Adosado</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/ocupacion_de_construccion/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Asignar Aviso Obra</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/ocupacion_de_construccion/autorizacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Autorizar Aviso Obra</h6></span>
                        </a>
                    </li>
                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/permiso_anuncios/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes Anuncio Autosoportados</h6></span>
                        </a>
                        <li>
                        <a class="sf-with-ul" href="/permiso_anuncios_adosados/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes Anuncio Adosado</h6></span>
                        </a>
                        <li>
                        <a class="sf-with-ul" href="/ocupacion_de_construccion/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes Aviso Obra</h6></span>
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
        </div>
        <!--#endregion Menú  -->
         
   
        
        <!-- FIN page-sidebar -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                
                    <h2>Autorización de uso de Construcción</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                            
 <div class="row" style="margin-bottom: 10px">
                                   <div class="col-md-3 text-right">
                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 111 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166): ?>

                                            <?php endif; ?>
                                        </div>  
                                    </div>
                            <!--<h4 class="note note-warning">Si el trámite es actualizado o modificado se mostrará en este color.</h4>-->
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

                                                    <?php if ($ocupacion_de_construccion->notificacion == 1) { ?>
                                                        <tr>
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
                                                            echo anchor(site_url('ocupacion_de_construccion/update_autorizacion/' . $ocupacion_de_construccion->ID),'<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
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
                                                                echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), 'Actualizar');
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
                                                                echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), 'Actualizar');
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
                                                            if ($ocupacion_de_construccion->status < 4):

                                                                echo anchor(site_url('ocupacion_de_construccion/update/' . $ocupacion_de_construccion->ID), 'Actualizar');

                                                            elseif ($ocupacion_de_construccion->status == 4):
                                                                echo anchor(site_url('ocupacion_de_construccion/realizarpago/' . $ocupacion_de_construccion->ID), 'Realizar Pago');
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
                                    <!-- END PAGE CONTENT INNER -->
                      
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