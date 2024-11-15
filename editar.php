<?php
include 'conexaoBanco.php';

$conn = new mysqli('localhost','root','sistemaHorarios','');

if($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id = $_GET['matricula'] ?? null;

if (!$id) {
    die("Matrícula da aula não foi especificada.");
}

$sql = "SELECT * FROM Aulas WHERE matricula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$matricula);
$stmt->execute();
$result = $stmt->get_result();
$aula = $result->fetch_assoc();

if(!$aula) {
    die("Aula não encontrada.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $curso = $_POST['curso'];
    $nomeAula = $_POST['aula'];
    $ensino = $_POST['ensino'];
    $professor = $_POST['professor'];
    $diaSemana = $_POST['diaSemana'];
    $periodo = $_POST['periodo'];
    $horario = $_POST['horario'];
    $bloco = $_POST['bloco'];
    $andar = $_POST['andar'];
    $sala = $_POST['sala'];

    $sql = "UPDATE  Aulas SET curso = ?, aula= ?, ensino = ?, professor = ?, diaSemana = ?, periodo = ?, horario = ?, bloco = ?, andar = ?, sala = ? WHERE matricula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss",$curso,$aula,$ensino,$professor,$diaSemana,$periodo,$horario,$bloco,$andar,$sala,$matricula);


    if ($stmt->execute()) {
        echo "Aula atualizada com sucesso!";
        header("Location: listarAulas.php");
        exit();
    }
    else{
        echo "Erro ao atualizar a aula: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aula Estácio</title>
</head>
<body>
    <h2>Editar Aula</h2>

    <form action="" method="post">
    Nome do Curso: <input type="text" name="curso" value="<?php echo htmlspecialchars($aula['curso']); ?>"><br>
    Nome da Aula: <input type="text" name="aula" value="<?php echo htmlspecialchars($aula['aula']); ?>"><br>
    Modalidade: 
    <select name="ensino">
        <option value="Presencial" <?php if($aula['ensino'] == 'Presencial') echo 'selected'; ?>>Presencial</option>
        <option value="Semipresencial" <?php if($aula['ensino'] == 'Semipresencial') echo 'selected'; ?>>Semipresencial</option>
    </select><br>
    Nome do Professor: <input type="text" name="professor" value="<?php echo htmlspecialchars($aula['professor']); ?>"><br>
    Dia da Semana: <input type="text" name="diaSemana" value="<?php echo htmlspecialchars($aula['diaSemana']); ?>"><br>
    Período do Dia: <input type="text" name="periodo" value="<?php echo htmlspecialchars($aula['periodo']); ?>"><br>
    Horário de Início: <input type="time" name="horario" value="<?php echo htmlspecialchars($aula['horario']); ?>"><br>
    Bloco: <input type="text" name="bloco" value="<?php echo htmlspecialchars($aula['bloco']); ?>"><br>
    Andar: <input type="text" name="andar" value="<?php echo htmlspecialchars($aula['andar']); ?>"><br>
    Sala: <input type="text" name="sala" value="<?php echo htmlspecialchars($aula['sala']); ?>"><br>
    <button type="submit">Atualizar Aula</button>
    </form>
    
</body>
</html>

<?php
$conn->close();
?>