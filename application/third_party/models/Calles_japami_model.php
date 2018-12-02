<?php

class Calles_japami_model extends CI_Model {

    function getcalles($id) {
        $SQL = "SELECT DISTINCT  cat_cor_calles.NOMBRE, cat_cor_calles.CALLE_ID
FROM cat_cor_calles
INNER JOIN cat_cor_calles_colonias ON cat_cor_calles.CALLE_ID = cat_cor_calles_colonias.CALLE_ID
INNER JOIN cat_cor_colonias ON cat_cor_calles_colonias.colonia_id = cat_cor_colonias.colonia_id
WHERE cat_cor_colonias.colonia_id =".$id." ORDER BY cat_cor_calles.nombre ASC";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }
 function getcalles1($id=NULL) {
     $SQL = "SELECT cat_cor_calles.NOMBRE, cat_cor_calles.CALLE_ID FROM cat_cor_colonias, cat_cor_calles_colonias, cat_cor_calles WHERE cat_cor_calles.CALLE_ID = cat_cor_calles_colonias.CALLE_ID AND cat_cor_colonias.COLONIA_ID = cat_cor_calles_colonias.COLONIA_ID AND cat_cor_colonias.COLONIA_ID = '" . $id . "'";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }
    //Obtener La colonia que ya guardé y mostrar a ususario
    function getcallebyid($id, $nombre) {
        $SQL = " SELECT cat_cor_colonias.NOMBRE,cat_cor_calles.NOMBRE FROM cat_cor_colonias INNER JOIN cat_cor_calles_colonias ON cat_cor_colonias.COLONIA_ID=cat_cor_calles_colonias.COLONIA_ID INNER JOIN cat_cor_calles ON cat_cor_calles_colonias.CALLE_ID =cat_cor_calles.CALLE_ID WHERE cat_cor_colonias.`COLONIA_ID` = " . $id . " AND cat_cor_calles.`NOMBRE` LIKE '%" . $nombre . "'";
//        die(print_r($SQL,true));
        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }

    function getcallepredialbyid($id) {
        $SQL = "select nombre from cat_calles_predial where CALLE_ID = '" . $id . "' LIMIT 1";

        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }

    function getalladatacallebyid($id) {

        if (is_numeric($id)) {
            $SQL = "select * from cat_cor_calles where CALLE_ID = '" . $id . "' LIMIT 1";
        } else {
            $id = trim($id);
            $SQL = "select * from cat_cor_calles where NOMBRE LIKE '%" . $id . "%' LIMIT 1";
        }


        $result = $this->db->query($SQL);
        //Convertir a una fila
        if ($result->row()) {
            return $result->row();
        } else {
            $SQL = "select * from cat_cor_calles where CALLE_ID = '0' LIMIT 1";

            $result = $this->db->query($SQL);
            return $result->row();
        }


        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }
     function getalladatacallebyid1($nombre,$id) {

       
            $SQL = "SELECT DISTINCT cat_cor_calles.calle_id
	FROM cat_cor_calles
	INNER JOIN cat_cor_calles_colonias ON cat_cor_calles.CALLE_ID = cat_cor_calles_colonias.CALLE_ID
	INNER JOIN cat_cor_colonias ON cat_cor_calles_colonias.colonia_id = cat_cor_colonias.colonia_id
	where cat_cor_colonias.colonia_id = ".$id." and cat_cor_calles.nombre like '%".$nombre."%' limit 1";
   

        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }

}

?>
