$(document).ready(function () {
    $("#tabela-dados").on('submit', '.form-excluir', function (event) {
        event.preventDefault();
        const form = $(this);
        swal({
            title: 'Deseja realmente excluir o registro?',
            text: "Esta ação não poderá ser desfeita!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceitar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'excluirLivro', form);
            }
        });
    });

    $('.mostrar-livro').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'mostrarLivro');
    });

    function ajaxRequest(data, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (resposta) {
                if (funcion == 'excluirLivro') {
                    if (resposta.mensagem == "ok") {
                        form.parents('tr').remove();
                        Myapp.notificacoes('O registro foi excluído com sucesso', 'Myapp', 'success');
                    } else {
                        Myapp.notificacoes('O registro não pode ser excluído, há recursos sendo utilizados', 'Myapp', 'error');
                    }
                } else if (funcion == 'mostrarLivro') {
                    $('#modal-mostrar-livro .modal-body').html(resposta);
                    $('#modal-mostrar-livro').modal('show');
                }
            },
            error: function () {

            }
        });
    }
});