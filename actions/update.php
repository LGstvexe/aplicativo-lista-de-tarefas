<?php

 // Inclui o arquivo de conexão com o Banco de Dados.
 require_once('../database/conn.php');

 // Obtém os dados enviados via método POST.
 $descricao = filter_input(INPUT_POST, 'descricao');
 $id = filter_input(INPUT_POST, 'id');

 //Verifica se a descrição e o ID da tarefa foram fornecidos.
 if ($descricao && $id) {
  // Responsável pela edição da tarefa.
  $sql = $pdo->prepare('UPDATE task SET descricao = :descricao WHERE id = :id');
  $sql->bindValue(':descricao', $descricao);
  $sql->bindValue(':id', $id);
  $sql->execute();

  // Redireciona de volta para a página principal após a edição da tarefa, retornando a nova descrição.
  header('Location: ../index.php');
  exit;
 } else {
  // Se a descrição ou o ID estiverem ausentes, redireciona de volta para a página principal.
   header('Location: ../index.php');
 }
?>