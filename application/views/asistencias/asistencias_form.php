<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Agregar Asistencia</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_asistencias">
    <div class="modal-body">
        <div class="form-group">
            <label for="fecha_asistencia">Fecha</label>
            <input type="date" class="form-control" name="fecha_asistencia" id="fecha_asistencia">
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre estudiante</th>
                    <th scope="col">Presente</th>
                    <th scope="col">Ausente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumnos_data as $alumno){  ?>
                <tr>
                    <td><?=$alumno->nombre_alumno ." ".$alumno->apellido_paterno_alumno ." ".$alumno->apellido_materno_alumno ?></td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="name1" value="Presente">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="name1" value="Ausente">
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>