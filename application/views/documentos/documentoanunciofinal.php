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

        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
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
                        Dirección de Administración Urbana
                        <br>
                        DGDT/DUA/DP/01/32366/<?php echo date('Y');?>
                        <br>
                        PERMISO DE ANUNCIOS
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
                        <?php echo $u1; ?>
                        <br>
                        <?php echo $representante; ?>
                    </b>
                    <br>
                    <?php echo $u2; ?>
                    <br>
                    <?php echo $u3; ?>
                    <br>
                    <b>
                        P r e s e n t e
                    </b>
                </td>
            </tr>
            <tr>
                <td align="justify">
                    <br>
                    Habiendo acreditado el cumplimiento de lo establecido con el artículo 92 fracciones IV, VI, VII, IX, XI, XV y XVII del Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 73 Segunda Parte de fecha 6 de Mayo del 2016; los artículos 2 fracción III, 269, 270, 271, 272, 273, 274, 275 y 276 del Código Territorial para el Estado y los Municipios de Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 154 Segunda Parte de fecha 25 de septiembre del año 2012; así como los artículos 2 fracciones XII, XIX, XXV y XXX, 5 fracción II y VII, 6 fracción I y II, 7 fracción I, 11 fracción I, 21 fracción XIV y 25 del Reglamento de Construcción para el Municipio de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato número 38 Segunda Parte de fecha 07 de Marzo del 2014; además de las Normas Complementarias de “Presentación de los Proyectos Ejecutivos para el Proyecto Arquitectónico de Seguridad y Medidas de Protección durante el Proceso Constructivo, para Anuncios y para la Participación de Peritos Corresponsables” del Municipio de Irapuato, Guanajuato, publicadas en el Periódico Oficial del Gobierno del Estado de Guanajuato número 160 Tercera Parte de fecha 06 de Octubre del 2006; se expide el presente Permiso de Anuncios con las características que se detallan a continuación:
                    <br>
                    <br>
                    <b>Datos del Inmueble</b>
                </td>
            </tr>
        </table>

        <table style="width:100%; floar:left; border: 1px solid black;">
            <tr style="border: 1px solid black;">
                <td style="border: 1px solid black;">
                    Antecedentes
                </td>
                <td colspan="3" style="border: 1px solid black;">
                    <?php if ($d2) { ?>
                        <?php foreach ($d2 as $ant) { ?>
                            <b><?php echo $ant['nombre']; ?></b><br>
                            <?php echo $ant['comentarios']; ?>
                            <br>

                            <?php } ?> 
                            <?php
                        } else {
                            for ($i = 0; $i < 18; $i++) {
                                echo"<br>";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">
                        Ubicación: <?php echo $op1; ?>
                    </td>
                    <td colspan="3" style="border: 1px solid black;">
    <?php echo $u4; ?>
                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">PMDUOET</td>
                    <td style="border: 1px solid black;"><?php echo $d10; ?></td>
                    <td style="border: 1px solid black;">UGAT <?php echo $d11; ?></td>
                    <td style="border: 1px solid black;">Superficie del Predio: <?php echo $u5; ?> m²</td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Uso:</td>
                    <td style="border: 1px solid black;"><?php echo $d12; ?></td>
                    <td style="border: 1px solid black;" colspan="2">Clave Catastral: <?php echo $d13; ?></td>
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
                        Hoja 1 de 3
                    </td>
                </tr>
            </table>

            <table style="width:100%; floar:left;">
                <tr>
                    <td>
                        <img src="<?php echo base_url() . "assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>
                        <br><br><br><b>DATOS DEL ANUNCIO</b>
                    </td>
                </tr>
            </table>

            <table style="border: 1px solid black;" width="100%">
                <tr style="border: 1px solid black;">
                    <td rowspan="4" style="border: 1px solid black;">
                        Clasificación de los Anuncios
                    </td>
                    <td style="border: 1px solid black;">Pos su duración:</td>
                    <td style="border: 1px solid black;">
    <?php echo $d14; ?>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">Pos su contenido:</td>
                    <td style="border: 1px solid black;">
    <?php echo $d15; ?>
                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Características de Montaje: </td>
                    <td style="border: 1px solid black;">
    <?php echo $d16; ?>

                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Constitución:</td>
                    <td style="border: 1px solid black;">
    <?php echo $d18; ?>
                    </td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td rowspan="6" style="border: 1px solid black;">Datos del Anuncio</td>
                    <td style="border: 1px solid black;">Altura máxima de la Estructura (Poste):</td>
                    <td style="border: 1px solid black;"><?php echo $d19; ?></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Número de las Carteleras:</td>
                    <td style="border: 1px solid black;"><?php echo $d20; ?></td>
                </tr>

                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Dimensiones de las Carteleras:</td>
                    <td style="border: 1px solid black;"><?php echo $d21; ?></td>
                </tr>

                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Referente a:</td>
                    <td style="border: 1px solid black;"><?php echo $d22; ?></td>
                </tr>

                <tr style="border: 1px solid black;">
                    <td colspan="2" style="border: 1px solid black;">
                        Póliza: <?php echo $d23; ?>
                    </td>
                </tr>

                <tr style="border: 1px solid black;">
                    <td colspan="2"  style="border: 1px solid black;">
                        <p style=" height: 350px;">
                            <b>Anuncios Denotativos</b> <br>
                            <?php if ($d24) { ?>
                                <?php foreach ($d24 as $an): ?>
                                    <?php echo $an['descripcion']; ?> <?php echo $an['medidas'] . "x" . $an['cantidad'] . " = " . $an['total'] . "m2" ?><br>
                                <?php endforeach; ?>

                            <?php } ?>
                            <?php if ($d50) { ?>
                                <?php foreach ($d50 as $an): ?>
                                    <?php echo $an['descripcion']; ?> <?php echo $an['medidas'] . "x" . $an['cantidad'] . " = " . $an['total'] . "m2" ?><br>
                                <?php endforeach; ?>
                            <?php }
                            ?>
                            <?php if (!$d50) { ?>
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    echo "<br>";
                                }
                            }
                            ?>
                            <?php if (!$d50) { ?>
                                <?php
                                for ($i = 0; $i < 5; $i++) {
                                    echo "<br>";
                                }
                            }
                            ?>

                    </td>
                </tr>

                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Vigencia</td>
                    <td colspan="2" style="border: 1px solid black;"><?php echo "365 días al ". $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de ";
                   $año_siguiente =   date("Y");
                    echo$año_siguiente +1;?></td>
                </tr>

                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">Perito Responsable Especializado en Diseño Estructural:</td>
                    <td style="border: 1px solid black;" align="center"><?php echo $u6; ?></td>
                    <td style="border: 1px solid black;" align="center">No. <?php echo $u7; ?></td>
                </tr>
            </table>
            <br>

            <table>
                <tr>
                    <td align="justify">
                        <br>
                        <u>1. El presente permiso quedará sin efecto al momento en que cambie de titular, cualquier modificación o ampliación posterior de la sección o contenido de publicidad autorizada, deberá ser solicitada previamente.</u>
                        <br>
                        <b>
                            2. Deberá presentar la renovación de la Póliza de Seguro presentada por la fecha restante de la vigencia del presente permiso.
                            <br>
                            <u>3. Deberá hacer constar, en el anuncio de manera visible, el número de permiso otorgado para su instalación y el periodo de vigencia de la misma.</u>
                        </b>
                        <br>
                        4. Cualquier modificación de los trabajos aprobados requerirá Autorización previa de esta Dirección, a fin de verificar que cumpla con los Ordenamientos Urbanos Aplicables.
                        <br>
                        5. Deberá realizar las actividades de mantenimiento necesarias para mantener en adecuadas condiciones de seguridad y en buen estado de conservación y operación, debidamente validadas por el Perito Responsable Especializado en Diseño Estructural, el cual deberá estar actualizado ante esta Dirección.
                        <br>
                        <b>6. Al concluir la vigencia del Permiso otorgado, deberá realizar el refrendo del mismo anexando anualmente la Bitácora de Mantenimiento con fotografías, avalado por un Perito Responsable Especializado en Diseño Estructural, el cual deberá estar actualizado ante esta Dirección.</b>
                    </td>
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
                        Hoja 2 de 3
                    </td>
                </tr>
            </table>

            <table style="width:100%; floar:left;">
                <tr>
                    <td>
                        <img src="<?php echo base_url() . "assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
                    </td>
                </tr>
            </table>

            <table>
                <tr><b>Disposiciones Generales:</b></tr>
            <tr>
                <td align="justify">
                    7. El municipio podrá hacer efectivo el seguro otorgado en su favor, para los efectos de sufragar los gastos inherentes a la corrección de las anomalías resultantes, cuando la empresa o persona física arrendadora del anuncio, incumpla o infrinja alguno de los lineamientos contenidos en las presentes Normas, previo el apercibimiento que se le haga y plazo que se le otorgue al incumplido o infractor para su debido cumplimiento.
                    <br>
                    8. Para todos los tipos de anuncios la distancia mínima que debe guardarse entre cualquier elemento integrante del anuncio con el cableado de la Comisión Federal de Electricidad, será de 3.00 metros como mínimo.
                    <br>
                    9. El sistema de iluminación deberá tener un reductor que disminuya su luminosidad de las 19.00 a las 06:00 horas, del día siguiente.
                    <br>
                    10. Las fuentes luminosas no deberán rebasar los 75 luxes.
                    <br>
                    <b>
                        11. El presente no constituye constancia de apeo y deslinde respecto al inmueble, ni acredita la propiedad o posesión del mismo a favor de solicitante.
                        <br>
                        12. El Inmueble estará sujeto a la supervisión de la Autoridad Municipal para efectos de su verificación y cumplimiento de lo descrito con anterioridad.
                    </b>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <br><br><b>DERECHOS DE EXPEDICIÓN</b>
                </td>
            </tr>
        </table>

        <table style="border: 1px solid black;" width="100%">
            <tr>
                <th>Concepto</th>
                <th>Tarifa</th>
                <th>Superficie</th>
                <th>Total</th>
            </tr>
            <?php
            $totalpago =0;
            if($d24){?>
            <tr>
                <td>Constancia de Validación de Anuncios</td>
                <td>$227.73</td>
                <td>x 1.00 pza</td>
                <td><?php $totalpago =$totalpago + 222.73?>$227.73</td>
            </tr>
            <?php }?>
            <?php if($d50){?>
            <tr>
                <?php $detallespago = explode(",",$d30)?>
                <td><?php echo $detallespago[0];?></td>
                <td><?php echo $detallespago[1]?></td>
                <td><?php
                $total = $d51+0;
                foreach ($d50 as $sum){
                    $total = $total + $sum['total'];
                }
                echo "x ".$total."m2";
                ?>
                </td>
                <td><?php $t = $total*$detallespago[1];
                echo $t;
                $totalpago = $totalpago+ $t;
                ?></td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="3" align="right"><b>TOTAL</b></td>
                <td><?php echo $totalpago; ?></td>
            </tr>
        </table>

        <table>
            <tr>
                <td align="justify">
                    Por último, deberá pagar a la tesorería municipal los derechos correspondientes del presente, de conformidad con lo dispuesto en el artículo 29 fracción I inciso d) y e) de la Ley de Ingresos para el Municipio de Irapuato Guanajuato publicada en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 205 sexta parte, de fecha 23 de diciembre del año 2016; mismas que entraron en vigor a partir del 1° de enero del año 2017 para el ejercicio fiscal año 2017.
                    <br>Lo anterior con fundamento en el artículo 90 fracción I, II, III, IV, y VII del Reglamento Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato, publicado en el Periódico Oficial del Gobierno del Estado de Guanajuato, número 73 Segunda Parte de fecha 06 de mayo del 2016.
                    <br>Sin más por el momento, quedo de Usted.
                </td>
            </tr>
            <tr>
            <br>
            <td align="center">
                <br>
                A t e n t a m e n t e
            </td>
        </tr>

        <tr>
            <td><br><br><br><br></td>
        </tr>

        <tr>
            <td align="center">
                Arq. José Alfredo López Padilla
                <br>
                Director General de Desarrollo Territorial
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td>
                Con copia para-
                <br>
                -Archivo Minutario: <?php echo $d35; ?>
                <br>
                -Se integra con <?php echo $d36; ?>
                <br>
                Revisó: <?php echo $d37; ?>
                <br>
                Elaboró:
    <?php echo $d38; ?>
                <br>
                Zona Norponiente
            </td>
            <td>
                <img src="http://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=<?php echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y') . " -Propietario: " . $u1 . " -Ubicación:" . $u4; ?> -Dirección de Desarrollo Territorial (Permiso de Anuncios)&amp;chld=H|0">
        </td>
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
            Hoja 3 de 3
        </td>
    </tr>
</table>

</body>
</html>