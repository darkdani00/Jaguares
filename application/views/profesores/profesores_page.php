<section>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="shadow-none p-3 mb-5 bg-light rounded w-100 ml-4 mr-4">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="row">
            <!-- card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="card-header">
                        <div class="row pt-4">
                            <div class="col-3 text-center">
                                <img src="<?=base_url("resources/img/usuario.jpg");?>" alt="..." style="width:50px" class="rounded-circle">
                            </div>
                            <div class="col-9 pt-2">
                                <h5 class="card-title">Daniel Alonso Orduña</h5>
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
                                        <div>G&eacute;nero: <span class="text-dark">Masculino</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-baby"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Edad: <span class="text-dark">20</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Tel&eacute;fono: <span class="text-dark">8273618236</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Correo: <span class="text-dark">darkdani777@gmail.com</span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Grado de cinta: <span class="text-dark">Negra</span></div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->
          
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Maestros</h5>
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
                            <label for="exampleFormControlSelect1">G&eacute;nero</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Masculino</option>
                            <option>Femenino</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Edad</label>
                        <input type="number" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">N&uacute;mero de tel&eacute;fono</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
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
                </form>
                <!-- formulario -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal -->

        </div>
    </div>
</section>
