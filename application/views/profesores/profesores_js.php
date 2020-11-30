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

});

</script>