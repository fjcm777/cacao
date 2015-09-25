<?php

class Permisos_Model extends CI_Model{
    
    function guardar_permisos_usuario($usuario, $codigo_permiso ){
        $this->db->query("insert into usuario_modulo (usuario, codigo_menu)values('".$usuario."','".$codigo_permiso."')");
    }
    
    function recuperar_permisos($usuario){
        $query = $this->db->query("select * from usuario_modulo where usuario='".$usuario."'  and estado = 1 order by codigo_menu");
        return $query->result_array();
    }
    function numero_permisos($usuario, $codigo){
        $query = $this->db->query("select * from usuario_modulo where usuario='".$usuario."' and codigo_menu='".$codigo."'  order by codigo_menu");
        return $query->num_rows();
    }
 
            
    function eliminar_permisos_usuario($usuario){
            $this->db->query("delete from usuario_modulo where usuario='".$usuario."'");
    }
    
    function recuperar_menu_contabilidad(){
        $query_contabilidad = $this->db->query("select idmenu, descripcion, codigo_menu from menu_contabilidad_usuario_view");
        return $query_contabilidad->result_array();
    } 
    
     function recuperar_menu_banco(){
        $query_contabilidad = $this->db->query("select idmenu, descripcion, codigo_menu from menu_banco_usuario_view");
        return $query_contabilidad->result_array();
    } 
    
    function inactivar_permisos($usuario, $codigo){
        $this->db->query("update usuario_modulo set estado =0 where usuario='" . $usuario . "' and codigo_menu='".$codigo."'");
    }
    
      function activar_permisos_usuario($usuario, $codigo){
        $this->db->query("update usuario_modulo set estado =1 where usuario='" . $usuario . "' and codigo_menu='".$codigo."'");
    }
    

}