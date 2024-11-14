 // 2. Envio do formulário com jQuery AJAX
 $(document).ready(function () {
    $('#uploadForm').on('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: 'upload.php', // Caminho do arquivo PHP que processará o upload
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#imagePreview').html(response); // Atualiza o preview com as imagens
                $('#images').val(''); // Limpa o campo de arquivos
            }
        });
    });
});