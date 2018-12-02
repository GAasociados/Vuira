

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">

              <title>Trámites y Servicios</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!--#region CSS  -->
        <?php $this->load->view('base/admin'); ?>
        <!--#endregion -->
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

                    <a class="header-btn iconos" id="logout-btn"href="<?php echo base_url(); ?>login/logout" title="Bloquear">
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
                        <a class="sf-with-ul" href="/claves_catastrales_individual/reportes" title="MenU 2">
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
        <!--#endregion Menú  -->

        <!-- FIN page-sidebar -->


        <!-- BEGIN PAGE TITLE -->
  
        <!-- END PAGE TITLE -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                    <h2>
<!--                        Mis Trámites-->
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

                                                    <input class="form-control " type="text" name="q"> <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i> Buscar</button></span>

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
                                            <th>Acción</th>
                                        </tr><?php
                                        foreach ($claves_catastrales_individual_data as $claves_catastrales_individual) {
                                            if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) {
                                                ?>
                                                <?php if ($claves_catastrales_individual->notificacion == 1) { ?>
                                                    <tr class="note note-warning">
                                                    <?php } else { ?>
                                                    <tr>
                                                    <?php } ?>
                                                        <td><?php echo $claves_catastrales_individual->numerocontrol; ?></td>
                                                    <td><?php echo $claves_catastrales_individual->nombrepropietariodp ?></td>
                                                    <td>
                                                        <?php /*
                                                        if (empty($claves_catastrales_individual->doctofinal)) {
                                                            echo "El Documento Final Se Subirá Cuando " .
                                                            "El Proceso Del Trámite Esté Terminado";
                                                        } else {
                                                            echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                        }*/
                                                        ?>
                                                        <?php
                                                        if($claves_catastrales_individual->status=="4")
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

                                                           $contadordias +=1;
                                                        }
                                                    }

                                                   
//                                            
                                                    if ($contadordias <= 0):
                                                        ?>
                                                        <td style="text-align:center;  background:rgba(44, 181, 44, 0.8);">

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
                                                    <?php elseif ($contadordias == 1): ?>
                                                        <td style="text-align:center;  background:rgba(44, 181, 44, 0.8);">
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
                                                    <?php elseif ($contadordias == 2): ?>
                                                        <td style="text-align:center; background: rgba(255, 100, 0, 0.8);">
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
                                                    <?php else: ?>
                                                        <td style="text-align:center;  background:rgba(255, 0, 0, 0.8);">
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
                                                    <?php endif; ?>
                                                    <td style="text-align:center" width="200px">
                                                        <?php
                                                        //echo anchor(site_url('permiso_anuncios_adosados/read/'.$permiso_anuncios_adosados->ID),'Read');
                                                        //echo ' | ';
                                                        echo anchor(site_url('claves_catastrales_individual/update_ventanilla/' . $claves_catastrales_individual->ID), '<button class="btn btn-info"><i class=" glyph-icon icon-refresh"></i> Actualizar</button>');
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
                                                        <td><?php echo $claves_catastrales_individual->nombrepropietariodp ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($claves_catastrales_individual->doctofinal)) {
                                                                echo "El Documento Final Se Subirá Cuando " .
                                                                "El Proceso Del Trámite Esté Terminado";
                                                            } else {
                                                                if ($claves_catastrales_individual->validacion == 1) {
                                                                    echo "<a href='" . base_url() . "assets/tramites/clavescatastralesindividual/" . $claves_catastrales_individual->doctofinal . "'>Descargar<a>";
                                                                } else {
                                                                   echo "El Documento Final Esta en Proceso de Autorización";
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

                                                           $contadordias +=1;
                                                        }
                                                    }

                                                   
//                                            
                                                    if ($contadordias <= 0):
                                                        ?>
                                                        <td style="text-align:center;  background:rgba(44, 181, 44, 0.8);">

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
                                                    <?php elseif ($contadordias == 1): ?>
                                                        <td style="text-align:center;  background:rgba(44, 181, 44, 0.8);">
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
                                                    <?php elseif ($contadordias == 2): ?>
                                                        <td style="text-align:center; background: rgba(255, 100, 0, 0.8);">
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
                                                    <?php else: ?>
                                                        <td style="text-align:center;  background:rgba(255, 0, 0, 0.8);">
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
                                                    <?php endif; ?>
                                                        <td style="text-align:center" width="200px">
                                                            <?php
                                                            if ($claves_catastrales_individual->status < 4) {
                                                                echo anchor(site_url('claves_catastrales_individual/update/' . $claves_catastrales_individual->ID), 'Actualizar');
                                                            } else if ($claves_catastrales_individual->status == 4) {
                                                                echo anchor(site_url('claves_catastrales_individual/vistapago/' . $claves_catastrales_individual->ID), 'Realizar Pago');
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