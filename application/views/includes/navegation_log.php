<?php
    $current_session = $this->session->userdata('user_sess');
    switch($current_session->user_type){
        case 'Maestro':
          $menus = array(
            array("menu_text" => "Alumnos","menu_uri" => "Alumnos", "menu_icon"=>"fas fa-users"),
            array("menu_text" => "Asistencias","menu_uri" => "Asistencias", "menu_icon"=>"fas fa-user-check")
          );
        break;
        case 'Admin':
          $menus = array(
            array("menu_text" => "Maestros","menu_uri" => "Profesores", "menu_icon"=>"fas fa-chalkboard-teacher"),
            array("menu_text" => "Alumnos","menu_uri" => "Alumnos", "menu_icon"=>"fas fa-users"),
            array("menu_text" => "Escuelas","menu_uri" => "Escuelas", "menu_icon"=>"fas fa-school"),
            array("menu_text" => "Asistencias","menu_uri" => "Asistencias", "menu_icon"=>"fas fa-user-check")
          );
        break;
        case 'Alumno':
          $menus = array(
            array("menu_text" => "Mis Asistencias","menu_uri" => "Asistencias/asistencias_alumno", "menu_icon"=>"fas fa-user-check"),
            array("menu_text" => "Perfil","menu_uri" => "Alumnos/perfil_alumno", "menu_icon"=>"fas fa-user")
          );
        break;
      }
?>

<!-- sideBar start -->
<div class="d-flex">
    <div id="sidebar-container" style="background-color: #000000;">
        <div class="logo text-light mt-4 ml-3">
            <h4>Jaguares</h4>
        </div>
        <div class="menu">
            <?php foreach($menus as $iMenu){ ?>
            <a href="<?=base_url($iMenu['menu_uri']);?>" class="text-light inline">
                <div class="nav_icon-container">
                    <i class="<?=$iMenu['menu_icon'];?>"></i>
                </div>
                <span class="nav_label"><?=$iMenu['menu_text'];?></span>
            </a>
            <?php } ?>
        </div>
    </div>
    <!-- sideBar end -->
    <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a72123;">
            <div class="container-fluid">
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <?php if ($current_session->user_type == 'Maestro' || $current_session->user_type == 'Admin') {
                                ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?=@$current_session->nombre_maestro." ".@$current_session->apellido_paterno_maestro." ".@$current_session->apellido_materno_maestro;?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=base_url('profesores/perfil_profesor');?>">Mi
                                    perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=base_url('login_profesor/logout');?>">Cerrar
                                    Sesi&oacute;n</a>
                            </div>
                            <?php
                            }else{
                                ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?=@$current_session->nombre_alumno." ".@$current_session->apellido_paterno_alumno." ".@$current_session->apellido_materno_alumno;?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=base_url('Alumnos/perfil_alumno');?>">Mi
                                    perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=base_url('login_alumno/logout');?>">Cerrar
                                    Sesi&oacute;n</a>
                            </div>
                            <?php
                            }?>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content">