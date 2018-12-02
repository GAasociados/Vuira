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
        <title>Ventanilla Universal Irapuato</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url(); ?>assets/apps/css/dropzone.min.css" rel="stylesheet" type="text/css" />
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
                                        <h1>Claves Catastrales Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica</h1>
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
                                        $modificar = "readonly";
                                        ?>

                                    <?php endif; ?>
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

                                                <b>Clave Catastral Individual con Certificado Parcelario</b><i class="fa fa-check"></i>
                                            </a>
                                        </li>
                                    </ul>

                                    <!--<h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>-->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <div class="row">
                                            <?php if (isset($nocontrol)): ?>

                                                <div class="form-group">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de control de seguimiento</label>
                                                        <input readonly=""  type="text" class="form-control" name="nocontrol" id="nocontrol" placeholder="Numero de control" value="<?php echo $nocontrol ?>"/>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                            <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3 ) && isset($fechafinal) && isset($nocontrol)): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="4" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_individual_cetificado/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Imprimir Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?> 

                                        </div>
                                        <div class="row" id="paso1">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <label for="varchar">¿Eres propietario del inmueble?</label><br>
                                                    <label>Si</label>
                                                    <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                    <label>No</label>
                                                    <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso7">
                                            <div class="form-group hidden" id="datosp"> 
                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h4  class="block">Información del solicitante Persona Moral o Física</h4>
                                                    </div> 
                                                </div>


                                                <div class="col-md-12">
                                                    <label>¿Por favor indique que tipo de persona es?</label><br>
                                                    <label>Moral</label>
                                                    <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                    <label>Física</label>
                                                    <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                </div>



                                                <!--                                                <div class="col-md-4" id="fisrfc">
                                                                                                    <label>Ingrese su INE</label>
                                                                                                    <input class="form-control" type="text" maxlength="13" pattern="[A-Z|0-9]+" name="fisrfc" id="fisrfc" placeholder="Ingrese su INE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fisrfc; ?>">
                                                                                                </div>-->
                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional)</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class=""  type="file" name="morine" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $morine; ?>">Visualizar Documento</a>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label> 

                                                            Carta Poder Simple emitida por el propietario al solicitante</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="cartapoder" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($cartapoder)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $cartapoder; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!--                                                <div class="col-md-4" id="">
                                                                                                    <label for="varchar">Nombre del Solicitante <?php echo form_error('nombreresolicitante') ?></label>
                                                                                                    <input type="text" class="form-control" pattern="[A-Z|0-9]+" name="nombreresolicitante" id="nombreresolicitante" placeholder="Nombre del Solicitante" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $nombreresolicitante; ?>" />
                                                                                                </div>-->
                                                <div id="fisrfc" class="col-md-12">
                                                    <div class="col-md-4 ">
                                                        <label>Escritura de Compra-Venta</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  type="file" name="compraventa" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($compraventa)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $compraventa; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Documento Acta constitutiva</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="docacta"value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($docacta)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $docacta; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="predialso" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($predialso)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $predialso; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <h4 class="block">Identificación y Ubicación del Inmueble</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">


                                            <div class="form-group col-md-3">
                                                <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                <input <?php echo $modificar; ?> required="" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" class="form-control"  pattern="[A-Z0-9 .-ÑÁÉÍÓÚ]+" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                            </div>

                                            <div class=" col-md-3">
                                                <label for="varchar">Número Exterior *</label>
                                                <input <?php echo $modificar; ?>  required="" type="text" class="form-control" pattern="[A-Za-z0-9 -/]+" name="numext" id="numext" placeholder="Número Exterior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numext; ?>" />
                                            </div>    
                                            <div class=" col-md-2">
                                                <label for="varchar">Número Interior</label>
                                                <input <?php echo $modificar; ?> type="text" class="form-control" name="numint" pattern="[A-Za-z0-9 -/]+" id="numint" placeholder="Número Interior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numint; ?>" />
                                            </div> 

                                            <div class="form-group col-md-4">
                                                <label for="int"> Poblado/Localidad/Comunidad/Ejido *<?php echo form_error('cbocomunidad') ?></label>
                                                <input <?php echo $modificar; ?> required type="text" class="form-control" pattern="[A-Za-z0-9 -/.ÑÁÉÍÓÚ]+" name="cbocomunidad" id="cbocomunidad" placeholder="Poblado/Localidad/Comunidad/Ejido" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"     value="<?php echo $cbocomunidad; ?>" />
                                            </div>
                                        </div>
                                        <div id="paso4">
                                            <div class="row">


                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote  *<?php echo form_error('noloteui') ?></label>
                                                    <input required="" <?php echo $modificar; ?> type="text" class="form-control" pattern="L-[0-9]+" name="noloteui" id="noloteui" placeholder="Número de Lote" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $noloteui != "" ? $noloteui : "L-"; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana *<?php echo form_error('nomanzanaui') ?></label>
                                                    <input required="" <?php echo $modificar; ?> type="text" pattern="M-[0-9]+" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $nomanzanaui != "" ? $nomanzanaui : "M-"; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Zona/Lote/Parcela <?php echo form_error('zonaloteparcela') ?></label>
                                                    <input <?php echo $modificar; ?> type="text" class="form-control" pattern="[A-Za-z0-9 ./-ÑÁÉÍÓÚ]+" name="zonaloteparcela" id="zonaloteparcela" placeholder="Zona/Lote/Parcela" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $zonaloteparcela != "" ? $zonaloteparcela : "S/N"; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar"> Porción de Zona/Lote/Parcela </label>
                                                    <input <?php echo $modificar; ?> type="text" class="form-control" pattern="[A-Za-z0-9 ./-ÑÁÉÍÓÚ]+" name="porcionp" id="porcionp" placeholder="porcionp de Zona/Lote/Parcela" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $porcionp != "" ? $porcionp : "S/N"; ?>" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" id="paso5">
                                            <?php if (!empty($mapa)) { ?>
                                                <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                            <?php } else { ?>
                                                <input id="address" type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                            <?php } ?>


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
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <br>
                                                    <h4  class="block">Datos del Propietario </h4>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row" id="paso6">
                                            <div class="form-group">
                                                <div class="col-md-6">

                                                    <label for="varchar">Nombre del Propietario  *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input pattern="[A-Z0-9 .-ÑÁÉÍÓÚ]+" <?php echo $modificar; ?> required type="text" class="form-control"  name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre del Propietario" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="datosnot">
                                                <div class="col-md-12">

                                                    <h4 class="block">Domicilio Para Recibir Notificaciones</h4>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-3">

                                                        <label for="varchar">Calle *<?php echo form_error('callenotificacionesdp') ?></label>
                                                        <input <?php echo $modificar; ?> type="text"  class="form-control" pattern="[A-Z0-9 -/]+" name="callenotificacionesdp" id="callenotificacionesdp" placeholder="Calle" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $callenotificacionesdp; ?>" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="varchar">Número Exterior *<?php echo form_error('numeronotificacionedp') ?></label>
                                                        <input <?php echo $modificar; ?> type="text" pattern="[A-Z0-9 -/]+" class="form-control" name="numeronotificacionedp" id="numeronotificacionedp" placeholder="Número Exterior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numeronotificacionedp; ?>" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="varchar">Número Interior </label>
                                                        <input <?php echo $modificar; ?> type="text" class="form-control" pattern="[A-Z0-9 -/]+" name="numeronotificacionedpint" id="numeronotificacionedpint" placeholder="Número Interior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numeronotificacionedpint; ?>" />
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('colonianotificacionesdp') ?></label>

                                                        <select <?php echo $modificar; ?> class="form-control" name="colonianotificacionesdp" tabindex="-1"  id="colonianotificacionesdp"/>
                                                        <?php
                                                        if (!empty($colonianotificacionesdp)):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($colonianotificacionesdp);
                                                            ?>
                                                            <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">
                                                                <?php echo $arraycolonia->NOMBRE; ?>
                                                            </option>

                                                        <?php endif; ?>


                                                        <?php
//                                                            die(print_r($consulta->result(),true));
                                                        foreach ($consulta->result() as $fila) {
                                                            ?>
                                                            <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                                <?php echo $fila->NOMBRE; ?>
                                                            </option>
                                                        <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" >
                                            <BR>
                                            <div class="form-group">
                                                <div  class="col-md-4" id="paso9">
                                                    <div class="col-md-6">
                                                        <label for="varchar">Correo Electrónico *<?php echo form_error('correonotificacionesdp') ?></label>
                                                        <input <?php echo $modificar; ?> required type="email" class="form-control" name="correonotificacionesdp" id="correonotificacionesdp" placeholder="CORREO ELECTRONICO" value="<?php echo $correonotificacionesdp == "" ? $this->session->userdata('correo') : $correonotificacionesdp; ?>" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="varchar">Telélefono *<?php echo form_error('telefononotificacionesdp') ?></label>
                                                        <input <?php echo $modificar; ?> maxlength="10" required pattern="[0-9]{7,10}" type="text" class="form-control" name="telefononotificacionesdp" id="telefononotificacionesdp" placeholder="TELÉLEFONO" value="<?php echo $telefononotificacionesdp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                    </div>
                                                </div>
                                                <div   class="col-md-4" id="paso9a">
                                                    <div class="col-md-12">

                                                        <label for="int">Tipo de Trámite Que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                        <select <?php echo $modificar; ?> required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">

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
                                                                <option>SELECCIONA UNA OPCIÓN</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                            <?php } ?>
                                                        </select>


                                                    </div>
                                                </div>
                                                <div  class="col-md-4"id="paso9b">
                                                    <div class="col-md-12">

                                                        <label for="int">Motivo del Trámite *<?php echo form_error('motivotramitedp') ?></label>

                                                        <select <?php echo $modificar; ?> required class="form-control" name="motivotramitedp" tabindex="-1" id="motivotramitedp" value="<?php echo $motivotramitedp; ?>">

                                                            <?php if ($motivotramitedp == 1) { ?>

                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                            <?php } elseif ($motivotramitedp == 2) {
                                                                ?>

                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                            <?php } elseif ($motivotramitedp == 3) {
                                                                ?>

                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                            <?php } elseif ($motivotramitedp == 3) { ?>

                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>

                                                            <?php } else { ?>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>

                                                            <?php } ?>
                                                        </select>


                                                    </div>
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
                                        <div class="row" id="paso10">
                                            <div class="form-group">
                                                <?php if (empty($rpredial)): ?>         
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Predial Actualizado*<?php echo form_error('doctopredial') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file"  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  name="doctopredial" id="doctopredial"  placeholder="Recibo impuesto predial" />
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctopredial; ?>">Visualizar Documento </a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($rpredial)): ?>         
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Predial Actualizado*</label>
                                                        <br>
                                                        <?php if (!empty($rpredialar)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Visualizar Documento </a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>   
                                                <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE, Pasaporte, Cédula Profesional) *<?php echo form_error('doctoine') ?></label>

                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file"  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  name="doctoine[]" id="doctoine" multiple="" placeholder="Documento IFE"/>
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctoine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE, Pasaporte, Cédula Profesional) *</label>
                                                        <br>
                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Título de la propiedad, Certificado Parcelario,Contrato Privado de Compraventa CORETT o Sentencia Juridica que haya causado ejecutoria o Estado (Certificada). Deberan estar debidamente inscritos en el Registro Público. *<?php echo form_error('doctotitulo') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" name="doctotitulo[]" id="doctotitulo" multiple="" placeholder="Poder Simple en caso de que el Trámite se Realizado por el Representante Legal" />
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctotitulo)): ?>
                                                        <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctotitulo; ?>">Visualizar Documento</a>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <div id="otrosdoc" class="form-group col-md-4  <?php echo $otros_doc == 0 ? "hidden" : ' ' ?>">
                                                    <label for="varchar">Adjuntar otra documentación (Si son varios archivos por favor adjuntar un archivo .rar)*<?php echo form_error('otradoc') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  name="otradoc" id="otrodoc" placeholder=""/>
                                                    <?php endif; ?>
                                                    <br>

                                                    <?php if (!empty($otradoc)): ?>
                                                        <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $otradoc; ?>">Visualizar Documento</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row"> 
                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">

                                        </div>
     
                                            <div class="row">        
                                                <div class="form-group col-md-4" id="hiddendoctopago">
                                                    <?php if (!empty($status)): ?>
                                                        <label for="varchar" id="parpadear"> <b>Documento Orden de Pago</b> <?php echo form_error('doctopago') ?></label>

                                                        <?php if (!empty($doctopago)): ?><br>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctopago; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-4" id="hiddendoctopago">
                                                    <?php if (!empty($status)): ?>
                                                        <label for="varchar" id="parpadear"> <b>Documento comprobante de pago</b> <?php echo form_error('doctopago') ?></label>

                                                        <?php if (!empty($compro)): ?><br>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $compro; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                             
                                  

                                                    <div class="col-md-4" id="hiddendoctofinal">
                                                        <label for="varchar"> <b>Documento Final *</b> <?php echo form_error('doctofinal') ?></label>
                                                        
                                                        <?php if (!empty($doctofinal)): ?><BR>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctofinal; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                   


                                              
                                        
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                
                                                    <a href="<?php echo base_url(); ?>claves_catastrales_individual" class="btn btn-primary">Regresar</a>
                                       
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
            </div>  </div>
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
           

        <?php if ($imuvii == 1): ?>
            <div class="modal fade" id="fullimu" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content"> 
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos del Documento Final</h4>
                        </div>

                        <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalcertificadoimuvii_vista" method="post">

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
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $otradoc; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                                <?php endif; ?>
                                                                <?php // if ($mdocaux1):  ?>
                                        <!--<a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $mdocaux1; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>-->
                                                                <?php // endif; ?>
                                                                <?php if ($rpredialar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>" title="Visualizar"><i class="fa fa-file"></i> Poder Notaria</a>
                                                                <?php endif; ?>

                                                                <?php if ($doctolegalpropiedad): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctolegalpropiedad; ?>" title="Visualizar Documneto De Propiedad"><i class="fa fa-file"></i> Documento De Propiedad</a>
                                                                <?php endif; ?>
                                                                <?php if ($identificacionar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>   
                                                                <?php if ($morine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $morine; ?>" title="Visualizar Indetificacion de Propietario "><i class="fa fa-file"></i> Identificación Propietario</a>
                                                                <?php endif; ?>
                                                                <?php if ($doctoine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctoine; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($cartapoder): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $cartapoder; ?>" title="Visualizar Carta Poder"><i class="fa fa-file"></i> Carta Poder</a>
                                                                <?php endif; ?>  

                                                                <?php if ($fisrfc): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $fisrfc; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Escritura Compra-Venta</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">En atención a*</label>
                                                                    <input required name=""  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" placeholder="Nombre" readonly class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">


                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar"> Número de folio *</label>
                                                                    <input required name="folio"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -/]+"  placeholder="Número de folio " value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="date">Fecha de Constancia *</label>
                                                                    <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                        <input class="form-control" placeholder="FECHA DE CONSTANCIA" required type="text" readonly="" name="fecha_const" ><span class="input-group-btn">
                                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar"> Superfice mts2 *</label>
                                                                    <input required name="super"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -/]+"  placeholder="Superfice mts2 " value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Nombre del Encargado IMUVII*</label>
                                                                    <input required name="nombre_imuvii" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" placeholder="Nombre del Encargado "  class="form-control"/>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Clave Catastral *</label>
                                                                    <input required pattern="([0-9]{18})|([0-9]{15})" id="clavenueva" name="clave" placeholder="Clave Catastral" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Número de Oficio *</label>
                                                                    <input required  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" name="Oficio" placeholder="NÚMERO DE FOLIO" class="form-control" value=""/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <h5>Observaciones</h5>
                                                                <textarea rows="5" class="col-md-12" name="observaciones" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" ></textarea>
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


        <?php else: ?>
            <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Croquis Del Predio</h4>
                            <label>Guía para recortar imagen de word <a target="_blank" href="https://support.microsoft.com/es-mx/help/13776/windows-use-snipping-tool-to-capture-screenshots">Aquí</a></label>
                        </div>




                        <div clas="modal-body"> 

                            <div class="container-fluid">
                                <form  class="dropzone" id="subir" action="<?php echo base_url(); ?> docstramites/documentoclave/imagencerficidado" method="post">
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

                                    </div>
                                </form>
                            </div>

                        </div>


                        <div class="modal-footer">

                            <button class="btn btn-success" id="submit-all">Guardar Imagen</button>

                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                        </div>
                        <div class="modal-header">

                            <h4 class="modal-title">Datos del Documento Final</h4>
                        </div>

                        <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalcertificado_vista" method="post">

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
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $otradoc; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                                <?php endif; ?>
                                                                <?php if ($compraventa): ?>
                                                                    <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="//<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $compraventa; ?>"><i class="fa fa-file"></i> Documento Compra-Venta</a>
                                                                <?php endif; ?>

                                                                <?php if ($doctolegalpropiedad): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctolegalpropiedad; ?>" title="Visualizar Documneto De Propiedad"><i class="fa fa-file"></i> Documento De Propiedad</a>
                                                                <?php endif; ?>
                                                                <?php if ($identificacionar): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>   
                                                                <?php if ($morine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $morine; ?>" title="Visualizar Indetificacion de Propietario "><i class="fa fa-file"></i> Identificación Propietario</a>
                                                                <?php endif; ?>
                                                                <?php if ($doctoine): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctoine; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                                <?php endif; ?>
                                                                <?php if ($cartapoder): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $cartapoder; ?>" title="Visualizar Carta Poder"><i class="fa fa-file"></i> Carta Poder</a>
                                                                <?php endif; ?>  

                                                                <?php if ($fisrfc): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $fisrfc; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Escritura Compra-Venta</a>
                                                                <?php endif; ?>
                                                                <?php if ($docacta): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $docacta; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Documento Acta constitutiva</a>
                                                                <?php endif; ?>
                                                                <?php if ($predialso): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $predialso; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Documento Poder Notarial</a>
                                                                <?php endif; ?>
                                                                <?php if ($doctopredial): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctopredial; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Documento Predial</a>
                                                                <?php endif; ?>
                                                                <?php if ($doctotitulo): ?>
                                                                    <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctotitulo; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Documento Propiedad</a>
                                                                <?php endif; ?>                                                        </div>
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
                                                                    <label for="varchar"> Caracter  *</label>
                                                                    <input required name="caracter"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -/]+"  placeholder="caracter " value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Co-propietario Nombre </label>
                                                                    <input name="coop" title="Ingrese el nombre del co-propietario si es necesario" placeholder="Nombre Co-propietario"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-/]+"  value="" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">

                                                                <div class="form-group col-md-4 hidden">
                                                                    <label for="varchar"> Número de Escritura Pública *</label>
                                                                    <input   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-/]+"  name="no_escritura" placeholder="Númer Escritura" value="" class="form-control" value=""/>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="date">Fecha de titulo, escrituras o documento de propiedad *</label>
                                                                    <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                        <input class="form-control" placeholder="fecha de escrituras" required type="text" readonly="" name="fecha_escritura" ><span class="input-group-btn">
                                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6 hidden">
                                                                    <label for="varchar"> Nombre del notario público *</label>
                                                                    <input  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-/ÑÁÉÍÓÚ]+"  name="notario" placeholder="Nombre del Notario Público " value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-4 hidden">
                                                                    <label for="varchar">Numero de notario público *</label>
                                                                    <input  name="no_notario" placeholder="Número de Notario Público" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -./]+"   value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar">Número de Oficio *</label>
                                                                    <input   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -./]+"  required name="numero_doc" placeholder="Número de Oficio " value="" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="varchar"> Superficie del terreno*</label>
                                                                    <input required name="sup" placeholder="superficie"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-/]+"  value="" class="form-control" />
                                                                </div>
                                                                <div  class="form-group col-md-2">
                                                                    <label for="varchar">Superfice</label><br>

                                                                    m² <input required="" value="m²" name="tipo_sup" type="radio">  ha<input required value="ha" name="tipo_sup" type="radio">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Numero de Titulo o Escritura*</label>
                                                                    <input maxlength="12"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-/]+"  name="no_escritura" placeholder="Númer Titulo o Escritura" value="" class="form-control" value=""/>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Clave Catastral *</label>
                                                                    <input required id="clavenueva" name="clave" placeholder="Númer Escritura" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar"> Numero de expediente *</label>
                                                                    <input readonly=""  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -./]+"  required name="numero_exp" placeholder="Número de Expediente " value="<?php echo $nocontrol; ?>" class="form-control" />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="varchar">Estado de Creacion de Documento*</label>
                                                                    <select class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  tabindex="-1" required name="estado" >
                                                                        <option value="">Seleccione un estado</option>
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
                                                                <div class="form-group col-md-4">
                                                                    <label for="varchar">Ciudad de Creacion de Documento *</label>
                                                                    <input required name="ciudad" placeholder="Ciudad De Escritura" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -./ÑÁÉÍÓÚ]+"   value="" class="form-control" />
                                                                </div>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-md-12">
                                                                <label>Por favor indicar si la propiedad se encuentra en régimen</label><br>
                                                                <input type="checkbox" name="Privativa" id ="priv" value="Área Privativa"> Área Privativa <input name="Privativat" id="privt" class="hidden" type="text"><br>
                                                                <input type="checkbox" name="Cubierta" id="Cub"  value="Área Común"> Área Común  <input name="Cubiertat" id="Cubt" class="hidden" type="text"><br>
                                                                <input type="checkbox" name="indivisot" id="indt" value="Total Indiviso"> Total Indiviso <input name="indivisott" id="indtt" class="hidden" type="text"><br>
                                                                <input type="checkbox" name="Indivisop" id="indp"  value="Porcenta">Porcentaje Indiviso <input name="Indivisopt" id="indpt" class="hidden" type="text"><br>
                                                                <script>
                                                                    $("#priv").on("click", function () {
                                                                        if ($("#privt").hasClass('hidden')) {
                                                                            $("#privt").removeClass('hidden');
                                                                        } else {
                                                                            $("#privt").addClass('hidden');
                                                                            $("#privt").val("");
                                                                        }
                                                                    });
                                                                    $("#Cub").on("click", function () {
                                                                        if ($("#Cubt").hasClass('hidden')) {
                                                                            $("#Cubt").removeClass('hidden');
                                                                        } else {
                                                                            $("#Cubt").addClass('hidden');
                                                                            $("#Cubt").val("");
                                                                        }
                                                                    });
                                                                    $("#indt").on("click", function () {
                                                                        if ($("#indtt").hasClass('hidden')) {
                                                                            $("#indtt").removeClass('hidden');
                                                                        } else {
                                                                            $("#indtt").addClass('hidden');
                                                                            $("#indtt").val("");
                                                                        }
                                                                    });
                                                                    $("#indp").on("click", function () {
                                                                        if ($("#indpt").hasClass('hidden')) {
                                                                            $("#indpt").removeClass('hidden');
                                                                        } else {
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
                                                                <textarea rows="5" class="col-md-12" name="observaciones" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" ></textarea>
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
        <?php endif; ?>
        <div class="modal fade" id="fullnega" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos del Documento Negación</h4>
                    </div>

                    <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalnegacioncer_vista" method="post">

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


        <?php if ($this->session->userdata('tipo') == 15): ?>
            <div class="modal fade" id="talon" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos</h4>
                        </div>
                        <form target="_blank" action="<?php echo base_url(); ?>claves_catastrales_individual_cetificado/vistapa" method="post">
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
        <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
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
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <!-- mmmmmmmmmm -->
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

                                                                        $('#cbocomunidad').keyup(function () {
                                                                            //geocodeAddress(geocoder,map);
                                                                            //nooficial
                                                                            $('#address').val($('#calleui').val() + "" + $('#cbocomunidad').val() + " Irapuato, Guanajuato");
                                                                            initMap();
                                                                            //calleui
                                                                        });
                                                                    });
        </script>
        <!-- MAPA -->

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
<?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155): ?>
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
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>


        <script>
            Dropzone.options.subir = {
                url: "<?php echo base_url(); ?>docstramites/documentoclave/imagencerficidado",
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
                        $(".dz-success-mark").addClass("hidden");//dz-error-mark
                        $(".dz-error-mark").addClass("hidden");//dz-error-mark
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

            function iniciarAyuda() {

                var enjoyhint_instance = new EnjoyHint({});
                var enjoyhint_script_steps = [
                    {
                        "next #ayuda": 'Bienvenido al Trámite de Clave Catastral Certificada.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona el botón "Siguiente".',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    },

                    {
                        "next #paso1": 'Inidique seleccionando la casilla si, la persona solicitante es el propietario del predio.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    },
                    {
                        "next #paso2": 'Ingrese el Número del titulo de propiedad este numero cuenta con 12 digitos Ejemplo: 000000032312.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso3": 'Para la localización del predio ingrese los siguientes datos.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso4": 'Continuando con los datos del predio por favor ingrese los siguientes datos.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso5": '<span style="color:black;"> Por favor indica con el puntero rojo la ubicación de tu predio.<br>De click en "Siguiente" para continuar..</span>',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso6": 'Indique el nombre del propietario del predio.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,

                    {
                        "next #paso9": '<br>Verifique que su correo electronico sea el correcto y agrege un número de teléfono para recibir notificaciones<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso9a": '<br><br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }

                    ,
                    {
                        "next #paso9b": 'Para darle un mejor servicio, seleccione para que asunto requiere la Clave Catastral.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }

                    ,

                    {
                        "next #paso10": 'Adjunte los documentos originales escaneados en .PDF o Imagenes<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }

                    ,

                    {
                        "next #solicitar": 'De click en solicitar trámite, aparecera una notificacíon de trámite solicitado.<br>De click en "Finalizar" para concluir el tutorial..',
                        "nextButton": {text: "Finalizar"},
                        showSkip: false
                    }

                ];
                enjoyhint_instance.set(enjoyhint_script_steps);

                enjoyhint_instance.run();
            }
        </script>
    </body>
</html>
