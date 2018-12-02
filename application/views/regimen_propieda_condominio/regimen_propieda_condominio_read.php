<!doctype html>
<html>
    <head>
        <title>GA & Asociados</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Regimen_propieda_condominio Read</h2>
        <table class="table">
	    <tr><td>Tipo Tramite</td><td><?php echo $tipo_tramite; ?></td></tr>
	    <tr><td>Domicilio Calle</td><td><?php echo $domicilio_calle; ?></td></tr>
	    <tr><td>No Lote</td><td><?php echo $no_lote; ?></td></tr>
	    <tr><td>Manzana</td><td><?php echo $manzana; ?></td></tr>
	    <tr><td>Numero Oficial</td><td><?php echo $numero_oficial; ?></td></tr>
	    <tr><td>Colonia Inmueble</td><td><?php echo $colonia_inmueble; ?></td></tr>
	    <tr><td>Cuenta Predial</td><td><?php echo $cuenta_predial; ?></td></tr>
	    <tr><td>Nombre Del Contribuyente</td><td><?php echo $nombre_del_contribuyente; ?></td></tr>
	    <tr><td>Domicilio Del Contribuyente</td><td><?php echo $domicilio_del_contribuyente; ?></td></tr>
	    <tr><td>Telefono Del Contribuyente</td><td><?php echo $telefono_del_contribuyente; ?></td></tr>
	    <tr><td>Colonia Del Contribuyente</td><td><?php echo $colonia_del_contribuyente; ?></td></tr>
	    <tr><td>Nombre Perito Valuador</td><td><?php echo $nombre_perito_valuador; ?></td></tr>
	    <tr><td>Domicilio Perito Valuador</td><td><?php echo $domicilio_perito_valuador; ?></td></tr>
	    <tr><td>Colonia Perito Valuador</td><td><?php echo $colonia_perito_valuador; ?></td></tr>
	    <tr><td>No Perito</td><td><?php echo $no_perito; ?></td></tr>
	    <tr><td>Telefonos Perito</td><td><?php echo $telefonos_perito; ?></td></tr>
	    <tr><td>Superficie Predio</td><td><?php echo $superficie_predio; ?></td></tr>
	    <tr><td>Uso Actual Predio</td><td><?php echo $uso_actual_predio; ?></td></tr>
	    <tr><td>Tipo Regimen</td><td><?php echo $tipo_regimen; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Mensaje</td><td><?php echo $mensaje; ?></td></tr>
	    <tr><td>Documento Pago</td><td><?php echo $documento_pago; ?></td></tr>
	    <tr><td>Fecha Pago</td><td><?php echo $fecha_pago; ?></td></tr>
	    <tr><td>Documento Final</td><td><?php echo $documento_final; ?></td></tr>
	    <tr><td>Fecha Tramite</td><td><?php echo $fecha_tramite; ?></td></tr>
	    <tr><td>Fecha Autorizacion</td><td><?php echo $fecha_autorizacion; ?></td></tr>
	    <tr><td>Usuario Id</td><td><?php echo $usuario_id; ?></td></tr>
	    <tr><td>Escrituras</td><td><?php echo $escrituras; ?></td></tr>
	    <tr><td>Oficio Traza</td><td><?php echo $oficio_traza; ?></td></tr>
	    <tr><td>Planos Autorizados</td><td><?php echo $planos_autorizados; ?></td></tr>
	    <tr><td>Planos Particulares</td><td><?php echo $planos_particulares; ?></td></tr>
	    <tr><td>Memoria Descriptiva</td><td><?php echo $memoria_descriptiva; ?></td></tr>
	    <tr><td>Acreditacion Representante</td><td><?php echo $acreditacon_representante; ?></td></tr>
	    <tr><td>Recibo Pago</td><td><?php echo $recibo_pago; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('regimen_propieda_condominio') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>