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
        $this->form_validation->set_rules('ape_mat_prof','Apellido materno','required|max_length[80]');
        $this->form_validation->set_rules('email','Correo','required|max_length[80]|valid_email');
        $this->form_validation->set_rules('genero_prof','Nombre','required|max_length[80]');
        $this->form_validation->set_rules('edad_prof','Edad','required|numeric');
        $this->form_validation->set_rules('num_prof','Numero','required|numeric');
        $this->form_validation->set_rules('grado_cinta_prof','Grado de cinta','required|max_length[80]');
        $this->form_validation->set_rules('escuela_prof','Escuela','required|numeric');
        $this->form_validation->set_rules('pic_profe','pic','callback_valid_pic');
        if ($this->form_validation->run()) {			
            // si es editar
            if ($this->input->post('id_maestro')) {
                if( $this->input->post('pic_profe')){
                    //si se subio foto para actualizar
                    $config['upload_path']          = './uploads/profesores/';
                    $config['allowed_types']        = 'jpg|png';
                    $config['max_size']             = 2048;
                    $config['file_name'] = time();    
                    $this->load->library('upload',$config);
                    $profe_id = $this->input->post('id_maestro');
                    $have_img = $this->DAO->customQuery("SELECT pic_maestro FROM maestro WHERE id_maestro = $profe_id");
                    //si tiene imagen borrarla
                    if($have_img[0]->pic_maestro!='' || $have_img[0]->pic_maestro!=null){
                        $profe_data = $this->DAO->selectEntity('maestro',array('id_maestro'=>$profe_id));
                        $file = $profe_data[0]->pic_maestro;
                        if(unlink('uploads/profesores/'.$file)) {
                            // si se borro entonces subir la nueva
                            $uploaded_file = $this->upload->do_upload('pic_profe');
                            if ($uploaded_file) {
                                $data = array(
                                    "nombre_maestro" => $this->input->post('nom_prof'),
                                    "apellido_paterno_maestro" => $this->input->post('ape_pa_prof'),
                                    "apellido_materno_maestro" => $this->input->post('ape_mat_prof'),
                                    "genero_maestro" => $this->input->post('genero_prof'),
                                    "edad_maestro" => $this->input->post('edad_prof'),
                                    "telefono_maestro" => $this->input->post('num_prof'),
                                    "grado_cinta_maestro" => $this->input->post('grado_cinta_prof'),
                                    "escuelaFk" => $this->input->post('escuela_prof'),
                                    "email_maestro" => $this->input->post('email'),
                                    "pic_maestro"=>$this->upload->data()['file_name'],
                                );
                                $response = $this->DAO->saveOrUpdateEntity('maestro',$data,array('id_maestro'=>$this->input->post('id_maestro')));
                                $data_response = array(
                                    "status" => $response['status'],
                                    "message" => $response['message'],
                                    "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                                    );
                            }else{
                                //si no se sube la nueva
                                $data_response = array(
                                    "status" => 'error',
                                    "message" => 'Error al subir la imagen',
                                    "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                                    );
                            }
                        }else{
                           //si no se borra
                           $data_response = array(
                            "status" => 'error',
                            "message" => 'Error al borrar imagen',
                            "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                            );
                        }
                    }else{
                        //si no tiene foto actualizar directamente
                        $uploaded_file = $this->upload->do_upload('pic_profe');
                        if ($uploaded_file) {
                            $data = array(
                                "nombre_maestro" => $this->input->post('nom_prof'),
                                "apellido_paterno_maestro" => $this->input->post('ape_pa_prof'),
                                "apellido_materno_maestro" => $this->input->post('ape_mat_prof'),
                                "genero_maestro" => $this->input->post('genero_prof'),
                                "edad_maestro" => $this->input->post('edad_prof'),
                                "telefono_maestro" => $this->input->post('num_prof'),
                                "grado_cinta_maestro" => $this->input->post('grado_cinta_prof'),
                                "escuelaFk" => $this->input->post('escuela_prof'),
                                "email_maestro" => $this->input->post('email'),
                                "pic_maestro"=>$this->upload->data()['file_name'],
                            );
                            $response = $this->DAO->saveOrUpdateEntity('maestro',$data,array('id_maestro'=>$this->input->post('id_maestro')));
                            $data_response = array(
                                "status" => $response['status'],
                                "message" => $response['message'],
                                "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                                );
                        }else{
                            $data_response = array(
                                "status" => 'error',
                                "message" => 'error al subir la imagen',
                                "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                                );
                        }
                    }
                }else{
                    //si no se subio una foto para actualizar
                    $data = array(
                        "nombre_maestro" => $this->input->post('nom_prof'),
                        "apellido_paterno_maestro" => $this->input->post('ape_pa_prof'),
                        "apellido_materno_maestro" => $this->input->post('ape_mat_prof'),
                        "genero_maestro" => $this->input->post('genero_prof'),
                        "edad_maestro" => $this->input->post('edad_prof'),
                        "telefono_maestro" => $this->input->post('num_prof'),
                        "grado_cinta_maestro" => $this->input->post('grado_cinta_prof'),
                        "escuelaFk" => $this->input->post('escuela_prof'),
                        "email_maestro" => $this->input->post('email'),
                    );
                    $response = $this->DAO->saveOrUpdateEntity('maestro',$data,array('id_maestro'=>$this->input->post('id_maestro')));
                    $data_response = array(
                        "status" => $response['status'],
                        "message" => $response['message'],
                        "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                        );
                }
            }else{
                //Guardar imagen    
                $config['upload_path']          = './uploads/profesores/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 2048;
                $config['file_name'] = time();    
                $this->load->library('upload',$config);

                $uploaded_file = $this->upload->do_upload('pic_profe');

                //Si se subio la img
                if ($uploaded_file) {
                    $data = array(
                        "nombre_maestro" => $this->input->post('nom_prof'),
                        "apellido_paterno_maestro" => $this->input->post('ape_pa_prof'),
                        "apellido_materno_maestro" => $this->input->post('ape_mat_prof'),
                        "genero_maestro" => $this->input->post('genero_prof'),
                        "edad_maestro" => $this->input->post('edad_prof'),
                        "telefono_maestro" => $this->input->post('num_prof'),
                        "grado_cinta_maestro" => $this->input->post('grado_cinta_prof'),
                        "escuelaFk" => $this->input->post('escuela_prof'),
                        "email_maestro" => $this->input->post('email'),
                        "password_maestro"=>$this->generateRandomPassword(),
                        "pic_maestro"=>$this->upload->data()['file_name'],
                    );
                    //Guardar en base de datos
                    $response = $this->DAO->saveOrUpdateEntity('maestro',$data);
                    
                    if ($response['status'] == "success") {
                        $data_response = array(
                            "status" => "success",
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
                }
                else {
                    //si no se guardo la imagen
                    $data = array(
                        "nombre_maestro" => $this->input->post('nom_prof'),
                        "apellido_paterno_maestro" => $this->input->post('ape_pa_prof'),
                        "apellido_materno_maestro" => $this->input->post('ape_mat_prof'),
                        "genero_maestro" => $this->input->post('genero_prof'),
                        "edad_maestro" => $this->input->post('edad_prof'),
                        "telefono_maestro" => $this->input->post('num_prof'),
                        "grado_cinta_maestro" => $this->input->post('grado_cinta_prof'),
                        "escuelaFk" => $this->input->post('escuela_prof'),
                        "email_maestro" => $this->input->post('email'),
                        "password_maestro"=>$this->generateRandomPassword(),
                        "pic_profe" =>$this->input->post('pic_profe'),
                    );
                    $data_response = array(
                        "status" => "error",
                        "message" =>  $this->upload->display_errors(),
                        "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE)
                    );
                }

            }
        }else{
            // mandar errores a la vista
            $data['current_data'] = $this->input->post();
            $data_response = array(
                "status" => "warning",
                "message" => "Información incorrecta, valida los campos!",
                "data" =>  $this->load->view('profesores/profesores_form',$data,TRUE),
                "errors" => $this->form_validation->error_array(),
            );
        }
		echo json_encode($data_response);
	}


    function update_img(){
        //checar que tenga imagen
        $profe_id = $this->input->post('id_maestro'); 
        $have_img = $this->DAO->customQuery("SELECT pic_maestro FROM maestro WHERE id_maestro = $profe_id");

        $config['upload_path']          = './uploads/profesores/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 2048;
        $config['file_name'] = time();    
        $this->load->library('upload',$config);

        //si no tiene imagen
        if($have_img[0]->pic_maestro=='' || $have_img==null){
            //guardar la nueva y actualizar bd
            $uploaded_file = $this->upload->do_upload('update_img_input');
            if ($uploaded_file) {
                $response = $this->DAO->saveOrUpdateEntity('maestro',array('pic_maestro'=>$this->upload->data()['file_name']),array('id_maestro'=>$profe_id));
            }else{
                $response = array(
                    "status" => "error",
                    "message" =>  $this->upload->display_errors()
                );
            }
        }else{
            //si tiene img
            $profe_data = $this->DAO->selectEntity('maestro',array('id_maestro'=>$profe_id));
            $file = $profe_data[0]->pic_maestro;
            //borrar la img anterior
            if(unlink('uploads/profesores/'.$file)) {
                $uploaded_file = $this->upload->do_upload('update_img_input');
                if ($uploaded_file) {
                    //guardar la nueva y actualizar bd
                    $response = $this->DAO->saveOrUpdateEntity('maestro',array('pic_maestro'=>$this->upload->data()['file_name']),array('id_maestro'=>$profe_id));
                    //actualizar session
                    $user_data = $this->DAO->selectEntity('maestro_view',array('id_maestro'=>$profe_id));
                    $this->session->set_userdata('user_sess',$user_data[0]);
                }else{
                    $response = array(
                        "status" => "error",
                        "message" =>  $this->upload->display_errors()
                    );
                }
            }else{
                $data_response = array(
                    "status" => "error",
                    "message" =>"Error al borrar la imagen" 
                );
            }
        }
        $data_response = array(
            "status" => $response['status'],
            "message" => $response['message']
        );
		echo json_encode($data_response);
    }


    function valid_pic($value){
        if (empty($_FILES['pic_profe']['name'])) {
            if ($this->input->post('id_maestro')) {
                return true;
            }else {
                $this->form_validation->set_message('valid_pic','The {field} is required');
                return false;
            }
        }
        else{
            return true;
        }
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
            //hacer consulta para obtener el nombre de la img
            $profe_data = $this->DAO->selectEntity('maestro',array('id_maestro'=>$profe_id));
            //borrar imagen
            $file = $profe_data[0]->pic_maestro;
            //si no tiene img en la bd
            if($file == ''){
                // borrar el elemento
                $response = $this->DAO->deleteItemEntity('maestro',array('id_maestro'=>$profe_id));
            }else{
                if(unlink('uploads/profesores/'.$file)) {
                    // si no tiene referencias en otras tablas borra el elemento
                    $response = $this->DAO->deleteItemEntity('maestro',array('id_maestro'=>$profe_id));
                }
                else {
                    $response = array(
                        "status" => "error",
                        "message" =>"Error eliminando imagen" 
                    );
                }
            }
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
                'id_maestro' => $this->input->get('id_maestro'),
                'pic_maestro' =>$array['pic_maestro'],
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
        $this->load->view('profesores/profesores_js');
	}

	public function get_Escuelas(){
		$data_response = $this->DAO->selectEntity('escuela');
		echo json_encode($data_response);
	}
}
