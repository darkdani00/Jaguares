<?php
  $current_session = $this->session->userdata('user_sess');
?>
<div class="row">
    <!-- card -->
    <?php foreach($container_data as $clase){ ?>
    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="card-header">
                <div class="row pt-4">
                    <div class="col-9 pt-2">
                        <h5 class="card-title">
                            <i class="far fa-clock">
                            </i> <?=$clase->hora_inicia?> - <?=$clase->hora_termina?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row  mb-2">
                            <div class="col-3">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="col-9">
                                <div>D&iacute;a de la semana: <span class="text-dark">
                                        <?php switch ($clase->dia_semana) {
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
                                ?>
                                    </span></div>
                            </div>
                        </div>
                        <?php if ($current_session->user_type == 'Admin') { ?>
                        <div class="row mb-2">
                            <div class="col-3">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <div class="col-9">
                                <div>Profesor: <span
                                        class="text-dark"><?=$clase->nombre_maestro." ".$clase->apellido_paterno_maestro ." ".$clase->apellido_materno_maestro ?></span>
                                </div>
                            </div>
                        </div>
                        <?php }  ?>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-warning asistencias-view" data-key="<?=$clase->id_clase;?>"
                            data-toggle="modal" data-target="#modalView"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- card -->
</div>