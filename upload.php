<?php
session_start();
$uploadDir = 'img/galery-photo-users/'; // Pasta onde as imagens serão salvas

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Cria a pasta, se não existir
}

$response = "";

// Processa cada arquivo enviado
foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
    $idUsuario = $_SESSION['idUsuarioLogado'];
    $fileName = basename($_FILES['images']['name'][$key]);
    $fileNameCrypto = hash('sha1', $fileName);
    $extensao = strrchr($fileName,'.');
    $tamanho_arquivo = $_FILES['images']['size'][$key];
    $nome_arquivo_novo = $idUsuario . $fileNameCrypto  . $extensao;
    // $fileName = basename($_FILES['images']['name'][$key]);
    $filePath = $uploadDir . $nome_arquivo_novo;

    // Verifica se o arquivo é uma imagem
    if (getimagesize($tmpName)) {
        if (move_uploaded_file($tmpName, $filePath)) {
            $response .= "<img src='$filePath' width='100' style='margin: 10px;'>";
        } else {
            $response .= "<p>Erro ao enviar o arquivo $nome_arquivo_novo</p>";
        }
    } else {
        $response .= "<p>O arquivo $fileName não é uma imagem válida.</p>";
    }
}

echo $response; // Retorna o HTML com as imagens
?>
