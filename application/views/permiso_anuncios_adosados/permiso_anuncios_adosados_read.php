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
        <h2 style="margin-top:0px">Permiso_anuncios_adosados Read</h2>
        <table class="table">
	    <tr><td>Nombre Propietario Del Inmueble</td><td><?php echo $nombrepropietarioinmuebledg; ?></td></tr>
	    <tr><td>Nombre Propietarios de Anuncio</td><td><?php echo $nombrepropietarioanunciodg; ?></td></tr>
	    <tr><td>Calle</td><td><?php echo $calledg; ?></td></tr>
	    <tr><td>Número</td><td><?php echo $numerodg; ?></td></tr>
	    <tr><td>Colonia</td><td><?php echo $coloniadg; ?></td></tr>
	    <tr><td>Correo</td><td><?php echo $correodg; ?></td></tr>
	    <tr><td>Teléfono</td><td><?php echo $telefonodg; ?></td></tr>
	    <tr><td>Calle</td><td><?php echo $calleui; ?></td></tr>
	    <tr><td>Núm. de Lote</td><td><?php echo $noloteui; ?></td></tr>
	    <tr><td>Núm. de Manzana</td><td><?php echo $nomanzanaui; ?></td></tr>
	    <tr><td>Núm. Oficial</td><td><?php echo $nooficialui; ?></td></tr>
	    <tr><td>Colonia</td><td><?php echo $cbocoloniaui; ?></td></tr>
	    <tr><td>Superficie del Predio</td><td><?php echo $superficiepredioui; ?></td></tr>
	    <tr><td>Superficie Construida</td><td><?php echo $superficieconstruidaui; ?></td></tr>
	    <tr><td>Núm. de Niveles</td><td><?php echo $nonivelesui; ?></td></tr>
	    <tr><td>Fecha de Entrega</td><td><?php echo $fechaentrega; ?></td></tr>
	    <tr><td>Núm. de Control</td><td><?php echo $nocontrol; ?></td></tr>
	    <tr><td>Documento Permiso Uso de Suelo</td><td><?php echo $doctopermisousosuelo; ?></td></tr>
	    <tr><td>Documento Ife</td><td><?php echo $doctoife; ?></td></tr>
	    <tr><td>Documento Acta Constitutiva</td><td><?php echo $doctoactaconstitutiva; ?></td></tr>
	    <tr><td>Documento Reporte Fotográfico</td><td><?php echo $doctofotografico; ?></td></tr>
      <tr><td>Documento Pago</td><td><?php echo $doctopago; ?></td></tr>
      <tr><td>Documento Pago</td><td><?php echo $doctofinal; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Mensaje</td><td><?php echo $mensaje; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('permiso_anuncios_adosados') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
