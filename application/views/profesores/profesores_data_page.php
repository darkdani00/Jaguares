<div class="row">
            <!-- card -->
            <?php foreach($container_data as $profe){ ?>
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="card-header">
                        <div class="row pt-4">
                            <div class="col-3 text-center">
                                <img src="<?=base_url("resources/img/usuario.jpg");?>" alt="..." style="width:50px"
                                    class="rounded-circle">
                            </div>
                            <div class="col-9 pt-2">
                                <h5 class="card-title">
                                    <?=$profe->nombre_maestro." ".$profe->apellido_paterno_maestro." ".$profe->apellido_materno_maestro?>
                                </h5>
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
                                        <div>G&eacute;nero: <span class="text-dark"><?=$profe->genero_maestro?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-baby"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Edad: <span class="text-dark"><?=$profe->edad_maestro?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Tel&eacute;fono: <span
                                                class="text-dark"><?=$profe->telefono_maestro?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Correo: <span class="text-dark"><?=$profe->email_maestro?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Grado de cinta: <span
                                                class="text-dark"><?=$profe->grado_cinta_maestro?></span></div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-3">
                                        <i class="fas fa-school"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Escuela: <span class="text-dark"><?=$profe->nombre_escuela?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- card -->
        </div>