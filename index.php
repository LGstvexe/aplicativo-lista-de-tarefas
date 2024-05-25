<?php
require_once("database/conn.php"); // // Requer o arquivo de conexão com o banco de dados

$tasks = []; // Inicializa um array vazio para armazenar as tarefas

// Consulta as tarefas no banco de dados
$sql = $pdo->query("SELECT * FROM task ORDER BY id ASC"); 

// Verifica se a consulta retornou alguma linha
if ($sql->rowCount() > 0){
 $tasks = $sql->fetchAll(PDO::FETCH_ASSOC); // Armazena as tarefas no array
}
?><!DOCTYPE html>
<html lang="pt-br">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Lista de Tarefas</title>
 <!-- CSS do Projeto -->
 <link rel="stylesheet" href="css/style.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Ícone da Página -->
  <link rel="shortcut icon" type="imagex/png" href="assets/icone.ico">
 <!-- Javascript do Projeto -->
 <script src="javascript/script.js" defer></script>
</head>

<body>
 <div class="container">
  <header>
   <h1>📝Lista de Tarefas</h1>
  </header>

  <!-- Formulário para adicionar uma nova tarefa -->
  <form action="actions/create.php" method="POST" id="todo-form">
   <p>Adicionar uma tarefa: </p>
   <div class="control-form">
    <input type="text" name="descricao" id="todo-input" placeholder="Adicione sua tarefa">
    <button type="submit" title="Adicionar uma tarefa">
     <i class="fa-thin fa-plus"></i>
    </button>
   </div>
  </form>

  <!-- Barra de pesquisa -->
  <div id="searchbar">
   <div id="search">
    <h4>Pesquisar: </h4>
    <form action="">
     <input type="text" id="search-input" placeholder="Buscar uma tarefa">
     <button id="erase-button" title="Apagar tudo">
      <i class="fa-solid fa-delete-left"></i>
     </button>
    </form>
   </div>
  </div>

  <!-- Lista de Tarefas -->
  <div id="todo-list">
    <?php foreach($tasks as $task): ?>
    <div class="todo-item <?= $task['completa'] ? 'done' : '' ?>">
        <form action="actions/update.php" method="POST" class="edit-form hide">
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <p>Editar tarefa: </p>
            <div class="control-form">
                <input type="text" name="descricao" class="edit-input" value="<?= $task['descricao'] ?>">
                <button type="submit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </div>
            <button type="button" class="cancel-edit-btn">Cancelar</button>
        </form>
        <!-- Exibição da Tarefa -->
        <div class="todo">
            <h3 class="task-description"><?= $task['descricao'] ?></h3>
            <!-- Botão para marcar tarefa como completa -->
            <button class="finish-todo" data-id="<?= $task['id'] ?>">
             <i class="fa-solid fa-check"></i>
            </button>
            <!-- Botão para editar a tarefa -->
            <button class="edit-todo">
                <i class="fa-solid fa-pen"></i>
            </button>
            <!-- Botão para excluir a tarefa -->
            <button onclick="location.href='actions/delete.php?id=<?= $task['id'] ?>'" class="remove-todo">
                <i class="fa-solid fa-xmark"></i>
           </button>
       </div>
      </div>
     <?php endforeach ?>
   </div>
  </div>
 </div>
</div>

</body>

</html>
