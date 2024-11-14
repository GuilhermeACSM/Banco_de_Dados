<?php
require "conexao.php";

$id_pessoa = $_GET['id'];
$sucesso = false;

$query = "
    SELECT 
        p.id_pessoa, p.nome, 
    GROUP_CONCAT(DISTINCT e.email SEPARATOR ', ') as emails,
    GROUP_CONCAT(DISTINCT t.telefone SEPARATOR ', ') as telefones
    FROM 
        TB_PESSOA p
    LEFT JOIN 
        TB_EMAIL e ON p.id_pessoa = e.id_pessoa
    LEFT JOIN 
        TB_TELEFONE t ON p.id_pessoa = t.id_pessoa
    WHERE 
        p.id_pessoa = $id_pessoa
    GROUP BY 
        p.id_pessoa
";

$resultado = mysqli_query($link, $query);
$contato = mysqli_fetch_assoc($resultado);

if (!$contato) {
    die("Contato não encontrado.");
}

if ($_POST) {
    $nome = $_POST['nome'];
    $telefones = $_POST['telefone'];
    $emails = $_POST['email'];

    mysqli_query($link, "UPDATE TB_PESSOA SET nome='$nome' WHERE id_pessoa=$id_pessoa");

    // Atualiza os telefones
    mysqli_query($link, "DELETE FROM TB_TELEFONE WHERE id_pessoa = $id_pessoa");
    $telefoneExpandido = explode(',', $telefones);
    foreach ($telefoneExpandido as $tel) {
        mysqli_query($link, "INSERT INTO TB_TELEFONE (TELEFONE, id_pessoa) VALUES ('$tel', $id_pessoa)");
    }

    // Atualiza os e-mails
    mysqli_query($link, "DELETE FROM TB_EMAIL WHERE id_pessoa = $id_pessoa");
    $emailExpandido = explode(',', $emails);
    foreach ($emailExpandido as $em) {
        mysqli_query($link, "INSERT INTO TB_EMAIL (EMAIL, id_pessoa) VALUES ('$em', $id_pessoa)");
    }

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
            <input type="text" name="telefone" value="<?php echo($contato['telefones']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo($contato['emails']); ?>" required>
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