<?php
// Conexão com o banco
require "conexao.php";

// Obtém o ID do contato
$id_pessoa = $_GET['id'];

// Variável para controle de sucesso
$sucesso = false;

// Verifica se o formulário foi enviado para atualizar o contato
if ($_POST) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Atualiza o nome da pessoa
    mysqli_query($link, "UPDATE TB_PESSOA SET nome='$nome' WHERE id_pessoa=$id_pessoa");

    // Atualiza o telefone
    mysqli_query($link, "UPDATE TB_TELEFONE SET telefone='$telefone' WHERE id_pessoa=$id_pessoa");

    // Atualiza o email
    mysqli_query($link, "UPDATE TB_EMAIL SET email='$email' WHERE id_pessoa=$id_pessoa");

    // Marca que o contato foi adicionado com sucesso
    $sucesso = true;
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
    <link rel="stylesheet" href="style/style.css">
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
    <form method="POST" action="" class="form-edit">
        <h1>Editar Contato</h1>
        <label>Nome: <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" required></label>
        <label>Telefone: <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>" required></label>
        <label>Email: <input type="email" name="email" value="<?php echo $contato['email']; ?>" required></label>

        <?php
        // Exibe a mensagem de sucesso somente quando a variável $sucesso for verdadeira
        if ($sucesso) {
            echo '<p style="color: green; font-weight: bold;">Contato editado com sucesso!</p>';
        }
        ?>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
