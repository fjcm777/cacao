<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Contabilidad_config extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('contabilidad/operaciones/Contabilidad_config_model');
    }

    public function index() {
        $data['titulo']="Configuracion de Contabilidad";
        
         switch ($this->session->userdata('tipo_usuario')):

            case 'Administrador':
                $this->load->view('modules/menu/menu_contabilidad', $data);

                break;

            case 'Usuario':
                $this->load->model('administracion/usuario/Login_Model');

                $usuario = $this->session->userdata('user');
                $menu_inicio = $this->Login_Model->recuperar_menus_principales_contabilidad($usuario);
                $submenu_transacciones = $this->Login_Model->recuperar_submenu_transacciones($usuario);
                $submenu_catalogos = $this->Login_Model->recuperar_submenu_catalogos($usuario);
                $submenu_operaciones = $this->Login_Model->recuperar_submenu_operaciones($usuario);
                $submenu_gestion = $this->Login_Model->recuperar_submenu_gestion($usuario);

                $menu_armado = $this->menu->menu_usuario($menu_inicio, $submenu_transacciones, $submenu_catalogos, $submenu_operaciones, $submenu_gestion);

                $data['menu'] = $menu_armado;
                $this->load->view('modules/menu/menu_contabilidad_usuario', $data);

                break;
        endswitch;
        
        $this->load->view('contabilidad/gestion/configuracion_modulo_view', $data);
        $this->load->view('modules/foot/contabilidad/administracion_config_foot');
    }

    public function contabilidad_config_guardar() {

//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);
//        filter_input(INPUT_POST, $variable_name);

        

}
}