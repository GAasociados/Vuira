<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccbd_model extends CI_Model {

    public $table = 'ccbd';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function get_all_data($clave) {
        $SQL = "select * from ccbd where CUENTA_PREDIAL LIKE '" . $clave . "%' LIMIT 1";

        $result = $this->db->query($SQL);   
        //Convertir a una fila
        return $result->row();
    }
    
     function exixte($clave) {
         
        $SQL = "select * from ccbd where CUENTA_PREDIAL LIKE '" . $clave . "%' LIMIT 1";
 
        $result = $this->db->query($SQL);
        //Convertir a una fila
       
        if( $result->row() ){
        return true;
        }else{
            return false;
        }
    }

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */
/* Please DO NOT modify this information : */
/* GA & Asociados 2017-07-24 15:47:44 */
/* http://www.ga-asociados.com */