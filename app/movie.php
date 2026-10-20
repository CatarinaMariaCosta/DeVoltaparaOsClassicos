<?php include __DIR__ . '/../includes/functions.php';
include __DIR__ . '/../login/verifica_user.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
     <link rel="shortcut icon" href="assets/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>
<body>
    <h1>Catálogo dos clássicos🍿📽️</h1>
    <h4>(Filmes disponiveis pra alugar)</h4>
    
    <a href="/deVoltaparaOsClassicos/index.php">Voltar a página inicial</a> /
    <a href="/deVoltaparaOsClassicos/app/deleteM.php">Deletar Produtos</a> /
    <a href="/deVoltaparaOsClassicos/app/updateM.php">Atualizar Produtos</a>

    
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto'])) {
    $produto = $_POST['produto'];
    $preco = $_POST['preco'];
    $descr = $_POST['descr'];
    $ativo = isset($_POST['ativo']) ? $_POST['ativo'] : 'false';

    $sql = "INSERT INTO movie (produto, preco, descr, ativo) VALUES (:produto, :preco, :descr, :ativo)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute(['produto' => $produto, 'preco' => $preco, 'descr' => $descr, 'ativo' => $ativo]);

    echo "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
} 
?>


<main>
    <section>
        <article>

<form method="POST">
    <h3>Novos Filmes</h3>
    <label for="produto">Nome:</label>
    <input type="text" name="produto" id="produto" placeholder="Nome do produto" required>
    <label for="preco">Preço:</label>
    <input type="number" name="preco" step="0.01" id="preco" placeholder="Preço"><br>
    <label for="descr">Descrição:</label>
    <input type="text" name="descr" id="descr" placeholder="Descrição do produto">
    <label for="ativo">Ativo:</label>
    <input type="radio" name="ativo" value="true">Sim
    <input type="radio" name="ativo" value="false">Não<br>
    <button type="submit">Salvar Produto</button>
</form>

    <h3>Catálogo completo (A - Z)</h3>
    <?php listarFilmes($conexao); ?>

        </article>

    </section>

</main>
</body>
</html>