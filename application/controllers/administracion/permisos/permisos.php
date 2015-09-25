<?php

class Permisos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('loged_in') != true) {
            exit('<script>alert("no tiene acceso");window.location=("http://localhost/cacao");</script>');
        }
        $this->load->model('administracion/permisos/Permisos_Model');
    }

    public function index() {
        $this->permisos();
    }

    public function permisos() {

        $usuario = filter_input(INPUT_POST, 'usuario');
        $codigo_permiso = filter_input(INPUT_POST, 'codigo_permiso');

        $this->Permisos_Model->guardar_permisos_usuario($usuario, $codigo_permiso);
    }

    public function mostrar_permisos() {
        $usuario = filter_input(INPUT_POST, 'usuario');
        $cadena = "";

        $permiso_regresado = $this->Permisos_Model->recuperar_permisos($usuario);

        foreach ($permiso_regresado as $pr) {
            $cadena .= $pr['codigo_menu'] . ",";
        }
        echo $cadena;
    }

    public function editar_permisos() {
        $usuario = filter_input(INPUT_POST, 'usuario');
        $codigo_permiso = filter_input(INPUT_POST, 'codigo_permiso');

        $permiso_regresado = $this->Permisos_Model->numero_permisos($usuario, $codigo_permiso);

        if ($permiso_regresado > 0) { 
             $this->Permisos_Model->activar_permisos_usuario($usuario,$codigo_permiso);
        } else {
                $this->Permisos_Model->guardar_permisos_usuario($usuario,$codigo_permiso);
        }
    }
    
    public function inactivar_permiso(){
        $usuario = filter_input(INPUT_POST, 'usuario');
        $codigo_permiso = filter_input(INPUT_POST, 'codigo_permiso');

        $this->Permisos_Model->inactivar_permisos($usuario, $codigo_permiso);
    }

}
