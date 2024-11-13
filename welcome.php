<?php
session_start();
// Conexão com o banco de dados
include "./db/connection.php";
// Verificação no banco de dados

$msg_error = "";

if (isset($_SESSION["emailUsuario"]) && isset($_SESSION["senhaUsuario"])) {
    $emailUsuario = mysqli_escape_string($conn, $_SESSION["emailUsuario"]);
    $senhaUsuario = $_SESSION["senhaUsuario"];

    $sql = "SELECT * FROM tbusuarios WHERE emailUsuario = '{$emailUsuario}' and senhaUsuario = '{$senhaUsuario}'";

    $rs = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($rs);
    $linha = mysqli_num_rows($rs);

    if ($linha == 0) {


        header('Location: login.php');
    } 
}else {

    header('Location: login.php');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Login | Avesso</title>
</head>

<body>

    <div class="container">
        <div class="column vh-100 align-items-center justify-content-center">

            <div>
                <div class="flex column text-center mb-4">
                    <img class="col-2" src="img/Logo.png" alt="Avesso">
                    <hr class="col-9 m-auto mt-4 mb-4">
                    <h2 class="size-20 text-primary">Olá <?php echo $_SESSION["nomeUsuario"]; ?><br>Seja bem vindo(a) ao Avesso!</h2>
                    <p class="size-16">
                        Conheça novas pessoas e descubra quem está por trás da tela. Não julgue um
                        livro pela capa!
                    </p>
                    <img class="col-4" src="img/Characters.png" alt="Avesso">

                </div>
            </div>


        </div>
    </div>
    <footer class="fixed-bottom">
        <div class="border-light border-top border-3 p-4 container d-flex align-items-end justify-content-end">
            
        <a class="text-primary" href="welcome2.php">Próximo <i class="bi bi-arrow-right"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>

</html>