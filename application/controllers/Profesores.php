<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {


	function __construct()
	{
        parent::__construct();
        $this->load->model('DAO');
    }

	public function index()
	{
        $this->load->view('includes/header_log');
		$this->load->view('includes/navegation_log.php');
		$data_container['container_data'] = $this->DAO->selectEntity('maestro');
		$this->load->view('profesores/profesores_page',$data_container);
		$this->load->view('includes/footer_log');
	}
}

