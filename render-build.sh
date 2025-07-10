#!/usr/bin/env bash
set -e

composer install --no-dev --optimize-autoloader

mkdir -p database
touch database/database.sqlite

cp .env.production .env

php artisan key:generate

php artisan migrate --force
