<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acerca extends CI_Controller {


	public function index()
	{
		$this->load->view('includes/header');
		$data_menu['Acerca_de_selected'] = true;
		$this->load->view('includes/red_bar',$data_menu);
		$this->load->view('includes/black_bar');
		$this->load->view('view/Acerca_page');
		$this->load->view('includes/footer');
	}
}
