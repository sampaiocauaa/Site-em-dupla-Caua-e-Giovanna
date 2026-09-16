<?php
session_start();

unset($_SESSION['produto']);
unset($_SESSION['valor']);

$produto = isset($_GET['produto']) ? $_GET['produto'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';

$_SESSION['produto'] = $produto;
$_SESSION['valor'] = $valor;

if(!isset($_SESSION['usuario'])){
    header("Location: login.php?destino=compra&produto=" . urlencode($produto) . "&valor=" . $valor);
    exit();
} else {
    header("Location: confirmar.php");
    exit();
}
?>