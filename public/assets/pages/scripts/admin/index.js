$(document).ready(function () {
    $("#tabela-dados").on('submit', '.form-excluir', function () {
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
                ajaxRequest(form);
            }
        });
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuest) {
                if (respuest.mensagem == "ok") {
                    form.parents('tr').remove();
                    Biblioteca.notificacoes('O registro foi excluído com sucesso', 'Biblioteca', 'success');
                } else {
                    Biblioteca.notificacoes('O registro não pode ser excluído, há recursos sendo utilizados', 'Biblioteca', 'error');
                }

            },
            error: function () {

            }
        });
    }
}); 