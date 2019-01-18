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
                        <h2>Permiso de Anuncios Adosados y/o Rotulados</h2><br>
                    </div>
                           
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="panel">
                                 <div class="panel-body">
                                    <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                        <div id="formToJqueryValidate">
                                            
                                            
                                         <div class="row content-box border-top border-blue" id="paso0">
                                <div class="content-box-wrapper">
                                    <div class="form-group">

                                                <div class="form-group col-md-12">
                                                    <h4><label for="varchar">¿El trámite es renovación de anuncio?</label></h4></div>
                                                <div class="form-group col-md-3">
                                                    <!--<h4><label for="varchar">¿El trámite es renovación de anuncio?</label></h4>-->
                                                    <select <?php echo $modificar; ?> class="form-control" required="" id="renov" name="renovacion">
                                                        <option value="">Seleccione Una Opción</option> 
                                                        <option value="2">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
                                                </div>


                                       </div>
                                </div>
                            </div>
                                            
                                           <div class="row content-box border-top border-blue" id="paso1">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">II. Datos Generales</h3>
                                        </div>
                                       
                                              
                                                    <input name="clave" type="hidden" <?php echo $clave; ?>>
                                                    <input name="cuenta_predial" type="hidden" <?php echo $cuenta_predial; ?>>
                                                    <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                        <div class="form-group col-md-12">
                                                            <label>Los campos marcados con (*) son obligatorios</label>
                                                        </div>
                                                    <?php endif; ?>
                                            
                                                        <div class="form-group col-md-3">
                                                            <label for="varchar">Nombre del Propietario del Inmueble *<?php echo form_error('nombrepropietarioinmuebledg') ?></label>
                                                            <input <?php echo $modificar; ?> required type="text" class="form-control" name="nombrepropietarioinmuebledg" id="nombrepropietarioinmuebledg" placeholder="Nombre del Propietario del Inmueble" value="<?php echo $nombrepropietarioinmuebledg; ?>" />
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="varchar">Nombre del Propietario del Anuncio * <?php echo form_error('nombrepropietarioanunciodg') ?></label>
                                                            <input <?php echo $modificar; ?> required type="text" class="form-control" name="nombrepropietarioanunciodg" id="nombrepropietarioanunciodg" placeholder="Nombre del Propietario del Anuncio" value="<?php echo $nombrepropietarioanunciodg; ?>" />
                                                        </div>
                                                    
                                                               <div class="form-group col-md-3">
                                                        <label for="varchar">Calle *<?php echo form_error('calledg') ?></label>
                                                        <input <?php echo $modificar; ?> required type="text" class="form-control" name="calledg" id="calledg" placeholder="Calle" value="<?php echo $calledg; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número *<?php echo form_error('numerodg') ?></label>
                                                        <input <?php echo $modificar; ?> required type="text" class="form-control" name="numerodg" id="numerodg" placeholder="Número" value="<?php echo $numerodg; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="varchar">Colonia/Fraccionamiento *<?php echo form_error('coloniadg') ?></label>
                                                        <select <?php echo $modificar; ?> class="form-control select2" name="coloniadg" tabindex="-1"  />
                                                        <?php
                                                        if (!empty($coloniadg)):
                                                            $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($coloniadg);
                                                            ?>
                                                            <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">

                                                                <?php echo $arraycolonia->NOMBRE ?>

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
                                               
                                                                                          
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Correo Electrónico* <?php echo form_error('correodg') ?></label>
                                                        <input <?php echo $modificar; ?> required type="email" class="form-control" name="correodg" id="correodg" placeholder="Correo" value="<?php echo $correodg; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Teléfono <?php echo form_error('telefonodg') ?></label>
                                                        <input <?php echo $modificar; ?> type="text" class="form-control" name="telefonodg" id="telefonodg" placeholder="Teléfono" value="<?php echo $telefonodg; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Clave Catastral *</label>
                                                        <input   <?php echo $modificar; ?> required placeholder="Clave Catastral" type="text" class="form-control" name="clave" id="clave"  value="<?php echo $clave; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Cuenta Predial *</label>
                                                        <input   <?php echo $modificar; ?> required placeholder="Cuenta Predial" type="text" class="form-control" name="cuenta_predial" id="cuenta_predial"  value="<?php echo $cuenta_predial; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                    <label for="varchar">RFC<?php echo form_error('rfcdg') ?></label>
                                                    <input <?php echo $modificar; ?> required type="text" class="form-control" name="rfcdg" id="rfcdg" placeholder="RFC" value="<?php echo $rfcdg; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">REC<?php echo form_error('recdg') ?></label>
                                                    <input <?php echo $modificar; ?> required type="text" class="form-control" name="recdg" id="recdg" placeholder="REC" value="<?php echo $recdg; ?>" />
                                                </div>
                                                
                                       </div>
                                </div>
                            </div>
                                            
                                    
                                            
                                            
                                            <div class="row content-box border-top border-blue" id="paso2">
                                                <div class="content-box-wrapper">
                                                    <div class="form-group">
                                                        <div class="form-group col-md-12">
                                                            <h3 class="title-hero">III.Ubicación del Inmueble</h3>
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                            <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                            <input <?php echo $modificar; ?> required type="text" class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                        </div>
                                                        <!--                                                <div class="form-group col-md-2">
                                                                                                            <label for="varchar">Núm. Lote *<?php // echo form_error('noloteui')              ?></label>
                                                                                                            <input required type="text" class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote" value="<?php echo $noloteui; ?>" />
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-2">
                                                                                                            <label for="varchar">Núm. Manzana *<?php // echo form_error('nomanzanaui')              ?></label>
                                                                                                            <input required type="text" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Núm. Manzana" value="<?php echo $nomanzanaui; ?>" />
                                                                                                        </div>-->
                                                        <div class="form-group col-md-2">
                                                            <label for="varchar">Número Oficial *<?php echo form_error('nooficialui') ?></label>
                                                            <input <?php echo $modificar; ?> required type="text" class="form-control" name="nooficialui" id="nooficialui" placeholder="Núm. Oficial" value="<?php echo $nooficialui; ?>" />
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="int">Colonia *<?php echo form_error('cbocoloniaui') ?></label>

                                                            <select <?php echo $modificar; ?> class="form-control select2" name="cbocoloniaui" tabindex="-1"  id="coloniadg"/>
                                                            <?php
                                                            if (!empty($cbocoloniaui)):
                                                                $arraycolonia = $this->Colonias_model->getalladatacoloniabyidpredial($cbocoloniaui);
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
                                                                <?php } endif; ?>
                                                            </select>
                                                        </div>


                                                        <div class="form-group col-md-4">
                                                            <label for="double">Superficie del Predio m²*<?php echo form_error('superficiepredioui') ?></label>
                                                            <input <?php echo $modificar; ?> required type="number" min="0" step="any" class="form-control" name="superficiepredioui" id="superficiepredioui" placeholder="Superficie del Predio" value="<?php echo $superficiepredioui; ?>" />
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="double">Superficie Construida m²*<?php echo form_error('superficieconstruidaui') ?></label>
                                                            <input <?php echo $modificar; ?> required type="number" min="0" step="any" class="form-control" name="superficieconstruidaui" id="superficieconstruidaui" placeholder="Superficie Construida" value="<?php echo $superficieconstruidaui; ?>" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                       <div class="row content-box border-top border-blue" id="paso3">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">IV. Datos del Anuncio</h3>
                                        </div>  
                                           
                                                    <div class="form-group col-md-6">
                                                        <label for="double"> Cantidad de las Carteleras</label>
                                                        <input <?php echo $modificar; ?>  type="number" title="Número de carteleras" class="form-control" name="carteleras" id="carteleras" placeholder="Número de carteleras" value="<?php echo $carteleras; ?>" />
                                                    </div>
                                                    <!-- <div class="form-group col-md-6"> -->
                                                        <!-- <label for="double">Altura Máxima de la estructura en metros (Desde nivel de piso)*</label> -->
                                                        <!-- <input  <?php //echo $modificar; ?> type="number" min="0" step=".01" class="form-control" name="altura" id="altura" placeholder="Altura Máxima" value="<?php //echo $altura; ?>" /> -->
                                                        <input type="hidden" name="altura" id="altura" value="0" />
                                                    <!-- </div> -->
                                                    <div class="form-group col-md-6">
                                                        <label for="double">Total M<sup>2</sup> del anuncio:</label>
                                                        <input <?php echo $modificar; ?>  type="number" min="0" step="any" class="form-control" name="poliza" id="poliza" placeholder="Total de m2 del anuncio" value="<?php echo $poliza; ?>" />
                                                    </div>
                                              
                                            
                                                    <div class="form-group col-md-6">
                                                        <label for="double">Dimensiones de las carteleras</label>
                                                        <textarea <?php echo $modificar; ?>  rows="5"  class="form-control" name="dimenciones" id="dimenciones" placeholder="Dimensiones" value="" ><?php echo $dimenciones; ?></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="double">Anuncio Referente a (indique el tema del anuncio):</label>
                                                        <input <?php echo $modificar; ?>  type="text" class="form-control" name="referente" id="referente" placeholder="" value="<?php echo $referente; ?>" />
                                                    </div>
                                          
                                           </div>
                                </div>
                            </div>

                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="row content-box border-top border-blue" id="paso4">
                                            <div class="content-box-wrapper">
                                                <div class="form-group">
                                                    <div class="form-group col-md-12"><?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                            <h3 class="title-hero">V. Adjunte los Siguientes Archivos Escaneados en Original</h3>
                                                        <?php else:
                                                            ?>
                                                            <h3>Revise aquí los archivos escaneados</h3>    
                                                        <?php endif; ?>
                                                    </div>






                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Documento Permiso Uso de Suelo<?php echo form_error('doctopermisousosuelo') ?></label>
                                                        <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                            <input <?php echo $doctopermisousosuelo != "" ? "" : ""; ?> type="file" multiple name="doctopermisousosuelo[]" id="doctopermisousosuelo" placeholder="doctopermisousosuelo"/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($doctopermisousosuelo)): ?><br>
                                                            <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $doctopermisousosuelo; ?>"><?php echo $doctopermisousosuelo ?></a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Documento Reporte Fotográfico *<?php echo form_error('doctofotografico') ?></label>
                                                        <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip ,.doc,.docx, .xlsx"   <?php echo $doctofotografico != "" ? "" : "required"; ?>  type="file" multiple name="doctofotografico[]" id="doctofotografico" placeholder="Documento Reporte Fotográfico"/>
                                                        <?php endif; ?>

                                                        <?php if (!empty($doctofotografico)): ?><BR>
                                                            <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $doctofotografico; ?>"><?php echo $doctofotografico; ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-4 hidden"  id="bitacora">
                                                        <label for="varchar">Bitacora</label>
                                                        <?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                                                            <input  type="file" multiple name="bitacora[]"/>
                                                        <?php endif; ?>

                                                        <?php if (!empty($bitacora)): ?><br>
                                                            <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $bitacora; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <input type="hidden" id="divestatus" value="<?php echo $status; ?>">

                                                    <?php if (!empty($status)) { ?>
                                                    <?php
                                                    if ($this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) {
                                                        
                                                    } else {
                                                        ?>
                                                        <div class="form-group col-md-4" id="hiddendoctopago">
                                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122): ?>
                                                                <a data-target="#full1" data-toggle="modal"><b>Descargar Plantilla de Pago</b></a>
                                                            <?php endif; ?>


                                                            <label for="varchar" id="parpadearxd"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                            <input type="file" multiple name="doctopago[]" id="doctopago"/>
                                                            <?php if (!empty($doctopago)): ?>
                                                                <a href="<?php echo base_url() . "assets/tramites/permisosanunciosautosoportados/" . $doctopago; ?>">Descargar Documento Adjunto</a>
                                                            <?php endif; ?>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>


                                                </div>
                                            </div>
                                        </div>


                                        <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) : ?>

                                            <div class="form-group">
                                                <div class="form-group col-md-4">
                                                    <label for="date">Fecha de Entrega *<?php echo form_error('fechaentrega') ?></label>
                                                    <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                        <input class="form-control" type="text" readonly="" name="fechaentrega" id="fechaentrega" value="<?php echo $fechaentrega; ?>" ><span class="input-group-btn">
                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Número de Control *<?php echo form_error('nocontrol') ?></label>
                                                    <input type="text" class="form-control" name="nocontrol" id="nocontrol" placeholder="Núm. de Control" value="<?php echo $nocontrol; ?>" />
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="smallint">Estatus *<?php echo form_error('status') ?></label>
                                                    <select class="form-control" name="status" id="status">
                                                        <?php if ($status == 1): ?>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Revisión de Información</option>
                                                            <option value = "3">Trámite en Proceso</option>
                                                            <option value = "4">En Espera de Pago</option>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "5">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 2): ?>
                                                            <option value = "2">En Revisión de Información</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "3">Trámite en Proceso</option>
                                                            <option value = "4">En Espera de Pago</option>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "5">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 3): ?>
                                                            <option value = "3">Trámite en Proceso</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Revisión de Información</option>
                                                            <option value = "4">En Espera de Pago</option>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "5">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 4): ?>
                                                            <option value = "4">En Espera de Pago</option>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "2">En Revisión de Información</option>
                                                            <option value = "3">Trámite en Proceso</option>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "5">Cancelado</option>
                                                        <?php endif; ?>

                                                        <?php if ($status == 5): ?>
                                                            <option value = "5">Cancelado</option>
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
                                                            <option value = "5">Cancelado</option>
                                                        <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php if ($valido_pago == 1): ?>

                                                <div class="col-md-12">
                                                    <h5 class="note note-success  bold" style=" background-color:rgba(0,255,0,0.3); ">El Trámite ya ha sido pagado.</h5>

                                                </div>


                                            <?php endif; ?>
                                            <!--<?php //if ($observaciones != ""): ?>-->
                                                <!--<div class="form-group">-->
                                                    <div class="col-md-12" id="hiddendoctopago">
                                                        <div class="form-group col-md-6">
                                                            <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 12): ?>
                                                            <a class="btn btn-primary" data-target="#full1" data-toggle="modal"><b>Generar Plantilla de Pago</b></a><br>
                                                            <?php endif; ?>

                                                         
                                                        </div>
                                                         <div class="form-group col-md-6">
                                    
                                                            <label id="parpadearxd" title="Este documento se anexa cuando el funcionario te solicite el baucher de pago." for="varchar">Documento Pago del Trámite* <i class="fa fa-question-circle"></i> <?php echo form_error('doctopago') ?></label>
                                                            <!--<input type="file" multiple name="doctopago[]" id="doctopago" placeholder="Documento Pago"/>-->
                                                            <br><?php if (!empty($doctopago)): ?>
                                                                <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $doctopago; ?>">Descargar</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="hiddendoctofinal">
                                                        <div class="form-group col-md-6">
                                                            <a data-target="#full" data-toggle="modal" class="btn btn-success"><b>Generar Documento Final</b></a>
                                                          <!--<a href="<?php // echo base_url();       ?>docstramites/documentoanuncio/documento/<?php //echo $ID;       ?>" target="_blank" class="btn btn-success">Generar Documento Final</a>-->
                                                        </div>
                                                        <div class="form-group col-md-6" >
                                                            <label for="varchar">Documento Final</i> <?php echo form_error('doctofinal') ?></label>
                                                            <!--<input type="file" multiple name="doctofinal[]" id="doctofinal" placeholder="Documento Pago"/>-->
                                                            <br> <?php if (!empty($doctofinal)): ?>
                                                                <a href="<?php echo base_url() . "assets/tramites/permisosanunciosadosados/" . $doctofinal; ?>">Descargar</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <!--<div class="form-group col-md-12">
                                                        <label class="bold" for="varchar">Observaciones</label>
                                                        <p><?php echo $observaciones; ?></>
                                                    </div>-->
                                                </div>
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
                                                        <label for="mensaje">Mensaje a ciudadano *<?php echo form_error('mensaje') ?></label>
                                                        <textarea class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                                    </div>
                                                </div>
                                        <?php endif; ?>

                                         
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                    
                                                    <!-- Botones Flotantes --><div class="button-group pull float">
  <button type="submit" id="solicitar"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Solicitando Trámite"  class="btn btn-success  glyph-icon icon-check-square-o">Realizar Trámite</button>
                                                    <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4) && $status === "4" && $doctopago): ?>
                                                        <a class="btn btn-success" href="<?php echo base_url() . "permiso_anuncios_adosados/pago/" . $ID; ?>"><i class="fa fa-credit-card"></i> <b>Pago en línea</b></a>
                                                    <?php endif; ?>
                                                    <?php if ($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 122) { ?>
                                                        <a href="<?php echo base_url(); ?>per
                                                </div>miso_anuncios_adosados" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url(); ?>infotramites/info_permisos_de_anuncios_adosados_rotulados" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                                    <?php } ?>
                                              </div><!-- Botones Flotantes -->


                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>
        <script>
                                        $(document).ready(parpa);
                                        $('#parpadear').css("color", "blue");
                                        function parpa() {
                                        $('#parpadear').fadeIn(250).delay(250).fadeOut(250, parpa)
                                                setTimeout("$('#parpadear').stop(true,true).css('opacity',1)", 200000);
                                        }
        </script>

        <script>
            $(document).ready(function () {
            var dato = $('#divestatus').val();
            if (dato == '3' || dato == '4' || dato=='6') {
            $("#hiddendoctopago").show();
            } else {
            $("#hiddendoctopago").hide();
            }

            if (dato == '3' || dato == '4' || dato=='6') {
            $("#hiddendoctofinal").show();
            } else {
            $("#hiddendoctofinal").hide();
            }

            $("#status").change(function () {
            //alert("HOLA");
            var dato = $('select[id=status]').val();
            if (dato == '3' || dato == '4' || dato == '6') {
            $("#hiddendoctopago").show();
            $("#hiddendoctofinal").show();
            } else {
            $("#hiddendoctopago").hide();
            $("#hiddendoctofinal").hide();
            }



            });
            });
        </script>
        <script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/underscore-min.js" type="text/javascript"></script>

        <script>
            function Detallespago(Concepto, Detalles) {
            this.concepto = Concepto;
            this.detalles = Detalles;
            }
            function Pago(Concepto, Cantidad, Costo, Total) {
            this.concepto = Concepto;
            this.cantidad = Cantidad;
            this.costo = Costo;
            this.total = Total;
            }
            function AnuncioDetalle(Cantidad, Descripcion, Medida1, Medida2, Medida3) {
            this.cantidad = Cantidad;
            this.descripcion = Descripcion;
            this.m1 = Medida1;
            this.m2 = Medida2;
            this.m3 = Medida3;
            }
            angular.module("Aplicacion", []).controller("PrimeraApp", function ($scope) {
<?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 3): ?>
                $scope.data = {

    <?php
    $cntador = 1;
    foreach ($costos->result() as $costo):
        echo "option" . $cntador . ": '" . trim($costo->descripcion) . "*" . trim($costo->costo_tram) . "',";
        $cntador = $cntador + 1;
    endforeach;
    ?>
    <?php if ($renovacion == 1): ?>
        <?php
        foreach ($costoreno->result() as $costo):
            echo "option" . $cntador . ": '" . trim($costo->descripcion) . "*" . trim($costo->costo_tram) . "',";
            $cntador = $cntador + 1;
        endforeach;
        ?>
    <?php endif; ?>

                };
                $scope.otroant = 0;
                $scope.name = [];
                $scope.pago = [];
                $scope.anmedidas = [];
                $scope.Anuncio = {};
                $scope.totalmedidas = 0;
                $scope.totalletras = "";
                $scope.DetallesAnuncio = [];
                $scope.verificarconst = function () {
                if (!$scope.addconst) {
                $scope.pago.splice("Constancial de validación de anuncios Adosados denotativos", 1);
                }

                }
                $scope.NuevoComentario = {};
                $scope.NuevoComentario1 = {};
                $scope.agregaranuncio = function () {

                if ($scope.Anuncio.cantidad > 0 && $scope.Anuncio.descripcion != "" && $scope.Anuncio.m1 > 0 && $scope.Anuncio.m2 > 0) {
                if ($scope.DetallesAnuncio.length > 0) {
                var mts = $scope.Anuncio.cantidad * ($scope.Anuncio.m1 * $scope.Anuncio.m2)
                        $scope.DetallesAnuncio.push(new AnuncioDetalle($scope.Anuncio.cantidad, $scope.Anuncio.descripcion, $scope.Anuncio.m1, $scope.Anuncio.m2, mts));
                $scope.totalmedidas = $scope.totalmedidas + ($scope.Anuncio.cantidad * ($scope.Anuncio.m1 * $scope.Anuncio.m2));
                } else {
                var mts = $scope.Anuncio.cantidad * ($scope.Anuncio.m1 * $scope.Anuncio.m2);
                $scope.DetallesAnuncio.push(new AnuncioDetalle($scope.Anuncio.cantidad, $scope.Anuncio.descripcion, $scope.Anuncio.m1, $scope.Anuncio.m2, mts));
                $scope.totalmedidas = $scope.Anuncio.cantidad * ($scope.Anuncio.m1 * $scope.Anuncio.m2);
                }
                } else {

                }
                $scope.Anuncio = [];
                }

                $scope.constanciapago = function (cantidad) {

    <?php foreach ($cconstancia->result() as $c): ?>
                    var doc = " <?php echo $c->descripcion; ?>";
                    var costo = <?php echo $c->costo_tram; ?>

    <?php endforeach;
    ?>

                $scope.datos = _.findWhere($scope.pago, {concepto: "" + doc});
                if ($scope.datos) {
                $scope.datos.cantidad = cantidad;
                $scope.totalconst = cantidad * $scope.datos.costo;
                $scope.datos.total = $scope.totalconst;
                } else {
                $scope.totalconst = cantidad * costo;
                $scope.pago.push(new Pago('' + doc, cantidad, costo, $scope.totalconst));
                }
                $scope.apply();
                }
                $scope.agregarapago = function () {
                if ($scope.data.singleSelect && $scope.totalmedidas > 0) {

                var axu = $scope.data.singleSelect.split('*');
                $scope.datos = _.findWhere($scope.pago, {concepto: "" + axu[0]});
                if (!$scope.datos) {
                var Total = $scope.totalmedidas * axu[1];
                $scope.pago.push(new Pago(axu[0], $scope.totalmedidas, axu[1], Total));
                $scope.anmedidas.push(new Detallespago(axu[0], $scope.DetallesAnuncio));
                } else {
                $scope.datos.cantidad = $scope.datos.cantidad + $scope.totalmedidas;
                $scope.totalconst = $scope.datos.cantidad * $scope.datos.costo;
                $scope.datos.total = $scope.totalconst;
                $scope.detallesan = _.findWhere($scope.anmedidas, {concepto: "" + axu[0]});
                if ($scope.detallesan) {
                $.each($scope.DetallesAnuncio, function (a, b) {
                $scope.detallesan.detalles.push(b);
                });
                }
                }
                $scope.DetallesAnuncio = [];
                $scope.totalmedidas = 0;
                }
                $scope.data.singleSelect = null;
                $scope.apply();
                }

                $scope.apply = function () {
                var sum = 0;
                $.each($scope.pago, function (a, b) {
                sum = sum + b.total;
                });
                $scope.totalpago = sum;
                $scope.totalletras = covertirNumLetras("" + $scope.totalpago + "");
                }
                $scope.applyanun = function () {
                var sum = 0;
                $.each($scope.DetallesAnuncio, function (a, b) {
                sum = sum + b.m3;
                });
                $scope.totalmedidas = sum;
                }
                $scope.eliminardetalle = function (item) {
                $scope.DetallesAnuncio.splice(item, 1);
                $scope.applyanun();
                }
                $scope.eliminarpago = function (item) {
                if (item.concepto == '<?php
    foreach ($cconstancia->result() as $c):
        echo $c->descripcion;

    endforeach;
    ?>') {
                $scope.addconst = false;
                $scope.cantidadconstancia = "";
                $scope.totalconst = "";
                }
                $scope.pago.splice(item, 1);
                $scope.apply();
                }

                $scope.agregarapagodia = function () {
                if ($scope.totaldias > 0) {
                var precio = $('#costopordia').val();
                var axu = precio.split('*');
                $scope.datos = _.findWhere($scope.pago, {concepto: "" + axu[0]});
                if (!$scope.datos) {

                $scope.pago.push(new Pago(axu[0], $scope.anunciosdias, axu[1], $scope.totaldias));
                $scope.anmedidas.push(new Detallespago(axu[0], $scope.DetallesAnuncio));
                } else {
                $scope.datos.cantidad = $scope.datos.cantidad + $scope.anunciosdias;
                var total = $scope.datos.cantidad * $scope.datos.costo;
                $scope.datos.total = total;
                $scope.detallesan = _.findWhere($scope.anmedidas, {concepto: "" + axu[0]});
                if ($scope.detallesan) {
                $.each($scope.DetallesAnuncio, function (a, b) {
                $scope.detallesan.detalles.push(b);
                });
                }
                }
                $scope.anunciosdias = 1;
                $('#diasanunci').val("1");
                $scope.totaldias = 0;
                $('#costopordia').val("");
                }


                $scope.apply();
                }

                $scope.anunciospordia = function (item) {
                var precio = $('#costopordia').val();
                if (precio) {
                $scope.anunciosdias = item;
                var aux = precio.split('*');
                $scope.totaldias = item * aux[1];
                }
                }
                $scope.anunciosdias = 1;
                $scope.cambiarpreciodia = function (item) {
                var precio = $('#costopordia').val();
                if (precio) {
                var aux = precio.split('*');
                $scope.totaldias = $scope.anunciosdias * aux[1];
                }
                }
                $scope.anunciosporanio = function (item) {
                var precio = $('#costoporanio').val();
                if (precio) {
                $scope.anunciosanio = item;
                var aux = precio.split('*');
                $scope.totalanios = item * aux[1];
                }
                }
                $scope.anunciosanio = 1;
                $scope.cambiarprecioanio = function (item) {
                var precio = $('#costoporanio').val();
                if (precio) {
                var aux = precio.split('*');
                $scope.totalanios = $scope.anunciosanio * aux[1];
                }
                }
                $scope.agregarapagoanio = function () {
                if ($scope.totalanios > 0) {
                var precio = $('#costoporanio').val();
                var axu = precio.split('*');
                $scope.datos = _.findWhere($scope.pago, {concepto: "" + axu[0]});
                if (!$scope.datos) {

                $scope.pago.push(new Pago(axu[0], $scope.anunciosanio, axu[1], $scope.totalanios));
                $scope.anmedidas.push(new Detallespago(axu[0], $scope.DetallesAnuncio));
                } else {
                $scope.datos.cantidad = $scope.datos.cantidad + $scope.anunciosanio;
                var total = $scope.datos.cantidad * $scope.datos.costo;
                $scope.datos.total = total;
                $scope.detallesan = _.findWhere($scope.anmedidas, {concepto: "" + axu[0]});
                if ($scope.detallesan) {
                $.each($scope.DetallesAnuncio, function (a, b) {
                $scope.detallesan.detalles.push(b);
                });
                }
                }
                $scope.anunciosdias = 1;
                $('#anunciosanioc').val("1");
                $scope.totalanios = 0;
                $('#costoporanio').val("");
                }


                $scope.apply();
                }
                $scope.Agregar = function () {
                if ($scope.NuevoComentario.Usuario && $scope.NuevoComentario.Comentarios && $scope.NuevoComentario.fecha) {
                var fecha1 = $scope.NuevoComentario.fecha.split('-');
                var fecha = new Date(fecha1[1] + "-" + fecha1[0] + "-" + fecha1[2]);
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                $scope.NuevoComentario.fecha = fecha.toLocaleDateString("es-ES", options)



                        $scope.name.push($scope.NuevoComentario);
                $scope.NuevoComentario = {};
                }
                };
                $scope.Agregarotro = function () {
                if ($scope.NuevoComentario1.Usuario && $scope.NuevoComentario1.Comentarios && $scope.NuevoComentario1.fecha) {
                var fecha1 = $scope.NuevoComentario1.fecha.split('-');
                var fecha = new Date(fecha1[1] + "-" + fecha1[0] + "-" + fecha1[2]);
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                $scope.NuevoComentario1.fecha = fecha.toLocaleDateString("es-ES", options)



                        $scope.name.push($scope.NuevoComentario1);
                $scope.NuevoComentario1 = {};
                }
                };
                $scope.removeAngtecedentes = function (item) {
                var index = $scope.name.indexOf(item);
                $scope.name.splice(index, 1);
                };
<?php endif ?>
            });
        </script>
        <script>
            $(document).ready(function(){
            var renovacion = <?php echo $renovacion != "" ? $renovacion : '""'; ?>;
            $('#renov').val(renovacion);
            if (renovacion == "1"){
            $('#bitacora').removeClass("hidden");
            } else{
            $('#bitacora').addClass("hidden");
            }
            });
            $("#renov").change(function() {
            var renovacion = $('#renov').val();
            if (renovacion == 1){
            $('#bitacora').removeClass("hidden");
            } else{
            $('#bitacora').addClass("hidden");
            }

            });
        </script>
        <script>

            function iniciarAyuda() {

            var enjoyhint_instance = new EnjoyHint({});
            var enjoyhint_script_steps = [
            {
            "next #ayuda": 'Hola, Bienvenido al Trámite de Permiso de Anuncios Adosados.<br> Para continuar con el tutorial de solicitud del trámite <br>Presiona el botón "Siguiente".',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso0": 'Para comenzar el tramite por favor indique que si su solicitud es para renovación de permiso.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            },
            {
            "next #paso1": 'Por favor complete la siguiente informacion general del solicitante.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
           
            {
            "next #paso2": 'Por favor ingrese los datos generales del inmueble donde se colocara el anuncio.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso3": '<span style="color:black;">Por favor ingrese los datos del anuncio.<br>De click en "Siguiente" para continuar..</span>',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso4": 'Ingrese los siguientes documentos escaneados de los documentos originales.<br>De click en "Siguiente" para continuar..',
                    "nextButton": {text: "Siguiente"},
                    "skipButton": {text: "Saltar Guía"}
            }
            ,
            {
            "next #paso5":'Cuando usted haya capturado todos los datos solicitados de click en Solicitar Trámite,<br> a continuación se guardaran los datos capturados <br>y se notificará via correo electrónico cualquier actualización del trámite.<br>De click en "Finalizar" para concluir el tutorial..',
                    "nextButton": {text: "Finalizar"},
                    showSkip: false
            }

            ];
            enjoyhint_instance.set(enjoyhint_script_steps);
            enjoyhint_instance.run();
            }
        </script>

        <?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 3): ?>

            <div class="modal fade" id="full1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <form target="_blank" onsubmit="return submiting()" action="<?php echo base_url(); ?>docstramites/documentoanunciosimple/documentofinalpago1_vista" method="post">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Datos de Pago</h4>
                            </div>
                            <div class="modal-container">
                                <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                <div class="form-group col-md-12" id=""  ng-controller="PrimeraApp">
                                    <table class="table table-bordered" border="1">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><label>Agregar Cobro de constancia a pago </label>
                                                    <input type="checkbox" ng-model="addconst">
                                                </td>
                                            </tr>
                                            <tr ng-if="addconst">
                                                <td colspan="2">
                                                    <div class="row">
                                                        <div class="form-group  col-md-6">
                                                            <label>Descripción</label>
                                                            <input readonly class="form-control"  value="<?php
                                                            foreach ($cconstancia->result() as $c):
                                                                echo $c->descripcion;

                                                            endforeach;
                                                            ?>">

                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <label>Cantidad</label>
                                                            <input min="1"  class="form-control" ng-model="cantidadconstancia" ng-change="constanciapago(cantidadconstancia)"  type="number" >

                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <label>Costo</label>
                                                            <input readonly class="form-control" value="{{totalconst| number:2}}">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><label>Agregar Anuncios de cobro por Tiempo </label>
                                                    <input type="checkbox" ng-model="addanun" ng-change="verificarconst()">
                                                </td>
                                            </tr>
                                            <tr ng-if="addanun">
                                                <td colspan="2">
                                                    <div class="row">
                                                        <div class="form-group  col-md-6">
                                                            <label>Descripción</label>
                                                            <select class="form-control" id="costopordia" ng-change="cambiarpreciodia(dia)" ng-model="dia" >
                                                                <option value="">---Seleccione Tipo De anuncio---</option>
                                                                <?php
                                                                foreach ($costopordia->result() as $costo):
                                                                    echo "<option value='" . trim($costo->descripcion) . "*" . trim($costo->costo_tram) . "'>" . trim($costo->descripcion) . " </option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <label>Dias de duración</label>
                                                            <input min="1" step="1"  class="form-control" id="diasanunci" ng-model="anunciosdias" ng-change="anunciospordia(anunciosdias)"  type="number" >
                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <label>Costo</label>
                                                            <input readonly class="form-control" value="{{totaldias| number:2}}">
                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <br>
                                                            <a class="btn btn-primary" ng-click="agregarapagodia()" style="width: 100%;white-space: inherit;display: inline-table; padding: 0;line-height: normal;">
                                                            Agregar a cobro</a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group  col-md-6">
                                                            <label>Descripción</label>
                                                            <select  class="form-control" id="costoporanio" ng-change="cambiarprecioanio(anios)" ng-model="anios">
                                                                <option value="">---Seleccione Tipo De anuncio---</option>
                                                                <?php
                                                                foreach ($costoporanio->result() as $costo):
                                                                    echo "<option value='" . trim($costo->descripcion) . "*" . trim($costo->costo_tram) . "'>" . trim($costo->descripcion) . " </option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <label>Cantidad de años</label>

                                                            <input min="1" step="1"  class="form-control" id="anunciosanioc" ng-model="anunciosanio" ng-change="anunciosporanio(anunciosanio)"  type="number" >

                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <label>Costo</label>
                                                            <input readonly class="form-control" value="{{totalanios| number:2}}">
                                                        </div>
                                                        <div class="form-group  col-md-2">
                                                            <br>
                                                            <a class="btn btn-primary" ng-click="agregarapagoanio()" style="width: 100%;white-space: inherit;display: inline-table; padding: 0;line-height: normal;">Agregar a cobro</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> 
                                                    <div class="row">
                                                        <div class="form-group  col-md-12">
                                                            <label><b>Datos de Anuncio</b></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group  col-md-2" ><label>Cantidad</label>
                                                            <input min="1" type="number" class="form-control" ng-model="Anuncio.cantidad" >
                                                        </div>
                                                        <div class="form-group  col-md-4"><label>Descripción</label>
                                                            <input type="text" class="form-control" ng-model="Anuncio.descripcion">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Medidas</label>
                                                            <input min="0" type="number" class="form-control" ng-model="Anuncio.m1">
                                                        </div>

                                                        <div class="form-group col-md-1" style="padding: 0px; width: 20px;">
                                                            <label>&nbsp;</label>
                                                            <br>    
                                                            <label style="padding-top: 10px; padding-left: 5px; "><span><i class="fa fa-times bigger-200"></i></span></label>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>&nbsp;</label>
                                                            <input min="0" type="number" class="form-control" ng-model="Anuncio.m2">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <a class="btn btn-primary" ng-click="agregaranuncio()">Agregar Anuncio
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class='col-md-12'>
                                                        <div class='row'>
                                                            <h4>Anuncios adosados denominativos</h4>

                                                        </div>  
                                                    </div>  
                                                    <div class='col-md-12'>
                                                        <div class='row'  ng-repeat="detalles in DetallesAnuncio">
                                                            <div class="form-group  col-md-12">
                                                                <span><b>{{detalles.descripcion}}</b></span> 
                                                                <span>({{detalles.m1}} x {{detalles.m2}} ) x {{ detalles.cantidad}} = {{detalles.m3| number:2 }}m<sup>2</sup> </span>
                                                                <a class="remove pull-right" ng-click="eliminardetalle(detalles)"><i class="fa fa-close"></i></a></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group  col-md-12" >
                                                        <label>Permiso anual para la colocacion de anuncios:</label>
                                                        <select ng-change="change()" class="form-control" name="tipo_pago" id="tipopago" ng-model="data.singleSelect">
                                                            <option value="">---Seleccione Tipo De anuncio---</option>
                                                            <?php
                                                            $contadoes = 1;
                                                            foreach ($costos->result() as $costo):
                                                                echo "<option value='{{data.option" . $contadoes . "}}'>$costo->descripcion </option>";
                                                                $contadoes = $contadoes + 1;
                                                            endforeach;
                                                            ?>
                                                            <?php if ($renovacion == 1): ?>
                                                                <?php
                                                                foreach ($costoreno->result() as $costo):
                                                                    echo "<option value='{{data.option" . $contadoes . "}}'>$costo->descripcion </option>";
                                                                    $contadoes = $contadoes + 1;
                                                                endforeach;
                                                                ?>

                                                            <?php endif; ?>
                                                        </select>
                                                        <input name="tipoan" type="hidden" value="{{tipoan}}" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group  col-md-10" >
                                                        <label>Total metros:{{totalmedidas| number : 2}} </label>

                                                    </div>
                                                    <div class=""col-md-2>
                                                        <a class="btn btn-primary" ng-click="agregarapago()">Agregar a pago</a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2"> 
                                                    <div class="form-group col-md-12" style="margin :0px;">
                                                        <div class="form-group col-md-6"><label>Descripción </label></div>
                                                        <div class="form-group col-md-2"><label>Cantidad</label></div>
                                                        <div class="form-group col-md-2"><label>Costo</label></div>
                                                        <div class="form-group col-md-2"><label>Sub Total </label></div>

                                                    </div>

                                                    <div class="form-group col-md-12" style="margin :0px;" ng-repeat="anuncio in pago">
                                                        <div class="form-group col-md-8">{{anuncio.concepto}}</div>
                                                        <div class="form-group col-md-1">{{anuncio.cantidad| number:2 }}</div>
                                                        <div class="form-group col-md-1">{{anuncio.costo| number:2}}</div>
                                                        <div class="form-group col-md-1">{{anuncio.total| number : 2}}</div>
                                                        <div class="form-group col-md-1"><a class="remove pull-right" ng-click="eliminarpago(anuncio)"><i class="fa fa-close"></i></a></a></div>
                                                        <div>

                                                            <input type="hidden" name="d50[]"value=" {{anuncio.concepto}}&{{anuncio.cantidad| number:2 }}&{{anuncio.costo| number:2}}&{{anuncio.total| number : 2}}">

                                                        </div>
                                                    </div>


                                                    <div class="form-group col-md-12" style="margin :0px;">
                                                        <div class="form-group col-md-9"></div>
                                                        <div class="form-group col-md-1">Total</div>
                                                        <div class="form-group col-md-2">${{totalpago|number : 2 }}</div>
                                                        <input type="hidden" id="total_pago" name="total_pago" value="{{totalpago|number : 2 }} ">    
                                                        <input type="hidden" name="total"value="({{totalletras}})">    
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr class="hidden" ng-repeat="detalles in anmedidas">
                                                <td>{{detalles.concepto}}</td>
                                                <td>

                                                    <div  ng-repeat="anuncio in detalles.detalles">

                                                        <input type="hidden" name="d24[]"value=" {{anuncio.cantidad}}&{{anuncio.descripcion}}&{{anuncio.m1}}&{{anuncio.m2}}&{{anuncio.m3}}">

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>    
                                    </table>


                                </div>

                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-success">Generar Documento De Pago</button>
                                <script type="text/javascript">
                                    function submiting()
                                    {
                                        var str = (parseFloat($("#total_pago").val())) ? $("#total_pago").val() : 0;
                                        
                                        if (str <= 0) 
                                        {
                                            alert("No es posible realizar la operación sin la información necesaria.");
                                            return false;
                                        }
                                    }
                                </script>
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <form target="_blank"  action="<?php echo base_url(); ?>docstramites/documentoanunciosimple/documentofinal1_vista" method="post">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Datos del anuncio y antecedentes</h4>
                            </div>
                            <div class="modal-container">
                                <input name="ID" value="<?php echo $ID; ?>" type="hidden">
                                <div class="form-group col-md-12"  ng-controller="PrimeraApp">
                                    <table class="table-bordered" border="1">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="form-group col-md-12">
                                                            <label>
                                                                <b>Antecedentes del anuncio</b>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label>Antecedente</label>
                                                        <select class="form-control" ng-model="NuevoComentario.Usuario">
                                                            <option value="">--Selecciona un Antecedente--</option>
                                                            <option value="Permiso de anuncios">Permiso de anuncios</option>
                                                            <option value="Permiso de Uso de Suelo">Permiso de Uso de Suelo</option>
                                                            <option value="Dictamen de numero oficial y Alineamiento">Dictamen de numero oficial y Alineamiento</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Descripción</label>
                                                        <input type="text" class="form-control" ng-model="NuevoComentario.Comentarios">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Fecha</label>
                                                        <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                            <input class="form-control" ng-model="NuevoComentario.fecha" placeholder="Fecha"  type="text" name="fecha_exp">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary btn-outline" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <a class="btn btn-primary" ng-click="Agregar()">Agregar</a>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>¿Otro tipo de antecedente?</label>
                                                        <input type="checkbox" ng-model="otroant">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4>Antecedentes</h4>
                                                    <div class="form-group  col-md-12" ng-repeat="names in name">
                                                        <span><b>{{names.Usuario}}</b></span><br>
                                                        <span>{{names.Comentarios}}</span>
                                                        <span>, Fecha {{names.fecha}}</span>
                                                        <a class="remove pull-right" ng-click="removeAngtecedentes(names)"><i class="fa fa-close"></i></a>
                                                        <input name="d2[{{$index}}][nombre]" value="{{names.Usuario}}" type="hidden" >
                                                        <input name="d2[{{$index}}][comentarios]" value="{{names.Comentarios}}, Fecha {{names.fecha}}" type="hidden" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group {{otroant == 1 ? '': 'hidden'}}">
                                                        <div class="form-group  col-md-12">
                                                            <label>
                                                                <b>Antecedentes del anuncio</b>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label>Antecedente</label>
                                                        <input type="text" class="form-control" ng-model="NuevoComentario1.Usuario">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Fecha </label>
                                                        <div class="input-group input-medium date date-picker" data-date-start-date="" data-date-format="dd-mm-yyyy">
                                                            <input class="form-control" placeholder="Fecha"  type="text" ng-model="NuevoComentario1.fecha" name="fecha_expa" >
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary btn-outline" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Descripción</label>
                                                        <input type="text" class="form-control" ng-model="NuevoComentario1.Comentarios">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <a class="btn btn-primary" ng-click="Agregarotro()">Agregar</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group col-md-6">
                                                        <lable>
                                                        <b>Ubicación</b>
                                                        </lable>
                                                        <br>
                                                        <select required class="form-control" name="ubicacion" ng-model="ubicacion">
                                                            <option value="">--Selecciona una Ubicación--</option>
                                                            <option value="Bardas">Bardas</option>
                                                            <option value="Anuncios en Tapiales">Anuncios en Tapiales</option>
                                                            <option value="Vidríeras">Vidríeras</option>
                                                            <option value="Escaparates">Escaparates</option>
                                                            <option value="Cortinas Metálicas">Cortinas Metálicas</option>
                                                            <option value="Marquesinas">Marquesinas</option>
                                                            <option value="Toldos">Toldos</option>
                                                            <option value="Fachadas">Fachadas</option>
                                                            <option value="Anuncios en Muros de colindancia, interioles o laterales">Anuncios en Muros de colindancia, interioles o laterales</option>
                                                            <option value="Anuncios en mobiliario urbano">Anuncios en mobiliario urbano</option>
                                                            <option value="Anuncios en azotea">Anuncios en azotea</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <lable>
                                                            <b>Número Documento</b>
                                                        </lable>
                                                        <input name="d1" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h3>Clasificación de los anuncios</h3><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label>Por su Duración</label><br>
                                                    <select required class="" name="duracion" ng-model="duracion">
                                                    <option value="">--Selecciona tipo de duración--</option>
                                                    <option value="Anuncios Eventuales">Anuncios Eventuales</option>
                                                    <option value="Anuncios Temporales">Anuncios Temporales</option>
                                                    <option value="Anuncios Permanentes">Anuncios Permanentes</option>
                                                    </select> 
                                                </td>
                                                <td>
                                                    <label>Por su Contenido</label>
                                                    <select required class="" name="contenido" ng-model="contenido">
                                                        <option value="">--Selecciona tipo de contenido--</option>
                                                        <option value="Anuncios Denominativos">Anuncios Denominativos</option>
                                                        <option value="Anuncios de Propaganda">Anuncios de Propaganda</option>
                                                        <option value="Anuncios Mixtos">Anuncios Mixtos</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="max-width: 50%">
                                                    <label>Caracteristicas de Montaje ("para seleccionar varios Mantener presionado CTRL y  dar click sobre la opción a seleccionar")</label>
                                                    <select required="" class="multiple" style="" name="" ng-model="montaje" multiple>
                                                        <option value="M1 - Anuncios Adosados">M1 - Anuncios Adosados</option>
                                                        <option value="M2 - Anuncios Integrados">M2 - Anuncios Integrados</option>
                                                        <option value="M3 - Anuncios de Caracteres Aislado">M3 - Anuncios de Caracteres Aislado</option>
                                                        <option value="M4 - Anuncios Soportados">M4 - Anuncios Soportados</option>
                                                        <option value="M5 - Anuncios en volados, salientes o colgantes">M5 - Anuncios en volados, salientes o colgantes</option>
                                                        <option value="M6 - Anuncios en objetos inflables">M6 - Anuncios en objetos inflables</option>
                                                        <option value="M7 - Anuncios Aerostáticos">M7 - Anuncios Aerostáticos</option>
                                                        <option value="M8 - Anuncios Eólicos">M8 - Anuncios Eólicos</option>
                                                    </select>
                                                    <input name="montaje" type="hidden" value="{{montaje}}" >
                                                </td>
                                                <td style="max-width: 50%">
                                                    <label>Caracteristicas de Montaje ("para seleccionar varios Mantener presionado CTRL y  dar click sobre la opción a seleccionar")</label>
                                                    <select required class="multiple" style="" name="d14" ng-model="constitucion" multiple>
                                                        <option value="C1 - Anuncios Pintados">C1 - Anuncios Pintados</option>
                                                        <option value="C2 - Anuncios Adheribles">C2 - Anuncios Adheribles</option>
                                                        <option value="C3 - Anuncios Impresos">C3 - Anuncios Impresos</option>
                                                        <option value="C4 - Anuncios de Proyección Óptica">C4 - Anuncios de Proyección Óptica</option>
                                                        <option value="C5 - Anuncios Electrónicos">C5 - Anuncios Electrónicos</option>
                                                        <option value="C6 - Anuncios Luminosos">C6 - Anuncios Luminosos</option>
                                                        <option value="C7 - Anuncios Iluminados">C7 - Anuncios Iluminados</option>
                                                        <option value="C8 - Anuncios Sonoros">C8 - Anuncios Sonoros</option>
                                                    </select>
                                                    <br>
                                                    <input name="constitucion" type="hidden" value="{{constitucion}}" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group  col-md-6" >
                                                        <label>Uso:</label>
                                                        <select  required class="form-control" name="" ng-model="uso" >
                                                            <option value="">--Selecciona un tipo de uso--</option>
                                                            <option value="Habitacional ">Habitacional</option>
                                                            <option value="Comercial">Comercial</option>
                                                            <option value="Servicios">Servicios</option>
                                                            <option value="Industrial">Industrial</option>
                                                            <option value="Mixto">Mixto</option>
                                                        </select>
                                                        <input name="uso" type="hidden" value="{{uso}}" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>PMDUOET</label>
                                                        <select required name="pmg" type="text" value="" class="form-control">
                                                            <option value="">--Seleccione PMDUOET--</option>
                                                            <option value="CHH2-CENTRO HISTORICO HABITACIONAL">CHH2-CENTRO HISTORICO HABITACIONAL</option>
                                                            <option value="H0-HAB.DENS. MUY BAJA (1 A 10 HABITANTES)">H0-HAB.DENS. MUY BAJA (1 A 10 HABITANTES)</option>
                                                            <option value="H0+CE-HAB.DENS. MUY BAJA + CONSERV.ECOLOGICA">H0+CE-HAB.DENS. MUY BAJA + CONSERV.ECOLOGICA</option>
                                                            <option value="H1-HAB. DENS. BAJA(101 A 200 HAB/HA)">H1-HAB. DENS. BAJA(101 A 200 HAB/HA)</option>
                                                            <option value="H2-HAB. DENS. MEDIA(201 A 300 HAB/HA)">H2-HAB. DENS. MEDIA(201 A 300 HAB/HA)</option>
                                                            <option value="H3-HAB. DENS. ALTA(301 A 400 HAB/HA)">H3-HAB. DENS. ALTA(301 A 400 HAB/HA)</option>
                                                            <option value="H4C ZONA DE CONJ. HABIT(401 A 500 HAB/HA)">H4C ZONA DE CONJ. HABIT(401 A 500 HAB/HA)</option>
                                                            <option value="H5C ZONA DE CONJ. HABIT(501 A 600 HAB/HA)">H5C ZONA DE CONJ. HABIT(501 A 600 HAB/HA)</option>
                                                            <option value="E-EQUIPAMIENTO">E-EQUIPAMIENTO</option>
                                                            <option value="I-INFRAESTRUCTURA">I-INFRAESTRUCTURA</option>
                                                            <option value="PU-PARQUE URBANO">PU-PARQUE URBANO</option>
                                                            <option value="S-SERVICIOS">S-SERVICIOS</option>
                                                            <option value="UM-USO MIXTO">UM-USO MIXTO</option>
                                                            <option value="IND-INDUSTRIAL">IND-INDUSTRIAL</option>
                                                            <option value="AE-ACTIVIDDES EXTRACTIVAS">AE-ACTIVIDDES EXTRACTIVAS</option>
                                                            <option value="AV-AREA VERDE">AV-AREA VERDE</option>
                                                            <option value="AO-AREA OCUPADA">AO-AREA OCUPADA</option>
                                                            <option value="AG-AGRICOLA">AG-AGRICOLA</option>
                                                            <option value="CE-CONSERVACION ECOLOGICA">CE-CONSERVACION ECOLOGICA</option>
                                                            <option value="FO-FORESTAL">FO-FORESTAL</option>
                                                            <option value="ANP-AREA NATURAL PROTEGIDA">ANP-AREA NATURAL PROTEGIDA</option>
                                                        </select>

                                                        <input name="sup" type="hidden" value="<?php echo $superficiepredioui . "m2"; ?>"class="form-control" />
                                                        <input name="altura" type="hidden" value="<?php echo $altura; ?>"class="form-control" />
                                                        <input name="carteleras" type="hidden" value="<?php echo $carteleras; ?>"class="form-control" />
                                                        <input name="dimensiones" type="hidden" value="<?php echo $dimenciones; ?>"class="form-control" />
                                                        <input name="refe" type="hidden" value="<?php echo $referente; ?>"class="form-control" />
                                                        <input name="totalan" type="hidden" value="<?php echo $poliza; ?>"class="form-control" />
                                                    </div>
                                                    <div class="form-group  col-md-6" ><label>Póliza</label>
                                                        <input required name="poliza" type="text" value=""class="form-control" />
                                                    </div>
                                                    <div class="form-group  col-md-6" ><label>UGAT</label>
                                                        <input required name="ugat" type="text" value=""class="form-control" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group  col-md-6" ><label>Archivo Minutario</label>
                                                        <input required name="archivo" type="text" value=""class="form-control" />
                                                    </div>
                                                        <div class="form-group  col-md-6" ><label>Se integra con</label>
                                                        <input required name="entrega" type="text" value=""class="form-control" />
                                                    </div>
                                                    <div class="form-group  col-md-6" ><label>Revisó</label>
                                                        <input required name="reviso" type="text" value=""class="form-control" />
                                                    </div>
                                                    <div class="form-group  col-md-6" ><label>Elaboro</label>
                                                        <input required name="elaboro" type="text" value=""class="form-control" />
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

        <?php endif; ?>
        
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
        
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script>
            /*
            $("#formclave").submit(function (e) {
                $('#solicitar').attr("disabled", true);
                var $this = $('#solicitar');
                $this.button('loading');
                alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
            });
            
            jQuery.validator.setDefaults({
              debug: false,
              success: "valid"
            });
            $( "#formclave" ).validate({
              //ignore: ':file',
              errorClass: 'errorJqueryValidator',
              rules:{
                  doctopermisousosuelo: {
                      required: true, 
                      accept: "application/msword, application/pdf"
                  }
              },
              submitHandler: function(form) { // <- pass 'form' argument in
                    $("#solicitar").attr("disabled", true);
                    var $this = $('#solicitar');
                    $this.button('loading');
                    alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
                    form.submit(); // <- use 'form' argument here.
              }
            });

            jQuery.extend(jQuery.validator.messages, {
                required: "Éste es un campo necesario",
                number: "Capture un valor numérico válido",
                accept: jQuery.validator.format("Seleccione un archivo válido: {0}")
            });
            
            */

        </script>
        
        
    </body>
</html>