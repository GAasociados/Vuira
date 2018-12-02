<?php 

	class Peritos_model extends CI_Model
	{

	function getperitos(){
		$SQL = "select * from peritos order by nombre";
		//return $this->db->get('colonias');
		return $this->db->query($SQL);
	 }

	function getperitosespecializados(){
		$SQL = "select * from peritosesp order by nombre";
		//return $this->db->get('colonias');
		return $this->db->query($SQL);
	 }

	 function getperitosbyid($id){
		$SQL = "select * from peritos where ID = '".$id."' LIMIT 1";
		//return $this->db->get('colonias');
		$consulta = $this->db->query($SQL);
		//return $id;

		//$this->db->like("apellido_pat",$valor);
		//$consulta = $this->db->get("colonias");
		return $consulta->result();
	 }

	function getperitosespbyid($id){
		$SQL = "select * from peritosesp where ID = '".$id."' LIMIT 1";
		//return $this->db->get('colonias');
		$consulta = $this->db->query($SQL);
		//return $id;

		//$this->db->like("apellido_pat",$valor);
		//$consulta = $this->db->get("colonias");
		return $consulta->result();
	 }
	}
?>