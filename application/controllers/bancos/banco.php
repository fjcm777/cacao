<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Banco extends CI_Controller{
 
    public function __construct() {
        parent::__construct();   
        $this->load->helper('url');
        $this->load->view('modules/menu/menu_bancos');
    }
    
    public function index() {
         $this->load->view('bancos/index');
    }
    
}

/*Fin del archivo my_controller.php*/