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
                <ul id="sidebar-menu">
                    <li class="header">
                        <span>TRAMITES</span>
                    </li>
                    <li>
                    <li>
                        <a href="/permiso_anuncios_adosados/asignacion">
                            <i class="glyph-icon icon-ban"></i>
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
                
                    <h2>Reporte Anuncios Adosados</h2><br>
                    <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_autosoportados_azoteas" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
      <!-- BEGIN PAGE CONTENT INNER -->
               <form class="" action=" <?php echo base_url('permiso_anuncios_adosados/reportefinal'); ?>" method="post">
                 <div class="form-group col-md-12">

                   <div class="form-group col-md-3">
                     <label>Nombre o Apellido del Propietario de Inmueble</label>
                     <input class="form-control" type="text" name="nombrepropietario" value="" placeholder="Buscar por Nombre o Apellido del Propietario">
                   </div>

                   <div class="form-group col-md-3">
                     <br>
                     <label>Estatus del Trámite</label>
                     <select class="form-control" name="status">
                        <option value="">Seleccione Una Opción</option>
                        <option value = "1">Iniciado</option>
                        <option value = "2">En Revisión de Información</option>
                        <option value = "3">Trámite en Proceso</option>
                        <option value = "4">En Espera de Pago</option>
                        <option value = "5">Cancelado</option>
                        <option value = "6">Terminado</option>
                     </select>
                   </div>
                   <div class="form-group col-md-3">
                     <br>
                     <label for="date">Fecha de Inicio<?php echo form_error('fechainicio') ?></label>
                      <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                         <input class="form-control" required type="text" readonly="" name="fechainicio" id="fechainicio" value="" ><span class="input-group-btn">
                           <button class="btn btn-primary btn-outline" type="button">
                             <i class="fa fa-calendar"></i>
                           </button>
                         </div>
                 </div>
                   <div class="form-group col-md-3">
                     <br>
                     <label for="date">Fecha Final </label>
                      <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd">
                         <input class="form-control" required type="text" readonly="" name="fechafinal" id="fechafinal" value="" ><span class="input-group-btn">
                           <button class="btn btn-primary btn-outline" type="button">
                             <i class="fa fa-calendar"></i>
                           </button>
                         </div>
                 </div>
                 </div>
                 <div class="form-group">
                   <div class="form-group col-md-4">
                     <button type="submit"  class="btn btn-info glyph-icon icon-eye" name="button">Ver Reporte</button>
                   </div>
                 </div>
               </form>
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