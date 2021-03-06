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
  <title>Ventanilla Única Irapuato</title>
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

                  <div class="tab-content">

                    <div class="tab-pane active" id="tab1">
                      <ul class="nav nav-pills nav-justified steps">
                        <li class="active">
                          <a data-toggle="tab" class="step" aria-expanded="true">
                            <span class="number"> 1 de 2 - </span>
                            <span class="desc">
                              <b> Antes del Trámite </b><i class="fa fa-check"></i></span>
                            </a>
                          </li>
                        </ul>
                        
                        <h4 class="block">Autorización y Atención de Avaluos Urbanos.</h4>
                        <h5><b>Objetivo de Trámite</b></h5>
                        La autorización correcta de avalúos fiscales de inmuebles a través de la revisión y verificación de datos presentados por el interesado .
                        <br>
                        <br>
                        <h4>A continuación se mencionan los pasos para dar continuidad al trámite:</h4>
                        <br>
                        <div class="row">
                          1)Ponerse en contacto con alguno de los peritos que se muestran en la siguiente lista, los datos de contacto del perito se muestran al seleccionar alguno.
                        </div>
                        <br>
                        <div class="form-group">
                          <label class="control-label col-md-1">Nombre<span class="required"> * </span>
                          </label>
                          <div class="col-md-12">
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

                            <div class="form-group">
                              <div class="form-group col-md-6">
                                Número de Perito
                                <input type="text" class="form-control" name="noregistroperitodp"  placeholder="Núm. de Registro del Perito" id="numperito" value="" readonly />
                              </div>
                              <div class="form-gorup col-md-6">
                                Teléfono
                                <input type="telephone" placeholder="Teléfono" class="form-control" name="telefonoperitodp" id="telefonoofocina" readonly value=""/>
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <div class="row col-md-12">
                            <br><br>
                            2)Una vez contactado el perito de su preferencia, de clic en el botón iniciar trámite  y llene los campos correspondientes.
                            <br><br>
                            3)El perito seleccionado se encargará de realizar el avalúo de acuerdo a la información   proporcionada en la solicitud.
                            <br><br>
                            4)Una vez capturada la información en el sistema, el perito o responsable  acudirá a las oficinas  de la Dirección de Catastro del Municipio de Irapuato a recoger   el avalúo sellado y firmado.
                            <br><br>
                            5)El perito entrega la documentación al interesado.
                          </div>
                          <br>
                          <br>
                          <br>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-9">
                                <br>
                                  <a class="btn btn-info" href="<?php echo base_url('index.php/avaluos_urbanos/create'); ?>">Solicitar Trámite</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
