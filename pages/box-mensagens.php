<?php
session_start();
$idDestinatario = $_SESSION["idDestinatario"];
$idUsuarioLogado = $_SESSION["idUsuarioLogado"];
include("../db/connection.php");
$sql = "update tbmensagens set msgVisualizada = 1 where idRemetente = {$idDestinatario} and idDestinatario = {$idUsuarioLogado} and msgVisualizada = 0";

mysqli_query($conn, $sql);



$sql = "select *,date_format(dataMsg,'%d/%m/%Y  %H:%i:%s') as dataMsg 
from tbmensagens as m inner join tbusuarios as u on m.idRemetente=u.idUsuario 
where  (idRemetente = {$idUsuarioLogado} and idDestinatario={$idDestinatario}) or (idRemetente  = {$idDestinatario} and idDestinatario={$idUsuarioLogado})
order by dataMsg asc";
$rs = mysqli_query($conn, $sql);
while ($dados = mysqli_fetch_assoc($rs)) {
    $idUsuario = $dados["idUsuario"];
    $fotoPerfilUsuario = $dados["fotoPerfilUsuario"];
    $nomeUsuario = $dados["nomeUsuario"];
    $msg = $dados["conteudoMsg"];
    $dataMsg = $dados["dataMsg"];
    $classBoxMsg = ($idUsuarioLogado == $idUsuario) ? "rounded-custom-left bg-primary text-white" : "rounded-custom-right bg-light text-black";
    $classBoxMsgAlign = ($idUsuarioLogado == $idUsuario) ? "align-items-end" : "align-items-start";
    ?>
    <div class="d-flex flex-column <?= $classBoxMsgAlign ?>">
        <article class="mb-3 p-2  col-10  <?= $classBoxMsg ?>">
            <p><?= $msg ?></p>
            <?php
            if ($dados["msgVisualizada"] == 0) {
                ?>
                <p class='text-end'>
                    <?= $dataMsg ?> <span><i class="bi bi-check"></i></span>
                </p>
                <?php
            } else {
                ?>
                <p class='text-end'>
                    <?= $dataMsg ?> <span><i class="bi bi-check-all"></i></span>
                </p>
                <?php
            }
            ?>
        </article>
    </div>
    <?php
}
?>