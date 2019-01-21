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
                
                    <h2>Resultados Reportes Anuncios Adosados</h2><br>
               
                              <!-- BEGIN PAGE TITLE -->

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
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="<?php echo base_url(); ?>permiso_anuncios_adosados/reportes" class="btn btn-danger glyph-icon icon-times">Cancelar Búsqueda</a>
                                        </div>
                                        <div class="col-md-2">
                                            <form target="_blank" action="<?php echo base_url(); ?>permiso_anuncios_adosados/reportespdf" method="POST">
                                                
                                                <input name="fechainicio" type="hidden" value="<?php echo $fechainicio; ?>">
                                                <input name="fechafinal" type="hidden" value="<?php echo $fechafinal; ?>">
                                                <input name="status" type="hidden" value="<?php echo $status; ?>">
                                                <input name="nombrepropietario" type="hidden" value="<?php echo $nombrepropietario; ?>">

                                              <button class="btn btn-blue-alt"><i class="glyphicon glyphicon-export"></i>Exportar a PDF</button>
                                            </form>
                                        </div>
                                    </div>


                                    <div class='portlet box blue'>
                                        <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='icon-book-open'></i>
<!--                                                Reportes-->
                                            </div>
                                            <div class='tools'>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                        <tr>
                                            <th>Inicio del Trámite</th>
                                            <th>Fin del Trámite</th>
                                            <th>Nombre del Propietario del Inmueble</th>
                                            <th>Documento  Final</th>
                                            <th>Mensaje</th>
                                            <th>Número de Control</th>
                                            <th>Estatus</th>
                                        </tr><?php
                                            foreach ($permiso_anuncios_adosados_data as $permiso_anuncios_adosados) {
                                                if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                                                    ?>
                                                <tr>
                                                    <td>
        <?php
        if ($permiso_anuncios_adosados->fechainicio == "0") {
            if($permiso_anuncios_adosados->fechainiciocompleta=="0000-00-00")
                echo "El trámite aún no ha Iniciado";
            else
                echo $permiso_anuncios_adosados->fechainiciocompleta;
        } else {
            if($permiso_anuncios_adosados->fechainiciocompleta!="0000-00-00")
                echo $permiso_anuncios_adosados->fechainiciocompleta;
            else
                echo $permiso_anuncios_adosados->fechainicio;
        }
        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($permiso_anuncios_adosados->fechafinal == "0") {
                                                            if($permiso_anuncios_adosados->fechafinalcompleta=="0000-00-00")
                                                                echo "El trámite aún no ha finalizado";
                                                            else
                                                                echo $permiso_anuncios_adosados->fechafinalcompleta;
                                                        } else {
                                                            if($permiso_anuncios_adosados->fechafinalcompleta!="0000-00-00")
                                                                echo $permiso_anuncios_adosados->fechafinalcompleta;
                                                            else
                                                                echo $permiso_anuncios_adosados->fechafinal;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $permiso_anuncios_adosados->nombrepropietarioinmuebledg ?></td>
                                                    <td>
                                                        <?php
                                                        if (empty($permiso_anuncios_adosados->doctofinal)) {
                                                            echo "El Documento Final Se Subirá Cuando " .
                                                            "El Proceso Del Trámite Esté Terinado";
                                                        } else {
                                                            echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $permiso_anuncios_adosados->mensaje ?></td>
                                                    <td><?php echo $permiso_anuncios_adosados->nocontrol ?></td>

                                                        <?php
                                                            switch ($permiso_anuncios_adosados->status) 
                                                            {
                                                                case '1':
                                                                    echo "<td style='text-align:center;  background-color:orange;'> Iniciado </td>";
                                                                    break;

                                                                case '2':
                                                                    echo "<td style='text-align:center;  background-color:orange;'> Revisión De Información </td>";
                                                                    break;

                                                                case '3':
                                                                    echo "<td style='text-align:center;  background-color:yellow;'> Trámite en Proceso </td>";
                                                                    break;

                                                                case '4':
                                                                    echo "<td style='text-align:center;  background-color:orange;'> En Espera De Pago </td>";
                                                                    break;

                                                                case '5':
                                                                    echo "<td style='text-align:center;  background-color:rgba(44, 181, 44, 0.8);'> Cancelado </td>";
                                                                    break;

                                                                default:
                                                                    echo "<td style='text-align:center;  background-color:green;'> Terminado </td>";
                                                                    break;                                                                    
                                                            }
                                                        ?>
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
                "El Proceso Del Trámite Esté Terinado";
            } else {
                echo "<a href='" . base_url() . "assets/tramites/permisosanunciosadosados/" . $permiso_anuncios_adosados->doctofinal . "'>Descargar<a>";
            }
            ?>
                                                        </td>
                                                        <td><?php echo $permiso_anuncios_adosados->mensaje ?></td>
                                                        <td><?php echo $permiso_anuncios_adosados->nocontrol ?></td>
                                                            <?php
                                                            switch ($permiso_anuncios_adosados->status) 
                                                            {
                                                                case '1':
                                                                    echo "<td style='text-align:center;  background-color:orange;'> Iniciado </td>";
                                                                    break;

                                                                case '2':
                                                                    echo "<td style='text-align:center;  background-color:orange;'> Revisión De Información </td>";
                                                                    break;

                                                                case '3':
                                                                    echo "<td style='text-align:center;  background-color:yellow;'> Trámite en Proceso </td>";
                                                                    break;

                                                                case '4':
                                                                    echo "<td style='text-align:center;  background-color:orange;'> En Espera De Pago </td>";
                                                                    break;

                                                                case '5':
                                                                    echo "<td style='text-align:center;  background-color:rgba(44, 181, 44, 0.8);'> Cancelado </td>";
                                                                    break;

                                                                default:
                                                                    echo "<td style='text-align:center;  background-color:green;'> Terminado </td>";
                                                                    break;                                                                    
                                                            }
                                                            ?>
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            //echo anchor(site_url('permiso_anuncios_adosados/read/'.$permiso_anuncios_adosados->ID),'Read');
                                                            //echo ' | ';
                                                            echo anchor(site_url('permiso_anuncios_adosados/update/' . $permiso_anuncios_adosados->ID), 'Actualizar');
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
                <!-- container -->
                <div class="modal fade bs-modal-md" id="small" tabindex="-1" role="dialog" aria-hidden="true">
            <form action="<?php echo base_url() . "permiso_anuncios_adosados/asignar_func"; ?>" method="post" >
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Funcionarios Permiso de Anuncios Auto Soportados</h4>
                        </div>
                        <div class="modal-body"> 
                            
                                <label for="int">Asignar Funcionarios Permiso de Anuncios Auto Soportados*</label>
                                <select required="" class="form-control" name="auxiliar" tabindex="-1"  id="auxiliar"/>
                                <option value="">
                                    Seleccione Funcionarios Permiso de Anuncios Auto Soportados
                                </option>
                                <?php foreach ($auxiliares->result() as $fila): ?>

                                    <option value="<?php echo $fila->ID; ?>">
                                        <?php echo $fila->nombres." ".$fila->apellido_pat." ".$fila->apellido_mat; ?>
                                        
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            
                            <input id="docsid" type="hidden" name="IDs">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn green">Asignar Auxiliar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
            </div>
            <!-- page-content -->


                <?php $this->load->view('base/footeradmin'); ?>
            <!-- Footer -->
        </div>
        <!-- page-content-wrapper -->
    </div>
    <!-- FIN sb-site -->
</body>
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
 <script type="text/javascript">
            $(document).ready(function () {
                $("#asignar").click(function () {
                    var favorite = [];
                    $.each($("input[name='opc']:checked"), function () {
                        favorite.push($(this).val());
                    });

                    if (favorite.length > 0) {
                        $('#docsid').val(favorite);
                        $('#small').modal('toggle');

                    } else
                    {
                        alert("Seleccione los tramites");
                    }
                });
            });

        </script>
         
        
</html> 