<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php  ?>
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <?php $this->load->view('base/header'); ?>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE TITLE -->

                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 8px" id="message">
                                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-right">
                                        </div>
                                    </div>
                                    
                                    <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_fraccionamiento" class="btn btn-primary">Regresar</a>
                                    <div class='portlet box blue'>
                                      <div class='portlet-title'>
                                        <div class='caption'>
                                          <i class='icon-book-open'></i>
                                       Trámites a Autorizar
                                        </div>
                                      <div class='tools'>
                                      </div>
                                    </div>
                                   </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <form action="" method="get"> 
                                            <div class="form-group col-md-12"><label class="bold">Buscar N° de Seguimiento</label>
                                                <div class="input-group col-md-4">

                                                    <input class="form-control " type="text" name="q"> <span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button></span>

                                                </div>




                                            </div>  
                                        </form>
                                    </div>
                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                <tr>
                                <th>Nombre del Propietario</th>
                                <th>Estatus</th>
                                <th>N° Seguimiento</th>
                                <th>clave</th>
                                <th>Acción</th>
                                        </tr><?php
                                        foreach ($Claves_catastrales_fraccionamiento_data as $claves_catastrales_individual)
                                        {?>
                                             <tr>
                                             
                                                 
                                             <td><?php echo $claves_catastrales_individual->nombrepropietariodp ?></td>
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
                                              
                                                   <?php echo $claves_catastrales_individual->numerocontrol ;?>
                                             </td>
                                              <td style="text-align:center" width="200px">
                                              
                                                   <?php echo$claves_catastrales_individual->clave ;?>
                                             </td>
                                             <td style="text-align:center" width="200px">
                                               <?php
                                               //echo anchor(site_url('permiso_anuncios_adosados/read/'.$permiso_anuncios_adosados->ID),'Read');
                                               //echo ' | ';
                                               echo anchor(site_url('Claves_catastrales_fraccionamiento/autorizar_tram/'.$claves_catastrales_individual->ID),'Validar');
                                               ?>
                                             </td>
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
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>

            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                        <?php $this->load->view('base/footer'); ?>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>

        <!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
