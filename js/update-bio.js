$(document).ready(function() {
  $("#btn-update-bio").on('click',function(event){
    
    event.preventDefault();
    var bio = $('#txtBio').val();
    // Verifica se o campo não está vazio
    if (bio.trim() === "") {
      alert("Por favor, digite uma mensagem.");
      return;
    }
    alert(bio); 
// Faz a requisição AJAX
  $.ajax({
    url: './pages/update-bio.php',
    type: 'POST',
    data: { bioUsuario: bio },
    success: function(response) {
        alert("Mensagem enviada com sucesso!");
        $('#txtBio').val(''); // Limpa o campo após o envio
        $('#bio').html(bio); // Mostra o texto da bio enviada na tela
        $('#btn-proximo').html('Proximo <i class="bi bi-arrow-right"></i>'); // Mostra o texto da bio enviada na tela
    },
    error: function(xhr, status, error) {
        alert("Ocorreu um erro ao enviar a mensagem.");
        $('#txtBio').val(''); // Limpa o campo após o envio
        console.error(error);
    }
  });
});

  });