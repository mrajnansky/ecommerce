# Ecommerce app

## Using
- Laravel
- unlu/laravel-api-query-builder
- nextJs
- React bootstrap

## Configuring
- copy .env.example to .env inside ecommerce folder
 
## Starting
- docker-compose up -d --build --force-recreate
- docker-compose exec app php artisan key:generate
- docker-compose exec app php artisan migrate
