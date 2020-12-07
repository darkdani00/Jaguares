<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DAO extends CI_Model {

	public function login($email,$password)
	{
		$this->db->where('email_alumno',$email);
        $query = $this->db->get('alumno_view');
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
        $query = $this->db->get('maestro_view');
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

    function saveOrUpdateEntity($entityName,$data,$whereClause = array()){
        if ($whereClause) {
            $this->db->where($whereClause);
            $this->db->update($entityName,$data);
        }else{
            $this->db->insert($entityName,$data);
        }
        if ($this->db->error()['message'] != '') {
            return array(
                "status" => "error",
                "message" => $this->db->error()['message']
            );
        }else{
            return array(
                "status" => "success",
                "message" => $whereClause ? 'Datos Actualizados correctamente' : 'Datos Registrados correctamente'
            );
        }
    }

    function createClass($clase_data,$alumnos){
        // empezar transaccion
        $this->db->trans_start();
        // primero insertar en clase
        $this->db->insert('clase',$clase_data);

        // obtener el id del ultmo insertado en clase
        // $last_inserted =  $this->db->query('SELECT LAST_INSERT_ID()');
        $last_inserted = $this->db->insert_id();
        // hacer un ciclo foreach para que valla registrando los id de los alumnos en la tabla con el id de clase
        foreach($alumnos as $alumno){
            // insertar los alumnos a alumnos_clase
            $data = array(
                'alumnoFk' => $alumno,
                'claseFk' => $last_inserted
            );
            $this->db->insert('alumnos_clase',$data);
        } 
        // terminar transaccion
        $this->db->trans_complete();
        //Para que me regrese los errores
        if ($this->db->trans_status() === FALSE){
            return array(
                "status" => "error",
                "message" => $this->db->error()['message']
            );
        }else{
            return array(
                "status" => "success",
                "message" => 'Datos Registrados correctamente'
            );
        }
    } 

    function customQuery($query){
        $result = $this->db->query($query)->result();
        if ($this->db->error()['message'] != '') {
           return null;
        }else{
            return $result;
        }
    }

    function saveAttendance($alumno_asistencia){
        $this->db->trans_start();
        foreach($alumno_asistencia as $asistencia){
            $this->db->insert('asistencia_alumno',$asistencia);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return array(
                "status" => "error",
                "message" => $this->db->error()['message']
            );
        }else{
            return array(
                "status" => "success",
                "message" => 'Datos Registrados correctamente'
            );
        }
    }

    
}
