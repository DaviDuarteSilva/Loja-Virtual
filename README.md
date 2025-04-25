# Loja-Virtual

O projeto loja-virtual é um aplicativo web que simula uma loja virtual simples, permitindo que os usuários se cadastrem, façam login e visualizem uma vitrine de produtos. A aplicação foi desenvolvida como um exercício para praticar o desenvolvimento web full-stack, com foco em autenticação de usuários, gerenciamento de sessões e exibição de conteúdo dinâmico. A interface é responsiva e o backend interage com um banco de dados MySQL para armazenar informações dos usuários.

Tecnologias Utilizadas Backend: PHP 8.2.12 MySQL (banco de dados relacional)

Frontend: Bootstrap 5.3.2 (via CDN) Font Awesome 6.4.2 (via CDN, para ícones) CSS personalizado (styles.css)

Servidor: Apache (via XAMPP)

Ferramentas: XAMPP (para ambiente local) phpMyAdmin (para gerenciamento de banco de dados)

Autenticação de Usuários: Cadastro de usuários com nome, email e senha (senha criptografada com password_hash). Login com validação de credenciais. Gerenciamento de sessões (usuário logado vê "Bem-vindo, [nome de usuário]" na barra de navegação). Sair com destruição da sessão.

Vitrine de Produtos: Página inicial (index.php) com um carrossel de banners e uma seção estática de produtos (com imagens, especificações e preços).

Interface: Barra de navegação dinâmica que muda com base no status de login. Design responsivo com Bootstrap.
