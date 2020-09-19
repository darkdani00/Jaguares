<br>
<link rel="stylesheet" href="<?=base_url("resources/css/login.css");?>">
<div class="row">
    <div class="col-md-1 col-lg-1 col-sm-1"></div>
    <!-- Imagen -->
    <div class="col-md-4 col-lg-4 col-sm-1">
        <img src="<?=base_url("resources/img/login.jpg");?>" height="350" widht="350">
    </div>
    <!-- INICIO DE SESION -->
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-11">
                <h2>ALUMNO</h2> <!-- Con un php se cambiaria el nombre con respecto a quien esta iniciando
                sesion -->
                <!-- FORM -->
                <form action="">
                    <br>

                    <div class="row">
                        <div class="col text-center">
                            <label for="">Nombre de usuario</label>
                            <input type="text" class="form-control" placeholder="Nombre de usuario">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col text-center">
                            <label for="">Contraseña</label>
                            <input type="Password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col text-center">
                        <a href="<?=base_url("prueba");?>" class="btn btn-success">Iniciar sesion</a>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-1 col-lg-1 col-sm-1"></div>
</div>