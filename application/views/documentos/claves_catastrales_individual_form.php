<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$identificacion = '';
$rpredial = '';
$nooficial = '';
$identificacionar = '';
$rpredialar = '';
$nooficialar = '';
foreach ($predial->result() as $row) {
    $rpredial .= $row->tipo_documento;
    $rpredialar .= $row->archivo;
//    die(print_r($row, TRUE));
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


        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


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
                                        <h1>Clave Catastral Individual con Escritura</h1>
                                    </div>

                                    <!-- END PAGE TITLE -->
                                </div>
                                <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                    <div class="btnRegresar hidden-xs hidden-xm">

                                        <a class="btn btn-app btn-primary" id="ayuda" style="  position: fixed; background: #FD9709; z-index: 9999999; " onclick="iniciarAyuda()">
                                            <span>
                                                Ayuda
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </span>
                                        </a>

                                    </div>
                                    <?php
                                    $modificar = "";
                                    $modificar1 = "";
                                else:
                                    if ($status == 4 || $status == 6 || $status == 5):
                                        $modificar = "readonly";
                                        $modificar1 = "readonly";
                                    else:
                                        $modificar = "readonly";
                                        $modificar1 = "";
                                    endif;
                                endif;
                                ?>
                            </div>
                            <!-- END PAGE HEAD-->

                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <br>
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li class="active">
                                            <a data-toggle="tab" class="step" aria-expanded="true">

                                                <b>Clave Catastral Individual</b><i class="fa fa-check"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>
                                    <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <?php if ($modificar != ""): ?>
                                            <h5 class="note note-warning bold">Recuerda dar click en el botón "Guardar" si realizas algún cambio.<br>En caso de cambios en el documento final vuelva a generar el documento</h5>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <?php if (isset($numerocontrol)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de seguimiento</label>
                                                        <input <?php echo $modificar; ?> readonly=""  type="text" <?php echo $this->session->userdata('tipo') != 15 ? "" : "required" ?> class="form-control" name="numerocontrol" id="numerocontrol" value="<?php echo $numerocontrol ?>"/>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($tipotramitedp == 2): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de seguimiento Original</label>
                                                        <input   type="text" class="form-control" name="control" id="control" value="<?php echo $control ?>"/>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3 ) && isset($fechafinal) != null && isset($numerocontrol)): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="4" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_individual/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Imprimir Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?> 
                                        </div>

                                        <div class="row  <?php echo $modificar == "" ? "" : "hidden" ?>">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <div id="paso1">
                                                        <label for="varchar">¿Eres propietario del inmueble?</label><br><label>Si</label>
                                                        <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                        <label>No</label>
                                                        <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group hidden" id="datosp">
                                                <div class="form-group  <?php echo $modificar == "" ? "" : "hidden" ?>" >
                                                    <div class="col-md-12">
                                                        <label>Por favor indique el tipo de persona</label><br>
                                                        <label>Moral</label>
                                                        <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                        <br>   <br>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h4  class="block bold">Información del solicitante Persona Moral o Física</h4>
                                                    </div> 
                                                </div>

                                                <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                    <div class="form-group">
                                                        <div class="col-md-12">

                                                            <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                        </div> 
                                                    </div>

                                                <?php endif; ?>

                                                <div id="fisrfc" class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Escritura de Compra Venta</label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc" >
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($fisrfc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-4" >

                                                        <label>Documento Acta constitutiva</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota" value="">
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($poder_nota)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $poder_nota; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col-md-4" id="fisrfc">
                                                        <label>Carta Poder Simple emitida por el propietario al solicitante</label>
                                                        <?php if ($modificar == ""): ?>    
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="cartapoder">
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($cartapoder)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $cartapoder; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <h4 class="block">Identificación y Ubicación del Inmueble</h4>
                                        <div class="row">
                                            <div  class="form-group" >
                                                <div class="form-group col-md-3">
                                                    <div id="paso3">
                                                        <label for="varchar">Número Cuenta Predial*<?php echo form_error('predialui') ?></label>
                                                        <input  <?php echo $modificar1; ?> title="Este Número se compone de 12 Digitos o la palabra APERTURA si no se cuenta con un número predial" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" autocomplete="off"  required="" type="text"  pattern="[A-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial" value="<?php echo $predialui; ?>" maxlength="12"/>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div id="paso2">
                                                        <label for="int">Categoría del Predio *<?php echo form_error('categoriapredioui') ?></label>

                                                        <select  <?php echo $modificar1; ?>  required  class="form-control" name="categoriapredioui" tabindex="-1" id="categoriapredioui" value="<?php echo $categoriapredioui; ?>">

                                                            <?php if ($categoriapredioui == 1) { ?>
                                                                <option value="1">URBANO</option>
                                                                <option value="2">SUB-URBANO</option>
                                                                <option value="3">RÚSTICO</option>
                                                            <?php } elseif ($categoriapredioui == 2) {
                                                                ?>
                                                                <option value="2">SUB-URBANO</option>
                                                                <option value="3">RÚSTICO</option>
                                                                <option value="1">URBANO</option>
                                                            <?php } elseif ($categoriapredioui == 3) { ?>

                                                                <option value="3">RÚSTICO</option>
                                                                <option value="1">URBANO</option>
                                                                <option value="2">SUB-URBANO</option>
                                                            <?php } else { ?>
                                                                <option value="">SELECCIONE UNA OPCIÓN</option>
                                                                <option value="1">URBANO</option>
                                                                <option value="2">SUB-URBANO</option>
                                                                <option value="3">RÚSTICO</option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>



                                                <div class="form-group" >
                                                    <div class="col-md-6" id="paso4">
                                                        <div class=" col-md-6">
                                                            <label  for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                            <input  <?php echo $modificar1; ?> autocomplete="off"    style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text" class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                        </div>

                                                        <div class=" col-md-6">
                                                            <label for="varchar">Número Exterior *<?php echo form_error('nooficialui') ?></label>
                                                            <input   <?php echo $modificar1; ?>  autocomplete="off"    required type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9  -/ÁÉÍÓÚÑ]+" class="form-control" name="nooficialui" id="nooficialui" placeholder="Número Exterior" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso5">
                                            <div  class="form-group" >
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número Interior</label>
                                                    <input   <?php echo $modificar1; ?> autocomplete="off"    type="text" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9 -/ÁÉÍÓÚÑ]+"  name="nooficialinui" id="nooficialinui" placeholder="Número Interior  " value="<?php echo $nooficialinui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote*<?php echo form_error('noloteui') ?></label>
                                                    <input  <?php echo $modificar1; ?> autocomplete="off"     type="text" style="text-transform:uppercase;"  title="El formato de este campo es (L-Número)" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="L-[0-9A-Z -/]+"  class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote" value="<?php echo $noloteui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana*<?php echo form_error('nomanzanaui') ?></label>
                                                    <input  <?php echo $modificar1; ?>  autocomplete="off"    type="text"  pattern="M-[0-9A-Z  -/]+" title="El formato de este campo es (M-Número)" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana" value="<?php echo $nomanzanaui; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso6">
                                            <div class="form-group">

                                                <div id="coloniauno" class="form-group col-md-6">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>
                                                    <?php if ($modificar1 == ""): ?>

                                                        <select    class="form-control select2" required=""  title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
                                                        <?php
                                                        if ($cbocoloniaui != ""):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>

                                                            <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">
                                                                <?php echo strtoupper($arraycolonia->NOMBRE); ?>
                                                            </option>

                                                        <?php endif; ?>

                                                        <option value="">

                                                        </option>
                                                        <?php foreach ($consulta->result() as $fila) { ?>
                                                            <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                                <?php echo strtoupper($fila->NOMBRE); ?>
                                                            </option>
                                                        <?php } ?>
                                                        </select>
                                                    <?php else: ?>
                                                        <?php
                                                        if ($cbocoloniaui != ""):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>

                                                            <input class="form-control" <?php echo $modificar1; ?> value="<?php echo strtoupper($arraycolonia->NOMBRE); ?>">
                                                            <input id="cbocoloniaui" type="hidden"  value="<?php echo $arraycolonia->COLONIA_ID; ?>" >
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div id="coloniados" class="form-group col-md-5 hidden">
                                                    <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>
                                                    <input <?php echo $modificar1; ?>  autocomplete="off"   <?php echo $coloniados != "" ? "required" : ""; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text"  pattern="[A-Za-z0-9  ÁÉÍÓÚÑ-/]+" id="colonia2" name="colonia2" placeholder="Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido " class="form-control" value="<?php echo $coloniados; ?>">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row" id="paso7" >
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <!--
                                                       <label for="varchar">Localización del Inmueble *<?php echo form_error('mapa') ?></label>
                                                    -->
                                                    <?php if (!empty($mapa)) { ?>
                                                        <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                                    <?php } else { ?>
                                                        <input id="address" type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                                    <?php } ?>
                                                    <!--
                                                    <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
                                                    -->
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <h4>
                                                            En caso de que la ubicación mostrada en el mapa no coincida con la dirección capturada,
                                                            usted puede mover el punto de ubicación color rojo al lugar deseado.
                                                        </h4>
                                                        <style>
                                                            /* Always set the map height explicitly to define the size of the div
                                                             * element that contains the map. */
                                                            #map {
                                                                height: 100%;
                                                            }

                                                            /* Optional: Makes the sample page fill the window. */
                                                            html, body {
                                                                height: 100%;
                                                                margin: 0;
                                                                padding: 0;
                                                            }

                                                            #floating-panel {
                                                                position: absolute;
                                                                top: 10px;
                                                                left: 25%;
                                                                z-index: 5;
                                                                background-color: #fff;
                                                                padding: 5px;
                                                                border: 1px solid #999;
                                                                text-align: center;
                                                                font-family: 'Roboto','sans-serif';
                                                                line-height: 30px;
                                                                padding-left: 10px;
                                                            }
                                                        </style>
                                                        <div style="width:100%; height: 500px;" >
                                                            <div id="map"></div>
                                                        </div>
                                                    </div>
                                                    <!-- end map -->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <h4 class="block">Datos del Propietario</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >

                                            <div class="form-group">
                                                <div id="paso8" class="col-md-6">
                                                    <label for="varchar">Nombre del Propietario o Razón Social *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input  <?php echo $modificar1; ?>   autocomplete="off"   required style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>


                                            </div>

                                        </div>


                                        <br>
                                        <div class="row" id="paso10">
                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label for="varchar">Correo Electrónico *<?php echo form_error('correonotificacionesdp') ?></label>
                                                    <input  <?php echo $modificar; ?> required type="email"  class="form-control" name="correonotificacionesdp" id="correonotificacionesdp" placeholder="Correo Electrónico" value="<?php echo $correonotificacionesdp != "" ? $correonotificacionesdp : $this->session->userdata('correo'); ?>" />
                                                </div>



                                                <div class="col-md-4">
                                                    <label for="varchar">Teléfono *<?php echo form_error('telefononotificacionesdp') ?></label>
                                                    <input  <?php echo $modificar; ?> maxlength="10" pattern="[0-9]{7,10}"  required type="text" class="form-control" name="telefononotificacionesdp" id="telefononotificacionesdp" placeholder="Teléfono" value="<?php echo $telefononotificacionesdp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="form-group">

                                                <div class="col-md-6" id="paso11">

                                                    <label  for="int">Tipo de Trámite Que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                    <select  <?php echo $modificar; ?> required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">
                                                        <?php if ($tipotramitedp == 1) { ?>
                                                            <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                            <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                            <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                        <?php } elseif ($tipotramitedp == 2) {
                                                            ?>
                                                            <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                            <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                            <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                        <?php } elseif ($tipotramitedp == 3) { ?>

                                                            <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                            <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                            <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                        <?php } else { ?>
                                                            <option value="">SELECCIONE UNA OPCIÓN</option>
                                                            <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                            <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                            <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6" id="paso11a">

                                                    <label for="int">Motivo del Trámite *<?php echo form_error('motivotramitedp') ?></label>

                                                    <select   <?php echo $modificar; ?> required class="form-control" name="motivotramitedp" tabindex="-1" id="motivotramitedp" value="<?php echo $motivotramitedp; ?>">

                                                        <?php if ($motivotramitedp == 1) { ?>
                                                            <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                            <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>
                                                            <option value="3">APROBACIÓN DE SUELO(CERTIFICADA)</option>
                                                            <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                        <?php } elseif ($motivotramitedp == 2) {
                                                            ?>
                                                            <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>                                                            
                                                            <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                            <option value="3">APROBACIÓN DE SUELO(CERTIFICADA)</option>
                                                            <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>

                                                        <?php } elseif ($motivotramitedp == 3) {
                                                            ?>
                                                            <option value="3">APROBACIÓN DE SUELO(CERTIFICADA)</option>
                                                            <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>                                                            
                                                            <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                            <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                        <?php } elseif ($motivotramitedp == 4) { ?>
                                                            <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                            <option value="3">APROBACIÓN DE SUELO(CERTIFICADA)</option>
                                                            <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>                                                            
                                                            <option value="1">USO DE SUELO(CERTIFICADA)</option>

                                                        <?php } else { ?>

                                                            <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                            <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                            <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>
                                                            <option value="3">APROBACIÓN DE SUELO(CERTIFICADA)</option>
                                                            <!--<option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>-->
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <?php if ($modificar == ""): ?>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <h4 class="block"> Adjunte los Siguientes Archivos en Original</h4>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <h4 class="block"> Documentación del ciudadano</h4>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row" id=paso12>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <?php if (empty($identificacion)): ?>
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Identificación del propietario (INE, Pasaporte, Cédula Profesional)  Puede adjuntar uno o varios archivos*<?php echo form_error('doctoine') ?></label>
                                                            <?php if ($modificar == ""): ?>
                                                                <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file"  name="doctoine[]" multiple="" id="doctoine" placeholder="Documento IFE"/>
                                                            <?php endif; ?>

                                                            <?php if (!empty($doctoine)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($identificacion)): ?>
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Identificación del propietario (INE,Pasaporte,Cédula Profesional) *</label>
                                                            <br>
                                                            <?php if (!empty($identificacionar)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-group col-md-4" id="paso13">
                                                        <label for="varchar">Documento legal que acredite la propiedad; debidamente inscrito en el Registro Público de la Propiedad (Con todos sus anexos) Puede adjuntar uno o varios archivos*<?php echo form_error('doctolegalpropiedad') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" accept="application/pdf, image/*"  name="doctolegalpropiedad[]" multiple="" id="doctolegalpropiedad" placeholder="Poder Simple en caso de que el Trámite se Realizado por el Representante Legal"/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($doctolegalpropiedad)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?php if (empty($rpredial)): ?>         
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Predial Actualizado*<?php echo form_error('doctopredial') ?></label>
                                                            <?php if ($modificar == ""): ?>
                                                                <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="doctopredial" id="doctopredial" placeholder="Recibo impuesto predial" />
                                                            <?php endif; ?>

                                                            <?php if (!empty($doctopredial)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($rpredial)): ?>         
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Predial Actualizado*</label>
                                                            <br>
                                                            <?php if (!empty($rpredialar)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>   

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">

                                                    <div id="otrosdoc" class="form-group col-md-4  <?php echo $otros_doc == 0 ? "hidden" : ' ' ?>">
                                                        <label for="varchar">Adjuntar otra documentación (Si son varios archivo por favor adjuntar un archivo .rar)*<?php echo form_error('otradoc') ?></label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" multiple name="otradoc" id="otrodoc" placeholder=""/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($otradoc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $otradoc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div id="mdocaux1" class="form-group col-md-4  <?php echo $mdocaux1 == 0 ? "hidden" : ' ' ?>">
                                                        <label for="varchar">Adjuntar otra documentación (Si son varios archivo por favor adjuntar un archivo .rar)*</label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" multiple name="mdocaux1" id="mdocaux1" placeholder=""/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($mdocaux1)): ?>
                                                            <a target="_blank"  href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $mdocaux; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if ($valido_pago == 1): ?>
                                                    <div class="col-md-12">
                                                        <h5 class="note note-success  bold" style=" background-color:rgba(0,255,0,0.3); ">El Trámite ya ha sido pagado.</h5>

                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                            <?php if ($this->session->userdata('tipo') == 14555): ?>
                                                <div class="form-group col-md-12" id="hiddendoctopago">
                                                    <div class="form-group col-md-6">
                                                        <?php if (!empty($status)): ?>
                                                            <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
        <!---->                                                            <br><!--<input type="file" multiple name="doctopago" id="doctopago"/>-->
                                                            <?php if (!empty($doctopago)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopago; ?>">Descargar</a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php if (!empty($compro)): ?>
                                                            <label for="varchar" id="parpadear"> <b>Comprobante de pago </b> </label>
                                                            <br>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $compro; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                        </div>
                                        <?php if ($this->session->userdata('tipo') == 15) { ?>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Clave Catastral</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" aria-label="" <?php echo $clave != "" ? "readonly" : ""; ?> autocomplete="off"  value="<?php echo $clave; ?>" pattern="[0-9]{15,18}" required id="clavenueva" <?php echo $clave != "" ? "readonly" : " name='clave'"; ?>  placeholder="Clave Catastral" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                        <span class="input-group-addon">
                                                            <a title="Dar click para buscar si la clave ya esta registrada" id="check-clave" class=" btn-md success"><i class="fa fa-search"></i></a>
                                                        </span>
                                                    </div> </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('tipo') == 15) { ?>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label> <b>Si el ciudadano requiere presentar mas documentación por favor seleccione la casilla  <?php echo form_error('otros_doc') ?></b> </label>
                                                    <input  id="masdoc" type='checkbox' <?php echo $otros_doc == 1 ? "checked" : ""; ?> name='otros_doc' value="<?php echo $otros_doc; ?>">
                                                </div>




                                                <?php if ($this->session->userdata('tipo') == 15): ?>

                                                    <div class="form-group">
                                                        <div class="form-group col-md-4">
                                                            <label for="tinyint">Estatus <?php echo form_error('status') ?></label>
                                                            <select class="form-control" name="status" id="status">
                                                                <?php if ($status == 1): ?>
                                                                    <option value = "1">Iniciado</option>
                                                                    <option value = "2">En Revisión de Información</option>
                                                                    <option value = "3">Trámite en Proceso</option>
                                                                    <option value = "4">En Espera de Pago</option>
                                                                    <option value = "5">Cancelado</option>
                                                                    <!--<option value = "6">Terminado</option>-->
                                                                <?php endif; ?>

                                                                <?php if ($status == 2): ?>
                                                                    <option value = "2">En Revisión de Información</option>

                                                                    <option value = "3">Trámite en Proceso</option>
                                                                    <option value = "4">En Espera de Pago</option>
                                                                    <option value = "5">Cancelado</option>
                                                                    <!--                                                                    <option value = "6">Terminado</option>-->
                                                                <?php endif; ?>

                                                                <?php if ($status == 3): ?>
                                                                    <option value = "3">Trámite en Proceso</option>

                                                                    <option value = "4">En Espera de Pago</option>
                                                                    <option value = "5">Cancelado</option>
                                                                    <!--<option value = "6">Terminado</option>-->
                                                                <?php endif; ?>

                                                                <?php if ($status == 4): ?>
                                                                    <option value = "4">En Espera de Pago</option>

                                                                    <option value = "2">En Revisión de Información</option>
                                                                    <option value = "3">Trámite en Proceso</option>
                                                                    <option value = "5">Cancelado</option>
                                                                    <?php if ($valido_pago == 1): ?>
                                                                        <option value = "6">Terminado</option>
                                                                    <?php endif; ?>

                                                                <?php endif; ?>

                                                                <?php if ($status == 5): ?>
                                                                    <option value = "5">Cancelado</option>

                                                                    <option value = "2">En Revisión de Información</option>
                                                                    <option value = "3">Trámite en Proceso</option>
                                                                    <option value = "4">En Espera de Pago</option>
                                                                    <!--<option value = "6">Terminado</option>-->
                                                                <?php endif; ?>

                                                                <?php if ($status == 6): ?>
                                                                    <option value = "6">Terminado</option>

                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-4">
                                                                <label  class="bold" for="tinyint">Solicitud IMUVII</label>
                                                                <input type="checkbox" name="imuvii" <?php echo $imuvii == 1 ? "checked" : ""; ?> value="<?php echo $imuvii; ?>" >
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php } ?>
                                            <!-- ya agregado-->


                                            <?php if ($this->session->userdata('tipo') == 1555 || $this->session->userdata('tipo') == 155): ?>

                                                <div class="form-group col-md-12">  

                                                    <div class="form-group col-md-12">
                                                        <label  class="bold" for="tinyint">Solicitud IMUVII</label>
                                                        <input type="checkbox" name="imuvii" id="cambiardoc" <?php echo $imuvii == 1 ? "checked" : ""; ?> value="<?php echo $imuvii; ?>" >
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <a data-target="#full" data-toggle="modal" class="btn btn-success " id="docnormal" ><b>Generar Documento Final</b></a>
                                                        <a data-target="#fullimu" data-toggle="modal" class="btn btn-success" id="docimuvii"><b>Generar Documento IMUVII</b></a>
                                                    </div>   
                                                    <script>
                                                        $(document).ready(function () {
                                                        var tipdoc = <?php echo $imuvii; ?>;
                                                        if (tipdoc == 1){
                                                        $('#docnormal').addClass('hidden');
                                                        } else{
                                                        $('#docimuvii').addClass('hidden');
                                                        }

                                                        $("#cambiardoc").click(function(){
                                                        if ($(this).is(':checked')){
                                                        $('#docnormal').addClass('hidden');
                                                        $('#docimuvii').removeClass('hidden');
                                                        } else{
                                                        $('#docimuvii').addClass('hidden');
                                                        $('#docnormal').removeClass('hidden');
                                                        }
                                                        });
                                                        });
                                                    </script>


                                                    <div class="form-group col-md-4">
                                                        <a data-target="#fullnega" data-toggle="modal" class="btn btn-danger"><b>Generar Documento Negación</b></a>
                                                    </div>  
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class=" form-group col-md-4" >
                                                        <label for="varchar"> <b>Documento Final </b> <?php echo form_error('doctofinal') ?></label>
                                                        <input type="file" accept=".pdf"  name="doctofinal" id="doctofinal"/>
                                                        <?php if (!empty($doctofinal)): ?><br>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctofinal; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Documento AutoCAD</label>
                                                        <input name="autocat" type="file">
                                                        <?php if ($autocat): ?>
                                                            <a target="_blank"  class="" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $autocat; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>   
                                                </div> 

                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-4" >
                                                        <a class="btn btn-primary" target="_blank" href="<?php echo base_url(); ?>docstramites/documentoanuncio/documentopagoindividual/<?php echo $ID; ?>"><b>Documento de Orden Pago</b></a>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <?php if (!empty($status)): ?>
                                                            <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                            <!--<input type="file" multiple name="doctopago" id="doctopago"/>-->

                                                            <?php if (!empty($doctopago)): ?><br>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopago; ?>">Descargar</a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
                                                <div class="form-group col-md-12">
                                                    <label class="bold">¿Requiere que el ciudadano adjunte más documentación?</label>
                                                    <input name='mdocaux' type="checkbox" id="mdocaux">
                                                </div>
                                                <script>
                                                    $("#mdocaux").on("click", function () {
                                                    if ($("#mdocaux").is(':checked')) {
                                                    if ($("#mdocaux1").hasClass('hidden')) {
                                                    $("#mdocaux1").removeClass('hidden');
                                                    }
                                                    } else {
                                                    if ($("#mdocaux1").hasClass('hidden')) {

                                                    } else {
                                                    $("#mdocaux1").addClass('hidden');
                                                    }
                                                    }
                                                    });
                                                </script>

                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('tipo') == 15 && $usuarioID == $this->session->userdata('id') && $fechafinal == null): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="1" class="btn btn-primary btn-lg" data-target="#talon" data-toggle="modal"><i class="fa fa-check"></i> Generar Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('tipo') == 15 && $usuarioID == $this->session->userdata('id') && $fechafinal != null): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="2" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_individual/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Generar Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('tipo') == 15 && $usuarioID != $this->session->userdata('id') && $fechafinal == null): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="3" class="btn btn-primary btn-lg" data-target="#talon" data-toggle="modal"><i class="fa fa-check"></i> Generar Talón</a>    
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
                                                <div class="form-group col-md-12">
                                                    <label for="mensaje">Mensaje a ciudadano <?php echo form_error('mensaje') ?></label>
                                                    <textarea  class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                                </div>
                                            <?php endif; ?>

                                            <div class=" form-group col-md-12">
                                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                <button data-loading-text="<i class='fa fa-spinner fa-spin '></i> Solicitando Trámite" type="submit" id="solicitar" class="btn btn-primary"><?php echo $button ?></button>

                                                <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555) { ?>
                                                    <?php if ($this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555) { ?>
                                                        <a href="<?php echo base_url(); ?>claves_catastrales_individual/asigna" class="btn btn-danger">Regresar</a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url(); ?>claves_catastrales_individual" class="btn btn-danger">Regresar</a>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-danger">Regresar</a>
                                                <?php } ?>
                                            </div>


                                        </div>
                                    </form>
                                    <!-- END PAGE CONTENT INNER -->
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


        <div class="quick-nav-overlay"></div>
        <?php if ($this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
            <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content"> 

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos del Documento Final</h4>
                        </div>

                        <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinal_vista" method="post">

                            <div clas="modal-body"> 
                                <div class="container">
                                    <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                    <div class="row">
                                        <div class="form-group col-md-12" >
                                            <div class="form-group" >
                                                <h4>Complete los campos marcados con(*)</h4>
                                            </div>
                                            <table class="table table-bordered" border="1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5>Documentos</h5>
                                                            <div class="form-group">
                                                                <?php if ($otradoc): ?>
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $otradoc; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                                <?php endif; ?>
                                                                <?php if ($mdocaux1): ?>
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $mdocaux1; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                                <?php endif; ?>
                                                                <?php if ($rpredialar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>"><i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($doctopredial): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>"><i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($doctolegalpropiedad): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>" title="Visualizar Documneto De Propiedad"><i class="fa fa-file"></i> Documento De Propiedad</a>
                                                                <?php endif; ?>
                                                                <?php if ($identificacionar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>   
                                                                <?php if ($morine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>" title="Visualizar Indetificacion de Propietario "><i class="fa fa-file"></i> Identificación Propietario</a>
                                                                <?php endif; ?>
                                                                <?php if ($doctoine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($cartapoder): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $cartapoder; ?>" title="Visualizar Carta Poder"><i class="fa fa-file"></i> Carta Poder</a>
                                                                <?php endif; ?>  
                                                                <?php if ($predialso): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; "  target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $predialso; ?>" title="Visualizar Predial Propietario"><i class="fa fa-file"></i>Recibo Predial Propietario</a>
                                                                <?php endif; ?>
                                                                <?php if ($fisrfc): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Escritura Compra-Venta</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Nombre del propietario *</label>
                                                                    <input required name="" placeholder="Nombre" readonly class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> En Su Caracter  *</label>
                                                                     <select class="form control" style="text-transform: uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" tabindex="-1" required name="caracter">
                                                                        <?php if($caracter): ?>
                                                                            <option value="<?php echo $caracter; ?>"><?php echo $caracter; ?></option>
                                                                        <?php else: ?>
                                                                            <option value="">Seleccione Caracter</option>
                                                                        <?php endif; ?>

                                                                        <option value="Propietario">Propietario</option>
                                                                        <option value="Co-Propietarios">Co-Propietarios</option>
                                                                        
                                                                    </select>
                                                                    <!--<input  autocomplete="off"   value="<?php echo $caracter; ?>" required name="caracter"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -/,.]+"  placeholder="caracter " value="" class="form-control" />-->
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                   
                                                                    <label for="varchar">Co-propietario Nombre </label>
                                                                    <input autocomplete="off"    value="<?php echo $copro; ?>" name="coop" title="Ingrese el nombre del co-propietario si es necesario" placeholder="Nombre Co-propietario"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-,/]+"  value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div  class="form-group col-md-3">
                                                                    <label for="varchar"> Número de Escritura Pública *</label>
                                                                    <input  autocomplete="off"   value="<?php echo $noescri; ?>" required  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .,-/]+"  name="no_escritura" placeholder="Númer Escritura" value="" class="form-control" value=""/>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label for="date">Fecha de escrituras *</label>
                                                                    <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                        <input  value="<?php
                                                                        if ($fechaesc) {
                                                                            $phpdate = strtotime($fechaesc);
                                                                            $mysqldate = date('d-m-Y', $phpdate);
                                                                            echo $mysqldate;
                                                                        }
                                                                        ?>" class="form-control" placeholder="fecha de escrituras" required type="text" readonly="" name="fecha_escritura" ><span class="input-group-btn">
                                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Superficie del terreno según SIAC*</label>
                                                                    <input autocomplete="off"   value="<?php echo $supsiac; ?>"  required name="sup" placeholder="superficie"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-,/]+"  value="" class="form-control" />
                                                                </div>
                                                                <div  class="form-group col-md-2">
                                                                    <label for="varchar">Superfice</label><br>

                                                                    m² <input <?php echo $supciact == 1 ? 'checked' : ""; ?>  required="" value="m²" name="tipo_sup" type="radio">  ha<input <?php echo $supciact == 2 ? 'checked' : ""; ?>  required value="ha" name="tipo_sup" type="radio">

                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar"> Nombre del notario público *</label>
                                                                    <input  autocomplete="off"   value="<?php echo $notario; ?>"  required  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .,-/ÑÁÉÍÓÚ]+"  name="notario" placeholder="Nombre del Notario Público " value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar">Número de notario público *</label>
                                                                    <input  autocomplete="off"   value="<?php echo $nonotario; ?>"  required name="no_notario" placeholder="Número de Notario Público" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -,./]+"   value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar">Estado de Escritura*</label>
                                                                    <select class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  tabindex="-1" required name="estado" >
                                                                        <?php if ($estado): ?>
                                                                            <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
                                                                        <?php else: ?>
                                                                            <option value="">Seleccione un estado</option>
                                                                        <?php endif; ?>

                                                                        <option value="Aguascalientes">Aguascalientes</option>
                                                                        <option value="Baja California">Baja California</option>
                                                                        <option value="Baja California Sur">Baja California Sur</option>
                                                                        <option value="Campeche">Campeche</option>
                                                                        <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                                                        <option value="Colima">Colima</option>
                                                                        <option value="Chiapas">Chiapas</option>
                                                                        <option value="Chihuahua">Chihuahua</option>
                                                                        <option value="Ciudad de México">Ciudad de México</option>
                                                                        <option value="Durango">Durango</option>
                                                                        <option value="Guanajuato">Guanajuato</option>
                                                                        <option value="Guerrero">Guerrero</option>
                                                                        <option value="Hidalgo">Hidalgo</option>
                                                                        <option value="Jalisco">Jalisco</option>
                                                                        <option value="Estado de México">Estado de México</option>
                                                                        <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                                                        <option value="Morelos">Morelos</option>
                                                                        <option value="Nayarit">Nayarit</option>
                                                                        <option value="Nuevo León">Nuevo León</option>
                                                                        <option value="Oaxaca">Oaxaca</option>
                                                                        <option value="Puebla">Puebla</oPueblaption>
                                                                        <option value="Querétaro">Querétaro</option>
                                                                        <option value="Quintana Roo">Quintana Roo</option>
                                                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                                                        <option value="Sinaloa">Sinaloa</option>
                                                                        <option value="Sonora">Sonora</option>
                                                                        <option value="Tabasco">Tabasco</option>
                                                                        <option value="Tamaulipas">Tamaulipas</option>
                                                                        <option value="Tlaxcala">Tlaxcala</option>
                                                                        <option value="Veracruz">Veracruz</option>
                                                                        <option value="Yucatán">Yucatán</option>
                                                                        <option value="Zacatecas">Zacatecas</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar">Ciudad de Escritura *</label>
                                                                    <input autocomplete="off"   value="<?php echo $ciudad; ?>" required name="ciudad" placeholder="Ciudad De Escritura" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -.,/ÑÁÉÍÓÚ]+"   value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Clave Catastral *</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" aria-label=""  autocomplete="off"  value="<?php echo $clave; ?>" pattern="[0-9]{15,18}" required id="clavenueva" name="clave" placeholder="Clave Catastral" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                                        <span class="input-group-addon">
                                                                            <a title="Dar click para buscar si la clave ya esta registrada" id="check-clave" class=" btn-md success"><i class="fa fa-search"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Número de expediente *</label>
                                                                    <input  autocomplete="off"   readonly=""  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -,./]+"  required name="numero_exp" placeholder="Número de Expediente " value="<?php echo $numerocontrol; ?>" class="form-control" />
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Número de Oficio *</label>
                                                                    <input autocomplete="off"   value="<?php echo $nooficio; ?>"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -.,/]+"  required name="numero_doc" placeholder="Número de Oficio " value="" class="form-control" />
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <label>Por favor indicar si la propiedad se encuentra en régimen</label><br>
                                                                <input <?php echo $areap == 1 ? 'checked' : ""; ?> type="checkbox" name="Privativa" id ="priv" value="Área Privativa"> Área Privativa <input name="Privativat" id="privt" class="<?php echo $areap == 1 ? '' : "hidden"; ?>" type="text"  autocomplete="off"  value="<?php echo $areapt; ?>"><br>
                                                                <input <?php echo $acc == 1 ? 'checked' : ""; ?>  type="checkbox" name="Cubiertac" id="Cub"  value="Área Común Cubierta"> Área Común Cubierta  <input name="Cubiertat" id="Cubt" class="<?php echo $acc == 1 ? '' : "hidden"; ?>" type="text"  autocomplete="off"   value="<?php echo $acct; ?>"><br>
                                                                <input <?php echo $acd == 1 ? 'checked' : ""; ?> type="checkbox" name="Cubiertad" id="Cub1"  value="Área Común Descubierta"> Área Común Descubierta  <input name="Cubiertatd" id="Cubt1" class="<?php echo $acd == 1 ? '' : "hidden"; ?>" autocomplete="off"   type="text" value="<?php echo $acdt; ?>"><br>
                                                                <input <?php echo $totalind == 1 ? 'checked' : ""; ?> type="checkbox" name="indivisot" id="indt" value="Total Indiviso"> Total Indiviso <input name="indivisott" id="indtt" class="<?php echo $totalind == 1 ? '' : "hidden"; ?>" type="text" autocomplete="off"   value="<?php echo $totalindt; ?>"><br>
                                                                <input <?php echo $porcent == 1 ? 'checked' : ""; ?>  type="checkbox" name="Indivisop" id="indp"  value="Porcenta">Porcentaje Indiviso <input name="Indivisopt" id="indpt" class="<?php echo $porcent == 1 ? '' : "hidden"; ?>" type="text"  autocomplete="off"   value="<?php echo $porcentt; ?>"><br>
                                                                <script>
                                                                    $("#priv").on("click", function () {
                                                                    if ($("#privt").hasClass('hidden')){
                                                                    $("#privt").removeClass('hidden');
                                                                    } else{
                                                                    $("#privt").addClass('hidden');
                                                                    $("#privt").val("");
                                                                    }
                                                                    });
                                                                    $("#Cub").on("click", function () {
                                                                    if ($("#Cubt").hasClass('hidden')){
                                                                    $("#Cubt").removeClass('hidden');
                                                                    } else{
                                                                    $("#Cubt").addClass('hidden');
                                                                    $("#Cubt").val("");
                                                                    }
                                                                    });
                                                                    $("#Cub1").on("click", function () {
                                                                    if ($("#Cubt1").hasClass('hidden')){
                                                                    $("#Cubt1").removeClass('hidden');
                                                                    } else{
                                                                    $("#Cubt1").addClass('hidden');
                                                                    $("#Cubt1").val("");
                                                                    }
                                                                    });
                                                                    $("#indt").on("click", function () {
                                                                    if ($("#indtt").hasClass('hidden')){
                                                                    $("#indtt").removeClass('hidden');
                                                                    } else{
                                                                    $("#indtt").addClass('hidden');
                                                                    $("#indtt").val("");
                                                                    }
                                                                    });
                                                                    $("#indp").on("click", function () {
                                                                    if ($("#indpt").hasClass('hidden')){
                                                                    $("#indpt").removeClass('hidden');
                                                                    } else{
                                                                    $("#indpt").addClass('hidden');
                                                                    $("#indpt").val("");
                                                                    }
                                                                    });
                                                                </script>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <h5>Observaciones</h5>
                                                                <textarea rows="5" class="col-md-12" name="observaciones" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" ><?php echo $observaciones; ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>


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

            <div class="modal fade" id="fullimu" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content"> 

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos del Documento Final</h4>
                        </div>

                        <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentoimuvii_vista" method="post">

                            <div clas="modal-body"> 
                                <div class="container">
                                    <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                    <div class="row">
                                        <div class="form-group col-md-12" >
                                            <div class="form-group" >
                                                <h4>Complete los campos marcados con(*)</h4>
                                            </div>
                                            <table class="table table-bordered" border="1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5>Documentos</h5>
                                                            <div class="form-group">
                                                                <?php if ($otradoc): ?>
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $otradoc; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                                <?php endif; ?>
                                                                <?php if ($mdocaux1): ?>
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $mdocaux1; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                                <?php endif; ?>
                                                                <?php if ($rpredialar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>"><i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($doctopredial): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>"><i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($doctolegalpropiedad): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>" title="Visualizar Documneto De Propiedad"><i class="fa fa-file"></i> Documento De Propiedad</a>
                                                                <?php endif; ?>
                                                                <?php if ($identificacionar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>   
                                                                <?php if ($morine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>" title="Visualizar Indetificacion de Propietario "><i class="fa fa-file"></i> Identificación Propietario</a>
                                                                <?php endif; ?>
                                                                <?php if ($doctoine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($cartapoder): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $cartapoder; ?>" title="Visualizar Carta Poder"><i class="fa fa-file"></i> Carta Poder</a>
                                                                <?php endif; ?>  
                                                                <?php if ($predialso): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; "  target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $predialso; ?>" title="Visualizar Predial Propietario"><i class="fa fa-file"></i>Recibo Predial Propietario</a>
                                                                <?php endif; ?>
                                                                <?php if ($fisrfc): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Escritura Compra-Venta</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">En atención a*</label>
                                                                    <input required name=""   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" placeholder="Nombre" readonly class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">


                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar"> Número de folio *</label>
                                                                    <input  autocomplete="off"   value="<?php echo $nonotario; ?>" required name="folio"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -/]+"  placeholder="Número de folio " value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="date">Fecha de Constancia *</label>
                                                                    <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                        <input value="<?php
                                                                        if ($fechaesc) {
                                                                            $phpdate = strtotime($fechaesc);
                                                                            $mysqldate = date('d-m-Y', $phpdate);
                                                                            echo $mysqldate;
                                                                        }
                                                                        ?>" class="form-control" placeholder="FECHA DE CONSTANCIA" required type="text" readonly="" name="fecha_const" ><span class="input-group-btn">
                                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar"> Superficie del terreno según SIAC*</label>
                                                                    <input  autocomplete="off"  value="<?php echo $supsiac; ?>"  required name="sup" placeholder="superficie"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-/]+"  value="" class="form-control" />
                                                                </div>
                                                                <div  class="form-group col-md-2">
                                                                    <label for="varchar">Superfice</label><br>

                                                                    m² <input <?php echo $supciact == 1 ? 'checked' : ""; ?>  required="" value="m²" name="tipo_sup" type="radio">  ha<input <?php echo $supciact == 2 ? 'checked' : ""; ?>  required value="ha" name="tipo_sup" type="radio">

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Nombre del Encargado IMUVII*</label>
                                                                    <input  autocomplete="off"  value="<?php echo $notario; ?>" required name="nombre_imuvii" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" placeholder="Nombre del Encargado "  class="form-control"/>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Clave Catastral *</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" aria-label=""  autocomplete="off"  value="<?php echo $clave; ?>" pattern="[0-9]{15,18}" required id="clavenueva" name="clave" placeholder="Clave Catastral" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                                        <span class="input-group-addon">
                                                                            <a  title="Dar click para buscar si la clave ya esta registrada"  id="check-clave" class=" btn-md"><i class="fa fa-search"></i></a>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Número de Oficio *</label>
                                                                    <input autocomplete="off"   value="<?php echo $nooficio; ?>" required  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" name="Oficio" placeholder="NÚMERO DE FOLIO" class="form-control" value=""/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <h5>Observaciones</h5>
                                                                <textarea rows="5" class="col-md-12" name="observaciones" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" ><?php echo $observaciones; ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>


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


            <div class="modal fade" id="fullnega" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos del Documento Negación</h4>
                        </div>

                        <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalnegacion_vista" method="post">

                            <div clas="modal-body"> 
                                <div class="container">
                                    <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                    <div class="row">
                                        <div class="form-group col-md-12" >
                                            <div class="form-group col-md-12">
                                                <h5>Motivo de negación</h5>
                                                <textarea required="" rows="5" class="col-md-12" name="observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-success">Generar Documento Negación</button>
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        <?php endif; ?>
        <?php if ($this->session->userdata('tipo') == 15): ?>
            <div class="modal fade" id="talon" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos</h4>
                        </div>
                        <form target="_blank" action="<?php echo base_url(); ?>claves_catastrales_individual/vistapa" method="post">
                            <div clas="modal-body"> 

                                <div class="container-fluid">

                                    <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="date">Fecha de Inicio * </label>
                                            <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" placeholder="fecha de expedición" required type="text" readonly="" name="fecha_ini" value="<?php echo date("d-m-Y"); ?>" ><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-outline" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="date">Fecha de Fin * </label>
                                            <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" placeholder="fecha de expedición" required type="text" readonly="" name="fecha_exp" value="<?php echo date("d-m-Y"); ?>" ><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-outline" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="date">Hora* </label>

                                            <input readonly="" class="form-control timepicker timepicker-24" type="text" name="hora" value="<?php echo date("h:i:sa"); ?>">

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-success" id="submit-all">Generar Talón</button>

                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        <?php endif; ?>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>          
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->


        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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
        <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <!-- MAPA -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
                                                                $(document).ready(function () {

                                                                setTimeout(function(){
                                                                var colonia = $('#cbocoloniaui').val();
                                                                if (colonia == 0 && colonia != ""){
                                                                $('#coloniados').removeClass('hidden');
                                                                $('#coloniauno').addClass('hidden');
                                                                }
                                                                }, 100);
                                                                var dato = $('#divestatus').val();
                                                                if (dato == 4 || dato == 6) {
                                                                if (dato == 4) {
                                                                $("#docpago").removeClass('hidden');
                                                                $("#hiddendoctofinal").addClass('hidden');
                                                                }
                                                                if (dato == '6') {
                                                                $("#docpago").removeClass('hidden');
                                                                $("#hiddendoctopago").removeClass('hidden');
                                                                }
                                                                } else {
                                                                $("#hiddendoctopago").hide();
                                                                $("#docpago").addClass('hidden');
                                                                }

                                                                $("#status").change(function () {
                                                                //alert("HOLA");
                                                                var dato = $('select[id=status]').val();
                                                                if (dato == "4") {
                                                                $("#docpago").removeClass('hidden');
                                                                $("#hiddendoctopago").show();
                                                                } else {
                                                                $("#docpago").addClass('hidden');
                                                                $("#hiddendoctopago").hide();
                                                                }

                                                                if (dato == '6') {
                                                                $("#hiddendoctopago").show();
                                                                $("#hiddendoctofinal").show();
                                                                } else {
                                                                $("#hiddendoctofinal").hide();
                                                                }

                                                                });
                                                                $('#nooficialui').keyup(function () {
                                                                //geocodeAddress(geocoder, map);
                                                                //nooficial
                                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + "" + $('#cbocoloniaui').find('option:selected').text() + " Irapuato, Guanajuato");
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
            }

            function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
            map: resultsMap,
                    position: results[0].geometry.location,
                    draggable: true
            });
            //document.getElementById("address").value = results[0].geometry.location;
            //document.getElementById("address").value = results[0].geometry.location;
            resultsMap.addListener('mousemove', function () {
            document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
            });
            document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
            } else {

            }
            });
            }

            function cdatos() {
            $('#callenotificacionesdp').val($('#calleui').val());
            $('#numeronotificacionedp').val($('#nooficialui').val());
            $('#colonianotificacionesdp').val($('#cbocoloniaui').val());
            $('#numeronotificacionint').val($('#nooficialinui').val());
            }
<?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
                $("#masdoc").on("click", function () {
                if ($("#masdoc").is(':checked')) {
                if ($("#otrosdoc").hasClass('hidden')) {
                $("#otrosdoc").removeClass('hidden');
                }
                } else {
                if ($("#otrosdoc").hasClass('hidden')) {

                } else {
                $("#otrosdoc").addClass('hidden');
                }
                }
                });
<?php endif; ?>
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
            Dropzone.options.subir = {
            url: "<?php echo base_url(); ?>docstramites/documentoclave/imagen",
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    parallelUploads: 100,
                    maxFiles: 100,
                    acceptedFiles: "image/*",
                    init: function () {

                    var submitButton = document.querySelector("#submit-all");
                    var wrapperThis = this;
                    submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                    });
                    this.on("removedfile", function (file) {
                    $('#mensaje').removeClass("hidden");
                    });
                    this.on("addedfile", function (file) {
                    $('#mensaje').addClass("hidden");
                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-md btn-danger'>Remover Archivo</button>");
                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();
                    // Remove the file preview.
                    wrapperThis.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                    });
                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                    $(".dz-success-mark").addClass("hidden"); //dz-error-mark
                    $(".dz-error-mark").addClass("hidden"); //dz-error-mark
                    });
                    this.on("success", function (file, responseText) {
                    alert(responseText);
                    });
                    this.on('sendingmultiple', function (data, xhr, formData) {
                    formData.append("Username", $("#Username").val());
                    });
                    }
            };
        </script>
        <script>

            function iniciarAyuda() {

            var enjoyhint_instance = new EnjoyHint({});
            var enjoyhint_script_steps = [
            {
            "next #ayuda": 'Bienvenido al Trámite de Clave Catastral.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona "Siguiente".',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso1": 'Indique seleccionando la casilla si la persona solicitante es el propietario del predio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso3": 'Indique el número de cuenta predial del inmueble este se encuentra en el recibo predial.<br> en la siguiente sección del recibo:<br><br><img src="<?php echo base_url() . "assets/recpre.png" ?>"><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso2": 'De la siguiente lista por favor seleccione la categoría en la que se encuentra el predio<br>1.- <b>Predio Urbano :</b> ubicados en el área urbana y de cada centro de población que cuenten con acción o acciones de urbanización con excepción de los predios dedicados permanentemente a fines agricolas.<br>2.-<b>Predio Sub-Urbano:</b> Predios ubicados fuera del poligono envolvente del área urbana pero dentro de la mancha urbana de cualquier comunidad, colonia, rancheria o municipio.<br>3.-<b>Predio Rústico:</b> Los que esten dedicados a la explotación de carácter agrícola, ganadera, forestal, de explotación de recursos naturales y actividades análogas.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso4": 'Para la localización de su predio ingrese los siguientes datos como aparecen en el recibo predial.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso5": 'Continuando con la localización del predio, Por favor ingrese los siguientes datos como aparecen en el recibo predial.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso6": 'Por favor selecccione de la siguiente lista de Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido en donde se localiza su predio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso7": '<span style="color:black;" >Por favor indica con el puntero rojo la ubicación de tu predio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso8": '<span style="" >Indique el nombre o razón social del propietario del predio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso10": 'Verifique que su correo electrónico sea el correcto, y agregue un número de teléfono para notificaciones.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso11": '<br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso11a": 'Para darle un mejor servicio, seleccione para que asunto requiere la Clave Catastral en caso de no se encuentre el motivo deseado por favor seleccione "A SOLICITUD DE PARTE (CERTIFICADA)".<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso12": 'Adjunte los documentos originales escaneados en .PDF o Imagenes<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #solicitar": 'De click en el Botón solicitar trámite, aparecerá una notificación de trámite solicitado.<br>De click en "Finalizar" para concluir el tutorial.',
                    "nextButton": {text: "Finalizar"},
                    showSkip: false
            }

            ];
            enjoyhint_instance.set(enjoyhint_script_steps);
            enjoyhint_instance.run();
            }
        </script>

        <script>

            $('#check-clave').click(function (e) {

            var Clave = $('#clavenueva').val();
            if (Clave.length == 15 || Clave.length == 18) {
            $.ajax({
            url: "../bclave",
                    data: {clave: "" + Clave},
                    type: "POST",
                    dataType: 'json',
                    success: function (respuesta) {
                    if (respuesta == 0) {
                    alert("La Clave Catastral No se encuentra en el sistema");
                    } else {
                    alert("La Clave Catastral YA se encuentra en el sistema registrada bajo el nombre de propietario " + respuesta);
                    }
                    }
            });
            } else{
            alert("Por favor ingrese una clave de 15 o 18 digitos");
            }
            });
            $('#predialui').keyup(function (e) {

            var Clave = $('#predialui').val();
            if (Clave != "APERTURA"){
            if (Clave.length == 12) {
            $.ajax({
<?php if ($ID): ?>
                url: "../predial",
<?php else: ?>
                url: "../claves_catastrales_individual/predial",
<?php endif; ?>
            data: {predial: "" + Clave},
                    type: "POST",
                    dataType: 'json',
//    contentType: 'application/json',
                    success: function (respuesta) {
                    if (respuesta) {
                    $('#calleui').val(respuesta.CALLE_ID != undefined ? respuesta.CALLE_ID:"");
                    $('#nooficialui').val(respuesta.NO_EXTERIOR != undefined ? respuesta.NO_EXTERIOR:"");
                    $('#nooficialinui').val(respuesta.NO_INTERIOR != undefined ? respuesta.NO_INTERIOR:"");
                    $('#cbocoloniaui').val(respuesta.COLONIA_ID != undefined ? respuesta.COLONIA_ID:"");
//                        alert($('#cbocoloniaui').find('option:selected').text());
                    $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                    $('#noloteui').val(respuesta.LOTE != undefined ? respuesta.LOTE:"");
                    $('#nomanzanaui').val(respuesta.MANZANA != undefined ? respuesta.MANZANA:"");
                    $('#categoriapredioui').val(respuesta.TIPO_PREDIO_ID != undefined ? respuesta.TIPO_PREDIO_ID:"");
                    $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + "" + $('#cbocoloniaui').find('option:selected').text() + "" + " Irapuato, Guanajuato");
                    var ap = respuesta.APELLIDO_PATERNO != undefined ? respuesta.APELLIDO_PATERNO:"";
                    var am = respuesta.APELLIDO_MATERNO != undefined ? respuesta.APELLIDO_MATERNO:"";
//                   var am
                    $('#nombrepropietariodp').val(respuesta.NOMBRE + " " + ap + " " + am);
                    var cod = document.getElementById("cbocoloniaui").value;
                    if (cod){

                    $('#coloniauno').removeClass('hidden');
                    $('#coloniados').addClass('hidden');
                    $("#colonia2").removeAttr("required");
                    } else{
                    $('#cbocoloniaui').val(0);
                    $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                    $('#coloniados').removeClass('hidden');
                    $('#coloniauno').addClass('hidden');
                    $("#colonia2").attr("required", "true");
                    }
//                    

                    initMap();
                    } else {
                    $('#calleui').val("");
                    $('#nooficialui').val("");
                    $('#nooficialinui').val("");
                    $('#cbocoloniaui').val("0");
                    $('#select2-cbocoloniaui-container').html("SELECCIONA UNA OPCION");
                    alert('No se cuenta con registro de la cuenta predial');
                    $('#cbocoloniaui').val(0);
                    $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                    $('#coloniados').removeClass('hidden');
                    $('#coloniauno').addClass('hidden');
                    $("#colonia2").attr("required", "true");
                    }
                    }
            });
            }
            } else{
            $('#calleui').val("");
            $('#nooficialui').val("");
            $('#nooficialinui').val("");
            $('#cbocoloniaui').val("0");
            $('#noloteui').val("");
            $('#nomanzanaui').val("");
            $('#select2-cbocoloniaui-container').html("SELECCIONA UNA OPCION");
            alert('No se cuenta con registro de la cuenta predial');
            $('#cbocoloniaui').val(0);
            $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
            $('#coloniados').removeClass('hidden');
            $('#coloniauno').addClass('hidden');
            $("#colonia2").attr("required", "true");
            }}
            );
        </script>
        <?php if ($ID === "") { ?>
            <script>


                $("#formclave").submit(function (e) {
                $('#solicitar').attr("disabled", true);
                var $this = $('#solicitar');
                $this.button('loading');
                alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
                });


            </script>
        <?php } ?>
    </body>
</html>
