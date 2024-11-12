<?php
date_default_timezone_set('America/Sao_Paulo');




if (isset($_SESSION["emailUsuario"]) and isset($_SESSION["senhaUsuario"])) {
    $emailUsuario = $_SESSION["emailUsuario"];
    $senhaUsuario = $_SESSION["senhaUsuario"];
    $_SESSION["idDestinatario"] = $_GET["idUsuarioMatch"];


    $idDestinatario = $_GET["idUsuarioMatch"];

    $sql = "SELECT * FROM tbusuarios WHERE emailUsuario = '{$emailUsuario}' 
    and senhaUsuario = '{$senhaUsuario}'";
    $rs = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_assoc($rs);

    $linha = mysqli_num_rows($rs);

    if ($linha == 0) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}


$idUsuarioLogado = $dados["idUsuario"];


?>
<div class="row">
    <div class="col-4">
        <header class="d-flex gap-2 align-items-center border-bottom border-light border-3 pb-2">
            <h2>Mensagens</h2>
        </header>
        <form class="mt-2" action="" method="post">
            <div class="input-group">
                <button type="submit" class="input-group-text">
                    <i class="bi bi-search"></i>
                </button>
                <input type="search" class="form-control" placeholder="Pesquisar">
            </div>
            <div class="d-flex gap-2 align-items-center justify-content-center mt-3">
                <a href="?page=messages" class="btn btn-primary rounded-pill">
                    <i class="col-2 bi bi-people-fill"></i>
                    Tudo
                </a>
                <a href="?page=messages" class="btn btn-primary rounded-pill"><i class="col-2 bi bi-eye-slash"></i> Não
                    lidas</a>
                <a href="?page=messages" class="btn btn-primary rounded-pill"><i class="col-2 bi bi-bookmarks-fill"></i>
                    Favoritas</a>
            </div>
        </form>
        <div class="message-list">
            <table class="table table-hover mt-3">


                <?php
                $sql = "select u.idUsuario, m.idUsuario, m.idUsuarioMatch, 
(select nomeUsuario from tbusuarios where idUsuario = m.idUsuarioMatch ) as nomeUsuarioMatch,
(select count(idDestinatario) as qtNewMsg from tbmensagens where idDestinatario = u.idUsuario and idRemetente = m.idUsuarioMatch  and msgVisualizada = 0) as qtNewMsg
from tbusuarios as u inner join tbmatches as m on u.idUsuario = m.idUsuario where u.idUsuario = " . $_SESSION["idUsuarioLogado"];
                $rs = mysqli_query($conn, $sql);
                while ($dados = mysqli_fetch_assoc($rs)) {
                    echo "<tr>
                <td class='text-left'><img width='50px' src='img/account.png' alt=''></img></td>
                <td>{$dados["nomeUsuarioMatch"]}</td>
                <td><a href='?page=messages&idUsuarioMatch={$dados["idUsuarioMatch"]}'>Chat</a></td>
                <td><a class='badge bg-danger rounded-circle' href='?page=messages&idUsuarioMatch={$dados["idUsuarioMatch"]}'>{$dados["qtNewMsg"]}</a></td>
            </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-8">
        <header class="d-flex gap-3 align-items-center border-bottom border-light border-3 p-3">
            <img width="50px" src="img/account.png" alt="Amanda" class="rounded-circle">
            <h2>Amanda</h2>
        </header>
        <div class="border-bottom border-light border-3">
            <section class="container-fluid">
                <div id="box-msg" class="overflow-auto p-3 mb-3 border" style="max-height: calc(100vh - 300px);">

                </div>
            </section>
        </div>
        <footer class="gap-3 p-4">
            <div class="content">
                <form action="" method="post">
                    <input type="hidden" id="idDestinatario" name="idDestinatario" value="<?= $idDestinatario ?>">
                    <input type="hidden" id="idRemetente" name="idRemetente" value="<?= $idUsuarioLogado ?>">
                    <div class="input-group">
                        <input class="form-control" type="text" id="txtMsg" name="txtMsg"> <button class="btn"
                            id="btn-insert-msg" type="submit">
                            <i class="bi bi-send-fill text-primary"></i>
                        </button>
                    </div>
                </form>

            </div>
        </footer>
    </div>
</div>
<script src="./js/jquery.js"></script>
<script src="./js/box-mensagens.js"></script>