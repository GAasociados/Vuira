<?php 

	class Clavescatastralesindividual_model extends CI_Model
	{

		public function savetrams($data){
			$data = $this->db->escape_like_str($data);

			$SQL = "INSERT INTO claves_catastrales_individual (calleui,predialui,noloteui,nomanzanaui,nooficialui,cbocoloniaui,categoriapredioui,superficieterrenoui,superficieconstruccionui,callenorteui,callesurui,calleorienteui,calleponienteui,ubucacioncroquisui,nombrepropietariodp,nombrerepresentantelegaldp,calledp,numerodp,coloniadp,telefonodp,callenotificacionesdp,numeronotificacionedp,colonianotificacionesdp,correonotificacionesdp,telefononotificacionesdp,tipotramitedp,servicioagua,serviciopavimento,serviciodrenaje,serviciobanqueta,servicioluz,serviciotelefono,edadestimada,herreria,muros,instelectricas,columnas,instsanitarias,entrepisos,instespeciales,techos,acabadosext,pisos,pintura,puertas,mueblebaño,ventanas,fachada,carpinteria,noplantas,doctoife,podersimple,documentolegalpropiedad,escritura,oficiodetrazaautorizada,planofisicodetrazaautorizada,status,usuarioID) VALUES ('".$data['calleui']."','".$data['predialui']."','".$data['noloteui']."','".$data['nomanzanaui']."','".$data['nooficialui']."','".$data['cbocoloniaui']."','".$data['categoriapredioui']."','".$data['superficieterrenoui']."','".$data['superficieconstruccionui']."','".$data['callenorteui']."','".$data['callesurui']."','".$data['calleorienteui']."','".$data['calleponienteui']."','".$data['ubucacioncroquisui']."','".$data['nombrepropietariodp']."','".$data['nombrerepresentantelegaldp']."','".$data['calledp']."','".$data['numerodp']."','".$data['coloniadp']."','".$data['telefonodp']."','".$data['callenotificacionesdp']."','".$data['numeronotificacionedp']."','".$data['colonianotificacionesdp']."','".$data['correonotificacionesdp']."','".$data['telefononotificacionesdp']."','".$data['tipotramitedp']."','".$data['servicioagua']."','".$data['serviciopavimento']."','".$data['serviciodrenaje']."','".$data['serviciobanqueta']."','".$data['servicioluz']."','".$data['serviciotelefono']."','".$data['edadestimada']."','".$data['herreria']."','".$data['muros']."','".$data['instelectricas']."','".$data['columnas']."','".$data['instsanitarias']."','".$data['entrepisos']."','".$data['instespeciales']."','".$data['techos']."','".$data['acabadosext']."','".$data['pisos']."','".$data['pintura']."','".$data['puertas']."','".$data['mueblebaño']."','".$data['ventanas']."','".$data['fachada']."','".$data['carpinteria']."','".$data['noplantas']."','".$data['doctoife']."','".$data['podersimple']."','".$data['documentolegalpropiedad']."','".$data['escritura']."','".$data['oficiodetrazaautorizada']."','".$data['planofisicodetrazaautorizada']."','".$data['status']."','".$this->session->userdata("id")."')";

			$this->db->query($SQL);
			
			if ($this->db->affected_rows()>0) {
				return true;
			}
			else{
				return false;
			}
		}

	function getMaxItemByid(){
		$consulta = $this->db->query("SELECT MAX(ID) as maximo FROM claves_catastrales_individual");
		return $consulta->result();
	}

	function mostrarById($valor){
		$valor = $this->db->escape_like_str($valor);
		$this->db->where("usuarioID",$valor);
		$consulta = $this->db->get("claves_catastrales_individual");
		
		return $consulta->result();
	 }

	function mostrarByIdAndUser($valor,$user_id){
		$valor = $this->db->escape_like_str($valor);
		$user_id = $this->db->escape_like_str($user_id);

		$consulta = $this->db->query("SELECT * FROM claves_catastrales_individual WHERE ID = ? AND usuarioID = ?",array($valor,$user_id));

		return $consulta->result();
	 }


	}
?>