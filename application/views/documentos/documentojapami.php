<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>JAPAMI</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <style type="text/css">
            table{
                font: 99.5% sans-serif;
            }
        </style>

        <script type="text/javascript">
            window.print();
        </script>
    </head>
    <header>
        <img src="<?php echo base_url(); ?>assets/images/logo4.PNG" width="30%">
        <img src="<?php echo base_url(); ?>assets/images/logo3.PNG" width="30%" align="right">
    </header>

    <body>
        <table style="width:100%;">
            <tr>
                <td  width="40%">
                    <img src="<?php echo base_url(); ?>assets/images/japami.PNG" width="30%">
                </td>
                <td  width="60%">
                    <h4>JUNTA DE AGUA POTABLE, DRENAJE, ALCANTARILLADO Y SANEAMIENTO DEL MUNICIPIO
                        DE IRAPUATO, Gto.</h4>
                </td>
            </tr>
        </table>
        <table style="width:100%; floar:left;">
            <tr>
                <td colspan="2" align="center">CONTRATO DE SERVICIOS</td>
            </tr>
            <tr>
                <td><b>Solicitud:</b><?php echo $solicitud; ?></td>
                <td align="right"><b>Número de Cuenta:</b><?php echo $cuentaligada; ?></td>
            </tr>
        </table>
        <br>

        <table style="width:100%; floar:left;">
            <tr style="border: 1px solid black;">
                <td style="border: 1px solid;" width="50%" align="center" colspan="2"><h4>Domicilio del predio contratado</h4></td>
                <td style="border: 1px solid;" width="50%" align="center" colspan="2"><h4>Titular de la Cuenta</h4></td>
            </tr>
            <tr>
                <td style="border: 1px solid;"><b>Calle</b></td>
                <td style="border: 1px solid;"><?php echo $calle; ?></td>
                <td style="border: 1px solid;"><b>Nombre</b></td>
                <td style="border: 1px solid;"><?php echo str_replace("%20", " ", $nombre); ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid;"><b>Número</b></td>
                <td style="border: 1px solid;"><?php echo $num; echo $num1 !=""?" Int ".$num1 : ""; ?></td>
                <td style="border: 1px solid;"><b>R.F.C</b></td>
                <td style="border: 1px solid;"><?php echo $rfc; ?></td>
            </tr>
            <tr>

                <td style="border: 1px solid;"><b>Email</b></td>
                <td style="border: 1px solid;"><?php
                    $correo = str_replace("%C3%B1", "@", $correo);
                    echo $correo;
                    ?></td>
            </tr>
            <tr>

                <td style="border: 1px solid;"><b>Teléfono</b></td>
                <td style="border: 1px solid;"><?php echo $telefono; ?></td>
            </tr>
            <tr>
                <td style="border: 1px solid;"><b>Colonia</b></td>
                <td style="border: 1px solid;"><?php
                    $colonia = str_replace("%C3%B3", "ó", $colonia);
                    $colonia = str_replace("%20", " ", $colonia);
                    echo $colonia;
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid;"><b>Teléfono</b></td>
                <td style="border: 1px solid;"><?php echo $telefono; ?> </td>
            </tr>
        </table>
        <br>
        <table style="width:100%;">
            <tr style="border: 1px solid black;">
                <td style="border: 1px solid;" width="10%" align="center"><h5>Clave</h5></td>
                <td style="border: 1px solid;" width="10%" align="center"><h5>Importe</h5></td>
                <td style="border: 1px solid;" width="40%" align="center"><h5>Concepto</h5></td>

                <td style="border: 1px solid;" width="20%" align="center"><h5>Giro o Actividad</h5></td>
                <td style="border: 1px solid;" width="10%" align="center"><h5>Tipo de Servicio</h5></td>
                <td style="border: 1px solid;" width="10%" align="center"><h5>Diámetro de la toma</h5></td>
            </tr>
            <tr>
                <?php if ($serviciossolicita == 1 || $serviciossolicita == 4  || $serviciossolicita == 5) { ?>
                    <td style="border: 1px solid;">00113<?php // XXX:            ?></td>
                    <td style="border: 1px solid;">$170.90<?php // XXX:           ?></td>
                    <td style="border: 1px solid;">Contrato de Servicio de Agua<?php // XXX:            ?></td>
                <?php } else { ?>
                    <td></td>
                    <td></td>
                    <td></td>
                <?php } ?>
                <td style="border: 1px solid;" rowspan="4">Casa Habitación<?php // XXX:            ?></td>
                <td style="border: 1px solid;"><?php echo $tiposer; ?></td>
                <td style="border: 1px solid;">1/2<?php // XXX:            ?></td>
            </tr>
            <tr>
                <?php if ($serviciossolicita == 2 || $serviciossolicita == 3 || $serviciossolicita == 5 || $serviciossolicita == 4 ) { ?>
                    <td style="border: 1px solid;">00116<?php // XXX:            ?></td>
                    <td style="border: 1px solid;">$170.90<?php // XXX:           ?></td>
                    <td style="border: 1px solid;">Contrato de Drenaje<?php // XXX:            ?></td>
                <?php } else { ?>
                    <td></td>
                    <td></td>
                    <td></td>
                <?php } ?>
                <td style="border: 1px solid;">Ruta<?php // XXX:            ?></td>
                <td style="border: 1px solid;">99<?php // XXX:            ?></td>
            </tr>

            <tr>
                <td style="border: 1px solid;">00006<?php // XXX:           ?></td>
                <td style="border: 1px solid;">
                    <?php
                    if ($serviciossolicita == 5 || $serviciossolicita == 4) {
                        echo "$54.68";
                    } else {
                        echo "$27.34";
                    }
                    ?>
                </td>
                <td style="border: 1px solid;">I.V.A.<?php // XXX:            ?></td>
                <td style="border: 1px solid;">Sector<?php // XXX:            ?></td>
                <td style="border: 1px solid;">999<?php // XXX:            ?></td>
            </tr>

            <tr>
                <td style="border: 1px solid;"><?php // XXX:            ?></td>
                <td style="border: 1px solid;"><?php // XXX:            ?></td>
                <td style="border: 1px solid;"><?php // XXX:            ?></td>

                <td style="border: 1px solid;">Colonia<?php // XXX:            ?></td>
                <td style="border: 1px solid;">9999<?php // XXX:            ?></td>
            </tr>

            <tr>
                <td style="border: 1px solid;">Total<?php // XXX:           ?></td>
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
            <br>
        </table>
        <br>
        <i>Los derechos son calculados en referencia a la Ley de Ingresos para el Municipio de Irapuato, Gto., 
            para el ejercicio fiscal del año actual.</i>
        <br>
        <br>
        <b>Observaciones</b>
        <table style="width:100%;">
            <tr style="border: 1px solid black;">
                <td style="border: 1px solid;" width="100%" align="justify">
                    No incluye conexiones, inicio de facturación <?php echo $iniciofacturacion; ?>.Solicitud<?php echo $solicitud; ?>. Cuota fija hasta contar con el aparato de medición.
                </td>
            </tr>
        </table>
        <br>
        <i>Irapuato, Guanajuato. A
            <?php
            /* $fechaactual = getdate(); echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
            $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

            $arrayDias = array('Domingo', 'Lunes', 'Martes',
                'Miércoles', 'Jueves', 'Viernes', 'Sábado');

            echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');
            ?>
        </i>
        <br>
        <table style="width:100%;" border="1">
            <tr style="border: 1px solid black;">
                <td width="10%" align="center" rowspan="2" ><label>Validación</label><img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=200x200&amp;chl=<?php echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y') . "\n Titular de la cuenta: " . $nombre . " \n\n Solicitud: " . $solicitud; ?> - JAPAMI&amp;chld=H|2"></td>
                <td width="40%" align="center">Nombre y firma del propietario y/o poseedor y/o representante legal.</td>
                <td width="40%" align="center">Gerente de comercialización de conformidad con el artículo 74 fracción II del reglamento de servicios de JAPAMI</td>

                <td width="10%" align="center" rowspan="2" ><label>Nombramiento</label><img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=210x210&amp;chl=<?php echo '' . base_url() . 'assets/nombramiento-japami.pdf'; ?>&amp;chld=H|2"></td>
            </tr>
            <tr style="border: 1px solid black;">
                <td style="border: 1px solid;">
                    <br><br><br><br>
                </td>
                <td style="border: 1px solid black;">
                    <br><br><br><br>
                </td>
            </tr>
        </table>

        <footer>
            <table width="100%" style="font-size:5px">
                <tr>
                    <td width="50%">JUNTA DE AGUA POTABLE, DRENAJE, ALCANTARILLADO
                        Y SANEAMIENTO DEL MUNICIPIO DE IRAPUATO, GTO.</td>
                    <td width="25%">
                        <img src="<?php echo base_url(); ?>assets/images/logo4.PNG" width="30%">
                    </td>
                    <td width="25%">
                        <img src="<?php echo base_url(); ?>assets/images/logo3.PNG" width="30%">
                    </td>
                </tr>
            </table>
            <table style="text-align:justify; font-size:0.80em;">
                <tr>
                    <td>
                        Contrato de prestación de servicios que celebran por una parte la Junta de Agua Potable, Drenaje. Alcantarillado y Saneamiento para el municipio de Irapuato Gto; representada en este acto por el Gerente de Comercialización para efectos del presente, de conformidad con la fracción II del artículo 74 del Reglamento de los Servicios de Agua Potable, Drenaje, Alcantarillado y Saneamiento para el Municipio de Irapuato Guanajuato a quien corresponda en lo sucesivo se denominará JAPAMI, por otra parte, la persona identificada en el reverso, a quien en lo sucesivo se le denominará EL USUARIO, PROPIETARIO Y/O POSEEDOR mismos que se sujetaran al tenor de las siguientes:
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>CLAÚSULAS</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>PRIMERA:</b>Que el presente tiene por objeto la contratación por parte del USUARIO, PROPIETARIO Y/O POSEEDOR con JAPAMI para la prestación de los servicios que se describen al reverso, acorde a los supuestos previstos por el reglamento de los servicios de Agua Potable, Drenaje, Alcantarillado y Saneamiento del Municipio de Irapuato, Gto. por lo que se celebrará el contrato respectivo con los costos establecidos para tal efecto en la Ley de Ingresos para el Municipio de Irapuato, Gto; para el ejercicio fiscal del año que corresponda.<br>
                        (Consulta el reglamento de JAPAMI en la página: www.japami.gob.mx)
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>SEGUNDA:</b> JAPAMI, se obliga a prestar al USUARIO, PROPIETARIO Y/O POSEEDOR los servicios descritos al reverso del presente, pudiendo ser con el giro de servicios doméstico y/o comercio anexo (mixto) y/o comercial y de servicios y/o industrial y/o públicos en predio cuya ubicación se estipula en este documento.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>TERCERA:</b>Que el costo del contrato, así como de los materiales necesarios para la instalación de los servicios contratados, será de acuerdo a lo establecido por la Ley de Ingresos para el Municipio de Irapuato, Gto.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>CUARTA:</b> El USUARIO, PROPIETARIO Y/O POSEEDOR se obliga a cubrir el importe de los materiales y gastos inherentes para la instalación del servicio contratado en el precio señalado en este contrato. Así mismo, el USUARIO, PROPIETARIO Y/O POSEEDOR se obliga a cubrir el costo por el servicio recibido por parte de JAPAMI, pagando mensualmente de manera oportuna de acuerdo a las tarifas vigentes publicadas en la Ley de Ingresos para el Municipio de Irapuato, Gto. <br><br>
                        La falta de pago en que se obliga EL USUARIO, PROPIETARIO Y/O POSEEDOR será motivo de suspensión o reducción de los servicios que brinda JAPAMI. En el caso de los usuarios domésticos, la JAPAMI indicará la fuente de abastecimiento para que se provea de líquido, corriendo a su cargo el traslado, para lo cual se le proporcionará un vale por el volumen del líquido para cubrir sus necesidades básicas.
                        <br><br>
                        Las partes acuerdan que los pagos realizados por EL USUARIO, PROPIETARIO Y/O POSEEDOR después de las fechas de vencimiento le causarán recargos, y en su caso cargos por concepto de gastos de ejecución, conforme a lo previsto por la Ley de Ingresos para el Municipio de Irapuato, Gto. para ejercicio fiscal del año que corresponda y la normativa aplicable.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>QUINTA:</b>EL USUARIO, PROPIETARIO Y/O POSEEDOR se obliga a pagar mensualmente a JAPAMI el importe por prestaciones de los servicios contratados en base a las tarifas vigentes.
                        <br>
                        <br>
                        JAPAMI por su parte se obliga a emitir y entregar en el predio contratado, el recibo informativo, correspondiente de manera mensual, el cual contendrá los datos específicos indicando la cantidad a pagar, el consumo en caso de servicio medido, el número de cuenta, periodo de consumo y el término de su vencimiento, de conformidad con el artículo 137 del reglamento de los servicios de Agua Potable, Drenaje, Alcantarillado y Saneamiento de Irapuato, Gto.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>SEXTA:</b> Para efectos de cuantificar los consumos efectuados: EL USUARIO, PROPIETARIO Y/O POSEEDOR se obliga a:
                        <br> <br>
                        a) Permitir la instalación de los aparatos de medición que correspondan, así como conservarlos en buen estado y evitar que sufran algún desperfecto, tal como lo establecen los artículos 318 319 y 320 de Código Territorial para el Estado y los Municipios de Guanajuato, en el entendido de que los daños y/o desperfectos ocasionados al medidor, serán cubiertos por EL USUARIO, PROPIETARIO Y/O POSEEDOR cuando esto sean imputables al mismo.<br>
                        <br>
                        b) Permitir cuando JAPAMI lo determine la sustitución o reposición de los aparatos de medición en los términos que sean procedentes.<br>
                        <br>
                        c) Reportar en término máximo de tres días hábiles a JAPAMI todos los desperfectos ocasionados al medidor.<br>
                        <br>
                        d) Permitir todas las verificaciones e inspecciones que requiere JAPAMI, según lo dispuesto por los artículos 335, 336 y 337 del Código Territorial para el Estado y los Municipios de Estado de Guanajuato y el Reglamento del Organismo Operador permitiendo el acceso únicamente al personal autorizado por JAPAMI en la horas y días hábiles, por lo que fuera de dicho supuesto no reconoce ninguna actividad realizada aún por los trabajadores del mismo.
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <b>DECIMA CUARTA:</b> El USUARIO, PROPIETARIO Y/0 POSEEDOR  en caso de traslación de domicilio del inmueble donde se contrataron los servicios, se obliga a notificar del mismo a JAPAMI.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>DECIMA QUINTA:</b>    EL USUARIO, PROPIETARIO Y/O POSEEDOR repondrá solidariamente para el pago de cuotas, rezagos, multas y en general cualquier crédito fiscal derivado de los servicios que presta JAPAMI, las personas que hayan contratado el servicio y/o la persona que incurra en alguna o algunas de las infracciones que señalan el reglamento de JAPAMI.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>DECIMA SEXTA:</b> Que para todo lo no previsto y expresamente pactado en este contrato las partes acuerdan someterse a lo dispuesto por el Código Civil y de Procedimientos Civiles para el Estado de Guanajuato, así como también se aplicará de manera supletoria lo dispuesto por el Código Territorial para el Estado y los Municipios de Guanajuato y el Reglamento de los Servicios de Agua Potable, Drenaje, Alcantarillado y Saneamiento para el Municipio de Irapuato, GTO.
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>DECIMA SEPTIMA:</b> Las partes convienen en que parte para la interpretación y cumplimiento que con motivo de presente se suscribe, se somenten desde ahora a la competencia de los tribunales civiles de la ciudad de Irapuato, Gto; renunciado a aquellos que pudieran corresponderlas en razón de futuros domicilios.
                    </td>
                </tr>
            </table>
        </footer>
    </body>
</html>
