<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_profesor extends CI_Controller {


	public function index()
	{
		$this->_isLoggin();
		$this->load->view('includes/header');
		$this->load->view('includes/red_bar');
		$data_menu['login_selected'] = true;
		$this->load->view('includes/black_bar',$data_menu);
		$this->load->view('profesores/login_profesor');
		$this->load->view('includes/footer');
	}
	
	public function authentication(){
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('profe_email','Correo','required');
			$this->form_validation->set_rules('profe_password','Password','required');
			if ($this->form_validation->run() == FALSE) {
				$error_msg = "Usuario y/o Contraseña no enviados";
				$this->session->set_flashdata('error_msg',$error_msg);
				redirect('Login_profesor');
			}else {
				//Ingresó los datos
				$this->load->model('DAO');
				$user_exists = $this->DAO->login_profesor($this->input->post('profe_email'),$this->input->post('profe_password'));
				if($user_exists["status"] == "success"){
					// crear sesion
					$this->session->set_userdata('user_sess',$user_exists['data']);
					redirect("Perfil_profesor");
				}else{
					$error_msg = "Usuario y/o Contraseña incorrecto";
					$this->session->set_flashdata('error_msg',$error_msg);
					redirect('Login_profesor');
				}
			}
		}else{
			$error_msg = "Ocurri&oacute; un error";
			$this->session->set_flashdata('error_msg',$error_msg);
		}
	}

	function _isLoggin(){
		$session = $this->session->userdata('user_sess');
		if (@$session->email_maestro) {
			redirect('Perfil_profesor');
		}
	}
}
