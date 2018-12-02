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
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Única Irapuato</title>
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
        <link href="<?php echo base_url(); ?>assets/global/css/enjoyhint.css" rel="stylesheet" type="text/css" />

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
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
                                        <h1>Contratación de Servicios de Agua y Drenaje Doméstico</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
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

                                                <span class="desc">
                                                    <b>Contratación de Servicios de Agua y Drenaje Doméstico</b><i class="fa fa-check"></i></span>
                                            </a>
                                        </li>
                                    </ul>


                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3) { ?>


                                            <div class="row" id="paso7">
                                                <div class="form-group"> 
                                                    <div class="col-md-12">
                                                        <h4 class="block bold">Datos Del Propietario</h4>
                                                    </div>



                                                    <div class="form-group col-md-4">
                                                        <label  class="bold" for="varchar">Nombre Propietario </label>
                                                        <br> <label><?php echo $nombrepropietario . " " . $apaterno . " " . $amaterno; ?></label>

                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="bold" for="varchar">Rfc</label>   <br>
                                                        <label><?php echo $rfc; ?></label>

                                                    </div>


                                                    <div class="form-group col-md-3">
                                                        <label  class="bold" for="varchar"> Colonia </label><br>


                                                        <?php
                                                        //Si ya guardaste una colonia y no está vacío
                                                        if (!empty($coloniapropietario)):

                                                            $arraycolonia = $this->Colonias_japami_model->getalladatacoloniabyid($coloniapropietario);
                                                            //Regresa toda la informacion de la colonia de japami
                                                            ?>

                                                            <label><?php echo $arraycolonia->NOMBRE; ?></label>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label  class="bold" for="varchar">Calle </label><br>





                                                        <?php
                                                        //Si ya guardaste una colonia y no está vacío
                                                        if (!empty($callepropietario)):

                                                            $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callepropietario);
                                                            //Regresa toda la informacion de la colonia de japami
                                                            ?>

                                                            <label><?php echo $arraycolonia->NOMBRE; ?></label>

                                                        <?php endif; ?>



                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label  class="bold" for="varchar">Número Exterior </label><br>
                                                        <label><?php echo $numeroextpropietario; ?></label>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label  class="bold" for="varchar">Número Interior </label><br>
                                                        <label><?php echo $numerointpropietario; ?> </label>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row" id="paso8">
                                                <div class="form-group">
                                                    <div class="form-group col-md-4">

                                                        <label  class="bold" for="varchar">Telefono </label><br>
                                                        <label><?php echo $telefono; ?> </label>

                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label  class="bold" for="varchar">Número Celular </label><br>

                                                        <label><?php echo $nocelular; ?> </label>

                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar" class="bold">Correo </label><br>
                                                        <label><?php echo $correo; ?> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="paso9">
                                                <div class="form-gruop">

                                                    <div class="form-group col-md-2">
                                                        <label class="bold" for="varchar">Actividad </label><br>
                                                        <label>

                                                            Casa Habitación

                                                        </label>

                                                    </div>

                                                    <div class="form-gruop col-md-2">
                                                        <label for="varchar" class="bold">Giro:</label><br>
                                                        <label >

                                                            <?php if ($tiposervicio == 1) { ?>
                                                                Domésticos
                                                            <?php } else { ?>
                                                                Mixto (Casa con Comercio)

                                                            <?php } ?>
                                                        </label>

                                                    </div>

                                                    <div class="form-gruop col-md-3">
                                                        <label for="varchar" class="bold">Sevicios con los que cuenta el predio:</label><br>
                                                        <label>

                                                            <?php if ($servicioscuenta == 1) { ?>
                                                                Agua
                                                            <?php } elseif ($servicioscuenta == 2) { ?>
                                                                Drenaje y Saneamiento

                                                            <?php } elseif ($servicioscuenta == 3) { ?>
                                                                Agua, Drenaje y Saneamiento

                                                            <?php } elseif ($servicioscuenta == 4) { ?>
                                                                Drenaje
                                                            <?php } elseif ($servicioscuenta == 6) { ?>
                                                                Agua y Drenaje
                                                            <?php } else { ?>
                                                                Ninguno
                                                            <?php } ?>
                                                        </label>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label class="bold">Servicios que solicita:</label><br>
                                                        <label>

                                                            <?php if ($serviciossolicita == 1) { ?>

                                                                Agua
                                                            <?php } elseif ($serviciossolicita == 2) {
                                                                ?>
                                                                Drenaje y Saneamiento

                                                            <?php } elseif ($serviciossolicita == 3) {
                                                                ?>  Agua, Drenaje y Saneamiento
                                                            <?php } elseif ($serviciossolicita == 4) { ?>
                                                                Drenaje
                                                            <?php } elseif ($serviciossolicita == 6) { ?>
                                                                Agua y Drenaje

                                                            <?php } else { ?>
                                                                Ninguno



                                                            <?php } ?>

                                                        </label>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="bold">Condiciones Generales:</label><br>
                                                        <label>


                                                            <?php if ($condicionesgenerales == 1) { ?>
                                                                Habitado

                                                            <?php } elseif ($condicionesgenerales == 2) {
                                                                ?>
                                                                Deshabitado

                                                            <?php } elseif ($condicionesgenerales == 3) {
                                                                ?>
                                                                Obra Negra

                                                            <?php } else { ?>

                                                                Lote Baldio

                                                            <?php } ?>

                                                        </label>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label class="bold">Tiempo Habitado</label><br>
                                                        <label><?php echo $tiempohabitado; ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">




                                                <div class="form-group col-md-12" >

                                                    <h4 class="bold">¿Desea que el costo sea cargado a su primer recibo?</h4><label>SI</label> <input id="cambio" name="cambio" type="checkbox" <?php echo $cambio != 1 ? "" : "checked"; ?> value="<?php echo $cambio; ?>">
                                                </div>



                                            </div>
                                            <div class="form-group">

                                                <div  id="seccionpago">


                                                    <div class="form-group col-md-3" >
                                                        <input type="hidden" id="IDTram" value="<?php echo $ID; ?>" />
                                                        <a class="btn btn-success" id="documentopago"><b>Descargar Plantilla de Pago</b></a><br>

                                                    </div>
                                                    <div class="form-group col-md-6" >
                                                        <label class="bold" for="varchar">Documento Pago *<?php echo form_error('doctopago') ?></label>
                                                        <input type="file" multiple name="doctopago[]" id="doctopago" placeholder="Documento Pago"/>
                                                        <?php if (!empty($doctopago)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctopago; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>



                                            </div>
                                        <?php } ?>



                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                    <button type="submit" id="solicitar" class="btn btn-primary"><?php echo $button ?></button>


                                                    <a href="<?php echo base_url(); ?>infotramites/info_agua_y_drenaje_domestico" class="btn btn-danger">Regresar</a>
                                                    <?php if ($codigo): ?>
                                                        <button type="button" id="pagar" class="btn btn-success"><i class="fa fa-credit-card"></i> Pago En Linea</button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- END PAGE CONTENT INNER -->


                                    </form>
                                    <script>
                                        $('#pagar').click(function () {
                                            $('#frm-pago').submit();
                                        });
                                    </script>
                                    <form id="frm-pago" target="_blank" action="https://www.japami.gob.mx/jap/moduloonline/index.aspx" method="POST" >
                                        <input name="Cliente_ID" value="22555" type="hidden">
                                        <input name="Codigo_Barras" value="<?php echo $codigo; ?>" type="hidden">
                                    </form>
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
        <div class="page-wrapper-row">
            <div class="page-wrapper-bottom">
                <!-- BEGIN FOOTER -->
                <!-- BEGIN INNER FOOTER -->
                <?php $this->load->view('base/footer'); ?>
                <!-- END INNER FOOTER -->
                <!-- END FOOTER -->
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
        <script src="<?php echo base_url(); ?>assets/js/tram/japami.js" type="text/javascript"></script>
        <script>

                                        $("#documentopago").click(function () {
                                            var url = "<?php echo base_url(); ?>docstramites/documentojapami/documentopago/<?php echo $ID; ?>/<?php echo $serviciossolicita; ?>";
                                                    //alert(url);
                                                    //alert(url);
                                                    window.open(url, '_blank');
                                                    return false;
                                                    //alert("HOLA");
                                                });
        </script>

        <script>
            $(document).ready(function () {
                var a = $("#cambio:checked").val();
                if (a == 1) {
                    $('#seccionpago').addClass('hidden');
                    $('#pagar').addClass('hidden');
                }
                $("#cambio").on("click", function () {


                    if ($("#cambio").is(':checked')) {
                        $('#seccionpago').addClass('hidden');
                        $('#pagar').addClass('hidden');
                    } else
                    {
                        $('#seccionpago').removeClass('hidden');
                        $('#pagar').removeClass('hidden');
                    }
                });
            });

        </script>
    </body>
</html>