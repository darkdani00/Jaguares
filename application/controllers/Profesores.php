<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {


	function __construct()
	{
        parent::__construct();
        $this->load->model('DAO');
    }

	public function index()
	{
        $this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$data_container['container_data'] = $this->DAO->selectEntity('maestro');
		$this->load->view('profesores/profesores_page',$data_container);
		$this->load->view('includes/footer_log');
		$this->load->view('profesores/profesores_js');
	}

	public function saveOrUpdate(){

        $this->load->library('form_validation');
		$this->form_validation->set_rules('nom_prof','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('ape_pa_prof','Apellido paterno','required|max_length[80]');
		$this->form_validation->set_rules('ape_mat_prof','Apellido Paterno','required|max_length[80]');
		$this->form_validation->set_rules('genero_prof','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('edad_prof','Edad','required|numeric');
		$this->form_validation->set_rules('num_prof','Numero','required|numeric');
		$this->form_validation->set_rules('grado_cinta_prof','Grado de cinta','required|max_length[80]');
		$this->form_validation->set_rules('escuela_prof','Escuela','required|max_length[80]');
		if ($this->form_validation->run()) {
			// registrar en base de datos
			$data_response = array(
				"status" => "success"
			);
		}else{
			// mandar errores a la vista
            $data['errors'] = $this->form_validation->error_array();
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
                "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
            );
		}
		echo json_encode($data_response);

	}

	public function getEscuelas(){
		$data_response = $this->DAO->selectEntity('escuela');
		// regresar data
		if ($data_response) {
			$response = array(
				"status_text" => "success",
				"data" => $data_response
			);
		}else{
			$response = array(
				"status_text" => "error",
				"data" => $data_response
			);
		}
		echo json_encode($response);
	}

	public function showProfesoresForm(){
		$data['container_data'] = $this->DAO->selectEntity('escuela');
		echo $this->load->view('profesores/profesores_form',$data,TRUE);
    }
}

