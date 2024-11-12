<?php
// Conexão com o banco de dados
include "./db/connection.php";
// Verificação no banco de dados

$msg_error = "";

if (isset($_POST["emailUsuario"]) && isset($_POST["senhaUsuario"])) {
    $emailUsuario = mysqli_escape_string($conn, $_POST["emailUsuario"]);
    $senhaUsuario = hash('sha1', $_POST["senhaUsuario"]);

    $sql = "SELECT * FROM tbusuarios WHERE emailUsuario = '{$emailUsuario}' and senhaUsuario = '{$senhaUsuario}'";

    $rs = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($rs);
    $linha = mysqli_num_rows($rs);

    if ($linha != 0) {
        session_start();
        $_SESSION["emailUsuario"] = $emailUsuario;
        $_SESSION["senhaUsuario"] = $senhaUsuario;
        $_SESSION["nomeUsuario"] = $dados["nomeUsuario"];
        $_SESSION["idUsuarioLogado"] = $dados["idUsuario"];

        header('Location: index.php');


    } else {
        $msg_error = "<div class='alert alert-danger mt-3'>
                            <p>Usuário não encontrado ou a senha não confere.</p>
                            </div>
            ";
    }
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
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="img-mobile-app-exemple col-12 col-sm-3 text-center">
                <img class="img-fluid" src="img/img-mobile-app-exemple.png" alt="Agendador">
            </div>
            <div class="col-12 col-sm-3 p-4 bg-white shadow rounded">
                <div class="flex column text-center mb-4">
                    <img class="col-6" src="img/Logo.png" alt="Avesso">
                    <hr class="col-9 m-auto mt-4 mb-4">
                    <h2 class="size-20">Entrar com login e senha</h2>
                </div>
                <form class="needs-validation" action="login.php" method="post" novalidate>
                    <div class="form-group mb-2">

                        <div class="input-group has-validation">

                            <input class="form-control" type="text" name="emailUsuario" id="emailUsuario"
                                placeholder="Email" required>

                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <div class="invalid-feedback">
                                Informe o username.
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="input-group has-validation">

                            <input class="form-control" type="password" name="senhaUsuario" id="senhaUsuario"
                                placeholder="Senha" required>
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <div class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                        <?php
                        echo $msg_error;
                        ?>
                    </div>
                    <button class="btn btn-primary w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                    <div class="form-group mb-2 position-relative">
                        <hr class="col-9 m-auto mt-4">
                        <span
                            class="text-center position-absolute top-50 start-50 translate-middle bg-white p-2">OU</span>
                    </div>
                    <span class="d-block text-center mt-4">Não possui uma conta? <a class="text-primary"
                            href="register.php">Cadastre-se</a></span>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>

</html>