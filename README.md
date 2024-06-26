# Projeto de Lista de Tarefas

Projeto simples de uma Lista de Tarefas utilizando: HTML, CSS, Javascript, MySQL e PHP.

## Pré-Requisitos

- PHP 7.x ou Superior
- MySQL

## Configuração do Ambiente

1. **Clone o repositório**

```
$git clone https://github.com/LGstvexe/aplicativo-lista-de-tarefas
```

2. **Navegue até o diretorio**

```
$cd seu-repositorio
```

3. **Utilize o terminal e importe a estrutura do banco de dados a partir do arquivo 'sql/database.sql':**

\*_OBS: Substitua 'username' pelo seu nome de usuário do MySQL. Você também irá percisar fornecer a senha do usuário MySQL_

```
mysql -u username -p < sql/database.sql
```

4. **Configure a conexão com o banco de dados no arquivo 'database/conn.php'**:

\*_OBS: Insira o nome de usuário ($username) e senha ($password) do MySQL._

```
$hostname = "localhost";
$database = "tarefas";
$username = ""; // Seu usuário
$password = ""; // Sua senha
```

## Execução do Projeto

1. No terminal, dentro do diretório do projeto, execute o servidor embutido do PHP:

```
php -S localhost:8000
```

2. Em seguida, abra o navegador e acesse o projeto pelo link abaixo:

```
http://localhost:8000
```

## Funcionalidades

- Criação/Adição de Tarefas
- Edição de tarefas
- Marcação tarefas como completas
- Exclusão de tarefas
- Pesquisar tarefas pelo nome

## Possíveis Erros

1. É possível que o comando `mysql -u username -p < sql/database.sql` não seja reconhecido como um comando no terminal. Caso ocorra, verifique se o MySQL está no "Path" (Nas variáveis de ambiente do sistema). É possível que o mesmo erro ocorra com o PHP.
