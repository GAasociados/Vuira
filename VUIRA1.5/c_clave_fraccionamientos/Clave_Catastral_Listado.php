<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
//Operations Ventanilla, Auxiliar
?>
<html>
  <head>
    <title>Listado de Fraccionamientos</title>
    <?php include("./../base/Header.php") ?>
		<script type="text/javascript" src="./../js/view_cat_fraccionamiento_list.js"></script>
  </head>
  <body onload="event_load()">
    <div class="col-auto">
      <br>
      <h1> Listado de Claves Fraccionamientos </h1>
      <br>
      <?php echo "<input type='hidden' id='operation' value='".(isset($_GET["operation"])?$_GET["operation"]:"Ventanilla")."' />";
        echo "<input type='hidden' id='uid' value='".(isset($_GET["uid"])?$_GET["uid"]:" ")."' />";

      ?>

        <table class="table table-bordered table-striped table-hover table-sm" id='tblcontent'>
            <tr>
                <td>
                  Id
                </td>
                <td>
                  Propietario
                </td>
                <td>
                  Correo Electronico
                </td>
                <td>
                  Telefono
                </td>
                <td>
                  Acciones
                </td>
            </tr>
        </table>
    </div>
  </body>
</html>
