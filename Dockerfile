# Imagem oficial PHP CLI com Apache para Laravel (ajuste se preferir)
FROM php:8.2-apache

# Instalar extensões e dependências do sistema
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    libcurl4-openssl-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip pdo pdo_mysql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Habilitar mod_rewrite do Apache (importante para Laravel)
RUN a2enmod rewrite

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto para dentro do container
COPY . .

# Instalar dependências PHP do projeto
RUN composer install --no-dev --optimize-autoloader

# Ajustar permissões para o Laravel (storage e cache)
RUN chown -R www-data:www-data storage bootstrap/cache

# Expor porta 80 (Apache padrão)
EXPOSE 80

# Apontar o Apache para a pasta public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

