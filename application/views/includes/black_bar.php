<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark stick-bar black_bar_size" style="background-color: #000000;">
    <a class="navbar-brand ml-5" href="<?=base_url("Welcome");?>">
        <img src="<?=base_url("resources/img/logo.jpg");?>" width="60" height="60" alt="" >
    </a>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 mr-5">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url("Ubicaciones");?>">UBICACIONES</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url("Acerca");?>">ACERCA DE</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    INICIAR SESION
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?=base_url("Login");?>">Alumno</a>
                    <a class="dropdown-item" href="<?=base_url("Login");?>">Profesor</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar End -->