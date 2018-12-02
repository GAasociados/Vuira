<?php	
error_reporting(E_ALL);
ini_set("display_errors",1);
include "DataConexion.php";
//falta Nombre_Encargado_IMUVII, Solicitud_IMUVII
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array('Domingo', 'Lunes', 'Martes',
            'Miércoles', 'Jueves', 'Viernes', 'Sabado');
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

function get_Iniciales_FullName($nombre,$apat,$amat)
{
	$iniciales_apat="";
	$iniciales_amat="";
	
	if($nombre!="")
		$iniciales_name = get_Iniciales($nombre);
	
		
	if($apat!="")
		$iniciales_apat = get_Iniciales($apat);

		
	if($amat!="")
		$iniciales_amat = get_Iniciales($amat); 	
		
	return $iniciales_name.$iniciales_apat.$iniciales_amat;
	
}

function formatTipoTramite($name)
{
	$names = explode(" ",$name);
	
	$tramiteName="";
	foreach( $names as $n)
	{
		$tramiteName.="_".$n;
	}
	return $tramiteName;
}


$Fecha = $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); 
$con= new conection();
$sql = "SELECT u.nombres,u.apellido_pat,u.apellido_mat,t.* FROM claves_catastrales_individual as t inner join usuarios as u on t.auxiliar=u.ID WHERE t.ID=".$_POST["ID"];
$tramite = $con->executeQuerry($sql);


$sql = "INSERT INTO natural7_vuira.Cat_Informacion_Documentos(ID_Numero_Oficio,Id_Bd) VALUES ('".$_POST["Numero_Seguimiento"]."',".$_POST["ID"].")";
$con->sqlOperations($sql);
$sql="UPDATE natural7_vuira.Cat_Informacion_Documentos SET Nombre_Propietario='".$_POST["Nombre_Propietario"]."',
															
																   ID_Numero_Oficio='".$_POST["No_OFF"]."',	
																   Tipo_Tramite='".$_POST["Tipo_Tramite"]."',																   
																   Calle='".$_POST["Calle"]."',
																   Numero_Exterior='".$_POST["Numero_Exterior"]."',
																   NoInterior='".$_POST["nooficialinui"]."',
																   Colonia='".$_POST["Colonia"]."',
																   Numero_Predial='".$_POST["Numero_Predial"]."',
																   Superficie='".$_POST["Superficie"]."',
																   Caracter='".$_POST["Caracter"]."',
																   Fecha_Escritura='".$_POST["Fecha_Escritura".formatTipoTramite($_POST["Tipo_Tramite"])]."',
																   Numero_Escritura='".$_POST["Numero_Escritura".formatTipoTramite($_POST["Tipo_Tramite"])]."',
																   Nombre_Notario='".$_POST["Nombre_Notario".formatTipoTramite($_POST["Tipo_Tramite"])]."',
																   Numero_Notario='".$_POST["Numero_Notario"]."',
																   Numero_Seguimiento='".$_POST["Numero_Seguimiento"]."',
																   tipotramitedp='".$_POST["tipotramitedp"]."',
																   Nombre_Encargado_IMUVII='".$_POST["Nombre_Encargado_IMUVII"]."',
																   Solicitud_IMUVII='".$_POST["Solicitud_IMUVII"]."',
																   Observaciones='".$_POST["Observaciones"]."',
																   Clave_Catastral='".$_POST["Clave_Catastral"]."',
																   Area_Privativa='".$_POST["privt"]."',
																   Area_Comun='".$_POST["Area_Comun"]."',
																   Area_Comun_Cubierta='".$_POST["Area_Comun_Cubierta"]."',
																   Area_Comun_Descubierta='".$_POST["Cubiertatd"]."',
																   Total_Indiviso='".$_POST["Total_Indiviso"]."',
																   Porcentaje_Indiviso='".$_POST["Porcentaje_Indiviso"]."',
																   Fecha_Inicio='".$tramite[0]->fechainicio."',
																   Iniciales_Func='".get_Iniciales_FullName($tramite[0]->nombres,$tramite[0]->apellido_pat,$tramite[0]->apellido_mat)."',
																   Croquis_URL	='".$_POST["Croquis_URL"]."',
																   Manzana	='".$_POST["Manzana"]."',
																   Numero_Lote	='".$_POST["Numero_Lote"]."',
																   Numero_INFONAVIT	='".$_POST["Numero_INFONAVIT"]."',
																   Numero_Infonavit2	='".$_POST["Numero_Infonavit2"]."',
																   Calle_Infonavit	='".$_POST["Calle_Infonavit"]."',
																   Colonia_Infonavit	='".$_POST["Colonia_Infonavit"]."',
																   Lote_Infonavit	='".$_POST["Lote_Infonavit"]."',
																   Manzana_Infonavit	='".$_POST["Manzana_Infonavit"]."',
																   Manzana_Titulo	='".$_POST["Manzana_Titulo"]."',
																   Superficie_Infonavit	='".$_POST["Superficie_Infonavit"]."',
																   Numero_Titulo	='".$_POST["Numero_Titulo"]."',
																   Numero_Juicio	='".$_POST["Numero_Juicio"]."',
																   Nombre_Juicio_Juez='".$_POST["Nombre_Juicio_Juez"]."',
																   Copropietarios	='".$_POST["Copropietarios"]."',
																   Numero_Parcela	='".$_POST["Numero_Parcela".formatTipoTramite($_POST["Tipo_Tramite"])]."',
																   Contrato_CORETT	='".$_POST["Contrato_CORETT"]."',
																   Constancia		='".$_POST["N"]."',
																   No_Off='".$_POST["No_OFF"]."',
																   Fecha_Cert_Parcela='".$_POST["fecha_certi_parce"]."',
																   No_Cert_Parcela='".$_POST["certi_parcelario"]."',
																   Tipo_Sup='".$_POST["tipo_sup"]."',
																   Ref_Legal='".$_POST["Ref_Legal"]."',
																   Ejido='".$_POST["Ejido".formatTipoTramite($_POST["Tipo_Tramite"])]."',
																   Fecha_Constancia_IMUVII='".$_POST["Fecha_Constancia_IMUVII"]."',
																   Fecha_CORETT='".$_POST["Fecha_CORETT"]."',
																   Predial_IMUVII='".$_POST["Predial_IMUVII"]."',
																   Ciudad_CORETT='".$_POST["Ciudad_CORETT"]."',
																   Fecha_Generacion_Documento='".$Fecha."',
																   CE_Estado_Escritura='".$_POST['CE_Estado_Escritura']."',
																   CE_Ciudad_Escritura='".$_POST['CE_Ciudad_Escritura']."',
																   Superficie_CORETT='".$_POST['Superficie_CORETT']."',
																   Cargo_IMUVII='".$_POST['Cargo_IMUVII']."',
																   Es_Ciudad_Escritura='".$_POST['Es_Ciudad_Escritura']."',
																   Es_Estado_Escritura='".$_POST['Es_Estado_Escritura']."',
																   Zona='".$_POST['Zona']."'
														WHERE Id_Bd='".$_POST["ID"]."';";


$con->sqlOperations($sql);
var_dump($_POST);

echo "<br>";
echo "<br>";
echo "<br>";

echo $sql;



echo "<script type=\"text/javascript\"> 
                window.onload=function(){
                   // document.forms['docF'].submit();
				   window.location.href='https://vuira.irapuato.gob.mx/DocPrint/DocPrint.php?id=".$_POST["ID"]."'
                }
       </script>";
?>