<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>Dirección de catastro</title>
    <style type="text/css">
        table {
            font: 88.5% sans-serif;
        }
    </style>
</head>
<header>
</header>
<body>
<form action="<?php echo $action; ?>" method="POST">
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
            <td align="right" style="font-size: 14px;">
                <b>
                    TESORERÍA MUNICIPAL


                    <br>
                    DIRECCIÓN DE CATASTRO
                    <br>
                    <?php echo 'DC/CAR/' . $numero_doc . '/' . date('Y'); //; ?>
                    <input name="numero_doc" type="hidden"
                           value="  <?php echo 'DC/CAR/' . $numero_doc . '/' . date('Y'); ?>">
                    <br>
                    <?php
                    echo 'Asunto: ';
                    if ($d1 == 1) {
                        echo 'Asignación de la Clave Catastral';
                    } else if ($d1 == 2) {
                        echo 'Modificación de la Clave Catastral';
                    } else if ($d1 == 3) {
                        echo 'Duplicado de la Clave Catastral';
                    }
                    ?>
                    <br>
                    Irapuato, Guanajuato; <?php
                    /* $fechaactual = getdate(); echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
                    $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                    $arrayDias = array('Domingo', 'Lunes', 'Martes',
                        'Miércoles', 'Jueves', 'Viernes', 'Sábado');

                    echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y');
                    ?>
                </b>
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px;">
                <b>
                    <?php echo $d2; ?>
                    <input name="d2" type="hidden" value="<?php echo $d2; ?>">
                </b>
                <br>
                <b>
                    PRESENTE:
                </b>
            </td>
        </tr>
        <tr>
            <td align="justify" style="font-size: 14px;">
                <br>
                En atención a su solicitud recibida el día <?php
                setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                $fecha = strftime("%d de %B", strtotime($fechainicio));
                echo $fecha;
                ?> <input name="fechas" value="<?php echo $fecha; ?>" type="hidden">
                del año en curso, respecto a la <input name="d1" value=" <?php
                if ($d1 == 1) {
                    echo 'Asignación de la Clave Catastral';
                } else if ($d1 == 2) {
                    echo 'Modificación de la Clave Catastral';
                } else if ($d1 == 3) {
                    echo 'Duplicado de la Clave Catastral';
                }
                ?>  " type="hidden">
                <?php
                if ($d1 == 1) {
                    echo 'Asignación de la Clave Catastral';
                } else if ($d1 == 2) {
                    echo 'Modificación de la Clave Catastral';
                } else if ($d1 == 3) {
                    echo 'Duplicado de la Clave Catastral';
                }
                ?> del inmueble ubicado en la calle <input name="calle" value="<?php echo $calle ?>"
                                                           type="hidden"> <?php echo $calle; ?> con número oficial
                <input name="numero" value="<?php echo $numero; ?>" type="hidden"> <?php
                echo $numero;
                echo $noint != "" ? ", int. " . $noint : "";
                echo $noloteui != "" ? ", " . $noloteui : "";
                echo $nomanzanaui != "" ? ", " . $nomanzanaui : "";
                ?>
                <?php if ($tipo_tramite == 'titulo' || $tipo_tramite == 'cat'): ?>
                    <?php if ($zona != "S/N"): ?>
                        Parcela/Solar Lote <?php echo $zona; ?>
                        <?php if ($parcela != "S/N"): ?>
                            Con Zona y Porción/Manzana de <?php echo $parcela; ?>

                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                del Fracc./Colonia/Ejido/Comunidad/Barrio<input name="colonia" value="<?php echo $colonia; ?>"
                                                                type="hidden"> <?php echo $colonia; ?> de esta ciudad de
                Irapuato Guanajuato, cuya superficie de terreno es de <input name="sup" value="<?php echo $sup ?>"
                                                                             type="hidden"> <?php echo $sup; ?> <?php if ($predial != ''): ?>
                    bajo la cuenta predial <input name="predial" value="<?php echo $predial; ?>"
                                                  type="hidden"> <?php echo $predial; ?><?php endif; ?>se le informa que
                una vez consultada la base de datos de esta Dirección y la base de datos del padrón de contribuyentes de
                la Dirección de Impuestos Inmobiliarios, así como la revisión realizada a la documentación que nos anexa
                se concluye que:
                <br>
                <br>
                El bien inmueble señalado se encuentra inscrito a nombre de <input name="d2" value="<?php echo $d2; ?>"
                                                                                   type="hidden"> <?php ECHO $d2; ?> con
                el carácter de <input name="caracter" value="<?php echo $caracter; ?>"
                                      type="hidden"><?php echo $caracter; ?>, <?php if ($coop): ?>
                    <?php echo $coop; ?> <input name="coop" value="<?php echo $coop; ?>" type="hidden">
                <?php endif; ?>acreditado mediante
                <?php if ($tipo_tramite == 'titulo'): ?>
                    Título de propiedad/Certificado Parcelario/Sentencia Jurídica No. <?php echo $noesc; ?> <input
                            name="tipo_tramite" value="<?php echo $tipo_tramite; ?>" type="hidden"><input
                            name="numero_exp1" value="<?php echo $noesc; ?>" type="hidden">
                <?php elseif ($tipo_tramite == 'cat'): ?>
                    <?php if ($delegado != ''): ?>
                        Autorización del Delegado <?php echo $delegado; ?> <input name="delegado"
                                                                                  value="<?php echo $delegado; ?>"
                                                                                  type="hidden"> por,
                    <?php endif; ?>
                    Contrato Privado de Compraventa CORETT<input name="tipo_tramite"
                                                                 value="<?php echo $tipo_tramite; ?>" type="hidden">
                <?php elseif ($tipo_tramite == 'info'): ?>
                    <?php if ($delegado != ''): ?>
                        Autorización del Delegado <?php echo $delegado; ?> <input name="delegado"
                                                                                  value="<?php echo $delegado; ?>"
                                                                                  type="hidden"> por,
                    <?php endif; ?>
                    Contrato Privado de Compraventa INFONAVIT<input name="tipo_tramite"
                                                                    value="<?php echo $tipo_tramite; ?>" type="hidden">
                <?php elseif ($tipo_tramite == 'escritura') : ?>
                    la Escritura Pública No.<input name="tipo_tramite" value="<?php echo $tipo_tramite; ?>"
                                                   type="hidden"><input name="numero_exp1" value="<?php echo $noesc; ?>"
                                                                        type="hidden"> <?php echo $noesc; ?>
                <?php endif; ?>
                con fecha del <?php
                setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                $fecha = strftime("%d de %B de %Y", strtotime($fecha_esc));
                echo $fecha;
                ?><input name="fecha_esc" value="<?php echo $fecha; ?>"
                         type="hidden"> <?php if ($tipo_tramite == 'escritura') : ?>
                    con la fe pública del licenciado <input name="lic" value="<?php echo $lic; ?>"
                                                            type="hidden"> <?php echo $lic; ?> Notario Público No.<input
                            name="no_notario" value="<?php echo $no_notario; ?>"
                            type="hidden"> <?php echo $no_notario; ?>, de la ciudad de <input name="ciudad"
                                                                                              type="hidden"
                                                                                              value="<?php echo $ciudad . ", " . $estado; ?>"><?php echo strtoupper($ciudad . "," . $estado); ?>.

                <?php endif; ?>
                <?php if ($Privativat || $Cubiertat || $Comunt): ?>  Como lote <?php echo $noloteui; ?> área privativa
                    con <?php if ($indivisott && $indivisott != "" && $indivisott != null): ?>
                        área total de indiviso de <?php echo $indivisott; ?> m2 <input name="indivisott"
                                                                                       value="<?php echo $indivisott; ?>"
                                                                                       type="hidden">
                        <?php if ($Privativat && $Privativat != "" && $Privativat != null): ?>
                            de los cuales <?php echo $Privativat; ?> m2 son de área privativa<input name="Privativat"
                                                                                                    value="<?php echo $Privativat; ?>"
                                                                                                    type="hidden"><?php endif; ?>
                        <?php if ($Comunt && $Comunt != "" && $Comunt != null): ?>
                            de los cuales <?php echo $Comunt; ?> m2 son de área común<input name="Comunt"
                                                                                            value="<?php echo $Comunt; ?>"
                                                                                            type="hidden">
                        <?php endif; ?>
                        <?php if ($Cubiertat && $Cubiertat != "" && $Cubiertat != null): ?>, <?php echo $Cubiertat; ?> m2 son de área común cubierta<input
                                name="Cubiertat" value="<?php echo $Cubiertat; ?>" type="hidden">
                        <?php endif; ?>
                        <?php if ($Cubiertatd && $Cubiertatd != "" && $Cubiertatd != null): ?>, <?php echo $Cubiertatd; ?> m2 son de área común descubierta<input
                                name="Cubiertatd" value="<?php echo $Cubiertatd; ?>" type="hidden">
                        <?php endif; ?>
                    <?php endif; ?>
                    y le corresponde un indiviso del <?php echo $Indivisopt; ?>% <input name="Indivisopt"
                                                                                        value="<?php echo $Indivisopt; ?>"
                                                                                        type="hidden">
                <?php endif; ?>
                <?php if ($tipo_tramite == 'titulo'): ?>
                    de esta ciudad de <input name="ciudad" type="hidden"
                                             value="<?php echo $ciudad . " " . $estado; ?>"><?php echo strtoupper($ciudad . " " . $estado); ?>.
                    Con una superficie de <?php echo $sup; ?>

                <?php elseif ($tipo_tramite == 'cat' || $tipo_tramite == 'info'): ?>
                    en esta ciudad de <input name="ciudad" type="hidden"
                                             value="<?php echo $ciudad . " " . $estado; ?>"><?php echo strtoupper($ciudad . " " . $estado); ?>.
                    Con una superficie de <?php echo $sup; ?>
                <?php endif; ?>

                <br>
                <br>
                <textarea readonly="" rows=8 cols=187 name="observaciones"><?php echo $observaciones; ?></textarea>
                <br>
                <br>
                Para efectos de inscripción al padrón catastral, integración a la cartografía del Municipio,
                localización geográfica e identificación del predio de forma única, se le ha asignado a éste inmueble la
                Clave Catastral número:

            </td>
        </tr>
    </table>
    <br>
    <table style="width:100%; floar:left; border: 1px solid black; background-color:  rgba(192,192,192,0.06);">
        <tr style="border: 1px solid black;">
            <td style="text-align: center; font-size: 14px;  ">
                <?php echo $clave; ?><input name="clave" value="<?php echo $clave; ?>" type="hidden">
            </td>

        </tr>

    </table>
    <br>
    <?php if ($claves != "" && $claves != null): ?>
        <table style="width:100%; floar:left; font-size: 14px;">

            <tr>
                <td align="justify">

                            <textarea readonly="" rows=8 cols=187 name="clavescatastrales"><?php
                                foreach ($claves as $cclave) {
                                    echo $cclave['clave_catastral'] . " ";
                                }
                                ?>
                            </textarea>
                </td>
            </tr>
        </table>
    <?php endif; ?>
    <table style="width:100%; floar:left; font-size: 14px;">

        <tr>
            <td align="justify">
                Lo anterior con fundamento en la Constitución Política de los Estados Unidos Mexicanos, Artículo 8
                primer párrafo, 39 Fracción I; Constitución Política para el Estado de Guanajuato y sus Municipios,
                Artículo 11 Fracción III; Código Territorial para el Estado de Guanajuato y sus Municipios, Artículos
                193 fracción III, 194 fracción I y II, 195 Fracciones I y IV, 202, 204, 206, 207, 208 y 209; Reglamento
                Orgánico de la Administración Pública Municipal de Irapuato, Guanajuato en su numeral 75 fracciones II,
                VI y VII; Así como lo contemplado en la Norma Técnica del Sistema Nacional de Información Estadística y
                Geográfica, Artículos 1, 2, 3 Fracciones I, IV, VII, 6 y 7; y Ley de Ingresos para el Municipio de
                Irapuato Guanajuato, Artículos 27 Fracción VIII y 32 Fracción IV.

            </td>
        </tr>
    </table>
    <br>
    <table width="100%">
        <tr>
            <td style=" text-align: center;">
                <b> A T E N T A M E N T E </b>
                <br>

            </td>

        </tr>
        <tr>
            <td style=" text-align: center;">
                <b> ARQ. CARLOS ALBERTO HERNÁNDEZ</b>
                <br>

                <b> DIRECTOR DE CATASTRO</b>
                <br><br>
                <br>
                <br>
            </td>

        </tr>
    </table>
    <br>


    <table style="width:100%; floar:left;">

        <tr>
            <td>
                <span style="color: rgba(192,192,192,0.08) ">SELLO PAGADO</span>

            </td>
            <td style=" text-align: right; ">
                <span style="color: rgba(192,192,192,0.08) ">SELLO CATASTRO</span>
            </td>

        </tr>

        <tr>
            <td>
                        <span style=" font-size:9px;">
                            ARCHIVO <br>
                            CAH/CAJ/<?php
                            $Siglas = "";
                            $nombre = $this->session->userdata('nombrec');
                            $nombre = explode(" ", $this->session->userdata('nombrec'));
                            //                            var_dump($nombre)    ;
                            foreach ($nombre as $nomb) {
                                $Siglas = $Siglas . substr($nomb, 0, 1);
                            }
                            echo strtoupper($Siglas)
                            ?><BR>
                            TESORERÍA MUNICIPAL<BR>
                            <hr>
                        </span>
                <span style=" font-size:7px;">
                            Álvaro Obregón no. 100 Zona Centro C.P 36500 <br>
                            Tel. 01 (462) 606 99 99 ext. 1566 1568<BR>
                            Irapuato, Guanajuato<BR>

                        </span>
            </td>
            <td style=" text-align: center; ">
            </td>

        </tr>
    </table>
    <br>
    <table style="width:100%; float:left; border: 1px solid black; ">
        <tr style="border: 1px solid black;">

            <td height="400">
                <?php if ($croquis): ?>
                    <!--\\\\croquis-->
                    <img src="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/croquis/" . $croquis; ?>"
                         width="100%">
                <?php else: ?>
                    <label><b>Nota:</b></label>
                    <textarea rows=8 cols=187 name="noimg"></textarea>
                <?php endif; ?>
            </td>


        </tr>


    </table>
    <br> <br>
    <table>
        <tr>
            <td style="text-align: center; font-size: 14px;">
                <em>CERTIFICACIÓN DE DOCUMENTO</em>
                <br>
                <br>
                <br>
            </td>
        </tr>
        <tr>
            <td align="justify" STYLE="font-size: 14px;">
                El Arquitecto Carlos Alberto Hernández, Director de Catastro Municipal de Irapuato Guanajuato, adscrito
                a la Tesorería Municipal.
                <br>
                <br>
            </td>
        </tr>
        <tr>
            <td STYLE=" text-align: center;  font-size: 14px;">
                Certifica:
                <br>

            </td>
        </tr>
        <tr>
            <td align="justify" STYLE=" text-align: center;  font-size: 14px;">
                Que los documentos entregados al solicitante concuerdan fielmente con los que obran en el Expediente
                No. <?php echo $numero_exp; ?><input type="hidden" name="numero_exp" value="<?php echo $numero_exp; ?>">
                los cuales se encuentran en el archivo de esta Dirección, mismo que tuve a la vista y con el que fue
                cotejado.
                <br>
                <br>
                <br>
                Se expide la presente certificación por acuerdo con la Tesorera Municipal Ma. Ernestina Hernández
                Guzmán, otorgado mediante el oficio número TM/001/2014 en la ciudad de Irapuato Guanajuato, a los 6 días
                del mes de enero de 2014
                <br>
                <br>
                <br>
                Se expide a solicitud del interesado en la ciudad de Irapuato Guanajuato, el día <?php
                setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                $fecha = strftime("%d de %B de %Y", strtotime($fecha_exp));
                echo $fecha;
                ?><input name="fecha_exp" value="<?php echo $fecha; ?>" type="hidden">
            </td>
        </tr>

    </table>
    <button type="submit"> Generar Documento Word</button>
    <button type="button"
            onclick="window.location.href = '<?php echo base_url() . 'claves_catastrales_individual/Clave/' . $ID; ?>'">
        Regresar a trámite
    </button>
</form>
</body>
</html>
