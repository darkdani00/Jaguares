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
		$data_menu['alumnos_selected'] = true;
		$this->load->view('includes/navegation_log.php',$data_menu);
		$current_session = $this->session->userdata('user_sess');
		if ($current_session->user_type == 'Admin') {
			$data_container['container_data'] = $this->DAO->selectEntity('alumno_view',array('alumno_status'=>'Active'));
		}else{
			$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM alumno_view WHERE profeFk = '$current_session->id_maestro' AND alumno_status = 'Active'");
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
		$this->form_validation->set_rules('ape_mat_alumno','Apellido Materno','required|max_length[80]');
		$this->form_validation->set_rules('email','Correo','required|max_length[80]|valid_email');
		$this->form_validation->set_rules('genero_alumno','Genero','required|max_length[80]');
		$this->form_validation->set_rules('edad_alumno','Edad','required|numeric');
		$this->form_validation->set_rules('num_alumno','Numero','required|numeric');
		$this->form_validation->set_rules('grado_cinta_alumno','Grado de cinta','required|max_length[80]');
		$this->form_validation->set_rules('escuela_alumno','Escuela','required|numeric');
		$this->form_validation->set_rules('prof_alumno','Profesor','required|numeric');
		$this->form_validation->set_rules('discapacidades','Discapacidades','required');
		$this->form_validation->set_rules('entrenamiento','A&ntilde;os de entrenamiento','required|numeric');
		$this->form_validation->set_rules('tutor','Tutor','required');
		if ($this->form_validation->run()) {			
			// datos formulario
			$data = array(
				"nombre_alumno" => $this->input->post('nom_alumno'),
				"apellido_paterno_alumno" => $this->input->post('ape_pa_alumno'),
				"apellido_materno_alumno" => $this->input->post('ape_mat_alumno'),
				"genero_alumno" => $this->input->post('genero_alumno'),
				"edad_alumno" => $this->input->post('edad_alumno'),
				"telefono_alumno" => $this->input->post('num_alumno'),
				"email_alumno" => $this->input->post('email'),
				"grado_cinta_alumno" => $this->input->post('grado_cinta_alumno'),
				"escuelaFk" => $this->input->post('escuela_alumno'),
				"profeFk" => $this->input->post('prof_alumno'),
				"discapacidad_alumno" => $this->input->post('discapacidades'),
				"years_entrenamiento" => $this->input->post('entrenamiento'),
				"tutor_alumno" => $this->input->post('tutor'),
				"password_alumno"=>$this->generateRandomPassword(),
			);
			if ($this->input->post('id_alumno')) {
				// si es editar
				$response = $this->DAO->saveOrUpdateEntity('alumno',$data,array('id_alumno'=>$this->input->post('id_alumno')));
			}else{
				$response = $this->DAO->saveOrUpdateEntity('alumno',$data);
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

	
	public function delete_alumno(){
		$alumno_id = $this->input->get('id_alumno'); 
		// hacer una consulata para ver si tiene referencias en otras tablas
		$referencias = $this->DAO->checkReferences(array(
			array('table'=>'alumnos_clase','foreign_key'=>'alumnoFk','id'=>$alumno_id)
		));
		// si tiene referencias en otras tablas cambiar el estado a inactive
		if(!$referencias){
			$response = $this->DAO->saveOrUpdateEntity('alumno',array('alumno_status'=>'Inactive'),array('id_alumno'=>$alumno_id));
		}else{
			// si no tiene referencias en otras tablas borra el elemento
			$response = $this->DAO->deleteItemEntity('alumno',array('id_alumno'=>$alumno_id));
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

	public function searchAlumno(){
		// agregar que pase algo si no existe en la base de datos por si modifican el html
		if ($this->input->post("search-input")==null) {
			$data_container['container_data'] = $this->DAO->selectEntity('alumno_view');
		}else{
			$where = $this->input->post("search-input");
			if ($this->input->post("search-options") == 'nombre_alumno') {
				$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM alumno_view WHERE nombre_alumno LIKE '%$where%' OR apellido_paterno_alumno LIKE '%$where%' OR apellido_materno_alumno LIKE '%$where%'");
			}elseif($this->input->post("search-options") == 'edad_alumno' || $this->input->post("search-options") == 'nombre_escuela'){
				$where_clause = array(
					$this->input->post("search-options") => $this->input->post("search-input"),
				);
				$data_container['container_data'] = $this->DAO->selectEntity('alumno_view',$where_clause);
			}elseif($this->input->post("search-options") == 'nombre_maestro'){
				$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM alumno_view WHERE nombre_maestro LIKE '%$where%' OR apellido_paterno_maestro LIKE '%$where%' OR apellido_materno_maestro LIKE '%$where%'");
			}
			else{
				$data_container['container_data'] = $this->DAO->selectEntity('alumno_view',$where);
			}
		}
		echo $this->load->view('alumnos/alumnos_data_page',$data_container,TRUE);
	}


	public function showAlumnosForm(){
		if ($this->input->get('id_alumno')) {
			$data  = $this->DAO->selectEntity('alumno',array('id_alumno'=>$this->input->get('id_alumno')),TRUE);
			$array = (array) $data;
			$data_view['current_data'] = array(
				'nom_alumno' => $array['nombre_alumno'],
				'ape_pa_alumno' => $array['apellido_paterno_alumno'],
				'ape_mat_alumno' => $array['apellido_materno_alumno'],
				'email' => $array['email_alumno'],
				'genero_alumno' => $array['genero_alumno'],
				'edad_alumno' => $array['edad_alumno'],
				'num_alumno' => $array['telefono_alumno'],
				'grado_cinta_alumno' => $array['grado_cinta_alumno'],
				'discapacidades' => $this->input->get('discapacidad_alumno'),
				'entrenamiento' => $this->input->get('years_entrenamiento'),
				'pagado' => $this->input->get('pago_realizado'),
				'id_alumno' => $this->input->get('id_alumno'),
				'tutor' => $this->input->get('tutor_alumno')
			);
		}
		$data_view['container_data'] = $this->DAO->selectEntity('escuela');
		echo $this->load->view('alumnos/alumno_form',$data_view,TRUE);
	}
	
	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('alumno_view',array('alumno_status'=>'Active'));
        echo $this->load->view('alumnos/alumnos_data_page',$data_container,TRUE);
	}

	public function showAsistenciasAlumno()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('asistencia_alumno_view',array('id_alumno'=>$this->input->get('id_alumno')));
        echo $this->load->view('alumnos/alumno_asistencias_modal',$data_container,TRUE);
	}

	public function get_Escuelas(){
		$data_response = $this->DAO->selectEntity('escuela');
		echo json_encode($data_response);
	}

	public function get_Profesores(){
		$data_response = $this->DAO->selectEntity('maestro');
		echo json_encode($data_response);
	}

	public function deleteAsistenciaAlumno(){
		$asistencia = $this->DAO->selectEntity('asistencia_alumno_view',array('id_asistencia_alumno'=>$this->input->get('id_asistencia')),TRUE);
		$response = $this->DAO->deleteItemEntity('asistencia_alumno',array('id_asistencia_alumno'=>$this->input->get('id_asistencia')));
		$data_response = array(
			"status" => $response['status'],
			"message" => $response['message'],
			"data" => $asistencia->id_alumno
		);
		echo json_encode($data_response);
	}
}