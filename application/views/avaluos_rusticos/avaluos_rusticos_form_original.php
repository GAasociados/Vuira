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
                                    <div class="page-title">
                                        <h1>Autorización de Avalúos Fiscales Rusticos</h1>
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
                                                <span class="number"> 1 de 1 - </span>
                                                <span class="desc">
                                                    <b>Autorización de Avalúos Fiscales</b><i class="fa fa-check"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <h4 class="block">Datos Generales</h4>

                                        <div class="form-group">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Motivo *<?php echo form_error('motivo') ?></label>
                                                <input required type="text" class="form-control" name="motivo" id="motivo" placeholder="Motivo" value="<?php echo $motivo; ?>" />
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="varchar">Nombre Solicitante *<?php echo form_error('nombresolicitante') ?></label>
                                                <input required type="text" class="form-control" name="nombresolicitante" id="nombresolicitante" placeholder="Nombre Solicitante" value="<?php echo $nombresolicitante; ?>" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Nombre Propietario <?php echo form_error('nombrepropietario') ?></label>
                                                <input type="text" class="form-control" name="nombrepropietario" id="nombrepropietario" placeholder="Nombre Propietario" value="<?php echo $nombrepropietario; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Calle *<?php echo form_error('calle') ?></label>
                                                <input required type="text" class="form-control" name="calle" id="calle" placeholder="Calle" value="<?php echo $calle; ?>" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Número *<?php echo form_error('numero') ?></label>
                                                <input required type="text" class="form-control" name="numero" id="numero" placeholder="Número" value="<?php echo $numero; ?>" />
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="int">Colonia <?php echo form_error('colonia') ?></label>
                                                <select class="form-control" name="colonia" tabindex="-1"  id="colonia"/>

                                                <?php
                                                if ($colonia != ""):

                                                    $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($colonia);
                                                    ?>

                                                    <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">
                                                        <?php echo strtoupper($arraycolonia->NOMBRE); ?>
                                                    </option>

                                                <?php endif; ?>
                                                <?php foreach ($consulta->result() as $fila) { ?>
                                                    <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                        <?php echo strtoupper($fila->NOMBRE); ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Municipio *<?php echo form_error('municipio') ?></label>
                                                <input required type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio" value="<?php echo $municipio; ?>" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Localidad *<?php echo form_error('localidad') ?></label>
                                                <input required type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad" value="<?php echo $localidad; ?>" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Correo *<?php echo form_error('correo') ?></label>
                                                <input required type="email" class="form-control" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo; ?>" />
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="varchar">Teléfono *<?php echo form_error('telefono') ?></label>
                                                <input required type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $telefono; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group col-md-4">
                                                <h4>Seleccione el Nombre de su Perito de la Siguiente Lista</h4>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="varchar">Perito <?php echo form_error('perito') ?></label>
                                                <select class="form-control" name="perito" tabindex="-1"  id="perito">
                                                    <?php
                                                    if (!empty($perito)) {
                                                        $arrayperito = $this->Peritos_model->getperitosbyid($perito);
                                                        ?>
                                                        <option value="<?php echo $perito; ?>">
                                                            <?php echo $arrayperito[0]->nombre; ?>
                                                        </option>
                                                    <?php } ?>

                                                    <?php foreach ($resultperitos->result() as $fila) { ?>
                                                        <option value="<?php echo $fila->ID; ?>">
                                                            <?php echo $fila->nombre; ?>
                                                        </option>
                                                    <?php } ?>
                                                    <!-- <option value="Option 1">Option 1</option> -->
                                                </select>
                                            </div>

                                            <?php if (($this->session->userdata('tipo') == 14)) { ?>
                                                <!--
                                              <div class="form-group col-md-12">
                                                <label for="varchar">Documento Final *<?php echo form_error('documentofinal') ?></label>
                                                <input type="file" multiple name="documentofinal[]" id="documentofinal" placeholder="Documento Pago"/>
                                                <?php if (!empty($documentofinal)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/avaluosrusticos/" . $documentofinal; ?>">Descargar</a>
                                                <?php endif; ?>
                                              </div>
                                                -->
                                            <?php } ?>
                                        </div>


                                        <?php if ($this->session->userdata('tipo') == 14) { ?>

                                            <div class="form-group">
                                                <label for="mensaje">Mensaje <?php echo form_error('mensaje') ?></label>
                                                <textarea class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                            </div>

                                            <div class="form-group">


                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Documento Final *<?php echo form_error('final') ?></label>
                                                    <input type="file" multiple name="documentofinal[]" id="documentofinal" placeholder="Documento Pago"/>
                                                    <?php if (!empty($documentofinal)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/avaluosrusticos/" . $documentofinal; ?>" target="_blank">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tinyint">Status <?php echo form_error('status') ?></label>
                                                    <select class="form-control" name="status">
                                                        <?php if ($status == 1): ?>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "3">Terminado</option>
                                                            <option value = "4">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 2): ?>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "3">Terminado</option>
                                                            <option value = "4">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 3): ?>
                                                            <option value = "3">Terminado</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "4">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 4): ?>
                                                            <option value = "4">Cancelado</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "3">Terminado</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                            <?php if ($this->session->userdata('tipo') == 14) { ?>
                                                <a href="<?php echo base_url(); ?>avaluos_rusticos" class="btn btn-danger">Regresar</a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_avaluos_rusticos" class="btn btn-danger">Regresar</a>
                                            <?php } ?>
                                        </div>
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

    </body>
</html>
