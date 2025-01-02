#!/bin/bash
set -e

echo "Deployment started ..."

(php artisan down) || true

git pull origin main

composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

php artisan optimize:clear

php artisan optimize

npm run build

php artisan migrate --force

php artisan up

echo "Deployment finished!"