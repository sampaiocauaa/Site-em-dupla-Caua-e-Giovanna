<?php
session_start();

if(isset($_GET['key'])) {
    unset($_SESSION['carrinho'][$_GET['key']]);
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
}

header("Location: carrinho.php");
exit();
?>