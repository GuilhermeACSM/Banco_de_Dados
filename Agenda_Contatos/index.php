<?php
// Conexão com o Banco
require "conexao.php";

// Banco
mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS DB_CONTATOS');

// Tabela
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
    foreign key (id_pessoa) references tb_pessoa(id_pessoa)
)');

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
            <input class="btn" type="button" value="ADICIONAR CONTATO">
        </div>
    </header>
    <main>
        <section>
            <div class="search-container">
                <label for="search">Buscar Contato</label>
                <input type="text" name="search" id="search">
                <input type="button" value="Buscar">
            </div>
        </section>
        <section>
            <div class="search-result">
                <table>
                    <caption>Resultados da pesquisa</caption>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Guilherme</th>
                            <th>13-992027001</th>
                            <th>zguilhermegn@gmail.com</th>
                            <th>
                                <input class="btn-small" type="button" value="Editar">
                                <input class="btn-small" type="button" value="Excluir">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>