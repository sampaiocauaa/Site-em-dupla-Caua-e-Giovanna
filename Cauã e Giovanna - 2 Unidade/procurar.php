<?php
session_start();
include("config.php");

$pesquisa = trim($_POST['pesquisa'] ?? $_GET['pesquisa'] ?? '');
$resultados = [];

if ($pesquisa !== '') {
    $busca = "%" . $pesquisa . "%";
    $sql = "SELECT * FROM produtos
            WHERE titulo LIKE '%$pesquisa%' OR artista LIKE '%$pesquisa%' OR genero LIKE '%$pesquisa%'
            ORDER BY artista, titulo";

    $res = mysqli_query($conexao, $sql);
    while ($p = mysqli_fetch_assoc($res)) {
        $resultados[] = $p;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Resultados da busca</title>
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
                        <input type="search" name="pesquisa" placeholder="Digite o que você procura"
                               value="<?php echo ($pesquisa); ?>">
                    </form>
                </li>
            </ul>
            <div id="iconbarra">
                <a href="favoritos.php"><img src="img/favoritos.png" width="50px"></a>
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
            <h1>Resultados para: "<?php echo ($pesquisa); ?>"</h1>

            <?php if (empty($resultados)): ?>
                <div style="text-align:center; padding:50px;">
                    <p>Nenhum produto encontrado.</p>
                    <a href="index.php"><button>Voltar para Loja</button></a>
                </div>
            <?php else: ?>
                <div class="produtos">
                    <?php foreach ($resultados as $p): ?>
                        <div class="card">
                            <img src="<?php echo ($p['imagem']); ?>">
                            <h2><?php echo ($p['titulo']); ?></h2>
                            <p><?php echo ($p['artista']); ?></p>
                            <p><em><?php echo ($p['genero']); ?></em></p>
                            <p>R$ <?php echo number_format($p['valor'], 2, ',', '.'); ?></p>

                            <form action="adicionar_carrinho.php" method="GET" style="display:inline;">
                                <input type="hidden" name="produto" value="<?php echo ($p['titulo']); ?>">
                                <input type="hidden" name="valor" value="<?php echo $p['valor']; ?>">
                                <button type="submit" name="carrinho" style="width:auto; margin:5px;">Adicionar ao Carrinho</button>
                            </form>

                            <form action="comprar_agora.php" method="GET" style="display:inline;">
                                <input type="hidden" name="produto" value="<?php echo ($p['titulo']); ?>">
                                <input type="hidden" name="valor" value="<?php echo $p['valor']; ?>">
                                <button type="submit" name="buy" style="width:auto; margin:5px;">Comprar Agora</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div id="rodape">
            <div class="icons"><img src="img/insta.png" height="50px"> <h5>@StreetRecords</h5></div>
            <div class="icons"><img src="img/zap.png" height="50px"> <h5>+55 (11) 0002-8922</h5></div>
            <div class="icons"><img src="img/tiktok.png" height="50px"> <h5>@StreetRecords</h5></div>
            <div class="icons"><img src="img/email.png" width="54px"> <h5>streetrecords@gmail.com</h5></div>
            <div class="idiomas">
                <select name="escolheridioma">
                    <option>English</option><option>Español</option><option>Français</option>
                    <option selected>Português</option><option>Deutsch</option><option>Italiano</option>
                </select>
            </div>
            <h5>© 2026 Street Records. Todos os direitos reservados</h5>
        </div>
        <script src="java.js"></script>
    </body>
</html>