<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {


	public function index()
	{
        $this->load->view('includes/header_log');
        $this->load->view('includes/navegation_log.php');
		$this->load->view('perfil/perfil_page');
		$this->load->view('includes/footer_log');
	}
}
