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
                    $(document).find('#modal_profesores').modal('hide');
                    // load_data();
                    Swal.fire(
                        'Correcto',
                        'Formulario enviado correctamente',
                        'success'
                    );
                } else if (convert_response.status == "error") {
                    //Indefinido
                } else {
                    $(document).find('#modalContent').empty().append(convert_response.data);
                }
            }
        });
    });

    $("#modalView").on("shown.bs.modal", function(e) {
        fillSelectProfes();
    });

    //para que cuando se cierre el modal se limpien los input
    $("#modalView").on("hidden.bs.modal", function(e) {
        // limpiar los select
        $("#form_profesores")
            .find("select")
            .each(function() {
                $(this).val("").trigger('change');
            });
    });

});


function fillSelectProfes() {
    $.ajax({
        url: '<?=base_url('Profesores/getEscuelas');?>',
        success: function(response) {
            var convert_response = JSON.parse(response);

            if (convert_response.status_text == "error") {
                // mensaje de error
            } else if (convert_response.status_text == "success") {

                var result = $.map(convert_response.data, function(item) {
                    return {
                        text: item.nombre_escuela,
                        id: item.id_escuela
                    };
                });

                $('#escuela_prof').select2({
                    placeholder: "selecciona una opcion",
                    data: result,
                    dropdownParent: $("#modal_profesores"),
                    theme: "bootstrap4"
                });

            } else {
                // mensaje de error
            }
        }
    });
}
</script>