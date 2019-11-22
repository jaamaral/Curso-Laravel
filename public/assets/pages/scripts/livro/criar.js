$(document).ready(function () {
    Myapp.validacaoGeral('form-geral');
    $('#foto').fileinput({
        language: 'pt-BR',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 5000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fa",
    });
});