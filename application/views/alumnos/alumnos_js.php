<script>
$(function() {

    $(document).on('click', '#openModal', function() {
        $.ajax({
            'url': '<?=base_url('alumnos/showAlumnosForm');?>',
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

    // esta funcion es la que voy a usar para mostrar las asistencias del alumno
    $(document).on('click', '#ver_asistencias_btn', function() {
        id_alumno = $(this).attr('data-key');
        var _data = {
            "id_alumno": id_alumno
        };
        $.ajax({
            'url': '<?=base_url('alumnos/showAsistenciasAlumno');?>',
            'data': _data,
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

    // Funcion para eliminar asistencia
    $(document).on('click', '#eliminar_asistencia_btn', function() {
        id_asistencia = $(this).attr('data-key');
        var _data = {
            "id_asistencia": id_asistencia
        };
        $.ajax({
            'url': '<?=base_url('alumnos/deleteAsistenciaAlumno');?>',
            'data': _data,
            'success': function(response) {
                var convert_response = JSON.parse(response);
                if (convert_response.status == "success") {
                    // recargar modal
                    load_asistencias_alumno(convert_response.data);
                    Swal.fire(
                        convert_response.status,
                        convert_response.message,
                        convert_response.status
                    );
                }else{
                    // cerrar modal
                    $(document).find('#modalView').modal('hide');
                    Swal.fire(
                        convert_response.status,
                        convert_response.message,
                        convert_response.status
                    );
                }
               
            }
        });
    });


    $("#modalView").on("shown.bs.modal", function(e) {
        fillSelectEscuela();
        fillSelectProfes();
        $('#grado_cinta_alumno').select2({
            theme: "bootstrap4"
        });
    });

    $(document).on('submit', '#form_alumnos', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('alumnos/saveOrUpdate');?>',
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
                        'Formulario enviado correctamente',
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
                    fillSelectEscuela();
                    fillSelectProfes();
                    $('#grado_cinta_alumno').select2({
                        theme: "bootstrap4"
                    });
                    $("#form_alumnos")
                        .find("select, input")
                        .each(function() {
                            $(this).addClass("is-valid");
                        });
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
        // con ajax mandar a una funcion que me regrese el contenedor con la informacion que quiero
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('alumnos/searchAlumno');?>',
            'data': new FormData(this),
            'contentType': false,
            'processData': false,
            'method': "post",
            'success': function(response) {
                $(document).find('#data_container').empty().append(response);
            }
        });
    });

    // Editar alumno
    $(document).on('click', '#edit-alumno', function(e) {
        id_alumno = $(this).attr('data-key');
        var _data = {
            "id_alumno": id_alumno
        };
        $.ajax({
            'url': '<?=base_url('Alumnos/showAlumnosForm');?>',
            'data': _data,
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });


});

// funcion para que se vuelva a llenar el select
function fillSelectEscuela() {
    $.ajax({
        'url': '<?=base_url('alumnos/get_Escuelas');?>',
        'success': function(response) {
            var convert_response = JSON.parse(response);

            convert_response.forEach(function(element) {
                $(document).find('#escuela_alumno').append('<option value="' + element.id_escuela +
                    '">' + element.nombre_escuela + '</option>');
            });
        }
    });
    $('#escuela_alumno').select2({
        theme: "bootstrap4"
    });
}

function fillSelectProfes() {
    $.ajax({
        'url': '<?=base_url('alumnos/get_Profesores');?>',
        'success': function(response) {
            var convert_response = JSON.parse(response);

            convert_response.forEach(function(element) {
                $(document).find('#prof_alumno').append('<option value="' + element.id_maestro +
                    '">' + element.nombre_maestro + " " + element.apellido_paterno_maestro +
                    " " + element.apellido_materno_maestro + '</option>');
            });
        }
    });
    $('#prof_alumno').select2({
        theme: "bootstrap4"
    });
}

function load_data() {
    $.ajax({
        'url': '<?=base_url('alumnos/showDataContainer');?>',
        'success': function(response) {
            $(document).find('#data_container').empty().append(response);
        }
    });
}

function load_asistencias_alumno(id_alumno){
        var _data = {
            "id_alumno": id_alumno
        };
    $.ajax({
        'url': '<?=base_url('alumnos/showAsistenciasAlumno');?>',
        'data': _data,
        'success': function(response) {
            $(document).find('#modalContent').empty().append(response);
        }
    });
}
</script>