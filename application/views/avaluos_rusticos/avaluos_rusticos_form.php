

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
                <ul id="sidebar-menu">
                    <li class="header">
                        <span>TRAMITES</span>
                    </li>
                    <li>
                    <li>
                        <a href="/avaluos_rusticos/create">
                            <i class="glyph-icon icon-home"></i>
                            <span>Avalúos Rusticos </span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="/avaluos_urbanos/create">
                            <i class="glyph-icon icon-home"></i>
                            <span>Avalúos Urbanos </span>
                        </a>
                    </li>
       
                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/avaluos_rusticos/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span>Reportes Avalúos Rusticos</span>
                        </a>
                        <a class="sf-with-ul" href="/avaluos_urbanos/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span>Reportes  Avalúos Urbanos.</span>
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
        <!--#endregion Menú  -->
         
   
        
        <!-- FIN page-sidebar -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                       <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                 <div class="btnRegresar hidden-xs hidden-xm">

<!--                      <button class="btn btn-warning float btnAyuda" title="Ayuda" id="ayuda" onclick="iniciarAyuda()">
                        <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4>
                    </button>-->
      <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()" > 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>

                                        </div>
                                        <?php
                                        $modificar = "";
                                    else:
                                        $modificar = "";
                                    endif;
                                    ?>
                        <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
                    <h2>Autorización de Avalúos Fiscales Rusticos</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                            <!--											    <button class="btn btn-success float" title="Guardar Cuenta" id="btnGuardarCtaSuspendida">
                                                                                                                          Guardar Trámite
                                                                                                                             <i class="glyph-icon icon-save"></i> 
                                                                                                                        </button>-->
                             <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                <!--											      <div id="panel-fecha_recep" class="content-box border-top border-blue">
                                                                                                                                <div class="content-box-wrapper">
                                                                                                                                  <div class="row">
                                                                                                                                    <div class="col-md-12">
                                                                                                                                      <div class=" col-xs-6 col-md-6">
                                                                                                                                        <label class="control-label">Fecha de Recepci&oacute;n</label>
                                                                                                                                        <div class='input-prepend input-group' >
                                                                                                                                          <span class="add-on input-group-addon"><i class="glyph-icon icon-calendar"></i></span>
                                                                                                                                            <input type='text' id="date" class="form-control" data-date-format="mm/dd/yy" name="fecha_recepcion" />
                                                                                                                                        </div>
                                                                                                                                      </div>
                                                                                                                                      <div class="col-xs-6 col-md-6" >
                                                                                                                                        <center>
                                                                                                                                          <label >No. Consecutivo</label></br>
                                                                                                                                          <label  id="input-num_oficio" name="input-num_oficio" value="">CS - 142/2018</label>
                                                                                                                                        </center>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                              </div>-->


                                <div id="panel-propietario" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">I. Datos Generales</h3>
                                        <div class="bordered-row">
                                           <div class="row">
      <div class="form-group">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Motivo *<?php echo form_error('motivo') ?></label>
                                                <input required type="text" class="form-control" name="motivo" id="motivo" placeholder="Motivo" value="<?php echo $motivo; ?>" />
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="varchar">Nombre Solicitante *<?php echo form_error('nombresolicitante') ?></label>
                                                <input required type="text" class="form-control" name="nombresolicitante" id="nombresolicitante" placeholder="Nombre Solicitante" value="<?php echo $nombresolicitante; ?>" />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Nombre Propietario <?php echo form_error('nombrepropietario') ?></label>
                                                <input type="text" class="form-control" name="nombrepropietario" id="nombrepropietario" placeholder="Nombre Propietario" value="<?php echo $nombrepropietario; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group col-md-4">
                                                <label for="varchar">Calle *<?php echo form_error('calle') ?></label>
                                                <input required type="text" class="form-control" name="calle" id="calle" placeholder="Calle" value="<?php echo $calle; ?>" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Número *<?php echo form_error('numero') ?></label>
                                                <input required type="text" class="form-control" name="numero" id="numero" placeholder="Número" value="<?php echo $numero; ?>" />
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="int">Colonia <?php echo form_error('colonia') ?></label>
                                                <select class="form-control" name="colonia" tabindex="-1"  id="colonia"/>

                                                <?php
                                                if ($colonia != ""):

                                                    $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($colonia);
                                                    ?>

                                                    <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">
                                                        <?php echo strtoupper($arraycolonia->NOMBRE); ?>
                                                    </option>

                                                <?php endif; ?>
                                                <?php foreach ($consulta->result() as $fila) { ?>
                                                    <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                        <?php echo strtoupper($fila->NOMBRE); ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Municipio *<?php echo form_error('municipio') ?></label>
                                                <input required type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio" value="<?php echo $municipio; ?>" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Localidad *<?php echo form_error('localidad') ?></label>
                                                <input required type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad" value="<?php echo $localidad; ?>" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="varchar">Correo *<?php echo form_error('correo') ?></label>
                                                <input required type="email" class="form-control" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo; ?>" />
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="varchar">Teléfono *<?php echo form_error('telefono') ?></label>
                                                <input required type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $telefono; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group col-md-4">
                                                <h4>Seleccione el Nombre de su Perito de la Siguiente Lista</h4>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="varchar">Perito <?php echo form_error('perito') ?></label>
                                                <select class="form-control" name="perito" tabindex="-1"  id="perito">
                                                    <?php
                                                    if (!empty($perito)) {
                                                        $arrayperito = $this->Peritos_model->getperitosbyid($perito);
                                                        ?>
                                                        <option value="<?php echo $perito; ?>">
                                                            <?php echo $arrayperito[0]->nombre; ?>
                                                        </option>
                                                    <?php } ?>

                                                    <?php foreach ($resultperitos->result() as $fila) { ?>
                                                        <option value="<?php echo $fila->ID; ?>">
                                                            <?php echo $fila->nombre; ?>
                                                        </option>
                                                    <?php } ?>
                                                    <!-- <option value="Option 1">Option 1</option> -->
                                                </select>
                                            </div>

                                            <?php if (($this->session->userdata('tipo') == 14)) { ?>
                                                <!--
                                              <div class="form-group col-md-12">
                                                <label for="varchar">Documento Final *<?php echo form_error('documentofinal') ?></label>
                                                <input type="file" multiple name="documentofinal[]" id="documentofinal" placeholder="Documento Pago"/>
                                                <?php if (!empty($documentofinal)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/avaluosrusticos/" . $documentofinal; ?>">Descargar</a>
                                                <?php endif; ?>
                                              </div>
                                                -->
                                            <?php } ?>
                                        </div>


                                        <?php if ($this->session->userdata('tipo') == 14) { ?>

                                            <div class="form-group">
                                                <label for="mensaje">Mensaje <?php echo form_error('mensaje') ?></label>
                                                <textarea class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                            </div>

                                            <div class="form-group">


                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Documento Final *<?php echo form_error('final') ?></label>
                                                    <input type="file" multiple name="documentofinal[]" id="documentofinal" placeholder="Documento Pago"/>
                                                    <?php if (!empty($documentofinal)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/avaluosrusticos/" . $documentofinal; ?>" target="_blank">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tinyint">Status <?php echo form_error('status') ?></label>
                                                    <select class="form-control" name="status">
                                                        <?php if ($status == 1): ?>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "3">Terminado</option>
                                                            <option value = "4">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 2): ?>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "3">Terminado</option>
                                                            <option value = "4">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 3): ?>
                                                            <option value = "3">Terminado</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "4">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 4): ?>
                                                            <option value = "4">Cancelado</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Proceso</option>
                                                            <option value = "3">Terminado</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                            
              <!-- Botones Flotantes --><div class="button-group pull float">
   <button type="submit" class="btn btn-success glyph-icon icon-check-square-o">Solicitar Trámite</button>
                                            <?php if ($this->session->userdata('tipo') == 14) { ?>
                                                <a href="<?php echo base_url(); ?>avaluos_rusticos" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_avaluos_rusticos" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                            <?php } ?>
   </div><!-- Botones Flotantes -->
                                     
                                         
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->

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
       <!-- MAPA -->

                    <script>

                        function iniciarAyuda() {

                            var enjoyhint_instance = new EnjoyHint({});
                            var enjoyhint_script_steps = [
                                {
                                    "next #ayuda": 'Bienvenido al Trámite de Clave Catastral.<br> Para continuar con la ayuda del trámite <br>Presione "Siguiente".',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #panel-propietario": 'Primeramente indique si la persona solicitante es el propietario del predio o no.<br>Presione "Siguiente" para continuar..',
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

</html> 