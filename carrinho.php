<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php?destino=carrinho");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Loja de Discos - Carrinho</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="navbar">
            <ul>
                <li>
                    <a class="ativo" href="index.php">
                        <img src="img/Logobarra.png" height="40px">
                    </a>
                </li>
                <li><a href="index.php#container">Produtos</a></li>
                <li><a href="index.php#rodape">Contato</a></li>
                <li>
                    <form method="post" action="procurar.php" class="pesquisa">
                        <input type="search" name="pesquisa" placeholder="Digite o que você procura">
                    </form>
                </li>
            </ul>
            <div id="iconbarra">
                <a href="carrinho.php"><img src="img/carrinho.png" width="50px"></a>
                <img src="img/user.png" width="50px" id="usuarionavbar" onclick="abrirMenu()">
                <div id="fotoperfil">
                    <?php if(isset($_SESSION['usuario'])){ ?>
                        <a href="logout.php">Sair</a>
                    <?php } else { ?>
                        <a href="login.php">Login</a>
                        <a href="cadastro1.php">Cadastro</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="containernull"></div>
        <div id="container">
            <h1>Seu Carrinho</h1>
            
            <?php if(empty($_SESSION['carrinho'])): ?>
                <div style="text-align: center; padding: 50px;">
                    <p>Seu carrinho está vazio!</p>
                    <a href="index.php#container">
                        <button>Continuar Comprando</button>
                    </a>
                </div>
            <?php else: ?>
                <table style="width: 100%; border-collapse: collapse; background: white;">
                    <thead>
                        <tr>
                            <th style="padding: 10px; border-bottom: 2px solid black;">Produto</th>
                            <th style="padding: 10px; border-bottom: 2px solid black;">Valor</th>
                            <th style="padding: 10px; border-bottom: 2px solid black;">Quantidade</th>
                            <th style="padding: 10px; border-bottom: 2px solid black;">Subtotal</th>
                            <th style="padding: 10px; border-bottom: 2px solid black;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $total = 0;
                    foreach($_SESSION['carrinho'] as $maismenos => $item): 
                        $subtotal = $item['valor'] * $item['quantidade'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td style="padding: 10px; text-align: center;"><?php echo $item['produto']; ?></td>
                            <td style="padding: 10px; text-align: center;">R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></td>
                            <td style="padding: 10px; text-align: center;">
                                <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                                    <a href="atualizar_carrinho.php?maismenos=<?php echo $maismenos; ?>&acao=menos" style="text-decoration: none;">
                                        <button type="button" style="width: 35px; padding: 5px; margin: 0; background: #111;">-</button>
                                    </a>
                                    <span style="min-width: 30px; font-weight: bold;"><?php echo $item['quantidade']; ?></span>
                                    <a href="atualizar_carrinho.php?maismenos=<?php echo $maismenos; ?>&acao=mais" style="text-decoration: none;">
                                        <button type="button" style="width: 35px; padding: 5px; margin: 0; background: #111;">+</button>
                                    </a>
                                </div>
                            </td>
                            <td style="padding: 10px; text-align: center;">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                            <td style="padding: 10px; text-align: center;">
                                <a href="remover_carrinho.php?maismenos=<?php echo $maismenos; ?>" style="color: red;">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" style="padding: 10px; text-align: right; font-weight: bold;">Total:</td>
                        <td colspan="2" style="padding: 10px; text-align: center; font-weight: bold;">R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
                </table>
                
                <div style="margin-top: 30px; text-align: right;">
                    <form action="finalizar_compra.php" method="POST" style="background: transparent; border: none; padding: 0; margin: 0; width: auto; display: inline-block;">
                        <button type="submit" style="width: auto; padding: 12px 30px; background: #000000; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer;">
                            Finalizar Compra
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        
        <div id="rodape">
            <div class="icons">
                <img src="img/insta.png" height="50px"> <h5>@StreetRecords</h5>
            </div>
            <div class="icons">
                <img src="img/zap.png" height="50px"> <h5>+55 (11) 0002-8922</h5>
            </div>
            <div class="icons">
                <img src="img/tiktok.png" height="50px"> <h5>@StreetRecords</h5>
            </div>
            <div class="icons">
                <img src="img/email.png" width="54px"> <h5>streetrecords@gmail.com</h5>
            </div>                
            <div class="idiomas">
                <select name="escolheridioma">
                    <option>English</option>
                    <option>Español</option>
                    <option>Français</option>
                    <option selected>Português</option>
                    <option>Deutsch</option>
                    <option>Italiano</option>
                </select>
            </div>
            <h5>© 2026 Street Records. Todos os direitos reservados</h5>                       
        </div>
        <script src="java.js"></script>
    </body>
</html>