<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_alumno extends MY_RootController {

	function __construct()
	{
		parent::__construct();
		$this->__validateSessionAlumno();
    }
    

	public function index()
	{
        $this->load->view('includes/header_log');
        $this->load->view('includes/navegation_log.php');
		$this->load->view('alumnos/perfil_page_alumno');
		$this->load->view('includes/footer_log');
	}

}
