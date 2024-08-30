# Projeto de Listagem de Clientes - Acessórias

### 📝 Descrição: 
O projeto tem como objetivo a criação de uma aplicação web simples utilizando PHP puro, HTML e Bootstrap, com integração ao banco de dados MySQL. Esta aplicação será responsável por listar registros de uma tabela de clientes com paginação customizada, implementando boas práticas de desenvolvimento e seguindo um layout básico.

### 📚 Principais Funcionalidades:
*    Criação e Estruturação da Tabela clients:
     - Implementação de uma tabela MySQL chamada clients com os campos pedidos no formulário do teste.
*    População Automática da Tabela com Dados Fictícios:
     - Uso de scripts PHP para gerar e inserir automaticamente pelo menos 120 registros fictícios na tabela clients.
     - Geração de dados realistas para nome, telefone e e-mail dos clientes utilizando o pacote Faker ou similar.
*    Listagem de Clientes com Paginação Dinâmica:
     - Exibição dos registros da tabela clients em uma interface web.
     - Implementação de paginação para exibir 10 registros por página.
     - Link para a primeira página, se o usuário não estiver nela.
     - Link para a última página, precedido por "…", se o usuário não estiver próximo dela.
     - Destaque da página atual, que não é clicável.
     - Exibição de links para até 4 páginas ao redor da página atual (2 anteriores e 2 seguintes), sempre que possível.
*    Navegação Intuitiva Entre as Páginas:
     - A navegação entre páginas é facilitada, com links claros e fáceis de usar.
     - As páginas disponíveis são sempre limitadas para manter a interface limpa e evitar sobrecarregar o usuário.
*    Interface Estilizada com Bootstrap: 
     - Uso do framework Bootstrap para estilizar a tabela de clientes e os controles de paginação, garantindo uma aparência simples e responsiva.
     - A interface é simples, mas funcional, proporcionando uma boa experiência de usuário tanto em desktops quanto em dispositivos móveis.
*    Uso de Boas Práticas de Programação:
     - Separação da lógica de negócios e da apresentação (HTML/CSS).
     - Uso de PDO com prepared statements para garantir a segurança contra SQL injection.
     - Modularização do código em funções e classes, facilitando a manutenção e a escalabilidade do projeto.

### 📜 Requisitos:
*    PHP 7.4.27: Certifique-se que tenha o PHP instaldo em sua máquina.
*    Servido de BD: Certifique-se que tenha um servidor de Banco de Dados instalado em sua máquina (Ex.: XAMP).

### ⚙ Configurando o Projeto:

*    Criar um banco MySql em sua máquina local.
*    Clonar o Projeto: <kbd>git clone https://github.com/vitorguarilhadev/teste_acessorias</kbd>   
*    Cofigure as variáveis de ambiente no arquivo .env (Usar o .env example como base). 

### ⌨️ Rodando o Projeto:

*    Pelo Terminal:
     - Instale as dependências do composer: <kbd>composer install</kbd>
     - Crie a tabela e gere os primeiros 120 registros: <kbd>php scripts/setup_database.php</kbd>
     - Gere novos 120 registros, se necessário: <kbd>php scripts/generate_fake_data</kbd>
     - Inicie o projeto: <kbd>php -S localhost:8000 -t public</kbd>

### 🔧 Tecnologias utilizadas: 
*   PHP 7.4.27
*   Bootstrap 5.3.3
*   MySql

### 🎯 Status do projeto:
Concluído.

### 🐛 Issues:
* Email: vitorguarilha@poli.ufrj.br
