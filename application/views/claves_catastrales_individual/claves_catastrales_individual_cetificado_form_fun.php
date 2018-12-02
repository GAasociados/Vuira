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
                        <a href="/claves_catastrales_individual/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Clave Individual </span>
                        </a>
                    </li>
                    <li>
                    <li>
                        <a href="/claves_catastrales_individual_cetificado/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Clave Certificado </span>
                        </a>
                    </li>
                     <li>
                    <li>
                        <a href="/claves_fraccionamiento/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Clave Fracc.. </span>
                        </a>
                    </li>

                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/claves_catastrales_individual/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE INDIVIDUAL</h6></span>
                        </a>
                        <a class="sf-with-ul" href="/claves_catastrales_individual_cetificado/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE  CERTIFICADO.</h6></span>
                        </a>
                        <a class="sf-with-ul" href="/claves_catastrales_fraccionamiento/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE  FRACC.</h6></span>
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
 <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
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
                    <h2>Claves Catastrales Individual con Certificado Parcelario, Título de Propiedad o Sentencia Jurídica</h2><br>
  
      
                    
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
                                        <h3 class="title-hero">I.¿Eres propietario del inmueble?</h3>
                                        <div class="bordered-row">
                                            <div class="row">
                                            <div class="col-md-12">
                                                
 <?php if ($nocontrol): ?>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de control de seguimiento</label>
                                                        <input type="text" readonly="" class="form-control" name="nocontrol" id="nocontrol" placeholder="Numero de control" value="<?php echo $nocontrol ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row" id="paso1">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <label for="varchar">¿Eres propietario del inmueble?</label><br>
                                                    <label>Si</label>
                                                    <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                    <label>No</label>
                                                    <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso7">
                                            <div class="form-group hidden" id="datosp"> 

                                                <div class="col-md-12">
                                                    <label>¿Por favor indique que tipo de persona es?</label><br>
                                                    <label>Moral</label>
                                                    <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                    <label>Física</label>
                                                    <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h4  class="block bold">Información del solicitante Persona Moral o Física</h4>
                                                    </div> 
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                    </div> 
                                                </div>






                                                <!--                                                <div class="col-md-4" id="fisrfc">
                                                                                                    <label>Ingrese su INE</label>
                                                                                                    <input class="form-control" type="text" maxlength="13" pattern="[A-Z|0-9]+" name="fisrfc" id="fisrfc" placeholder="Ingrese su INE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fisrfc; ?>">
                                                                                                </div>-->

                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación (INE, Pasaporte, Cédula Profesional) Propietario</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class=""  type="file" name="morine" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $morine; ?>">Visualizar Documento</a>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label> 

                                                            Carta Poder Simple emitida por el propietario al solicitante</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="cartapoder" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($cartapoder)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $cartapoder; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <!--                                                <div class="col-md-4" id="">
                                                                                                    <label for="varchar">Nombre del Solicitante <?php echo form_error('nombreresolicitante') ?></label>
                                                                                                    <input type="text" class="form-control" pattern="[A-Z|0-9]+" name="nombreresolicitante" id="nombreresolicitante" placeholder="Nombre del Solicitante" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $nombreresolicitante; ?>" />
                                                                                                </div>-->
                                                <div id="fisrfc" class="col-md-12">
                                                    <div class="col-md-4 ">
                                                        <label>Escritura de Compra-Venta</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  type="file" name="compraventa" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($compraventa)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $compraventa; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Documento Acta constitutiva</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="docacta"value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($docacta)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $docacta; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="predialso" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($predialso)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $predialso; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->

                                <div id="panel-ubicacion-inmueble" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">II. Identificación y Ubicación del Inmueble</h3>
                                        <div class="bordered-row">
                                            <div class="row">
                                             <div class="col-md-12">
                                                
 <div class="row">


                                            <div class="form-group" >

                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                    <input  autocomplete="off"  <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" class="form-control"  pattern="[A-Z0-9 ,.-ÑÁÉÍÓÚ]+" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                </div>

                                                <div class=" col-md-3">
                                                    <label for="varchar">Número Exterior *</label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?>   type="text" class="form-control" pattern="[A-Za-z0-9 -/]+" name="numext" id="numext" placeholder="Número Exterior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numext != "" ? $numext : "S/N"; ?>" />
                                                </div>    
                                                <div class=" col-md-2">
                                                    <label for="varchar">Número Interior</label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?> type="text" class="form-control" name="numint" pattern="[A-Za-z0-9 -/]+" id="numint" placeholder="Número Interior" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $numint; ?>" />
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="int"> Poblado/Localidad/Comunidad/Ejido *<?php echo form_error('cbocomunidad') ?></label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?> required type="text" class="form-control" pattern="[A-Za-z0-9 -/.ÑÁÉÍÓÚ]+" name="cbocomunidad" id="cbocomunidad" placeholder="Poblado/Localidad/Comunidad/Ejido" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"     value="<?php echo $cbocomunidad; ?>" />
                                                </div>

                                            </div>
                                        </div>
                                        <div id="paso4">
                                            <div class="row">


                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote  *<?php echo form_error('noloteui') ?></label>
                                                    <input  autocomplete="off"   type="text" class="form-control" pattern="L-[0-9A-Z -/]+"  title="El formato de este campo es (L-Número)"  name="noloteui" id="noloteui" placeholder="Número de Lote" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $noloteui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana *<?php echo form_error('nomanzanaui') ?></label>
                                                    <input autocomplete="off"     type="text" pattern="M-[0-9A-Z -/]+" class="form-control" name="nomanzanaui"  title="El formato de este campo es (L-Número)"  id="nomanzanaui" placeholder="Manzana" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $nomanzanaui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Parcela/Solar Lote <?php echo form_error('zonaloteparcela') ?></label>
                                                    <input autocomplete="off"   <?php echo $modificar; ?> type="text" class="form-control"  name="zonaloteparcela" id="zonaloteparcela" placeholder="Parcela/Solar Lote" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $zonaloteparcela; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar"> Zona y Porción/Manzana </label>
                                                    <input   autocomplete="off"  type="text" class="form-control" name="porcionp" id="porcionp" placeholder=" Zona y Porción/Manzana" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $porcionp != "" ? $porcionp : "S/N"; ?>" />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row" id="paso5">
                                            <?php if (!empty($mapa)) { ?>
                                                <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                            <?php } else { ?>
                                                <input id="address" type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                            <?php } ?>


                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <h4>
                                                        En caso de que la ubicación mostrada en el mapa no coincida con la dirección capturada,
                                                        usted puede mover el punto de ubicación color rojo al lugar deseado.
                                                    </h4>
                                                    <style>
                                                        /* Always set the map height explicitly to define the size of the div
                                                        * element that contains the map. */
                                                        #map {
                                                            height: 100%;
                                                        }

                                                        /* Optional: Makes the sample page fill the window. */
                                                        html, body {
                                                            height: 100%;
                                                            margin: 0;
                                                            padding: 0;
                                                        }

                                                        #floating-panel {
                                                            position: absolute;
                                                            top: 10px;
                                                            left: 25%;
                                                            z-index: 5;
                                                            background-color: #fff;
                                                            padding: 5px;
                                                            border: 1px solid #999;
                                                            text-align: center;
                                                            font-family: 'Roboto','sans-serif';
                                                            line-height: 30px;
                                                            padding-left: 10px;
                                                        }
                                                    </style>
                                                    <div style="width:100%; height: 500px;" >
                                                        <div id="map"></div>
                                                    </div>
                                                </div>
                                                <!-- end map -->
                                            </div>
                                        </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-UBICACION-INMUEBLE 1-->


                                <div class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">III. DATOS DEL PROPIETARIO</h3>
                                        <div class="bordered-row">
                                            <div class="row">
                                          <div class="col-md-12">
                                                
 <div class="row" id="paso6">
                                            <div class="form-group">
                                                <div class="col-md-6">

                                                    <label for="varchar">Nombre del Propietario  *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input  autocomplete="off"  pattern="[A-Z0-9 .,-ÑÁÉÍÓÚ]+" <?php echo $modificar; ?> required type="text" class="form-control"  name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre del Propietario" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row" >
                                            <BR>
                                            <div class="form-group">
                                                <div  class="col-md-4" id="paso9">
                                                    <div class="col-md-6">
                                                        <label for="varchar">Correo Electrónico *<?php echo form_error('correonotificacionesdp') ?></label>
                                                        <input autocomplete="off" <?php echo $modificar; ?> required type="email" class="form-control" name="correonotificacionesdp" id="correonotificacionesdp" placeholder="CORREO ELECTRONICO" value="<?php echo $correonotificacionesdp; ?>" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="varchar">Teléfono *<?php echo form_error('telefononotificacionesdp') ?></label>
                                                        <input autocomplete="off" <?php echo $modificar; ?> maxlength="10" required pattern="[0-9]{7,10}" type="text" class="form-control" name="telefononotificacionesdp" id="telefononotificacionesdp" placeholder="TELÉFONO" value="<?php echo $telefononotificacionesdp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                    </div>
                                                </div>
                                                <div   class="col-md-4" id="paso9a">
                                                    <div class="col-md-12">

                                                        <label for="int">Tipo de Trámite Que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                        <select <?php echo $modificar; ?> required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">

                                                            <?php
//                                                           
                                                            if ($tipotramitedp == "1") {
                                                                ?>

                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                            <?php } elseif ($tipotramitedp == "2") {
                                                                ?>

                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                            <?php } elseif ($tipotramitedp == "3") { ?>

                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                            <?php } else { ?>
                                                                <option value="">SELECCIONA UNA OPCIÓN</option>
                                                                <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                            <?php } ?>
                                                        </select>


                                                    </div>
                                                </div>
                                                <div  class="col-md-4"id="paso9b">
                                                    <div class="col-md-12">
                                                        <?php // die(print_r($motivotramitedp,true)) ?>
                                                        <label for="int">Motivo del Trámite *<?php echo form_error('motivotramitedp') ?></label>

                                                        <select <?php echo $modificar; ?> required class="form-control" name="motivotramitedp" tabindex="-1" id="motivotramitedp" value="<?php echo $motivotramitedp; ?>">

                                                            <?php if ($motivotramitedp == 1) { ?>

                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                            <?php } elseif ($motivotramitedp == 2) {
                                                                ?>

                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                            <?php } elseif ($motivotramitedp == 3) {
                                                                ?>

                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                            <?php } elseif ($motivotramitedp == 3) { ?>

                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>

                                                            <?php } else { ?>
                                                                <option value="">SELECCIONA UNA OPCIÓN</option>
                                                                <option value="1">USO DE SUELO (CERTIFICADA)</option>
                                                                <option value="2">PERMISO DE DIVISIÓN (CERTIFICADA)</option>
                                                                <option value="3">APROBACIÓN DE SUELO (CERTIFICADA)</option>
                                                                <option value="4">A SOLICITUD DE PARTE (CERTIFICADA)</option>
                                                            <?php } ?>
                                                        </select>


                                                    </div>

                                                </div>

                                                <div class="col-md-3" id="modificacion">
                                                    <br>
                                                    <label for="int">Numero De Seguimiento Previo</label>
                                                    <input name="control" class="form-control" type="text" value="<?php echo $control; ?>">
                                                </div>
                                            </div>

                                        </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- DIV DATOS DEL PROPIETARIO -->




                                <div id="panel-expediente" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">IV. ADJUNTE LOS SIGUIENTES ARCHIVOS EN ORIGINAL</h3>
                                       <div class="bordered-row">
                                            <div class="row">
                                         <div class="col-md-12">
                                                
 <div class="row" id="paso10">
                                            <div class="form-group">
                                                <?php if (empty($rpredial)): ?>         
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Predial Actualizado*<?php echo form_error('doctopredial') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file"  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  name="doctopredial" id="doctopredial"  placeholder="Recibo impuesto predial" />
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctopredial; ?>">Visualizar Documento </a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($rpredial)): ?>         
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Predial Actualizado*</label>
                                                        <br>
                                                        <?php if (!empty($rpredialar)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Visualizar Documento </a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>   
                                                <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE, Pasaporte, Cédula Profesional)  Puede adjuntar uno o varios archivos*<?php echo form_error('doctoine') ?></label>

                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file"  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  name="doctoine[]" id="doctoine" multiple="" placeholder="Documento IFE"/>
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctoine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos *</label>
                                                        <br>
                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Título de la propiedad, Certificado Parcelario, Contrato Privado de Compraventa CORETT o Sentencia Jurídica que haya causado ejecutoria o Estado (Certificada). Deberan estar debidamente inscritos en el Registro Público. Puede adjuntar uno o varios archivos *<?php echo form_error('doctotitulo') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" name="doctotitulo[]" id="doctotitulo" multiple="" placeholder="Poder Simple en caso de que el Trámite se Realizado por el Representante Legal" />
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctotitulo)): ?>
                                                        <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctotitulo; ?>">Visualizar Documento</a>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <div id="otrosdoc" class="form-group col-md-4  <?php echo $otros_doc == 0 ? "hidden" : ' ' ?>">
                                                    <label for="varchar">Adjuntar otra documentación (Si son varios archivos por favor adjuntar un archivo .rar)*<?php echo form_error('otradoc') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  name="otradoc" id="otrodoc" placeholder=""/>
                                                    <?php endif; ?>
                                                    <br>

                                                    <?php if (!empty($otradoc)): ?>
                                                        <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $otradoc; ?>">Visualizar Documento</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12" id="hiddendoctopago">
                                                <?php if (!empty($status)): ?>
                                                    <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                    <input type="file"  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" multiple name="doctopago" id="doctopago"/>
                                                    <?php if (!empty($doctopago)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesindividualcertificado/" . $doctopago; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row"> 

                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                            <?php if ($clave): ?>
                                                <div class="form-group">
                                                    <div class="form-group col-md-4">
                                                        <label>Clave Catastral</label>
                                                        <input placeholder="Clave Catastral" name="clavecat" id="clavecat" class="form-control" readonly value="<?php echo $clave ?>" >
                                                    </div>
                                                </div>
                                            <?php endif; ?> 
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                
                                              <!-- Botones Flotantes --><div class="button-group pull float">
                                                  
                                                     <button data-loading-text="<i class='fa fa-spinner fa-spin '></i> Realizar Trámite" id="solicitar" type="submit"  class="btn btn-success glyph-icon icon-play">Solicitar Trámite</button>
                                                  
                                                         <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . "claves_catastrales_individual_cetificado/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                    <?php endif; ?>

                                                    <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
<!--                                                        <button onclick="location.href='<?php //echo base_url(); ?>claves_catastrales_individual_cetificado/ventanilla'" type="button" class="btn btn-danger">Cancelar</button>-->
                                                    <?php } else { ?>

<!--                                                        <button onclick="location.href='<?php //echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual'" type="button" class="btn btn-danger">Cancelar</button>-->
                                                    <?php } ?>
                                                </div><!-- Botones Flotantes -->
               
                                               
                                                     
                                            </div>

                                        </div>


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
    </div>
    <!-- FIN sb-site -->
</body>
</html>



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
        <script>
                            $(document).ready(function () {

                                var dato = $('#divestatus').val();
                                if (dato == 4 || dato == 6) {
                                    $("#hiddendoctopago").show();
                                } else {
                                    $("#hiddendoctopago").hide();
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

                                $('#cbocomunidad').keyup(function () {
                                    //geocodeAddress(geocoder,map);
                                    //nooficial
                                    $('#address').val($('#calleui').val() + "" + $('#cbocomunidad').val() + " Irapuato, Guanajuato");
                                    initMap();
                                    //calleui
                                });
                            });
        </script>
        <!-- MAPA -->

        <script>
            //20.6547575, -101.36542910000003

            function initMap() {
                //setTimeout("initMap()",10000);
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 17,
                    center: {lat: 20.6767222, lng: -101.3681677}
                });
                var geocoder = new google.maps.Geocoder();
                var noPoi = [
                    {
                        featureType: "poi",
                        stylers: [
                            {visibility: "off"}
                        ]
                    }
                ];

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
                        //alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        </script>
        <script>
            $(document).ready(function () {
                if ($('#ipropietariosi').is(':checked')) {
                    $("#ipropietariono").prop('checked', false);
                    $('#datosp').addClass('hidden');
                } else if ($('#ipropietariono').is(':checked')) {
                    $('#datosp').removeClass('hidden');
                    $("#ipropietariosi").prop('checked', false);
                }

                if ($('#tipopersonafi').is(':checked')) {

                    $('#fisrfc').addClass('hidden');
                    $('#morine').removeClass('hidden');
                } else {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');
                }
                if ($('#tipopersonamo').is(':checked')) {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');

                } else {
                    $('#fisrfc').addClass('hidden');
                    $('#morine').removeClass('hidden');
                }
                if ($('#domisiliono').is(':checked')) {
                    $('#datosnot').addClass('hidden');
                    $('#btncopy').addClass('hidden');
                } else {
                    $('#datosnot').removeClass('hidden');
                    $('#btncopy').removeClass('hidden');

                }
                if ($('#domisiliosi').is(':checked')) {
                    $('#datosnot').removeClass('hidden');
                    $('#btncopy').removeClass('hidden');
                } else {
                    $('#datosnot').addClass('hidden');
                    $('#btncopy').addClass('hidden');


                }

            });
            $("#domisiliosi").on("click", function () {
                if ($("#domisiliosi").is(':checked')) {
                    $("#domisiliono").prop('checked', false);
                    $('#datosnot').removeClass('hidden');
                    $('#btncopy').removeClass('hidden');
                } else {
                    $("#domisiliono").prop('checked', true);
                    $('#datosnot').addClass('hidden');
                    $('#btncopy').addClass('hidden');
                }
            });
            $("#domisiliono").on("click", function () {
                if ($("#domisiliono").is(':checked')) {
                    $("#domisiliosi").prop('checked', false);
                    $('#datosnot').addClass('hidden');
                    $('#btncopy').addClass('hidden');
                } else {
                    $("#domisiliosi").prop('checked', true);
                    $('#datosnot').removeClass('hidden');
                    $('#btncopy').removeClass('hidden');

                }
            });
            $("#ipropietariosi").on("click", function () {
                if ($("#ipropietariosi").is(':checked')) {
                    if ($("#datosp").hasClass('hidden')) {

                    } else {
                        $("#datosp").addClass('hidden');
                        $("#ipropietariono").prop('checked', false);
                    }
                } else {
                    if ($("#datosp").hasClass('hidden')) {
                        $("#datosp").removeClass('hidden');
                        $("#ipropietariono").prop('checked', true);
                    } else {

                    }

                }
            });
            $("#ipropietariono").on("click", function () {
                if ($("#ipropietariono").is(':checked')) {
                    if ($("#datosp").hasClass('hidden')) {
                        $("#datosp").removeClass('hidden');
                        $("#ipropietariosi").prop('checked', false);
                    } else {

                    }
                } else {
                    if ($("#datosp").hasClass('hidden')) {

                    } else {
                        $("#datosp").addClass('hidden');
                        $("#ipropietariosi").prop('checked', true);
                    }

                }
            });
            $("#tipopersonafi").on("click", function () {
                if ($("#tipopersonafi").is(':checked')) {
                    $('#fisrfc').addClass('hidden');
                    $('#morine').removeClass('hidden');
                    $("#tipopersonamo").prop('checked', false);
                } else
                {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');
                    $("#tipopersonamo").prop('checked', true);
                }
            });
            $("#tipopersonamo").on("click", function () {
                if ($("#tipopersonamo").is(':checked')) {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');
                    $("#tipopersonafi").prop('checked', false);
                } else
                {
                    $("#tipopersonafi").prop('checked', true);
                    $('#fisrfc').addClass('hidden');
                    $('#morine').removeClass('hidden');

                }
            });
<?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155): ?>
                $("#masdoc").on("click", function () {
                    if ($("#masdoc").is(':checked')) {
                        if ($("#otrosdoc").hasClass('hidden')) {
                            $("#otrosdoc").removeClass('hidden');
                        }
                    } else {
                        if ($("#otrosdoc").hasClass('hidden')) {

                        } else {
                            $("#otrosdoc").addClass('hidden');
                        }
                    }
                });
<?php endif; ?>
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>


        <script>
            Dropzone.options.subir = {
                url: "<?php echo base_url(); ?>docstramites/documentoclave/imagencerficidado",
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
                        $(".dz-success-mark").addClass("hidden");//dz-error-mark
                        $(".dz-error-mark").addClass("hidden");//dz-error-mark
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
        <script>
            $('#check-clave').click(function (e) {

                var Clave = $('#clavenueva').val();
                if (Clave.length == 15 || Clave.length == 18) {
                    $.ajax({
                        url: "../bclave",
                        data: {clave: "" + Clave},
                        type: "POST",
                        dataType: 'json',

                        success: function (respuesta) {
                            if (respuesta == 0) {
                                alert("La Clave Catastral No se encuentra en el sistema");
                            } else {
                                alert("La Clave Catastral YA se encuentra en el sistema registrada bajo el nombre de propietario " + respuesta);
                            }
                        }
                    });
                } else {
                    alert("Por favor ingrese una clave de 15 o 18 digitos");
                }
            });

            function iniciarAyuda() {

                var enjoyhint_instance = new EnjoyHint({});
                var enjoyhint_script_steps = [
                    {
                        "next #ayuda": 'Bienvenido al Trámite de Clave Catastral.<br> Para continuar con la ayuda para solicitud del trámite <br>Presione el botón "Siguiente".',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    },

                    {
                        "next #paso1": 'Indique seleccionando la casilla, si la persona solicitante es el propietario del predio.<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    },

                    {
                        "next #paso3": 'Para la localización del predio ingrese los datos solicitados.<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso4": 'Ingrese los datos solicitados.<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso5": '<span style="color:black;"> Verifique que el puntero rojo indique la ubicación correcta del predio, es posible reubicarlo de ser necesario.<br>Presione "Siguiente" para continuar..</span>',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso6": 'Indique el nombre del propietario del predio.<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,

                    {
                        "next #paso9": '<br>Verifique que su correo electrónico sea el correcto y agrege un número de teléfono para recibir notificaciones<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso9a": '<br><br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }

                    ,
                    {
                        "next #paso9b": 'Para darle un mejor servicio, seleccione el asunto para el que requiere la Clave Catastral.<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }

                    ,

                    {
                        "next #paso10": 'Adjunte los documentos originales completos escaneados en .PDF o Imagenes<br>Presione "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }

                    ,

                    {
                        "next #solicitar": 'Presione "Solicitar trámite", aparecerá una notificacíon de trámite solicitado.<br>Presione "Finalizar" para concluir la ayuda..',
                        "nextButton": {text: "Finalizar"},
                        showSkip: false
                    }

                ];
                enjoyhint_instance.set(enjoyhint_script_steps);

                enjoyhint_instance.run();
            }
        </script>
        <?php if ($ID === "") { ?>
            <script>


                $("#formclave").submit(function (e) {
                    alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato.");
                    //                e.preventDefauly();
                });


            </script>
        <?php } ?>
        
</html> 