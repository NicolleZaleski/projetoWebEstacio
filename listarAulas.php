<?php
include('conexaoBanco.php');

$query = $pdo->query("SELECT * FROM Aulas");
$aulas = $query-> fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas Cadastradas</title>
    <link rel="stylesheet" href="listarAulas.css">
</head>

<body>
    <div class="menu-lateral">
        <img src="./logo.png" alt="Logo Estácio" class="logo">
        <a href="horario.php">Quadro de Horários</a>
        <a href="cadastrarAulas.php">Cadastrar Aula</a>
        <a href="listarAulas.php">Listar e Editar Aulas</a>
        <a href="about.html">Sobre Mim</a>
    </div>

    <div class="conteudo">
        <h2>Aulas Cadastradas</h2>
        <table>
            <tr>
                <th>Curso</th>
                <th>Aula</th>
                <th>Ensino</th>
                <th>Professor</th>
                <th>Dia da Semana</th>
                <th>Período do Dia</th>
                <th>Horário de Início/th>
                <th>Bloco</th>
                <th>Andar</th>
                <th>Sala</th>
                <th>Editar</th>
            </tr>
            <?php foreach ($aulas as $aula): ?>
            
                <tr>
                    <td><? $aula['curso'] ?></td>
                    <td><? $aula['nomeAula'] ?></td>
                    <td><? $aula['ensino'] ?></td>
                    <td><? $aula['professor'] ?></td>
                    <td><? $aula['diaSemana'] ?></td>
                    <td><? $aula['periodo'] ?></td>
                    <td><? $aula['horario'] ?></td>
                    <td><? $aula['bloco'] ?></td>
                    <td><? $aula['andar'] ?></td>
                    <td><? $aula['sala'] ?></td>
                    <td><a href="editar.php?id=<?= $aula['id']?>">Editar</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

   </div>
</body>
</html>
