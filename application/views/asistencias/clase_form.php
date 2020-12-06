<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Registro de Clases</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_clases">
    <div class="modal-body">
        <input type="hidden" value="<?=@$container_data->id_maestro?>" name="id_maestro">
        <div class="form-group">
            <label for="nom_escuela">Nombre Maestro</label>
            <input type="text" class="form-control" id="nom_maestro" name="nom_maestro"
                value="<?=@$container_data->nombre_maestro." ".@$container_data->apellido_paterno_maestro." ".@$container_data->apellido_materno_maestro;?>"
                disabled>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="hora_inicia">Hora Inicia</label>
                    <input type="time" class="form-control" id="hora_inicia" name="hora_inicia"
                        value="<?=@$current_data['hora_inicia'];?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="hora_termina">Hora Termina</label>
                    <input type="time" class="form-control" id="hora_termina" name="hora_termina"
                        value="<?=@$current_data['hora_termina'];?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="dia_semana">D&iacute;a de la semana</label>
            <select class="form-control" id="dia_semana" name="dia_semana">
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Mi&eacute;rcoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">S&aacute;bado</option>
                <option value="7">Domingo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alumno_clase">Alumnos</label>
            <select class="form-control" id="alumno_clase" name="alumno_clase[]" multiple="multiple">
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>