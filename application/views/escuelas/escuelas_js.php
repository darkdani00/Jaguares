<script>
$(function() {

    $(document).on('click', '#openModal', function() {
        $.ajax({
            'url': '<?=base_url('Escuelas/showEscuelasForm');?>',
            'success': function(response) {
                $(document).find('#modalContent').empty().append(response);
            }
        });
    });

    $(document).on('submit', '#form_escuelas', function(e) {
        e.preventDefault();
        $.ajax({
            'url': '<?=base_url('Escuelas/saveOrUpdate');?>',
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
                    $("#form_escuelas")
                        .find("textarea,input")
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

});

function load_data() {
    $.ajax({
        'url': '<?=base_url('escuelas/showDataContainer');?>',
        'success': function(response) {
            $(document).find('#data_container').empty().append(response);
        }
    })
}
</script>