<?php
//       die(print_r($datos['costo'],true));
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
  <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()" > 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
            <div class="clearfix"></div>
            <div id="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="page-title">
                                <h1 class="title-hero"><b>Dirección de Catastro </b></h1>
                                <h3 class="title-hero">Asignación y Certificación de Claves Catastrales (Individual)</h3>
                            </div>
                            <hr/>
                            <div class="contenido text-justify">
                                <h4><b>Objetivo del Trámite</b></h4>
                                <p>Generar un Código de Identificación de cada uno de los inmuebles inscritos ante el Municipio</p>
                                <br>
                                <h4><b>Usuarios</b></h4>
                                <p>Público en general</p>
                                <br>
                                <h4><b>Requisitos</b></h4>
                                <ul>
                                    <p><li>Documento público que acredite la propiedad</li>
                                    <li>Recibo del predial (actualizado)</li>
                                    <li>Identificación (INE, Pasaporte, Cédula Profesional) del propietario y/o representante legal</li></ul></p>
                                </ul>


                                <h4><b>Observaciones</b></h4>
                                <p>Costo: por expedición de clave catastral $<?php echo $costo[0]->costo_tram; ?> por predio + $<?php echo $costo[0]->costo_base; ?> base = $<?php echo $costo[0]->costo_tram + $costo[0]->costo_base ?>, por certificación de clave catastral $<?php echo $costo[1]->costo_tram; ?></p>
                                <br>
                                <h4><b>Fundamentos de Ley</b></h4>
                                <p>Constitución Política de los Estados Unidos Mexicanos, Artículo 8.
                                <br>
                                Constitución Política para el Estado de Guanajuato, Artículo 2.
                                <br>
                                Ley de Ingresos para el Municipio de Irapuato, Guanajuato. para el Ejercicio Fiscal 2018; Artículo 27 inciso VIII.
                                <br>  Ley de Hacienda para los Municipios del Estado de Guanajuato
                                <br>
                                Código Territorial para el Estado y los Municipios de Guanajuato
                                <br>Norma Técnica de la Ley del Sistema Nacional de Información Estadística y Geográfica 
                                    <br>Normas Técnicas de Zonificación</p>

                                <br>
                                <h4><b>Fundamentos Reglamentarios</b></h4>
                                <p>Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, Artículo 75.</p>

                                <br>
                                <h1 class="title-hero"><b>Lugar donde se Realiza</b></h1>
                                <h4><b>Oficina receptora donde también se puede realizar el trámite de manera presencial:</b></h4>
                                <p>Dirección de Catastro</p>
                                <br>
                                <h4><b>Domicilio:</b></h4>
                                <p>Álvaro Obregón #100 Zona Centro, 1er Piso, Irapuato, Gto.
                                <br>
                                Teléfono: 01 462 6069999 ext. 1568 y 1566</p>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="contenido text-justify">

                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233.30869155150785!2d-101.34558061353005!3d20.672057932738184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842c7fd504acb8df%3A0x6b9974b6e27e6a7d!2sCentro+de+Gobierno!5e0!3m2!1ses-419!2smx!4v1535917525825" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h2 class="title-hero"><b>Horario de atención</b></h2>
                                <p>Lunes a Viernes de 8:00 a.m. a 14:30 p.m.</p>
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
                          actualizaciones   derivadas   de   nusZUQbHevos   requerimientos   legales;   de   nuestras   propias necesidades  por  mejorar
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
                        </div>
                        <div align="center"  class="col-md-6"  id="paso1">
                            <?php if ($this->session->userdata("login")) { ?>
                              <!-- Botones Flotantes --><div class="button-group example3" >
<div class="">
                                    <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a class="btn btn-success" href="<?php echo base_url('claves_catastrales_individual/create'); ?>">
                                                    <i class="glyph-icon icon-check-square-o"></i> Realizar Trámite
                                                </a>
                                            </div>
                                        </div> 
           
                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="javascript:;" data-toggle="dropdown">
                                                    <i class="glyph-icon icon-eye"></i> Ver Mis Trámites
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?php echo base_url('claves_catastrales_individual/'); ?>" href="javascript:;">
                                                            <i class="icon-book-open"></i> Escritura Pública</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url('claves_catastrales_individual_cetificado/'); ?>" href="javascript:;">
                                                            <i class="icon-book-open"></i> Certificado Parcelario, Título de <br> Propiedad o Sentencia Jurídica</a>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Menu Funcionario -->
                                    <?php if (($this->session->userdata('tipo') == 15 && $this->session->userdata('admin') == 0) || $this->session->userdata('id') == 183): ?>
                                        
                                    <!-- Botones Flotantes --><div class="button-group example3">
                                        <?php if ($this->session->userdata('tipo') == 15 && $this->session->userdata('admin') == 0): ?>
                                        <div class="form-group col-md-12">                                            
                                            <div class="dropdown">
                                                <a class="btn btn-success" href="<?php echo base_url('claves_catastrales_individual/create_ventanilla'); ?>">
                                                    <i class="glyph-icon icon-play"></i> Realizar Trámite
                                                </a>
                                            </div>
                                        </div> 
                                        
                                          <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a  class="btn btn-info" href="<?php echo base_url('claves_catastrales_individual/ventanilla'); ?>" >
                                                    <i class="glyph-icon icon-eye"></i> Ver Generados en Ventanilla
                                                </a>
                                            </div>
                                        </div>
                                         <?php endif; ?>
                                         <?php if (($this->session->userdata('tipo') == 15 && $this->session->userdata('admin') == 0) || $this->session->userdata('id') == 183): ?>
                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a  href="<?php echo base_url('claves_catastrales_individual/'); ?>" class="btn btn-info btn-circle" >
                                                    <i class="glyph-icon icon-eye"></i> Ver Solicitudes de Trámites <span id="notificacion" class="badge badge-danger" style=" background-color:red; color: black;"></span>
                                                </a>
                                            </div>
                                        </div>
                                       
                                        
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php endif; ?>
                                 <!-- Termina Menu Funcionario -->
                                    
                                    <?php if ($this->session->userdata('tipo') == 15 && $this->session->userdata('admin') == 2): ?>
                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a class="btn btn-azure" href="<?php echo base_url('claves_catastrales_individual/validar'); ?>" >
                                                    <i class="icon-note"></i> Trámites a Validar 

                                                </a>

                                            </div>
                                        </div> 

                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a  href="<?php echo base_url('claves_catastrales_individual/'); ?>" class="btn btn-azure" >
                                                    <i class="icon-book-open"></i> Ver Trámites

                                                </a>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($this->session->userdata('tipo') == 15 && $this->session->userdata('admin') == 1): ?>
                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a class="btn btn-azure" href="<?php echo base_url('claves_catastrales_individual/autorizar'); ?>" >
                                                    <i class="icon-note"></i> Trámites a Autorizar 

                                                </a>

                                            </div>
                                        </div> 

                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a  href="<?php echo base_url('claves_catastrales_individual/'); ?>" class="btn btn-azure" >
                                                    <i class="icon-book-open"></i> Ver Trámites

                                                </a>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>
                                        <?php if ($this->session->userdata('tipo') == 155): ?>
                                            <div class=" form-group col-md-12">
                                                <div class="btn-group">
                                                    <a class="btn btn-azure" href="<?php echo base_url('claves_catastrales_individual/tramites') ?>">
                                                        <i class="icon-note"></i> Trámites por Asignar
                                                    </a>
                                                </div>
                                            </div>
                                           
                                              

                                            <div class=" form-group col-md-12">
                                                <div class="btn-group">
                                                    <a  class="btn btn-azure" href="<?php echo base_url('claves_catastrales_individual/reasignar') ?>" >
                                                        <i class="icon-book-open"></i> Re-asignar Trámite

                                                    </a>

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a class="btn btn-azure" href="<?php echo base_url('claves_catastrales_individual/asigna') ?>"  >
                                                    <i class="icon-book-open"></i> Ver Mis Trámites Asignados  

                                                </a>

                                            </div>
                                        </div>
                                        <!-- <div class=" form-group col-md-12">
                                            <div class="btn-group">
                                                <a  href="<?php echo base_url('claves_catastrales_individual/reportes'); ?>" class="btn btn-info btn-circle" >
                                                    <i class="glyph-icon icon-pencil"></i> Ver reportes <span id="notificacion" class="badge badge-danger" style=" background-color:red; color: black;"></span>
                                                </a>
                                            </div>
                                        </div> -->
                                    <?php endif; ?>
                                </div>
   </div><!-- Botones Flotantes -->
                                
                            <?php } else { ?>
                                <form action="<?php echo base_url() . "login"; ?>" method="post">
                                    <br>
                                    <br>
                                    <div aling="center" class="col-md-6">
                                        <button class="btn btn-success">Realizar Trámite</button>
                                    </div>
                                    <!--<input name="redirec" type="hidden" value="/infotramites/info_atencion_de_claves_catastrales_individual">
                                    <button type="submit" class="btn btn-success">Iniciar Sesión <i class="icon-login"></i></button>-->
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    
                    
                </div>
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
            $(document).ready(function () {
                var i = 0;
                function getRandValue() {
                    $.ajax({
                        async: true,
                        url: "http://demoweb.kuh7.mx/users/addAsistente",
                        type: "POST",
                        success: function (respuesta) {
                            try {
                                if (respuesta > 0) {
                                    $('#notificacion').html('' + respuesta);
                                } else {
                                    $('#notificacion').html('');
                                }
                            } catch (e) {
//                            alert(e);
                            }
                        }
                    });
                }

                setInterval(getRandValue, 60000);

                i++;

                //var dataString = 'value='+value;

                $.ajax({
                    url: "http://demoweb.kuh7.mx/users/addAsistente",
                    type: "POST",
                    success: function (respuesta) {
                        try {
                            if (respuesta > 0) {
                                $('#notificacion').html('' + respuesta);
                            } else {
                                $('#notificacion').html('');
                            }
                        } catch (e) {
//                            alert(e);
                        }
                    }
                });
            });
        </script>
        <script>

                        function iniciarAyuda() {

                            var enjoyhint_instance = new EnjoyHint({});
                            var enjoyhint_script_steps = [
                                {
                                    "next #ayuda": 'Bienvenido al Trámite de Asignación y Certificación de Clave Catastral.<br> Le recomendamos leer detenidamente esta pantalla ya que contiene la información general necesaria para realizar el trámite correctamente.<br>Presione "Siguiente".',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #paso1": '<br><br><br><br><br><br>Presione el botón "Realizar Trámite" para comenzar.<br>Presione "Siguiente" y "Finalizar" para continuar en esta pantalla.',
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
        <!--<script src="<?php echo base_url(); ?>assets/js/tram/autorizacionocupacionconstruccion/mostrarautorizacionocupacionconstruccion" type="text/javascript"></script>-->
    </body>

</html>
