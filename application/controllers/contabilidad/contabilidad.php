<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Contabilidad extends CI_Controller{
 
    public function __construct() {
        parent::__construct();   
        $this->load->helper('url');
        $data['titulo']='Contabilidad';
        $this->load->view('modules/menu/menu_contabilidad',$data);
        $this->load->view('modules/foot');

    }
    
    public function index() {
         $this->load->view('contabilidad/index');
    }
    
}

/*Fin del archivo my_controller.php*/