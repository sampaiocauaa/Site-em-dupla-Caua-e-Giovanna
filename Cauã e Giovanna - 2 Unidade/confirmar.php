<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php?destino=compra");
    exit();
}

if(empty($_SESSION['produto']) && empty($_SESSION['carrinho_completo'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Confirmar Compra</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="corpo">
            <div class="fundobuy">
                <img src="img/Logo1.jpg" class="logo1">
                <form class="form-box" action="salvar_venda.php" method="POST">
                    <h1>CONFIRMAR COMPRA</h1>
                    <p style="color:black;">
                        <strong>Usuário:</strong>
                        <?php echo $_SESSION['usuario']; ?>
                    </p>
                    
                    <?php if(isset($_SESSION['carrinho_completo']) && !empty($_SESSION['carrinho_completo'])): ?>
                        <p style="color:black; text-align: left; margin-top: 15px;">
                            <strong>Itens do pedido:</strong>
                        </p>
                        <table style="width: 100%; color: black; margin-bottom: 15px; font-size: 14px; border-collapse: collapse;">
                            <?php foreach($_SESSION['carrinho_completo'] as $item): ?>
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding: 8px;"><?php echo ($item['produto']); ?></td>
                                    <td style="padding: 8px; text-align: center;">x<?php echo $item['quantidade']; ?></td>
                                    <td style="padding: 8px; text-align: right;">R$ <?php echo number_format($item['valor'] * $item['quantidade'], 2, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr style="font-weight: bold; border-top: 2px solid #000;">
                                <td colspan="2" style="padding: 8px;">Total:</td>
                                <td style="padding: 8px; text-align: right;">R$ <?php echo number_format($_SESSION['total_compra'], 2, ',', '.'); ?></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <p style="color:black;">
                            <strong>Produto:</strong>
                            <?php echo ($_SESSION['produto']); ?>
                        </p>
                        <p style="color:black;">
                            <strong>Valor:</strong>
                            R$ <?php echo number_format($_SESSION['valor'], 2, ',', '.'); ?>
                        </p>
                    <?php endif; ?>
                    
                    <div class="pagamento">
                        <select name="pagamento" required>
                            <option value="">Selecione a forma de pagamento</option>
                            <option>PIX</option>
                            <option>Cartão</option>
                            <option>Boleto</option>
                        </select>
                    </div>
                    <button type="submit">
                        Confirmar Compra
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>