<script>
$(function() {

    $(document).on('click', '#openModal', function() {
        $.ajax({
            'url': '<?=base_url('Asistencias/showClasesForm');?>',
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

    $("#modalView").on("shown.bs.modal", function(e) {
        fillSelectAlumnos();
    });

    $(document).on('submit', '#form_clases', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('Asistencias/saveOrUpdate');?>',
            'data': new FormData(this),
            'contentType': false,
            'processData': false,
            'method': "post",
            'success': function(response) {
                var convert_response = JSON.parse(response);
                if (convert_response.status == "success") {
                    //cerrar modal, cargar datos
                    $(document).find('#modalView').modal('hide');
                    load_data();
                    Swal.fire(
                        'Correcto',
                        convert_response.message,
                        'success'
                    );
                } else if (convert_response.status == "error") {
                    // si falla la bd
                    Swal.fire(
                        'Error',
                        convert_response.message,
                        'error'
                    );
                } else {
                    $(document).find('#modalContent').empty().append(convert_response.data);
                    fillSelectAlumnos();
                    $("#form_clases")
                        .find("select,input")
                        .each(function() {
                            $(this).addClass("is-valid");
                        });
                    // poner en rojo input
                    $.each(convert_response.errors, function(key, value) {
                        $("#" + key).addClass("is-invalid");
                        $("#" + key).after(
                            '<div class="invalid-feedback">' + value + "</div>"
                        );
                    });
                }
            }
        });
    });

    $(document).on('submit', '#form_asistencias', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('Asistencias/saveAsistencia');?>',
            'data': new FormData(this),
            'contentType': false,
            'processData': false,
            'method': "post",
            'success': function(response) {
                var convert_response = JSON.parse(response);
                if (convert_response.status == "success") {
                    $(document).find('#modalView').modal('hide');
                    Swal.fire(
                        'Correcto',
                        convert_response.message,
                        'success'
                    );
                } else if (convert_response.status == "error") {
                    // si falla la bd
                    Swal.fire(
                        'Error',
                        convert_response.message,
                        'error'
                    );
                } else {
                    $(document).find('#modalContent').empty().append(convert_response.data);
                    // poner en rojo input
                    $.each(convert_response.errors, function(key, value) {
                        $("#" + key).addClass("is-invalid");
                        $("#" + key).after(
                            '<div class="invalid-feedback">' + value + "</div>"
                        );
                    });
                }
            }
        });
    });

    $(document).on('submit', '#search-bar', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('escuelas/searchEscuela');?>',
            'data': new FormData(this),
            'contentType': false,
            'processData': false,
            'method': "post",
            'success': function(response) {
                $(document).find('#data_container').empty().append(response);
            }
        });
    });

    $(document).on('click', '#delete-btn', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Seguro?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Save`,
            denyButtonText: `Don't save`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        });
    });

    $(document).on('click','#edit-btn',function(e){
        id_clase = $(this).attr('data-key');
        var _data = {
            "clase_id": id_clase
        };
        $.ajax({
            'url': '<?=base_url('Asistencias/showClasesEditForm');?>',
            'data': _data,
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

    $(document).on('submit','#delete_alumnos_form',function(e){
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('Asistencias/removeAlumnosClase');?>',
            'data': new FormData(this),
            'contentType': false,
            'processData': false,
            'method': "post",
            'success': function(response) {
                var convert_response = JSON.parse(response);
                if (convert_response.status == "success") {
                    // actualizar el contenedor alumnos_container
                    load_alumnos_clase(convert_response.clase_id);
                } else if (convert_response.status == "error") {
                    // si falla la bd
                    Swal.fire(
                        'Error',
                        convert_response.message,
                        'error'
                    );
                } else {
                    // si falla algo
                    Swal.fire(
                        'Error',
                        convert_response.message,
                        'error'
                    );
                }
            }
        });
    });

    $(document).on('click', '.asistencias-view', function(e) {
        e.preventDefault();
        // obtener el id de la clase con  data-key 
        id_clase = $(this).attr('data-key');
        // Abrir  un modal que sea para registrar las asistencias
        var _data = {
            "clase_id": id_clase
        };
        $.ajax({
            'url': '<?=base_url('Asistencias/showAsistenciasForm');?>',
            'data': _data,
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

});

function load_data() {
    $.ajax({
        'url': '<?=base_url('Asistencias/showDataContainer');?>',
        'success': function(response) {
            $(document).find('#data_container').empty().append(response);
        }
    });
}

function load_alumnos_clase(clase_id){
    var _data = {
            "clase_id": clase_id
        };
    $.ajax({
        'url': '<?=base_url('Asistencias/showAlumnosClaseContainer');?>',
        'data': _data,
        'success': function(response) {
            $(document).find('#alumnos_container').empty().append(response);
            $(document).find('#alumnos_container').prepend('<input type="hidden" value="'+clase_id+'" name="clase_id">');
        }
    });
}

function fillSelectAlumnos() {
    $.ajax({
        'url': '<?=base_url('Asistencias/get_Alumnos');?>',
        'success': function(response) {
            var convert_response = JSON.parse(response);

            convert_response.forEach(function(element) {
                $(document).find('#alumno_clase').append('<option value="' + element.id_alumno +
                    '">' + element.nombre_alumno + " " + element.apellido_paterno_alumno + " " +
                    element.apellido_materno_alumno + '</option>');
            });
        }
    });
    $('#alumno_clase').select2();
}
</script>