/* Botão Limpar campos de formulário*/
$(document).ready(function () {
    //Fechar alertas automaticamente
    $('.alert[fechamento-automatico]').each(function (index, element) {
        const $element = $(element),
            timeout = $element.data('fechamento-automatico') || 5000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });
    //TOOLTIPS
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });
    $('ul.sidebar-menu').find('li.active').parents('li').addClass('active');

    // Trabajo con Ventana de Roles.
    const modal = $('#modal-selecionar-role');
    if (modal.length && modal.data('role-set') == 'NO') {
        modal.modal('show');
    }

    $('.atribuir-role').on('click', function (event) {
        event.preventDefault();
        const data = {
            role_id: $(this).data('roleid'),
            role_nome: $(this).data('rolenome'),
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, '/ajax-sesion', 'atribuir-role');
    });

    function ajaxRequest(data, url, funcion) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (resposta) {
                if (funcion == 'atribuir-role' && resposta.mensagem == 'ok') {
                    $('#modal-selecionar-role').hide();
                    location.reload();
                }
            }
        });
    }
});