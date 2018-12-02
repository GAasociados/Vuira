<?php
	//error_reporting(E_ALL);
	//ini_set("display_errors",1);
	include "../DataConexion.php";
		
		///NECESITAS TODOS ESTOS VALORES POR POST
		$con = new conection();
		$predialui = (isset($_POST['predialui'])) ? $_POST['predialui'] : null;
		$domicilio = (isset($_POST['domicilio'])) ? $_POST['domicilio'] : null;
		$telefonodp = (isset($_POST['telefononotificacionesdp'])) ? $_POST['telefononotificacionesdp'] : null;
		$tipotramitedp = (isset($_POST['tipotramitedp'])) ? $_POST['tipotramitedp'] : null;
		$motivotramitedp = (isset($_POST['motivotramitedp'])) ? $_POST['motivotramitedp'] : null;
		$tipopersona = (isset($_POST['tipopersona'])) ? $_POST['tipopersona'] : null;
		//var_dump($telefonodp);

		$fisrfc = ($_FILES['fisrfc']["error"] != 4) ? subirArchivo($_FILES['fisrfc'], "rfc") : null;
		$acta_const = ($_FILES['acta_const']["error"] != 4) ? subirArchivo($_FILES['acta_const'], "actaconst") : null;
		$poder_nota = ($_FILES['poder_nota']["error"] != 4) ? subirArchivo($_FILES['poder_nota'], "podernota") : null;
		$morine = ($_FILES['morine']["error"] != 4) ? subirArchivo($_FILES['morine'], "morine") : null;
		$doctolegalpropiedad = ($_FILES['doctolegalpropiedad']["error"] != 4) ? subirArchivo($_FILES['doctolegalpropiedad'], "doctolepro") : null;
		$doctopredial = ($_FILES['doctopredial']["error"] != 4) ? subirArchivo($_FILES['doctopredial'], "doctopredial") : null;



		//$iterator = new DirectoryIterator(dirname(__FILE__));
		//echo $iterator->getPath();
		//print_r(json_encode($_FILES));
		$sql = "INSERT INTO  claves_catastrales_individual (predialui, domicilio, telefonodp, tipotramitedp, motivotramitedp, tipopersona, fisrfc, acta_const, poder_nota, morine, doctolegalpropiedad, doctopredial,status,numerocontrol) VALUES('".$predialui."' , '".$domicilio."' , '".$telefonodp."' , '".$tipotramitedp."' , '".$motivotramitedp."' , '".$tipopersona."' , '".$fisrfc."' , '".$acta_const."' , '".$poder_nota."' , '".$morine."' , '".$doctolegalpropiedad."' , '".$doctopredial."', 1 , '0001')";

		$con->sqlOperations($sql);
		//var_dump($sql);

		echo "
			<script>
				alert('Trámite realizado.');
				window.location.href = 'https://vuira.irapuato.gob.mx/infotramites/info_atencion_de_claves_catastrales_individual';
			</script>
		";

		function subirArchivo($file, $name)
		{
			$dir_subida = "/var/www/html/vuira/assets/tramites/clavescatastralesindividual/";
			$ruta = $dir_subida  . "file-" . basename(date("YmdHis") . "_" . $name  . "_" . $file['name']);
			move_uploaded_file($file['tmp_name'], $ruta);
			//print_r($file);
			//echo "<br>";
			return $ruta;
		}

?>