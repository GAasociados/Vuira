<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Citas_model extends CI_Model {

	private $table = 'citas';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("
				citas.*, 
				user.nombres, 
				user.apellido,  
				departamento.nombre
			")
			->from($this->table)
			->join('user','user.id = citas.user_id')
			->join('departamento','departamento.dprt_id = citas.departamento_id')
			->order_by('citas.id','desc')
			->get()
			->result();
	} 
 
	public function read_by_id($citas_id = null)
	{ 
		return $this->db->select("
				citas.*, 
				citas.citas_id, 
				citas.serial_no, 
				citas.asunto, 
				citas.dia, 
                                citas.hora_cita, 
				user.nombres, 
				user.apellido,  
				user.foto,  
				user.rango,
                                user.email,
				departamento.nombre as departamento,
				horarios.dias_disponibles,
				horarios.tiempo_inicio,
				horarios.tiempo_final,
				ciudadano.nombres AS pfirstname,
				ciudadano.apellidos AS plastname,
				ciudadano.fecha_cumple,
				ciudadano.sexo,
				ciudadano.celular,
				ciudadano.foto,
			")
			->from($this->table)
			->where('citas.citas_id',$citas_id)
			->join('user','user.id = citas.user_id','left')
			->join('departamento','departamento.dprt_id = citas.departamento_id','left')
			->join('ciudadano','ciudadano.ciudadano_id = citas.ciudadano_id')
			->join('horarios','horarios.id = citas.horarios_id','left')
			->order_by('citas.id','desc')
			->get()
			->row();
	}  
 
	public function delete($citas_id = null)
	{
		$this->db->where('citas_id',$citas_id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
 
	
 }
