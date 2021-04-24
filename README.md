## Desafio PFA docker

## Feito com Laravel

## Build Imagens

```
- docker build -t tfariasg3/pfa-laravel . -f Dockerfile
- docker build -t tfariasg3/pfa-nginx .docker/nginx -f .docker/nginx/Dockerfile
```

## RUN
```
- docker run -d -v "$PWD/.docker/dbdata":/var/lib/mysql --name pfa-mysql --network pfa-desafio -e MYSQL_ROOT_PASSWORD=laravel -e MYSQL_DATABASE=pfa_laravel -p 3306:3306 mysql:5.7
- docker run -d -v "$PWD":/var/www --network pfa-desafio --name pfa-laravel tfariasg3/pfa-laravel:latest
- docker run -d -v "$PWD":/var/www --network pfa-desafio -p 8080:80 --name pfa-nginx tfariasg3/pfa-nginx:latest
```
## ATENÇÃO

```
após executar os comandos acima entrar no containder pfa-laravel e rodar os comandos 
$ composer install
$ php artisan migration 
``` 
## utilizado meu instalador de codigos para geração da listagem
```
 - https://packagist.org/packages/tfarias/instalador-tfarias-lte
``` 
