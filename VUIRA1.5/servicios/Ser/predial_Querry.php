<?php
//error_reporting(E_ALL);
ini_set("display_errors",0);
include_once( "../DataConexion.php");
include ("../colonias/colonias_serv.php");

    $predial = (isset($_POST['predial']) ? $_POST['predial'] : (isset($_GET['predial']) ? $_GET['predial'] : null));
    //$predial = "14C003993001";
    require_once('libraries/lib/nusoap.php'); //includes nusoap
    $cliente = new nusoap_client("http://webservice.irapuato.gob.mx/ws1php7/serviceprueba.php?wsdl", true);
    $cliente->setCredentials("C74CDF711820EBDD6CAE51260B49B8DF818676C007924B3431D59EB25797AC4F2A383D5C8E261BF51C9631EC3735BDAEB20EDB718C88240DB717EF55B42E874F", "690DE4E9F34A998B8288EA4B083808B7F410471D0F3F2A7BEDA8B78C6E284711B3C8EEBDA5EAB24AB43D6CF3308F6FEDEE7E3063FCC8FF6002D65B9FA338ACBF", "basic");

    $parametros = array('cam' => 'CUENTA_PREDIAL', 'val' => '' . $predial);
    $cliente->soap_defencoding = 'UTF-8';
    $cliente->decode_utf8 = false;
    $respuesta = $cliente->call("Consulta", $parametros);//JSON
    //$respuesta = $cliente->call("Copropietarios", $parametros);//JSON Copropietarios
    //$respuesta = json_decode($respuesta, true); //Decodificas JSON
    if ($respuesta)
    {
        $respuesta = json_decode($respuesta, true); //Decodificas JSON
        //echo $respuesta["CALLE_ID"];
        $obj = new colonia();
		//echo $respuesta["CALLE_ID"]."<br>";
		$CalleNombre = $obj->getDataCalleById($respuesta["CALLE_ID"]);
    $Colonia = $obj->getAllDataColoniaById($respuesta["COLONIA_ID"]);
		//var_dump($CalleNombre);
		//if($CalleNombre!= null)
		    $respuesta["CALLE_ID"] = isset($CalleNombre->NOMBRE)?$CalleNombre->NOMBRE:$respuesta["CALLE_ID"];
        $respuesta["COLONIA_ID"] = isset($Colonia->NOMBRE)?$Colonia->NOMBRE:$respuesta["COLONIA_ID"];
        print (json_encode($respuesta));
    }
    else {
        print ("Error");
    }

?>
