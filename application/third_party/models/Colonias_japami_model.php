<?php

class Colonias_japami_model extends CI_Model {

    function getcolonias() {
        $SQL = "select * from cat_cor_colonias order by nombre";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }

    //Obtener La colonia que ya guardé y mostrar a ususario
    function getcoloniabyid($id) {
        $SQL = "select NOMBRE from cat_cor_colonias where COLONIA_ID = '" . $id . "' LIMIT 1";

        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }

    function getColoniaJPtoPRED($id) {

        $SQL = "select NOMBRE from cat_colonia_predial where COLONIA_ID = '" . $id . "' LIMIT 1";

        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }
     function getIDColoniaJPtoPRED($id) {

        $SQL = "select COLONIA_ID from cat_cor_colonias where NOMBRE LIKE '%" . $id . "%' LIMIT 1";

        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }
    function getalladatacoloniabyid($id) {
        if (is_numeric($id)) {
            $SQL = "select * from cat_cor_colonias where COLONIA_ID = '" . $id . "' LIMIT 1";
        } else {
            $id = trim($id);
            $SQL = "select * from cat_cor_colonias where NOMBRE LIKE '%" . $id . "%' LIMIT 1";
        }


        $result = $this->db->query($SQL);
        //Convertir a una fila
        if ($result->row()) {
            return $result->row();
        } else {
            $SQL = "select * from cat_cor_colonias where COLONIA_ID = '0' LIMIT 1";
            $result = $this->db->query($SQL);
            return $result->row();
        }
    }

}

?>
