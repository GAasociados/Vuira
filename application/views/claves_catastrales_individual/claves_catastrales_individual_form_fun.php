

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
                                    <a href="<?php echo base_url(); ?>login/logout" class="btn display-block font-normal btn-danger">
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

                    <a class="header-btn iconos" id="logout-btn"href="<?php echo base_url(); ?>login/logout" title="Bloquear">
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
                       
                        <a class="sf-with-ul" href="/claves_catastrales_fraccionamiento/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE  FRACC.</h6></span>
                        </a>
                        <!--<div class="sidebar-submenu">
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
                        </div>-->
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
      <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" > 
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
                    <h2>Clave Catastral Individual</h2><br>
  
      
                    
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
                                        <h3 class="title-hero">I. ¿Eres propietario del inmueble?</h3>
                                        <div class="bordered-row">
                                           <div class="row">
       <div class="row  <?php echo $modificar == "" ? "" : "hidden" ?>">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                         
                                                    <div id="paso1">
                                                        <label for="varchar">¿Eres propietario del inmueble?</label><br><label>Si</label>
                                                        <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                        <label>No</label>
                                                        <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>
                                                    </div>
                               
                                                </div>
                                                
                                            </div>
                                        </div>

       <div class="row">
                                            <div class="form-group" id="datosp">
                                                <div class="form-group  <?php echo $modificar == "" ? "" : "hidden" ?>" >
                                                    <div class="col-md-12">
                                                        <label>¿Por favor indique que tipo de persona es?</label><br>
                                                        <label>Moral</label>
                                                        <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                        <br><br>
                                                    </div>

                                                </div>
                                                <!--<div class="form-group">
                                                    <div class="col-md-12">

                                                        <h4 class="bold">Información del solicitante Persona Moral o Física </h4>
                                                    </div> 
                                                </div>-->

                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h5 style="margin-bottom:10px;">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                    </div> 
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="col-md-4" id="INE_PROP">
                                                        <?php if (empty($identificacion)): ?>
                                                            <div class="form-group">
                                                                <label for="varchar">Identificación del Propietario (INE, Pasaporte, Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                                <?php if ($modificar == ""): ?>
                                                                    <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" name="doctoine[]" multiple="" id="doctoine" placeholder="Documento IFE"/>
                                                                <?php endif; ?>
                                                                <?php if (!empty($doctoine)): ?>
                                                                    <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>">Visualizar Documento</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty($identificacion)): ?>
                                                            <div class="form-group">
                                                                <label for="varchar">Identificación del Propietario (INE,Pasaporte,Cédula Profesional) *</label>
                                                                <br>
                                                                <?php if (!empty($identificacionar)): ?>
                                                                    <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col-md-4" id="INE_SOL">
                                                        <?php if (empty($identificacion)): ?>
                                                            <div class="form-group">
                                                                <label for="varchar">Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                                <?php if ($modificar == ""): ?>
                                                                    <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" name="doctoine[]" multiple="" id="doctoine" placeholder="Documento IFE"/>
                                                                <?php endif; ?>
                                                                <?php if (!empty($doctoine)): ?>
                                                                    <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>">Visualizar Documento</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty($identificacion)): ?>
                                                            <div class="form-group">
                                                                <label for="varchar">Identificación del Solicitante (INE,Pasaporte,Cédula Profesional) *</label>
                                                                <br>
                                                                <?php if (!empty($identificacionar)): ?>
                                                                    <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col-md-4 form-group" id="PROPIEDAD">
                                                            <label for="varchar">Documento legal que acredite la propiedad; debidamente inscrito en el Registro Público de la Propiedad (Con todos sus anexos) Puede adjuntar uno o varios archivos*<?php echo form_error('doctolegalpropiedad') ?></label>
                                                            <?php if ($modificar == ""): ?>
                                                                <input type="file" accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" multiple="" name="doctolegalpropiedad[]" multiple="" id="doctolegalpropiedad" placeholder="Poder Simple en caso de que el Trámite se Realizado por el Representante Legal"/>
                                                            <?php endif; ?>
                                                            <?php if (!empty($doctolegalpropiedad)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                    </div>

                                                    <div class="col-md-4" id="PREDIAL">
                                                        <?php if (empty($rpredial)): ?>         
                                                            <div class="form-group">
                                                                <label for="varchar">Predial Actualizado*<?php echo form_error('doctopredial') ?></label>
                                                                <?php if ($modificar == ""): ?>
                                                                    <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" multiple=""  name="doctopredial" id="doctopredial" placeholder="Recibo impuesto predial" />
                                                                <?php endif; ?>
                                                                <?php if (!empty($doctopredial)): ?>
                                                                    <a href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>">Visualizar Documento</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                        <?php if (!empty($rpredial)): ?>         
                                                            <div class="form-group ">
                                                                <label for="varchar">Predial Actualizado Solicitante*</label>
                                                                <br>
                                                                <?php if (!empty($docpredial)): ?>
                                                                    <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Visualizar Documento</a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>   
                                                    </div>
                                                    
                                                    <div class="col-md-4" id="ACTA_CONST">

                                                        <label>Documento Acta constitutiva</label>

                                                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="acta_const" value="">

                                                        <?php if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col-md-4" id="PODER_NOTARIAL">
                                                        <label>Poder Notarial para representación de persona moral</label>

                                                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota" value="">

                                                        <?php if (!empty($poder_nota)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $poder_nota; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                
                                                    <div class="col-md-4" id="CARTA_SIMPLE">
                                                        <label>Carta Poder Simple emitida por el propietario al solicitante</label>
                                                        <?php if ($modificar == ""): ?>    
                                                            <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="cartapoder">
                                                        <?php endif; ?>
                                                        <?php if (!empty($cartapoder)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $cartapoder; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
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
                                                <div class="row">
                                                    <div  class="form-group" >
                                                        <div class="form-group col-md-3">
                                                            <div id="paso3">
                                                                <label for="varchar">Número Cuenta Predial*<?php echo form_error('predialui') ?></label>
                                                                <input  autocomplete="off" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" accept="" <?php echo $modificar; ?>  required="" type="text"  pattern="[A-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial" value="<?php echo $predialui; ?>" maxlength="12" onfocusout="clavesGeneradas();"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <div id="paso2">
                                                                <label for="int">Categoría del Predio *<?php echo form_error('categoriapredioui') ?></label>
                                                                <?php if ($modificar != ""): ?>
                                                                    <?php if ($categoriapredioui == 1) { ?>
                                                                        <input <?php echo $modificar ?> class="form-control" value="URBANO">

                                                                    <?php } elseif ($categoriapredioui == 2) {
                                                                        ?>
                                                                        <input <?php echo $modificar ?> class="form-control" value="SUB-URBANO">


                                                                    <?php } elseif ($categoriapredioui == 3) { ?>
                                                                        <input <?php echo $modificar ?> class="form-control" value="RÚSTICO">


                                                                    <?php } ?>
                                                                <?php else: ?>

                                                                    <select  required  class="form-control" name="categoriapredioui" tabindex="-1" id="categoriapredioui" value="<?php echo $categoriapredioui; ?>">

                                                                        <?php if ($categoriapredioui == 1) { ?>
                                                                            <option value="1">URBANO</option>
                                                                            <option value="2">SUB-URBANO</option>
                                                                            <option value="3">RÚSTICO</option>
                                                                        <?php } elseif ($categoriapredioui == 2) {
                                                                            ?>
                                                                            <option value="2">SUB-URBANO</option>
                                                                            <option value="3">RÚSTICO</option>
                                                                            <option value="1">URBANO</option>
                                                                        <?php } elseif ($categoriapredioui == 3) { ?>

                                                                            <option value="3">RÚSTICO</option>
                                                                            <option value="1">URBANO</option>
                                                                            <option value="2">SUB-URBANO</option>
                                                                        <?php } else { ?>
                                                                            <option value="">SELECCIONE UNA OPCIÓN</option>
                                                                            <option value="1">URBANO</option>
                                                                            <option value="2">SUB-URBANO</option>
                                                                            <option value="3">RÚSTICO</option>
                                                                        <?php } ?>

                                                                    </select>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>



                                                        <div class="form-group" >
                                                            <div class="col-md-6" id="paso4">
                                                                <div class=" col-md-6">
                                                                    <label  for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                                    <input autocomplete="off"   <?php echo $modificar; ?>  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  pattern="[A-Za-z0-9 ÁÉÍÓÚÑ-/]+"  class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                                </div>

                                                                <div class=" col-md-6">
                                                                    <label for="varchar">Número Exterior *<?php echo form_error('nooficialui') ?></label>
                                                                    <input  autocomplete="off"   <?php echo $modificar; ?>  required type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9  -/]+" class="form-control" name="nooficialui" id="nooficialui" placeholder="Número Exterior" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="paso5">
                                                    <div  class="form-group" >
                                                        <div class="form-group col-md-3">
                                                            <label for="varchar">Número Interior</label>
                                                            <input  autocomplete="off"   <?php echo $modificar; ?>  type="text" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9 -/]+"  name="nooficialinui" id="nooficialinui" placeholder="Número Interior  " value="<?php echo $nooficialinui; ?>" />
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="varchar">Número de Lote*<?php echo form_error('noloteui') ?></label>
                                                            <input  autocomplete="off"   <?php echo $modificar; ?>  type="text" style="text-transform:uppercase;"  title="El formato de este campo es (L-Número)" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="L-[0-9A-Z]+"  class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote" value="<?php echo $noloteui ?>" />
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="varchar">Manzana*<?php echo form_error('nomanzanaui') ?></label>
                                                            <input  autocomplete="off"   <?php echo $modificar; ?> type="text"  pattern="M-[0-9A-Z -/]+" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" title="El formato de este campo es (M-Número)" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana" value="<?php echo $nomanzanaui ?>" />
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="varchar">Superficie*<?php echo form_error('nomanzanaui') ?></label>
                                                            <input  autocomplete="off"   <?php echo $modificar; ?> type="number" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" class="form-control" name="sup" id="sup" placeholder="Superficie"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="paso6">
                                                    <div class="form-group">

                                                        <div  id="coloniauno" class="form-group col-md-6">
                                                            <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>

                                                            <?php if ($modificar == ""): ?>
                                                                <select required=""  title="Indica tu colonia"  class="form-control select2" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
                                                                <?php
                                                                if (!empty($cbocoloniaui)):

                                                                    $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
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
                                                            <?php else: ?>
                                                                <?php
                                                                if (!empty($cbocoloniaui)):

                                                                    $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($cbocoloniaui);
                                                                    ?>
                                                                    <input <?php echo $modificar; ?> class="form-control" value=" <?php echo strtoupper($arraycolonia->NOMBRE); ?>">



                                                                <?php endif; ?>
                                                                <input type="hidden" id="cbocoloniaui" class="form-control" value="<?php echo $cbocoloniaui; ?>">
                                                            <?php endif; ?>
                                                        </div>

                                                        <div id="coloniados" class="form-group col-md-5 hidden">
                                                            <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>
                                                            <input autocomplete="off"   <?php echo $modificar; ?>  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text"  pattern="[A-Za-z0-9  ÁÉÍÓÚÑ-/]+" id="colonia2" name="colonia2" placeholder="Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido " class="form-control" value="<?php echo $coloniados; ?>">
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="row" id="paso7" >
                                                    <div class="form-group">
                                                        <div class="form-group col-md-12">
                                                            <!--
                                                               <label for="varchar">Localización del Inmueble *<?php echo form_error('mapa') ?></label>
                                                            -->
                                                            <?php if (!empty($mapa)) { ?>
                                                                <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                                            <?php } else { ?>
                                                                <input id="address" type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                                            <?php } ?>
                                                            <!--
                                                            <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
                                                            -->
                                                        </div>

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
                                                <div class="row" >

                                                    <div class="form-group">
                                                        <div id="paso8" class="col-md-6">
                                                            <label for="varchar">Nombre del Propietario o Razón Social *<?php echo form_error('nombrepropietariodp') ?></label>
                                                            <input  autocomplete="off"   <?php echo $modificar; ?>  required style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="row" id="paso10">
                                                    <div class="form-group">

                                                        <div class="col-md-4">
                                                            <label for="varchar">Correo Electrónico *<?php echo form_error('correonotificacionesdp') ?></label>
                                                            <input  <?php echo $modificar; ?> required type="email"  class="form-control" name="correonotificacionesdp" id="correonotificacionesdp" placeholder="Correo Electrónico" value="<?php echo $correonotificacionesdp; ?>" />
                                                        </div>



                                                        <div class="col-md-4">
                                                            <label for="varchar">Teléfono *<?php echo form_error('telefononotificacionesdp') ?></label>
                                                            <input  <?php echo $modificar; ?> maxlength="10" pattern="[0-9]{7,10}"  required type="text" class="form-control" name="telefononotificacionesdp" id="telefononotificacionesdp" placeholder="Teléfono" value="<?php echo $telefononotificacionesdp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="form-group">

                                                        <div class="col-md-6" id="paso11">

                                                            <label  for="int">Tipo de Trámite Que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                            <select  <?php echo $modificar; ?> required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">
                                                                <?php if ($tipotramitedp == 1) { ?>
                                                                    <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                    <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                    <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                <?php } elseif ($tipotramitedp == 2) {
                                                                    ?>
                                                                    <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                    <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                    <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                <?php } elseif ($tipotramitedp == 3) { ?>

                                                                    <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                    <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                    <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                <?php } else { ?>
                                                                    <option value="">SELECCIONE UNA OPCIÓN</option>
                                                                    <option value="1">ASIGNACIÓN DE CLAVE CATASTRAL</option>
                                                                    <option value="2">MODIFICACIÓN DE CLAVE CATASTRAL</option>
                                                                    <option value="3">DUPLICADO DE CLAVE CATASTRAL</option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6" id="paso11a">

                                                            <label for="int">Motivo del Trámite *<?php echo form_error('motivotramitedp') ?></label>

                                                            <select   <?php echo $modificar; ?> required class="form-control" name="motivotramitedp" tabindex="-1" id="motivotramitedp" value="<?php echo $motivotramitedp; ?>">

                                                                <?php if ($motivotramitedp == 1) { ?>
                                                                    <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                                    <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>
                                                                    <option value="3">APORBACIÓN DE SUELO(CERTIFICADA)</option>
                                                                    <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                                <?php } elseif ($motivotramitedp == 2) {
                                                                    ?>
                                                                    <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>                                                            
                                                                    <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                                    <option value="3">APORBACIÓN DE SUELO(CERTIFICADA)</option>
                                                                    <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>

                                                                <?php } elseif ($motivotramitedp == 3) {
                                                                    ?>
                                                                    <option value="3">APORBACIÓN DE SUELO(CERTIFICADA)</option>
                                                                    <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>                                                            
                                                                    <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                                    <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                                <?php } elseif ($motivotramitedp == 4) { ?>
                                                                    <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                                    <option value="3">APORBACIÓN DE SUELO(CERTIFICADA)</option>
                                                                    <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>                                                            
                                                                    <option value="1">USO DE SUELO(CERTIFICADA)</option>

                                                                <?php } else { ?>
                                                                    <option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>
                                                                    <option value="1">USO DE SUELO(CERTIFICADA)</option>
                                                                    <option value="2">PERMISO DE DIVISIÓN(CERTIFICADA)</option>
                                                                    <option value="3">APORBACIÓN DE SUELO(CERTIFICADA)</option>

                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3" id="modificacion">
                                                            <label for="int">Numero De Seguimiento Previo</label>
                                                            <input name="control" class="form-control" type="text" value="<?php echo $control; ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class=" form-group col-md-12">
                                            <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                            
                                            
                                             <!-- Botones Flotantes --><div class="button-group pull float">
                                            <button data-loading-text="<i class='fa fa-spinner fa-spin '></i> Realizar Trámite" id="solicitar" type="submit"  class="btn btn-success glyph-icon icon-play"><?php echo $button ?></button>
                                            
                                            <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                                <a href="<?php echo base_url(); ?>claves_catastrales_individual/ventanilla" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_individual" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                            <?php } ?>
                                              </div><!-- Botones Flotantes -->
                                                  
                                        </div>

                                </div><!-- DIV DATOS DEL PROPIETARIO -->
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
                                                        $("#tipotramitedp").change(function () {

                                                        var dato = $('select[id=tipotramitedp]').val();
                                                        if (dato == "2") {
                                                        $("#modificacion").removeClass('hidden');
                                                        } else {
                                                        $("#modificacion").addClass('hidden');
                                                        }
                                                        });
                                                        $(document).ready(function () {

                                                        setTimeout(function(){
                                                        var colonia = $('#cbocoloniaui').val();
                                                        if (colonia == 0 && colonia != ""){
                                                        $('#coloniados').removeClass('hidden');
                                                        $('#coloniauno').addClass('hidden');
                                                        }
                                                        }, 100);
                                                        var dato = $('#divestatus').val();
                                                        if (dato == 4 || dato == 6) {
                                                        if (dato == 4) {
                                                        $("#docpago").removeClass('hidden');
                                                        $("#hiddendoctofinal").addClass('hidden');
                                                        }
                                                        if (dato == '6') {
                                                        $("#docpago").removeClass('hidden');
                                                        $("#hiddendoctopago").removeClass('hidden');
                                                        }
                                                        } else {
                                                        $("#hiddendoctopago").hide();
                                                        $("#docpago").addClass('hidden');
                                                        }

                                                        $("#status").change(function () {
                                                        //alert("HOLA");
                                                        var dato = $('select[id=status]').val();
                                                        if (dato == "4") {
                                                        $("#docpago").removeClass('hidden');
                                                        $("#hiddendoctopago").show();
                                                        } else {
                                                        $("#docpago").addClass('hidden');
                                                        $("#hiddendoctopago").hide();
                                                        }

                                                        if (dato == '6') {
                                                        $("#hiddendoctopago").show();
                                                        $("#hiddendoctofinal").show();
                                                        } else {
                                                        $("#hiddendoctofinal").hide();
                                                        }

                                                        });
                                                        $('#nooficialui').keyup(function () {
                                                        //geocodeAddress(geocoder, map);
                                                        //nooficial
                                                        $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato, Guanajuato");
                                                        initMap();
                                                        //calleui
                                                        });
                                                        var dato = $('select[id=tipotramitedp]').val();
                                                        if (dato == "2") {
                                                        $("#modificacion").removeClass('hidden');
                                                        } else {
                                                        $("#modificacion").addClass('hidden');
                                                        }
                                                        });
    </script>

    <script>
        //20.6547575, -101.36542910000003

        function initMap() {
        //setTimeout("initMap()",10000);
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
                center: {lat: 20.6767222, lng: - 101.3681677}
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
                position: results[0].geometry.location,
                draggable: true
        });
        //document.getElementById("address").value = results[0].geometry.location;
        //document.getElementById("address").value = results[0].geometry.location;
        resultsMap.addListener('mousemove', function () {
        document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
        });
        document.getElementById("address").value = marker.position.lat() + "," + marker.position.lng();
        } else {
        //alert('Geocode was not successful for the following reason: ' + status);
        }
        });
        }

        function cdatos() {
        $('#callenotificacionesdp').val($('#calleui').val());
        $('#numeronotificacionedp').val($('#nooficialui').val());
        $('#colonianotificacionesdp').val($('#cbocoloniaui').val());
        $('#numeronotificacionint').val($('#nooficialinui').val());
        }
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
    <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/widgets/superclick/superclick.js"></script>
  <!--  <script type="text/javascript" src="https://webservice.irapuato.gob.mx/Estilos/assets_admin/themes/admin/layout.js"></script> -->
    <script>
        $(document).ready(function () {

        if ($('#ipropietariosi').is(':checked')) {
            //dueño
            if($('#tipopersonafi').is(':checked')){
                //fisica
                $('#INE_SOL').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden'); 

                $("#tipopersonamo").prop('checked', false);
                $("#tipopersonafi").prop('checked', true);  
            }
            else{
                //moral
                $('#INE_SOL').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');

                $("#tipopersonamo").prop('checked', true);
                $("#tipopersonafi").prop('checked', false);  
            }
            $("#ipropietariono").prop('checked', false);
            $("#ipropietariosi").prop('checked', true);
        }
        else{
            //no dueño
            if($('#tipopersonafi').is(':checked')){
                //fisica
                $('#INE_SOL').removeClass('hidden');
                $('#CARTA_SIMPLE').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');

                $("#tipopersonamo").prop('checked', false);
                $("#tipopersonafi").prop('checked', true);  
            }
            else{
                //moral
                $('#INE_SOL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');

                $("#tipopersonamo").prop('checked', true);
                $("#tipopersonafi").prop('checked', false);  
            }
            $("#ipropietariono").prop('checked', true);
            $("#ipropietariosi").prop('checked', false);
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
            if ($("#ipropietariosi").is(':checked') && $('#tipopersonafi').is(':checked')) {
                //dueño , fisica
                $('#INE_SOL').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');

                $("#ipropietariono").prop('checked', false);
            } 
            else if($("#ipropietariosi").is(':checked') && $('#tipopersonamo').is(':checked')){
                //dueño , moral
                $('#INE_SOL').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');

                $("#ipropietariono").prop('checked', false);
            }
            else if (!$("#ipropietariosi").is(':checked') && $('#tipopersonafi').is(':checked')) {
                //no dueño , fisica
                $('#INE_SOL').removeClass('hidden');
                $('#CARTA_SIMPLE').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');

                $("#ipropietariono").prop('checked', true);
            } 
            else if(!$("#ipropietariosi").is(':checked') && $('#tipopersonamo').is(':checked')){
                //no dueño , moral
                $('#INE_SOL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');

                $("#ipropietariono").prop('checked', true);
            }

        });

        $("#ipropietariono").on("click", function () {
            if ($("#ipropietariono").is(':checked') && $('#tipopersonafi').is(':checked')) {
                //no dueño , fisica
                $('#INE_SOL').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');
                $('#CARTA_SIMPLE').removeClass('hidden');

                $("#ipropietariosi").prop('checked', false);
            } 
            else if($("#ipropietariono").is(':checked') && $('#tipopersonamo').is(':checked')){
                //no dueño , moral
                $('#INE_SOL').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');

                $("#ipropietariosi").prop('checked', false);
            }
            else if (!$("#ipropietariono").is(':checked') && $('#tipopersonafi').is(':checked')) {
                //dueño , fisica
                $('#INE_SOL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');

                $("#ipropietariosi").prop('checked', true);
            } 
            else if(!$("#ipropietariono").is(':checked') && $('#tipopersonamo').is(':checked')){
                //dueño , moral
                $('#INE_SOL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');

                $("#ipropietariosi").prop('checked', true);
            }

        });

        $("#tipopersonafi").on("click", function () {
            if ($("#tipopersonafi").is(':checked') && $("#ipropietariosi").is(':checked')) {
                //dueño , fisica
                $('#INE_SOL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');

                $("#tipopersonamo").prop('checked', false);
            } 
            else if(!$("#tipopersonafi").is(':checked') && $("#ipropietariosi").is(':checked')){
               //dueño , moral
               $('#INE_SOL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');

                $("#tipopersonamo").prop('checked', true);
            }
            else if($("#tipopersonafi").is(':checked') && $("#ipropietariono").is(':checked')){
               //no dueño , fisica
               $('#INE_SOL').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');
                $('#CARTA_SIMPLE').removeClass('hidden');

                $("#tipopersonamo").prop('checked', false);
            }
            else if(!$("#tipopersonafi").is(':checked') && $("#ipropietariono").is(':checked')){
               //no dueño , moral
               $('#INE_SOL').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');

                $("#tipopersonamo").prop('checked', true);
            }
        });

        $("#tipopersonamo").on("click", function () {
            if ($("#tipopersonamo").is(':checked') && $("#ipropietariosi").is(':checked')) {
                //dueño , moral
                $('#INE_SOL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');

                $("#tipopersonafi").prop('checked', false);
            } 
            else if(!$("#tipopersonamo").is(':checked') && $("#ipropietariosi").is(':checked')){
               //dueño , fisica
               $('#INE_SOL').addClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');

                $("#tipopersonafi").prop('checked', true);
            }
            else if($("#tipopersonamo").is(':checked') && $("#ipropietariono").is(':checked')){
               //no dueño , moral
               $('#INE_SOL').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').removeClass('hidden');
                $('#PODER_NOTARIAL').removeClass('hidden');
                $('#CARTA_SIMPLE').addClass('hidden');

                $("#tipopersonafi").prop('checked', false);
            }
            else if(!$("#tipopersonamo").is(':checked') && $("#ipropietariono").is(':checked')){
               //no dueño , fisica
               $('#INE_SOL').removeClass('hidden');
                $('#INE_PROP').removeClass('hidden');
                $('#PREDIAL').removeClass('hidden');
                $('#PROPIEDAD').removeClass('hidden');
                $('#ACTA_CONST').addClass('hidden');
                $('#PODER_NOTARIAL').addClass('hidden');
                $('#CARTA_SIMPLE').removeClass('hidden');

                $("#tipopersonafi").prop('checked', true);
            }
        });
    </script>
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
    <script>

        function iniciarAyuda() {

        var enjoyhint_instance = new EnjoyHint({});
        var enjoyhint_script_steps = [
        {
        "next #ayuda": 'Bienvenido al Trámite de Clave Catastral.<br> Para continuar con la ayuda de solicitud del trámite <br>Presione el botón "Siguiente".',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        },
        {
        "next #paso1": 'Indique seleccionando la casilla, si la persona solicitante es el propietario del predio.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        },
        {
        "next #paso3": 'Indique el número de cuenta predial del inmueble, este se encuentra en el recibo predial<br> en la sección que se indica en la imagen:<br><br><img src="<?php echo base_url() . "assets/recpre.png" ?>">Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso2": 'Seleccione la categoria en la que se encuentra el predio.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso4": 'Para la localizacion del predio ingrese los datos solicitados como aparecen en el recibo predial.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso5": 'Ingrese los datos solicitados como aparecen en el recibo predial.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso6": 'Selecccione de la siguiente lista el Fraccionamiento/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido en donde se localiza el predio.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso7": '<span style="color:black;" >Verifique que el puntero rojo indica la ubicación correcta del predio, es posible reubicarlo de ser necesario.<br>Presione "Siguiente" para continuar..</span>',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso8": '<span style="" >Indique el nombre o razón social del propietario del predio.<br>Presione "Siguiente" para continuar..</span>',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }
        ,
        {
        "next #paso10": 'Verifique que su correo electrónico sea el correcto, y agregue un número de teléfono para notificaciones.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }

        ,
        {
        "next #paso11": '<br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }

        ,
        {
        "next #paso11a": 'Para darle un mejor servicio, seleccione para que asunto requiere la Clave Catastral.<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }

        ,
        {
        "next #paso12": 'Adjunte los documentos originales completos escaneados en .PDF o Imagenes<br>Presione "Siguiente" para continuar..',
                "nextButton": {text: "Siguiente"},
                "skipButton": {text: "Saltar Guía"}
        }

        ,
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

    <script>
        $('#clavenueva').keyup(function (e) {

        var Clave = $('#clavenueva').val();
        if (Clave.length == 15) {
        $.ajax({
        url: "../bclave",
                data: {clave: "" + Clave},
                type: "POST",
                dataType: 'json',
                success: function (respuesta) {
                if (respuesta > 0) {
                alert("La Clave Catastral ya se encuenta en el sistema");
                } else {
                alert("La Clave Catastral No se encuentra en el sistema");
                }
                }
        });
        }
        });
        $('#predialui').keyup(function (e) {

        var Clave = $('#predialui').val();
        if (Clave != "APERTURA"){
        if (Clave.length == 12) {
        $.ajax({
<?php if ($ID): ?>
            url: "../predial",
<?php else: ?>
            url: "../claves_catastrales_individual/predial",
<?php endif; ?>
        data: {predial: "" + Clave},
                type: "POST",
                dataType: 'json',
//    contentType: 'application/json',
                success: function (respuesta) {
                if (respuesta) {
                    if (respuesta.CALLE_ID != undefined) {
                        var ca = respuesta.CALLE_ID.replace("?","Ñ");
                        $('#calleui').val(ca);
                    }
                    else
                    {
                        $('#calleui').val(respuesta.CALLE_ID != undefined ? respuesta.CALLE_ID:"");
                    }
                $('#nooficialui').val(respuesta.NO_EXTERIOR != undefined ? respuesta.NO_EXTERIOR:"");
                $('#nooficialinui').val(respuesta.NO_INTERIOR != undefined ? respuesta.NO_INTERIOR:"");

                console.log(respuesta);
                $('#sup').val(respuesta.SUPERFICIE_TOTAL != undefined ? respuesta.SUPERFICIE_TOTAL:"");

                if (respuesta.COLONIA_ID != undefined) {
                        var col = respuesta.COLONIA_ID.replace("?","Ñ");
                        $('#cbocoloniaui').val(col);
                    }
                    else
                    {
                        $('#cbocoloniaui').val(respuesta.COLONIA_ID != undefined ? respuesta.COLONIA_ID:"");
                    }
//                        alert($('#cbocoloniaui').find('option:selected').text());
                $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                $('#noloteui').val(respuesta.LOTE != undefined ? respuesta.LOTE:"");
                $('#nomanzanaui').val(respuesta.MANZANA != undefined ? respuesta.MANZANA:"");
                $('#categoriapredioui').val(respuesta.TIPO_PREDIO_ID != undefined ? respuesta.TIPO_PREDIO_ID:"");
                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato, Guanajuato");
                var ap = respuesta.APELLIDO_PATERNO != undefined ? respuesta.APELLIDO_PATERNO : "";
                var am = respuesta.APELLIDO_MATERNO != undefined ? respuesta.APELLIDO_MATERNO : "";
//                   var am
                var nombre=respuesta.NOMBRE.substring(respuesta.NOMBRE.length-2,respuesta.NOMBRE.length);
                if(nombre=="CD")
                {
                    var n = respuesta.NOMBRE.replace("?","Ñ");
                    var a1 = ap.replace("?","Ñ");
                    var a2 = am.replace("?","Ñ");
                    $('#nombrepropietariodp').val(n + " " + a1 + " " + a2);
                    //$('#nombrepropietariodp').val(n.substring(0,n.length-2) + "" + ap + " " + am);
                }
                else if(nombre=="DS")
                {
                    var n = respuesta.NOMBRE.replace("?","Ñ");
                    var a1 = ap.replace("?","Ñ");
                    var a2 = am.replace("?","Ñ");
                    $('#nombrepropietariodp').val(n + " " + a1 + " " + a2);
                    //$('#nombrepropietariodp').val(n.substring(0,n.length-3) + "" + ap + " " + am);
                }
                else
                {
                    var n = respuesta.NOMBRE.replace("?","Ñ");
                    var a1 = ap.replace("?","Ñ");
                    var a2 = am.replace("?","Ñ");
                    $('#nombrepropietariodp').val(n + " " + a1 + " " + a2);
                }
                var cod = document.getElementById("cbocoloniaui").value;
                if (cod){

                $('#coloniauno').removeClass('hidden');
                $('#coloniados').addClass('hidden');
                $("#colonia2").removeAttr("required");
                } else{
                $('#cbocoloniaui').val(0);
                $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                $('#coloniados').removeClass('hidden');
                $('#coloniauno').addClass('hidden');
                $("#colonia2").attr("required", "true");
                }
//                    

                initMap();
                } else {
                $('#calleui').val("");
                $('#nooficialui').val("");
                $('#nooficialinui').val("");
                $('#cbocoloniaui').val("0");
                $('#select2-cbocoloniaui-container').html("SELECCIONA UNA OPCION");
                //alert('No se cuenta con registro de la cuenta predial');
                $('#cbocoloniaui').val(0);
                $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                $('#coloniados').removeClass('hidden');
                $('#coloniauno').addClass('hidden');
                $("#colonia2").attr("required", "true");
                }
                }
        });
        }
        } else{
        $('#calleui').val("");
        $('#nooficialui').val("");
        $('#nooficialinui').val("");
        $('#cbocoloniaui').val("0");
        $('#noloteui').val("");
        $('#nomanzanaui').val("");
        $('#select2-cbocoloniaui-container').html("SELECCIONA UNA OPCION");
        //alert('No se cuenta con registro de la cuenta predial');
        $('#cbocoloniaui').val(0);
        $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
        $('#coloniados').removeClass('hidden');
        $('#coloniauno').addClass('hidden');
        $("#colonia2").attr("required", "true");
        }});
    </script>
    <?php if ($ID === "") { ?>
        <script>


            $("#formclave").submit(function(e){
                alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
                $('#solicitar').attr("disabled", true);
                var $this = $('#solicitar');
                $this.button('loading');
            
            });

            function clavesGeneradas()
            {
                if($("#predialui").val() != "APERTURA")
                {
                    $.ajax(
                    {
                        type: 'POST',
                        url: "/VUIRA1.5/servicios/c_clave_individual/cta_predial_vals.php",
                        data: { predialui: $("#predialui").val() },
                        dataType: "text",
                        async: false,
                        success: function(data) 
                        {   
                            data = jQuery.parseJSON(data);

                            if(data.length > 0)
                            {
                                alert("Esta cuenta predial ya fue utilizada a nombre de " + data[0]["nombrepropietariodp"] + ".\nGenerado por: " + data[0]["Iniciales"] + "  Folio: " + data[0]["numerocontrol"]);
                            }
                        }
                    });
                }
            }
        </script>
    <?php } ?>
        
</html> 