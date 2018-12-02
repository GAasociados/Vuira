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
                                        <div class="btnRegresar hidden-xs hidden-xm pull-right" >

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
                    <h2>Claves Catastrales Fraccionamientos</h2><br>
  
      
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                            <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                             <div class="row">
                                            <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3 ) && isset($fechafinal) != null && isset($numerocontrol)): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="4" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_catastrales_fraccionamiento/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Imprimir Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?> 
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
                                                        <label>Escritura de Compra Venta </label>
                                                        <?php if ($modificar == ""): ?> 
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file"   name="fisrfc[]" multiple="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($fisrfc)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $fisrfc; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-4" >

                                                        <label>Documento Acta constitutiva </label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip"  class="" type="file" name="acta_const[]" multiple="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($acta_const)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $acta_const; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-4" >
                                                        <label>Poder Notarial para representación de persona moral</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input   accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="poder_nota[]" multiple="">
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php if (!empty($poder_nota)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $poder_nota; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4" >
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional)</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="">
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                
                                
                                <div id="panel-identificacion-inmueble" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">I. Identificación y Ubicación del Inmueble?</h3>
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
                                                        <input <?php echo $modificar; ?> type="number" class="form-control" required="" min="1" placeholder="Total de Claves" name="cantidad" id="cantidadporpago" value="<?php echo $cantidad ?>"/>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endif; ?>

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
                                            <div class="form-group">

                                                <div class="form-group col-md-4">
                                                    <div id="paso2">
                                                        <label for="varchar">Cuenta Predial *<?php echo form_error('predialui') ?></label>
                                                        <input  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  <?php echo $modificar; ?> required type="text" pattern="[a-zA-Z0-9]+" class="form-control" name="predialui" id="predialui" placeholder="Cuenta Predial " value="<?php echo $predialui; ?>" maxlength="12"/>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8" id="paso3">
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Calle *<?php echo form_error('calleui') ?></label>
                                                        <input <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  required type="text"  class="form-control" name="calleui" id="calleui" placeholder="Calle" value="<?php echo $calleui; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Exterior  *<?php echo form_error('nooficialui') ?></label>
                                                        <input <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"   required type="text" pattern="[a-zA-Z0-9 -/]+" class="form-control" name="nooficialui" id="nooficialui" placeholder="Número Exterior" value="<?php echo $nooficialui != "" ? $nooficialui : "S/N"; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Interior</label>
                                                        <input <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text" pattern="[a-zA-Z0-9 -/]+" class="form-control" name="nooficialuin" id="nooficialuin" placeholder="Número Interior" value="<?php echo $nooficialuin; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="paso4"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Número de Lote*<?php echo form_error('noloteui') ?></label>
                                                    <input <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  required="" pattern="L-[0-9A-Z]+" type="text" class="form-control" name="noloteui" id="noloteui" placeholder="Número de Lote" title="Debe cumplir con el formato L-'tu número de lote'"  value="<?php echo $noloteui != "" ? $noloteui : 'L-'; ?>" />
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="varchar">Manzana*<?php echo form_error('nomanzanaui') ?></label>
                                                    <input <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required="" pattern="M-[0-9A-Z]+" type="text" class="form-control" name="nomanzanaui" id="nomanzanaui" placeholder="Manzana" title="Debe cumplir con el formato M-'tu número de manzana'" value="<?php echo $nomanzanaui != "" ? $nomanzanaui : 'M-'; ?>" />
                                                </div>


                                                <div id="coloniauno" class="form-group col-md-6">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>


                                                    <select <?php echo $modificar; ?>   class="form-control select2" required=""  title="Indica tu colonia"  tabindex="-1" name="cbocoloniaui" tabindex="-1"  id="cbocoloniaui"/>
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
                                                    <input <?php echo $modificar; ?>  style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();"  type="text"   id="colonia2" name="colonia2" placeholder="Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido " class="form-control" value="<?php echo $coloniados; ?>">
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
                                </div> <!-- DIV PANEL- 1-->
                                
                                 <div id="panel-datos-propietario" class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">II. Datos del Propietario y/o Representante</h3>
                                        <div class="bordered-row">
                                           <div class="row">
 <div class="row"> 
                                            <div class="form-group">
                                                <div class="form-group col-md-4" id="paso6">
                                                    <label for="varchar">Nombre Completo del Propietario *<?php echo form_error('nombrepropietariodp') ?></label>
                                                    <input <?php echo $modificar; ?> style="text-transform:uppercase;" onkeyup="javascript:this.value = this.value.toUpperCase();" required type="text"  class="form-control" name="nombrepropietariodp" id="nombrepropietariodp" placeholder="Nombre Completo del Propietario" value="<?php echo $nombrepropietariodp; ?>" />
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
                                        <div class="row" id="paso10">
                                          


                                            <div class="form-group">
                                                <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación de Propietario (INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoine') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file" multiple name="doctoine[]" id="doctoine" placeholder="doctoine"/>
                                                        <?php endif; ?>  
                                                        <?php if (!empty($doctoine)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoine; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación (INE,Pasaporte,Cédula Profesional) *</label>

                                                        <?php if (!empty($identificacionar)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $identificacionar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Acta Constitutiva o Poder Simple *<?php echo form_error('doctopodersimple') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctopodersimple[]" id="doctopodersimple" placeholder="doctopodersimple"/>
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctopodersimple)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopodersimple; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial *<?php echo form_error('doctoplanodigital') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctoplanodigital[]" id="doctoplanodigital" placeholder="doctoplanodigital"/>
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
                                                        <input type="file" multiple name="doctooficio[]" id="doctooficio" placeholder="doctooficio"/>
                                                    <?php endif; ?>
                                                    <?php if (!empty($doctooficio)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctooficio; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Plano físico de Traza autorizada por la Dirección General de Desarrollo Territorial  *<?php echo form_error('doctoplanofisico') ?></label>
                                                    <?php if ($modificar == ""): ?>
                                                        <input type="file" multiple name="doctoplanofisico[]" id="doctoplanofisico" placeholder="doctoplanofisico"/>

                                                    <?php endif; ?>
                                                    <?php if (!empty($doctoplanofisico)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctoplanofisico; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if (empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *<?php echo form_error('doctopredial') ?></label>
                                                        <?php if ($modificar == ""): ?>
                                                            <input type="file" multiple name="doctopredial[]" id="doctopredial" placeholder="doctopredial"/>
                                                        <?php endif; ?>
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopredial; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>

                                                <?php if (!empty($rpredial)): ?> 
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Recibo Predial actualizado general y/o Cuentas Prediales Individuales *</label>

                                                        <?php if (!empty($rpredialar)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $rpredialar; ?>">Descargar</a>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="varchar">Escritura Pública de Propiedad que contenga la Foja Registral y ampare la Superficie Registrada (en caso de no contener la foja registral anexar copia de Libertad de Gravamen) *<?php echo form_error('doctolegal') ?></label>
                                                <?php if ($modificar == ""): ?>
                                                    <input type="file" multiple name="doctolegal[]" id="doctolegal" placeholder="doctolegal"/>
                                                <?php endif; ?>
                                                <?php if (!empty($doctolegal)): ?>
                                                    <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctolegal; ?>">Descargar</a>
                                                <?php endif; ?>
                                            </div>



                                            <input type="hidden" id="divestatus" value="<?php echo $status; ?>">
                                        </div>

                                        <div class="row">

                                            <div class="row"> 
                                                <?php if (1 == 2): ?>
                                                    <div class="form-group col-md-4">
                                                        <a target="_blank" class="btn btn-success" href="<?php echo base_url() . 'docstramites/documentoanuncio/documentopagofraccionamiento/' . $ID ?>"><b>Descargar Plantilla de Pago</b></a>
                                                    </div>
                                                    <div class="form-group col-md-4" >
                                                        <?php if (!empty($status)): ?>
                                                            <label for="varchar" id="parpadear"> <b>Documento Orden de Pago *</b> <?php echo form_error('doctopago') ?></label>
                                                            <!--<input type="file" multiple name="doctopago[]" id="doctopago"/>-->
                                                            <?php if (!empty($doctopago)): ?>
                                                                <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctopago; ?>">Descargar</a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                            </div> 
                                    

                                                <div class=" form-group col-md-4" >
                                                    <label for="varchar"> <b>Documento Final *</b> <?php echo form_error('doctofinal') ?></label>
                                                    <!--<input type="file" multiple name="doctofinal[]" id="doctofinal"/>-->

                                                    <?php if (!empty($doctofinal)): ?>
                                                        <a href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $doctofinal; ?>">Descargar</a>
                                                    <?php endif; ?>

                                                </div>



                                      

                                            <div class="col-md-12">
                                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                <div class="form-group">

                                                    <a href="<?php echo base_url(); ?>claves_catastrales_fraccionamiento/reportes" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>


                                                </div>
                                            </div>
                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-DATOS-PROPIETARIO 1-->
                                
                           
                            
                            
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

                                                            $('#nooficialui').keyup(function () {
                                                                //geocodeAddress(geocoder, map);
                                                                //nooficial
                                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
                                                                initMap();
                                                                //calleui
                                                            });

                                                            $('#calleui').keyup(function () {
                                                                //geocodeAddress(geocoder, map);
                                                                //nooficial
                                                                $('#address').val($('#calleui').val() + " " + $('#nooficialui').val() + " Irapuato,Guanajuato");
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
        
</html> 