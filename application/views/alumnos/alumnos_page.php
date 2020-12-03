<section>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="shadow-none p-3 mb-5 bg-light rounded w-100 ml-4 mr-4">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalView"
                    id="openModal"><i class="fas fa-plus"></i></button>
                <div class="search-box col-md-5">
                    <form id="search-bar">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Nombre</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Apellidos</a>
                                    <a class="dropdown-item" href="#">Edad</a>
                                    <a class="dropdown-item" href="#">Escuela</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Search input with dropdown button" name="search-input" id="search-input">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12" id='data_container'>
                <?=$container_data;?>
            </div>
        </div>
    </div>
</section>