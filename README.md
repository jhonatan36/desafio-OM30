
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
