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
        <h2 style="margin-top:0px">Usuarios Read</h2>
        <table class="table">
	    <tr><td>Nombres</td><td><?php echo $nombres; ?></td></tr>
	    <tr><td>Apellido Pat</td><td><?php echo $apellido_pat; ?></td></tr>
	    <tr><td>Apellido Mat</td><td><?php echo $apellido_mat; ?></td></tr>
	    <tr><td>Calle</td><td><?php echo $calle; ?></td></tr>
	    <tr><td>Colonia</td><td><?php echo $colonia; ?></td></tr>
	    <tr><td>Cp</td><td><?php echo $cp; ?></td></tr>
	    <tr><td>Correo</td><td><?php echo $correo; ?></td></tr>
	    <tr><td>Telefono</td><td><?php echo $telefono; ?></td></tr>
	    <tr><td>Contrasena</td><td><?php echo $contrasena; ?></td></tr>
	    <tr><td>Tipo Usu</td><td><?php echo $tipo_usu; ?></td></tr>
	    <tr><td>Documentos Activos</td><td><?php echo $documentos_activos; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('usuarios') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>