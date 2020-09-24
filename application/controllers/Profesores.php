<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {


	public function index()
	{
		$this->load->view('includes/header');
		$data_menu['Profesores_selected'] = true;
		$this->load->view('includes/red_bar',$data_menu);
		$this->load->view('includes/black_bar');
		$this->load->view('view/Profesores_view');
		$this->load->view('includes/footer');
	}
}
