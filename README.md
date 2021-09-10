# Desafio de Cadastro de Clientes

Desenvolver um cadastro de clientes, que deverá ter no mínimo, os seguintes campos:

1) Código (id)
2) Nome (nome)
3) CNPJ (cnpj)
4) Data de cadastro (data_cadastro)
5) Endereço (endereco)
6) Telefone (telefone)

## Regras CADASTRO DE CLIENTES

[x] Não poderá haver CNPJ duplicado
[x] Deve possibilitar Inserir/Remover/Editar clientes Listar todos os clientes
[x] Recuperar por código
[x] Enviar junto o sql para criar a estrutura do banco

## Instalação
- Faça download do repositório
- Instale as dependências com o comando composer install
- Altere as configurações de conexão com a base de dados no arquivo .env pode-se utilizar o sqlite para testes.

> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=desafio_useal
> DB_USERNAME=root
> DB_PASSWORD=root

- Execute a migration para criar as tabelas na base de dados com o comando: 

> php artisan migrate
- Considerando que você está na pasta base do sistema, execute o projeto com o comando

> php -S localhost:8000 -t public

## Rotas
- [GET] / - retorna todos clientes cadastrados
- [GET] /{id} - retorna os dados de um cliente a partir do código
- [POST] / - cadastrar um novo cliente
- [PUT] /{id} - atualizar um cliente
- [DELETE] /{id} - excluir um cliente da base de dados

-----
Parâmetros para [POST] e [PUT]

```json
{
    "nome": "Juliano Silva Silva",
    "cnpj": "00000000019100",
    "data_cadastro": "2021-01-01",
    "endereco": "R. Adams, 42",
    "telefone": "51982346281"
}
```



#### Utilizado framework lumen para o desenvolvimento da api.
