$(document).ready(function(){
    Myapp.validacaoGeral('form-geral');
    $('#icone').on('blur', function(){
        $('#mostrar-icone').removeClass().addClass('fa fa-fw ' + $(this).val());
    });
});