

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
    <!-- ************FIN MENU***************** --> 

        
        <!-- FIN page-wrapper -->
        <!--#region Menú  -->
        <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155): ?>
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
                            <a class="sf-with-ul" href="/claves_catastrales_individual/" title="MenU 2">
                                <i class="glyph-icon icon-home"></i>
                                <span><h6>REPORTE INDIVIDUAL</h6></span>
                            </a>
                            <a class="sf-with-ul" href="/claves_catastrales_individual_cetificado" title="MenU 2">
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
        <?php endif; ?>
        <!--#endregion Menú  -->
         
   
        
        <!-- FIN page-sidebar -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
<!--         
                        <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>-->
                    <h2>Mis Trámites Clave Catastral Individual Certificado</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                                    <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
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

                                    <div class="row" style="margin-bottom: 10px">
                                        <form action="" method="get">
                                            <div class="form-group col-md-12"><label class="bold">Buscar N° de Seguimiento</label>
                                                <div class="input-group col-md-4">

                                                    <input class="form-control " type="text" name="q"> <span class="input-group-btn"><button class="btn btn-default"><i class="glyph-icon icon-search"></i> Buscar</button></span>

                                                </div>




                                            </div>
                                        </form>
                                    </div>

                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                        <tr>
                                            <th>N° Seguimiento</th>
                                            <th>Nombre del Propietario</th>
                                            <th>Documento Final</th>
                                            <th>Mensaje</th>
                                            <th>Estatus</th>
                                            <th>Opción</th>
                                        </tr><?php
                                        foreach ($claves_catastrales_individual_cetificado_data as $claves_catastrales_individual_cetificado) {
                                            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
                                                ?>
                                                <?php if ($claves_catastrales_individual_cetificado->notificacion == 1) { ?>
                                                    <tr class="note note-warning">
                                                    <?php } else { ?>
                                                    <tr>
                                                    <?php } ?>
                                                    <td>
                                                        <?php echo $claves_catastrales_individual_cetificado->nocontrol ?></td>
                                                    <td>
                                                        <?php echo $claves_catastrales_individual_cetificado->nombrepropietariodp ?></td>
                                                    <td>
                                                        <?php
                                                        if (empty($claves_catastrales_individual_cetificado->doctofinal)) {
                                                            echo "El Documento Final Se Subirá Cuando " .
                                                            "El Proceso Del Trámite Esté Terminado";
                                                        } else {
                                                            echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $claves_catastrales_individual_cetificado->doctofinal . "'>Descargar<a>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (empty($claves_catastrales_individual_cetificado->mensaje)) {
                                                            echo "No Hay Mensaje del Funcionario";
                                                        } else {
                                                            echo $claves_catastrales_individual_cetificado->mensaje;
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
                                                        echo anchor(site_url('claves_catastrales_individual_cetificado/update/' . $claves_catastrales_individual_cetificado->ID), 'Actualizar');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                if ($claves_catastrales_individual_cetificado->usuarioID == $this->session->userdata("id")) {
                                                    ?>
                                                    <?php if ($claves_catastrales_individual_cetificado->notificacion == 0) { ?>
                                                        <tr class="note note-warning">
                                                        <?php } else { ?>
                                                        <tr>
                                                        <?php } ?>
                                                        <td>
                                                            <?php echo $claves_catastrales_individual_cetificado->nocontrol ?></td>

                                                        <td><?php echo $claves_catastrales_individual_cetificado->nombrepropietariodp ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($claves_catastrales_individual_cetificado->doctofinal)) {
                                                                echo "El trámite a terminado ";
                                                            } else {
                                                                if ($claves_catastrales_individual_cetificado->autorizacion == 1 && $claves_catastrales_individual_cetificado->status == 6) {
//                                                                    echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $claves_catastrales_individual_cetificado->doctofinal . "'>Descargar<a>";
                                                                    echo "Por favor pasar a realizar el pago en oficinas y Recoger el documento final";
                                                                } else {
                                                                    echo "El Documento Final Esta en Proceso de Autorización";
                                                                }
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if (empty($claves_catastrales_individual_cetificado->mensaje)) {
                                                                echo "No Hay Mensaje del Funcionario";
                                                            } else {
                                                                echo $claves_catastrales_individual_cetificado->mensaje;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($claves_catastrales_individual_cetificado->status) {
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
                                                                    if ($claves_catastrales_individual_cetificado->validacion == 1 && $claves_catastrales_individual_cetificado->autorizacion == 1 ) {
                                                                    echo "En Espera De Pago";
//                                                                    echo "Por favor pasar a realizar el pago en oficinas y Recoger el documento final";
                                                                } else {
                                                                    echo "En espera de Autorización";
                                                                }
                                                                  
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
                                                            if ($claves_catastrales_individual_cetificado->status < 4) {
                                                                echo anchor(site_url('claves_catastrales_individual_cetificado/update/' . $claves_catastrales_individual_cetificado->ID), 'Actualizar');
                                                            } else if ($claves_catastrales_individual_cetificado->status == 4) {

                                                                if ($claves_catastrales_individual_cetificado->validacion == 1 && $claves_catastrales_individual_cetificado->autorizacion == 1 ) {
                                                                    echo anchor(site_url('claves_catastrales_individual_cetificado/vistapago/' . $claves_catastrales_individual_cetificado->ID), 'Recibo de Pago');
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

        
</html> 