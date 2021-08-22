<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_RootController extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->config('email');
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
    public function generateRandomPassword($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    } 

    public function sendPasswordEmail($user_password,$user_email,$user_name){
        $data['user_email'] = $user_email;
		$data['user_name'] = $user_name;
		$data['user_password'] = $user_password;
        $email_sent = $this->send_email($this->load->view('password_email', $data, true),'santiagocastanonarvizu@gmail.com','Email de prueba','santiagodev12@gmail.com', 'Santiago Castañón');
        if ($email_sent) {
           // Se envio el correo con la contraseña
           return true;
        }else{
            //Error al mandar el correo
            return false;
        }
    }

    private function send_email($html_template,$send_to_email,$email_subject,$from_email,$from_name){
		$this->load->library('email');
		$this->email->from($from_email,$from_name);
		$this->email->to($send_to_email);
		$this->email->subject($email_subject);
		$this->email->message($html_template);
		if ($this->email->send()) {
			return true;
		}else{
			return false;
			// echo $this->email->print_debugger();
		}
	}

}