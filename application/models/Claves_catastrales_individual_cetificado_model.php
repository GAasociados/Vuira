<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claves_catastrales_individual_cetificado_model extends CI_Model {

    public $table = 'claves_catastrales_individual_cetificado';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
        $this->db->where('validacion', 1);
        $this->db->where('autorizacion', 1);
        $this->db->where('valido_pago', 0);
//          002532018
        return $this->db->get($this->table)->result();
    }

    function get_validaciones($limit, $start = 0, $q = NULL) {
        $id = 4;

        $this->db->where('status >=', $id);
        $this->db->like('nocontrol', $q);
        $this->db->where('validacion', '0');
        
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function total_rowsc($q = NULL) {
        $this->db->where('clave', $q);
        $this->db->from($this->table);
//        die(print_r($q,true));
        return $this->db->count_all_results();
    }

    function getMaxItemByid() {
        $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM claves_catastrales_individual_cetificado");
        return $consulta->result();
    }

    function getDatabyClave($clave) {
        $SQL = "SELECT nombrepropietariodp FROM " . $this->table . " WHERE ";


        $SQL .= " clave LIKE '%" . $clave . "%' ";



        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave) {
        $SQL = "SELECT * FROM " . $this->table . " WHERE ";

        $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
        $nombrepropietario = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $nombrepropietario);
        if (!empty($nos)) {
            $SQL .= " nocontrol LIKE '%" . $nos . "%' AND ";
        }
        $clave = $this->db->escape_like_str($clave);
        $clave = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $clave);
        if (!empty($clave)) {
            $SQL .= " clave LIKE '%" . $clave . "%' AND ";
        }
        if (!empty($nombrepropietario)) {
            $SQL .= " nombrepropietariodp LIKE '%" . $nombrepropietario . "%' AND ";
        }

        $status = $this->db->escape_like_str($status);
        $status = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $status);

        if (!empty($status)) {
            $SQL .= "status = '" . $status . "' AND ";
        }

        //$fechainicio = $this->db->escape_like_str($fechainicio);
        //$fechainicio = str_replace ( array("< ",">","[","]","*","^"), "" ,$fechainicio);

        if (!empty($fechainicio)) {
            $SQL .= "fechainicio >= '" . $fechainicio . "' AND ";
        }

        //$fechafinal = $this->db->escape_like_str($fechafinal);
        //$fechafinal = str_replace ( array("< ",">","[","]","*","^"), "" ,$fechafinal);

        if (!empty($fechafinal)) {
            $SQL .= "fechafinal <= '" . $fechafinal . "' AND ";
        }

        $SQL .= "1 = 1";

        $consulta = $this->db->query($SQL);

        //$consulta = $this->db->query("SELECT * FROM contratacion_y_servicios_de_agua_y_drenaje_domestico WHERE fechainicio >= '".$fechainicio."' AND fechafinal <= '".$fechafinal."'");

        return $consulta->result();
        //echo $SQL;
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->like($this->id, $id);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        return $this->db->get($this->table)->row();
    }

    function get_by_id_admin($id) {
        $this->db->like($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_administrador($id) {
        $this->db->like($this->id, $id);

        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows_usuarios($q = NULL) {
        $this->db->like('nocontrol', $q);
        $this->db->from($this->table);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        return $this->db->count_all_results();
    }

    function total_rows($q = NULL) {
        $this->db->like('nocontrol', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
//        $this->db->order_by($this->id, $this->order);
        $this->db->like('nocontrol', $q);

        $this->db->order_by('notificacion', 'desc');
        $this->db->order_by('creacion', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_usuarios($limit, $start = 0, $q = NULL) {
//        $this->db->order_by($this->id, $this->order);
        $this->db->like('nocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->order_by('notificacion', 'desc');
        $this->db->limit($limit, $start);

        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id($this->table);
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

    function total_rows_ventana($q = NULL) {
        $this->db->from($this->table);
        $this->db->like('nocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        return $this->db->count_all_results();
    }

    function get_limit_data_ventana($limit, $start = 0, $q = NULL) {
//        $this->db->order_by($this->id, $this->order);

        $this->db->like('nocontrol', $q);
//        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->order_by('notificacion', 'desc');
        $this->db->order_by('creacion', 'desc');
        $this->db->having('usuarioID', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        
        return $this->db->get($this->table)->result();
    }

    function total_rows_tramites($q = NULL) {
        $id = 2;
        $this->db->like('nocontrol', $q);
        $this->db->where('status', $id);
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    function total_rows_tramites_reasigna($q = NULL) {
        $id = 2;
        $this->db->like('nocontrol', $q);
        $this->db->where('status >=', $id);
        $this->db->where('auxiliar !=', null);
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    function get_tramites_reasigna($limit, $start = 0, $q = NULL) {
        $id = 2;
        $this->db->like('nocontrol', $q);
        $this->db->where('status >=', $id);
        $this->db->where('auxiliar !=', null);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_tramites($limit, $start = 0, $q = NULL) {
        $id = 2;
        $this->db->like('nocontrol', $q);
        $this->db->where('status', $id);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function total_rows_asinacion($q = NULL) {

        $this->db->like('nocontrol', $q);
        $this->db->where('status', "3");
        $this->db->where('auxiliar', $this->session->userdata('id'));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_asinacion($limit, $start = 0, $q = NULL) {
        $this->db->like('nocontrol', $q);
        $this->db->where('status >=', "3");
        $this->db->where('validacion', "0");
        $this->db->where('auxiliar', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function total_rows_autorizar($q = NULL) {
        $id = 4;
        $this->db->where('status >=', $id);
        $this->db->like('nocontrol', $q);
        $this->db->where('validacion', '1');
        $this->db->where('autorizacion', '0');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 function total_rows_validaciones($q = NULL) {
        $id = 4;
        $this->db->where('status >=', $id);
        $this->db->like('nocontrol', $q);
        $this->db->where('validacion', '0');
    
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function get_autorizar($limit, $start = 0, $q = NULL) {
        $id = 4;

        $this->db->where('status >=', $id);
        $this->db->like('nocontrol', $q);
        $this->db->where('validacion', '1');
        $this->db->where('autorizacion', '0');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}

/* End of file Claves_catastrales_individual_cetificado_model.php */
/* Location: ./application/models/Claves_catastrales_individual_cetificado_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-06-12 08:57:05 */
/* http://www.ga-asociados.com */
