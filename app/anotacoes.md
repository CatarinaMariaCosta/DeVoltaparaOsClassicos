<!-- <br><img src="https://m.media-amazon.com/images/I/618MiPXT5fL._AC_UF894,1000_QL80_.jpg" alt="A capa do filmMiniatura do carro do filme De volta para o futuro" width="400" height="300"><br>
                
    <h3>DMC-12 DeLorean - De volta para o futuro (1985)</h3>
    <h5>R$299,99</h5>

    <p> Marty Macfly (Michael J. Fox) aciona acidentalmente uma máquina do tempo construída pelo Doutor Emmett Brown (Christopher Lloyd) em um Delorean, retornando aos anos 50. Lá conhece sua mãe, antes ainda do casamento com seu pai, que fica apaixonada por ele. Tal paixão põe em risco sua própria existência, pois alteraria todo o futuro, forçando-o a servir de cupido entre seus pais.
        </p><br>


    <img src="https://acdn-us.mitiendanube.com/stores/004/548/928/products/image-uk1g-4-b514166ff9f23ea2e717610842606697-1024-1024.webp" alt="A capa do filme O clube dos cinco" width="400" height="400"><br>

    <h3>Luminaria do coração do Homem de ferro (2008)</h3>
    <h5>R$799,99</h5>

    <p> Em virtude de terem cometido pequenos delitos, cinco adolescentes são confinados no colégio em um sábado, com a tarefa de escrever uma redação de mil palavras sobre o que pensam de si mesmos. Apesar de serem pessoas completamente diferentes, enquanto o dia transcorre eles passam a aceitar uns aos outros, fazem várias confissões e tornam-se amigos.
        </p><br> --

            <br><img src="https://mistv.com.br/wp-content/uploads/2025/10/hq720-4.jpg" alt="A capa do filme De volta para o futuro" width="400" height="200"><br>
                
   

    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyDVM-3bgfHqq6bzSh3WHXa_m_SW-jeM2ktsApZbBKVg&s=10" alt="A capa do filme O clube dos cinco" width="400" height="200"><br>

    <h3>Clube dos Cinco (1985)
                ⭐⭐⭐⭐⭐</h3>

    <p> Em virtude de terem cometido pequenos delitos, cinco adolescentes são confinados no colégio em um sábado, com a tarefa de escrever uma redação de mil palavras sobre o que pensam de si mesmos. Apesar de serem pessoas completamente diferentes, enquanto o dia transcorre eles passam a aceitar uns aos outros, fazem várias confissões e tornam-se amigos.











    <?php include '../database/conexao.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras do cliente</title>
    
    <form method="POST">
    <h1>Adicionar Compra</h1>
    <a href="../index.php">Voltar a pagina inicial</a>
    <a href="historico.php">Ver Histórico de Compras</a><br><br>


    <label>Selecione o Cliente:</label><br>
    <select name="cliente_id" required>
        <option value="">   Escolha um cliente   </option><
        <?php foreach ($clientes as $cliente): ?>
        <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome']; ?></option>
        <?php endforeach; //serve para encerrar um loop (repetição) que foi aberto no PHP usando a sintaxe alternativa.Ele é muito utilizado quando o programador precisa misturar código PHP com código HTML para exibir listas (como produtos de uma loja, clientes cadastrados ou posts de um blog).?>
    </select><br><br>
    <label for="produto">Selecione o Produto</label><br>
    <input type="text" name="produto" placeholder="Nome do Produto" required><br><br>
    <label for="valor">Coloque o valor</label><br>
    <input type="number" step="0.01" name="valor" placeholder="Valor (Ex: 50.00)" required><br><br>
    
    <button type="submit">Registrar Compra</button>
</form>
</head>
<body>
<?php
// Processa o envio da compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO compras (cliente_id, produto, valor) VALUES (:cliente_id, :produto, :valor)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute(['cliente_id' => $cliente_id, 'produto' => $produto, 'valor' => $valor]);

    echo "<p style='color: green;'>Compra adicionada com sucesso!</p>";
}

// Busca todos os clientes para listar no formulário
$clientes = $conexao->query("SELECT id, nome FROM clientes")->fetchAll(PDO::FETCH_ASSOC) ?: [];
?>
</body>
</html>



<?php include '../database/conexao.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico</title>
    <h1>Historico dos Clientes/Vendas</h1>
    <a href="../index.php">Voltar a pagina inicial</a>
    <a href="clientes.php">Cadastrar outro cliente</a>
    
<br><br>
<table border="1" cellpadding="10">
    <tr>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Valor</th>
        <th>Data</th>
    </tr>
</table>
<br>

</head>
<body>
  <?php
$sql = "SELECT clientes.nome, compras.produto, compras.valor, compras.data_compra 
        FROM compras 
        INNER JOIN clientes ON compras.cliente_id = clientes.id 
        ORDER BY compras.data_compra DESC";

$stmt = $conexao->query($sql);
$historico = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($historico as $item): ?>
    <tr>
        <td><?php echo htmlspecialchars($item['nome']); ?></td>
        <td><?php echo htmlspecialchars($item['produto']); ?></td>
        <td>R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></td>
        <td><?php echo date('d/m/Y H:i', strtotime($item['data_compra'])); ?></td>
    </tr>
    <?php endforeach; ?>

    &copy;De volta para os clássicos
</body>
</html>
