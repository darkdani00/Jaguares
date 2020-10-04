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

	public function login_profesor($email,$password)
	{
		$this->db->where('email_maestro',$email);
        $query = $this->db->get('maestro');
        $maestro_existe = $query->row();
        if($maestro_existe){
            if($maestro_existe->password_maestro == $password){
                // si la password es igual a la de la base de datos
                return array(
                    "status" => "success",
                    "message" => "Maestro cargado",
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
    
    function selectEntity($entityName,$whereClause= array(),$isUnique = FALSE){
        if($whereClause){
            $this->db->where($whereClause);
        }
        $query = $this->db->get($entityName);
        if($this->db->error()['message'] != ''){
            return $isUnique ? null : array();
        }else{
            return $isUnique ? $query->row(): $query->result();
        }
    }
    
}
