<?php
    $current_session = $this->session->userdata('user_sess');
?>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="<?=base_url("uploads/profesores/".$current_session->pic_maestro);?>" alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Cambiar foto
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?=$current_session->nombre_maestro." ".$current_session->apellido_paterno_maestro." ".$current_session->apellido_materno_maestro?>
                    </h5>
                    <h6>
                        Privilegios de <?=$current_session->user_type?>
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Información Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Eventos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <!--Puede ir un botón de editar-->

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->nombre_maestro?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Apellidos</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->apellido_paterno_maestro." ".$current_session->apellido_materno_maestro?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Género</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->genero_maestro?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Edad</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->edad_maestro?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Número celular</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->telefono_maestro?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Color de cinta</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->grado_cinta_maestro?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Escuela</label>
                            </div>
                            <div class="col-md-6">
                                <p><?=$current_session->nombre_escuela?></p>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Logros</label>
                            </div>
                            <div class="col-md-6">
                                <p>Campeón Nacional</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>