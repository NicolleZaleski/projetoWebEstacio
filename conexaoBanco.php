<?php
    $host = 'localhost';
    $db = 'sistemaHorarios';
    $user = 'root';
    $password = ''

    $conn = new mysqli($host,$db,$user,$password);

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>