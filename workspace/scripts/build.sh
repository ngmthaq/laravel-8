#!/bin/bash

composer install --optimize-autoloader --no-dev
php artisan cache:clear
php artisan config:clear
php artisan event:clear
php artisan optimize:clear
php artisan route:clear
php artisan view:clear
php artisan clear-compiled
php artisan auth:clear-resets
php artisan queue:clear
php artisan schedule:clear-cache
php artisan key:generate
php artisan storage:link
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
yarn install
yarn prod