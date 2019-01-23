<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once( "../servicios/DataConexion.php");
include("../servicios/c_clave_fraccionamiento/c_clave_fracc_core.php");
include("../servicios/c_clave_fraccionamiento/c_clave_fracc_det.php");

  var_dump($_POST);
  foreach($_POST as $key=>$value)
  {
    if(substr( $key, 0, 3 ) === "S1_")
    {
      $data_details[$key] = $value;
    }
    else {
      $data_header[$key] = $value;
    }
  }
  echo "<hr>";
  var_dump($data_header);
  echo "<hr>";
  var_dump($data_details);
  if($_POST["id"]=="")
  {
      $insertedId=$obj->coreInsert($data_header, $_FILES);
      print_r("<hr>Id:".$insertedId);
  //$insertedId = 1;
    if($insertedId != "")
      $objD->detMasiveInsert($data_details,$insertedId);
  }
  else
  {
      $obj->coreUpdate($data_header, $_FILES,$_POST["id"]);
  }

  echo "<script type=\"text/javascript\">
                  window.onload=function(){
                     // document.forms['docF'].submit();
  				           window.location.href='http://localhost/Vuira/VUIRA1.5/c_clave_fraccionamientos/Clave_Catastral_Fraccionamientos_Ventanilla.php?Id=$insertedId&operation=ImprimirTalon';
                  }
         </script>";


 ?>
