<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include("config.php");
extract($_POST);

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$numero    = rand(1000, 9999);
$usuario   = $_SESSION['usuario'];
$pagamento = $pagamento;
$data      = date("Y-m-d H:i:s");

$itensTexto = "";

if (isset($_SESSION['carrinho_completo']) && !empty($_SESSION['carrinho_completo'])) {
    $produto = "Múltiplos itens";
    $valor   = $_SESSION['total_compra'];

    foreach ($_SESSION['carrinho_completo'] as $item) {
        $itensTexto .= $item['produto'] . " x" . $item['quantidade']
                     . " (R$ " . $item['valor'] . ")\n";
    }
} else {
    $produto    = $_SESSION['produto'];
    $valor      = $_SESSION['valor'];
    $itensTexto = $produto . " (R$ " . $valor . ")";
}

$sql = "INSERT INTO vendas (numero, usuario, pagamento, total, data_venda, itens)
        VALUES ('$numero', '$usuario', '$pagamento', '$valor', '$data', '$itensTexto')";

mysqli_query($conexao, $sql);

unset($_SESSION['produto'], $_SESSION['valor'], $_SESSION['carrinho'],
      $_SESSION['carrinho_completo'], $_SESSION['total_compra']);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compra Finalizada</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="corpo">
            <div class="fundobuy">
                <div class="form-box">
                    <h1>COMPRA REALIZADA!</h1>
                    <p style="color:black; text-align:center;">
                        Sua compra foi concluída com sucesso.
                    </p>
                    <p style="color:black;">
                        <strong>Número do pedido:</strong>
                        <?php echo $numero; ?>
                    </p>
                    <p style="color:black;">
                        <strong>Produto(s):</strong>
                        <?php echo $produto; ?>
                    </p>
                    <p style="color:black;">
                        <strong>Valor total:</strong>
                        R$ <?php echo number_format($valor, 2, ',', '.'); ?>
                    </p>
                    <p style="color:black;">
                        <strong>Pagamento:</strong>
                        <?php echo $pagamento; ?>
                    </p>
                    <p style="color:black;">
                        <strong>Data:</strong>
                        <?php echo $data; ?>
                    </p>
                    <br>
                    <a href="index.php">
                        <button>Voltar para Loja</button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>