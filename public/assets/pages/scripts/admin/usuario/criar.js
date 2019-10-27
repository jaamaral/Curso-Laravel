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

});