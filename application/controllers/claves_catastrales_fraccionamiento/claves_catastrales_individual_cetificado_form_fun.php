
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

                                                <b>Clave Catastral Individual</b><i class="fa fa-check"></i>
                                            </a>
                                        </li>
                                    </ul>

                                    <!--<h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>-->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form id="" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <?php if ($nocontrol): ?>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de control de seguimiento</label>
                                                        <input type="text" readonly="" class="form-control" name="nocontrol" id="nocontrol" placeholder="Numero de control" value="<?php echo $nocontrol ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
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

                                                        <h4  class="block">Datos del Representante</h4>
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
                                                        <label>Identificación (INE, Pasaporte, Cédula Profesional) Propietario</label>
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
                                                        <label>Adjuntar documento Acta constitutiva</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="docacta"value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($docacta)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $docacta; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <label>Adjuntar Poder Notarial para represenetación de persona moral</label>
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


                                            <div class="form-group" >

                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                    <input  autocomplete="off"  <?php echo $modificar; ?> required="" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" class="form-control"  pattern="[A-Z0-9 ,.-ÑÁÉÍÓÚ]+" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                </div>

                                                <div class=" col-md-3">
                                                    <label for="varchar">Número Exterior *</label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?>  required="" type="text" class="form-control" pattern="[A-Za-z0-9 -/]+" name="numext" id="numext" placeholder="Número Exterior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numext != "" ? $numext : "S/N"; ?>" />
                                                </div>    
                                                <div class=" col-md-2">
                                                    <label for="varchar">Número Interior</label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?> type="text" class="form-control" name="numint" pattern="[A-Za-z0-9 -/]+" id="numint" placeholder="Número Interior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numint; ?>" />
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="int"> Poblado/Localidad/Comunidad/Ejido *<?php echo form_error('cbocomunidad') ?></label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?> required type="text" class="form-control" pattern="[A-Za-z0-9 -/.ÑÁÉÍÓÚ]+" name="cbocomunidad" id="cbocomunidad" placeholder="Poblado/Localidad/Comunidad/Ejido" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"     value="<?php echo $cbocomunidad; ?>" />
                                                </div>

                                            </div>
                                        </div>
                                        <div id="paso4">
                                            <div class="row">


                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote  *<?php echo form_error('noloteui') ?></label>
                                                    <input  autocomplete="off"   type="text" class="form-control" pattern="L-[0-9A-Z -/]+"  title="El formato de este campo es (L-Número)"  name="noloteui" id="noloteui" placeholder="Número de Lote" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $noloteui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana *<?php echo form_error('nomanzanaui') ?></label>
                                                    <input autocomplete="off"     type="text" pattern="M-[0-9A-Z -/]+" class="form-control" name="nomanzanaui"  title="El formato de este campo es (L-Número)"  id="nomanzanaui" placeholder="Manzana" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $nomanzanaui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Zona/Lote/Parcela <?php echo form_error('zonaloteparcela') ?></label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?> type="text" class="form-control" pattern="[A-Za-z0-9 .-ÑÁÉÍÓÚ]+" name="zonaloteparcela" id="zonaloteparcela" placeholder="Zona/Lote/Parcela" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $zonaloteparcela; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar"> Porción de Zona/Lote/Parcela </label>
                                                    <input   autocomplete="off"  type="text" class="form-control" pattern="[A-Za-z0-9 ./-ÑÁÉÍÓÚ]+" name="porcionp" id="porcionp" placeholder="porcionp de Zona/Lote/Parcela" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $porcionp != "" ? $porcionp : "S/N"; ?>" />
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
                                                    <input  autocomplete="off"  pattern="[A-Z0-9 .,-ÑÁÉÍÓÚ]+" <?php echo $modificar; ?> required type="text" class="form-control"  name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre del Propietario" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>

                                            </div>
                                        </div>



                                        <div class="row" >
                                            <BR>
                                            <div class="form-group">
                                                <div  class="col-md-4" id="paso9">
                                                    <div class="col-md-6">
                                                        <label for="varchar">Correo Electrónico *<?php echo form_error('correonotificacionesdp') ?></label>
                                                        <input <?php echo $modificar; ?> required type="email" class="form-control" name="correonotificacionesdp" id="correonotificacionesdp" placeholder="CORREO ELECTRONICO" value="<?php echo $correonotificacionesdp; ?>" />
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

                                                            <?php
//                                                           
                                                            if ($tipotramitedp == "1") {
                                                                ?>

                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                            <?php } elseif ($tipotramitedp == "2") {
                                                                ?>

                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
<?php } elseif ($tipotramitedp == "3") { ?>

                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
<?php } else { ?>
                                                                <option value="">SELECCIONA UNA OPCIÓN</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
<?php } ?>
                                                        </select>


                                                    </div>
                                                </div>
                                                <div  class="col-md-4"id="paso9b">
                                                    <div class="col-md-12">
<?php // die(print_r($motivotramitedp,true)) ?>
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
                                                                <option value="">SELECCIONA UNA OPCIÓN</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
<?php } ?>
                                                        </select>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">

                                                <h4 class="block"> Adjunte los Siguientes Archivos en Original</h4>
                                            </div>
                                        </div>
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
                                                        <label for="varchar">Identificación (INE, Pasaporte, Cédula Profesional)  Puede adjuntar uno o varios archivos*<?php echo form_error('doctoine') ?></label>

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
                                                        <label for="varchar">Identificación (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos *</label>
                                                        <br>
                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                    <?php endif; ?>
                                                    </div>
<?php endif; ?>

                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Título de la propiedad, Certificado Parcelario, Contrato Privado de Compraventa CORETT o Sentencia Jurídica que haya causado ejecutoria o Estado (Certificada). Deberan estar debidamente inscritos en el Registro Público. Puede adjuntar uno o varios archivos *<?php echo form_error('doctotitulo') ?></label>
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
                                            <div class="form-group col-md-12" id="hiddendoctopago">
<?php if (!empty($status)): ?>
                                                    <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                    <input type="file"  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" multiple name="doctopago" id="doctopago"/>
                                                    <?php if (!empty($doctopago)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctopago; ?>">Descargar</a>
                                                    <?php endif; ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row"> 

                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
<?php if ($clave): ?>
                                                <div class="form-group">
                                                    <div class="form-group col-md-4">
                                                        <label>Clave Catastral</label>
                                                        <input placeholder="Clave Catastral" name="clavecat" id="clavecat" class="form-control" readonly value="<?php echo $clave ?>" >
                                                    </div>
                                                </div>
<?php endif; ?> 
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                <button type="submit" id="solicitar"class="btn btn-primary"><?php echo $button ?></button>
                                                <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                    <a class="btn btn-success" href="<?php echo base_url() . "claves_catastrales_individual_cetificado/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                <?php endif; ?>
                                                <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                                    <a href="<?php echo base_url(); ?>claves_catastrales_individual_cetificado" class="btn btn-primary">Cancelar</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-primary">Cancelar</a>
<?php } ?>
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
                        document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
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

    </body>
</html>
