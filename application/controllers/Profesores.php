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
		$data_menu['maestros_selected'] = true;
		$this->load->view('includes/navegation_log.php',$data_menu);
		$data_container['container_data'] = $this->DAO->selectEntity('maestro_view',array('maestro_status'=>'Active'));
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
			// si es editar
			if ($this->input->post('id_maestro')) {
				$response = $this->DAO->saveOrUpdateEntity('maestro',$data,array('id_maestro'=>$this->input->post('id_maestro')));
			}else{
				$response = $this->DAO->saveOrUpdateEntity('maestro',$data);
			}
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

	public function delete_profesor(){
		$profe_id = $this->input->get('profe_id'); 
		// hacer una consulata para ver si tiene referencias en otras tablas
		$referencias = $this->DAO->checkReferences(array(
			array('table'=>'alumno','foreign_key'=>'profeFk','id'=>$profe_id),
			array('table'=>'clase','foreign_key'=>'profeFk','id'=>$profe_id)
		));
		// si tiene referencias en otras tablas cambiar el estado a inactive
		if(!$referencias){
			$response = $this->DAO->saveOrUpdateEntity('maestro',array('maestro_status'=>'Inactive'),array('id_maestro'=>$profe_id));
		}else{
			// si no tiene referencias en otras tablas borra el elemento
			$response = $this->DAO->deleteItemEntity('maestro',array('id_maestro'=>$profe_id));
		}
		if($response['status']=='error'){
			$data_response = array(
                "status" =>$response['status'],
                "message" =>  $response['message']
            );
		}else{
			$data_response = array(
                "status" => $response['status'],
                "message" => $response['message']
            );
		}
		echo json_encode($data_response);
	}
	
	public function searchProfesor(){
		if ($this->input->post("search-input")==null) {
			$data_container['container_data'] = $this->DAO->selectEntity('maestro_view');
		}
		else{
			$where = $this->input->post("search-input");
			if ($this->input->post("search-options") == 'nombre_maestro') {
				$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM maestro_view WHERE nombre_escuela LIKE '%$where%' OR apellido_paterno_maestro LIKE '%$where%' OR apellido_materno_maestro LIKE '%$where%'");
			}elseif($this->input->post("search-options") == 'edad_maestro' || $this->input->post("search-options") == 'nombre_escuela'){
				$where_clause = array($this->input->post("search-options") => $this->input->post("search-input"));
				$data_container['container_data'] = $this->DAO->selectEntity('maestro_view',$where_clause);
			}else{
				$data_container['container_data'] = $this->DAO->selectEntity('maestro_view');
			}
		}
		echo $this->load->view('profesores/profesores_data_page',$data_container,TRUE);
	}

	public function showProfesoresForm(){
		if ($this->input->get('id_maestro')) {
			$data  = $this->DAO->selectEntity('maestro',array('id_maestro'=>$this->input->get('id_maestro')),TRUE);
			$array = (array) $data;
			$escuela = $this->DAO->selectEntity('escuela',array('id_escuela'=>$array['escuelaFk']),TRUE);
			$data_view['current_data'] = array(
				'nom_prof' => $array['nombre_maestro'],
				'ape_pa_prof' => $array['apellido_paterno_maestro'],
				'ape_mat_prof' => $array['apellido_materno_maestro'],
				'email' => $array['email_maestro'],
				'genero_prof' => $array['genero_maestro'],
				'edad_prof' => $array['edad_maestro'],
				'num_prof' => $array['telefono_maestro'],
				'grado_cinta_prof' => $array['grado_cinta_maestro'],
				'escuela_prof' => $escuela->nombre_escuela,
				'id_maestro' => $this->input->get('id_maestro')
			);
		}
		$data_view['container_data'] = $this->DAO->selectEntity('escuela');
		echo $this->load->view('profesores/profesores_form',$data_view,TRUE);
	}
	
	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('maestro_view',array('maestro_status'=>'Active'));
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