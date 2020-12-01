<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Registro de Alumnos</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_alumnos">
    <div class="modal-body">
        <div class="form-group">
            <label for="nom_alumno">Nombre</label>
            <input type="text" class="form-control" id="nom_alumno" name="nom_alumno">
            <?php if (@$errors['nom_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['nom_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="ape_pa_alumno">Apellido Paterno</label>
            <input type="text" class="form-control" id="ape_pa_alumno" name="ape_pa_alumno">
             <?php if (@$errors['ape_pa_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['ape_pa_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="ape_mat_alumno">Apellido Materno</label>
            <input type="text" class="form-control" id="ape_mat_alumno" name="ape_mat_alumno">
             <?php if (@$errors['ape_mat_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['ape_mat_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="edad_alumno">Edad</label>
            <input type="number" class="form-control" id="edad_alumno" name="edad_alumno">
             <?php if (@$errors['edad_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['edad_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="genero_alumno">G&eacute;nero</label>
            <select class="form-control" id="genero_alumno" name="genero_alumno">
                <option>Masculino</option>
                <option>Femenino</option>
            </select>
             <?php if (@$errors['genero_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['genero_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="num_alumno">N&uacute;mero de tel&eacute;fono</label>
            <input type="text" class="form-control" id="num_alumno" name="num_alumno">
             <?php if (@$errors['num_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['num_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email">
             <?php if (@$errors['email']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['email'];?></small>
            <?php
                    } ?>
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
             <?php if (@$errors['grado_cinta_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['grado_cinta_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="escuela_alumno">Escuela</label>
            <select class="form-control" id="escuela_alumno" name="escuela_alumno">
            </select>
             <?php if (@$errors['escuela_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['escuela_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="prof_alumno">Profesor</label>
            <select class="form-control" id="prof_alumno" name="prof_alumno">
            </select>
             <?php if (@$errors['prof_alumno']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['prof_alumno'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="discapacidades">Discapacidades</label>
            <select class="form-control" id="discapacidades" name="discapacidades">
                <option>Si</option>
                <option>No</option>
            </select>
             <?php if (@$errors['discapacidades']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['discapacidades'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="entrenamiento">A&ntilde;os de entrenamiento</label>
            <input type="number" class="form-control" id="entrenamiento" name="entrenamiento">
             <?php if (@$errors['entrenamiento']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['entrenamiento'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="tutor">Tutor</label>
            <input type="text" class="form-control" id="tutor" name="tutor">
             <?php if (@$errors['tutor']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['tutor'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="hora_entrenamiento">Hora de entrenamiento</label>
            <input type="time" class="form-control" id="hora_entrenamiento" name="hora_entrenamiento">
             <?php if (@$errors['hora_entrenamiento']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['hora_entrenamiento'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="pagado">Mensualidad Pagada</label>
            <select class="form-control" id="pagado" name="pagado">
                <option>Si</option>
                <option>No</option>
            </select>
             <?php if (@$errors['pagado']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['pagado'];?></small>
            <?php
                    } ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    </div>
</form>