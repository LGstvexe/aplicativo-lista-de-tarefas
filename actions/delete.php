<?php 

 // Inclui o arquivo de conexão com o Banco de Dados.
 require_once('../database/conn.php');

 // Obtém o ID da tarefa a ser excluída via método GET.
 $id = filter_input(INPUT_GET, 'id');

 // Verifica se o ID da tarefa foi fornecido.
 if ($id) {
  // Remove uma tarefa com o ID fornecido.
  $sql = $pdo->prepare('DELETE FROM task WHERE id = :id');
  $sql->bindValue(':id', $id);
  $sql->execute();

  // Redireciona de volta para a página principal após a exclusão da tarefa.
 header('Location: ../index.php');
  exit;
 } else {
  // Se o ID estiver ausente, redireciona de volta para a página principal.
   header('Location: ../index.php');
 }

?>