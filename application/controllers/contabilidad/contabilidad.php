<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Contabilidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('loged_in') != true) {
            exit('<script>alert("no tiene acceso");window.location=("http://localhost/cacao");</script>');
        }
    }

public function index() {

        $this->load->view('contabilidad/index');
        $this->load->view('modules/foot');
        $data['titulo'] = 'Contabilidad';
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
    }

}

/*Fin del archivo Contabilidad.php*/