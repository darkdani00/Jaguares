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

    $(document).on('submit', '#agregar_alumno_clase_form', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('Asistencias/addAlumnosClase');?>',
            'data': new FormData(this),
            'contentType': false,
            'processData': false,
            'method': "post",
            'success': function(response) {
                var convert_response = JSON.parse(response);
                if (convert_response.status == "success") {
                    load_alumnos_clase(convert_response.clase_id);
                    fillSelectAddAlumnos(convert_response.clase_id);
                } else {
                    Swal.fire(
                        convert_response.status,
                        convert_response.message,
                        convert_response.status
                    );
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
            'url': '<?=base_url('asistencias/searchClase');?>',
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
            confirmButtonText: `Continuar`,
            denyButtonText: `Cancelar`,
            icon: 'warning'
        }).then((result) => {
            if (result.isConfirmed) {
                id_clase = $(this).attr('data-key');
                var _data = {
                    "clase_id": id_clase
                };
                $.ajax({
                    'url': '<?=base_url('Asistencias/delete_clase');?>',
                    'data': _data,
                    'success': function(response) {
                        var convert_response = JSON.parse(response);
                        if (convert_response.status == "success") {
                            // actualizar el contenedor 
                            load_data();
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
            } else if (result.isDenied) {
                Swal.close()
            }
        });
    });

    $(document).on('click', '#edit-btn', function(e) {
        id_clase = $(this).attr('data-key');
        var _data = {
            "clase_id": id_clase
        };
        $.ajax({
            'url': '<?=base_url('Asistencias/showClasesEditForm');?>',
            'data': _data,
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
                fillSelectAddAlumnos(id_clase);
            }
        });
    });

    $(document).on('submit', '#delete_alumnos_form', function(e) {
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
                    fillSelectAddAlumnos(convert_response.clase_id);
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

    var _mytable = $("#table_asistencias_alumno").DataTable({
        ajax: {
          url: "<?=base_url('Asistencias/get_Asistencias_Alumno');?>",
          dataSrc: "",
        },
        columns: [
          { data: "fecha", defaultContent: "" },
          { data: null },
          { data: "asistencia", defaultContent: "" }
        ],
        columnDefs: [
          {
            data: "dia_semana",
            render : function(data, type,row){
                var dia = "";
                switch(data.dia_semana){
                    case '1':
                        dia = 'Lunes';
                    break;
                    case '2':
                        dia = 'Martes';
                    break;
                    case '3':
                        dia = 'Mi&eacute;rcoles';
                    break;
                    case '4':
                        dia = 'Jueves';
                    break;
                    case '5':
                        dia = 'Viernes';
                    break;
                    case '6':
                        dia = 'S&aacute;bado';
                    break;
                    case '7':
                        dia = 'Domingo';
                    break;
                    default:
                        dia = '';
                    break;
                }
                return dia;
            },
            targets: 1
          }
        ]
      });

    var _mytable = $("#table_clases_alumno").DataTable({
        ajax: {
          url: "<?=base_url('Asistencias/get_Clases_Alumno');?>",
          dataSrc: "",
        },
        columns: [
          { data: "hora_inicia", defaultContent: "" },
          { data: "hora_termina", defaultContent: "" },
          { data: null },
        ],
        columnDefs: [
          {
            data: "dia_semana",
            render : function(data, type,row){
                var dia = "";
                switch(data.dia_semana){
                    case '1':
                        dia = 'Lunes';
                    break;
                    case '2':
                        dia = 'Martes';
                    break;
                    case '3':
                        dia = 'Mi&eacute;rcoles';
                    break;
                    case '4':
                        dia = 'Jueves';
                    break;
                    case '5':
                        dia = 'Viernes';
                    break;
                    case '6':
                        dia = 'S&aacute;bado';
                    break;
                    case '7':
                        dia = 'Domingo';
                    break;
                    default:
                        dia = '';
                    break;
                }
                return dia;
            },
            targets: -1
          }
        ]
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

function load_alumnos_clase(clase_id) {
    var _data = {
        "clase_id": clase_id
    };
    $.ajax({
        'url': '<?=base_url('Asistencias/showAlumnosClaseContainer');?>',
        'data': _data,
        'success': function(response) {
            $(document).find('#alumnos_container').empty().append(response);
            $(document).find('#alumnos_container').prepend('<input type="hidden" value="' + clase_id +
                '" name="clase_id">');
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

function fillSelectAddAlumnos(id_clase) {
    var _data = {
        "clase_id": id_clase
    };
    $.ajax({
        'url': '<?=base_url('Asistencias/get_Alumnos_Add');?>',
        'data': _data,
        'success': function(response) {
            var convert_response = JSON.parse(response);
            $("#alumno_clase_add").empty();
            convert_response.forEach(function(element) {
                $(document).find('#alumno_clase_add').empty().append('<option value="' + element.id_alumno +
                    '">' + element.nombre_alumno + " " + element.apellido_paterno_alumno + " " +
                    element.apellido_materno_alumno + '</option>');
            });
        }
    });
    $('#alumno_clase_add').select2();
}
</script>