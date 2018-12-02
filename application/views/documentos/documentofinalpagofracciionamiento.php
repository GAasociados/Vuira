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
                        Clave Catastral Individual
                    </h4></td>
                <td style="width:20%; text-align: center;">Orden de Pago</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;">TIPO DE AUTORIZACIÓN</td>
                <td style="border: 1px solid black; text-align: center;">No. DE AUTORIZACIÓN</td>
            </tr>
            <tr>
                 <td rowspan="5" style="text-align: justify;">
                    EN RELACIÓN A LA SOLICITUD PRESENTADA ANTE LA DIRECCIÓN DE CATASTRO, ADSCRITA A LA TESORERÍA MUNICIPAL, 
                    CON LA FINALIDAD DE OBTENER LA CLAVE CATASTRAL CERTIFICADA; PREVIO ANÁLISIS PRACTICADO PARA TAL EFECTO SE TIENE LO SIGUIENTE: DEBERÁ
                    PAGAR A LA TESORERÍA MUNICIPAL LOS DERECHOS CORRESPONDIENTES A LA PRESENTE CLAVE CATASTRAL CERTIFICADA POR LA CANTIDAD DE $ <?php echo $d11 . " " . $d19 ?>, DE CONFORMIDAD CON LO DISPUESTO EN EL ARTÍCULO 27 FRACCIÓN VIII DE LA LEY DE INGRESOS PARA
                    EL MUNICIPIO DE IRAPUATO GUANAJUATO, QUE ENTRÓ EN VIGOR A PARTIR DEL 1° DE ENERO DEL AÑO 2018
                    PARA EL EJERCICIO FISCAL AÑO 2018.
                   
                </td>
                <td style="text-align: center;"><?php echo $ID; ?></td>
            </tr>
              <tr>

                    <td style="border: 1px solid black; text-align: center;">N° SEGUIMIENTO</td>
              
                </tr>
                <tr>
                  
                    <td   style="text-align: center;">
                        <?php echo $no_control; ?>
                    </td>
                </tr>
            <tr>
             
                <td style="border: 1px solid black;">FECHA DE AUTORIZACIÓN</td>
            </tr>
            <tr>
                
                <td style="text-align: center;">
                    <?php echo date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); ?>
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
      <td><b></b></td>
      <td><b>CANTIDAD</b></td>
      <td><b></b></td>
      <td><b>COSTO</b></td>
      <td><b>TOTAL</b></td>
    </tr>
   
    <tr>
      <td>0310004 Clave Catastral Individual </td>
       <td></td>
      <td><?php echo  $cantidad;?></td>
       <td></td>
      <td style=" ">$<?php echo  $costo[0]->costo_base+  $costo[0]->costo_tram ;?></td>

      <td>$<?php echo  ($costo[0]->costo_base+  $costo[0]->costo_tram )*$cantidad;?></td>
    </tr>
  <tr>
      <td>03040210 Certificación De Clave Catastral</td>
       <td></td>
      <td><?php echo  $cantidad;?></td>
       <td></td>
      <td style=" ">$<?php echo  $costo[1]->costo_base+  $costo[1]->costo_tram ;?></td>

      <td>$<?php echo  ($costo[1]->costo_base+  $costo[1]->costo_tram )*$cantidad;?></td>
    </tr>
  <tr>
                <td colspan="5" style="text-align: left;">Ajuste Tarifario</td>
                <td colspan="" style=""><?php echo $ajuste; ?></td>
            </tr>
    <tr>
         <td colspan="4" style="text-align: right;"></td>
         <td colspan="" style=""><b>TOTAL :</b></td>
      <td colspan="" style=""><?php echo $d11;?></td>
    </tr>
  </table>
  <br><br>
  <table style="width:100%; floar:left;">
    <tr> <td style="border: 1px solid black; text-align: center;">INFORMACIÓN</td>
      <td style="border: 1px solid black; text-align: center;">PROPIETARIO/SOLICITANTE/RAZÓN SOCIAL</td>
      <td style="border: 1px solid black; text-align: center;">AUTORIZACIÓN</td>
    </tr>
    <tr>
                <td style="border: 1px solid black; text-align: center;">
                        <?php $costot =  $cantidad*($costo[0]->costo_base +  $costo[0]->costo_tram + $costo[1]->costo_base +  $costo[1]->costo_tram); ?>
                        <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo 'ID: '.$ID.' Solicitante: '.$nombrepropietariodg.' Costo: '.$costot; ?>&amp;chld=H|0">
                    </td>
      <td style="border: 1px solid black; text-align: center;"><?php echo $nombrepropietariodg;  ?>
        <br>
        MISMO QUE PAGARÁ A LA TESORERÍA MUNICIPAL DE IRAPUATO LA CANTIDAD DE $ <?php echo $d18;?>
        <br>
        <?php echo $d19;?>
        <br>
        (Cantidad con Letra)
      </td>
      <td style="border: 1px solid black; text-align: center;">
        <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo '' . base_url() . 'assets/nombramiento-catastro.PDF'; ?>&chld=H|0">
       
    </td>
    </tr>
    <tr>
      <td colspan="2">Si requiere factura tiene 48 hrs para su solicitud al correo electrónico facturacion@irapuato.gob.mx</td>
    </tr>
  </table>
  <table style="width:100%; floar:left;">
            <tr>
                <td style="width:50%; border: 1px solid black; text-align: center;">PARA USO EXCLUSIVO DEL BANCO</td>
                <td colspan="2"  style="width:50%; border: 1px solid black; text-align: center;">PARA USO EN BANCA ELECTRÓNICA</td>

            </tr>
            <tr>
                <td>Pago en ventanilla</td>
                <td>Pago en banca electrónica</td>
                <td rowspan="3" >
                    <img src="<?php echo base_url() . "assets/images/" ?>/codigoclavecosto.gif" alt="" width="80"><br>
                    <img src="<?php echo base_url() . "assets/images/" ?>/codigocertificacioncosto.gif" alt="" width="80">
                </td>
            </tr>
            <tr>
                <td>REF1:<?php echo $d12; ?></td>
                <td><?php echo $d15; ?></td>
            </tr>
            <tr>
                <td>REF2:<?php echo $d13; ?></td>
                <td>REFERENCIA BANCARIA: <?php echo $d16; ?></td>
            </tr>
            <tr>
                <td>REF3:<?php echo $d14; ?></td>
            </tr>

        </table>
  <table style="width:100%;">
    <tr>
      <td style="width:100%; text-align: right;">Página 1 de 1</td>
    </tr>
  </table>
  </body>
</html>
