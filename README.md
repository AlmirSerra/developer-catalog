# Catálogo de Desenvolvedores

Este projeto é um catálogo de desenvolvedores, onde é possível listar, cadastrar, editar e excluir desenvolvedores.

## Tecnologias Utilizadas
* Laravel 8
* Vue.js 2
* Bootstrap 4

## Requisitos
* PHP 7.4 ou superior
* Composer
* Node.js 12 ou superior
* NPM


## Instalação

Clone o repositório:
```
git clone https://github.com/AlmirSerra/developer-catalog.git
```

## Instale as dependências do Laravel:
```
cd developer-catalog
composer install
```

## Crie um arquivo .env a partir do .env.example:
```
cp .env.example .env
```

Configure o banco de dados no arquivo .env.

## Gere a chave de aplicação:
```
php artisan key:generate
```

## Rode as migrations:
```
php artisan migrate
```

## Inicie o servidor do Laravel:
```
php artisan serve
```

## Instale as dependências do Vue:
```
npm install
```

## Inicie o servidor do Vue:
```
npm run dev
```
#### Acesse http://localhost:8000 em seu navegador.
### Uso
### Listagem de Desenvolvedores

Ao acessar a página inicial da aplicação, você verá uma lista de desenvolvedores cadastrados. Nessa lista, é possível visualizar os dados de cada desenvolvedor e clicar em um botão para editar ou excluir o desenvolvedor.

### Cadastro de Desenvolvedores
Para cadastrar um novo desenvolvedor, clique no botão "Novo Desenvolvedor" na página inicial da aplicação. Preencha os campos solicitados e clique em "Salvar" para cadastrar o desenvolvedor.

### Edição de Desenvolvedores
Para editar um desenvolvedor, clique no botão "Editar" na lista de desenvolvedores. Preencha os campos desejados e clique em "Salvar" para atualizar os dados do desenvolvedor.

### Exclusão de Desenvolvedores
Para excluir um desenvolvedor, clique no botão "Excluir" na lista de desenvolvedores. Confirme a exclusão e o desenvolvedor será removido da lista.

### Listagem de Níveis
Ao clicar na opção "Níveis" no menu principal da aplicação, você verá uma lista de níveis cadastrados. Nessa lista, é possível visualizar os dados de cada nível e clicar em um botão para editar ou excluir o nível.

### Cadastro de Níveis
Para cadastrar um novo nível, clique no botão "Novo Nível" na página de listagem de níveis. Preencha os campos solicitados e clique em "Salvar" para cadastrar o nível.

### Edição de Níveis
Para editar um nível, clique no botão "Editar" na lista de níveis. Preencha os campos desejados e clique em "Salvar" para atualizar os dados do nível.

### Exclusão de Níveis
Para excluir um nível, clique no botão "Excluir" na lista de níveis. Confirme a exclusão e o nível será removido da lista.

### Paginação
A listagem de desenvolvedores e níveis possui paginação. Para navegar entre as páginas, basta que acessar a lista de níveis e selecionar a próxima página.
