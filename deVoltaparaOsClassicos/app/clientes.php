<?php require_once __DIR__ . '/../database/conexao.php';
include __DIR__ . '/../login/verifica_user.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus clientes</title>
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>
<body>
    <h1>Nossos Clientes</h1>
    
    <a href="/deVoltaparaOsClassicos/index.php">Voltar a pagina inicial</a> /
    <a href="compras.php">Pedidos</a>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO clientes (nome, email) VALUES (:nome, :email)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email]);

    echo "<p style='color: green;'>Cliente cadastrado com sucesso!</p>";
}
?>

<form method="POST">
    <h3>Cadastrar Novo Cliente</h3>
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" placeholder="Nome do Cliente" required>
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="E-mail"><br><br>
    <button type="submit">Salvar Cliente</button>
</form>

</body>
</html>