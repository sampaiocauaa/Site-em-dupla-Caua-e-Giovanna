<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="corpo">
            <div class="fundocad2">
                <img src="img/Logo1.jpg" class="logo1">
                <form class="form-box" action="salvar_login.php" method="POST">
                    <h1>DADOS DE ACESSO</h1>
                    <input type="hidden" name="cpf" value="<?php echo isset($_GET['cpf']) ? ($_GET['cpf']) : ''; ?>">
                    <input type="text" name="login" placeholder="Crie um login" required>
                    <input type="password" name="senha" placeholder="Crie uma senha" required>
                    <button type="submit">
                        Finalizar Cadastro
                    </button>
                </form>
            </div>
        </div>
    </body>
    <script src="java.js"></script>
</html>