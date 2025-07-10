#!/usr/bin/env bash
set -e

# Instalar dependências PHP
composer install --no-dev --optimize-autoloader

# Criar o banco de dados SQLite
mkdir -p database
touch database/database.sqlite

# Copiar o .env de produção
cp .env.production .env

# Gerar a chave da aplicação
php artisan key:generate

# Rodar migrations (se tiver)
php artisan migrate --force
