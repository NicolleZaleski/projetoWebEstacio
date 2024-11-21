<?php
    $servername = "localhost";
    $username = "root";
    $password = "dev321";
    $dbname = "sistemaHorarios";

    $conn = new mysqli($servername,$username,$password,$dbname);
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>