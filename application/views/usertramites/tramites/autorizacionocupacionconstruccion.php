<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js">
<![endif]-->
<!--[if !IE]><!-->
<html lang="es">
   <!--<![endif]-->
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <title>Aviso de Terminación de Obra</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      
      <meta content="" name="author" />
      <!-- BEGIN GLOBAL MANDATORY STYLES -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
      <!-- END GLOBAL MANDATORY STYLES -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
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
                              <h1>Aviso de Terminación de Obra</h1>
                           </div>
                           <!-- END PAGE TITLE -->
                        </div>
                     </div>
                     <!-- END PAGE HEAD-->
                     <!-- BEGIN PAGE CONTENT BODY -->
                     <div class="page-content">
                        <div class="container-fluid">
                           <!-- BEGIN PAGE CONTENT INNER -->
                           <div class="page-content-inner">
                              <form class="form-horizontal" role="form" action="<?php echo base_url('index.php/tramites/Autorizacionocupacionconstruccion/savetram');?>" method="POST">
                                 <div class="tab-content">
                                <a href="<?php echo base_url(); ?>infotramites/info_autorizacion_ocupacion_construccion" class="btn btn-primary">Cancelar</a>
                                <br><br>
                                    <div class="tab-pane active" id="tab1">
                                       <ul class="nav nav-pills nav-justified steps">
                                          <li class="active">
                                             <a data-toggle="tab" class="step" aria-expanded="true">
                                             <span class="number"> 1 de 4 - </span>
                                             <span class="desc">
                                             <b> Datos Generales </b><i class="fa fa-check"></i></span>
                                             </a>
                                          </li>
                                       </ul>

                                       <h4 class="block">Datos Generales</h4>

                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nombre del Propietario *

                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" name="nombrepropietariodg" placeholder="Nombre del Propietario"   id="nombrepropietariodg"/>
                                             <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Paterno de propietario *

                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" name="apellidopaternopropietariodg" placeholder="Apellido Paterno del Propietario"   id="apellidopaternopropietariodg"/>
                                             <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Materno del propietario *

                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" name="apellidomaternopropietariodg" placeholder="Apellido Materno del Propietario"   id="apellidomaternopropietariodg"/>
                                             <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>
                                       <hr style="display: lock; height: 1px; border: 0; border-top: 1px solid #337ab7; margin: 1em 0; padding: 0;">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nombre del Representante

                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input type="text" class="form-control" name="nombresolicitantedg"  id="nombresolicitantedg" placeholder="Nombre del Representante" />
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Paterno del Representante

                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input type="text" class="form-control" name="apellidopaternosolicitantedg"  id="apellidopaternosolicitantedg" placeholder="Apellido Paterno del Representante" />
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Materno del Representante

                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input type="text" class="form-control" name="apellidomaternosolicitantedg"  id="apellidomaternosolicitantedg" placeholder="Apellido Materno del Representante" />
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <hr style="display: lock; height: 1px; border: 0; border-top: 1px solid #337ab7; margin: 1em 0; padding: 0;">
                                       <h4 class="block">Domicilio Para Recibir Notificaciones</h4>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Calle *

                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input type="text" class="form-control" name="calledg" placeholder="Calle" id="calle" />
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Número *

                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input type="text" class="form-control" id="numerodg" name="numerodg" placeholder="Número" />
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Colonia/Barrio/Fraccionamiento * </label>
                                          <div class="col-md-4">
                                             <select class="form-control" name="coloniadg" id="cbocols">

                                                <?php foreach ($consulta->result() as $fila) { ?>
                                                <option value="<?php echo $fila->ID;?>">
                                                   <?php echo $fila->colonia." - ".$fila->tipo_de_asentamiento. " (".$fila->codigo_postal.") "; ?>
                                                </option>
                                                <?php } ?>
                                                <!-- <option value="Option 1">Option 1</option> -->
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Correo Electrónico *</label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input id="correodg" type="email" class="form-control" name="correodg" placeholder="Correo Electrónico"/>
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Teléfono *
                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                             <input type="text" class="form-control" name="telefonodg" id="telefonodg" placeholder="(462) 123-34-21 Ext.123"/>
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-3">
                                          </div>
                                          <div class="col-md-12">

                                             <a class="btn btn-primary btn-outline" href="#" data-toggle="tab" id="idtab2"> Siguiente <i class="icon-action-redo"></i></a>
                                             <br><br>
                                             <div id="validarparte1">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                       <ul class="nav nav-pills nav-justified steps">
                                          <li class="active">
                                             <a data-toggle="tab" class="step" aria-expanded="true">
                                             <span class="number"> 2 de 4 - </span>
                                             <span class="desc"><b>Ubicación del Inmueble </b><i class="fa fa-check"></i> </span>
                                             </a>
                                          </li>
                                       </ul>
                                       
                                        <h4 class="block">Ubicación del Inmueble</h4>

                                       <div class="form-group">

                                       <div class="form-group col-md-6"> <!-- this -->
                                          <label class="control-label col-md-2">Calle *
                                          </label>

                                          <div class="col-md-9"> <!-- this -->
                                          <span></span>
                                             <input type="text" class="form-control" name="calleui" id="calleui" placeholder="Calle" />
                                          </div>
                                       </div>

                                       <div class="form-group col-md-6"> <!-- this -->
                                          <label class="control-label col-md-2">Núm. de Lote *
                                          </label>
                                          <div class="col-md-9"> <!-- this -->
                                          <span></span>
                                             <input type="text" class="form-control" name="nodeloteui"  id="nodeloteui"placeholder="Núm. de Lote" />
                                          </div>
                                       </div>
                                    </div>

                                       <div class="form-group">

                                          <div class="form-group col-md-6">

                                          <label class="control-label col-md-2">Manzana *
                                          </label>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="text" class="form-control" name="manzanaui" id="manzanaui" placeholder="Manzana"/>
                                          </div>

                                          </div>

                                          <div class="form-group col-md-6">

                                          <label class="control-label col-md-2">Núm. Oficial *
                                          </label>

                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="text" class="form-control" name="nooficialui" id="nooficialui" placeholder="Núm. Oficial" />
                                          </div>

                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Colonia *
                                          </label>
                                          <div class="col-md-9">
                                             <select class="form-control" name="cbocolsui" tabindex="-1"  id="cbocolsui">
                                                <?php foreach ($consulta->result() as $fila) { ?>
                                                <option value="<?php echo $fila->ID;?>">
                                                   <?php echo $fila->colonia." - ".$fila->tipo_de_asentamiento. " (".$fila->codigo_postal.") "; ?>
                                                </option>
                                                <?php } ?>
                                                <!-- <option value="Option 1">Option 1</option> -->
                                             </select>
                                          </div>
                                       </div>

                                       <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Superficie Predio m² *
                                          </label>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="text" placeholder="Superficie del Predio" class="form-control" name="superficiepredioui" id="superficiepredioui" />
                                          </div>
                                        </div>
                                       </div>


                                       <div class="form-group">
                                       <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Superficie Construida m² *
                                          </label>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="text" placeholder="Superficie Construida"class="form-control" name="superficieconstruidaui"  id="superficieconstruidaui" />
                                          </div>
                                       </div>
                                       </div>


                                       <div class="form-group">
                                       <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Bardeo mts. *
                                          </label>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="text" class="form-control" name="bardeoui" id="bardeoui" placeholder="Bardeo Metros Lineales" />
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Núm. de Niveles *
                                          </label>
                                          <span></span>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="number" class="form-control" name="nonivelesui"  id="nonivelesui"placeholder="Núm. de Niveles" />
                                          </div>
                                       </div>
                                       </div>


                                       <div class="form-group">
                                       <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Núm. Cajones *
                                          </label>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="number" class="form-control" placeholder="Núm. Cajones de Estacionamiento" name="nocajonesui" id="nocajonesui"  />
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label class="control-label col-md-2">Núm. de Viviendas *
                                          </label>
                                          <div class="col-md-9">
                                          <span></span>
                                             <input type="number" class="form-control" name="noviviendasui" id="noviviendasui" placeholder="Núm. de Viviendas" />
                                          </div>
                                        </div>
                                       </div>

                                       <div class="form-group">
                                          <label class="control-label col-md-1">% Avance de Obra *
                                          </label>
                                          <div class="col-md-4">
                                          <span></span>
                                          Para solicitar el trámite la obra se debe contar con al menos un 90% de avance.
                                             <input type="text" placeholder="Porcentaje de avance de Obra" class="form-control" name="porcentajeavanceui" id="porcentajeavanceui" />
                                          </div>
                                       </div>
                                       <hr style="display: lock; height: 1px; border: 0; border-top: 5px solid #337ab7; margin: 1em 0; padding: 0;">
                                       <div class="form-group">
                                          <div class="container">
                                             <div class="row">
                                                 <h4>Ingrese su dirección en la caja de texto y de clic en buscar<h4>
                                             <div class="col-md-12">
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
    <div id="floating-panel">
      <input id="address" type="text" class="form-control" value="Irapuato,Gto." name="callenorte">
      <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
    </div>
    <div style="width:100%; height: 500px;" >
    <div id="map"></div>
    </div>
                                             </div>

                                             <!-- Inicio
                                                <div class="col-md-5">
                                                   <div class="row">
                                                      <label class="control-label col-md-3">Calle al Norte<span class="required"> * </span>
                                                      </label>
                                                      <div class="col-md-9">
                                                      <span></span>
                                                         <input type="text" class="form-control" name="callenorte" id="callenorte"  placeholder="Calle Al Norte" />
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <!- this ->
                                                   <div class="row">
                                                      <label class="control-label col-md-3">Calle al Sur<span class="required"> * </span>
                                                      </label>
                                                      <div class="col-md-9">
                                                      <span></span>
                                                         <input type="text" class="form-control" name="callesur" id="callesur"  placeholder="Calle Al Sur" />
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <!-- this ->
                                                   <div class="row">
                                                      <label class="control-label col-md-3">Calle al Oriente<span class="required"> * </span>
                                                      </label>
                                                      <div class="col-md-9">
                                                      <span></span>
                                                         <input type="text" class="form-control" name="calleeste" id="calleeste" placeholder="Calle Al Oriente" />
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <!- this ->
                                                   <div class="row">
                                                      <label class="control-label col-md-3">Calle al Poniente<span class="required"> * </span>
                                                      </label>
                                                      <div class="col-md-9">
                                                      <span></span>
                                                         <input type="text" class="form-control" name="calleoeste" id="calleoeste" placeholder="Calle Al poniente" />
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <!- this ->
                                                </div>
                                                <div class="col-md-7">
                                                   <label class="control-label col-md-2"><span class="required">  </span>
                                                   </label>
                                                   <div class="col-md-8">
                                                   <b>Indique en el siguiente campo el número que corresponda a la ubicación aproximada de su predio.</b>

                                                      <select class="form-control" name="seccion">
                                                         <option value = "1">1</option>
                                                         <option value = "2">2</option>
                                                         <option value = "3">3</option>
                                                         <option value = "4">4</option>
                                                         <option value = "5">5</option>
                                                         <option value = "6">6</option>
                                                         <option value = "7">7</option>
                                                         <option value = "8">8</option>
                                                         <option value = "9">9</option>
                                                         <option value = "10">10</option>
                                                         <option value = "11">11</option>
                                                         <option value = "12">12</option>
                                                         <option value = "13">13</option>
                                                         <option value = "14">14</option>
                                                         <option value = "15">15</option>
                                                         <option value = "16">16</option>
                                                      </select>
                                                      <br>
                                                      <img src="<?php echo base_url(); ?>/assets/images/map.jpg" class="img-responsive" alt="Croquis">
                                                   </div>
                                                </div>
                                              Fin -->
                                             </div>
                                          </div>
                                          <br>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-1">
                                          </div>
                                          <div class="col-md-4">
                                             <a class="btn blue-haze btn-outline sbold uppercase" href="#tab1" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                             <a class="btn btn-primary btn-outline" href="#" data-toggle="tab" id="idtab3"> Siguiente <i class="icon-action-redo"></i></a>
                                          </div>
                                       </div>
                                       <div id="validarparte2">

                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3">
                                       <ul class="nav nav-pills nav-justified steps">
                                          <li class="active">
                                             <a data-toggle="tab" class="step" aria-expanded="true">
                                             <span class="number"> 3 de 4 - </span>
                                             <span class="desc">
                                             <b>Datos del Perito</b>
                                             <i class="fa fa-check"></i> </span>
                                             </a>
                                          </li>
                                       </ul>
                                       
                                       <h4 class="block">Datos del Perito</h4>
                                       <div class="form-group">
                                          <label class="control-label col-md-1">Nombre *
                                          </label>
                                          <div class="col-md-4">
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                             <select class="form-control" name="nombreperitodp" tabindex="-1"  id="cbonombreperitodp">
                                                <?php foreach ($resultperitos->result() as $fila) { ?>
                                                <option value="<?php echo $fila->ID;?>">
                                                   <?php echo $fila->nombre; ?>
                                                </option>
                                                <?php } ?>
                                                <!-- <option value="Option 1">Option 1</option> -->
                                             </select>

                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-1">Número de Perito
                                          </label>
                                          <div class="col-md-4">
                                             <input type="text" class="form-control" name="noregistroperitodp"  placeholder="Núm. de Registro del Perito" id="numperito" readonly />
                                          </div>
                                          <label class="control-label col-md-2">Teléfono
                                          </label>
                                          <div class="col-md-4">
                                             <input type="telephone" placeholder="Teléfono" class="form-control" name="telefonoperitodp" id="telefonoofocina" readonly />
                                          </div>
                                       </div>
                                       <h4 class="block">Perito Responsable Especializado</h4>
                                       <div class="form-group">
                                          <label class="control-label col-md-1">Nombre
                                          </label>
                                          <div class="col-md-4">
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                             <select class="form-control" name="nombreperitoresponsabledp" tabindex="-1"  id="cbonombreperitoresponsabledp">
                                                <?php foreach ($resultperitosesp->result() as $fila) { ?>
                                                <option value="<?php echo $fila->ID;?>">
                                                   <?php echo $fila->nombre; ?>
                                                </option>
                                                <?php } ?>
                                                <!-- <option value="Option 1">Option 1</option> -->
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-1">Núm. de Resgistro
                                          </label>
                                          <div class="col-md-4">
                                             <input type="text" placeholder="Núm. de Registro" class="form-control" name="noregistroresponsabledp" id="noregistroresponsabledp" readonly />
                                          </div>
                                          <label class="control-label col-md-2">Teléfono
                                          </label>
                                          <div class="col-md-4">
                                             <input type="telephone" class="form-control" name="telefonoresponsabledp" id="telefonoresponsabledp" readonly placeholder="Teléfono" />
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-md-1">
                                          </div>
                                          <div class="col-md-4">
                                             <a class="btn blue-haze btn-outline sbold uppercase" href="#tab2" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                             <a class="btn btn-primary btn-outline" href="#" id="idtab4" data-toggle="tab" id="del"> Siguiente <i class="icon-action-redo"></i></a>
                                          </div>
                                       </div>
                                       <div id="validarparte3">
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4">
                                       <ul class="nav nav-pills nav-justified steps">
                                          <li class="active">
                                             <a data-toggle="tab" class="step" aria-expanded="true">
                                             <span class="number"> 4 de 4 - </span>
                                             <span class="desc">
                                             <b>Confirmar Datos</b>
                                             <i class="fa fa-check"></i> </span>
                                             </a>
                                          </li>
                                       </ul>
                                       
                                       <h2>Adjunte los Siguientes Archivos en Original</h2>
                                       <div class="form-actions">
                                          <br>
                                          <div id="mostraralerta">
                                          </div>
                                       </div>
                                       <!--
                                          <input type="file" name="docbitacora[]" multiple>


                                          <input type="file" name="docplanos[]" multiple>                                           this -->
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Bitácora de Obra *
                                          </label>
                                          <div class="col-md-3">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn blue btn-file">
                                                <span class="fileinput-new"> Seleccionar Archivo </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="hidden" value="" name="..."><input type="file" name="docsbitacora[]" multiple class="multi"> </span>
                                                <span class="fileinput-filename"></span> &nbsp;
                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                             </div>
                                          </div>
                                          <label class="control-label col-md-3">Planos Actualizados
                                          </label>
                                          <div class="col-md-3">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn blue btn-file">
                                                <span class="fileinput-new"> Seleccionar Archivo </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="hidden" value="" name="..."><input type="file" name="docsplano[]" multiple class="multi"> </span>
                                                <span class="fileinput-filename"></span> &nbsp;
                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Visto Bueno de Cuerpo de Bomberos, Protección Civil y Policía Vial
                                          </label>
                                          <div class="col-md-3">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn blue btn-file">
                                                <span class="fileinput-new">Seleccionar Archivo </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="hidden" value="" name="..."><input type="file" name="docsvbuenofinales[]" multiple class="multi"> </span>
                                                <span class="fileinput-filename"></span> &nbsp;
                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                             </div>
                                          </div>
                                          <label class="control-label col-md-3">Permiso de Construcción Vigente *
                                          </label>
                                          <div class="col-md-3">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn blue btn-file">
                                                <span class="fileinput-new">Seleccionar Archivo </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="hidden" value="" name="..."><input type="file" name="docspermisoconstruccion[]" multiple class="multi"> </span>
                                                <span class="fileinput-filename"></span> &nbsp;
                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Reporte Fotográfico Actual *
                                          </label>
                                          <div class="col-md-3">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn blue btn-file">
                                                <span class="fileinput-new"> Seleccionar Archivo </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="hidden" value="" name="..."><input type="file" name="docsreportefotografico[]" multiple class="multi"> </span>
                                                <span class="fileinput-filename"></span> &nbsp;
                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                             </div>
                                          </div>
                                          <?php if(!empty($status)){?>
                                          <label class="control-label col-md-3" title="Adjunte el pago solo hasta que el funcionario lo solicite.">Pago del Trámite *
                                          </label>
                                          <div class="col-md-3">
                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn blue btn-file">
                                                <span class="fileinput-new"> Seleccionar Archivo </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="hidden" value="" name="..."><input type="file" name="docspago[]" multiple class="multi"> </span>
                                                <span class="fileinput-filename"></span> &nbsp;
                                                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                             </div>
                                          </div>
                                          <?php }?>
                                       </div>

                                       <div class="form-group">
                                          <input type="hidden" name="status" value="0" id="idstatus">
                                       </div>

                                       <div class="note note-info">
                                          <h4 class="block">Fin de la Solicitud</h4>
                                          <p>Antes de continuar verifica nuevamente que los datos proporcionados sean correctos, cuando estés listo presiona el botón de "Solicitar Trámite"
                                          </p>
                                       </div>
                                       <div class="form-actions">
                                          <div class="row">
                                             <div class="col-md-offset-1 col-md-9">
                                                <a class="btn blue-haze btn-outline sbold uppercase" href="#tab3" data-toggle="tab" id="regresatab3"> Anterior <i class="icon-action-undo"></i></a>
                                                <!-- <button type="submit" class="btn btn-primary btn-outline"> Solicitar Trámite <i class="fa fa-check"></i></button>
                                                -->
                                                <button type="button" class="btn btn-primary btn-outline" id="idsubmit"> Solicitar Trámite <i class="fa fa-check"></i></button>
                                             </div>
                                          </div>
                                       </div>

                                       <div id="comodin">

                                       </div>
                                    </div>
                                 </div>
                              </form>
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
      <div class="quick-nav-overlay"></div>
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
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="<?php echo base_url();?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
      <!-- END PAGE LEVEL PLUGINS -->
      <!-- BEGIN THEME GLOBAL SCRIPTS -->
      <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
      <!-- END THEME GLOBAL SCRIPTS -->
      <!-- BEGIN PAGE LEVEL SCRIPTS -->
      <script src="<?php echo base_url();?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
      <!-- END PAGE LEVEL SCRIPTS -->
      <!-- BEGIN THEME LAYOUT SCRIPTS -->
      <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
      <!-- END THEME LAYOUT SCRIPTS -->
      <script src="<?php echo base_url();?>assets/js/tram/autorizacionocupacionconstruccion.js" type="text/javascript"></script>
      <!-- mmmmmmmmmm -->
          <script>
    //20.6547575, -101.36542910000003

      function initMap() {
         //setTimeout("initMap()",10000);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: 20.6767222, lng: -101.3681677}
        });
        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);

        document.getElementById('buscardir').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
              draggable:true
            });
            //document.getElementById("address").value = results[0].geometry.location;
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
    </script>
   </body>
</html>
