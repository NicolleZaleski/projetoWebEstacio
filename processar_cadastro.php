<?php
    $host = 'localhost';
    $db = 'sistemaHorarios';
    $user = 'root';
    $password = 'dev321'
    $conn = new mysqli($host,$db,$user,$password);

    $curso = $_POST['curso'];
    $nomeAula = $_POST['nomeAula'];
    $ensino = $_POST['ensino'];
    $professor = $_POST['professor'];
    $diaSemana = $_POST['diaSemana'];
    $periodo = $_POST['periodo'];
    $horario = $_POST['horario'];
    $bloco = $_POST['bloco'];
    $andar = $_POST['andar'];
    $sala = $_POST['sala'];
    $sql = "insert into Aulas(curso,nomeAula,ensino,professor,diaSemana,periodo,horario,bloco,andar,sala) values('$curso','$nomeAula','$ensino','$professor','$diaSemana','$periodo','$horario','$bloco','$andar','$sala')";

    if ($conn->query($sql)=== TRUE){
        echo "Aula cadastrada com sucesso.";
    }
    else ($conn->connect_error){
        echo"Erro! Aula não cadastrada.";
    }

    $conn->close();
?>