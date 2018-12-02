<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
  <title>Registro Personas Morales</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
  <meta content="" name="author" />
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
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
                  <h1>Regístro Personas Morales</h1>
                </div>
                <!-- END PAGE TITLE -->
              </div>
            </div>
            <div class="container">
            <div class="row">
              <div class="form-group">
                <div id="mostraralerta">

                </div>
              </div>
            </div>
          </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
              <div class="container">
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                  <!-- BEGIN LOGIN FORM -->
                  <form id="form-registro" class="form-horizontal" role="form" action="<?php echo base_url('index.php/user/registermorales/guardar');?>" method="POST">
                    <h3> A continuación ingresa los siguientes datos: </h3>
                    <div class="row">
                     <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label visible-ie8 visible-ie9">Nombre</label>
                          <div class="input-icon">
                            <i class="icon-user font-blue">*</i>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="Nombre" name="nombres" required />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label visible-ie8 visible-ie9">Representante</label>
                          <div class="input-icon">
                            <i class="icon-user font-blue">*</i>
                            <input class="form-control placeholder-no-fix" type="text" placeholder="Nombre del Representante" name="apellido_pat" required />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">RFC</label>
                            <div class="input-icon">
                              <i class="icon-user font-blue">*</i>
                              <input class="form-control placeholder-no-fix" type="text" placeholder="RFC" name="rfc" maxlength="15" style="text-transform: uppercase" required />
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-4">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">
                                Sí no lo tiene consulte su RFC 
                                <a href="https://rfc.siat.sat.gob.mx/PTSC/RFC/menu/index.jsp?opcion=2" class="" target="_blank" >
                                    aquí
                                </a>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="col-md-12">
                       <div class="form-group">
                            <div class="input-icon">
                                <select class="form-control select2" name="colonia" tabindex="-1" required id="cbocols">
                                   <option value="-1">* Colonia / Barrio / Fraccionamiento</option>
                                   <?php foreach ($consulta->result() as $fila) { ?>
                                       <option value="<?php echo $fila->COLONIA_ID; ?>">
                                           <?php echo $fila->NOMBRE; ?>
                                       </option>
                                   <?php } ?>
                                   <!-- <option value="Option 1">Option 1</option> -->
                                </select>
                            </div>
                          
                            
                          <!-- <option value="Option 1">Option 1</option> -->
                      
                          
                    </div>

                      <!--
                        <div class="form-group">
                          <label class="control-label visible-ie8 visible-ie9">Colonia</label>
                          <div class="input-icon">
                            <i class="icon-direction font-blue"></i>
                            <input class="form-control placeholder-no-fix" type="number" placeholder="Colonia" name="colonia" required />
                          </div>
                        </div>
                        -->
                      </div>
                    </div>

                    <div class="col-md-4">
                     <div class="col-md-12">

                      <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Código Postal</label>
                        <div class="input-icon">
                          <i class="icon-direction font-blue">*</i>
                          <input class="form-control placeholder-no-fix" type="number" placeholder="Código Postal" name="cp" required  id="codigop"/>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-6">
                   <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label visible-ie8 visible-ie9">Calle</label>
                      <div class="input-icon">
                        <i class="icon-direction font-blue">*</i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Calle y Número" name="calle" required />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label visible-ie8 visible-ie9">Télefono</label>
                      <div class="input-icon">
                        <i class="icon-screen-smartphone font-blue"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Teléfono o Celular" name="telefono"  id="mask_phone" />
                      </div>
                      <span class="help-block"> </span>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6">
                 <div class="col-md-12">
                  <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Correo Electrónico</label>
                    <div class="input-icon">
                      <i class="fa fa-envelope font-blue">*</i>
                      <input class="form-control placeholder-no-fix" type="email" placeholder="Correo Electrónico" name="correo" required />
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <div class="input-icon">
                      <i class="fa fa-lock font-blue">*</i>
                      <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contraseña" name="contrasena" required /> </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
               <div class="col-md-12">
                 <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Repite tu contraseña</label>
                    <div class="controls">
                      <div class="input-icon">
                        <i class="fa fa-check font-blue">*</i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repite tu contraseña" name="rcontrasena" required /> </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" name="aceptoAviso" id="aceptoAviso">
                      <label>
                       Acepto los 
                       <a href="<?php echo base_url('index.php/user/terminos'); ?>">Términos de servicio y Políticas de privacidad </a>
                     </label>
                   </div>

                   <div class="form-actions">
                    <a class="btn red btn-outline" href="<?php echo base_url('index.php/user/terminos'); ?>">Regresar
                    </a>
                    <button type="submit" class="btn green"> Registarse </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <br>
          
          <!-- END LOGIN FORM -->
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
<script src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/js/user/user.js" type="text/javascript"></script>
</body>
</html>
