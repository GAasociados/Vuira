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
   <title>Metronic Admin Theme #3 | Fluid Page</title>
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
                           <h1>Solicitud de Trámite Claves Catastrales Individual.</h1>
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
                           <form class="form-horizontal" role="form" action="<?php echo base_url('index.php/tramites/clavescatastralesindividual/savetram');?>" method="POST">
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <ul class="nav nav-pills nav-justified steps">
                                       <li class="active">
                                          <a data-toggle="tab" class="step" aria-expanded="true">
                                             <span class="number"> 1 de 4 - </span>
                                             <span class="desc">
                                                <b> Identificación Y Ubicación del Inmueble </b><i class="fa fa-check"></i></span>
                                             </a>
                                          </li>
                                       </ul>
                                       
                                       <h4 class="block">Identificaccion Y Ubicacción del Inmueble</h4>

                                       <div class="form-group">
                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-2">Calle<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" class="form-control" name="calleui"  placeholder="Calle" id="calleui" value="<?php echo $calleui; ?>" />
                                             </div>
                                          </div>

                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-2">Núm. Cuenta Predial<span class="required">* </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" class="form-control" name="predialui" placeholder="Núm. Cuenta Predial" id="predialui" value="<?php echo $predialui; ?>">
                                             </div>
                                          </div>

                                          <input type="hidden" value="<?php echo $id; ?>">
                                          <div>
                                             <input type="hidden" value="1" id="status" name="status">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-2">Núm. de Lote<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" class="form-control" name="noloteui"  placeholder="Núm. de Lote" id="noloteui" value="<?php echo $noloteui; ?>"/>  
                                             </div>
                                          </div>


                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-2">Manzana<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" class="form-control" name="nomanzanaui"  placeholder="Manzana" id="nomanzanaui" value="<?php echo $nomanzanaui; ?>"/>
                                             </div>
                                          </div>

                                       </div>
                                       <div class="form-group">

                                          <div class="form-group col-md-6">

                                             <label class="control-label col-md-2">Núm. Oficial<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" class="form-control" name="nooficialui"  placeholder="Núm. Oficial" id="nooficialui" value="<?php echo $nooficialui; ?>"/>
                                             </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-2">Colonia<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <select class="form-control" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui">
                                                   <option value="<?php echo $cbocoloniaui->ID;?>">
                                                      <?php echo $cbocoloniaui->colonia." - ".$cbocoloniaui->tipo_de_asentamiento. " (".$cbocoloniaui->codigo_postal.") "; ?>
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
                                       </div>

                                       <div class="form-group">

                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-2">Categoría del Predio<span class="required">* </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <select class="form-control" name="categoriapredioui" id="categoriapredioui">
                                                   <?php if ($categoriapredioui == 1){ ?>
                                                   <option value = "1">Urbano</option>
                                                   <option value = "2">Sub-urbano</option>
                                                   <option value = "3">Rústico</option>       
                                                   <?php } elseif ($categoriapredioui == 2){?>
                                                   <option value = "2">Sub-urbano</option>
                                                   <option value = "1">Urbano</option>
                                                   <option value = "3">Rústico</option>       

                                                   <?php } else {?>
                                                   <option value = "3">Rústico</option>
                                                   <option value = "2">Sub-urbano</option>
                                                   <option value = "1">Urbano</option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>

                                       <h4 class="block">Datos del Inmueble Según Escritura Pública</h4>
                                       <div class="form-group">
                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-3">Superficie del Terreno m² o ha<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" placeholder="Superficie del Terreno"class="form-control" name="superficieterrenoui"  id="superficieterrenoui" value="<?php echo $superficieterrenoui; ?>"/>
                                             </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label class="control-label col-md-3">Superficie de Construcción m²<span class="required"> * </span>
                                             </label>
                                             <div class="col-md-9">
                                                <span></span>
                                                <input type="text" placeholder="Superficie de Construcción"class="form-control" name="superficieconstruccionui" id="superficieconstruccionui" value="<?php echo $superficieconstruccionui; ?>"/>
                                             </div>
                                          </div>
                                       </div>

                                       <hr style="display: lock; height: 1px; border: 0; border-top: 1px solid #337ab7; margin: 1em 0; padding: 0;">
                                       <div class="form-group">
                                          <div class="container">
                                             <div class="row">
                                             <!-- 
                                                <div class="col-md-5">
                                                   <b>Indique en el siguiente campo el número que corresponda a la ubicación aproximada de su predio.</b>

                                                   <select class="form-control" name="ubucacioncroquisui" id="ubucacioncroquisui">
                                                      <option value="<?php echo $ubucacioncroquisui; ?>"><?php echo $ubucacioncroquisui; ?></option>
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

                                                    this >
                                                </div>
                                                <div class="col-md-7">
                                                   <label class="control-label col-md-2"><span class="required">  </span>
                                                   </label>     
                                                   <div class="col-md-8">
                                                      <br><br>
                                                      <b>
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;&nbsp;&nbsp;
                                                         &nbsp;
                                                         Indique el Nombre de sus Calles</b>
                                                         <br>
                                                         <div class="row">
                                                            <br>
                                                            <label class="control-label col-md-3">Calle al Norte<span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                               <span></span>
                                                               <input type="text" class="form-control" name="callenorteui"  placeholder="Calle Al Norte" id="callenorteui" value="<?php echo $callenorteui; ?>"/>
                                                            </div>
                                                         </div>
                                                         <br>
                                                         <- this -
                                                         <div class="row">
                                                            <label class="control-label col-md-3">Calle al Sur<span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                               <span></span>
                                                               <input type="text" class="form-control" name="callesurui"  value="<?php echo $callesurui; ?>"placeholder="Calle Al Sur"  id="callesurui" />
                                                            </div>
                                                         </div>
                                                         <div id="comodin"></div>
                                                         <br>
                                                         <- this ->
                                                         <div class="row">
                                                            <label class="control-label col-md-3">Calle al Oriente<span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                               <span></span>
                                                               <input type="text" class="form-control" name="calleorienteui"  placeholder="Calle Al Oriente" id="calleorienteui" value="<?php echo $calleorienteui; ?>"/>
                                                            </div>
                                                         </div>
                                                         <br>
                                                          this -
                                                         <div class="row">
                                                            <label class="control-label col-md-3">Calle al Poniente<span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                               <span></span>
                                                               <input type="text" class="form-control" name="calleponienteui"  placeholder="Calle Al Poniente" id="calleponienteui" value="<?php echo $calleorienteui; ?>"/>
                                                            </div>
                                                         </div>
                                                         <br>
                                                      </div>
                                                   </div>
                                                    -->
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
      <input id="address" type="text"  value="<?php echo $callenorteui; ?>" name="callenorteui">
      <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
    </div>
    <div style="width:100%; height: 500px;" >
    <div id="map"></div>  
    </div>
            </div>
         <!-- end map -->
                                                </div>
                                             </div>
                                             <br>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-md-1">
                                             </div>
                                             <div class="col-md-4">
                                                <a class="btn btn-primary btn-outline" href="#tab2" data-toggle="tab" id="idtab2"> Siguiente <i class="icon-action-redo"></i></a>
                                             </div>
                                          </div>
                                          <!-- <div id="validarparte1"></div> -->

                                       </div>
                                       <div class="tab-pane fade" id="tab2">
                                          <ul class="nav nav-pills nav-justified steps">
                                             <li class="active">
                                                <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 2 de 4 - </span>
                                                   <span class="desc"><b>Datos del Propietario </b><i class="fa fa-check"></i> </span>
                                                </a>
                                             </li>
                                          </ul>
                                          
                                          <h4 class="block">Datos del Propietario/Representante</h4>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Nombre del Propietario
                                                <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="nombrepropietariodp" placeholder="Nombre Completo del Propietario" id="nombrepropietariodp" value="<?php echo $nombrepropietariodp; ?>"  />
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <div class="form-group"> 
                                             <label class="control-label col-md-3">Nombre del Representante Legal
                                                <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="nombrerepresentantelegaldp" value="<?php echo $nombrerepresentantelegaldp; ?>" placeholder="Nombre del  Representante Legal" id="nombrerepresentantelegaldp" />
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>

                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Calle
                                                <span class="required" placeholder="Calle"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="calledp" value="<?php echo $calledp; ?>"placeholder="Calle" id="calledp" />
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Número
                                                <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="numerodp" placeholder="Número" id="numerodp" value="<?php echo $numerodp; ?>"/>
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Fracc./Colonia <span class="required"> * </span></label>
                                             <div class="col-md-4">
                                                <select class="form-control" name="coloniadp" tabindex="-1"  id="coloniadp">
                                                   <option value="<?php echo $coloniadp->ID;?>">
                                                      <?php echo $coloniadp->colonia." - ".$coloniadp->tipo_de_asentamiento. " (".$coloniadp->codigo_postal.") "; ?>
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
                                             <label class="control-label col-md-3">Teléfono
                                                <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="telefonodp" placeholder="Teléfono o Celular" id="telefonodp" value="<?php echo $telefonodp; ?>"/>
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <h4 class="block">Domicilio Para Recibir Notificaciones</h4>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Calle
                                                <span class="required" placeholder="Calle"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="callenotificacionesdp" placeholder="Calle" id="callenotificacionesdp" value="<?php echo $callenotificacionesdp; ?>" />
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Número
                                                <span class="required"> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="numeronotificacionedp" placeholder="Número" id="numeronotificacionedp" value="<?php echo $numeronotificacionedp; ?>"/>
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Fracc/Colonia <span class="required"> * </span></label>
                                             <div class="col-md-4">
                                                <select class="form-control" name="colonianotificacionesdp" tabindex="-1"  id="colonianotificacionesdp">
                                                   <option value="<?php echo $colonianotificacionesdp->ID;?>">
                                                      <?php echo $colonianotificacionesdp->colonia." - ".$colonianotificacionesdp->tipo_de_asentamiento. " (".$colonianotificacionesdp->codigo_postal.") "; ?>
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
                                                <span class=""> * </span>
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="email" class="form-control" name="correonotificacionesdp" placeholder="Correo Electronico" id="correonotificacionesdp" value="<?php echo $correonotificacionesdp; ?>"/>
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Teléfono
                                             </label>
                                             <div class="col-md-4">
                                                <span></span>
                                                <input type="text" class="form-control" name="telefononotificacionesdp" placeholder="Teléfono" id="telefononotificacionesdp" value="<?php echo $telefononotificacionesdp; ?>"/>
                                                <!-- <span class="help-block"></span><-->
                                                <!-- >-->
                                             </div>
                                          </div>
                                          <h4 class="block">Tipo de Trámite Que Solicita</h4>
                                          <div class="form-group">
                                             <label class="control-label col-md-3">Tipo Trámite<span class="required"> * </span></label>
                                             <div class="col-md-4">
                                                <select class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp">
                                                   <?php if($tipotramitedp == 1){ ?>
                                                   <option value="1">Alta de Claves Catastaral</option>
                                                   <option value="2">Modificación de Clave Catastral</option>
                                                   <?php } else { ?>
                                                   <option value="2">Modificación de Clave Catastral</option>
                                                   <option value="1">Alta de Claves Catastaral</option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>


                                          <div class="form-group">
                                             <div class="col-md-1">
                                             </div>
                                             <div class="col-md-4">
                                                <a class="btn blue-haze btn-outline sbold uppercase" href="#tab1" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                                <a class="btn btn-primary btn-outline" href="#tab3" data-toggle="tab" id="idtab3"> Siguiente <i class="icon-action-redo"></i></a>
                                             </div>
                                          </div>
                                          <!-- <div id="validarparte2"></div> this -->

                                       </div>

                                       <div class="tab-pane fade" id="tab3">
                                          <ul class="nav nav-pills nav-justified steps">
                                             <li class="active">
                                                <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 3 de 4 - </span>
                                                   <span class="desc"><b>Servicios</b><i class="fa fa-check"></i> </span>
                                                </a>
                                             </li>
                                          </ul>
                                          
                                          <h4 class="block">Servicios en la Zona</h4>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Agua<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <select class="form-control" name="servicioagua" id="servicioagua">
                                                      <?php  if($servicioagua == 1){?>
                                                      <option value = "1">SI</option>
                                                      <option value = "2">NO</option>
                                                      <?php } else {?>
                                                      <option value = "2">NO</option>
                                                      <option value = "1">SI</option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>


                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Pavimento<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <select class="form-control" name="serviciopavimento" id="serviciopavimento">
                                                      <?php  if($serviciopavimento == 1){?>
                                                      <option value = "1">SI</option>
                                                      <option value = "2">NO</option>
                                                      <?php } else {?>
                                                      <option value = "2">NO</option>
                                                      <option value = "1">SI</option>
                                                      <?php } ?>

                                                   </select>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Drenaje<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <select class="form-control" name="serviciodrenaje" id="serviciodrenaje">
                                                      <?php  if($serviciodrenaje == 1){?>
                                                      <option value = "1">SI</option>
                                                      <option value = "2">NO</option>
                                                      <?php } else {?>
                                                      <option value = "2">NO</option>
                                                      <option value = "1">SI</option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>

                                             <div class="form-group col-md-6">

                                                <label class="control-label col-md-2">Banqueta<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <select class="form-control" name="serviciobanqueta" id="serviciobanqueta">
                                                      <?php  if($serviciobanqueta == 1){?>
                                                      <option value = "1">SI</option>
                                                      <option value = "2">NO</option>
                                                      <?php } else {?>
                                                      <option value = "2">NO</option>
                                                      <option value = "1">SI</option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">

                                                <label class="control-label col-md-2">Luz<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <select class="form-control" name="servicioluz" id="servicioluz">
                                                      <?php  if($servicioluz == 1){?>
                                                      <option value = "1">SI</option>
                                                      <option value = "2">NO</option>
                                                      <?php } else {?>
                                                      <option value = "2">NO</option>
                                                      <option value = "1">SI</option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Teléfono<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <select class="form-control" name="serviciotelefono" id="serviciotelefono">
                                                      <?php  if($serviciotelefono == 1){?>
                                                      <option value = "1">SI</option>
                                                      <option value = "2">NO</option>
                                                      <?php } else {?>
                                                      <option value = "2">NO</option>
                                                      <option value = "1">SI</option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <h4 class="block">Elementos de Costruccion del Inmuueble </h4>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Edad Estimada<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Edad Estimada"class="form-control" name="edadestimada" id="edadestimada" value="<?php echo $edadestimada; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Herrería<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Herreria" class="form-control" name="herreria" id="herreria" value="<?php echo $herreria; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Muros<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Muros"class="form-control" name="muros" id="muros" value="<?php echo $muros; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Inst. Eléctricas<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Inst. Eléctricas" class="form-control" name="instelectricas" id="instelectricas" value="<?php echo $instelectricas; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Columnas<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Columnas"class="form-control" name="columnas" id="columnas" value="<?php echo $columnas; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Inst. Sanitarias<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Inst. Sanitarias" class="form-control" name="instsanitarias" id="instsanitarias" value="<?php echo $instsanitarias; ?>"/>
                                                </div>
                                             </div>
                                          </div>



                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Entrepisos<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>

                                                   <input type="text" placeholder="Entrepisos"class="form-control" name="entrepisos" id="entrepisos" value="<?php echo $entrepisos; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Inst. Especiales<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Inst. Especiales" class="form-control" name="instespeciales" id="instespeciales" value="<?php echo $instespeciales; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Techos<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Techos"class="form-control" name="techos" id="techos" value="<?php echo $techos; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Acabados Exteriores<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Acabados Exteriores" class="form-control" name="acabadosext" id="acabadosext" value="<?php echo $acabadosext; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Pisos<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Pisos"class="form-control" name="pisos" id="pisos" value="<?php echo $pisos; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Pintura<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Pintura" class="form-control" name="pintura" id="pintura" value="<?php echo $pintura; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Puertas<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Puertas"class="form-control" name="puertas" id="puertas" value="<?php echo $puertas; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Mueble de Baño<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <input type="text" placeholder="Mueble de Baño" class="form-control" name="mueblebaño" id="mueblebaño" value="<?php echo $mueblebaño; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Ventanas<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Ventanas"class="form-control" name="ventanas" id="ventanas" value="<?php echo $ventanas; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Fachada<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Fachada" class="form-control" name="fachada" id="fachada" value="<?php echo $fachada; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Carpintería<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <input type="text" placeholder="Carpintería"class="form-control" name="carpinteria" id="carpinteria" value="<?php echo $carpinteria; ?>"/>
                                                </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Número de Plantas<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                   <span></span>
                                                   <input type="text" placeholder="Número de Plantas" class="form-control" name="noplantas" id="noplantas" value="<?php echo $noplantas; ?>"/>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <div class="col-md-1">
                                             </div>
                                             <div class="col-md-4">
                                                <a class="btn blue-haze btn-outline sbold uppercase" href="#tab2" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                                <a class="btn btn-primary btn-outline" href="#tab4" id="idtab4" data-toggle="tab"> Siguiente <i class="icon-action-redo"></i></a>
                                             </div>
                                          </div>
                                          <div id="validarparte3"></div>
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
                                             
                                             <h4 class="block"></h4>
                                             <h2>Adjunte los Siguientes Archivos en Original</h2>
<!-- 
<input type="file" name="docbitacora[]" multiple>


<input type="file" name="docplanos[]" multiple>                                           this -->
<div class="form-actions">
   <br>
   <div id="mostraralerta">
   </div>
</div> 
<div class="form-group">
   <label class="control-label col-md-5">Indetificacíón Oficial<span class="required"> * </span>
   </label>
   <div class="col-md-3">
      <div class="fileinput fileinput-new" data-provides="fileinput">
         <span class="btn blue btn-file">
            <span class="fileinput-new"> Seleccionar Archivo </span>
            <span class="fileinput-exists"> Cambiar </span>
            <input type="hidden" value="" name="..."><input type="file" name="doctoife[]" multiple> </span>
            <span class="fileinput-filename"></span> &nbsp;
            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
         </div>

         <div id="doctoifename" style="display: none;"><?php echo $doctoife;?></div>

         <input type="hidden" value="<?php echo $doctoife; ?>" name="doctoife">

         <?php if (empty($doctoife)){ ?>
         <a href="#">Sin Archivo</a>   
         <?php } else { ?>
         <br>
         <a href="" id="doctoife">Descargar Archivo
         </a>
         <?php } ?>

      </div>
   </div>

   <div class="form-group">
      <label class="control-label col-md-5">Poder Simple en caso de que el Trámite se Realizado por el Representante Legal<span class="required"> * </span>
      </label>
      <div class="col-md-3">
         <div class="fileinput fileinput-new" data-provides="fileinput">
            <span class="btn blue btn-file">
               <span class="fileinput-new"> Seleccionar Archivo </span>
               <span class="fileinput-exists"> Cambiar </span>
               <input type="hidden" value="" name="..."><input type="file" name="podersimple[]" multiple> </span>
               <span class="fileinput-filename"></span> &nbsp;
               <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
            </div>
            <!-- this -->
            <div id="podersimplename" style="display: none;"><?php echo $podersimple;?></div>

            <input type="hidden" value="<?php echo $podersimple; ?>" name="podersimple">

            <?php if (empty($podersimple)){ ?>
            <a href="#">Sin Archivo</a>   
            <?php } else { ?>
            <br>
            <a href="" id="podersimple">Descargar Archivo
            </a>
            <?php } ?>
            <!-- this -->

         </div>
      </div>

      <div class="form-group">
         <label class="control-label col-md-5">Documento legal que acredite la propiedad inscrito en el registro público de la Propiedad<span class="required"> * </span>
         </label>
         <div class="col-md-3">
            <div class="fileinput fileinput-new" data-provides="fileinput">
               <span class="btn blue btn-file">
                  <span class="fileinput-new">Seleccionar Archivo </span>
                  <span class="fileinput-exists"> Cambiar </span>
                  <input type="hidden" value="" name="..."><input type="file" name="documentolegalpropiedad[]" multiple> </span>
                  <span class="fileinput-filename"></span> &nbsp;
                  <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>

                  <!-- this -->
                  <div id="documentolegalpropiedadname" style="display: none;"><?php echo $documentolegalpropiedad;?></div>

                  <input type="hidden" value="<?php echo $documentolegalpropiedad; ?>" name="documentolegalpropiedad">

                  <?php if (empty($documentolegalpropiedad)){ ?>
                  <a href="#">Sin Archivo</a>   
                  <?php } else { ?>
                  <br>
                  <a href="" id="documentolegalpropiedad">Descargar Archivo
                  </a>
                  <?php } ?>
                  <!-- this -->

               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-md-5" align="justify">Si la Escritura contiene la Foja o Constancia Registral será suficiente para poder realizar el tramite (La Foja o Constancia Registral contiene datos del inmueble tales como: El número de Folio Real, Nombre del Propietario, Superficie de Terreno, Medidas y Colindaciones etc.), en caso que la Escritura no contega la Constancia o Foja Registral <b>deberá anexar copia del Certificado de Gravamen,</b> asi mismo si la Escritura no contiene los datos de Inscripcion  ante el Registro Publico de la Propiedad.<span class="required"> * </span>
            </label>
            <div class="col-md-3">
               <div class="fileinput fileinput-new" data-provides="fileinput">
                  <span class="btn blue btn-file">
                     <span class="fileinput-new">Seleccionar Archivo </span>
                     <span class="fileinput-exists"> Cambiar </span>
                     <input type="hidden" value="" name="..."><input type="file" name="escritura[]" multiple> </span>
                     <span class="fileinput-filename"></span> &nbsp;
                     <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>

                     <!-- this -->
                     <div id="escrituraname" style="display: none;"><?php echo $escritura;?></div>

                     <input type="hidden" value="<?php echo $escritura; ?>" name="escritura">

                     <?php if (empty($escritura)){ ?>
                     <a href="#">Sin Archivo</a>   
                     <?php } else { ?>
                     <br>
                     <a href="" id="escritura">Descargar Archivo
                     </a>
                     <?php } ?>
                     <!-- this -->

                  </div>
               </div>
            </div>
            <div class="form-group">

               <label class="control-label col-md-5">Copia de Oficio de Traza Autorizada por la Dirección General de Ordenamiento Territorial<span class="required"> * </span>
               </label>
               <div class="col-md-3">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                     <span class="btn blue btn-file">
                        <span class="fileinput-new">Seleccionar Archivo </span>
                        <span class="fileinput-exists"> Cambiar </span>
                        <input type="hidden" value="" name="..."><input type="file" name="oficiodetrazaautorizada[]" multiple> </span>
                        <span class="fileinput-filename"></span> &nbsp;
                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>

                        <!-- this -->
                        <div id="oficiodetrazaautorizadaname" style="display: none;"><?php echo $oficiodetrazaautorizada;?></div>

                        <input type="hidden" value="<?php echo $oficiodetrazaautorizada; ?>" name="oficiodetrazaautorizada">

                        <?php if (empty($oficiodetrazaautorizada)){ ?>
                        <a href="#">Sin Archivo</a>   
                        <?php } else { ?>
                        <br>
                        <a href="" id="oficiodetrazaautorizada">Descargar Archivo
                        </a>
                        <?php } ?>
                        <!-- this -->
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-5">Plano Fisico de traza autorizada por la D.G.O.I o Modificación de traza(sellado y firmado)<span class="required"> * </span>
                  </label>
                  <div class="col-md-3">
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn blue btn-file">
                           <span class="fileinput-new">Seleccionar Archivo </span>
                           <span class="fileinput-exists"> Cambiar </span>
                           <input type="hidden" value="" name="..."><input type="file" name="planofisicodetrazaautorizada[]" multiple> </span>
                           <span class="fileinput-filename"></span> &nbsp;
                           <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                           <!-- this -->
                           <div id="planofisicodetrazaautorizadaname" style="display: none;"><?php echo $planofisicodetrazaautorizada;?></div>

                           <input type="hidden" value="<?php echo $planofisicodetrazaautorizada; ?>" name="planofisicodetrazaautorizada">

                           <?php if (empty($planofisicodetrazaautorizada)){ ?>
                           <a href="#">Sin Archivo</a>   
                           <?php } else { ?>
                           <br>
                           <a href="" id="planofisicodetrazaautorizada">Descargar Archivo
                           </a>
                           <?php } ?>
                           <!-- this -->

                        </div>
                     </div>
                  </div>
                  <div class="note note-info">
                     <h4 class="block">Fin de la Solicitud</h4>
                     <p>Antes de continuar verifica nuevamente que los datos proporcionados sean correctos, cuando estés listo presiona el botón de "Solicitar Trámite"
                     </p>
                  </div>
                  <div class="form-actions">
                     <div class="row">
                        <div class="col-md-offset-1 col-md-9">
                           <a class="btn blue-haze btn-outline sbold uppercase" href="#tab3" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                           <button type="button" class="btn btn-primary btn-outline" id="idsubmit"> Solicitar Trámite <i class="fa fa-check"></i></button>
                        </div>
                     </div>
                  </div>

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
<script src="<?php echo base_url();?>assets/js/tram/clavescatastralesindividual.js" type="text/javascript"></script>
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