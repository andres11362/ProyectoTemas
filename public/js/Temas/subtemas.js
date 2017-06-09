$(document).ready(function(){
    var x=1;
    $('#clonar').click(function(evt){
        evt.preventDefault();
        var clone = $('#field').clone().addClass("val-"+x).removeClass("val-"+(x-1));
        clone.find('#stitulo').attr('name',"subtemas["+x+"][titulo]").val('').end();
        clone.find('#stexto').attr('name',"subtemas["+x+"][texto]").val('').end();
        clone.find('#input-es').attr('name',"imagen["+x+"][img]").val('').end();
        //se puede usar cualquiera de los dos metodos siguientes
        $('#subthemes').append(clone);
        //clone.appendTo("body");
        x++;
        $('#numero').val(x);
        $('#subitems').val("1");
    });

    $('#remover').click(function(evt){
        evt.preventDefault();
        $('.val-'+(x-1)).remove();
        x--;
        $('#numero').val(x);
        if(x <= 0){
            $('#subitems').val("0");
            $('#nuevo').removeClass('hidden');
            $('#remover').addClass('hidden');
            $('#clonar').addClass('hidden');
            $('#numero').val(1);
            x=1;
        }else{
            $('#subitems').val("1");
        }
    });

});