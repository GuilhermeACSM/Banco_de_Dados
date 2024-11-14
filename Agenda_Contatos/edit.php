<?php
// Conexão com o banco
require "conexao.php";

// Obtém o ID do contato
$id_pessoa = $_GET['id'];

// Variável para controle de sucesso
$sucesso = false;


$query = "SELECT 
        p.id_pessoa,
        p.nome,
        e.email,
        t.telefone
    FROM 
        TB_PESSOA p
    LEFT JOIN 
        TB_EMAIL e ON p.id_pessoa = e.id_pessoa
    LEFT JOIN 
        TB_TELEFONE t ON p.id_pessoa = t.id_pessoa
";
$resultado = mysqli_query($link, $query);
$contato = mysqli_fetch_assoc($resultado);

// Verifica se encontrou o contato
if (!$contato) {
    die("Contato não encontrado.");
}

// Processa o formulário
if ($_POST) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Atualiza o nome da pessoa
    mysqli_query($link, "UPDATE TB_PESSOA SET nome='$nome' WHERE id_pessoa=$id_pessoa");

    // Limpa e insere os telefones atualizados
    mysqli_query($link, "DELETE FROM TB_TELEFONE WHERE id_pessoa = $id_pessoa");
    $telefoneExpandido = explode(',', $telefone);
    foreach ($telefoneExpandido as $tel) {
        mysqli_query($link, "INSERT INTO TB_TELEFONE (telefone, id_pessoa) VALUES ('$tel', $id_pessoa)");
    }

    // Limpa e insere os e-mails atualizados
    mysqli_query($link, "DELETE FROM TB_EMAIL WHERE id_pessoa = $id_pessoa");
    $emailExpandido = explode(',', $email);
    foreach ($emailExpandido as $em) {
        mysqli_query($link, "INSERT INTO TB_EMAIL (email, id_pessoa) VALUES ('$em', $id_pessoa)");
    }

    // Marca que o contato foi editado com sucesso
    $sucesso = true;
}
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
        
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo($contato['nome']); ?>" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo($contato['telefone']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo($contato['email']); ?>" required>
        <?php
        // Exibe a mensagem de sucesso somente quando a variável $sucesso for verdadeira
        if ($sucesso) {
            echo '<p style="color: green; font-weight: bold;">Contato editado com sucesso!</p>';
        }
        ?>

        <button type="submit" class="salvar">Salvar</button>
    </form>
</body>
</html>
