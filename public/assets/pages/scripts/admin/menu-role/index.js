$('.menu_role').on('change', function () {
    var data = {
        menu_id: $(this).data('menuid'),
        role_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/menu-role', data);
});

function ajaxRequest (url, data) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (resposta) {
            Biblioteca.notificacoes(resposta.resposta, 'Biblioteca', 'success');
        }
    });
} 