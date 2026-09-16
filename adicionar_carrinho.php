<?php
session_start();

if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

$produto = $_GET['produto'] ?? '';
$valor = $_GET['valor'] ?? '';

if($produto && $valor) {

    $encontrado = false;
    foreach($_SESSION['carrinho'] as $key => $item) {
        if($item['produto'] == $produto) {
            $_SESSION['carrinho'][$key]['quantidade']++;
            $encontrado = true;
            break;
        }
    }
    
    if(!$encontrado) {
        $_SESSION['carrinho'][] = array(
            'produto' => $produto,
            'valor' => $valor,
            'quantidade' => 1
        );
    }
}

header("Location: carrinho.php");
exit();
?>