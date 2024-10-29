# Instalação composer
## Instalar o composer globalmente na maquina
- ```composer global require laravel/installer```
- Utilização 
- ```laravel new example-app```
- Entrar na pasta
- ```cd example-app```
- Ligando servidor
- ```php artisan serve```

## Instalar o composer na pasta 
- comando: 
- ```composer create-project laravel/laravel example-app```
- Utilização 
- ```laravel new example-app```
- Entrar na pasta
- ```cd example-app```
- Ligando servidor
- ```php artisan serve```

## Alterações

### .env

- ``DB_CONNECTION=mysql`` <br>
``DB_HOST=127.0.0.1`` <br>
``DB_PORT=3306`` <br>
``DB_DATABASE=database`` <br>
``DB_USERNAME=root`` <br>
``DB_PASSWORD=``

- Editar arquivo .env, retirar o comentários onde estiver o *mysql*.
- Alterar *user* e *password*
- Alterar porta (caso use outro banco)
- após isso fazer a migração com o comando ``php artisan migrate``

# comandos gerais
## Atualizar Composer ou Projeto
- `composer update`

## Migration
- `php artisan migrate`
- `php artisan key:generate` -> gerar chave para a plicação
- `php artisan make:(model,controller,migration)`
- ex: `php artisan make:migration create-table-posts`

# migration
- `php artisan migrate`
- `php artisan migrate:status`
- `php artisan migrate:rollback` -> volta a última magration
- `php artisan migrate:refresh` -> volta todas migrations
- `php artisan migrate` -> executar migrations
