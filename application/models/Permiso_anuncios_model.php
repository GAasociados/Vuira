<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permiso_anuncios_model extends CI_Model {

    public $table = 'permiso_anuncios';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }


    function update_Obser($ob, $id)
    {
        //$this->db->where($this->ID, $id);
        //$this->db->update($this->table, $data);
        $SQL = "UPDATE permiso_anuncios set observaciones= '" . $ob ."' where ID=". $id;
        $this->db->query($SQL);

    }
    
    function is_tramite_vigente_DGDT($permiso, $cuenta_predial){
        
        $SQL = "SELECT count(*) as tramites_activos FROM ";
        
        switch ($permiso) {
            case "anuncios_adosados":
                $SQL = $SQL . " permiso_anuncios_adosados WHERE status in (1,2,3,4) and cuenta_predial = '" . $cuenta_predial . "';";
                break;
            case "anuncios_autosoportados":
                $SQL = $SQL . " permiso_anuncios WHERE status in (1,2,3,4) and cuenta_predial = '" . $cuenta_predial . "';";
                break;
            case "terminacion_obra":
                $SQL = $SQL . " ocupacion_de_construccion WHERE status in (1,2,3,4) and cuenta_predial = '" . $cuenta_predial . "';";
                break;

            default:
                return 0;
        }
        
        $consulta = $this->db->query($SQL); //print_r($consulta);
        $tramites_vigentes = $consulta->result();     //return $tramites_vigentes;  //print_r($tramites_vigentes);
        
        if($tramites_vigentes[0]->tramites_activos > 0){
            return 1;
        }
        else{
            return 0;
        }            
    }

    function get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status) {
        $SQL = "SELECT * FROM " . $this->table . " WHERE ";

        $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
        $nombrepropietario = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $nombrepropietario);

        if (!empty($nombrepropietario)) {
            $SQL .= " nombrepropietarioinmuebledg LIKE '%" . $nombrepropietario . "%' AND ";
        }

        $status = $this->db->escape_like_str($status);
        $status = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $status);

        if (!empty($status)) {
            $SQL .= "status = " . $status . " AND ";
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

    function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
//        $this->db->where('validacion', 1);
//        $this->db->where('autorizacion', 1);
        $this->db->where('valido_pago', 0);
        return $this->db->get($this->table)->result();
    }

    function getMaxItemByid() {
        $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM permiso_anuncios");
        return $consulta->result();
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
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
        $this->db->or_like('nombrepropietarioinmuebledg', $q);
        $this->db->or_like('nombrepropietarioanunciodg', $q);
        $this->db->or_like('calledg', $q);
        $this->db->or_like('numerodg', $q);
        $this->db->or_like('coloniadg', $q);
        $this->db->or_like('correodg', $q);
        $this->db->or_like('telefonodg', $q);
        $this->db->or_like('calleui', $q);
        $this->db->or_like('noloteui', $q);
        $this->db->or_like('nomanzanaui', $q);
        $this->db->or_like('nooficialui', $q);
        $this->db->or_like('cbocoloniaui', $q);
        $this->db->or_like('superficiepredioui', $q);
        $this->db->or_like('superficieconstruidaui', $q);
        $this->db->or_like('nonivelesui', $q);
        $this->db->or_like('nombreperitodp', $q);
        $this->db->or_like('noregistroperitodp', $q);
        $this->db->or_like('telefonoperitodp', $q);
        $this->db->or_like('nombreperitoresponsabledp', $q);
        $this->db->or_like('noregistroresponsabledp', $q);
        $this->db->or_like('telefonoresponsabledp', $q);
        $this->db->or_like('fechaentrega', $q);
        $this->db->or_like('nocontrol', $q);
        $this->db->or_like('doctopermisousosuelo', $q);
        $this->db->or_like('doctoplanosavaladosperito', $q);
        $this->db->or_like('doctoactaconstitutiva', $q);
        $this->db->or_like('doctofotografico', $q);
        $this->db->or_like('doctopolizafianza', $q);
        $this->db->or_like('doctopago', $q);
        $this->db->or_like('doctofinal', $q);
        $this->db->or_like('mensaje', $q);
        $this->db->or_like('usuarioID', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function total_rows_user($q = NULL) {

        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by("notificacion", "asc");
        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data_admin($limit, $start = 0, $q = NULL) {
        $this->db->order_by("notificacion", $this->order);
//        $this->db->like('ID', $q);
//        $this->db->like('status', $q);

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {


        $this->db->insert($this->table, $data);

//         die(print_r($this->db->affected_rows(),true));
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

    function total_rows_fun($q = NULL) {
        $this->db->like('ID', $q);
        $this->db->or_like('nombrepropietarioinmuebledg', $q);
        $this->db->or_like('nombrepropietarioanunciodg', $q);
        $this->db->or_like('calledg', $q);
        $this->db->or_like('numerodg', $q);
        $this->db->or_like('coloniadg', $q);
        $this->db->or_like('correodg', $q);
        $this->db->or_like('telefonodg', $q);
        $this->db->or_like('calleui', $q);
        $this->db->or_like('noloteui', $q);
        $this->db->or_like('nomanzanaui', $q);
        $this->db->or_like('nooficialui', $q);
        $this->db->or_like('cbocoloniaui', $q);
        $this->db->or_like('superficiepredioui', $q);
        $this->db->or_like('superficieconstruidaui', $q);
        $this->db->or_like('nonivelesui', $q);
        $this->db->or_like('nombreperitodp', $q);
        $this->db->or_like('noregistroperitodp', $q);
        $this->db->or_like('telefonoperitodp', $q);
        $this->db->or_like('nombreperitoresponsabledp', $q);
        $this->db->or_like('noregistroresponsabledp', $q);
        $this->db->or_like('telefonoresponsabledp', $q);
        $this->db->or_like('fechaentrega', $q);
        $this->db->or_like('nocontrol', $q);
        $this->db->or_like('doctopermisousosuelo', $q);
        $this->db->or_like('doctoplanosavaladosperito', $q);
        $this->db->or_like('doctoactaconstitutiva', $q);
        $this->db->or_like('doctofotografico', $q);
        $this->db->or_like('doctopolizafianza', $q);
        $this->db->or_like('doctopago', $q);
        $this->db->or_like('doctofinal', $q);
        $this->db->or_like('mensaje', $q);
        $this->db->or_like('usuarioID', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data_admin_fun($limit, $start = 0, $q = NULL) {
        $this->db->order_by("notificacion", $this->order);
//        $this->db->like('ID', $q);
//        $this->db->like('status', $q);
        $this->db->where('func', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function total_rows_admin($q = NULL) {

        $this->db->from($this->table);
        $this->db->where('func ', null);
        return $this->db->count_all_results();
    }

    function get_limit_data_admin_admin($limit, $start = 0, $q = NULL) {
        $this->db->order_by("notificacion", $this->order);

        $this->db->where('func', null);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function total_rows_admin_aut($q = NULL) {

        $this->db->from($this->table);
        $this->db->where('autorizacion ', 0);
            $this->db->where('status >=', 4);
        return $this->db->count_all_results();
    }

    function get_limit_data_admin_admin_aut($limit, $start = 0, $q = NULL) {
        $this->db->order_by("notificacion", $this->order);

        $this->db->where('autorizacion', 0);
            $this->db->where('status >=', 4);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}

/* End of file Permiso_anuncios_model.php */
/* Location: ./application/models/Permiso_anuncios_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-06-04 21:03:54 */
/* http://www.ga-asociados.com */
