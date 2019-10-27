$(document).ready(function () {
    const regras = {
        re_password: {
            equalTo: "#password"
        }
    };
    const mensagens = {
        re_password:
        {
            equalTo: 'As senhas não conferem'
        }
    };
    Biblioteca.validacaoGeral('form-geral', regras, mensagens);

    $('#password').on('change', function(){
        const valor = $(this).val();
        if(valor != ''){
            $('#re_password').prop('required', true);
        }else{
            $('#re_password').prop('required', false);
        }
    });
});