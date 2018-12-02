<?php
	class Login_model extends CI_Model
	{
		public function LogIn($data){
			
			//$username = $this->db->escape_like_str($data['username']);
			//$password = $this->db->escape_like_str($data['password']);
				$SQL = "SELECT * FROM usuarios WHERE correo = '".$data['username']."' AND contrasena = '".$data['password']."'";
			
				$resultquery = $this->db->query($SQL);
 
				if ($resultquery->row()) {
					return $resultquery->row();
				}
				else{
					return false;
				}
		}
                public function user($data){
			
			//$username = $this->db->escape_like_str($data['username']);
			//$password = $this->db->escape_like_str($data['password']);
				$SQL = "SELECT * FROM usuarios WHERE correo ='".$data['username']."'";
				$resultquery = $this->db->query($SQL);

				if ($resultquery->row()) {
					return $resultquery->row();
				}
				else{
					return false;
				}
		}
                
		
	}
?>