<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        
        <?php $this->load->view('base/head - css'); ?>
        
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <?php $this->load->view('base/header - tramite'); ?>
                    <!-- END HEADER -->
                </div>
            </div>
            
            <!-- ************INICIO SECCION***************** -->
            <div class="clearfix"></div>
            <div id="page-content">
                <div class="container">
                    <div class="row">
                        <h2>Cuenta Predial</h2><br>
                        <ul class="nav nav-pills nav-justified steps">
                            <li class="active">
                                <a data-toggle="tab" class="step" aria-expanded="true">
                                    <span class="desc">
                                        <b>Ingresa tu Número de Cuenta Predial</b><i class="fa fa-check"></i></span>
                                </a>
                            </li>
                        </ul>
                        
                        <p> 
                            Para agilizar el llenado de información es necesario que cuentes con tu Número de Cuenta Predial. 
                        </p>
                        
                        <div id="mostraralerta"></div>
                        
                        <form id="clavecatas1" action="<?php echo base_url() . $vista; ?>" method="post" enctype = "multipart/form-data">                    
                            <div class="form-group" required="true">
                                <label for="varchar">Cuenta Predial     *</label>
                                <input maxlength="15" id ="clave" type="text" name="clave" pattern="[A-Z,0-9]+" placeholder="Número Predial" required="" onkeyup="javascript:this.value = this.value.toUpperCase();">
                                <!-- <input type="text" hidden="true" id="respuesta" name="respuesta"> -->
                                <input type="text" hidden="true" id="validar_tramite_vigente_DGDT" name="validar_tramite_vigente_DGDT" value="<?php echo isset($validar_tramite_vigente_DGDT)? $validar_tramite_vigente_DGDT : "0" ; ?>">
                                <input type="text" hidden="true" id="validar_tramite_vigente_DGDT_Permiso" name="validar_tramite_vigente_DGDT_Permiso" value="<?php echo isset($validar_tramite_vigente_DGDT_Permiso)? $validar_tramite_vigente_DGDT_Permiso : "" ; ?>">
                                <button id="clavecatas" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Verificando Cuenta"  type="submit" class="btn btn-info">Buscar Predial</button>
                            </div>
                            <!--<h5 class="note note-warning">Si no cuentas con tu clave por favor da click en solicitar Cuenta Predial .</h5>
                            <div class="col-md-6">

                                <a type="" href="<?php // echo base_url() . 'infotramites/info_atencion_de_claves_catastrales_individual'     ?>"  class="btn btn-primary">Solicitar Clave Catastral</a>
                            </div>-->
                        </form>
                        <?php if (isset($is_DGDT_no_obligatorio_predial)) { ?>
                        <div class="" style="">
                            <form id="frm_cuenta_predial_2" action="<?php echo base_url() . $vista_DGDT_no_obligatorio_predial; ?>" method="post" enctype = "multipart/form-data">
                                <label class="">¿No conoce su cuenta predial? </label>
                                <button type="submit" class="btn btn-default" style="background-color: lightgray;">Acceder sin dato predial</button>
                            </form>
                        </div>
                        <?php } ?>
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- ************FIN SECCION***************** -->

            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <?php $this->load->view('base/footer - tramite'); ?>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    </body>
    <script>
        $('#clavecatas').click(function (e) {
            $('#clavecatas').attr("disabled", true);
            var $this = $('#clavecatas');
            $this.button('loading');
            e.preventDefault();
            var Clave = $("#clave").val();
            var validar_tramite_vigente_DGDT = $("#validar_tramite_vigente_DGDT").val();
            var validar_tramite_vigente_DGDT_Permiso = $("#validar_tramite_vigente_DGDT_Permiso").val();
            
            $.ajax({
                url: "../Permiso_anuncios/verificar",
                data: {
                    clave: Clave, 
                    validar_tramite_vigente_DGDT: validar_tramite_vigente_DGDT, 
                    validar_tramite_vigente_DGDT_Permiso: validar_tramite_vigente_DGDT_Permiso
                },
                type: "POST",
                success: function (respuesta) {
                    
                    if (respuesta === "1") {
                        //$("#respuesta").val(respuesta);
                        $("#clavecatas1").submit();
                    }
                    else if (respuesta === "2") {
                        html = "<div class='alert alert-block alert-danger fade in'>";
                        html += "<button type='button' class='close' data-dismiss='alert'></button>";
                        html += "<h4 class='alert-heading'>Aviso</h4>";
                        html += "<p>El sistema ya cuenta con una solicitud vigente del mismo trámite para este predio. Sí el trámite lo realizó usted puede verificarlo en: <a href='<?php echo base_url() . substr($vista,0,strrpos($vista,"/")) ; ?>' target='_blank'>Ver Mis Trámites</a> </p>";
                        html += "</div>";
                        $("#mostraralerta").html(html);
                        $this.button('reset');
                    }
                    else if(respuesta === "0") {
                         html = "<div class='alert alert-block alert-danger fade in'>";
                         html += "<button type='button' class='close' data-dismiss='alert'></button>";
                         html += "<h4 class='alert-heading'>Aviso</h4>";
                         html += "<p>No se encuentra registro de la cuenta predial ingresada</p>";
                         html += "</div>";
                         $("#mostraralerta").html(html);
                         $this.button('reset');
                    }
                    else {
                         html = "<div class='alert alert-block alert-danger fade in'>";
                         html += "<button type='button' class='close' data-dismiss='alert'></button>";
                         html += "<h4 class='alert-heading'>Error</h4>";
                         html += "<p>Ocurrió un error relacionado con el servidor. Intente más tarde.</p>";
                         html += "</div>";
                         $("#mostraralerta").html(html);
                         $this.button('reset');
                    }
                }
            });
        });
    </script>


</html>
