// Seleção dos Elementos

const todoForm = document.getElementById("todo-form"); // Formulário de Adição de Tarefas.
const todoList = document.getElementById("todo-list"); // Lista de Tarefas.
const searchInput = document.getElementById("search-input"); // Campo de Pesquisa.
const eraseBtn = document.getElementById("erase-button"); // Botão para limpar Pesquisa.

// Funções

//Função para filtrar tarefas.
function getSearchedTodos(search) {
  const todos = document.querySelectorAll(".todo"); // Seleciona todas as tarefas.

  todos.forEach((todo) => {
    const todoTitle = todo.querySelector("h3").innerText; // Título da tarefa.

    todo.style.display = "flex"; // Exibe todas as tarefas

    // Faz a verificação se o título da tarefa contém o termo de pesquisa.
    if (!todoTitle.includes(search)) {
      todo.style.display = "none"; // Oculta a tarefa se não corresponder ao termo de pesquisa.
    }
  });
}

// Eventos
document.addEventListener("DOMContentLoaded", () => {
  // Seleção de botões de edição.
  const editButtons = document.querySelectorAll('.edit-todo');
  // Seleção de formulários de edição.
  const editForms = document.querySelectorAll('.edit-form');
  // Seleção de botões de cancelar edição.
  const cancelEditButtons = document.querySelectorAll('.cancel-edit-btn');

  // Adiciona evento de clique para cada botão de edição.
  editButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
      // Oculta todos os formulários de edição.
      editForms.forEach(form => {
        form.classList.add('hide');
      });

      // Exibe o formulário de edição associado ao botão clicado.
      editForms[index].classList.remove('hide');
    });
  });

   // Adiciona evento de clique para cada botão de cancelar edição
  cancelEditButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
      // Oculta o formulário de edição associado ao botão clicado
      editForms[index].classList.add('hide');
    });
  });
});

// Adiciona evento de tecla pressionada no campo de pesquisa
searchInput.addEventListener("keyup", (e) => {
  const search = e.target.value; // Obtém o valor do campo de pesquisa
  getSearchedTodos(search); // Filtra as tarefas de acordo com o termo de pesquisa
});

// Adiciona evento de clique ao botão de limpar pesquisa
eraseBtn.addEventListener("click", (e) => {
  searchInput.value = ""; // Limpa o campo de pesquisa
  searchInput.dispatchEvent(new Event("keyup")); // Dispara o evento de tecla pressionada no campo de pesquisa
  searchInput.focus(); // Coloca o foco de volta no campo de pesquisa
});

// Adiciona evento de clique aos botões de conclusão de tarefas
document.addEventListener("DOMContentLoaded", () => {
  const finishButtons = document.querySelectorAll('.finish-todo'); // Seleciona todos os botões de conclusão de tarefas

  finishButtons.forEach(button => {
    button.addEventListener('click', () => {
      const taskId = button.getAttribute('data-id'); // Obtém o ID da tarefa associada ao botão

      // Envia uma solicitação para marcar a tarefa como concluída
      fetch('actions/complete.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${taskId}` // Envia o ID da tarefa no corpo da solicitação
      })
      .then(response => response.json()) // Converte a resposta para JSON
      .then(data => {
        if (data.status === 'success') { // Se a operação for bem-sucedida
          const task = button.closest('.todo-item'); // Encontra o elemento pai da tarefa
          if (task) {
            task.classList.add('done'); // Adiciona a classe 'done' para marcar a tarefa como concluída
          } else {
            console.error('Task element not found.'); // Exibe um erro se o elemento da tarefa não for encontrado
          }
        } else {
          console.error('Error:', data.message); // Exibe uma mensagem de erro caso ocorra algum problema
        }
      })
      .catch(error => console.error('Error:', error)); // Exibe uma mensagem de erro se a solicitação falhar
    });
  });
});
