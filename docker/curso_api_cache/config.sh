docker-compose exec curso_api_cache composer install
docker-compose exec curso_api_cache php artisan key:generate
docker-compose exec curso_api_cache php artisan migrate
