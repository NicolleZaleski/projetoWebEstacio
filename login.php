<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estácio - Entrar</title>
    <link rel="stylesheet" href="entrar.css">
</head>
<body>

    <div class="container">
        <img src="./logoestacio.png" alt="Logo Estácio" class="logo">

        <div class="formulario">
            <form  method="post" onsubmit="return validarLogin()">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite o email." required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite a senha." required>

                <button type="submit">Entrar</button>
            </form>
        </div>
        <div id="mensagemErro">
            <?php
            if (isset($_GET['erro'])) {
                echo "<p class='erro'>" . htmlspecialchars($_GET['erro']) . "</p>";
            }
            ?>
        </div>
    </div>

    <script src="./validar.js"></script>
    
</body>
</html>