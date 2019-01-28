<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include "DataConexion.php";

$sql="select * from natural7_vuira.Cat_Informacion_Documentos where Id_Bd='".$_GET["id"]."';";
$con= new conection();
$result= $con->executeQuerry($sql);
$result_F=get_object_vars($result[0]);
//$varNames=array_keys( $result_F);
print "<html lang='es'>";
header("Content-Type: text/html;charset=utf-8");
print '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
print "<form lang='es' id='docF' action='../PDFGen/pdfGenTfracc.php' method='post'>";
foreach($result_F as $fieldName=>$value)
{
	//echo $value;
	if($value==NULL)
		$value="";
	print "<input type='hidden' id='$fieldName' name='$fieldName' value='".$value."'> <br> ";
}
print "</form>";

echo "<script type=\"text/javascript\">
                window.onload=function(){
                    document.forms['docF'].submit();
                }
       </script>";
?>
