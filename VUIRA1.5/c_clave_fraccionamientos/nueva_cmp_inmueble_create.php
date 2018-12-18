<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>

    
<div class="row">
    <div class="col-md-10">
	   <div class="form-group">
		  <input class="form-control" type="text" id="txtCuentaPredial"  placeholder="Escriba aquí la cuenta predial que desea agregar" onkeypress="event_pulsar_enter(event)">
	   </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <input class="btn btn-success" type="Button" id="btAdd" value="Agregar" onclick="event_add_cuenta_predial()"/>
        </div>
    </div> 
    <div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="tblinmubles" name="tblinmubles">
                <thead>
                    <tr>
					<th scope="col"> Cuenta Predial</th>
					<th scope="col"> Calle</th>
					<th scope="col"> Manzana</th>
					<th scope="col"> Lote</th>
					<th scope="col"> Número</th>
					<th scope="col"> Número Interior</th>
					<th scope="col"> Fracc/Condominio/Colonia/Barrio/Comunidad/Predio/Ejido</th>
					<th scope="col"> Acciones</th>
				</tr>
                </thead>
			</table>
		</div>
	</div>
</div>
	
	