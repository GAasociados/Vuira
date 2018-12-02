<?php

	class Autorizacionocupacionconstruccion_model extends CI_Model
	{
	    
    public $table = 'ocupacion_de_construccion';
    public $id = 'ID';
    public $order = 'DESC';
		public function savetrams($data){
			$data = $this->db->escape_like_str($data);

			$SQL = "INSERT INTO ocupacion_de_construccion (nombrepropietariodg,apellidopaternopropietariodg,apellidomaternopropietariodg,nombresolicitantedg,apellidopaternosolicitantedg,apellidomaternosolicitantedg,calledg,numerodg,coloniadg,correodg,telefonodg,calleui,nodeloteui,manzanaui,nooficialui,cbocolsui,superficiepredioui,superficieconstruidaui,superficieconstruirui,bardeoui,nonivelesui,nocajonesui,noviviendasui,porcentajeavanceui,nombreperitodp,noregistroperitodp,telefonoperitodp,nombreperitoresponsabledp,noregistroresponsabledp,telefonoresponsabledp,periodopermiso,fechainiciodp,fechaterminodp,nocontroldp,user_id,docsbitacora,docsplano,docsvbuenofinales,docspermisoconstruccion,docsreportefotografico,docspago,callenorte,callesur,calleeste,calleoeste,seccion,status) VALUES ('".$data['nombrepropietariodg']."','".$data['apellidopaternopropietariodg']."','".$data['apellidomaternopropietariodg']."','".$data['nombresolicitantedg']."','".$data['apellidopaternosolicitantedg']."','".$data['apellidopaternosolicitantedg']."','".$data['calledg']."','".$data['numerodg']."','".$data['coloniadg']."','".$data['correodg']."','".$data['telefonodg']."','".$data['calleui']."','".$data['nodeloteui']."','".$data['manzanaui']."','".$data['nooficialui']."','".$data['cbocolsui']."','".$data['superficiepredioui']."','".$data['superficieconstruidaui']."','".$data['superficieconstruirui']."','".$data['bardeoui']."','".$data['nonivelesui']."','".$data['nocajonesui']."','".$data['noviviendasui']."','".$data['porcentajeavanceui']."','".$data['nombreperitodp']."','".$data['noregistroperitodp']."','".$data['telefonoperitodp']."','".$data['nombreperitoresponsabledp']."','".$data['noregistroresponsabledp']."','".$data['telefonoresponsabledp']."','".$data['periodopermiso']."','".$data['fechainiciodp']."','".$data['fechaterminodp']."','".$data['nocontroldp']."','".$this->session->userdata("id")."','".$data['docsbitacora']."','".$data['docsplano']."','".$data['docsvbuenofinales']."','".$data['docspermisoconstruccion']."','".$data['docsreportefotografico']."','".$data['docspago']."','".$data['callenorte']."','".$data['callesur']."','".$data['calleeste']."','".$data['calleoeste']."','".$data['seccion']."','1')";
			//Status = 1


			//$resultquery = $this->db->query($SQL);

			$this->db->query($SQL);
			//return $SQL;

			//$this->db->insert("ocupacion_de_construccion",$data);
			//echo $SQL;

			//return $this->db->affected_rows();

			if ($this->db->affected_rows()>0) {
				return true;
			}
			else{
				return false;
			}
		}
		
		function get_reporte($fechainicio,$fechafinal,$apaterno,$status)
		{
			$SQL = "SELECT * FROM ocupacion_de_construccion WHERE ";

			$apaterno = $this->db->escape_like_str($apaterno);
			$apaterno = str_replace( array("< ",">","[","]","*","^"), "" ,$apaterno);

			if (!empty($apaterno)) {
				$SQL .=" apellidopaternopropietariodg LIKE '%".$apaterno."%' AND ";
			}

			$status = $this->db->escape_like_str($status);
			$status = str_replace ( array("< ",">","[","]","*","^"), "" ,$status);

			if (!empty($status)) {
				$SQL .="status = '".$status."' AND ";
			}

			//$fechainicio = $this->db->escape_like_str($fechainicio);
			//$fechainicio = str_replace ( array("< ",">","[","]","*","^"), "" ,$fechainicio);

			if (!empty($fechainicio)) {
				$SQL .="fechainicio >= '".$fechainicio."' AND ";
			}

			//$fechafinal = $this->db->escape_like_str($fechafinal);
			//$fechafinal = str_replace ( array("< ",">","[","]","*","^"), "" ,$fechafinal);

			if (!empty($fechafinal)) {
				$SQL .="fechafinal <= '".$fechafinal."' AND ";
			}

			$SQL .= "1 = 1";

			$consulta = $this->db->query($SQL);

			//$consulta = $this->db->query("SELECT * FROM contratacion_y_servicios_de_agua_y_drenaje_domestico WHERE fechainicio >= '".$fechainicio."' AND fechafinal <= '".$fechafinal."'");

			return $consulta->result();
			//echo $SQL;
		}

	function mostrarById($valor){
		$valor = $this->db->escape_like_str($valor);
		$this->db->where("user_id",$valor);
		$this->db->order_by("ID","DESC");
		$consulta = $this->db->get("ocupacion_de_construccion");
		return $consulta->result();
	 }

	 function mostrarByRegistry($valor){
		 $valor = $this->db->escape_like_str($valor);
		 $this->db->where("ID",$valor);
		 $consulta = $this->db->get("ocupacion_de_construccion");
		 return $consulta->result();
		}

	 function mostrarByStatus(){
		 $this->db->where("status",1);
		 $this->db->order_by("ID","DESC");
		 $consulta = $this->db->get("ocupacion_de_construccion");
		 return $consulta->result();
		}

		function mostrarByStatusDos(){
			$this->db->where("status",2);
			$this->db->order_by("ID","DESC");
			$consulta = $this->db->get("ocupacion_de_construccion");
			return $consulta->result();
		 }

		function mostrarByStatusTres(){
			$this->db->where("status",3);
			$this->db->order_by("ID","DESC");
			$consulta = $this->db->get("ocupacion_de_construccion");
			return $consulta->result();
		}

		function mostrarByStatusCuatro(){
			$this->db->where("status",4);
			$this->db->order_by("ID","DESC");
 		 $consulta = $this->db->get("ocupacion_de_construccion");
 		 return $consulta->result();
		}

	function getMaxItemByid(){
		$consulta = $this->db->query("SELECT MAX(ID) as maximo FROM ocupacion_de_construccion");
		return $consulta->result();
	}

	function mostrarByIdAndUser($valor,$user_id){
		$valor = $this->db->escape_like_str($valor);
		$user_id = $this->db->escape_like_str($user_id);

		/*$consulta = $this->db->query("SELECT * FROM ocupacion_de_construccion WHERE ID = '".$valor."' AND user_id = '".$user_id."'");
		*/
		$consulta = $this->db->query("SELECT * FROM ocupacion_de_construccion WHERE ID = ? AND user_id = ?",array($valor,$user_id));
		return $consulta->result();
	 }

	 function mostrarByIdFuncionario($valor){
		 $valor = $this->db->escape_like_str($valor);
		 /*$consulta = $this->db->query("SELECT * FROM ocupacion_de_construccion WHERE ID = '".$valor."' AND user_id = '".$user_id."'");
		 */
		 $consulta = $this->db->query("SELECT * FROM ocupacion_de_construccion WHERE ID = ?",array($valor));
		 return $consulta->result();
		}

	public function updatetrams($data){
			$data = $this->db->escape_like_str($data);

			$SQL = "UPDATE ocupacion_de_construccion SET nombrepropietariodg = '".$data['nombrepropietariodg']."',nombresolicitantedg = '".$data['nombresolicitantedg']."',apellidopaternopropietariodg = '".$data['apellidopaternopropietariodg']."',apellidomaternopropietariodg = '".$data['apellidomaternopropietariodg']."',apellidopaternosolicitantedg = '".$data['apellidopaternosolicitantedg']."',apellidomaternosolicitantedg = '".$data['apellidomaternosolicitantedg']."',calledg = '".$data['calledg']."',numerodg = '".$data['numerodg']."',coloniadg = '".$data['coloniadg']."',correodg = '".$data['correodg']."',telefonodg = '".$data['telefonodg']."',calleui = '".$data['calleui']."',nodeloteui = '".$data['nodeloteui']."',manzanaui = '".$data['manzanaui']."',nooficialui = '".$data['nooficialui']."',cbocolsui = '".$data['cbocolsui']."',superficiepredioui = '".$data['superficiepredioui']."',superficieconstruidaui = '".$data['superficieconstruidaui']."',superficieconstruirui = '".$data['superficieconstruirui']."',bardeoui = '".$data['bardeoui']."',nonivelesui = '".$data['nonivelesui']."',nocajonesui = '".$data['nocajonesui']."',noviviendasui = '".$data['noviviendasui']."',porcentajeavanceui = '".$data['porcentajeavanceui']."',nombreperitodp = '".$data['nombreperitodp']."',noregistroperitodp = '".$data['noregistroperitodp']."',telefonoperitodp = '".$data['telefonoperitodp']."',nombreperitoresponsabledp = '".$data['nombreperitoresponsabledp']."',noregistroresponsabledp = '".$data['noregistroresponsabledp']."',telefonoresponsabledp = '".$data['telefonoresponsabledp']."',callenorte = '".$data['callenorte']."',callesur = '".$data['callesur']."',calleeste = '".$data['calleeste']."',calleoeste = '".$data['calleoeste']."',seccion = '".$data['seccion']."',status = '1', notificacion = '1'";
			//".$data['docsplano']."".$data['docsbitacora']."".$data['docsvbuenofinales']."".$data['docspermisoconstruccion']."".$data['docsreportefotografico']."
			if (!empty($data['docsplano'])) {
				$SQL.= ", docsplano = '".$data['docsplano']."'";
			}

			if (!empty($data['docsbitacora'])) {
				$SQL.= ", docsbitacora = '".$data['docsbitacora']."'";
			}

			if (!empty($data['docsvbuenofinales'])) {
				$SQL.= ", docsvbuenofinales = '".$data['docsvbuenofinales']."'";
			}

			if (!empty($data['docspermisoconstruccion'])) {
				$SQL.= ", docspermisoconstruccion = '".$data['docspermisoconstruccion']."'";
			}

			if (!empty($data['docsreportefotografico'])) {
				$SQL.= ", docsreportefotografico = '".$data['docsreportefotografico']."'";
			}

			if (!empty($data['docspago'])) {
				$SQL.= ", docspago = '".$data['docspago']."'";
			}

			$SQL.= " WHERE ID = '".$data['ID']."'";

			$this->db->query($SQL);
			//return $SQL;

			if ($this->db->affected_rows()>0) {
				return true;
			}
			else{
				return false;
			}
		}

		public function updatetramsfuncionario($data){
				$data = $this->db->escape_like_str($data);

				$SQL = "UPDATE ocupacion_de_construccion SET periodopermiso = '".$data['periodopermiso']."',nocontroldp = '".$data['nocontroldp']."',fechainiciodp = '".$data['fechainiciodp']."',fechaterminodp = '".$data['fechaterminodp']."',mensaje = '".$data['mensaje']."',status = '".$data['status']."', notificacion = '0'";
				if ($data['status'] == 2) {
					$SQL .= ", fechainicio = '".date("Y-m-d")."'";
				}

				if ($data['status'] >= 3) {
					$SQL .= ", fechafinal = '".date("Y-m-d")."'";
				}
				
				if (!empty($data['docsfinal'])) {
					$SQL.= ", docsfinal = '".$data['docsfinal']."'";
				}
				
				if (!empty($data['docspago'])) {
					$SQL.= ", docspago = '".$data['docspago']."'";
				}
				
				if (!empty($data['doctoverificador'])) {
					$SQL.= ", doctoverificador = '".$data['doctoverificador']."'";
				}
				
				$SQL.= " WHERE ID = '".$data['ID']."'";

				$this->db->query($SQL);
				//return $SQL;

				if ($this->db->affected_rows()>0) {
					return true;
				}
				else{
					return false;
				}
				//return $SQL;
			}
			function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
}
?>
