<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DAO extends CI_Model {

	public function login($email,$password)
	{
		$this->db->where('email_alumno',$email);
        $query = $this->db->get('alumno');
        $alumno_existe = $query->row();
        if($alumno_existe){
            if($alumno_existe->password_alumno == $password){
                // si la password es igual a la de la base de datos
                return array(
                    "status" => "success",
                    "message" => "Alumno cargado",
                    "data" => $query->row()
                );
            }
            else{
                // si no es igual la contra
                return array(
                    "status" => "error",
                    "message" => "La contrase&ntilde;a es incorrecta",
                );
            }
        }else{
            //No existe el correo
            return array(
                'status' => 'error',
                'message' => 'Correo no encontrado'
            );
        }
    }
    
}
