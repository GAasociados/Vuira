
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
                    <h2>Clave Catastral Individual con Escritura</h2><br>
  
      
                    
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


                                <div id="panel-numero-seguimiento" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">I. Número de seguimiento</h3>
                                        <div class="bordered-row">
                                           <div class="row">

<div class="row">
                                            <div class="form-group">
                                                <?php if (isset($numerocontrol)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de seguimiento</label>
                                                        <input <?php echo $modificar; ?> readonly=""  type="text" <?php echo $this->session->userdata('tipo') != 15 ? "" : "required" ?> class="form-control" name="numerocontrol" id="numerocontrol" value="<?php echo $numerocontrol ?>"/>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3 ) && isset($fechafinal) != null && isset($numerocontrol)): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="4" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_individual/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Imprimir Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?> 
                                        </div>
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
                                            <div class="form-group hidden" id="datosp">
                                                <h4>Información del solicitante Persona Moral o Física </h4>

                                                <div class="form-group  <?php echo $modificar == "" ? "" : "hidden" ?>" >
                                                    <div class="col-md-12">
                                                        <label>¿Por favor indique que tipo de persona es?</label><br>
                                                        <label>Moral</label>
                                                        <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                    </div>
                                                </div>

                                                <div id="fisrfc" class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Escritura de Compra Venta</label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc" >
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($fisrfc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-4" >

                                                        <label>Documento Acta constitutiva</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota" value="">
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($poder_nota)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $poder_nota; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional)</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine" value="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col-md-4" id="fisrfc">
                                                        <label>Carta Poder Simple emitida por el propietario al solicitante</label>
                                                        <?php if ($modificar == ""): ?>    
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="cartapoder">
                                                        <?php endif; ?>
                                                        <br>
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
                                </div> <!-- DIV PANEL-SEGUIMIENTO 1-->
                                
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
                                                        <input title="Este Número se compone de 12 Digitos o la palabra APERTURA si no se cuenta con un número predial" <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" autocomplete="off"  required="" type="text"  pattern="[A-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial" value="<?php echo $predialui; ?>" maxlength="12"/>
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
                                                            <input <?php echo $modificar; ?>  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  pattern="[A-Za-z0-9  ÁÉÍÓÚÑ-/]+"  class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                        </div>

                                                        <div class=" col-md-6">
                                                            <label for="varchar">Número Exterior *<?php echo form_error('nooficialui') ?></label>
                                                            <input  <?php echo $modificar; ?>  required type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9  -/ÁÉÍÓÚÑ]+" class="form-control" name="nooficialui" id="nooficialui" placeholder="Número Exterior" value="<?php echo $nooficialui; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso5">
                                            <div  class="form-group" >
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número Interior</label>
                                                    <input  <?php echo $modificar; ?>  type="text" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9 -/ÁÉÍÓÚÑ]+"  name="nooficialinui" id="nooficialinui" placeholder="Número Interior  " value="<?php echo $nooficialinui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote*<?php echo form_error('noloteui') ?></label>
                                                    <input  <?php echo $modificar; ?>  type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Za-z0-9 -/]+"  class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote" value="<?php echo $noloteui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana*<?php echo form_error('nomanzanaui') ?></label>
                                                    <input  <?php echo $modificar; ?> type="text"  pattern="[A-Za-z0-9 -/]+" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana" value="<?php echo $nomanzanaui; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso6">
                                            <div class="form-group">

                                                <div class="form-group col-md-6">
                                                    <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>

                                                    <?php if ($modificar == ""): ?>
                                                    <select    class="form-control select2" required=""  title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
                                                        <?php
                                                        if (!empty($cbocoloniaui)):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>
                                                            <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">
                                                                <?php echo strtoupper($arraycolonia->NOMBRE); ?>
                                                            </option>

                                                        <?php endif; ?>

<option value="">
                                                          
                                                            </option>
                                                        <?php foreach ($consulta->result() as $fila) { ?>
                                                            <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                                <?php echo strtoupper($fila->NOMBRE); ?>
                                                            </option>
                                                        <?php } ?>
                                                        </select>
                                                    <?php else: ?>
                                                        <?php
                                                        if (!empty($cbocoloniaui)):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>
                                                            <input <?php echo $modificar; ?> class="form-control" value=" <?php echo strtoupper($arraycolonia->NOMBRE); ?>">

                                                        <?php endif; ?>
                                                    <?php endif; ?>
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
                                
                                <div id="panel-datos-propietario" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">Iii. Datos del Propietario</h3>
                                        <div class="bordered-row">
                                           <div class="row">

<div class="row" >

                                            <div class="form-group">
                                                <div id="paso8" class="col-md-6">
                                                    <label for="varchar">Nombre del Propietario o Razón Social *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input <?php echo $modificar; ?>  required style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" type="text" pattern="[A-Za-z0-9  ÁÉÍÓÚÑ-/]+" class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>


                                            </div>

                                        </div>


                                        <br>
                                        <div class="row" id="paso10">
                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label for="varchar">Correo Electrónico *<?php echo form_error('correonotificacionesdp') ?></label>
                                                    <input  <?php echo $modificar; ?> required type="email"  class="form-control" name="correonotificacionesdp" id="correonotificacionesdp" placeholder="Correo Electrónico" value="<?php echo $correonotificacionesdp != "" ? $correonotificacionesdp : $this->session->userdata('correo'); ?>" />
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
                                                            <!--<option value="4">A SOLICITUD DE PARTE (CERTIFICADA) </option>-->
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-DATOS-PROPIETARIO 1-->
                                
                                 <div id="panel-adjunte-documentos" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                          <?php if($modificar ==""):?>
                                        <h3 class="title-hero">IV. Adjunte los Siguientes Archivos en Original</h3>
                                        <?php else:?>
                                        <h4 class="block"> Documentación del ciudadano</h4>
                                            <?php endif;?>
                                        <div class="bordered-row">
                                           <div class="row">
<div class="row" id=paso12>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <?php if (empty($identificacion)): ?>
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Identificación del propietario (INE, Pasaporte, Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                            <?php if ($modificar == ""): ?>
                                                                <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file"  name="doctoine[]" multiple="" id="doctoine" placeholder="Documento IFE"/>
                                                            <?php endif; ?>

                                                            <?php if (!empty($doctoine)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($identificacion)): ?>
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Identificación del propietario (INE,Pasaporte,Cédula Profesional) *</label>
                                                            <br>
                                                            <?php if (!empty($identificacionar)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-group col-md-4" id="paso13">
                                                        <label for="varchar">Documento legal que acredite la propiedad; debidamente inscrito en el Registro Público de la Propiedad (Con todos sus anexos)*<?php echo form_error('doctolegalpropiedad') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" accept="application/pdf, image/*"  name="doctolegalpropiedad[]" multiple="" id="doctolegalpropiedad" placeholder="Poder Simple en caso de que el Trámite se Realizado por el Representante Legal"/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($doctolegalpropiedad)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?php if (empty($rpredial)): ?>         
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Predial Actualizado*<?php echo form_error('doctopredial') ?></label>
                                                            <?php if ($modificar == ""): ?>
                                                                <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="doctopredial" id="doctopredial" placeholder="Recibo impuesto predial" />
                                                            <?php endif; ?>

                                                            <?php if (!empty($doctopredial)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($rpredial)): ?>         
                                                        <div class="form-group col-md-4">
                                                            <label for="varchar">Predial Actualizado*</label>
                                                            <br>
                                                            <?php if (!empty($rpredialar)): ?>
                                                                <a target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>   

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">

                                                    <div id="otrosdoc" class="form-group col-md-4  <?php echo $otros_doc == 0 ? "hidden" : ' ' ?>">
                                                        <label for="varchar">Adjuntar otra documentación (Si son varios archivo por favor adjuntar un archivo .rar)*<?php echo form_error('otradoc') ?></label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" multiple name="otradoc" id="otrodoc" placeholder=""/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($otradoc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $otradoc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div id="mdocaux1" class="form-group col-md-4  <?php echo $mdocaux1 == 0 ? "hidden" : ' ' ?>">
                                                        <label for="varchar">Adjuntar otra documentación (Si son varios archivo por favor adjuntar un archivo .rar)*</label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" multiple name="mdocaux1" id="mdocaux1" placeholder=""/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($mdocaux1)): ?>
                                                            <a target="_blank"  href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $mdocaux; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            <div class="form-group col-md-12" id="hiddendoctopago">
                                                <div class="form-group col-md-6">
                                                    <?php if (!empty($status)): ?>
                                                        <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                        <br><!--<input type="file" multiple name="doctopago" id="doctopago"/>-->
                                                        <?php if (!empty($doctopago)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopago; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php if (!empty($compro)): ?>
                                                        <label for="varchar" id="parpadear"> <b>Comprobante de pago </b> </label>
                                                        <br>
                                                        <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $compro; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class=" form-group col-md-4" >
                                                    <label for="varchar"> <b>Documento Final </b> <?php echo form_error('doctofinal') ?></label>
                                                    <!--<input type="file" accept=".pdf"  name="doctofinal" id="doctofinal"/>-->
                                                    <?php if (!empty($doctofinal)): ?><br>
                                                        <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctofinal; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                                  
                                              <?php if ($clave): ?>

                                                <div class="col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label for="varcha">Clave Catastral*<?php echo form_error('clave') ?></label> 
                                                        <input type="text" class="form-control" required="" name="clave" placeholder="Clave Catastra" id="clave_cat" maxlength="18" minlength="15">
                                                    </div>  
                                                </div>  

                                            <?php endif; ?>
                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                        </div>
                                     

                                                  <!-- Botones Flotantes --><div class="button-group pull float">
                                         <a href="<?php echo base_url(); ?>claves_catastrales_individual/" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                              </div><!-- Botones Flotantes -->
                                           

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-ADJUNTE-DOCUMENTOS 1-->

                                
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
                                                                $(document).ready(function () {
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
            "next #ayuda": 'Bienvenido al Trámite de Clave Catastral.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona "Siguiente".',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso1": 'Indique seleccionando la casilla si la persona solicitante es el propietario del predio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso3": 'Indique el numero de cuenta predial del inmueble este se encuentra en el recibo predial.<br> en la siguiente sección del recibo:<br><br><img src="<?php echo base_url() . "assets/recpre.png" ?>"><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso2": 'De la siguiente lista por favor seleccione la categoria en la que se encuentra el predio<br>1.- <b>Predio Urbano :</b> ubicados en el área urbana y de cada centro de población que cuenten con acción o acciones de urbanización con excepción de los predios dedicados permanentemente a fines agricolas.<br>2.-<b>Predio Sub-Urbano:</b> Predios ubicados fuera del poligono envolvente del área urbana pero dentro de la mancha urbana de cualquier comunidad, colonia, rancheria o municipio.<br>3.-<b>Predio Rústico:</b> Los que esten dedicados a la explotación de carácter agrícola, ganadera, forestal, de explotación de recursos naturalesy actividades analogas.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso4": 'Para la localizacion de su predio ingrese los siguientes datos como aparecen en el recibo predial.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso5": 'Continuando con la localización del predio, Por favor ingrese los siguientes datos como aparecen en el recibo predial.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso6": 'Por favor selecccione de la siguiente lista de Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido en donde se localiza su predio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso7": '<span style="color:black;" >Por favor indica con el puntero rojo la ubicación de tu predio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso8": '<span style="" >Indique el nombre o razón social del propietario del predio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso9": '<span style="" >Habilita la siguiente casilla si deseas recibir notificaciones del trámite en otro domicilio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso10": 'Verifique que su correo electrónico sea el correcto, y agregue un número de teléfono para notificaciones.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso11": '<br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso11a": 'Para darle un mejor servicio, seleccione para que asunto requiere la Clave Catastral en caso de no se encuentre el motivo deseado por favor seleccione "A SOLICITUD DE PARTE (CERTIFICADA)".<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #paso12": 'Adjunte los documentos originales escaneados en .PDF o Imagenes<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }

            ,
            {
            "next #solicitar": 'De click en el Botón solicitar trámite, aparecerá una notificación de trámite solicitado.<br>De click en "Finalizar" para concluir el tutorial.',
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
                    $('#calleui').val(respuesta.CALLE_ID);
                    $('#nooficialui').val(respuesta.NO_EXTERIOR);
                    $('#nooficialinui').val(respuesta.NO_INTERIO);
                    $('#cbocoloniaui').val(respuesta.COLONIA_ID);
//                        alert($('#cbocoloniaui').find('option:selected').text());
                        $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                    $('#noloteui').val(respuesta.LOTE);
                    $('#nomanzanaui').val(respuesta.MANZANA);
                    $('#categoriapredioui').val(respuesta.TIPO_PREDIO_ID);
                    $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato, Guanajuato");
                    initMap();
                    } else {
                    $('#calleui').val("");
                    $('#nooficialui').val("");
                    $('#nooficialinui').val("");
                    $('#cbocoloniaui').val("0");
                    $('#select2-cbocoloniaui-container').html("SELECCIONA UNA OPCION");
                    }
                    }
            });
            }
            });
        </script>

        
</html> 