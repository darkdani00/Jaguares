<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends MY_RootController {

	function __construct()
	{
        parent::__construct();
		$this->load->model('DAO');
		// $this->__validateSessionAlumno();
    }

	public function index()
	{
        $this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$current_session = $this->session->userdata('user_sess');
		if ($current_session->user_type == 'Admin') {
			$data_container['container_data'] = $this->DAO->selectEntity('alumno_view');
		}else{
			$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM alumno_view WHERE profeFk = '$current_session->id_maestro'");
		}
		$data_main['container_data'] = $this->load->view('alumnos/alumnos_data_page',$data_container,TRUE);
		$this->load->view('alumnos/alumnos_page',$data_main);
		$this->load->view('includes/footer_log');
		$this->load->view('alumnos/alumnos_js');
	}

	public function perfil_alumno(){
		$this->load->view('includes/header_log');
        $this->load->view('includes/navegation_log.php');
		$this->load->view('alumnos/perfil_page_alumno');
		$this->load->view('includes/footer_log');
	}

	public function saveOrUpdate(){

        $this->load->library('form_validation');
		$this->form_validation->set_rules('nom_alumno','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('ape_pa_alumno','Apellido paterno','required|max_length[80]');
		$this->form_validation->set_rules('ape_mat_alumno','Apellido Paterno','required|max_length[80]');
		$this->form_validation->set_rules('email','Correo','required|max_length[80]|valid_email');
		$this->form_validation->set_rules('genero_alumno','Nombre','required|max_length[80]');
		$this->form_validation->set_rules('edad_alumno','Edad','required|numeric');
		$this->form_validation->set_rules('num_alumno','Numero','required|numeric');
		$this->form_validation->set_rules('grado_cinta_alumno','Grado de cinta','required|max_length[80]');
		$this->form_validation->set_rules('escuela_alumno','Escuela','required|numeric');
		$this->form_validation->set_rules('prof_alumno','Profesor','required|numeric');
		$this->form_validation->set_rules('discapacidades','Discapacidades','required');
		$this->form_validation->set_rules('entrenamiento','A&ntilde;os de entrenamiento','required|numeric');
		$this->form_validation->set_rules('tutor','Tutor','required');
		$this->form_validation->set_rules('hora_entrenamiento','Hora de entrenamiento','required');
		$this->form_validation->set_rules('pagado','Informaci&oacute;n de pago','required');
		if ($this->form_validation->run()) {			
			// datos formulario
			$data = array(
				"nombre_alumno" => $this->input->post('nom_alumno'),
				"apellido_paterno_alumno" => $this->input->post('ape_pa_alumno'),
				"apellido_materno_alumno" => $this->input->post('ape_mat_alumno'),
				"genero_alumno" => $this->input->post('genero_alumno'),
				"edad_alumno" => $this->input->post('edad_alumno'),
				"telefono_alumno" => $this->input->post('num_alumno'),
				"grado_cinta_alumno" => $this->input->post('grado_cinta_alumno'),
				"escuelaFk" => $this->input->post('escuela_alumno'),
				"email_alumno" => $this->input->post('email'),
				"profeFk" => $this->input->post('prof_alumno'),
				"discapacidad_alumno" => $this->input->post('discapacidades'),
				"years_entrenamiento" => $this->input->post('entrenamiento'),
				"tutor_alumno" => $this->input->post('tutor'),
				"hora_entrenamiento_alumno" => $this->input->post('hora_entrenamiento'),
				"pago_realizado" => $this->input->post('pagado')
			);

			$response = $this->DAO->saveOrUpdateEntity('alumno',$data);
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
					"data" =>  $this->load->view('alumnos/alumno_form',$data,TRUE)
				);
			} 


		}else{
			// mandar errores a la vista
            $data['current_data'] = $this->input->post();
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
				"data" =>  $this->load->view('alumnos/alumno_form',$data,TRUE),
				'errors' => $this->form_validation->error_array()
            );
		}
		echo json_encode($data_response);

	}

	public function searchAlumno(){
		// agregar que pase algo si no existe en la base de datos por si modifican el html
		if ($this->input->post("search-input")==null) {
			$data_container['container_data'] = $this->DAO->selectEntity('alumno_view');
		}else{
			$where = array(
				$this->input->post("search-options") => $this->input->post("search-input"),
			);
			$data_container['container_data'] = $this->DAO->selectEntity('alumno_view',$where);
		}
		echo $this->load->view('alumnos/alumnos_data_page',$data_container,TRUE);
	}


	public function showAlumnosForm(){
		$data['container_data'] = $this->DAO->selectEntity('escuela');
		echo $this->load->view('alumnos/alumno_form',$data,TRUE);
	}
	
	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('alumno');
        echo $this->load->view('alumnos/alumnos_data_page',$data_container,TRUE);
	}

	public function get_Escuelas(){
		$data_response = $this->DAO->selectEntity('escuela');
		echo json_encode($data_response);
	}

	public function get_Profesores(){
		$data_response = $this->DAO->selectEntity('maestro');
		echo json_encode($data_response);
	}
}
