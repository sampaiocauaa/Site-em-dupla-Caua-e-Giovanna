<?php
include("config.php");
extract($_POST);

$nome     = trim($nome);
$email    = trim($email);
$cpf      = trim($cpf);
$endereco = trim($endereco);
$bairro   = trim($bairro);
$cidade   = trim($cidade);
$estado   = trim($estado);
$cep      = trim($cep);

$sql = "INSERT INTO usuarios (nome, email, cpf, endereco, bairro, cidade, estado, cep)
        VALUES ('$nome', '$email', '$cpf', '$endereco', '$bairro', '$cidade', '$estado', '$cep')";

if (mysqli_query($conexao, $sql)) {
    header("Location: cadastro2.php?cpf=" . urlencode($cpf));
    exit();
} else {
    echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
}
?>