# 🔧 Tecnologias Utilizadas
## HTML5
Todas as telas foram utilizados a semantica em HTML5

## CSS3 
Auxílio do framework BOOTSTRAP para responsividade e componentes

## JavaScript (jQuery)
Para envio de formulários (AJAX)

## PHP 
Para o backend e manipulação dos dados

## MySQL
Como banco de dados

## Fontes 
Google (Poppins) e Material Icons para estilo

# 📄 Estrutura das Telas
## Tela de Cadastro (create.php)
Permite a criação de uma nova conta de usuário.

Funcionalidades:
Formulário com nome, e-mail e senha.

Validação de campos obrigatórios e senha com mínimo de 8 caracteres.

Envio dos dados via AJAX para o backend (functions.php), onde são tratados e salvos no banco de dados.

Mensagens de erro e sucesso com feedback visual.

## Tela de Login (login.php)
Permite que o usuário entre com e-mail e senha previamente cadastrados.

Funcionalidades:
Formulário com campos de e-mail e senha.

Validação em tempo real:

Verifica se os campos não estão vazios.

A senha deve ter no mínimo 8 caracteres.

Autenticação via AJAX com PHP:

Se as credenciais forem válidas, o usuário é redirecionado para o dashboard.php.

Se forem inválidas, uma mensagem de erro é exibida.

Opção de exibir/ocultar senha.

Link para recuperar senha (ainda não implementado completamente).

Integração visual com modal "Saiba Mais" e carrossel ilustrativo.

## Tela de Dashboard (dashboard.php)
Painel principal que exibe os dados do usuário e permite editar as informações.

Funcionalidades:
Exibe nome e profissão cadastrados.

Permite edição do nome e profissão, com envio via AJAX para atualização no banco de dados.

Botão de logout e opção de deletar conta com confirmação.

Exibição de mensagens de sucesso/erro conforme a operação realizada.


# ✅ Requisitos de Validação
Todos os formulários possuem validação client-side (JavaScript) e server-side (PHP).

O campo de senha exige no mínimo 8 caracteres.

Mensagens de erro/sucesso são exibidas dinamicamente sem recarregar a página.

Proteção contra envio de formulários vazios.

# 🚀 Como Executar
Clone ou baixe este repositório.

Configure o servidor local com Apache, PHP e MySQL (XAMPP, WAMP, etc).

Crie o banco de dados com a estrutura necessária (tabela de usuários).

Atualize as credenciais do banco no functions.php, se necessário.

Acesse create.php para cadastrar um novo usuário e inicie o uso do sistema.

# 🧩 Considerações Finais

Por fim, queria agradecer por ter avaliado o trabalho, foram horas de empenho e dedicação para fazer o layout mais proximo do que a Grazielle enviou. Espero te ver em breve, e fazendo parte do time. 

att. Max Carvalho Lobão - Desenvolvedor Full-Stack