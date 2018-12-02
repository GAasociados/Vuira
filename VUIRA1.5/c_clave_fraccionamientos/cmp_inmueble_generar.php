<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>
<script src="./../js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="./../css/bootstrap.min.css">
<script src="./../js/bootstrap.min.js"></script>
<script src="./../js/all.js"></script>
<link rel="stylesheet" href="./../css/custom.css">
<!--<html>
	<head>
		<title>Componente</title>

		<script type="text/javascript" src="./../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./../js/view_claves_cat_fraccionamiento.js"></script>
	</head>
<body>-->
<div class="container">
    <br>
    <h2>II. IDENTIFICACIÓN Y UBICACIÓN DEL INMUEBLE</h2>
	<br>
	<div class="col-sm-8">
		<input class="btn btn-primary btn-lg btn-block" type="Button" id="btPlantilla" value="Plantilla" onclick="" />
	</div>
	<br>
    <div class="container">
    <form>
    <div class="form-group col-md-8">
        <label class="control-label">En Su Caracter *</label>
        <input class="form-control" id="p_caracter"/>
      </div>
      <div class="form-group col-md-8">
            <label class="control-label">Superficie del terreno *</label>
            <input class="form-control" type="text" id="p_superficie">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Número de Escritura *</label>
            <input class="form-control" type="text" id="p_numero_escritura">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Nombre del notario público *</label>
            <input class="form-control" type="text" id="p_notario_publico">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Número de notario público *</label>
            <input class="form-control" type="text" id="p_numero_notario_publico">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Fecha de Escrituras *</label>
            <input class="form-control" type="date" id="p_fecha_escritura">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Número de Oficio *</label>
            <input class="form-control" type="text" id="p_numero_oficio">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Estado de Escritura *</label>
            <input class="form-control" type="text" id="p_estado_escritura">
		</div>
		<div class="form-group col-md-8">
            <label class="control-label">Ciudad de Escritura *</label>
            <input class="form-control" type="text" id="p_ciudad_escritura"">
		</div>
       <br>
    </form>
	</div>
	<div>
		<table class="table table-bordered table-striped table-hover table-sm" id="tblinmubles">
		<thead>
				<tr>
					<th scope="col"> Cuenta Predial </th>
					<th scope="col"> Calle </th>
					<th scope="col"> Numero Exterior </th>
					<th scope="col"> Numero Interior </th>
					<th scope="col"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido </th>
					<th scope="col"> Acciones </th>
				</tr>
				</thead>
			</table>
		</div>
    </div>

<!--</body>
</html>-->
