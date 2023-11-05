#!/bin/bash

composer install

php artisan cache:clear

php artisan view:clear

php artisan config:clear

php artisan event:clear

php artisan route:clear

php artisan config:cache

php artisan route:cache

php artisan view:cache

php artisan key:generate

php artisan storage:link

yarn install

yarn watch-poll
