<?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    

    // conexão com o banco
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $bd = 'db_concessionaria1';
    $link = mysqli_connect($host, $user, $pass, $bd);


    if($link) {
        echo'banco conectado';
    };
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title></title>
</head>
<body>

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
                    <button type="submit">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>

    <script src="script/script.js" defer></script>
</body>
</html>