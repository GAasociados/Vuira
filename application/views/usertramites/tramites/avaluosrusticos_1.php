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
                                                   <b> Calculo del Valor </b><i class="fa fa-check"></i></span>
                                                   </a>
                                                </li>
                                             </ul>
                                             


                                               <h4 class="block">Calculo del Valor de Terreno</h4>
                                            
                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLASIFICACIÓN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUPERFICIE EN HAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR X HA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR PARCIAL</label>

                                                <br>
                                                
                                                <label class="control-label col-md-2">RIEGO<span class="required"></span>
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

                                                

                                                
                                                </div>
          
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label class="control-label col-md-2">TEMPORAL<span class="required"></span>
                                               
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

                                    
                                                </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label class="control-label col-md-2">AGOSTADERO<span class="required"></span>
                                               
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

                                                
                                                </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label class="control-label col-md-2">CERRILL,MONTE,INCULTIVABLE<span class="required"></span>
                                               
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

                                                
                                                </div>
                                             </div>
                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label class="control-label col-md-2">DE CASA<span class="required"></span>
                                               
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

                                               
                                                </div>
                                             </div>

                                             <div class="form-group">
                                              <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Superficie Total en HAS.<span class="required"> * </span>
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

                                             <h4 class="block">Calculo del Valor de las Construcciónes</h4>



                                             <div class="form-group">
                                             <div class="form-group col-md-12">
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REF.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIPO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDO.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDAD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUP. EN M²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR POR M²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VALOR PARCIAL</label>

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

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="dvalorparcial" placeholder="" id="dvalorparcial" />
                                                </div>

                                                </div>
          
                                             </div>
                                               <div class="form-group">
                                             <div class="form-group col-md-12">
                                             
                                                <label class="control-label col-md-2">E<span class="required"></span>
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

                                                <div class="col-md-1">
                                                  <input type="text" class="form-control" name="dvalorparcial" placeholder="" id="dvalorparcial" />
                                                </div>

                                                </div>
          
                                             </div>

                                             

                                              <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Sup. Total Construida M²<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="SUP. TOTAL"class="form-control" name="suptotalcontruccion" id="suptotalcontruccion" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-3">Valor Total de las Construcciones<span class="required"> * </span>
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
                                                <label class="control-label col-md-2">Base Grabable<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Base Grabable"class="form-control" name="basegrabable" id="basegrabable" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-3">Impuesto Bimestral<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Impuesto Bimestral" class="form-control" name="impuestobimestral" id="impuestobimestral" />
                                                </div>
                                             </div>
                                             </div>
                                            

                                             <div class="form-group">
                                               <label class="control-label col-md-2">Valor Referido al dia<span class="required"> * </span>
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
                                              <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Valor Total del Predio<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>

                                                   <input type="text" placeholder="Valor Total del Predio"class="form-control" name="valortotaldelpredio" id="valortotaldelpredio" />
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
                                                   <span class="desc"><b>PREDIO</b><i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Uso del Predio (anotar dia mes y año)</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-2">Uso
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">Agricola</option>
                                                 <option value="1">Pecuario</option>
                                                 <option value="2">Forestal</option>
                                                 <option value="3">Industrial</option>
                                                 <option value="4">Recreativo</option>
                                                 <option value="5">Cultural</option>
                                                 <option value="6">Abitacional</option>
                                                 <option value="7">Otros</option>
                                             
                                             </select>
                                                </div>

                                                 <label class="control-label col-md-1">Fecha<span class="required"> * </span>
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

                                             <h4 class="block">Superficie Total del Predio</h4>


                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Calculada has<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Calculada"class="form-control" name="calculada" id="calculada" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-3">Investigada has<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Investigada" class="form-control" name="investigada" id="investigada" />
                                                </div>
                                             </div>
                                             </div>

                                             <h4 class="block">Regimen de Tenencia (anotar dia mes y año)</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-2">Regimen
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">Propiedad Privada</option>
                                                 <option value="1">Egidal</option>
                                                 <option value="2">Comunidad</option>
                                                 <option value="3">Federal</option>
                                                 <option value="4">Estatal</option>
                                                 <option value="5">Municipal</option>
                                                
                                             
                                             </select>
                                                </div>

                                                 <label class="control-label col-md-1">Fecha<span class="required"> * </span>
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

                                             <h4 class="block">Aceso a vias de comunicacíón (anotar dia mes y año)</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-2">Acceso
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">Todo el año, Factor 1.20</option>
                                                 <option value="1">En tiempo de secas, Factor 1.00</option>
                                                 <option value="2">No hay, Factor 0.50</option>
                                              
                                             </select>
                                                </div>

                                                 <label class="control-label col-md-1">Fecha<span class="required"> * </span>
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

                                             <h4 class="block">Distancia a centros de Comercialización</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-2">Distancia
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A menos de 3 km, Factor 1.5</option>
                                                 <option value="1">Mas de 3 km, Factor 1.0</option>
                                                
                                              
                                             </select>
                                                </div>

                                                 <label class="control-label col-md-1">Fecha<span class="required"> * </span>
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
                                                <label class="control-label col-md-2">Observaciones 
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
                                                   <span class="desc"><b>Clasificación Agrológica del Predio</b><i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Capacidad de Uso de Suelo, Elementos Considerados Para su Determinación</h4>
                                             <div class="form-group">
                                                <label class="control-label col-md-2">FACTOR
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">1.00</option>
                                                 <option value="1">1.05</option>
                                                 <option value="2">1.08</option>
                                                 <option value="3">1.10</option>
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>


                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">1.-SUELO
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">HASTA 10 cm</option>
                                                 <option value="1">DE 10 A 30 cm</option>
                                                 <option value="2">de 30 A 60 cm</option>
                                                 <option value="3">Mayor de 60 cm</option>
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>


                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">2.-PEDREGOSIDAD
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">PERMITE LABORES AGRICOLAS CON EQUIPO MECANIZADO</option>
                                                 <option value="1">PERMITE LABORES AGRICOLAS CON METODOS TRADICIONALES</option>
                                                 <option value="2">NO PERMITE</option>
                                                 
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>

                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">3.-DRENAJE INTERNO
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">BUENO</option>
                                                 <option value="1">REGULAR</option>
                                                 <option value="2">MALO</option>
                                                 
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>

                                              

                                             </div>

                                              <div class="form-group">
                                                <label class="control-label col-md-2">4.-DISPONIBILIDAD DE AGUA
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">RIEGO POR GRABEDAD</option>
                                                 <option value="1">RIEGO POR BOMBEO</option>
                                                 <option value="2">RIEGO POR MANANTIAL</option>
                                                 <option value="3">RIEGO POR POZO PROFUNDO</option>
                                                 <option value="4">TEMPORAL</option>
                                                 
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>

                                                

                                             </div>


                                             <div class="form-group">
                                                <label class="control-label col-md-2">FACTOR
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">1.10</option>
                                                 <option value="1">1.05</option>
                                                 <option value="2">1.00</option>
                                                 <option value="3">0.95</option>
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>


                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">5.-TOPOGRAFIA
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">TERRENOS PLANOS</option>
                                                 <option value="1">PENDIENTE SUAVE MENOR A 5 %</option>
                                                 <option value="2">PENDIENTE FUERTE MAYOR A 5 %</option>
                                                 <option value="3">MUY ACCIDENTADO</option>
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>

                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">6.-EROCIÓN
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">NO SE APRECIA</option>
                                                 <option value="1">MODERADA</option>
                                                 <option value="2">FUERTE</option>
                                                 
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>

                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">7.-INUNDACIÓN
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">NO EXISTE</option>
                                                 <option value="1">OCACIONAL</option>
                                                 <option value="2">FRECUENTE</option>
                                                 
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>

                                             </div>

                                             <div class="form-group">
                                                <label class="control-label col-md-2">8.-SALINIDAD
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">NO EXISTE</option>
                                                 <option value="1">SI EXISTE</option>
                                                 
                                                 
                                            
                                             </select>
                                                </div>

                                                <div class="col-md-2">
                                             <select class="form-control" name="referencia1" tabindex="-1" id="referencia1">
                                                 <option value="0">A</option>
                                                 <option value="1">B</option>
                                                 <option value="2">C</option>
                                                 
                                            
                                             </select>
                                                </div>


                                             </div>


                                             <div class="form-group">
                                                <label class="control-label col-md-2">FACTORES DE ACUERDO A LOS ELEMENTOS AGROLOGICOS
                                                <span class="required"> * </span>
                                                </label>
                                                
                                                <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
                                                </div>
                                                <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
                                                </div>
                                                <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
                                                </div>

                                                 <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
                                                </div>


                                                <label class="control-label col-md-2">TOTAL
                                                <span class="required"> * </span>
                                                </label>
                                                
                                                <div class="col-md-1">
                                                 <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
                                                </div>

                                             </div>

                                             <div class="form-group">
                                             <label class="control-label col-md-2">OBSERVACIONES
                                                <span class="required"> * </span>
                                                </label>

                                                <div class="col-md-4">
                                                <span></span>
                                                 <input type="text" class="form-control" name="atipo" placeholder="" id="atipo" />
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
                                                   <b>PLANO DE DESLINDE</b>
                                                   <i class="fa fa-check"></i> </span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block"></h4>
                                                <h2>PLANO DE DESLINDE</h2>
                                             <!-- 
                                                <input type="file" name="docbitacora[]" multiple>
                                                
                                                
                                                <input type="file" name="docplanos[]" multiple>                                           this -->
                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Sub-Tramo<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Sub-Tramo"class="form-control" name="loteafu" id="loteafu" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Ficha<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Ficha" class="form-control" name="tipoafu" id="tipoafu" />
                                                </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Propietario<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Propietario"class="form-control" name="manzanaafu" id="manzanaafu" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">No. de Titulo y/o Escritura<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="No. de Titulo y/o Escritura" class="form-control" name="nodeviviendasafu" id="nodeviviendasafu" />
                                                </div>
                                             </div>
                                             </div>
                                             <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Predio<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Predio"class="form-control" name="superficieareaprivativa" id="superficieareaprivativa" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Area Total del Terreno Segun Escrituras<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Area Total del Terreno Segun Escrituras" class="form-control" name="porcentajeindiviso" id="porcentajeindiviso" />
                                                </div>
                                             </div>
                                             </div>

                                              <div class="form-group">
                                               <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Area Total del Terreno Segun Levantamiento<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                <span></span>
                                                   <input type="text" placeholder="Area Total del Terreno Segun Levantamiento"class="form-control" name="superficieareadescubierta" id="superficieareadescubierta" />
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Area de Residual Este<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                 <span></span>
                                                   <input type="text" placeholder="Area de Residual Este" class="form-control" name="superficieterrenosegunindiviso" id="superficieterrenosegunindiviso" />
                                                </div>
                                             </div>
                                             </div>

                                               

                                               


                                              <div class="form-group">
                                              <div class="form-group col-md-6">
                                              <label class="control-label col-md-4">Fachada Inmueble<span class="required"> * </span>
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
                                              <label class="control-label col-md-4">Croquis de Localización<span class="required"> * </span>
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