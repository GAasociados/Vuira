
<?php
setlocale(LC_ALL,"es_ES");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$fechaEntrega=date('d',strtotime("" . $fechafinal))." de ".$meses[date('m',strtotime("" . $fechafinal))-1]. " del ".date('Y',strtotime("" . $fechafinal))." ".date("H:i A",strtotime("" . $fechafinal));

 ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {

                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                font-size: 20px;
            }

            .cuadro{
                width:1400px;
                height:200px;
                background:#F4F6F7;
                font-family:arial;
                font-weight:bold;
                color:#212121;
                border-radius: 25px;
            }
            label{
                font-size: 10px;
            }
            .pie{
                font-size: 5px;
            }
        </style>
    </head>
    <body>
        <div class="cuadro">
            <table style="width:100%">
                <tr>
                    <td align="center">Clave Catastral</th>
                </tr>
                <tr>
                    <td align="center">Nombre: <?php echo $propietario ?></td>
                </tr>
                <tr>
                    <td align="center"><b>Fecha y hora de entrega de su trámite:</b></td>
                </tr>
                 <tr>
                    <td align="center"><b><?php  echo  $fechaEntrega;/*date("d-F-Y H:i A", strtotime("" . $fechafinal));*/ ?></b></td>
                </tr>
                <tr>
                    <td align="center">Número de Folio:<?php echo $orden ?></td>
                   </tr>
                <tr>
                    <td align="center"><img src="<?php echo base_url('assets/images/logo.png   ') ?>" width="160">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <label class="pie">
                            Calle Álvaro Obregón N°100 Zona Centro, Irapuato Guanajuato,
                        </label>
                    </td>
                </tr>
                <tr>
                    <td align="center">Tel: 01(462)6069999 ext. 1564</td>
                </tr>
            </table>
        </div>
    </body>
</html>
