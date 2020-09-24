<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/red_bar');
		$this->load->view('includes/black_bar');
		$this->load->view('login/Login_view');
		$this->load->view('includes/footer');
	}
}
