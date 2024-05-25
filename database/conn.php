<?php

// Configuração da conexão com o Banco de Dados.
$hostname = "localhost"; //Endereço do servidor do Banco de Dados
$database = "tarefas"; // Nome do Banco de Dados
$username = ""; // Seu nome de usuário do Banco de Dados.
$password = ""; // Sua senha do Banco de Dados.

try {
 // Tenta estabelecer a conexão com o banco de dados usando o PDO.
$pdo = new PDO("mysql:host=$hostname;dbname=$database", "$username", "$password");
} catch (PDOException $e) {
 // Se houver algum erro ao conectar, exibe uma mensagem de erro.
 echo "Erro: " . $e->getMessage();
}
?>