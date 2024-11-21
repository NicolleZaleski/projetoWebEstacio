<?php
include "conexaoBanco.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    try {
        $query = $pdo->prepare("DELETE FROM Aulas WHERE id = :id");
        $query->execute(['id' => $id]);
        $message = "Aula excluída com sucesso!";
    } catch (PDOException $e) {
        $error = "Erro ao excluir aula: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aulas Cadastradas</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="listarAulas.css">
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
    </div>
    <div class="area">
        <div class="conteudo">
            <h2 class="titulo-pag">Aulas Cadastradas</h2>
            <?php if (isset($message)): ?>
                <p class="message success"><?php echo $message; ?></p>
            <?php elseif (isset($error)): ?>
                <p class="message error"><?php echo $error; ?></p>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Modalidades</th>
                        <th>Matrícula</th>
                        <th>Aula</th>
                        <th>Professor</th>
                        <th>Dia</th>
                        <th>Período</th>
                        <th>Horário</th>
                        <th>Local</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM Aulas";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['curso']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ensino']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['matricula']) . "</td>";    
                            echo "<td>" . htmlspecialchars($row['aula']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['professor']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['diaSemana']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['periodo']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['horario']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['bloco']) . " - " . htmlspecialchars($row['andar']) . " andar, sala " . htmlspecialchars($row['sala']) . "</td>";
                            echo "<td>
                                <form method='post' action='editarAula.php' style='display: inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <button type='submit' class='btn editar'>Editar</button>
                                </form>
                                <form method='post' style='display: inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <button type='submit' name='delete' class='btn excluir'>Excluir</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Nenhuma aula cadastrada.</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>