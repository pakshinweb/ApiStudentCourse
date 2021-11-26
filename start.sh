#!/bin/sh
docker-compose up -d --build
docker-compose exec php composer create-project
docker-compose exec php php artisan migrate --seed