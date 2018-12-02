<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Documento Pago JAPAMI</title>
        <style type="text/css">
            table{
                font: 88.5% sans-serif;
            }
        </style>
    </head>
    <header>
    </header>
    <body>
        <input type="hidden" name="ID" value="<?php ////echo $ID;  ?>">
        <table style="width:100%; floar:left;">
            <tr>
                <td style="width:50%;">
                    <img src="<?php echo base_url(); ?>assets/images/japami.PNG" width="25%">
                </td>
                <td style="width:50%;" align="right">

                </td>
            </tr>
        </table>

        <table style="width:100%; floar:left;">
            <tr>
                <td align="right">
                    <b>
                        <?php
                        /* $fechaactual = getdate(); ////echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
                        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                        $arrayDias = array('Domingo', 'Lunes', 'Martes',
                            'Miércoles', 'Jueves', 'Viernes', 'Sábado');

                        ////echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y'); 
                        ?>
                    </b>
                </td>
            </tr>
        </table>

        <table style="width:100%; floar:left;">
            <tr>
                <td style="width:80%; text-align: center;"><h4>Contrato de Servicios JAPAMI</h4></td>
                <td style="width:20%; text-align: center;">Orden de Pago</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;">TIPO DE AUTORIZACIÓN</td>
                <td style="border: 1px solid black; text-align: center;">No. DE AUTORIZACIÓN</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;"><?php echo $ID; ?></td>
            </tr>
            <tr>
                <td>Contrato de Servicio de Agua Domestico</td>
                <td style="border: 1px solid black;">FECHA DE AUTORIZACIÓN</td>
            </tr>
            <tr>
                <td style="text-align: justify;">
                    EN RELACIÓN A LA SOLICITUD PRESENTADA EN EL PORTAL VENTANILLA ÚNICA IRAPUATO CON LA FINALIDAD DE REALIZAR EL CONTRATO DE LOS SERVICIOS DE AGUA POTABLE Y DRENAJE POR PARTE DEL USUARIO, PROPIETARIO Y/O POSEEDOR CON LA JAPAMI, ACORDE A LOS SUPUESTOS PREVISTOS POR EL REGLAMENTO DE LOS SERVICIOS DE AGUA POTABLE, DRENAJE, ALCANTARILLADO Y SANEAMIENTO DEL MUNICIPIO DE IRAPUATO, GTO., DEBERÁ PAGAR A LA JAPAMI LOS COSTOS RELATIVOS A LAS CONTRATACIÓN SIENDO:	<?php
                    if ($serviciossolicita == 3) {
                        echo "$396.40 Trescientos Noventa y Seis Pesos 40/100 M.N.";
                    } else {
                        echo "$198.24 Ciento Noventa y Ocho Pesos 24/100 M.N.";
                    }
                    ?>
                    DE CONFORMIDAD CON LOS COSTOS ESTABLECIDOS PARA TAL EFECTO EN EL ARTÍCULO 14 DE LA LEY DE INGRESOS PARA EL MUNICIPIO DE IRAPUATO, GTO., PARA EL EJERCICIO FISCAL DEL AÑO QUE CORRESPONDA. 
                    <br><br>
                </td>
                <td style="text-align: center;">
<?php echo date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    Número de contrato: <?php echo $contrato; ?>
                </td>

            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;">DESCRIPCIÓN</td>
                <td style="border: 1px solid black; text-align: center;">SELLO DE AUTORIZACIÓN</td>
            </tr>
        </table>

        <table style="width:80%; floar:left;">
            <tr>
                <td><b>CLAVE</b></td>
                <td><b>IMPORTE</b></td>
                <td><b>CONCEPTO </b></td>
                <td><b></b></td>
                <td><b></b></td>
                <td><b></b></td>
            </tr>
   <tr>
                <?php if ($serviciossolicita == 1 || $serviciossolicita == 4  || $serviciossolicita == 5) { ?>
                    <td style="border: 1px solid;">00113</td>
                    <td style="border: 1px solid;">$170.90</td>
                    <td style="border: 1px solid;">Contrato de Servicio de Agua</td>
                <?php } else { ?>
                    <td></td>
                    <td></td>

                <?php } ?>
            </tr>

            <tr>
                <?php if ($serviciossolicita == 2 || $serviciossolicita == 3 || $serviciossolicita == 5 || $serviciossolicita == 4 ) { ?>
                    <td style="border: 1px solid;">00116</td>
                    <td style="border: 1px solid;">$170.90</td>
                    <td style="border: 1px solid;">Contrato de Drenaje</td>
                <?php } else { ?>
                    <td></td>
                    <td></td>
                    <td></td>
<?php } ?>

            </tr>

            <tr>
                <td style="border: 1px solid;">00006</td>
                <td style="border: 1px solid;">
                    <?php
                    if ($serviciossolicita == 5 || $serviciossolicita == 4) {
                        echo "$54.68";
                    } else {
                        echo "$27.34";
                    }
                    ?>
                </td>
                <td style="border: 1px solid;">IVA</td>
            </tr>
            <tr>
                <td style="border: 1px solid;"><b>Total</b></td>
                <td style="border: 1px solid;">
<?php
if ($serviciossolicita == 5 || $serviciossolicita == 4) {
    echo "$396.40";
} else {
    echo "$198.24";
}
?>

                </td>
            </tr>

            <tr>
                <td colspan="6" style="text-align: right;"><?php //echo $d11; ?></td>
            </tr>
        </table>

        <table style="width:100%; floar:left;">
            <tr>
                <td style="border: 1px solid black; text-align: center;">PROPIETARIO/SOLICITANTE/RAZÓN SOCIAL</td>
                <td style="border: 1px solid black; text-align: center;">AUTORIZACIÓN</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; text-align: center;">Propietario: <?php echo $nombrepropietariodg; ?>
                    <br>

<?php
if ($serviciossolicita == 5 || $serviciossolicita == 4) {
    echo "$396.40 Trescientos Noventa y Seis Pesos 40/100 M.N.";
} else {
    echo "$198.24 Ciento Noventa y Ocho Pesos 24/100 M.N.";
}
?>

                    <br>
                    RFC: <?php echo $rfc; ?>

                    <!-- (Cantidad con Letra) -->
                </td>
                <td style="border: 1px solid black; text-align: center;">
                    <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=210x210&amp;chl=<?php echo '' . base_url() . 'assets/nombramiento-japami.pdf'; ?>&amp;chld=H|2">
                    <br>
                    Lic. José Refugio Olvera Magallanes
                    <br>
                    Gerente Comercial
                </td>
            </tr>
            <tr>
                <td colspan="2">Su Factura podrá ser descargada entrando al portal www.japami.gob.mx</td>
            </tr>
        </table>
        <table style="width:100%; floar:left;">
            <tr>
                <td style="width:50%; border: 1px solid black; text-align: center;">PARA USO EXCLUSIVO DEL BANCO</td>
                <td style="width:50%; border: 1px solid black; text-align: center;">PARA USO EN BANCA ELECTRÓNICA</td>
            </tr>
            <tr>
                <td>Pago en ventanilla</td>
                <td>Pago banca en electrónica</td>
            </tr>
            <tr>
                <td>REF1: XXXXXXXXXXX<?php //echo $d12; ?></td>
                <td><?php //echo $d15; ?></td>
            </tr>
            <tr>
                <td>REF2: XXXXXXXXXXX<?php //echo $d13; ?></td>
                <td>REFERENCIA BANCARIA: XXXXXXXXXXX<?php //echo $d16; ?></td>
            </tr>
            <tr>
                <td>REF3: XXXXXXXXXXX<?php //echo $d14; ?></td>
            </tr>
        </table>
        <table style="width:100%;">
            <tr>
                <td style="width:100%; text-align: right;">Página 1 de 1</td>
            </tr>
        </table>
    </body>
</html>
