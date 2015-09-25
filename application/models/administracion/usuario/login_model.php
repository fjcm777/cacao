<?php

class Login_Model extends CI_Model {

    public function entrar($usuario, $contrasenia) {
        $this->db->select('usuario,tipo_usuario,contrasenia');
        $this->db->from('usuario_view');
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasenia', md5($contrasenia));

        $this->db->where('estado', '1');

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function tipo_usuario($usuario) {
        $tipo_usuario = $this->db->query("SELECT tipo_usuario FROM usuario_view WHERE usuario='" . $usuario . "'");
        return $tipo_usuario->result_array();
    }

    public function menu_contabilidad_usuario($usuario) {
        $query = $this->db->query("SELECT codigo_menu,enlace, distinguir_submenu, descripcion from usuario_modulo_view where menu_principal = 0 and alias_modulo = 'CG' and usuarios = '" . $usuario . "' order by codigo_menu");
        return $query->result_array();
    }

///// menu de contabilidad ////
    function recuperar_menus_principales_contabilidad($usuario) {
        $query = $this->db->query("select * from usuario_modulo_view where menu_principal = 1 and alias_modulo = 'CG' and estado = 1 and usuarios = '" . $usuario . "' order by codigo_menu");
        return $query->result_array();
    }

    public function recuperar_submenu_transacciones($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "CG" and nivel0 = "02" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }

    public function recuperar_submenu_catalogos($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "CG" and nivel0 = "03" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }

    public function recuperar_submenu_operaciones($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "CG" and nivel0 = "04" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }

    public function recuperar_submenu_gestion($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "CG" and nivel0 = "05" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }
    
/////menu de bancos ////
    
       function recuperar_menus_principales_banco($usuario) {
        $query = $this->db->query("select * from usuario_modulo_view where menu_principal = 1 and alias_modulo = 'BC' and estado = 1 and usuarios = '" . $usuario . "' order by codigo_menu");
        return $query->result_array();
    }

    public function recuperar_submenu_transacciones_banco($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "BC" and nivel0 = "02" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }

    public function recuperar_submenu_catalogos_banco($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "BC" and nivel0 = "03" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }

    public function recuperar_submenu_operaciones_banco($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "BC" and nivel0 = "04" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }

    public function recuperar_submenu_gestion_banco($usuario) {
        $query = $this->db->query('SELECT * FROM usuario_modulo_view WHERE menu_principal= 0 AND alias_modulo = "BC" and nivel0 = "05" and estado = 1 and usuarios = "' . $usuario . '" order by codigo_menu ');
        return $query->result_array();
    }
}
