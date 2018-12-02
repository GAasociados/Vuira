<?php	
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	include "DataConexion.php";
	//falta Nombre_Encargado_IMUVII, Solicitud_IMUVII

	function get_Iniciales($name)
	{
		$names = explode(" ",$name);
	
		$iniciales="";
		foreach( $names as $n)
		{
			$iniciales.=$n[0];
		}
		return $iniciales;
	}

	$con= new conection();
	$sql = "SELECT u.nombres,t.* FROM claves_catastrales_individual as t inner join usuarios as u on t.auxiliar=u.ID where t.nooficio IS NOT NULL";
	$ttramite = $con->executeQuerry($sql);

	//for ($i=0; $i < 414 ; $i++) { 
		//$sql = "INSERT INTO natural7_vuira.Cat_Informacion_Documentos(ID_Numero_Oficio,Id_Bd) VALUES ('".$ttramite[$i]->nooficio."',".$ttramite[$i]->ID.")";

	foreach ($ttramite as $tt) {
		$sql2 = "INSERT INTO Cat_Informacion_Documentos 
		VALUES ("
		.(($tt->nooficio != null && $tt->nooficio != "") ? "'$tt->nooficio'" : "NULL").","
		.(($tt->ID != null && $tt->ID != "") ? "$tt->ID" : "NULL").","
		.(($tt->nombrepropietariodp != null && $tt->nombrepropietariodp != "") ? "'$tt->nombrepropietariodp'" : "NULL").","
		.(($tt->tipotramite != null && $tt->tipotramite != "") ? "'$tt->tipotramite'" : "NULL").","
		.(($tt->calleui != null && $tt->calleui != "") ? "'$tt->calleui'" : "NULL").","
		.(($tt->numerodp != null && $tt->numerodp != "") ? "'$tt->numerodp'" : "NULL").","
		.(($tt->coloniadp != null && $tt->coloniadp != "") ? "'$tt->coloniadp'" : "NULL").","
		.(($tt->predialui != null && $tt->predialui != "") ? "'$tt->predialui'" : "NULL").","
		.(($tt->supciact != null && $tt->supciact != "") ? "'$tt->supciact'" : "NULL").","
		.(($tt->caracter != null && $tt->caracter != "") ? "'$tt->caracter'" : "NULL").","
		.(($tt->fechaesc != null && $tt->fechaesc != "") ? "'$tt->fechaesc'" : "NULL").","
		.(($tt->noescri != null && $tt->noescri != "") ? "'$tt->noescri'" : "NULL").","
		.(($tt->nonotario != null && $tt->nonotario != "") ? "'$tt->nonotario'" : "NULL").","
		.(($tt->notario != null && $tt->notario != "") ? "'$tt->notario'" : "NULL").","
		.(($tt->numerocontrol != null && $tt->numerocontrol != "") ? "'$tt->numerocontrol'" : "NULL").","
		.(($tt->fechainicio != null && $tt->fechainicio != "") ? "'$tt->fechainicio'" : "NULL").","
		.(($tt->tipotramitedp != null && $tt->tipotramitedp != "") ? "'$tt->tipotramitedp'" : "NULL").","
		.(($tt->imuvii != null && $tt->imuvii != "") ? "'$tt->imuvii'" : "NULL").","
		.(($tt->observaciones != null && $tt->observaciones != "") ? "'$tt->observaciones'" : "NULL").","
		.(($tt->clave != null && $tt->clave != "") ? "'$tt->clave'" : "NULL").","
		.(($tt->areac != null && $tt->areac != "") ? "'$tt->areac'" : "NULL").","
		.(($tt->acc != null && $tt->acc != "") ? "'$tt->acc'" : "NULL").","
		.(($tt->acd != null && $tt->acd != "") ? "'$tt->acd'" : "NULL").","
		.(($tt->totalind != null && $tt->totalind != "") ? "'$tt->totalind'" : "NULL").","
		.(($tt->porcent != null && $tt->porcent != "") ? "'$tt->porcent'" : "NULL").","
		.(($tt->croqis!= null && $tt->croqis!= "") ? "'assets/tramites/clavescatastralesindividual/croquis/"."$tt->croqis'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nombres != null && $tt->nombres != "") ? "'".get_Iniciales($tt->nombres)."'" : "NULL").","
		.(($tt->copro != null && $tt->copro != "") ? "'$tt->copro'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->nomanzanaui != null && $tt->nomanzanaui != "") ? "'$tt->nomanzanaui'" : "NULL").","
		.(($tt->fechafinal != null && $tt->fechafinal != "") ? "'$tt->fechafinal'" : "NULL").","
		.(($tt->fechainicio != null && $tt->fechainicio != "") ? "'$tt->fechainicio'" : "NULL").","
		.(($tt->tipotramitedp != null && $tt->tipotramitedp != "") ? "'$tt->tipotramitedp'" : "NULL").")";


		$con->sqlOperations($sql2);
	}
?>