<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url('resources/css/perfil.css');?>">


<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="<?=base_url('resources/img/login.JPG');?>" alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Cambiar foto
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        Daniel Alonso Orduña
                    </h5>
                    <h6>
                        Profesor
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
                                <p>Daniel</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Apellidos</label>
                            </div>
                            <div class="col-md-6">
                                <p>Alonso Oruña</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Género</label>
                            </div>
                            <div class="col-md-6">
                                <p>Masculino</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Edad</label>
                            </div>
                            <div class="col-md-6">
                                <p>20</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Número celular</label>
                            </div>
                            <div class="col-md-6">
                                <p>442 335 3851</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Color de cinta</label>
                            </div>
                            <div class="col-md-6">
                                <p>2do Dan</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Escuela</label>
                            </div>
                            <div class="col-md-6">
                                <p>Plateros</p>
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