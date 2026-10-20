<?php
require_once __DIR__ . "/../includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['id'])) {
    delete($conexao, $_POST['id']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Produtos</title>
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>
 
<body>
    <h1>Deletar Filmes</h1>
    
    <a href="/deVoltaparaOsClassicos/index.php">Voltar a pagina inicial</a> /
    <a href="/deVoltaparaOsClassicos/app/movie.php">Voltar para os Filmes</a><br><br>
    <form action="deleteM.php" method="post">
    <label for="id">ID: </label>
    <input type="number" name="id" id="id" required>
    <input type="submit" value="Apagar">
    </form>
    
    &copy;De volta parea os clássicos🍿📽️
</body>

</html>

