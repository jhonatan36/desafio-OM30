
<p align="center">
<img src="logo.png" alt="Logo OM30" width="200" />
</p>

# DESAFIO FULL STACK PHP

## Requisitos Atendidos

Todos os requisitos necessários foram atendidos. Foi adicionada validação de CPF.

Para o front-end foi utilizado bootstrap 5, jQuery e jQuery mask.

## Requisitos

1. PHP 7.4
1. Banco PostgreSQL 10+
1. Composer instalado

## Passos para rodar o projeto

1. Baixar arquivos do projeto
1. Configurar arquivo "env", criando uma cópia para ".env" e adicionar os dados da conexão do postgre.

    ~~~
    app.baseURL = 'http://localhost:8080'

    database.default.hostname = localhost
    database.default.database = desafio
    database.default.username = postgres
    database.default.password = senhabanco
    database.default.DBDriver = Postgre
    database.default.DBPrefix =
    ~~~
    >Estas são as únicas variaveis que precisam estar no env.

1. Rodar o comando do composer;
    >composer install
1. Criar banco "desafio" no postgresql;
1. Rodar migration do projeto;
    >php spark migrate
1. Rodar servidor do projeto;
    >php spark serve

1. acesse o sistema em "http://localhost:8000"

## Caso queira rodar com Docker

1. Baixar arquivos do sistema
1. executar na raiz do projeto o docker compose
    >docker-composer up -d

    caso tudo ocorra corretamente, você terá 3 máquinas rodando
    * desafio-web
    * desafio-db
    * desafio-adminer

1. acesse a url "http://localhost:8080" para acessar o adminer e criar o banco no postgresql. Os dados de acesso configurados são:
    ```
    Sistema: PostgreSQL
    Servidor: db
    usuário: postgres
    senha: 123456
    Base de dados: 
    ```

1. Crie a base de dados "desafio"

1. Configure o .env com as configurações do banco e url padrões como abaixo:

    ```
    app.baseURL = 'http://localhost:8000'

    database.default.hostname = db
    database.default.database = desafio
    database.default.username = postgres
    database.default.password = 123456
    database.default.DBDriver = Postgre
    database.default.DBPrefix =
    ```

1. acesse a maquina web para executar a migration.

    >docker exec -it desafio-web /bin/sh

1. dentro da máquina rode os comandos para instalar as dependências e executar as migrations

    >composer install
    
    >php spark migrate

1. acesse o sistema em "http://localhost:8000"