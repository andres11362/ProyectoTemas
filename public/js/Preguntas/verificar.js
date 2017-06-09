$(document).ready(function (evt) {
    $pregid = $('#_id').val();
    $route = '../../../ProyectoTemas/public/verificar/'+$pregid;
    $token = $('#token').val();
    $.ajax({
        url: $route,
        headers: {'X-CSRF-TOKEN': $token},
        type: 'GET',
        dataType: 'json',
        data: {id: $pregid},
        success:function (data) {
            if(data !=null){
                $valor  =  data.valor;
                if($valor == false){
                    $respuesta  =  data.registro[0].respuesta_s;
                    $('input[type="radio"][value=' + $respuesta + ']').attr('checked', 'checked');
                    $('input[type="radio"]').attr('disabled', 'disabled');
                    $('.boton').removeClass('hidden');
                    $('#evaluar').addClass('hidden');
                    alert('Ya respondiste esta pregunta');
                }
            }
            console.log(data);
        },
        error: function (msj) {
            console.log(msj);
        }
    });
});
