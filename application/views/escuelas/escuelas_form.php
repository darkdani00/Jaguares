<div class="modal-header bg-secondary">
    <h5 class="modal-title" id="exampleModalLabel">Registro de Escuelas</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_escuelas">
    <div class="modal-body">
        <div class="form-group">
            <label for="nom_escuela">Nombre</label>
            <input type="text" class="form-control" id="nom_escuela" name="nom_escuela" value="<?=@$current_data['nom_escuela'];?>">
        </div>
        <div class="form-group">
            <label for="tel_escuela">Tel&eacute;fono</label>
            <input type="number" class="form-control" id="tel_escuela" name="tel_escuela" value="<?=@$current_data['tel_escuela'];?>">
        </div>
        <div class="form-group">
            <label for="direccion_escuela">Direcci&oacute;n</label>
            <textarea class="form-control" id="direccion_escuela" name="direccion_escuela"><?=@$current_data['direccion_escuela'];?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>