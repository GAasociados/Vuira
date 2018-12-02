<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
$identificacion = '';
$rpredial = '';
$nooficial = '';
$identificacionar = '';
$rpredialar = '';
$nooficialar = '';
foreach ($predial->result() as $row) {
    $rpredial .= $row->tipo_documento;
    $rpredialar .= $row->archivo;
//    die(print_r($row, TRUE));
}

foreach ($INE->result() as $row) {
    $identificacion .= $row->tipo_documento;
    $identificacionar .= $row->archivo;
}
foreach ($noficial->result() as $row) {
    $nooficial .= $row->tipo_documento;
    $nooficialar .= $row->archivo;
//    die(print_r($row, TRUE));
}
?>


<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" ng-app="Aplicacion">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <?php $this->load->view('base/head - css'); ?>
</head>
<style>
    .btnAyuda {
        border-radius: 50px 0px 0px 50px;
        right: 0px;
    }

    .btnAyudaForm {
        border-radius: 50px 0px 0px 50px;
        right: 0px;
        position: fixed;
        bottom: 150px;
        z-index: 10;
    }

    body:not(.modal-open) {
        padding-right: 0px !important;
    }
</style>
<style>
    .avance-de-obra {
        width: 250px;
    }
</style>
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
    <?php
    $modificar = "";
    if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3):
        ?>
        <div class="hidden-xs hidden-xm">
            <!--             <button class="btn btn-warning float btnAyuda" title="Ayuda" id="ayuda" onclick="iniciarAyuda()">
                             <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4>
                             </button>-->
            <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()">
                <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4>
            </button>
        </div>
        <?php
        $modificar = "";
        $modificar1 = "";
    else:
        if ($status == 4 || $status == 6 || $status == 5):
            $modificar = "readonly";
            $modificar1 = "readonly";
        else:
            $modificar = "readonly";
            $modificar1 = "";
        endif;
    endif;
    ?>
    <div class="clearfix"></div>
    <div id="page-content">
        <div class="container">
            <div class="row">
                <h2>Clave Catastral Individual con Escritura</h2><br>
            </div>

            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="panel">
                <div class="panel-body">
                    <h5 class="note note-success">Para solicitar este trámite le recomendamos tenga su recibo predial a
                        la mano.</h5>
                    <form id="formclave" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                        <?php if ($modificar != ""): ?>
                            <h5 class="note note-warning bold">Recuerda dar click en el botón "Guardar" si realizas
                                algún cambio.<br>En caso de cambios en el documento final vuelva a generar el documento
                            </h5>
                        <?php endif; ?>
                        <div class="row">
                            <div class="form-group">
                                <?php if (isset($numerocontrol)): ?>
                                    <div class="form-group col-md-4">
                                        <label for="varchar">Número de seguimiento</label>
                                        <input <?php echo $modificar; ?> readonly=""
                                                                         type="text" <?php echo $this->session->userdata('tipo') != 15 ? "" : "required" ?>
                                                                         class="form-control" name="numerocontrol"
                                                                         id="numerocontrol"
                                                                         value="<?php echo $numerocontrol ?>"/>
                                    </div>
                                <?php endif; ?>
                                <?php if ($tipotramitedp == 2): ?>
                                    <div class="form-group col-md-4">
                                        <label for="varchar">Número de seguimiento Original</label>
                                        <input type="text" class="form-control" name="control" id="control"
                                               value="<?php echo $control ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        


                        

                        
                               
                    <!--[if lt IE 9]>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
                    <![endif]-->
                    <!-- BEGIN CORE PLUGINS -->
                    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
                            type="text/javascript"></script>
                    <!-- END CORE PLUGINS -->
                    <!-- BEGIN PAGE LEVEL PLUGINS -->
                    <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
                            type="text/javascript"></script>
                    <!-- END PAGE LEVEL PLUGINS -->
                    <!-- BEGIN THEME GLOBAL SCRIPTS -->


                    <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js"
                            type="text/javascript"></script>

                    <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js"
                            type="text/javascript"></script>

                    <script src="<?php echo base_url(); ?>assets/pages/scripts/components-select2.min.js"
                            type="text/javascript"></script>
                    <!-- END THEME GLOBAL SCRIPTS -->
                    <!-- BEGIN PAGE LEVEL SCRIPTS -->
                    <script src="<?php echo base_url(); ?>assets/pages/scripts/form-wizard.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/pages/scripts/form-repeater.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/pages/scripts/components-date-time-pickers.min.js"
                            type="text/javascript"></script>
                    <!-- END PAGE LEVEL SCRIPTS -->
                    <!-- BEGIN THEME LAYOUT SCRIPTS -->
                    <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js"
                            type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js"
                            type="text/javascript"></script>
                    <!-- END THEME LAYOUT SCRIPTS -->
                    <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
                    <!-- MAPA -->
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    

                    
                    
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
                    </script>
                    <script>
                        Dropzone.options.subir = {
                            url: "<?php echo base_url(); ?>docstramites/documentoclave/imagen",
                            autoProcessQueue: false,
                            uploadMultiple: true,
                            parallelUploads: 100,
                            maxFiles: 100,
                            acceptedFiles: "image/*",
                            init: function () {

                                var submitButton = document.querySelector("#submit-all");
                                var wrapperThis = this;
                                submitButton.addEventListener("click", function () {
                                    wrapperThis.processQueue();
                                });
                                this.on("removedfile", function (file) {
                                    $('#mensaje').removeClass("hidden");
                                });
                                this.on("addedfile", function (file) {
                                    $('#mensaje').addClass("hidden");
                                    // Create the remove button
                                    var removeButton = Dropzone.createElement("<button class='btn btn-md btn-danger'>Remover Archivo</button>");
                                    // Listen to the click event
                                    removeButton.addEventListener("click", function (e) {
                                        // Make sure the button click doesn't submit the form:
                                        e.preventDefault();
                                        e.stopPropagation();
                                        // Remove the file preview.
                                        wrapperThis.removeFile(file);
                                        // If you want to the delete the file on the server as well,
                                        // you can do the AJAX request here.
                                    });
                                    // Add the button to the file preview element.
                                    file.previewElement.appendChild(removeButton);
                                    $(".dz-success-mark").addClass("hidden"); //dz-error-mark
                                    $(".dz-error-mark").addClass("hidden"); //dz-error-mark
                                });
                                this.on("success", function (file, responseText) {
                                    alert(responseText);
                                });
                                this.on('sendingmultiple', function (data, xhr, formData) {
                                    formData.append("Username", $("#Username").val());
                                });
                            }
                        };
                    </script>
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
        <?php $this->load->view('base/footeradmin'); ?>
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->
    </div>
</div>
</body>
</html>