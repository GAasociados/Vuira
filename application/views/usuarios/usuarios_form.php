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
        <h2 style="margin-top:0px">Usuarios <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nombres <?php echo form_error('nombres') ?></label>
            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" value="<?php echo $nombres; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Apellido Pat <?php echo form_error('apellido_pat') ?></label>
            <input type="text" class="form-control" name="apellido_pat" id="apellido_pat" placeholder="Apellido Pat" value="<?php echo $apellido_pat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Apellido Mat <?php echo form_error('apellido_mat') ?></label>
            <input type="text" class="form-control" name="apellido_mat" id="apellido_mat" placeholder="Apellido Mat" value="<?php echo $apellido_mat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Calle <?php echo form_error('calle') ?></label>
            <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle" value="<?php echo $calle; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Colonia <?php echo form_error('colonia') ?></label>
            <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Colonia" value="<?php echo $colonia; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Cp <?php echo form_error('cp') ?></label>
            <input type="text" class="form-control" name="cp" id="cp" placeholder="Cp" value="<?php echo $cp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Correo <?php echo form_error('correo') ?></label>
            <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefono <?php echo form_error('telefono') ?></label>
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $telefono; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contrasena <?php echo form_error('contrasena') ?></label>
            <input type="text" class="form-control" name="contrasena" id="contrasena" placeholder="Contrasena" value="<?php echo $contrasena; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Tipo Usu <?php echo form_error('tipo_usu') ?></label>
            <input type="text" class="form-control" name="tipo_usu" id="tipo_usu" placeholder="Tipo Usu" value="<?php echo $tipo_usu; ?>" />
        </div>

	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usuarios') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>