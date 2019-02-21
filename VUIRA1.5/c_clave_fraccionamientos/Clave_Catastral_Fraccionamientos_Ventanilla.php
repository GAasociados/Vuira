<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title> Ventanilla Clave Catastral Fraccionamientos </title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="../../assets_muni/img/irapuato.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--#region CSS  -->
    <style>
    /* Loading Spinner */
    .spinner {
      margin: 0;
      width: 70px;
      height: 18px;
      margin: -35px 0 0 -9px;
      position: absolute;
      top: 50%;
      left: 50%;
      text-align: center
      }

    .spinner>div {
      width: 18px;
      height: 18px;
      background-color: #333;
      border-radius: 100%;
      display: inline-block;
      -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
      animation: bouncedelay 1.4s infinite ease-in-out;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both
    }

    .spinner .bounce1 {
      -webkit-animation-delay: -.32s;
      animation-delay: -.32s
    }

    .spinner .bounce2 {
      -webkit-animation-delay: -.16s;
      animation-delay: -.16s
    }

    @-webkit-keyframes bouncedelay {
      0%,
      80%,
      100% {
        -webkit-transform: scale(0.0)
      }
      40% {
        -webkit-transform: scale(1.0)
      }
    }

    @keyframes bouncedelay {
      0%,
      80%,
      100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0)
      }
      40% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0)
      }
    }
  </style>

  <!-- TODOS LOS ESTILOS DEL MUNICIPIO -->
  <?php include_once("../base/librerias.php")?>
  <!-- NUESTRO SCRIPT -->
  <script type="text/javascript" src="./../js/view_claves_cat_fraccionamiento.js"></script>
  <script type="text/javascript">
    $(window).load(function () {
      setTimeout(function () {
        $('#loading').fadeOut(400, "linear");
      }, 300);
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
  </script>
  <!--#endregion -->
  </head>
  <body onload="event_load_ventanilla()">
    <div id="baseUrl" base-url=""></div>
    <div id="loading">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- FIN loading -->
    <!-- Se carga el header -->
    <?php include_once("../base/Header.php")?>
    <!-- Se carga el menu izquiero -->
    <?php include_once("../base/Menu_Izquierdo.php")?>
    <div id="page-content-wrapper">
      <div id="page-content">
        <div class="container">
          <h2>CLAVE CATASTRAL FRACCIONAMIENTOS</h2><br>
          <div id="panel-captura-avaluo" class="panel">
            <div class="panel-body">
              <input class="btn btn-success float" type="submit" value="Guardar"form="formVentanilla" onclick=""/>
                <!-- <i class="glyph-icon icon-save"></i> -->
              <input type="button" class="btn btn-danger float" value="Cancelar" id="btnCancelarFracc"   style="position: fixed;bottom: 70px;right: 20px;" onclick="event_cancelar_tramite()">
              <form action="C_C_Fraccionamientos_CE.php" id="formVentanilla" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="id" id="id" value="<?php
                if(isset($_GET["Id"]))
                {
                  echo $_GET["Id"];
                }
                ?>"/>
                <input type="hidden" id="operation" value="<?php
                if(isset($_GET["operation"]))
                {
                  echo $_GET["operation"];
                }
                ?>"/>
              <div id="panel-fecha_recep" class="content-box border-top border-blue">
                <div id="content-wrapper-fecha-recep" class="content-box-wrapper" >
                  <h3 class="title-hero">I. Documentos del Inmueble</h3>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">¿Es Propietario?</label><br>
                        <label class="radio-inline"><input type="radio"  id="check-unidad_supS"  class="sup_inmueble_swi"  name="es_propietario" value="si" onclick="event_mostrar_extra_docs(this)" checked>Si</label>
                        <label class="radio-inline"><input type="radio"  id="check-unidad_supN" class="sup_inmueble_swi"  name="es_propietario" value="no" onclick="event_mostrar_extra_docs(this)">No</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="radio-inline"><input type="radio"  id="check-unidad_supM"  class="sup_inmueble_swi"  name="tipo_persona" value="moral" onclick="event_mostrar_extra_docs_tipo(this)" >Personal Moral</label>
                      <label class="radio-inline"><input type="radio"  id="check-unidad_supH" class="sup_inmueble_swi"  name="tipo_persona" value="fisica" onclick="event_mostrar_extra_docs_tipo(this)" checked>Persona Física</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Identificación de Propietario: INE, Pasaporte o Cédula Profesional</label>
                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="Doc_Identificacion" multiple="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Oficio de Traza Autorizada por la Dirección General de Desarrollo Territorial</label>
                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="Doc_Oficio_Traza" multiple="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Recibo Predial Actualizado General y/o Cuentas Prediales Individuales</label>
                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="Doc_Resibo_Predial" multiple="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Plano Digital de Traza Autorizada por la Dirección General de Desarrollo Territorial</label>
                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="Doc_Plano_Digital" multiple="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                     <div class="form-group">
                      <label for="" >Presentar Plano Físico de Traza Autorizada por la Dirección General de Desarrollo Territorial</label>
                      <label>(Se lleva a oficinas)</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Acta Constitutiva</label>
                      <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="Doc_Acta" multiple="">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Poder Notarial para Representación de Persona Moral</label>
                        <input accept=".jpg, .jpeg, .png ,.pdf, .rar, .zip" type="file" name="Doc_Poder_Moral" multiple="">
                      </div>
                    </div> -->
                  </div>
              </div>
            </div>
            <!-- SECCION II -->
            <div id="panel-datos-cuenta-suspendida" class="content-box border-top border-blue">
              <div class="content-box-wrapper">
                <h3 class="title-hero">II. IDENTIFICACIÓN Y UBICACIÓN DEL INMUEBLE</h3>
                <?php include_once ('cmp_inmueble_create.php')?>
              </div><!-- DIV content-box-wrapper de CUENTAS SUSPENDIDAS-->
            </div> <!-- DIV PANEL-CUENTA-SUSPENDIDA 1-->
            <div id="panel-datos-cuenta-suspendida2" class="content-box border-top border-blue">
              <div class="content-box-wrapper">
                <h3 class="title-hero">III. DATOS DEL PROPIETARIO Y/O REPRESENTANTE</h3>
                <div class="bordered-row">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="control-label">Nombre completo del propietario</label>
                        <input type="text" class="form-control" id="Propietario" name="Propietario" ></select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Correo Eléctronico</label>
                        <input type="email" class="form-control" id="Correo_Electronico" name="Correo_Electronico"  ></select>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Teléfono</label>
                        <div class="row">
                          <div class="col-xs-6 col-md-6">
                           <input type="text" class="form-control" id="Telefono" name="Telefono" >
                         </div>
                       </div>
                     </div>
                     <div class="form-group" >
                      <label class="control-label">Tipo de Trámite que solicita</label>
                      <select id="Tipo_Tramite" name="Tipo_Tramite" class="chosen-select">
                        <option value="0">Elegir trámite...</option>
                        <option value="1">Asignación de Claves Catastrales</option>
                        <option value="2">Modificación de Clave Catastrales</option>
                      </select>
                    </div>

                  </div><!-- FIN SUPERFICE-->
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
<!-- Se carga el footer-->
<?php include_once("../base/Footer.php")?>
</div>
<!-- page-content-wrapper -->
</div>
<!-- FIN sb-site -->
<div class="modal fade" id="talonModal" tabindex="-1" role="dialog" aria-labelledby="talonModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="talonModalLabel">Rango de Fechas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleFormControlInput1">Fecha de Inicio</label>
          <input class="form-control" id="fecha-inicio" type="date" data-format="yyyy-MM-dd">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Fecha de Entrega</label>
          <input class="form-control" id="fecha-entrega" type="date" data-format="yyyy-MM-dd">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="imprimirTalon" >Imprimir Talon</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>



<script type="text/javascript">var base_url = "";</script>

<!-- SELECT CHOSEN-->
<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/chosen/chosen.css">
<script type="text/javascript" src="../../assets_muni/assets/widgets/chosen/chosen.js"></script>
<script type="text/javascript" src="../../assets_muni/assets/widgets/chosen/chosen-demo.js"></script>

<!-- INPUT SWITCH -->
<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/theme-switcher/themeswitcher.css">
<script type="text/javascript" src="../../assets_muni/assets/widgets/input-switch/inputswitch.js"></script>



<!-- DATEPICKER -->
<link rel="stylesheet" type="text/css" href="../../assets_muni/assets/widgets/datepicker/datepicker.css">
<script type="text/javascript" src="../../assets_muni/assets/widgets/datepicker/datepicker.js"></script>

<script>
 $(function()
 {
   "use strict"; $('.input-switch').bootstrapSwitch();
   $("#date").bsdatepicker();
 });
</script>
