$(document).ready(function () {
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menu/salvar-ordem',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
            }
        });
    });
    $('.excluir-menu').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
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
                window.location.href = url;
            }
        });
    })
    $('#nestable').nestable('expandAll');/*expandAll collapseAll*/
}); 