<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencias extends MY_RootController {

	
	function __construct()
	{
        parent::__construct();
		$this->load->model('DAO');
    }


	public function index()
	{
        $this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$data_container['container_data'] = $this->DAO->selectEntity('clase_view');
		$data_main['container_data'] = $this->load->view('asistencias/asistencias_data_page',$data_container,TRUE);
		$this->load->view('asistencias/asistencias_page',$data_main);
		$this->load->view('includes/footer_log');
		$this->load->view('asistencias/asistencias_js');
	}

	public function showClasesForm(){
		$data['container_data'] = $this->session->userdata('user_sess');
		echo $this->load->view('asistencias/clase_form',$data,TRUE);
	}

	public function showAsistenciasForm(){
		$clase = $this->input->get('clase_id');
		$data['alumnos_data'] = $this->DAO->customQuery("SELECT * FROM alumnos_clase_view WHERE claseFk = '$clase' ");
		echo $this->load->view('asistencias/asistencias_form',$data,TRUE);
	}

	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('clase_view');
        echo $this->load->view('asistencias/asistencias_data_page',$data_container,TRUE);
	}

	public function saveOrUpdate(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_maestro','Id maestro','required|numeric');
		$this->form_validation->set_rules('hora_inicia','Hora inicio clase','required');
		$this->form_validation->set_rules('hora_termina','Hora termino clase','required');
		$this->form_validation->set_rules('dia_semana','D&iacute;a de la semana','required|numeric');
		$this->form_validation->set_rules('alumno_clase[]','Alumnos','required');
		if ($this->form_validation->run()) {			
			//datos de la clase
			$clase = array(
				"profeFk" => $this->input->post('id_maestro'),
				"hora_inicia" => $this->input->post('hora_inicia'),
				"hora_termina" => $this->input->post('hora_termina'),
				"dia_semana" => $this->input->post('dia_semana')
			);
			//Ids de alumnos
			$alumnos_clase = $this->input->post('alumno_clase[]');
			// mandar a DAO
			$response = $this->DAO->createClass($clase,$alumnos_clase);

			if ($response['status'] == "success") {
				$data_response = array(
					"status" => "success",
					"message" => "Datos insertados correctamente"
				);
			}else{
				$data['current_data'] = $this->input->post();
				$data_response = array(
					"status" => "error",
					"message" => $response["message"],
					"data" =>  $this->load->view('asistencias/clase_form',$data,TRUE)
				);
			} 
		}else{
			$data['current_data'] = $this->input->post();
			$data['container_data'] = $this->session->userdata('user_sess');
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
				"data" =>  $this->load->view('asistencias/clase_form',$data,TRUE),
				'errors' => $this->form_validation->error_array()
            );
		}
		echo json_encode($data_response);
	}

	public function saveAsistencia(){

		$data_response = $this->input->post();
		echo json_encode($data_response);

	}

	public function searchClase(){
		// buscar clase por hora inicio y dia
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

	public function get_Alumnos(){
		$session = $this->session->userdata('user_sess');
		$where = array(
			'profeFk' => $session->id_maestro
		);
		$data_response = $this->DAO->selectEntity('alumno',$where);
		echo json_encode($data_response);
	}
}