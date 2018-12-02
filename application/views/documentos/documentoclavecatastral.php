<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
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

        <input type="hidden" name="ID" value="<?php echo $ID;     ?>">
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
                        DIRECCIÓN DE CATASTRO
                        <br>
                        <?php echo $numero_doc;// echo $d1; ?>
                        <br>
                        <?php 
                       echo 'Asunto: ';
                        if($d1 == 1 ){echo 'Asignación de la Clave Catastral';}else if($d1==2){echo 'Modificación de la Clave Catastral';}else if($d1==3){ echo 'Duplicado de la Clave Catastral';} ?>
                        <br>
                        Irapuato Guanajuato; <?php
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
                    En atención a su solicitud recibida el día <?php echo $fechas; ?> del año en curso respecto a la <?php if($d1 == 1 ){echo 'Asignación de Clave Catastral';}else if($d1==2){echo 'Modificación de Clave Catastral';}else if($d1==3){ echo 'Duplicado de Clave Catastral';} ?> del inmueble ubicado en la calle <?php echo $calle;     ?> con número oficial <?php echo $numero; echo $noint !=""? ", int. ".$noint:"" ; echo $noloteui !=""? ", ".$noloteui:"" ; echo $nomanzanaui !=""? ", ".$nomanzanaui:""; ?> 
                        <?php if ($tipo_tramite == 'titulo' || $tipo_tramite == 'cat'): ?>
                            <?php if ($zona != "S/N"): ?>
                                Parcela/Solar Lote <?php echo $zona; ?>
                                <?php if ($parcela != "S/N"): ?>
                                    Con Zona y Porción/Manzana de <?php echo $parcela; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    del Fracc./Colonia/Ejido/Comunidad/Barrio <?php echo $colonia;     ?> de esta ciudad de Irapuato Guanajuato, cuya superficie de terreno es de <?php  echo $sup;?> <?php if($predial != ''): ?> bajo la cuenta predial <?php echo $predial ;?> <?php endif;?> se informa que una vez consultada la base de datos de esta Dirección y la base de datos del padrón de contribuyentes de la Dirección de Impuestos Inmobiliarios, así como la revisión realizada a la documentación que nos anexa se concluye que: 
                    <br>
                    <br>
                    El bien inmueble señalado se encuentra inscrito a nombre de <?php ECHO $d2 ;    ?> con el carácter de <?php echo $caracter;     ?>,<?php if($coop):?>
                        y CO-PROPIETARIO <?php echo $coop;?> 
                            <?php endif;?> acreditado mediante 
                            
                            
                            <?php if($tipo_tramite == 'titulo'):?>
                         Título de propiedad/Certificado Parcelario/Sentencia Juridica No.<?php echo $noesc; ?>
                        <?php elseif ($tipo_tramite =='cat'): ?>
                        Contrato Privado de Compraventa CORETT
                             <?php elseif ($tipo_tramite =='info'): ?>
                        Contrato Privado de Compraventa INFONAVIT
                        <?php elseif ($tipo_tramite =='escritura') :?>
                        la Escritura Pública No.<?php echo $noesc; ?>
                        <?php endif;?>
                             con fecha del <?php echo $fecha_esc;     ?> 
                              <?php if ($tipo_tramite =='escritura') :?>
                       con la fé pública del licenciado <?php echo $lic;     ?> Notario Público No. <?php echo $no_notario;     ?>, de la ciudad de <?php echo $ciudad; ?>.          <?php endif;?>
                             
                    <?php if ($Privativat || $Cubiertat): ?>  Como lote <?php echo $noloteui; ?> área privativa 
                            con un <?php if ($indivisott): ?>
                                área total de indiviso  de <?php echo $indivisott; ?> m2
                                <?php if ($Privativat): ?>
                                    de los cuales <?php echo $Privativat; ?> m2 son de área privativa 
                                    
                                <?php endif; ?>
                                <?php if ($Cubiertat): ?>
                                    ,  <?php echo $Cubiertat; ?> m2 son de área común cubierta
                                <?php endif; ?>
                                <?php if ($Cubiertatd): ?>
                                    ,  <?php echo $Cubiertatd; ?> m2 son de área común descubierta 
                                <?php endif; ?>
                            <?php endif; ?>
                            y le corresponde un indiviso del <?php echo $Indivisopt; ?>%
                        <?php endif; ?>  <?php if($tipo_tramite == 'titulo'):?>
                           en esta ciudad de <?php echo $ciudad; ?>.Con una superficie de <?php echo $sup;?>
                        
                        <?php elseif ($tipo_tramite =='cat'): ?>
                        de esta ciudad de <?php echo $ciudad; ?>.Con una superficie de <?php echo $sup;?>
                       <?php endif;?>
                        
                    <br><br>
                    <p><?php echo $observaciones;?></p>
                    <br><br>
                    Para efectos de inscripción al padrón catastral, integración a la cartografía del Municipio, localización geográfica e identificación del predio de forma única, se le ha asignado a éste inmueble la Clave Catastral número:   
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%; floar:left; border: 1px solid black; background-color:  rgba(192,192,192,0.06);">
            <tr style="border: 1px solid black;">
                <td  style="text-align: center; font-size: 14px;  ">
                    <?php echo $clave;?>
                </td>

            </tr>

        </table>
        <br>
        
    
        <table style="width:100%; floar:left; font-size: 14px;" >

            <tr>
                <td align="justify">
                    Lo anterior con fundamento en la Constitución Política de los Estados Unidos Mexicanos, Artículos 8 primer párrafo, 39 Fracción I; Constitución Política para el Estado de Guanajuato y sus municipios, Artículo 11 Fracción III; Código Territorial para el Estado de Guanajuato y sus Municipios, Artículos 193 Fracción III, 194 Fracción I y II, 195 Fracciones I y IV, 202, 204, 206, 207, 208 y 209; Reglamento Orgánico de la Administración Pública Municipal de Irapuato Guanajuato, en su numeral 75 Fracciones II, VI y VII; Así como lo contemplado en la Norma Técnica del Sistema Nacional de Información Estadística y Geográfica Artículos 1, 2, 3 Fracciones I, IV, VII, 6 y 7; y Ley de Ingresos para el Municipio de Irapuato Guanajuato, Artículos 27 Fracción VIII y 32 Fracción IV.   

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
                  
                </td>
                <td style=" text-align: right; ">
                    
                </td>

            </tr>

            <tr>
                <td>
                  
                </td>
                <td style=" text-align: center; ">
                    <!--<span style="font-size:9px;">*NOTA IMPORTANTE: Para validez oficial el documento debe contener ambos sellos.</span>-->
                </td>

            </tr>
        </table>
        <br>
        <table style="width:100%; floar:left; border: 1px solid black; ">
            <tr style="border: 1px solid black;">
               
                <td height="400" >
                     
                    <!--\\\\croquis-->
                         <?php if($croquis):?>
                        <!--\\\\croquis-->
                        <img src="<?php echo base_url() . "assets/tramites/clavescatastralesindividual/croquis/" . $croquis; ?>"  width="100%">
                        <?php  else:?>
                        <label ><b>Nota:</b></label>
                        <P rows=8 cols=187 name="noimg"><?PHP ECHO $noimg?></P>
                        <?php endif;?>
                    
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
                 <td align="justify" STYLE="font-size: 14px;" >
                    El Arquitecto Carlos Alberto Hernández, Director de Catastro Municipal de Irapuato Guanajuato, adscrito a la Tesorería Municipal.
                    <br>
                     <br>
                </td>
            </tr>
             <tr>
                 <td  STYLE=" text-align: center;  font-size: 14px;" >
                   Certifica:
                    <br>
                    
                </td>
            </tr>
            <tr>
                 <td align="justify" STYLE=" text-align: center;  font-size: 14px;" >
                   Que los documentos entregados al solicitante concuerdan fielmente con los que obran en el Expediente No. <?php echo $numero_exp ;?> los cuales se encuentran en el archivo de esta Dirección, mismo que tuve a la vista y con el que fue cotejado. 
                    <br>
                    <br>
                    <br>
                    Se expide la presente certificación por acuerdo con la Tesorera Municipal Ma. Ernestina Hernández Guzmán, otorgado mediante el oficio número TM/001/2014 en la ciudad de Irapuato Guanajuato, a los 6 días del mes de enero de 2014
                    <br>
                    <br>
                    <br>
                    Se expide a solicitud del interesado en la ciudad de Irapuato Guanajuato, el día <?php  echo $fecha_exp;?>
                </td>
            </tr>
       
        </table>
    </body>
</html>
