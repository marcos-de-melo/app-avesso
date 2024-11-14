<?php
session_start();
$PularProximo = "Pular";
// Conexão com o banco de dados
include "./db/connection.php";
// Verificação no banco de dados
function insertHashtag($conn, $idUsuario, $tituloHashtag) {
    $tituloHashtagValidado = str_replace(' ', '_',$_GET["tituloHashtag"]);
    $sql = "INSERT INTO tbhashtags (idUsuario, tituloHashtag) VALUES ( '{$_SESSION['idUsuarioLogado']}', '{$tituloHashtagValidado}')";

    $rs = mysqli_query($conn, $sql);
}
function removeHashtag($conn, $idUsuario) {
    $sql = "DELETE FROM tbhashtags WHERE idUsuario = '{$idUsuario}'and tituloHashtag = '{$_GET["tituloHashtag"]}'";

    $rs = mysqli_query($conn, $sql);
}
if(isset($_GET["tituloHashtag"])) {
    $tituloHashtagValidado = str_replace(' ', '_',$_GET["tituloHashtag"]);
    $sql = "SELECT * FROM tbhashtags WHERE tituloHashtag = '{$tituloHashtagValidado}' and idUsuario = '{$_SESSION["idUsuarioLogado"]}'";

    $rs = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($rs);
    $linha = mysqli_num_rows($rs);

    if ($linha != 0) {
        removeHashtag($conn, $_SESSION["idUsuarioLogado"]);
    }else {
        insertHashtag($conn, $_SESSION["idUsuarioLogado"], $_GET["tituloHashtag"]);
    }
}
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
} else {

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

    <div class="container column align-items-center justify-content-center">

        <div>
            <div class="flex column text-center">
                <img class="col-2" src="img/Logo.png" alt="Avesso">
            </div>
        </div>

        <div class="progresso-cadastro mb-4">
            <div class="circulo-etapa-v"><a href="create-profile1.php">1</a></div>
            <div class="barra-vermelha"></div>
            <div class="circulo-etapa-v"><a href="create-profile2.php">2</a></div>
            <div class="barra-vermelha"></div>
            <div class="circulo-etapa-v"><a href="create-profile3.php">3</a></div>
            <div class="barra-cinza"></div>
            <div class="circulo-etapa-c"><a href="create-profile4.php">4</a></div>
        </div>
        <header>
            <h2 class="size-16 text-primary">
                Customizando perfil
            </h2>
        </header>

        <div class="row">
            <div class="card col-12 col-sm-3 d-flex align-items-center pt-4">

                <?php
                if ($dados["fotoPerfilUsuario"] == "" || !file_exists('./img/photos-profile-users/' . $dados["fotoPerfilUsuario"])) {
                    $nomeFoto = "Add-photo.png";
                } else {
                    $nomeFoto = $dados["fotoPerfilUsuario"];
                }
                ?>

   
                <div class="round-image" id="divFotoPerfil" style="background-image: url(img/photos-profile-users/<?= $nomeFoto ?>)"></div>
                <h2><?= $_SESSION["nomeUsuario"] ?></h2>
                <p id="bio">
                    <?php echo $dados["bioUsuario"] ?>
                </p>
                <p>
                <?php
                    $sql = "select * from tbhashtags where idUsuario = '{$_SESSION["idUsuarioLogado"]}'";
                    $rs = mysqli_query($conn, $sql);
                    $linhas = mysqli_num_rows($rs);
                    if($linhas == 0){
                        $PularProximo = "Pular";
                    }else{
                        $PularProximo = "Próximo";
                    }
                    while ($dados = mysqli_fetch_assoc($rs)) {
                        $idHashtag = $dados["idHashtag"];
                        $tituloHashtag = $dados["tituloHashtag"];
                        echo "<span class='m-1 fw-light'>
                        <a class='text-secondary' href='?removerHashtag={$idHashtag}&tituloHashtag={$tituloHashtag}'>#$tituloHashtag</a>
                    </span>";
                    }
                    ?>
                    </p>
            </div>
            <div class="col-12 col-sm-9 column align-items-center justify-content-center">
                <h2>Adicione algumas  <span class="text-primary">hashtags</span></h2>
                <div class="tags mb-4">
                    <?php
                    $sql = "select * from tbhashtags_app";
                    $rs = mysqli_query($conn, $sql);
                    while ($dados = mysqli_fetch_assoc($rs)) {
                        $tituloHashtag = $dados["tituloHashtag"];
                        echo "<span class='m-1 badge text-bg-light fw-light border border-1 border-secondary rounded-pill'>
                        <a class='text-secondary' href='?tituloHashtag={$tituloHashtag}'>#$tituloHashtag</a>
                    </span>";
                    }
                    ?>
 

                </div>
                <form action="" method="get">
                    <div class="input-group">
                        <input class="form-control" type="text" id="tituloHashtag" name="tituloHashtag" placeholder="crie sua própria hashtag..."> <button class="btn"
                            id="btn-insert-msg" type="submit">
                            <i class="bi bi-send-fill text-primary"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>





    </div>
    <footer class="fixed-bottom">
        <div class="border-light border-top border-3 p-4 container d-flex align-items-between justify-content-between">
            <a class="text-primary" href="create-profile2.php"><i class="bi bi-arrow-left"></i> Voltar</a>
            <a id="btn-proximo" class="text-primary" href="create-profile4.php">
                <?= $PularProximo ?> <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </footer>
    <script src="./js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
    <script src="./js/insert-hastag.js"></script>
</body>

</html>