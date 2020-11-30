<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_alumno extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_isLoggin();
		$this->load->view('includes/header');
		$this->load->view('includes/red_bar');
		$data_menu['login_selected'] = true;
		$this->load->view('includes/black_bar',$data_menu);
		$this->load->view('alumnos/login_alumno');
		$this->load->view('includes/footer');
	}

	public function authentication(){
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('alumno_email','Correo','required');
			$this->form_validation->set_rules('alumno_password','Password','required');
			if ($this->form_validation->run() == FALSE) {
				$error_msg = "Usuario y/o Contraseña no enviados";
				$this->session->set_flashdata('error_msg',$error_msg);
				redirect('Login_alumno');
			}else {
				//Ingresó los datos
				$this->load->model('DAO');
				$user_exists = $this->DAO->login($this->input->post('alumno_email'),$this->input->post('alumno_password'));
				if($user_exists["status"] == "success"){
					// crear sesion
					$this->session->set_userdata('user_sess',$user_exists['data']);
					redirect("alumnos/perfil_alumno");
				}else{
					$error_msg = "Usuario y/o Contraseña incorrecto";
					$this->session->set_flashdata('error_msg',$error_msg);
					redirect('Login_alumno');
				}
			}
		}else{
			$error_msg = "Ocurri&oacute; un error";
			$this->session->set_flashdata('error_msg',$error_msg);
		}
	}

	function _isLoggin(){
		$session = $this->session->userdata('user_sess');
		if (@$session->email_alumno) {
			redirect('alumnos/perfil_alumno');
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_sess');
		redirect('','refresh');
	}
}
