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
<!doctype html>
<html>
    <head>
        <title>Régimen Propiedad Condominio</title>
        <meta charset="utf-8" />

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

    <!--<link rel="stylesheet" href="<?php // echo base_url('assets/bootstrap/css/bootstrap.min.css')  ?>"/>-->

</head>
<body  class="page-container-bg-solid">
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

                <div class="page-container">
                    <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <!-- BEGIN PAGE HEAD-->
                        <div class="page-head">
                            <div class="container-fluid">

                                <!-- BEGIN PAGE TITLE -->
                                <div class="page-title">
                                    <h1>Régimen Propiedad Condominio</h1>
                                </div>
                                <!-- END PAGE TITLE -->
                            </div>
                        </div>
                        <div class="page-content">
                            <div class="container-fluid">
                                <br>
                                <ul class="nav nav-pills nav-justified steps">
                                    <li class="active">
                                        <a data-toggle="tab" class="step" aria-expanded="true">
                                            <span class="number"> 1 de 1 - </span>
                                            <span class="desc">
                                                <b>Régimen Propiedad Condominio</b><i class="fa fa-check"></i></span>
                                        </a>
                                    </li>
                                </ul>

                                <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                    <h4 class="block">Datos Generales</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 col-lg-4">

                                                <label for="int">Tipo Tramite <?php echo form_error('tipo_tramite') ?></label>
                                                <select required="" class="form-control select2" style="width: 100%;" id="tipo_tramite" name="tipo_tramite">
                                                    <?php if ($tipo_tramite == 1): ?>
                                                        <option value="1">Régimen en Condominio</option>
                                                        <option value="2">Modificación de Regimen</option>
                                                    <?php endif; ?>

                                                    <?php if ($tipo_tramite == 2): ?>
                                                        <option value="2">Modificación de Regimen</option>
                                                        <option value="1">Regimen en Condominio</option>
                                                    <?php endif; ?>

                                                    <?php if (!$tipo_tramite): ?>
                                                        <option value="" disabled selected>Seleccionar Una Opción</option>
                                                        <option value="1">Regimen en Condominio</option>
                                                        <option value="2">Modificación de Regimen</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div> 
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Colonia Inmueble <?php echo form_error('colonia_inmueble') ?></label>
                                                <input  required="" type="text" class="form-control" name="colonia_inmueble" id="colonia_inmueble" placeholder="Colonia Inmueble" value="<?php echo $colonia_inmueble; ?>" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Número de  Lote <?php echo form_error('no_lote') ?></label>
                                                <input required="" type="text" class="form-control" name="no_lote" id="no_lote" placeholder="Número de Lote" value="<?php echo $no_lote; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Manzana <?php echo form_error('manzana') ?></label>
                                                <input required="" type="text" class="form-control" name="manzana" id="manzana" placeholder="Manzana" value="<?php echo $manzana; ?>" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Número Oficial <?php echo form_error('numero_oficial') ?></label>
                                                <input required="" type="text" class="form-control" name="numero_oficial" id="numero_oficial" placeholder="Numero Oficial" value="<?php echo $numero_oficial; ?>" />
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="varchar">Domicilio Calle <?php echo form_error('domicilio_calle') ?></label>
                                                <input required="" type="text" class="form-control" name="domicilio_calle" id="domicilio_calle" placeholder="Domicilio Calle" value="<?php echo $domicilio_calle; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Cuenta Predial <?php echo form_error('cuenta_predial') ?></label>
                                                <input required="" type="text" class="form-control" name="cuenta_predial" id="cuenta_predial" placeholder="Cuenta Predial" value="<?php echo $cuenta_predial; ?>" />

                                            </div>
                                            <div class="form-group col-md-4"></div>
                                            <div class="form-group col-md-4"></div>
                                        </div>
                                    </div>
                                    <h4 class="block">Datos Generales Del Contribuyente</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Nombre Del Contribuyente <?php echo form_error('nombre_del_contribuyente') ?></label>
                                                <input required="" type="text" class="form-control" name="nombre_del_contribuyente" id="nombre_del_contribuyente" placeholder="Nombre Del Contribuyente" value="<?php echo $nombre_del_contribuyente; ?>" />
                                            </div>

                                            <div class="form-group  col-md-4">
                                                <label for="varchar">Domicilio Del Contribuyente <?php echo form_error('domicilio_del_contribuyente') ?></label>
                                                <input required="" type="text" class="form-control" name="domicilio_del_contribuyente" id="domicilio_del_contribuyente" placeholder="Domicilio Del Contribuyente" value="<?php echo $domicilio_del_contribuyente; ?>" />
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label for="varchar">Teléfono Del Contribuyente <?php echo form_error('telefono_del_contribuyente') ?></label>
                                                <input required="" type="text" class="form-control" name="telefono_del_contribuyente" id="telefono_del_contribuyente" placeholder="Teléfono Del Contribuyente" value="<?php echo $telefono_del_contribuyente; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Colonia Del Contribuyente <?php echo form_error('colonia_del_contribuyente') ?></label>
                                                <input required="" type="text" class="form-control" name="colonia_del_contribuyente" id="colonia_del_contribuyente" placeholder="Colonia Del Contribuyente" value="<?php echo $colonia_del_contribuyente; ?>" />
                                            </div>
                                        </div>
                                        <h4 class="block">Datos del Perito Valuador Fiscal</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-4">

                                                    <label for="varchar">Nombre Perito Valuador <?php echo form_error('nombre_perito_valuador') ?></label>
                                                    <input required="" type="text" class="form-control" name="nombre_perito_valuador" id="nombre_perito_valuador" placeholder="Nombre Perito Valuador" value="<?php echo $nombre_perito_valuador; ?>" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Domicilio Perito Valuador <?php echo form_error('domicilio_perito_valuador') ?></label>
                                                    <input required="" type="text" class="form-control" name="domicilio_perito_valuador" id="domicilio_perito_valuador" placeholder="Domicilio Perito Valuador" value="<?php echo $domicilio_perito_valuador; ?>" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Colonia Perito Valuador <?php echo form_error('colonia_perito_valuador') ?></label>
                                                    <input required="" type="text" class="form-control" name="colonia_perito_valuador" id="colonia_perito_valuador" placeholder="Colonia Perito Valuador" value="<?php echo $colonia_perito_valuador; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">No Perito <?php echo form_error('no_perito') ?></label>
                                                    <input required="" type="text" class="form-control" name="no_perito" id="no_perito" placeholder="No Perito" value="<?php echo $no_perito; ?>" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Teléfonos Perito <?php echo form_error('telefonos_perito') ?></label>
                                                    <input required="" type="text" class="form-control" name="telefonos_perito" id="telefonos_perito" placeholder="Teléfonos Perito" value="<?php echo $telefonos_perito; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Superficie Predio <?php echo form_error('superficie_predio') ?></label>
                                                    <input type="text" class="form-control" name="superficie_predio" id="superficie_predio" placeholder="Superficie Predio" value="<?php echo $superficie_predio; ?>" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="varchar">Uso Actual Predio <?php echo form_error('uso_actual_predio') ?></label>
                                                    <select required="" class="form-control select2" style="width: 100%;" id="uso_actual_predio" name="uso_actual_predio">
                                                        <?php if ($uso_actual_predio == 1): ?>
                                                            <option selected value="1">Lote Baldío </option>
                                                            <option value="2">Casa Habitación </option>
                                                        <?php endif; ?>

                                                        <?php if ($uso_actual_predio == 2): ?>

                                                            <option selected value="2">Casa Habitación </option>
                                                            <option value="1">Lote Baldío </option>


                                                        <?php endif; ?>
                                                        <?php if (!$uso_actual_predio): ?>
                                                            <option value="" disabled selected>Seleccionar Una Opción</option>
                                                            <option value="1">Lote Baldío </option>
                                                            <option value="2">Casa Habitación </option>
                                                        <?php endif; ?>


                                                    </select>

                                                </div> 

                                                <div class="col-md-4">
                                                    <label for="varchar">Tipo Regimen <?php echo form_error('tipo_regimen') ?></label>
                                                    <select required="" class="form-control select2" style="width: 100%;" id="tipo_regimen" name="tipo_regimen">
                                                        <?php if ($tipo_regimen == 1): ?>
                                                            <option selected value="1">Horizontal </option>
                                                            <option value="2">Vertical </option>
                                                            <option value="3">Mixto </option>
                                                        <?php endif; ?>

                                                        <?php if ($tipo_regimen == 2): ?>
                                                            <option selected value="2">Vertical </option>
                                                            <option value="1">Horizontal </option>
                                                            <option value="3">Mixto </option>
                                                        <?php endif; ?>
                                                        <?php if ($tipo_regimen == 3): ?>
                                                            <option selected value="3">Mixto </option>
                                                            <option value="1">Horizontal </option>
                                                            <option value="2">Vertical </option>

                                                        <?php endif; ?>
                                                        <?php if (!$tipo_regimen): ?>
                                                            <option value="" disabled selected>Seleccionar Una Opción</option>
                                                            <option value="1">Horizontal </option>
                                                            <option value="2">Vertical </option>
                                                            <option value="3">Mixto </option>
                                                        <?php endif; ?>


                                                    </select>
                                                </div> 
                                            </div>
                                        </div>

                                        <h4 class="block">Características del Inmueble</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-4">

                                                    <label for="varchar">Escrituras* <?php echo form_error('escrituras') ?></label>
                                                    <input type="file" multiple name="escrituras[]" id="escrituras" placeholder="Escrituras"/>
                                                    <?php if (!empty($escrituras)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $escrituras; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Oficio Traza* <?php echo form_error('oficio_traza') ?></label>
                                                    <input type="file"  multiple name="oficio_traza[]" id="oficio_traza" placeholder="Oficio Traza"  />
                                                    <?php if (!empty($oficio_traza)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $oficio_traza; ?>">Descargar</a>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Planos Autorizados* <?php echo form_error('planos_autorizados') ?></label>
                                                    <input type="file"  multiple  name="planos_autorizados[]" id="planos_autorizados" placeholder="Planos Autorizados" value="<?php echo $planos_autorizados; ?>" />
                                                    <?php if (!empty($planos_autorizados)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $planos_autorizados; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Planos Particulares* <?php echo form_error('planos_particulares') ?></label>
                                                    <input type="file" multiple=""  name="planos_particulares[]" id="planos_particulares" placeholder="Planos Particulares" />
                                                    <?php if (!empty($planos_particulares)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $planos_particulares; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Memoria Descriptiva*<?php echo form_error('memoria_descriptiva') ?></label>
                                                    <input type="file" multiple=""  name="memoria_descriptiva[]" id="memoria_descriptiva" placeholder="Memoria Descriptiva"  />
                                                    <?php if (!empty($memoria_descriptiva)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $memoria_descriptiva; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Acreditación Representante* <?php echo form_error('acreditacion_representante') ?></label>
                                                    <input type="file" multiple=""  name="acreditacion_representante[]" id="acreditacion_representante" placeholder="Acreditación Representante"  />
                                                    <?php if (!empty($acreditacion_representante)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $acreditacion_representante; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">


                                                <div class="form-group col-md-4">
                                                    <label >Identificación (INE, Pasaporte, Cédula Profesional) *</label>
                                                    <input type="file" multiple=""  name="acreditacion_representante[]" id="acreditacion_representante" placeholder="Acreditación Representante"  />
                                                    <?php if (!empty($identificacionar)) { ?>
                                                        <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Descargar</a>
                                                        <?php
                                                    } else {
                                                        echo "El Ciudadano no adjunto este Archivo";
                                                    }
                                                    ?>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Recibo impuesto predial  *</label><br>
                                                    <input type="file" multiple=""  name="acreditacion_representante[]" id="acreditacion_representante" placeholder="Acreditación Representante"  />
                                                    <?php if (!empty($rpredialar)) { ?>
                                                        <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Descargar</a>
                                                        <?php
                                                    } else {
                                                        echo "El Ciudadano no adjunto este Archivo";
                                                    }
                                                    ?>

                                                </div>
                                                <?php if ($documento_pago): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Pago* <?php echo form_error('recibo_pago') ?></label>
                                                        <input type="file" multiple="" name="recibo_pago[]" id="recibo_pago" placeholder="Recibo Pago"   />
                                                        <?php if (!empty($recibo_pago)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/regimen/" . $recibo_pago; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if ($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 199): ?>
                                            <a target="_blank" href="<?php echo base_url('docstramites') . "/Documentoanuncio/pagoregimen/" . $id ?>" class="btn btn-primary <?php echo $status == 4 ? '' : 'hidden' ?>" id="btnpago"><b>Descargar Plantilla de Pago</b></a>
                                            <div class="form-group">
                                                <br>
                                                <div class="row"> 
                                                    <div class="form-group col-md-3">
                                                        <label for="smallint">Estatus <?php echo form_error('status') ?></label>
                                                        <select class="form-control" name="status" id="status">
                                                            <?php if ($status == 1): ?>
                                                                <option selected value = "1">Iniciado</option>
                                                                <option value = "2">En Revisión de Información</option>
                                                                <option value = "3">Trámite en Proceso</option>
                                                                <option value = "4">En Espera de Pago</option>
                                                                <option value = "6">Terminado</option>
                                                                <option value = "5">Cancelado</option>
                                                            <?php endif; ?>

                                                            <?php if ($status == 2): ?>
                                                                <option selected value = "2">En Revisión de Información</option>
                                                                <option value = "1">Iniciado</option>
                                                                <option value = "3">Trámite en Proceso</option>
                                                                <option value = "4">En Espera de Pago</option>
                                                                <option value = "6">Terminado</option>
                                                                <option value = "5">Cancelado</option>
                                                            <?php endif; ?>

                                                            <?php if ($status == 3): ?>
                                                                <option selected value = "3">Trámite en Proceso</option>
                                                                <option value = "1">Iniciado</option>
                                                                <option value = "2">En Revisión de Información</option>
                                                                <option value = "4">En Espera de Pago</option>
                                                                <option value = "6">Terminado</option>
                                                                <option value = "5">Cancelado</option>
                                                            <?php endif; ?>

                                                            <?php if ($status == 4): ?>
                                                                <option selected value = "4">En Espera de Pago</option>
                                                                <option value = "1">Iniciado</option>
                                                                <option value = "2">En Revisión de Información</option>
                                                                <option value = "3">Trámite en Proceso</option>
                                                                <option value = "6">Terminado</option>
                                                                <option value = "5">Cancelado</option>
                                                            <?php endif; ?>

                                                            <?php if ($status == 5): ?>
                                                                <option selected value = "5">Cancelado</option>
                                                                <option value = "1">Iniciado</option>
                                                                <option value = "2">En Revisión de Información</option>
                                                                <option value = "3">Trámite en Proceso</option>
                                                                <option value = "4">En Espera de Pago</option>
                                                                <option value = "6">Terminado</option>
                                                            <?php endif; ?>

                                                            <?php if ($status == 6): ?>
                                                                <option selected value = "6">Terminado</option>
                                                                <option value = "1">Iniciado</option>
                                                                <option value = "2">En Revisión de Información</option>
                                                                <option value = "3">Trámite en Proceso</option>
                                                                <option value = "4">En Espera de Pago</option>
                                                                <option value = "5">Cancelado</option>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                    <div id="pagos" class="hidden">
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Documento Pago <?php echo form_error('documento_pago') ?></label>
                                                            <input type="file" multiple="" name="documento_pago[]" id="documento_pago" placeholder="Documento Pago"  />
                                                            <?php if (!empty($documento_pago)): ?>
                                                                <a href="<?php echo base_url() . "assets/tramites/regimen/" . $documento_pago; ?>">Descargar</a>
                                                            <?php endif; ?>
                                                        </div>



                                                        <div class="form-group col-md-3">
                                                            <label for="date">Fecha de pago<?php echo form_error('fecha_pago') ?></label>
                                                            <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                                <input class="form-control" required type="text" readonly="" name="fecha_pago" id="fecha_pago" value="<?php echo $fecha_pago; ?>" ><span class="input-group-btn">
                                                                    <button class="btn btn-primary btn-outline" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                            </div>
                                                        </div>        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="mensaje">Mensaje <?php echo form_error('mensaje') ?></label>
                                                            <textarea class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div id="final" class="hidden">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar">Documento Final <?php echo form_error('documento_final') ?></label>
                                                                    <input type="file" multiple="" name="documento_final[]" id="documento_final" placeholder="Documento Final" />
                                                                    <?php if (!empty($documento_final)): ?>
                                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $documento_final; ?>">Descargar</a>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label for="date">Fecha Trámite <?php echo form_error('fecha_tramite') ?></label>
                                                                    <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                                        <input class="form-control" required type="text" readonly="" name="fecha_tramite" id="fecha_tramite" value="<?php echo $fecha_tramite; ?>" ><span class="input-group-btn">
                                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label for="date">Fecha Autorización <?php echo form_error('fecha_autorizacion') ?></label>
                                                                    <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                                        <input class="form-control" required type="text" readonly="" name="fecha_autorizacion" id="fecha_autorizacion" value="<?php echo $fecha_autorizacion; ?>" ><span class="input-group-btn">
                                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>fecha_autorizacion
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endif; ?>
                                               <?php if( $this->session->userdata('tipo')==3 || $this->session->userdata('tipo')==4):?>
                                                <?php if ($status >= 4): ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar">Documento Pago <?php echo form_error('documento_pago') ?></label>
                                                                <input type="file" multiple="" name="documento_pago[]" id="documento_pago" placeholder="Documento Pago"  />
                                                                <?php if (!empty($documento_pago)): ?>
                                                                    <a href="<?php echo base_url() . "assets/tramites/regimen/" . $documento_pago; ?>">Descargar</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                     <?php if ($status >=5 ): ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                               <div class="form-group col-md-3">
                                                                    <label for="varchar">Documento Final <?php echo form_error('documento_final') ?></label>
                                                                    <?php if (!empty($documento_final)): ?>
                                                                        <a href="<?php echo base_url() . "assets/tramites/regimen/" . $documento_final; ?>">Descargar</a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                     <?php endif; ?>
                                                <div class="form-group">
                                                    <?php if ($usuario_id) { ?>
                                                        <input type="hidden" class="form-control" name="usuario_id" id="usuario_id" placeholder="Usuario Id" value="<?php echo $usuario_id; ?>" />
                                                    <?php } else { ?>
                                                        <input type="hidden" class="form-control" name="usuario_id" id="usuario_id" placeholder="Usuario Idasdasd" value="<?php echo $this->session->userdata('id'); ?>" />   
                                                    <?php } ?>
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                                <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $documento_pago): ?>
                                                    <a class="btn btn-success" href="<?php echo base_url() . "regimen_propieda_condominio/pago/" . $id; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                <?php endif; ?>
                                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                                <a href="<?php echo site_url('regimen_propieda_condominio') ?>" class="btn btn-primary">Cancelar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>         
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="quick-nav-overlay"></div>
    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN FOOTER -->
            <!-- BEGIN INNER FOOTER -->
            <?php $this->load->view('base/footer'); ?>
            <!-- END INNER FOOTER -->
            <!-- END FOOTER -->
        </div>
    </div>

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
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>          
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
    <!-- END THEME LAYOUT SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/permisoanuncios/permisoanuncios.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            var dato = $('#status').val();

            if (dato == 4 || dato == 6) {
                if ($('#pagos').hasClass('hidden')) {
                    $('#pagos').removeClass('hidden');
                } else
                {

                }

            } else {
                if ($('#pagos').hasClass('hidden')) {

                } else
                {
                    $('#pagos').addClass('hidden');
                }
            }
            if (dato == 6) {
                if ($('#final').hasClass('hidden')) {
                    $('#final').removeClass('hidden');
                } else
                {

                }

            } else {
                if ($('#final').hasClass('hidden')) {

                } else
                {
                    $('#final').addClass('hidden');
                }
            }
            $("#status").change(function () {
                //alert("HOLA");
                var dato = $('select[id=status]').val();
                if (dato == '4') {
                    if ($('#pagos').hasClass('hidden')) {
                        $('#pagos').removeClass('hidden');
                        $('#btnpago').removeClass('hidden');
                    } else
                    {

                    }
                } else if (dato == '6') {
                    if ($('#pagos').hasClass('hidden')) {
                        $('#pagos').removeClass('hidden');
                    } else
                    {

                    }
                    if ($('#final').hasClass('hidden')) {
                        $('#final').removeClass('hidden');
                    } else
                    {

                    }
                } else {
                    if ($('#pagos').hasClass('hidden')) {

                    } else
                    {
                        $('#pagos').addClass('hidden');
                    }
                    if ($('#final').hasClass('hidden')) {

                    } else
                    {
                        $('#final').addClass('hidden');
                    }
                }
            });

            //            $('#nooficialui').keyup(function () {
            //                //geocodeAddress(geocoder, map);
            //                //nooficial
            //                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
            //                initMap();
            //                //calleui
            //            });

            //            $('#calleui').keyup(function () {
            //                //geocodeAddress(geocoder, map);
            //                //nooficial
            //                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
            //                initMap();
            //                //calleui
            //            });
        });
    </script>
</body>
</html>
