<script>
$(function() {

    $(document).on('click', '#openModal', function() {
        $.ajax({
            'url': '<?=base_url('Profesores/showProfesoresForm');?>',
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

    $("#modalView").on("shown.bs.modal", function(e) {
        fillSelectEscuela();
        $('#grado_cinta_prof').select2({
            theme: "bootstrap4"
        });
    });

    $(document).on('submit', '#form_profesores', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('Profesores/saveOrUpdate');?>',
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
                    $('#grado_cinta_prof').select2({
                        theme: "bootstrap4"
                    });
                    $("#form_profesores")
                        .find("select, input")
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

});

// funcion para que se vuelva a llenar el select
function fillSelectEscuela() {
    $.ajax({
        'url': '<?=base_url('profesores/get_Escuelas');?>',
        'success': function(response) {
            var convert_response = JSON.parse(response);

            convert_response.forEach(function(element) {
                $(document).find('#escuela_prof').append('<option value="' + element.id_escuela +
                    '">' + element.nombre_escuela + '</option>');
            });
        }
    });
    $('#escuela_prof').select2({
        theme: "bootstrap4"
    });
}

function load_data() {
    $.ajax({
        'url': '<?=base_url('profesores/showDataContainer');?>',
        'success': function(response) {
            $(document).find('#data_container').empty().append(response);
        }
    })
}
</script>