$(document).ready(function () {
    Biblioteca.validacaoGeral('form-geral');
    $('#nome').on('change',function(){
        $('#filtro').val($(this).val().toLowerCase().replace(/ /g, '-'))
    })
});