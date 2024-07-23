# Ropelato Login System
### Sistema de Login em PHP

O Ropelato Login System é um sistema de login simples desenvolvido em PHP com suporte para troca de temas (claro e escuro). Este projeto inclui funcionalidades de registro de usuários, login, recuperação de senha e um painel de controle fictício.

Tecnologias Utilizadas:

  - PHP: Linguagem de programação utilizada para a lógica do servidor.
  - HTML/CSS: Linguagens de marcação e estilização utilizadas para a interface do usuário.
  - JavaScript: Linguagem de programação utilizada para a troca de temas.
  - MySQL: Sistema de gerenciamento de banco de dados utilizado para armazenar as informações dos usuários.
  - XAMPP: Pacote de software livre que inclui o Apache (servidor web) e o MySQL.

Funcionalidades:

  - Registro de Usuário: Permite que novos usuários se registrem no sistema.
  - Login: Permite que usuários existentes façam login no sistema.
  - Recuperação de Senha: Permite que usuários recuperem suas senhas caso as esqueçam.
  - Painel de Controle: Exibe um painel fictício após o login bem-sucedido.
  - Troca de Temas: Permite alternar entre os modos claro e escuro.

Requisitos:

  - XAMPP: Certifique-se de que o XAMPP está instalado e executando o Apache e o MySQL.
  - MySQL: Banco de dados MySQL para armazenar informações de usuários.

## Configuração -

### Banco de Dados

Execute o seguinte comando SQL no MySQL para criar a tabela users:

```
CREATE DATABASE ropelato;

USE ropelato;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

Clonagem do Repositório

Clone o repositório para o diretório htdocs do XAMPP:

```
cd c:/caminho-para-seu-xampp/htdocs
git clone https://github.com/rRopelato/ropelatosystem.git
```

Executando o Projeto

    Abra o navegador e acesse o projeto: http://localhost:sua-porta/ropelatosystem
    Registro: Crie uma nova conta utilizando o formulário de registro.
    Login: Faça login utilizando as credenciais recém-criadas.
    Painel de Controle: Você será redirecionado para um painel fictício após o login bem-sucedido.
    Recuperação de Senha: Utilize a funcionalidade de recuperação de senha em caso de esquecimento.

Contato

Se você tiver alguma dúvida ou sugestão, sinta-se à vontade para entrar em contato:

| Plataforma | Contato |
| ------ | ------ |
| Discord USER | ropelato  |
| Discord ID| 220701036929613825 |
| E-mail | ropelato.dev@outlook.com |
   

Feito com ❤️ por Renan Ropelato.
