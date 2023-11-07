#!/bin/bash

composer install
php artisan key:generate
php artisan storage:link
php artisan migrate:refresh --seed
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
yarn install
yarn dev