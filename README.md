## Developer Catalog
Descrição
Este projeto é uma plataforma para gerenciamento de desenvolvedores. Permite a criação de perfis, listagem de habilidades, classificação de desenvolvedores, dentre outras funcionalidades.

## Instalação
Para rodar o projeto, é necessário instalar os seguintes programas:

PHP 7.4 ou superior
Composer
Node.js
npm

### Passos
Faça o clone do repositório: 

```git clone https://github.com/seu-usuario/developer-catalog.git```

Entre na pasta do projeto: 
```cd developer-catalog```

Instale as dependências do Laravel: 
```composer install```

Instale as dependências do Node.js: 
```npm install```
Crie o arquivo de configuração do Laravel: 
```cp .env.example .env```

Gere a chave de criptografia do Laravel: 
```php artisan key:generate```

Rode as migrações do banco de dados: 
```php artisan migrate```

Rode o servidor: ```php artisan serve```

Abra o navegador em 
```http://localhost:8000```
### Tecnologias Utilizadas

* Laravel 8
* Vue.js
* Bootstrap 5
