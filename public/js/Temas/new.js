$(document).ready(function () {
    var x= 0;
    $field  = '<div class="col-md-6 val-0" id="field">'+
        '<legend>Subtema</legend>'+
            '<fieldset>'+
                '<div class="form-group">'+
                '<label>Titulo: </label>'+
                    '<input type="text" class="form-control" name="subtemas[0][titulo]" id="stitulo" placeholder="Ingresa el titulo del subtema" required>'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Descripcion: </label>'+
                    '<textarea class="form-control" name="subtemas[0][texto]" id="stexto" placeholder="Ingresa la descripcion del subtema" required></textarea>'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Imagen: </label>'+
                    '<input id="input-es" class="sfile" type="file" name="imagen[0][img]" required>'+
                '</div>'+
            '</fieldset>'+
        '</div>';
    $('#nuevo').click(function (evt) {
        evt.preventDefault();
        $('#subitems').val("1");
        $('#subthemes').append($field);
        $('#nuevo').addClass('hidden');
        $('#clonar').removeClass('hidden');
        $('#remover').removeClass('hidden');
    });
});
