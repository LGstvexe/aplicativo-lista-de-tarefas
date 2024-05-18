<?php

 // Inclui o arquivo de conexão com o Banco de Dados.
 require_once('../database/conn.php');

 // Obtém a descrição da nova tarefa do formulário via método POST
 $descricao = filter_input(INPUT_POST, 'descricao');

 // Verifica se a descrição da tarefa foi fornecida
 if ($descricao) {
  // Adiciona uma nova tarefa ao banco de dados.
  $sql = $pdo->prepare('INSERT INTO task (descricao) VALUES (:descricao)');
  $sql->bindValue(':descricao',$descricao);
  $sql->execute();

  // Redireciona de volta para a página principal após a adição da nova tarefa.
  header('Location: ../index.php');
  exit;
 } else {
   // Se a descrição estiver ausente, redireciona de volta para a página principal.
   header('Location: ../index.php');
 }
?>