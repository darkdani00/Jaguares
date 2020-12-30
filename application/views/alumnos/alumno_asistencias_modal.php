<div class="modal-header bg-secondary">
    <h5 class="modal-title">Asistencias</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Valor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($container_data as $asistencias){ ?>
                <tr>
                    <td>
                        <?=$asistencias->fecha?>
                    </td>
                    <td><?=$asistencias->hora_inicia?> - <?=$asistencias->hora_termina?></td>
                    <td><?=$asistencias->asistencia?></td>
                    <td><button class="btn btn-danger" data-key="<?=$asistencias->id_asistencia_alumno?>" id="eliminar_asistencia_btn"><i class="fas fa-times"></i></button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>