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
		$current_session = $this->session->userdata('user_sess');
		if ($current_session->user_type == 'Admin') {
			$data_container['container_data'] = $this->DAO->customQuery('SELECT * FROM clase_view ORDER BY dia_semana,hora_inicia');
		}else{
			// traer solo las clases de este profe
			$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM clase_view WHERE profeFk = '$current_session->id_maestro' ORDER BY dia_semana,hora_inicia");
		}
		$data_main['container_data'] = $this->load->view('asistencias/asistencias_data_page',$data_container,TRUE);
		$this->load->view('asistencias/asistencias_page',$data_main);
		$this->load->view('includes/footer_log');
		$this->load->view('asistencias/asistencias_js');
	}

	public function showClasesForm(){
		$data['container_data'] = $this->session->userdata('user_sess');
		echo $this->load->view('asistencias/clase_form',$data,TRUE);
	}

	public function showClasesEditForm(){
		$clase = $this->input->get('clase_id');
		$data_container['alumnos_data'] = $this->DAO->customQuery("SELECT * FROM alumnos_clase_view WHERE claseFk = '$clase' ");
		$data['container_data'] = $this->load->view('asistencias/alumnos_clase_edit',$data_container,TRUE);
		$data['clase_info'] = $this->DAO->selectEntity('clase',array('id_clase'=>$clase),TRUE);
		$data['clase_data'] = $this->input->get('clase_id');
		echo $this->load->view('asistencias/clase_edit_form',$data,TRUE);
	}

	public function showAsistenciasForm(){
		$clase = $this->input->get('clase_id');
		$data['alumnos_data'] = $this->DAO->customQuery("SELECT * FROM alumnos_clase_view WHERE claseFk = '$clase' ");
		$data['clase_data'] = $this->input->get('clase_id');
		echo $this->load->view('asistencias/asistencias_form',$data,TRUE);
	}

	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('clase_view');
        echo $this->load->view('asistencias/asistencias_data_page',$data_container,TRUE);
	}

	public function showAlumnosClaseContainer(){
		$clase = $this->input->get('clase_id'); 
		$data['alumnos_data'] = $this->DAO->customQuery("SELECT * FROM alumnos_clase_view WHERE claseFk = '$clase' ");
		$data['clase_data'] = $clase;
		echo $this->load->view('asistencias/alumnos_clase_edit',$data,TRUE);
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
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fecha_asistencia','Fecha asistencia','required');
		if ($this->form_validation->run()) {
			$contador = 0;
			$datos = array();
			foreach(array_values($this->input->post()) as $valores){
				if ($contador==0) {
					$clase_id = $valores;
					$contador = $contador +1;
				}elseif($contador==1){
					$fecha = $valores; 
					$contador = $contador +1;
				}
				else{
					$split = explode('_',$valores);
					array_push($datos,
					array(
						'fecha'=> $fecha,
						'alumnos_clase_fk' => $split['1'],
						'asistencia' => $split['0']
					)
				);
				}
			}
			$response = $this->DAO->saveAttendance($datos);
			if ($response['status'] == "success") {
				$data_response = array(
					"status" => $response['status'],
					"message" => $response['message']
				);
			}else{
				$data_response = array(
					"status" => $response['status'],
					"message" => $response['message']
				);
			}
		}else{
			$data['current_data'] = $this->input->post();
			$data['clase_data'] = $this->input->post('clase_id');
			$clase = $this->input->post('clase_id');
			$data['alumnos_data'] = $this->DAO->customQuery("SELECT * FROM alumnos_clase_view WHERE claseFk = '$clase' ");
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
				"data" =>  $this->load->view('asistencias/asistencias_form',$data,TRUE),
				'errors' => $this->form_validation->error_array()
            );
		}			
		echo json_encode($data_response);
	}

	public function removeAlumnosClase(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('alumno_clase[]','Alumnos','required');
		$this->form_validation->set_rules('clase_id','Identificador de clase','required|numeric');
		if ($this->form_validation->run()) {
			$response = $this->DAO->delete_alumno_clase($this->input->post('alumno_clase[]'));
			if ($response['status'] == "success") {
				$data_response = array(
					"status" => $response['status'],
					"message" => $response['message'],
					"clase_id" => $this->input->post('clase_id')
				);
			}else{
				$data_response = array(
					"status" => $response['status'],
					"message" => $response['message']
				);
			}
		}else{
			$data['current_data'] = $this->input->post();
            $data_response = array(
                "status" => "warning",
                "message" => "Selecciona algo boludo",
				'errors' => $this->form_validation->error_array()
            );
		}			
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


	// Esta funcion es para la pagina en donde el alumno ve sus asistencias
	public function asistencias_alumno(){
		$this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$current_session = $this->session->userdata('user_sess');
		if ($current_session->user_type == 'Admin') {
			$data_container['container_data'] = $this->DAO->customQuery('SELECT * FROM clase_view ORDER BY dia_semana,hora_inicia');
		}else{
			$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM clase_view WHERE profeFk = '$current_session->id_maestro' ORDER BY dia_semana,hora_inicia");
		}
		$data_main['container_data'] = $this->load->view('asistencias/asistencias_data_page',$data_container,TRUE);
		$this->load->view('asistencias/asistencias_page',$data_main);
		$this->load->view('includes/footer_log');
		$this->load->view('asistencias/asistencias_js');
	}
}