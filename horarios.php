<?php
include 'conexaoBanco.php';

$diaSemana = date('l');
$horaAtual = date('H');
$periodoAtual = ($horaAtual < 12)? 'Matutino' :
                ($horaAtual < 18)? 'Vespertino' :
                                   'Noturno';

$query = $pdo->prepare("SELECT * FROM Aulas WHERE diaSemana = :dia AND periodo = :periodo");
$query->execute(['dia' => $diaSemana, 'periodo' => $periodoAtual]);
$aulas = $query ->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadro de Horários Estácio</title>
    <link rel="stylesheet" href="horario.css">
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
        <h2>Quadro de Horários - <?php echo $diaSemana . " - " . $periodoAtual; ?></h2>
        <div class="horarios">
            <?php foreach ($aulas as $aula): ?>
                <div class="aula">
                    <p><strong>Curso:</strong> <?= $aula['curso']?>,<?$aula['ensino'] ?></p>
                    <p><strong>Aula:</strong><?$aula['nomeAula'] ?></p>
                    <p><strong>Professor:</strong><?$aula['professor'] ?></p>
                    <p><strong>Local:</strong><? $aula['sala']?>,<? $aula['andar']?>,<? $aula['bloco']?></p>
                    <p><strong>Início:</strong><? $aula['horario']?></p>
                </div>
            <?php endforeach;?>
              
        </div>
    </div>
    
</body>
</html>