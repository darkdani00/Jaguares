<div class="row">
            <!-- card -->
            <?php foreach($container_data as $alumno){ ?>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="card-header">
                        <div class="row pt-4">
                            <div class="col-3 text-center">
                                <img src="<?=base_url("resources/img/usuario.jpg");?>" alt="..." style="width:50px" class="rounded-circle">
                            </div>
                            <div class="col-9 pt-2">
                                <h5 class="card-title"><?=$alumno->nombre_alumno." ".$alumno->apellido_paterno_alumno." ".$alumno->apellido_materno_alumno?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row text-muted">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-venus-mars"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>G&eacute;nero: <span class="text-dark"><?=$alumno->genero_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-baby"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Edad: <span class="text-dark"><?=$alumno->edad_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Tel&eacute;fono: <span class="text-dark"><?=$alumno->telefono_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Correo: <span class="text-dark"><?=$alumno->email_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Color de cinta: <span class="text-dark"><?=$alumno->grado_cinta_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-wheelchair"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Discapasidades: <span class="text-dark"><?=$alumno->discapacidad_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Años de entrenamiento: <span class="text-dark"><?=$alumno->years_entrenamiento?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Tutor: <span class="text-dark"><?=$alumno->tutor_alumno?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Hora de entrenamiento: <span class="text-dark">Aqui van a ir las clases en las que esta registrado en alumnos_clase, va a ser una mini tabla en la que venga el dia y la hora</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Mensualidad: <span class="text-dark"><?=$alumno->pago_realizado?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-school"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Escuela: <span class="text-dark"><?=$alumno->nombre_escuela?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Profesor: <span class="text-dark"><?=$alumno->nombre_maestro." ".$alumno->apellido_paterno_maestro." ".$alumno->apellido_materno_maestro?></span></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info" data-key="<?=$alumno->id_alumno;?>" data-toggle="modal" data-target="#modalView" id="ver_asistencias_btn"><i class="fas fa-check"></i></button>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- card -->
        </div>
        