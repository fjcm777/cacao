<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Administracion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('loged_in') != true) {

            exit('<script>alert("no tiene acceso");window.location=("http://localhost/cacao");</script>');
        }
        $data['titulo'] = 'Administracion';

        switch ($this->session->userdata('tipo_usuario')):

            case 'Administrador':
                $this->load->view('modules/menu/menu_administracion', $data);
                break;

            case 'Usuario':
                exit('<script>alert("no tiene acceso");window.location=("http://localhost/cacao/index.php/contabilidad/contabilidad");</script>');
                break;
        endswitch;
    }

    public function index() {
        $this->load->view('administracion/index');
        $this->load->view('modules/foot');
    }

}

/*Fin del archivo my_controller.php*/