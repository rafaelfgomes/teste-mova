# Desafio Mova

* Desenvolva um programa que exiba uma mensagem diferente para cada dia da semana, usando o padrão Strategy. Pense que em datas especiais, podemos ter alguma variação.

* Desenvolva um programa que notifique o usuário quando um e-mail chegar à sua caixa de entrada. O usuário pode ser notificado por diversos meios, como por exemplo, pelo celular, por um aplicativo desktop, e assim por diante. Utilize o padrão de projeto Observer para que todos os meios utilizados pelo usuário sejam notificados quando um e-mail chegar a sua caixa de entrada.

## 💻 Pré-requisitos

Antes de começar, é necessário ter os seguintes pré-requisitos instalados no seu computador:

* Docker ([Tutorial de instalação](https://www.docker.com/get-started))

* Postman (Para testes dos endpoints da api) --&gt; [Download](https://www.postman.com/downloads/)

## 🚀 Instalando o projeto

Para instalar e rodar o projeto na sua máquina local, basta executar os seguintes passos:

* Na raiz do projeto faça uma cópia do arquivo '.env.example' e renomeie para '.env';

* No arquivo '.env' sete as portas do frontend, backend e caixa de entrada do email nas variáveis BACKEND_PORT, FRONTEND_PORT e MAIL_WEB_PORT;

----------

Após preparar o arquivo .env, execute o seguinte comando:

```bash
docker-compose up -d
```

Se tudo der certo, o projeto já estará rodando e para acessá-lo basta colocar o ip do container ou a url (127.0.0.1:<FRONTEND_PORT>) no seu navegador.

## Configurando o projeto e instalando dependências

Entre na pasta 'backend' e faça os seguintes passos:

* Faça uma cópia do arquivo '.env.example' e renomeie para '.env';

* Execute o seguinte comando para gerar o hash da variável APP_KEY do Laravel:

  * ```bash
    docker exec -it mova_app_php sh -c "php artisan key:generate"
    ```

* Este projeto utiliza o Pusher para enviar novtificações em "tempo real" no caso do usuário receber um e-mail na caixa de entrada, portanto é preciso acessar o site do [Pusher](https://pusher.com/), criar uma conta e configurar um canal para envio do envio do email.

* No arquivo .env do Laravel há algumas variáveis que precisam ser setadas:

  * Variáveis do Pusher: Setar as variáveis PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET, PUSHER_APP_CLUSTER de acordo com o definido no seu cadastro e canal do Pusher

* Após setar as variáveis no arquivo .env é preciso instalar as dependências do projeto, que é feita através do comando:

  ```bash
  docker exec -it mova_app_php sh -c "composer install"
  ```

* Será criada a pasta 'vendor' na raiz do projeto Laravel. Para não ter nenhum problema de acesso negado execute os seguintes comandos:

  ```bash
  docker exec -it mova_app_php sh -c "chmod -R 777 vendor"
  ```

  ```bash
  docker exec -it mova_app_php sh -c "chmod -R 777 storage/logs"
  ```

  ```bash
  docker exec -it mova_app_php sh -c "chmod -R 777 storage/framework/cache"
  ```

## Endpoints Postman

Na raiz deste projeto há um arquivo json de [Coleção do Postman](mova_collection.json) onde estão todos os endpoints. Para importar o arquivo no Postman, basta ir em "File > Import" e buscar o arquivo na pasta.

## Testando a aplicação

* Para testar a mensagem do dia, basta executar uma request POST no endpoint `/message-of-day` pelo postman e esperar o seguinte retorno (a mensagem irá variar de acordo com o dia da semana):

```JSON
{
    "data": {
        "week_day": "Quinta-feira",
        "message": "Cada amanhecer é feito de novidade e oportunidade."
    }
}
```

* Para testar o envio de email, basta executar uma request POST no endpoint `/send-email` pelo postman e esperar o seguinte retorno:

```JSON
{
    "data": {
        "message": "Email enviado com sucesso"
    }
}
```

* Para acessar a caixa de entrada do email, acesse a url 127.0.0.1:<MAIL_WEB_PORT> e veja o email enviado na caixa de entrada

* Para testar a notificação sendo enviada ao usuário, acesse o "frontend" da aplicação na url 127.0.0.1:<FRONTEND_PORT> e execute o envio do e-mail pelo postman. Ao ser executado com o navegador aberto, é exibido a notificação na página que o email chegou na caixa de entrada do usuário.

## License

Este projeto é licenciado pela [Licença MIT](https://opensource.org/licenses/MIT)
