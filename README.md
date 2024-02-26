# Sistema de vendedores e vendas

## Aplicação:

Um sistema para cadastro de vendedores e vendas. Cada venda é registrada para seu devido vendedor e ao final calcula sua comissão.

## Funcionalidades:

- CRUD de vendedores
- Inserir nova venda
- Lista todas as vendas de um vendedor
- Ao final de cada dia envia um email com um relatório para cada vendedor com a soma de todas as vendas efetuadas no dia

## Requisitos:

- **Laravel 10+**
- **PHP 8+**
- **Composer**
- **Git**

## Instalação:

1. Clone o repositório Git:
```
git clone https://github.com/VitorNuness/sellers.git
```

2. Instale as depêndencias:
```
composer install
```

3. Copie o arquivo .env.examplo para .env:
```
cp .env.example .env
```

4. Gere a chave da aplicação:
```
artisan key:generate
```

6. Configure o banco de dados no arquivo .env:
* Obs.: Recomendado uso do MySQL como banco, visto que a aplicação foi desenvolvida com o mesmo.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nome_banco_de_dados>
DB_USERNAME=<seu_usuario>
DB_PASSWORD=<sua_senha>
```

7. Execute as migrações:
```
php artisan migrate
```

8. Configure as variáveis de e-mail:
```
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=<seu_usuario_de_email>
MAIL_PASSWORD=<sua_senha_de_email>
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

9. Inicie as rotinas, para envio de e-mail ao final do dia, localmente:
```
php artisan schedule:work
```

- Ou consulte a [documentação do Laravel sobre tarefas](https://laravel.com/docs/10.x/scheduling#running-the-scheduler).

## Uso:

### Views:

1. **Tela principal**:

    Assim que o sistema é acessado, mostra uma lista com todos os vendedores.

- **Botão "Adicionar Vendedor"**: Navega para o formulário de cadastro de vendedor.

- **Botão "Nova Venda"**: Navega para o formulário para registrar uma venda.

    ![tela principal](ReadMeImages/tela_principal.png)

    ![tela principal com registro](ReadMeImages/tela_principal_com_registro.png)

2. **Formulário para cadastrar vendedor**:

    ![formulário para cadastro de vendedores](ReadMeImages/formulario_vendedor.png)

3. **Informações do vendedor**:

    ![tela com informações do vendedor](ReadMeImages/tela_vendedor.png)

4. **Editar vendedor**:

    ![formulário para editar o vendedor](ReadMeImages/editar_vendedor.png)

5. **Lista de vendas**:

    ![lista de vendas do vendedor](ReadMeImages/lista_vendas.png)

6. **Formulário para registrar venda**:

    ![formulário para registrar nova venda](ReadMeImages/nova_venda.png)

### API:

A API fornece os seguintes endpoints:

- `GET /api/sellers`: Retorna todos os vendedores.

    Response:
    ```json
    {
    "data": [
        {
        "id": 1,
        "name": "Vitor Nunes",
        "mail": "vitor1nuness@gmail.com",
        "created_at": "2024-02-18",
        "updated_at": "2024-02-18"
        }
    ]
    }
    ```

- `POST /api/sellers`: Cria um novo vendedor e o retorna.

    Request:
    ```json
    {
        "name": "Vitor Nunes",
        "mail": "vitor1nuness@gmail.com"
    }
    ```

    Response:
    ```json
    {
    "data": [
        {
        "id": 1,
        "name": "Vitor Nunes",
        "mail": "vitor1nuness@gmail.com",
        "created_at": "2024-02-18",
        "updated_at": "2024-02-18"
        }
    ]
    }
    ```

- `GET /api/sellers/{id}`: Retorna um vendedor específico.

    Reponse:
    ```json
    {
    "data": [
        {
        "id": 1,
        "name": "Vitor Nunes",
        "mail": "vitor1nuness@gmail.com",
        "created_at": "2024-02-18",
        "updated_at": "2024-02-18"
        }
    ]
    }
    ```

- `PUT /api/sellers/{id}`: Atualiza um vendedor específico e o retorna.

    Request:
    ```json
    {
        "name": "Vitor Nunes",
        "mail": "vitor1nuness@gmail.com"
    }
    ```

    Response:
    ```json
    {
    "data": [
        {
        "id": 1,
        "name": "Vitor",
        "mail": "vitor1nuness@gmail.com",
        "created_at": "2024-02-18",
        "updated_at": "2024-02-18"
        }
    ]
    }
    ```

- `DELETE /api/sellers/{id}`: Deleta um vendedor específico e retorna um json vazio.

    Reponse:
    ```json
    {}
    ```

- `GET /api/sellers/{id}/sales`: Retorna todas as vendas do vendedor.

    Reponse:
    ```json
    {
    "0": {
        "sellerId": 1,
        "sellerName": "Vitor Nunes",
        "sellerMail": "vitor1nuness@gmail.com",
        "commission": "8.500,00",
        "saleValue": "100.000,00",
        "saleDate": "18/02/2024"
    },
    "1": {
        "sellerId": 1,
        "sellerName": "Vitor Nunes",
        "sellerMail": "vitor1nuness@gmail.com",
        "commission": "5.950,00",
        "saleValue": "70.000,00",
        "saleDate": "18/02/2024"
    }
    }
    ```

- `POST /api/sales`: Cria uma nova venda e a retorna.

    Request:
    ```json
    {
        "seller": "1",
        "value": "100000.00"
    }
    ```

    Response:
    ```json
    {
    "data": {
        "seller": {
        "id": 1,
        "name": "Vitor Nunes",
        "mail": "vitor1nuness@gmail.com",
        "created_at": "2024-02-18",
        "updated_at": "2024-02-18"
        },
        "value": "100000",
        "created_at": "2024-02-18",
        "updated_at": "2024-02-18"
    }
    }
    ```

### E-mail:

No final do dia um e-mail é disparado para cada vendedor com o relatório de vendas do dia.

![email](ReadMeImages/email.png)

## Licença

Esta aplicação é licenciada sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.