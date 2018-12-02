<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes_model extends CI_Model {

    public $table = 'solicitudes';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('usuario_id', $q);
        $this->db->or_like('motivo', $q);
        $this->db->or_like('fecha_solicitud', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('usuario_id', $q);
        $this->db->or_like('motivo', $q);
        $this->db->or_like('fecha_solicitud', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
          return true;
        }
        else{
              return false; // to the controller
        }
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        
    }

}

/* End of file Solicitudes_model.php */
/* Location: ./application/models/Solicitudes_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-09-13 20:14:57 */
/* http://www.ga-asociados.com */