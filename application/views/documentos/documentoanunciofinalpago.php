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
      <td style="width:80%; text-align: center;"><h4>
Permiso de Anuncios Adosados y/o Rotulados
</h4></td>
      <td style="width:20%; text-align: center;">Orden de Pago</td>
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
      <td style="border: 1px solid black;">FECHA DE AUTORIZACIÓN</td>
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
<br><br><br><br>
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
      <td><b>CONCEPTO</b></td>
      <td><b>UNIDAD</b></td>
      <td><b>CANTIDAD</b></td>
      <td><b>TARIFA</b></td>
      <td><b>COSTO</b></td>
      <td><b>TOTAL</b></td>
    </tr>
    <tr>
      <td><?php echo $d1;?></td>
      <td><?php echo $d2;?></td>
      <td><?php echo $d3;?></td>
      <td><?php echo $d4;?></td>
      <td><?php echo $d5;?></td>
    </tr>
    <tr>
      <td><?php echo $d6;?></td>
      <td><?php echo $d7;?></td>
      <td><?php echo $d8;?></td>
      <td><?php echo $d9;?></td>
      <td><?php echo $d10;?></td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: right;"><?php echo $d11;?></td>
    </tr>
  </table>
  <br><br>
  <table style="width:100%; floar:left;">
    <tr>
      <td style="border: 1px solid black; text-align: center;">PROPIETARIO/SOLICITANTE/RAZÓN SOCIAL</td>
      <td style="border: 1px solid black; text-align: center;">AUTORIZACIÓN</td>
    </tr>
    <tr>
      <td style="border: 1px solid black; text-align: center;"><?php echo $nombrepropietariodg;  ?>
        <br>
        MISMO QUE PAGARÁ A LA TESORERIA MUNICIPAL DE IRAPUATO LA CANTIDAD DE <?php echo $d18;?>
        <br>
        <?php echo $d19;?>
        <br>
        (Cantidad con Letra)
      </td>
      <td style="border: 1px solid black; text-align: center;">
        <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');?> - Permiso de Anuncios Adosados y/o Rotulados&amp;chld=H|0">
        <br>
        Arq. José Alfredo López Padilla
      <br>
      Director General de Desarrollo Territorial
    </td>
    </tr>
    <tr>
      <td colspan="2">Si requiere factura tiene 48 hrs para su solicitud al correo electrónico facturacion@irapuato.gob.mx</td>
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
      <td>REF1:<?php echo $d12;?></td>
      <td><?php echo $d15;?></td>
    </tr>
    <tr>
      <td>REF2:<?php echo $d13;?></td>
      <td>REFERENCIA BANCARIA: <?php echo $d16;?></td>
    </tr>
    <tr>
      <td>REF3:<?php echo $d14;?></td>
    </tr>
  </table>
  <table style="width:100%;">
    <tr>
      <td style="width:100%; text-align: right;">Página 1 de 1</td>
    </tr>
  </table>
  </body>
</html>
