<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Universal Irapuato</title>
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
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                <div id="mobile-navigation">
                    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar">
                        <span></span>
                    </button>
                    <a href="" class="logo-content-small" title="SIPREG"></a>
                </div>
                <div id="header-logo" class="logo-bg">
                    <a href="//vuira.irapuato.gob.mx" class="logo-content-big" title="SIPREG">
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
                                    <a href="<?php echo base_url(); ?>login/logout" class="btn display-block font-normal btn-danger">
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

        <div class="row">
            <div class="col-md-2 col-xl-10" style="margin-right: 20px;">
                <!--#region Menú  -->
                <div id="page-sidebar">
                    <div class="scroll-sidebar">
                        <ul id="sidebar-menu">
                            <li class="header">
                                <span>TRAMITES</span>
                            </li>
                                
                            <li>
                                <a href="https://vuira.irapuato.gob.mx/claves_catastrales_individual/asigna">
                                    <i class="glyph-icon icon-home"></i>
                                    <span>Mis tramites </span>
                                </a>
                            </li>
                            
                            <li class="header">
                                <span>REPORTES </span>
                            </li>
                            <li>
                                <a class="sf-with-ul" href="/claves_catastrales_individual/reportes" title="MenU 2">
                                    <i class="glyph-icon icon-home"></i>
                                    <span><h6>Reportes</h6></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--#endregion Menú  --> 
            <!-- BEGIN CONTENT -->
            <div class="col-md-2 col-xl-10" style="margin-right: 20px;>
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-4 text-center">
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="col-md-1 text-right"></div>
                            </div>
                            <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-primary">Regresar</a>
                            <div class='portlet box blue'>
                                <div class='portlet-title'>
                                    <div class='caption'>
                                        <i class='icon-book-open'></i>
                                        Trámites pendientes
                                    </div>
                                <div class='tools'>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <form action="" method="get"> 
                            <div class="form-group col-md-8"><label class="bold">Buscar N° de Seguimiento</label>
                                <div class="input-group col-md-4">
                                    <input class="form-control " type="text" name="q"> <span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button></span>
                                </div>
                            </div>  
                        </form>
                    </div>
                    <table class="table table-bordered col-lg-11" style="margin-bottom: 10px">
                        <tr>
                            <th>N° Control</th>
                                <th>Nombre del Propietario</th>
                                <th>Cuenta Predial</th>
                                <th>Colonia</th>
                                <th>Calle</th>
                                <th>Tipo Trámite</th>
                                <th>Acción</th>
                        </tr>

                        <?php foreach ($claves_catastrales_individual_data as $claves_catastrales_individual) {
                                                    ?>
                            <tr>
                                <td style="text-align:center" width="200px">
                                    <?php
                                        $claves_catastrales_individual->numerocontrol = str_split($claves_catastrales_individual->numerocontrol);
                                        for($i = 0; $i < count($claves_catastrales_individual->numerocontrol) - 4; $i++)
                                        {
                                            echo $claves_catastrales_individual->numerocontrol[$i];
                                        }
                                        echo "/";
                                        for($i = $i; $i < count($claves_catastrales_individual->numerocontrol); $i++)
                                        {
                                            echo $claves_catastrales_individual->numerocontrol[$i];
                                        }
                                    ?>
                                </td>
                                <td><?php echo $claves_catastrales_individual->nombrepropietariodp ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php echo$claves_catastrales_individual->predialui; ?>
                                </td><td style="text-align:center" width="200px">

                                                            <?php
                                                            if ($claves_catastrales_individual->tipotramite == 1):
                                                                if ($claves_catastrales_individual->cbocoloniaui != 0) {
                                                                    if (!empty($claves_catastrales_individual->cbocoloniaui)):

                                                                        $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($claves_catastrales_individual->cbocoloniaui);
                                                                        ?>
                                                                        <?php echo strtoupper($arraycolonia->NOMBRE); ?>


                                                                        <?php
                                                                    endif;
                                                                }else {
                                                                    echo strtoupper($claves_catastrales_individual->coloniados);
                                                                }
                                                            else:
                                                                echo strtoupper($claves_catastrales_individual->cbocoloniaui);
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <td style="text-align:center" width="200px">

                                                            <?php echo strtoupper($claves_catastrales_individual->calleui); ?>
                                                        </td>
                                                        <td style="text-align:center" width="200px">

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
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            if ($claves_catastrales_individual->tipotramite == 1) {

                                                                echo anchor(site_url('claves_catastrales_individual/Clave/' . $claves_catastrales_individual->ID), 'Generar Clave');
                                                            } else {
                                                                echo anchor(site_url('claves_catastrales_individual_cetificado/Clave/' . $claves_catastrales_individual->ID), 'Generar Clave');
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
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
                                    <!-- END PAGE CONTENT BODY -->
                                    <!-- END CONTENT BODY -->
                                </div>
                                <!-- END CONTENT -->
                            </div>
                            <!-- END CONTAINER -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper-row">
            <div class="page-wrapper-bottom">
                <!-- BEGIN FOOTER -->
                <!-- BEGIN INNER FOOTER -->
                <?php $this->load->view('base/footeradmin'); ?>
                <!-- END INNER FOOTER -->
                <!-- END FOOTER -->
            </div>
        </div>

        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
