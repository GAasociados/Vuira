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
        <title>Registro</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
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
                                        <form class="form-horizontal" role="form" action="<?php echo base_url('user/register/guardar_func'); ?>" method="POST" id="form-registro">
                                            <h3> A continuación ingresa los siguientes datos: </h3>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Nombre(s)</label>
                                                            <div class="input-icon">
                                                                <i class="icon-user font-blue">*</i>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Nombre(s)" name="nombres" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Apellido Paterno</label>
                                                            <div class="input-icon">
                                                                <i class="icon-user font-blue">*</i>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Apellido Paterno" name="apellido_pat" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Apellido Materno</label>
                                                            <div class="input-icon">
                                                                <i class="icon-user font-blue">*</i>
                                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Apellido Materno" name="apellido_mat" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="input-icon">
                                                                <i class="icon-direction font-blue">*</i>
                                                                <select class="form-control" name="colonia" tabindex="-1" required id="cbocols">
                                                                    <option value="-1">Colonia / Barrio / Fraccionamiento</option>
                                                                    <?php foreach ($consulta->result() as $fila) { ?>
                                                                        <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                                            <?php echo $fila->NOMBRE; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                    <!-- <option value="Option 1">Option 1</option> -->
                                                                </select>
                                                            </div>
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
                                                                <input maxlength="5" class="form-control placeholder-no-fix" pattern="[0-9]{0-5}"  title="Solo números" placeholder="Código Postal" name="cp" required  id="codigop" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
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

                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Télefono</label>
                                                            <div class="input-icon">
                                                                <i class="icon-screen-smartphone font-blue">*</i>
                                                                <input  class="form-control placeholder-no-fix" required type="text" placeholder="Teléfono o Celular" name="telefono"  id="mask_phone" />
                                                            </div>
                                                            <span class="help-block"> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
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
                                            </div>
<div class="row">
                                                 <div class="col-md-12">
                                                     <label>¿Por favor indique si este funcionario es el director general del tramite?</label>
                                                     <input name="admin" type="checkbox">
                                                    </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                            <label class="control-label visible-ie8 visible-ie9">Tipo de Funcionario</label>
                                                            <div class="input-icon">
                                                                <i class="fa fa-users font-blue">*</i>
                                                                <select class="form-control" required="" name="tipo_usu" id="tipo_usuario">
                                                                    <option value="">Seleccione el Tipo de funcionario</option>
                                                                    <option value="13">Funcionario Japami</option>
                                                                    <option value="15">Funcionario Catastro</option>
                                                                    <option value="12">Funcionario Permisos de Anuncios</option>
                                                                    <option value="11">Funcionario Obras</option>
                                                                    <option value="14">Funcionario Rusticos y Urbanos</option>
                                                                    <option value="19">Funcionario Regime de propiedad</option>
                                                                    <option value="155">Funcionario Auxiliar(Catastro) </option>
                                                                    <option value="1555">Funcionario Administrador(Auxiliares Catastro)</option>
                                                                    <option value="16">Funcionario Administrador(Verifiadores)</option>
                                                                    <option value="166">Funcionario Verificador(Permisos y Obras)</option>
                                                                    <option value="1">Administrador</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                            <a class="btn red btn-outline" href="<?php echo base_url(); ?>">Regresar
                                                            </a>
                                                            <button type="submit" class="btn green"> Registarse </button>
                                                        </div>
                                                </div>

                                                   <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                                                            <div class="input-icon">
                                                                <i class="fa fa-lock font-blue">*</i>
                                                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Contraseña" name="contrasena" required /> </div>
                                                                <input class="" type="hidden"  name="direccion" id="direccion"  />
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label visible-ie8 visible-ie9">Repite tu contraseña</label>
                                                            <div class="controls">
                                                                <div class="input-icon">
                                                                    <i class="fa fa-check font-blue">*</i>
                                                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repite tu contraseña" name="rcontrasena" required /> </div>
                                                            </div>
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
    <script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
    <![endif]-->
            <!-- BEGIN CORE PLUGINS -->
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/js/user/user.js" type="text/javascript"></script>
             
    <script>
        $("#tipo_usuario").change(function () {
            var tipo = $("#tipo_usuario").val();
            switch (tipo) {
                case "13" :
                          $("#direccion").val("/infotramites/info_agua_y_drenaje_domestico");
                    break;
                case "15":
                case "155":
                case "1555":
                        $("#direccion").val("/infotramites/info_atencion_de_claves_catastrales_individual");
                    break;
                case "12":
                        $("#direccion").val("/infotramites/info_permisos_de_anuncios_autosoportados_azoteas");
                    break;
                case "11":
                        $("#direccion").val("/infotramites/info_autorizacion_ocupacion_construccion");
                    break;
                case "14":
                        $("#direccion").val("/infotramites/info_atencion_de_avaluos_rusticos");
                    break;
                case "19":
                        $("#direccion").val("/infotramites_regimen_propieda_condominio");
                    break;
                case "16":
                case "166":
                case "1":
                        $("#direccion").val("");
                    break;
            }



//        <option value="14">Funcionario Rusticos y Urbanos</option>
//        <option value="19">Funcionario Regime de propiedad</option>

//        <option value="16">Funcionario Administrador(Verifiadores)</option>
//                    <option value="166">Funcionario Verificador(Permisos y Obras)</option>
        });
    </script>
    </body>
</html>
