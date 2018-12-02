<?php
$identificacion = '';
$rpredial = '';
$nooficial = '';
$identificacionar = '';
$rpredialar = '';
$nooficialar = '';
foreach ($predial->result() as $row) {
    $rpredial .= $row->tipo_documento;
    $rpredialar .= $row->archivo;
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

        <title> Tr&aacute;mites y Servicios </title>
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
                        <a class="sf-with-ul" href="#" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE INDIVIDUAL</h6></span>
                        </a>
                        <a class="sf-with-ul" href="#" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTE  CERTIFICADO.</h6></span>
                        </a>
                        <a class="sf-with-ul" href="#" title="MenU 2">
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
                                    //$modificar = "readonly";
                                    $modificar = "";
                                endif;
                                ?>
                        <button class="btn btn-warning btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()"> 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
                    <h2>Claves Catastrales Fraccionamientos</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                            <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                            
                              <?php if ($modificar != ""): ?>
<!--                                            <h5 class="note note-warning bold">Recuerda dar click en el botón "Guardar" si realizas algún cambio.</h5>-->
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="form-group">
                                              <div class="row" id="paso1" >
                                                <div class="form-group" id="datosimub">
                                                  <div class="form-group col-md-12">
                                                    <!--label for="varchar">¿Eres propietario del inmueble?</label><br><label>Si</label>
                                                    <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                    <label>No</label>
                                                    <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" onclick="javascript:validaNombre(this.checked)" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>
                                                       <label>Nombre del solicitante*<input style="text-transform:uppercase;" required type="text" class="form-control" placeholder="Nombre del Solicitante" name="nombreSolicitante" id="nombreSolicitante"/>
                                                        </label-->
                                                      <label for="varchar">¿Eres propietario del inmueble?</label>
                                                      <label class="radio-inline"><input type="radio" name="ipropietario" value="1" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>>Si</label>
                                                      <label class="radio-inline"><input type="radio" name="ipropietario" value="2" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>>No</label>
                                                      <!--div id="divPropietario" hidden>
                                                          <label>Nombre del solicitante*<input style="text-transform:uppercase;" required type="text" class="form-control" placeholder="Nombre del Solicitante" name="nombreSolicitante" id="nombreSolicitante"/></label>
                                                      </div-->
                                                    <script text="javascript">
                                                      document.forms['datosimub'].nombreSolicitante.disabled=!checkbox;
                                                    </script>
                                                    <br>  <br>
                                                 </div>
                                                </div>
                                                  <div class="form-group" id="datosp">
                                                      <div class="form-group  <?php echo $modificar == "" ? "" : "" ?>" >
                                                          <div class="col-md-12">
                                                              <label>¿Por favor indique que tipo de persona es?</label><br>
                                                              <label>Moral</label>
                                                              <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                              <label>Física</label>
                                                              <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <div class="col-md-12">
                                                              <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                          </div>
                                                      </div>

                                                      <div id="fisrfc" class="col-md-12">
                                                          <div class="col-md-4" >
                                                              <label>Escritura de Compra Venta</label>
                                                              <?php if ($modificar == ""): ?>
                                                                  <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc[]" multiple="">
                                                              <?php endif; ?> <br>
                                                              <?php if (!empty($fisrfc)): ?>
                                                                  <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>">Visualizar Documento</a>
                                                              <?php endif; ?>
                                                              <br>
                                                          </div>
                                                          <div class="col-md-4" >
                                                              <label>Documento Acta constitutiva</label>
                                                              <?php if ($modificar == ""): ?>
                                                                  <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const[]" multiple="">
                                                              <?php endif; ?> <br>
                                                              <?php if (!empty($acta_const)): ?>
                                                                  <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $acta_const; ?>">Visualizar Documento</a>
                                                              <?php endif; ?>
                                                          </div>
                                                          <div class="col-md-4" >
                                                              <label>Poder Notarial para representación de persona moral</label>
                                                              <?php if ($modificar == ""): ?>
                                                                  <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota[]" multiple="">
                                                              <?php endif; ?>
                                                              <br>
                                                              <?php if (!empty($poder_nota)): ?>
                                                                  <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $poder_nota; ?>">Visualizar Documento</a>
                                                              <?php endif; ?>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                          <div class="col-md-4" >
                                                              <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
                                                              <?php if ($modificar == ""): ?>
                                                                  <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="" required>
                                                              <?php endif; ?> <br>
                                                              <?php if (!empty($morine)): ?>
                                                                  <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>">Visualizar Documento</a>
                                                              <?php endif; ?>
                                                          </div>
                                                      </div>
                                                  </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3 ) && isset($fechafinal) != null && isset($numerocontrol)): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="4" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_fraccionamiento/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Imprimir Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?> 
                                            <div class="form-group hidden" id="datosp">
                                                <div class="form-group  <?php echo $modificar == "" ? "" : "" ?>" >
                                                    <div class="col-md-12">
                                                        <label>Por favor indique que tipo de persona es</label><br>
                                                        <label>Moral</label>
                                                        <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                        <br>   <br>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h4  class="block bold">Información del solicitante Persona Moral o Física</h4>
                                                    </div> 
                                                </div>

                                                <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                    <div class="form-group">
                                                        <div class="col-md-12">

                                                            <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                        </div> 
                                                    </div>

                                                <?php endif; ?>


                                                <div id="fisrfc" class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Escritura de Compra Venta </label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc[]" multiple="" required>
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($fisrfc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $fisrfc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-4" >

                                                        <label>Documento Acta constitutiva </label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const[]" multiple="" required>
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota[]" multiple="" required>
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($poder_nota)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $poder_nota; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="" required>
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                  <div id="panel-" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">I. Identificación y Ubicación del Inmueble</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                             <?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 3): ?>
                                              <div class="row">
                                                <div class="form-group">
                                                  <div class="form-group col-md-4">
                                                        <label for="varchar">Número de seguimiento</label>
                                                        <input <?php echo $modificar; ?>  type="text" class="form-control"  placeholder="Número de control" name="numerocontrol" id="numerocontrol" value="<?php echo $numerocontrol ?>"/>
                                                  </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Cantidad de Claves a Generar</label>
                                                        <input  type="number" class="form-control" required="" min="1" placeholder="Total de Claves" name="cantidad" id="cantidadporpago"  max='999' value="<?php echo $cantidad ?>"/>
                                                    </div>
                                                </div>

                                               </div>
                                             <?php endif; ?>
                                             


                                        <div class="row"> 
                                            <div class="form-group">

                                                <div class="form-group col-md-4">
                                                    <div id="paso2">
                                                        <label for="varchar">Cuenta Predial *<?php echo form_error('predialui') ?></label>
                                                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"   required type="text" pattern="[a-zA-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial " value="<?php echo $predialui; ?>" maxlength="12"/>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8" id="paso3">
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                        <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  required type="text"  class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Exterior  *<?php echo form_error('nooficialui') ?></label>
                                                        <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"   required type="text" pattern="[a-zA-Z0-9 -/]+" class="form-control" name="nooficialui" id="nooficialui" placeholder="Número Exterior" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Interior</label>
                                                        <input autocomplete="off"   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text" pattern="[a-zA-Z0-9 -/]+" class="form-control" name="nooficialuin" id="nooficialuin" placeholder="Número Interior" value="<?php echo $nooficialuin; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        </div>
                                     </div>
                                        
                                        <div class="row" id="paso4"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote*<?php echo form_error('noloteui') ?></label>
                                                    <input autocomplete="off"   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"   pattern="L-[0-9A-Z]+" type="text" class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote"  title="El formato de este campo es (L-Número)" value="<?php echo $noloteui; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana*<?php echo form_error('nomanzanaui') ?></label>
                                                    <input  autocomplete="off"   style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  pattern="M-[0-9A-Z]+" type="text" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana"  title="El formato de este campo es (M-Número)" value="<?php echo $nomanzanaui; ?>" />
                                                </div>


                                                <div id="coloniauno" class="form-group col-md-6">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>


                                                    <select    class="form-control select2" required=""  title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui">
                                                    <?php
                                                    if ($cbocoloniaui != ""):

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

                                                </div>

                                                <div id="coloniados" class="form-group col-md-5 hidden">
                                                    <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>
                                                    <input <?php
                                                    echo $coloniados != "" ? "required" : "";
                                                    ;
                                                    ?>  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text"   id="colonia2" name="colonia2" placeholder="Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido " class="form-control" value="<?php echo $coloniados; ?>">
                                                </div>



                                            </div>
                                        </div>

                                        <div class="row" id="paso5"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <h4>
                                                        En caso de que la ubicación mostrada en el mapa no coincida con la dirección capturada,
                                                        usted puede mover el punto de ubicación color rojo al lugar deseado.
                                                    </h4>
                                                    <label for="varchar"> <?php echo form_error('mapa') ?></label>
                                                    <?php if (!empty($mapa)) { ?>
                                                        <input id="address" required type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                                    <?php } else { ?>
                                                        <input id="address" required type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
                                                    <?php } ?>
                                                    <!--
                                                    <input id="buscardir" type="button" value="Buscar Dirección" class="btn btn-success">
                                                    -->
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <!--
                                                    <h3>Presiona el botón "Busca tu Dirección" para localizar tu ubicación en el mapa.</h3>
                                                    -->
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
                                </div> <!-- DIV PANEL- -->
                                
                                <div id="panel-" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">II. Datos del Propietario y/o Representante</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                            <div class="row"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-4" id="paso6">
                                                    <label for="varchar">Nombre Completo del Propietario *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre Completo del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>


                                            </div>
                                        </div>


                                        <div class="row" >
                                            <br>
                                            <div class="form-goup">
                                                <div class="form-group "  id="paso9">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Correo Electrónico *<?php echo form_error('correodp') ?></label>
                                                        <input  <?php echo $modificar; ?> required type="email" class="form-control" name="correodp" id="correodp" placeholder="Correo Electrónico" value="<?php echo $correodp != "" ? $correodp : $this->session->userdata('correo'); ?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Teléfono *<?php echo form_error('telefonodp') ?></label>
                                                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" <?php echo $modificar; ?>  maxlength="10" required pattern="[0-9]{7,13}" type="text" class="form-control" name="telefonodp" id="telefonodp" placeholder="Teléfono" value="<?php echo $telefonodp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4" id="paso9a">
                                                    <label for="int">Tipo de Trámite que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                    <select style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" <?php echo $modificar; ?> required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">

                                                        <?php if ($tipotramitedp == 1) { ?>
                                                            <option value="1">Asignación de Claves Catastrales</option>
                                                            <option value="2">Modificación de Clave Catastrales</option>
                                                        <?php } else { ?>


                                                            <option value="2">Modificación de Clave Catastrales</option>
                                                            <option value="1">Asignación de Claves Catastrales</option>
                                                        <?php } ?>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL- -->
                                
                                <div id="panel-" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">III. Adjunte los Siguientes Archivos Escaneados en Original</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                          
                                            <div class="form-group">
                                                <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file" multiple name="doctoine[]" id="doctoine" placeholder="doctoine" required/>
                                                        <?php endif; ?>  
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoine; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                             
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Acta Constitutiva o Poder Simple *<?php echo form_error('doctopodersimple') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctopodersimple[]" id="doctopodersimple" placeholder="doctopodersimple" required/>
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctopodersimple)): ?><br>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopodersimple; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctoplanodigital') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctoplanodigital[]" id="doctoplanodigital" placeholder="doctoplanodigital" required/>
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctoplanodigital)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanodigital; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctooficio') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctooficio[]" id="doctooficio" placeholder="doctooficio" required/>
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctooficio)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctooficio; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php echo form_error('doctoplanofisico') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctoplanofisico[]" id="doctoplanofisico" placeholder="doctoplanofisico" required/>

                                                    <?php endif; ?>
                                                    <?php if (!empty($doctoplanofisico)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanofisico; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if (empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *<?php echo form_error('doctopredial') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file" multiple name="doctopredial[]" id="doctopredial" placeholder="doctopredial" required/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopredial; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>

                                               
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="varchar">Escritura Pública de Propiedad que contenga la Foja Registral y ampare la Superficie Registrada (en caso de no contener la foja registral anexar copia de Libertad de Gravamen) *<?php echo form_error('doctolegal') ?></label>
                                                <?php if ($modificar == ""): ?>
                                                    <input type="file" multiple name="doctolegal[]" id="doctolegal" placeholder="doctolegal" reuired/>
                                                <?php endif; ?>
                                                <?php if (!empty($doctolegal)): ?>
                                                    <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctolegal; ?>">Descargar</a>
                                                <?php endif; ?>
                                            </div>



                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                        </div>
                                        <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                            <div class="row">
                                                <?php if ($this->session->userdata('tipo') == 155 || $this->session->userdata('tipo') == 1555): ?>

                                                    <div class="row"> 
                                                        <div class="form-group col-md-4">
                                                            <a data-target="#full" data-toggle="modal" class="btn btn-success"><b>Generar Documento Final</b></a>
                                                        </div>     
                                                       
                                                        <div class="form-group col-md-4" >
                                                            <a data-target="#fullnega" data-toggle="modal" class="btn btn-danger"><b>Generar Documento Negación</b></a>
                                                        </div>   
                                                         

                                                    </div>
                                                <div class="row">
                                                <div class="col-md-4" >
                                                            <label for="varchar"> <b>Documento Final *</b> <?php echo form_error('doctofinal') ?></label>
                                                            <input type="file" accept=".pdf"  name="doctofinal" id="doctofinal"/>
                                                         
                                                            <?php if (!empty($doctofinal)): ?>
                                                            <a target="_blank"  href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctofinal; ?>">Visualizar Documento</a>
                                                            <?php endif; ?>

                                                        </div>
                                                        <div class="col-md-4" >
                                                            <label for="varchar"> <b>Documento AutoCAD</b> </label>
                                                            <input type="file" multiple name="autocat[]" id="autocad"/>

                                                            <?php if (!empty($autocat)): ?>
                                                                <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $autocat; ?>">Descargar</a>
                                                            <?php endif; ?>

                                                        </div>
                                                </div>
                                                    <br >
                                                    <div class="row"> 
                                                        <?php if (1 == 1): ?>
                                                            <div class="form-group col-md-4">
                                                                <a target="_blank" class="btn btn-success" href="<?php echo base_url() . 'docstramites/documentoanuncio/documentopagofraccionamiento/' . $ID ?>"><b>Descargar Plantilla de Pago</b></a>
                                                            </div>
                                                            <div class="form-group col-md-4" >
                                                                <?php if (!empty($status)): ?>
                                                                    <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                                    <!--<input type="file" multiple name="doctopago[]" id="doctopago"/>-->
                                                                    <br>  <?php if (!empty($doctopago)): ?>
                                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopago; ?>">Descargar</a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div> 
                                                <?php endif; ?>
                                                <?php if ($valido_pago == 1): ?>
                                                    <div class="col-md-12">
                                                        <h5 class="note note-success  bold" style=" background-color:rgba(0,255,0,0.3); ">El Trámite ya ha sido pagado.</h5>

                                                    </div>

                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="mensaje">Mensaje <?php echo form_error('mensaje') ?></label>
                                                        <textarea  class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                                    </div>
                                                </div>
                                                <?php if ($this->session->userdata('tipo') == 15): ?>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="form-group col-md-4">
                                                                <label for="tinyint">Estatus <?php echo form_error('status') ?></label>
                                                                <select class="form-control" name="status" id="status">
                                                                    <?php if ($status == 1): ?>
                                                                        <option value = "1">Iniciado</option>
                                                                        <option value = "2">En Revisión de Información</option>
                                                                        <option value = "3">Trámite en Proceso</option>
                                                                        <option value = "4">En Espera de Pago</option>
                                                                        <option value = "5">Cancelado</option>
                                                                        <!--<option value = "6">Terminado</option>-->
                                                                    <?php endif; ?>

                                                                    <?php if ($status == 2): ?>
                                                                        <option value = "2">En Revisión de Información</option>
                                                                        <option value = "1">Iniciado</option>
                                                                        <option value = "3">Trámite en Proceso</option>
                                                                        <option value = "4">En Espera de Pago</option>
                                                                        <option value = "5">Cancelado</option>
                                                                        <!--<option value = "6">Terminado</option>-->
                                                                    <?php endif; ?>

                                                                    <?php if ($status == 3): ?>
                                                                        <option value = "3">Trámite en Proceso</option>
                                                                        <option value = "1">Iniciado</option>
                                                                        <option value = "2">En Revisión de Información</option>
                                                                        <option value = "4">En Espera de Pago</option>
                                                                        <option value = "5">Cancelado</option>
                                                                        <!--<option value = "6">Terminado</option>-->
                                                                    <?php endif; ?>

                                                                    <?php if ($status == 4): ?>
                                                                        <option value = "4">En Espera de Pago</option>
                                                                        <option value = "1">Iniciado</option>
                                                                        <option value = "2">En Revisión de Información</option>
                                                                        <option value = "3">Trámite en Proceso</option>
                                                                        <option value = "5">Cancelado</option>
                                                                        <?php if ($valido_pago == 1): ?>
                                                                            <option value = "6">Terminado</option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>

                                                                    <?php if ($status == 5): ?>
                                                                        <option value = "5">Cancelado</option>
                                                                        <option value = "1">Iniciado</option>
                                                                        <option value = "2">En Revisión de Información</option>
                                                                        <option value = "3">Trámite en Proceso</option>
                                                                        <option value = "4">En Espera de Pago</option>
                                                                        <!--<option value = "6">Terminado</option>-->
                                                                    <?php endif; ?>

                                                                    <?php if ($status == 6): ?>
                                                                        <option value = "6">Terminado</option>
                                                                        <!--                                                                        <option value = "1">Iniciado</option>
                                                                                                                                                <option value = "2">En Revisión de Información</option>
                                                                                                                                                <option value = "3">Trámite en Proceso</option>
                                                                                                                                                <option value = "4">En Espera de Pago</option>
                                                                                                                                                <option value = "5">Cancelado</option>-->
                                                                    <?php endif; ?>

                                                                </select>
                                                            </div>

                                                        </div>
                                                        <?php if ($this->session->userdata('tipo') == 15 && $usuarioID == $this->session->userdata('id') && $fechafinal == null): ?>
                                                            <div class="form-group">
                                                                <div id="generartalon" class="form-group col-md-4">
                                                                    <a ID="1" class="btn btn-primary btn-lg" data-target="#talon" data-toggle="modal"><i class="fa fa-check"></i> Generar Talón</a>
                                                                </div>
                                                            </div>

                                                        <?php endif; ?>
                                                        <?php if ($this->session->userdata('tipo') == 15 && $usuarioID == $this->session->userdata('id') && $fechafinal != null): ?>
                                                            <div class="form-group">
                                                                <div id="generartalon" class="form-group col-md-4">
                                                                    <a ID="2" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_fraccionamiento/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Generar Talón</a>
                                                                </div>
                                                            </div>

                                                        <?php endif; ?>
                                                        <?php if ($this->session->userdata('tipo') == 15 && $usuarioID != $this->session->userdata('id') && $fechafinal == null): ?>
                                                            <div class="form-group">
                                                                <div id="generartalon" class="form-group col-md-4">
                                                                    <a ID="3" class="btn btn-primary btn-lg" data-target="#talon" data-toggle="modal"><i class="fa fa-check"></i> Generar Talón</a>    
                                                                </div>
                                                            </div>

                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php } ?>
                                            <div class="row">
                                                <?php if ($this->session->userdata('tipo') == 1555): ?>
                                                    <div class="col-md-12">



                                                        <div class="form-group col-md-3">
                                                            <a data-target="#full" data-toggle="modal" class="btn btn-success">Generar Documento Clave catastral</a>
                                                        </div>   
                                                    </div>   
                                                <?php endif; ?>
                                                <div class="col-md-12">
                                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                    <div class="form-group">
                                                        <button type="submit" id="solicitar" class="btn btn-success glyph-icon icon-check">Aceptar Tramite</button>
                                                        <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                            <a class="btn btn-success" href="<?php echo base_url() . "claves_catastrales_fraccionamiento/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                        <?php endif; ?>
                                                        <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                                            <a href="<?php echo base_url(); ?>claves_catastrales_fraccionamiento" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_fraccionamiento" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL- -->
                                
                                <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos del Documento Final</h4>
                        <label>Guía para recortar imagen de word <a target="_blank" href="https://support.microsoft.com/es-mx/help/13776/windows-use-snipping-tool-to-capture-screenshots">Aquí</a></label>
                    </div>
                    <div class="modal-body">
                        <form  target="_blank"  action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalfraccionamiento_vista" method="post">

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="form-group col-md-12" >
                                        <div class="form-group" >
                                            <h4>Complete los campos marcados con(*)</h4>
                                        </div>
                                        <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                        <table class="table table-bordered" border="1">
                                            <tbody id="main-table">
                                                <tr>
                                                    <td>
                                                        <h5>Documentos</h5>
                                                        <!--                                                        <div class="form-group">
                                                        <?php if ($otradoc): ?>
                                                                                                                                                                                            <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $otradoc; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                        <?php endif; ?>
                                                        <?php if ($mdocaux1): ?>
                                                                                                                                                                                            <a class="btn btn-primary"  style="margin-bottom: 5px; "target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $mdocaux1; ?>"><i class="fa fa-file"></i> Ver Otra Documentación</a>
                                                        <?php endif; ?>
                                                        <?php if ($rpredialar): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>"><i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?></a>
                                                        <?php endif; ?>
                                                        <?php if ($doctopredial): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctopredial; ?>" title="Visualizar Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?>"><i class="fa fa-file"></i> Recibo Predial <?php echo $predialso == "" ? "Propietario" : "Solicitante"; ?></a>
                                                        <?php endif; ?>
                                                        <?php if ($doctolegalpropiedad): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctolegalpropiedad; ?>" title="Visualizar Documneto De Propiedad"><i class="fa fa-file"></i> Documento De Propiedad</a>
                                                        <?php endif; ?>
                                                        <?php if ($identificacionar): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                        <?php endif; ?>   
                                                        <?php if ($morine): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>" title="Visualizar Indetificacion de Propietario "><i class="fa fa-file"></i> Identificación Propietario</a>
                                                        <?php endif; ?>
                                                        <?php if ($doctoine): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $doctoine; ?>" title="Visualizar Indetificacion de <?php echo $morine == "" ? "Propietario" : "Solicitante" ?> "><i class="fa fa-file"></i> Identificación <?php echo $morine == "" ? "Propietario" : "Solicitante" ?></a>
                                                        <?php endif; ?>
                                                        <?php if ($cartapoder): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $cartapoder; ?>" title="Visualizar Carta Poder"><i class="fa fa-file"></i> Carta Poder</a>
                                                        <?php endif; ?>  
                                                        <?php if ($predialso): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; "  target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $predialso; ?>" title="Visualizar Predial Propietario"><i class="fa fa-file"></i>Recibo Predial Propietario</a>
                                                        <?php endif; ?>
                                                        <?php if ($fisrfc): ?>
                                                                                                                                                                                            <a class="btn btn-primary" style="margin-bottom: 5px; " target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>" title="Escritura Compra-Venta"><i class="fa fa-file"></i> Escritura Compra-Venta</a>
                                                        <?php endif; ?>
                                                                                                                </div>-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Nombre del propietario *</label>
                                                                <input required name="" placeholder="Nombre" readonly class="form-control" value="<?php echo $nombrepropietariodp; ?>"/>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> En Su Caracter  *</label>
                                                                <!--input  autocomplete="off"  value="<?php echo $caracter; ?>" required name="caracter"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 ,.-/]+"  placeholder="caracter " value="" class="form-control" /-->
                                                                <select class="form-control" style="text-transform: uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" tabindex="-1" required name="caracter" >
                                                                    <?php if($caracter): ?>
                                                                        <option value="<?php echo $caracter; ?>"><?php echo $caracter; ?></option>
                                                                    <?php else: ?>
                                                                        <option value="Propietario">Propietario</option>
                                                                    <?php endif; ?>
                                                                    <option value="Co-Propietarios">Copropietarios</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar">Co-propietario Nombre </label>
                                                                <input  autocomplete="off"   value="<?php echo $copro; ?>" name="coop" title="Ingrese el nombre del co-propietario si es necesario" placeholder="Nombre Co-propietario"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .,-/]+"  value="" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Número de Escritura Pública *</label>
                                                                <input  autocomplete="off"   value="<?php echo $noescri; ?>" required  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-,/]+"  name="no_escritura" placeholder="Número Escritura" value="" class="form-control" value=""/>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label for="date">Fecha de escrituras *</label>
                                                                <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                                    <input  value="<?php
                                                                    if ($fechaesc) {
                                                                        $phpdate = strtotime($fechaesc);
                                                                        $mysqldate = date('d-m-Y', $phpdate);
                                                                        echo $mysqldate;
                                                                    }
                                                                    ?>"  class="form-control" placeholder="fecha de escrituras" required type="text" readonly="" name="fecha_escritura" ><span class="input-group-btn">
                                                                        <button class="btn btn-primary btn-outline" type="button">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </button>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="varchar"> Superficie del terreno *</label>
                                                                <input  autocomplete="off"  value="<?php echo $supsiac; ?>" required name="sup" placeholder="superficie"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .,-/]+"  value="" class="form-control" />
                                                            </div>
                                                            <div  class="form-group col-md-2">
                                                                <label for="varchar">Superfice</label><br>

                                                                m² <input <?php echo $supciact == 1 ? 'checked' : ""; ?>  required="" value="m²" name="tipo_sup" type="radio">  ha<input <?php echo $supciact == 2 ? 'checked' : ""; ?>  required value="ha" name="tipo_sup" type="radio">

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="varchar"> Nombre del notario público *</label>
                                                                <input  autocomplete="off"  value="<?php echo $notario; ?>" required  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 .-,/ÑÁÉÍÓÚ]+"  name="notario" placeholder="Nombre del Notario Público " value="" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar">Número de notario público *</label>
                                                                <input  autocomplete="off"  value="<?php echo $nonotario; ?>" required name="no_notario" placeholder="Número de Notario Público" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -,./]+"   value="" class="form-control" />
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="varchar">Estado de Escritura*</label>
                                                                <select class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  tabindex="-1" required name="estado" >
                                                                    <?php if ($estado): ?>
                                                                        <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
                                                                    <?php else: ?>
                                                                        <option value="Guanajuato">Guanajuato</option>
                                                                    <?php endif; ?>

                                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                                    <option value="Baja California">Baja California</option>
                                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                                    <option value="Campeche">Campeche</option>
                                                                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                                                    <option value="Colima">Colima</option>
                                                                    <option value="Chiapas">Chiapas</option>
                                                                    <option value="Chihuahua">Chihuahua</option>
                                                                    <option value="Ciudad de México">Ciudad de México</option>
                                                                    <option value="Durango">Durango</option>
                                                                    <option value="Guerrero">Guerrero</option>
                                                                    <option value="Hidalgo">Hidalgo</option>
                                                                    <option value="Jalisco">Jalisco</option>
                                                                    <option value="Estado de México">Estado de México</option>
                                                                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                                                    <option value="Morelos">Morelos</option>
                                                                    <option value="Nayarit">Nayarit</option>
                                                                    <option value="Nuevo León">Nuevo León</option>
                                                                    <option value="Oaxaca">Oaxaca</option>
                                                                    <option value="Puebla">Puebla</option>
                                                                    <option value="Querétaro">Querétaro</option>
                                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                                                    <option value="Sinaloa">Sinaloa</option>
                                                                    <option value="Sonora">Sonora</option>
                                                                    <option value="Tabasco">Tabasco</option>
                                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                                    <option value="Veracruz">Veracruz</option>
                                                                    <option value="Yucatán">Yucatán</option>
                                                                    <option value="Zacatecas">Zacatecas</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar">Ciudad de Escritura *</label>
                                                                <input autocomplete="on" value="<?php echo ($ciudad) ? $ciudad:'IRAPUATO'; ?>" required name="ciudad" placeholder="Ciudad De Escritura" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -.,/ÑÁÉÍÓÚ]+" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Clave Catastral *</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" aria-label=""  autocomplete="off"  value="<?php echo $clave; ?>" pattern="[0-9]{15,18}" required id="clavenueva" name="clave" placeholder="Clave Catastral" class="form-control" value="<?php echo $clave == "" ? "017" : $clave; ?>" maxlength="18" minlength="15"/>
                                                                        <span class="input-group-addon">
                                                                            <a title="Dar click para buscar si la clave ya esta registrada" id="check-clave" class=" btn-md success"><i class="fa fa-search"></i></a>
                                                                        </span>
                                                                    </div>  
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="varchar"> Número de expediente *</label>
                                                                <input  autocomplete="off"  readonly=""  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 -.,/]+"  required name="numero_exp" placeholder="Número de Expediente " value="<?php echo $numerocontrol; ?>" class="form-control" />
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="varchar">Número de Oficio *</label>
                                                                <input  autocomplete="off"   value="<?php echo $nooficio; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" pattern="[A-Z0-9 ,-./]+"  required name="numero_doc" placeholder="Número de Oficio " value="" class="form-control" />
                                                            </div>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group col-md-12">
                                                            <label>Por favor indicar si la propiedad se encuentra en régimen</label><br>
                                                            <input <?php echo $areap == 1 ? 'checked' : ""; ?> type="checkbox" name="Privativa" id ="priv" value="Área Privativa"> Área Privativa <input autocomplete="off"   name="Privativat" id="privt" class="<?php echo $areap == 1 ? '' : "hidden"; ?>" type="text" value="<?php echo $areapt; ?>"><br>
                                                            <input <?php echo $areac == 1 ? 'checked' : ""; ?> type="checkbox" name="Comun" id ="com" value="Área Común"> Área Común <input autocomplete="off"   name="Comunt" id="comt" class="<?php echo $areac == 1 ? '' : "hidden"; ?>" type="text" value="<?php echo $areact; ?>"><br>
                                                            <input <?php echo $acc == 1 ? 'checked' : ""; ?>  type="checkbox" name="Cubiertac" id="Cub"  value="Área Común Cubierta"> Área Común Cubierta  <input autocomplete="off"   name="Cubiertat" id="Cubt" class="<?php echo $acc == 1 ? '' : "hidden"; ?>" type="text"  value="<?php echo $acct; ?>"><br>
                                                            <input <?php echo $acd == 1 ? 'checked' : ""; ?> type="checkbox" name="Cubiertad" id="Cub1"  value="Área Común Descubierta"> Área Común Descubierta  <input  autocomplete="off"  name="Cubiertatd" id="Cubt1" class="<?php echo $acd == 1 ? '' : "hidden"; ?>" type="text" value="<?php echo $acdt; ?>"><br>
                                                            <input <?php echo $totalind == 1 ? 'checked' : ""; ?> type="checkbox" name="indivisot" id="indt" value="Total Indiviso"> Total Indiviso <input autocomplete="off"   name="indivisott" id="indtt" class="<?php echo $totalind == 1 ? '' : "hidden"; ?>" type="text" value="<?php echo $totalindt; ?>"><br>
                                                            <input <?php echo $porcent == 1 ? 'checked' : ""; ?>  type="checkbox" name="Indivisop" id="indp"  value="Porcenta">Porcentaje Indiviso <input  autocomplete="off"  name="Indivisopt" id="indpt" class="<?php echo $porcent == 1 ? '' : "hidden"; ?>" type="text"  value="<?php echo $porcentt; ?>"><br>
                                                            <script>
                                                                $("#priv").on("click", function () {
                                                                if ($("#privt").hasClass('hidden')) {
                                                                $("#privt").removeClass('hidden');
                                                                } else {
                                                                $("#privt").addClass('hidden');
                                                                $("#privt").val("");
                                                                }
                                                                });

                                                               $("#com").on("click", function () {
                                                                if ($("#comt").hasClass('hidden')) {
                                                                $("#comt").removeClass('hidden');
                                                                } else {
                                                                $("#comt").addClass('hidden');
                                                                $("#comt").val("");
                                                                }
                                                                });

                                                                $("#Cub").on("click", function () {
                                                                if ($("#Cubt").hasClass('hidden')) {
                                                                $("#Cubt").removeClass('hidden');
                                                                } else {
                                                                $("#Cubt").addClass('hidden');
                                                                $("#Cubt").val("");
                                                                }
                                                                });
                                                                $("#Cub1").on("click", function () {
                                                                if ($("#Cubt1").hasClass('hidden')) {
                                                                $("#Cubt1").removeClass('hidden');
                                                                } else {
                                                                $("#Cubt1").addClass('hidden');
                                                                $("#Cubt1").val("");
                                                                }
                                                                });
                                                                $("#indt").on("click", function () {
                                                                if ($("#indtt").hasClass('hidden')) {
                                                                $("#indtt").removeClass('hidden');
                                                                } else {
                                                                $("#indtt").addClass('hidden');
                                                                $("#indtt").val("");
                                                                }
                                                                });
                                                                $("#indp").on("click", function () {
                                                                if ($("#indpt").hasClass('hidden')) {
                                                                $("#indpt").removeClass('hidden');
                                                                } else {
                                                                $("#indpt").addClass('hidden');
                                                                $("#indpt").val("");
                                                                }
                                                                });
                                                            </script>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group col-md-12">
                                                            <h5>Observaciones</h5>
                                                            <textarea rows="5" class="col-md-12" name="observaciones" style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" ><?php echo $observaciones; ?></textarea>
                                                        </div>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="container-fluid">
                                <div class="pull-right">
                                    <button class="btn btn-success">Generar Documento </button>

                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                                </div>
                            </div>
                        </form>
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
        <!-- MAPA -->
        <script>
                                                                $(document).ready(function () {
 
//setTimeout( function() { $('.loader').show(); }, 1000 );
//setTimeout( function() { $('.loader').hide(); 
//     $('#content').hide();
//    }, 4000 );
                                                                setTimeout(function () {
                                                                var colonia = $('#cbocoloniaui').val();
                                                                if (colonia == 0 && colonia != "") {
                                                                $('#coloniados').removeClass('hidden');
                                                                $('#coloniauno').addClass('hidden');
                                                                }
                                                                }, 100);
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
                                                                $('#nooficialui').keyup(function () {
                                                                //geocodeAddress(geocoder, map);
                                                                //nooficial
                                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val()+""+$('#cbocoloniaui').find('option:selected').text() + " Irapuato,Guanajuato");
                                                                initMap();
                                                                //calleui
                                                                });
                                                                $('#calleui').keyup(function () {
                                                                //geocodeAddress(geocoder, map);
                                                                //nooficial
                                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val()+""+$('#cbocoloniaui').find('option:selected').text() + " Irapuato,Guanajuato");
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
        </script>
        <script>
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

            $(document).ready(function () {

                $('input[type=radio][name=ipropietario]').change(function() {
                    if ($(this).val() == 1) {

                        $("#divPropietario").hide();
                        //$("#delete").attr("hidden","true");
                    }
                    else if ($(this).val() == 2) {
                        $("#divPropietario").show();
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

            if ($('#ipropietariosi').is(':checked')) {
                    $("#ipropietariono").prop('checked', false);
                    
                } else if ($('#ipropietariono').is(':checked')) {
                    
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
                    $("#ipropietariono").prop('checked', false);    
                } else {
                    $("#ipropietariono").prop('checked', true);
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
            $(document).ready(function () {
            Dropzone.options.subir = {

            maxFiles: 1,
                    acceptedFiles: "image/*",
                    init: function () {

                    this.on("removedfile", function (file) {
                    $('#clear-dropzone').addClass("hidden");
                    });
                    this.on("addedfile", function (file) {
                    $('#mensaje').addClass("hidden");
                    $(".dz-success-mark").addClass("hidden"); //dz-error-mark
                    $(".dz-error-mark").addClass("hidden"); //dz-error-mark
                    });
                    this.on("success", function (file, responseText) {
                    alert(responseText);
                    });
                    this.on('sendingmultiple', function (data, xhr, formData) {
                    //                        formData.append("Username", $("#Username").val());
                    });
                    this.on("complete", function (file) {
                    $('#clear-dropzone').removeClass("hidden");
                    });
                    var _this = this;
                    // Setup the observer for the button.
                    document.querySelector("button#clear-dropzone").addEventListener("click", function () {
                    // Using "_this" here, because "this" doesn't point to the dropzone anymore
                    _this.removeAllFiles();
                    $('#mensaje').removeClass("hidden");
                    // If you want to cancel uploads as well, you
                    // could also call _this.removeAllFiles(true);
                    });
                    }
            };
            });
        </script>
        <script>

            function iniciarAyuda() {

            var enjoyhint_instance = new EnjoyHint({});
            var enjoyhint_script_steps = [
            {
            "next #ayuda": 'Bienvenido al Trámite de Clave Catastral Fraccionamiento.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona "Siguiente".',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso1": 'Para Comenzar indicar si la persona solicitante es el propietario del inmueble .<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso2": 'Indique el numero de cuenta predial del inmueble este se encuentra en el recibo predial.<br> en la siguiente sección del recibo:<br><br><img src="<?php echo base_url() . "assets/recpre.png" ?>"><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso3": 'Ingrese los datos de localización del predio tal como aparecen en el recibo predial.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso4": 'Indique los siguientes datos del predio como aparecen en el recibo predial<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso5": '<span style="color:black;" >Por favor indica con el puntero rojo la ubicación de tu predio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso6": 'Indique el nombre completo del propietario del predio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            
                    
            {
            "next #paso9a": '<br>Seleccione el tipo de trámite que solicita.<br><ul><li>Asignación de Clave Catastral: Cuando se requiere obtener la Clave Catastral por primera vez.</li><li>Modificación de Clave Catastral: Cuando la Clave Catastral requiere algún cambio.</li><li>Duplicado de Clave Catastral: en caso de requerirse un duplicado de la Clave.</li></ul><br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso10": '<span style="color:black;">Adjunte los documentos originales escaneados en archivos .PDF o Imagenes.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #solicitar": 'Cuando usted haya capturado todos los datos de click en Solicitar Trámite,<br> a continuación se guardaran los datos capturados <br>y se notificará via correo electrónico cualquier actualización del trámite.<br>De click en "Finalizar" para concluir el tutorial..',
                    "nextButton": {text: "Finalizar"},
                    showSkip: false
            }

            ];
            enjoyhint_instance.set(enjoyhint_script_steps);
            enjoyhint_instance.run();
            }
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
                     alert("Las claves se generaran de manera automatica");
                      var cant = parseInt ($('#cantidadporpago').val());
                        var clave = $('#clavenueva').val().split('');
                             if( cant < 1000){
                        $('#main-table').append('<tr class="hidden"><td><ul id="lista-claves"></ul></td></tr>');
                      
                        var puntero  = 1 ;
                       
                        for(i=0; i<cant ; i++ ){
                            var num =  parseInt(clave[clave.length-puntero]);
                            if( num+1==10){
                                clave[clave.length-puntero] = "0";
                                                              
                               num1 =  parseInt(clave[clave.length-(puntero+1)]);
                               if(num1+1==10){
                                   
                                     num2 =  parseInt(clave[clave.length-(puntero+2)]);
                                     if(num2+1==10){
                                          num3 =  parseInt(clave[clave.length-(puntero+3)]);
                                         if(num3+1==10){
                                               clave[clave.length-(puntero+3)] = "0"; 
                                               num4 =  parseInt(clave[clave.length-(puntero+3)]);
                                               clave[clave.length-(puntero+2)]=""+(num4+1);
                                         }else{
                                             clave[clave.length-(puntero+2)] = "0";   
                                                  clave[clave.length-(puntero+3)]=""+(num3+1);                      
                                                    
                                         }
                                  
                                     }else{
                                         num2+=1;
                                        clave[clave.length-(puntero+2)]=""+num2;
                                     }
                                   clave[clave.length-(puntero+1)] = "0";                    
                                   num1 =  parseInt(clave[clave.length-(puntero+2)]);
                               }else{
                                    num1+=1;
                                    clave[clave.length-(puntero+1)]=""+num1;
                               }
                               
                            }else{
                                num+=1;
                                clave[clave.length-puntero]=""+num;
                            }
                            var r =clave.toString()
                               $('#lista-claves').append('<li><input type="hidden" name="clave_fraccionamiento['+i+'][clave_catastral]" value="'+r.replace(/,/g,'')+'"><input type="hidden" name="clave_fraccionamiento['+i+'][numero_control]" value="<?php echo $numerocontrol;?>">'+r.replace(/,/g,'')+'</li>');
                            console.log(r.replace(/,/g,''));
                                                   }
                                               }else{
                                                   alert('Cantidad de claves invalida')
                                               }
                    } else {
                    alert("La Clave Catastral YA se encuentra en el sistema registrada bajo el nombre de propietario " + respuesta);
                    }
                    }
            });
            }
            });
//    var select = document.getElementById("cbocoloniaui");
//  var options=document.getElementsByTagName("cbocoloniaui");
            $('#predialui').keyup(function (e) {

            var Clave = $('#predialui').val();
            if (Clave != "APERTURA") {
            if (Clave.length == 12) {
            $.ajax({
<?php if ($ID): ?>
                url: "../predial",
<?php else: ?>
                url: "../claves_catastrales_fraccionamiento/predial",
<?php endif; ?>
            data: {predial: "" + Clave},
                    type: "POST",
                    dataType: 'json',
                    success: function (respuesta) {
                    if (respuesta) {
                    $('#calleui').val(respuesta.CALLE_ID);
                    $('#nooficialui').val(respuesta.NO_EXTERIOR);
                    $('#nooficialuin').val(respuesta.NO_INTERIOR);
                    $('#cbocoloniaui').val(respuesta.COLONIA_ID);
//                        alert($('#cbocoloniaui').find('option:selected').text());
                    $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                    $('#noloteui').val(respuesta.LOTE);
                    $('#nomanzanaui').val(respuesta.MANZANA);
                    $('#categoriapredioui').val(respuesta.TIPO_PREDIO_ID);
                    $('#address').val($('#calleui').val() + " " + $('#nooficialui').val()+""+$('#cbocoloniaui').find('option:selected').text() + " Irapuato, Guanajuato");
                     $('#nombrepropietariodp').val(respuesta.NOMBRE+" "+respuesta.APELLIDO_PATERNO+" "+respuesta.APELLIDO_MATERNO);
                     var cod = document.getElementById("cbocoloniaui").value;
                    if (cod) {

                    $('#coloniauno').removeClass('hidden');
                    $('#coloniados').addClass('hidden');
                    $("#colonia2").removeAttr("required");
                    } else {
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
                    alert('No se cuenta con registro de la cuenta predial');
                    $('#cbocoloniaui').val(0);
                    $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
                    $('#coloniados').removeClass('hidden');
                    $('#coloniauno').addClass('hidden');
                    $("#colonia2").attr("required", "true");
                    }
                    }
            }
            );
            }
            } else {
            $('#calleui').val("");
            $('#nooficialui').val("");
            $('#nooficialinui').val("");
            $('#cbocoloniaui').val("0");
            $('#noloteui').val("");
            $('#nomanzanaui').val("");
            $('#select2-cbocoloniaui-container').html("SELECCIONA UNA OPCION");
            alert('No se cuenta con registro de la cuenta predial');
            $('#cbocoloniaui').val(0);
            $('#select2-cbocoloniaui-container').html($('#cbocoloniaui').find('option:selected').text());
            $('#coloniados').removeClass('hidden');
            $('#coloniauno').addClass('hidden');
            $("#colonia2").attr("required", "true");
            }
            });
        </script>
<?php if ($ID === "") { ?>
            <script>


                $("#formclave").submit(function (e) {
                alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
                });


            </script>
<?php } ?>
<?php if ($this->session->userdata('tipo') == 15): ?>
            <div class="modal fade" id="talon" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Datos</h4>
                        </div>
                        <form target="_blank" action="<?php echo base_url(); ?>claves_catastrales_fraccionamiento/vistapa" method="post">
                            <div clas="modal-body"> 

                                <div class="container-fluid">

                                    <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="date">Fecha de Inicio * </label>
                                            <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" placeholder="fecha de expedición" required type="text" readonly="" name="fecha_ini" id="fecha_ini" value="" ><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-outline" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                    <script type="text/javascript">
                                                                var today = new Date();
                                                                var dd = /*(today.getDate() < 10) ? "0" + today.getDate() :*/ today.getDate();
                                                                var mm = /*(today.getMonth() + 1 < 10) ? "0" + (today.getMonth() + 1) : */today.getMonth() + 1; //January is 0!
                                                                var yyyy = today.getFullYear();
                                                                var week = today.getDay();
                                                                var dm = new Date(yyyy, mm, 0).getDate(); 

                                                                if(week == 0)
                                                                {
                                                                    dd++;
                                                                    week = 1;
                                                                }
                                                                else if(week == 6)
                                                                {
                                                                    dd += 2;
                                                                    week = 1;
                                                                }

                                                                if(dd > dm)
                                                                {
                                                                    dd -= dm;
                                                                    mm++;
                                                                    if(mm > 11)
                                                                    {
                                                                        mm = 0;
                                                                        yyyy += 1;
                                                                    }
                                                                }

                                                                today = ("0" + dd).slice(-2) + '/' + ("0" + mm).slice(-2) + '/' + yyyy;
                                                                $('#fecha_ini').val(today);
                                                            </script>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="date">Fecha de Fin * </label>
                                            <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" placeholder="fecha de expedición" required type="text" readonly="" name="fecha_exp" id="fecha_exp" value="" ><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-outline" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>

                                                    <script type="text/javascript">
                                                                var dd2 = dd + 3, mm2 = mm, yyyy2 = yyyy;
                                                                var dm2 = new Date(yyyy2, mm2, 0).getDate(); 
                                                                
                                                                week += 3;
                                                                if(week > 6)
                                                                    week -= 7;
                                                                
                                                                if(week == 0)
                                                                    dd2 += 4;
                                                                else if(week == 6)
                                                                    dd2 += 2;
                                                                else if(week == 1)
                                                                    dd2 += 2;

                                                                if(dd2 > dm2)
                                                                {
                                                                    dd -= dm;
                                                                    mm2++;
                                                                    if(mm2 > 11)
                                                                    {
                                                                        mm2 = 0;
                                                                        yyyy2 += 1;
                                                                    }
                                                                }
                                                                today2 = dd2 + '/' + mm2 + '/' + yyyy2;
                                                                $('#fecha_exp').val(today2);
                                                            </script>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="date">Hora* </label>

                                            <input readonly="" class="form-control timepicker timepicker-24" type="text" name="hora" id="dthora" value="">
                                            <script type="text/javascript">
                                                $('#dthora').val("13:00");
                                            </script>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-success" id="submit-all">Generar Talón</button>

                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
<?php endif; ?>
        <div class="modal fade" id="fullnega" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos del Documento Negación</h4>
                    </div>

                    <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoclave/documentofinalnegacionfraccionamiento_vista" method="post">

                        <div clas="modal-body"> 
                            <div class="container-fluid">
                                <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                        <div class="form-group col-md-12">
                                            <h5>Motivo de negación</h5>
                                            <textarea required="" rows="5" class="col-md-12" name="observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">Generar Documento Negación</button>
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        
</html> 