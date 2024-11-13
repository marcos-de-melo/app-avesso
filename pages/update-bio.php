<?php
session_start();
$idUsuario = $_SESSION["idUsuarioLogado"];
include("../db/connection.php");
$bioUsuario = $_POST["bioUsuario"];

$sql = "UPDATE tbusuarios SET bioUsuario = '{$bioUsuario}' WHERE idUsuario = '{$idUsuario}'";
mysqli_query($conn, $sql) or die(mysqli_error($conn)) or die(mysqli_error($conn));