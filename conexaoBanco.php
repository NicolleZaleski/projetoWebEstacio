<?php
    // $host = 'localhost';
    // $dbname = 'sistemaHorarios';
    // $user = 'root';
    // $password = 'dev321'

    $servername = "localhost";
    $username = "root";
    $password = "dev321";
    $dbname = "sistemaHorarios";

    $conn = new mysqli($servername,$username,$password,$dbname);

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>