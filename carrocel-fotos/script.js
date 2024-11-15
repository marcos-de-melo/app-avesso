$(document).ready(function () {
    let currentUser = 0;
    const users = $(".user"); // Seleciona todos os conjuntos de fotos
    const userCount = users.length;

    function slideUserPhotos() {
        const currentUserPhotos = $(users[currentUser]).children("img");
        let currentPhotoIndex = 0;

        function slidePhotos() {
            $(currentUserPhotos).css("transform", `translateX(${-currentPhotoIndex * 300}px)`);
            
            currentPhotoIndex++;

            if (currentPhotoIndex < currentUserPhotos.length) {
                setTimeout(slidePhotos, 2000); // Troca para a próxima foto após 2 segundos
            } else {
                currentUser = (currentUser + 1) % userCount;
                setTimeout(() => {
                    $(users).css("transform", `translateX(${-currentUser * 300}px)`);
                    currentPhotoIndex = 0;
                    setTimeout(slidePhotos, 2000);
                }, 2000); // Espera 2 segundos antes de passar para o próximo usuário
            }
        }

        slidePhotos();
    }

    slideUserPhotos();
});
