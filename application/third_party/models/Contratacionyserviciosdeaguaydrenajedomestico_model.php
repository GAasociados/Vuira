<<?php

    class Contratacionyserviciosdeaguaydrenajedomestico_model extends CI_Model
    {
      public function savetrams($data){
        $data = $this->db->escape_like_str($data);

        $SQL = "INSERT INTO contratacion_y_servicios_de_agua_y_drenaje_domestico (nombre,fecha,calle,numero,coloniadg,tiposervicio,serviciosdelpredio,serviciosquesolicita,condicionesgenerales,nombredelsolicitante,mapa,usuarioID,status,pago) VALUES ('".$data['nombre']."','".$data['fecha']."','".$data['calle']."','".$data['numero']."','".$data['coloniadg']."','".$data['tiposervicio']."','".$data['serviciosdelpredio']."','".
//        $data['serviciosquesolicita']"','".$data['condicionesgenerales']."','".$data['nombredelsolicitante']."','".$data['mapa']."','".$data['usuarioID']."','".$data['status']."','')";

        //$resultquery = $this->db->query($SQL);
        $this->db->query($SQL);
        //return $SQL;

        if ($this->db->affected_rows()>0) {
          return true;
        }
        else{
          return false;
        }
      }
    }
 ?>
