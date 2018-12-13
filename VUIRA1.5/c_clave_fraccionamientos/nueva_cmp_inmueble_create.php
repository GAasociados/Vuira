<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>

<div class="col-md-8">
	<div class="form-group">
		<label class="control-label" for="Cuenta_Predial">Cuenta predial</label>
		<input class="form-control" type="text" id="txtCuentaPredial"  placeholder="Cuenta Predial" onkeypress="event_pulsar_enter(event)">
	</div>
</div>
<div class="col-md-4">
	<input class="btn btn-success" type="Button" id="btAdd" value="Agregar" onclick="event_add_cuenta_predial()"/>
</div> 

	<div class="col-md-12">
		<div class="container table-responsive">
			<table class="table table-bordered table-striped table-hover table-sm" id="tblinmubles" name="tblinmubles">
				<tr>
					<td> Cuenta Predial</td>
					<td> Calle</td>
					<td> Manzana</td>
					<td> Lote</td>
					<td> Numero</td>
					<td> Numero Interior</td>
					<td> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido</td>
					<td> Acciones</td>
				</tr>
			</table>
		</div>
	</div>
	