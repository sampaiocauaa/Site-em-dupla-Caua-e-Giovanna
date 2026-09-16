<?php
include("config.php");
extract($_POST);

$cpf   = $cpf;
$login = trim($login);
$senha = md5($senha);

$sql = "UPDATE usuarios SET login = '$login', senha = '$senha' WHERE cpf = '$cpf'";

if (mysqli_query($conexao, $sql)) {
    header("Location: login.php");
    exit();
} else {
    echo "Erro ao salvar login: " . mysqli_error($conexao);
}
?>