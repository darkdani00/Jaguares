<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Registro de Alumnos</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_alumnos">
    <div class="modal-body">
        <div class="form-group">
            <input type="hidden" name="id_alumno" value="<?=@$current_data['id_alumno'];?>">
            <label for="nom_alumno">Nombre</label>
            <input type="text" class="form-control" id="nom_alumno" name="nom_alumno" value="<?=@$current_data['nom_alumno'];?>">
        </div>
        <div class="form-group">
            <label for="ape_pa_alumno">Apellido Paterno</label>
            <input type="text" class="form-control" id="ape_pa_alumno" name="ape_pa_alumno" value="<?=@$current_data['ape_pa_alumno'];?>">
        </div>
        <div class="form-group">
            <label for="ape_mat_alumno">Apellido Materno</label>
            <input type="text" class="form-control" id="ape_mat_alumno" name="ape_mat_alumno" value="<?=@$current_data['ape_mat_alumno'];?>">
        </div>
        <div class="form-group">
            <label for="edad_alumno">Edad</label>
            <input type="number" class="form-control" id="edad_alumno" name="edad_alumno" value="<?=@$current_data['edad_alumno'];?>">
        </div>
        <div class="form-group">
            <label for="genero_alumno">G&eacute;nero</label>
            <select class="form-control" id="genero_alumno" name="genero_alumno">
                <option>Masculino</option>
                <option>Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="num_alumno">N&uacute;mero de tel&eacute;fono</label>
            <input type="text" class="form-control" id="num_alumno" name="num_alumno" value="<?=@$current_data['num_alumno'];?>">
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=@$current_data['email'];?>">
        </div>
        <div class="form-group">
            <label for="grado_cinta_alumno">Grado de cinta</label>
            <select class="form-control" id="grado_cinta_alumno" name="grado_cinta_alumno">
                <option>Cinta Blanca</option>
                <option>Cinta Amarilla</option>
                <option>Cinta Naranja</option>
                <option>Cinta Naranja Avanzado</option>
                <option>Cinta Verde</option>
                <option>Cinta Verde Avanzado</option>
                <option>Cinta Azul</option>
                <option>Cinta Azul Avanzado</option>
                <option>Cinta Roja</option>
                <option>Cinta Roja Avanzado</option>
                <option>Cinta Negra</option>
            </select>
        </div>
        <div class="form-group">
            <label for="escuela_alumno">Escuela</label>
            <select class="form-control" id="escuela_alumno" name="escuela_alumno">
            </select>
        </div>
        <div class="form-group">
            <label for="prof_alumno">Profesor</label>
            <select class="form-control" id="prof_alumno" name="prof_alumno">
            </select>
        </div>
        <div class="form-group">
            <label for="discapacidades">Discapacidades</label>
            <select class="form-control" id="discapacidades" name="discapacidades">
                <option>Si</option>
                <option>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entrenamiento">A&ntilde;os de entrenamiento</label>
            <input type="number" class="form-control" id="entrenamiento" name="entrenamiento" value="<?=@$current_data['entrenamiento'];?>">
        </div>
        <div class="form-group">
            <label for="tutor">Tutor</label>
            <input type="text" class="form-control" id="tutor" name="tutor" value="<?=@$current_data['tutor'];?>">
        </div>
        <div class="form-group">
            <label for="hora_entrenamiento">Hora de entrenamiento</label>
            <input type="time" class="form-control" id="hora_entrenamiento" name="hora_entrenamiento" value="<?=@$current_data['hora_entrenamiento'];?>">
        </div>
        <div class="form-group">
            <label for="pagado">Mensualidad Pagada</label>
            <select class="form-control" id="pagado" name="pagado">
                <option>Si</option>
                <option>No</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    </div>
</form>