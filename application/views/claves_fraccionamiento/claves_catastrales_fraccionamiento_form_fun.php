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
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" ng-app="Aplicacion" >
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
                    <a href="https://vuira.irapuato.gob.mx/" class="logo-content-big" title="SIPREG">
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
                        <a href="/claves_catastrales_individual/create_ventanilla">
                            <i class="glyph-icon icon-home"></i>
                            <span>Ver mis tramites </span>
                        </a>
                    </li>
                    
                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="/claves_catastrales_individual/reportes" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>Reportes</h6></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--#endregion Menú  -->

        <div id="page-content-wrapper">
            <div id="page-content">
                <div class="container">
                       <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                        <div class="btnRegresar hidden-xs hidden-xm pull-right" >

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
                    <h2>Clave Catastral Fraccionamientos</h2><br>
  
      
                    
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
                                              <div class="row" id="paso1">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <label for="varchar">¿Eres propietario del inmueble?</label><br><label>Si</label>
                                                    <input  type="checkbox" class="" name="ipropietariosi" id="ipropietariosi" <?php echo $ipropietario === '1' ? 'checked' : ''; ?>/>
                                                    <label>No</label>
                                                    <input  type="checkbox" class="" name="ipropietariono" id="ipropietariono" <?php echo $ipropietario === '2' ? 'checked' : ''; ?>/>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">

                                            <div class="form-group" id="datosp">

                                                <div class="form-group  <?php echo $modificar == "" ? "" : "" ?>" >
                                                    <div class="col-md-12" id="paso2">
                                                        <label>¿Por favor indique que tipo de persona es?</label><br>
                                                        <label>Moral</label>
                                                        <input class="" onclick="cambiar2()" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" onclick="cambiar()" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                    </div>
                                                </div>
                                                


                                                <div class="form-group">
                                                    <div class="col-md-12">

                                                        <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                    </div> 
                                                </div>



                                                <div id="fisrfc" class="col-md-12">

                                                	<!--
                                                    <div class="col-md-4" >
                                                        <label>Escritura de Compra Venta</label>
                                                        <?php //if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc[]" multiple="">
                                                        <?php //endif; ?> <br>
                                                        <?php //if (!empty($fisrfc)): ?>
                                                            <a target="_blank" href="<?php //echo base_url() . "assets/tramites/clavescatastralesindividual/" . $fisrfc; ?>">Visualizar Documento</a>
                                                        <?php //endif; ?>
                                                        <br>
                                                    </div>
                                                -->
                                                	<!--
                                                    <div class="col-md-4" >

                                                        <label>Documento Acta constitutiva</label>
                                                        <?php //if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const[]" multiple="">
                                                        <?php //endif; ?> <br>
                                                        <?php //if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php //echo base_url() . "assets/tramites/clavescatastralesindividual/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php //endif; ?>
                                                    </div>
                                                -->
                                                </div>
                                                <div>
                                                <div class="form-group" >
                                                <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                        <input type="file" multiple name="doctoine[]" id="doctoine" placeholder="doctoine" required/>
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $doctoine; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Identificación (INE,Pasaporte,Cédula Profesional) *</label>

                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-group col-md-6 hidden" id="ActCons">
                                                    <label for="varchar">Acta Constitutiva o Poder Simple *<?php echo form_error('doctopodersimple') ?></label>
                                                    <input type="file" multiple name="doctopodersimple[]" id="doctopodersimple" placeholder="doctopodersimple" required/>
                                                    <?php if (!empty($doctopodersimple)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopodersimple; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctoplanodigital') ?></label>

                                                    <input type="file" multiple name="doctoplanodigital[]" id="doctoplanodigital" placeholder="doctoplanodigital" required/>
                                                    <?php if (!empty($doctoplanodigital)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanodigital; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctooficio') ?></label>

                                                    <input type="file" multiple name="doctooficio[]" id="doctooficio" placeholder="doctooficio" required/>
                                                    <?php if (!empty($doctooficio)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctooficio; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php echo form_error('doctoplanofisico') ?></label>

                                                    <input type="file" multiple name="doctoplanofisico[]" id="doctoplanofisico" placeholder="doctoplanofisico" required/>
                                                    <?php if (!empty($doctoplanofisico)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanofisico; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if (empty($rpredial)): ?> 
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *<?php echo form_error('doctopredial') ?></label>
                                                        <input type="file" multiple name="doctopredial[]" id="doctopredial" placeholder="doctopredial" required/>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $doctopredial; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>

                                                <?php if (!empty($rpredial)): ?> 
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *</label>

                                                        <?php if (!empty($rpredialar)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="varchar">Escritura Pública de Propiedad que contenga la Foja Registral y ampare la Superficie Registrada (en caso de no contener la foja registral anexar copia de Libertad de Gravamen) *<?php echo form_error('doctolegal') ?></label>

                                                <input type="file" multiple name="doctolegal[]" id="doctolegal" placeholder="doctolegal" required/>
                                                <?php if (!empty($doctolegal)): ?>
                                                    <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctolegal; ?>">Descargar</a>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group col-md-6" id="hiddendoctopago">
                                                <?php if (!empty($status)): ?>
                                                    <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                    <input type="file" multiple name="doctopago[]" id="doctopago" required/>
                                                    <?php if (!empty($doctopago)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopago; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>

                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">

                                            <div class="col-md-6" id="Nota">
                                                 <label>Poder Notarial para representación de persona moral</label>
                                                 <?php if ($modificar == ""): ?>
                                                     <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota[]" multiple="">
                                                 <?php endif; ?>
                                                 <br>
                                               	 <?php if (!empty($poder_nota)): ?>
                                                    <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $poder_nota; ?>">Visualizar Documento</a>
                                                 <?php endif; ?>
                                            </div>


                                                <!--<div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
                                                        <?php //if ($modificar == ""): ?>
                                                        <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="" required>
                                                        <?php //endif; ?> <br>
                                                        <?php //if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php //echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php //endif; ?>
                                                    </div>
                                                 -->





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
                                         <div class="row" ng-controller="FraccionaminetoApp" > 
                                            <div class="form-group">

                                                <div class="form-group col-md-4" id="paso3">
                                                    <label for="varchar">Cuenta Predial *<?php echo form_error('predialui') ?></label>
                                                    <div class="input-group">

                                                        <input style="text-transform:uppercase;" ng-model="ctapredial" ng-keypress="agregarRegistro2($event)"  type="text" pattern="[a-zA-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial " maxlength="12"/>
                                                        <span class="input-group-addon">
                                                            <a title="Dar click para Agregar" id="check-clave" class=" btn-md success" ng-click="agregarRegistro()"><i class="glyphicon glyphicon-check"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--tabla para mistrar los registros agregados-->
                                            <div class="table-scrollable">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Cuenta Predial</th>
                                                            <th>Calle</th>
                                                            <th>Numero Exterior</th>
                                                            <th>Numero Interior</th>
                                                            <th>Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr ng-repeat="pagos in registro" >


                                                            <td> {{pagos.clave}} <input type="hidden" name="registro[{{$index}}][predialui]" value="{{pagos.clave}}"></td>
                                                            <td> {{pagos.calle_id}} <input type="hidden" name="registro[{{$index}}][calleui]" value="{{pagos.calle_id}}"> </td>
                                                            <td> {{pagos.no_exterior}}<input type="hidden" name="registro[{{$index}}][nooficialui]" value="{{pagos.no_exterior}}">  </td>
                                                            <td> {{pagos.no_interior}}  <input type="hidden" name="registro[{{$index}}][nooficialuin]" value="{{pagos.no_interior}}"></td>
                                                            <td> {{pagos.nombre_colonia}}  <input type="hidden" name="registro[{{$index}}][cbocoloniaui]" value="{{pagos.colonia_id}}"></td>
                                                            <td><a title="" class="btn btn-outline btn-circle btn-sm red " ng-click="eliminar(pagos)">
                                                                    <i class="glyphicon glyphicon-trash"></i></a> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group">



                                                <div id="coloniauno" class="form-group col-md-6 hidden">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>

                                                    <?php if ($modificar == ""): ?>
                                                        <select    class="form-control select2" title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
                                                            <option value="NULL"></option>
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
                                                    <?php else: ?>
                                                        <?php
                                                        if (!empty($cbocoloniaui)):

                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
                                                            ?>
                                                            <input  autocomplete="off"  <?php echo $modificar; ?> class="form-control" value=" <?php echo strtoupper($arraycolonia->NOMBRE); ?>">

                                                        <?php endif; ?>
                                                        <input  autocomplete="off"  type="hidden" id="cbocoloniaui" class="form-control" value="<?php echo $cbocoloniaui; ?>">
                                                    <?php endif; ?>
                                                </div>

                                                <div id="coloniados" class="form-group col-md-5 hidden">
                                                    <label for="int">Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>
                                                    <input  autocomplete="off"  <?php echo $modificar; ?>  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text"  pattern="[A-Za-z0-9  ÁÉÍÓÚÑ-/]+" id="colonia2" name="colonia2" placeholder="Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido " class="form-control" value="<?php echo $coloniados; ?>">
                                                </div>





                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-UBICACION-INMUEBLE 1-->


                                <div class="content-box border-top border-blue" id="paso4">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">III. DATOS DEL PROPIETARIO Y/O REPRESENTANTE</h3>
                                        <div class="bordered-row">
                                                <div class="row">
                                             <div class="row"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-4" id="paso6">
                                                    <label for="varchar">Nombre Completo del Propietario *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input  autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre Completo del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
                                                </div>


                                            </div>
                                        </div>



                                        <div class="row" >
                                            <br>
                                            <div class="form-goup">
                                                <div class="form-group "  id="paso9">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Correo Electrónico *<?php echo form_error('correodp') ?></label>
                                                        <input  required type="email" class="form-control" name="correodp" id="correodp" placeholder="Correo Electrónico" value="<?php echo $correodp != "" ? $correodp : $this->session->userdata('correo'); ?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Teléfono *<?php echo form_error('telefonodp') ?></label>
                                                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" maxlength="10" required pattern="[0-9]{7,13}" type="text" class="form-control" name="telefonodp" id="telefonodp" placeholder="Teléfono" value="<?php echo $telefonodp; ?>" pattern="[0-9]{0-10}"  title="Solo números"/>
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-4" id="paso9a">
                                                    <label for="int">Tipo de Trámite que Solicita *<?php echo form_error('tipotramitedp') ?></label>

                                                    <select style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required class="form-control" name="tipotramitedp" tabindex="-1" id="tipotramitedp" value="<?php echo $tipotramitedp; ?>">

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

                                </div><!-- DIV DATOS DEL PROPIETARIO -->


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
                                                    
                                                    
                                       <!-- Botones Flotantes --><div class="button-group pull float">
                                           <button type="submit" id="solicitar" class="btn btn-success glyph-icon icon-play"><?php echo $button ?></button>
                                            
                                           <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . "claves_catastrales_fraccionamiento/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                    <?php endif; ?>
                                                    <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
<!--                                                        <a href="<?php// echo base_url(); ?>claves_catastrales_fraccionamiento" class="btn btn-danger">Cancelar</a>-->
                                                    <?php } else { ?>
<!--                                                        <a href="<?php //echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_fraccionamiento" class="btn btn-danger">Cancelar</a>-->
                                                    <?php } ?>
                                              </div><!-- Botones Flotantes -->
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

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>

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



                                                        });
        </script>


        <script>

        	function cambiar()
        	{
            	$("#tipopersonamo").prop("checked", false);
            	$("#tipopersonafi").prop("checked", true);
                $('#Nota').addClass('hidden');
                $('#ActCons').removeClass('hidden');
        	}


        	function cambiar2()
        	{
                $("#tipopersonamo").prop("checked", true);
            	$("#tipopersonafi").prop("checked", false);
                $('#Nota').removeClass('hidden');
                $('#ActCons').addClass('hidden');
        	}

            $(document).ready(function () {
               //*****Codigo antiguo********
                
                if ($('#ipropietariosi').is(':checked')) {
                    $("#ipropietariono").prop('checked', false);
                    //$('#datosp').addClass('hidden');
                } else if ($('#ipropietariono').is(':checked')) {
                    //$('#datosp').removeClass('hidden');
                    $("#ipropietariosi").prop('checked', false);
                    $('#ActCons').addClass('hidden');
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
            $("#ipropietariono").on("click", function () {
                if ($("#ipropietariono").is(':checked')) {
                    $("#ipropietariosi").prop('checked', false);
                } else {
                    $("#ipropietariosi").prop('checked', true);
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
        <script>

            function Registro(CLAVE, CALLE_ID, NO_EXTERIOR, NO_INTERIO, LOTE, MANZANA, COLONIA_ID, NOMBRE_COLONIA) {
                this.clave = CLAVE;
                this.calle_id = CALLE_ID;
                this.no_exterior = NO_EXTERIOR;
                this.no_interior = NO_INTERIO;
                this.lote = LOTE;
                this.manzana = MANZANA;
                this.colonia_id = COLONIA_ID;
                this.nombre_colonia = NOMBRE_COLONIA;
            }

            angular.module("Aplicacion", []).controller("FraccionaminetoApp", function ($scope, $filter) {
                $scope.registro = [];

                $scope.ctapredial;

                $scope.agregarRegistro2=function(event){
                    if(event.keyCode==13)
                    {
                        $scope.agregarRegistro();
                        return false;
                    }

                };

                $scope.agregarRegistro = function () {


                    var Clave = $scope.ctapredial;

                    if (Clave.length == 12) {
                        var propietario = $("#nombrepropietariodp").val();
                        $.ajax({
                            url: "../claves_catastrales_individual/predial",
                            data: {predial: "" + Clave},
                            type: "POST",
                            dataType: 'json',
                            async: false,
                            success: function (respuesta) {
                                if (respuesta) {
                                    
                                    var nombre = "";   
                                    if($('#cbocoloniaui').filter(function(){ return $(this).val() === respuesta.COLONIA_ID.trim(); }).length){
                                        // found
                                        $('#cbocoloniaui').val(respuesta.COLONIA_ID);
                                        nombre = $('#cbocoloniaui').find('option:selected').text();
                                    }
                                    else{
                                        respuesta.COLONIA_ID = "-1";
                                    }
                                    
                                    /*
                                    var exists = false;
                                    $('#cbocoloniaui').each(function(){
                                        if (this.value === respuesta.COLONIA_ID.trim()) {
                                            exists = true;
                                            alert(this.value);
                                            break;
                                        }
                                    });
                                    
                                    if(exists){
                                        // found
                                        $('#cbocoloniaui').val(respuesta.COLONIA_ID);
                                    }
                                    else{
                                        alert('not found: ' + respuesta.COLONIA_ID);
                                    }
                                    */

                                    $scope.registro.push(new Registro(Clave, respuesta.CALLE_ID, respuesta.NO_EXTERIOR, respuesta.NO_INTERIO, respuesta.LOTE, respuesta.MANZANA, respuesta.COLONIA_ID.trim(), nombre.trim()));
                                    if (propietario == "") {
                                        var nobreprop = "";
                                        nobreprop += $filter('lowercase')(respuesta.NOMBRE) != "undefined" ? respuesta.NOMBRE + " " : "";
                                        nobreprop += $filter('lowercase')(respuesta.APELLIDO_PATERNO) != "undefined" ? respuesta.APELLIDO_PATERNO + " " : "";
                                        nobreprop += $filter('lowercase')(respuesta.APELLIDO_MATERNO) != "undefined" ? respuesta.APELLIDO_MATERNO + " " : "";
                                        var res = nobreprop.replace("undefined undefined", "");
                                        res = 
                                        $("#nombrepropietariodp").val('' + res);
                                    }


                                } else {

                                    alert('No se cuenta con registro de la cuenta predial');

                                }
                            }
                        });

                    }
                    $scope.apply();
                    $scope.ctapredial = "";
                };
                $scope.eliminar = function (item) {
                        var index = $scope.registro.indexOf(item);
                        $scope.registro.splice(index, 1);
                        $scope.apply();
                    };
                $scope.apply = function () {

                };
                
                
            });
        </script>

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
                                    "next #paso1": 'Primeramente indique si la persona solicitante es el propietario del predio o no.<br>Presione "Siguiente" para continuar..',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #paso2": 'Primeramente indique si la persona solicitante es el propietario del predio o no.<br>Presione "Siguiente" para continuar..',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #paso3": 'Primeramente indique si la persona solicitante es el propietario del predio o no.<br>Presione "Siguiente" para continuar..',
                                    "nextButton": {text: "Siguiente"},
                                    "skipButton": {text: "Saltar Guía"}
                                },
                                {
                                    "next #paso4": 'Primeramente indique si la persona solicitante es el propietario del predio o no.<br>Presione "Siguiente" para continuar..',
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



<!--        <script>
    $('#predialui').keyup(function (e) {

        
    });
</script>-->

</html> 