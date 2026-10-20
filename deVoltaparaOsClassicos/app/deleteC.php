<?php
require_once __DIR__ . "/../includes/functions.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Deletar Produtos</title>
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>
<body>
    <h1>Deletar Produtos</h1>
    
    <a href="/deVoltaparaOsClassicos/index.php">Voltar a pagina inicial</a> /
    <a href="/deVoltaparaOsClassicos/app/colecao.php">Voltar para as Coleções</a><br><br>
    
    <form action="../app/colecao.php" method="post">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id">
        <input type="submit" value="Apagar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        deletar($conexao, $_POST['id']);
    }
    ?>
    &copy;De volta para os clássicos🍿📽️
</body>

</html>