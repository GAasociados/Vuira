<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once("../DataConexion.php");


$objD = new detFracc();

//$data = ["Id_Fraccionamientos" => 1, "Cuenta_Predial" => "23232", "Calle" => "1", "Numero_Ext" => "0", "Numero_Int" => "0", "Colonia" => ""];

//print_r($obj->detDel(1));
if(isset($_GET['service_name']))
{
	switch ($_GET['service_name'])
	{
		case 'insertdet': //EL DICCIONARIO DE DATOS PASA POR MÉTODO POST PARA MÁS COMODIDAD, ENTRE COMENTARIOS ESTÁ LA VARIABLE DATA
            print_r(json_encode($objD->detInsert($_POST["data"]), JSON_UNESCAPED_SLASHES));
			break;
        case 'byiddet':
            print_r(json_encode($objD->detSel($_POST['id'], $_POST['uid']), JSON_UNESCAPED_SLASHES));
            break;
		case 'updatedet': //EL DICCIONARIO DE DATOS PASA POR POST AL IGUAL QUE EL ID
						var_dump($_POST);
            print_r(json_encode($objD->detUpdate($_POST["data"], $_POST['id'],$_POST['predial']), JSON_UNESCAPED_SLASHES));
            break;
        case 'delbyiddet':
            print_r(json_encode($objD->detDel($_GET['id']), JSON_UNESCAPED_SLASHES));
            break;
        case 'byiddetM':
            print_r(json_encode($objD->detMasiveInsert($_POST["data"], $_POST['id']), JSON_UNESCAPED_SLASHES));
            break;
        case 'getinfodocumentos':
              print_r(json_encode($objD->getDataInformacionDocumentos($_POST["id"], $_POST['cuenta_predial']), JSON_UNESCAPED_SLASHES));
              break;
			  case 'getDetallesFraccionamiento':
		          print_r(json_encode($objD->getDataDetallesFraccionamiento($_POST["id"]), JSON_UNESCAPED_SLASHES));
		          break;


		default:
			echo "El servicio no existe. / Service doesn't exist.";
			break;
	}
}

class detFracc
{
	public function __construct()
	{
		$this->con = new conection();
	}

    //RECIBE DICCIONARIO DE DATOS [Status => "", Fecha_Creacion => "", Propietario =>, Correo_Electronico ...
	public function detInsert($data)
	{
        //$data = ["Id_Fraccionamientos" => "", "Cuenta_Predial" => "", "Calle" => "", "Numero_Ext" => "", "Numero_Int" => "", "Colonia" => ""];
        $fieldvals = $this->getFieldsVals($data);
        $sql = "INSERT INTO Claves_Catastrales_Fraccionamientos_Detalles $fieldvals[0] VALUES $fieldvals[1];";
        echo $sql;
        return $this->con->sqlOperations($sql);
	}

  public function detMasiveInsert($masive, $id)
  {
        $x = -1;
        $j = 0;
        $data=[];

        foreach ($masive as $key => $value) {
          //echo "$j($key)->$value <br>";
          switch ($j)
          {
              case 0:
                  $data["Cuenta_Predial"] = $value;

                  break;
              case 1:
                  $data["Calle"] = $value;
                  break;
              case 2:
                  $data["Manzana"] = $value;
                  break;
							case 3:
											$data["Lote"] = $value;
									break;
							case 4:
		                  $data["Numero_Ext"] = $value;
		              break;
              case 5:
                  $data["Numero_Int"] = $value;
                  break;
              case 6:
                  $data["Colonia"] = $value;
                  break;
          }

          if($j==6)
          {
            $data["Id_Fraccionamientos"] = $id;
            echo "<hr>";
            $x = $this->detInsert($data);
            $j=0;
            $data=[];
          }
          else {
            $j++;
            //echo "<br>".$j."<br>";
          }
        }
        return $x;
    }

    public function detSel($id,$uid)
    {
			$sql="
			SELECT
			fraccDet.Cuenta_Predial,
			fraccDet.Calle,
			fraccDet.Manzana,
			fraccDet.Lote,
			fraccDet.Numero_Ext,
			fraccDet.Numero_Int,
            fraccDet.Colonia,
            fraccDet.Folio,
			fraccDet.Id_Clave
			FROM Claves_Catastrales_Fraccionamientos_Detalles AS fraccDet
			INNER JOIN Claves_Catastrales_Fraccionamientos_Asignacion AS fraccAsign
			ON fraccDet.Id_Fraccionamientos = fraccAsign.Id_Fraccionamiento
			and fraccDet.Cuenta_Predial = fraccAsign.Cuenta_Predial
			WHERE fraccAsign.Id_Fraccionamiento = '$id'
			AND fraccAsign.Id_Auxiliar = '$uid'
			GROUP BY fraccDet.Cuenta_Predial";
		//	echo $sql;
        return $this->con->executeQuerry($sql);
    }

    public function detDel($id)
    {
        return $this->con->sqlOperations("DELETE FROM Claves_Catastrales_Fraccionamientos_Detalles WHERE Id_Fraccionamientos = '$id'");
    }


    public function detUpdate($data, $id,$predial)
    {
        $ups = "";
        foreach(array_keys($data) AS $key)
        {
            if($key != "Id_Fraccionamientos" && $key!="Cuenta_Predial")
                $ups .= "$key = '" . $data[$key] . "',";
        }
        $ups = trim($ups, ",") . " ";
		$sql = "UPDATE Claves_Catastrales_Fraccionamientos_Detalles SET $ups WHERE Id_Fraccionamientos = '$id' and Cuenta_Predial='$predial'";
        return $this->con->sqlOperations($sql);
    }

    function getFieldsVals($data)
    {
        $fields = "(";
        $values = "(";
        foreach(array_keys($data) AS $key)
        {
            $fields .= $key . ",";
            if($key == "Id_Fraccionamientos")
                $values .= "" . $data[$key] . ",";
            else
                $values .= "'" . $data[$key] . "',";
        }
        $fields = trim($fields, ",") . ")";
        $values = trim($values, ",") . ")";
        return [$fields, $values];
    }

    public function getDataInformacionDocumentos($id, $cuenta_predial)
    {
      $query = "SELECT * FROM Cat_Informacion_Documentos WHERE Id_Bd = $id and Numero_Predial = '$cuenta_predial'";
      return $this->con->executeQuerry($query);
    }

		public function getDataDetallesFraccionamiento($idFraccionamiento)
    {
      $query = "SELECT * FROM natural7_vuira.Claves_Catastrales_Fraccionamientos_Detalles WHERE Id_Fraccionamientos = $idFraccionamiento";
      return $this->con->executeQuerry($query);
    }
}

?>
