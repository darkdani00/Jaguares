<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_RootController extends CI_Controller {

    function __construct()
	{
		parent::__construct();
    }
    
    public function __validateSessionAlumno(){
        $session = $this->session->userdata('user_sess');
        if (!@$session->email_alumno) {
            redirect('Login_alumno');
        }
    }
    public function __validateSessionProfesor(){
        $session = $this->session->userdata('user_sess');
        if (!@$session->email_maestro) {
            redirect('Login_profesor');
        }
    }

}