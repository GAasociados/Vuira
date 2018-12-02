<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="expires" content="0">
        <title>Dirección de catastro</title>
        <style type="text/css">
            table{
                font: 88.5% sans-serif;
            }
        </style>
    </head>
    <header>
    </header>
    <body>
        <form action="<?php echo $action; ?>" method="POST" >
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <table style="width:100%; floar:left;" >
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
                            DIRECCION DE CATASTRO
                            <br>
                            <?php echo 'DC/CAR/' . $numero_doc . '/' . date('Y'); //; ?>
                            <input name="numero_doc" type="hidden" value="  <?php echo 'DC/CAR/' . $numero_doc . '/' . date('Y'); ?>">
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
                            Irapuato Guanajuato, <?php
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
                <!--tr>
                    <td align="right" style="font-size: 14px;" style="font-size: 14px;">
                        <b>
                            EN ATENCIÓN A: <?php echo $d2; ?>
                            <input name="d2" type="hidden" value="<?php echo $d2; ?>">


                        </b>
                    </td>
                </tr-->
                <tr>
                    <td align="justify" style="font-size: 14px;">
                        <br>
                        En atención a su solicitud recibida el  <b> <?php
                        setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                        $fecha = strftime("%d de %B", strtotime($fechas));
                        echo $fecha;
                        ?> <input name="fechas" value="<?php echo $fecha; ?>" type="hidden">
                        </b>del año en curso, respecto a la <input name="d1" value=" <?php
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
                                                                  echo 'Duplicado de la  Clave Catastral';
                                                              }
                                                              ?> del inmueble ubicado en<b>PARCELA <input name="parcela" value="<?php echo $parcela ?>" type="hidden"> <?php echo $parcela; ?></b> del Ejido <b><input name="colonia" value="<?php echo $colonia; ?>" type="hidden"> <?php echo $colonia; ?>  </b> de esta ciudad de Irapuato Guanajuato, cuya superficie de terreno es de <b><input name="sup" value="<?php echo $sup ?>" type="hidden"> <?php echo $sup; ?> </b> registrado bajo la cuenta predial <?php if ($predial != 'APERTURA'): ?>
                             <b><input name="predial" value="<?php echo $predial; ?>" type="hidden"> <?php echo $predial; ?></b>
<?php else:?>
                            <b>S/N</b>
 <?php endif; ?>se le informa que una vez consultada la base de datos de esta Dirección y la base de datos del padrón de contribuyentes de la Dirección de Impuestos Inmobiliarios, así como la revisión realizada a la documentación que nos anexa se concluye que: 
                        <br>
                        <br>

                        <!--cambios de la vista a partir de aqui-->
                        El bien inmueble señalado se encuentra inscrito a nombre de <b> <input name="d2" value="<?php echo $d2; ?>" type="hidden"> <?php ECHO $d2; ?> </b>con el carácter de <b><input name="caracter" value="PROPIETARIO" type="hidden">PROPIETARIO</b>, <?php if ($coop): ?>
                            y CO-PROPIETARIO <?php echo $coop; ?> <input name="coop" value="<?php echo $coop; ?>" type="hidden"> 
                        <?php endif; ?> acreditando mediante <?php if ($tipo_tramite == 'titulo'): ?>
                            Título de propiedad/Certificado Parcelario/Sentencia Juridica No. <?php echo $noesc; ?> <input name="tipo_tramite" value="<?php echo $tipo_tramite; ?>" type="hidden"><input name="numero_exp1" value="<?php echo $noesc; ?>" type="hidden">
                        <?php elseif ($tipo_tramite == 'cat'): ?>
                            <?php if ($delegado != ''): ?>
                                Autorización del Delegado <?php echo $delegado; ?> <input name="delegado" value="<?php echo $delegado; ?>" type="hidden"> por,
                            <?php endif; ?>
                            Contrato Privado de Compraventa CORETT<input name="tipo_tramite" value="<?php echo $tipo_tramite; ?>" type="hidden">
                        <?php elseif ($tipo_tramite == 'info'): ?>
                            <?php if ($delegado != ''): ?>
                                Autorización del Delegado <?php echo $delegado; ?> <input name="delegado" value="<?php echo $delegado; ?>" type="hidden"> por,
                            <?php endif; ?>
                            Contrato Privado de Compraventa INFONAVIT<input name="tipo_tramite" value="<?php echo $tipo_tramite; ?>" type="hidden">
                        <?php elseif ($tipo_tramite == 'escritura') : ?>
                            la Escritura Pública No.<input name="tipo_tramite" value="<?php echo $tipo_tramite; ?>" type="hidden"><input name="numero_exp1" value="<?php echo $noesc; ?>" type="hidden"> <?php echo $noesc; ?>
                        <?php endif; ?> de fecha <?php
                        setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
                        $fecha = strftime("%d de %B de %Y", strtotime($fecha_const));
                        echo $fecha;
                        ?><input name="fecha_esc" value="<?php echo $fecha; ?>" type="hidden">, de la ciudad de Irapuato,Gto.<br>
                        Nota: Se hace de su conocimiento que la presente clave catastral que se expide solo sirve para la ubicacion del inmueble, ya que cuenta con un certificado parcelario lo cual solo nos ampara la posesión del inmueble en mención. <br><br>
                        Para efectos de la inscripción al padrón catastral, integración a cartografía del Municipio, localización geográfica e identificación del predio de forma única, se le ha asignado a éste inmueble la Clave Catastral número:
                         <br><br> <textarea readonly="" rows=8 cols=187 name="observaciones"><?php echo $observaciones; ?></textarea>
                        <br><br>
                    </td>   
                </tr>
            </table>
            <br>
            <table style="width:100%; floar:left; border: 1px solid black; background-color:  rgba(192,192,192,0.06);">
                <tr style="border: 1px solid black;">
                    <td  style="text-align: center; font-size: 14px;  ">
                        <?php echo $clave; ?><input name="clave" value="<?php echo $clave; ?>" type="hidden">
                    </td>

                </tr>

            </table>
        
            <br>
            <table style="width:100%; floar:left; font-size: 14px;" >

                <tr>
                    <td align="justify">
                      Lo anterior con fundamento en la Constitución Política de los Estados Unidos Mexicanos, Artículo 8 primer párrafo, 39 Fracción I; Constitución Política para el Estado de Guanajuato, Artículo 23 Fracción V; Ley de Responsabilidades Administrativas de los Servidores Públicos del Estado de Guanajuato y sus Municipios, Artículo 11 Fracción III; Código Territorial para el Estado de Guanajuato y sus Municipios, Artículos 193 Fracción III, 194 Fracción I y II, 195,197 Fracciones I y IV, 202, 204, 205, 206, 207, 208, 209;
                      Reglamento Orgánico de la Administración Pública Municipal de Irapuato Guanajuato, en su numeral 75 Fracciones II, VI y VII; Así como lo contemplado en la Norma Técnica del Sistema Nacional de Información Estadística y Geográfica, Artículos 1, 2, 3 Fracciones I, IV, VII, 6 y 7; Ley de Ingresos para el Municipio de Irapuato Guanajuato, Artículos 27 Fracción VII y 32 Fracción IV.
                    </td>
                </tr>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td style=" text-align: center;">
                        <b> A T E N T A M E N T E </b>
                        <br>
                        <br>
                        <br>
                    </td>

                </tr>
                <tr>
                    <td style=" text-align: center;">
                        <b> ARQ. CARLOS ALBERTO HERNÁNDEZ</b>
                        <br>
                        <br><br>
                        <b> DIRECTOR DE CATASTRO</b>


                    </td>

                </tr>
            </table>
            <br>



            <table style="width:100%; floar:left;">

                <tr>
               

                </tr>

                <tr>
                    <td>
                        <span  style=" font-size:9px;">
                            ARCHIVO <br>
                            CAH/CAJ/IAV<BR>
                            TESORERÍA MUNICIPAL<BR>
                            <hr>
                        </span>
                        <span  style=" font-size:7px;">
                            Álvaro Obregón no. 100 Zona Centro C.P 36500 <br>
                            Tel 01 (462) 606 99 99 ext. 1566 y 1568<BR>
                            Irapuato, Gto.<BR>

                        </span>
                    </td>
                    <td style=" text-align: center; ">
                    </td>

                </tr>
            </table>
            <br>
            <table style="width:100%; floar:left; border: 1px solid black; ">
                <tr style="border: 1px solid black;">

                    <td height="400">
                        <?php if ($croquis): ?>
                            <!--\\\\croquis-->
                            <img src="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/croquis/" . $croquis; ?>"  width="100%">
                        <?php else: ?>
                            <label ><b>Nota:</b></label>
                            <textarea rows=8 cols=187 name="noimg"></textarea>
                        <?php endif; ?>
                    </td>


                </tr>


            </table>
            <br> <br>
            <table>
                <tr>
                    <td style="text-align: center; font-size: 14px;">
                        <em>CERTIFICACIÓN DE DOCUMENTO <?php echo $croquis;?></em>
                        <br>
                 
                    </td>
                </tr>
                <tr>
                    <td align="justify" STYLE="font-size: 14px;" >
                        El Arquitecto Carlos Alberto Hernández, Director de Catastro Municipal de Irapuato Guanajuato, adscrito a la Tesorería Municipal.
                        <br>
                      
                    </td>
                </tr>
                <tr>
                    <td  STYLE=" text-align: center;  font-size: 14px;" >
                        Certifica:
                        <br>
  <br>       <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="justify" STYLE=" text-align: center;  font-size: 14px;" >
                        Que los documentos entregados al solicitante concuerdan fielmente con los que obran en el Expediente No. <?php echo $numero_exp; ?> <input type="hidden" name="numero_exp" value="<?php echo $numero_exp; ?>">los cuales se encuentran en el archivo de esta Dirección, mismo que tuve a la vista y con el que fue cotejado. 
                        <br>
                        <br>
                        <br>
                        Se expide la presente certificación por acuerdo con la Tesorera Municipal Ma. Ernestina Hernández Guzmán, otorgado mediante el oficio número TM/001/2014 en la ciudad de Irapuato Guanajuato, a los 6 días del mes de enero de 2014
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
            <button type="submit"> Generar Documento Word </button>
            <button type="button"  onclick="window.location.href = '<?php echo base_url() . 'claves_catastrales_individual/Clave/' . $ID; ?>'"> Regresar a trámite </button>
        </form>
    </body>
</html>
