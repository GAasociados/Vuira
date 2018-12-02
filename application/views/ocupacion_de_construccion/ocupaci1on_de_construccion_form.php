    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>
    <?php  ?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Ventanilla Única Irapuato</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <!-- END HEAD -->

        <body class="page-container-bg-solid">
            <div class="page-wrapper">
                <div class="page-wrapper-row">
                    <div class="page-wrapper-top">
                        <!-- BEGIN HEADER -->
                        <?php $this->load->view('base/header'); ?>
                        <!-- END HEADER -->
                    </div>
                </div>
                <div class="page-wrapper-row full-height">
                    <div class="page-wrapper-middle">
                        <!-- BEGIN CONTAINER -->
                        <div class="page-container">
                            <!-- BEGIN CONTENT -->
                            <div class="page-content-wrapper">
                                <!-- BEGIN CONTENT BODY -->
                                <!-- BEGIN PAGE HEAD-->
                                <div class="page-head">
                                    <div class="container-fluid">

                                        <!-- BEGIN PAGE TITLE -->
                                        <div class="page-title">
                                            <h1>Autorización de uso de Construcción</h1>
                                        </div>
                                        <!-- END PAGE TITLE -->
                                    </div>
                                </div>
                                <!-- END PAGE HEAD-->
                                <!-- BEGIN PAGE CONTENT BODY -->
                                <div class="page-content">
                                    <div class="container-fluid">
                                      <br>
                                      <ul class="nav nav-pills nav-justified steps">
                                         <li class="active">
                                            <a data-toggle="tab" class="step" aria-expanded="true">
                                                <span class="number"> 1 de 1 - </span>
                                                <span class="desc">
                                                    <b>Autorización de uso de Construcción</b><i class="fa fa-check"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                       
                                    </div>
                               
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                    <h4 class="block">Datos Generales</h4>
	    <div class="form-group">
         <div class="form-group col-md-6">
            <label for="varchar">Nombre del Propietario *<?php echo form_error('nombrepropietariodg') ?></label>
            <input required="" type="text" class="form-control" name="nombrepropietariodg" id="nombrepropietariodg" placeholder="Nombre del Propietario" value="<?php echo $nombrepropietariodg; ?>" />
        </div>
	    <div class="form-group col-md-6">
            <label for="varchar">Nombre del Representante <?php echo form_error('nombresolicitantedg') ?></label>
            <input type="text" class="form-control" name="nombresolicitantedg" id="nombresolicitantedg" placeholder="Nombre del Representante" value="<?php echo $nombresolicitantedg; ?>" />
        </div>
        </div>

        <h4 class="block">Domicilio Para Recibir Notificaciones</h4>
	    <div class="form-group">
        <div class="form-group col-md-4">
            <label for="varchar">Calle *<?php echo form_error('calledg') ?></label>
            <input required="" type="text" class="form-control" name="calledg" id="calledg" placeholder="Calle" value="<?php echo $calledg; ?>" />
        </div>
	    <div class="form-group col-md-3">
            <label for="varchar">Número *<?php echo form_error('numerodg') ?></label>
            <input required=""  type="text" class="form-control" name="numerodg" id="numerodg" placeholder="Número" value="<?php echo $numerodg; ?>" />
        </div>
	    <div class="form-group col-md-5">
        <label for="varchar">Colonia/Fraccionamiento *<?php echo form_error('coloniadg') ?></label>
        <select class="form-control" name="coloniadg" tabindex="-1"  id="coloniadg"/>
        <?php if (!empty($coloniadg)):
        $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($coloniadg);
        ?>
        <option value="<?php echo $arraycolonia->ID;?>">
        <?php echo $arraycolonia->colonia." - (".$arraycolonia->tipo_de_asentamiento.")"; ?>
        </option>
        <?php endif; ?>
        <?php foreach ($consulta->result() as $fila) { ?>
        <option value="<?php echo $fila->ID;?>">
        <?php echo $fila->colonia." - (".$fila->tipo_de_asentamiento.")"; ?>
        </option>
        <?php } ?>
        </select>
        </div>
        </div>

	    <div class="form-group">
        <div class="form-group col-md-6">
            <label for="varchar">Correo Electrónico *<?php echo form_error('correodg') ?></label>
            <input required="" type="email" class="form-control" name="correodg" id="correodg" placeholder="Correo Electrónico" value="<?php echo $correodg; ?>" />
        </div>
	    <div class="form-group col-md-6">
            <label for="varchar">Teléfono *<?php echo form_error('telefonodg') ?></label>
            <input required="" type="text" class="form-control" name="telefonodg" id="telefonodg" placeholder="Teléfono" value="<?php echo $telefonodg; ?>" />
        </div>
        </div>
        <h4 class="block">Ubicación del Inmueble</h4>
	    <div class="form-group">
        <div class="form-group col-md-3">
            <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
            <input required="" type="text" class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
        </div>
        <div class="form-group col-md-3">
            <label for="varchar">Núm. Oficial *<?php echo form_error('nooficialui') ?></label>
            <input required="" type="text" class="form-control" name="nooficialui" id="nooficialui" placeholder="Núm. Oficial" value="<?php echo $nooficialui; ?>" />
        </div>
	    <div class="form-group col-md-3">
            <label for="varchar">Núm. de Lote *<?php echo form_error('nodeloteui') ?></label>
            <input required="" type="text" class="form-control" name="nodeloteui" id="nodeloteui" placeholder="Núm. de Lote" value="<?php echo $nodeloteui; ?>" />
        </div>
	    <div class="form-group col-md-3">
            <label for="varchar">Manzana *<?php echo form_error('manzanaui') ?></label>
            <input required="" type="text" class="form-control" name="manzanaui" id="manzanaui" placeholder="Manzana" value="<?php echo $manzanaui; ?>" />
        </div>
	    
        </div>
	    <div class="form-group">

        <div class="form-group col-md-5">
        <label for="varchar">Colonia/Fraccionamiento *<?php echo form_error('cbocolsui') ?></label>
        <select class="form-control" name="cbocolsui" tabindex="-1"  id="cbocolsui"/>
        <?php if (!empty($cbocolsui)):
        $arraycolonia = $this->Colonias_model->getalladatacoloniabyid($cbocolsui);
        ?>
        <option value="<?php echo $arraycolonia->ID;?>">
        <?php echo $arraycolonia->colonia." - (".$arraycolonia->tipo_de_asentamiento.")"; ?>
        </option>
        <?php endif; ?>
        <?php foreach ($consulta->result() as $fila) { ?>
        <option value="<?php echo $fila->ID;?>">
        <?php echo $fila->colonia." - (".$fila->tipo_de_asentamiento.")"; ?>
        </option>
        <?php } ?>
        </select>
        </div>
        



	    <div class="form-group col-md-3">
            <label for="double">Superficie Predio m² *<?php echo form_error('superficiepredioui') ?></label>
            <input type="text" class="form-control" name="superficiepredioui" id="superficiepredioui" placeholder="Superficie Predio m²" value="<?php echo $superficiepredioui; ?>" />
        </div>
	    <div class="form-group col-md-4">
            <label for="double">Superficie Construida m² *<?php echo form_error('superficieconstruidaui') ?></label>
            <input type="text" class="form-control" name="superficieconstruidaui" id="superficieconstruidaui" placeholder="Superficie Construida" value="<?php echo $superficieconstruidaui; ?>" />
        </div>
       </div>
       
	   <div class="form-group">
	   <div class="form-group col-md-3">
            <label for="varchar">Superficie a Construir m². *<?php echo form_error('superficieconstruirui') ?></label>
            <input type="text" required class="form-control" name="superficieconstruirui" id="superficieconstruirui" placeholder="Superficie a Construir" value="<?php echo $superficieconstruirui; ?>" />
        </div>
        
       <div class="form-group col-md-3">
            <label for="double">Bardeo mts. *<?php echo form_error('bardeoui') ?></label>
            <input type="text" class="form-control" name="bardeoui" id="bardeoui" placeholder="Bardeo mts" value="<?php echo $bardeoui; ?>" />
        </div>
        
	    
        <div class="form-group col-md-3">
            <label for="int">Núm. de Niveles *<?php echo form_error('nonivelesui') ?></label>
            <input type="text" class="form-control" name="nonivelesui" id="nonivelesui" placeholder="Núm. de Niveles" value="<?php echo $nonivelesui; ?>" />
        </div>
	
        <div class="form-group col-md-3">
            <label for="int">Núm. Cajones *<?php echo form_error('nocajonesui') ?></label>
            <input type="text" class="form-control" name="nocajonesui" id="nocajonesui" placeholder="Núm. Cajones" value="<?php echo $nocajonesui; ?>" />
        </div>
        </div>
	    <div class="form-group">
        <div class="form-group col-md-5">
            <label for="int">Núm. de Viviendas *<?php echo form_error('noviviendasui') ?></label>
            <input type="text" class="form-control" name="noviviendasui" id="noviviendasui" placeholder="Núm. de Viviendas" value="<?php echo $noviviendasui; ?>" />
        </div>
	    <div class="form-group col-md-7">
            <label for="float">% Avance de Obra(Para solicitar el trámite la obra se debe contar con al menos un 90% de avance.) * <?php echo form_error('porcentajeavanceui') ?></label>
            <input type="number" class="form-control" name="porcentajeavanceui" id="porcentajeavanceui" placeholder="Porcentaje de avance de Obra" value="<?php echo $porcentajeavanceui; ?>" min="90" max="100"/>
        </div>
        </div>
	       <div class="form-group">
                                   <div class="form-group col-md-12">
                                     <!--
                                        <label for="varchar">Localización del Inmueble *<?php echo form_error('mapa') ?></label>
                                      -->
                                        <?php if (!empty($mapa)){ ?>
                                          <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                        <?php } else {?>
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


        <div class="form-group">
                <h3>Datos del Perito</h3>
                <div class="form-group col-md-4">
                      <label for="varchar">Nombre del Perito *<?php echo form_error('nombreperitodp') ?></label>

                      <select class="form-control" name="nombreperitodp" tabindex="-1"  id="nombreperitodp">
                        <?php if (!empty($nombreperitodp)){
                          $arrayperito = $this->Peritos_model->getperitosbyid($nombreperitodp);
                          ?>
                          <option value="<?php echo $nombreperitodp;?>">
                              <?php echo $arrayperito[0]->nombre; ?>
                          </option>
                        <?php } ?>

                        <?php foreach ($resultperitos->result() as $fila) { ?>
                          <option value="<?php echo $fila->ID;?>">
                            <?php echo $fila->nombre; ?>
                          </option>
                          <?php } ?>
                          <!-- <option value="Option 1">Option 1</option> -->
                        </select>

                  </div>
                <div class="form-group col-md-4">
                      <label for="varchar">Núm. de Registro <?php echo form_error('noregistroperitodp') ?></label>
                      <input readonly type="text" class="form-control" name="noregistroperitodp" id="noregistroperitodp" placeholder="Núm. de Registro" value="<?php echo $noregistroperitodp; ?>" />
                  </div>
                <div class="form-group col-md-4">
                      <label for="varchar">Teléfono del Perito <?php echo form_error('telefonoperitodp') ?></label>
                      <input readonly type="text" class="form-control" name="telefonoperitodp" id="telefonoperitodp" placeholder="Teléfono del Perito" value="<?php echo $telefonoperitodp; ?>" />
                  </div>
              </div>

              <div class="form-group">
                  <div class="form-group col-md-4">
                      <label for="int">Nombre Perito Especializado <?php echo form_error('nombreperitoresponsabledp') ?></label>

                      <select class="form-control" name="nombreperitoresponsabledp" tabindex="-1"  id="nombreperitoresponsabledp">
                        <?php if (!empty($nombreperitoresponsabledp)){
                          $arrayperito = $this->Peritos_model->getperitosespbyid($nombreperitoresponsabledp);
                          ?>
                          <option value="<?php echo $nombreperitoresponsabledp;?>">
                              <?php echo $arrayperito[0]->nombre; ?>
                          </option>
                        <?php } ?>

                        <?php foreach ($resultperitosesp->result() as $fila) { ?>
                          <option value="<?php echo $fila->ID;?>">
                            <?php echo $fila->nombre; ?>
                          </option>
                          <?php } ?>
                          <!-- <option value="Option 1">Option 1</option> -->
                        </select>
                  </div>

                  <div class="form-group col-md-4">
                      <label for="varchar">Núm. de Registro <?php echo form_error('noregistroresponsabledp') ?></label>
                      <input readonly type="text" class="form-control" name="noregistroresponsabledp" id="noregistroresponsabledp" placeholder="Núm. de Registro" value="<?php echo $noregistroresponsabledp; ?>" />
                  </div>

                  <div class="form-group col-md-4">
                      <label for="varchar">Teléfono Perito <?php echo form_error('telefonoresponsabledp') ?></label>
                      <input readonly type="text" class="form-control" name="telefonoresponsabledp" id="telefonoresponsabledp" placeholder="Teléfono Perito" value="<?php echo $telefonoresponsabledp; ?>" />
                  </div>
              </div>


            



	     <div class="form-group">
                <h3>Adjuntar documentos en original</h3>
            <div class="form-group col-md-4">
            <label for="varchar">Bitácora de Obra *<?php echo form_error('docsbitacora') ?></label>
            <input type="file" multiple name="docsbitacora[]" id="docsbitacora"/>
                      <?php if(!empty($docsbitacora)): ?>
                        <a href="<?php echo base_url()."assets/tramites/construccion/".$docsbitacora; ?>">Descargar</a>
                      <?php endif; ?>
                  </div>

            
	    
        <div class="form-group col-md-4">
            <label for="varchar">Planos Actualizados<?php echo form_error('docsplano') ?></label>
            <input type="file" multiple name="docsplano[]" id="docsplano"/>
                      <?php if(!empty($docsplano)): ?>
                        <a href="<?php echo base_url()."assets/tramites/construccion/".$docsplano; ?>">Descargar</a>
                      <?php endif; ?>
                  </div>
	    
        <div class="form-group col-md-4">
            <label for="varchar">Visto Bueno de Cuerpo de Bomberos, Protección Civil y Policía Vial <?php echo form_error('docsvbuenofinales') ?></label>
            <input type="file" multiple name="docsvbuenofinales[]" id="docsvbuenofinales"/>
                      <?php if(!empty($docsvbuenofinales)): ?>
                        <a href="<?php echo base_url()."assets/tramites/construccion/".$docsvbuenofinales; ?>">Descargar</a>
                      <?php endif; ?>
                  </div>
        
	    
        <div class="form-group col-md-4">
            <label for="varchar">Permiso de Construcción Vigente *<?php echo form_error('docspermisoconstruccion') ?></label>
            <input  type="file" multiple name="docspermisoconstruccion[]" id="docspermisoconstruccion"/>
                      <?php if(!empty($docspermisoconstruccion)): ?>
                        <a href="<?php echo base_url()."assets/tramites/construccion/".$docspermisoconstruccion; ?>">Descargar</a>
                      <?php endif; ?>
        </div>
	    <div class="form-group col-md-4">
            <label for="varchar">Reporte Fotográfico Actual * <?php echo form_error('docsreportefotografico') ?></label>
            <input type="file" multiple name="docsreportefotografico[]" id="docsreportefotografico"/>
                      <?php if(!empty($docsreportefotografico)): ?>
                        <a href="<?php echo base_url()."assets/tramites/construccion/".$docsreportefotografico; ?>">Descargar</a>
                      <?php endif; ?>
                  </div>
        
        <input type="hidden" id="divestatus" value="<?php echo $status; ?>">

                  <?php if(!empty($status)){ ?>
                  
                  <?php if($this->session->userdata('tipo') == 16 || $this->session->userdata('tipo') == 166 || $this->session->userdata('tipo') == 11 ||$this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111){}else{?>
                  
        <div class="form-group col-md-4" id="hiddendoctopago">
        <?php if($this->session->userdata('tipo') == 11 ||  $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111){?>
        <a href="<?php echo base_url(); ?>docstramites/documentoconstruccion/documentoplantillapago/<?php echo $ID; ?>"><b>Descargar Plantilla de Pago</b></a>
        <?php }?>
        <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('docspago') ?></label>
                            <input type="file" multiple name="docspago[]" id="docspago"/>
                            <?php if(!empty($docspago)): ?>
                              <a href="<?php echo base_url()."assets/tramites/construccion/".$docspago; ?>">Descargar</a>
                            <?php endif; ?>
                      </div>

                  <?php } 
                  } ?>
              </div>


              <?php if ($this->session->userdata('tipo') == 16){
                  if($requiereverificador == 1){
              ?>
                <div class="form-group col-md-12">
                 <h3>Datos para verificación</h3>
                    <div class="form-group col-md-4">
                        <label for="date">Elija un verificador</label>
                    <select class="form-control" name="verificador" id="verificador">
                          <option value = "<?php echo $verificador;?>"><?php echo $verificador;?></option>
                          <option value = "11">Verificador A</option>
                          <option value = "11">Verificador B</option>
                          <option value = "11">Verificador C</option>
                    </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="date">Fecha de Verificación <?php //echo form_error('fechaverificacion') ?></label>
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
                    
              <?php }
              }?>
              
             <?php if ($this->session->userdata('tipo') == 166){
                  if($requiereverificador == 1){
              ?>
              
                                  <?php if($requiereverificador == 1){?>
                    <div class="form-group col-md-12">
                        <br><br>
                    <div class="form-group col-md-3">
                        <label for="date">Nombre del verificador</label>
                    <select class="form-control" name="verificador" id="verificador">
                          <option value = "<?php echo $verificador;?>"><?php echo $verificador;?></option>
                    </select>
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label for="date">Fecha de Verificación <?php //echo form_error('fechaverificacion') ?></label>
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
                    
                    <?php }?>
                    
                    <div class="form-group col-md-12">
                    <h3>Documento Verificador</h3>
                     <label for="varchar" id="parpadearxd"> <b>Documento Verificador *</b> <?php echo form_error('doctoverificador') ?></label>
                            <input type="file" multiple name="doctoverificador[]" id="doctoverificador"/>
                            <?php if(!empty($doctoverificador)): ?>
                              <a href="<?php echo base_url()."assets/tramites/permisosanunciosautosoportados/".$doctoverificador; ?>">Descargar</a>
                    <?php endif; ?>
                    </div>
                    
              <?php }
              }?>
              
              
        

	            <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111 ){ ?>
                                    <div class="form-group col-md-12">
                    <h3>Datos del verificador</h3>
                    <div class="form-group col-md-3">
                    <label>Requiere Verificador</label>
                    <select class="form-control" name="requiereverificador" id="requiereverificador">
                        <?php if($requiereverificador == 1){?>
                        <option value = "1">Si</option>
                        <option value = "2">No</option>
                         <?php } else{ ?>
                        <option value = "2">No</option>
                        <option value = "1">Si</option>
                         <?php }?>
                    </select>
                    </div>    
                    </div>
                    <?php if($requiereverificador == 1){?>
                    <div class="form-group col-md-3">
                        <label for="date">Nombre del verificador</label>
                    <select class="form-control" name="verificador" id="verificador">
                          <option value = "<?php echo $verificador;?>"><?php echo $verificador;?></option>
                    </select>
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label for="date">Fecha de Verificación <?php //echo form_error('fechaverificacion') ?></label>
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
                            <input type="file" multiple name="doctoverificador[]" id="doctoverificador"/>
                            <?php if(!empty($doctoverificador)): ?>
                              <a href="<?php echo base_url()."assets/tramites/permisosanunciosautosoportados/".$doctoverificador; ?>">Descargar</a>
                    <?php endif; ?>
                    </div>
                    
                    <?php }?>
                    
                <?php } ?>
                
        <?php if ($this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 111 ): ?>
	    <div class="form-group col-md-12">
	        <h3>Funcionario</h3>
        <div class="form-group col-md-6">
            <label for="varchar">No. Permiso * <?php echo form_error('nocontroldp') ?></label>
            <input type="text" class="form-control" name="nocontroldp" id="nocontroldp" placeholder="Nocontroldp" value="<?php echo $nocontroldp; ?>" />
        </div>
        <div class="form-group col-md-6">
            
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

	    
	    
	    <div class="form-group">
                <div class="form-group col-md-12">
                      <label for="varchar">Mensaje <?php echo form_error('mensaje') ?></label>
                      <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Mensaje" rows="5" cols="80"><?php echo $mensaje; ?></textarea>
                </div>
              </div>
              <div class="form-group">
              <div class="form-group col-md-12">
                  <div class="form-group">
                    <br>
                    <?php if($this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 11 ): ?>
                      <a href="<?php echo base_url(); ?>docstramites/documentoconstruccion/documento/<?php echo $ID; ?>" class="btn btn-success">Generar Documento Final</a>
                    <?php endif; ?>
                  </div>
                </div>
                </div>

                <div class="form-group col-md-12" id="hiddendoctofinal">
                <div class="form-group">
                  <label for="varchar">Documento Final *<?php echo form_error('docsfinal') ?></label>
                  <input type="file" multiple name="docsfinal[]" id="docsfinal"/>
                            <?php if(!empty($docsfinal)): ?>
                              <a href="<?php echo base_url()."assets/tramites/construccion/".$docsfinal; ?>">Descargar</a>
                    <?php endif; ?>
                    </div>

              </div>
                               <?php endif; ?>
              <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
              </div>
          </form>
                <!-- END PAGE CONTENT INNER -->
              </div>
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
      <?php $this->load->view('base/footer'); ?>
      <!-- END INNER FOOTER -->
      <!-- END FOOTER -->
    </div>
  </div>
</div>
<div class="quick-nav-overlay"></div>
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>           <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/js/permisoanuncios/permisoanuncios.js" type="text/javascript"></script>


<script>
$(document).ready(function (){
  var dato = $('#divestatus').val();
  if (dato == 4 || dato == 6) {
    $("#hiddendoctopago").show();
  }else{
    $("#hiddendoctopago").hide();
  }

$("#status").change(function(){
  //alert("HOLA");
var dato =  $('select[id=status]').val();
if (dato == 4) {
  $("#hiddendoctopago").show();
}else{
  $("#hiddendoctopago").hide();
}

if (dato == 6) {
  $("#hiddendoctopago").show();
  $("#hiddendoctofinal").show();
}else{
  $("#hiddendoctofinal").hide();
}

});

 $('#nooficialui').keyup(function (){
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

          geocodeAddress(geocoder, map);

          document.getElementById('buscardir').addEventListener('click', function() {
            geocodeAddress(geocoder, map);
          });
        }

        function geocodeAddress(geocoder, resultsMap) {
          var address = document.getElementById('address').value;
          geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
              resultsMap.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location,
                draggable:true
              });
              //document.getElementById("address").value = results[0].geometry.location;
              //document.getElementById("address").value = results[0].geometry.location;
              resultsMap.addListener('mousemove', function() {
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

        </body>
        </html>
