<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Editar clase</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <input type="hidden" value="<?php echo $clase_data?>" name="clase_id">
    <h4><?php echo $clase_info->hora_inicia. " - " .$clase_info->hora_termina;?></h4>
    <h5> <?php switch ($clase_info->dia_semana) {
            case 1:
                echo 'Lunes';
                break;
            case 2:
                echo 'Martes';
                break;
            case 3:
                echo 'Mi&eacute;rcoles';
                break;
            case 4:
                echo 'Jueves';
                break;
            case 5:
                echo 'Viernes';
                break;
            case 6:
                echo 'S&aacute;bado';
                break;
            case 7:
                echo 'Domingo';
                break;
            default:
                echo '?';
                break;
        }    
        ?></h5>
    <h6 class="mt-2">Alumnos en esta clase</h6>
    <form id="delete_alumnos_form">
        <div class="container-fluid border border-secondary rounded" id="alumnos_container">
            <input type="hidden" value="<?php echo $clase_data?>" name="clase_id">
            <?=$container_data;?>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success mt-1 float-right">Borrar</button>
            </div>
        </div>
    </form>
    <form id="agregar_alumno_clase_form">
        <div class="form-group">
            <input type="hidden" value="<?php echo $clase_data?>" name="clase_id">
            <label for="alumno_clase">Agregar Alumnos</label>
            <select class="form-control" id="alumno_clase" name="alumno_clase[]" multiple="multiple">
            </select>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-success float-right" type="submit">Agregar</button>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
</div>