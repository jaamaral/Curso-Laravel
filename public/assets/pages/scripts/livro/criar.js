$(document).ready(function () {
    Biblioteca.validacaoGeral('form-geral');
    $('#foto').fileinput({
        language: 'pt-BR',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 1000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fa",
    });
});