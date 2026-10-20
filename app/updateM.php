<?php include __DIR__ .'/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Atualizar Filmes</title> 
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>

<body>
    
        <h1>Atualizar Filmes</h1>
       
        <a href="/deVoltaparaOsClassicos/index.php">Voltar a pagina inicial</a> /
        <a href="/deVoltaparaOsClassicos/app/movie.php">Voltar para os Filmes</a><br><br>

    <form action="" method="POST">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id"><br>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"><br>
        <label for="preco">Preço: </label>
        <input type="number" name="preco" id="turma"><br>
        <label for="descr">Descrição: </label>
        <input type="text" name="descr" id="descr"><br>
        <label for="ativo">Ativo: </label>
        <input type="radio" name="ativo" value="true">Sim
        <input type="radio" name="ativo" value="false">Não<br>
        <input type="submit" value="Atualizar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        update($conexao, $_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['descr'], $_POST['ativo']);
    }
    ?>
    &copy;De volta para os clássicos🍿📽️
</body>

</html>