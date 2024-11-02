<?php
require "conexao.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = mysqli_query($link, "SELECT * FROM TB_INFO WHERE id = $id");
    $dados = mysqli_fetch_assoc($resultado);
}

if ($_POST) {
    $servico = $_POST['servico'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Atualiza o registro no banco de dados
    mysqli_query($link, "UPDATE TB_INFO SET servico='$servico', login='$login', senha='$senha' WHERE id=$id");
    header("Location: index.php"); // Redireciona após a atualização
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Editar Credencial</title>
</head>
<body>
    <form method="POST" action="">
        <div class="container">
            <div class="card">
                <h1>Editar Credencial</h1>
                <div class="label-float">
                    <input type="text" id="nome" placeholder=" " required name="servico" value="<?php echo htmlspecialchars($dados['servico']); ?>"/>
                    <label id="labelNome" for="nome">Nome do Serviço</label>
                </div>
                <div class="label-float">
                    <input type="text" id="usuario" placeholder=" " required name="login" value="<?php echo htmlspecialchars($dados['login']); ?>"/>
                    <label id="labelUsuario" for="usuario">Login</label>
                </div>
                <div class="label-float">
                    <input type="password" id="senha" placeholder=" " required name="senha" value="<?php echo htmlspecialchars($dados['senha']); ?>"/>
                    <label id="labelSenha" for="senha">Senha</label>
                </div>

                <div class="justify-center">
                    <button type="submit" class='cadastrar'>Atualizar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
