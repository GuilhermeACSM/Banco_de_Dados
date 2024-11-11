<?php
// Conexão com o banco
require "conexao.php";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Insere a pessoa
    mysqli_query($link, "INSERT INTO TB_PESSOA (nome) VALUES ('$nome')");
    $id_pessoa = mysqli_insert_id($link);

    // Insere o telefone
    mysqli_query($link, "INSERT INTO TB_TELEFONE (telefone, id_pessoa) VALUES ('$telefone', $id_pessoa)");

    // Insere o email
    mysqli_query($link, "INSERT INTO TB_EMAIL (email, id_pessoa) VALUES ('$email', $id_pessoa)");

    echo "Contato adicionado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Contato</title>
</head>
<body>
    <h1>Adicionar Novo Contato</h1>
    <form method="POST" action="">
        <label>Nome: <input type="text" name="nome" required></label><br>
        <label>Telefone: <input type="text" name="telefone" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
