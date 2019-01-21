

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">

        <title> Tramites y Servicios </title>
        <meta name="description" content="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!--#region CSS  -->
        <?php $this->load->view('base/admin'); ?>
        <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/animate.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/backgrounds.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/boilerplate.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/border-radius.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/grid.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/page-transitions.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/spacing.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/typography.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/utils.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/colors.css">

            <!-- ELEMENTS -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/badges.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/buttons.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/content-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/dashboard-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/forms.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/images.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/info-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/invoice.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/loading-indicators.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/menus.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/panel-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/response-messages.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/responsive-tables.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/ribbon.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/social-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/tables.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/tile-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/elements/timeline.css">


            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/icons/fontawesome/fontawesome.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/icons/linecons/linecons.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/icons/spinnericon/spinnericon.css">
            <!-- WIDGETS -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/accordion-ui/accordion.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/calendar/calendar.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/carousel/carousel.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/charts/justgage/justgage.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/charts/morris/morris.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/charts/piegage/piegage.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/charts/xcharts/xcharts.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/chosen/chosen.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/colorpicker/colorpicker.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/datatable/datatable.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/datepicker/datepicker.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/datepicker-ui/datepicker.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/daterangepicker/daterangepicker.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/dialog/dialog.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/dropdown/dropdown.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/dropzone/dropzone.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/file-input/fileinput.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/input-switch/inputswitch.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/input-switch/inputswitch-alt.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/ionrangeslider/ionrangeslider.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/jcrop/jcrop.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/jgrowl-notifications/jgrowl.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/loading-bar/loadingbar.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/maps/vector-maps/vectormaps.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/markdown/markdown.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/modal/modal.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/multi-select/multiselect.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/multi-upload/fileupload.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/nestable/nestable.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/noty-notifications/noty.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/popover/popover.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/pretty-photo/prettyphoto.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/progressbar/progressbar.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/range-slider/rangeslider.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/slider-ui/slider.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/tabs-ui/tabs.css">
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/widgets/theme-switcher/themeswitcher.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/timepicker/timepicker.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/tocify/tocify.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/tooltip/tooltip.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/touchspin/touchspin.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/uniform/uniform.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/wizard/wizard.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/xeditable/xeditable.css">

            <!-- FRONTEND WIDGETS -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/layerslider/layerslider.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/owlcarousel/owlcarousel.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/widgets/fullpage/fullpage.css">

            <!-- SNIPPETS -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/chat.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/files-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/login-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/notification-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/progress-box.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/todo.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/user-profile.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/snippets/mobile-navigation.css">

            <!-- Frontend theme -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/themes/frontend/layout.css">
            <!-- 
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/themes/admin/layout.css"> 
            -->
            
            <link rel="stylesheet" type="text/css"
                  href="https://vuira.irapuato.gob.mx/assets/assets/themes/frontend/color-schemes/default.css">

            <!-- Components theme -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/themes/components/default.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/themes/components/border-radius.css">

            <!-- Frontend responsive -->

            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/responsive-elements.css">
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/helpers/frontend-responsive.css">

            <!-- alertify-->
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/lib/alertify/css/alertify.min.css">

            <!-- global-->
            <link rel="stylesheet" type="text/css" href="https://vuira.irapuato.gob.mx/assets/assets/stuffs/css/global.css">

            <style>
                .swal2-popup {
                    font-size: 1.6rem !important;
                }
            </style>
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
                        <a href="/claves_catastrales_individual/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Clave Individual </span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="/claves_catastrales_individual_cetificado/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Clave Certificado </span>
                        </a>
                    </li>
                     <li>
                    <li>
                        <a href="/claves_fraccionamiento/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Clave Fracc.. </span>
                        </a>
                    </li>

                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/claves_catastrales_individual/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE INDIVIDUAL</h6></span>
                        </a>
                        <a class="sf-with-ul" href="/claves_catastrales_individual_cetificado/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE  CERTIFICADO.</h6></span>
                        </a>
                        <a class="sf-with-ul" href="/claves_catastrales_fraccionamiento/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE  FRACC.</h6></span>
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
         
<!--                        <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>-->
                    <h2>Reportes Claves Catastrales Individual.</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                   <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-azure btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>               
                                    <form class="" action=" <?php echo base_url('claves_catastrales_individual/reportefinal'); ?> " method="post">

                                        <div class="form-group col-md-12">
                                            <div class="form-group col-md-4">
                                                
                                                <div class="col-md-6">
                                                    <label>No Seguimiento</label>
                                                    <input maxlength="5"  class="form-control" type="text" pattern="[0-9]+" name="seguimiento" value="" placeholder="Buscar por Número ">
                                                </div>
                                                <div class="col-md-6">
                                                      <label>Año</label>
                                                    <select class="form-control" name="year">
                                                        <?php
                                                        $years = range(date('Y'), 1900);
                                                        foreach ($years as $year):
                                                            ?>
                                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                        <?php endforeach; ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Nombre del Propietario</label>
                                                <input class="form-control" type="text" name="nombrepropietario" value="" placeholder="Buscar por Nombre Propietario">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Clave Catastral</label>
                                                <input class="form-control" type="text" name="clave" value="" placeholder="Buscar por Clave Catastral">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Estatus del Trámite</label>
                                                <select class="form-control" name="status">
                                                    <option value="">Seleccione</option>
                                                    <option value = "1">Iniciado</option>
                                                    <option value = "2">En Revisión de Información</option>
                                                    <option value = "3">Trámite en Proceso</option>
                                                    <option value = "4">En Espera de Pago</option>
                                                    <option value = "5">Cancelado</option>
                                                    <option value = "6">Terminado</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="date">Fecha de Inicio<?php echo form_error('fechainicio') ?></label>
                                                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                                    <input class="form-control" required type="text" readonly="" name="fechainicio" id="fechainicio" value="" ><span class="input-group-btn">
                                                        <button class="btn btn-primary btn-outline" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
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
    <link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/chosen/chosen.css">
        <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/chosen/chosen.js"></script>
        <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/chosen/chosen-demo.js"></script>

        <!-- INPUT SWITCH -->
        <link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/input-switch/inputswitch.css">
        <link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/input-switch/inputswitch-alt.css">
        <link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/theme-switcher/themeswitcher.css">
        <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/input-switch/inputswitch.js"></script>

        <!--DATES-->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
            type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/components-date-time-pickers.min.js"
            type="text/javascript"></script>

            <!-- DATEPICKER -->
        <link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/datepicker/datepicker.css">
        <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets/widgets/datepicker/datepicker.js"></script>


<script>
    $(function ()
    {
        "use strict";
        $('.input-switch').bootstrapSwitch();
        $("#date").bsdatepicker();
    });
</script>

        
</html> 