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
        $SQL = "SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,`status`,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,fechainicio,clave FROM claves_catastrales_individual
 WHERE STATUS = 4 AND numerocontrol LIKE '%" . $q . "%' AND validacion =0
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,fechainicio,clave FROM claves_catastrales_individual_cetificado
WHERE  STATUS = 4 AND nocontrol LIKE '%" . $q . "%' AND validacion =0
ORDER BY notificacion DESC, creacion DESC  LIMIT " . $limit . " OFFSET " . $start . " ";

        $consulta = $this->db->query($SQL);

//        die(print_r($SQL));
        return $consulta->result();
    }

    function get_autorizaciones($limit, $start = 0, $q = NULL) {
        $SQL = "    SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,`status`,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,fechainicio,clave FROM claves_catastrales_individual
 WHERE STATUS = 4 AND numerocontrol LIKE '%" . $q . "%' AND validacion =1  AND autorizacion = 0
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,fechainicio,clave FROM claves_catastrales_individual_cetificado
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
        $SQL = "SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,fechainicio,fechafinal,mensaje,tipotramite FROM claves_catastrales_individual
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
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,status,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,fechainicio,fechafinal,mensaje,tipotramite FROM claves_catastrales_individual_cetificado
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
    function total_rows($q = NULL, $calleui=NULL , $clave = NULL, $nombre = NULL, $finicio = NULL, $ffin = NULL, $status = NULL, $funcio = NULL, $cpred = NULL, $tramite = NULL) {
//        $this->db->like('numerocontrol', $q);$cpred = NULL
//        $this->db->where('status !=', "6");
//        $this->db->where('status !=', "5");
        $SQL = "SELECT  COUNT(*) AS cantidad FROM(SELECT ID FROM claves_catastrales_individual
                WHERE claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%' ";
        if ($nombre != ""):
            $SQL = $SQL . "AND claves_catastrales_individual.nombrepropietariodp LIKE '%" . $nombre . "%'";
        endif;
        if ($calleui != ""):
            $SQL = $SQL . "AND claves_catastrales_individual.calleui LIKE '%" . $calleui . "%'";
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
        if (!empty($tramite)) {
            $SQL .= "AND claves_catastrales_individual.tipotramitedp = " . $tramite;
        }

        $SQL = $SQL . "
UNION
SELECT ID FROM claves_catastrales_individual_cetificado
WHERE claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%' ";
        if ($nombre != ""):
            $SQL = $SQL . "AND claves_catastrales_individual_cetificado.nombrepropietariodp LIKE '%" . $nombre . "%'";
        endif;
        if ($calleui != ""):
            $SQL = $SQL . "AND claves_catastrales_individual_cetificado.calleui LIKE '%" . $calleui . "%'";
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
        if (!empty($tramite)) {
            $SQL .= "AND claves_catastrales_individual_cetificado.tipotramitedp = '" . $tramite . "'";
        }
        $SQL = $SQL . ") AS tem ORDER BY ID DESC";

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
        $this->db->order_by("ID", "desc");
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
        $this->db->order_by("ID", "desc");
        $this->db->order_by('notificacion', 'desc');
        $this->db->order_by('creacion', 'desc');
        $this->db->having('usuarioID', $this->session->userdata('id'));
        $this->db->limit($limit, $start);

        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $calleui = NULL, $clave = NULL, $nombre = NULL, $finicio = NULL, $ffin = NULL, $status = NULL, $funcio = NULL, $cpred = NULL, $tramite = NULL) {
//        $this->db->order_by('notificacion', 'DESC');
//        $this->db->order_by('creacion', 'DESC');
//        $this->db->like('numerocontrol', $q);
//        $this->db->where('status !=', "6");
//        $this->db->where('status !=', "5");
//        $this->db->limit($limit, $start);
        $SQL = "
SELECT i.ID, i.notificacion, i.creacion, i.numerocontrol, i.nombrepropietariodp, i.status, i.calleui, i.auxiliar, i.fechainicio, i.tipotramite, i.tipotramitedp,i.doctofinal,i.doctopago,i.valido_pago,d.Tipo_Tramite FROM claves_catastrales_individual as i left join Cat_Informacion_Documentos as d on i.ID = d.Id_Bd
WHERE i.numerocontrol LIKE '%" . $q . "%' ";
        if ($nombre != ""):
            $SQL = $SQL . "AND i.nombrepropietariodp LIKE '%" . $nombre . "%' ";
        endif;
        if ($calleui != ""):
            $SQL = $SQL . "AND i.calleui LIKE '%" . $calleui . "%' ";
        endif;
        if ($clave != ""):
            $SQL = $SQL . " AND i.clave LIKE '%" . $clave . "%'";
        endif;
        if ($status != ""):
            $SQL = $SQL . " AND i.status = '" . $status . "'";
        endif;
        if (!empty($finicio)) {
            $SQL .= "AND i.fechainicio >= '" . $finicio . "'";
        }
        if (!empty($ffin)) {
            $SQL .= "AND i.fechafinal <= '" . $ffin . "'";
        }
        if (!empty($funcio)) {
            $SQL .= "AND i.auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL = $SQL . " AND i.predialui LIKE '%" . $cpred . "%'";
        }

        if (!empty($tramite)) {
            $SQL = $SQL . " AND i.tipotramitedp = " . $tramite;
        }
        /*$SQL = $SQL . " UNION
SELECT c.ID, c.notificacion, c.creacion, c.nocontrol, c.nombrepropietariodp, c.status,c.calleui, c.auxiliar, c.fechainicio, c.tipotramite,c.tipotramitedp,c.doctofinal,c.doctopago,c.valido_pago FROM claves_catastrales_individual_cetificado as c
WHERE c.nocontrol LIKE '%" . $q . "%'";
        if ($nombre != ""):
            $SQL = $SQL . " AND c.nombrepropietariodp LIKE '%" . $nombre . "%'";
        endif;
        if ($calleui != ""):
            $SQL = $SQL . " AND c.calleui LIKE '%" . $calleui . "%'";
        endif;
        if ($clave != ""):
            $SQL = $SQL . " AND c.clave LIKE '%" . $clave . "%'";
        endif;
        if ($status != ""):
            $SQL = $SQL . " AND c.status = '" . $status . "'";
        endif;
        if (!empty($finicio)) {
            $SQL .= "AND c.fechainicio >= '" . $finicio . "'";
        }
        if (!empty($ffin)) {
            $SQL .= "AND c.fechafinal <= '" . $ffin . "'";
        }
        if (!empty($funcio)) {
            $SQL .= "AND c.auxiliar = '" . $funcio . "'";
        }
        if (!empty($cpred)) {
            $SQL = $SQL . " AND c.predialui LIKE '%" . $cpred . "%'";
        }
        $SQL = $SQL . "ORDER BY ID DESC, notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . " ";
*/
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function total_rows_asinacion($q = NULL) {


        $SQL = " SELECT  COUNT(*) AS cantidad
	FROM(SELECT ID FROM claves_catastrales_individual 
	 WHERE  claves_catastrales_individual.status= 3 AND claves_catastrales_individual.validacion = 0 AND claves_catastrales_individual.auxiliar = " . $this->session->userdata('id') . " AND claves_catastrales_individual.numerocontrol LIKE '%" . $q . "%'
	UNION 
	SELECT ID FROM claves_catastrales_individual_cetificado
	 WHERE claves_catastrales_individual_cetificado.status= 3 AND claves_catastrales_individual_cetificado.validacion = 0 AND claves_catastrales_individual_cetificado.auxiliar = " . $this->session->userdata('id') . " AND claves_catastrales_individual_cetificado.nocontrol LIKE '%" . $q . "%'
     ORDER BY ID) AS tem";
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_asinacion($limit, $start = 0, $q = NULL) 
    {/*
        $SQL = " SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS= 3 AND validacion = 0 AND auxiliar = " . $this->session->userdata('id') . "  AND numerocontrol LIKE '%" . $q . "%'
UNION
SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,status,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE STATUS = 3 AND validacion = 0 AND auxiliar = " . $this->session->userdata('id') . " AND nocontrol LIKE '%" . $q . "%'
ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . "";

*/
        $q = explode(",", $q);
        $cons = "";
        $conss = "";
        $cons1 = " SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS= 3 AND validacion = 0 AND auxiliar = " . $this->session->userdata('id') . "  AND numerocontrol LIKE ";
        $cons2 = " SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,status,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE STATUS = 3 AND validacion = 0 AND auxiliar = " . $this->session->userdata('id') . " AND nocontrol LIKE ";
        for($i = 0; $i < count($q); $i++)
        {
            $cons .= $cons1 . " '%" . $q[$i] . "%' " . " UNION ";
            $conss .= $cons2 . " '%" . $q[$i] . "%' ";
            if($i + 1 == count($q))
                $conss .= " ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . "";
            else
                $conss .= " UNION ";
        }

        $SQL = $cons . $conss;
        
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
	) AS tem ORDER BY ID DESC";
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
	) AS tem ORDER BY ID DESC";
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

    function get_tramites($limit, $start = 0, $q = NULL) 
    {

        $q = explode(",", $q);
        $cons = "";
        $conss = "";
        $cons1 = " SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,auxiliar,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS = 2 AND numerocontrol LIKE ";
        $cons2 = "SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,auxiliar,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE  STATUS = 2 AND nocontrol LIKE ";

        for($i = 0; $i < count($q); $i++)
        {
            $cons .= $cons1 . " '%" . $q[$i] . "%'" . " UNION ";
            $conss .= $cons2 . " '%" . $q[$i] . "%'";
            if($i + 1 == count($q))
                $conss .= " ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . " ";
            else
                $conss .= " UNION ";
        }

        $SQL = $cons . $conss;
        $consulta = $this->db->query($SQL);

        return $consulta->result();
    }

    function get_reasignar($limit, $start = 0, $q = NULL) {
        $q = explode(",", $q);
        $cons = "";
        $conss = "";
        $cons1 = " SELECT ID,notificacion,creacion,numerocontrol,nombrepropietariodp ,status,tipotramite,predialui, calleui, auxiliar,cbocoloniaui,coloniados,auxiliar,tipotramitedp FROM claves_catastrales_individual
 WHERE STATUS >= 2 AND auxiliar != '' AND numerocontrol LIKE ";
        $cons2 = "SELECT ID,notificacion,creacion,nocontrol,nombrepropietariodp,`status`,tipotramite,predialui,calleui, auxiliar,cbocomunidad,noloteui,auxiliar,tipotramitedp FROM claves_catastrales_individual_cetificado
WHERE  STATUS >= 2 AND auxiliar != '' AND nocontrol LIKE ";

        for($i = 0; $i < count($q); $i++)
        {
            $cons .= $cons1 . " '%" . $q[$i] . "%'" . " UNION ";
            $conss .= $cons2 . " '%" . $q[$i] . "%'";
            if($i + 1 == count($q))
                $conss .= " ORDER BY notificacion DESC, creacion DESC LIMIT " . $limit . " OFFSET " . $start . " ";
            else
                $conss .= " UNION ";
        }

        $SQL = $cons . $conss;


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
