<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Registro de Maestros</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_profesores">
    <div class="modal-body">
        <div class="form-group">
            <label for="nom_prof">Nombre</label>
            <input type="text" class="form-control" id="nom_prof" name="nom_prof">
            <?php if (@$errors['nom_prof']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['nom_prof'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="ape_pa_prof">Apellido Paterno</label>
            <input type="text" class="form-control" id="ape_pa_prof" name="ape_pa_prof">
            <?php if (@$errors['ape_pa_prof']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['ape_pa_prof'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="ape_mat_prof">Apellido Materno</label>
            <input type="text" class="form-control" id="ape_mat_prof" name="ape_mat_prof">
            <?php if (@$errors['ape_mat_prof']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['ape_mat_prof'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="genero_prof">G&eacute;nero</label>
            <select class="form-control" id="genero_prof" name="genero_prof">
                <option>Masculino</option>
                <option>Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="edad_prof">Edad</label>
            <input type="number" class="form-control" id="edad_prof" name="edad_prof">
            <?php if (@$errors['edad_prof']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['edad_prof'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="num_prof">N&uacute;mero de tel&eacute;fono</label>
            <input type="number" class="form-control" id="num_prof" name="num_prof">
            <?php if (@$errors['num_prof']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['num_prof'];?></small>
            <?php
                    } ?>
        </div>
        <div class="form-group">
            <label for="grado_cinta_prof">Grado de cinta</label>
            <select class="form-control" id="grado_cinta_prof" name="grado_cinta_prof">
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
            <label for="escuela_prof">Escuela</label>
            <select id="escuela_prof" name="escuela_prof" class="form-control">
                <?php foreach($container_data as $escuela){ ?>
                    <option value="<?=$escuela->id_escuela?>"><?=$escuela->nombre_escuela?></option>
                    <?php } ?>
            </select>
            <?php if (@$errors['escuela_prof']) {
                        ?>
            <small class="form-text text-danger float-right"><?=$errors['escuela_prof'];?></small>
            <?php
                    } ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>