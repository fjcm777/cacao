<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Creacion_configuracion_empresa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function guardar_configuracion($nombre_empresa, $direccion, $telefono, $ruc, $idmoneda, $periodo_fiscal, $pais, $ciudad) {

        $this->db->query("insert into configuracion_empresa(nombre_empresa,direccion,telefono,ruc,idmoneda, periodo_fiscal, pais, ciudad)values('$nombre_empresa','$direccion' , '$telefono', '$ruc', $idmoneda , '$periodo_fiscal', '$pais','$ciudad')");
    }

    public function total_registro() {
        $total_registro = $this->db->query("select nombre_empresa from configuracion_empresa");
        return $total_registro->num_rows();
    }

    //metodo complementario para editar
    public function encontrar_por_id($idempresa = NULL) {
        if ($idempresa == NULL) {
            $query = $this->db->where('idempresa', $idempresa);
            $query = $this->db->get('configuracion_empresa');
        }
        return $query->result_array();
    }

    public function edita_configuracion_empresa($idempresa) {
        $form_data = $this->input->post();
        unset($form_data['botomSubmit']);

        $this->db->where('idempresa', $idempresa);
        $this->db->update('configuracion_empresa', $form_data);
    }
    
    public function eliminar_configuracion(){
        $this->db->query("delete from configuracion_empresa where idempresa = 0");
    }

}
