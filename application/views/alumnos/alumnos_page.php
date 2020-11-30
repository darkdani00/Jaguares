<section>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="shadow-none p-3 mb-5 bg-light rounded w-100 ml-4 mr-4">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></button>
            </div>
        </div>
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
                                        <div>Discapasidades: <span class="text-dark">No</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Años de entrenamiento: <span class="text-dark">10</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Tutor: <span class="text-dark">???</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Hora de entrenamiento: <span class="text-dark">???</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Mensualidad: <span class="text-dark">Si</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-school"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Escuela: <span class="text-dark">???</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Profesor: <span class="text-dark">???</span></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- card -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Alumnos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- formulario -->
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Apellido Paterno</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Apellido Materno</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Edad</label>
                            <input type="number" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">G&eacute;nero</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Masculino</option>
                            <option>Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">N&uacute;mero de tel&eacute;fono</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Correo</label>
                            <input type="email" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Grado de cinta</label>
                            <select class="form-control" id="exampleFormControlSelect1">
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
                        <!-- Aqui mi idea is que haya un input de select pero que las opciones vengan de la base de datos como lo que himos con alfredo -->
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Escuela</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Escuela 1</option>
                            <option>Escuela 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Profesor</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>profe 1</option>
                            <option>profe 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Discapacidades</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Si</option>
                            <option>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">A&ntilde;os de entrenamiento</label>
                            <input type="number" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tutor</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hora de entrenamiento</label>
                            <input type="time" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mensualidad Pagada</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Si</option>
                            <option>No</option>
                            </select>
                        </div>
                    </form>
                    <!-- formulario -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal -->

        </div>
    </div>
</section>
