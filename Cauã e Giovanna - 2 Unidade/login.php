<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="corpo">
            <div class="fundolog">
                <img src="img/Logo1.jpg" class="logo1">
                <form class="form-box" action="processa_login.php" method="POST">
                    <h2>LOGIN</h2>
                    <input 
                        type="hidden" 
                        name="produto" 
                        value="<?php echo isset($_GET['produto']) ? $_GET['produto'] : (isset($_SESSION['produto']) ? $_SESSION['produto'] : ''); ?>"
                    >
                    <input 
                        type="hidden" 
                        name="valor" 
                        value="<?php echo isset($_GET['valor']) ? $_GET['valor'] : (isset($_SESSION['valor']) ? $_SESSION['valor'] : ''); ?>"
                    >
                    <input 
                        type="text" 
                        name="login" 
                        placeholder="Login" required
                    >
                    <input
                        type="password"
                        name="senha"
                        placeholder="Senha" required
                    >
                    <input
                        type="hidden"
                        name="destino"
                        value="<?php echo isset($_GET['destino']) ? $_GET['destino'] : 'index'; ?>"
                    >
                    <button>Enviar</button>
                    <p>
                        <a href="cadastro1.php">
                            <h5>Não tem conta ainda? Crie uma!</h5>
                        </a>
                        <a href="frgtsenha.php">
                            <h5>Esqueci minha senha</h5>
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>