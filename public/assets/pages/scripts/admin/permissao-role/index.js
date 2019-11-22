$('.permissao_role').on('change', function () {
    var data = {
        permissao_id: $(this).data('permissaoid'),
        role_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/permissao-role', data);
});

function ajaxRequest (url, data) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (resposta) {
            Myapp.notificacoes(resposta.resposta, 'Myapp', 'success');
        }
    });
}