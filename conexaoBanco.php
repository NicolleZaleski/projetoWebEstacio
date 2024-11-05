<?php
    $host = 'localhost';
    $db = 'sistemaHorarios';
    $user = 'root';
    $password = 'dev321'

    $conn = new mysqli($host,$db,$user,$password);

    if($conn->connect_error) {
        die("Falha na conexão: ".$conn->connect_error);
    }

?>