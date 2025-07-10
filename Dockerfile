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
RUN echo "🔧 Instalando dependências PHP..." && \
    composer install --no-dev --optimize-autoloader

# Prepara ambiente e banco
RUN echo "⚙️  Preparando ambiente e banco..." && \
    cp .env.production .env && \
    echo "✅ Copiado .env.production para .env" && \
    mkdir -p database && \
    touch database/database.sqlite && \
    echo "✅ Banco SQLite criado" && \
    php artisan key:generate && \
    echo "✅ Chave gerada" && \
    php artisan migrate --force && \
    echo "✅ Migrations executadas"

# Expondo porta
EXPOSE 8000

# Comando que inicia o Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
