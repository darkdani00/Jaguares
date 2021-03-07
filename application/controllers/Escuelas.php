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
		$data_menu['escuelas_selected'] = true;
		$this->load->view('includes/navegation_log.php',$data_menu);
		$data_container['container_data'] = $this->DAO->selectEntity('escuela',array('escuela_status'=>'Active'));
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

			if ($this->input->post('id_escuela')) {
				$response = $this->DAO->saveOrUpdateEntity('escuela',$data,array('id_escuela'=>$this->input->post('id_escuela')));
			}else{
				$response = $this->DAO->saveOrUpdateEntity('escuela',$data);
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

	public function delete_escuela(){
		$escuela_id = $this->input->get('id_escuela'); 
		// hacer una consulata para ver si tiene referencias en otras tablas
		$referencias = $this->DAO->checkReferences(array(
			array('table'=>'maestro','foreign_key'=>'escuelaFk','id'=>$escuela_id),
			array('table'=>'alumno','foreign_key'=>'escuelaFk','id'=>$escuela_id)
		));
		// si tiene referencias en otras tablas cambiar el estado a inactive
		if(!$referencias){
			$response = $this->DAO->saveOrUpdateEntity('escuela',array('escuela_status'=>'Inactive'),array('id_escuela'=>$escuela_id));
		}else{
			// si no tiene referencias en otras tablas borra el elemento
			$response = $this->DAO->deleteItemEntity('escuela',array('id_escuela'=>$escuela_id));
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

	public function edit_clase(){
		
	}

	public function searchEscuela(){
		if ($this->input->post("search-input")==null) {
			$data_container['container_data'] = $this->DAO->selectEntity('escuela');
		}else{
			$where = $this->input->post("search-input");
			$data_container['container_data'] = $this->DAO->customQuery("SELECT * FROM escuela WHERE nombre_escuela LIKE '%$where%'");
		}
		echo $this->load->view('escuelas/escuelas_data_page',$data_container,TRUE);
	}


	public function showEscuelasForm(){
		if ($this->input->get('id_escuela')) {
			$data  = $this->DAO->selectEntity('escuela',array('id_escuela'=>$this->input->get('id_escuela')),TRUE);
			$array = (array) $data;
			$data_view['current_data'] = array(
				'nom_escuela' => $array['nombre_escuela'],
				'tel_escuela' => $array['telefono_escuela'],
				'direccion_escuela' => $array['direccion_escuela'],
				'id_escuela' => $array['id_escuela']
			);
		}
		echo $this->load->view('escuelas/escuelas_form',@$data_view,TRUE);
	}
	
	public function showDataContainer()
    {        
        $data_container['container_data'] = $this->DAO->selectEntity('escuela');
        echo $this->load->view('escuelas/escuelas_data_page',$data_container,TRUE);
	}
}

