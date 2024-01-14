$('#summernote').summernote({
    lang: 'pt-BR',
    tabsize: 2,
    height: 500,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link',]],
        ['view', ['help']]
      ],
      callbacks: {
        onChange: function(contents, $editable) {
            // Sincronize o conteúdo do Summernote com o textarea oculto
            $('#conteudoTextarea').val(contents);
        }
    }
});

$('#form-create-post').submit(function() {

    $('#conteudoTextarea').val($('#summernote').summernote('code'));

});
