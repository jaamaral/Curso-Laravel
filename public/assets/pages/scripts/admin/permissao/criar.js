$(document).ready(function () {
    Myapp.validacaoGeral('form-geral');
    $('#nome').on('change',function(){
        $('#filtro').val($(this).val().toLowerCase().replace(/ /g, '-'))
    })
});