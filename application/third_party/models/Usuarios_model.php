<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public $table = 'usuarios';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getMaxItemByid() {
        $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM usuarios");
        return $consulta->result();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getverificadores() {
        $SQL = "select * from usuarios where tipo_usu = 166 order by nombres";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }

    function getverificadorbyid($id) {
//        SELECT * FROM usuarios WHERE (ID = 41 AND  tipo_usu = 166) LIMIT 1
        $SQL = "select * from usuarios where ID = '" . $id . "' AND tipo_usu = 166 LIMIT 1";
        //return $this->db->get('colonias');
        $consulta = $this->db->query($SQL);
        //return $id;
        //$this->db->like("apellido_pat",$valor);
        //$consulta = $this->db->get("colonias");
        return $consulta->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_usuarios() {
        $SQL = "select ID,nombres from usuarios where tipo_usu IN(1555,155) order by ID";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }

    function get_usuarios_permisos() {
        $SQL = "select ID,nombres,apellido_pat,apellido_mat from usuarios where tipo_usu IN(12,11) AND admin !=1 order by ID";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }

    function getalladatacoloniabyid($id) {
        $SQL = "select ID,nombres from usuarios where ID = '" . $id . "' LIMIT 1";

        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
        $this->db->or_like('nombres', $q);
        $this->db->or_like('apellido_pat', $q);
        $this->db->or_like('apellido_mat', $q);
        $this->db->or_like('calle', $q);
        $this->db->or_like('colonia', $q);
        $this->db->or_like('cp', $q);
        $this->db->or_like('correo', $q);
        $this->db->or_like('telefono', $q);
        $this->db->or_like('contrasena', $q);
        $this->db->or_like('tipo_usu', $q);

        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {

        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
        $this->db->or_like('nombres', $q);
        $this->db->or_like('apellido_pat', $q);
        $this->db->or_like('apellido_mat', $q);
        $this->db->or_like('calle', $q);
        $this->db->or_like('colonia', $q);
        $this->db->or_like('cp', $q);
        $this->db->or_like('correo', $q);
        $this->db->or_like('telefono', $q);
        $this->db->or_like('contrasena', $q);
        $this->db->or_like('tipo_usu', $q);
        $this->db->limit($limit, $start);

        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function updatep($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        $r = $this->db->affected_rows() > 0;

        return $r;
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-07-24 15:47:44 */
/* http://www.ga-asociados.com */