<?php
session_start();
include("config.php");
extract($_POST);

$login = $login;
$senha = md5($senha);

$sql = "SELECT cpf FROM usuarios WHERE login = '$login' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);

if ($row = mysqli_fetch_assoc($resultado)) {
    $_SESSION['usuario'] = $login;
    $_SESSION['cpf']     = $row['cpf'];

    if (!empty($produto) && !empty($valor)) {
        $_SESSION['produto'] = $produto;
        $_SESSION['valor']   = $valor;
    }

    if ($destino == "carrinho") {
        header("Location: carrinho.php");
    } elseif ($destino == "compra") {
        header("Location: confirmar.php");
    } else {
        header("Location: index.php");
    }
    exit();
} else {
    echo "Usuário ou senha inválidos. <a href='login.php'>Voltar</a>";
}
?>