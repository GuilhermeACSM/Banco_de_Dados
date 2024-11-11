<?php
// Conexão com o banco
require "conexao.php";

// Obtém o ID do contato
$id_pessoa = $_GET['id'];

// Verifica se o formulário foi enviado para atualizar o contato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Atualiza o nome da pessoa
    mysqli_query($link, "UPDATE TB_PESSOA SET nome='$nome' WHERE id_pessoa=$id_pessoa");

    // Atualiza o telefone
    mysqli_query($link, "UPDATE TB_TELEFONE SET telefone='$telefone' WHERE id_pessoa=$id_pessoa");

    // Atualiza o email
    mysqli_query($link, "UPDATE TB_EMAIL SET email='$email' WHERE id_pessoa=$id_pessoa");

    echo "Contato atualizado com sucesso!";
}

// Consulta os dados do contato atual
$result = mysqli_query($link, "SELECT p.nome, t.telefone, e.email FROM TB_PESSOA p
JOIN TB_TELEFONE t ON p.id_pessoa = t.id_pessoa
JOIN TB_EMAIL e ON p.id_pessoa = e.id_pessoa
WHERE p.id_pessoa = $id_pessoa");
$contato = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
</head>
<body>
    <h1>Editar Contato</h1>
    <form method="POST" action="">
        <label>Nome: <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" required></label><br>
        <label>Telefone: <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo $contato['email']; ?>" required></label><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
