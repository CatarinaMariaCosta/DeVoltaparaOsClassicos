
<?php include __DIR__ . '/../database/conexao.php'; ?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>

<body>

    <h1>Histórico dos Clientes/Vendas</h1>

    
    <a href="/deVoltaparaOsClassicos/index.php">Voltar a página inicial</a> /
    <a href="/deVoltaparaOsClassicos/app/clientes.php">Cadastrar outro cliente</a>

    <br><br>

    <?php

    $sql = "SELECT clientes.nome, compras.produto, compras.valor, compras.data_compra
            FROM compras
            INNER JOIN clientes ON compras.cliente_id = clientes.id
            ORDER BY compras.data_compra DESC";

    $stmt = $conexao->query($sql);

    $historico = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <table border="1" cellpadding="10">

        <tr>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Valor</th>
            <th>Data</th>
        </tr>

        <?php foreach ($historico as $item): ?>

            <tr>

                <td>
                    <?php echo htmlspecialchars($item['nome']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($item['produto']); ?>
                </td>

                <td>
                    R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?>
                </td>

                <td>
                    <?php echo date('d/m/Y H:i', strtotime($item['data_compra'])); ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>