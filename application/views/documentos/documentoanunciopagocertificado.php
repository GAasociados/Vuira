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
        <form action="<?php echo base_url(); ?>docstramites/documentoanuncio/documentofinalpagocertificado/<?php echo $ID; ?>" method="post">
            <input type="hidden" name="ID" value="<?php //echo $ID;      ?>">
            <table style="width:100%; floar:left;">
                <tr>
                    <td>
                        <img src="<?php echo base_url() . "assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
                    </td>
                </tr>
            </table>

            <table style="width:100%; floar:left;">
                <tr>
                    <td align="right">
                        <b>
                            <?php
                            /* $fechaactual = getdate(); //echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
                            $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                            $arrayDias = array('Domingo', 'Lunes', 'Martes',
                                'Miércoles', 'Jueves', 'Viernes', 'Sábado');

                            //echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y'); 
                            ?>
                        </b>
                    </td>
                </tr>
            </table>

             <table style="width:100%; floar:left;">
                <tr>
                    <td style="width:80%;"><?php // XXX:       ?></td>
                    <td style="width:20%;">Orden de Pago</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center;">TIPO DE AUTORIZACIÓN</td>
                    <td style="border: 1px solid black; text-align: center;">No. DE AUTORIZACIÓN</td>
                </tr>

                <tr>
                    <td rowspan="5" style="text-align: justify;">

                        EN RELACIÓN A LA SOLICITUD PRESENTADA ANTE LA DIRECCIÓN DE CATASTRO, ADSCRITA A LA TESORERÍA MUNICIPAL, 
                        CON LA FINALIDAD DE OBTENER LA CLAVE CATASTRAL CERTIFICADA; PREVIO ANÁLISIS PRACTICADO PARA TAL EFECTO SE TIENE LO SIGUIENTE: DEBERÁ
                        PAGAR A LA TESORERÍA MUNICIPAL LOS DERECHOS CORRESPONDIENTES A LA PRESENTE CLAVE CATASTRAL CERTIFICADA POR LA CANTIDAD DE $<?php echo number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2); ?>
                        (<span id="letras"></span>), DE CONFORMIDAD CON LO DISPUESTO EN EL ARTÍCULO 27 FRACCIÓN VIII DE LA LEY DE INGRESOS PARA 
                        EL MUNICIPIO DE IRAPUATO GUANAJUATO PUBLICADA EN EL PERIÓDICO OFICIAL DEL GOBIERNO DEL ESTADO DE GUANAJUATO, QUE ENTRÓ EN VIGOR A PARTIR DEL 1° DE ENERO DEL AÑO 2018
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

                    <td   style="text-align: center;">
                        <?php echo date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); ?>
                    </td>
                </tr>

                <tr>
                    <td style="border: 1px solid black; text-align: center;">DESCRIPCIÓN</td>
                    <td style="border: 1px solid black; text-align: center;">MONTO DE AUTORIZACIÓN</td>
                </tr>
            </table>

            <table style="width:100%; floar:center;">
                <tr>
                <tr>
                    <td>CONCEPTO</td>
                    <td></td>
                    <td>CANTIDAD</td>
                    <td>TARIFA</td>
                    <td>COSTO</td>
                    <td><b>TOTAL</b></td>
                </tr>
                </tr>
                <tr>
                    <td><input type="hidden" name="d1" value="Clave Catastral Individual">03110004 Clave Catastral Individual  </td>
                    <td><input type="hidden" name="d2" value="1"></td>
                    <td><input type="hidden" name="d3" value="1">1</td>
                    <td><input type="hidden" name="d4" value="$<?php echo $costo[0]->costo_base ?>">$<?php echo $costo[0]->costo_base ?></td>
                    <td><input type="hidden" name="d5" value="$<?php echo $costo[0]->costo_tram ?>">$<?php echo $costo[0]->costo_tram ?> </td>
                    <td><input type="hidden" name="" value="$<?php echo $costo[0]->costo_base + $costo[0]->costo_tram; ?>">$<?php echo $costo[0]->costo_base + $costo[0]->costo_tram; ?> </td>
                </tr>
                <tr>
                    <td><input type="hidden" name="dd1" value="Clave Catastral Individual"> 0310004 Certificación De Clave Catastral  </td>
                    <td><input type="hidden" name="dd2" value="1"></td>
                    <td><input type="hidden" name="dd3" value="1">1</td>
                    <td><input type="hidden" name="dd4" value=""></td>
                    <td><input type="hidden" name="dd5" value="$<?php echo $costo[1]->costo_tram ?>">$<?php echo $costo[1]->costo_tram ?> </td>
                    <td><input type="hidden" name="" value="$<?php echo $costo[1]->costo_base + $costo[1]->costo_tram; ?>">$<?php echo $costo[1]->costo_base + $costo[1]->costo_tram; ?> </td>
                </tr>
                <tr>
                    <td colspan="5" style="">Ajuste Tarifario</td>
                    <?php
                    $costo2 = $costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram;
                    $costo1 = $costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram;
                    $costo2 = round(floatval(number_format($costo2, 2)),0, PHP_ROUND_HALF_DOWN);
                    ?>
                    <td colspan="" style=""><input type="hidden" name="ajuste" value="$ <?php echo round($costo2 - $costo1, 2); ?>">$<?php echo round($costo2 - $costo1, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="5" style=""></td>
                    <td colspan="" style=""><input type="hidden" name="d11" value="$<?php echo number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2); ?> ">$<?php echo number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2); ?></td>
                </tr>
            </table>

            <table style="width:100%; floar:left;">
                <tr>
                    <td style="border: 1px solid black; text-align: center;">INFORMACIÓN</td>
                    <td style="border: 1px solid black; text-align: center;">PROPIETARIO/SOLICITANTE/RAZÓN SOCIAL</td>
                    <td style="border: 1px solid black; text-align: center;">AUTORIZACIÓN</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center;">
                        <?php $costot = number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2);
                        ?>
                        <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo 'ID: ' . $ID . ' Solicitante: ' . $nombrepropietariodg . ' Costo: $' . $costot; ?>&amp;chld=H|0">
                    </td>
                    <td style="border: 1px solid black; text-align: center;"><?php echo $nombrepropietariodg; ?>
                        <br>
                        MISMO QUE PAGARÁ A LA TESORERIA MUNICIPAL DE IRAPUATO LA CANTIDAD DE <input type="hidden" name="d18" value="$<?php echo number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2); ?>">$<?php echo number_format(round(floatval($costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram), 0, PHP_ROUND_HALF_DOWN), 2); ?>
                        <br>
                        <input type="hidden" name="d19"  id ="cantidad2" value="" size="50"><span id="cantidad3"></span>

                        <br>
                        (Cantidad con Letra)
                    </td>
                    <td style="border: 1px solid black; text-align: center;">
                         <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo '' . base_url() . 'assets/nombramiento-catastro.PDF'; ?>&amp;chld=H|0">
                        <br>


                    </td>
                </tr>
                <tr>
                    <td colspan="3">Si requiere factura tiene 48 hrs para su solicitud al correo electrónico facturacion@irapuato.gob.mx</td>
                </tr>
            </table>
            <table style="width:100%; floar:left;">
                <tr>
                    <td style="width:50%; border: 1px solid black; text-align: center;">PARA USO EXCLUSIVO DEL BANCO</td>
                    <td colspan="2" style="width:50%; border: 1px solid black; text-align: center;">PARA USO EN BANCA ELECTRÓNICA</td>

                </tr>
                <tr>
                    <td>Pago en ventanilla</td>
                    <td>Pago en banca electrónica</td>
                    <td rowspan="3" style="width:100%; text-align: center;">
                        <img src="<?php echo base_url() . "assets/images/" ?>/codigoclavecosto.gif" alt="" width="80"><br>
                        <img src="<?php echo base_url() . "assets/images/" ?>/codigocertificacioncosto.gif" alt="" width="80">
                    </td>
                </tr>
                <tr>
                    <td>REF1: <?php echo $nombrepropietariodg; ?><input type="hidden" name="d12" value="<?php echo $nombrepropietariodg; ?>"></td>
                    <td>CLAVE:030222900012857979<input type="HIDDEN" name="d15" value="CLAVE: 030222900012857979"></td>
                </tr>
                <tr>
                    <td>REF2: Clave Catastral<input type="hidden" name="d13" value="Clave Catastral"></td>
                    <td>REFERENCIA BANCARIA</td>
                </tr>
                <tr>
                    <td>REF3: 0011711100<?php echo $ID?><input type="hidden" name="d14" value="0011711100<?php echo $ID?>"></td>
                    <td>0011711100<?php echo $ID?><input type="hidden" name="d16" value="0011711100<?php echo $ID?>"></td>
                </tr>
            </table>
            <input type="submit" value="Generar Documento">
        </form>
        <script src="<?php echo base_url(); ?>assets/js/numetosletras.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
<?php
$costo = $costo[0]->costo_base + $costo[0]->costo_tram + $costo[1]->costo_base + $costo[1]->costo_tram;
$costo = round(floatval(number_format($costo, 2)), 0, PHP_ROUND_HALF_DOWN);
?>
            $("#cantidad2").val("(" + covertirNumLetras("<?php echo number_format($costo, 2); ?>") + ")");
            $("#letras").html("" + covertirNumLetras("<?php
echo number_format($costo, 2);
;
?>"));
            $("#cantidad").html("" + covertirNumLetras("<?php echo number_format($costo, 2); ?>"));
            $("#cantidad3").html("" + covertirNumLetras("<?php
echo number_format($costo, 2);
;
?>"));

        </script>
    </body>
</html>
