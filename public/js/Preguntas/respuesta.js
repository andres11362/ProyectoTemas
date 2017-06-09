$(document).ready(function () {
    $('#evaluar').click(function (evt) {
        evt.preventDefault();
        if($("input[name='valor']:radio").is(':checked')){
            $id = $('#_id').val();
            $route = '../../../ProyectoTemas/public/examen/consulta/'+$id;
            $val = $('input:radio[name=valor]:checked').val();
            $token = $('#token').val();
            $.ajax({
                url: $route,
                crossdomain: true,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                dataType: 'json',
                data: {id: $id},
                success: function (data) {
                    $con  = data[0].respuesta_correcta;
                    $preg = data[0].preguntaid;
                    $route2 = '../../../ProyectoTemas/public/examen/'+$preg+'/'+$val;
                    $.ajax({
                        url: $route2,
                        headers: {'X-CSRF-TOKEN': $token},
                        type: 'POST',
                        dataType: 'json',
                        data: {pregunta: $preg, respuesta: $val},
                        success: function (data) {
                            $valor = data.valor;
                            if($valor == false){
                                console.log('Registro insertado con exito');
                                if($con == $val){
                                    $('#respuesta').append('<span id="correcto"><i class="fa fa-check" aria-hidden="true"></i></span>');
                                    $('input[type="radio"]').attr("disabled", true);
                                    $('.boton').removeClass('hidden');
                                    $('#evaluar').addClass('hidden');
                                }else{
                                    $('#respuesta').append('<span id="incorrecto"><i class="fa fa-times" aria-hidden="true"></i></span>');
                                    $('input[type="radio"]').attr("disabled", true);
                                    $('.boton').removeClass('hidden');
                                    $('#evaluar').addClass('hidden');
                                }
                            }else{
                                $respuesta  =  data.response[0].respuesta_s;
                                $('input[type="radio"][value=' + $respuesta + ']').attr("disabled", true).attr('checked', 'checked');
                                $('.boton').removeClass('hidden');
                                $('#evaluar').addClass('hidden');
                                alert('Ya respondiste esta pregunta');
                            }
                        },
                        error: function (msj) {
                            console.log(msj);
                        }
                    });
                },
                error: function (msj){
                    console.log(msj);
                }
            });
        }else{
            alert('no ha seleccionado ninguna opcion');
        }
    });
});
