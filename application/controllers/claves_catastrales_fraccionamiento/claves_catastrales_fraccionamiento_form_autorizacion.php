<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$identificacion = '';
$rpredial = '';
$nooficial = '';
$identificacionar = '';
$rpredialar = '';
$nooficialar = '';
foreach ($predial->result() as $row) {
    $rpredial .= $row->tipo_documento;
    $rpredialar .= $row->archivo;
}

foreach ($INE->result() as $row) {
    $identificacion .= $row->tipo_documento;
    $identificacionar .= $row->archivo;
}
foreach ($noficial->result() as $row) {
    $nooficial .= $row->tipo_documento;
    $nooficialar .= $row->archivo;
//    die(print_r($row, TRUE));
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" ng-app="Aplicacion">
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
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <link href="<?php echo base_url(); ?>assets/apps/css/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/enjoyhint.css" rel="stylesheet" type="text/css" />
        <style>
            label{
                font-size: 12pt;
            }
            h4{
                font-size: 18pt;
            }
            h5{
                font-size: 14pt;
            }
        </style>
    </head>

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
                                    <div class="page-title">
                                        <h1>Claves Catastrales Fraccionamientos</h1>
                                    </div>

                                </div>
                            </div>
                            <!-- END PAGE HEAD-->

                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <br>
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li class="active">
                                            <a data-toggle="tab" class="step" aria-expanded="true">

                                                <b>Claves Catastrales Fraccionamientos</b><i class="fa fa-check"></i></span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!--<h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>-->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="bold">Documento Elaborado por:</label><br>
                                                <label><?php echo $func->nombres . " " . $func->apellido_pat . " " . $func->apellido_mat; ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="bold">Fecha de Inicio de trámite</label><br>
                                                <label><?php echo date("d/m/Y", strtotime("" . $fechainicio)); ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="bold">Fecha y Hora de Fin de trámite</label><br>
                                                <label><?php echo date("d/m/Y h:m A", strtotime("" . $fechafinal)); ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="bold">Tiempo desde que inicio el trámite</label><br>



                                                <?php
                                                $dfeha1 = date("Y-m-d");

                                                $dfeha2 = date($fechainicio);

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

                                                if ($contadordias <= 0):
                                                    ?>
                                                    <label style="text-align:center;  background:rgba(44, 181, 44, 0.8);">

                                                        <?php
                                                        echo $contadordias . ' días';
                                                        ?>
                                                    </label>
                                                <?php elseif ($contadordias == 1): ?>
                                                    <label style="text-align:center;  background:rgba(44, 181, 44, 0.8);">
                                                        <?php
                                                        echo $contadordias . ' días';
                                                        ?>
                                                    </label>
                                                <?php elseif ($contadordias == 2): ?>
                                                    <td style="text-align:center; background: rgba(255, 100, 0, 0.8);">
                                                        <?php
                                                        echo $contadordias . ' días';
                                                        ?>
                                                        </label>
                                                    <?php else: ?>
                                                        <label style="text-align:center;  background:rgba(255, 0, 0, 0.7);">
                                                            <?php
                                                            echo $contadordias . ' días';
                                                            ?>
                                                        </label>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                        <hr>

                                        <?php
                                        $file = "assets/tramites/clavescatastralesfraccionamiento/" . $doctofinal;
//                                       echo $file;
                                        if ($doctofinal) {
                                            if (file_exists($file)) {
                                                ?>
                                                <div class="row">     
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <iframe  class="center" src="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctofinal; ?>" width="100%" height="800" frameborder="2"></iframe>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                                <div class=" form-group col-md-12">
                                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                    <button type="submit" id="solicitar" class="btn btn-primary"><?php echo $button ?></button>
 <a href="<?php echo base_url(); ?>Claves_catastrales_fraccionamiento/validar" class="btn btn-primary">Cancelar</a>
                                                            <!--<a href="<?php echo base_url(); ?>Claves_catastrales_fraccionamiento/validar" class="btn btn-primary">Cancelar</a>-->

                                                </div>

                                            <?php } else { ?>
                                                <div class="row">     
                                                    <div class="col-md-12 center-align">
                                                        <h4 style="text-align: center;">
                                                            Archivo Final No Encontrado.
                                                        </h4>
                                                    </div>
                                                </div>
     <div class=" form-group col-md-12">

                                            <a href="<?php echo base_url(); ?>Claves_catastrales_fraccionamiento/validar" class="btn btn-primary">Cancelar</a>

                                        </div>    

                                            <?php
                                            }
                                        }
                                        ?>
                                   
                                    </form>
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
        <div class="quick-nav-overlay"></div>
        <div class="modal fade" id="pago" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Documento de pago </h4>
                    </div>
                    <form ng-controller="PrimeraApp"   action="<?php echo base_url() . 'docstramites/documentoanuncio/documentopagofraccionamiento/' . $ID ?>" method="post">
                        <div clas="modal-body"> 
                            <div class="container">
                                <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Cantidad</label>
                                        <input ng-change="totalpago(cobro.cantidad, '')" class="form-control" step="1" min="0" type="number" ng-model="cobro.cantidad" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tipo de pago</label>
                                        <select ng-change="totalpago('', cobro.descripcion)" class="form-control" ng-model="cobro.descripcion"  >
                                            <option value="">---Seleccione Tipo De Pago---</option>
                                            <?php foreach ($costo as $costot): ?>
                                                <option value="<?php echo $costot->descripcion . "&" . $costot->costo_base . "&" . $costot->costo_tram; ?>"><?php echo $costot->descripcion; ?></option>
<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Total</label>
                                        <input class="form-control" readonly="" value="{{cobro.precio| number:2}}" >
                                    </div>
                                    <div class="form-group col-md-2">
                                        <br>
                                        <a class="btn btn-primary" ng-click="addcuenta();">Agregar</a>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-md-12">
                                        <div class="col-md-6 ">Descripcion</div>
                                        <div class="col-md-2 ">Cantidad</div>
                                        <div class="col-md-2">Costo</div>
                                        <div class="col-md-2">Total</div>
                                    </div>
                                    <div class="col-md-12" ng-repeat="pagos in pago">
                                        <div class="col-md-6">{{pagos.descripcion}}
                                            <input type="hidden" name="pago[{{$index}}]" value="{{pagos.descripcion}}&{{pagos.cantidad}}&{{pagos.costo}}&{{pagos.total| number :2 }}">
                                        </div>
                                        <div class="col-md-2">{{pagos.cantidad}}</div>
                                        <div class="col-md-2">{{pagos.costo}}</div>
                                        <div class="col-md-1">{{pagos.total| number :2 }}</div>
                                        <div class="col-md-1"><a ng-click="eliminar(pagos);"><i class="fa fa-close" ></i></a></div>
                                    </div>  
                                    <div class="col-md-12" >
                                        <div class="col-md-6"></div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">Total : </div>
                                        <div class="col-md-1">{{totalpagos|number :2}}
                                            <input type="hidden" name="totalpago" value="{{totalpagos|number :2}}"></div>
                                        <div class="col-md-1"></div>
                                    </div> 
                                </div>
                            </div>  
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">Generar Documento Final</button>
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos del Documento Final</h4>
                    </div>
                    <div class="modal-body"> 
                        <div class="container" style="    border: 2px solid #a1a1a1;
                             padding: 10px 40px; 


                             border-radius: 25px; text-align: center;">
                            <form  id="subir" class="dropzone"action="<?php echo base_url(); ?>docstramites/documentoclave/imagenfraccionamiento/<?php echo $ID; ?>" method="post">


                                <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                <div class="row">
                                    <div class="dz-default dz-message" id="mensaje">
                                        <span>
                                            <span class="bigger-150 bolder">
                                                <i class="ace-icon fa fa-caret-right red"></i>
                                                Arrastra tu archivo aquí
                                            </span> para gardar			
                                            <span class="smaller-80 grey">(o da Click aquí para seleccionar tu imagen)</span> 
                                            <br> 
                                            <br> 
                                            <br> 
                                            <i class="upload-icon ace-icon fa fa-cloud-upload fa-3x red"></i>
                                        </span>
                                    </div>
                                    <div class="dropzone_preview" id="dz-preview">

                                    </div>
                                </div>
                                <button id="clear-dropzone" type="button" class='btn btn-md btn-danger hidden'>Cambiar Archivo</button>
                                <!--<button id="clear-dropzone">Clear Dropzone</button>-->
                            </form>
                        </div>


                        <form  target="_blank"  action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalfraccionamiento_vista" method="post">

                            <div class="container">

                                <div class="row">
                                    <div class="form-group col-md-12" >
                                        <div class="form-group" >
                                            <h4>Complete los campos marcados con(*)</h4>
                                        </div>
                                        <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                        <table class="table table-bordered" border="1">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-6">
                                                                <label for="date">Fecha de Solicitud </label>
                                                                <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                    <input class="form-control" placeholder="fecha de solicitud" required type="text" name="fecha" id="iniciofacturacion"><span class="input-group-btn">
                                                                        <button class="btn btn-primary btn-outline" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Superficie del terreno en mts *</label>
                                                                <input required name="sup" placeholder="superficie" value="" class="form-control"  type="number" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="form-group col-md-6">
                                                                <label for="varchar"> Nombre del propietario *</label>
                                                                <input required name="" placeholder="Nombre" class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Caracter  *</label>
                                                                <input required name="caracter" placeholder="caracter " value="" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Número de Escritura Pública *</label>
                                                                <input required name="no_escritura" placeholder="Número Escritura" value="" class="form-control" value=""/>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="date">Fecha de escrituras *</label>
                                                                <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                    <input class="form-control" placeholder="fecha de escrituras" required type="text" name="fecha_escritura"><span class="input-group-btn">
                                                                        <button class="btn btn-primary btn-outline" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="varchar"> Nombre del notario público *</label>
                                                                <input required name="notario" placeholder="Nombre del Notario Público " value="" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar">Numero de notario público *</label>
                                                                <input required name="no_notario" placeholder="Número de Notario Público " value="" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Clave Catastral *</label>
                                                                <input required name="clave" placeholder="Clave Catastral" class="form-control" value="<?php echo $clave; ?>" pattern= "[0-9]{15,18}"  maxlength="18" minlength="15"/>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Numero de expediente *</label>
                                                                <input required name="numero_exp" placeholder="Número de Expediente " value="" class="form-control" />
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="date">Fecha de Expedición * </label>
                                                                <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                    <input class="form-control" placeholder="fecha de expedición" required type="text" name="fecha_exp" ><span class="input-group-btn">
                                                                        <button class="btn btn-primary btn-outline" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="container">
                                <div class="pull-right">
                                    <button class="btn btn-success" id="submit-all">Generar Documento </button>

                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/underscore-min.js" type="text/javascript"></script>
        <!-- MAPA -->
        <script>
                                                $(document).ready(function () {

                                                var dato = $('#divestatus').val();
                                                if (dato == 4 || dato == 6) {
                                                $("#hiddendoctopago").show();
                                                } else {
                                                $("#hiddendoctopago").hide();
                                                }

                                                $("#status").change(function () {
                                                //alert("HOLA");
                                                var dato = $('select[id=status]').val();
                                                if (dato == 4) {
                                                $("#hiddendoctopago").show();
                                                } else {
                                                $("#hiddendoctopago").hide();
                                                }

                                                if (dato == 6) {
                                                $("#hiddendoctopago").show();
                                                $("#hiddendoctofinal").show();
                                                } else {
                                                $("#hiddendoctofinal").hide();
                                                }

                                                });
                                                $('#nooficialui').keyup(function () {
                                                //geocodeAddress(geocoder, map);
                                                //nooficial
                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                                                initMap();
                                                //calleui
                                                });
                                                $('#calleui').keyup(function () {
                                                //geocodeAddress(geocoder, map);
                                                //nooficial
                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                                                initMap();
                                                //calleui
                                                });
                                                });
        </script>

        <script>
            //20.6547575, -101.36542910000003

            function initMap() {
            //setTimeout("initMap()",10000);
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
                    center: {lat: 20.6767222, lng: - 101.3681677}
            });
            var geocoder = new google.maps.Geocoder();
            var noPoi = [
            {
            featureType: "poi",
                    stylers: [
                    {visibility: "off"}
                    ]
            }
            ];
            map.setOptions({styles: noPoi});
            geocodeAddress(geocoder, map);
//                document.getElementById('buscardir').addEventListener('click', function () {
//                    geocodeAddress(geocoder, map);
//                });
            }

            function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
            map: resultsMap,
                    draggable: true,
                    position: results[0].geometry.location
            });
            //document.getElementById("address").value = results[0].geometry.location;
            resultsMap.addListener('mousemove', function () {
            document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
            });
            } else {
            //alert('Geocode was not successful for the following reason: ' + status);
            }
            });
            }
        </script>
        <script>
            $(document).ready(function () {
            if ($('#ipropietariosi').is(':checked')) {
            $("#ipropietariono").prop('checked', false);
            $('#datosp').addClass('hidden');
            } else if ($('#ipropietariono').is(':checked')) {
            $('#datosp').removeClass('hidden');
            $("#ipropietariosi").prop('checked', false);
            }

            if ($('#tipopersonafi').is(':checked')) {

            $('#fisrfc').addClass('hidden');
            $('#morine').removeClass('hidden');
            } else {
            $('#fisrfc').removeClass('hidden');
            $('#morine').addClass('hidden');
            }
            if ($('#tipopersonamo').is(':checked')) {
            $('#fisrfc').removeClass('hidden');
            $('#morine').addClass('hidden');
            } else {
            $('#fisrfc').addClass('hidden');
            $('#morine').removeClass('hidden');
            }
            if ($('#domisiliono').is(':checked')) {
            $('#datosnot').addClass('hidden');
            $('#btncopy').addClass('hidden');
            } else {
            $('#datosnot').removeClass('hidden');
            $('#btncopy').removeClass('hidden');
            }
            if ($('#domisiliosi').is(':checked')) {
            $('#datosnot').removeClass('hidden');
            $('#btncopy').removeClass('hidden');
            } else {
            $('#datosnot').addClass('hidden');
            $('#btncopy').addClass('hidden');
            }
            });
            $("#domisiliosi").on("click", function () {
            if ($("#domisiliosi").is(':checked')) {
            $("#domisiliono").prop('checked', false);
            $('#datosnot').removeClass('hidden');
            $('#btncopy').removeClass('hidden');
            } else {
            $("#domisiliono").prop('checked', true);
            $('#datosnot').addClass('hidden');
            $('#btncopy').addClass('hidden');
            }
            });
            $("#domisiliono").on("click", function () {
            if ($("#domisiliono").is(':checked')) {
            $("#domisiliosi").prop('checked', false);
            $('#datosnot').addClass('hidden');
            $('#btncopy').addClass('hidden');
            } else {
            $("#domisiliosi").prop('checked', true);
            $('#datosnot').removeClass('hidden');
            $('#btncopy').removeClass('hidden');
            }
            });
            $("#ipropietariosi").on("click", function () {
            if ($("#ipropietariosi").is(':checked')) {
            if ($("#datosp").hasClass('hidden')) {

            } else {
            $("#datosp").addClass('hidden');
            $("#ipropietariono").prop('checked', false);
            }
            } else {
            if ($("#datosp").hasClass('hidden')) {
            $("#datosp").removeClass('hidden');
            $("#ipropietariono").prop('checked', true);
            } else {

            }

            }
            });
            $("#ipropietariono").on("click", function () {
            if ($("#ipropietariono").is(':checked')) {
            if ($("#datosp").hasClass('hidden')) {
            $("#datosp").removeClass('hidden');
            $("#ipropietariosi").prop('checked', false);
            } else {

            }
            } else {
            if ($("#datosp").hasClass('hidden')) {

            } else {
            $("#datosp").addClass('hidden');
            $("#ipropietariosi").prop('checked', true);
            }

            }
            });
            $("#tipopersonafi").on("click", function () {
            if ($("#tipopersonafi").is(':checked')) {
            $('#fisrfc').addClass('hidden');
            $('#morine').removeClass('hidden');
            $("#tipopersonamo").prop('checked', false);
            } else
            {
            $('#fisrfc').removeClass('hidden');
            $('#morine').addClass('hidden');
            $("#tipopersonamo").prop('checked', true);
            }
            });
            $("#tipopersonamo").on("click", function () {
            if ($("#tipopersonamo").is(':checked')) {
            $('#fisrfc').removeClass('hidden');
            $('#morine').addClass('hidden');
            $("#tipopersonafi").prop('checked', false);
            } else
            {
            $("#tipopersonafi").prop('checked', true);
            $('#fisrfc').addClass('hidden');
            $('#morine').removeClass('hidden');
            }
            });
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>
        <script>
            $(document).ready(function () {
            Dropzone.options.subir = {

            maxFiles: 1,
                    acceptedFiles: "image/*",
                    init: function () {

                    this.on("removedfile", function (file) {
                    $('#clear-dropzone').addClass("hidden");
                    });
                    this.on("addedfile", function (file) {
                    $('#mensaje').addClass("hidden");
                    $(".dz-success-mark").addClass("hidden"); //dz-error-mark
                    $(".dz-error-mark").addClass("hidden"); //dz-error-mark
                    });
                    this.on("success", function (file, responseText) {
                    alert(responseText);
                    });
                    this.on('sendingmultiple', function (data, xhr, formData) {
                    //                        formData.append("Username", $("#Username").val());
                    });
                    this.on("complete", function (file) {
                    $('#clear-dropzone').removeClass("hidden");
                    });
                    var _this = this;
                    // Setup the observer for the button.
                    document.querySelector("button#clear-dropzone").addEventListener("click", function () {
                    // Using "_this" here, because "this" doesn't point to the dropzone anymore
                    _this.removeAllFiles();
                    $('#mensaje').removeClass("hidden");
                    // If you want to cancel uploads as well, you
                    // could also call _this.removeAllFiles(true);
                    });
                    }
            };
            });
        </script>
        <script>

            function iniciarAyuda() {

            var enjoyhint_instance = new EnjoyHint({});
            var enjoyhint_script_steps = [
            {
            "next #ayuda": 'Bienvenido al Trámite de Clave Catastral Fraccionamiento.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona "Siguiente".',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso1": 'Para Comenzar indicar si la persona solicitante es el propietario del inmueble .<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso2": 'Indique el numero de cuenta predial del inmueble este se encuentra en el recibo predial.<br> en la siguiente sección del recibo:<br><br><img src="<?php echo base_url() . "assets/recpre.png" ?>"><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso3": 'Ingrese los datos de localización del predio tal como aparecen en el recibo predial.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso4": 'Indique los siguientes datos del predio como aparecen en el recibo predial<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso5": '<span style="color:black;" >Por favor indica con el puntero rojo la ubicación de tu predio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso6": 'Indique el nombre completo del propietario del predio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso7": 'Selecciones si, deseas recibir notificaciones del trámite en otro domicilio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso9": 'Ingrese los datos de contacto para recibir notificaciones del tramite.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
                    ,
            {
            "next #paso9a": '<br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            {
            "next #paso10": '<span style="color:black;">Adjunte los documentos originales escaneados en archivos .PDF o Imagenes.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #solicitar": 'Cuando usted haya capturado todos los datos de click en Solicitar Trámite,<br> a continuación se guardaran los datos capturados <br>y se notificará via correo electrónico cualquier actualización del trámite.<br>De click en "Finalizar" para concluir el tutorial..',
                    "nextButton": {text: "Finalizar"},
                    showSkip: false
            }

            ];
            enjoyhint_instance.set(enjoyhint_script_steps);
            enjoyhint_instance.run();
            }
        </script>


        <script>

            $('#clavenueva').keyup(function (e) {

            var Clave = $('#clavenueva').val();
            if (Clave.length == 18) {
            $.ajax({
            url: "../bclave",
                    data: {clave: "" + Clave},
                    type: "POST",
                    dataType: 'json',
                    success: function (respuesta) {
                    if (respuesta > 0) {
                    alert("La Clave Catastral ya se encuenta en el sistema");
                    } else {
                    alert("La Clave Catastral No se encuentra en el sistema");
                    }
                    }
            });
            }
            });
            $('#predialui').keyup(function (e) {

            var Clave = $('#predialui').val();
            if (Clave.length == 12) {
            $.ajax({
            url: "../claves_catastrales_individual/predial",
                    data: {predial: "" + Clave},
                    type: "POST",
                    dataType: 'json',
                    success: function (respuesta) {
                    if (respuesta) {
                    $('#calleui').val(respuesta.calle_ubicacion);
                    $('#nooficialui').val(respuesta.no_exterior_ubicacion);
                    $('#nooficialuin').val(respuesta.no_interior_ubicacion);
                    $('#cbocoloniaui').val(respuesta.colonia_ubicacion);
                    $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato, Guanajuato");
                    initMap();
                    } else {
                    $('#calleui').val("");
                    $('#nooficialui').val("");
                    $('#nooficialuin').val("");
                    $('#cbocoloniaui').val("");
                    }
                    }
            });
            }
            });
        </script>
        <script>
            function Pago(Descripcion, Cantidad, Costo, Total) {
            this.descripcion = Descripcion;
            this.cantidad = Cantidad;
            this.costo = Costo;
            this.total = Total;
            }

            angular.module("Aplicacion", []).controller("PrimeraApp", function ($scope) {
<?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 3): ?>
                $scope.pago = [];
                $scope.cobro = {};
                $scope.datos;
                $scope.totalpagos = 0;
                $scope.limite = <?php echo $cantidad != "" ? $cantidad : 0; ?>;
                $scope.addcuenta = function () {
                if ($scope.cobro.cantidad > 0 && $scope.cobro.descripcion) {
                if ($scope.pago.length > 0) {
                var to = 0;
                $.map($scope.pago, function (a) {
                to = to + a.cantidad;
                });
                if (to < $scope.limite && (to + $scope.cobro.cantidad) <= $scope.limite) {
                var b = $scope.cobro.descripcion.split('&');
                $scope.datos = _.findWhere($scope.pago, {descripcion: "" + b[0]});
                if ($scope.datos) {

                $scope.datos.cantidad = $scope.datos.cantidad + $scope.cobro.cantidad;
                $scope.datos.total = $scope.datos.total + $scope.cobro.precio;
                $scope.cobro = {};
                } else {
                var s = $scope.cobro.descripcion.split('&');
                $scope.pago.push(new Pago(s[0], $scope.cobro.cantidad, (parseFloat(s[1]) + parseFloat(s[2])), $scope.cobro.precio));
                $scope.cobro = {};
                }
                } else {
                alert("La cantidad de cobro excede a  la cantidad de los documentos expedidos");
                }
                } else {
                if ($scope.cobro.cantidad > $scope.limite) {
                alert("La cantidad de cobro excede a  la cantidad de los documentos expedidos");
                } else {
                var s = $scope.cobro.descripcion.split('&');
                $scope.pago.push(new Pago(s[0], $scope.cobro.cantidad, (parseFloat(s[1]) + parseFloat(s[2])), $scope.cobro.precio));
                $scope.cobro = {};
                }
                }
                }
                $scope.apply();
                };
                $scope.totalpago = function (cantidad, descripcion) {
                if (cantidad != "") {
                if ($scope.cobro.descripcion) {
                var desc = $scope.cobro.descripcion
                        var aux = desc.split('&');
                $scope.cobro.precio = $scope.cobro.cantidad * (parseFloat(aux[1]) + parseFloat(aux[2]));
                } else {

                }
                } else {
                if ($scope.cobro.cantidad) {
                var desc = $scope.cobro.descripcion
                        var aux = desc.split('&');
                var s = parseFloat(aux[1]) + parseFloat(aux[2]);
                var t = $scope.cobro.cantidad * s;
                $scope.cobro.precio = t;
                }
                }
                };
                $scope.eliminar = function (item) {
                var index = $scope.pago.indexOf(item);
                $scope.pago.splice(index, 1);
                $scope.apply();
                };
                $scope.apply = function () {
                var sum = 0;
                $.each($scope.pago, function (a, b) {
                sum = sum + b.total;
                });
                $scope.totalpagos = sum;
                };
<?php endif; ?>
            });
        </script> 
    </body>
</html>
