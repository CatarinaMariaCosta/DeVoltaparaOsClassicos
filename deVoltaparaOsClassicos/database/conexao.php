<?php
$host = "192.168.10.13";
$dbname = "locadora";
$user = "classico";
$password = "filmes";

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname", $user, $password
    );
} catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
}
?>