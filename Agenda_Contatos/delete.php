<?php
// Conexão com o banco
require "conexao.php";

// Obtém o ID do contato
$id_pessoa = $_GET['id'];

// Exclui o contato do banco de dados
mysqli_query($link, "DELETE FROM TB_PESSOA WHERE id_pessoa=$id_pessoa");

echo "Contato deletado com sucesso!";
?>
