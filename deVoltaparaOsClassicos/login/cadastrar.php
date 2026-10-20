<?php 
include __DIR__ . '/../includes/functions.php';

;?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Cadastro Funcionário</title>
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>
<body>
    <main>
        <h1>Cadastre-se como Funcionário </h1>
        <a href="/deVoltaparaOsClassicos/index.php">Voltar a página inicial</a><br>

        <h2>Coloque suas informações abaixo:</h2>
        <p>Seja um colaborador da nossa equipe, saiba que apartir do momento que você se juntar a nós, a sua visão sobre filmes mudará!!</p>
        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" required><br><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required><br><br>
            <input type="submit" value="Cadastrar">
        </form>
        <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            cadastrar_func($conexao, $_POST['email'], $_POST['senha']);
        }
        ?>
    </main>
</body>
</html>