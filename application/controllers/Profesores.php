<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends MY_RootController {


	function __construct()
	{
        parent::__construct();
		$this->load->model('DAO');
		$this->__validateSessionProfesor();
    }

	public function index()
	{
        $this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$data_container['container_data'] = $this->DAO->selectEntity('maestro_view');
		$data_main['container_data'] = $this->load->view('profesores/profesores_data_page',$data_container,TRUE);
		$this->load->view('profesores/profesores_page',$data_main);
		$this->load->view('includes/footer_log');
		$this->load->view('profesores/profesores_js');
	}

	public function saveOrUpdate(){

        $this->load->library('form_validation');
		$this->form_validation->set_rules('nom_prof','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('ape_pa_prof','Apellido paterno','required|max_length[80]');
		$this->form_validation->set_rules('ape_mat_prof','Apellido Paterno','required|max_length[80]');
		$this->form_validation->set_rules('email','Correo','required|max_length[80]|valid_email');
		$this->form_validation->set_rules('genero_prof','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('edad_prof','Edad','required|numeric');
		$this->form_validation->set_rules('num_prof','Numero','required|numeric');
		$this->form_validation->set_rules('grado_cinta_prof','Grado de cinta','required|max_length[80]');
		$this->form_validation->set_rules('escuela_prof','Escuela','required|numeric');
		if ($this->form_validation->run()) {			
			// datos formulario
			$data = array(
				"nombre_maestro" => $this->input->post('nom_prof'),
				"apellido_paterno_maestro" => $this->input->post('ape_pa_prof'),
				"apellido_materno_maestro" => $this->input->post('ape_mat_prof'),
				"genero_maestro" => $this->input->post('genero_prof'),
				"edad_maestro" => $this->input->post('edad_prof'),
				"telefono_maestro" => $this->input->post('num_prof'),
				"grado_cinta_maestro" => $this->input->post('grado_cinta_prof'),
				"escuelaFk" => $this->input->post('escuela_prof'),
				"email_maestro" => $this->input->post('email')
			);

			$response = $this->DAO->saveOrUpdateEntity('maestro',$data);
			if ($response['status'] == "success") {
				$data_response = array(
					"status" => "success"
				);

			}else{
				// error en la base de datos
				$data['current_data'] = $this->input->post();
				$data_response = array(
					"status" => "error",
					"message" => $response["message"],
					"data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
				);
			} 


		}else{
			// mandar errores a la vista
            $data['current_data'] = $this->input->post();
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
				"data" =>  $this->load->view('profesores/profesores_form',$data,TRUE),
				"errors" => $this->form_validation->error_array()
            );
		}
		echo json_encode($data_response);

	}

	public function searchProfesor(){
		if ($this->input->post("search-input")==null) {
			$data_container['container_data'] = $this->DAO->selectEntity('maestro_view');
		}
		else{
			$where = array(
				$this->input->post("search-options") => $this->input->post("search-input"),
			);
			$data_container['container_data'] = $this->DAO->selectEntity('maestro_view',$where);
		}
		echo $this->load->view('profesores/profesores_data_page',$data_container,TRUE);
	}


	public function showProfesoresForm(){
		$data['container_data'] = $this->DAO->selectEntity('escuela');
		echo $this->load->view('profesores/profesores_form',$data,TRUE);
	}
	
	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('maestro');
        echo $this->load->view('profesores/profesores_data_page',$data_container,TRUE);
	}
	
	public function perfil_profesor(){
		$this->load->view('includes/header_log');
        $this->load->view('includes/navegation_log.php');
		$this->load->view('profesores/perfil_page_profesor');
		$this->load->view('includes/footer_log');
	}

	public function get_Escuelas(){
		$data_response = $this->DAO->selectEntity('escuela');
		echo json_encode($data_response);
	}
}

