# Projeto Login 3D Teletubbies

Projeto de login simples com visual tematico inspirado em Teletubbies, desenvolvido para integrar:

- HTML e CSS no front-end
- PHP no back-end
- MySQL no banco de dados

## O que o sistema faz

O usuario informa email e senha em um formulario.
O PHP recebe esses dados, consulta o banco MySQL e retorna:

- sucesso, quando o usuario existe
- erro, quando o email ou a senha nao conferem

## Estrutura do projeto

- `login.html`: tela principal de login
- `login.php`: validacao do formulario e consulta no banco
- `style.css`: identidade visual do projeto
- `database.sql`: criacao do banco, tabela e usuario de teste
- `assets/teletubbies-bg.jpeg`: imagem de fundo do projeto

## Como executar no XAMPP

1. Copie a pasta `projeto_login` para `C:\xampp\htdocs\projeto_login`
2. Inicie `Apache` e `MySQL` no XAMPP Control Panel
3. Abra `http://localhost/phpmyadmin`
4. Importe o arquivo `database.sql`
5. Acesse `http://localhost/projeto_login/login.html`

## Credenciais de teste

- Email: `teste@email.com`
- Senha: `123`

## Autoria

Feito por Enzo Thaylor, Evelyn Andrade, Thayana Oliveira e Gabriela Lima.
