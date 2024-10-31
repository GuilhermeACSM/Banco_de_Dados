<?php
    // ----- Somente para mostrar na tela o que está pegando!! ----- //
    /*
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    */


    // ----- Conexão com o banco ----- //
    require "conexao.php";


    // ----- Para mostrar que o banco está conectado!! ----- //
    /*  
    if($link) {
        echo'banco conectado';
    };
    */

    // ----- Comando para criar o Banco de Dados ----- //
    mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS DB_SENHAS');

    // ----- Comando para criar a tabela do Banco de Dados ----- //
    mysqli_query($link, 'CREATE TABLE IF NOT EXISTS TB_INFO(
        id int primary key auto_increment not null,
        servico varchar(50) not null,
        login varchar(50) not null,
        senha varchar(70) not null
    )');

    // ----- Declarando os dados que eu vou colocar na Tabela ----- //
    if($_POST) {
        $servico = $_POST['servico'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];

    // ----- Create ----- //
    mysqli_query($link, "INSERT INTO TB_INFO(SERVICO, LOGIN, SENHA) VALUES('$servico', '$login', '$senha')");

    // ----- Serve para ao recarregar a página não repetir os dados salvos anteriormente ----- //
    unset($_POST);
    header("Location: index.php");
    };

    // ----- Read----- //
    $resultado = mysqli_query($link, 'SELECT * FROM TB_INFO');
    // print_r($resultado);

    // ----- Delete ----- //
    if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
        $id = intval($_GET['id']); // Obtem o ID da URL e o converte para inteiro
        mysqli_query($link, "DELETE FROM TB_INFO WHERE id = $id"); // Executa a exclusão
        header('Location: index.php'); // Redireciona após a exclusão
        exit; // Garante que o script não continue após o redirecionamento
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Carteira de Login e Senhas</title>
</head>
<body>

    <!-- Foms de Cadastro -->
    <form method="POST" action="index.php">
        <div class="container">
            <div class="card">
                <h1>Carteira</h1>
                <div class="label-float">
                <input type="text" id="nome" placeholder=" " required  name="servico"/>
                <label id="labelNome" for="nome">Nome do Site</label>
                </div>
                <div class="label-float">
                <input type="text" id="usuario" placeholder=" " required  name="login"/>
                <label id="labelUsuario" for="usuario">Login</label>
                </div>
                <div class="label-float">
                <input type="password" id="senha" placeholder=" " required name="senha"/>
                <label id="labelSenha" for="senha">Senha</label>
            </div>

                <div class="justify-center">
                    <button type="submit" class='cadastrar'>Cadastrar</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Tabela de Credenciais -->
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Serviço/Site</th>
                    <th>Login/E-mail</th>
                    <th>Senha</th>
                    <th>Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($dados = mysqli_fetch_assoc($resultado)){
                        echo"<tr>";
                            echo"<td>".$dados['id']."</td>";
                            echo"<td>".$dados['servico']."</td>";
                            echo"<td>".$dados['login']."</td>";
                            echo"<td>".$dados['senha']."</td>";
                            echo"<td>
                                    <a><button id='gerenciarBtn'>Editar</button></a>
                                    <a href='index.php?acao=excluir&id".$dados['id']."'><button id='gerenciarBtn'>Excluir</button></a>
                                </td>";
                        echo"</tr>";
                    };
                ?>
            </tbody>
        </table>
    </div>

    <script src="script/script.js" defer></script>
</body>
</html>