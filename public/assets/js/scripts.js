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
});