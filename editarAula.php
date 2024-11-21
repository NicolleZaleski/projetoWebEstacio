<?php
include "conexaoBanco.php";
$status = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = $pdo->prepare("SELECT * FROM Aulas WHERE id = :id");
    $query->execute(['id' => $id]);
    $aula = $query->fetch(PDO::FETCH_ASSOC);

    if (!$aula) {
        echo "Aula não encontrada.";
        exit;
    }
} 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    try {
        // Recuperar dados do formulário
        $id = $_POST['id'];
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

    
        if (empty($curso) || empty($aula) || empty($ensino) || empty($professor) || empty($diaSemana) || empty($periodo) || empty($horario) || empty($bloco) || empty($andar) || empty($sala)) {
            $status = "error";
            $errorMessage = "Preencha todos os campos obrigatórios!";
        } else {
            // Consulta de atualização
            $query = $pdo->prepare("UPDATE Aulas 
                                    SET curso = :curso, aula = :aula, ensino = :ensino, professor = :professor, 
                                        diaSemana = :diaSemana, periodo = :periodo, horario = :horario, 
                                        bloco = :bloco, andar = :andar, sala = :sala
                                    WHERE id = :id");
        
            $parameters = [
                'curso' => $curso,
                'aula' => $aula,
                'ensino' => $ensino,
                'professor' => $professor,
                'diaSemana' => $diaSemana,
                'periodo' => $periodo,
                'horario' => $horario,
                'bloco' => $bloco,
                'andar' => $andar,
                'sala' => $sala,
                'id' => $id 
            ];

            if (!$query->execute($parameters)) {
                $status = "error";
                $errorMessage = "Erro ao atualizar: " . implode(", ", $query->errorInfo());
            } else {
                $status = "success";
            }
        }
    } catch (PDOException $e) {
        $status = "error";
        $errorMessage = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Aula</title>
        <link rel="stylesheet" href="./estilo.css">
        <link rel="stylesheet" href="./editar.css">
    </head>
    <body>
        <div class="container">
            <aside class="sidebar">
                <img src="./logoestacio.png" alt="Logo Estácio" class="logo">
                <nav class="menu">
                    <li class="item-menu"><a href="horario.php" class="link-menu">Quadro de Horários</a></li>
                    <li class="item-menu"><a href="cad.php" class="link-menu">Cadastrar Aula</a></li>
                    <li class="item-menu"><a href="listarAulas.php" class="link-menu">Listar e Editar Aulas</a></li>
                </nav>
            </aside>
            <footer><a href="about.html">Sobre Mim</a></footer>
        </div>

        <div class="area">
            <div class="conteudo">
                <h2 class="titulo-pag">Editar Aula</h2>
                <?php if ($status === "success"): ?>
                    <p class="message success">Aula atualizada com sucesso!</p>
                <?php elseif ($status === "error"): ?>
                    <p class="message error">Erro ao atualizar aula: <?php echo $errorMessage; ?></p>
                <?php endif; ?>

                <?php if (isset($aula)): ?>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($aula['id']); ?>">
                        <label for="curso">Curso:</label>
                        <input type="text" id="curso" name="curso" value="<?php echo htmlspecialchars($aula['curso']); ?>" required><br>

                        <label for="ensino">Modalidade de Ensino:</label>
                        <select name="ensino" id="ensino" required>
                            <option value="Presencial" <?php if ($aula['ensino'] === 'Presencial') echo 'selected'; ?>>Presencial</option>
                            <option value="Semipresencial" <?php if ($aula['ensino'] === 'Semipresencial') echo 'selected'; ?>>Semipresencial</option>
                        </select><br>

                        <label for="aula">Nome da Aula:</label>
                        <input type="text" id="aula" name="aula" value="<?php echo htmlspecialchars($aula['aula']); ?>" required><br>

                        <label for="professor">Professor:</label>
                        <input type="text" id="professor" name="professor" value="<?php echo htmlspecialchars($aula['professor']); ?>" required><br>

                        <label for="diaSemana">Dia da Semana:</label>
                        <select name="diaSemana" id="diaSemana" required>
                            <option value="Segunda-Feira" <?php if ($aula['diaSemana'] === 'Segunda-Feira') echo 'selected'; ?>>Segunda-Feira</option>
                            <option value="Terça-Feira" <?php if ($aula['diaSemana'] === 'Terça-Feira') echo 'selected'; ?>>Terça-Feira</option>
                            <option value="Quarta-Feira" <?php if ($aula['diaSemana'] === 'Quarta-Feira') echo 'selected'; ?>>Quarta-Feira</option>
                            <option value="Quinta-Feira" <?php if ($aula['diaSemana'] === 'Quinta-Feira') echo 'selected'; ?>>Quinta-Feira</option>
                            <option value="Sexta-Feira" <?php if ($aula['diaSemana'] === 'Sexta-Feira') echo 'selected'; ?>>Sexta-Feira</option>
                            <option value="Sábado" <?php if ($aula['diaSemana'] === 'Sábado') echo 'selected'; ?>>Sábado</option>
                        </select><br>

                        <label for="periodo">Período:</label>
                        <select name="periodo" id="periodo" required>
                            <option value="Matutino" <?php if ($aula['periodo'] === 'Matutino') echo 'selected'; ?>>Matutino</option>
                            <option value="Vespertino" <?php if ($aula['periodo'] === 'Vespertino') echo 'selected'; ?>>Vespertino</option>
                            <option value="Noturno" <?php if ($aula['periodo'] === 'Noturno') echo 'selected'; ?>>Noturno</option>
                        </select><br>

                        <label for="horario">Horário de Início da Aula:</label>
                        <input type="text" id="horario" name="horario" value="<?php echo htmlspecialchars($aula['horario']); ?>" required><br>

                        <label for="bloco">Bloco:</label>
                        <input type="text" id="bloco" name="bloco" value="<?php echo htmlspecialchars($aula['bloco']); ?>" required><br>

                        <label for="andar">Andar:</label>
                        <input type="text" id="andar" name="andar" value="<?php echo htmlspecialchars($aula['andar']); ?>" required><br>

                        <label for="sala">Sala:</label>
                        <input type="text" id="sala" name="sala" value="<?php echo htmlspecialchars($aula['sala']); ?>" required><br>

                        <button type="submit" name="update" class="btn editar">Salvar Alterações</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>