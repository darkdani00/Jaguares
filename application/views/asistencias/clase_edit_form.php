<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Editar clase</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_class_edit">
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
        <div class="container-fluid border border-secondary rounded">
            <?php foreach($alumnos_data as $alumno){  ?>
            <div class="row mt-1 mb-1 ml-1">
                <div class="col border border-secondary rounded-left">
                    <h6><?php echo $alumno->nombre_alumno ." ".$alumno->apellido_paterno_alumno ." ".$alumno->apellido_materno_alumno;?>
                    </h6>
                </div>
                <div class="col">
                    <div class="row">
                        <button class="btn btn-danger btn-sm remove-alumno" style="border-radius: 0 !important;"
                            data-key="<?=$alumno->id_alumnos_clase;?>"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="alumno_clase">Agregar Alumnos</label>
            <select class="form-control" id="alumno_clase" name="alumno_clase[]" multiple="multiple">
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    </div>
</form>