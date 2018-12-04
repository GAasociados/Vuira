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
		<div class="container">
			<br>
			<h2> II. IDENTIFICACIÓN Y UBICACIÓN DEL INMUEBLE </h2>
			<br>
			<div class="form-group col-md-8">
            <label class="control-label" for="Cuenta_Predial">Cuenta predial *</label>
            <input class="form-control" type="text" id="txtCuentaPredial"  placeholder="Cuenta Predial" onkeypress="event_pulsar_enter(event)">
	        </div>
			<div class="col-md-6 float-auto">
			<input class="btn btn-success" type="Button" id="btAdd" value="Agregar" onclick="event_add_cuenta_predial()"/><br>
			</div>
			
		</div>
		<div class="container table-responsive">
			<br>
			<table class="table table-bordered table-striped table-hover table-sm" id="tblinmubles" name="tblinmubles">
				<tr>
					<td> Cuenta Predial</td>
					<td> Calle</td>
					<td> Numero</td>
					<td> Numero Interior</td>
					<td> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido</td>
					<td> Acciones</td>
				</tr>
			</table>
		</div>
		
	</div>

<!--</body>
</html>-->
