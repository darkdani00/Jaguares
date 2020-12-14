<?php foreach($alumnos_data as $alumno){  ?>
<div class="row mt-1 mb-1 ml-1">
    <div class="col">
        <h6><?php echo $alumno->nombre_alumno ." ".$alumno->apellido_paterno_alumno ." ".$alumno->apellido_materno_alumno;?>
        </h6>
    </div>
    <div class="col">
            <input class="form-check-input" type="checkbox" value="<?=$alumno->id_alumnos_clase;?>" name="alumno_clase[]">
    </div>
</div>
<?php } ?>