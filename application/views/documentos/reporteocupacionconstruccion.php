<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dirección de catastro</title>
        <style type="text/css">
            table tr th{
                font: 88.5% sans-serif;

                border: 1px solid black;

            }
            tbody tr td{
                font: 88.5% sans-serif;

                border: 1px solid black;

            }
        </style>
    </head>
    <header>
    </header>
    <body>


        <table style="width:100%; floar:left;" >
            <tr>
                <td>
                    <img src="<?php echo base_url() . "assets/images/" ?>/iniciodesarrollo.png" alt="" width="100%">
                </td>
            </tr>
        </table>
        <table style="width:100%; floar:left;">
            <tr>
                <td colspan="3" align="center" style="font-size: 14px;">
                    <b>
                        TESORERÍA MUNICIPAL 
                        <br>
                       DIRECCIÓN GENERAL DE DESARROLLO TERRITORIAL

                    </b>
                </td>
            </tr>
            <tr>
                <td style="font-size: 14px;">
                    <b>
                        RERPORTE:
                    </b>
                </td>
            </tr>
            <tr>



                <?php if ($nombrepropietario): ?>
                    <td style="font-size: 14px;">


                        <b>PROPIETARIO: </b><BR><?php echo $nombrepropietario; ?>

                    </td>
                <?php endif; ?>
                <?php if ($status): ?>
                    <td style="font-size: 14px;">

                        <b>ESTATUS DE TRAMITES: </b><BR>
                        <?php
                        switch ($status) {

                            case '1':
                                echo "Iniciado";
                                break;

                            case '2':
                                echo "Revisión De Información";
                                break;

                            case '3':
                                echo "Trámite en Proceso";
                                break;

                            case '4':
                                echo "En Espera De Pago";
                                break;

                            case '5':
                                echo "Cancelado";
                                break;

                            default:
                                echo "Terminado";
                                break;
                        }
                        ?>

                    </td>

                <?php endif; ?>

            </tr>
            <tr>
                <?php if ($seguimiento): ?>
                    <td style="font-size: 14px;">

                        <b>NÚMERO DE SEGUIMIENTO: </b><BR><?php echo $seguimiento . $year; ?>

                    </td>
                <?php endif; ?>
                <?php if ($fechainicio): ?>
                    <td style="font-size: 14px;">

                        <b>FECHA DE INICIO: </b><?php echo $fechainicio; ?>

                    </td>    <?php endif; ?> 
                <?php if ($fechafinal): ?>
                    <td style="font-size: 14px;">

                        <b>ULTIMA MODIFICACIÓN: </b><?php echo $fechafinal; ?>

                    </td>
                <?php endif; ?>


            </tr>

        </table>
        <table class="tablacontenido" style="width:100%; floar:left;">
            <tr style=" ">
                <th>N° SEGUIMIENTO</th>
                <th>PROPIETARIO</th>
                <th>INICIO DE TRÁMITE</th>
                <th>ULTIMA MODIFICACIÓN</th>
                <th>ESTATUS</th>
            </tr>
            <tbody>
            <?php foreach ($ocupacion_construccion_data as $claves_catastrales_individual) { ?>
                <tr>
                    <td><?php echo $claves_catastrales_individual->nocontroldp; ?></td>
                    <td><?php echo $claves_catastrales_individual->nombrepropietariodg; ?></td>
                    <td><?php echo $claves_catastrales_individual->fechainicio; ?></td>
                    <td><?php echo $claves_catastrales_individual->fechafinal; ?></td>
                    <td>
                    <?php
                        switch ($claves_catastrales_individual->status) {

                            case '1':
                                echo "Iniciado";
                                break;

                            case '2':
                                echo "Revisión De Información";
                                break;

                            case '3':
                                echo "Trámite en Proceso";
                                break;

                            case '4':
                                echo "En Espera De Pago";
                                break;

                            case '5':
                                echo "Cancelado";
                                break;

                            default:
                                echo "Terminado";
                                break;
                        }
                        ?></td>
                 
                </tr>
            <?php } ?>
</tbody>
        </table>
    </body>
</html>
