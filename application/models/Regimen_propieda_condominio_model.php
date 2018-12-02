<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regimen_propieda_condominio_model extends CI_Model
{

    public $table = 'regimen_propieda_condominio';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
 function getMaxItemByid(){
      $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM regimen_propieda_condominio");
      return $consulta->result();
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('tipo_tramite', $q);
	$this->db->or_like('domicilio_calle', $q);
	$this->db->or_like('no_lote', $q);
	$this->db->or_like('manzana', $q);
	$this->db->or_like('numero_oficial', $q);
	$this->db->or_like('colonia_inmueble', $q);
	$this->db->or_like('cuenta_predial', $q);
	$this->db->or_like('nombre_del_contribuyente', $q);
	$this->db->or_like('domicilio_del_contribuyente', $q);
	$this->db->or_like('telefono_del_contribuyente', $q);
	$this->db->or_like('colonia_del_contribuyente', $q);
	$this->db->or_like('nombre_perito_valuador', $q);
	$this->db->or_like('domicilio_perito_valuador', $q);
	$this->db->or_like('colonia_perito_valuador', $q);
	$this->db->or_like('no_perito', $q);
	$this->db->or_like('telefonos_perito', $q);
	$this->db->or_like('superficie_predio', $q);
	$this->db->or_like('uso_actual_predio', $q);
	$this->db->or_like('tipo_regimen', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('mensaje', $q);
	$this->db->or_like('documento_pago', $q);
	$this->db->or_like('fecha_pago', $q);
	$this->db->or_like('documento_final', $q);
	$this->db->or_like('fecha_tramite', $q);
	$this->db->or_like('fecha_autorizacion', $q);
	$this->db->or_like('usuario_id', $q);
	$this->db->or_like('escrituras', $q);
	$this->db->or_like('oficio_traza', $q);
	$this->db->or_like('planos_autorizados', $q);
	$this->db->or_like('planos_particulares', $q);
	$this->db->or_like('memoria_descriptiva', $q);
	$this->db->or_like('acreditacion_representante', $q);
	$this->db->or_like('recibo_pago', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('tipo_tramite', $q);
	$this->db->or_like('domicilio_calle', $q);
	$this->db->or_like('no_lote', $q);
	$this->db->or_like('manzana', $q);
	$this->db->or_like('numero_oficial', $q);
	$this->db->or_like('colonia_inmueble', $q);
	$this->db->or_like('cuenta_predial', $q);
	$this->db->or_like('nombre_del_contribuyente', $q);
	$this->db->or_like('domicilio_del_contribuyente', $q);
	$this->db->or_like('telefono_del_contribuyente', $q);
	$this->db->or_like('colonia_del_contribuyente', $q);
	$this->db->or_like('nombre_perito_valuador', $q);
	$this->db->or_like('domicilio_perito_valuador', $q);
	$this->db->or_like('colonia_perito_valuador', $q);
	$this->db->or_like('no_perito', $q);
	$this->db->or_like('telefonos_perito', $q);
	$this->db->or_like('superficie_predio', $q);
	$this->db->or_like('uso_actual_predio', $q);
	$this->db->or_like('tipo_regimen', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('mensaje', $q);
	$this->db->or_like('documento_pago', $q);
	$this->db->or_like('fecha_pago', $q);
	$this->db->or_like('documento_final', $q);
	$this->db->or_like('fecha_tramite', $q);
	$this->db->or_like('fecha_autorizacion', $q);
	$this->db->or_like('usuario_id', $q);
	$this->db->or_like('escrituras', $q);
	$this->db->or_like('oficio_traza', $q);
	$this->db->or_like('planos_autorizados', $q);
	$this->db->or_like('planos_particulares', $q);
	$this->db->or_like('memoria_descriptiva', $q);
	$this->db->or_like('acreditacion_representante', $q);
	$this->db->or_like('recibo_pago', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    

    function get_by_id_admin($id)
    {
      $this->db->like($this->id, $id);
        return $this->db->get($this->table)->row();
    }

      function get_by_id_administrador($id)
    {
        $this->db->like($this->id, $id);
        return $this->db->get($this->table)->row();
    }


}

/* End of file Regimen_propieda_condominio_model.php */
/* Location: ./application/models/Regimen_propieda_condominio_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-08-04 20:03:26 */
/* http://www.ga-asociados.com */