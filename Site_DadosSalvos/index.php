<?php
    // ----- Somente para mostrar na tela o que está pegando!! ----- //
    /*
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    */


    // ----- Conexão com o banco ----- //
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_senhas';
    $link = mysqli_connect($host, $user, $pass, $db);


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
    };
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Carteira de Login e Senhas</title>
</head>
<body>

    <!-- Foms de Cadastro -->
    <form method="POST" action="index.php">
        <div class="container">
            <div class="card">
                <h1>Cadastrar</h1>
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
                    echo"<tr>";
                        echo"<td></td>";
                        echo"<td></td>";
                        echo"<td></td>";
                        echo"<td></td>";
                        echo"<td>
                                <button id='gerenciarBtn'>Editar</button>
                                <button id='gerenciarBtn'>Excluir</button>
                            </td>";
                    echo"</tr>";
                ?>
            </tbody>
        </table>
    </div>

    <script src="script/script.js" defer></script>
</body>
</html>