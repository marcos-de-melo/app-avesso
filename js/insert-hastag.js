$(document).ready(function() {
  $("#btn-insert-hashtag").on('click',function(event){
    
    event.preventDefault();
    var hashtag = $('#txthashtag').val();
    // Verifica se o campo não está vazio
    if (hashtag.trim() === "") {
      alert("Por favor, digite uma mensagem.");
      return;
    }
    alert(hashtag); 
// Faz a requisição AJAX
  $.ajax({
    url: './pages/update-hashtag.php',
    type: 'POST',
    data: { hashtagUsuario: hashtag },
    success: function(response) {
        alert("Mensagem enviada com sucesso!");
        $('#txtHashtag').val(''); // Limpa o campo após o envio
        $('#hashtag').html(hashtag); // Mostra o texto da hashtag enviada na tela
        $('#btn-proximo').html('Proximo <i class="bi bi-arrow-right"></i>'); // Mostra o texto da hashtag enviada na tela
    },
    error: function(xhr, status, error) {
        alert("Ocorreu um erro ao enviar a mensagem.");
        $('#txthashtag').val(''); // Limpa o campo após o envio
        console.error(error);
    }
  });
});

  });