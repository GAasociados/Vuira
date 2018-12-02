<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Permiso de Anuncios Auto soportados
        </title>
        <style type="text/css">
            table{
                font: 88.5% sans-serif;
            }
        </style>
        <?php
        $pagar = explode(',', $total_pago);

        //$pagos variable para formato Float
        $pagos = "";
        foreach ($pagar as $pa) {
            $pagos = $pagos . $pa;
        }
        ?>
    </head>
    <header>
    </header>
    <body>
        <input type="hidden" name="ID" value="<?php //echo $ID;     ?>">
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
                <td colspan="2" style="width:100%; text-align: center;"><h4>
                        DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL
                    </h4>
                    <h4>
                        Permiso de Anuncios
                    </h4>
                </td>


            </tr>
            <tr>
                <td style="width:80%; text-align: center;"></td>
                <td style="width:20%; text-align: center;">Orden de Pago</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;">TIPO DE AUTORIZACIÓN</td>
                <td style="border: 1px solid black; text-align: center;">No. DE AUTORIZACIÓN</td>
            </tr>
            <tr>
                <td rowspan="3" style="text-align: justify; font-size: 12px; ">
                    EN RELACIÓN A LA SOLICITUD PRESENTADA ANTE LA DIRECCIÓN DE ADMINISTRACIÓN URBANA, ADSCRITA A LA DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL, CON LA FINALIDAD DE 
                    OBTENER EL PERMISO DE ANUNCIOS AUTOSOPORTADOS; PREVIO ANÁLISIS PRACTICADO PARA TAL EFECTO SE TIENE LO SIGUIENTE: POR ÚLTIMO, DEBERÁ PAGAR A LA TESORERÍA MUNICIPAL 
                    LOS DERECHOS CORRESPONDIENTES AL PRESENTE PERMISO DE ANUNCIOS AUTOSOPORTADOS POR LA CANTIDAD DE $<?php echo number_format(round($pagos), 2) ?>  <?php echo $d19; ?>, DE CONFORMIDAD 
                    CON LO DISPUESTO EN EL ARTÍCULO 29 FRACCIÓN I DE LA LEY DE INGRESOS PARA EL MUNICIPIO DE IRAPUATO GUANAJUATO, DE FECHA 14 DE DICIEMBRE DEL AÑO 2017; MISMAS QUE ENTRARON EN VIGOR A PARTIR DEL 1° DE ENERO DEL AÑO <?php echo date('Y'); ?> PARA 
                    EL EJERCICIO FISCAL AÑO <?php echo date('Y'); ?>. 
                    <br><br>
                </td>
                <td style="text-align: center;"><?php echo $ID; ?></td>
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
                <td><b>TARIFA</b></td>
                <td><b>COSTO</b></td>

            </tr>

            <?php
            if ($d50):
                $detal = trim($d50, '^');
                ?>

                <?php $detalles = explode("^", $detal) ?>
                <?php foreach ($detalles as $an): ?>
                    <tr>
                        <?php $aux = explode('&', $an) ?>

                        <td><?php echo $aux[0]; ?></td>
                        <td></td>
                        <td><?php echo $aux[1]; ?></td>
                        <td>$<?php echo $aux[2]; ?></td>
                        <td>$<?php echo $aux[3]; ?></td>

                    </tr>
                    <?php
                endforeach;
            endif;
            ?>
            <tr>
                <td>Ajuste Tarifario</td>
                <td>  </td>
                <td>  </td>
                <td  colspan=""></td>
                <td colspan=""  >$<?php
                    $v = $pagos;
                    $v2 = number_format(round($v), 2);
                    $v2 = explode(',', $v2);

                    //$pagos variable para formato Float
                    $pagos1 = "";
                    foreach ($v2 as $pa) {
                        $pagos1 = $pagos1 . $pa;
                    }
                    echo number_format($pagos1 - $v, 2);
                    ?></td>
            </tr>
            <tr>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td  colspan=""><b>TOTAL :</b></td>
                <td colspan="" >$<?php echo number_format(round($pagos), 2) ?> </td>
            </tr>
        </table>
        <br><br>
        <table style="width:100%; floar:left;">
            <tr>
                <td style="border: 1px solid black; text-align: center;">PROPIETARIO/SOLICITANTE/RAZÓN SOCIAL</td>
                <td style="border: 1px solid black; text-align: center;">AUTORIZACIÓN</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;"><?php echo strtoupper($nombrepropietariodg); ?>
                    <br>
                    MISMO QUE PAGARÁ A LA TESORERIA MUNICIPAL DE IRAPUATO LA CANTIDAD DE $<?php echo number_format(round($pagos), 2) ?> 
                    <br>
                    <?php echo $d19; ?>
                    <br>
                    (CANTIDAD CON LETRA)
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo '' . base_url() . '/assets/nombramiento-desarrolloterritorial.pdf'; ?>&amp;chld=H|0">
                    <br>
                    Arq. Catalina Razo Rosales
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
                <td>Transferencia Electronica</td>
            </tr>
            <tr>
                <td>REF1: <?php echo strtoupper($nombrepropietariodg); ?></td>
                <td>CLAVE: 030222900012857979</td>
            </tr>
            <tr>
                <td>REF2: Permiso de Anuncios Autosoportados</td>
                <td>REFERENCIA BANCARIA: <?php echo $d16; ?></td>
            </tr>
            <tr>
                <td>REF3: 00011711100<?php echo $ID; ?></td>
                <td>00011711100<?php echo $ID; ?></td>
            </tr>
            <tr>
                <td>Cuenta: Ingresos 2018</td>
                <td>Cuenta: Ingresos 2018</td>
            </tr>
            <tr>
                <td>Num Cuenta: 205322550101</td>
                <td></td>
            </tr>
        </table>

    </body>
</html>
