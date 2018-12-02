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
<html lang="es"  >
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Universal Irapuato</title>
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
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />


        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
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
        <link href="<?php echo base_url(); ?>assets/global/css/enjoyhint.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <style>
            label{
                font-size: 12pt;
            }
            h4{
                font-size: 18pt;
            }
            h5{
                font-size: 14pt;
            }
        </style>
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
            $modificar = "";
            if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3):
                ?>
                <div class="btnRegresar hidden-xs hidden-xm">

                    <a class="btn btn-app btn-primary btn-xs" id="ayuda" style=" position: fixed; background: #FD9709; " onclick="iniciarAyuda()">
                        <span>
                            Ayuda
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                        </span>
                    </a>

                </div>

                <?php
                $modificar = "";
            else:
                $modificar = "readonly";
            endif;
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
                                        <h1>Permiso de Anuncios Autosoportados</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container-fluid">
                                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                        <div class="row" id="paso0" >

                                            <div class="form-group col-md-12">
                                                <h4>El trámite es para renovación de anuncio:<br> <?php echo $renovacion != 0 ? "SI" : "NO"; ?></h4>
                                            </div>        
                                        </div>
                                        <div class="row" id="paso1" >
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <h3>Datos Generales</h3>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Nombre Propietario de Inmueble :<br><?php echo $nombrepropietarioinmuebledg; ?></label>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Nombre Propietario del Anuncio :<br><?php echo $nombrepropietarioanunciodg; ?></label>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="varchar">Calle :<br><?php echo $nombrepropietarioanunciodg; ?></label>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número :<br><?php echo $numerodg; ?></label>

                                                </div>


                                                <input  type="hidden" name="clavecat" id="clavecat"  value="<?php echo $clavecat; ?>" />

                                            </div>
                                        </div>
                                        <div class="row" id="paso2">
                                            <div class="form-group">

                                                <div class="form-group col-md-2">
                                                    <label for="varchar">Colonia :<br>
                                                        <?php
                                                        if (!empty($coloniadg)):
                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($coloniadg);
                                                            ?>

                                                            <?php echo $arraycolonia->NOMBRE; ?>

                                                        <?php endif; ?>
                                                    </label>


                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="varchar">Correo Electrónico :<br><?php echo $correodg != "" ? $correodg : $this->session->userdata('correo'); ?></label>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Teléfono :<br><?php echo $telefonodg != "" ? $telefonodg : $this->session->userdata('telefono'); ?></label>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="row" id="paso3">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <h3>Datos del Inmueble</h3>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="varchar">Calle :<br><?php echo $calleui; ?></label>

                                                </div>



                                                <div class="form-group col-md-2">
                                                    <label for="varchar">Número Oficial :<br><?php echo $nooficialui; ?></label>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="int">Colonia :<br>
                                                        <?php
                                                        if (!empty($cbocoloniaui)):
                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>

                                                            <?php echo $arraycolonia->NOMBRE; ?>

                                                        <?php endif; ?>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso4">
                                            <div class="form-group">


                                                <div class="form-group col-md-3">
                                                    <label for="double">Superficie del Predio m<sup>2</sup> :<br><?php echo $superficiepredioui; ?></label>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="double">Superficie Construida m<sup>2</sup>* : <br> <?php echo $superficieconstruidaui; ?></label>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="int">Número de Niveles :<br><?php echo $nonivelesui; ?></label>

                                                </div>
                                                <?php if (!empty($mapa)) { ?>
                                                    <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                                <?php } else { ?>
                                                    <input id="address" type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                                <?php } ?>
                                            </div>
                                        </div>  
                                        <div class="row" id="paso5">
                                            <div class="form-group">

                                                <div class="form-group col-md-12">
                                                    <h3>Datos del Anuncio</h3>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="double"> Cantidad de Carteleras : <br><?php echo $carteleras; ?></label>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="double">Altura Máxima mts <br>(Desde nivel de piso) : <?php echo $altura; ?></label>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="double">Total m<sup>2</sup> del anuncio: <br><?php echo $poliza; ?></label>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="double">Anuncio Referente a (Indique el tema del anuncio): <br><?php echo $referente; ?></label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso6">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <label for="double">Dimensiones de las carteleras :</label>
                                                    <p><?php echo $dimenciones; ?></p>
                                                </div>


                                            </div>
                                        </div>
                                        <?php
                                        $file = "assets/tramites/permisosanunciosautosoportados/" . $doctofinal;
//                                       echo $file;
                                        if (file_exists($file) && $doctofinal != "") {
                                            ?>
                                            <div class="row">     
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <iframe  class="center" src="<?php echo base_url() . "assets/tramites/permisosanunciosautosoportados/" . $doctofinal; ?>" width="100%" height="800" frameborder="2"></iframe>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>


<?php } else { ?>
                                            <div class="row">     
                                                <div class="col-md-12 center-align">
                                                    <h4 style="text-align: center;">
                                                        Archivo Final No Encontrado.
                                                    </h4>
                                                </div>
                                            </div>

<?php } ?>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Observaciones</label>
                                                <textarea id="obs" class="form-control" rows="5" name="observaciones"><?php echo $observaciones;?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <button type="submit" id="paso10" class="btn btn-success"><?php echo $button ?></button>
                                                <a  type="" data-loading-text="Enviando..." id="envob" class="btn btn-primary"><i id="loader" class=""></i> Enviar Observaciones</a>
                                                <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) { ?>
                                                    <a href="<?php echo base_url(); ?>permiso_anuncios/autorizacion" class="btn btn-danger">Regresar</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_autosoportados_azoteas" class="btn btn-primary">Regresar</a>
<?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CONTENT -->
                            </div>
                            <!-- END CONTAINER -->
                        </div>
                    </div>
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

            <div class="quick-nav-overlay">
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->


        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/js/permisoanuncios/permisoanuncios.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/underscore-min.js" type="text/javascript"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>

        <script type="text/javascript">
                    $(document).ready(function () {
                        setTimeout(function () {
                            $('#address').val($("#calleui").val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                            initMap();
                        }, 100);
                        moment().locale('es');
                    });
                    function initMap() {
                        //setTimeout("initMap()",10000);
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 17,
                            center: {lat: 20.6767222, lng: -101.3681677}
                        });
                        var geocoder = new google.maps.Geocoder();
                        var noPoi = [{featureType: "poi", stylers: [{visibility: "off"}]}];
                        map.setOptions({styles: noPoi});
                        geocodeAddress(geocoder, map);
                    }
                    function geocodeAddress(geocoder, resultsMap) {
                        var address = document.getElementById('address').value;
                        geocoder.geocode({'address': address}, function (results, status) {
                            if (status === 'OK') {
                                resultsMap.setCenter(results[0].geometry.location);
                                var marker = new google.maps.Marker({
                                    map: resultsMap,
                                    draggable: true,
                                    position: results[0].geometry.location
                                });
                                //document.getElementById("address").value = results[0].geometry.location;
                                resultsMap.addListener('mousemove', function () {
                                    document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
                                });
                            } else {

                            }
                        });
                    }


                    $('#parpadear').css("color", "blue");
                    var dato = $('#divestatus').val();
                    if (dato == 4 || dato == 6) {
                        $("#hiddendoctopago").show();
                    } else {
                        $("#hiddendoctopago").hide();
                    }

                    if (dato == 6) {
                        $("#hiddendoctofinal").show();
                    } else {
                        $("#hiddendoctofinal").hide();
                    }

                    $("#status").change(function () {
                        //alert("HOLA");
                        var dato = $('select[id=status]').val();
                        if (dato == 4) {
                            $("#hiddendoctopago").show();
                        } else {
                            $("#hiddendoctopago").hide();
                        }

                        if (dato == 6) {
                            $("#hiddendoctopago").show();
                            $("#hiddendoctofinal").show();
                        } else {
                            $("#hiddendoctofinal").hide();
                        }

                    });
                    $('#calleui').keyup(function () {
                        //geocodeAddress(geocoder, map);
                        //nooficial
                        $('#address').val($("#calleui").val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                        $('#address').val($("#calleui").val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                        initMap();
                        //calleui
                    });
                    $('#nooficialui').keyup(function () {
                        //geocodeAddress(geocoder, map);
                        //nooficial
                        $('#address').val($("#calleui").val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                        initMap();
                        //calleui
                    });
                    function parpa() {
                        $('#parpadear').fadeIn(250).delay(250).fadeOut(250, parpa)
                        setTimeout("$('#parpadear').stop(true,true).css('opacity',1)", 200000);
                    }

                    $('#envob').click(function () {
                        $('#loader').addClass('fa fa-spinner fa-spin');
                        var obs = $('#obs').val();
                       

// Enable #x

                        $.ajax({
                            url: "<?php echo base_url('permiso_anuncios/observaciones/' . $ID); ?>",
                            type: "POST",
                            dataType: "json",
                            data: {

                                obs: "" + obs,

                            },
                            success: function (respuesta) {
                                try {
                                    if (respuesta) {
                                        
                                        setTimeout( function(){
                                            $('#loader').removeClass('fa fa-spinner fa-spin');
                                       
                                        window.location.href = "<?php echo base_url('permiso_anuncios/autorizacion') ?>";
                                       } ,100);
                                  }
                                } catch (e) {
                                    alert(e);
                                    $("#envob").prop("disabled", false);
                                    $('#loader').removeClass('fa fa-spinner fa-spin');
                                }
                            }
                        });

                    });


        </script>


    </body>
</html>