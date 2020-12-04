<section>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="shadow-none p-3 mb-5 bg-light rounded w-100 ml-4 mr-4">
                <div class="row">
                    <div class="col-md-5">
                        <form id="search-bar">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <select name="search-options" id="search-options">
                                        <option value="nombre_alumno" >Nombre</option>
                                        <option value="apellido_paterno_alumno" >Apellido Paterno</option>
                                        <option value="apellido_materno_alumno" >Apellido Materno</option>
                                        <option value="edad_alumno" >Edad</option>
                                        <option value="nombre_escuela" >Escuela</option>
                                        <option value="nombre_maestro" >Maestro</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" aria-label="Search input with dropdown button"
                                    name="search-input" id="search-input">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal"
                            data-target="#modalView" id="openModal"><i class="fas fa-plus"></i></button>
                    </div>
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