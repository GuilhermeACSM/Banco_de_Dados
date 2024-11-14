<?php
// Conexão com o banco
require "conexao.php";

// Variável para controle de sucesso
$sucesso = false;

// Verifica se o formulário foi enviado
if ($_POST) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $telefoneExpandido = explode(',',$telefone);
    $emailExpandido = explode(',',$email);

    // Insere a pessoa
    mysqli_query($link, "INSERT INTO TB_PESSOA (nome) VALUES ('$nome')");

    $id_pessoa = mysqli_insert_id($link);
    
    // Insere o telefone 
    for ($i = 0; $i < count($telefoneExpandido); $i++) {
        mysqli_query($link, "INSERT INTO TB_TELEFONE (telefone, id_pessoa) VALUES ('$telefoneExpandido[$i]', $id_pessoa)");
    }

    // Insere o email
    for ($e = 0; $e < count($emailExpandido); $e++) {
        mysqli_query($link, "INSERT INTO TB_EMAIL (email, id_pessoa) VALUES ('$emailExpandido[$e]', $id_pessoa)");
    }

    // Marca que o contato foi adicionado com sucesso
    $sucesso = true;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Adicionar Contato</title>
</head>
<body>
<header>
    <div class="tittle">
        <h1>Agenda de Contatos</h1>
    </div>
    <div class="btn-adiciona">
        <a href="index.php"><button class="btn">VOLTAR</button></a>
    </div>
</header>
    <form method="POST" action="" class="form-create">
    <h1>Adicionar Novo Contato</h1>
        <label>Nome: <input type="text" name="nome" required></label>
        <label>Telefone (Separados por vírgula):<input type="text" name="telefone" required></label>
        <label>Email (Separados por vírgula):<input type="text" name="email" required></label>

        <?php
        // Exibe a mensagem de sucesso somente quando a variável $sucesso for verdadeira
        if ($sucesso) {
            echo '<p style="color: green; font-weight: bold;">Contato adicionado com sucesso!</p>';
        }
        ?>

        <button type="submit" class="salvar">Adicionar</button>
    </form>
</body>
</html>
