<?php
include 'conexaoBanco.php';

//$diaSemana = date('l');
//$horaAtual = date('H');
//$periodoAtual = ($horaAtual < 12)? 'Matutino' :
//                ($horaAtual < 18)? 'Vespertino' :
//                                   'Noturno';

//$query = $pdo->prepare("SELECT * FROM Aulas WHERE diaSemana = :diaSemana AND periodo = :periodo");
//$query->execute(['diaSemana' => $diaSemana, 'periodo' => $periodoAtual]);
//$aulas = $query ->fetchAll();
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadro de Horários Estácio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
        <img src="./logo.png" alt="Logo Estácio" class="logo">
            <nav class="menu">
                <li><a href="horario.php">Quadro de Horários</a></li>
                <li><a href="cadastrarAulas.php">Cadastrar Aula</a></li>
                <li><a href="listarAulas.php">Listar e Editar Aulas</a></li>
                <li><a href="about.html">Sobre Mim</a></li>
            </nav>
        </aside>
        <main class="area-principal">
            <header class="header">
                <h1>Dia da semana - Período do Dia</h1>
            </header>

            <section class="pastas">
            <?php
                $sql = "SELECT curso,ensino,matricula,aula,professor,horario,bloco,andar,sala FROM Aulas";
                $result = $conn->query($sql);

                // Verifica se há resultados e exibe cada aula
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='folder'>";
                        echo "<p><strong>Curso:</strong> " . htmlspecialchars($row["curso"]) . "</p>";
                        echo "<p><strong>Aula:</strong> " . htmlspecialchars($row["matricula"]) . htmlspecialchars($row["aula"]) . "</p>";
                        echo "<p><strong>Horário:</strong> " . htmlspecialchars($row["horario"]) . "</p>";
                        echo "<p><strong>Professor:</strong> " . htmlspecialchars($row["professor"]) . "</p>";
                        echo "<p><strong>Local:</strong> " . htmlspecialchars($row["andar"]) .  htmlspecialchars($row["sala"]) ."</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Nenhuma aula cadastrada.</p>";
                }

                // Fecha a conexão
                $conn->close();
                ?>
            </section>
        </main>
        
    </div>

    <!-- <div class="conteudo">
        <h2>Quadro de Horários - <?php echo $diaSemana . " - " . $periodoAtual; ?></h2>
        <div class="horarios">
            <?php foreach ($aulas as $aula): ?>
                <div class="aula">
                    <p><strong>Curso:</strong> <?= $aula['curso']?>,<?$aula['ensino'] ?></p>
                    <p><strong>Aula:</strong><? $aula['matricula'] ,$aula['nomeAula'] ?></p>
                    <p><strong>Professor:</strong><?$aula['professor'] ?></p>
                    <p><strong>Local:</strong><? $aula['sala']?>,<? $aula['andar']?>,<? $aula['bloco']?></p>
                    <p><strong>Início:</strong><? $aula['horario']?></p>
                </div>
            <?php endforeach;?>
              
        </div>
    </div>
     -->
</body>
</html>