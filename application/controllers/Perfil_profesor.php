<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_profesor extends MY_RootController {

	function __construct()
	{
		parent::__construct();
		$this->__validateSessionProfesor();
    }

	public function index()
	{
        $this->load->view('includes/header_log');
        $this->load->view('includes/navegation_log.php');
		$this->load->view('profesores/perfil_page_profesor');
		$this->load->view('includes/footer_log');
	}
}
