<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php?destino=compra");
    exit();
}

if(empty($_SESSION['carrinho'])){
    header("Location: carrinho.php");
    exit();
}

unset($_SESSION['produto']);
unset($_SESSION['valor']);

$_SESSION['carrinho_completo'] = $_SESSION['carrinho'];
$_SESSION['total_compra'] = array_sum(array_map(function($item) {
    return $item['valor'] * $item['quantidade'];
}, $_SESSION['carrinho']));

header("Location: confirmar.php");
exit();
?>