<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title> Validar Pago </title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="../..assets_muni/img/irapuato.png">
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
    <script type="text/javascript" src="./../js/view_fracc_validar_pagos.js"></script>

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
  <body onload="event_load()">
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
          <h2>VALIDACIÓN DE PAGOS</h2><br>
          <div id="panel-captura-avaluo" class="panel">
            <div class="panel-body">
              <div id="panel-fecha_recep" class="content-box border-top border-blue">
                <div class="content-box-wrapper">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped table-hover table-sm" id='tblcontent'>
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Colonia</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Manzana</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tr>
                    </tr>
                  </table>
                    </div>
                  </div>
                  
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- Se carga el footer-->
    <?php include_once("../base/Footer.php")?>  
    </div>
  </body>
</html>

<script type="text/javascript">var base_url = "";</script>

