<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once( "../DataConexion.php");


$obj = new coreFracc();

//$data = ["Status" => "22", "Fecha_Creacion" => "1", "Propietario" => "1", "Correo_Electronico" => "1", "Telefono" => "1", "Tipo_Tramite" => "1", "Doc_Identificacion" => "22", "Doc_Plano_Digital" => "1", "Doc_Acta" => "1", "Doc_Oficio_Traza" => "1", "Doc_Plano_Fisico" => "1", "Doc_Escritura_Publica" => "1", "Doc_Resibo_Predial" => "1"];

//print_r($obj->coreUpdate($data, $_FILES, 1));
if(isset($_GET['service_name']))
{
	switch ($_GET['service_name'])
	{
		case 'insertcore': //EL DICCIONARIO DE DATOS PASA POR MÉTODO POST PARA MÁS COMODIDAD, ENTRE COMENTARIOS ESTÁ LA VARIABLE DATA
            print_r(json_encode($obj->coreInsert($_POST["data"], $_FILES), JSON_UNESCAPED_SLASHES));
		break;
    case 'byidcore':
            print_r(json_encode($obj->coreSel((isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : -1))), JSON_UNESCAPED_SLASHES));
    break;
		case 'updatecore': //EL DICCIONARIO DE DATOS PASA POR POST AL IGUAL QUE EL ID
            print_r(json_encode($obj->coreUpdate($_POST["data"], $_FILES, $_POST['id']), JSON_UNESCAPED_SLASHES));
    break;
		case 'getAll':
						print_r(json_encode($obj->getAllFraccionamientos(), JSON_UNESCAPED_SLASHES));
		break;
		case 'getSinAsignar':
						print_r(json_encode($obj->getAllFraccionamientosSinAsignar(), JSON_UNESCAPED_SLASHES));
		break;
		case 'getByAuxiliar':
						print_r(json_encode($obj->getAllFraccionamientosByAuxiliar((isset($_GET["auxiliar"]) ? $_GET["auxiliar"] : (isset($_POST["auxiliar"]) ? $_POST["auxiliar"] : -1))), JSON_UNESCAPED_SLASHES));
		break;
		default:
			echo "El servicio no existe. / Service doesn't exist.";
		break;
	}
}

//(isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : -1))

class coreFracc
{
	public function __construct()
	{
		$this->con = new conection();
	}

    //RECIBE DICCIONARIO DE DATOS [Status => "", Fecha_Creacion => "", Propietario =>, Correo_Electronico ...
	public function coreInsert($data, $files)
	{
        /*["Status" => "1", "Fecha_Creacion" => "1", "Propietario" => "1", "Correo_Electronico" => "1", "Telefono" => "1", "Tipo_Tramite" => "1", "Doc_Identificacion" => "1", "Doc_Plano_Digital" => "1", "Doc_Acta" => "1", "Doc_Oficio_Traza" => "1", "Doc_Plano_Fisico" => "1", "Doc_Escritura_Publica" => "1", "Doc_Resibo_Predial" => "1"]*/
        $this->testFiles($data, $files);

        $fieldvals = $this->getFieldsVals($data);
        return $this->con->sqlOperations("INSERT INTO Claves_Catastrales_Fraccionamientos $fieldvals[0] VALUES $fieldvals[1]");
		//return $this->con->insert_id;
	}

    public function coreSel($id)
    {
        return $this->con->executeQuerry("SELECT * FROM Claves_Catastrales_Fraccionamientos WHERE Id = '$id'");
    }

		public function getAllFraccionamientos()
    {
				$sql = "SELECT * FROM claves_catastrales_fraccionamientos AS fracc INNER JOIN   claves_catastrales_fraccionamientos_detalles AS fraccDet
                    ON fracc.Id = fraccDet.Id_Fraccionamientos GROUP BY fracc.Id";
        return $this->con->executeQuerry($sql);
    }

		public function getAllFraccionamientosByAuxiliar($idAuxiliar)
    {
				$sql = <<<EOD
						SELECT cc.Id,cc.Propietario,cc.Correo_Electronico,cc.Telefono FROM Claves_Catastrales_Fraccionamientos as cc
						inner join Claves_Catastrales_Fraccionamientos_Asignacion as cca
						on cc.Id = cca.Id_Fraccionamiento
						where cca.Id_Auxiliar=$idAuxiliar GROUP BY cc.Id
EOD;
			//echo $sql;

        return $this->con->executeQuerry($sql);
    }

		public function getAllFraccionamientosSinAsignar()
    {
				$sql = "SELECT * FROM Claves_Catastrales_Fraccionamientos where Status='Sin Asignar'";
        return $this->con->executeQuerry($sql);
    }

    public function coreUpdate($data, $files, $id)
    {

        $this->testFiles($data, $files);

        $ups = "";
        foreach(array_keys($data) AS $key)
        {
					if($key!="id")
            $ups .= "$key = '" . $data[$key] . "',";
        }
        $ups = trim($ups, ",") . " ";
				$sql="UPDATE Claves_Catastrales_Fraccionamientos SET $ups WHERE Id = '$id'";
				echo $sql;
        return $this->con->sqlOperations($sql);

    }

    function getFieldsVals($data)
    {
        $fields = "(";
        $values = "(";
        foreach(array_keys($data) AS $key)
        {
            $fields .= $key . ",";
            $values .= "'" . $data[$key] . "',";
        }
        $fields = trim($fields, ",") . ")";
        $values = trim($values, ",") . ")";
        return [$fields, $values];
    }

    function subirArchivo($file, $name)
    {
        $dir_subida = "/var/www/html/vuira/assets/tramites/clavescatastralesfraccionamiento/";
        $ruta = $dir_subida  . "file-" . basename(date("YmdHis") . "_" . $name  . "_" . $file['name']);
				$rutabd = "file-" . basename(date("YmdHis") . "_" . $name  . "_" . $file['name']);
        move_uploaded_file($file['tmp_name'], $ruta);
        return $rutabd;
    }

    function testFiles(&$data, $files)
    {
        if($files)
        {
            $data["Doc_Identificacion"] = ($files['Doc_Identificacion']["error"] != 4) ? $this->subirArchivo($files['Doc_Identificacion'], "identificacion") : "";
            $data["Doc_Plano_Digital"] = ($files['Doc_Plano_Digital']["error"] != 4) ? $this->subirArchivo($files['Doc_Plano_Digital'], "planodigital") : "";
            $data["Doc_Acta"] = ($files['Doc_Acta']["error"] != 4) ? $this->subirArchivo($files['Doc_Acta'], "acta") : "";
            $data["Doc_Oficio_Traza"] = ($files['Doc_Oficio_Traza']["error"] != 4) ? $this->subirArchivo($files['Doc_Oficio_Traza'], "oficiotraza") : "";
            $data["Doc_Plano_Fisico"] = ($files['Doc_Plano_Fisico']["error"] != 4) ? $this->subirArchivo($files['Doc_Plano_Fisico'], "planofisico") : "";
            $data["Doc_Escritura_Publica"] = ($files['Doc_Escritura_Publica']["error"] != 4) ? $this->subirArchivo($files['Doc_Escritura_Publica'], "escriturapublica") : "";
            $data["Doc_Resibo_Predial"] = ($files['Doc_Resibo_Predial']["error"] != 4) ? $this->subirArchivo($files['Doc_Resibo_Predial'], "recibopredial") : "";
        }
    }
}

?>
