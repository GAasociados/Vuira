

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">

        <title>Ventanilla Universal Irapuato</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!--#region CSS  -->
        <?php $this->load->view('base/admin'); ?>

        <!--#endregion -->


                <!-- FIN loading -->
        <?php if ($this->session->userdata('tipo') != 15 && $this->session->userdata('tipo') != 1555): ?>
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
        <?php endif;?>

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
        <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555) : ?>

            <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                <div id="mobile-navigation">
                    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar">
                        <span></span>
                    </button>
                    <a href="" class="logo-content-small" title="SIPREG"></a>
                </div>
                <div id="header-logo" class="logo-bg">
                    <a href="https://vuira.irapuato.gob.mx/" class="logo-content-big" title="SIPREG">
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

        <?php else: ?>
            <div class="top-bar bg-gradient-12" style="color:white !important">
                <div class="container">
                    <div class="float-right dropdown">
                        <div class="igob-signin-c" sistema-id="e4da3b7fbbce2345d7772b0674a318d5"></div>
                    </div>
                    <div class="float-right dropdown">
                        <div class="igob-signin-c" sistema-id="e4da3b7fbbce2345d7772b0674a318d5">
                            <a href="<?php echo base_url(); ?>login/logout" class="btn btn-warning igob-signin">
                                <span class="glyph-icon icon-separator">
                                    <i class="glyph-icon icon-sign-in font-size-20"></i>
                                </span><span class="button-content">Salir</span>
                            </a>
                        </div>
                
                    </div>
                    <div class="float-right user-account-btn dropdown">
                        <span class="username username-hide-mobile"><?php echo $this->session->userdata("nombrec"); ?></span>
                    </div>
                </div>
            </div>

            <!-- ************ INICIO MENU ***************** -->
    <div class="main-header bg-header wow fadeInDown colorMenu" >
        <div class="container">
            <!-- <a href="index.php/Busqueda/" class="header-logo" title="Irapuato - Municipio"></a> -->
            <a href="" class="header-logo" title="Irapuato - Municipio"></a>
            <div class="right-header-btn">
                <div id="mobile-navigation">
                    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target=".header-nav">
                        <span></span>
                    </button>
                </div>
            </div>

            <ul class="header-nav" >
                <li>
                    <a href="https://vuira.irapuato.gob.mx/" title="Inicio">
                        <span>Trámites y Servicios</span>
                    </a>
                </li>
                <li >
                    <a href="https://vuira.irapuato.gob.mx/citas2" title="Obtén una cita">
                        <span>Obtén una cita</span>
                    </a>
                </li>
                <li>
                    <a href="https://sare.irapuato.gob.mx/" target="_blank" title="Sistema de Apertura Rápida de Empresas">
                        <span>s@re</span>
                    </a>
                </li>
            </ul>
        </div>
      </div>
        <!-- .container -->
    </div>
        <?php endif;?>

    
    <!-- ************FIN MENU***************** -->
        <!--#region Menú  -->
        <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
            <div id="page-sidebar">
                <div class="scroll-sidebar">
                    <ul id="sidebar-menu">
                        <li class="header">
                            <span>TRAMITES</span>
                        </li>
                        
                        <li>
                            <a href="/claves_catastrales_individual/create_ventanilla">
                                <i class="glyph-icon icon-home"></i>
                                <span>Clave Individual </span>
                            </a>
                        </li>
                        
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
                            <a class="sf-with-ul" href="/claves_catastrales_individual/" title="MenU 2">
                                <i class="glyph-icon icon-home"></i>
                                <span><h6>REPORTE INDIVIDUAL</h6></span>
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
        <?php endif; ?>

        <!--#endregion Menú  -->

        <!-- FIN page-sidebar -->


        <!-- BEGIN PAGE TITLE -->
    <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                 <div class="btnRegresar hidden-xs hidden-xm">

                                               <button class="btn btn-warning float btnAyuda" title="Ayuda" id="ayuda" onclick="iniciarAyuda()">
                        <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4>
                    </button>

                                        </div>
                                        <?php
                                        $modificar = "";
                                    else:
                                        $modificar = "";
                                    endif;
                                    ?>
        <!-- END PAGE TITLE -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                    <h2>
                        Trámites
                    </h2><br>
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
<!--                            <button class="btn btn-success float" title="Guardar Cuenta" id="btnGuardarCtaSuspendida">
                                Guardar Tr�mite
                                   <i class="glyph-icon icon-save"></i> 
                            </button>-->
                              <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                    <div class='portlet box blue'>
                                        <div class='portlet-title'>
                                            <!--<div class='caption'>
                                                <i class='icon-book-open'></i>
                                                Trámites
                                            </div>-->
                                            <div class='tools'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px; margin-top:10px;">
                                        <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                            <form action="" method="post"> 
                                                <div class="form-group col-md-12"><label class="bold">Buscar N° de Seguimiento</label>
                                                    <div class="input-group col-md-4">

                                                        <input class="form-control " type="text" name="q"> <span class="input-group-btn"><button class="btn btn-default"><i class="glyph-icon icon-search"></i> Buscar</button></span>

                                                    </div>




                                                </div>  
                                            </form>
                                        <?php endif; ?>
                                        <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 1555): ?>
                                            <form id="formulario" action="" method="get"> 
                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-2">
                                                        <label class="bold">N° de Seguimiento</label>
                                                        <input class="form-control " id="Num_Seg" type="text" name="q">

                                                    </div>

                                                    <script>
                                                        $('#Num_Seg').keypress(function(e){
                                                            var code = (e.keyCode ? e.keyCode : e.which);
                                                            if(code==13){
                                                                $('#formulario').attr('action', '');
                                                                $('#formulario').submit();
                                                            }
                                                        });
                                                    </script>

                                                    <div class="form-group col-md-2">
                                                        <label class="bold">Nombre Propietario</label>
                                                        <input class="form-control " type="text" name="nombrepropietario"> 

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="bold">Clave Catastral</label>
                                                        <input class="form-control " type="text" name="clave"> 

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="bold">Calle</label>
                                                        <input class="form-control " type="text" name="calleui"> 
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="bold">Estatus del Trámite</label>
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
                                                        <label for="date" class="bold">Fecha de Inicio</label>
                                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                                            <input class="form-control" required type="text" readonly="" name="fechainicio" id="fechainicio" value="" ><span class="input-group-btn">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-primary btn-outline" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="bold">Fecha De Fin</label>

                                                        <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd">
                                                            <input class="form-control" required type="text" readonly="" name="fechafinal" id="fechafinal" value="" ><span class="input-group-btn">
                                                                <button class="btn btn-primary btn-outline" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                        </div>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="bold">Funcionario asignado</label>
                                                        <select class="form-control" name="funcionario" tabindex="-1"  id="auxiliar"/>
                                                        <option value="">
                                                            Seleccione Auxiliar
                                                        </option>
                                                        <?php foreach ($auxiliares->result() as $fila): ?>

                                                            <option value="<?php echo $fila->ID; ?>">
                                                                <?php echo $fila->nombres; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="bold">Cuenta Predial</label>
                                                        <input name="cpred" class="form-control" type="text">

                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <select name="tramite" id="tramite" class="form-control" onchange="getTipoDocumento(this);">
                                                            <option value="">Tipo de tramite</option>
                                                            <option value="3">Solicitud IMUVII</option>
                                                            <option value="2">Constancia Ejidal</option>
                                                            <option value="1">Escritura pública</option>
                                                            <option value="4">INFONAVIT</option>
                                                            <option value="5">CORETT</option>
                                                            <option value="6">Título de propiedad</option>
                                                            <option value="7">Sentencia Juridica</option>
                                                            <option value="8">Certificado Parcelario</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <?php if ($this->session->userdata('tipo') == 15 && ($this->session->userdata('admin') == 1 || $this->session->userdata('admin') == 2)): ?>
                                                        <?php else: ?>
                                                            <button id="vista" type="button" class="btn btn-default"><i class="glyph-icon icon-search"> </i> Buscar</button>                                                    
                                                        <?php endif; ?>
                                                         <?php if ($this->session->userdata('tipo') != 1555){ ?>
                                                        <button id="reporte"  type="button" class="btn btn-info"><i class="glyph-icon icon-eye"> </i> Ver Reporte</button>                                         
                                                    <?php } ?>

                                                        <script>
                                                            $('#vista').click(function () {
                                                                $('#formulario').attr('action', '');
                                                                $('#formulario').submit();
                                                            });
                                                            $('#reporte').click(function () {
                                                                $('#formulario').attr('action', '<?php echo base_url('claves_catastrales_individual/reportefinal'); ?>');
                                                                $('#formulario').submit();
                                                            });
                                                        </script>
                                                    </div>


                                                </div>  
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( $this->session->userdata('tipo') == 15 && ($this->session->userdata('admin') == 1 || $this->session->userdata('admin') == 2)): ?>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>

                                    <?php else: ?>


                                        <table class="table table-bordered" style="margin-bottom: 10px">
                                            <tr>
                                                <th>N° Seguimiento</th>
                                                <th>Calle</th>
                                                <th>Funcionario Asignado</th>
                                                <th>Nombre del Propietario</th>
                                                <th>Documento Final</th>
                                                <th>Tipo de documento</th>
                                                <th>Mensaje</th>
                                                <th>Estatus</th>
                                                <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
                                                    <th>Tipo Trámite</th>
                                                <?php endif; ?>
                                                <th>Acción</th>
                                            </tr><?php

                                            /*for($iii = 0; count($claves_catastrales_individual_data) - 1; $iii++)
                                            {
                                                for($yyy = 1; count($claves_catastrales_individual_data); $yyy++)
                                                {
                                                     if(intval($claves_catastrales_individual_data[$iii]->numerocontrol) > intval($claves_catastrales_individual_data[$yyy]->numerocontrol))
                                                    {
                                                        $temp = $claves_catastrales_individual_data[$iii];
                                                        $claves_catastrales_individual_data[$iii] = $claves_catastrales_individual_data[$yyy];
                                                        $claves_catastrales_individual_data[$yyy] = $temp;
                                                    }
                                                }   
                                            }*/

                                            foreach ($claves_catastrales_individual_data as $claves_catastrales_individual) {
                                                if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555) {
                                                    ?>
                                                    <?php if ($claves_catastrales_individual->notificacion == 1) { ?>
                                                        <tr class="note note-warning">
                                                        <?php } else { ?>
                                                        <tr>
                                                        <?php } ?>
                                                        <td><?php echo $claves_catastrales_individual->numerocontrol ?></td>
                                                        <td><?php echo $claves_catastrales_individual->calleui ?></td>
                                                        <td><?php
                                                        if($this->Usuarios_model->get_by_id($claves_catastrales_individual->auxiliar)<>'' || $resultq = $this->Usuarios_model->get_by_id($claves_catastrales_individual->auxiliar)<>null)
                                                        {
                                                          $resultq = $this->Usuarios_model->get_by_id($claves_catastrales_individual->auxiliar);
                                                          echo strtoupper($resultq->nombres . " " . $resultq->apellido_pat . " " . $resultq->apellido_mat);
                                                        }
                                                        ?>
                                                        </td>
                                                        <td><?php echo $claves_catastrales_individual->nombrepropietariodp ?></td>
                                                        <td>
                                                            <?php
                                                            if ($claves_catastrales_individual->status == 4 || $claves_catastrales_individual->status == "4" ) {
                                                                //echo 'Documento de pago <br>';
                                                                if ($claves_catastrales_individual->tipotramite == 1) {
                                                                    if (!empty($claves_catastrales_individual->doctopago) && $claves_catastrales_individual->valido_pago ==0) {
                                                                     
                                                                        echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctopago . "'>Descargar documento de pago <a>";
                                                                    }
                                                                } elseif ($claves_catastrales_individual->tipotramite == 2) {
                                                                    if (!empty($claves_catastrales_individual->doctopago) && $claves_catastrales_individual->valido_pago ==0) {
                                                                        echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $claves_catastrales_individual->doctopago . "'>Descargar<a>";
                                                                    }
                                                                }
                                                            } /*elseif ($claves_catastrales_individual->status == 6) {
                                                                echo 'Documento final<br>';
                                                                if ($claves_catastrales_individual->tipotramite == 1) {
                                                                    if (!empty($claves_catastrales_individual->doctofinal)) {
                                                                        echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                                    }
                                                                } elseif ($claves_catastrales_individual->tipotramite == 2) {
                                                                    if (!empty($claves_catastrales_individual->doctofinal)) {
                                                                        echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                                    }
                                                                } else {
                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";
                                                                }
                                                            } else {
                                                                echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                            }*/
                                                            ?>
                                                            <?php
                                                        if($claves_catastrales_individual->status == "3" || $claves_catastrales_individual->status == "4" || $claves_catastrales_individual->status == "5" || $claves_catastrales_individual->status == "6" )
                                                        {
                                                            echo "<a target='_blank' href='" . base_url() . "DocPrint/DocPrint.php?id=" . $claves_catastrales_individual->ID . "'>Ver Documento<a>";
                                                        }
                                                        else
                                                        {
                                                            if (empty($claves_catastrales_individual->doctofinal)) {
                                                                echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctofinal . "'>Ver Documento<a>";
                                                            }
                                                        }
                                                        //sino entonces
                                                        
                                                        ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                echo $claves_catastrales_individual->Tipo_Tramite
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if (empty($claves_catastrales_individual->mensaje)) {
                                                                echo "No Hay Mensaje del Funcionario";
                                                            } else {
                                                                echo $claves_catastrales_individual->mensaje;
                                                            }
                                                            ?>
                                                        </td>

                                                        <?php
                                                        $dfeha1 = date("Y-m-d");

                                                        $dfeha2 = date($claves_catastrales_individual->fechainicio);

                                                        $fecha1 = strtotime($dfeha2);
                                                        $fecha2 = strtotime($dfeha1);
                                                        $contadordias = 0;
//                                                     echo $claves_catastrales_individual->fechainicio.'<br>';
//                                                            echo $dfeha1.'<br>';
//                                                    echo $dfeha1;
                                                        for ($fecha1; $fecha1 <= $fecha2; $fecha1 = strtotime('+1 day ' . date('Y-m-d', $fecha1))) {
                                                            if ((strcmp(date('D', $fecha1), 'Sun') != 0) && (strcmp(date('D', $fecha1), 'Sat') != 0)) {

                                                                $contadordias += 1;
                                                            }
                                                        }


//                                            
                                                        if ($contadordias <= 0):
                                                            ?>
                                                                <td style="text-align:center;  background-color:red;">
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                        if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "En Espera De Pago";
                                                                        else:
                                                                        echo "Pagado";
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
                                                            
                                                        <?php elseif ($contadordias == 1): ?>
                                                                
                                                                <td style="text-align:center;  background-color:orange;"> 
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                         if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "En Espera De Pago";
                                                                        else:
                                                                                 echo "Pagado";
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
                                                          
                                                        <?php elseif ($contadordias == 2): ?>

                                                                <td style="text-align:center;  background-color:yellow;">
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                       if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "En Espera De Pago";
                                                                        else:
                                                                                 echo "Pagado";
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
                                                            
                                                        <?php else: ?>
                                                                
                                                                <td style="text-align:center;  background-color:green;">
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                       if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "En Espera De Pago";
                                                                        else:
                                                                                 echo "Pagado";
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
                                                      
                                                        <?php endif; ?>
                                                        <td align="center">
                                                            <?php
                                                            if ($claves_catastrales_individual->tipotramitedp == 1):
                                                                echo 'Asignación De Clave Catastral';
                                                            elseif ($claves_catastrales_individual->tipotramitedp == 2):
                                                                echo 'Modificación De Clave Catastral';
                                                            elseif ($claves_catastrales_individual->tipotramitedp == 3):
                                                                echo 'Duplicado De Clave Catastral';
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <td  style="text-align:center; " width="200px">
                                                            <?php
                                                            if ($claves_catastrales_individual->tipotramite == 1) {

                                                                echo anchor(site_url('claves_catastrales_individual/update/' . $claves_catastrales_individual->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                            } else {
                                                                echo anchor(site_url('claves_catastrales_individual_cetificado/update/' . $claves_catastrales_individual->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
                                                            }
                                                            ?>

                                                        </td>

                                                    </tr>
                                                    <?php
                                                } else {
                                                    if ($claves_catastrales_individual->usuarioID == $this->session->userdata("id")) {
                                                        ?>
                                                        <?php if ($claves_catastrales_individual->notificacion == 0) { ?>
                                                            <tr class="note note-warning">
                                                            <?php } else { ?>
                                                            <tr>
                                                            <?php } ?>
                                                            <td><?php echo $claves_catastrales_individual->numerocontrol ?></td>
                                                            <td><?php echo $claves_catastrales_individual->calleui ?></td>
                                                            <td><?php echo $claves_catastrales_individual->auxiliar ?></td>
                                                            <td><?php echo $claves_catastrales_individual->nombrepropietariodp ?></td>
                                                            <td>
                                                                <?php
                                                                if (empty($claves_catastrales_individual->doctofinal)) {
                                                                    echo "El Documento Final Se Subirá Cuando " .
                                                                    "El Proceso Del Trámite Esté Terminado";
                                                                } else {
                                                                    if ($claves_catastrales_individual->validacion == 1 && $claves_catastrales_individual->doctopago != "" && $claves_catastrales_individual->status == 6) {
//                                                                    echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                                        echo "El trámite ha terminado<br>";
                                                                        if ($claves_catastrales_individual->tipotramite == 1) {
                                                                            if (!empty($claves_catastrales_individual->doctofinal)) {
                                                                                echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                                            }
                                                                        } elseif ($claves_catastrales_individual->tipotramite == 2) {
                                                                            if (!empty($claves_catastrales_individual->doctofinal)) {
                                                                                echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                                            }
                                                                        }
                                                                    } else {
                                                                        echo "Por favor pasar a realizar el pago en oficinas y Recoger el documento final";
                                                                    }
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                if (empty($claves_catastrales_individual->mensaje)) {
                                                                    echo "No Hay Mensaje del Funcionario";
                                                                } else {
                                                                    echo $claves_catastrales_individual->mensaje;
                                                                }
                                                                ?>
                                                            </td>
                                                            <?php
                                                        $dfeha1 = date("Y-m-d");

                                                        $dfeha2 = date($claves_catastrales_individual->fechainicio);

                                                        $fecha1 = strtotime($dfeha2);
                                                        $fecha2 = strtotime($dfeha1);
                                                        $contadordias = 0;
//                                                     echo $claves_catastrales_individual->fechainicio.'<br>';
//                                                            echo $dfeha1.'<br>';
//                                                    echo $dfeha1;
                                                        for ($fecha1; $fecha1 <= $fecha2; $fecha1 = strtotime('+1 day ' . date('Y-m-d', $fecha1))) {
                                                            if ((strcmp(date('D', $fecha1), 'Sun') != 0) && (strcmp(date('D', $fecha1), 'Sat') != 0)) {

                                                                $contadordias += 1;
                                                            }
                                                        }


//                                            
                                                        if ($contadordias <= 0):
                                                            ?>
                                                            
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                        if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "<td style='text-align:center;  background-color:orange;'> En Espera De Pago </td>";
                                                                        else:
                                                                        echo "<td style='text-align:center;  background-color:green;'> Pagado </td>";
                                                                        endif;
                                                                         break;

                                                                    case '5':
                                                                        echo "<td style='text-align:center;  background-color:rgba(44, 181, 44, 0.8);'> Cancelado </td>";
                                                                        break;

                                                                    default:
                                                                        echo "<td style='text-align:center;  background-color:green;'> Terminado </td>";
                                                                        break;
                                                                }
                                                                ?>
                                                            
                                                        <?php elseif ($contadordias == 1): ?>
                        
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                         if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "<td style='text-align:center;  background-color:orange;'> En Espera De Pago </td>";
                                                                        else:
                                                                                 echo "<td style='text-align:center;  background-color:green;'> Pagado </td>";
                                                                        endif;
                                                                        break;

                                                                    case '5':
                                                                        echo "<td style='text-align:center;  background-color:rgba(44, 181, 44, 0.8);'> Cancelado </td>";
                                                                        break;

                                                                    default:
                                                                        echo "<td style='text-align:center;  background-color:green;'> Terminado </td>";
                                                                        break;
                                                                }
                                                                ?>
                                                          
                                                        <?php elseif ($contadordias == 2): ?>
                        
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                       if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "<td style='text-align:center;  background-color:orange;'> En Espera De Pago </td>";
                                                                        else:
                                                                                 echo "<td style='text-align:center;  background-color:green;'> Pagado </td>";
                                                                        endif;
                                                                        break;

                                                                    case '5':
                                                                        echo "<td style='text-align:center;  background-color:rgba(44, 181, 44, 0.8);'> Cancelado </td>";
                                                                        break;

                                                                    default:
                                                                        echo "<td style='text-align:center;  background-color:green;'> Terminado </td>";
                                                                        break;
                                                                }
                                                                ?>
                                                            
                                                        <?php else: ?>
                                                            
                                                                <?php
                                                                switch ($claves_catastrales_individual->status) {

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
                                                                       if( $claves_catastrales_individual->valido_pago == 0):
                                                                        echo "<td style='text-align:center;  background-color:orange;'> En Espera De Pago </td>";
                                                                        else:
                                                                                 echo "<td style='text-align:center;  background-color:green;'> Pagado </td>";
                                                                        endif;
                                                                        break;

                                                                    case '5':
                                                                        echo "<td style='text-align:center;  background-color:rgba(44, 181, 44, 0.8);'> Cancelado </td>";
                                                                        break;

                                                                    default:
                                                                        echo "<td style='text-align:center;  background-color:green;'> Terminado </td>";
                                                                        break;
                                                                }
                                                                ?>
                                                      
                                                        <?php endif; ?>

                                                            <td style="text-align:center" width="200px">
                                                                <?php
                                                                if ($claves_catastrales_individual->status < 4) {
                                                                    echo anchor(site_url('claves_catastrales_individual/update/' . $claves_catastrales_individual->ID), 'Actualizar');
                                                                } else if ($claves_catastrales_individual->status == 4) {
                                                                    if ($claves_catastrales_individual->validacion == 1 && $claves_catastrales_individual->autorizacion == 1) {
                                                                        echo anchor(site_url('claves_catastrales_individual/vistapago/' . $claves_catastrales_individual->ID), 'Recibo de Pago');
//                                                                    echo "Por favor pasar a realizar el pago en oficinas y Recoger el documento final";
                                                                    } else {
//                                                                    echo "En espera de Autorización";
                                                                    }
                                                                }
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
                                    <?php endif; ?>

                        </div>
                    </div>
                    <!-- container -->
                </div>
                <!-- page-content -->

            </div>
                 <?php $this->load->view('base/footeradmin'); ?>
            <!-- Footer -->
        </div>






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