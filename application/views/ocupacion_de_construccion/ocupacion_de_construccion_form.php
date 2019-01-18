<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es"  ng-app="Aplicacion">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <?php $this->load->view('base/head - css'); ?>
    </head>
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
            <?php
            $modificar = "";
            if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3):
                ?>
                <div class="hidden-xs hidden-xm">
                    <button class="btn btn-warning float btnAyudaForm" title="Ayuda" id="ayuda" onclick="iniciarAyuda()">
                        <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4>
                    </button>
                </div>
                <?php
                $modificar = "";
            else:
                $modificar = "readonly";
            endif;
            ?>
            
            
            <div class="clearfix"></div>
            <div id="page-content">
                <div class="container">
                    <div class="row">
                        <h2>Autorización de uso de Construcción</h2><br>
                    </div>
                    
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="panel">
                    <div class="panel-body">
                        <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                            <div class="row content-box border-top border-blue" id="paso1">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <h3 class="title-hero">I. Datos Generales</h3>
                                        </div>

                                        <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                            <div class="form-group col-md-12">
                                                <label>Los campos marcados con (*) son obligatorios</label>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group col-md-6">
                                            <label for="varchar">Nombre del Propietario *<?php echo form_error('nombrepropietariodg') ?></label>
                                            <input <?php echo $modificar; ?> required="" type="text" class="form-control" name="nombrepropietariodg" id="nombrepropietariodg" placeholder="Nombre del Propietario" value="<?php echo $nombrepropietariodg; ?>" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="varchar">Nombre del Representante <?php echo form_error('nombresolicitantedg') ?></label>
                                            <input <?php echo $modificar; ?> type="text" class="form-control" name="nombresolicitantedg" id="nombresolicitantedg" placeholder="Nombre del Representante" value="<?php echo $nombresolicitantedg; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Clave Catastral *</label>
                                            <input   <?php echo $modificar; ?> required placeholder="Clave Catastral" type="text" class="form-control" name="clave" id="clave"  value="<?php echo $clave; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Cuenta Predial *</label>
                                            <input   <?php echo $modificar; ?> required placeholder="Cuenta Predial" type="text" class="form-control" name="cuenta_predial" id="cuenta_predial"  value="<?php echo $cuenta_predial; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row content-box border-top border-blue" id="paso2">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <h3 class="title-hero">II. Domicilio Para Recibir Notificaciones</h3>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="varchar">Calle *<?php echo form_error('calledg') ?></label>
                                            <input <?php echo $modificar; ?> required="" type="text" class="form-control" name="calledg" id="calledg" placeholder="Calle" value="<?php echo $calledg; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Número *<?php echo form_error('numerodg') ?></label>
                                            <input <?php echo $modificar; ?> required=""  type="text" class="form-control" name="numerodg" id="numerodg" placeholder="Número" value="<?php echo $numerodg; ?>" />
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="varchar">Colonia/Fraccionamiento *<?php echo form_error('coloniadg') ?></label>
                                            <select <?php echo $modificar; ?> class="form-control select2" name="coloniadg" tabindex="-1"  id="coloniadg"/>
                                            <?php
                                            if (!empty($coloniadg)):
                                                $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($coloniadg);
                                                ?>
                                                <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">

                                                    <?php echo $arraycolonia->NOMBRE; ?>

                                                </option>
                                            <?php endif; ?>
                                            <option value="">

                                            </option>
                                            <?php
                                            if ($modificar == ""):
                                                foreach ($consulta->result() as $fila) {
                                                    ?>
                                                    <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                        <?php echo $fila->NOMBRE; ?>
                                                    </option>
                                                    <?php
                                                }
                                            endif;
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Correo Electrónico *<?php echo form_error('correodg') ?></label>
                                            <input <?php echo $modificar; ?> required="" type="email" class="form-control" name="correodg" id="correodg" placeholder="Correo Electrónico" value="<?php echo $correodg; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Teléfono *<?php echo form_error('telefonodg') ?></label>
                                            <input <?php echo $modificar; ?> required="" type="text" class="form-control" name="telefonodg" id="telefonodg" placeholder="Teléfono" value="<?php echo $telefonodg; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row content-box border-top border-blue" id="paso3">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <h3 class="title-hero">III. Ubicación del Inmueble</h3>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                            <input <?php echo $modificar; ?> required="" type="text" class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Número Oficial *<?php echo form_error('nooficialui') ?></label>
                                            <input <?php echo $modificar; ?> required="" type="text" class="form-control" name="nooficialui" id="nooficialui" placeholder="Núm. Oficial" value="<?php echo $nooficialui; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Número de Lote<?php echo form_error('nodeloteui') ?></label>
                                            <input <?php echo $modificar; ?> type="text" class="form-control" name="nodeloteui" id="nodeloteui" placeholder="Núm. de Lote" value="<?php echo $nodeloteui; ?>" />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar">Manzana<?php echo form_error('manzanaui') ?></label>
                                            <input <?php echo $modificar; ?> type="text" class="form-control" name="manzanaui" id="manzanaui" placeholder="Manzana" value="<?php echo $manzanaui; ?>" />
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="varchar">Colonia/Fraccionamiento *<?php echo form_error('cbocolsui') ?></label>
                                            <select <?php echo $modificar; ?> class="form-control select2" name="cbocolsui" tabindex="-1"  id="cbocolsui"/>
                                            <?php
                                            if (!empty($cbocolsui)):
                                                $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocolsui);
                                                ?>
                                                <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">

                                                    <?php echo $arraycolonia->NOMBRE; ?>

                                                </option>
                                            <?php endif; ?>
                                            <option value="">

                                            </option>
                                            <?php
                                            if ($modificar == ""):
                                                foreach ($consulta->result() as $fila) {
                                                    ?>
                                                    <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                        <?php echo $fila->NOMBRE; ?>
                                                    </option>
                                                    <?php
                                                }
                                            endif;
                                            ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="double">Clave Catastral</label>
                                            <input <?php echo $modificar; ?>  required="" type="text" placeholder="Clave Catastral" class="form-control" name="clave"  value="<?php echo $clave; ?>" />
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label for="double">Superficie Predio m2 *<?php echo form_error('superficiepredioui') ?></label>
                                            <input <?php echo $modificar; ?> type="number" min="0" step=".01" class="form-control" name="superficiepredioui" id="superficiepredioui" placeholder="Superficie Predio m²" value="<?php echo $superficiepredioui; ?>" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="double">Superficie Construida m2 *<?php echo form_error('superficieconstruidaui') ?></label>
                                            <input <?php echo $modificar; ?> type="number" min="0" step=".01" class="form-control" name="superficieconstruidaui" id="superficieconstruidaui" placeholder="Superficie Construida" value="<?php echo $superficieconstruidaui; ?>" />
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="int">Número de Niveles *<?php echo form_error('nonivelesui') ?></label>
                                            <input <?php echo $modificar; ?> type="number" min="1" class="form-control" name="nonivelesui" id="nonivelesui" placeholder="Número de Niveles" value="<?php echo $nonivelesui; ?>" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="int">Número Cajones *<?php echo form_error('nocajonesui') ?></label>
                                            <input <?php echo $modificar; ?> type="number" min="1" class="form-control" name="nocajonesui" id="nocajonesui" placeholder="Número Cajones" value="<?php echo $nocajonesui; ?>" required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="int">Número de Viviendas *<?php echo form_error('noviviendasui') ?></label>
                                            <input <?php echo $modificar; ?> type="number" min="1" class="form-control" name="noviviendasui" id="noviviendasui" placeholder="Número de Viviendas" value="<?php echo $noviviendasui; ?>"  required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="float">% Avance de Obra (Para solicitar el trámite la obra se debe contar con al menos un 90% de avance.) * <?php echo form_error('porcentajeavanceui') ?></label>
                                            <input <?php echo $modificar; ?> type="number" step = "0.01"class="form-control avance-de-obra" name="porcentajeavanceui" id="porcentajeavanceui" placeholder="Porcentaje de avance de Obra" value="<?php echo $porcentajeavanceui; ?>" min="90" max="100" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="float">Observaciones</label>
                                            <textarea rows="4" class="form-control" name="observaciones" placeholder="Observaciones"><?php echo $observaciones; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row content-box border-top border-blue" id="paso4">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <h3 class="title-hero">
                                                IV. En caso de que la ubicación mostrada en el mapa no coincida con la dirección capturada, usted puede mover el punto de color rojo al lugar deseado.
                                            </h3>
                                        </div>
                                    </div>
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
                            <div class="row content-box border-top border-blue" id="paso5">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <h3 class="title-hero">V. Datos del Perito</h3>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="varchar">Nombre del Perito *<?php echo form_error('nombreperitodp') ?></label>

                                            <select <?php echo $modificar; ?>  class="form-control select2" name="nombreperitodp" tabindex="-1"  id="nombreperitodp" required="">
                                                <?php
                                                if (!empty($nombreperitodp)) {
                                                    $arrayperito = $this->Peritos_model->getperitosbyid($nombreperitodp);
                                                    ?>
                                                    <option value="<?php echo $arrayperito[0]->ID; ?>">
                                                        <?php echo $arrayperito[0]->nombre; ?>
                                                    </option>
                                                <?php } else { ?>

                                                <?php } ?>
                                                <option value="">

                                                </option>
                                                <?php
                                                if ($modificar == ""):
                                                    foreach ($resultperitos->result() as $fila) {
                                                        ?>
                                                        <option value="<?php echo $fila->ID; ?>">
                                                            <?php echo $fila->nombre; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                endif;
                                                ?>
                                                <!-- <option value="Option 1">Option 1</option> -->
                                            </select>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="varchar">Número de Registro <?php echo form_error('noregistroperitodp') ?></label>
                                            <input  readonly type="text" class="form-control" name="noregistroperitodp" id="noregistroperitodp" placeholder="Núm. de Registro" value="<?php echo $noregistroperitodp; ?>" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="varchar">Teléfono del Perito <?php echo form_error('telefonoperitodp') ?></label>
                                            <input readonly type="text" class="form-control" name="telefonoperitodp" id="telefonoperitodp" placeholder="Teléfono del Perito" value="<?php echo $telefonoperitodp; ?>" />
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="int">Nombre Perito Especializado  <?php echo form_error('nombreperitoresponsabledp') ?></label>

                                            <select <?php echo $modificar; ?>  class="form-control select2" name="nombreperitoresponsabledp" tabindex="-1"  id="nombreperitoresponsabledp">
                                                <?php
                                                if (!empty($nombreperitoresponsabledp)) {

                                                    $arrayperito = $this->Peritos_model->getperitosespbyid($nombreperitoresponsabledp);
                                                    ?>

                                                    <option value="<?php echo $arrayperito[0]->ID; ?>">
                                                        <?php echo $arrayperito[0]->nombre; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="">

                                                    </option>
                                                <?php } ?>

                                                <?php
                                                if ($modificar == ""):
                                                    foreach ($resultperitosesp->result() as $fila) {
                                                        ?>
                                                        <option value="<?php echo $fila->ID; ?>">
                                                            <?php echo $fila->nombre; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                endif;
                                                ?>
                                                <!-- <option value="Option 1">Option 1</option> -->
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="varchar">Número de Registro <?php echo form_error('noregistroresponsabledp') ?></label>
                                            <input readonly type="text" class="form-control" name="noregistroresponsabledp" id="noregistroresponsabledp" placeholder="Núm. de Registro" value="<?php echo $noregistroresponsabledp; ?>" />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="varchar">Teléfono Perito <?php echo form_error('telefonoresponsabledp') ?></label>
                                            <input readonly type="text" class="form-control" name="telefonoresponsabledp" id="telefonoresponsabledp" placeholder="Teléfono Perito" value="<?php echo $telefonoresponsabledp; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row content-box border-top border-blue" id="paso6">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
                                        <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                            <div class="form-group col-md-12">
                                                <h3 class="title-hero">VI. Solo adjuntar archivos escaneados en original (PDF, Imagen, Archivo .Zip o .Rar) Escaneados completos</h3>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group col-md-12">
                                                <h3 class="title-hero">Revise aqui los archivos escaneados</h3>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group col-md-4">
                                            <label for="varchar">Bitácora de Obra *<?php echo form_error('docsbitacora') ?></label>
                                            <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                                <input <?php echo $docsbitacora != "" ? "" : "required"; ?> type="file" multiple name="docsbitacora[]" id="docsbitacora"/>
                                            <?php endif; ?>
                                            <?php if (!empty($docsbitacora)): ?><br>
                                                <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docsbitacora; ?>"><?php echo $docsbitacora; ?></a>
                                            <?php endif; ?>
                                        </div>



                                        <div class="form-group col-md-4">
                                            <label for="varchar">Planos Autorizados<?php echo form_error('docsplano') ?></label>
                                            <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                                <!-- <input <?php echo $docsplano != "" ? "" : "required"; ?>  type="file" multiple name="docsplano[]" id="docsplano"/> -->
                                                <input type="file" multiple name="docsplano[]" id="docsplano"/>
                                            <?php endif; ?>
                                            <?php if (!empty($docsplano)): ?><br>
                                                <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docsplano; ?>"><?php echo $docsplano; ?></a>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="varchar">Visto Bueno de Cuerpo de Bomberos, Protección Civil y Policía Vial <?php echo form_error('docsvbuenofinales') ?></label>
                                            <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                                <!-- <input <?php echo $docsvbuenofinales != "" ? "" : "required"; ?> type="file" multiple name="docsvbuenofinales[]" id="docsvbuenofinales"/> -->
                                                <input type="file" multiple name="docsvbuenofinales[]" id="docsvbuenofinales"/>
                                            <?php endif; ?>
                                            <?php if (!empty($docsvbuenofinales)): ?><br>
                                                <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docsvbuenofinales; ?>"><?php echo $docsvbuenofinales; ?></a>
                                            <?php endif; ?>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="varchar">Permiso de Construcción Vigente *<?php echo form_error('docspermisoconstruccion') ?></label>
                                            <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                                <input <?php echo $docspermisoconstruccion != "" ? "" : "required"; ?> type="file" multiple name="docspermisoconstruccion[]" id="docspermisoconstruccion"/>
                                            <?php endif; ?>
                                            <?php if (!empty($docspermisoconstruccion)): ?>
                                                <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docspermisoconstruccion; ?>"><?php echo $docsreportefotografico; ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="varchar">Reporte Fotográfico Actual * <?php echo form_error('docsreportefotografico') ?></label>
                                            <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
                                                <input <?php echo $docsreportefotografico != "" ? "" : "required"; ?> type="file" multiple name="docsreportefotografico[]" id="docsreportefotografico"/>
                                            <?php endif; ?>
                                            <?php if (!empty($docsreportefotografico)): ?><br>
                                                <a  href="<?php echo base_url() . "assets/tramites/construccion/" . $docsreportefotografico; ?>"><?php echo $docsreportefotografico; ?></a>
                                            <?php endif; ?>
                                        </div>

                                        <input type="hidden" id="divestatus" value="<?php echo $status; ?>">

                                        <?php if (!empty($status)) { ?>

                                            <?php
                                            if ($this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111) {

                                            } else {
                                                ?>

                                                <?php if ($status == 4 || $status == 6) { ?>

                                                    <div class="form-group col-md-4" id="hiddendoctopago">
                                                        <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111) { ?>
                                                            <a data-target="#full1" data-toggle="modal"><b>Descargar Plantilla de Pago</b></a>
                                                        <?php } ?>
                                                        <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('docspago') ?></label>
                                                        <input type="file" multiple name="docspago[]" id="docspago"/>
                                                        <?php if (!empty($docspago)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docspago; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php } ?>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($this->session->userdata('tipo') == 16) {
                                if ($requiereverificador == 1) {
                                    ?>
                                    <div class="form-group col-md-12">
                                        <h3 class="title-hero">Datos para verificación</h3>
                                        <div class="form-group col-md-4">
                                            <label for="date">Elija un verificador</label>
                                            <select class="form-control" name="verificador" id="verificador">
                                                <?php if (!isset($verificador)) { ?>
                                                    <option value = "">Seleccione Verificador</option>
                                                    <?php
                                                } else {
                                                    $arrayperito = $this->Usuarios_model->getverificadorbyid($verificador);
                                                    ?>
                                                    <option value="<?php echo $arrayperito[0]->ID; ?>">
                                                        <?php echo $arrayperito[0]->nombres; ?>
                                                    </option>
                                                <?php } ?>                                         
                                                <?php foreach ($resultverificador->result() as $fila) { ?>
                                                    <option value="<?php echo $fila->ID; ?>">
                                                        <?php echo $fila->nombres; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="date">Fecha de Verificación <?php //echo form_error('fechaverificacion')             ?></label>
                                            <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                <input class="form-control" type="text" readonly="" name="fechaverificacion" id="fechaverificacion" value="<?php echo $fechaverificacion; ?>" ><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-outline" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Hora de la Visita Aproximada</label>
                                            <input class="form-control timepicker timepicker-24" type="text" name="hora" value="<?php echo $hora; ?>">
                                            <!--<button class="btn default" type="button">
                                            <i class="fa fa-clock-o"></i>
                                            </button>
                                            -->
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($this->session->userdata('tipo') == 166) {
                                if ($requiereverificador == 1) {
                                    ?>

                                    <?php if ($requiereverificador == 1) { ?>
                                        <div class="form-group col-md-12">
                                            <br><br>
                                            <div class="form-group col-md-3">
                                                <label for="date">Nombre del verificador</label>
                                                <select class="form-control" name="verificador" id="verificador">
                                                    <?php
                                                    if (isset($verificador)) {
                                                        $arrayperito = $this->Usuarios_model->getverificadorbyid($verificador);
                                                        ?>
                                                        <option value="<?php echo $arrayperito[0]->ID; ?>">
                                                            <?php echo $arrayperito[0]->nombres; ?>
                                                        </option>
                                                    <?php } ?>  
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="date">Fecha de Verificación <?php //echo form_error('fechaverificacion')             ?></label>
                                                <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                    <input class="form-control" type="text" readonly="" name="fechaverificacion" id="fechaverificacion" value="<?php echo $fechaverificacion; ?>" ><span class="input-group-btn">
                                                        <button class="btn btn-primary btn-outline" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Hora de la Visita Aproximada</label>
                                                <input class="form-control timepicker timepicker-24" type="text" name="hora" value="<?php echo $hora; ?>">
                                                <!--<button class="btn default" type="button">
                                                <i class="fa fa-clock-o"></i>
                                                </button>
                                                -->
                                            </div>

                                        </div>
                                    <?php } ?>

                                    <div class="form-group col-md-12">
                                        <h3 class="title-hero">Documento Verificador</h3>
                                        <label for="varchar" id="parpadearxd"> <b>Documento Verificador *</b> <?php echo form_error('doctoverificador') ?></label>
                                        <input type="file" multiple name="doctoverificador[]" id="doctoverificador"/>
                                        <?php if (!empty($doctoverificador)): ?>
                                            <a href="<?php echo base_url() . "assets/tramites/permisosanunciosautosoportados/" . $doctoverificador; ?>">Descargar</a>
                                        <?php endif; ?>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                            <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111) { ?>
                                <div class="form-group col-md-12">
                                    <h3 class="title-hero">Datos del verificador</h3>
                                    <div class="form-group col-md-3">
                                        <label>Requiere Verificador</label>
                                        <select class="form-control" name="requiereverificador" id="requiereverificador">
                                            <?php if ($requiereverificador == 1) { ?>
                                                <option value = "1">Si</option>
                                                <option value = "2">No</option>
                                            <?php } else { ?>
                                                <option value = "2">No</option>
                                                <option value = "1">Si</option>
                                            <?php } ?>
                                        </select>
                                    </div>    
                                </div>
                                <?php if ($this->session->userdata('tipo') == 16): ?>
                                    <?php if ($requiereverificador == 1) { ?>
                                        <div class="form-group col-md-3">
                                            <label for="date">Nombre del verificador</label>
                                            <select class="form-control" name="verificador" id="verificador">
                                                <?php if (!isset($verificador)) { ?>
                                                    <option value = "">Seleccione Verificador</option>
                                                    <?php
                                                } else {
                                                    $arrayperito = $this->Usuarios_model->getverificadorbyid($verificador);
                                                    ?>
                                                    <option value="<?php echo $arrayperito[0]->ID; ?>">
                                                        <?php echo $arrayperito[0]->nombres; ?>
                                                    </option>
                                                <?php } ?>  
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="date">Fecha de Verificación <?php //echo form_error('fechaverificacion')             ?></label>
                                            <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                <input class="form-control" type="text" readonly="" name="fechaverificacion" id="fechaverificacion" value="<?php echo $fechaverificacion; ?>" ><span class="input-group-btn">
                                                    <button class="btn btn-primary btn-outline" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Hora de la Visita Aproximada</label>
                                            <input class="form-control timepicker timepicker-24" type="text" name="hora" value="<?php echo $hora; ?>">
                                            <!--<button class="btn default" type="button">
                                            <i class="fa fa-clock-o"></i>
                                            </button>
                                            -->
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="varchar" id="parpadearxd"> <b>Documento Verificador *</b> <?php echo form_error('doctoverificador') ?></label>
                                            <!--<input type="file" multiple name="doctoverificador[]" id="doctoverificador"/>-->
                                            <?php if (!empty($doctoverificador)): ?>
                                                <a href="<?php echo base_url() . "assets/tramites/permisosanunciosautosoportados/" . $doctoverificador; ?>">Descargar</a>
                                            <?php endif; ?>
                                        </div>

                                    <?php } ?>

                                <?php else: ?>
                                    <div class="form-group col-md-3">
                                        <label for="varchar" id="parpadearxd"> <b>Documento Verificador *</b> <?php echo form_error('doctoverificador') ?></label>
                                        <!--<input type="file" multiple name="doctoverificador[]" id="doctoverificador"/>-->
                                        <?php if (!empty($doctoverificador)): ?>
                                            <a href="<?php echo base_url() . "assets/tramites/permisosanunciosautosoportados/" . $doctoverificador; ?>">Descargar</a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>

                            <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111): ?>
                                <div class="form-group col-md-12">
                                    <h3 class="title-hero">Funcionario</h3>
                                    <div class="form-group col-md-4">
                                        <label for="varchar">No. Permiso de construcción * <?php echo form_error('nocontroldp') ?></label>
                                        <input type="text" class="form-control" name="nocontroldp" id="nocontroldp" placeholder="Número de control" value="<?php echo $nocontroldp; ?>" />
                                    </div>
                                    <div class="form-group col-md-4">

                                        <label for="smallint">Estatus <?php echo form_error('status') ?></label>
                                        <select class="form-control" name="status" id="status">
                                            <?php if ($status == 1): ?>
                                                <option value = "1">Iniciado</option>
                                                <option value = "2">En Revisión de Información</option>
                                                <option value = "3">Trámite en Proceso</option>
                                                <option value = "4">En Espera de Pago</option>
                                                <option value = "5">Pagado</option>
                                                <option value = "6">Terminado</option>
                                            <?php endif; ?>

                                            <?php if ($status == 2): ?>
                                                <option value = "2">En Revisión de Información</option>
                                                <option value = "1">Iniciado</option>
                                                <option value = "3">Trámite en Proceso</option>
                                                <option value = "4">En Espera de Pago</option>
                                                <option value = "5">Pagado</option>
                                                <option value = "6">Terminado</option>
                                            <?php endif; ?>

                                            <?php if ($status == 3): ?>
                                                <option value = "3">Trámite en Proceso</option>
                                                <option value = "1">Iniciado</option>
                                                <option value = "2">En Revisión de Información</option>
                                                <option value = "4">En Espera de Pago</option>
                                                <option value = "5">Pagado</option>
                                                <option value = "6">Terminado</option>
                                            <?php endif; ?>

                                            <?php if ($status == 4): ?>
                                                <option value = "4">En Espera de Pago</option>
                                                <option value = "1">Iniciado</option>
                                                <option value = "2">En Revisión de Información</option>
                                                <option value = "3">Trámite en Proceso</option>
                                                <option value = "5">Pagado</option>
                                                <option value = "6">Terminado</option>
                                            <?php endif; ?>

                                            <?php if ($status == 5): ?>
                                                <option value = "5">Pagado</option>
                                                <option value = "1">Iniciado</option>
                                                <option value = "2">En Revisión de Información</option>
                                                <option value = "3">Trámite en Proceso</option>
                                                <option value = "4">En Espera de Pago</option>
                                                <option value = "6">Terminado</option>
                                            <?php endif; ?>

                                            <?php if ($status == 6): ?>
                                                <option value = "6">Terminado</option>
                                                <option value = "1">Iniciado</option>
                                                <option value = "2">En Revisión de Información</option>
                                                <option value = "3">Trámite en Proceso</option>
                                                <option value = "4">En Espera de Pago</option>
                                                <option value = "5">Pagado</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div  class="form-group col-md-12" id="hiddendoctopago">
                                        <div class="form-group col-md-6">
                                            <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111) { ?>
                                                <a class="btn btn-primary" data-target="#full1" data-toggle="modal"><b>Generar Plantilla de Pago</b></a>
                                            <?php } ?>

                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="varchar" id="parpadearxd"> <b>Documento Orden de Pago *</b> <?php echo form_error('docspago') ?></label>
                                            <!--<input type="file" multiple name="docspago[]" id="docspago"/>-->
                                            <?php if (!empty($docspago)): ?><br>
                                                <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docspago; ?>">Descargar</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">

                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11): ?>
                                                <a id="hiddendoctofinal" class="btn btn-success"><b>Generar Documento Final</b></a>
                                                 <!--<a href="<?php // echo base_url();            ?>docstramites/documentoconstruccion/documento/<?php // echo $ID;            ?>" class="btn btn-success">Generar Documento Final</a>-->
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6" id="hiddendoctofinal1">
                                        <div class="form-group">
                                            <label for="varchar"><b>Documento Final *</b><?php echo form_error('docsfinal') ?></label>
                                            <!--<input type="file" multiple name="docsfinal[]" id="docsfinal"/>-->
                                            <?php if (!empty($docsfinal)): ?><br>
                                                <a href="<?php echo base_url() . "assets/tramites/construccion/" . $docsfinal; ?>">Descargar</a>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <?php if ($valido_pago == 1): ?>

                                        <div class="col-md-12">
                                            <h5 class="note note-success  bold" style=" background-color:rgba(0,255,0,0.3); ">El Trámite ya ha sido pagado.</h5>

                                        </div>


                                    <?php endif; ?>
                                    <?php if ($observaciones != ""): ?>
                                        <div class="form-group">
                                            <div class="form-group col-md-12">
                                                <label class="bold" for="varchar">Observaciones</label>
                                                <p><?php echo $observaciones; ?></>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <label for="varchar">Mensaje <?php echo form_error('mensaje') ?></label>
                                            <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Mensaje" rows="5" cols="80"><?php echo $mensaje; ?></textarea>
                                        </div>
                                    </div>


                                <?php endif; ?>
                                <div class="row" >    
                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                    <div class="form-group col-md-12">
                                        
                                        <!-- Botones Flotantes --><div class="button-group pull float">
  <button type="submit" id="solicitar" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Solicitando Trámite"  class="btn btn-success glyph-icon icon-check-square-o">Realizar Trámite</button>
                                        <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $docspago): ?>
                                                    <!--<a class="btn btn-success" href="<?php echo base_url() . "ocupacion_de_construccion/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en linea</b></a>-->
                                        <?php endif; ?>
                                        <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 166) { ?>
                                            <a href="<?php echo base_url(); ?>ocupacion_de_construccion" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>infotramites/info_autorizacion_ocupacion_construccion" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                        <?php } ?>
                                              </div><!-- Botones Flotantes -->


                                      
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    </div>

            </div>
            <!-- ************FIN SECCION***************** -->
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

        <div class="quick-nav-overlay"></div>
        <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">


            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos del Documento Final</h4>
                    </div>

                    <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoconstruccion/documentofinal_vista" method="post">
                        <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                        <!--Datos de documento final ingresados por el funcionario-->
                        <div clas="conteiner">

                            <div class="form-group col-md-12" >
                                <div class="form-group" >
                                    <h4>Complete los campos marcados con(*)</h4>
                                </div>
                                <table class="table table-bordered" border="1">
                                    <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <div class="form-group col-md-10">
                                                    <lable>Antecedentes</lable>
                                                    <input required="" type="text" name="permiso" class="form-control" placeholder="Indique el permiso">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <lable>Número Documento</lable>
                                                    <input required="" type="text" name="nodoc" class="form-control" placeholder="Número de Documento">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>PMDOUTE* </label>
                                                    <input required="" class="form-control" name="pmd" placeholder="PMDOUTE">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>UGAT*</label>
                                                    <input required="" class="form-control" name="ugat" placeholder="UGAT">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <label>Uso* </label>
                                                    <input required="" class="form-control" name="uso" placeholder="Tipo de uso">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Destino*</label>
                                                    <input required="" class="form-control" name="destino" placeholder="Tipo de destino">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" >
                                                <div class="form-group">
                                                    <label>Superfice Autorizada*</label>
                                                    <textarea required="" name="superfice" class="form-control" rows="5" placeholder=" Superfice Autorizada"></textarea>
                                                </div>
                                            </td>
                                            <td colspan="2">


                                                <div class="form-group col-md-6">
                                                    <label>Archivo Minutario*</label>
                                                    <input required="" class="form-control" name="maninuta" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Niveles* </label>
                                                    <input required=""class="form-control" name="nivel" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Elaboro*</label>
                                                    <input required=" "class="form-control" name="elaboro" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Revisó*</label>
                                                    <input required=" "class="form-control" name="reviso" placeholder="">
                                                </div>



                                            </td>

                                        </tr>

                                    </tbody>
                                </table>


                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">Generar Documento Final</button>
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class="modal fade" id="full1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos de Pago</h4>
                    </div>

                    <form target="_blank" action="<?php echo base_url(); ?>docstramites/documentoconstruccion/documentoplantillapago/<?php echo $ID; ?>" method="post">
                        <div class="modal-header">

                            <!--Datos de documento final ingresados por el funcionario-->
                            <div class="form-group col-md-12" id=""  ng-controller="PrimeraApp">
                                <table class="table table-bordered" border="1">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <div class="col-md-2 form-group">
                                                    <label>Cantidad</label>
                                                    <input  ng-change="totalpago(cobro.cantidad, '')" type="number" ng-model="cobro.cantidad"  class="form-control" min="0" step="1" placeholder="Cantidad">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label>Concepto de pago</label>
                                                    <input ng-model="cobro.concepto" type="text" class="form-control" placeholder="Concepto de pago">
                                                </div>

                                                <div class="form-group  col-md-4" >
                                                    <label>Tipo de pago* </label>
                                                    <select ng-change="totalpago('', cobro.descripcion)" ng-model="cobro.descripcion" class="form-control" id="tipo_pago">
                                                        <option value="">Seleccione el concepto de pago</option>
                                                        <?php foreach ($costo as $costot): ?>
                                                            <option value="<?php echo $costot->descripcion . "&" . $costot->costo_base . "&" . $costot->costo_tram; ?>"><?php echo $costot->descripcion; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group  col-md-2" >
                                                    <label>Total de pago : </label>
                                                    <input  type="text" class="form-control" readonly="" name="" id="totalpago" value="{{cobro.precio|number:2}}">

                                                </div>
                                                <div class="form-group  col-md-2" >

                                                    <a ng-click="addcuenta()" class="btn btn-primary">Agregar</a>

                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        Cantidad
                                                    </div>
                                                    <div class="col-md-3">
                                                        Concepto
                                                    </div>
                                                    <div class="col-md-3">
                                                        Descripcion
                                                    </div>
                                                    <div class="col-md-2">
                                                        Precio
                                                    </div>
                                                    <div class="col-md-2">
                                                        Total
                                                    </div>
                                                </div>
                                                <div class="col-md-12" ng-repeat="pagos in pago">
                                                    <div class="col-md-2">
                                                        {{pagos.cantidad}}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{pagos.concepto}}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{pagos.descripcion}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{pagos.costo}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{pagos.total|number:2}}
                                                        <a class="pull-right" ng-click="eliminar(pagos);" ><i class="fa fa-close"></i></a>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="concepto[]" value="{{pagos.cantidad}}&{{pagos.concepto}}&{{pagos.descripcion}}&{{pagos.costo}}&{{pagos.total|number:2}}"> 
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2">

                                                    </div>
                                                    <div class="col-md-3">

                                                    </div>
                                                    <div class="col-md-3">

                                                    </div>
                                                    <div class="col-md-2">
                                                        Total:
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{totalpagos|number:2}}
                                                        <input type="hidden" class="form-control" name="total_pago" value="{{totalpagos|number:2}}"> 
                                                        <input type="hidden" class="form-control" name="total_letras" value="{{totalletras}}"> 
                                                    </div>
                                                </div>
<!--                                                <input readonly="" class="form-control" name="total_letras" id="cantidadletras">-->

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>



                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">Generar Documento de Pago</button>
                            <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!--[if lt IE 9]>
            <script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
            <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <!-- BEGIN CORE PLUGINS -->
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
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->


        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="../assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
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
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/js/permisoanuncios/permisoanuncios.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/underscore-min.js" type="text/javascript"></script>
        <?php if ($ID) { ?>
            <script>
                                                                $('#hiddendoctofinal').click(function () {
                                                                    $.ajax({
                                                                        url: "<?php echo base_url('ocupacion_de_construccion/check'); ?>",
                                                                        data: {id: '<?php echo $ID; ?>'},
                                                                        type: "POST",
                                                                        success: function (respuesta) {
                                                                            if (respuesta === "1") {
                                                                                $('#full').modal('show');
                                                                            } else {

                                                                                alert('Antes de Generar el Documento Final Por Favor Genere el Documento de Pago.');
                                                                            }
                                                                        }
                                                                    });
                                                                });
            </script>
        <?php } ?>
        <script>
            $(document).ready(function () {
                $("#hiddendoctofinal").hide();
                $("#hiddendoctofinal1").hide();
                var dato = $('#divestatus').val();
                if (dato == '3' || dato == '4' || dato == '6') {
                    $("#hiddendoctopago").show();
                    $("#hiddendoctofinal").show();
                    $("#hiddendoctofinal1").show();
                } else {
                    $("#hiddendoctopago").hide();
                    $("#hiddendoctofinal").hide();
                    $("#hiddendoctofinal1").hide();
                }

                $("#status").change(function () {
                    //alert("HOLA");
                    var dato = $('select[id=status]').val();
                    if (dato == '3' || dato == '4' || dato == '6') {
                        $("#hiddendoctopago").show();
                    } else {
                        $("#hiddendoctopago").hide();
                    }

                    if (dato == '3' || dato == '4' || dato == '6') {
                        $("#hiddendoctopago").show();
                        $("#hiddendoctofinal").show();
                        $("#hiddendoctofinal1").show();

                    } else {
                        $("#hiddendoctofinal").hide();
                        $("#hiddendoctopago").hide();
                        $("#hiddendoctofinal1").hide();
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

//                document.getElementById('buscardir').addEventListener('click', function () {
//                    geocodeAddress(geocoder, map);
//                });
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

                    } else {
                        //alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>
        <script>
            function Pago(Descripcion, Cantidad, Costo, Total, Concepto) {
                this.descripcion = Descripcion;
                this.cantidad = Cantidad;
                this.costo = Costo;
                this.total = Total;
                this.concepto = Concepto;
            }

            angular.module("Aplicacion", []).controller("PrimeraApp", function ($scope) {
<?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 3): ?>
                    $scope.pago = [];
                    $scope.cobro = {};
                    $scope.datos;
                    $scope.totalpagos = 0;
                    $scope.totalletras = "";

                    $scope.addcuenta = function () {
                        if ($scope.cobro.cantidad > 0 && $scope.cobro.descripcion && $scope.cobro.concepto) {


                            var s = $scope.cobro.descripcion.split('&');
                            $scope.pago.push(new Pago(s[0], $scope.cobro.cantidad, (parseFloat(s[1]) + parseFloat(s[2])), $scope.cobro.precio, $scope.cobro.concepto));
                            $scope.cobro = {};


                        } else {


                        }
                        $scope.apply();

                    };
                    $scope.totalpago = function (cantidad, descripcion) {
                        if (cantidad != "") {
                            if ($scope.cobro.descripcion) {
                                var desc = $scope.cobro.descripcion
                                var aux = desc.split('&');
                                $scope.cobro.precio = $scope.cobro.cantidad * (parseFloat(aux[1]) + parseFloat(aux[2]));
                            } else {

                            }
                        } else {
                            if ($scope.cobro.cantidad) {
                                var desc = $scope.cobro.descripcion
                                var aux = desc.split('&');
                                var s = parseFloat(aux[1]) + parseFloat(aux[2]);
                                var t = $scope.cobro.cantidad * s;
                                $scope.cobro.precio = t;
                            }
                        }
                    };

                    $scope.eliminar = function (item) {
                        var index = $scope.pago.indexOf(item);
                        $scope.pago.splice(index, 1);
                        $scope.apply();
                    };
                    $scope.apply = function () {
                        var sum = 0;
                        $.each($scope.pago, function (a, b) {
                            sum = sum + b.total;
                        });
                        $scope.totalpagos = sum;
                        $scope.totalletras = covertirNumLetras("" + $scope.totalpagos);
                    };
<?php endif; ?>
            });



        </script> 
        <script>

            function iniciarAyuda() {

                var enjoyhint_instance = new EnjoyHint({});
                var enjoyhint_script_steps = [
                    {
                        "next #ayuda": 'Hola, Bienvenido al Trámite de  Autorización de uso de Construcción.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona el botón "Siguiente".',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    },

                    {
                        "next #paso1": 'Para comenzar el tramite por favor ingrese los siguientes datos.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    },
                    {
                        "next #paso2": 'Por favor por favor ingrese los siguientes datos del domicilio para recibir notificaciones del tramite.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso3": '<span style="color:black;">Por favor ingrese la siguiente información del inmueble.<br>De click en "Siguiente" para continuar..</span>',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso4": '<span style="color:black;">Por favor ingrese los datos generales del inmueble donde se colocara el anuncio.<br>De click en "Siguiente" para continuar..</span>',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso5": 'Por favor seleccione los peritos de su preferencia.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso6": 'Ingrese los siguientes documentos escaneados de los documentos originales.<br>De click en "Siguiente" para continuar..',
                        "nextButton": {text: "Siguiente"},
                        "skipButton": {text: "Saltar Guía"}
                    }
                    ,
                    {
                        "next #paso7": 'Cuando usted haya capturado todos los datos solicitados de click en Solicitar Trámite,<br> a continuación se guardaran los datos capturados <br>y se notificará via correo electrónico cualquier actualización del trámite.<br>De click en "Finalizar" para concluir el tutorial..',
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
                    $('#solicitar').attr("disabled", true);
                    var $this = $('#solicitar');
                    $this.button('loading');
                    alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
                });


            </script>
        <?php } ?>
    </body>
</html>