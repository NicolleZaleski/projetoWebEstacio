<?php
include('conexaoBanco.php');

$query = $pdo->query("SELECT * FROM aulas");
$aulas = $query-> fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas Cadastradas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <aside class="sidebar">
        <img src="./logoestacio.png" alt="Logo Estácio" class="logo">
            <nav class="menu">
                <li class="item-menu"><a class="link-menu" href="horario.php">Quadro de Horários</a></li>
                <li class="item-menu"><a class="link-menu" href="cadastrar.php">Cadastrar Aula</a></li>
                <li class="item-menu"><a class="link-menu" href="listarAulas.php">Listar e Editar Aulas</a></li>
                <li class="item-menu"></li>
            </nav>
        </aside>
        <footer><a href="about.html">Sobre Mim</a></footer>
    </div>

    <div class="conteudo">
        <h2>Aulas Cadastradas</h2>
        <table>
            <tr>
                <th>Curso</th>
                <th>Matricula</th>
                <th>Aula</th>
                <th>Ensino</th>
                <th>Professor</th>
                <th>Dia da Semana</th>
                <th>Período do Dia</th>
                <th>Horário de Início</th>
                <th>Bloco</th>
                <th>Andar</th>
                <th>Sala</th>
                <th>Editar</th>
            </tr>
            <?php foreach ($aulas as $aula): ?>
            
                <tr>
                    <td><? $aula['curso'] ?></td>
                    <td><? $aula['matricula'] ?></td>
                    <td><? $aula['aula'] ?></td>
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
