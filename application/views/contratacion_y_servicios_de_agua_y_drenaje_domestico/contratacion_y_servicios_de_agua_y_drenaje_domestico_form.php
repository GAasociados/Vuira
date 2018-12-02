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
                                <div class="btnRegresar hidden-xs hidden-xm">

                            <button class="btn btn-warning btnAyudaForm " title="Ayuda" id="ayuda" onclick="iniciarAyuda()" > 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
                                </div>
                            <?php endif; ?>
      <button class="btn btn-warning btnAyudaForm " title="Ayuda" id="ayuda" onclick="iniciarAyuda()" > 
          <h4><i class="glyph-icon icon-question-circle "></i>&nbsp;Ayuda</h4> 
        </button>
           <div class="clearfix"></div>
            <div id="page-content">
                <div class="container">
                       <div class="row">
                        <h2>Contratación de Servicios de Agua y Drenaje Doméstico</h2><br>
                    </div>
                           
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="panel">
                                 <div class="panel-body">



                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form action="<?php echo $action; ?>" method="post" enctype = "multipart/form-data">

                                        <?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3) { ?>

                                            <?php if (isset($ctapre)): ?>
<div class="row content-box border-top border-blue">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">I. Cuenta Predial</h3>
                                        </div>
                                                <div class=" col-md-3">
                                                    <label class="bold">Cuenta Predial</label>
                                             

                                                        <input type="text" class="form-control" aria-label="" value="<?php echo $ctapre; ?>"  id="predialui1">
                                                    
                                                            <button type="button"  id="predialui"><i class="fa fa-search"></i></button>
                                                        
                                                
                                                </div>
                                        
                                        
                                          </div>
                                </div>
                            </div>

                                                <script>
                                                    $('#predialui').click(function (e) {
                                                           var calle = "";
                                                            var colonia = "";
                                                        var Clave = $('#predialui1').val();
                                                        if (Clave.length == 12) {   
                                                         
                                                            $.ajax({
                                                                async: false,
                                                                url: "../contratacion_y_servicios_de_agua_y_drenaje_domestico/predial",
                                                                data: {predial: "" + Clave},
                                                                type: "POST",
                                                                dataType: 'json',
                                                                //    contentType: 'application/json',
                                                                success: function (respuesta) {
                                                                    if (respuesta) {

                                                                        //                                                                        coloniapropietario callepropietario numeroextpropietario

                                                                        //                                                          $('#callepropietario').val(respuesta.CALLE_ID);
                                                                        $('#numeroextpropietario').val(respuesta.NO_EXTERIOR);
                                                                        $('#numerointpropietario').val(respuesta.NO_INTERIO);
                                                                        $('#nombrepropietario').val(respuesta.NOMBRE);
                                                                        $('#apaterno').val(respuesta.APELLIDO_PATERNO);
                                                                        $('#amaterno').val(respuesta.APELLIDO_MATERNO);
                                                                        $('#coloniapropietario').val(respuesta.COLONIA_ID);
                                                                        calle = respuesta.CALLE_ID;
                                                                        colonia = respuesta.COLONIA_ID;
        //                                                                        $('#callepropietario').val(respuesta.CALLE_ID);


                                                                    } else {
                                                                        $('#calleui').val("");
                                                                        $('#nooficialui').val("");
                                                                        $('#nooficialinui').val("");
                                                                        $('#cbocoloniaui').val("");
                                                                    }

                                                                }
                                                            });
                                                            getcallesdos(colonia);
                                                            callecuenta(calle,colonia);
                                                            $('#address').val($.trim($("#coloniapropietario option:selected").text()) + " " + $.trim($("#callepropietario option:selected").text()) + " " + $('#numeroextpropietario').val() + " Irapuato, Guanajuato");

                                                            initMap();



                                                        }
                                                    });
                                                </script>
    <?php endif; ?>
                                                
                               <div class="row content-box border-top border-blue" >
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">II. Datos Generales Solicitante</h3>
                                        </div>                 
                                            <div class="row" id="paso1"> 
                                                <div class="form-group">
                                                    <div class="form-group col-md-12">
                                                        <h3>Datos Generales Solicitante</h3>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Nombre *<?php echo form_error('nombre') ?></label>
                                                        <input required type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Seleccione su Colonia *<?php echo form_error('coloniaubicacion') ?></label>
                                                        <select required class="form-control" name="coloniaubicacion" tabindex="-1"  id="coloniaubicacion"/>
                                                        <?php
                                                        //Si ya guardaste una colonia y no está vacío
                                                        if (!empty($coloniaubicacion)):

                                                            $arraycolonia = $this->Colonias_japami_model->getalladatacoloniabyid($coloniaubicacion);
                                                            //Regresa toda la informacion de la colonia de japami
                                                            ?>
                                                            <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">

                                                                <?php
                                                                echo $arraycolonia->NOMBRE;
                                                                //$arraycolonia->colonia = nombre de la colonia
                                                                //$arraycolonia->tipo_de_asentamiento = colonia,ejido,rancheria
                                                                ?>
                                                            </option>
    <?php endif; ?>



                                                            <?php foreach ($consulta->result() as $fila) { ?>
                                                            <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                            <?php echo $fila->NOMBRE; ?>
                                                            </option>
    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label required  for="varchar">Calle*<?php echo form_error('calle') ?></label>
                                                        <select required class="form-control" name="calle" tabindex="-1"  id="calle" value="<?php echo $calle; ?>">

                                                            <?php
                                                            //Si ya guardaste una colonia y no está vacío
                                                            if (!empty($calle)):

                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($calle);
                                                                //Regresa toda la informacion de la colonia de japami
                                                                ?>
                                                                <option value="<?php echo $arraycolonia->CALLE_ID; ?>">

                                                                    <?php
                                                                    echo $arraycolonia->NOMBRE;
                                                                    //$arraycolonia->colonia = nombre de la colonia
                                                                    //$arraycolonia->tipo_de_asentamiento = colonia,ejido,rancheria
                                                                    ?>
                                                                </option>
                                                            <?php endif; ?>

                                                                <?php foreach ($consulta1->result() as $fila) { ?>
                                                                <option value="<?php echo $fila->CALLE_ID; ?>">
                                                                <?php echo $fila->NOMBRE; ?>
                                                                </option>
    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="varchar">Número Exterior *<?php echo form_error('numeroext') ?></label>
                                                        <input required type="text" class="form-control" name="numeroext" id="numeroext" placeholder="Número Exterior" value="<?php echo $numeroext; ?>" />
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="varchar">Número Interior <?php echo form_error('numeroint') ?></label>
                                                    <input  type="text" class="form-control" name="numeroint" id="numeroint" placeholder="Número Interior " value="<?php echo $numeroint; ?>" />



                                                </div>
                                            </div>

                                            <div class="row" id="paso2"> 
                                                <div class="form-group">
                                                    <div class="form-group col-md-3">
                                                        <!--
                                                        <input required type="text" class="form-control" name="callereferencia1" id="callereferencia1" placeholder="Calle Referencia 1" value="<?php echo $callereferencia1; ?>" />
                                                        -->
                                                        <?php if (!empty($mapa)) { ?>
                                                            <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">
                                                        <?php } else { ?>
                                                            <input id="address" type="hidden" class="form-control" value="Irapuato,Gto." name="mapa">
    <?php } ?>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row" id="paso4">
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Cuenta con Conexión *<?php echo form_error('conexion') ?></label>

                                                        <select required class="form-control" name="conexion" id="conexion" tabindex="-1" value="<?php echo $conexion; ?>">

    <?php if ($conexion == 1) { ?>
                                                                <option value="1">SI</option>
                                                                <option value="2">NO</option>
    <?php } else { ?>


                                                                <option value="2">NO</option>
                                                                <option value="1">SI</option>
    <?php } ?>

                                                        </select>


                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Cuenta con Medidor *<?php echo form_error('medidor') ?></label>
                                                        <select disabled class="form-control" name="medidor" id="medidor" tabindex="-1" value="<?php echo $medidor; ?>">

    <?php if ($medidor == 1) { ?>
                                                                <option value="1">SI</option>
                                                                <option value="2">NO</option>
    <?php } else { ?>


                                                                <option value="2">NO</option>
                                                                <option value="1">SI</option>
    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="paso5">
                                                <div class="form-group" >
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Núm Medidor *<?php echo form_error('nomedidor') ?></label>
                                                        <input readonly type="text" class="form-control" name="nomedidor" id="nomedidor" placeholder="Núm Medidor" value="<?php echo $nomedidor; ?>" maxlength="8"/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <img src="<?php echo base_url(); ?>assets/images/medidorcasa.jpeg" width="20%">
                                                        Número de Medidor
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="varchar">Lectura<?php echo form_error('lectura') ?></label>
                                                        <input readonly type="text" class="form-control" name="lectura" id="lectura" placeholder="Lectura" value="<?php echo $lectura; ?>" maxlength="8"/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Marca del Medidor</label>
                                                        <select disabled class="form-control" name="medidor1" id="medidor1">
                                                            <?php if (!$medidor1): ?><option>Seleccione la marca del medidor</option><?php endif; ?>
                                                            <?php if ($medidor1): ?>
                                                                <option value="<?php echo $medidor1; ?>"><?php echo $medidor1; ?></option>
    <?php endif; ?>
                                                            <option value="ITRON">ITRON</option>
                                                            <option value="CICASA">CICASA</option>
                                                            <option value="WATER METER">WATER METER</option>
                                                            <option value="Otro">Otro</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <img src="<?php echo base_url(); ?>assets/images/medidor.png" width="20%">
                                                        Lectura del Medidor
                                                    </div>
                                                    <div class="form-group col-md-6" id="otro_med">
                                                        <label for="varchar">Otra Marca de Medidor</label>
                                                        <input type="text" class="form-control" name="otro_med" id="" placeholder="Otra Marca de Medidor" value="<?php echo $otro_med; ?>"/>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row" id="paso6">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="varchar"><h5><b>Observaciones</b> (En caso de que le hayan suspendido el servicio por falta de contrato, favor de comunicarlo en las observaciones)</h5> <?php echo form_error('observaciones') ?></label>
                                                        <textarea class="form-control" rows="3" placeholder="Observaciones" name="observaciones" id="observaciones" ><?php echo $observaciones; ?></textarea>
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
                                            <h3 class="title-hero">III. Domicilio Propietario</h3>
                                        </div>                    
                                            <div class="row" id="paso7">
                                                <div class="form-group"> 
                                             



                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Nombre Propietario *<?php echo form_error('nombrepropietario') ?></label>
                                                        <input required type="text" class="form-control" name="nombrepropietario" id="nombrepropietario" placeholder="Nombre propietario" value="<?php echo $nombrepropietario; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Apellido Paterno *<?php echo form_error('apaterno') ?></label>
                                                        <input required type="text" class="form-control" name="apaterno" id="apaterno" placeholder="Apellido Paterno" value="<?php echo $apaterno; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Apellido Materno *<?php echo form_error('amaterno') ?></label>
                                                        <input required type="text" class="form-control" name="amaterno" id="amaterno" placeholder="Apellido Materno" value="<?php echo $amaterno; ?>" />
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Rfc</label>
                                                        <input  type="text" class="form-control" name="rfc" id="rfc" placeholder="Rfc"  maxlength="13" value="<?php echo $rfc; ?>" />
                                                    </div>


                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Seleccione Su Colonia *<?php echo form_error('coloniapropietario') ?></label>

                                                        <select required class="form-control" name="coloniapropietario" id="coloniapropietario">
                                                            <?php
                                                            //Si ya guardaste una colonia y no está vacío
                                                            if (!empty($coloniapropietario)):

                                                                $arraycolonia = $this->Colonias_japami_model->getalladatacoloniabyid($coloniapropietario);
                                                                //Regresa toda la informacion de la colonia de japami
                                                                ?>
                                                                <option value="<?php echo $arraycolonia->COLONIA_ID; ?>">

                                                                    <?php
                                                                    echo $arraycolonia->NOMBRE;
                                                                    //$arraycolonia->colonia = nombre de la colonia
                                                                    //$arraycolonia->tipo_de_asentamiento = colonia,ejido,rancheria
                                                                    ?>
                                                                </option>
    <?php endif; ?>



                                                                <?php foreach ($consulta->result() as $fila) { ?>
                                                                <option value="<?php echo $fila->COLONIA_ID; ?>">
                                                                <?php echo $fila->NOMBRE; ?>
                                                                </option>
    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Calle *<?php echo form_error('callepropietario') ?></label>

                                                        <select class="form-control" name="callepropietario" id="callepropietario" required>



                                                            <?php
                                                            //Si ya guardaste una colonia y no está vacío
                                                            if (!empty($callepropietario)):

                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callepropietario);
                                                                //Regresa toda la informacion de la colonia de japami
                                                                ?>
                                                                <option value="<?php echo $arraycolonia->CALLE_ID; ?>">

                                                                    <?php
                                                                    echo $arraycolonia->NOMBRE;
                                                                    //$arraycolonia->colonia = nombre de la colonia
                                                                    //$arraycolonia->tipo_de_asentamiento = colonia,ejido,rancheria
                                                                    ?>
                                                                </option>
                                                            <?php endif; ?>

                                                                <?php foreach ($consulta2->result() as $fila) { ?>
                                                                <option value="<?php echo $fila->CALLE_ID; ?>">
                                                                <?php echo $fila->NOMBRE; ?>
                                                                </option>
    <?php } ?>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Calle de Referencia 1 *<?php echo form_error('callereferencia1') ?></label>

                                                        <select required class="form-control" name="callereferencia1" tabindex="-1"  id="callereferencia1" value="<?php echo $callereferencia1; ?>">

                                                            <?php
                                                            //Si ya guardaste una colonia y no está vacío
                                                            if (!empty($callereferencia1)):

                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callereferencia1);
                                                                //Regresa toda la informacion de la colonia de japami
                                                                ?>
                                                                <option value="<?php echo $arraycolonia->CALLE_ID; ?>">

                                                                    <?php
                                                                    echo $arraycolonia->NOMBRE;
                                                                    //$arraycolonia->colonia = nombre de la colonia
                                                                    //$arraycolonia->tipo_de_asentamiento = colonia,ejido,rancheria
                                                                    ?>
                                                                </option>
                                                            <?php endif; ?>

                                                                <?php foreach ($consulta2->result() as $fila) { ?>
                                                                <option value="<?php echo $fila->CALLE_ID; ?>">
                                                                <?php echo $fila->NOMBRE; ?>
                                                                </option>
    <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Calle de Referencia 2 *<?php echo form_error('callereferencia2') ?></label>
                                                        <select required class="form-control" name="callereferencia2" tabindex="-1"  id="callereferencia2" value="<?php echo $callereferencia2; ?>">

                                                            <?php
                                                            //Si ya guardaste una colonia y no está vacío
                                                            if (!empty($callereferencia2)):

                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callereferencia2);
                                                                //Regresa toda la informacion de la colonia de japami
                                                                ?>
                                                                <option value="<?php echo $arraycolonia->CALLE_ID; ?>">

                                                                    <?php
                                                                    echo $arraycolonia->NOMBRE;
                                                                    //$arraycolonia->colonia = nombre de la colonia
                                                                    //$arraycolonia->tipo_de_asentamiento = colonia,ejido,rancheria
                                                                    ?>
                                                                </option>
                                                            <?php endif; ?>

                                                                <?php foreach ($consulta2->result() as $fila) { ?>
                                                                <option value="<?php echo $fila->CALLE_ID; ?>">
                                                                <?php echo $fila->NOMBRE; ?>
                                                                </option>
    <?php } ?>

                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Exterior *<?php echo form_error('numeroextpropietario') ?></label>
                                                        <input required type="text" class="form-control" name="numeroextpropietario" id="numeroextpropietario" placeholder="Número Exterior" value="<?php echo $numeroextpropietario; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Número Interior <?php echo form_error('numerointpropietario') ?></label>
                                                        <input type="text" class="form-control" name="numerointpropietario" id="numerointpropietario" placeholder="Número Interior" value="<?php echo $numerointpropietario; ?>" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row" id="paso8">
                                                <div class="form-group">
                                                    <div class="form-group col-md-4">

                                                        <label for="varchar">Teléfono <?php echo form_error('telefono') ?></label>
                                                        <input   type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $telefono; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número Celular <?php echo form_error('nocelular') ?></label>
                                                        <input   type="text" class="form-control" name="nocelular" id="nocelular" maxlength="10" placeholder="Número Celular" value="<?php echo $nocelular; ?>" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Correo *<?php echo form_error('correo') ?></label>
                                                        <input required type="email" class="form-control" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="paso9">
                                                <div class="form-gruop">

                                                    <div class="form-group col-md-2">
                                                        <label for="varchar">Actividad *<?php echo form_error('giroactividad') ?></label>
                                                        <select required class="form-control" name="giroactividad" tabindex="-1"  id="giroactividad" value="<?php echo $giroactividad; ?>">

                                                            <?php if ($giroactividad == 1) { ?>
                                                                <option value="1">Casa Habitación</option>
    <?php } else  ?>

                                                            <option value="1">Casa Habitación</option>

                                                        </select>

                                                    </div>

                                                    <div class="form-gruop col-md-2">
                                                        <label for="varchar">Giro*<?php echo form_error('tiposervicio') ?></label>
                                                        <select required class="form-control" name="tiposervicio" tabindex="-1" id="tiposer">

    <?php if ($tiposervicio == 1) { ?>
                                                                <option value="1">Domésticos</option>
                                                                <option value="2">Mixto (Casa con Comercio)</option>
    <?php } else { ?>
                                                                <option value="2">Mixto (Casa con Comercio)</option>
                                                                <option value="1">Domésticos</option>
    <?php } ?>
                                                        </select>

                                                    </div>

                                                    <div class="form-gruop col-md-3">
                                                        <label for="varchar">Servicios con los que cuenta el predio *<?php echo form_error('servicioscuenta') ?></label>
                                                        <select required class="form-control" name="servicioscuenta" tabindex="-1" id="servicioscuenta" value="<?php echo $servicioscuenta; ?>">

    <?php if ($servicioscuenta == 1) { ?>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="5">Ninguno</option>
                                                                <option value="6">Agua y Drenaje</option>
                                                            <?php } elseif ($servicioscuenta == 2) {
                                                                ?>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="1">Agua</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="6">Agua y Drenaje</option>
                                                                <option value="5">Ninguno</option>
                                                            <?php } elseif ($servicioscuenta == 3) {
                                                                ?>        <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="6">Agua y Drenaje</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="5">Ninguno</option>
    <?php } elseif ($servicioscuenta == 4) { ?>
                                                                <option value="4">Drenaje</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="6">Agua y Drenaje</option>
                                                                <option value="5">Ninguno</option>
    <?php } elseif ($servicioscuenta == 5) { ?>
                                                                <option value="5">Ninguno</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="6">Agua y Drenaje</option>

    <?php } elseif ($servicioscuenta == 6) { ?>
                                                                <option value="6">Agua y Drenaje</option>
                                                                <option value="5">Ninguno</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>


    <?php } else { ?>
                                                                <option value="5">Ninguno</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="6">Agua y Drenaje</option>
    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label for="varchar">Servicios que solicita *<?php echo form_error('serviciossolicita') ?></label>
                                                        <select required  class="form-control" name="serviciossolicita" tabindex="-1" id="serviciossolicita" value="<?php echo $serviciossolicita; ?>">

    <?php if ($serviciossolicita == 1) { ?>

                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="5">Ninguno</option>
                                                                <option value="6">Agua y Drenaje</option>
                                                            <?php } elseif ($serviciossolicita == 2) {
                                                                ?>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="1">Agua</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="5">Ninguno</option>
                                                                <option value="6">Agua y Drenaje</option>
                                                            <?php } elseif ($serviciossolicita == 3) {
                                                                ?>       
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="5">Ninguno</option>
                                                                <option value="6">Agua y Drenaje</option>
    <?php } elseif ($serviciossolicita == 4) { ?>
                                                                <option value="4">Drenaje</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>

                                                                <option value="5">Ninguno</option>
                                                                <option value="6">Agua y Drenaje</option>
    <?php } elseif ($serviciossolicita == 6) { ?>
                                                                <option value="6">Agua y Drenaje</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>

                                                                <option value="5">Ninguno</option>
    <?php } else { ?>
                                                                <option value="5">Ninguno</option>
                                                                <option value="1">Agua</option>
                                                                <option value="2">Drenaje y Saneamiento</option>
                                                                <option value="3">Agua, Drenaje y Saneamiento</option>
                                                                <option value="4">Drenaje</option>
                                                                <option value="6">Agua y Drenaje</option>

    <?php } ?>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="varchar">Condiciones Generales <?php echo form_error('condicionesgenerales') ?></label>
                                                        <select required  class="form-control" name="condicionesgenerales" tabindex="0" id="condicionesgenerales" value="<?php echo $condicionesgenerales; ?>">


    <?php if ($condicionesgenerales == 1) { ?>
                                                                <option value="1">Habitado</option>
                                                                <option value="2">Deshabitado</option>
                                                                <option value="3">Obra Negra</option>
                                                                <option value="4">Lote Baldio</option>
                                                            <?php } elseif ($condicionesgenerales == 2) {
                                                                ?>
                                                                <option value="2">Deshabitado</option>
                                                                <option value="1">Habitado</option>
                                                                <option value="3">Obra Negra</option>
                                                                <option value="4">Lote Baldio</option>
                                                            <?php } elseif ($condicionesgenerales == 3) {
                                                                ?>
                                                                <option value="3">Obra Negra</option>
                                                                <option value="4">Lote Baldio</option>
                                                                <option value="1">Habitado</option>
                                                                <option value="2">Deshabitado</option>
    <?php } else { ?>

                                                                <option value="4">Lote Baldio</option>
                                                                <option value="1">Habitado</option>
                                                                <option value="2">Deshabitado</option>
                                                                <option value="3">Lote Baldio</option>
    <?php } ?>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="varchar">Tiempo Habitado<?php echo form_error('correo') ?></label>
                                                        <input readonly class="form-control" type="text" name="tiempohabitado" placeholder="Tiempo Habitado" id="tiempohabitado" value="<?php echo $tiempohabitado; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="paso3"> 
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


                                            <br>
                                            <div class="row content-box border-top border-blue">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">IV. ¿Requiere de facturación electrónica?</h3>
                                        </div>
                                        
                                            <div class="row" id="paso10">
                                                <div class="form-group col-md-12">
                                               
                                                    Seleccione la casilla
                                                    <input  class="" type="checkbox" name="otro_domicilio_facturacion"  id="otro_domicilio_facturacion"  <?php echo $otro_domicilio_facturacion != 0 ? 'checked' : ''; ?> />
                                                </div>
                                            </div>
                                            <div id="otrainfo" class="form-group <?php echo $otro_domicilio_facturacion == 0 ? 'hidden' : '' ?>">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Razón Social*</label>
                                                    <input  class="form-control" type="text" name="razon_social" placeholder="Razón Social" id="razon_social" value="<?php echo $razon_social; ?>"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Domicilio*</label>
                                                    <input  class="form-control" type="text" name="domicilio_facturacion" placeholder="Domicilio" id="domicilio_facturacion" value="<?php echo $domicilio_facturacion; ?>"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Colonia*</label>
                                                    <input class="form-control" type="text" name="colonia_facturacion" placeholder="Colonia" id="colonia_facturacion" value="<?php echo $colonia_facturacion; ?>"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Código Postal*</label>
                                                    <input  class="form-control" type="text" name="cp_facturacion" placeholder="Codigo Postal" id="cp_facturacion" value="<?php echo $cp_facturacion; ?>"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Ciudad*</label>
                                                    <input class="form-control" type="text" name="ciudad_facturacion" placeholder="Ciudad" id="ciudad_facturacion" value="<?php echo $ciudad_facturacion; ?>"/>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Estado*</label>
                                                    <input  class="form-control" type="text" name="estado_facturacion" placeholder="Estado" id="estado_facturacion" value="<?php echo $estado_facturacion; ?>"/>
                                                </div>

                                            </div>
  </div>
                                </div>
                            </div>
                                        
                                        
                                     <div class="row content-box border-top border-blue">
                                <div class="content-box-wrapper">
                                    <div class="form-group">
    <div class="form-group col-md-12">
                                            <h3 class="title-hero">V. Adjunte los Siguientes Archivos Escaneados en Original</h3>
                                        </div>


                                            <div class="form-group">
    <?php if (empty($rpredial)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Documento que acredite la propiedad (Predial, Escritura o Compra-venta notariado u hoja de retención) *<?php echo form_error('doctopredial') ?></label>
                                                        <input type="file"multiple name="doctopredial[]" id="doctopredial" placeholder="Recibo impuesto predial" />
                                                        <?php if (!empty($doctopredial)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctopredial; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
    <?php if (empty($noficial)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Número oficial de la propiedad*<?php echo form_error('doctonumerooficial') ?></label>
                                                        <input type="file"  multiple name="doctonumerooficial[]" id="doctonumerooficial" placeholder="Documento Número oficial de la propiedad"/>
                                                        <?php if (!empty($doctonumerooficial)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctonumerooficial; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
    <?php if (empty($identificacion)): ?>
                                                    <div class="form-group col-md-4">
                                                        <label for="varchar">Identificación del Propietario(INE,Pasaporte,Cédula Profesional) *<?php echo form_error('doctoife') ?></label>
                                                        <input type="file" multiple name="doctoife[]" id="doctoife" placeholder="Documento IFE"/>
                                                        <?php if (!empty($doctoife)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctoife; ?>">Descargar</a>
                                                    <?php endif; ?>
                                                    </div>
    <?php endif; ?>
                                                <div id="hiddendoctopago">
                                                    <div class="col-md-12">
                                                        <h3>Solo Adjunte documentos escaneados en Original</h3>
                                                    </div>

                                                    <div class="form-group col-md-12" >
                                                        <input type="hidden" id="IDTram" value="<?php echo $ID; ?>" />
                                                        <a id="documentopago"><b>Descargar Plantilla de Pago</b></a><br>
                                                        <label for="varchar">Documento Pago *<?php echo form_error('doctopago') ?></label>
                                                        <input type="file" multiple name="doctopago[]" id="doctopago" placeholder="Documento Pago"/>
                                                        <?php if (!empty($doctopago)): ?>
                                                            <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctopago; ?>">Descargar</a>
    <?php endif; ?>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="divestatus" value="<?php echo $status; ?>">

    <?php if ($status == "6"): ?>
                                                    <input type="hidden" id="cuentaligada" value="<?php echo $cuentaligada; ?>">
                                                    <input type="hidden" id="solicitud" value="<?php echo $solicitud; ?>">
                                                    <input type="hidden"  id="iniciofacturacion" value="<?php echo $iniciofacturacion; ?>">
                                            <?php endif; ?>
                                            </div>
                                          </div>
                                </div>
                            </div>
<?php } ?>


<?php if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) { ?>

                                            <div class="portlet box blue">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                    </div>

                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-body">



                                                            <div class="row">
                                                                <h3 class="form-section">Datos Generales</h3>

                                                                <div class="form-group">
                                                                    <div class="form-group col-md-3">
                                                                        <label>Nombre:</label>
                                                                        <p id="nombre">
    <?php echo $nombre; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label >Colonia:</label>
                                                                        <p><?php
                                                                            if (!empty($coloniaubicacion)):
                                                                                $arraycolonia = $this->Colonias_japami_model->getalladatacoloniabyid($coloniaubicacion);
                                                                                ?>
                                                                                <?php echo $arraycolonia->NOMBRE;
                                                                                ?>
    <?php endif; ?></p>

                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label>Calle:</label>
                                                                        <p id="calle"><?php
                                                                            if (!empty($calle)):

                                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($calle);
                                                                                ?>
                                                                                <?php echo $arraycolonia->NOMBRE;
                                                                                ?>

    <?php endif; ?></p>

                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label>Número Exterior:</label>
                                                                        <p id="num"><?php echo $numeroext; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="form-group">

                                                                    <div class="form-group col-md-2">
                                                                        <label>Número Interior:</label>
                                                                        <p><?php echo $numeroint; ?></p>
                                                                    </div>



                                                                    <div class="form-group col-md-2">
                                                                        <label>Cuenta con Conexión:</label>
                                                                        <p><?php
                                                                            if ($conexion == 1) {
                                                                                echo "Si";
                                                                            } else {


                                                                                echo "No";
                                                                            }
                                                                            ?></p>

                                                                    </div>

                                                                    <div class="form-group col-md-2">
                                                                        <label>Cuenta con Medidor:</label>
                                                                        <p><?php
                                                                            if ($medidor == 1) {
                                                                                echo "Si";
                                                                            } else {


                                                                                echo "No";
                                                                            }
                                                                            ?></p>

                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="row">

                                                                <div class="form-group">

                                                                    <div class="form-group col-md-4">
                                                                        <label>Número Medidor:</label>
                                                                        <p><?php echo $nomedidor; ?></p>

                                                                    </div>

                                                                    <div class="form-group col-md-4">
                                                                        <label>Lectura:</label>
                                                                        <p><?php echo $lectura; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Marca del medidor:</label>
                                                                        <p><?php echo $medidor1; ?></p>

                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Observaciones</label> <p><?php echo $observaciones; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <input id="address" type="hidden" class="form-control" value="<?php echo $mapa; ?>" name="mapa">

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
                                                                    <div style="width:100%; height: 400px;">
                                                                        <div id="map"></div>
                                                                    </div>
                                                                </div>
                                                                <!-- end map -->
                                                            </div>
                                                            <div class="row">
                                                                <h3 class="form-section">Domicilio Propietario</h3>
                                                                <div class="form-group">
                                                                    <div class="form-group col-md-3">
                                                                        <label>Nombre Propietario:</label>
                                                                        <p id="nombrepropietario">
    <?php echo $nombrepropietario; ?>
                                                                        </p>
                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label>Apellido Paterno:</label>
                                                                        <p id="apellido1">
    <?php echo $apaterno; ?>
                                                                        </p>
                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label >Apellido Materno:</label>
                                                                        <p id="apellido2">
    <?php echo $amaterno; ?>
                                                                        </p>
                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label >Rfc:</label>
                                                                        <p id="rfc"><?php echo $rfc; ?></p>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="form-group col-md-3">
                                                                        <label>Colonia:</label>
                                                                        <p id="colonia"><?php
                                                                            if (!empty($coloniapropietario)):

                                                                                $arraycolonia = $this->Colonias_japami_model->getalladatacoloniabyid($coloniapropietario);
                                                                                ?>
                                                                                <?php echo $arraycolonia->NOMBRE;
                                                                                ?>

    <?php endif; ?>
                                                                        </p>



                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label>Calle:</label>
                                                                        <p><?php
                                                                            if (!empty($callepropietario)):

                                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callepropietario);
                                                                                ?>
                                                                                <?php echo $arraycolonia->NOMBRE;
                                                                                ?>

    <?php endif; ?></p>



                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label>Calle Referencia 1</label>
                                                                        <p id="entre1"><?php
                                                                            if (!empty($callereferencia1)):

                                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callereferencia1);
                                                                                ?>
                                                                                <?php echo $arraycolonia->NOMBRE;
                                                                                ?>

    <?php endif; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label>Calle Referencia 2</label>
                                                                        <p id="entre2"><?php
                                                                            if (!empty($callereferencia2)):

                                                                                $arraycolonia = $this->Calles_japami_model->getalladatacallebyid($callereferencia2);
                                                                                ?>
                                                                                <?php echo $arraycolonia->NOMBRE;
                                                                                ?>

    <?php endif; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label>Número Exterior:</label>
                                                                        <p><?php echo $numeroextpropietario; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label >Número Interior:</label>
                                                                        <p><?php echo $numerointpropietario; ?></p>

                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="form-group col-md-3">

                                                                        <label>Teléfono:</label>
                                                                        <p id="telefono"><?php echo $telefono; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label>Número Celular:</label>
                                                                        <p><?php echo $nocelular; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label>Correo:</label>
                                                                        <p><?php echo $correo; ?></p>

                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label>Actividad:</label>
                                                                        <p><?php
                                                                            if ($giroactividad == 1) {
                                                                                echo "Casa Habitación";
                                                                            } else {


                                                                                echo "Casa Habitación";
                                                                            }
                                                                            ?></p>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-gruop">
                                                                    <div class="form-gruop col-md-2">
                                                                        <label for="varchar">Giro:</label>
                                                                        <p><?php
                                                                            if ($tiposervicio == 1) {
                                                                                echo "Doméstico";
                                                                            } else {
                                                                                echo "Mixto ( Casa con Comercio)";
                                                                            }
                                                                            ?></p>


                                                                    </div>

                                                                    <div class="form-gruop col-md-3">
                                                                        <label>Sevicios con los que cuenta el predio:</label>
                                                                        <p><?php
                                                                            if ($servicioscuenta == 1) {

                                                                                echo "Agua";
                                                                            } elseif ($servicioscuenta == 2) {
                                                                                echo "Drenaje y Saneamiento";
                                                                            } elseif ($servicioscuenta == 3) {
                                                                                echo "Agua, Drenaje y Saneamiento";
                                                                            } elseif ($servicioscuenta == 4) {
                                                                                echo "Drenaje";
                                                                            } elseif ($servicioscuenta == 6) {
                                                                                echo "Agua y Drenaje";
                                                                            } else {
                                                                                echo "Ninguno";
                                                                            }
                                                                            ?>

                                                                        </p>


                                                                    </div>

                                                                    <div class="form-group col-md-2">
                                                                        <label>Servicios que solicita:</label>
                                                                        <p><?php
                                                                            if ($serviciossolicita == 1) {

                                                                                echo "Agua";
                                                                            } elseif ($serviciossolicita == 2) {
                                                                                echo "Drenaje y Saneamiento";
                                                                            } elseif ($serviciossolicita == 3) {
                                                                                echo "Agua, Drenaje y Saneamiento";
                                                                            } elseif ($serviciossolicita == 4) {
                                                                                echo "Drenaje";
                                                                            } elseif ($serviciossolicita == 6) {
                                                                                echo "Agua y Drenaje";
                                                                            } else {
                                                                                echo "Ninguno";
                                                                            }
                                                                            ?></p>


                                                                    </div>

                                                                    <div class="form-group col-md-3">
                                                                        <label>Condiciones Generales:</label>
                                                                        <p><?php
                                                                            if ($condicionesgenerales == 1) {

                                                                                echo "Habitado";
                                                                            } elseif ($condicionesgenerales == 2) {
                                                                                echo "Deshabitado";
                                                                            } elseif ($condicionesgenerales == 3) {
                                                                                echo "Obra Negra";
                                                                            } else {
                                                                                echo "Lote Baldio";
                                                                            }
                                                                            ?>

                                                                        </p>
                                                                    </div>

                                                                    <div class="form-group col-md-2">
                                                                        <label>Tiempo Habitado:</label>
                                                                        <br>
    <?php echo $tiempohabitado; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <h3 class="form-section">Documentos para el trámite</h3>
                                                                <div class="form-group">
                                                                    <div class="form-group col-md-3">
                                                                        <label>Documento que acredite la propiedad (Predial, Escritura o Compra-venta notariado u hoja de retención)</label>


                                                                        <p><?php if (!empty($doctopredial)) { ?>
                                                                                <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctopredial; ?>">Descargar</a>
                                                                                <?php
                                                                            } else {
                                                                                echo "El Ciudadano no adjunto este Archivo";
                                                                            }
                                                                            ?>
                                                                        </p>

                                                                    </div>


                                                                    <div class="form-group col-md-3">
                                                                        <label >Identificación (INE,Pasaporte,Cédula Profesional)</label>
                                                                        <p><?php if (!empty($doctoife)) { ?>
                                                                                <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctoife; ?>">Descargar</a>
                                                                                <?php
                                                                            } else {
                                                                                echo "El Ciudadano no adjunto este Archivo";
                                                                            }
                                                                            ?>
                                                                        </p>


                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label >Documento Pago </label>
    <?php if ($cambio != 1): ?>
                                                                            <p><?php if (!empty($doctopago)) { ?>
                                                                                    <a href="<?php echo base_url() . "assets/tramites/serviciosdeaguaydrenaje/" . $doctopago; ?>">Descargar</a>
                                                                                    <?php
                                                                                } else {
                                                                                    echo "El Ciudadano no adjunto este Archivo";
                                                                                }
                                                                                ?>

                                                                            </p>
    <?php else: ?>
                                                                            <p>
                                                                                El Ciudadano requiere que el costo sea cargado en el primer recibo 
                                                                            </p>
    <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="IDTram" value="<?php echo $ID; ?>" />
                                            <div class="form-group col-md-12">
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-md-6">
                                                    <label for="varchar">Solicitud *<?php echo form_error('solicitud') ?></label>
                                                    <input required readonly type="text" class="form-control" name="solicitud" id="solicitud" placeholder="Solicitud" value="E-00000<?php echo $ID; ?>" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-gorup">

                                                        <label for="varchar">Cuenta ligada <?php echo form_error('cuentaligada') ?></label>
                                                        <input readonly type="text" class="form-control" name="cuentaligada" id="cuentaligada" placeholder="Cuenta ligada" value="<?php echo $cuentaligada; ?>" />
                                                        <a type="" class="btn btn-primary hidden" id="pruebaservicio">Generar numero de contrato</a>
                                                    </div>
                                                </div>
                                                <!--
                                              <div class="form-group col-md-2">
        
                                                    <label for="varchar">Tarifa *<?php echo form_error('tarifa') ?></label>
                                                   <input required type="text" class="form-control" name="tarifa" id="tarifa" placeholder="Tarifa" value="<?php echo $tarifa; ?>" />
        
                                                </div>
        
                                              <div class="form-group col-md-2">
        
                                                   <label for="varchar">Zona facturación *<?php echo form_error('zonafacturacion') ?></label>
                                                    <input required type="text" class="form-control" name="zonafacturacion" id="zonafacturacion" placeholder="Zona facturación" value="<?php echo $zonafacturacion; ?>" />
        
                                                </div>
        
                                                <div class="form-group col-md-2">
        
                                                   <label for="varchar">Zona Economica *<?php echo form_error('zonaeconomica') ?></label>
                                                    <input required type="text" class="form-control" name="zonaeconomica" id="zonaeconomica" placeholder="Zona Economica" value="<?php echo $zonaeconomica; ?>" />
        
                                                </div>
                                                -->
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Diámetro toma *<?php echo form_error('diametrotoma') ?></label>
                                                    <!--
                                                    <input required type="text" class="form-control" name="diametrotoma" id="diametrotoma" placeholder="Diametro toma" value="<?php //echo $diametrotoma;                                     ?>" />
                                                    -->
                                                    <select required class="form-control" name="diametrotoma" id="diametrotoma">
                                                        <option value="medio">1/2</option>
                                                    </select>
                                                </div>


                                                <div class="form-group col-md-4">

                                                    <label for="varchar">Servicios proporcionados*<?php echo form_error('serviciossolicita') ?></label>
                                                    <select required  class="form-control" name="serviciossolicita" tabindex="-1" id="serviciossolicita" value="<?php echo $serviciossolicita; ?>">

    <?php if ($serviciossolicita == 1) { ?>
                                                            <option value="1">Agua</option>
                                                            <option value="2">Drenaje</option>
                                                            <option value="3">Drenaje y Saneamiento</option>
                                                            <option value="4">Agua y Drenaje</option>
                                                            <option value="5">Agua, Drenaje y Saneamiento</option>

    <?php } elseif ($serviciossolicita == 2) { ?>
                                                            <option value="2">Drenaje</option>
                                                            <option value="1">Agua</option>
                                                            <option value="3">Drenaje y Saneamiento</option>
                                                            <option value="4">Agua y Drenaje</option>
                                                            <option value="5">Agua, Drenaje y Saneamiento</option>
    <?php } elseif ($serviciossolicita == 3) { ?>
                                                            <option value="3">Drenaje y Saneamiento</option>
                                                            <option value="1">Agua</option>
                                                            <option value="2">Drenaje</option>
                                                            <option value="4">Agua y Drenaje</option>
                                                            <option value="5">Agua, Drenaje y Saneamiento</option>
    <?php } elseif ($serviciossolicita == 4) { ?>
                                                            <option value="4">Agua y Drenaje</option>
                                                            <option value="1">Agua</option>
                                                            <option value="2">Drenaje</option>
                                                            <option value="3">Drenaje y Saneamiento</option>

                                                            <option value="5">Agua, Drenaje y Saneamiento</option>
    <?php } else { ?>
                                                            <option value="5">Agua, Drenaje y Saneamiento</option>
                                                            <option value="1">Agua</option>
                                                            <option value="2">Drenaje</option>
                                                            <option value="3">Drenaje y Saneamiento</option>
                                                            <option value="4">Agua y Drenaje</option>

    <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="varchar">Tipo de servicio</label>
                                                    <select class="form-control" name="tiposer" tabindex="-1" id="tiposer">
                                                        <option value="D">SERVICIO MEDIDO - DOMESTICO</option>
                                                        <option value="M">SERVICIO MEDIDO - MIXTO</option>
                                                        <option value="C">SERVICIO MEDIDO - COMERCIAL</option>
                                                        <option value="I">SERVICIO MEDIDO - INDUSTRIAL</option>
                                                        <option value="P">SERVICIO MEDIDO - PUBLICO</option>
                                                        <option value="Z1">CUOTA FIJA - DOMESTICO - ZONA MARGINADA</option>
                                                        <option value="Z2">CUOTA FIJA - DOMESTICO - ZONA 1</option>
                                                        <option value="Z3">CUOTA FIJA - DOMESTICO - ZONA INFONAVIT</option>
                                                        <option value="Z3">CUOTA FIJA - DOMESTICO - ZONA 2</option>
                                                        <option value="Z4">CUOTA FIJA - DOMESTICO - ZONA 3</option>
                                                        <option value="Z5">CUOTA FIJA - DOMESTICO - ZONA 4</option>
                                                        <option value="Z7">CUOTA FIJA - DOMESTICO - ZONA 5</option>
                                                        <option value="Z8">CUOTA FIJA - MIXTO - ZONA MARGINADA</option>
                                                        <option value="Z9">CUOTA FIJA - MIXTO - ZONA 1</option>
                                                        <option value="Z10">CUOTA FIJA - MIXTO - ZONA INFONAVIT</option>
                                                        <option value="Z10">CUOTA FIJA - MIXTO - ZONA 2</option>
                                                        <option value="Z11">CUOTA FIJA - MIXTO - ZONA 3</option>
                                                        <option value="Z12">CUOTA FIJA - MIXTO - ZONA 4</option>
                                                        <option value="Z14">CUOTA FIJA - MIXTO - ZONA 5</option>
                                                        <option value="Z1">CUOTA FIJA - DEPARTAMENTO - ZONA MARGINADA</option>
                                                        <option value="Z2">CUOTA FIJA - DEPARTAMENTO - ZONA 1</option>
                                                        <option value="Z2">CUOTA FIJA - DEPARTAMENTO - ZONA INFONAVIT</option>
                                                        <option value="Z34">CUOTA FIJA - DEPARTAMENTO - ZONA 2</option>
                                                        <option value="Z19">CUOTA FIJA - DEPARTAMENTO - ZONA 3</option>
                                                        <option value="Z18">CUOTA FIJA - DEPARTAMENTO - ZONA 4</option>
                                                        <option value="Z5">CUOTA FIJA - DEPARTAMENTO - ZONA 5</option>
                                                        <option value="CFCZE 1">CUOTA FIJA - COMERCIAL - ZONA ESPECIAL</option>
                                                        <option value="CFIZE">CUOTA FIJA - INDUSTRIAL - ZONA ESPECIAL</option>
                                                        <option value="CFDZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL (Indus-Básico)</option>
                                                        <option value="Z46">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z98">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z112">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z129">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z133">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - DOMESTICO -  MEDIO</option>
                                                        <option value="Z50">CUOTA FIJA - MIXTO - MEDIO</option>
                                                        <option value="Z51">CUOTA FIJA - DEPARTAMENTOS - MEDIO</option>
                                                        <option value="Z52">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z280">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL (Comer-Seco)</option>
                                                        <option value="Z20">CUOTA FIJA - ZONA ESPECIAL (Comer-Medio)</option>
                                                        <option value="Z22">CUOTA FIJA - ZONA ESPECIAL (Comer-Normal)</option>
                                                        <option value="Z23">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL (Comer-Alto)</option>
                                                        <option value="Z26">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL (Indus-Medio)</option>
                                                        <option value="Z28">CUOTA FIJA - ZONA ESPECIAL (Indus-Normal)</option>
                                                        <option value="Z29">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z675">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="Z717">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                        <option value="CFZE">CUOTA FIJA - ZONA ESPECIAL</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="form-group col-md-3">
                                                    <label for="date">Inicio facturación <?php echo form_error('iniciofacturacion') ?></label>
                                                    <div class="input-group input-medium date date-picker" data-date-start-date="+0d" data-date-format="yyyy-mm-dd">
                                                        <input class="form-control" required type="text" readonly="" name="iniciofacturacion" id="iniciofacturacion" value="<?php echo $iniciofacturacion; ?>" ><span class="input-group-btn">
                                                            <button class="btn btn-primary btn-outline" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-3">
                                                    <label for="tinyint">Status <?php echo form_error('status') ?></label>
                                                    <select class="form-control" name="status" id="status">
    <?php if ($status == 1): ?>
                                                            <option value = "1">Iniciado</option>
                                                            <option value = "4">Termindado y En Espera de Pago</option>

                                                            <option value = "6">Terminado</option>
                                                            <option value = "5">Cancelado</option>
                                                        <?php endif; ?>

    <?php if ($status == 4): ?>
                                                            <option value = "4">Termindado y En Espera de Pago</option>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "5">Cancelado</option>
                                                            <option value = "1">Iniciado</option>

                                                        <?php endif; ?>

    <?php if ($status == 5): ?>
                                                            <option value = "5">Cancelado</option>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "4">Termindado y En Espera de Pago</option>
                                                            <option value = "1">Iniciado</option>
                                                        <?php endif; ?>

    <?php if ($status == 6): ?>
                                                            <option value = "6">Terminado</option>
                                                            <option value = "4">Termindado y En Espera de Pago</option>
                                                            <option value = "5">Cancelado</option>
                                                            <option value = "1">Iniciado</option>
    <?php endif; ?>
                                                    </select>
                                                </div>




                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12"
                                                     <label for="varchar">Enviar mensaje al ciudadano <?php echo form_error('mensaje') ?></label>
                                                    <textarea class="form-control" rows="3" name="mensaje" id="mensaje" placeholder="Mensaje"><?php echo $mensaje; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                            </div>
<?php } ?>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="ID" value="<?php echo $ID; ?>" />
                                                    
                                              <!-- Botones Flotantes --><div class="button-group pull float">
       <button type="submit" id="solicitar" class="btn btn-success  glyph-icon icon-check">Aceptar Trámite</button>
<?php if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) { ?>
                                                        <a href="<?php echo base_url(); ?>contratacion_y_servicios_de_agua_y_drenaje_domestico" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>

                                                    <?php } else { ?>
                                                        <?php if ($status == 6 && ($this->session->userdata('tipo') === 3 || $this->session->userdata('tipo') == 4 )): ?>
                                                            <b class="btn btn-success" id="documento1">Generar Contrato</b>
    <?php endif; ?>


                                                        <a href="<?php echo base_url(); ?>infotramites/info_agua_y_drenaje_domestico" class="btn btn-azure glyph-icon icon-arrow-circle-left">Regresar</a>
                                              </div><!-- Botones Flotantes -->
                                             
<?php } ?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- END PAGE CONTENT INNER -->


                                    </form>
                                </div>
                                <!-- END PAGE CONTENT BODY -->
                                <!-- END CONTENT BODY -->
                            </div>
                            <!-- END CONTENT -->
                        </div>
                        <!-- END CONTAINER -->
                    </div>
                </div>
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
        <script src="<?php echo base_url(); ?>assets/js/tram/japami.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/enjoyhint.js" type="text/javascript"></script>

        <script>
                                            $(document).ready(function () {

                                                $("#documento1").click(function () {

                                                    //var url = "http://naturalmentefuerte.com/vuira/docstramites/documentojapami/documentofinal/"+$("#calle").text()+" / "+$("#num").text()+"/"+$.trim($("#entre1").text())+" / "+$("#entre2").text()+" / "+$("#colonia").text()+" / "+$("#nombrepropietario").text()+" "+$("#apellido1").text()+" "+$("#apellido2").text()+" / "+$("#rfc").text()+" / "+($("#correo").text()).replace("@","ñ")+" / "+$("#telefono").text()+" / "+document.getElementById("cuentaligada").value+" / "+document.getElementById("solicitud").value+" / "+document.getElementById("tiposer").value+"/"+document.getElementById("serviciossolicita").value+"/"+document.getElementById("iniciofacturacion").value;

                                                    var telefono = ($("#telefono").val()).replace("(", "ccc");
                                                    //alert(telefono);
                                                    telefono = telefono.replace(")", "ddd");
                                                    var url = "<?php echo base_url(); ?>docstramites/documentojapami/documentofinal/" + $.trim($("#calle option:selected").text()) + "/" + $("#numeroextpropietario").val() + "/" + $.trim($("#callereferencia1 option:selected").text()) + "/" + $.trim($("#callereferencia2 option:selected").text()) + "/" + $.trim($("#coloniaubicacion option:selected").text()) + "/" + $("#nombrepropietario").val() + " " + $("#apaterno").val() + " " + $("#amaterno").val() + "/" + $("#rfc").val() + "/" + ($("#correo").val()).replace("@", "ñ") + "/" + telefono + "/" + document.getElementById("cuentaligada").value + "/" + document.getElementById("solicitud").value + "/" + document.getElementById("tiposer").value + "/" + document.getElementById("serviciossolicita").value + "/" + document.getElementById("iniciofacturacion").value;
                                                    //alert(url);
                                                    window.open(url, '_blank');
                                                    return false;
                                                    //alert("HOLA");
                                                });
                                                $("#documentopago").click(function () {
                                                    var url = "<?php echo base_url(); ?>docstramites/documentojapami/documentopago/" + $("#IDTram").val() + "/" + document.getElementById("serviciossolicita").value;
                                                    //alert(url);
                                                    //alert(url);
                                                    window.open(url, '_blank');
                                                    return false;
                                                    //alert("HOLA");
                                                });
                                                var dato = $('#divestatus').val();
                                                if (dato == 4 || dato == 6) {
                                                    $("#hiddendoctopago").show();
                                                } else {
                                                    $("#hiddendoctopago").hide();
                                                }
                                                if (dato === "4") {
                                                    if ($("#cuentaligada").val() != '') {
                                                        $("#pruebaservicio").addClass('hidden');
                                                    } else {
                                                        $("#pruebaservicio").removeClass('hidden');
                                                    }
                                                }
                                                var med = $('select[id=medidor1]').val();
                                                if (med == 'Otro') {
                                                    $('#otro_med').removeClass('hidden');
                                                } else {
                                                    $('#otro_med').addClass('hidden');
                                                }
                                                $("#medidor1").change(function () {
                                                    var med = $('select[id=medidor1]').val();
                                                    if (med == 'Otro') {
                                                        $('#otro_med').removeClass('hidden');
                                                    } else {
                                                        $('#otro_med').addClass('hidden');
                                                    }
                                                });
                                                $("#status").change(function () {
                                                    //alert("HOLA");
                                                    var dato = $('select[id=status]').val();
                                                    if (dato == 4) {
                                                        if ($("#pruebaservicio").hasClass('hidden')) {
                                                            if ($("#cuentaligada").val() != '') {

                                                            } else {
                                                                $("#pruebaservicio").removeClass('hidden');
                                                            }
                                                        } else
                                                        {

                                                        }
                                                    }
                                                    if (dato == 6) {
                                                        if ($("#documento").hasClass('hidden')) {
                                                            $("#documento").removeClass('hidden');
                                                        }
                                                        $("#documento").show();
                                                        $("#hiddendoctofinal").show();
                                                        $("#hiddendoctopago").show();
                                                    } else {
                                                        $("#hiddendoctofinal").hide();
                                                        if ($("#documento").hasClass('hidden')) {

                                                        } else {
                                                            $("#documento").addClass('hidden');
                                                        }

                                                    }


                                                });
                                                $('#numeroextpropietario').keyup(function () {
                                                    //geocodeAddress(geocoder, map);
                                                    //nooficial
                                                    $('#address').val($.trim($("#coloniapropietario option:selected").text()) + " " + $.trim($("#callepropietario option:selected").text()) + " " + $('#numeroextpropietario').val() + " Irapuato, Guanajuato");
                                                    initMap();
                                                    //calleui
                                                });
                                                $('#coloniapropietario').change(function () {
                                                    //geocodeAddress(geocoder, map);
                                                    //nooficial
                                                    $('#address').val($.trim($("#coloniapropietario option:selected").text()) + " " + $.trim($("#callepropietario option:selected").text()) + " " + $('#numeroextpropietario').val() + " Irapuato, Guanajuato");
                                                    initMap();
                                                    //calleui
                                                });
                                                $('#callepropietario').change(function () {
                                                    //geocodeAddress(geocoder, map);
                                                    //nooficial
                                                    $('#address').val($.trim($("#coloniapropietario option:selected").text()) + " " + $.trim($("#callepropietario option:selected").text()) + " " + $('#numeroextpropietario').val() + " Irapuato, Guanajuato");
                                                    initMap();
                                                    //calleui
                                                });
<?php if (empty($mapa)): ?>
                                                    $('#address').val($.trim($("#coloniapropietario option:selected").text()) + " " + $.trim($("#callepropietario option:selected").text()) + " " + $('#numeroextpropietario').val() + " Irapuato, Guanajuato");
<?php else: ?>
                                                    setTimeout(function () {
                                                        initMap();
                                                    }, 100);
<?php endif; ?>     //calleui
                                            });
        </script>
        <!-- MAPA -->
        <script>
            //20.6547575, -101.36542910000003

            function initMap() {
<?php if ($this->session->userdata('tipo') == 13 || $this->session->userdata('tipo') == 133) {
    ?>
                    var cadena = $("#address").val();
                    var separador = ","; // un espacio en blanco
                    var arregloDeSubCadenas = cadena.split(separador);
                    var latitud = (parseFloat(arregloDeSubCadenas[0]));
                    var longitud = (parseFloat(arregloDeSubCadenas[1]));
                    //setTimeout("initMap()",10000);

                    var map = new google.maps.StreetViewPanorama(document.getElementById('map'), {
                        zoom: 17,
                        position: {lat: latitud, lng: longitud}
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
<?php } else { ?>

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
<?php } ?>
            }

            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('address').value;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status === 'OK') {
//                        
<?php if ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 4): ?>
                            resultsMap.setCenter(results[0].geometry.location);
<?php endif; ?>
                        var marker = new google.maps.Marker({
                            map: resultsMap,
                            draggable: true,
                            position: results[0].geometry.location
                        });
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

        <script>
<?php if ($this->session->userdata('tipo') != 4): ?>
                $('#pruebaservicio').click(function () {
                    //asignar valores correctos y codificarlos en JSON
                    if ($('#iniciofacturacion').val() != '0000-00-00') {
                        //alert(valor);

                        var serviciossolicita = $('#serviciossolicita').val();
                        var iniciofacturacion = $('#iniciofacturacion').val();
                        var solicitud = $('#solicitud').val();
                        $.ajax({
                            url: "<?php echo base_url(); ?>Contratacion_y_servicios_de_agua_y_drenaje_domestico/cuenta_as",
                            type: "POST", dataType: "json",
                            data: {
                                ID: <?php echo $ID; ?>,
                                serviciossolicita: "" + serviciossolicita,
                                iniciofacturacion: "" + iniciofacturacion,
                                solicitud: "" + solicitud,
                            },
                            success: function (respuesta) {
                                try {
                                    if (respuesta[0]['Estatus'] === "CORRECTO") {
                                        $("#cuentaligada").val(respuesta[0]['No_Cuenta']);
                                        alert("Numero de cuenta generado con éxito ");
                                        //                                $("#pruebaservicio").addClass('hidden');
                                        $("#hiddendoctopago").show();
                                    } else {
                                        alert("" + respuesta[0]['Mensaje']);
                                    }
                                } catch (e) {
                                    alert(e);
                                }
                            }
                        });
                    } else {
                        alert("Seleccione la fecha correcta");
                    }

                });
<?php endif; ?>
            $("#otro_domicilio_facturacion").on("click", function () {
                if ($("#otro_domicilio_facturacion").is(':checked')) {
                    if ($("#otrainfo").hasClass('hidden')) {
                        $("#otrainfo").removeClass('hidden');
                    }
                } else {
                    if ($("#otrainfo").hasClass('hidden')) {

                    } else {
                        $("#otrainfo").addClass('hidden');
                    }
                }
            });

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAPRH-nZDVrfYKN5umGXNgtuxa8W2VQlo&callback=initMap">
        </script>
<?php if ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 3): ?>
            <script>

                function iniciarAyuda() {

                    var enjoyhint_instance = new EnjoyHint({});
                    var enjoyhint_script_steps = [
                        {
                            "next #ayuda": 'Hola, Bienvenido al  Tramite de Contratación de servicios de agua y drenaje domésticos. <br> Para continuar con el tutorial de solicitud del trámite <br>Presiona el botón "Siguiente".',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        },
                        {
                            "next #paso1": 'Por favor ingrese los siguientes datos Generales del predio a donde se solicitaran los servicios .<br>De click en "Siguiente" para continuar..',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        },
                        {
                            "next #paso2": 'Para una mayor referencia por favor ingrese los siguientes datos.<br>De click en "Siguiente" para continuar..',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso3": '<span style="color:black;">Por favor verifique que su predio sea el que se muestra en el mapa en caso de no ser así por favor mueva el puntero rojo al lugar de su predio.<br>De click en "Siguiente" para continuar..</span>',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso4": 'Por favor indique si el predio ya cuenta con una conexión de ser así indique si el predio cuenta ya con un medidor.<br>De click en "Siguiente" para continuar..',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso5": '<span style="color:black;" >Si ya cuenta con un medidor por favor ingrese la siguiente información en caso de no ser así por favor omita este paso.<br>De click en "Siguiente" para continuar..</span>',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso6": 'Para un mejor servicio por favor indique si su solicitud de contrato cuenta con alguna observación.<br>De click en "Siguiente" para continuar..',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso7": '<span style="" >Por favor ingrese los siguientes datos del propietario del predio para generar el contrato.<br>De click en "Siguiente" para continuar..</span>',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso8": '<span style="" >Por favor ingrese la siguiente información para mantenerlo altanto del avance de su trámite.<br>De click en "Siguiente" para continuar..</span>',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso9": '<span style="" >Por favor ingrese los siguientes datos para generar su contrato con los servicios que desea solicitar. <br>De click en "Siguiente" para continuar..</span>',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }
                        ,
                        {
                            "next #paso10": 'Por Favor indique si desea que los datos de facturación sean diferentes a los del contrato.<br>De click en "Siguiente" para continuar..',
                            "nextButton": {text: "Siguiente"},
                            "skipButton": {text: "Saltar Guía"}
                        }

                        ,
                        {
                            "next #solicitar": 'Cuando usted haya capturado todos los datos solicitados de click en Solicitar Trámite,<br> a continuación se guardaran los datos capturados <br>y se notificará via correo electrónico cualquier actualización del trámite.<br>De click en "Finalizar" para concluir el tutorial..',
                            "nextButton": {text: "Finalizar"},
                            showSkip: false
                        }

                    ];
                    enjoyhint_instance.set(enjoyhint_script_steps);
                    enjoyhint_instance.run();
                }
            </script>
<?php endif ?>
    </body>
</html>