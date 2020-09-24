<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicaciones extends CI_Controller {


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/red_bar');
		$data_menu['ubicaciones_selected'] = true;
		$this->load->view('includes/black_bar',$data_menu);
		$this->load->view('view/Ubicaciones_page');
		$this->load->view('includes/footer');
	}
}
