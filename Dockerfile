FROM php:8.2-cli

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    unzip zip sqlite3 libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /app

# Copia os arquivos do projeto
COPY . .

# Instala dependências PHP do projeto
RUN composer install --no-dev --optimize-autoloader

# Copia o .env de produção e prepara o banco
RUN cp .env.production .env && \
    mkdir -p database && \
    touch database/database.sqlite && \
    php artisan key:generate && \
    php artisan migrate --force

# Expondo porta
EXPOSE 8000

# Comando que inicia o Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
