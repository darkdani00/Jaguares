<?php
    $current_session = $this->session->userdata('user_sess');
?>

<!-- sideBar start -->
<div class="d-flex">
    <div id="sidebar-container" style="background-color: #000000;">
        <div class="logo text-light mt-4 ml-3"><h4>Jaguares</h4></div>
        <div class="menu">
            <a href="<?=base_url("Profesores");?>" class="text-light inline">
                <div class="nav_icon-container">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <span class="nav_label">Maestros</span>
            </a>
            <a href="<?=base_url("Alumnos");?>" class="text-light inline">
                <div class="nav_icon-container">
                    <i class="fas fa-users"></i>
                </div>
                <span class="nav_label">Alumnos</span>
            </a>
            <a href="#" class="text-light inline">
                <div class="nav_icon-container">
                    <i class="fas fa-school"></i>
                </div>
                <span class="nav_label">Escuelas</span>
            </a>
        </div>
    </div>
    <!-- sideBar end -->
    <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a72123;">
            <div class="container-fluid">
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=@$current_session->nombre_maestro." ".@$current_session->apellido_paterno_maestro." ".@$current_session->apellido_materno_maestro;?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('profesores/perfil_profesor');?>">Mi perfil</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('login_profesor/logout');?>">Cerrar Sesi&oacute;n</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content">
    


