CREATE DATABASE tarefas; -- Criação do Banco de Dados "tarefas"
USE tarefas; -- Seleciona o Banco de Dados "tarefas" para ser utilizado

CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Coluna ID da tarefa, auto incrementada e chave primária
    descricao VARCHAR(255) NOT NULL, -- Coluna descrição da tarefa, que não pode ser nula
    completa TINYINT(1) DEFAULT 0 -- Coluna que indica se a tarefa está completa (0 para Incompleta, 1 para Completa)
);