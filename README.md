# SGU
# Sistema de Gerenciamento de Usuários

Este é um sistema de gerenciamento de usuários desenvolvido em **PHP** com integração ao **MySQL**. Ele permite realizar operações básicas de **CRUD** (Criar, Ler, Atualizar, Deletar) de usuários.

## 🚀 Funcionalidades

- Cadastro de novos usuários com validação de formulário.
- Exibição de todos os usuários cadastrados em uma tabela.
- Edição de informações de usuários.
- Exclusão de usuários.
- Validação de campos obrigatórios:
  - **Nome**
  - **E-mail (único)**
  - **Senha (mínimo de 6 caracteres)**

## 🛠️ Tecnologias Utilizadas

- **PHP**: Backend do sistema.
- **MySQL**: Banco de dados relacional.
- **HTML/CSS/JAVASCRIPT**: Interface do sistema.

## 📂 Estrutura do Projeto

SGU/
├── index.php # Página inicial com lista de usuários.
├── cadastrar_usuario.php # Página para ccadastro de usuarios.
├── editar_usuario.php # Página para editar informações do usuário.
├── excluir_usuario.php # Lógica para excluir um usuário.
├── db.php # Arquivo para conexão com o banco de dados.
└── db.sql # Script para criar o banco de dados.


## 📝 Como Utilizar

1. Clone o repositório:
   ```bash
   git clone https://github.com/avianarocket/SGU.git

2. Configure o banco de dados:
   Crie um banco de dados MySQL usando o arquivo bd.sql.

3. Ajuste as configurações de conexão no arquivo bd.php:
   $host = 'Endereço do servidos do banco de dados';
   $user = 'Usuário do Banco de dados';
   $password = 'Senha do banco de dados';
   $dbname = 'Nome do banco de dados';

4. Abra o sistema em um servidor local, como XAMPP ou Laragon.

5. Acesse o sistema:
   http://localhost/sgu/index.php


## 🤝 Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.


## 📜 Licença
Este projeto está sob a licença MIT. Você é livre para usá-lo, modificá-lo e distribuí-lo.
