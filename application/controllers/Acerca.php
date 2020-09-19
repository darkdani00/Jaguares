<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acerca extends CI_Controller {


	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/red_bar');
		$this->load->view('includes/black_bar');
		$this->load->view('view/Acerca_page');
		$this->load->view('includes/footer');
	}
}
