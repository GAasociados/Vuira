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
        <h2 style="margin-top:0px">Avaluos_rusticos Read</h2>
        <table class="table">
	    <tr><td>Motivo</td><td><?php echo $motivo; ?></td></tr>
	    <tr><td>Nombresolicitante</td><td><?php echo $nombresolicitante; ?></td></tr>
	    <tr><td>Nombrepropietario</td><td><?php echo $nombrepropietario; ?></td></tr>
	    <tr><td>Calle</td><td><?php echo $calle; ?></td></tr>
	    <tr><td>Numero</td><td><?php echo $numero; ?></td></tr>
	    <tr><td>Colonia</td><td><?php echo $colonia; ?></td></tr>
	    <tr><td>Municipio</td><td><?php echo $municipio; ?></td></tr>
	    <tr><td>Localidad</td><td><?php echo $localidad; ?></td></tr>
	    <tr><td>Correo</td><td><?php echo $correo; ?></td></tr>
	    <tr><td>Telefono</td><td><?php echo $telefono; ?></td></tr>
	    <tr><td>Perito</td><td><?php echo $perito; ?></td></tr>
	    <tr><td>Documentofinal</td><td><?php echo $documentofinal; ?></td></tr>
	    <tr><td>UsuarioID</td><td><?php echo $usuarioID; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Mensaje</td><td><?php echo $mensaje; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('avaluos_rusticos') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>