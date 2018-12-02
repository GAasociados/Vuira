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
                    <th colspan="3" align="center">Clave Catastral</th>
                </tr>
                <tr>
                    <td rowspan="5" width="180" align=" center"><img src="<?php echo base_url('assets/images/logo.png   ') ?>" width="160"></td>
                    <td colspan="2">Nombre: <?php echo $propietario ?></td>
                </tr>
                <tr>
                    <td>Fecha y Hora</td>
                    <td><?php echo date("d-m-Y H:i A", strtotime("" . $fechafinal)); ?></td>
                </tr>
                <tr>
                    <td>Solicitud:</td>
                    <td>Número de Folio:</td>
                </tr>
                <tr>
                    <td><label > <?php if ($tipotramite == 1): ?>
                                <?php echo "ASIGNACIÓN DE CLAVE CATASTRAL"; ?>
                            <?php elseif ($tipotramite == 2): ?>
                                <?php echo "MODIFICACIÓN DE CLAVE CATASTRAL"; ?>
                            <?php elseif ($tipotramite == 3): ?>
                                <?php echo "DUPLICADO DE CLAVE CATASTRAL"; ?>
                            <?php endif; ?>
                        </label>
                    </td>
                    <td><?php echo $orden ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label class="pie"> 
                            Calle Álvaro Obregón N°100 Zona Centro, Irapuato Guanajuato, Tel: 01(462)6069999 ext. 1564
                        </label>
                    </td>

                </tr>
            </table>
        </div>
    </body>
</html>