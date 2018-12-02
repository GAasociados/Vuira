

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
                        <a href="/contratacion_y_servicios_de_agua_y_drenaje_domestico/">
                            <i class="glyph-icon icon-home"></i>
                            <span>Contrato Agua </span>
                        </a>
                    </li>
    
                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/contratacion_y_servicios_de_agua_y_drenaje_domestico/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reporte Contratos</h6></span>
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
                    <h2>Resultados Reporte Contratación de Servicios de Agua y Drenaje Doméstico</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                   <a href="<?php echo base_url(); ?>contratacion_y_servicios_de_agua_y_drenaje_domestico/reportes" class="btn btn-danger glyph-icon icon-times">Cancelar Búsqueda</a>
                                    <div class="table-scrollable">

                                        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 10px">
                                            <tr>
                                                <th>Inicio del Trámite</th>
                                                <th>Término del Trámite</th>
                                                <th>Solicitud</th>
                                                <th>Nombre del Solicitante</th>
                                                <th>Colonia</th>
                                                <th>Calle</th>
                                                <th>Núm. Exterior</th>
                                                <th>Núm. Interior</th>
                                                <th>Calle de Referencia 1</th>
                                                <th>Calle de Referencia 2</th>
                                                <th>Cuenta con Conexción</th>
                                                <th>Cuenta con Medidor</th>
                                                <th>Número de Medidor</th>
                                                <th>Lectura de Medidor</th>
                                                <th>Observaciones del Ciudadano</th>
                                                <th>Nombre del Propietario</th>
                                                <th>RFC</th>
                                                <th>Colonia del Propietario</th>
                                                <th>Calle del Propietario</th>
                                                <th>Número Exterior</th>
                                                <th>Número Interior</th>
                                                <th>Teléfono</th>
                                                <th>Celular</th>
                                                <th>Correo</th>
                                                <th>Giro o Actividad</th>
                                                <th>Tipo de Servicio</th>
                                                <th>Servicios con los que Cuenta</th>
                                                <th>Servicios que Solicita</th>
                                                <th>Condiciones Generales</th>
                                                <th>Cuenta Ligada</th>
                                                <th>Diametro de la Toma</th>
                                                <th>Inicio de Facturación</th>
                                                <th>Documento Predial</th>
                                            
                                                <th>Documento (IFE,INE,Cédula Profecional)</th>
                                                <th>Documento Pago</th>
                                                <th>Documento Final</th>
                                                <th>Estatus</th>
                                            </tr><?php
                                            foreach ($contratacion_y_servicios_de_agua_y_drenaje_domestico_data as $contratacion_y_servicios_de_agua_y_drenaje_domestico) {
                                                if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->fechainicio == "0000-00-00") {
                                                                echo "El trámite aún no ha Iniciado";
                                                            } else {
                                                                echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->fechainicio;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->fechafinal == "0000-00-00") {
                                                                echo "El trámite aún no ha finalizado";
                                                            } else {
                                                                echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->fechafinal;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->solicitud; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombre; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->coloniaubicacion; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->calle; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numeroext; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numeroint; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->callereferencia1; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->callereferencia2; ?></td>
                                                        <td>
                                                            <?php echo ($contratacion_y_servicios_de_agua_y_drenaje_domestico->conexion) ? "Si" : "No";
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($contratacion_y_servicios_de_agua_y_drenaje_domestico->medidor) ? "Si" : "No";
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nomedidor; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->lectura; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->observaciones; ?></td>
                                                        <td><?php
                                                            echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nombrepropietario . " " . $contratacion_y_servicios_de_agua_y_drenaje_domestico->apaterno . " " . $contratacion_y_servicios_de_agua_y_drenaje_domestico->amaterno;
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->rfc; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->coloniapropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->callepropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numeroextpropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->numerointpropietario; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->telefono; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->nocelular; ?></td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->correo; ?></td>
                                                        <td>Casa Habitación</td>
                                                        <td><?php
                                                            echo ($contratacion_y_servicios_de_agua_y_drenaje_domestico->tiposervicio) ? "Doméstico" : "Mixto(Casa con Comercio)";
                                                            ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->servicioscuenta) {
                                                                case '1':
                                                                    echo "Agua";
                                                                    break;

                                                                case '2':
                                                                    echo "Drenaje";
                                                                    break;

                                                                case '3':
                                                                    echo "Ambos Servicios";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->serviciossolicita) {
                                                                case '1':
                                                                    echo "Agua";
                                                                    break;

                                                                case '2':
                                                                    echo "Drenaje";
                                                                    break;

                                                                case '3':
                                                                    echo "Ambos Servicios";
                                                                    break;

                                                                default:
                                                                    echo "Ninguno";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->condicionesgenerales) {
                                                                case '1':
                                                                    echo "Habitado";
                                                                    break;

                                                                case '2':
                                                                    echo "Deshabitado";
                                                                    break;

                                                                case '3':
                                                                    echo "Obra Negra";
                                                                    break;

                                                                default:
                                                                    echo "Lote Baldio";
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->cuentaligada; ?></td>
                                                        <td>1/2</td>
                                                        <td><?php echo $contratacion_y_servicios_de_agua_y_drenaje_domestico->iniciofacturacion; ?></td>
                                                        <td>
                                                            <?php
                                                            if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopredial)) {
                                                                echo "Sin Archivo";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopredial . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>
                                                      
                                                        <td>
                                                            <?php
                                                            if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctoife)) {
                                                                echo "Sin Archivo";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $contratacion_y_servicios_de_agua_y_drenaje_domestico->doctoife . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (empty($contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopago)) {
                                                                echo "Sin Archivo";
                                                            } else {
                                                                echo "<a href='" . base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $contratacion_y_servicios_de_agua_y_drenaje_domestico->doctopago . "'>Descargar<a>";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if ($contratacion_y_servicios_de_agua_y_drenaje_domestico->status == 6):
                                                                echo anchor(site_url('docstramites/documentojapami/documentofinal/' . $contratacion_y_servicios_de_agua_y_drenaje_domestico->ID), 'Descargar Contrato');
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($contratacion_y_servicios_de_agua_y_drenaje_domestico->status) {

                                                                case '1':
                                                                    echo "Iniciado";
                                                                    break;

                                                                case '4':
                                                                    echo "Termindado y En Espera de Pago";
                                                                    break;
                                                                case '5':
                                                                    echo "Cancelado";

                                                                case '6':
                                                                    echo "Terminado";
                                                                    break;
                                                                default :
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
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

        
</html> 