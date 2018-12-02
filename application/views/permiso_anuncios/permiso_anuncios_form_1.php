<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">

        <title> Tramites y Servicios </title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!--#region CSS  -->
          <?php $this->load->view('base/admin'); ?>
        <style>
              .btnAyuda{ 
        border-radius: 50px 0px 0px 50px; 
        right: 0px; 
    }
    .btnAyudaForm{border-radius: 50px 0px 0px 50px;                       
    right: 0px;                       
    position: fixed;                       
    bottom: 150px;                       
    z-index: 10;                     
    }
        </style>
    </head>


    <body>
        <!-- <div id="sb-site"> -->
        <div id="baseUrl" base-url=""></div>
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- FIN loading -->

        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                <div id="mobile-navigation">
                    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar">
                        <span></span>
                    </button>
                    <a href="" class="logo-content-small" title="SIPREG"></a>
                </div>
                <div id="header-logo" class="logo-bg">
                    <a href="" class="logo-content-big" title="SIPREG">
                        SIPREG
                        <span>Sistema Integral de Planeación de Recursos Gubernamentales</span>
                    </a>
                    <a href="" class="logo-content-small" title="SIPREG">
                        SIPREG
                        <span>Sistema Integral de Planeación de Recursos Gubernamentales</span>
                    </a>
                    <a id="close-sidebar" href="#" title="Close sidebar">
                        <i class="glyph-icon icon-angle-left"></i>
                    </a>
                </div>


                <!-- #header-nav-right -->

                <div id="header-nav-right">
                    <div class=" dropdown user-account-btnn">
                        <a href="#" title="Soy Administrador" class="user-profile " data-toggle="dropdown">
                            <img width="28" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/image-resources/gravatar.jpg" alt="Administrador">
                        </a>
                        <div class="dropdown-menu ">
                            <div class="box-sm">
                                <div class="login-box clearfix">
                                    <div class="user-img">
                                        <a href="#" title="" class="change-img">Cambiar foto</a>
                                        <img src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/image-resources/gravatar.jpg" alt="">
                                    </div>
                                    <div class="user-info">
                                        <span>
                                            Soy Administrador
                                            <i>DTI Desarrollador</i>
                                        </span>
                                        <a href="#" title="Editar perfíl">Perfíl</a>
                                        <a href="#" title="Ver Notificaciones">Notificaciones</a>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="pad5A button-pane button-pane-alt text-center">
                                    <a href="logout/" class="btn display-block font-normal btn-danger">
                                        <i class="glyph-icon icon-power-off"></i>
                                        Salir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="hdr-btn iconos" id="fullscreen-btn" title="Pantalla completa">
                        <i class="glyph-icon icon-arrows-alt"></i>
                    </a>

                    <a class="header-btn iconos" id="logout-btn"href="logout/" title="Bloquear">
                        <i class="glyph-icon icon-linecons-lock"></i>
                    </a>

                </div>
                <!-- #header-nav-right -->

            </div>
        </div>
        <!-- FIN page-wrapper -->
        <!--#region Menú  -->
        <div id="page-sidebar">
            <div class="scroll-sidebar">
                <div class="scroll-sidebar">
                <ul id="sidebar-menu">
                    <li class="header">
                        <span>TRAMITES</span>
                    </li>
                    <li>
                    <li>
                        <a href="/permiso_anuncios/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Asignar Anuncio Autosoportados</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/permiso_anuncios/autorizacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Autorizar Anuncio Autosoportados</h6></span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="/permiso_anuncios_adosados/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Asignar Anuncio Adosado</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/permiso_anuncios_adosados/autorizacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Autorizar Anuncio Adosado</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/ocupacion_de_construccion/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Asignar Aviso Obra</h6></span>
                        </a>
                    </li>
                      <li>
                    <li>
                        <a href="/ocupacion_de_construccion/autorizacion">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Autorizar Aviso Obra</h6></span>
                        </a>
                    </li>
                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/permiso_anuncios/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes Anuncio Autosoportados</h6></span>
                        </a>
                        <li>
                        <a class="sf-with-ul" href="/permiso_anuncios_adosados/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes Anuncio Adosado</h6></span>
                        </a>
                        <li>
                        <a class="sf-with-ul" href="/ocupacion_de_construccion/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes Aviso Obra</h6></span>
                        </a>
          
                     
                        <div class="sidebar-submenu">
                            <ul >
                                <li style="display: block">
                                    <span>Constancias</span>
                                </li>
                                <li style="display: block">
                                    <a href=""><span>Constancia de Propiedad</span></a>
                                </li>
                                <li style="display: block" class="header">
                                    <span>Catalogos</span>
                                </li>
                                <li style="display: block">
                                    <a href="" title="Cuota minima"><span>Cuota minima</span></a>
                                </li>


                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
            </div>
        </div>
        <!--#endregion Menú  -->
         
   
        
        <!-- FIN page-sidebar -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                      <?php
            $modificar = "";
            if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3):
                ?>
                <div class="btnRegresar hidden-xs hidden-xm">

                     <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>

                </div>

                <?php
                $modificar = "";
            else:
                $modificar = "readonly";
            endif;
            ?>
                        <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
                    <h2>Permiso de Anuncios Autosoportados</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                            <!--											    <button class="btn btn-success float" title="Guardar Cuenta" id="btnGuardarCtaSuspendida">
                                                                                                                          Guardar Trámite
                                                                                                                             <i class="glyph-icon icon-save"></i> 
                                                                                                                        </button>-->
                            <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                <!--											      <div id="panel-fecha_recep" class="content-box border-top border-blue">
                                                                                                                                <div class="content-box-wrapper">
                                                                                                                                  <div class="row">
                                                                                                </div>-->


                                <div id="panel-renovacion" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">I. ¿El trámite es para renovación de anuncio?</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                             <div class="row" id="paso0" >

                                            <div class="form-group col-md-12">
                                                <h4><?php echo $renovacion != 0 ? "SI" : "NO"; ?></h4>
                                            </div>        
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-RENOVACION 1-->

                                <div id="panel-datos-generales" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">II. DATOS GENERALES</h3>
                                        <div class="bordered-row">
                                               <div class="row">
                                           <div class="row" id="paso1" >
                                            <div class="form-group">
                                              
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
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-DATOS-GENERALES 1-->


                                <div class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">III. UBICACIÓN DEL HINMUEBLE</h3>
                                        <div class="bordered-row">
                                               <div class="row">
                                       <div class="row" id="paso3">
                                            <div class="form-group">
                                            
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
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- DIV DATOS DEL PROPIETARIO -->

                                <div id="panel-expediente" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">IV. DATOS DEL ANUNCIO</h3>
                                           <div class="row" id="paso5">
                                            <div class="form-group">


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
                                    </div>
                                </div><!-- DIV DATOS DEL ANUNCIO -->


                                <div id="panel-expediente" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero"></h3>
                                           <div class="row">
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
                                                <button type="submit" id="paso10" class="btn btn-success glyph-icon icon-check"><?php echo $button ?></button>
                                                <a  type="" data-loading-text="Enviando..." id="envob" class="btn btn-warning glyph-icon icon-pencil"><i id="loader" class=""></i> Enviar Observaciones</a>
                                                <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) { ?>
                                                    <a href="<?php echo base_url(); ?>permiso_anuncios/autorizacion" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_autosoportados_azoteas" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
<?php } ?>
                                            </div>
                                        </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- page-content -->


                <?php $this->load->view('base/footeradmin'); ?>
            <!-- Footer -->
        </div>
        <!-- page-content-wrapper -->
  
    <!-- FIN sb-site -->
</body>




<script type="text/javascript">var base_url = "";</script>

<!-- SELECT CHOSEN-->
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/chosen/chosen.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/chosen/chosen.js"></script>
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/chosen/chosen-demo.js"></script>

<!-- INPUT SWITCH -->
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/theme-switcher/themeswitcher.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/input-switch/inputswitch.js"></script>



<!-- DATEPICKER -->
<link rel="stylesheet" type="text/css" href="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/datepicker/datepicker.css">
<script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/datepicker/datepicker.js"></script>

<script>
    $(function ()
    {
        "use strict";
        $('.input-switch').bootstrapSwitch();
        $("#date").bsdatepicker();
    });
</script>
<!-- Codigo -->
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
</html> 