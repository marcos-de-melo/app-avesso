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
    <title>Perfil | Avesso</title>
</head>

<body>

    <div class="container">
        <div class="column vh-100 align-items-center justify-content-center">

            <div>
                <div class="flex column text-center mb-4">
                    <img class="col-2" src="img/Logo.png" alt="Avesso">
                </div>
            </div>

            <div class="progresso-cadastro mb-4">
                <div class="circulo-etapa-v"><a href="create-profile1.php">1</a></div>
                <div class="barra-cinza"></div>
                <div class="circulo-etapa-c"><a href="create-profile2.php">2</a></div>
                <div class="barra-cinza"></div>
                <div class="circulo-etapa-c"><a href="create-profile3.php">3</a></div>
                <div class="barra-cinza"></div>
                <div class="circulo-etapa-c"><a href="create-profile4.php">4</a></div>
            </div>

            <p class="size-16">
                Adicione uma <span class="text-primary">foto</span> para seu perfil
            </p>




            <div>
                <!-- <div class="flex column text-center mb-4">
                    <img src="img/photos-profile-users/add-photo.png" class="figure-img img-fluid rounded-circle" alt="...">
                </div>
                <div>
                    <form action="" method="post">
                        <input type="file" name="arquivo" id="arquivo">
                        <button>Enviar</button>
                    </form>
                </div> -->
                <div class="d-flex flex-column align-items-center mb-4">
                    <?php
                    if ($dados["fotoPerfilUsuario"] == "" || !file_exists('./img/photos-profile-users/' . $dados["fotoPerfilUsuario"])) {
                        $nomeFoto = "Add-photo.png";
                        $PularProximo = "Pular";
                    } else {
                        $nomeFoto = $dados["fotoPerfilUsuario"];
                        $PularProximo = "Proximo";
                    }
                    ?>
                    <div class="mb-3">
                        <img  id="foto-usuario" src="img/photos-profile-users/<?= $nomeFoto ?>" class="round-image" alt="...">
                    </div>
                    <h2><?= $_SESSION["nomeUsuario"] ?></h2>
                    <div class="mb-3">
                        <button class="btn" id="btn-editar-foto">
                            <i class="bi bi-camera-fill"></i> Editar Foto
                        </button>
                    </div>
                    <div id="editar-foto" class="col-12 col-sm-4">
                        <form id="form-upload-foto" class="mb-3 text-center" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="idUsuario" value="<?= $dados["idUsuario"] ?>">
                            <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
                            <div class="input-group">
                                <input class="form-control" type="file" name="arquivo" id="arquivo">
                                <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                            </div>

                        </form>
                        <div id="mensagem" class="mb-3 alert alert-success">

                        </div>
                        <div id="preloader" class="progress">
                            <div id="barra" class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <footer class="fixed-bottom">
        <div class="border-light border-top border-3 p-4 container d-flex align-items-end justify-content-end">
            
            <a id="btn-proximo" class="text-primary" href="create-profile2.php">
                <?= $PularProximo ?> <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </footer>
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script src="./js/upload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>

</html>