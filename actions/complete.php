<?php

 // Inclui o arquivo de conexão com o Banco de Dados.
 require_once('../database/conn.php');

 // Obtém o ID da tarefa a ser marcada como concluida do formulario via método POST
 $id = filter_input(INPUT_POST, 'id');

 // Verifica se o ID da tarefa é valido
 if ($id) {
     // Prepara e executa a consulta SQL para atualizar o status da tarefa para completa.
     $sql = $pdo->prepare("UPDATE task SET completa = 1 WHERE id = :id");
     $sql->bindValue(':id', $id);
     $sql->execute();

     // Retorna um JSON indicando sucesso.
     echo json_encode(['status' => 'success']);
 } else {
    // Se o ID for inválido, retorna um JSON indicando erro com uma mensagem personalizada.
     echo json_encode(['status' => 'error', 'message' => 'ID inválido!']);
 }
?>