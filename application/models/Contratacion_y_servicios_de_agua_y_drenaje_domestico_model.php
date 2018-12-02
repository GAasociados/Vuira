<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contratacion_y_servicios_de_agua_y_drenaje_domestico_model extends CI_Model
{

    public $table = 'contratacion_y_servicios_de_agua_y_drenaje_domestico';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function getMaxItemByid(){
      $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM contratacion_y_servicios_de_agua_y_drenaje_domestico");
      return $consulta->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_reporte($fechainicio,$fechafinal,$apaterno,$status)
    {
      $SQL = "SELECT * FROM contratacion_y_servicios_de_agua_y_drenaje_domestico WHERE ";

      $apaterno = $this->db->escape_like_str($apaterno);
      $apaterno = str_replace( array("< ",">","[","]","*","^"), "" ,$apaterno);

      if (!empty($apaterno)) {
        $SQL .=" nombre LIKE '%".$apaterno."%' AND ";
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
        
//           $this->db->where('status !=',4);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
       function total_rows_admin($q = NULL) {
           $fhac = date('Y');
//           die(print_r($fhac,true));
           $this->db->where('status !=',6);
            $this->db->like('fechainicio',$fhac);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
function total_rows_usuario($q = NULL) {
        
	$this->db->where('usuarioID', $this->session->userdata('id'));
	
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion','asc');
        $this->db->where('usuarioID', $this->session->userdata('id'));
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
function get_limit_data_admin($limit, $start = 0, $q = NULL) {
          $this->db->order_by("notificacion","DESC");
      $fhac = date('Y');
         $this->db->where('status !=',6);
            $this->db->like('fechainicio',$fhac);   
	//$this->db->where('notificacion',0);
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

/* End of file Contratacion_y_servicios_de_agua_y_drenaje_domestico_model.php */
/* Location: ./application/models/Contratacion_y_servicios_de_agua_y_drenaje_domestico_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-05-31 01:18:28 */
/* http://www.ga-asociados.com */
