<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Avaluos_rusticos_model extends CI_Model
{

    public $table = 'avaluos_rusticos';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    function getMaxItemByid(){
      $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM avaluos_rusticos");
      return $consulta->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_reporte($fechainicio,$fechafinal,$nombrepropietario,$status)
    {
      $SQL = "SELECT * FROM ".$this->table." WHERE ";

      $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
      $nombrepropietario = str_replace( array("< ",">","[","]","*","^"), "" ,$nombrepropietario);

      if (!empty($nombrepropietario)) {
        $SQL .=" nombresolicitante LIKE '%".$nombrepropietario."%' AND ";
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->like($this->id, $id);
        $this->db->where('usuarioID',$this->session->userdata('id'));
        return $this->db->get($this->table)->row();
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


    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
	$this->db->or_like('motivo', $q);
	$this->db->or_like('nombresolicitante', $q);
	$this->db->or_like('nombrepropietario', $q);
	$this->db->or_like('calle', $q);
	$this->db->or_like('numero', $q);
	$this->db->or_like('colonia', $q);
	$this->db->or_like('municipio', $q);
	$this->db->or_like('localidad', $q);
	$this->db->or_like('correo', $q);
	$this->db->or_like('telefono', $q);
	$this->db->or_like('perito', $q);
	$this->db->or_like('documentofinal', $q);
    $this->db->or_like('doctopago', $q);
	$this->db->or_like('usuarioID', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('mensaje', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
	$this->db->or_like('motivo', $q);
	$this->db->or_like('nombresolicitante', $q);
	$this->db->or_like('nombrepropietario', $q);
	$this->db->or_like('calle', $q);
	$this->db->or_like('numero', $q);
	$this->db->or_like('colonia', $q);
	$this->db->or_like('municipio', $q);
	$this->db->or_like('localidad', $q);
	$this->db->or_like('correo', $q);
	$this->db->or_like('telefono', $q);
	$this->db->or_like('perito', $q);
	$this->db->or_like('documentofinal', $q);
    $this->db->or_like('doctopago', $q);
	$this->db->or_like('usuarioID', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('mensaje', $q);
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

}

/* End of file Avaluos_rusticos_model.php */
/* Location: ./application/models/Avaluos_rusticos_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-06-13 19:40:38 */
/* http://www.ga-asociados.com */
