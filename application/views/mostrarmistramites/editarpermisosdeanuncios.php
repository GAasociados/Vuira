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
                                    <h1>Permisos de Anuncios.</h1>
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
                                    <form class="form-horizontal" role="form" action="<?php echo base_url('index.php/tramites/permisosdeanuncios/updatetram');?>" method="POST">
                                       <div class="tab-content">
                                          <div class="tab-pane active" id="tab1">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                             <div>
                                                <input type="hidden" value="<?php echo $ID; ?>" id="numtram" name="ID">
                                             </div>
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 1 de 4 - </span>
                                                   <span class="desc">
                                                   <b> Datos Generales </b><i class="fa fa-check"></i></span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Datos Generales</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Nombre del Propietario del Inmueble
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nombrepropietarioinmuebledg" placeholder="Nombre Completo del Propietario del Inmueble"   id="nombrepropietarioinmuebledg" value="<?php echo $nombrepropietarioinmuebledg; ?>"/>
                                                   <!-- <span class="help-block"></span><-->
                                                   <!-- >-->
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Nombre del Propietario del Anuncio
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nombrepropietarioanunciodg"  placeholder="Nombre Completo del Propietario del Anuncio"  id="nombrepropietarioanunciodg" value="<?php echo $nombrepropietarioanunciodg; ?>" />
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
                                                   <input type="text" class="form-control" name="calledg" placeholder="Calle"  id="calledg" value="<?php echo $calledg; ?>"/>
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
                                                   <input type="number" class="form-control" name="numerodg" placeholder="Número" id="numerodg" value="<?php echo $numerodg; ?>"/>
                                                   <!-- <span class="help-block"></span><-->
                                                   <!-- >-->
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Fracc/Colonia <span class="required"> * </span></label>
                                                <div class="col-md-4">
                                                   <select class="form-control" name="coloniadg" tabindex="-1"  id="coloniadg">
                                                      <option value="<?php echo $arraycolonia->ID ?>"><?php echo $arraycolonia->colonia." - ".$arraycolonia->tipo_de_asentamiento. " (".$arraycolonia->codigo_postal.")"; ?></option>

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
                                                   <input type="email" class="form-control" name="correodg" placeholder="Correo Electronico" id="correodg" value="<?php echo $correodg; ?>"/>
                                                   <!-- <span class="help-block"></span><-->
                                                   <!-- >-->
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Teléfono
                                                </label>
                                                <div class="col-md-4">
                                                <span></span>
                                                   <input type="text" class="form-control" name="telefonodg" placeholder="Teléfono" id="telefonodg" value="<?php echo $telefonodg; ?>"/>
                                                   <!-- <span class="help-block"></span><-->
                                                   <!-- >-->
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                   <a class="btn btn-primary btn-outline" href="#tab2" data-toggle="tab" id="idtab2"> Siguiente <i class="icon-action-redo"></i></a>
                                                </div>

                                             </div>
                                             <!-- <div id="validarparte1"></div>
                                             -->

                                             <div id="comodin"></div>
                                          </div>
                                          <div class="tab-pane fade" id="tab2">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 2 de 4 - </span>
                                                   <span class="desc"><b>Ubicación del Inmueble</b>
                                                   <i class="fa fa-check"></i></span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Ubicación del Inmueble</h4>
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                             <span></span>
                                                <label class="control-label col-md-2">Calle<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="calleui"  placeholder="Calle"  id="calleui" value="<?php echo $calleui; ?>"/>
                                                </div>
                                                </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No. de Lote<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nodeloteui"  placeholder="No. de Lote"  id="noloteui" value="<?php echo $noloteui; ?>"/>  
                                                </div>
                                             </div>
                                             </div>


                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Manzana<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nomanzanaui"  placeholder="Manzana"  id="nomanzanaui" value="<?php echo $nomanzanaui; ?>"/>
                                                </div>
                                                </div>


                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No. Oficial<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nooficialui"  placeholder="No. Oficial"  id="nooficialui" value="<?php echo $nooficialui; ?>"/>
                                                </div>
                                             </div>
                                             </div>


                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Colonia<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <select class="form-control" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui">
                                                   
                                                   <option value="<?php echo $arraycbocolsui->ID;?>"><?php echo $arraycbocolsui->colonia." - ".$arraycbocolsui->tipo_de_asentamiento. " (".$arraycbocolsui->codigo_postal.") "; ?></option>

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
                                                <label class="control-label col-md-2">Superficie Predio m²<span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Superficie del Predio" class="form-control" name="superficiepredioui"   id="superficiepredioui" value="<?php echo $superficiepredioui; ?>"/>
                                                </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Superficie Construida m²<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Superficie Construida"class="form-control" name="superficieconstruidaui"   id="superficieconstruidaui" value="<?php echo $superficieconstruidaui; ?>"/>
                                                </div>
                                             </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No. de Niveles<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="number" class="form-control" name="nonivelesui"  placeholder="No. de Niveles" id="nonivelesui" value="<?php echo $nonivelesui; ?>"/>
                                                </div>
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
                                             <!-- <div id="validarparte2"></div>
                                             this -->
                                          </div>
                                          <div class="tab-pane fade" id="tab3">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 3 de 4 - </span>
                                                   <span class="desc">
                                                   <b>Datos del Perito/ Perito Responsable Especializado</b>
                                                   <i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Datos del Perito</h4>
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Lista de Peritos<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <select class="form-control" name="nombreperitodp" tabindex="-1"  id="cbonombreperitodp">
                                                 <option value="<?php echo $arrayperito[0]->ID; ?>"> <?php  echo $arrayperito[0]->nombre; ?> </option>
                                                      <?php foreach ($resultperitos->result() as $fila) { ?>
                                                      <option value="<?php echo $fila->ID;?>">
                                                         <?php echo $fila->nombre; ?>
                                                      </option>
                                                      <?php } ?>   
                                                      <!-- <option value="Option 1">Option 1</option> -->
                                                   </select>
                                                </div>
                                             </div>
                                             </div>
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No.<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="noregistroperitodp"  placeholder="No. de Registro del Perito" id="noregistroperitodp" readonly  value="<?php echo $noregistroperitodp; ?>"/>
                                                </div>
                                                </div>


                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Telefono<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="telephone" placeholder="Teléfono" class="form-control" name="telefonoperitodp" id="telefonoperitodp" readonly value="<?php echo $telefonoperitodp; ?>" />
                                                </div>
                                             </div>
                                             </div>
                                             
                                             <h4 class="block">Permiso</h4>
                                            
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Fecha Entrega<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                      <input class="form-control" type="text" readonly="" name="fechaentregadp" id="fechaentrega" value="<?php echo $fechaentrega; ?>" /><span class="input-group-btn">
                                                      <button class="btn btn-primary btn-outline" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                      </button></span>
                                                   </div>
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No. Control<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="No. de Control" class="form-control" name="nocontrol"  id="nocontrol"  value="<?php echo $nocontrol; ?>"/>
                                                </div>
                                             </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-4">
                                                   <a class="btn blue-haze btn-outline sbold uppercase" href="#tab2" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                                   <a class="btn btn-primary btn-outline" href="#tab4" data-toggle="tab" id="idtab4"> Siguiente <i class="icon-action-redo"></i></a>
                                                </div>
                                             </div>
                                             <!-- 
                                             <div id="validarparte3"></div>
                                             this -->
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
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Permiso de Uso de Suelo<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctopermisousosueloname" style="display: none;"><?php echo $doctopermisousosuelo;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctopermisousosuelo; ?>" name="inpdoctopermisousosuelo">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctopermisousosuelo[]" multiple class="multi" > </span>

                                                      <?php if (empty($doctopermisousosuelo)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctopermisousosuelo">Descargar Archivo
                                                      </a>
                                                      <?php } ?>
                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                                <label class="control-label col-md-3">Plano Ubicación del Inmueble<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctoplanoname" style="display: none;"><?php echo $doctoplano;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctoplano; ?>" name="inpdoctoplano">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Seleccione Archivo </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctoplano[]" multiple class="multi"> </span>
                                                      <?php if (empty($doctoplano)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctoplano">Descargar Archivo
                                                      </a>
                                                      <?php } ?>
                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Memoria de Calculo de la estructura<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                
                                                <div id="iddoctomemoriadecalculoestructuraname" style="display: none;"><?php echo $doctomemoriadecalculoestructura;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctomemoriadecalculoestructura; ?>" name="inpdoctopermisousosuelo">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctomemoriadecalculoestructura[]" multiple class="multi"> </span>
                                                      <?php if (empty($doctomemoriadecalculoestructura)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctomemoriadecalculoestructura">Descargar Archivo
                                                      </a>
                                                      <?php } ?>
                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                                <label class="control-label col-md-3">Planos Avalados Por el Perito<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">

                                                <div id="iddoctoplanosavaladosperitoname" style="display: none;"><?php echo $doctoplanosavaladosperito;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctoplanosavaladosperito; ?>" name="inpdoctoplanosavaladosperito">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctoplanosavaladosperito[]" multiple class="multi"> </span>
                                                      <?php if (empty($doctoplanosavaladosperito)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctoplanosavaladosperito">Descargar Archivo
                                                      </a>
                                                      <?php } ?>
                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Identificación Oficial<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctoifename" style="display: none;"><?php echo $doctoife;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctoife; ?>" name="inpdoctoife">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctoife[]" multiple class="multi"> </span>
                                                      
                                                      <?php if (empty($doctoife)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctoife">Descargar Archivo
                                                      </a>
                                                      <?php } ?>

                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>

                                                <label class="control-label col-md-3">Titulo de Propiedad<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctoestructurapublicaname" style="display: none;"><?php echo $doctoestructurapublica;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctoestructurapublica; ?>" name="inpdoctoestructurapublica">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctoestructurapublica[]" multiple class="multi"> </span>
                                                      
                                                      <?php if (empty($doctoestructurapublica)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctoestructurapublica">Descargar Archivo
                                                      </a>
                                                      <?php } ?>

                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Alcta constitutiva<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctoactaconstitutivaname" style="display: none;"><?php echo $doctoactaconstitutiva;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctoactaconstitutiva; ?>" name="inpdoctoactaconstitutiva">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctoactaconstitutiva[]" multiple class="multi"> </span>
                                                      
                                                      <?php if (empty($doctoactaconstitutiva)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctoactaconstitutiva">Descargar Archivo
                                                      </a>
                                                      <?php } ?>

                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                                <label class="control-label col-md-3">Clave Catastral del Inmueble<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctoclavecatastralname" style="display: none;"><?php echo $doctoclavecatastral;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctoclavecatastral; ?>" name="inpdoctoclavecatastral">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctoclavecatastral[]" multiple class="multi"> </span>

                                                      <?php if (empty($doctoclavecatastral)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctoclavecatastral">Descargar Archivo
                                                      </a>
                                                      <?php } ?>

                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Dictamen de Alineamiento y Numero Oficial<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                
                                                <div id="iddoctodictamenalineamientoname" style="display: none;"><?php echo $doctodictamenalineamiento;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctodictamenalineamiento; ?>" name="inpdoctoclavecatastral">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctodictamenalineamiento[]" multiple class="multi"> </span>
                                                      <?php if (empty($doctodictamenalineamiento)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctodictamenalineamiento">Descargar Archivo
                                                      </a>
                                                      <?php } ?>
                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                                <label class="control-label col-md-3">Reporte Fotografico Actual<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <div id="iddoctofotograficoname" style="display: none;"><?php echo $doctofotografico;?></div>
                                                
                                                <input type="hidden" value="<?php echo $doctofotografico; ?>" name="inpdoctofotografico">

                                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                                      <span class="btn blue btn-file">
                                                      <span class="fileinput-new"> Seleccione Archivo </span>
                                                      <span class="fileinput-exists"> Cambiar </span>
                                                      <input type="hidden" value="" name="..."><input type="file" name="doctofotografico[]" multiple class="multi"> </span>
                                                      <?php if (empty($doctofotografico)){ ?>
                                                      <a href="#">Sin Archivo</a>   
                                                      <?php } else { ?>
                                                      <br>
                                                      <a href="" id="iddoctofotografico">Descargar Archivo
                                                      </a>
                                                      <?php } ?>

                                                      <span class="fileinput-filename"></span> &nbsp;
                                                      <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                   </div>
                                                </div>
                                             </div>
                                             <input type="hidden" id="idstatus" name="status" value="0">
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
                                             <div class="form-actions">
                                                <br>
                                                <div id="mostraralerta">
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
            <script src="<?php echo base_url();?>assets/js/tram/permisosdeanuncios/editarpermisosdeanuncios.js" type="text/javascript"></script>
         </body>
      </html>