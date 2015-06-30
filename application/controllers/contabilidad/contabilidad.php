<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Contabilidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['titulo'] = 'Contabilidad';
        $this->load->view('modules/menu/menu_contabilidad', $data);
        $this->load->view('contabilidad/index');
        $this->load->view('modules/foot');
    }

}

/*Fin del archivo Contabilidad.php*/