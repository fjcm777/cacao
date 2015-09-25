<?php

class Tipo_Usuario_Model extends CI_Model { 
    
         function lista_dropdown() {
        $tags = $this->db->query('select distinct idtipo_usuario , tipo_usuario from tipos_usuarios WHERE idtipo_usuario > 0');
        $dropdowns = $tags->result_array();
        foreach ($dropdowns as $dropdown) {
          $dropdownlist[$dropdown['idtipo_usuario']] = $dropdown['tipo_usuario'];
        }
        $finaldropdown = $dropdownlist;
        return $finaldropdown;
      }

}
