<div class="row">
    <!-- card -->
    <?php foreach($container_data as $escuela){ ?>
    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="card-header">
                <div class="row pt-4">
                    <div class="col-9 pt-2">
                        <h5 class="card-title">
                            <?=$escuela->nombre_escuela?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col-md-8">
                    <div class="card-body">
                    <div class="row  mb-2">
                            <div class="col-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="col-9">
                                <div>Tel&eacute;fono: <span class="text-dark"><?=$escuela->telefono_escuela?></span></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <i class="fas fa-compass"></i>
                            </div>
                            <div class="col-9">
                                <div>Direcci&oacute;n: <span class="text-dark"><?=$escuela->direccion_escuela?></span>
                                </div>
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