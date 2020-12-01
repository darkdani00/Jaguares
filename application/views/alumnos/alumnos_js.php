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

    
    $("#modalView").on("shown.bs.modal", function (e) {
        fillSelectEscuela();
        fillSelectProfes();
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
                    fillSelectEscuela();
                    fillSelectProfes();
                    $(document).find('#modalContent').empty().append(convert_response.data);
                }
            }
        });
    });

});

// funcion para que se vuelva a llenar el select
function fillSelectEscuela(){
    $.ajax({
        'url': '<?=base_url('alumnos/get_Escuelas');?>',
        'success': function(response) {
            var convert_response = JSON.parse(response);

            convert_response.forEach(function(element){
                $(document).find('#escuela_alumno').append('<option value="'+element.id_escuela+'">'+element.nombre_escuela+'</option>');
            });
        }
    })
}

function fillSelectProfes(){
    $.ajax({
        'url': '<?=base_url('alumnos/get_Profesores');?>',
        'success': function(response) {
            var convert_response = JSON.parse(response);

            convert_response.forEach(function(element){
                $(document).find('#prof_alumno').append('<option value="'+element.id_maestro+'">'+element.nombre_maestro+" "+element.apellido_paterno_maestro+" "+element.apellido_materno_maestro+'</option>');
            });
        }
    })
}

function load_data() {
    $.ajax({
        'url': '<?=base_url('alumnos/showDataContainer');?>',
        'success': function(response) {
            $(document).find('#data_container').empty().append(response);
        }
    })
}
</script>