<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_alumno extends CI_Controller {


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/red_bar');
		$data_menu['login_selected'] = true;
		$this->load->view('includes/black_bar',$data_menu);
		$this->load->view('alumnos/login_alumno');
		$this->load->view('includes/footer');
	}
}
