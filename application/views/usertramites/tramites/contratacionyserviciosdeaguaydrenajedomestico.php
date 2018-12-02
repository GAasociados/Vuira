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
                                    <h1>Contratación y Servicios de Agua y Drenaje Doméstico.</h1>
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
                                    <form class="form-horizontal" role="form" action="<?php echo base_url()."tramites/Contratacionyserviciosdeaguaydrenajedomestico/savetram";?>" method="POST">
                                       <div class="tab-content">
                                          <div class="tab-pane active" id="tab1">
                                             <ul class="nav nav-pills nav-justified steps">
                                                <li class="active">
                                                   <a data-toggle="tab" class="step" aria-expanded="true">
                                                   <span class="number"> 1 de 1 - </span>
                                                   <span class="desc">
                                                   <b> Solicitud de Contrato de Servicios </b><i class="fa fa-check"></i></span>
                                                   </a>
                                                </li>
                                             </ul>
                                             
                                             <h4 class="block">Solicitud de Contrato de Servicios</h4>
                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Nombre <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nombre"  placeholder="Nombre "  id="nombre" />
                                                </div>
                                                </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Fecha<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                <span></span>
                                                   <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                      <input class="form-control" type="text" readonly="" name="fecha" id="fecha"><span class="input-group-btn">
                                                      <button class="btn btn-primary btn-outline" type="button">
                                                      <i class="fa fa-calendar"></i>
                                                      </button></span>
                                                   </div>
                                             </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Calle<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                <span></span>
                                                   <input type="text" class="form-control" name="calle"  placeholder="Calle"  id="calle" />
                                                </div>
                                                </div>

                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Numero<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                <span></span>
                                                   <input type="text" class="form-control" name="numero"  placeholder="Numero" id="numero" />
                                                </div>
                                             </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Fracc/Colonia <span class="required"> * </span></label>
                                                <div class="col-md-7">
                                                   <select class="form-control" name="coloniadg" tabindex="-1"  id="coloniadg">
                                                      <option value="-1">Colonia / Barrio / Fraccionamiento</option>
                                                      <?php foreach ($consulta->result() as $fila) { ?>
                                                      <option value="<?php echo $fila->ID;?>">
                                                         <?php echo $fila->tipo_de_asentamiento." - ".$fila->colonia. " (".$fila->codigo_postal.") "; ?>
                                                      </option>
                                                      <?php } ?>
                                                      <!-- <option value="Option 1">Option 1</option> -->
                                                   </select>
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                 <label class="control-label col-md-2">Tipo de Servicio
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                   <select class="form-control" name="tiposervicio" tabindex="-1" id="tiposervicio">
                                                 <option value="0">Domestico</option>
                                                 <option value="1">Comercial</option>
                                                 <option value="2">Industrial</option>
                                                 <option value="3">Mixto</option>

                                             </select>
                                                </div>
                                                </div>
                                             </div>


                                              <div class="form-group">
                                             <div class="form-group col-md-6">
                                                 <label class="control-label col-md-2">Servicios con los que cuenta el predio
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                   <select class="form-control" name="serviciosdelpredio" tabindex="-1" id="serviciosdelpredio">
                                                 <option value="0">Agua</option>
                                                 <option value="1">Drenaje</option>
                                                 <option value="2">Ambos Servicios</option>
                                                 <option value="3">Ninguno</option>

                                             </select>
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                 <label class="control-label col-md-2">Servicios que Solicita
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                   <select class="form-control" name="serviciosquesolicita" tabindex="-1" id="serviciosquesolicita">
                                                 <option value="0">Agua</option>
                                                 <option value="1">Drenaje</option>
                                                 <option value="2">Ambos Servicios</option>
                                                 <option value="3">Mixto</option>

                                             </select>
                                                </div>
                                                </div>
                                             </div>

                                             <div class="form-group">
                                             <div class="form-group col-md-6">
                                                 <label class="control-label col-md-2">Condiciones Generales del Predio
                                                <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                   <select class="form-control" name="condicionesgenerales" tabindex="-1" id="condicionesgenerales">
                                                 <option value="0">Habitado</option>
                                                 <option value="1">Deshabitado</option>
                                                 <option value="2">Obra Negra</option>
                                                 <option value="3">Lote Baldio</option>

                                             </select>
                                                </div>
                                                </div>
                                                 <div class="form-group col-md-6">
                                                <label class="control-label col-md-2">Nombre Solicitante<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-7">
                                                <span></span>
                                                   <input type="text" class="form-control" name="nombredelsolicitante"  placeholder="Nombre Solicitante"  id="nombredelsolicitante" />
                                                </div>
                                                </div>

                                                <div class="form-group">
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
                                            <input id="address" type="text" class="class="form-control"" value="Irapuato,Gto." name="callemapa">
                                            <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
                                          </div>
                                          <div style="width:100%; height: 500px;" >
                                          <div id="map"></div>
                                          </div>
                                                  </div>
                                               <!-- end map -->
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
