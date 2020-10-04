<div class="container-fluid" style="height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-8 col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <!--Mensaje error-->
                    <?php if($this->session->flashdata('error_msg')){ ?>
                    <div class="text-center">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?=@$this->session->flashdata('error_msg');?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php } ?>
                    <!---->
                    <?=form_open('Login_alumno/authentication');?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alumno_email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="alumno_password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
                    <?=form_close();?>
                    <div class="mt-2 text-center">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>