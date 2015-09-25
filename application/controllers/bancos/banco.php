<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Banco extends CI_Controller{
 
   public function __construct() {
        parent::__construct();   
        $this->load->helper('url');
        $data['titulo'] = 'Banco';
        switch ($this->session->userdata('tipo_usuario')):

            case 'Administrador':
                $this->load->view('modules/menu/menu_bancos', $data);
                break;

            case 'Usuario':
                $this->load->model('administracion/usuario/Login_Model');

                $usuario = $this->session->userdata('user');

                $menu_inicio = $this->Login_Model->recuperar_menus_principales_banco($usuario);
                $submenu_transacciones = $this->Login_Model->recuperar_submenu_transacciones_banco($usuario);
                $submenu_catalogos = $this->Login_Model->recuperar_submenu_catalogos_banco($usuario);
                $submenu_operaciones = $this->Login_Model->recuperar_submenu_operaciones_banco($usuario);
                $submenu_gestion = $this->Login_Model->recuperar_submenu_gestion_banco($usuario);

                $menu_armado = $this->menu->menu_usuario($menu_inicio, $submenu_transacciones, $submenu_catalogos, $submenu_operaciones, $submenu_gestion);

                $data['menu'] = $menu_armado;
                $this->load->view('modules/menu/menu_bancos_usuario', $data);

                break;
        endswitch;
        
    }
    
    public function index() {
         $this->load->view('bancos/index');
    }
    
}

/*Fin del archivo my_controller.php*/