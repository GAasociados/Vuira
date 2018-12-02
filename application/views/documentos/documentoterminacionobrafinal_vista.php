<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Desarrollo Territorial</title>  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <style type="text/css">
            table{
                font: 92.0% sans-serif;
            }
        </style>
    </head>

    <body>
        <form action="<?php echo base_url(); ?>docstramites/documentoconstruccion/documentofinal" method="post">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <table style="width:100%; floar:left;">
                <tr>
                    <td>
                        <img src="<?php echo base_url() . "assets/images/"; ?>iniciodesarrollo.png" alt="" width="100%">
                    </td>
                </tr>
            </table>
            <table style="width:100%; floar:left;">
                <tr>
                    <td align="right">
                        <b>
                            Dirección de Administración Urbana
                            <br>
                            <?php echo $d1 . date('Y'); ?> <input type="hidden" name="nodoc" value="<?php echo $d1 . date('Y'); ?>">
                            <br>
                            Autorizacion para uso y ocupación de la construcción
                            <br>
                            Irapuato, Guanajuato; a <?php
                            /* $fechaactual = getdate(); echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
                            $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                            $arrayDias = array('Domingo', 'Lunes', 'Martes',
                                'Miércoles', 'Jueves', 'Viernes', 'Sabado');

                            echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');
                            ?>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>
                            <?php echo $nombrepropietariodg; ?>
                        </b>
                        <br>
                        <?php echo "Calle " . $calledg . " # " . $numerodg; ?>
                        <br>
                        <?php echo $arraycolonia->NOMBRE; ?>
                        <br>
                        <b>
                            P r e s e n t e
                        </b>
                    </td>
                </tr>
                <tr>
                    <td align="justify">
                        <br>
                        En base al Aviso de Terminación de Obra recibió en la Dirección General de Desarrollo Territorial, y de conformidad con lo establecido en los artículos 379, 380 y 381 del Código Territorial para el Estado y los Municipios de Guanajuato, publicado en el Periódico Oficial del Estado de Guanajuato número 154 Segunda Parte de fecha 25 de Septiembre del 2012; así como los artículos 5 fracción II, 11 fracción I, 37, 38, 39, 40 y 93 del Reglamento de Construcción para el Municipio de Irapuato, Guanajuato, publicado en el Periódico Oficial del Estado de Guanajuato número 38 Segunda Parte de fecha 07 de Marzo del 2014; se realizó la inspección final correspondiente para verificar el cumplimiento de lo señalado en la Tabla de Requisitos para la Gestión de Acciones Urbanísticas, comparando lo ejecutado con los planos de proyecto que sirvieron de base para otorgar del Permiso de Construcción con las características que se detallan a continuación:
                        <br>
                        <br>
                        <b>Datos del Inmueble</b>
                    </td>
                </tr>
            </table>

            <table style="width:100%; floar:left;">
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Antecedentes</td>
                    <td colspan="3" style="border: 1px solid black;">

                        <?php echo $d2; ?>
                        <input name="permiso" value="<?php echo $d2; ?>" type="hidden">
                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td rowspan="2" style="border: 1px solid black;">Ubicación</td>
                    <td colspan="3" style="border: 1px solid black;">
                        <?php echo $d3; ?>
                        <input name="ubicacion" value="<?php echo $d3; ?>" type="hidden">
                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Lote: <?php echo $nodeloteui; ?></td>
                    <td style="border: 1px solid black;">Manzana:<?php echo $manzanaui; ?></td>
                    <td style="border: 1px solid black;">Superficie total del predio: <?php echo $superficiepredioui; ?> m²</td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">PMDUOET:</td>
                    <td style="border: 1px solid black;"><?php echo $d4; ?>
                        <input name="pmd" value="<?php echo $d4; ?>" type="hidden">
                    </td>
                    <td style="border: 1px solid black;" colspan="2">UGAT:<?php echo $d5; ?>
                        <input name="ugat" value="<?php echo $d5; ?>" type="hidden"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Uso:</td>
                    <td style="border: 1px solid black;"><?php echo $d6; ?>
                        <input name="uso" value="<?php echo $d6; ?>" type="hidden"></td>
                    </td>
                    <td style="border: 1px solid black;" colspan="2">Clave Catastral: <?php echo $d7; ?>
                        <input name="clave" value="<?php echo $d7; ?>" type="hidden"></td>
                </tr>
            </table>

            <table>
                <tr>
                <br>
                <td><br><br><br><br><b>Datos de la Construcción</b></td>
                </tr>
            </table>
            <table style="border: 1px solid black;" width="100%">
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Destino</td>
                    <td colspan="2" style="border: 1px solid black;"><b><?php echo $d8; ?></b>
                        <input name="destino" value="<?php echo $d8; ?>" type="hidden"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Superficie Autorizada</td>
                    <td style="border: 1px solid black;"><?php echo $d9; ?>
                        <input name="superfice" value="<?php echo $d9; ?>" type="hidden">
                    </td>
                    <td style="border: 1px solid black;"><b>Superficie Total Construida <?php echo $superficieconstruidaui; ?> m²</b></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Niveles Existentes</td>
                    <td colspan="2" style="border: 1px solid black;"><?php echo $d10; ?>
                        <input name="nivel" value="<?php echo $d10; ?>" type="hidden"></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Perito:</td>
                    <td style="border: 1px solid black;"><?php echo $arrayperito[0]->nombre; ?></td>
                    <td style="border: 1px solid black;">No. <?php echo $arrayperito[0]->numperito; ?></td>
                </tr>
                <tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Perito Especializado:</td>
                    <td style="border: 1px solid black;"><?php echo $arrayperitoesp[0]->nombre; ?></td>
                    <td style="border: 1px solid black;"><?php echo $arrayperitoesp[0]->numregistro; ?></td>
                </tr>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="80%">
                        <br>
                        <br>
                        <b>
                            DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
                            <br>
                            DIRECCIÓN DE ADMINISTRACIÓN URBANA
                        </b>
                        <hr>
                        Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
                        <br>
                        Tel. 01 (462) 635 88 00 ext. 3204
                        <br>
                        Irapuato, Gto. México
                    </td>
                    <td width="20%" align="right">
                        Hoja 1 de 2
                    </td>
                </tr>
            </table>
            <br>


            <table style="width:100%; floar:left;">
                <tr>
                    <td>
                        <img src="<?php echo base_url() . "assets/images/"; ?>iniciodesarrollo.png" alt="" width="100%">
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="3" align="justify">

                        En atención a su partido arquitectónico, características constructivas, requerimientos funcionales, ambientales y técnicos el permiso autorizado sobre el inmueble en cuestión cumple con los requerimientos mínimos para:
                    </td>
                </tr>
                <tr>
                    <td align="center"><u><b>CASA HABITACIÓN UNIFAMILIAR EXCLUSIVAMENTE</b></u></td>
                </tr>
                <tr>
                    <td align="justify">
                        <br>
                        1. Cualquier reestructuración, modificación o ampliación posterior deberá solicitar previamente el permiso respectivo.
                        <br>
                        2. A partir de la fecha de expedición de la presente, el propietario se constituye como responsable de la operación y mantenimiento de la edificación a fin de satisfacer sus condiciones de seguridad e higiene.
                        <br>
                        3. Deberá respetar el <b>área para cochera según proyecto</b>, por lo que se autorizará construcción y/o cambio de uso de dicha área, en caso contrario quedará sujeto a lo establecido en los artículos 152 fracción II Inciso d), 157 fracción X y 158 del Reglamento de Construcción para el Municipio de Irapuato, Guanajuato.
                        <br>
                        4. El presente no constituye constancia de apeo y deslinde respecto al inmueble, ni acredita la propiedad o posesión del mismo a favor de solicitante.
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><b>Derechos de Expedición</b></td>
                </tr>
            </table>

            <table width="100%">
                <tr style="border: 1px solid black;">
                    <th>Concepto</th>
                    <th>Uso</th>
                    <th>Expedición</th>
                </tr>

                <?php
                $concepto = trim($concepto, '#');
                $aux = explode('#', $concepto);
                foreach ($aux as $columna):
                    $aux1 = explode('&', $columna);
                    ?>
                    <tr style="border: 1px solid black;">
                        <td align="center"><?php echo $aux1[1]; ?></td>
                        <td align="center"><?php echo $aux1[2]; ?></td>
                        <td align="center">$<?php echo $aux1[4]; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr style="border: 1px solid black;">
                    <td align="right" colspan="2"><b>Total</b></td>
                    <td align="center">$<?php echo $total_pago; ?></td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td align="justify">
                        Por último, deberá pagar a la tesorería municipal los derechos correspondientes del presente, de conformidad con lo dispuesto en el artículo 26 de la Ley de Ingresos para el Municipio de Irapuato Guanajuato publicada en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 205 sexta parte, de fecha 23 de diciembre del año 2016; mismas que entraron en vigor a partir del 1° de enero del año 2017 para el ejercicio fiscal año 2017.
                        <br>
                        <b>
                            Lo anterior con fundamento en el artículo 90 fracción I, II, III, IV, y VII del Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 73 Segunda Parte de fecha 06 de mayo del 2016.
                        </b>
                        <br>
                        Sin más por el momento, quedo de Usted.
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        A t e n t a m e n t e
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b></b>
                        <br>
                        Director General de Desarrollo Territorial
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <?php
                    $nombre = $nombrepropietariodg;
                    ?>
                    <td align=""><img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=140x140&amp;chl=<?php echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y') . " -Propietario: " . $nombre; ?> -Dirección de Desarrollo Territorial (Autorizació para el uso y ocupación de la construcción)&amp;chld=H|0"></td>
                    <td>
                        Con copia para.-
                        <br>
                        - Archivo Minutario;<?php echo $d15; ?>
                        <input name="maninuta" value="<?php echo $d15; ?>" type="hidden">
                        <br>
                        - Se Integra con
                        <br>
                        Revisó: <?php echo $d16; ?>
                        <input name="reviso" value="<?php echo $d16; ?>" type="hidden">
                        <br>
                        Elaboró: <?php echo $d17; ?>
                        <input name="elaboro" value="<?php echo $d17; ?>" type="hidden">
                        <br>
                        ZONA
                    </td>
                    <?php
                    $nombre = $nombrepropietariodg;
                    ?>
                    <td align="right"><img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo '' . base_url() . '/assets/nombramiento-desarrolloterritorial.pdf'; ?>&amp;chld=H|0"></td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td width="80%">
                        <br>
                        <br>
                        <b>
                            DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL /
                            <br>
                            DIRECCIÓN DE ADMINISTRACIÓN URBANA
                        </b>
                        <hr>
                        Desarrollo Siglo XXI, Blvd. Solidaridad 8350, Col. Lázaro Cárdenas, C.P. 36540
                        <br>
                        Tel. 01 (462) 635 88 00 ext. 3204
                        <br>
                        Irapuato, Gto. México
                    </td>
                    <td width="20%" align="right">
                        Hoja 2 de 2
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="80%">
                        <button type="submit"> Generar PDF</button>

                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
