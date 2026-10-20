<?php include __DIR__ . '/../database/conexao.php'; ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras do cliente</title>
<link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>

<body>

    <h1>Adicionar Compra</h1>
    <a href="/deVoltaparaOsClassicos/index.php">Voltar a página inicial</a> /
    <a href="/deVoltaparaOsClassicos/app/historico.php">Ver Histórico de Compras</a>

    <br><br>

    <?php

    // Busca todos os clientes
    $clientes = $conexao->query(
        "SELECT id, nome FROM clientes"
    )->fetchAll(PDO::FETCH_ASSOC);

    // Processa o envio da compra
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cliente_id = $_POST['cliente_id'];
        $produto = $_POST['produto'];
        $valor = $_POST['valor'];

        $sql = "INSERT INTO compras (cliente_id, produto, valor)
                VALUES (:cliente_id, :produto, :valor)";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([
            'cliente_id' => $cliente_id,
            'produto' => $produto,
            'valor' => $valor
        ]);

        echo "<p style='color: green;'>Compra adicionada com sucesso!</p>";
    }

    ?>

    <form method="POST">

        <h2>Adicionar Compra</h2>

        <label>Selecione o Cliente:</label>
        <br>

        <select name="cliente_id" required>

            <option value="">Escolha um cliente</option>

            <?php foreach ($clientes as $cliente): ?>

                <option value="<?php echo $cliente['id']; ?>">
                    <?php echo $cliente['nome']; ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <label for="produto">Selecione o Produto:</label>
        <br>

        <input
            type="text"
            name="produto"
            id="produto"
            placeholder="Nome do Produto"
            required
        >

        <br><br>

        <label for="valor">Coloque o valor:</label>
        <br>

        <input
            type="number"
            step="0.01"
            name="valor"
            id="valor"
            placeholder="Valor (Ex: 50.00)"
            required
        >

        <br><br>

        <button type="submit">Registrar Compra</button>

    </form>

</body>

</html>