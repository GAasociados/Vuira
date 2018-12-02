<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ocupacion_de_construccion_model extends CI_Model
{

    public $table = 'ocupacion_de_construccion';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function getMaxItemByid(){
      $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM ocupacion_de_construccion");
      return $consulta->result();
    }
  function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
//        $this->db->where('validacion', 1);
//        $this->db->where('autorizacion', 1);
         $this->db->where('valido_pago', 0);
        return $this->db->get($this->table)->result();
    }

     function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_reporte($fechainicio,$fechafinal,$nombrepropietariodg,$status)
    {
      $SQL = "SELECT * FROM ocupacion_de_construccion WHERE ";

      $nombrepropietariodg = $this->db->escape_like_str($nombrepropietariodg);
      $nombrepropietariodg = str_replace( array("< ",">","[","]","*","^"), "" ,$nombrepropietariodg);

      if (!empty($nombrepropietariodg)) {
        $SQL .=" nombrepropietariodp LIKE '%".$nombrepropietariodg."%' AND ";
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
        $this->db->where('user_id',$this->session->userdata('id'));
        return $this->db->get($this->table)->row();
    }

    function get_by_id_admin($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

     function get_by_id_administrador($id)
    {
        $this->db->like($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
  function total_rows_usuarios($q = NULL) {
    $this->db->where('user_id', $this->session->userdata('id'));
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->order_by('notificacion', 'asc');
   
	$this->db->where('user_id', $this->session->userdata('id'));

	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
 function total_rows_admin($q = NULL) {
    
	$this->db->from($this->table);
        $this->db->where('func', null);
        return $this->db->count_all_results();
    }
     function total_rows_fun($q = NULL) {
    
	$this->db->from($this->table);
        $this->db->where('func', $this->session->userdata('id'));
        return $this->db->count_all_results();
    }
    function get_limit_data_admin($limit, $start = 0, $q = NULL) {
    $this->db->order_by('notificacion', 'desc');
   
//	$this->db->where('user_id', $this->session->userdata('id'));

	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
function get_limit_data_admin_admin($limit, $start = 0, $q = NULL) {
    $this->db->order_by('notificacion', 'desc');
   
//	$this->db->where('user_id', $this->session->userdata('id'));
 $this->db->where('func', null);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function get_limit_data_admin_admin_aut($limit, $start = 0, $q = NULL) {
    $this->db->order_by('notificacion', 'desc');
   
//	$this->db->where('user_id', $this->session->userdata('id'));
 $this->db->where('autorizacion', 0);
 $this->db->where('status >=', 4);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function total_rows_admin_aut($q = NULL) {
    
	$this->db->from($this->table);
        $this->db->where('autorizacion', 0);
        $this->db->where('status >=', 4);
        return $this->db->count_all_results();
    }
    function get_limit_data_admin_fun($limit, $start = 0, $q = NULL) {
    $this->db->order_by('notificacion', 'desc');
   
//	$this->db->where('user_id', $this->session->userdata('id'));
 $this->db->where('func', $this->session->userdata('id'));
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

/* End of file Ocupacion_de_construccion_model.php */
/* Location: ./application/models/Ocupacion_de_construccion_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-07-09 20:25:50 */
/* http://www.ga-asociados.com */