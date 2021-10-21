<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a72123;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div>
        <ul class="navbar-nav mr-auto">
                <div class="row">
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="https://www.facebook.com/Jaguares-TKD-Quer%C3%A9taro-288080018943"
                            target="_blank"><i class="fab fa-facebook-f"></i> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="https://www.instagram.com/jaguarestkdazteca/" target="_blank"><i
                                class="fab fa-instagram"></i> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#"><i class="fab fa-twitter"></i> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-youtube"></i> <span class="sr-only"></span></a>
                    </li>




            </div>
            </ul>

    </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?=@$Acerca_de_selected ? 'active' : '';?>">
                <a class="nav-link" href="<?=base_url("Acerca");?>">Conocenos</a>
            </li>
            <li class="nav-item <?=@$ubicaciones_selected ? 'active' : '';?>">
                <a class="nav-link" href="<?=base_url("Ubicaciones");?>">Directorio</a>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar End -->

<!-- <i class="fab fa-facebook-f"></i>
<i class="fab fa-instagram"></i>
<i class="fab fa-twitter"></i>
<i class="fab fa-youtube"></i> -->