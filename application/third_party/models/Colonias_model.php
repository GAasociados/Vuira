<?php

class Colonias_model extends CI_Model {

    function getcolonias() {
        $SQL = "select * from cat_cor_colonias order by nombre";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }

    function getcoloniaspredial() {
        $SQL = "select * from cat_colonia_predial order by nombre";
        //return $this->db->get('colonias');
        return $this->db->query($SQL);
    }

    function getcpbyid($id) {
        $SQL = "select codigo_postal from colonias where ID = '" . $id . "' LIMIT 1";
        //return $this->db->get('colonias');
        $consulta = $this->db->query($SQL);
        //return $id;
        //$this->db->like("apellido_pat",$valor);
        //$consulta = $this->db->get("colonias");
        return $consulta->result();
    }

    function getcoloniabyid($id) {

        $SQL = "select NOMBRE from cat_cor_colonias where COLONIA_ID = '" . $id . "' LIMIT 1";
        $result = $this->db->query($SQL);
        //Convertir a una fila
        return $result->row();
    }

    function getalladatacoloniabyid($id) {

        $SQL = "select * from cat_cor_colonias where COLONIA_ID = '" . $id . "' LIMIT 1";

        /*          <option value = "<?php echo $fila->ID; ?>">
          //        <?php echo $fila->colonia . " - (" . $fila->tipo_de_asentamiento . ")";
          //?>
          </option>
         * 
         */
        $result = $this->db->query($SQL);

        if ($result->row()) {
            return $result->row();
        } else {
            $resultado = new stdClass();
//            $resultado->tipo_de_asentamiento = "";
            $resultado->COLONIA_ID = "";
            $resultado->NOMBRE = "";

            return $resultado;
        }
        //Convertir a una fila
    }

    function getalladatacoloniabyidpredial($id) {

        $SQL = "select * from cat_colonia_predial where COLONIA_ID = '" . $id . "' LIMIT 1";

        /*          <option value = "<?php echo $fila->ID; ?>">
          //        <?php echo $fila->colonia . " - (" . $fila->tipo_de_asentamiento . ")";
          //?>
          </option>
         * 
         */
        $result = $this->db->query($SQL);

        if ($result->row()) {
            return $result->row();
        } else {
            $resultado = new stdClass();
//            $resultado->tipo_de_asentamiento = "";
            $resultado->COLONIA_ID = "";
            $resultado->NOMBRE = "Seleccione Una Colonia";

            return $resultado;
        }
        //Convertir a una fila
    }

}

?>
