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
<html lang="es" >
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
        <h1>Hola</h1>
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
                                    <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                        <div class="btnRegresar hidden-xs hidden-xm pull-right" >

                                            <a class="btn btn-app btn-primary pull-right" id="ayuda" style="  float:right;   background: #FD9709; " onclick="iniciarAyuda()">
                                                <span>
                                                    Ayuda
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                </span>
                                            </a>

                                        </div>
                                        <?php
                                        $modificar = "";
                                    else:
                                        $modificar = "";
                                    endif;
                                    ?>
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

                                                <b>Claves Catastrales Fraccionamientos</b><i class="fa fa-check"></i></span>
                                            </a>
                                        </li>
                                    </ul>

                                    <h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                        <div class="row" id="paso1">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <label for="varchar">¿Eres propietario del inmueble?</label><br><label>Si</label>
                                                    <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                    <label>No</label>
                                                    <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">

                                            <div class="form-group hidden" id="datosp">

                                                <div class="form-group  <?php echo $modificar == "" ? "" : "hidden" ?>" >
                                                    <div class="col-md-12">
                                                        <label>¿Por favor indique que tipo de persona es?</label><br>
                                                        <label>Moral</label>
                                                        <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h4  class="block bold">Información del solicitante Persona Moral o Física</h4>
                                                    </div> 
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                    </div> 
                                                </div>



                                                <div id="fisrfc" class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Escritura de Compra Venta</label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc[]" multiple="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($fisrfc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-4" >

                                                        <label>Documento Acta constitutiva</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const[]" multiple="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota[]" multiple="">
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
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>



                                                </div>

                                            </div>
                                        </div>



                                        <h4 class="block">Identificación y Ubicación del Inmueble</h4>
                                        <div class="row"> 
                                            <div class="form-group">

                                                <div class="form-group col-md-4">
                                                    <div id="paso2">
                                                        <label for="varchar">Cuenta Predial *<?php echo form_error('predialui') ?></label>
                                                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text" pattern="[a-zA-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial " value="<?php echo $predialui; ?>" maxlength="12"/>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8" id="paso3">
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                        <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Exterior  *<?php echo form_error('nooficialui') ?></label>
                                                        <input autocomplete="off"   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text" pattern="[a-zA-Z0-9 -/]+" class="form-control" name="nooficialui" id="nooficialui" placeholder="Número Exterior" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Interior</label>
                                                        <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" pattern="[a-zA-Z0-9 -/]+" class="form-control" name="nooficialuin" id="nooficialuin" placeholder="Número Interior" value="<?php echo $nooficialuin; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso4"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote*<?php echo form_error('noloteui') ?></label>
                                                    <input autocomplete="off"   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  pattern="[a-zA-Z0-9 -/]+" type="text" class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote" title="El formato de este campo es (L-Número)"  value="<?php echo $noloteui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana*<?php echo form_error('nomanzanaui') ?></label>
                                                    <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  pattern="M-[0-9A-Z]+" type="text" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana"  title="El formato de este campo es (M-Número)"  value="<?php echo $nomanzanaui; ?>" />
                                                </div>


                                                <div id="coloniauno" class="form-group col-md-6">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>

                                                    <?php if ($modificar == ""): ?>
                                                        <select    class="form-control select2" required=""  title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
                                                        <?php
                                                        if ($cbocoloniaui != ""):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
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
                                                    <?php else: ?>
                                                        <?php
                                                        if (!empty($cbocoloniaui)):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>
                                                            <input  autocomplete="off"  <?php echo $modificar; ?> class="form-control" value=" <?php echo strtoupper($arraycolonia->NOMBRE); ?>">

                                                        <?php endif; ?>
                                                        <input  autocomplete="off"  type="hidden" id="cbocoloniaui" class="form-control" value="<?php echo $cbocoloniaui; ?>">
                                                    <?php endif; ?>
                                                </div>

                                                <div id="coloniados" class="form-group col-md-5 hidden">
                                                    <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>
                                                    <input  autocomplete="off"  <?php echo $modificar; ?>  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text"  pattern="[A-Za-z0-9  ÁÉÍÓÚÑ-/]+" id="colonia2" name="colonia2" placeholder="Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido " class="form-control" value="<?php echo $coloniados; ?>">
                                                </div>





                                            </div>
                                        </div>

                                        <div class="row" id="paso5"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <h4>
                                                        En caso de que la ubicación mostrada en el mapa no coincida con la dirección capturada,
                                                        usted puede mover el punto de ubicación color rojo al lugar deseado.
                                                    </h4>
                                                    <label for="varchar"> <?php echo form_error('mapa') ?></label>
                                                    <?php if (!empty($mapa)) { ?>
                                                        <input id="address" required type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                                    <?php } else { ?>
                                                        <input id="address" required type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                                    <?php } ?>
                                                    <!--
                                                    <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
                                                    -->
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <!--
                                                    <h3>Presiona el botón "Busca tu Dirección" para localizar tu ubicación en el mapa.</h3>
                                                    -->
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
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <h4 class="block">Datos del Propietario y/o Representante</h4>
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-4" id="paso6">
                                                    <label for="varchar">Nombre Completo del Propietario *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre Completo del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>


                                            </div>
                                        </div>



                                        <div class="row" >
                                            <br>
                                            <div class="form-goup">
                                                <div class="form-group "  id="paso9">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Correo Electrónico *<?php echo form_error('correodp') ?></label>
                                                        <input  required type="email" class="form-control" name="correodp" id="correodp" placeholder="Correo Electrónico" value="<?php echo $correodp != "" ? $correodp : $this->session->userdata('correo'); ?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Teléfono *<?php echo form_error('telefonodp') ?></label>
                                                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" maxlength="10" required pattern="[0-9]{7,13}" type="text" class="form-control" name="telefonodp" id="telefonodp" placeholder="Teléfono" value="<?php echo $telefonodp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4" id="paso9a">
                                                    <label for="int">Tipo de Trámite que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                    <select style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">

                                                        <?php if ($tipotramitedp == 1) { ?>
                                                            <option value="1">Asignación de Claves Catastrales</option>
                                                            <option value="2">Modificación de Clave Catastrales</option>
                                                        <?php } else { ?>


                                                            <option value="2">Modificación de Clave Catastrales</option>
                                                            <option value="1">Asignación de Claves Catastrales</option>
                                                        <?php } ?>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso10">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <h4 class="block"> Adjunte los Siguientes Archivos Escaneados en Original</h4>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                        <input type="file" multiple name="doctoine[]" id="doctoine" placeholder="doctoine"/>
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $doctoine; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE,Pasaporte,Cédula Profesional) *</label>

                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Acta Constitutiva o Poder Simple *<?php echo form_error('doctopodersimple') ?></label>
                                                    <input type="file" multiple name="doctopodersimple[]" id="doctopodersimple" placeholder="doctopodersimple"/>
                                                    <?php if (!empty($doctopodersimple)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopodersimple; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctoplanodigital') ?></label>

                                                    <input type="file" multiple name="doctoplanodigital[]" id="doctoplanodigital" placeholder="doctoplanodigital"/>
                                                    <?php if (!empty($doctoplanodigital)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanodigital; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctooficio') ?></label>

                                                    <input type="file" multiple name="doctooficio[]" id="doctooficio" placeholder="doctooficio"/>
                                                    <?php if (!empty($doctooficio)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctooficio; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php echo form_error('doctoplanofisico') ?></label>

                                                    <input type="file" multiple name="doctoplanofisico[]" id="doctoplanofisico" placeholder="doctoplanofisico"/>
                                                    <?php if (!empty($doctoplanofisico)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanofisico; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if (empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *<?php echo form_error('doctopredial') ?></label>
                                                        <input type="file" multiple name="doctopredial[]" id="doctopredial" placeholder="doctopredial"/>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $doctopredial; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>

                                                <?php if (!empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *</label>

                                                        <?php if (!empty($rpredialar)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="varchar">Escritura Pública de Propiedad que contenga la Foja Registral y ampare la Superficie Registrada (en caso de no contener la foja registral anexar copia de Libertad de Gravamen) *<?php echo form_error('doctolegal') ?></label>

                                                <input type="file" multiple name="doctolegal[]" id="doctolegal" placeholder="doctolegal"/>
                                                <?php if (!empty($doctolegal)): ?>
                                                    <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctolegal; ?>">Descargar</a>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group col-md-6" id="hiddendoctopago">
                                                <?php if (!empty($status)): ?>
                                                    <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                    <input type="file" multiple name="doctopago[]" id="doctopago"/>
                                                    <?php if (!empty($doctopago)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopago; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>

                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                        </div>

                                        <div class="row">
                                            <?php if ($this->session->userdata('tipo') == 1555): ?>
                                                <div class="col-md-12">



                                                    <div class="form-group col-md-3">
                                                        <a data-target="#full" data-toggle="modal" class="btn btn-success">Generar Documento Clave catastral</a>
                                                    </div>   
                                                </div>   
                                            <?php endif; ?>
                                            <div class="col-md-12">
                                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                <div class="form-group">
                                                    <button type="submit" id="solicitar" class="btn btn-primary"><?php echo $button ?></button>
                                                    <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . "claves_catastrales_fraccionamiento/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                    <?php endif; ?>
                                                    <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                                        <a href="<?php echo base_url(); ?>claves_catastrales_fraccionamiento" class="btn btn-danger">Cancelar</a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_fraccionamiento" class="btn btn-danger">Cancelar</a>
                                                    <?php } ?>

                                                </div>
                                            </div>
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
        <div class="quick-nav-overlay"></div>

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

                                                            setTimeout(function () {
                                                                var colonia = $('#cbocoloniaui').val();
                                                                if (colonia == 0 && colonia != "") {
                                                                    $('#coloniados').removeClass('hidden');
                                                                    $('#coloniauno').addClass('hidden');
                                                                }
                                                            }, 100);
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
                    center: {lat: 20.6767222, lng: -101.3681677}
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
                            $(".dz-success-mark").addClass("hidden");//dz-error-mark
                            $(".dz-error-mark").addClass("hidden");//dz-error-mark
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
                    ,
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
                if (Clave != "APERTURA") {
                    if (Clave.length == 12) {
                        $.ajax({
                            url: "../claves_catastrales_individual/predial",
                            data: {predial: "" + Clave},
                            type: "POST",
                            dataType: 'json',

                            success: function (respuesta) {
                                if (respuesta) {
                                    $('#calleui').val(respuesta.CALLE_ID);
                                    $('#nooficialui').val(respuesta.NO_EXTERIOR);
                                    $('#nooficialinui').val(respuesta.NO_INTERIO);
                                    $('#cbocoloniaui').val(respuesta.COLONIA_ID);
//                        alert($('#cbocoloniaui').find('option:selected').text());
                                    $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                                    $('#noloteui').val(respuesta.LOTE);
                                    $('#nomanzanaui').val(respuesta.MANZANA);
                                    $('#categoriapredioui').val(respuesta.TIPO_PREDIO_ID);
                                    $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato, Guanajuato");
                                      $('#nombrepropietariodp').val(respuesta.NOMBRE+" "+respuesta.APELLIDO_PATERNO+" "+respuesta.APELLIDO_MATERNO);
                                    var cod = document.getElementById("cbocoloniaui").value;
                                    if (cod) {

                                        $('#coloniauno').removeClass('hidden');
                                        $('#coloniados').addClass('hidden');
                                        $("#colonia2").removeAttr("required");
                                    } else {
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
                                    $('#noloteui').val("");
                                    $('#nomanzanaui').val("");
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
                } else {
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
                }
            });
        </script>

    </body>
</html>
