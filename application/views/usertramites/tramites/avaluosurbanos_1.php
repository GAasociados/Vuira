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
                                    <h1>Autorización y Atención de Avaluos Urbanos.</h1>
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
                                    <form class="form-horizontal" role="form" action="<?php echo base_url()."tramites/Autorizacionocupacionconstruccion/savetram";?>" method="POST">
                                       <div class="tab-content">
                                          <div class="tab-pane active" id="tab1">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 1 de 4 - </span>
                                                   <span class="desc">
                                                   <b> Caracteristicas de la zona</b><i class="fa fa-check"></i></span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Caracteristicas de la zona</h4>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Clasificación<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="clasificacioncz"  placeholder="Clasificación" id="clasificacioncz" />
                                                </div>
                                             </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Tipo<span class="required">* </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <span></span>
                                                      <input type="text" class="form-control" name="tipocz" placeholder="Tipo" id="tipocz" >
                                                </div>
                                             </div>

                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Construcción Dominante<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="construcciondominante"  placeholder="Construcción Dominante" id="construcciondominante" />  
                                                </div>
                                             </div>
                                             

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Tipografia<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="tipografiacz"  placeholder="Tipografia" id="tipografiacz" />
                                                </div>
                                                </div>
                                             
                                             </div>

                                             <div class="form-group">

                                             <div class="form-group col-md-6">

                                                <label class="control-label col-md-2">Dens de contrucción<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="densdeconstruccion"  placeholder="Dens de construcción" id="densdeconstruccion" />
                                                </div>
                                             </div>
                                                
                                             </div>


                                             <div class="form-group">
                                             
                                             <label>Servicios</label>
                                             
                                              <div class="mt-checkbox-inline">
                                                <label class="mt-checkbox">
                                                  <input type="checkbox" id="aguacz" value="option1"> Agua
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="drenajecz" value="option2"> Drenaje
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="luzcz" value="option3"> Luz
                                                  <span></span>
                                               </label>
                                            </div>
                                            
                                         </div>


                                             <div class="form-group">
                                             
                                              <div class="mt-checkbox-inline">
                                                <label class="mt-checkbox">
                                                  <input type="checkbox" id="telefonocz" value="option4"> Telefono
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="pavimentocz" value="option5"> Pavimentos
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="banquetascz" value="option6"> Banquetas
                                                  <span></span>
                                               </label>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                           <div class="form-group col-md-6">

                                                <label class="control-label col-md-2">Vias de Acceso<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="viasdeaccesocz"  placeholder="Vias de Acceso" id="viasdeaccesocz" />
                                                </div>
                                             </div>
                                         </div>




                                             <h4 class="block">Caracteristicas del predio</h4>
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Clasificación<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="clasificacioncp"  placeholder="Clasificación" id="clasificacioncp" />
                                                </div>
                                             </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Tipo<span class="required">* </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <span></span>
                                                      <input type="text" class="form-control" name="tipocp" placeholder="Tipo" id="tipocp" >
                                                </div>
                                             </div>

                                             </div>
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Construcción<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="construccioncp"  placeholder="Construcción" id="construccioncp" />
                                                </div>
                                             </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Calidad<span class="required">* </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <span></span>
                                                      <input type="text" class="form-control" name="calidadcp" placeholder="Calidad" id="calidadcp" >
                                                </div>
                                             </div>

                                             </div>

                                                 <div class="form-group">
                                             
                                             <label>Servicios</label>
                                              <div class="mt-checkbox-inline">
                                                <label class="mt-checkbox">
                                                  <input type="checkbox" id="aguacp" value="option1"> Agua
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="drenajecp" value="option2"> Drenaje
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="luzcp" value="option3"> Luz
                                                  <span></span>
                                               </label>
                                            </div>
                                            
                                         </div>


                                             <div class="form-group">
                                             
                                              <div class="mt-checkbox-inline">
                                                <label class="mt-checkbox">
                                                  <input type="checkbox" id="telefonocp" value="option4"> Telefono
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="pavimentocp" value="option5"> Pavimentos
                                                  <span></span>
                                               </label>
                                               <label class="mt-checkbox">
                                                  <input type="checkbox" id="banquetascp" value="option6"> Banquetas
                                                  <span></span>
                                               </label>
                                            </div>
                                         </div>


                                         <div class="form-group">

                                             
                                                <div class="form-group col-md-6">

                                                <label class="control-label col-md-2">Vias de Acceso<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="viasdeaccesocp"  placeholder="Vias de Acceso" id="viasdeaccesocp" />
                                                </div>
                                             </div>

                                             <div class="form-group col-md-6">

                                                <label class="control-label col-md-2">Uso Actual<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" class="form-control" name="usoactualcp"  placeholder="Uso Actual" id="usoactualcp" />
                                                </div>
                                             </div>
                                             </div>


                                             
                                             <div class="form-group">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-4">
                                                   <a class="btn blue-haze btn-outline sbold uppercase" href="#tab1" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                                   <a class="btn btn-primary btn-outline" href="#tab2" data-toggle="tab"> Siguiente <i class="icon-action-redo"></i></a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="tab-pane fade" id="tab2">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 2 de 4 - </span>
                                                   <span class="desc"><b>Elementos de Construcción</b><i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Elementos de Contrucción</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-2">Edad Estimada
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="edadestimadaec" placeholder="Edad Estimada" id="edadestimadaec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Muros
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia2" tabindex="-1" id="referencia2">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="murosec" placeholder="Muros" id="murosec" />
                                                </div>
                                             </div>

                                                 <div class="form-group">
                                                <label class="control-label col-md-2">Estructura
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia3" tabindex="-1" id="referencia3">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="estructuraec" placeholder="Estructura" id="estructuraec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Entrepisos
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia4" tabindex="-1" id="referencia4">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="entrepisosec" placeholder="Entrepisos" id="entrepisosec" />
                                                </div>
                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">Techos
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia5" tabindex="-1" id="referencia5">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="techosec" placeholder="Entrepisos" id="techosec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Pisos
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia6" tabindex="-1" id="referencia6">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="pisosec" placeholder="Pisos" id="pisosec" />
                                                </div>
                                             </div>

                                                <div class="form-group">
                                                <label class="control-label col-md-2">Puertas
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia7" tabindex="-1" id="referencia7">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="puertasec" placeholder="Puertas" id="puertasec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Ventanas
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia8" tabindex="-1" id="referencia8">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="ventanasec" placeholder="Ventanas" id="ventanasec" />
                                                </div>
                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">Carpinteria
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia9" tabindex="-1" id="referencia9">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="carpinteriaec" placeholder="Carpinteria" id="carpinteriaec" />
                                                </div>
                                             </div>

                                               <div class="form-group">
                                                <label class="control-label col-md-2">Herreria
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia10" tabindex="-1" id="referencia10">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="herreriaec" placeholder="Herreria" id="herreriaec" />
                                                </div>
                                             </div>

                                                <div class="form-group">
                                                <label class="control-label col-md-2">Inst Electricas 
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia11" tabindex="-1" id="referencia11">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="instelectricasec" placeholder="Inst Electricas" id="instelectricasec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Inst Sanitarias 
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia12" tabindex="-1" id="referencia12">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="instsanitariasec" placeholder="Inst Sanitarias " id="instsanitariasec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Inst Especiales
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia13" tabindex="-1" id="referencia13">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="instespecialesec" placeholder="Inst Especiales " id="instespecialesec" />
                                                </div>
                                             </div>

                                                <div class="form-group">
                                                <label class="control-label col-md-2">Aplanado
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia14" tabindex="-1" id="referencia14">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="aplanadoec" placeholder="Aplanado" id="aplanadoec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Ac Exteriores
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia15" tabindex="-1" id="referencia15">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="acexterioresec" placeholder="Ac Exteriores" id="acexterioresec" />
                                                </div>
                                             </div>

                                               <div class="form-group">
                                                <label class="control-label col-md-2">Pintura
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia16" tabindex="-1" id="referencia16">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="pinturaec" placeholder="Pintura" id="pinturaec" />
                                                </div>
                                             </div>

                                              

                                             <div class="form-group">
                                                <label class="control-label col-md-2">Mueble de Baño
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia17" tabindex="-1" id="referencia17">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="mueblebanoec" placeholder="Mueble de Baño" id="mueblebanoec" />
                                                </div>
                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">Fachada
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                                   <select class="form-control" name="referencia18" tabindex="-1" id="referencia18">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 <option value="3">D</option>
                                             
                                             </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="fachadaec" placeholder="Fachada" id="fachadaec" />
                                                </div>
                                             </div>


                                             <div class="form-group"> 
                                                <label class="control-label col-md-3">Observaciones 
                                                   <span class="required"> * </span>
                                                   </label>
                                                   <div class="col-md-4">
                                                      <input type="text" class="form-control" name="observacionesec" placeholder="Observaciones" id="observacionesec" />
                                                      <!-- <span class="help-block"></span><-->
                                                      <!-- >-->
                                                   </div>

                                             </div>
                                        
                                               

                                             <div class="form-group">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-4">
                                                   <a class="btn blue-haze btn-outline sbold uppercase" href="#tab1" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                                   <a class="btn btn-primary btn-outline" href="#tab3" data-toggle="tab"> Siguiente <i class="icon-action-redo"></i></a>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="tab-pane fade" id="tab3">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 3 de 4 - </span>
                                                   <span class="desc"><b>Calculo del Valor</b><i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Calculo del Valor de Terreno</h4>
                                            
                                             <div class="form-group">
                                             <div class="form-group col-md-10">
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sección&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUPERFICIE M²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR X M²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACTOR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F. DE EF.</label>

                                                <br>
                                                
                                                <label class="control-label col-md-2">I<span class="required"></span>
                                                </label>
                                                 <div class="col-md-2">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="secc1sup" placeholder="" id="secc1sup" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc1val" placeholder="" id="secc1val" />
                                                </div>

                                                <div class="col-md-2">
                                                <input type="text" class="form-control" name="secc1fac" placeholder="" id="secc1fac" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc1fde" placeholder="" id="secc1fde" />
                                                </div>

                                                
                                                </div>
          
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-10">
                                                <label class="control-label col-md-2">II<span class="required"></span>
                                               
                                                </label>
                                                 <div class="col-md-2">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="secc2sup" placeholder="" id="secc2sup" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc2val" placeholder="" id="secc2val" />
                                                </div>

                                                <div class="col-md-2">
                                                <input type="text" class="form-control" name="secc2fac" placeholder="" id="secc2fac" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc2fde" placeholder="" id="secc1fde" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="total2" placeholder="" id="total2" />
                                                </div>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-10">
                                                <label class="control-label col-md-2">III<span class="required"></span>
                                               
                                                </label>
                                                 <div class="col-md-2">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="secc3sup" placeholder="" id="secc3sup" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc3val" placeholder="" id="secc3val" />
                                                </div>

                                                <div class="col-md-2">
                                                <input type="text" class="form-control" name="secc3fac" placeholder="" id="secc3fac" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc3fde" placeholder="" id="secc3fde" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="total3" placeholder="" id="total3" />
                                                </div>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-10">
                                                <label class="control-label col-md-2">IV<span class="required"></span>
                                               
                                                </label>
                                                 <div class="col-md-2">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="secc4sup" placeholder="" id="secc4sup" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc4val" placeholder="" id="secc4val" />
                                                </div>

                                                <div class="col-md-2">
                                                <input type="text" class="form-control" name="secc4fac" placeholder="" id="secc4fac" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="secc4fde" placeholder="" id="secc4fde" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="total4" placeholder="" id="total4" />
                                                </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                             <div class="form-group col-md-10">
                                                <label class="control-label col-md-2">INC. ESQ.<span class="required"></span>
                                               
                                                </label>
                                                 <div class="col-md-2">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="INCESQsup" placeholder="" id="INCESQsup" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="INCESQval" placeholder="" id="INCESQval" />
                                                </div>

                                                <div class="col-md-2">
                                                <input type="text" class="form-control" name="INCESQfac" placeholder="" id="INCESQfac" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="INCESQfac" placeholder="" id="INCESQfac" />
                                                </div>

                                                <div class="col-md-2">
                                                  <input type="text" class="form-control" name="INCESQtotal" placeholder="" id="INCESQtotal" />
                                                </div>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                              <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Superficie Total<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Superficie Total M²"class="form-control" name="superficietotalterreno" id="superficietotalterreno" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Valor Total<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Valor Total" class="form-control" name="valortotalterreno" id="valortotalterreno" />
                                                </div>
                                             </div>
                                             </div>

                                             <h4 class="block">Calculo del Valor de la Construcción</h4>



                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REF.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIPO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CON SER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUPERFICIE M²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR X M²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACTOR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR PARCIAL</label>

                                                <br>
                                                
                                                <label class="control-label col-md-2">A<span class="required"></span>
                                                </label>
                                                 <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="aconserv" placeholder="" id="aconserv" />
                                                </div>

                                                <div class="col-md-1">
                                                <input type="text" class="form-control" name="asuperficie" placeholder="" id="asuperficie" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="avalorx" placeholder="" id="avalorx" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="afactor" placeholder="" id="afactor" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="avalorparcial" placeholder="" id="avalorparcial" />
                                                </div>

                                                
                                                </div>
          
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                             
                                                <label class="control-label col-md-2">B<span class="required"></span>
                                                </label>
                                                 <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="btipo" placeholder="" id="btipo" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="bconserv" placeholder="" id="bconserv" />
                                                </div>

                                                <div class="col-md-1">
                                                <input type="text" class="form-control" name="bsuperficie" placeholder="" id="bsuperficie" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="bvalorx" placeholder="" id="bvalorx" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="bfactor" placeholder="" id="bfactor" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="bvalorparcial" placeholder="" id="bvalorparcial" />
                                                </div>

                                                </div>
          
                                             </div>

                                               <div class="form-group">
                                             <div class="form-group col-md-12">
                                             
                                                <label class="control-label col-md-2">C<span class="required"></span>
                                                </label>
                                                 <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="ctipo" placeholder="" id="ctipo" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="cconserv" placeholder="" id="cconserv" />
                                                </div>

                                                <div class="col-md-1">
                                                <input type="text" class="form-control" name="csuperficie" placeholder="" id="csuperficie" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="cvalorx" placeholder="" id="cvalorx" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="cfactor" placeholder="" id="cfactor" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="cvalorparcial" placeholder="" id="cvalorparcial" />
                                                </div>

                                                </div>
          
                                             </div>


                                               <div class="form-group">
                                             <div class="form-group col-md-12">
                                             
                                                <label class="control-label col-md-2">D<span class="required"></span>
                                                </label>
                                                 <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="dtipo" placeholder="" id="dtipo" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="dconserv" placeholder="" id="dconserv" />
                                                </div>

                                                <div class="col-md-1">
                                                <input type="text" class="form-control" name="dsuperficie" placeholder="" id="dsuperficie" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="dvalorx" placeholder="" id="dvalorx" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="dfactor" placeholder="" id="dfactor" />
                                                </div>

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="dvalorparcial" placeholder="" id="dvalorparcial" />
                                                </div>

                                                </div>
          
                                             </div>

                                             

                                              <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">SUP. TOTAL<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="SUP. TOTAL"class="form-control" name="suptotalcontruccion" id="suptotalcontruccion" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Valor Total<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Valor Total" class="form-control" name="valortotalconstruccion" id="valortotalconstruccion" />
                                                </div>
                                             </div>
                                             </div>
                                             <h4 class="block">Valor Total del Predio</h4>

                                             <div class="form-group">
                                              <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Valor total del predio<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Valor total del predio"class="form-control" name="valortotaldelpredio" id="valortotaldelpredio"  />
                                                </div>
                                                </div>
                                                
                                             </div>

                                             <h4 class="block">Valor Referido al dia</h4>

            

                                             <div class="form-group">
                                              <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">I.N.P.A<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>

                                                   <input type="text" placeholder="I.N.P.A"class="form-control" name="inpa" id="inpa" />
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">I.N.P.R<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="I.N.P.R" class="form-control" name="inpr" id="inpr" />
                                                </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">VR<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="VR"class="form-control" name="vr" id="vr" />
                                                </div>
                                                </div>
                                                
                                             </div>
                                             
                                              <div class="form-group">
                                              <div class="form-group col-md-6">
                                              <label class="control-label col-md-4">Fachada del Inmueble<span class="required"> * </span>
                                                </label>
                                                <br>
                                                <div class="col-md-4">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                             
                                             <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                             <div>
                                              <span class="btn red btn-outline btn-file">
                                              <span class="fileinput-new"> Seleccionar imagen </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="file" name="fachada"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                                              </div>
                                            </div>
                                             </div>
                                             </div>
                                             </div>

                                           

                                             <div class="form-group">
                                                <label class="control-label col-md-1">Fecha de visita<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                      <input class="form-control" type="text" readonly="" name="fechavisita" id="fechavisita"><span class="input-group-btn">
                                                      <button class="btn btn-primary btn-outline" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                      </button></span>
                                                   </div>
                                                </div>

                                                <label class="control-label col-md-1">Fecha de elaboración<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                      <input class="form-control" type="text" readonly name="fechaelaboracion" id="fechaelaboracion"><span class="input-group-btn">
                                                      <button class="btn btn-primary btn-outline" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                      </button>
                                                    </span>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-1">Fecha de autorización<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                   <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                      <input class="form-control" type="text" readonly="" name="fechaautorizacion" id="fechaautorizacion"><span class="input-group-btn">
                                                      <button class="btn btn-primary btn-outline" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                      </button></span>
                                                   </div>
                                                </div>

                                                
                                             </div>
                                       
                                             <div class="form-group">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-4">
                                                   <a class="btn blue-haze btn-outline sbold uppercase" href="#tab2" data-toggle="tab"> Anterior <i class="icon-action-undo"></i></a>
                                                   <a class="btn btn-primary btn-outline" href="#tab4" data-toggle="tab"> Siguiente <i class="icon-action-redo"></i></a>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="tab-pane fade" id="tab4">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 4 de 4 - </span>
                                                   <span class="desc">
                                                   <b>Avaluo Fiscal Urbano</b>
                                                   <i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block"></h4>
                                                <h2>Avaluo Fiscal Urbano</h2>
                                             <!-- 
                                                <input type="file" name="docbitacora[]" multiple>
                                                
                                                
                                                <input type="file" name="docplanos[]" multiple>                                           this -->
                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Lote<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Lote"class="form-control" name="loteafu" id="loteafu" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Tipo<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Tipo" class="form-control" name="tipoafu" id="tipoafu" />
                                                </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Manzana<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Manzana"class="form-control" name="manzanaafu" id="manzanaafu" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No. de Viviendas<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="No. de Viviendas" class="form-control" name="nodeviviendasafu" id="nodeviviendasafu" />
                                                </div>
                                             </div>
                                             </div>
                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Superficie Área privativa<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Superficie Área privativa"class="form-control" name="superficieareaprivativa" id="superficieareaprivativa" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Porcentaje Indiviso<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Porcentaje Indiviso" class="form-control" name="porcentajeindiviso" id="porcentajeindiviso" />
                                                </div>
                                             </div>
                                             </div>

                                              <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Superficie Área Común Descubierta<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Superficie Área Común Descubierta"class="form-control" name="superficieareadescubierta" id="superficieareadescubierta" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Superficie de Terreno segun % de indiviso<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Superficie de Terreno segun % de indiviso" class="form-control" name="superficieterrenosegunindiviso" id="superficieterrenosegunindiviso" />
                                                </div>
                                             </div>
                                             </div>

                                               <h4 class="block">Medidas y Colindacias</h4>

                                               <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Al Noroeste<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Al Noroeste"class="form-control" name="alnoroeste" id="alnoroeste" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Al Noreste<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Al Noreste" class="form-control" name="alnoreste" id="alnoreste" />
                                                </div>
                                             </div>
                                             </div>

                                               <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Al Sureste<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Al Sureste"class="form-control" name="alsureste" id="alsureste" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Al Suroeste<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Al Suroeste" class="form-control" name="alsuroeste" id="alsuroeste" />
                                                </div>
                                             </div>
                                             </div>


                                              <div class="form-group">
                                              <div class="form-group col-md-6">
                                              <label class="control-label col-md-4">Localización<span class="required"> * </span>
                                                </label>
                                                <br>
                                                <div class="col-md-4">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                             
                                             <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                             <div>
                                              <span class="btn red btn-outline btn-file">
                                              <span class="fileinput-new"> Seleccionar imagen </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="file" name="Localizacion"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                                              </div>
                                            </div>
                                             </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                              <div class="form-group col-md-6">
                                              <label class="control-label col-md-4">Croquis<span class="required"> * </span>
                                                </label>
                                                <br>
                                                <div class="col-md-4">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                             
                                             <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 500px; height: 500px;"> </div>
                                             <div>
                                              <span class="btn red btn-outline btn-file">
                                              <span class="fileinput-new"> Seleccionar imagen </span>
                                                <span class="fileinput-exists"> Cambiar </span>
                                                <input type="file" name="croquis"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                                              </div>
                                            </div>
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
                                                      <button type="submit" class="btn btn-primary btn-outline"> Solicitar Trámite <i class="fa fa-check"></i></button>
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
         </body>
      </html>