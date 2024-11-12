<?php
// Conexão com o Banco
require "conexao.php";


// Banco
mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS DB_CONTATOS');

// Tabelas
mysqli_query($link, 'CREATE TABLE IF NOT EXISTS TB_PESSOA (
    id_pessoa int primary key auto_increment,
    nome varchar(250) not null
)');

mysqli_query($link, 'CREATE TABLE IF NOT EXISTS TB_EMAIL (
    id_email int primary key auto_increment,
    email varchar(50) not null,
    id_pessoa int not null, 
    foreign key (id_pessoa) references TB_PESSOA(id_pessoa)
)');

mysqli_query($link, 'CREATE TABLE IF NOT EXISTS TB_TELEFONE (
    id_telefone int primary key auto_increment,
    telefone varchar(50) not null,
    id_pessoa int not null, 
    foreign key (id_pessoa) references TB_PESSOA(id_pessoa)
)');

// Variável de pesquisa
$searchTerm = isset($_GET['search']) ? $_GET['search'] : ''; // Termo de pesquisa

// Consulta para obter dados das 3 tabelas com filtro de busca, se presente
$query = "
        SELECT 
    p.id_pessoa, 
    p.nome, 
    e.email, 
    t.telefone
FROM 
    TB_PESSOA p
INNER JOIN 
    TB_EMAIL e ON p.id_pessoa = e.id_pessoa
INNER JOIN 
    TB_TELEFONE t ON p.id_pessoa = t.id_pessoa
ORDER BY 
    p.nome;
";
// Executa a consulta
$resultado = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Agenda de Contatos</title>
</head>
<body>
    <header>
        <div class="tittle">
            <h1>Agenda de Contatos</h1>
        </div>
        <div class="btn-adiciona">
            <a href="create.php"><button class="btn">ADICIONAR CONTATO</button></a>
        </div>
    </header>
    <main>
        <section>
            <div class="search-container">
                <label for="search">Buscar Contato</label>
                <form method="GET" action="index.php" class="search-form">
                    <input type="text" name="search" id="search" value="<?= ($searchTerm) ?>" placeholder="Digite o nome para buscar...">
                    <button type="submit" class="btn-buscar">Buscar</button>
                </form>
            </div>
        </section>
        <section>
            <div class="search-result">
                <table>
                    <caption>Resultados da pesquisa</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Exibindo os dados retornados da consulta
                        while ($dados = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $dados['id_pessoa'] . "</td>";
                            echo "<td>" . htmlspecialchars($dados['nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($dados['telefones'] ?? 'Nenhum') . "</td>";
                            echo "<td>" . htmlspecialchars($dados['emails'] ?? 'Nenhum') . "</td>";
                            echo "<td>
                                    <a href='edit.php?id=" . $dados['id_pessoa'] . "'><button class='btn-small'>Editar</button></a>
                                    <a href='delete.php?acao=excluir&id=" . $dados['id_pessoa'] . "'><button class='btn-small'>Excluir</button></a>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
