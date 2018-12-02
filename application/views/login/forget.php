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
   <?php
                            $correcto = $this->session->flashdata('correcto');
                            if ($correcto) {
                                ?>
                                <div class='note note-success'>
                                    <span class='alert-heading ' style=''><b><?= $correcto ?></b></span>
                                </div>


                                <?php
                            }
                            ?>
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
                 <h1>Recuperar Contraseña</h1>
               </div>
               <!-- END PAGE TITLE -->
             </div>
           </div>
           <!-- END PAGE HEAD-->
           <!-- BEGIN PAGE CONTENT BODY -->
           <div class="page-content">
             <div class="container-fluid">
               <!-- BEGIN PAGE CONTENT INNER -->
               <div class="form-group">
                 <div class="form-group col-md-6">
                   <ul class="list-unstyled">
                     <li><h4>*Ingrese el correo electrónico de su usuario</h4></li>
                     <br>
                     <li><h4>*Presione el botón</h4></li>
                     <br>
                     <li><h4>*Abra la bandeja de entrada de su correo</h4></li>
                     <br>
                     <li><h4>*Abra el correo con el asunto "Recuperar Contraseña"</h4></li>
                     <br>
                     <li><h4>*Se le asignará una nueva contraseña generada por el sistema</h4></li>
                     <br>
                     <li><h4>*Ingrese nuevamente al sistema con su nueva contraseña</h4></li>
                   </ul>
                 </div>
                 <div class="form-group col-md-6">
                   <form class="" action="<?php base_url(); ?>forget/newpass" method="post">
                     <div class="form-group col-md-12">
                       <label>Ingrese su correo</label>
                       <input class="form-control" type="text" required name="correo" value="" placeholder="Ingrese Aquí Su correo">
                     </div>
                     <div class="form-group col-md-12">
                       <button type="submit" name="button" class="btn btn-primary">Recuperar Contraseña</button>
                     </div>
                   </form>
                 </div>
               </div>
               <!-- END PAGE CONTENT INNER -->
             </div>
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

</body>
</html>
