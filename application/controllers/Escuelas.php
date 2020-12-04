<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escuelas extends MY_RootController {


	function __construct()
	{
        parent::__construct();
		$this->load->model('DAO');
    }

	public function index()
	{
        $this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$data_container['container_data'] = $this->DAO->selectEntity('escuela');
		$data_main['container_data'] = $this->load->view('escuelas/escuelas_data_page',$data_container,TRUE);
		$this->load->view('escuelas/escuelas_page',$data_main);
		$this->load->view('includes/footer_log');
		$this->load->view('escuelas/escuelas_js');
	}

	public function saveOrUpdate(){

        $this->load->library('form_validation');
		$this->form_validation->set_rules('nom_escuela','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('tel_escuela','Tel&eacute;fono','required|max_length[80]');
		$this->form_validation->set_rules('direccion_escuela','Direcci&oacute;n','required|max_length[80]');
		if ($this->form_validation->run()) {			
			// datos formulario
			$data = array(
				"nombre_escuela" => $this->input->post('nom_escuela'),
				"direccion_escuela" => $this->input->post('direccion_escuela'),
				"telefono_escuela" => $this->input->post('tel_escuela')
			);
			$response = $this->DAO->saveOrUpdateEntity('escuela',$data);
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
					"data" =>  $this->load->view('escuelas/escuelas_form',$data,TRUE)
				);
			} 


		}else{
			// mandar errores a la vista
            $data['current_data'] = $this->input->post();
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
				"data" =>  $this->load->view('escuelas/escuelas_form',$data,TRUE),
				"errors" => $this->form_validation->error_array()
            );
		}
		echo json_encode($data_response);

	}

	public function searchEscuela(){
		$where = array(
			"nombre_escuela" => $this->input->post("search-input")
		);
		$data_container['container_data'] = $this->DAO->selectEntity('escuela',$where);
		echo $this->load->view('escuelas/escuelas_data_page',$data_container,TRUE);
	}


	public function showEscuelasForm(){
		$this->load->view('escuelas/escuelas_form');
	}
	
	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('escuela');
        echo $this->load->view('escuelas/escuelas_data_page',$data_container,TRUE);
	}
}

