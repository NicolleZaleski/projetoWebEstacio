<?php
include 'conexaoBanco.php';

setlocale(LC_TIME, 'pt_BR.utf8', 'Portuguese_Brazil.1252');
date_default_timezone_set('America/Campo_Grande');

$date = new DateTime();
$formatter = new IntlDateFormatter(
    'pt_BR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'America/Sao_Paulo',
    IntlDateFormatter::GREGORIAN,
    'EEEE' 
);
$diaSemana = ucfirst($formatter->format($date)); 
$horaAtual = (int)$date->format('H');
$periodo = '';

if ($horaAtual >= 6 && $horaAtual < 12) {
    $periodo = 'Matutino';
} elseif ($horaAtual >= 12 && $horaAtual < 18) {
    $periodo = 'Vespertino';
} else {
    $periodo = 'Noturno';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadro de Horários Estácio</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="horario.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
        <img src="./logoestacio.png" alt="Logo Estácio" class="logo">
            <nav class="menu">
                <li class="item-menu"><a class="link-menu" href="horario.php">Quadro de Horários</a></li>
                <li class="item-menu"><a class="link-menu" href="cad.php">Cadastrar Aula</a></li>
                <li class="item-menu"><a class="link-menu" href="listarAulas.php">Listar e Editar Aulas</a></li>
            </nav>
        </aside>
        <footer><a href="about.html">Sobre Mim</a></footer>
        <main class="area-principal">
            <header class="titulo">
            <h1><?php echo $diaSemana . " - " . $periodo; ?></h1>
            </header>

            <section class="pastas">
            <?php
                $sql = "SELECT curso, ensino, matricula, aula, professor, horario, bloco, andar, sala 
                        FROM Aulas 
                        WHERE diaSemana = ? AND periodo = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $diaSemana, $periodo);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
                        echo "<div class='aulas'>";
                        echo "<p class='curso'><strong></strong> " . htmlspecialchars($row["curso"]) . "</p>";
                        echo "<p class='aula'><strong>Aula: </strong>" . htmlspecialchars($row["matricula"]) . " " . htmlspecialchars($row["aula"]) . "</p>";
                        echo "<p class='professor'><strong>Docente:</strong> " . htmlspecialchars($row["professor"]) . "</p>";
                        echo "<p class='horario'><strong>Horário de Início:</strong> " . htmlspecialchars($row["horario"]) . "</p>";
                        echo "<p class='local'><strong>Local:</strong> " . htmlspecialchars($row["andar"]) . " andar, sala " . htmlspecialchars($row["sala"]) ."</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='semaula'>";
                    echo "<p>Nenhuma aula cadastrada.</p>";
                    echo "</div>";
                }

                $conn->close();
                ?>
            </section>
        </main>
        
    </div>


</body>
</html>