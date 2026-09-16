<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="corpo">
            <div class="fundocad1">
                <img src="img/Logo1.jpg" class="logo1">
                <form class="form-box" action="salvar_usuario.php" method="POST">
                    <h1>CRIAR CONTA</h1>
                    <h3>Informações Pessoais</h3>
                    <div class="nome">
                        <input type="text" name="nome" placeholder="Nome completo" required>
                    </div>
                    <div class="cpfemail">
                        <input type="email" name="email" placeholder="Informe o email" required>
                        <input type="text" name="cpf" placeholder="CPF" maxlength="14" required>
                    </div>
                    <h3>Endereço</h3>
                    <div class="endereco">
                        <input type="text" name="endereco" placeholder="Endereço (rua e número)" required>
                        <input type="text" name="bairro" placeholder="Bairro" required>
                    </div>
                    <div class="endereco">
                        <input type="text" name="cidade" placeholder="Cidade" required>
                        <input type="text" name="estado" placeholder="Estado" required>
                    </div>
                    <div class="endereco">
                        <input type="text" name="cep" placeholder="CEP" required>
                    </div>
                    <button>Continuar</button>
                </form>
            </div>
        </div>
    </body>
    <script src="java.js"></script>
</html>