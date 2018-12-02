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
                
                    <h2>Permiso de Anuncios Adosados Autorizacion</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                            

                                <div class="row" style="margin-bottom: 10px">
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
                            
                            <!--                                    <h4 class="note note-warning">Si alguno de sus trámites se encuentra en este color, significa solicitud nueva o modificada.</h4>-->
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
                                                    <tr >
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
                                                            echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
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
                                                        echo anchor(site_url('permiso_anuncios_adosados/update_autorizacion/' . $permiso_anuncios_adosados->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-eye"></i> Ver Tramite</button>');
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
                                                                if ($permiso_anuncios_adosados->status == 6 && $permiso_anuncios_adosados->doctofinal !="") {
                                                                    echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
                                                                }else{
                                                             echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                                }
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
                                                            if ($permiso_anuncios_adosados->status < 4):
                                                                echo anchor(site_url('permiso_anuncios_adosados/update/' . $permiso_anuncios_adosados->ID), 'Actualizar');
                                                            elseif ($permiso_anuncios_adosados->status == 4):
                                                                echo anchor(site_url('permiso_anuncios_adosados/realizarpago/' . $permiso_anuncios_adosados->ID), 'Realizar Pago');
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
                    </div>
                </div>
                <!-- container -->
                
            </div>
            <!-- page-content -->


                <?php $this->load->view('base/footeradmin'); ?>
            <!-- Footer -->
        </div>
        <!-- page-content-wrapper -->
  
</html>



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

         
        
</html> 