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
        <form method="POST" action="<?PHP echo $action;?>">
            <input type="hidden" name="ID" value="<?php echo $ID;?>">
        
        <table style="width:100%; floar:left;" >
            <tr>
                <td>
                    <img src="<?php echo base_url() . "assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>

        <table style="width:100%; float:left;">
            <tr>
                <td align="right" style="font-size: 14px;">
                    <b>
                        TESORERÍA MUNICIPAL
                        <br>
                        DIRECCION DE CATASTRO
                        <br>ÁREA DE CARTOGRAFIA
                        <br>
                         DC/CAR//<?PHP ECHO date('Y');?>
                        <br>
                         <b>ASUNTO:</b><?PHP if($d1 == 1 ){echo strtoupper('AsignacIÓn de Clave Catastral');}else if($d1==2){echo strtoupper('ModificaciÓn de Clave Catastral');}else if($d1==3){ echo strtouper('Duplicado de Clave Catastral');} ?>
                        <br>
                       Irapuato Guanajuato a  <?php
                            /* $fechaactual = getdate(); echo $fechaactual["weekday"]." ".$fechaactual["mday"]." ".$fechaactual["month"]." ".$fechaactual["year"]; */
                            $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                            $arrayDias = array('Domingo', 'Lunes', 'Martes',
                                'Miercoles', 'Jueves', 'Viernes', 'Sabado');

                            echo strtoupper( $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'));
                            ?>
                    </b>
                </td>
            </tr>
            <tr>
                <td style="font-size: 14px;">
                    <b>
                        <?php echo strtoupper($d2);?>
                    </b>
                    <br>
                    <b>
                        PRESENTE:
                    </b>
                </td>
            </tr>

        </table>
        <br>

        <br>
        <table style="width:100%; floar:left; font-size: 14px;" >

            <tr>
                <td align="justify">
                    Por medio de este conducto me permito enviarle un cordial saludo, así mismo hacer de su conocimiento
                    que no se ha entregado la respuesta de <b><?PHP if($d1 == 1 ){echo strtoupper('AsignacIÓn de Clave Catastral');}else if($d1==2){echo strtoupper('ModificaciÓn de Clave Catastral');}else if($d1==3){ echo strtouper('Duplicado de Clave Catastral');} ?></b> , del 
                    inmueble ubicado en <b><?php echo strtoupper($calle); ?> <?php echo $numero;  echo $noint !=""? ", int. ".$noint:"" ; echo $noloteui !=""? ", ".$noloteui:"" ; echo $nomanzanaui !=""? ", ".$nomanzanaui:""; ?>  DE COLONIA/FRACCIONAMIENTO <?php echo strtoupper($colonia);?></b>  de esta Ciudad de Irapuato, Guanajuato, esto con motivo de que se llevó
                    a cabo un estudio completo del inmueble en el cual el Predio de la cuenta predial <b><?php echo $predial; ?></b>.
                    <br>
                    <?= $observaciones;?>
                    <textarea name="observaciones" readonly="" rows=8 cols=187  style="display:none;"><?= $observaciones;?></textarea>
                </td>

            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>
                    Con fundamento en el Art. 197, fracción IV, del Código Territorial para el Estado de Guanajuato y sus Municipios.
                    <br>
                    Agradeciendo de antemano la atención que brinde al presente, sin otro en particular por el momento, quedo de usted.
                </td>
            </tr>
        </table>
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
          <br><br>       <br>
                    <br>

                </td>

            </tr>
        </table>
        <br>
        <button type="submit"> Generar Documento </button>
        <button type="button"  onclick="window.location.href='<?php echo base_url().'claves_catastrales_individual/CLAVE/'.$ID;?>'"> Regresar a trámite </button>
        </form>
    </body>
</html>
