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
        <title>Ventanilla Única Irapuato</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url();?>assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>


    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
  
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content" style="background: rgba(255,255,255,.9); ">
        <div id="mostraralerta"></div>
            <!-- BEGIN LOGIN FORM -->
            <form class="form-horizontal" role="form" action="<?php echo base_url('index.php/login/logenter/');?>" method="POST">
                <h3 class="form-title" style="color:black;">Iniciar Sesión</h3>
                  <div class="row">
                                            
                      <div class="col-md-3"></div>
                      <div class="col-md-4"><img style="width: 150px"src="<?php echo base_url();?>assets/layouts/layout3/img/logo.png" alt="" /> </div>
                       <input name="direccion" type="hidden" value="<?php echo $direccion;?>">
                
        </div>
                          <div class="row">
                                            
                   <div class="create-account">
                       <p>
                    <span style="color:black;">Para Acceder usa tu Correo Electrónico Registrado  &nbsp;
                    ¿Aún no tienes una cuenta  ?&nbsp;</span>
                           <a class="btn btn-primary" href="<?php echo base_url('user/register'); ?>" id="register-btn" style="color: #ffffff"> Crea una cuenta </a>
                        </p>
                  
                </div>
        </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Correo</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo" name="username" required /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" required /> </div>
                </div>
                <div class="form-group col-md-12">
                    
                    <?php 
                    $alphabet = 'abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                      $pass = array(); 
                      $alphaLength = strlen($alphabet) - 1;
                      for ($i = 0; $i < 6; $i++) {
                          $n = rand(0, $alphaLength);
                          $pass[] = $alphabet[$n];
                      }
                    ?>
            <div class="col-md-12" style="color:black; font-weight: bold;">
                Ingresa en el campo en blanco las letras que se encuentran en color azul "Puedes copiar  y pegar en el campo"
            </div>        
            <div class="col-md-6">
            <input style="color:blue; font-weight: bold;" class="form-control" value="<?php echo implode($pass);?>" readonly type="text" autocomplete="off" placeholder="" id="cod"name="rancaracteres" />    
            </div>
            <div class="col-md-6">
            <input class="form-control" type="text" autocomplete="off" placeholder="Ingresar Letras" name="usercaracteres" id="cod1" />
            </div>
            
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green"> Inicia sesión </button>
                </div>

                <div class="forget-password">
                    <h4 style="color:black;">¿Olvidaste tu Contraseña ?</h4>
                    <p style="color:black;"> No hay problema, click
                        <a href="<?php echo base_url('user/forget'); ?>" id="forget-password"  style="color: #ff8000"> aquí </a> para restablecer tu contraseña. </p>
                </div>
                <h3>
        <b><div class="copyright" style="color:black;"> Irapuato | H. Ayuntamiento 2015-2018</div>
        </b>
        </h3>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
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

        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url();?>assets/pages/scripts/login-4.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->

         <!-- myscript -->
        <script src="<?php echo base_url();?>assets/js/login/login.js" type="text/javascript"></script>
    </body>
</html>
