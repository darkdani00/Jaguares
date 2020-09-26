<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top black_bar_size" style="background-color: #000000;">
    <a class="navbar-brand ml-5" href="<?=base_url("Welcome");?>">
        <img src="<?=base_url("resources/img/logo.jpg");?>" width="60" height="60" alt="" >
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="navbar-collapse collapse" id="navbarNavDropdown2"> 
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?=@$ubicaciones_selected ? 'active' : '';?>">
                <a class="nav-link" href="<?=base_url("Ubicaciones");?>">Ubicaciones</a>
            </li>
            <li class="nav-item <?=@$login_selected ? 'active' : '';?>">
                <a class="nav-link" href="<?=base_url("Login");?>">Iniciar sesi&oacute;n</a>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar End -->