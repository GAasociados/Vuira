<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claves_fraccionamiento_model extends CI_Model {

    public $table = 'claves_fraccionamiento';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getMaxItemByid() {
        $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM claves_catastrales_fraccionamiento");
        return $consulta->result();
    }

    function get_asinacion($id) {
        $this->db->where('status >=', "3");
        $this->db->where('validacion', "0");
        $this->db->where('auxiliar', $id);
        return $this->db->get($this->table)->result();
    }

    function get_tramites() {
        $id = 2;
        $this->db->where('status', $id);
        return $this->db->get($this->table)->result();
    }

    function total_rowsc($q = NULL) {
        $this->db->where('clave', $q);
        $this->db->from($this->table);
//        die(print_r($q,true));
        return $this->db->count_all_results();
    }

    function getDatabyClave($clave) {
        $SQL = "SELECT nombrepropietariodp FROM " . $this->table . " WHERE ";


        $SQL .= " clave LIKE '%" . $clave . "%' ";



        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_validaciones($limit, $start = 0, $q = NULL) {
        $id = 4;
        $this->db->where('status >=', $id);
        $this->db->like('numerocontrol', $q);
        $this->db->where('validacion', 0);

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave) {
        $SQL = "SELECT * FROM " . $this->table . " WHERE ";

        $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
        $nombrepropietario = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $nombrepropietario);

        if (!empty($nombrepropietario)) {
            $SQL .= " nombrepropietariodp LIKE '%" . $nombrepropietario . "%' AND ";
        }

        $clave = $this->db->escape_like_str($clave);
        $clave = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $clave);

        if (!empty($clave)) {
            $SQL .= " clave LIKE '%" . $clave . "%' AND ";
        }
        if (!empty($nos)) {
            $SQL .= " numerocontrol LIKE '%" . $nos . "%' AND ";
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
    function total_rows($q = NULL) {
//       
        $this->db->or_like('numerocontrol', $q);
        $this->db->from($this->table);
   
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', 'DESC');
//        $this->db->like('ID', $q);
//        $this->db->or_like('calleui', $q);
//        $this->db->or_like('noloteui', $q);
//        $this->db->or_like('nomanzanaui', $q);
//        $this->db->or_like('nooficialui', $q);
//        $this->db->or_like('cbocoloniaui', $q);
//        $this->db->or_like('predialui', $q);
//        $this->db->or_like('mapa', $q);
//        $this->db->or_like('nombrepropietariodp', $q);
//        $this->db->or_like('razonsocial', $q);
//        $this->db->or_like('representantelegal', $q);
//        $this->db->or_like('calledp', $q);
//        $this->db->or_like('numerodp', $q);
//        $this->db->or_like('coloniadp', $q);
//        $this->db->or_like('correodp', $q);
//        $this->db->or_like('telefonodp', $q);
//        $this->db->or_like('tipotramitedp', $q);
//        $this->db->or_like('doctoine', $q);
//        $this->db->or_like('doctopodersimple', $q);
//        $this->db->or_like('doctoplanodigital', $q);
//        $this->db->or_like('doctolegal', $q);
//        $this->db->or_like('doctooficio', $q);
//        $this->db->or_like('doctoplanofisico', $q);
//        $this->db->or_like('doctopredial', $q);
//        $this->db->or_like('status', $q);
//        $this->db->or_like('mensaje', $q);
        $this->db->or_like('numerocontrol', $q);

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
        $this->db->where('validacion', 1);
        $this->db->where('autorizacion', 1);
        $this->db->where('valido_pago', 0);
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

    function get_limit_data_ventana($limit, $start = 0, $q = NULL) {
        $this->db->order_by('notificacion', 'DESC');

//        $this->db->like('numerocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
//         die(print_r( $this->db->like('numerocontrol', $q),true));s
        $this->db->limit($limit, $start);
//      die(print_r( $this->db->get($this->table)->result(),true));
        return $this->db->get($this->table)->result();
    }

    function total_rows_ventana($q = NULL) {
        $this->db->order_by('notificacion', 'asc');
        $this->db->like('numerocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    function total_rows_reasignar($q = NULL) {
        $id = 2;
        $this->db->like('numerocontrol', $q);
        $this->db->where('status >=', $id);
        $this->db->where('auxiliar !=', "");
        $this->db->from($this->table);



        return $this->db->count_all_results();
    }

    function get_reasignar($limit, $start = 0, $q = NULL) {
        $id = 2;
        $this->db->like('numerocontrol', $q);
        $this->db->where('status >=', $id);
        $this->db->where('auxiliar !=', "");
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function total_rows_autorizaciones($q = NULL) {
        $id = 4;
        $this->db->where('status', $id);
        $this->db->like('numerocontrol', $q);
        $this->db->where('validacion', '1');
        $this->db->where('autorizacion', '0');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function total_rows_validaciones($q = NULL) {
        $id = 4;
        $this->db->where('status', $id);
        $this->db->like('numerocontrol', $q);
        $this->db->where('validacion', '0');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_autorizaciones($limit, $start = 0, $q = NULL) {
        $id = 4;
        $this->db->where('status', $id);
        $this->db->like('numerocontrol', $q);
        $this->db->where('validacion', '1');
        $this->db->where('autorizacion', '0');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}

/* End of file Claves_catastrales_fraccionamiento_model.php */
/* Location: ./application/models/Claves_catastrales_fraccionamiento_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-06-07 06:41:33 */
/* http://www.ga-asociados.com */
