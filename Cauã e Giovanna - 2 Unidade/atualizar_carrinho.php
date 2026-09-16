<?php
session_start();

if(isset($_GET['maismenos']) && isset($_GET['acao'])) {
    $maismenos = $_GET['maismenos'];
    $acao = $_GET['acao'];
    
    if(isset($_SESSION['carrinho'][$maismenos])) {
        if($acao == 'mais') {
            $_SESSION['carrinho'][$maismenos]['quantidade']++;
        } 
        elseif($acao == 'menos') {
            $_SESSION['carrinho'][$maismenos]['quantidade']--;
            
            if($_SESSION['carrinho'][$maismenos]['quantidade'] <= 0) {
                unset($_SESSION['carrinho'][$maismenos]);
                $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            }
        }
    }
}

header("Location: carrinho.php");
exit();
?>