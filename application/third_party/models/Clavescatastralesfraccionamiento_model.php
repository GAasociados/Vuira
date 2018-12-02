<?php

	class Clavescatastralesfraccionamiento_model extends CI_Model
	{
	public function savetrams($data){
			$data = $this->db->escape_like_str($data);

			$SQL = "INSERT INTO claves_catastrales_fraccionamiento (calleui,noloteui,nomanzanaui,nooficialui,cbocoloniaui,predialui,superficiepredioui,usopredioui,callenorteui,callesurui,calleorienteui,calleponienteui,ubucacioncroquisui,nombrepropietariodp,calledp,numerodp,coloniadp,correodp,telefonodp,tipotramitedp,doctoife,podersimple,escriturapublica,recibopredial,oficiodetrazaautorizada,planofisicodetrazaautorizada,status,usuarioID) VALUES ('".$data['calleui']."','".$data['noloteui']."','".$data['nomanzanaui']."','".$data['nooficialui']."','".$data['cbocoloniaui']."','".$data['predialui']."','".$data['superficiepredioui']."','".$data['usopredioui']."','".$data['callenorteui']."','".$data['callesurui']."','".$data['calleorienteui']."','".$data['calleponienteui']."','".$data['ubucacioncroquisui']."','".$data['nombrepropietariodp']."','".$data['calledp']."','".$data['numerodp']."','".$data['coloniadp']."','".$data['correodp']."','".$data['telefonodp']."','".$data['tipotramitedp']."','".$data['doctoife']."','".$data['podersimple']."','".$data['escriturapublica']."','".$data['recibopredial']."','".$data['oficiodetrazaautorizada']."','".$data['planofisicodetrazaautorizada']."','".$data['status']."','".$this->session->userdata("id")."')";

			$this->db->query($SQL);

			if ($this->db->affected_rows()>0) {
				return true;
			}
			else{
				return false;
			}

			//return $data['nombrepropietarioinmuebledg'];
		}

	function getMaxItemByid(){
		$consulta = $this->db->query("SELECT MAX(ID) as maximo FROM claves_catastrales_fraccionamiento");
		return $consulta->result();
	}

	function mostrarById($valor){
		$valor = $this->db->escape_like_str($valor);
		$this->db->where("usuarioID",$valor);
		$consulta = $this->db->get("claves_catastrales_fraccionamiento");
		return $consulta->result();
	 }

	function mostrarByIdAndUser($valor,$user_id){
		$valor = $this->db->escape_like_str($valor);
		$user_id = $this->db->escape_like_str($user_id);

		$consulta = $this->db->query("SELECT * FROM claves_catastrales_fraccionamiento WHERE ID = ? AND usuarioID = ?",array($valor,$user_id));

		return $consulta->result();
	 }
 }
?>
