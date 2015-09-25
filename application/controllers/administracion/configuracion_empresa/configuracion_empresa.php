<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Configuracion_Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('loged_in') != true) {
            exit('<script>alert("no tiene acceso");window.location=("http://localhost/cacao");</script>');
        }
        $this->load->model('administracion/configuracion_empresa/Creacion_configuracion_empresa_model');
    }

    public function index() {
        $consulta = $this->Creacion_configuracion_empresa_model->total_registro();
        if ($consulta == 0) {
            $this->crear_configuracion_empresa();
        } else {
            $this->edita_configuracion_empresa();
        }
    }

    public function crear_configuracion_empresa() {
        $data['titulo'] = 'Configuracion Empresa';
        $this->form_validation->set_rules('nombre_empresa', 'Nombre', 'required|max_length[50]|trim');
        $this->form_validation->set_rules('direccion', 'Direccion', 'max_length[50]|trim');
        $this->form_validation->set_rules('telefono', 'Telefono', 'numeric|integer|trim');
        $this->form_validation->set_rules('ruc', 'R.U.C.', 'required|max_length[20]|alpha_numeric|trim');
        $this->form_validation->set_rules('periodo_fiscal', 'Periodo Fiscal', 'required');
        $this->form_validation->set_rules('pais', 'Pais', 'alpha|max_length[50]|trim');
        $this->form_validation->set_rules('ciudad', 'Ciudad', 'alpha|max_length[50]|trim');

        $this->load->model('administracion/Tipo_moneda_model');
        $lista_idmoneda = $this->Tipo_moneda_model->lista_moneda();

        foreach ($lista_idmoneda as $idmoneda) {
            $lista_idamoneda_final[$idmoneda['idmoneda']] = $idmoneda['descripcion_moneda'];
        }
        $data['idmoneda'] = $lista_idamoneda_final;

        if ($this->form_validation->run() == TRUE) {

            $nombre_empresa = $this->input->post('nombre_empresa');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $ruc = $this->input->post('ruc');
            $idmoneda = $this->input->post('idmoneda');
            $periodo_fiscal = $this->input->post('periodo_fiscal');
            $pais = $this->input->post('pais');
            $ciudad = $this->input->post('ciudad');

            $this->Creacion_configuracion_empresa_model->guardar_configuracion($nombre_empresa, $direccion, $telefono, $ruc, $idmoneda, $periodo_fiscal, $pais, $ciudad);
              exit('<script>alert("Configuracion Creada");window.location=("http://localhost/cacao/index.php/administracion/administracion");</script>');
        } else {
            $this->load->view('modules/menu/menu_administracion', $data);
            $this->load->view('administracion/configuracion_empresa/configuracion_empresa_crea_view', $data);
        }
        $this->load->view('modules/foot/administracion/foot_configuracion_empresa');
    }

    public function edita_configuracion_empresa() {
        $data['titulo'] = "Editar Configuracion Empresa";

        $data['lista_por_id'] = $this->Creacion_configuracion_empresa_model->encontrar_por_id(0);


        $this->form_validation->set_rules('nombre_empresa', 'Nombre', 'required|max_length[50]|trim');
        $this->form_validation->set_rules('direccion', 'Direccion', 'max_length[50]|trim');
        $this->form_validation->set_rules('telefono', 'Telefono', 'numeric|integer|trim');
        $this->form_validation->set_rules('ruc', 'R.U.C.', 'required|max_length[20]|alpha_numeric|trim');
        $this->form_validation->set_rules('pais', 'Pais', 'alpha|max_length[50]|trim');
        $this->form_validation->set_rules('ciudad', 'Ciudad', 'alpha|max_length[50]|trim');
        $data['idempresa'] = 0;

        $this->load->model('administracion/Tipo_moneda_model');
        $lista_idmoneda = $this->Tipo_moneda_model->lista_moneda();

        foreach ($lista_idmoneda as $idmoneda) {
            $lista_idamoneda_final[$idmoneda['idmoneda']] = $idmoneda['descripcion_moneda'];
        }
        $data['idmoneda'] = $lista_idamoneda_final;

        if ($this->form_validation->run() == TRUE) {

            $this->Creacion_configuracion_empresa_model->edita_configuracion_empresa(0);
            exit('<script>alert("Campos Editados");window.location=("http://localhost/cacao/index.php/administracion/administracion");</script>');
        } else {
            $this->load->view('modules/menu/menu_administracion');
            $this->load->view('administracion/configuracion_empresa/configuracion_empresa_edita_view', $data);
        }
        $this->load->view('modules/foot/administracion/foot_configuracion_empresa');
    }

    public function eliminar_configuracion(){
         $this->Creacion_configuracion_empresa_model->eliminar_configuracion(0);
           header('Location:' . base_url() . 'index.php/administracion/administracion');
        
    }
}
