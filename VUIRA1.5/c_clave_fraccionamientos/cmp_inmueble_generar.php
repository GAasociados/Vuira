<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>
<div class="form-group col-md-6">
	<label class="control-label">En su Caracter *</label>
	<input class="form-control" id="p_caracter"/>
</div>
<div class="form-group col-md-6">
	<label class="control-label">Superficie del Terreno *</label>
	<input class="form-control" type="text" id="p_superficie">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Número de Escritura *</label>
	<input class="form-control" type="text" id="p_numero_escritura">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Nombre del Notario Público *</label>
	<input class="form-control" type="text" id="p_notario_publico">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Número de Notario Núblico *</label>
	<input class="form-control" type="text" id="p_numero_notario_publico">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Fecha de Escrituras *</label>
	<input class="form-control" type="date" id="p_fecha_escritura">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Número de Oficio *</label>
	<input class="form-control" type="text" id="p_numero_oficio">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Entidad Federativa *</label>
	<input class="form-control" type="text" id="p_estado_escritura">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Ciudad de Escritura *</label>
	<input class="form-control" type="text" id="p_ciudad_escritura">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Área Privativa</label>
	<input class="form-control" type="number" id="p_area_privativa">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Área Común</label>
	<input class="form-control" type="number" id="p_area_comun">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Área Común Cubierta</label>
	<input class="form-control" type="number" id="p_area_cubierta">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Total Indiviso</label>
	<input class="form-control" type="number" id="p_indiviso">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Porcentaje Indiviso</label>
	<input class="form-control" type="number" id="p_porcen_indiviso">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Área común descubierta</label>
	<input class="form-control" type="number" id="p_descubierta">
</div>
<div class="form-group col-md-6">
	<label class="control-label">Haga click en el botón de abajo para guardar los datos</label>
	<input class="btn btn-info" value="Guadar Datos de la Plantilla" type="button" onclick="event_insert_data_inmueble()" id="buttonSaveTemplate">
</div>
<div class="row">
    <div class="col-md-12">
		<div class="table-responsive">
	       <table class="table table-bordered table-hover" id="tblinmubles">
		      <thead>
			     <tr>
				    <th scope="col"> Cuenta Predial </th>
				    <th scope="col"> Calle </th>
				    <th scope="col"> Manzana </th>
				    <th scope="col"> Lote</th>
				    <th scope="col"> Numero Exterior </th>
				    <th scope="col"> Numero Interior </th>
				    <th scope="col"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido </th>
				    <th scope="col"> Acciones </th>
			     </tr>
		      </thead>
	       </table>
        </div>	
	</div>
</div>