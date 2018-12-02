<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Claves_catastrales_individual_model extends CI_Model {

    public $table = 'claves_catastrales_individual';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getMaxItemByid() {
        $consulta = $this->db->query("SELECT MAX(ID) as maximo FROM claves_catastrales_individual");
        return $consulta->result();
    }

    function getDatabyClave($clave) {
        $SQL = "SELECT nombrepropietariodp FROM " . $this->table . " WHERE ";
        $SQL .= " clave LIKE '%" . $clave . "%' ";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rowsc($q = NULL) {
        $this->db->where('clave', $q);
        $this->db->from($this->table);
//        die(print_r($q,true));
        return $this->db->count_all_results();
    }

    function get_validaciones($limit, $start = 0, $q = NULL) {
        $SQL = "SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,`status`,tipotramite,predialui, calleui,cbocoloniaui,coloniados,fechainicio,clave FROM claves_catastrales_individual
 WHERE STATUS = 4 AND numerocontrol LIKE '%" . $q . "%' AND validacion =0
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui,cbocomunidad,noloteui,fechainicio,clave FROM claves_catastrales_individual_cetificado
WHERE  STATUS = 4 AND nocontrol LIKE '%" . $q . "%' AND validacion =0
ORDER BY notificacion DESC, creacion DESC  LIMIT " . $limit . " OFFSET " . $start . " ";

        $consulta = $this->db->query($SQL);

//        die(print_r($SQL));
        return $consulta->result();
    }

    function get_autorizaciones($limit, $start = 0, $q = NULL) {
        $SQL = "    SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,`status`,tipotramite,predialui, calleui,cbocoloniaui,coloniados,fechainicio,clave FROM claves_catastrales_individual
 WHERE STATUS = 4 AND numerocontrol LIKE '%" . $q . "%' AND validacion =1  AND autorizacion = 0
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui,cbocomunidad,noloteui,fechainicio,clave FROM claves_catastrales_individual_cetificado
WHERE  STATUS = 4 AND nocontrol LIKE '%" . $q . "%' AND validacion =1  AND autorizacion = 0
ORDER BY notificacion DESC, creacion DESC  LIMIT " . $limit . " OFFSET " . $start . " ";
        $consulta = $this->db->query($SQL);


        return $consulta->result();
    }

    function get_limit_data_pagos() {
//        $this->db->order_by('notificacion', 'DESC');
        $this->db->where('status', 4);
        $this->db->where('validacion', 1);
        $this->db->where('autorizacion', 1);
        $this->db->where('valido_pago', 0);
        return $this->db->get($this->table)->result();
    }

    function get_reporte($fechainicio, $fechafinal, $nombrepropietario, $status, $nos, $clave, $funcio, $cpred) {
        $SQL = "SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui,cbocoloniaui,coloniados,fechainicio,fechafinal,mensaje,tipotramite FROM claves_catastrales_individual
        WHERE";
        $nombrepropietario = $this->db->escape_like_str($nombrepropietario);
        $nombrepropietario = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $nombrepropietario);

        $clave = $this->db->escape_like_str($clave);
        $clave = str_replace(array("< ", ">", "[", "]", "*", "^"), "", $clave);


        $SQL .= " numerocontrol LIKE '%" . $nos . "%'";

        IF (!empty($nombrepropietario)) {
            $SQL .= "AND nombrepropietariodp LIKE '%" . $nombrepropietario . "%'  ";
        }

        IF (!empty($clave)) {
            $SQL .= "AND clave LIKE '%" . $clave . "%' ";
        }
        IF (!empty($status)) {
            $SQL .= "AND status = '" . $status . "' ";
        }
        IF (!empty($fechainicio)) {
            $SQL .= " AND fechainicio >= '" . $fechainicio . "'  ";
        }

        IF (!empty($fechafinal)) {
            $SQL .= "AND fechafinal <= '" . $fechafinal . "' ";
        }
        if (!empty($funcio)) {
            $SQL .= "AND auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL .= "AND predialui = '" . $cpred . "'";
        }
        $SQL = $SQL .= "UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,status,tipotramite,predialui,calleui,cbocomunidad,noloteui,fechainicio,fechafinal,mensaje,tipotramite FROM claves_catastrales_individual_cetificado
WHERE";
        $SQL .= " nocontrol LIKE '%" . $nos . "%'";

        IF (!empty($nombrepropietario)) {
            $SQL .= "AND nombrepropietariodp LIKE '%" . $nombrepropietario . "%'  ";
        }

        IF (!empty($clave)) {
            $SQL .= "AND clave LIKE '%" . $clave . "%' ";
        }
        IF (!empty($status)) {
            $SQL .= "AND status = '" . $status . "' ";
        }
        IF (!empty($fechainicio)) {
            $SQL .= " AND fechainicio >= '" . $fechainicio . "'  ";
        }

        IF (!empty($fechafinal)) {
            $SQL .= "AND fechafinal <= '" . $fechafinal . "' ";
        }
        if (!empty($funcio)) {
            $SQL .= "AND auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL .= "AND predialui = '" . $cpred . "'";
        }
        $SQL = $SQL .= "
ORDER BY notificacion DESC, creacion DESC ";
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
    function total_rows($q = NULL, $clave = NULL, $nombre = NULL, $finicio = NULL, $ffin = NULL, $status = NULL, $funcio = NULL, $cpred = NULL) {
//        $this->db->like('numerocontrol', $q);$cpred = NULL
//        $this->db->where('status !=', "6");
//        $this->db->where('status !=', "5");
        $SQL = "SELECT  COUNT(*) AS cantidad FROM(SELECT ID FROM claves_catastrales_individual
                WHERE claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%' ";
        if ($nombre != ""):
            $SQL = $SQL . "AND claves_catastrales_individual.nombrepropietariodp LIKE '%" . $nombre . "%'";
        endif;
        if ($clave != ""):
            $SQL = $SQL . " AND claves_catastrales_individual.clave LIKE '%" . $clave . "%'";
        endif;
        if ($status != ""):
            $SQL = $SQL . " AND claves_catastrales_individual.status = '" . $status . "'";
        endif;
        if (!empty($finicio)) {
            $SQL .= "AND claves_catastrales_individual.fechainicio >= '" . $finicio . "'";
        }
        if (!empty($ffin)) {
            $SQL .= "AND claves_catastrales_individual.fechafinal <= '" . $ffin . "'";
        }
        if (!empty($funcio)) {
            $SQL .= "AND claves_catastrales_individual.auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL .= "AND claves_catastrales_individual.predialui = '" . $cpred . "'";
        }
        $SQL = $SQL . "
UNION
SELECT ID FROM claves_catastrales_individual_cetificado
WHERE claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%' ";
        if ($nombre != ""):
            $SQL = $SQL . "AND claves_catastrales_individual_cetificado.nombrepropietariodp LIKE '%" . $nombre . "%'";
        endif;
        if ($clave != ""):
            $SQL = $SQL . "AND claves_catastrales_individual_cetificado.clave LIKE '%" . $clave . "%'";
        endif;
        if ($status != ""):
            $SQL = $SQL . " AND claves_catastrales_individual_cetificado.status = '" . $status . "'";
        endif;
        if (!empty($finicio)) {
            $SQL .= "AND claves_catastrales_individual_cetificado.fechainicio >= '" . $finicio . "'";
        }
        if (!empty($ffin)) {
            $SQL .= "AND claves_catastrales_individual_cetificado.fechafinal <= '" . $ffin . "'";
        }
        if (!empty($funcio)) {
            $SQL .= "AND claves_catastrales_individual_cetificado.auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL .= "AND claves_catastrales_individual_cetificado.predialui = '" . $cpred . "'";
        }
        $SQL = $SQL . ") AS tem";

        $consulta = $this->db->query($SQL);


        return $consulta->result();
    }

    function tonot() {

        $SQL = "SELECT  COUNT(*) AS cantidad FROM(SELECT ID FROM claves_catastrales_individual
WHERE claves_catastrales_individual.notificacion = 1 AND  claves_catastrales_individual.usuarioID  NOT IN  (63,97)
UNION
SELECT ID FROM claves_catastrales_individual_cetificado
WHERE claves_catastrales_individual_cetificado.notificacion = 1 AND  claves_catastrales_individual_cetificado.usuarioID  NOT IN  (63,97) ) AS tem";

        $consulta = $this->db->query($SQL);


        return $consulta->result();
    }

    function total_rows_ventana($q = NULL) {


        $SQL = "SELECT  COUNT(*) AS cantidad FROM(SELECT ID FROM claves_catastrales_individual
                WHERE claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%' AND claves_catastrales_individual.usuarioID = " . $this->session->userdata('id');

        $SQL = $SQL . "
UNION
SELECT ID FROM claves_catastrales_individual_cetificado
WHERE claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%' AND claves_catastrales_individual_cetificado.usuarioID = " . $this->session->userdata('id');

        $SQL = $SQL . ") AS tem";

        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rows_ventana_us($q = NULL) {
        $this->db->from($this->table);
        $this->db->like('numerocontrol', $q);
        $this->db->where('usuarioID', $this->session->userdata('id'));
        return $this->db->count_all_results();
    }

    function get_limit_data_ventana($limit, $start = 0, $q = NULL) {

        $SQL = " SELECT ID, notificacion, creacion, numerocontrol, nombrepropietariodp, status, fechainicio,tipotramite,tipotramitedp,doctofinal,doctopago FROM claves_catastrales_individual
 WHERE usuarioID = " . $this->session->userdata('id') . "  AND numerocontrol LIKE '%" . $q . "%'
UNION
SELECT ID, notificacion, creacion, nocontrol, nombrepropietariodp, status, fechainicio, tipotramite,tipotramitedp,doctofinal,doctopago FROM claves_catastrales_individual_cetificado
WHERE usuarioID = " . $this->session->userdata('id') . " AND nocontrol LIKE '%" . $q . "%'
ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . "";
        $consulta = $this->db->query($SQL);
//        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_limit_data_ventana_us($limit, $start = 0, $q = NULL) {


        $this->db->like('numerocontrol', $q);
//        $this->db->where('usuarioID', $this->session->userdata('id'));
        $this->db->order_by('notificacion', 'desc');
        $this->db->order_by('creacion', 'desc');
        $this->db->having('usuarioID', $this->session->userdata('id'));
        $this->db->limit($limit, $start);

        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $clave = NULL, $nombre = NULL, $finicio = NULL, $ffin = NULL, $status = NULL, $funcio = NULL, $cpred = NULL) {
//        $this->db->order_by('notificacion', 'DESC');
//        $this->db->order_by('creacion', 'DESC');
//        $this->db->like('numerocontrol', $q);
//        $this->db->where('status !=', "6");
//        $this->db->where('status !=', "5");
//        $this->db->limit($limit, $start);
        $SQL = "
SELECT ID, notificacion, creacion, numerocontrol, nombrepropietariodp, status, fechainicio,tipotramite,tipotramitedp,doctofinal,doctopago,valido_pago FROM claves_catastrales_individual
WHERE numerocontrol LIKE '%" . $q . "%' ";
        if ($nombre != ""):
            $SQL = $SQL . "AND nombrepropietariodp LIKE '%" . $nombre . "%' ";
        endif;
        if ($clave != ""):
            $SQL = $SQL . " AND clave LIKE '%" . $clave . "%'";
        endif;
        if ($status != ""):
            $SQL = $SQL . " AND status = '" . $status . "'";
        endif;
        if (!empty($finicio)) {
            $SQL .= "AND fechainicio >= '" . $finicio . "'";
        }
        if (!empty($ffin)) {
            $SQL .= "AND fechafinal <= '" . $ffin . "'";
        }
        if (!empty($funcio)) {
            $SQL .= "AND auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL = $SQL . " AND predialui LIKE '%" . $cpred . "%'";
        }
        $SQL = $SQL . "UNION
SELECT ID, notificacion, creacion, nocontrol, nombrepropietariodp, status, fechainicio, tipotramite,tipotramitedp,doctofinal,doctopago,valido_pago FROM claves_catastrales_individual_cetificado
WHERE nocontrol LIKE '%" . $q . "%'";
        if ($nombre != ""):
            $SQL = $SQL . " AND nombrepropietariodp LIKE '%" . $nombre . "%'";
        endif;
        if ($clave != ""):
            $SQL = $SQL . " AND clave LIKE '%" . $clave . "%'";
        endif;
        if ($status != ""):
            $SQL = $SQL . " AND status = '" . $status . "'";
        endif;
        if (!empty($finicio)) {
            $SQL .= "AND fechainicio >= '" . $finicio . "'";
        }
        if (!empty($ffin)) {
            $SQL .= "AND fechafinal <= '" . $ffin . "'";
        }
        if (!empty($funcio)) {
            $SQL .= "AND auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL = $SQL . " AND predialui LIKE '%" . $cpred . "%'";
        }
        $SQL = $SQL . "ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . " ";

        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rows_asinacion($q = NULL) {


        $SQL = " SELECT  COUNT(*) AS cantidad
	FROM(SELECT ID FROM claves_catastrales_individual 
	 WHERE  claves_catastrales_individual.status>= 3 AND claves_catastrales_individual.validacion = 0 AND claves_catastrales_individual.auxiliar = " . $this->session->userdata('id') . " AND claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%'
	UNION 
	SELECT ID FROM claves_catastrales_individual_cetificado
	 WHERE claves_catastrales_individual_cetificado.status>= 3 AND claves_catastrales_individual_cetificado.validacion = 0 AND claves_catastrales_individual_cetificado.auxiliar = " . $this->session->userdata('id') . " AND claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%'
	) AS tem";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_asinacion($limit, $start = 0, $q = NULL) {
        $SQL = " SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui,cbocoloniaui,coloniados,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS>= 3 AND validacion = 0 AND auxiliar = " . $this->session->userdata('id') . "  AND numerocontrol LIKE '%" . $q . "%'
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,status,tipotramite,predialui,calleui,cbocomunidad,noloteui,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE STATUS >= 3 AND validacion = 0 AND auxiliar = " . $this->session->userdata('id') . " AND nocontrol LIKE '%" . $q . "%'
ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . "";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rows_tramites($q = NULL) {
        $SQL = "SELECT  COUNT(*) AS cantidad
	FROM(SELECT ID FROM claves_catastrales_individual 
	 WHERE  claves_catastrales_individual.status= 2 AND claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%'
	UNION 
	SELECT ID FROM claves_catastrales_individual_cetificado
	 WHERE claves_catastrales_individual_cetificado.status = 2 AND claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%'
	) AS tem";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rows_reasignar($q = NULL) {
        $SQL = "SELECT  COUNT(*) AS cantidad
	FROM(SELECT ID FROM claves_catastrales_individual 
	 WHERE  claves_catastrales_individual.status >= 2 AND claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%' AND  claves_catastrales_individual.auxiliar != ''
	UNION 
	SELECT ID FROM claves_catastrales_individual_cetificado
	 WHERE claves_catastrales_individual_cetificado.status >= 2 AND claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%' AND claves_catastrales_individual_cetificado.auxiliar != ''
	) AS tem";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rows_autorizaciones($q = NULL) {
        $SQL = "
SELECT  COUNT(*) AS cantidad
	FROM(SELECT ID FROM claves_catastrales_individual 
	 WHERE  claves_catastrales_individual.status = 4 AND claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%' AND  claves_catastrales_individual.validacion = 1 AND  claves_catastrales_individual.autorizacion = 0
	UNION 
	SELECT ID FROM claves_catastrales_individual_cetificado
	 WHERE claves_catastrales_individual_cetificado.status = 4 AND claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%' AND claves_catastrales_individual_cetificado.validacion =1 AND claves_catastrales_individual_cetificado.autorizacion =0
	) AS tem";
    }

    function total_rows_validaciones($q = NULL) {
        $SQL = "SELECT  COUNT(*) AS cantidad
	FROM(SELECT ID FROM claves_catastrales_individual 
	 WHERE  claves_catastrales_individual.status = 4 AND claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%' AND  claves_catastrales_individual.validacion = 0
	UNION 
	SELECT ID FROM claves_catastrales_individual_cetificado
	 WHERE claves_catastrales_individual_cetificado.status = 4 AND claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%' AND claves_catastrales_individual_cetificado.validacion =0
	) AS tem";

        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_tramites($limit, $start = 0, $q = NULL) {
        $SQL = " SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui,cbocoloniaui,coloniados,auxiliar,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS = 2 AND numerocontrol LIKE '%" . $q . "%'
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui,cbocomunidad,noloteui,auxiliar,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE  STATUS = 2 AND nocontrol LIKE '%" . $q . "%'
ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . " ";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_reasignar($limit, $start = 0, $q = NULL) {
        $SQL = "SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui,cbocoloniaui,coloniados,auxiliar,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS >= 2 AND numerocontrol LIKE '%".$q."%' AND auxiliar!=''
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui,cbocomunidad,noloteui,auxiliar,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE  STATUS >= 2 AND nocontrol LIKE '%".$q."%' AND auxiliar!=''
ORDER BY notificacion DESC, creacion DESC  LIMIT " . $limit . " OFFSET " . $start . " ";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
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

}

/* End of file Claves_catastrales_individual_model.php */
/* Location: ./application/models/Claves_catastrales_individual_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-06-06 20:50:23 */
/* http://www.ga-asociados.com */
