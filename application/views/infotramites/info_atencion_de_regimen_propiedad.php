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
      <meta charset="UTF-8">
      <!--[if IE]>
      <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
      <title> Trámites y Servicios </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      
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
                  <div class="col-md-6">
                    <br/>
                    <!--<img class="responsive-img left-align float-left" src="<?php /*echo $base_url */ ?>/resources/img/welcome_128.png" alt="">-->
                    <div id="page-title">
                        <h2><b>Régimen Propiedad Condominio</b></h2>
                        <h4>Dirección de Catastro</h4>
                    </div>
                    <hr/>
                    <div class="contenido text-justify">
                      <b>Objetivo del Trámite</b>
                      <br>
                      Validar los datos asentados en la memoria descriptiva, de régimen de propiedad en condominio.
                      <br><br>
                      <b>Usuarios</b>
                      <br>
                      Fraccionadores y/o peritos fiscales.
                      <br><br>
                      <b>Requisitos</b>

                      <ul>
                          <li>Oficio de solicitud en escrito libre firmado por el propietario o representante legal dirigido al Director de Catastro</li>
                          <li>Recibo del predial</li>
                          <li>Escrituras del terreno donde se desarrollará el régimen de propiedad en condominio</li>
                          <li>Oficio de traza autorizado por la Dirección de Ordenamiento Territorial (según sea el caso)</li>
                          <li>Planos autorizados por la dirección de Ordenamiento Territorial que son: de traza, arquitectónicos y plano general del condominio o conjunto condominal</li>
                          <li>Planos particulares correspondientes a cada una de las plantas</li>
                          <li>Memoria descriptiva del condominio</li>
                          <li>Credencial de elector del propietario o representante legal</li>
                          <li>Acreditación del representante legal mediante acta constitutiva o poder notarial</li>
                      </ul>


                      <div class="portlet box blue">
                          <div class="portlet-title">


                          </div>
                          <div class="portlet-body flip-scroll">
                            <table class="table table-bordered table-striped table-condensed flip-content">
                                <thead class="flip-content">
                                    <tr>
                                        <!-- <th width="20%"> Code </th>
                                        <th> Company </th>-->
                                        <th class="numeric"> Costo </th>
                                        <th class="numeric"> Tiempo de respuesta </th>
                                        <th class="numeric"> Vigencia del servicio</th>

                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td><?php foreach($dato->result() as $cost):?>
                                            <td><?php echo "Por la revisión de proyecto de memorias descriptivas para la construcción de régimen de propiedad en condominio $".$cost->costo_tram." por área privativa más $".$cost->costo_base." de base.";?></td>
                                            <?php endforeach;?>
                                            <?php if ($paso == 1): ?>
                                            <td rowspan="9" align="center">5 días hábiles </td>
                                            <td rowspan="9" align="center">No aplica </td>
                                            <?php $paso += 1; ?>
                                            <?php endif; ?>
                                        </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                      <br>
                      <b>Observaciones</b>
                      <br>

                      <p align="justify">
                      El cobro se ampara en el Art. 21, Disposiciones Administrativas de recaudación para el municipio de Irapuato, Guanajuato para el ejercicio fiscal <?php echo date('Y');?>.
                      <br>
                      <b>Fundamentos de Ley</b>
                      <br>

                      <br>Disposiciones Administrativas de recaudación para el municipio de Irapuato, Guanajuato Ley de Ingresos para el Municipio de Irapuato, Guanajuato Para el Ejercicio Fiscal <?php echo date('Y');?> (Art. 27 fracción IV).
                      <br><br>
                      <b>Fundamentos Reglamentarios</b>
                      <br>
                      Reglamento Orgánico de la Administración Pública del Municipio de Irapuato, Gto. Articulo 75, Reglamento de Peritos Fiscales Valuadores para el Municipio de Irapuato, Gto Artículo 7, 8 y 11.
                      <br> <br>

                      <br>
                      <b>Oficina donde también se puede realizar el trámite de manera presencial</b>
                      <br>
                      Dirección de Catastro
                      <br>
                      Alvaro Obregon 100 Zona Centro, 1 er piso, Irapuato, Gto.
                      <br>
                      Teléfono: 01(462) 6069999ext. 1565 y 1566
                      <br>
                      Horario: Lunes a viernes de 8:30 a.m. a 2:30 p.m.
                      <br>
                      Oficina resultora: Dirección de Catastro.

                      <br>
                      <br>
                      <a class="btn btn-info" target="_Blank" href="<?php echo base_url() ?>assets/AVISO_DE_CONFIDENCIALIDAD.pdf"><b>Aviso de Privacidad</b></a>
                    </div>
                    <!-- contenido -->
                  </div>
                  <div align="center"  class="col-md-6" id="paso1">
                      <?php if ($this->session->userdata("login")) { ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                    <!--definir los usaurios verificadores y administradores-->
                                    <?php if ($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 199) { ?>

                                    <?php } else { ?>
                                        <a class="btn btn-primary mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url() . "regimen_propieda_condominio/clave"; ?> ">
                                            <span class="ladda-label">Realizar Trámite&nbsp;&nbsp;<i class="icon-note"></i></span>
                                            <span class="ladda-spinner"></span></a>
                                    <?php } ?>


                                </div>
                               
                                <div class="col-md-12">
                                    <br>
                                    <a class="btn btn-primary mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href="<?php echo base_url() . "regimen_propieda_condominio"; ?>">
                                        <span class="ladda-label">Ver mis Trámites <i class="icon-book-open"></i></span>
                                        <span class="ladda-spinner"></span></a>
                                </div>

                                <?php if ($this->session->userdata('tipo') == 19): ?>
                                    <div class="col-md-12">
                                        <br>
                                        <a class="btn btn-success mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url(); ?>regimen_propieda_condominio/reportes ">
                                            <span class="ladda-label"> Reportes <i class="icon-book-open"></i></span>
                                            <span class="ladda-spinner"></span></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                       <form action="<?php echo base_url()."login";?>" method="post">
                        <b>Inicia Sesión para Realizar el Trámite</b>
                        <br>
                        <br>
                        <input name="redirec" type="hidden" value="/infotramites_regimen_propieda_condominio">
                        <button type="submit" class="btn btn-circle green-meadow">Iniciar Sesión <i class="icon-login"></i></button>
                   </form>
                    <?php } ?>
                  </div>
                <!-- col-md-12 -->
                </div>
            <!-- de row -->
            </div>
                  <!-- container -->
            <!-- ************FIN SECCION***************** -->
            <!-- END CONTAINER -->
        </div>

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
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script>

                        function iniciarAyuda() {

                            var enjoyhint_instance = new EnjoyHint({});
                            var enjoyhint_script_steps = [
                                {
                                    "next #ayuda": 'Atención de regimen de propiedad.<br> Para continuar con la ayuda del trámite <br>Presione "Siguiente".',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #paso1": '<br>Seleccione alguna acción.<br>Presione "Siguiente" para continuar..',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #solicitar": 'Presione el Botón "Solicitar trámite", aparecerá una notificación de trámite solicitado.<br>Presione "Finalizar" para concluir la ayuda.',
                                    "nextButton": {text: "Finalizar"},
                                    showSkip: false
                                }

                            ];
                            enjoyhint_instance.set(enjoyhint_script_steps);
                            enjoyhint_instance.run();
                        }
        </script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
</body>

</html>
