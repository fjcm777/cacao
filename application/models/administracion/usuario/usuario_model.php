<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Usuario_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //listar activos e inactivos
    public function usuario_paginacion($estado, $inicio, $num_por_pagina) {
        $datos = $this->db->query('SELECT idusuario,nombre,apellido,usuario, tipo_usuario FROM usuario_view WHERE estado=' . $estado . ' AND idusuario > 0 ORDER BY nombre LIMIT ' . $inicio . ',' . $num_por_pagina . '');
        return $datos->result_array();
    }

    // numero de registros activos e inactivos
    public function numero_usuarios($estado) {
        $numero_registros = $this->db->query('SELECT idusuario,nombre,apellido,usuario, tipo_usuario FROM usuario_view WHERE estado=' . $estado . '');
        return $numero_registros->num_rows();
    }

    /// metodo para listar por nombre

    function usuario_lista() {
        $query = $this->db->query('SELECT idusuario,nombre,apellido,usuario, tipo_usuario FROM usuario_view WHERE estado = 1');
        $dropdowns = $query->result_array();
        if ($dropdowns) {
            foreach ($dropdowns as $dropdown) {
                $lista[$dropdown['idusuario']] = $dropdown['usuario'];
            }
        } else {
            $lista = "";
        }
        $option = $lista;
        return $option;
    }

    //crearcion de usuario
    public function usuario_crear($nombre, $apellido, $usuario, $tipo_usuario, $contrasenia_md5) {

        $this->db->query("insert into usuarios (nombre, apellido , usuario, idtipo_usuario, contrasenia) values ('$nombre','$apellido','$usuario', '$tipo_usuario', '$contrasenia_md5');");
    }

    //cambiar estado  
    public function cambiar_estado_usuario($idusuario, $estado) {
        $this->db->query('UPDATE usuarios SET estado=' . $estado . ' WHERE idusuario=' . $idusuario);
    }

    //eliminar usuario
    public function usuario_eliminar($idusuario) {
        $this->db->query("delete from usuarios where idusuario=" . $idusuario);
    }

    public function recuperar_usuario($idusuario) {
        $usuario = $this->db->query("select usuario from usuarios where idusuario=" . $idusuario);
        return $usuario->result_array();
    }

    //metodo complementario para editar
    public function encontrar_por_id($idusuario = NULL) {
        if ($idusuario != NULL) {
            $query = $this->db->where('idusuario', $idusuario);
            $query = $this->db->get('usuario_view');
        }
        return $query->result_array();
    }

    //modificar usuario
    public function usuario_editar($idusuario) {

        $form_data = $this->input->post();
        unset($form_data['botomSubmit']);

        $this->db->where('idusuario', $idusuario);
        $this->db->update('usuarios', $form_data);
    }

    public function usuario_editar_pass($idusuario, $nuevo_pass) {
        $this->db->query("update usuarios set contrasenia='" . $nuevo_pass . "' where idusuario='" . $idusuario . "'");
    }

    public function buscar_usuario($campo, $valor, $inicio, $num_por_pagina) {
        if ($valor != "" && !empty($campo)) {
            $query = $this->db->query("select idusuario,nombre,apellido,usuario, tipo_usuario FROM usuario_view WHERE estado=1 AND " . $campo . " LIKE '%" . $valor . "%' ORDER BY idusuario LIMIT " . $inicio . "," . $num_por_pagina . "");
        }
        return $query->result_array();
    }

    public function numero_usuario_buscados($campo, $valor) {
        $numero_registros = $this->db->query("select idusuario,nombre,apellido,usuario, tipo_usuario FROM usuario_view WHERE estado=1 AND " . $campo . " LIKE '%" . $valor . "%' ORDER BY idusuario");
        return $numero_registros->num_rows();
    }

  

}
