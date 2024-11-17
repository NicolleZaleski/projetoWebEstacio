<?php
    include 'conexaoBanco.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $aula = $_POST['aula'];
        $ensino = $_POST['ensino'];
        $professor = $_POST['professor'];
        $diaSemana = $_POST['diaSemana'];
        $periodo = $_POST['periodo'];
        $horario = $_POST['horario'];
        $bloco = $_POST['bloco'];
        $andar = $_POST['andar'];
        $sala = $_POST['sala'];
        
        $query = $pdo->prepare("INSERT INTO Aulas (matricula,curso,aula,ensino,professor,diaSemana,periodo,horario,bloco,andar,sala)
                                VALUES (:matricula,:curso, :aula, :ensino, :professor, :diaSemana, :periodo, :horario, :bloco, :andar, :sala)");
        $query->execute([
            'matricula' => $matricula,
            'curso' => $curso,
            'aula' => $aula,
            'ensino' => $ensino,
            'professor' => $professor,
            'diaSemana' => $diaSemana,
            'periodo' => $periodo,
            'horario' => $horario,
            'bloco' => $bloco,
            'andar' => $andar,
            'sala' => $sala
        ]);

        echo"Aula cadastrada com sucesso!!";
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aula Estácio</title>
    <script src="./javascript.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
    <aside class="sidebar">
        <img src="./logoestacio.png" alt="Logo Estácio" class="logo">
            <nav class="menu">
                <li class="item-menu"><a class="link-menu" href="horario.php">Quadro de Horários</a></li>
                <li class="item-menu"><a class="link-menu" href="cadastrarAulas.php">Cadastrar Aula</a></li>
                <li class="item-menu"><a class="link-menu" href="listarAulas.php">Listar e Editar Aulas</a></li>
                <li class="item-menu"></li>
            </nav>
        </aside>
        <footer><a href="about.html">Sobre Mim</a></footer>
    </div>

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

            <button type="submit">Cadastrar Aula</button>
        </form>
    </div>
    
</body>
</html>