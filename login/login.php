<?php require_once __DIR__ . '/../includes/functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="/deVoltaparaOsClassicos/style/style.css">

</head>
<body>
    <main>
        
        <h1>Faça o seu login de funcionário</h1>
        <a href="/deVoltaparaOsClassicos/index.php">Voltar a página inicial</a><br>
        
        <p>Vamos começar essa aventura de volta ao passado onde os melhores clássicos estavam no auge??</p>
        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" required><br><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required><br><br>
            <input type="submit" value="Entrar"><br><br>

        <a href="../login/cadastrar.php">Não é nosso funcionário ainda?? Cadastra-se por aqui</a>
        </form>
        <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $usuario = consulta_func($conexao, $_POST['email']);
            if($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']){
                $_SESSION['id'] = $usuario['id'];
                echo "Login OK, Redirecionando para página inicial";
                sleep(3);
                header("Location: ../index.php");
                exit();
            } else {
                echo "Usuário ou senha inválidos";
            }
        }
        ?>
    </main>
</body>
</html>