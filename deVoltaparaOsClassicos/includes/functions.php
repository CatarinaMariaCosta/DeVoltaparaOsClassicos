<?php 
require_once __DIR__ . '/../database/conexao.php';

function movie($conexao, $produto, $preco, $descr, $ativo)
{
    $sql = "INSERT INTO movie (produto, preco, descr, ativo) VALUES (:produto, :preco, :descr, :ativo)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":produto", $produto);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":descr", $descr);
    $stmt->bindParam(":ativo", $ativo);

    $stmt->execute();
    echo "Produto cadastrado com sucesso!";}

function listarFilmes($conexao){
    $sql = "SELECT * FROM movie";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $movie = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($movie as $movies) {
        echo "<hr>";
        echo "ID: {$movies['id']}<br>";
        echo "Nome: {$movies['produto']}<br>";
        echo "Preço: {$movies['preco']}<br>";
        echo "Descriçao: {$movies['descr']}<br>";
        echo "Ativo: {$movies['ativo']}<br>";
    }
}

function delete($conexao, $id)
{
    $sql = "DELETE FROM movie WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo "Registro $id deletado.";
}

function consulte($conexao, $id)
{
    $sql = "SELECT produto, preco, descr, ativo
            FROM movie
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Nome: {$movie['produto']}<br>";
    echo "Preço: {$movie['preco']}<br>";
    echo "Descrição: {$movie['descr']}<br>";
    echo "Ativo: {$movie['ativo']}<br>";
}

function update($conexao, $id, $produto, $preco, $descr, $ativo)
{
    $sql = "UPDATE movie SET produto = :produto , preco = :preco , descr = :descr , ativo = :ativo WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":descr", $descr);
    $stmt->bindParam(":produto", $produto);
    $stmt->bindParam(":ativo", $ativo);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}


//Coleção

function colecao($conexao, $produto, $preco, $descr, $ativo)
{
    $sql = "INSERT INTO colecao (produto, preco, descr, ativo) VALUES (:produto, :preco, :descr, :ativo)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":produto", $produto);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":descr", $descr);
    $stmt->bindParam(":ativo", $ativo);

    $stmt->execute();
    echo "Colecionavel cadastrado com sucesso!";}

function listarColec ($conexao){
    $sql = "SELECT * FROM colecao";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $colecao = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($colecao as $colecao) {
        echo "<hr>";
        echo "ID: {$colecao['id']}<br>";
        echo "Nome: {$colecao['produto']}<br>";
        echo "Preço: {$colecao['preco']}<br>";
        echo "Descriçao: {$colecao['descr']}<br>";
        echo "Ativo: {$colecao['ativo']}<br>";
    }
}

function consultar($conexao, $id)
{
    $sql = "SELECT produto, preco, descr, ativo FROM colecao WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $colecao = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Nome: {$colecao['produto']}<br> Preço: {$colecao['preco']}<br> Descrição: {$colecao['descr']}<br> Ativo: {$colecao['ativo']}<br>";
}

function atualizar($conexao, $id, $produto, $preco, $descr, $ativo)
{
    $sql = "UPDATE colecao SET produto = :produto , preco = :preco , descr = :descr , ativo = :ativo WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":descr", $descr);
    $stmt->bindParam(":produto", $produto);
    $stmt->bindParam(":ativo", $ativo);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function deletar($conexao, $id)
{
    $sql = "DELETE FROM colecao WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo "Registro $id deletado.";
}


//Funções para sistema de login:


function cadastrar_func($conexao, $email, $senha)
{
    $sql = "INSERT INTO funcionario (email, senha) VALUES (:email, :senha)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);

    $stmt->execute();
    echo "Seja Bem Vindo(a) a equipe!";
}

function consulta_func($conexao, $email)
{
    $sql = "SELECT id, email, senha FROM funcionario WHERE email = :email";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $funcionario;
}
?>