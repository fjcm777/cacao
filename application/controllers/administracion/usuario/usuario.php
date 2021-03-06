<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administracion/usuario/Login_model');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        if ($this->session->userdata('idusuario') == false) {
            $this->form_validation->set_rules('user', 'Usuario', 'trim|required');
            $this->form_validation->set_rules('pass', 'Contraseñia', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->load->view('administracion/usuario/login_view');
            } else {
                $usuario = $this->input->post('user');
                $contrasenia = $this->input->post('pass');

                $tipo_usuario = $this->Login_model->tipo_usuario($usuario, $usuario);

                $ingreso = $this->Login_model->entrar($usuario, $contrasenia);

                switch ($ingreso):
                    case 0:
                        $this->load->view('administracion/usuario/login_view');
                        break;
                    case 1:
                        $data = array(
                            'user' => $usuario,
                            'tipo_usuario' => $tipo_usuario[0]['tipo_usuario'],
                            'loged_in' => true
                        );
                        $this->session->set_userdata($data);
                       header('Location:' . base_url() . 'index.php/contabilidad/contabilidad');
                        break;
                endswitch;
            }
        }
    }

    public function salir() {
        $this->session->sess_destroy();
        $this->index();
    }

}
