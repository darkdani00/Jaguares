<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Registro de Maestros</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_profesores">
    <div class="modal-body">
        <input type="hidden" name="id_maestro" value="<?=@$current_data['id_maestro'];?>">
        <div class="row">
            <div class="col-12">
                <input type="file" name="pic_profe" class="dropify" data-default-file="<?=base_url('resources/img/placeholder.jpg');?>" data-allowed-file-extensions="png jpg" data-max-file-size='2M' />
            </div>
        </div>
        <div class="form-group">
            <label for="nom_prof">Nombre</label>
            <input type="text" class="form-control" id="nom_prof" name="nom_prof" value="<?=@$current_data['nom_prof'];?>">
        </div>
        <div class="form-group">
            <label for="ape_pa_prof">Apellido Paterno</label>
            <input type="text" class="form-control" id="ape_pa_prof" name="ape_pa_prof" value="<?=@$current_data['ape_pa_prof'];?>">
        </div>
        <div class="form-group">
            <label for="ape_mat_prof">Apellido Materno</label>
            <input type="text" class="form-control" id="ape_mat_prof" name="ape_mat_prof" value="<?=@$current_data['ape_mat_prof'];?>">
        </div>
        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=@$current_data['email'];?>">
        </div>
        <div class="form-group">
            <label for="genero_prof">G&eacute;nero</label>
            <select class="form-control" id="genero_prof" name="genero_prof">
                <?php if (@$current_data['genero_prof']=='Femenino') {
                    ?>
                        <option>Femenino</option>
                        <option>Masculino</option>
                    <?php
                }else{
                    ?>
                        <option>Masculino</option>
                        <option>Femenino</option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="edad_prof">Edad</label>
            <input type="number" class="form-control" id="edad_prof" name="edad_prof" value="<?=@$current_data['edad_prof'];?>">
        </div>
        <div class="form-group">
            <label for="num_prof">N&uacute;mero de tel&eacute;fono</label>
            <input type="number" class="form-control" id="num_prof" name="num_prof" value="<?=@$current_data['num_prof'];?>">
        </div>
        <div class="form-group">
            <label for="grado_cinta_prof">Grado de cinta</label>
            <select class="form-control" id="grado_cinta_prof" name="grado_cinta_prof" value="<?=@$current_data['grado_cinta_prof'];?>">
                <option>Cinta Negra 1er Dan</option>
                <option>Cinta Negra 2do Dan</option>
                <option>Cinta Negra 3er Dan</option>
                <option>Cinta Negra 4to Dan</option>
                <option>Cinta Negra 5to Dan</option>
                <option>Cinta Negra 6to Dan</option>
                <option>Cinta Negra 7mo Dan</option>
                <option>Cinta Negra 8vo Dan</option>
                <option>Cinta Negra 9no Dan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="escuela_prof">Escuela</label>
            <select id="escuela_prof" name="escuela_prof" class="form-control" value="<?=@$current_data['escuela_prof'];?>">
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>


<script type="text/javascript">
    $(function(){
        $('.dropify').dropify();
    });
</script>
