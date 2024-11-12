<?php
session_start();
// Conexão com o banco de dados
include "./db/connection.php";
// Verificação no banco de dados

$msg_error = "";

if (isset( $_SESSION["emailUsuario"]) &&  isset($_SESSION["senhaUsuario"])) {
    
    

    $sql = "SELECT * FROM tbusuarios WHERE emailUsuario = '{$_SESSION["emailUsuario"]}' and senhaUsuario = '{$_SESSION["senhaUsuario"]}'";
    $rs = mysqli_query($conn, $sql);
    $linha = mysqli_num_rows($rs);
    $dados = mysqli_fetch_assoc($rs);

    if ($linha == 0) {
        
        unset($_SESSION["emailUsuario"]);
        unset($_SESSION["senhaUsuario"]);
        unset($_SESSION["nomeUsuario"]);
        unset($_SESSION["idUsuarioLogado"]);
        session_destroy();


        header('Location: login.php');
    } 
}else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="wrapper">
<?php
include('sidebar.php');
?>
        <div class="main">
<?php
// include('nav-top.php');
?>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                    <?php
                    include('./content.php');
                    ?>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>