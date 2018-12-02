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
   <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
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
                           <form class="form-horizontal" role="form" action="<?php echo base_url('index.php/tramites/autorizacionocupacionconstruccion/updatetram');?>" method="POST">
                              <div class="tab-content">
                                  <a href="<?php echo base_url(); ?>usertramites/us_autorizacionocupacionconstruccion" class="btn btn-primary">Cancelar</a>
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
                                          <label class="control-label col-md-3">Nombre del Propietario
                                             <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                             <input type="text" class="form-control" name="nombrepropietariodg" placeholder="Nombre del Propietario" value="<?php echo $nombrepropietariodg; ?>" id="nombrepropietariodg"/>
                                             <!-- <span class="help-block"></span>< -->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Paterno de propietario
                                          <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" value="<?php echo $apellidopaternopropietariodg;?>" name="apellidopaternopropietariodg" placeholder="Apellido Paterno del Propietario"   id="apellidopaternopropietariodg"/>
                                                <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Materno del propietario
                                          <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" value="<?php echo $apellidomaternopropietariodg;?>" name="apellidomaternopropietariodg" placeholder="Apellido Materno del Propietario"   id="apellidomaternopropietariodg"/>
                                             <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>

                                       <div>
                                          <input type="hidden" value="<?php echo $ID; ?>" id="numtram" name="ID">
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nombre del Representante
                                             <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                             <input type="text" class="form-control" name="nombresolicitantedg"  id="nombresolicitantedg" placeholder="Nombre del Representante" value="<?php echo $nombresolicitantedg; ?>"/>
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Paterno de Representante
                                          <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" value="<?php echo $apellidopaternosolicitantedg; ?>" name="apellidopaternosolicitantedg" placeholder="Apellido Paterno del Representante"   id="apellidopaternosolicitantedg"/>
                                             <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido Materno del Representante
                                          <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                                <input type="text" class="form-control" value="<?php echo $apellidomaternosolicitantedg; ?>" name="apellidomaternosolicitantedg" placeholder="Apellido Materno del Representante"   id="apellidomaternosolicitantedg"/>
                                             <!-- <span class="help-block"></span><-->
                                          </div>
                                       </div>
                                       <hr style="display: lock; height: 1px; border: 0; border-top: 1px solid #337ab7; margin: 1em 0; padding: 0;">
                                       <h4 class="block">Domicilio Para Recibir Notificaciones</h4>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Calle
                                             <span class="required" placeholder="Calle"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                             <input type="text" class="form-control" name="calledg" placeholder="Calle" id="calle" value="<?php echo $calledg; ?>"/>
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Numero
                                             <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                             <input type="text" class="form-control" id="numerodg" name="numerodg" placeholder="Número" value="<?php echo $numerodg; ?>"/>
                                             <!-- <span class="help-block"></span><-->
                                             <!-- -->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Colonia/Barrio/Fraccionamiento<span class="required"> * </span></label>
                                          <div class="col-md-4">
                                             <select class="form-control" name="coloniadg" id="cbocols">
                                                <option value=" <?php echo $coloniadg ?>">
                                                   <?php  echo $arraycolonia->colonia."-".$arraycolonia->tipo_de_asentamiento."-(".$arraycolonia->codigo_postal.")"; ?>
                                                </option>
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
                                          <label class="control-label col-md-3">Correo Electronico
                                             <span class="required"> * </span>
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                             <input id="correodg" type="email" class="form-control" name="correodg" placeholder="Correo Electronico" value="<?php echo $correodg; ?>"/>
                                             <!-- <span class="help-block"></span><-->
                                             <!-- >-->
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Teléfono
                                          </label>
                                          <div class="col-md-4">
                                             <span></span>
                                             <input type="text" class="form-control" name="telefonodg" id="telefonodg" placeholder="(462) 123-34-21 Ext.123" value="<?php echo $telefonodg; ?>"/>
<!--
   <span class="help-block"></span><-->
<!-- >
-->
</div>
</div>
<div class="form-group">
   <div class="col-md-3">
   </div>
   <div class="col-md-4">
      <a class="btn btn-primary btn-outline" href="#tab2" data-toggle="tab" id="idtab2"> Siguiente <i class="icon-action-redo"></i></a>
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
         <label class="control-label col-md-2">Calle<span class="required"> * </span>
         </label>

         <div class="col-md-9"> <!-- this -->
            <span></span>
            <input type="text" class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>"/>
         </div>
      </div>

      <div class="form-group col-md-6"> <!-- this -->
         <label class="control-label col-md-2">No. de Lote<span class="required"> * </span>
         </label>
         <div class="col-md-9"> <!-- this -->
            <span></span>
            <input type="text" class="form-control" name="nodeloteui"  id="nodeloteui" placeholder="No. de Lote" value="<?php echo $nodeloteui; ?>"/>
         </div>
      </div>
   </div>

   <div class="form-group">

      <div class="form-group col-md-6">

         <label class="control-label col-md-2">Manzana<span class="required"> * </span>
         </label>
         <div class="col-md-9">
            <span></span>
            <input type="text" class="form-control" name="manzanaui" id="manzanaui" placeholder="Manzana" value="<?php echo $manzanaui;?>" />
         </div>

      </div>

      <div class="form-group col-md-6">

         <label class="control-label col-md-2">No. Oficial<span class="required"> * </span>
         </label>

         <div class="col-md-9">
            <span></span>
            <input type="text" class="form-control" name="nooficialui" id="nooficialui" placeholder="No. Oficial" value="<?php echo $nooficialui; ?>"/>
         </div>

      </div>
   </div>

   <div class="form-group">
      <div class="form-group col-md-6">
         <label class="control-label col-md-2">Colonia<span class="required"> * </span>
         </label>
         <div class="col-md-9">
            <select class="form-control" name="cbocolsui" tabindex="-1"  id="cbocolsui">

               <option value="<?php echo $cbocolsui; ?>">
                  <?php  echo $arraycbocolsui->colonia."-".$arraycbocolsui->tipo_de_asentamiento."-(".$arraycbocolsui->codigo_postal.")"; ?>
               </option>

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
         <label class="control-label col-md-2">Superficie Predio m²<span class="required">* </span>
         </label>
         <div class="col-md-9">
            <span></span>
            <input type="text" placeholder="Superficie del Predio" class="form-control" name="superficiepredioui" id="superficiepredioui" value="<?php echo $superficiepredioui; ?>"/>
         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="form-group col-md-6">
         <label class="control-label col-md-2">Superficie Construida m²<span class="required"> * </span>
         </label>
         <div class="col-md-9">
            <span></span>
            <input type="text" placeholder="Superficie Construida"class="form-control" name="superficieconstruidaui"  id="superficieconstruidaui" value="<?php echo $superficieconstruidaui; ?>"/>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="form-group col-md-6">
         <label class="control-label col-md-2">Bardeo m<span class="required"> * </span>
         </label>
         <div class="col-md-9">
            <span></span>
            <input type="text" class="form-control" name="bardeoui" id="bardeoui" placeholder="Bardeo Metros Lineales" value="<?php echo $bardeoui; ?>"/>
         </div>
      </div>
      <div class="form-group col-md-6">
         <label class="control-label col-md-2">No. de Niveles<span class="required"> * </span>
         </label>
         <span></span>
         <div class="col-md-9">
            <span></span>
            <input type="number" class="form-control" name="nonivelesui"  id="nonivelesui"placeholder="No. de Niveles" value="<?php echo $nonivelesui; ?>"/>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="form-group col-md-6">
         <label class="control-label col-md-2">No. Cajones<span class="required"> * </span>
         </label>
         <div class="col-md-9">
            <span></span>
            <input type="number" class="form-control" placeholder="No. Cajones de Estacionamiento" name="nocajonesui" id="nocajonesui"  value="<?php echo $nocajonesui; ?>"/>
         </div>
      </div>
      <div class="form-group col-md-6">
         <label class="control-label col-md-2">No. de Viviendas<span class="required"> * </span>
         </label>
         <div class="col-md-9">
            <span></span>
            <input type="number" class="form-control" name="noviviendasui" id="noviviendasui" placeholder="No. de Viviendas" value="<?php echo $noviviendasui; ?>" />
         </div>
      </div>
   </div>

   <div class="form-group">
      <label class="control-label col-md-1">% Avance de Obra<span class="required"> * </span>
      </label>
      <div class="col-md-4">
         <span></span>
         Para solicitar el trámite la obra se debe contar con al menos un 90% de avance.
         <input type="text" placeholder="Porcentaje de avance de Obra" class="form-control" name="porcentajeavanceui" id="porcentajeavanceui" value="<?php echo $porcentajeavanceui;?>"/>
      </div>
   </div>
   <hr style="display: lock; height: 1px; border: 0; border-top: 5px solid #337ab7; margin: 1em 0; padding: 0;">
   <div class="form-group">
      <div class="container">
         <div class="row">
         <!-- map -->
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
      <input id="address" type="text" class="class="form-control"" value="<?php echo $callenorte ?>" name="callenorte">
      <input id="buscardir" type="button" value="Mostrar Dirección en el Mapa" class="btn btn-success">
    </div>
    <div style="width:100%; height: 500px;" >
    <div id="map"></div>
    </div>
            </div>
         <!-- end map -->

         <!-- Referencia
            <div class="col-md-5">
               <div class="row">
                  <label class="control-label col-md-3">Calle al Norte<span class="required"> * </span>
                  </label>
                  <div class="col-md-9">
                     <span></span>
                     <input type="text" class="form-control" name="callenorte" id="callenorte"  placeholder="Calle Al Norte" value="<?php echo $callenorte; ?>"/>
                  </div>
               </div>
               <br>
               <! this
               <div class="row">
                  <label class="control-label col-md-3">Calle al Sur<span class="required"> * </span>
                  </label>
                  <div class="col-md-9">
                     <span></span>
                     <input type="text" class="form-control" name="callesur" id="callesur"  placeholder="Calle Al Sur" value="<?php echo $callesur; ?>"/>
                  </div>
               </div>
               <br>
               <!- this
               <div class="row">
                  <label class="control-label col-md-3">Calle al Oriente<span class="required"> * </span>
                  </label>
                  <div class="col-md-9">
                     <span></span>
                     <input type="text" class="form-control" name="calleeste" id="calleeste" placeholder="Calle Al Oriente" value="<?php echo $calleeste; ?>"/>
                  </div>
               </div>
               <br>
               <!- this -
               <div class="row">
                  <label class="control-label col-md-3">Calle al Poniente<span class="required"> * </span>
                  </label>
                  <div class="col-md-9">
                     <span></span>
                     <input type="text" class="form-control" name="calleoeste" id="calleoeste" placeholder="Calle Al poniente" value="<?php echo $calleoeste; ?>"/>
                  </div>
               </div>
               <br>
               <!- this --
            </div>
            <div class="col-md-7">
               <label class="control-label col-md-2"><span class="required">  </span>
               </label>
               <div class="col-md-8">
                  <b>Indique en el siguiente campo el número que corresponda a la ubicación aproximada de su predio.</b>

                  <select class="form-control" name="seccion">
                     <option value="<?php echo $seccion; ?>"> <?php echo $seccion;?> </option>
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
         End Referencia -->
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
         <label class="control-label col-md-1">Nombre<span class="required"> * </span>
         </label>
         <div class="col-md-4">
            <!-- <span class="help-block"></span><-->
            <!-- -->

            <select class="form-control" name="nombreperitodp" tabindex="-1"  id="cbonombreperitodp">
               <option value="<?php echo $nombreperitodp; ?>"><?php echo $arrayperito[0]->nombre; ?></option>
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
         <label class="control-label col-md-1">Número de Perito.<span class="required"> * </span>
         </label>
         <div class="col-md-4">
            <input type="text" class="form-control" name="noregistroperitodp"  placeholder="No. de Registro del Perito" id="numperito" readonly value="<?php echo $noregistroperitodp; ?>" />
         </div>
         <label class="control-label col-md-2">Teléfono<span class="required"> * </span>
         </label>
         <div class="col-md-4">
            <input type="telephone" placeholder="Teléfono" class="form-control" name="telefonoperitodp" id="telefonoofocina" value="<?php echo $telefonoperitodp; ?>" readonly />
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
               <option value="<?php echo $nombreperitoresponsabledp; ?>"><?php echo $arrayperitoesp[0]->nombre; ?></option>
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
         <label class="control-label col-md-1">No. de Resgistro
         </label>
         <div class="col-md-4">
            <input type="text" placeholder="No. de Registro" class="form-control" name="noregistroresponsabledp" id="noregistroresponsabledp" readonly value=" <?php echo $noregistroresponsabledp; ?>" />
         </div>
         <label class="control-label col-md-2">Teléfono
         </label>
         <div class="col-md-4">
            <input type="telephone" class="form-control" name="telefonoresponsabledp" id="telefonoresponsabledp" readonly placeholder="Teléfono" value=" <?php echo $telefonoresponsabledp; ?>" />
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
<!--
<input type="file" name="docbitacora[]" multiple>


<input type="file" name="docplanos[]" multiple>
-->
<div class="form-group">
   <label class="control-label col-md-3">Bitácora de Obra<span class="required"> * </span>
   </label>
   <div class="col-md-3">
      <a href="#" id="idbitacoraname" style="display: none;"><?php echo $docsbitacora; ?>
      </a>
      <input type="hidden" value="<?php echo $docsbitacora; ?>" name="inpdocsbitacora">

      <div class="fileinput fileinput-new" data-provides="fileinput">
         <span class="btn blue btn-file">
            <span class="fileinput-new"> Seleccionar Archivo </span>
            <span class="fileinput-exists"> Cambiar </span>
            <input type="hidden" value="" name="..."><input type="file" name="docsbitacora[]" multiple class="multi"></span>
            <?php if (empty($docsbitacora)){ ?>
            <a href="#">Sin Archivo</a>
            <?php } else { ?>
            <br>
            <a href="" id="idbitacora">Descargar Archivo
            </a>
            <?php } ?>
            <span class="fileinput-filename"></span> &nbsp;
            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
         </div>
      </div>
      <label class="control-label col-md-3">Planos Actualizados
      </label>
      <div class="col-md-3">

         <div id="iddocsplanoname" style="display: none;"><?php echo $docsplano; ?></div>

         <input type="hidden" value="<?php echo $docsplano; ?>" name="inpdocsdocsplano">

         <div class="fileinput fileinput-new" data-provides="fileinput">
            <span class="btn blue btn-file">
               <span class="fileinput-new"> Seleccionar Archivo </span>
               <span class="fileinput-exists"> Cambiar </span>
               <input type="hidden" value="" name="..."><input type="file" name="docsplano[]" multiple class="multi"> </span>
               <?php if (empty($docsplano)){ ?>
               <a href="#">Sin Archivo</a>
               <?php } else { ?>
               <br>
               <a href="" id="iddocsplano">Descargar Archivo</a>
               <?php } ?>
               <span class="fileinput-filename"></span> &nbsp;
               <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
            </div>
         </div>
      </div>

      <div class="form-group">
         <label class="control-label col-md-3">Visto Bueno de Cuerpo de Bomberos, Protección Civil y Policia Vial
         </label>
         <div class="col-md-3">
            <div style="display: none;" id="iddocsvbuenofinalesname"><?php echo $docsvbuenofinales; ?></div>
            <input type="hidden" value="<?php echo $docsvbuenofinales; ?>" name="inpdocsvbuenofinales">
            <div class="fileinput fileinput-new" data-provides="fileinput">
               <span class="btn blue btn-file">
                  <span class="fileinput-new">Seleccionar Archivo </span>
                  <span class="fileinput-exists"> Cambiar </span>
                  <input type="hidden" value="" name="..."><input type="file" name="docsvbuenofinales[]" multiple class="multi"> </span>
                  <?php if (empty($docsvbuenofinales)){ ?>
                  <a href="#">Sin Archivo</a>
                  <?php } else { ?>
                  <br>
                  <a href="" id="iddocsvbuenofinales">Descargar Archivo</a>
                  <?php } ?>
                  <span class="fileinput-filename"></span> &nbsp;
                  <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
               </div>
            </div>
            <label class="control-label col-md-3">Permiso de Construcción Vigente.<span class="required"> * </span>
            </label>
            <div class="col-md-3">
               <div id="iddocspermisoconstruccionname" style="display: none;"><?php echo $docspermisoconstruccion; ?>
               </div>

               <input type="hidden" value="<?php echo $docspermisoconstruccion; ?>" name="inpdocspermisoconstruccion">

               <div class="fileinput fileinput-new" data-provides="fileinput">
                  <span class="btn blue btn-file">
                     <span class="fileinput-new">Seleccionar Archivo </span>
                     <span class="fileinput-exists"> Cambiar </span>
                     <input type="hidden" value="" name="..."><input type="file" name="docspermisoconstruccion[]" multiple class="multi"> </span>
                     <?php if (empty($docspermisoconstruccion)){ ?>
                     <a href="#">Sin Archivo</a>
                     <?php } else { ?>
                     <br>
                     <a href="" id="iddocspermisoconstruccion">Descargar Archivo</a>
                     <?php } ?>
                     <span class="fileinput-filename"></span> &nbsp;
                     <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3">Reporte Fotográfico Actual<span class="required"> * </span>
               </label>
               <div class="col-md-3">
                  <div id="iddocsreportefotograficoname" style="display: none;"><?php echo $docsreportefotografico;?></div>

                  <input type="hidden" value="<?php echo $docsreportefotografico; ?>" name="inpdocsreportefotografico">

                  <div class="fileinput fileinput-new" data-provides="fileinput">
                     <span class="btn blue btn-file">
                        <span class="fileinput-new"> Seleccionar Archivo </span>
                        <span class="fileinput-exists"> Cambiar </span>
                        <input type="hidden" value="" name="..."><input type="file" name="docsreportefotografico[]" multiple class="multi"> </span>
                        <?php if (empty($docsreportefotografico)){ ?>
                        <a href="#">Sin Archivo</a>
                        <?php } else { ?>
                        <br>
                        <a href="" id="iddocsreportefotografico">Descargar Documento</a>
                        <?php } ?>
                        <span class="fileinput-filename"></span> &nbsp;
                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                     </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Documento de Pago del Trámite<span class="required"> * </span>
                    </label>
                    <div class="col-md-3">
                       <div id="iddocspagoname" style="display: none;"><?php echo $docspago;?></div>

                       <input type="hidden" value="<?php echo $docspago; ?>" name="inpdocspago">

                       <div class="fileinput fileinput-new" data-provides="fileinput">
                          <span class="btn blue btn-file">
                             <span class="fileinput-new"> Seleccionar Archivo </span>
                             <span class="fileinput-exists"> Cambiar </span>
                             <input type="hidden" value="" name="..."><input type="file" name="docspago[]" multiple class="multi"> </span>
                             <?php if (empty($docspago)){ ?>
                             <a href="#">Sin Archivo</a>
                             <?php } else { ?>
                             <br>
                             <a href="" id="iddocspago">Descargar Documento</a>
                             <?php } ?>
                             <span class="fileinput-filename"></span> &nbsp;
                             <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                          </div>
                       </div>
                  </div>
               </div>

               <div class="form-group">
                  <input type="hidden" name="status" value="0" id="idstatus">
               </div>

               <div class="note note-info">
                  <h4 class="block">Fin de la Solicitud
                  </h4>
                  <p>Antes de continuar verifica nuevamente que los datos proporcionados sean correctos, cuando estés listo presiona el botón de "Solicitar Trámite"
                  </p>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-offset-1 col-md-9">
                        <a class="btn blue-haze btn-outline sbold uppercase" href="#tab3" data-toggle="tab" id="regresatab3"> Anterior <i class="icon-action-undo"></i></a>
<!-- <button type="submit" class="btn btn-primary btn-outline"> Solicitar Trámite <i class="fa fa-check"></i></button>
-->
<button type="button" class="btn btn-primary btn-outline" id="idsubmit"> Actualizar Trámite <i class="fa fa-check"></i></button>
</div>
</div>
</div>
<div class="form-actions">
   <br>
   <div id="mostraralerta" type="hidden">
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
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
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
<script src="<?php echo base_url();?>assets/js/tram/autorizacionocupacionconstruccion/editarautorizacionocupacionconstruccion.js" type="text/javascript"></script>
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
              position: results[0].geometry.location
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
