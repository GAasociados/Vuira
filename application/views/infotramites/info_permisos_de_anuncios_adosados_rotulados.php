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
<button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
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
                        <h1 class="title-hero"><b>Dirección General de Desarrollo Territorial </b></h1>
                        <h3 class="title-hero">Permiso de Anuncios Adosados y/o Rotulados </h3>
                    </div>
                    <hr/>
                    <div class="contenido text-justify">
                        <h4><b>Objetivo del Trámite</b></h4>
                      Obtener el Permiso de Anuncios para publicitar comercios y servicios.
                      <br><br>
                        <h4><b>Usuarios</b></h4>
                      Ciudadanía en general.
                      <br><br>
                        <h4><b>Requisitos</b></h4>

                      Para anuncios adosados y/o rotulados presentar:
                      <ul>
                          <li>Formato de solicitud suscrito por el (los) propietario (s) del inmueble y del solicitante.</li>
                          <li>Identificación Oficial del (los) Propietario (s)</li>
                          <li>Documento legal que acredite la propiedad inscrito en el Registro Público de la Propiedad de este Partido Judicial</li>
                          <li>Dictamen de Alineamiento y Número Oficial emitido por la Dirección de Fraccionamientos</li>
                          <li>Permiso de Uso de Suelo vigente</li>
                          <li>Propuesta de diseño del anuncio con dimensiones y materiales a utilizar </li>
                          <li>Reporte Fotográfico</li>
                      </ul>

                      <h4><b>Observaciones</b></h4>
                      <?php
                                    $paso = 0;
                                    foreach ($dato->result() as $cost):
                                        ?>
                                        <tr>
                                            <td><?php
                                                if ($cost->tipo != 4) {
                                                    echo $cost->descripcion . " $" . $cost->costo_tram . " por m². ";
                                                } else {
                                                    echo $cost->descripcion . " $" . $cost->costo_tram . "";
                                                }
                                                ?> </td>
                                            <?php if ($paso == 0): ?>
                                                <td rowspan="9" align="center">5 días hábiles </td>

                                                <td rowspan="9" align="center">1 año </td>
                                                <?php $paso += 1; ?>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    <li>Tiempo de respuesta: 5 días hábiles </li>
                                    <li>Vigencia del servicio: 1 año </li>
                                    <br>


                      <p align="justify">1- Cuando se trate de persona moral presentar copia del acta constitutiva inscrita en el Registro Público de la Propiedad de este Partido Judicial, así como documento legal que acredite la personalidad jurídica del representante legal y copia de su identificación oficial.
                          <br><br>
                          2- El proyecto solicitado deberá cumplir con lo dispuesto en las Normas Complementarias de Presentación de los Proyectos Ejecutivos para el Proyecto Arquitectónico, de Seguridad y Medidas de Protección durante el proceso constructivo para Anuncios y para la participación de peritos corresponsables, así como la normativa aplicable relacionada con la accesibilidad de las personas con capacidades diferentes.
                          <br><br>
                          3- En caso de que el inmueble esté arrendado, presentar contrato de arrendamiento vigente e identificación oficial del arrendador (propietario) y arrendatario (inquilino) así como el documento legal que acredite la propiedad.
                      </p>
                          <br>
                      <h4><b>Fundamentos de Ley</b></h4>
                      Código Territorial para el Estado y los Municipios de Guanajuato, Ley de Ingresos para el municipio de Irapuato Guanajuato para el ejercicio fiscal del año <?php echo date('Y');?> Art. 29 fracc. I y II.
                      <br>

                        <br>
                        <h1 class="title-hero"><b>Lugar donde se Realiza</b></h1>
                        <h4><b>Oficina receptora donde también se puede realizar el trámite de manera presencial:</b></h4>
                        <p>Dirección General de Desarrollo Territorial</p>
                        <br>
                        <h4><b>Domicilio:</b></h4>
                        <p>Blvd. Solidaridad Núm. 8350, Col. Lázaro Cárdenas. Desarrollo Siglo XXI. Irapuato, Gto.
                            <br>
                            Teléfono: 01 (462) 635 88 00</p>
                        <br>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="contenido text-justify">

                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233.3156394288711!2d-101.32904825064702!3d20.667535319213837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842c8088fbd95bbf%3A0x312c0544fcdad990!2sDireccion+General+de+Ordenamiento+Territorial+Irapuato!5e0!3m2!1ses-419!2smx!4v1535921585035" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h2 class="title-hero"><b>Horario de atención</b></h2>
                        <p>Lunes a Viernes de 8:00 a.m. a 15:30 p.m.</p>
                                <br>
<a data-toggle="modal" data-target="#modal-aviso-privacidad" class="btn btn-border btn-alt  border-blue btn-link font-blue" href="#" title="" id="link-aviso-privacidad"><span>Aviso de Privacidad</span></a>





<div id="modal-aviso-privacidad" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Condiciones legales y política de privacidad</h4>
            </div>

            <div class="modal-body">

                <div class="content-box border-top border-red">
                    <h3 class="content-box-header clearfix" align="center">
                      AVISO DE CONFIDENCIALIDAD PARA EL TRATAMIENTO DE DATOS PERSONALES RECABADOS POR LA ADMINISTRACIÓN MUNICIPAL DE IRAPUATO, GTO.
                    </h3>
                    <div class="content-box-wrapper scrollable-content">

                        <div class="divider"></div>
                        <center>
                            <h3>SISTEMA DE APERTURA RÁPIDA DE EMPRESAS</h3>
                        </center>
                        <div class="divider"></div>
                        <p align="justify">
                          La <b>ADMINISTRACIÓN  MUNICIPAL  DE IRAPUATO,  GTO.,</b> con  Domicilio  en Palacio Municipal  S/N  sito  en  Jardín  Principal,
                          Zona  Centro,  ciudad  Irapuato,  Municipio o delegación  Irapuato  C.P.  36500, en  la  entidad  de  Guanajuato,  país  México,  y  portal  de
                          Internet www.irapuato.gob.mx , de conformidad con los artículos 7 fracción X, 25 fracción VI y  27  fracción  III de  la
                          LEY  DE  TRANSPARENCIA  Y  ACCESO  A  LA  INFORMACIÓN PÚBLICA   PARA   EL  ESTADO   DE  GUANAJUATO y   en  materia   de
                          protección   de información  confidencial  y  reservada,  que  deberán  observar  los  sujetos  obligados,  se emite  el  siguiente
                          aviso  de  confidencialidad,  por  medio  del  cual  se  da  a  conocer  la
                          utilización,  procesos,  modificaciones  y  transmisiones  de  que  sea  objeto  la  información confidencial en posesión de est
                          a Administración Municipal, la cual es responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente:
                          Los  datos  que  se  recabarán  y  son  objeto  de  tratamiento,  corresponden a: Nombre, Domicilio,  Colonia,  Ciudad,  Código  Postal,
                          Identificación  Oficial, Registro  Federal  de Contribuyentes,  Número  Telefónico  o  Número  Celular, Correo  Electrónico
                          y  demás documentos que el trámite especifico solicite para su realización.
                          Los  datos  personales  que  recabamos  de  usted,  los  utilizaremos  para  las  siguientes finalidades que son necesarias para el servicio
                          o trámite que solicita: <br>
                          1.Generar un registro de Usuarios <br>
                          2.Dar el servicio de atención al trámite solicitado  <br>
                          Manifestándole que se considera información confidencial los datos personales concernientes a una persona identificada o identificable
                          , entre otros contemplados por el artículo 77 de la LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE GUANAJUATO.
                          Asimismo,  se  le  informa  que  para  la  transferencia  a  terceros  de  sus  datos  personales
                          necesariamente será requerida su autorización, en tal supuesto, se le buscará a efecto de
                          gestionar tal autorización previa justificación de la necesidad de transferencia, resaltando que sin ésta, no se darán actos de transmisión.
                          No obstante, se le informa que en los casos de excepción previstos por el artículo 75 de la LEY  DE  TRANSPARENCIA  Y  ACCESO  A  LA  INFORMACIÓN  PÚBLICA
                          PARA  EL ESTADO DE GUANAJUATO Serán transmitidos los datos sin requerir su autorización. <br>
                          Como  titular  de  información  confidencial  tiene  derecho  a Acceder,  Rectificar,  Cancelar, Oposición  es el  derecho  conocido  como ARCO
                          sus datos de  información  confidencial  en posesión de este sujeto obligado, no obstante, se le debe señalar que para el tratamiento
                          de  sus  datos  personales,  es  importante  que  tenga  en  cuenta  que  no  en  todos  los  casos podremos atender una solicitud para concluir el uso de
                          forma inmediata, ya que es posible que  por  alguna  obligación   legal  requiramos  seguir  tratando  sus  datos  personales.
                          Asimismo,   usted   deberá   considerar   que   para   ciertos   fines,   la   revocación   de   su
                          consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó.
                          Con  objeto   de   poder   limitar   el   uso  y   divulgación   de   su   información  personal,   le
                          comentamos  las  políticas  internas  y  buenas  prácticas conforme  a  la  Ley  emitida  por  el
                          Instituto de Acceso a la Información Pública del Estado de Guanajuato sobre la protección de información confidencial y reservada. <br>
                          El   presente   aviso   de   confidencialidad   puede   sufrir   modificaciones,   cambios   o
                          actualizaciones   derivadas   de   nuevos   requerimientos   legales;   de   nuestras   propias necesidades  por  mejorar
                          los  procedimientos  y  nuestras  prácticas  de  privacidad,  o  por otras causas.
                          De  igual  forma,  le  informamos  que  la  información  confidencial  que  este  sujeto  obligado
                          capta  por  transferencia  de  otros  sujetos obligados,  o  bien,  por  el  uso  de mecanismos en medios remotos o locales de
                          comunicación electrónica, óptica u otra tecnología, recibe el mismo trato que la presentada de forma presencial o física en nuestras
                          instalaciones ante las distintas ventanillas de atención, así como nuestra página web www.irapuato.gob.mx.
                          Asimismo, le informamos que su información personal será compartida con las siguientespersonas, empresas, organizaciones o autoridades distintas a
                          nosotros: el destinatario de los datos  personales  es  el  Instituto  de  Acceso a  la  Información  Pública  del  Estado  de
                          Guanajuato  (IACIP) con  la  finalidad  decumplir  con  los  lineamientos  del  instituto  para obtener estadísticas.
                          Nos  comprometemos  a  mantenerlo  informado  sobre  los  cambios  que pueda  sufrir  la presente,  a  través  de  nuestra  página  web
                          www.irapuato.gob.mx, manifestando  que la Administración   Municipal,   está   obligada a   conducirse   con   verdad   respecto   a   la
                          información confidencial que se entrega y recibe.
                        </p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
                    </div>
                    
                    <!-- contenido -->
                  </div>
                  <div align="center"  class="col-md-6" id="paso1">
                      <!-- Botones Flotantes --><div class="button-group">
      <?php if ($this->session->userdata("login")) { ?>
                          <div class="">
                              <div class="">
                                  <div class="col-md-12">
                                      <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122 || $this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166) { ?>

                                      <?php } else { ?>
                                          <a class="btn btn-success mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url('/permiso_anuncios_adosados/clave'); ?> ">
                                              <span class="ladda-label"><i class="glyph-icon icon-play"></i>Realizar Trámite&nbsp;&nbsp;</span>
                                              <span class="ladda-spinner"></span>
                                          </a>
                                      <?php } ?>


                                  </div>
                                  <br>
                                  <?php if($this->session->userdata('tipo')== 12 && $this->session->userdata('admin')==1):?>
                                       <div class="col-md-12">
                                      <br>
                                      <a class="btn btn-info mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url('/permiso_anuncios_adosados/asignacion'); ?> ">
                                          <span class="ladda-label"><i class="glyph-icon icon-eye"></i>Ver Tramites a Asignar</span>
                                          <span class="ladda-spinner"></span></a>
                                  </div>
                                   <div class="col-md-12">
                                      <br>
                                      <a class="btn btn-info mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url('/permiso_anuncios_adosados/autorizacion'); ?> ">
                                          <span class="ladda-label"><i class="glyph-icon icon-eye"></i>Ver Trámites a Autorizar</span>
                                          <span class="ladda-spinner"></span></a>
                                  </div>
                                          <?php else:?>
                             
                                  <div class="col-md-12">
                                      <br>
                                      <button class="btn btn-info glyph-icon icon-eye" onclick="window.location.href='<?php echo base_url('/permiso_anuncios_adosados/'); ?>'">Ver mis Trámites</button>
<!--                                      <a class="btn btn-primary mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url('/permiso_anuncios_adosados/'); ?> ">
                                          <span class="ladda-label">Ver mis Trámites <i class="icon-book-open"></i></span>
                                          <span class="ladda-spinner"></span></a>-->
                                  </div>

                                  <?php endif;?>


                                  <?php if ($this->session->userdata('tipo') == 12): ?>
                                      <div class="col-md-12">
                                          <br>
                                          <a class="btn btn-info mt-ladda-btn ladda-button btn-circle" data-style="expand-right" href=" <?php echo base_url(); ?>permiso_anuncios_adosados/reportes ">
                                              <span class="ladda-label"> <i class="glyph-icon icon-bar-chart"></i>Reportes </span>
                                              <span class="ladda-spinner"></span></a>
                                      </div>
                                  <?php endif; ?>

                              </div>
                          </div>
                      <?php } else { ?>
                          <form action="<?php echo base_url() . "login"; ?>" method="post">
                              <b>Inicia Sesión para Realizar el Trámite</b>
                              <br>
                              <br>
                              <input name="redirec" type="hidden" value="/infotramites/Info_permisos_de_anuncios_adosados_rotulados">
                              <button type="submit" class="btn btn-circle green-meadow">Iniciar Sesión <i class="icon-login"></i></button>
                          </form>
                      <?php } ?>
</div><!-- Botones Flotantes -->
                
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

<script>

                        function iniciarAyuda() {

                            var enjoyhint_instance = new EnjoyHint({});
                            var enjoyhint_script_steps = [
                                {
                                    "next #ayuda": 'Permiso de anuncios adosados.<br> Para continuar con la ayuda del trámite <br>Presione "Siguiente".',
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
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
