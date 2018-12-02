<!DOCTYPE html>
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
<html lang="es" ng-app="Aplicacion">

    <head>
        <meta charset="UTF-8">

        <title> Tramites y Servicios </title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="https://webservice.irapuato.gob.mx/Estilos/img/irapuato.png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!--#region CSS  -->
        <?php $this->load->view('base/admin'); ?>
   <style>
            label{
                font-size: 12pt;
            }
            h4{
                font-size: 18pt;
            }
            h5{
                font-size: 14pt;
            }
        </style>
        <style>
            #content {
                width: 100%;
                height: 100%;
                background: gray;
                position: fixed;
                z-index: 999999999999999999999999;
                background-color: rgba(255,255,250,.8);/*   important */
            }

            .loader {
                display: none;
                position: fixed;
                top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(255,255,255,0.2) url(<?php echo base_url('assets/images') ?>/lg.circle-slack-loading-icon.gif) center center no-repeat;
                z-index: 9999999900;
            }
        </style>
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
                        <a href="/permiso_anuncios_adosados/asignacion">
                            <i class="glyph-icon icon-home"></i>
                            <span>Mis Tramites</span>
                        </a>
                    </li>
                  

                    <li class="header">
                        <span>REPORTES </span>
                    </li>
                    <li>
                        <a class="sf-with-ul" href="#" title="MenU 2">
                            <i class="glyph-icon icon-home"></i>
                            <span><h6>REPORTES</h6></span>
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
                
                    <h2>Actualizar Claves de Fraccionamiento</h2><br>
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
                    
                    <div id="panel-captura-avaluo" class="panel">
                        <div class="panel-body">
                        
                            
<div id="panel-propietario" <?php echo $this->session->userdata('tipo') == 15 ? 'hidden' : ''?> class="content-box border-top border-blue">
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
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->
                                
                                <div id="panel-propietario" <?php echo $this->session->userdata('tipo') == 15 ? 'hidden' : ''?> class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">II. ¿Por favor indique que tipo de persona es?</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                           <div class="form-group  <?php echo $modificar == "" ? "" : "" ?>" >
                                                    <div class="col-md-12">
                                                        <label>¿Por favor indique que tipo de persona es?</label><br>
                                                        <label>Moral</label>
                                                        <input class="" type="checkbox" name="tipopersonamo" id="tipopersonamo" <?php echo $tipopersona == '1' ? 'checked' : '' ?>>
                                                        <label>Física</label>
                                                        <input class="" type="checkbox" name="tipopersonafi" id="tipopersonafi" <?php echo $tipopersona == '2' ? 'checked' : '' ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->
                                
                                <div id="panel-propietario" <?php echo $this->session->userdata('tipo') == 15 ? 'hidden' : ''?> class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">III. Información del solicitante Persona Moral o Física</h3>
                                        <div class="bordered-row">
                                       <div class="row">
                                            <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3 ) && isset($fechafinal) != null && isset($numerocontrol)): ?>
                                                <div class="form-group">
                                                    <div id="generartalon" class="form-group col-md-4">
                                                        <a ID="4" target="_blank" class="btn btn-primary btn-lg" href="<?php echo base_url('claves_fraccionamiento/vistapa/' . $ID) ?>"><i class="fa fa-check"></i> Imprimir Talón</a>
                                                    </div>
                                                </div>

                                            <?php endif; ?> 
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
                                                        <label>Identificación del Solicitante (INE, Pasaporte, Cédula Profesional) Puede adjuntar uno o varios archivos*</label>
                                                        <?php if ($modificar == ""): ?>
                                                            <?php if (!empty($morine)): ?>
                                                                <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="">
                                                            <?php else: ?> 
                                                                <input  accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" class="" type="file" name="morine[]" multiple="" required>
                                                            <?php endif; ?>
                                                        <?php endif; ?> <br>
                                                        <?php if (!empty($morine)): ?>
                                                            <a target="_blank" href="<?php echo base_url() . "assets/tramites/clavescatastralesfraccionamiento/" . $morine; ?>">Visualizar Documento</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->
                                
                                <div id="panel-propietario" <?php echo $this->session->userdata('tipo') == 15 ? 'hidden' : ''?> class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">IV. Identificación y Ubicación del Inmueble</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                        <div class="row" ng-controller="FraccionaminetoApp" > 
                                            <?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 3): ?>

                                                <div class="form-group">
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número de seguimiento</label>
                                                        <input <?php echo $modificar; ?>  type="text" class="form-control"  placeholder="Número de control" name="numerocontrol" id="numerocontrol" ng-model="nocontrol"  value="<?php echo $numerocontrol ?>"/>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Cantidad de Claves a Generar</label>
                                                        <input  type="number" readonly class="form-control" required="" min="1" placeholder="Total de Claves" name="cantidad" id="cantidadporpago"  max='999' ng-model="cantclaves"   value="<?php echo $cantidad ?>"/>
                                                    </div>
                                                </div>


                                            <?php endif; ?>





                                            <!--tabla para mistrar los registros agregados-->
                                            <div class="table-scrollable">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Numero Control</th>
                                                            <th>Cuenta Predial</th>
                                                            <th>Calle</th>
                                                            <th>Numero Exterior</th>
                                                            <th>Numero Interior</th>
                                                            <th>N° Lote</th>
                                                            <th>N° Manzana</th>
                                                            <th>Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr ng-repeat="pagos in registro" >
                                                            <td> {{pagos.nocontrol}} </td>
                                                            <td> {{pagos.clave}} </td>

                                                            <td> {{pagos.calle_id}}  </td>
                                                            <td> {{pagos.no_exterior}}  </td>
                                                            <td> {{pagos.no_interior}} </td>
                                                            <td> {{pagos.lote}} </td>
                                                            <td>  {{pagos.manzana}} </td>
                                                            <td> {{pagos.nombre_colonia}}  </td>
                                                            <td><a title="" target="_blank" href="<?php echo base_url('claves_catastrales_fraccionamiento/update/');?>{{pagos.id }}" class="btn btn-outline btn-circle btn-sm green ">
                                                                    <i class="glyphicon glyphicon-edit"></i></a> </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group">



                                                <div id="coloniauno" class="form-group col-md-6 hidden">
                                                    <label for="int"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido *<?php echo form_error('cbocoloniaui') ?></label>


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

                                                </div>






                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->
                                
                                <div id="panel-propietario" <?php echo $this->session->userdata('tipo') == 15 ? 'hidden' : ''?> class="content-box border-top border-blue">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero">V. Datos del Propietario y/o Representante</h3>
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
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->
                                
                                <div id="panel-propietario" class="content-box border-top border-blue">
                                    <form id="formclave" action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">
                                    <div class="content-box-wrapper">
                                        <h3 class="title-hero" <?php echo $this->session->userdata('tipo') == 15 ? 'hidden' : ''?> >VI. Adjunte los Siguientes Archivos Escaneados en Original</h3>
                                        <div class="bordered-row">
                                           <div class="row">
                                  <?php if ($this->session->userdata('tipo') == 15 || $this->session->userdata('tipo') == 155) { ?>
                                            <div class="row" style="margin-left:20px;">
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
                                                        <textarea  class="form-control" style="width:90%;" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
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
                                                        <button type="submit" id="solicitar" class="btn btn-success glyph-icon icon-save">Guardar Trámite</button>
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
                                </div> <!-- DIV PANEL-CUENTA-PROPIETARIO 1-->
                                     </form>
                        </div>
                    </div>
                </div>
                <!-- container -->
                
            </div>
            
            <!-- page-content -->


                
            <!-- Footer -->
        </div>
            <?php $this->load->view('base/footeradmin'); ?>
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
<script src="<?php echo base_url(); ?>assets/js/tram/permisosdeanuncios/angular.min.js" type="text/javascript"></script>
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

                                                    });
</script>

<script>
    $(document).ready(function () {

        if ($('#ipropietariosi').is(':checked')) {
            $("#ipropietariono").prop('checked', false);
            //$('#datosp').addClass('hidden');
        } else if ($('#ipropietariono').is(':checked')) {
            //$('#datosp').removeClass('hidden');
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



<?php if ($ID === "") { ?>
    <script>


        $("#formclave").submit(function (e) {
            alert("Recuerde : Falsear Información esta penado según el Artículo 234 del Código Penal para el Estado de Guanajuato."); //                e.preventDefauly();
        });


    </script>
<?php } ?>

<script>

    function Registro(NO_CONTROL, ID, CLAVE, CALLE_ID, NO_EXTERIOR, NO_INTERIO, LOTE, MANZANA, COLONIA_ID, NOMBRE_COLONIA) {
        this.nocontrol = NO_CONTROL;
        this.id = ID;
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
        $scope.nocontrol;
        $scope.cantclaves;
        $scope.apply = function () {

        };
         var cant = 0;
        var registros = <?php echo $solicitudes != "" ? "" . $solicitudes : ""; ?>;
        if (registros) {
            var no_inicio = "";
            var no_final = "";
             
            $.map(registros, function (a, b) {
                cant++;
                if (no_inicio == "") {
                    no_inicio = a.numerocontrol;
                } 
                    no_final = a.numerocontrol;
                
                $('#cbocoloniaui').val(a.cbocoloniaui);
                var nombre = $('#cbocoloniaui').find('option:selected').text();


                $scope.registro.push(new Registro(a.numerocontrol, a.ID, a.predialui, a.calleui, a.nooficialui, a.nooficialuin, a.noloteui, a.nomanzanaui, a.cbocoloniaui, nombre.trim()))
                $scope.apply();
            });
            $scope.cantclaves =cant;
            $scope.nocontrol = "" + no_inicio + "-" + no_final;
          
                $('#nocontrol').val(''+$scope.nocontrol);
  

        }
       
       
    });
</script>
<?php if ($this->session->userdata('tipo') == 15): ?>
    <div class="modal fade" id="talon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Datos</h4>
                </div>
                <form id="formtal" target="_blank" action="<?php echo base_url(); ?>claves_fraccionamiento/vistapa" method="post">
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
                                                                    dd2++;
                                                                else if(week == 6)
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
                                    <input readonly=""   id="nocontrol" type="hidden" name="nocontrol" value="">
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

                    <script>
                        $('#submit-all').on('click',function(e){
                            e.preventDefault();
                            $('#talon').modal('hide');
                            alert('El Talón se ha generado correctamente y estará disponible en una nueva pestaña en su navegador');
                            $('#formtal').submit();
                            setTimeout(() => {
                                if(window.location.href.indexOf('individual')>-1)
                                    window.location.href="https://vuira.irapuato.gob.mx/infotramites/info_atencion_de_claves_catastrales_individual";
                                else
                                    window.location.href="https://vuira.irapuato.gob.mx/infotramites/info_atencion_de_claves_catastrales_fraccionamiento";
                            }, 1000);
                                                
                        });
                    </script>

                </form>
            </div>

        </div>

    </div>
<?php endif; ?>
</html> 