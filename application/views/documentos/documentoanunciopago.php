<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Desarrollo Territorial</title>
<style type="text/css">
  table{
    font: 88.5% sans-serif;
  }
  </style>
</head>
<header>
</header>
<body>
    <form action="<?php echo base_url(); ?>docstramites/documentoanuncio/documentofinalpago/<?php echo $ID; ?>" method="post">
    <input type="hidden" name="ID" value="<?php //echo $ID; ?>">
  <table style="width:100%; floar:left;">
    <tr>
      <td>
        <img src="<?php echo base_url()."assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
      </td>
    </tr>
  </table>

  <table style="width:100%; floar:left;">
    <tr>
      <td align="right">
        <b>
          <?php /*$fechaactual = getdate(); //echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"];*/
          $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

          $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
          'Miércoles', 'Jueves', 'Viernes', 'Sábado');

          //echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y'); ?>
        </b>
      </td>
    </tr>
  </table>

  <table style="width:100%; floar:left;">
    <tr>
      <td style="width:80%;"><?php // XXX:  ?></td>
      <td style="width:20%;">Orden de Pago</td>
    </tr>
    <tr>
      <td style="border: 1px solid black; text-align: center;">TIPO DE AUTORIZACIÓN</td>
      <td style="border: 1px solid black; text-align: center;">No. DE AUTORIZACIÓN</td>
    </tr>
    <tr>
      <td></td>
      <td style="text-align: center;"><?php echo $ID;  ?></td>
    </tr>
    <tr>
      <td>Permiso SARE</td>
      <td style="border: 1px solid black;">FECHA DE AUTORIACIÓN</td>
    </tr>
    <tr>
      <td style="text-align: justify;">
EN RELACIÓN A LA SOLICITUD PRESENTADA ANTE LA DIRECCIÓN DE ADMINISTRACIÓN URBANA, ADSCRITA A LA DIRECCIÓN GENERAL DE DESARROLLO
TERRITORIAL, CON LA FINALIDAD DE OBTENER EL PERMISO DE USO DE SUELO SARE; PREVIO ANÁLISIS PRACTICADO PARA TAL EFECTO SE TIENE LO
SIGUIENTE:
POR ÚLTIMO, DEBERÁ PAGAR A LA TESORERÍA MUNICIPAL LOS DERECHOS CORRESPONDIENTES AL PRESENTE PERMISO DE USO DE SUELO SARE POR LA
CANTIDAD DE $383.00 (00 PESOS XX /100 MN), DE CONFORMIDAD CON LO DISPUESTO EN EL ARTÍCULO 26 FRACCIÓN VI INCISO C DE LA LEY DE INGRESOS PARA
EL MUNICIPIO DE IRAPUATO GUANAJUATO PUBLICADA EN EL PERIÓDICO OFICIAL DEL GOBIERNO DEL ESTADO DE GUANAJUATO, NÚMERO 205 SEXTA PARTE,
DE FECHA 23 DE DICIEMBRE DEL AÑO 2016; MISMAS QUE ENTRARON EN VIGOR A PARTIR DEL 1o DE ENERO DEL AÑO 2017 PARA EL EJERCICIO FISCAL AÑO 2017.
      </td>
      <td style="text-align: center;">
        <?php echo date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y'); ?>
      </td>
    </tr>
    <tr>
      <td style="border: 1px solid black; text-align: center;">DESCRIPCIÓN</td>
      <td style="border: 1px solid black; text-align: center;">MONTO DE AUTORIZACIÓN</td>
    </tr>
  </table>

  <table style="width:100%; floar:left;">
    <tr>
      <td>CONCEPTO</td>
      <td>UNIDAD</td>
      <td>CANTIDAD</td>
      <td>TARIFA</td>
      <td>COSTO</td>
      <td><b>TOTAL</b></td>
    </tr>
    <tr>
      <td><input type="text" name="d1" value="Permiso de uso de suelo"></td>
      <td><input type="text" name="d2" value="1"></td>
      <td><input type="text" name="d3" value=""></td>
      <td><input type="text" name="d4" value="$382.00"></td>
      <td><input type="text" name="d5" value="$382.00"></td>
    </tr>
    <tr>
      <td><input type="text" name="d6" value="EXCEDENTES DE 120.00m²"></td>
      <td><input type="text" name="d7" value="M2"></td>
      <td><input type="text" name="d8" value="$0.00"></td>
      <td><input type="text" name="d9" value="$1.00"></td>
      <td><input type="text" name="d10" value="$1.00"></td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: right;"><input type="text" name="d11" value="$383.00"></td>
    </tr>
  </table>

  <table style="width:100%; floar:left;">
    <tr>
      <td style="border: 1px solid black; text-align: center;">PROPIETARIO/SOLICITANTE/RAZÓN SOCIAL</td>
      <td style="border: 1px solid black; text-align: center;">AUTORIZACIÓN</td>
    </tr>
    <tr>
      <td style="border: 1px solid black; text-align: center;"><?php echo $u1;  ?>
        <br>
        MISMO QUE PAGARÁ A LA TESORERIA MUNICIPAL DE IRAPUATO LA CANTIDAD DE <input type="text" name="d18" value="$383.00">
        <br>
        <input type="text" name="d19" value="(TRESCIENTOS OCHENTA Y TRES PESOS 00/100 M.N.)" size="50">
        <br>
        (Cantidad con Letra)
      </td>
      <td style="border: 1px solid black; text-align: center;">
        <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');?>&amp;chld=H|0">
        <br>
        Arq. José Alfredo López Padilla
      <br>
      Director General de Desarrollo Territorial
    </td>
    </tr>
    <tr>
      <td>Si requiere factura tien 48 hrs para su solicitud al correo electrónico facturacion@irapuato.gob.mx</td>
    </tr>
  </table>
  <table style="width:100%; floar:left;">
    <tr>
      <td style="width:50%; border: 1px solid black; text-align: center;">PARA USO EXCLUSIVO DEL BANCO</td>
      <td style="width:50%; border: 1px solid black; text-align: center;">PARA USO EN BANCA ELECTRÓNICA</td>
    </tr>
    <tr>
      <td>Pago en ventanilla</td>
      <td>Pago en electrónica</td>
    </tr>
    <tr>
      <td>REF1:<input type="text" name="d12" value="NINGUNA"></td>
      <td><input type="text" name="d15" value="8 NUM"></td>
    </tr>
    <tr>
      <td>REF2:<input type="text" name="d13" value="NINGUNA"></td>
      <td>REFERENCIA BANCARIA<input type="text" name="d16" value="NINGUNA"></td>
    </tr>
    <tr>
      <td>REF3:<input type="text" name="d14" value="NINGUNA"></td>
    </tr>
  </table>
  <table style="width:100%;">
    <tr>
      <td style="width:100%; text-align: right;">Página 1 de 1</td>
    </tr>
  </table>
    <input type="submit" value="Generar Documento">
  </form>
  </body>
</html>
