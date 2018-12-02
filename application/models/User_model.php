<?php
	class User_model extends CI_Model
	{
		public function insertar($data){
			

			//Validar Nombre de la Tabala
			$SQL = "INSERT INTO usuarios (nombres,apellido_pat,apellido_mat,curp,calle,colonia,cp,correo,telefono,contrasena,tipo_usu) VALUES ('".$data['nombres']."','".$data['apellido_pat']."','".$data['apellido_mat']."','".$data['curp']."','".$data['calle']."','".$data['colonia']."','".$data['cp']."','".$data['correo']."','".$data['telefono']."','".$data['contrasena']."','4')";
            
            
			//$resultquery = $this->db->query($SQL);
			$this->db->query($SQL);
			//$this->db->insert("usuarios",$data);
             
			//return $this->db->affected_rows();
			//Si se registró
			if ($this->db->affected_rows()>0) {
				return true;
			}
			else{
				return false;
			}
	}
 public function insertar_fun($data) {

        //Validar Nombre de la Tabala
        $SQL = "INSERT INTO usuarios (nombres,apellido_pat,apellido_mat,calle,colonia,cp,correo,telefono,contrasena,tipo_usu,direccion,admin) VALUES ('" . $data['nombres'] . "','" . $data['apellido_pat'] . "','" . $data['apellido_mat'] . "','" . $data['calle'] . "','" . $data['colonia'] . "','" . $data['cp'] . "','" . $data['correo'] . "','" . $data['telefono'] . "','" . $data['contrasena'] . "','" . $data['tipo_usu'] ."','".$data['direccion']."','".$data['admin']."')";
 
        //$resultquery = $this->db->query($SQL);
        $this->db->query($SQL);
        //$this->db->insert("usuarios",$data);
        //return $this->db->affected_rows();
        //Si se registró

        
        if ($this->db->affected_rows() > 0) {
            
            return true;
        } else {
            return false;
        }
    }
	public function insertarpersonamoral($data){
		

		//Validar Nombre de la Tabala
		$SQL = "INSERT INTO usuarios (nombres,apellido_pat,calle,colonia,cp,correo,telefono,contrasena,tipo_usu,rfc) VALUES ('".$data['nombres']."','".$data['apellido_pat']."','".$data['calle']."','".$data['colonia']."','".$data['cp']."','".$data['correo']."','".$data['telefono']."','".$data['contrasena']."','3','".$data['rfc']."')";

		//$resultquery = $this->db->query($SQL);
		$this->db->query($SQL);
		//$this->db->insert("usuarios",$data);

		//return $this->db->affected_rows();
		//Si se registró
		if ($this->db->affected_rows()>0) {
			return true;
		}
		else{
			return false;
		}
}

	function mostrar($valor){
		
		$this->db->like("apellido_pat",$valor);
		$consulta = $this->db->get("usuarios");
		return $consulta->result();
	 }

	public function getUserByCorreo($correo){
	 $result = $this->db->query("SELECT correo FROM usuarios WHERE correo = '".$correo."' LIMIT 1");
	 //Convertir a una fila
	 return $result->row();
 	}

 	public function getUserById($id){
		$result = $this->db->query("SELECT * FROM usuarios WHERE ID = '".$id."' LIMIT 1");
		//Convertir a una fila
		return $result->row();
	}
	
	public function newpassword($correo,$pass){
		$correo = $this->db->escape_like_str($correo);
		$correo = str_replace( array("< ",">","[","]","*","^",'!'), "" ,$correo);

		$SQL = "UPDATE usuarios SET contrasena = '".$pass."' WHERE correo = '".$correo."';";

		//$resultquery = $this->db->query($SQL);
		$this->db->query($SQL);


	}

	public function modificar($data){
			

			//Validar Nombre de la Tabala
			/*
			$SQL = "UPDATE usuarios SET nombres = '".$data["nombres"]."',apellido_pat = '".$data["apellido_pat"]."',apellido_mat = '".$data["apellido_mat"]."',calle = '".$data["calle"]."',colonia = '".$data["colonia"]."',cp = '".$data["cp"]."',correo = '".$data["correo"]."',telefono = '".$data["telefono"]."' WHERE ID = '".$this->session->userdata("id")."';";
			*/

			$SQL = "UPDATE usuarios SET nombres = '".$data["nombres"]."',apellido_pat = '".$data["apellido_pat"]."',apellido_mat = '".$data["apellido_mat"]."',rfc = '".$data["rfc"]."',curp = '".$data["curp"]."',calle = '".$data["calle"]."',colonia = '".$data["colonia"]."',cp = '".$data["cp"]."',correo = '".$data["correo"]."',telefono = '".$data["telefono"]."' WHERE ID = '".$this->session->userdata("id")."';";

			//$resultquery = $this->db->query($SQL);
			$this->db->query($SQL);
			//$this->db->insert("usuarios",$data);

			//return $this->db->affected_rows();

			if ($this->db->affected_rows()>0) {
				return true;
			}
			else{
				return false;
			}
	}
	}
?>
