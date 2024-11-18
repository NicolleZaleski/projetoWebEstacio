<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aula Estácio</title>
    <script src="./javascript"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./cad.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <img src="./logoestacio.png" alt="Logo Estácio" class="logo">
            <nav class="menu">
                <li class="item-menu"><a href="horario.php" class="link-menu">Quadro de Horários</a></li>
                <li class="item-menu"><a href="cadastrar.php" class="link-menu">Cadastrar Aula</a></li>
                <li class="item-menu"><a href="listarAulas.php" class="link-menu">Listar e Editar Aulas</a></li>
                <li class="item-menu"><a href="cad2.php" class="link-menu">cad2</a></li>
            </nav>
        </aside>
        <footer><a href="about.html">Sobre Mim</a></footer>
    </div>

    <div class="area">
        <div class="conteudo">
            <h2 class="titulo-pag">Cadastrar Aula</h2>
            <form method="post">
            <label for="curso">Curso:</label>
                <input type="text" id="curso" name="curso" required><br>

                <label for="ensino">Modalidade de Ensino:</label>
                <select name="ensino" id="ensino" required>
                    <option value="Presencial">Presencial</option>
                    <option value="Semipresencial">Semipresencial</option>
                </select><br>

                <label for="matricula">Matrícula da aula:</label>
                <input type="number" id="matricula" name="matricula" required><br>

                <label for="aula">Nome da Aula:</label>
                <input type="text" id="aula" name="aula" required><br>

                <label for="professor">Professor</label>
                <input type="text" id="professor" name="professor" required><br>

                <label for="diaSemana">Dia da Semana:</label>
                <select name="diaSemana" id="diaSemana" required>
                    <option value="Segunda-Feira">Segunda-Feira</option>
                    <option value="Terça-Feira">Terça-Feira</option>
                    <option value="Quarta-Feira">Quarta-Feira</option>
                    <option value="Quinta-Feira">Quinta-Feira</option>
                    <option value="Sexta-Feira">Sexta-Feira</option>
                    <option value="Sábado">Sábado</option>
                </select><br>

                <label for="periodo">Período:</label>
                <select name="periodo" id="periodo" required>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                    <option value="Noturno">Noturno</option>
                </select><br>

                <label for="horario">Horário de Início da aula:</label>
                <input type="text" id="horario" name="horario" required><br>

                <label for="bloco">Bloco:</label>
                <input type="text" id="bloco" name="bloco" required><br>

                <label for="andar">Andar:</label>
                <input type="text" id="andar" name="andar" required><br>

                <label for="sala">Sala:</label>
                <input type="text" id="sala" name="sala" required><br>

                <button type="submit" class="cadastrar">Cadastrar Aula</button>
            </form>
        </div>
    </div>
    
    <!-- <script src="javascript.js"></script> -->
    
</body>
</html>