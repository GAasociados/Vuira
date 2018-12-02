<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <?php $this->load->view('base/head - css'); ?>
    </head>

    <style>
        .avance-de-obra{
            width: 250px;
        }
    </style>
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
           <div class="clearfix"></div>
            <div id="page-content">
                <div class="container">
                       <div class="row">
                        <h2>Claves Catastrales Fraccionamientos</h2><br>
                    </div>
                           
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="panel">
                                 <div class="panel-body">

                                    <!--<h5 class="note note-success">Para solicitar este trámite  le recomendamos tenga su recibo predial a la mano.</h5>-->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                        <?php if ($modificar != ""): ?>
                                            <h5 class="note note-warning bold">Recuerda dar click en el botón "Guardar" si realizas algún cambio.<br>En caso de cambios en el documento final vuelva a generar el documento </h5>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="form-group">
                                              <div class="row" id="paso1">
                                        </div> 
                                        <div class="row">

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

                                                        <!--<h4  class="block bold">Información del solicitante Persona Moral o Física</h4>-->
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
                                                    </div>-->
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
                                                
                                                    <div class="col-md-4" id="INE">
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
                                                        <?php if ($modificar == ""): ?>
                                                        <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="" required>
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>



                                                </div>
                                                <div class="col-md-12">
                                                    <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                        <input type="file" multiple name="doctoine[]" id="doctoine" placeholder="doctoine" required/>
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $doctoine; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE,Pasaporte,Cédula Profesional) *</label>

                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Acta Constitutiva o Poder Simple *<?php echo form_error('doctopodersimple') ?></label>
                                                        <input type="file" multiple name="doctopodersimple[]" id="doctopodersimple" placeholder="doctopodersimple" required/>
                                                        <?php if (!empty($doctopodersimple)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopodersimple; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>


                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctoplanodigital') ?></label>

                                                        <input type="file" multiple name="doctoplanodigital[]" id="doctoplanodigital" placeholder="doctoplanodigital" required/>
                                                        <?php if (!empty($doctoplanodigital)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanodigital; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                    <label for="varchar">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctooficio') ?></label>

                                                    <input type="file" multiple name="doctooficio[]" id="doctooficio" placeholder="doctooficio" required/>
                                                    <?php if (!empty($doctooficio)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctooficio; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                    <!--<label for="varchar">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php //echo form_error('doctoplanofisico') ?></label>-->
                                                    <label for="varchar" style="color:red;">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php echo form_error('doctoplanofisico') ?></label>


                                                    <!--<input type="file" multiple name="doctoplanofisico[]" id="doctoplanofisico" placeholder="doctoplanofisico" required/>-->
                                                    <?php //if (!empty($doctoplanofisico)): ?>
                                                        <!--<a href="<?php //echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanofisico; ?>">Descargar</a>-->
                                                    <?php //endif; ?>
                                                    </div>

                                                    <?php if (empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *<?php echo form_error('doctopredial') ?></label>
                                                        <input type="file" multiple name="doctopredial[]" id="doctopredial" placeholder="doctopredial" required/>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $doctopredial; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?php endif; ?>

                                                    <?php if (!empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *</label>

                                                        <?php if (!empty($rpredialar)): ?>
                                                            <a href="<?php echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-6">
                                                    <label for="varchar">Escritura Pública de Propiedad que contenga la Foja Registral y ampare la Superficie Registrada (en caso de no contener la foja registral anexar copia de Libertad de Gravamen) *<?php echo form_error('doctolegal') ?></label>

                                                    <input type="file" multiple name="doctolegal[]" id="doctolegal" placeholder="doctolegal" required/>
                                                    <?php if (!empty($doctolegal)): ?>
                                                    <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctolegal; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>

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

                                                <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                    <div class="form-group">
                                                        <div class="col-md-12">

                                                            <h5 class=" ">Adjunte los Siguientes Archivos Escaneados en Original </h5>
                                                        </div> 
                                                    </div>

                                                <?php endif; ?>





                                                <!--                                                <div class="col-md-4" id="fisrfc">
                                                                                                    <label>Ingrese su INE</label>
                                                                                                    <input class="form-control" type="text" maxlength="13" pattern="[A-Z|0-9]+" name="fisrfc" id="fisrfc" placeholder="Ingrese su INE" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fisrfc; ?>">
                                                                                                </div>-->
                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
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
                                            
                                        <div class="row content-box border-top border-blue">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">II. Identificación y Ubicación del Inmueble</h3>
                                        </div>    
                                 <div class="row" ng-controller="FraccionaminetoApp" > 
                                            <div class="form-group">

                                                <div class="form-group col-md-4" id="paso2">
                                                    <label for="varchar">Cuenta Predial *<?php echo form_error('predialui') ?></label>
                                                    <div class="input-group">

                                                        <input style="text-transform:uppercase;" ng-model="ctapredial" ng-keypress="agregarRegistro2($event)" onkeyup="javascript:this.value = this.value.toUpperCase();" onkeypress="validar(event)"  type="text" pattern="[a-zA-Z0-9]+" class="form-control" name="predialui"  placeholder="Cuenta Predial " maxlength="12"/>
                                                        <span class="input-group-addon">
                                                            <a title="Dar click para Agregar" id="check-clave" class=" btn-md success" ng-click="agregarRegistro()"><i class="fa fa-check"></i></a>
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
                                                            <th>Número Exterior</th>
                                                            <th>Número Interior</th>
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
                                                                    <i class="fa fa-trash-o"></i></a> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group">



                                                <div id="coloniauno" class="form-group col-md-6 hidden">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>

                                                    <?php if ($modificar == ""): ?>
                                                        <select    class="form-control select2" title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
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
                                            
                                     <div class="row content-box border-top border-blue" id="paso">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">III. Datos del Propietario</h3>
                                        </div>
                                            
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
                                            
                                            
                                        <?php //if ($modificar == ""): ?>
                                  <!--<div class="row content-box border-top border-blue" id="paso">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">IV. Adjunte los Siguientes Archivos en Original</h3>
                                            <?php //else: ?>
                                              <h4 class="block"> Documentación del ciudadano</h4>
                                              <?php //endif; ?>
                                        </div>
                      
                                              <div class="row" id="paso10">
                                            <div class="form-group">
                                            
                                            </div>


                                            <!--<div class="form-group">
                                                <?php //if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *<?php //echo form_error('doctoine') ?></label>
                                                        <input type="file" multiple name="doctoine[]" id="doctoine" placeholder="doctoine" required/>
                                                        <?php //if (!empty($doctoine)): ?>
                                                            <a href="<?php //echo base_url() . "assets/usuarios/documentos/" . $doctoine; ?>">Descargar</a>
                                                        <?php //endif; ?>
                                                    </div>
                                                <?php //endif; ?>
                                                <?php //if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE,Pasaporte,Cédula Profesional) *</label>

                                                        <?php //if (!empty($identificacionar)): ?>
                                                            <a href="<?php //echo base_url() . "assets/usuarios/documentos/" . $identificacionar; ?>">Descargar</a>
                                                        <?php //endif; ?>
                                                    </div>
                                                <?php //endif; ?>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Acta Constitutiva o Poder Simple *<?php //echo form_error('doctopodersimple') ?></label>
                                                    <input type="file" multiple name="doctopodersimple[]" id="doctopodersimple" placeholder="doctopodersimple" required/>
                                                    <?php //if (!empty($doctopodersimple)): ?>
                                                        <a href="<?php //echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopodersimple; ?>">Descargar</a>
                                                    <?php //endif; ?>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php //echo form_error('doctoplanodigital') ?></label>

                                                    <input type="file" multiple name="doctoplanodigital[]" id="doctoplanodigital" placeholder="doctoplanodigital" required/>
                                                    <?php //if (!empty($doctoplanodigital)): ?>
                                                        <a href="<?php //echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanodigital; ?>">Descargar</a>
                                                    <?php //endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php //echo form_error('doctooficio') ?></label>

                                                    <input type="file" multiple name="doctooficio[]" id="doctooficio" placeholder="doctooficio" required/>
                                                    <?php //if (!empty($doctooficio)): ?>
                                                        <a href="<?php //echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctooficio; ?>">Descargar</a>
                                                    <?php //endif; ?>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <!--<label for="varchar">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php //echo form_error('doctoplanofisico') ?></label>-->
                                                    <!--<label for="varchar" style="color:red;">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php //echo form_error('doctoplanofisico') ?></label>


                                                    <!--<input type="file" multiple name="doctoplanofisico[]" id="doctoplanofisico" placeholder="doctoplanofisico" required/>-->
                                                    <?php //if (!empty($doctoplanofisico)): ?>
                                                        <!--<a href="<?php //echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanofisico; ?>">Descargar</a>-->
                                                    <?php //endif; ?>
                                                <!--</div>

                                                <?php //if (empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *<?php //echo form_error('doctopredial') ?></label>
                                                        <input type="file" multiple name="doctopredial[]" id="doctopredial" placeholder="doctopredial" required/>
                                                        <?php //if (!empty($doctopredial)): ?>
                                                            <a href="<?php //echo base_url() . "assets/usuarios/documentos/" . $doctopredial; ?>">Descargar</a>
                                                        <?php //endif; ?>
                                                    </div>

                                                <?php //endif; ?>

                                                <?php //if (!empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *</label>

                                                        <?php //if (!empty($rpredialar)): ?>
                                                            <a href="<?php //echo base_url() . "assets/usuarios/documentos/" . $rpredialar; ?>">Descargar</a>
                                                        <?php //endif; ?>
                                                    </div>

                                                <?php //endif; ?>
                                            </div>-->
                                            <!--<div class="form-group col-md-6">
                                                <label for="varchar">Escritura Pública de Propiedad que contenga la Foja Registral y ampare la Superficie Registrada (en caso de no contener la foja registral anexar copia de Libertad de Gravamen) *<?php echo form_error('doctolegal') ?></label>

                                                <input type="file" multiple name="doctolegal[]" id="doctolegal" placeholder="doctolegal" required/>
                                                <?php //if (!empty($doctolegal)): ?>
                                                    <a href="<?php //echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctolegal; ?>">Descargar</a>
                                                <?php //endif; ?>
                                            </div>-->

                                            <div class="form-group col-md-6" id="hiddendoctopago">
                                                <?php if (!empty($status)): ?>
                                                    <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                    <input type="file" multiple name="doctopago[]" id="doctopago"/>
                                                    <?php if (!empty($doctopago)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopago; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>

                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                        </div>

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
                                                
                                              <!-- Botones Flotantes --><div class="button-group pull float">
  <div class="form-group">
                                                    <button type="submit" id="solicitar" class="btn btn-success  glyph-icon icon-check-square-o">Realizar Trámite</button>
                                                    <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . "claves_catastrales_fraccionamiento/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>
                                                    <?php endif; ?>
                                                    <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                                        <a href="<?php echo base_url(); ?>claves_catastrales_fraccionamiento" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url(); ?>infotramites/info_atencion_de_claves_catastrales_fraccionamiento" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                    <?php } ?>

                                                </div>
</div><!-- Botones Flotantes -->  
                                                
                                                
                                              
                                                
                                            </div>
                                        </div>
                                        
                                          </div>
                                </div>
                            </div>

                                        
                                  
                                    </form>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>

            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                   <?php $this->load->view('base/footeradmin'); ?>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>

        <div class="quick-nav-overlay"></div>


        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/js/dropzone.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
        <!-- mmmmmmmmmm -->
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
            $(document).ready(function () {
                if ($('#ipropietariosi').is(':checked')) {
                    $("#ipropietariono").prop('checked', false);
                    
                } else if ($('#ipropietariono').is(':checked')) {
                    
                    $("#ipropietariosi").prop('checked', false);
                }

                if ($('#tipopersonafi').is(':checked')) {

                    $('#fisrfc').addClass('hidden');
                    $('#morine').removeClass('hidden');
                    $('#INE').addClass('hidden');
                } else {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');
                    $('#INE').removeClass('hidden');
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
                    $('#INE').addClass('hidden');
                    $('#morine').removeClass('hidden');
                    $("#tipopersonamo").prop('checked', false);
                } else
                {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');
                    $('#INE').removeClass('hidden');
                    $("#tipopersonamo").prop('checked', true);
                }
            });
            $("#tipopersonamo").on("click", function () {
                if ($("#tipopersonamo").is(':checked')) {
                    $('#fisrfc').removeClass('hidden');
                    $('#morine').addClass('hidden');
                    $('#INE').removeClass('hidden');
                    $("#tipopersonafi").prop('checked', false);
                } else
                {
                    $("#tipopersonafi").prop('checked', true);
                    $('#fisrfc').addClass('hidden');
                    $('#INE').addClass('hidden');
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

            angular.module("Aplicacion", []).controller("FraccionaminetoApp", function ($scope) {
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
                                    $('#cbocoloniaui').val(respuesta.COLONIA_ID);
                                    var nombre = $('#cbocoloniaui').find('option:selected').text();


                                    $scope.registro.push(new Registro(Clave, respuesta.CALLE_ID, respuesta.NO_EXTERIOR, respuesta.NO_INTERIO, respuesta.LOTE, respuesta.MANZANA, respuesta.COLONIA_ID.trim(), nombre.trim()));
                                    if (propietario == "") {
                                        var nobreprop = "";
                                        nobreprop += respuesta.NOMBRE != "undefined" ? respuesta.NOMBRE + " " : "";
                                        nobreprop += respuesta.APELLIDO_PATERNO != "undefined" ? respuesta.APELLIDO_PATERNO + " " : "";
                                        nobreprop += respuesta.APELLIDO_MATERNO != "undefined" ? respuesta.APELLIDO_MATERNO + " " : "";
                                        var res = nobreprop.replace("undefined undefined", "");
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
            "next #paso2": 'Indique el número de cuenta predial del inmueble este se encuentra en el recibo predial.<br> en la siguiente sección del recibo:<br><br><img src="<?php echo base_url() . "assets/recpre.png" ?>"><br>De click en "Siguiente" para continuar..',
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




<!--        <script>
    $('#predialui').keyup(function (e) {

        
    });
</script>-->
    </body>
</html>
