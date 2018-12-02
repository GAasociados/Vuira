<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permiso_anuncios_adosados_model extends CI_Model
{

    public $table = 'permiso_anuncios_adosados';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
  function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
//        $this->db->where('validacion', 1);
//        $this->db->where('autorizacion', 1);
         $this->db->where('valido_pago', 0);
        return $this->db->get($this->table)->result();
    }

    function get_reporte($fechainicio,$fechafinal,$nombrepropietario,$status)
    {
      $SQL = "SELECT * FROM ".$this->table." WHERE ";

      $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
      $nombrepropietario = str_replace( array("< ",">","[","]","*","^"), "" ,$nombrepropietario);

      if (!empty($nombrepropietario)) {
        $SQL .=" nombrepropietarioinmuebledg LIKE '%".$nombrepropietario."%' AND ";
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

    function getMaxItemByid(){
      $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM permiso_anuncios_adosados");
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
        $this->db->like($this->id, $id);
        $this->db->where('usuarioID',$this->session->userdata('id'));
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
     function total_rows_admin($q = NULL) {
            $this->db->where('func',null);
	$this->db->from($this->table);
        
    return $this->db->count_all_results();
    }
  function total_rows_usuario($q = NULL) {
       
	$this->db->from($this->table);
    return $this->db->count_all_results();
    }
    function total_rows_func($q = NULL) {
       $this->db->where('func', $this->session->userdata('id'));
	$this->db->from($this->table);
    return $this->db->count_all_results();
    }
    function get_limit_data_admin($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', $this->order);
    
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
function get_limit_data_admin_admin($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', $this->order);
         $this->db->where('func',null);
        $this->db->limit($limit, $start);
        
        return $this->db->get($this->table)->result();
    }
    function get_limit_data_admin_admin_aut($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', $this->order);
       $this->db->where('autorizacion',0);
            $this->db->where('status >=',4);
        $this->db->limit($limit, $start);
        
        return $this->db->get($this->table)->result();
    }
     function total_rows_admin_aut($q = NULL) {
            $this->db->where('autorizacion',0);
            $this->db->where('status >=',4);
	$this->db->from($this->table);
        
    return $this->db->count_all_results();
    }
function get_limit_data_admin_func($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', $this->order);
        $this->db->where('func', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        
        return $this->db->get($this->table)->result();
    }
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', 'asc');
           $this->db->where('usuarioID',$this->session->userdata('id'));
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

/* End of file Permiso_anuncios_adosados_model.php */
/* Location: ./application/models/Permiso_anuncios_adosados_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-05-27 16:35:50 */
/* http://www.ga-asociados.com */
